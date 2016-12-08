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
			<button type="button" class="close">&times;</button>
			<div class="content">
				<span class="username">Xon_123</span>
				<span class="time-stamp">4:00AM November 14, 2016</span>
				<p>Xon_123 started following you.</p><br>
			</div>
			<a href="people_profile.php" class="view">View</a>
		</div>
		<div class="notif-container">
			<img class="user-photo" src="images/pp_cover/Clyde1.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
			<button type="button" class="close">&times;</button>
			<div class="content">
				<span class="username">Xon_123</span>
				<span class="time-stamp">4:00AM November 14, 2016</span>
				<p>Xon_123 started following you.</p><br>
			</div>
			<a href="people_profile.php" class="view">View</a>
		</div>
		<div class="notif-container">
			<img class="user-photo" src="images/pp_cover/Clyde1.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
			<button type="button" class="close">&times;</button>
			<div class="content">
				<span class="username">Xon_123</span>
				<span class="time-stamp">4:00AM November 14, 2016</span>
				<p>Xon_123 started following you.</p><br>
			</div>
			<a href="people_profile.php" class="view">View</a>
		</div>
		
	</div>
</body>
</html>