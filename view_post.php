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
	<?php require "nav.php"; 
	require "connect.php";
		$query = "SELECT * FROM post natural join class join student on user_id = student_id where post_id = {$_GET['post_id']}";
		$result = mysqli_query($dbconn, $query);
		$data = mysqli_fetch_assoc($result);
		$query = "SELECT * from (SELECT concat(firstname, \" \", lastname) as fullname, teacher_id as id, content from comment join teacher on teacher.teacher_id=user_id where post_id = {$_GET['post_id']}) as ttable UNION (SELECT concat(firstname, \" \", lastname) as fullname, student_id as id, content from comment join student on student.student_id=user_id where post_id = {$_GET['post_id']})";
		$result = mysqli_query($dbconn, $query);
	?>
	<div class="container" id="classContainer">
			<div class="post" style="margin-top: 30px!important;">	
				<header>
					<img class="userphoto" src="images/profile_images/<?=$data['user_id']?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
					<a class="user" href="profile.php?student_id=<?php echo $data['student_id'] ?>"><?php echo $data['firstname']." ".$data['lastname']?></a>
				</header>
				<p class="caption"><?=$data['text']?></p>
				
				<?php if ($data['file_id'] == 1): 
						$dir = "saved_images/".$data['post_id'];
						$file_array = scandir($dir);
				?>

					<img src="<?php echo $dir."/".$file_array[2]; ?>" class="uploadedphoto">
				<?php endif ?>
	
				<?php if ($data['file_id'] == 2): ?>
					<div class="filecontainer">
						<?php 
						$dir = "saved_files/".$data['post_id'];
						$file_array = scandir($dir);
						 ?>
						<img src="images/file.png" class="file">
						<p><?=$file_array[2];?></p>
					</div>
				<?php endif; ?>
				<ul class="button options"> 
					<?php if($data['file_id'] == 1): ?>
						<li>
							<a href="download.php?post=<?php echo $_GET['post_id']; ?>&file=1" target="_blank" class = "hoveranim download-btn">Download</a>
						</li>
					<?php endif; ?>
					<?php if($data['file_id'] == 2): ?>
						<li>
							<a href="download.php?post=<?php echo $_GET['post_id']; ?>&file=2" target="_blank" class = "hoveranim download-btn">Download</a>
						</li>
					<?php endif; ?>
					<li><input type="button" value="Comment" class="hoveranim"></li>
					<li><input type="button" value="Follow" class="hoveranim"></li>
				</ul>
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
						<form method="post" action="commit_comment1.php">
							<textarea class="description" name="content" placeholder="Comment here..."></textarea>
							<input type="text" name="id" value="<?=$_GET['post_id']?>" style="display: none">
							<input type="text" name="post_id" value="<?=$_GET['post_id']?>" style="display: none">	
							<button><span class="glyphicon glyphicon-comment"></span></button>
						</form>
					</li>
					
				</ul>
			</div>
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


