<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/admin/admin.css">
</head>
<body id="body">
	<nav>
		<ul>
			<li><a href="#">Something</a></li>
		</ul>
	</nav>
	<ul class="work">
		<li><a href="admin_students.php">Students</a></li>
		<li><a href="admin_teachers.php">Teachers</a></li>
		<li><a href="admin_courses.php">Courses</a></li>
		<li><a href="admin_classes.php">Classes</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<script>
		nav = $('#navBar').outerHeight(true);
		console.log(nav);
		body = window.innerHeight;
		console.log(b);
		body = body - nav;
		console.log(body);
		document.getElementById('map').setAttribute("style","height: "+body+"px;width:100%;margin-top:"+nav+"px;");
	</script>
</body>
</html>