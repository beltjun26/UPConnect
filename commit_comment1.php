<?php 
	session_start();
	require "connect.php";

	$query = "INSERT into comment(content, user_id, post_id) values('{$_POST['content']}', '{$_SESSION['userid']}', {$_POST['id']})";
	$result = mysqli_query($dbconn, $query);
	header("Location: view_post.php?post_id=".$_POST['post_id']);
 ?>