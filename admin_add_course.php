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
	?>
	<div id="container">
		<header class="table-header">
			<a href="admin_students.php" class="current"><h1>Courses</h1></a>
			<form action="admin_students" class="search" method="POST">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<button class="button add" id="add">< Back to table</button>
		</header>
		<h2>Add Course</h2>
		<p class="instruction">Fill out this form correctly to add.</p>
		<form class="addform">
			<div class="group-inputs">
				<input type="text" name="coursename" placeholder="Course name... example: CMSC">
				<input type="text" name="coursenumber" placeholder="Course number... example: 11">
			</div>
			<span class="error">This course has a record already.</span>
			<input type="text" name="title" placeholder="Descriptive title... example: Introduction to programming">
			<span class="error">Descriptive title already taken.</span>
			<textarea name="description" placeholder="Course Description... Minimum of 20 characters..."></textarea>
			<span class="error">Description too short.</span>
			<input id="add_button" type="submit" name="add_student" value="Add +">
		</form>
	</div>
</body>
</html>