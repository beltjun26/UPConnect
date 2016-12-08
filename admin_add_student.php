<?php 
	$_SESSION['page'] = 2;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/admin/general.css">
	<link rel="stylesheet" type="text/css" href="css/admin/navigation.css">
	<link rel="stylesheet" type="text/css" href="css/admin/search.css">
	<link rel="stylesheet" type="text/css" href="css/admin/table.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/admin/modal_add.css"> -->
	<link rel="stylesheet" type="text/css" href="css/admin/form.css">
</head>
<body>
	<?php 
		require "connect.php";
		require "admin_nav.php";
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		$error = 0;
		$error1="";
		$error2="";
		$error3="";
		$error4="";
		$error5="";
		$error6="";
		$error7="";
		if($_POST['add_student']){
			if(strlen($_POST['id'])!=9||!is_numeric($_POST['id'])){
				$error1 = "<span class=\"error\">Student ID should contain numbers only and 9 digits long.</span>";
			}
			$query = "Select * from student where firstname = {$_POST['firstname']} and middlename={$_POST['middlename']} and lastname={$_POST['lastname']}";
			$result = mysqli_query($dbconn, $query);
			if(mysqli_affected_rows($dbconn)){
				$error2= "<span class=\"error\">This name has a record already.</span>";
			}
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  	$error3 = "<span class=\"error\">Email format is wrong.</span>";
			}
			if(!$error){
				$query = "SELECT * from degree where degree_name like '%{$_POST['degree']}%'";
				$result = mysqli_query($dbconn, $query);
				$data = mysqli_fetch_assoc($result);
				$query = "INSERT into student(student_id, firstname, middlename, lastname, email, year_lvl, degree_id, password) values('{$_POST['id']}','{$_POST['firstname']}','{$_POST['middlename']}','{$_POST['lastname']}','{$_POST['email']}','{$_POST['yearlvl']}','{$data['degree_id']}',MD5('{$_POST['pass']}'))";
				$result = mysqli_query($dbconn, $query);
				header("Location: admin_students.php");
			}

		}

	?>
	<div id="container">
		<header class="table-header">
			<a href="admin_students.php" class="current"><h1>Students</h1></a>
			<form action="admin_students.php" class="search" method="POST">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<a class="button add" id="add" href="admin_students.php">< Back to table</a>
		</header>
		<h2>Add Student</h2>
		<p class="instruction">Fill out this form correctly to add.</p>
		<form class="addform" method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
			<input type="text" name="id" placeholder="Student ID... Must be 9 digits. example: 123456789" required>
			<?=$error1?>
			<div class="name-inputs">
				<input type="text" name="firstname" placeholder="First Name..." required>
				<input type="text" name="middlename" placeholder="Middle Name..." required>
				<input type="text" name="lastname" placeholder="Last Name..." required>
			</div>
			
			<?=$error2?>
			<input type="email" name="email" placeholder="Email...">
			
			<?=$error3?>
			<input type="text" list="degrees" name="degree" placeholder="Degree... example: Computer Science">
				<datalist id="degrees">
					<option value="Computer Science">
					<option value="Fisheries">
					<option value="Applied Mathematics">
					<option value="Statistics">
					<option value="Chemistry">
				</datalist>
			<!-- <span class="error">Degree is not offered.</span> -->
			<?=$error4?>
			<input type="text" name="yearlvl" placeholder="Year Level... example: 1">
			<!-- <span class="error">Must be from 1-4 only.</span> -->
			<?=$error5?>
			<input type="password" name="pass" placeholder="Password...">
			<!-- <span class="error">Password needs to have at least 8 characters and has at least 1 number.</span> -->
			<?=$error6?>
			<input type="password" name="passret" placeholder="Retype Password...">
			<!-- <span class="error">Retyped password did not match.</span> -->
			<?=$error7?>
			<input id="add_button" type="submit" name="add_student" value="Add +">
			<?=$query?>
		</form>
	</div>
</body>
</html>