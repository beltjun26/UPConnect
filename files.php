<?php session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/member.css"> -->
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
	<link rel="stylesheet" type="text/css" href="css/class.css">
	<link rel="stylesheet" type="text/css" href="css/files.css">
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
	
	
	<?php require "nav.php"; ?>

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
		<li><a href="#" class="floattran active">Files</a></li>
		<li><a href="images.php?classid=<?=$_GET['classid']?>" class="floattran">Images</a></li>
	</ul>
	<div class="container">
		<h1>FILES</h1>
		<h2><?php echo $row['course_name'] ?></h2>
		<p class="instructions" style="margin: 0 20px;">Click on one of the files to download.</p>
		<form class="searchthroughlist">
			<input type="text" name="keyword" placeholder="Search..." id = "myInput" onkeyup="myFunction()">
			<input type="text" name="classid" value="<?=$_GET['classid']?>" style="display: none;">

			<input type="submit" name="submit" value="SEARCH">
		</form>
		<ul class="fileslist" id = "myUL">
		<?php 
		//Query for the post
		$class_id = $_GET['classid'];
		if(isset($_GET['keyword'])){
			$query = "select * from post where class_id = '$class_id' and file_id = 2 order by time_stamp desc;";
		}else{
			$query = "select * from post where class_id = '$class_id' and file_id = 2 order by time_stamp desc;";
		}

		$post_row = mysqli_query($dbconn, $query);

		foreach ($post_row as $value):
			$dir = "saved_files/".$value['post_id'];
			$file_array = scandir($dir);
			?>
			<a href="download.php?post=<?=$value['post_id']?>&file=<?=$value['file_id']?>" target="_blank" class = "hoveranim download-btn">
				<li>
					<img src="images/file.png">
					<span class="file-name"><?=$file_array[2];?></span>
				</li>
			</a>
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
	<script>
		function myFunction() {
		    // Declare variables
		    var input, filter, ul, li, a, i;
		    input = document.getElementById('myInput');
		    filter = input.value.toUpperCase();
		    ul = document.getElementById("myUL");
		    li = ul.getElementsByTagName('li');

		    // Loop through all list items, and hide those who don't match the search query
		    for (i = 0; i < li.length; i++) {
		        a = li[i].getElementsByTagName("span")[0];
		        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
		            li[i].style.display = "";
		        } else {
		            li[i].style.display = "none";
		        }
		    }
		}
	</script>
</body>
</html>