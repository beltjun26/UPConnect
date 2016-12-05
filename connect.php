<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'up_connect_db';
	$dbconn = mysqli_connect($host,$username,$password,$db) or die("Could not connect to database!");
?>