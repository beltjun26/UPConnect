<?php 
	session_start();
	$_SESSION['page'] = 4;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/class.css">
	<link rel="stylesheet" type="text/css" href="css/post.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
</head>
<body>
	<?php 
		if(!$_SESSION['userid']){
			header("Location: index.php");
		}
		require "connect.php";

		$class_id = $_GET['classid'];
		$_SESSION['class_id'] = $class_id;

		if(isset($_SESSION['caption'])){
			$caption_post = $_SESSION['caption'];
		}
		else{
			$caption_post = "";
		}

		//Query for the class
		$query = "select * from teacher natural join course natural join class natural join semester where class_id = '$class_id'";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_affected_rows($dbconn)){
			$row = mysqli_fetch_assoc($result);
		}

		//Query for the post
		$query = "select * from (select * from post where class_id = '$class_id') as class_post join (SELECT student_id as id, firstname, lastname FROM student UNION SELECT teacher_id as id, firstname, lastname FROM teacher) as user on user.id = class_post.user_id ORDER BY time_stamp DESC;";

		$post_row = mysqli_query($dbconn, $query);
		
	 ?>
	<?php require "nav.php"; ?>
	<div class="container" id="classContainer">
		<header class="class">
			<h1 class="classtitle"><?php echo $row['course_name'] ?></h1>
			<ul class="class description">
				<li><p class="description"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></p></li>
				<li><p class="description">S.Y. <?php echo $row['school_year'] ?></p></li>
				<li><p class="description"><?php 
					if($row['sem_no']==1){
						echo "1st";
					}
					if($row['sem_no']==2){
						echo "2nd";
					}
				 ?> Semester</p></li>
				<li><p class="description">Section <?php echo $row['section'] ?></p></li>	
			</ul>
		</header>
		<ul class="grouplinks">
			<li><a href="#" class="floattran active">Discussion</a></li>
			<li><a href="members.php?classid=<?=$_GET['classid']?>" class="floattran">Members</a></li>
			<li><a href="files.php?classid=<?=$_GET['classid']?>" class="floattran">Files</a></li>
			<li><a href="images.php?classid=<?=$_GET['classid']?>" class="floattran">Images</a></li>
		</ul>
		
		<div class="to post">
			<header>
				<img class="userphoto" src="images/profile_images/<?=$_SESSION['userid'] ?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
				<p class="user"><?=$_SESSION['firstname']." ".$_SESSION['lastname']?></p>

			</header>
			<form method="post" action="post.php" enctype="multipart/form-data">
				<textarea name="caption" class="text" placeholder="Want to Post?"><?=$caption_post?></textarea>
				<img src="" alt="" id="image_preview">
				<ul class="button options">

					<li id = "image_item">
						<label for="image_button" class="hoveranim">+ Image</label>
						<input type="file" name = "image_upload" class="hoveranim" id = "image_button" onchange="loadImage(event)" accept="image/*"/>
					</li>
					
					<li id = "file_item">
						<label for="file_button" class="hoveranim" id = "file_button_label">+ File</label>
						<input type="file" name = "file_upload" id = "file_button" onchange="loadFile(event)" accept=".doc, .docm, .docx, .dot, .dotm, .dotx, .epub, .odf, .ods, .odt, .ott, .oxps, .pages, .pdf, .pmd, .pot, .potx, .pps, .ppsx, .ppt, .pptm, .pptx, .prn, .prnproj, .ps, .pub, .pwi, .rep, .rtf, .sdd, .sdw, .shs, .snp, .sxw, .tpl, .vsd, .wlmp, .wpd, .wps, .wri, .xps, .rar, .zip, .7zip, .xlsm, .xlsx, .xlt, .htm, .html, .csv, .dbf, .txt, .psd, .potm">
					</li>

					<li id = "cancel_upload">
						<input type="button" class="hoveranim" value="cancel" onclick="cancel_upload(event)">
					</li>

					<li><input type="submit" name="post" value="Post" class="hoveranim"></li>
				</ul>
			</form>
		</div>

	<!--FILE_ID = 0 if no file
		FILE_ID = 1 if files
		FILE_ID = 2 if images -->
		<?php foreach ($post_row as $value){ ?>
			<div class="post">	
				<header>
					<img class="userphoto" src="images/profile_images/<?=$value['user_id'];?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
					<a class="user" href="
					<?php echo "profile.php?student_id=".$value['user_id'];?>
					"><?=$value['firstname']." ".$value['lastname'];?></a>
					<span class="time-stamp" style="font-family: Arial;font-size: 0.85em; padding-top: 0.60em; margin-left: 10px; color:#DDD; "><?php echo date("F j, y, g:i a", strtotime($value['time_stamp']));  ?></span>
				</header>
				<p class="caption"><?= $value['text'] ?></p>
				<?php if($value['file_id'] == 1): 
					$dir = "saved_images/".$value['post_id'];
					$file_array = scandir($dir);
				?>
					<img src="<?php echo $dir."/".$file_array[2]; ?>" class="uploadedphoto">
				<?php endif; ?>

				<?php if($value['file_id'] == 2):
					$dir = "saved_files/".$value['post_id'];
					$file_array = scandir($dir);
				?>
					<div class="filecontainer">
						<img src="images/file.png" class="file">
						<p><?=$file_array[2];?></p>
					</div>
				<?php endif; ?>

				<ul class="button options"> 
					<?php if($value['file_id'] != 0): ?>
						<li>
							<a href="download.php?post=<?=$value['post_id']?>&file=<?=$value['file_id']?>" target="_blank" class = "hoveranim download-btn">Download</a>
						</li> 
					<?php endif; ?>
					<li><input type="button" value="Comment" class="hoveranim"></li>
				</ul>
				<?php 
					$query = "SELECT * from (SELECT concat(firstname, \" \", lastname) as fullname, teacher_id as id, content from comment join teacher on teacher.teacher_id=user_id where post_id = {$value['post_id']}) as ttable UNION (SELECT concat(firstname, \" \", lastname) as fullname, student_id as id, content from comment join student on student.student_id=user_id where post_id = {$value['post_id']})";
					$result = mysqli_query($dbconn, $query);
				 ?>
				<ul class="comments" >
				<?php if(mysqli_affected_rows($dbconn)): ?>
					<?php while($data = mysqli_fetch_assoc($result)): ?>
					<li class="comment commented">
						<img src="images/profile_images/<?=$data['id']?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<div class="content">

							<span class="delete">x</span>
							<a class="usercom"><?=$data['fullname']?></a>
							<span class="timestamp">December 7, 2016 8:42pm</span>
							<p class="comment-content"><?=$data['content']?></p>
						</div>
					</li>
					<?php endwhile ?>
				<?php endif ?>
					
					<li class="comment commenting">
						<img src="images/profile_images/<?=$_SESSION['userid']?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<form method="post" action="commit_comment.php">
							<textarea class="description" name="content" placeholder="Comment here..."></textarea>
							<input type="text" name="id" value="<?=$value['post_id']?>" style="display: none">
							<input type="text" name="class" value="<?=$_GET['classid']?>" style="display: none">	
							<button><span class="glyphicon glyphicon-comment"></span></button>
						</form>
					</li>
				</ul>
			</div>
		<?php } ?>
	</div>
	<script>
		h = $('#nav').outerHeight(true);
		console.log(h);
		x = window.innerHeight;
		console.log(x);
		x = x - h;
		console.log(x);
		h = h - 5;
		document.getElementById('classContainer').setAttribute("style","height: "+x+"px;width:100%;margin-top:"+h+"px;padding:0");
	</script>

	<script>
		var loadImage = function(event){
			var image_preview = document.getElementById('image_preview');

			image_preview.src = URL.createObjectURL(event.target.files[0]);
			image_preview.style.display = "block";


			var file_item = document.getElementById('file_item');
			file_item.style.display = "none";

			document.getElementById('cancel_upload').style.display = "block";
		};

		var loadFile = function(event){
			var image_item = document.getElementById('image_item');
			image_item.style.display = "none";


			document.getElementById('cancel_upload').style.display = "block";	
			document.getElementById('file_button').style.display = "block";

			document.getElementById('file_button_label').style.display = "none";
		};

		var cancel_upload = function(event){
			var image_button = document.getElementById('image_button');
			image_button.value = '';

			var image_preview = document.getElementById('image_preview');
			image_preview.src = '';
			image_preview.style.display = 'none';

			var file_item = document.getElementById('file_item');
			file_item.style.display = "block";

			var file_item = document.getElementById('image_item');
			file_item.style.display = "block";


			document.getElementById('cancel_upload').style.display = "none";
			document.getElementById('file_button').style.display = "none";
			document.getElementById('file_button_label').style.display = "block";
		}

	</script>

	


</body>
</html>


