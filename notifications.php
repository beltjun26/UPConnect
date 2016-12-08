<?php
	session_start();
	$_SESSION['page'] = 3;
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/notifications.css">
</head>
<body>
	<?php require "nav.php"; ?>
	<div class="container" id="notif-container">
		<div class="notif-container">
			<img class="user-photo" src="images/pp_cover/Clyde1.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
			<a href="#" class="close">&times;</a>
			<div class="content">
				<span class="username">Clyde Joshua Delgado</span>
				<span class="time-stamp">4:00AM November 14, 2016</span>
				<p>Clyde followed your post.</p><br>
			</div>
			<a href="people_profile.php" class="view">View</a>
		</div>
		<div class="notif-container">
			<img class="user-photo" src="images/pp_cover/Clyde1.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
			<a href="#" class="close">&times;</a>
			<div class="content">
				<span class="username">Clyde Joshua Delgado</span>
				<span class="time-stamp">4:00AM November 14, 2016</span>
				<p>Clyde commented on the post you are following.</p><br>
			</div>
			<a href="people_profile.php" class="view">View</a>
		</div>
		<div class="notif-container">
			<img class="user-photo" src="images/pp_cover/Clyde1.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
			<a href="#" class="close">&times;</a>
			<div class="content">
				<span class="username">Clyde Joshua Delgado</span>
				<span class="time-stamp">4:00AM November 14, 2016</span>
				<p>Clyde commented on your post.</p><br>
			</div>
			<a href="people_profile.php" class="view">View</a>
		</div>
		<div class="notif-container">
			<img class="user-photo" src="images/pp_cover/Clyde1.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
			<a href="#" class="close">&times;</a>
			<div class="content">
				<span class="username">Spark Comshop</span>
				<span class="time-stamp">4:00AM November 14, 2016</span>
				<p>Spark Comshop has added you to class.</p><br>
			</div>
			<a href="people_profile.php" class="view">View</a>
		</div>
	</div>
</body>
</html>