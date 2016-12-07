<?php 
	$_SESSION['page'] = 5;
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
			<a href="admin_classes.php" class="current"><h1>Classes</h1></a>
			<form action="admin_classes.php" class="search" method="POST">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<a class="button add" id="add" href="admin_classes.php">< Back to table</a>
		</header>
		<h2>Add Class</h2>
		<p class="instruction">Fill out this form correctly to add.</p>
		<form class="addform">
			<input type="text" list="teachers" name="teacher" placeholder="Choose Teacher...">
				<datalist id="teachers">
					<option value="Spark Comshop">
					<option value="Another Teacher">
				</datalist>
			<span class="error">Teacher is not available.</span>
			<input type="text" name="section" placeholder="Section...">
			<span class="error">Section already exists.</span>
			<input type="text" list="courses" name="course" placeholder="Degree... example: Computer Science">
				<datalist id="courses">
					<option value="CMSC 21">
					<option value="CMSC 142">
					<option value="CMSC 128">
					<option value="CMSC 127">
				</datalist>
			<span class="error">Course is not offered.</span>
			<div class="name-inputs">
				<input type="text" name="yearstart" placeholder="Year Start...">
				<input type="text" name="yearend" placeholder="Year End...">
				<input type="text" list="semesters" name="sem" placeholder="Semester...">
				<datalist id="semesters">
					<option value="1">
					<option value="2">
				</datalist>
			</div>
			<span class="error">Choose between 1 and 2.</span>
			<input id="add_button" type="submit" name="add_class" value="Add +">
		</form>
	</div>
</body>
</html>