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
	<link rel="stylesheet" type="text/css" href="css/admin/modal_add.css">
</head>
<body>
	<?php 
		require "connect.php";
		require "admin_nav.php"; 
	?>
	<div id="container">
		<header class="table-header">
			<a href="admin_courses.php" class="current"><h1>Courses</h1></a>
			<form action="admin_courses.php" class="search" method="POST">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<a class="button add" href="admin_add_course.php">Add Course +</a>
		</header>
		<?php
			if (isset($_POST['search'])) {
				$keyword = $_POST['keyword'];
				$query = "SELECT * FROM course 
						  WHERE course_id 
						  LIKE '%$keyword%'
						  OR course_name
						  LIKE '%$keyword%'
						  OR descriptive_title
						  LIKE '%$keyword%'";
			} else{
				$query = "SELECT * FROM course";
			}
				$result = mysqli_query($dbconn, $query);
				$data = [];
				if(mysqli_affected_rows($dbconn)){
					while($row = mysqli_fetch_assoc($result)){
					$data[] = $row;
					}
				}
			if(count($data)>0){ ?>
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
					$number = 1;
					foreach ($data as $value): ?>
					<tr>
						<td class="center"><?=$number;?></td>
						<td class="center"><?=$value['course_id']?></td>
						<td><?=$value['course_name']?></td> 
						<td class="description"><?=$value['course_description']?></td>
						<td><?=$value['descriptive_title']?></td>
						<td class="button-container"><button class="button table edit" id="edit<?=$number?>" onclick="showeditmodal(<?=$number?>)">Edit</button></td>
						<td class="button-container"><button class="button table delete" id="delete<?=$number?>" onclick="showdeletemodal(<?=$number?>)">Delete</button></td>
					</tr>
				<?php 
				$number++;
				endforeach;
				?>
				</table>
				<?php } else { ?>
					<h2 class="no-results">NO RESULTS</h2> <?php
				} ?>
			<?php 
				$numberofrecords = count($data);
				while ($numberofrecords > 0) {
			?><div id="edit-panel<?=$numberofrecords?>" class="modal">
				<div class="modal-content">
					<div class="modal-header">
					    <span id="cancel-edit<?=$numberofrecords?>" class="close">×</span>
					    <h2>Edit Student</h2>
					</div>
					<div class="modal-body">
						<p class="instruction">Fill out this form correctly to edit.</p>
						<form class="editform">
							<input type="text" name="id" placeholder="Student ID...">
							<input type="text" name="firstname" placeholder="First Name...">
							<input type="text" name="middname" placeholder="Middle Name...">
							<input type="text" name="lastname" placeholder="Last Name...">
							<input type="email" name="email" placeholder="Email...">
							<input type="text" list="degrees" name="degree" placeholder="Degree...">
								<datalist id="degrees">
									<option value="Computer Science">
									<option value="Fisheries">
									<option value="Applied Mathematics">
									<option value="Statistics">
									<option value="Chemistry">
								</datalist>
							<input type="text" name="yearlvl" placeholder="Year Level...">
							<input type="submit" name="edit_student" value="Edit +">
						</form>
					</div>
				</div>
			</div>
		<div id="delete-panel<?=$numberofrecords?>" class="modal delete-panel">
			<div class="modal-content">
				<div class="modal-header">
				    <span id="cancel-delete<?=$numberofrecords?>" class="close">×</span>
				    <h2>Delete Student?</h2>
				</div>
				<div class="modal-body">
					<p class="instruction">Choose one of the two.</p>
					<form class="deleteform">
						<button id="cancel-delete-button">Cancel</button>
						<input id="delete_button" type="submit" name="delete_student" value="Delete">
					</form>
				</div>
			</div>
		</div>
		<?php $numberofrecords--; } ?>
		<!-- <table>
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
		</table> -->
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