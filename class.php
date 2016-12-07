<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/class.css">
	<link rel="stylesheet" type="text/css" href="css/post.css">
</head>
<body>
	<?php 
		if(!$_SESSION['userid']){
			header("Location: index.php");
		}
		require "connect.php";

		$class_id = $_GET['classid'];
		$_SESSION['class_id'] = $class_id;


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
	<nav id="navigation">
		<a href="home.php" class="floattran">UP Connect</a>
		<a href="myprofile.php" class="floattran">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="#" class="floattran">Notifications</a>	
		<a href="#" class="floattran">Classes</a>	
		<a href="index.php" class="floattran">Logout</a>
	</nav>
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
				<textarea name="caption" class="text" placeholder="Want to Post?"></textarea>
				<ul class="button options">

					<li><input type="file" value="+ Image" class="hoveranim" id = "image_button" onchange="loadFile(event)"></li>
					<li><input type="submit" name="post" value="Post" class="hoveranim"></li>
				</ul>
					<img src="" alt="" id="image_preview" style="display: block">
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
					<?php 
						if($_SESSION['userid']==$value['user_id']){
							echo "myprofile.php";
						}else{
							echo "profile.php?student_id=".$value['user_id'];
						}
					 ?>
					"><?=$value['firstname']." ".$value['lastname'];?></a>
				</header>
				<p class="caption"><?= $value['text'] ?></p>
				<ul class="button options"> 

					<?php if($value['file_id'] != 0): ?>
						<li><input type="button" value="Download" class="hoveranim"></li> 
					<?php endif; ?>
					<li><input type="button" value="Comment" class="hoveranim"></li>
					<li><input type="button" value="Follow" class="hoveranim"></li>
				</ul>
			</div>
			<ul class="comments">
				<li class="commented">
					<img src="" onerror="">
					<p></p>
					<button></button>
				</li>
				<li class="commenting">
					<img src="" onerror="">
					<p></p>
					<span class="delete">x</span>
				</li>
			</ul>
		<?php } ?>





	</div>
	<script>
		h = $('#navigation').outerHeight(true);
		console.log(h);
		x = window.innerHeight;
		console.log(x);
		x = x - h;
		console.log(x);
		document.getElementById('classContainer').setAttribute("style","height: "+x+"px;width:100%;margin-top:"+h+"px;");
	</script>

	<script>
		var loadFile = function(event){
			var image_preview = document.getElementById('image_preview');
			image_preview.src = URL.createObjectURL(event.target.files[0]);
		};
	</script>


</body>
</html>