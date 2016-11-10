<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
	
	<?php
		if(!isset($_SESSION['userid'])){
           header("Location: index.php");  
		}
	?>

	<div class="topnav">
		<a href="#" class="floattran">UP Connect</a>
		<a href="profile.php" class="floattran">Your Profile</a>
		<a href="#" class="actpage">Home</a>
		<a href="logout.php" class="floattran">Logout</a>
	</div>
	<div class="container">
		<h1 class="greetings">Welcome to<br><span class="webname">UP Connect!</span></h1>
		<p class="instructions">Click on one of your classes below to view class activities.</p>
		<a href="class.html" class="classbtn">CMSC 127</a>
		<a href="class.html" class="classbtn">CMSC 128</a>
		<a href="class.html" class="classbtn">CMSC 141</a>
		<a href="class.html" class="classbtn">STAT 105</a>
		<a href="class.html" class="classbtn">COMM 2</a>
	</div>
</body>
</html>