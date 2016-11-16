<?php session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/member.css">
</head>
<body>
	<?php 
		if($_SESSION['userid']){
			header("Location: index.php")
		}
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$db = 'up_connect_db';
		$dbconn = mysqli_connect($host,$username,$password,$db) or die("Could not connect to database!");
		

	 ?>
	<div class="topnav">
		<a href="home.html" class="floattran">UP Connect</a>
		<a href="profile.html" class="floattran">Your Profile</a>
		<a href="home.html" class="floattran">Home</a>
		<a href="index.html" class="floattran">Logout</a>
	</div>
	<div class="container">
		<h1>CLASS MEMBERS</h1>
		<h2>CMSC 128</h2>
		<a href="profile.html"><img src="images/pp_cover/1.jpg"> <span>Alonzo Locsin</span></a>
		<a href="profile.html"><img src="images/pp_cover/2.jpg"> <span>Andrew Dagdag</span></a>
		<a href="profile.html"><img src="images/pp_cover/3.jpg"> <span>Clyde Joshua Delgado</span></a>
		<a href="profile.html"><img src="images/pp_cover/4.jpg"> <span>Diana Chris Pacana</span></a>
		<a href="profile.html"><img src="images/pp_cover/5.jpg"> <span>Donn Cruz</span></a>
		<a href="profile.html"><img src="images/pp_cover/6.jpg"> <span>Angelica Tabalucon</span></a>
		<a href="profile.html"><img src="images/pp_cover/7.jpg"> <span>maynard Vargas</span></a>
		<a href="profile.html"><img src="images/pp_cover/8.jpg"> <span>Rollin Opsima</span></a>
		<a href="profile.html"><img src="images/pp_cover/9.jpg"> <span>Rosiebelt Jun Abisado</span></a>
		<a href="profile.html"><img src="images/pp_cover/10.jpg"><span>Rosjel Jolly Lambungan</span></a>
		<a href="profile.html"><img src="images/pp_cover/11.jpg"><span>Salvy Jessa Arnaiz</span></a>
		<a href="profile.html"><img src="images/pp_cover/12.jpg"><span>Shebna Rose Fabilloren</span></a>
		<p>END OF LIST</p>
	</div>
</body>
</html>