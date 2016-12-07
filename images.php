<?php session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/class.css">
	<link rel="stylesheet" type="text/css" href="css/images.css">
	<link rel="stylesheet" type="text/css" href="css/search.css">
</head>
<body>
	<?php 
		if($_SESSION['userid']==null){
			header("Location: index.php");
		}
		require "connect.php";
		$query = "select * from teacher natural join course natural join class natural join semester where class_id = {$_GET['classid']}";
		$result = mysqli_query($dbconn, $query);
		if(mysqli_affected_rows($dbconn)){
			$row = mysqli_fetch_assoc($result);
		}
	 ?>
	<nav id="nav">
		<a href="home.php" class="floattran">UP Connect</a>
		<a href="myprofile.php" class="floattran">Your Profile</a>
		<a href="home.php" class="floattran">Home</a>
		<a href="#" class="floattran">Notifications</a>	
		<a href="#" class="floattran active">Classes</a>	
		<a href="logout.php" class="floattran">Logout</a>
	</nav>
	<div id="classContainer">
	<header class="class">
		<h1 class="classtitle"><?php echo $row['course_name'] ?></h1>
		<ul class="class description">
			<li><p class="description"><?php echo $row['firstname']." ".$row['middlename']." ".$row['lastname']; ?></p></li>
			<li><p class="description">S.Y. <?php echo $row['school_year'] ?></p></li>
			<li><p class="description"><?php 
				if($row['sem_no']==1){
					echo "1st";
				}
				if($row['sem_no']==2){
					echo "2nd";
				}
			 ?> Semester</p></li>
			<li><p class="description">Section <?php echo $row['section'] ?></p></li>	
		</ul>
	</header>
	<ul class="grouplinks">
		<li><a href="class.php?classid=<?=$_GET['classid']?>" class="floattran">Discussion</a></li>
		<li><a href="members.php?classid=<?=$_GET['classid']?>" class="floattran">Members</a></li>
		<li><a href="files.php?classid=<?=$_GET['classid']?>" class="floattran">Files</a></li>
		<li><a href="#" class="floattran active">Images</a></li>
	</ul>
	<div class="container">
		<h1>IMAGES</h1>
		<h2>CMSC 128</h2>
		<p class="instructions" style="margin: 10px 20px;">Click on one of the images to download.</p>
		<!-- <form class="searchthroughlist">
			<input type="text" name="keyword" placeholder="Search...">
			<input type="submit" name="submit" value="SEARCH">
		</form> -->
		<ul class="imagelist">
		<?php 
			//Query for the post
			$class_id = $_GET['classid'];
			$query = "select * from post where class_id = '$class_id' and file_id = 1 order by time_stamp desc;";

			$post_row = mysqli_query($dbconn, $query);

				foreach ($post_row as $value): 
					$dir = "saved_images/".$value['post_id'];
					$file_array = scandir($dir);
		?>
				<li>
					<a href="download.php?post=<?=$value['post_id']?>&file=<?=$value['file_id']?>" target="_blank">
						<img src="saved_images/<?=$value['post_id'].'/'.$file_array[2];?>">
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
	</div>

	<script>
		h = $('#nav').outerHeight(true);
		console.log(h);
		x = window.innerHeight;
		console.log(x);
		x = x - h;
		console.log(x);
		document.getElementById('classContainer').setAttribute("style","height: "+x+"px;width:100%;margin-top:"+h+"px;");
	</script>
</body>
</html>