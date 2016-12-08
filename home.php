<?php
	session_start();
	$_SESSION['page'] = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
</head>
	<?php 
		if($_SESSION['type'] != "admin"){
			require "userhome.php";
		} else {
			require "adminhome.php";
		}
	 ?>
</html>