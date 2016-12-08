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

		if ($_SESSION['type']=='student') {
			$query = "SELECT * from enroll_class as S, class as C, course as E where S.student_id like '{$_SESSION['userid']}' and S.class_id = C.class_id and E.course_id = C.course_id";
		}

		if ($_SESSION['type']=='teacher') {
			$query = "SELECT * FROM class NATURAL JOIN course WHERE teacher_id='{$_SESSION['userid']}'";
		}

		$result = mysqli_query($dbconn, $query);
		$data = [];
		if(mysqli_affected_rows($dbconn)){
			while($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
		}
	?>

	<?php require "nav.php"; ?>
	<div class="container">
		<h1 class="greetings">Welcome to<br><span class="webname">UP Connect!</span></h1>
		<?php if (count($data) > 0) { ?>
			<p class="instructions">Click on one of your classes below to view class activities.</p>
		<?php } else { ?>
			<p class="instructions">You are not in any classes. Please ask you teacher to add you in their class.</p>
		<?php } ?>
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