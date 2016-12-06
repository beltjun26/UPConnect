<?php 
	$_SESSION['page'] = 1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/admin/navigation.css">
	<link rel="stylesheet" type="text/css" href="css/admin/home.css">
	<link rel="stylesheet" type="text/css" href="css/admin/general.css">	
</head>
<body>
	<?php require "admin_nav.php" ?>
	<div id="container">
		<h1>Welcome Admin</h1>
		<p class="instruction">Choose one of these options below to get started.</p>
		<ul class="work">
			<li><a href="admin_students.php"><span></span>Students</a></li>
			<li><a href="admin_teachers.php">Teachers</a></li>
			<li><a href="admin_courses.php">Courses</a></li>
			<li><a href="admin_classes.php">Classes</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<script>
		nav = $('#nav').outerHeight(true);
		console.log(nav);
		container = window.innerHeight;
		console.log(container);
		container = container - nav;
		console.log(container);
		document.getElementById('container').setAttribute("style","height: "+container+"px; width:100% ;margin-top:"+nav+"px;");
	</script>
</body>
</html>