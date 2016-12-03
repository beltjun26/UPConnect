<!-- session variables:
		userid 	
		firstname
		middlename
		lastname
		type "student"/ "teacher"
 -->

<?php 
			session_start();

			if(isset($_SESSION['userid'])){
    			header("Location: home.php"); 
 			}


			$host = 'localhost';
			$username = 'root';
			$password = '';
			$db = 'up_connect_db';
			$dbconn = mysqli_connect($host,$username,$password,$db) or die("Could not connect to database!");

			$errortype = "no_error";
			
			if (isset($_POST['login'])){
		     	$userid = $_POST['userid'];
		     	$pword = $_POST['password'];

		     	if($userid == "" && $pword == ""){
		     		$errortype = "no_uid_pword";
		     	}
		     	elseif($userid == ""){
		     		$errortype = "no_uid";
		     	}
		     	elseif($pword == ""){
		     		$errortype = "no_pword";
		     	}
		     	else{
		     		$md5pass = md5($pword);
		     		//if a student
		     		if(strlen($userid) == 9){
		     			$query = "SELECT * FROM student WHERE student_id = '$userid' and password = '$md5pass';";
		     			$type = "student";
		     		}
		     		elseif(strlen($userid) == 5){
		     			$query = "SELECT * FROM teacher WHERE teacher_id = '$userid' and password = '$md5pass';";
		     			$type = "teacher";
		     		}
		     		else{
		     			$errortype = "error_login";
		     		}



		     		if($errortype != "error_login"){
		     			$result = mysqli_query($dbconn, $query);
		     			$row = mysqli_fetch_assoc($result);
						if(mysqli_num_rows($result) == 1){
							$_SESSION['userid'] = $userid;
							$_SESSION['type'] = $type;
							$_SESSION['firstname'] = $row['firstname'];
							$_SESSION['middlename'] = $row['middlename'];
							$_SESSION['lastname'] = $row['lastname'];

						 	header("Location: home.php");
						}
						else{
							$errortype = "error_login";
						}


		     		}
		     	}
			}
		  	
		  	mysqli_close($dbconn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="container">
		<h1>UP CONNECT!</h1>

		<?php if($errortype == "no_error"): ?>
			<p class="instructions">Log in to continue.</p>
		
		<?php elseif($errortype == "no_uid_pword"): ?>
			<p class="instructions warn">Please enter both fields.</p>
		
		<?php elseif($errortype == "no_uid"): ?>
			<p class="instructions warn">Please enter your user ID.</p>

		<?php elseif($errortype == "no_pword"): ?>
			<p class="instructions warn">Please enter your password.</p>
		
		<?php elseif($errortype == "error_login"): ?>
			<p class="instructions invalid">Invalid username or password.</p>
		<?php endif; ?>


		<form method="post">
			<label for="userid">User ID:</label>
			<input type="text" name="userid" class="text">
			<label for="password">Password:</label>
			<input type="password" name="password" class="text">
			<input type="submit" name="login" value="Login">
		</form>
		<!-- <a href="signup.html">Create account</a> -->
	</div>
</body>
</html>