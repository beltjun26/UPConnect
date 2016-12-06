<nav id="nav">
	<ul>
		<li><a href="adminhome.php">UP CONNECT</a></li>
		<li><a href="adminhome.php" <?php if ($_SESSION['page'] == 1) { echo "class='active'";} ?>>Home</a></li>
		<li><a href="admin_students.php" <?php if ($_SESSION['page'] == 2) { echo "class='active'";} ?>>Students</a></li>
		<li><a href="admin_teachers.php" <?php if ($_SESSION['page'] == 3) { echo "class='active'";} ?>>Teachers</a></li>
		<li><a href="admin_courses.php" <?php if ($_SESSION['page'] == 4) { echo "class='active'";} ?>>Courses</a></li>
		<li><a href="admin_classes.php" <?php if ($_SESSION['page'] == 5) { echo "class='active'";} ?>>Classes</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</nav>