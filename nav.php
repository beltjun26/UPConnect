<nav id="nav">
	<a href="home.php" class="floattran">UP Connect</a>
	<a href="myprofile.php" class="floattran <?php if ($_SESSION['page'] == 2) { echo "actpage";} ?>">Your Profile</a>
	<a href="home.php" class="floattran <?php if ($_SESSION['page'] == 1) { echo "actpage";} ?>">Home</a>
	<a href="notifications.php" class="floattran <?php if ($_SESSION['page'] == 3) { echo "actpage";} ?>">Notifications</a>	
	<a href="classes.php" class="floattran <?php if ($_SESSION['page'] == 4) { echo "actpage";} ?>">Classes</a>	
	<a href="logout.php" class="floattran">Logout</a>
</nav>