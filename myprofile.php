<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
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
		require "connect.php";
		
		$query = "select * from student natural join degree where student_id = '{$_SESSION['userid']}'";
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
		<button class="change" id="EditPicBtn">Change</button>
		<img src="images/profile_images/<?=$_SESSION['userid']?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'" class="profilepic">
		<div id="EditProfilePicture" class="modal edit_profile">
		  	<div class="modal-content">
		    	<div class="modal-header">
					<h2>Edit Profile Picture</h2>
		      		<span class="close">×</span>
		    	</div>
			    <div class="modal-body">
		      		<img id="output_profile" src="images/profile_images/<?=$_SESSION['userid'] ?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
			      	<form method="post" action="upload.php" enctype="multipart/form-data">
				      	<input type="file" name="profile" id="profile" class="inputfile" onchange="loadFile(event)">
				      	<label for="profile">Choose Profile Picture<span class="glyphicon glyphicon-download-alt"></span></label>
				      	<input type="submit" name="change_profilepic" value="CHANGE">
			      	</form>
			    </div>
		  	</div>
		</div>
		<div id="EditEmail" class="modal edit_profile">
		  	<div class="modal-content">
		    	<div class="modal-header">
					<h2>Change Your Email</h2>
		      		<span class="close">×</span>
		    	</div>
			    <div class="modal-body">
			      	<form method="post" action="">
				      	<input type="email" name="email" placeholder="sample.example@sample.com">
				      	<input type="submit" name="change_email" value="CHANGE">
			      	</form>
			    </div>
		  	</div>
		</div>
		<div id="EditPass" class="modal edit_profile">
		  	<div class="modal-content">
		    	<div class="modal-header">
					<h2>Change Your Password</h2>
		      		<span class="close">×</span>
		    	</div>
			    <div class="modal-body">
			      	<form method="post" action="">
				      	<input type="password" name="oldpass" placeholder="Old password...">
				      	<input type="password" name="newpass" placeholder="New password...">
				      	<input type="password" name="retpass" placeholder="Retype password...">
				      	<input type="submit" name="change_password" value="CHANGE">
			      	</form>
			    </div>
		  	</div>
		</div>
		<ul class="description">
			<li><h1 class="name"> <?php echo $_SESSION['firstname']." ".$_SESSION['lastname'];	 ?></h1></li>
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
			<li><button id="EditEmailBtn">Change Email</button></li>
			<li><button id="EditPassBtn">Change Password</button></li>
		</ul>
	</div>

	<script>
		var Editpic = document.getElementById("EditProfilePicture");
		var Editemail = document.getElementById("EditEmail");
		var Editpass = document.getElementById("EditPass");
		var btnpic = document.getElementById("EditPicBtn");
		var btnemail = document.getElementById("EditEmailBtn");
		var btnpass = document.getElementById("EditPassBtn");
		var closepic = document.getElementsByClassName("close")[0];
		var closeemail = document.getElementsByClassName("close")[1];
		var closepass = document.getElementsByClassName("close")[2];

		btnpic.onclick = function() {
			Editpic.style.display = "flex";
		}

		btnemail.onclick = function() {
			Editemail.style.display = "flex";
		}

		btnpass.onclick = function() {
			Editpass.style.display = "flex";
		}

		closepic.onclick = function() {
			Editpic.style.display = "none";
		}

		closeemail.onclick = function() {
			Editemail.style.display = "none";
		}

		closepass.onclick = function() {
			Editpass.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == Editpic){
				Editpic.style.display = "none";
			} else if (event.target == Editemail){
				Editemail.style.display = "none";
			} else if (event.target == Editpass){
				Editpass.style.display = "none";
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