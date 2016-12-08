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
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
</head>
<body>
	<?php require "nav.php"; ?>
	<div class="container" id="classContainer">
		<form>
			<input type="text" name="student">
			<input type="submit" name="enroll" value="ENROLL">
		</form>
	</div>
</body>
</html>