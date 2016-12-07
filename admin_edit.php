<?php 
	require "connect.php";
	$query = "SELECT * from degree where degree_id = '{$_POST['degree_id']}'";
	$query = "UPDATE student set student_id = '{$_POST['student_id']}', firstname ='{$_POST['firstname']}', middlename = '{$_POST['middlename']}', lastname = '{$_POST['lastname']}', email = '{$_POST['email']}', year_lvl = '{$_POST['yearlvl']}',";
	$result = mysqli_query($dbconn, $query);
	$data = mysqli_fetch_assoc($result);
	echo json_encode($data);
 ?>