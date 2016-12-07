<?php 
	require "connect.php";
	$query = "DELETE FROM student where student_id = '{$_POST['student_id']}'";
	echo $query;
	mysqli_query($dbconn, $query);
	header("Location: admin_students.php");
 ?>