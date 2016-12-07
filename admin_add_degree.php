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

		if ($_POST['add_degree']) {
			echo "add";
		}
	?>
	<div id="container">
		<header class="table-header">
			<a href="admin_degrees.php" class="current"><h1>Degree</h1></a>
			<form action="admin_degrees.php" class="search" method="POST">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<a class="button add" id="add" href="admin_degrees.php">< Back to table</a>
		</header>
		<h2>Add Degree</h2>
		<p class="instruction">Fill out this form correctly to add.</p>
		<form class="addform">
			<input type="text" name="name" placeholder="Degree Name...">
			<span class="error">Name format is wrong.</span>
			<textarea name="description" placeholder="Description..."></textarea>
			<span class="error">Description too short... Must contain at least 20 characters...</span>
			<input id="add_button" type="submit" name="add_degree" value="Add +">
		</form>
	</div>
</body>
</html>