<?php 
	session_start();

	$notif_id = $_GET['notif_id'];
	$user_id = $_SESSION['userid'];
	require "connect.php";

	$query = "DELETE FROM `notified` WHERE notif_id = '$notif_id' AND user_id_notified = '$user_id';";
	mysqli_query($dbconn, $query);

	header("Location: notifications.php");


 ?>
