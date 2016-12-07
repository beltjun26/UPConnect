<?php 
	require "connect.php";
	require "admin_nav.php";
	$query = "DELETE FROM student where student_id = {$_POST['student_id']}";
	mysqli_query($dbconn, $query);
	header("Location: admin_students.php")
 ?>