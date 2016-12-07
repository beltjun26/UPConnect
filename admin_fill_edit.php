<?php 
	require "connect.php";
	$query = "SELECT * from student natural join degree where student_id = '{$_POST['student_id']}'";
	$result = mysqli_query($dbconn, $query);
	$data = mysqli_fetch_assoc($result);
	echo json_encode($data);
 ?>