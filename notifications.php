<?php
	session_start();
	$_SESSION['page'] = 3; //What is session page 3?
?>

<!DOCTYPE html>
<html>
<head>
	<title>UP connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/notifications.css">
</head>
<body>
	<?php require "nav.php"; ?>
	<div class="container" id="notif-container">
		<?php 
			require "connect.php";
			$user_id = $_SESSION['userid'];


			$query = "SELECT * FROM `notifications` 
					  NATURAL JOIN notified
					  WHERE user_id_notified = '$user_id' 
					  ORDER BY time_stamp_notif DESC;";
		 	
		 	$result = mysqli_query($dbconn, $query);
		 ?>




		<?php foreach ($result as $value): ?>
			<div class="notif-container">
				<?php 
					$poster_id = $value['user_id_posted'];
					if(strlen($poster_id) == 9){
						$query = "SELECT * FROM student WHERE student_id = '$poster_id';";
					}elseif(strlen($poster_id) == 5){
						$query = "SELECT * FROM teacher WHERE teacher_id = '$poster_id';";
					}
		 	
		 			$other_result = mysqli_query($dbconn, $query);

		 			$row = mysqli_fetch_row($other_result);

				 ?>
				<img class="user-photo" src="images/profile_images/<?php 
					if(strlen($poster_id) == 9){
						echo $row[0];

					}elseif(strlen($poster_id) == 5){
						echo $row[0];
					} ?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
				<a href="delete_notif.php?notif_id=<?php echo $value['notif_id'] ?>" class="close">&times;</a>
				<div class="content">
					<span class="username"><?php echo $row[1]." ".$row[3] ?></span>
					<span class="time-stamp"><?php echo date("F j, y, g:i a", strtotime($value['time_stamp_notif']));  ?></span>

				<?php 
					$post_id = $value['post_id'];
					$query = "SELECT * FROM class NATURAL JOIN course WHERE class_id in (SELECT class_id FROM post WHERE post_id = '$post_id')";

					$other_result1 = mysqli_query($dbconn, $query);

		 			$row1 = mysqli_fetch_row($other_result1);

				 ?>




				<?php if($value['notif_type'] == 1): ?>
					<p>has posted in <?php echo $row1[5]; ?>.</p><br>
				<?php elseif ($value['notif_type'] == 2): ?>
					<p>has commented in a post in <?php echo $row1['course_name']; ?>.</p><br>

				<?php endif; ?>
				</div>
				<a href="view_post.php?post_id=<?php echo $value['post_id'] ?>" class="view">View</a>
			</div>
		<?php endforeach; ?>
	</div>
</body>
</html>