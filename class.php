<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
		if(!$_SESSION['userid']){
			header("Location: index.php");
		}
		$host = 'localhost';
			$username = 'root';
			$password = '';
			$db = 'up_connect_db';
			$dbconn = mysqli_connect($host,$username,$password,$db) or die("Could not connect to database!");
			$query = "select * from teacher as T, course as C, class as L where T.teacher_id = L.teacher_id and L.course_id = C.course_id and L.class_id = {$_GET['classid']}";
			$result = mysqli_query($dbconn, $query);
			if(mysqli_affected_rows($dbconn)){
				$row = mysqli_fetch_assoc($result);
			}
	 ?>
	<div class="topnav">
		<a href="home.php" class="floattran">UP Connect</a>
		<a href="profile.php" class="floattran">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="index.php" class="floattran">Logout</a>
	</div>
	<div class="container" style="width: 80%; margin-top: 7%;">
		<header class="class">
			<h1 class="classtitle"><?php echo $row['course_name'] ?></h1>
			<ul class="class description">
				<li><p class="description"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></p></li>
				<li><p class="description">S.Y. <?php echo $row['school_year'] ?></p></li>
				<li><p class="description"><?php 
					if($row['sem']==1){
						echo "1st";
					}
					if($row['sem']==2){
						echo "2nd";
					}
				 ?> Semester</p></li>
				<li><p class="description">Section <?php echo $row['section'] ?></p></li>	
			</ul>
		</header>
		<ul class="grouplinks">
			<li><a href="members.php" class="floattran">Members</a></li>
			<li><a href="#" class="floattran">Files</a></li>
			<li><a href="#" class="floattran">Images</a></li>
		</ul>
		
		<div class="topost">
			<p class="user">Clyde Joshua Delgado</p>
			<form>
				<textarea name="caption" class="text" placeholder="Want to Post?"></textarea>
				<input type="button" value="+ Image" class="hoveranim">
				<input type="button" value="+ File" class="hoveranim">
				<input type="submit" name="post" value="Post" class="hoveranim">
			</form>
		</div>
		<!-- <ul class="actionbtns">
			<li class="tooltip"><button>M</button><span class="tooltiptext">+ Add Member</span></li>
			<li class="tooltip"><button>F</button><span class="tooltiptext">+ Add File</span></li>
			<li class="tooltip"><button>I</button><span class="tooltiptext">+ Add Image</span></li> 
		</ul> -->
		<div class="post">
			<p class="user">Clyde Joshua Delgado</p>
			<p class="caption">Clyde uploaded a photo in CMSC 128.</p>
			<img src="images/notes.jpg" class="uploadedphoto">
			<input type="button" value="Download" class="hoveranim">
			<input type="button" value="Comment" class="hoveranim">
			<input type="button" value="Follow" class="hoveranim">
		</div>
		<div class="post">
			<p class="user">Clyde Joshua Delgado</p>
			<p class="caption">Clyde uploaded a file in CMSC 128.</p>
			<div class="filecontainer">
				<img src="images/file.png" id="file">
				<p>File.fle</p>
			</div>
			<input type="button" value="Download" class="hoveranim">
			<input type="button" value="Comment" class="hoveranim">
			<input type="button" value="Follow" class="hoveranim">
		</div>
		<div class="post">
			<p class="user">Clyde Joshua Delgado</p>
			<p class="caption">Clyde uploaded a photo in CMSC 128.
			asdfsdaf
			asdfsad
			fsadf
			sdafdsf</p>
			<!-- <img src="images/notes.jpg" class="uploadedphoto"> -->
			<input type="button" value="Download" class="hoveranim">
			<input type="button" value="Comment" class="hoveranim">
			<input type="button" value="Follow" class="hoveranim">
		</div>

	</div>
</body>
</html>