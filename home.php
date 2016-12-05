<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
</head>
	<?php 
		if($_SESSION['type'] == "student"){
			require "studenthome.php";
		}
		else if ($_SESSION['type'] == "teacher"){
			require "teacherhome.php";
		}
		else if ($_SESSION['type'] == "admin"){
			require "adminhome.php";
		}
	 ?>
</html>