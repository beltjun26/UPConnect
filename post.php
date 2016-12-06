<?php
	session_start(); 
	require "connect.php";
	$caption = $_POST['caption'];
	$userID = $_SESSION['userid'];
	$class_id = $_SESSION['class_id'];


	$query = "INSERT INTO `post` (`post_id`, `class_id`, `user_id`, `time_stamp`, `text`, `file_id`) VALUES (NULL, '$class_id', '$userID', CURRENT_TIMESTAMP, '$caption', '0');";

	mysqli_query($dbconn, $query);

 	header("Location: class.php?classid=".$class_id);
 ?>