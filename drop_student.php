<?php 
	session_start();
	$_SESSION['page'] = 4;
	require "connect.php";
	$query = "SELECT * FROM class NATURAL JOIN course WHERE class_id = '{$_SESSION['class_id']}'";
	$result = mysqli_query($dbconn, $query);
	$title = mysqli_fetch_assoc($result);
	$class = $title['course_name'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/enroll_student.css">
</head>
<body>
	<?php 
		require "nav.php";

		$error = 2;
		$error1 = "";

		if (isset($_POST['enroll'])) {
			$query = "SELECT * FROM student NATURAL JOIN enroll_class NATURAL JOIN class NATURAL JOIN course WHERE student_id = '{$_POST['student']}'";
			$result = mysqli_query($dbconn, $query);
			$data = mysqli_fetch_assoc($result);
			$name = $data['firstname'];
			$query = "SELECT * FROM student WHERE student_id = '{$_POST['student']}'";
			$result = mysqli_query($dbconn, $query);
			if(mysqli_affected_rows($dbconn)){
				$query = "SELECT * FROM enroll_class WHERE student_id = '{$_POST['student']}' AND class_id = '{$_SESSION['class_id']}'";
				$result = mysqli_query($dbconn, $query);
				if(mysqli_affected_rows($dbconn)){
					$query = "DELETE FROM enroll_class WHERE student_id = '{$_POST['student']}';";
					$result = mysqli_query($dbconn, $query);
					$error = 0;
				} else {
					$error1 = $name." is not in the ".$class.".";
					$error = 1;
				}
			} else{
				$error1 = "Student with ID ".$_POST['student']." doesn't exist.";
				$error = 1;
			}
		}
	?>
	<div class="container" id="classContainer">
		<form class="enroll" method="POST" action="drop_student.php">
			<h1 class="header">DROP FROM <?=$class?></h1>
			<div class="enroll">
				<input type="text" list="students" name="student" placeholder="Enter a student number..." autocomplete autofocus>
					<datalist id="students">
						<?php
							$query = "SELECT student_id FROM student";
							$result = mysqli_query($dbconn, $query);
							$data = [];
							if(mysqli_affected_rows($dbconn)){
								while($row = mysqli_fetch_assoc($result)){
									$data[] = $row;
								}
							}
						?>
						<?php foreach ($data as $value): ?>
							<option value="<?=$value['student_id']?>">
						<?php endforeach ?>			
					</datalist>
				<input type="submit" name="enroll" value="DROP" class="button drop-btn">
			</div>
			<?php if ($error == 0) { ?>
				<span class="success">You have successfully dropped <?=$name?> from <?=$class?>.</span>
			<?php } else if ($error == 1) { ?>
				<span class="error"><?=$error1?></span>
			<?php } ?>
			<a href="class.php?classid=<?=$_SESSION['class_id']?>" class="return button">Back to class</a>
		</form>
	</div>
</body>
</html>