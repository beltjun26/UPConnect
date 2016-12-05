<body>
	<?php
		if(!isset($_SESSION['userid'])){
           header("Location: index.php");  
		}
		$host = 'localhost';
		$username = 'root';
		$password = '';
		$db = 'up_connect_db';
		$dbconn = mysqli_connect($host,$username,$password,$db) or die("Could not connect to database!");
		$query = "select * from subject as S, class as C, course as E where S.student_id like '{$_SESSION['userid']}' and S.class_id = C.class_id and E.course_id = C.course_id";
		$result = mysqli_query($dbconn, $query);
		$data = [];
		if(mysqli_affected_rows($dbconn)){
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
		}
	?>

	<nav id="navigation">
		<a href="#" class="floattran">UP Connect</a>
		<a href="profile.php" class="floattran">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="#" class="floattran">Notifications</a>	
		<a href="#" class="floattran">Classes</a>	
		<a href="logout.php" class="floattran">Logout</a>
	</nav>
	<div class="container">
		<h1 class="greetings">Welcome to<br><span class="webname">UP Connect!</span></h1>
		<p class="instructions">Click on one of your classes below to view class activities.</p>
		<?php foreach ($data as $value): ?>
			<a href="class.php?classid=<?php echo $value['class_id'] ?>" class="classbtn"><?php echo $value['course_name'] ?></a>	
		<?php endforeach ?>
	
	</div>
	<script>
		h = $('#navBar').outerHeight(true);
		console.log(h);
		x = window.innerHeight;
		console.log(x);
		x = x - h;
		console.log(x);
		document.getElementById('map').setAttribute("style","height: "+x+"px;width:100%;margin-top:"+h+"px;");
	</script>
</body>