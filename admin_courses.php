<?php 
	$_SESSION['page'] = 4;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/admin/general.css">
	<link rel="stylesheet" type="text/css" href="css/admin/navigation.css">
	<link rel="stylesheet" type="text/css" href="css/admin/search.css">
	<link rel="stylesheet" type="text/css" href="css/admin/table.css">
</head>
<body>
	<?php require "connect.php" ?>
	<?php require "admin_nav.php" ?>
	<div id="container">
		<header class="table-header">
			<h1>Courses</h1>
			<form class="search">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<button class="button add">Add Course +</button>
		</header>
		<table>
		  <tr>
		    <th>No.</th>
		    <th>Course ID</th> 
		    <th>Name</th>
		 	<th>Description</th>
		    <th>Title</th>
		    <th colspan="2">Actions</th>
		  </tr>
		  <?php
				$query = "SELECT * FROM course";
				$result = mysqli_query($dbconn, $query);
				$data = [];
				if(mysqli_affected_rows($dbconn)){
					while($row = mysqli_fetch_assoc($result)){
					$data[] = $row;
					}
				}
				/*$numberofrecords = count($data);*/
				/*echo $numberofrecords;*/
				$number = 1;
				foreach ($data as $value): ?>
				<tr>
					<td><?=$number;?></td>
					<td><?=$value['course_id']?></td>
					<td><?=$value['course_name']?></td> 
					<td class="description"><?=$value['course_description']?></td>
					<td><?=$value['descriptive_title']?></td>
					<td><button class="button table edit" id="edit<?=$number?>" onclick="showeditmodal(<?=$number?>)">Edit</button></td>
					<td><button class="button table delete" id="delete<?=$number?>" onclick="showdeletemodal(<?=$number?>)">Delete</button></td>
				</tr>
				<?php 
					$number++;
					endforeach;
				?>
		</table>
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