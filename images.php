<?php session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/member.css"> -->
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/class.css">
	<link rel="stylesheet" type="text/css" href="css/images.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
	<?php 
		if($_SESSION['userid']==null){
			header("Location: index.php");
		}
		require "connect.php";
		$query = "select * from teacher as T, course as C, class as L where T.teacher_id = L.teacher_id and L.course_id = C.course_id and L.class_id = {$_GET['classid']}";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_affected_rows($dbconn)){
			$row = mysqli_fetch_assoc($result);
		}
	 ?>
	<nav id="navigation">
		<a href="home.php" class="floattran">UP Connect</a>
		<a href="profile.php" class="floattran">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="#" class="floattran">Notifications</a>	
		<a href="#" class="floattran active">Classes</a>	
		<a href="index.php" class="floattran">Logout</a>
	</nav>
	<div id="classContainer">
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
		<li><a href="class.php?classid=<?=$_GET['classid']?>" class="floattran">Discussion</a></li>
		<li><a href="members.php?classid=<?=$_GET['classid']?>" class="floattran">Members</a></li>
		<li><a href="files.php?classid=<?=$_GET['classid']?>" class="floattran">Files</a></li>
		<li><a href="#" class="floattran active">Images</a></li>
	</ul>
	<div class="container">
		<h1>IMAGES</h1>
		<h2>CMSC 128</h2>
		<p class="instructions" style="margin: 10px 20px;">Click on one of the images to view.</p>
		<form class="searchthroughlist">
			<input type="text" name="keyword" placeholder="Search...">
			<input type="submit" name="submit" value="SEARCH">
		</form>
		<ul class="imagelist">
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
			</a></li>
		</ul>
	</div>
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
</body>
</html>