<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		if(!isset($_SESSION['userid'])){
           header("Location: index.php");  
		}
	?>

	<div class="topnav">
		<a href="home.php" class="floattran">UP Connect</a>
		<a href="#" class="actpage">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="logout.php" class="floattran">Logout</a>
	</div>
	<div id="container profile">
		<h1 class="name"> <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];	 ?></h1>
		<img src="images/pp_cover/3.jpg" class="profilepic">
		<ul class="description">
			<li><p class="user description">BS in Computer Science III</p></li>
			<li><p class="user description email">Email: cjubs.delgado@gmail.com</p></li>
		</ul>
	</div>
</body>
</html>