<?php session_start();
 ?>
<!DOCTYPE php>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/class.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
	<?php 
		if($_SESSION['userid']==null){
			header("Location: index.php");
		}
		require "connect.php";
		$query = "select * from teacher natural join course natural join class natural join semester where class_id = {$_GET['classid']}";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_affected_rows($dbconn)){
			$row = mysqli_fetch_assoc($result);
		}
	 ?>
	<nav id="navigation">
		<a href="home.php" class="floattran">UP Connect</a>
		<a href="myprofile.php" class="floattran">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="#" class="floattran">Notifications</a>	
		<a href="#" class="floattran">Classes</a>	
		<a href="logout.php" class="floattran">Logout</a>
	</nav>
	<div id="classContainer">
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
		<li><a href="class.php?classid=<?=$_GET['classid']?>" class="floattran">Discussion</a></li>
		<li><a href="members.php" class="floattran active">Members</a></li>
		<li><a href="files.php?classid=<?=$_GET['classid']?>" class="floattran">Files</a></li>
		<li><a href="images.php?classid=<?=$_GET['classid']?>" class="floattran">Images</a></li>
	</ul>
	<div class="container">
		<h1>MEMBERS</h1>
		<h2>CMSC 128</h2>
		<p class="instructions" style="margin: 10px 20px;">Click on one of the people to view their profile.</p>
		<form class="searchthroughlist">
			<input type="text" name="keyword" placeholder="Search...">
			<input type="submit" name="submit" value="SEARCH">
		</form>
		<ul class="studentlist">
			<li><a href="profile.php">
				<img src="images/profile_images/1.jpg">
				<ul class="description">
					<li class="descriptionName">Alonzo Locsin</li>
					<li class="descriptionCourseYear">BS in Computer Science III</li>
				</ul>
			</a></li>
			<li><a href="profile.php"><img src="images/profile_images/2.jpg"> <span>Andrew Dagdag</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/3.jpg"> <span>Clyde Joshua Delgado</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/4.jpg"> <span>Diana Chris Pacana</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/5.jpg"> <span>Donn Cruz</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/6.jpg"> <span>Angelica Tabalucon</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/7.jpg"> <span>maynard Vargas</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/8.jpg"> <span>Rollin Opsima</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/9.jpg"> <span>Rosiebelt Jun Abisado</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/10.jpg"><span>Rosjel Jolly Lambungan</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/11.jpg"><span>Salvy Jessa Arnaiz</span></a></li>
			<li><a href="profile.php"><img src="images/profile_images/12.jpg"><span>Shebna Rose Fabilloren</span></a></li>
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