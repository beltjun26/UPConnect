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

		$error = 2;
		$error1="";
		$error2="";
		$name="";
		$description="";

		if ($_POST['add_degree']) {
			$query = "SELECT * FROM degree WHERE degree_name = '{$_POST['name']}'";
			$result = mysqli_query($dbconn, $query);
			$name = $_POST['name'];
			$description = $_POST['description'];
			if ($name == null) {
				$error1 = "Please enter a Degree name.";
				$error = 1;
			} else if(mysqli_num_rows($result) > 0) {
				$error1 = "Degree name already taken.";
				$error = 1;
			} else{
				$error = 0;
			}
			if (strlen($description)<=20){
				$error2 = "Description too short... Must contain at least 20 characters...";
				$error = 1;
			}

			if ($error == 0) {
				$query = "INSERT INTO degree (degree_name,description) VALUES ('$name','$description');";
				$result = mysqli_query($dbconn, $query);
			}
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
		
		<form action="admin_add_degree.php" class="addform" method="POST">
			<?php if ($error == 0): ?>
				<span class="success" style="display: block;">Added degree program to database.</span>
			<?php endif ?> 
			<input type="text" name="name" placeholder="Degree Name..." value="<?= $name ?>">
			<span class="error" <?php if ($error1 != null): ?>
				style="display: block"
			<?php endif ?> ><?=$error1?></span>
			<textarea name="description" placeholder="Description..." value="<?= $description ?>"></textarea>
			<span class="error" <?php if ($error2 != null): ?>
				style="display: block"
			<?php endif ?> ><?=$error2?></span>
			<input id="add_button" type="submit" name="add_degree" value="Add +">
		</form>
	</div>
</body>
</html>