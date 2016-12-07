<?php 
	$_SESSION['page'] = 6;
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
	?>
	<div id="container">
		<header class="table-header">
			<a href="admin_degrees.php" class="current"><h1>Degree</h1></a>
			<form action="admin_add_degree.php" class="search" method="POST">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<a class="button add" id="add" href="admin_degrees.php">< Back to table</a>
		</header>
		<h2>Add Degree</h2>
		<p class="instruction">Fill out this form correctly to add.</p>
		<form class="addform">
			<input type="text" name="id" placeholder="Student ID... Must be 9 digits. example: 123456789">
			<span class="error">Teacher ID should contain numbers only and 9 digits long.</span>
			<div class="name-inputs">
				<input type="text" name="firstname" placeholder="First Name...">
				<input type="text" name="middname" placeholder="Middle Name...">
				<input type="text" name="lastname" placeholder="Last Name...">
			</div>
			<span class="error">This name has a record already.</span>
			<input type="email" name="email" placeholder="Email...">
			<span class="error">Email format is wrong.</span>
			<input type="text" list="degrees" name="degree" placeholder="Degree... example: Computer Science">
				<datalist id="degrees">
					<option value="Computer Science">
					<option value="Fisheries">
					<option value="Applied Mathematics">
					<option value="Statistics">
					<option value="Chemistry">
				</datalist>
			<span class="error">Degree is not offered.</span>
			<input type="text" name="yearlvl" placeholder="Year Level... example: 1">
			<span class="error">Must be from 1-4 only.</span>
			<input type="password" name="pass" placeholder="Password...">
			<span class="error">Password needs to have at least 8 characters and has at least 1 number.</span>
			<input type="password" name="passret" placeholder="Retype Password...">
			<span class="error">Retyped password did not match.</span>
			<input id="add_button" type="submit" name="add_student" value="Add +">
		</form>
	</div>
</body>
</html>