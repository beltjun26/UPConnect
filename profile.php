<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" type="text/css" href="css/modal.css">
	<link rel="stylesheet" type="text/css" href="css/edit_profile_style.css">
	<link rel="stylesheet" type="text/css" href="css/file.css">
</head>
<body>
	<?php
		if(!isset($_SESSION['userid'])){
           header("Location: index.php");  
		}

		if($_SESSION['userid']==$_GET['student_id']){
			header("Location: myprofile.php");
		}
		require "connect.php";
		
		$query = "select * from student natural join degree where student_id ={$_GET['student_id']}";
		$result = mysqli_query($dbconn, $query);

		if(mysqli_affected_rows($dbconn)){
			$row = mysqli_fetch_assoc($result);	
		}
?>

	<nav id="nav">
		<a href="home.php" class="floattran">UP Connect</a>
		<a href="#" class="actpage">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="#" class="floattran">Notifications</a>	
		<a href="#" class="floattran">Classes</a>		
		<a href="logout.php" class="floattran">Logout</a>
	</nav>
	<div class="container" id="profilecontainer">
		
		<img src="images/profile_images/<?=$row['student_id']?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'" class="profilepic">
		<ul class="description">
			<li><h1 class="name"> <?php echo $row['firstname']." ".$row['lastname'];	 ?></h1></li>
			<li>
				<p class="user"><?php 
					echo $row['degree_name'];
					if($row['year_lvl'] == 1){
						echo " I";
					} else if($row['year_lvl'] == 2){
						echo " II";
					} else if($row['year_lvl'] == 3){
						echo " III";
					} else if($row['year_lvl'] >= 4){
						echo " IV";
					}?>
				</p>
			</li>
			<li><p class="email">Email: <?php echo $row['email'] ?></p></li>
		</ul>
	</div>

	<script>
		var Editpic = document.getElementById("EditProfilePicture");
		var Editemail = document.getElementById("EditEmail");
		var btnpic = document.getElementById("EditPicBtn");
		var btnemail = document.getElementById("EditEmailBtn");
		var closepic = document.getElementsByClassName("close")[0];
		var closeemail = document.getElementsByClassName("close")[1];

		btnpic.onclick = function() {
			Editpic.style.display = "flex";
		}

		btnemail.onclick = function() {
			Editemail.style.display = "flex";
		}

		closepic.onclick = function() {
			Editpic.style.display = "none";
		}

		closeemail.onclick = function() {
			Editemail.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == Editpic){
				Editpic.style.display = "none";
			} else if (event.target == Editemail){
				Editemail.style.display = "none";
			}
		}
	</script>

	<script>
		var loadFile = function(event){
			var output_profile = document.getElementById('output_profile');
			output_profile.src = URL.createObjectURL(event.target.files[0]);
		};
	</script>
	
</body>

</html>