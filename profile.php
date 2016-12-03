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
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$db = 'up_connect_db';
		$dbconn = mysqli_connect($host,$username,$password,$db) or die("Could not connect to database!");

		$query = "select * from student as S,degree as D where S.student_id = '{$_SESSION['userid']}' and S.degree_id = D.degree_id";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_affected_rows($dbconn)){
			$row = mysqli_fetch_assoc($result);	
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

		<img src="images/pp_cover/<?php echo $_SESSION['userid'] ?>.jpg" class="profilepic">
		<ul class="description">
			<li><p class="user description"><?php 
				echo $row['degree_name'];
				if($row['year_lvl'] == 1){
					echo " I";
				}if($row['year_lvl'] == 2){
					echo " II";
				}if($row['year_lvl'] ==3){
					echo " III";
				}if($row['year_lvl']>=4){
					echo " IV";
				}
			?></p></li>
			<li><p class="user description email">Email: <?php echo $row['email'] ?></p></li>
		</ul>
	</div>
</body>
</html>