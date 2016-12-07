<?php 
	$_SESSION['page'] = 5;
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
			<a href="admin_classes.php" class="current"><h1>Classes</h1></a>
			<form action="admin_classes.php" class="search" method="POST">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<a class="button add" href="admin_add_class.php">Add Class +</a>
		</header>
		<div id="add-panel" class="modal">
			<div class="modal-content">
				<div class="modal-header">
				    <span id="cancel-add" class="close">×</span>
				    <h2>Add Student</h2>
				</div>
				<div class="modal-body">
					<p class="instruction">Fill out this form correctly to add.</p>
					<form id="addform">
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
						<input type="password" name="pass" placeholder="Password...">
						<input type="password" name="passret" placeholder="Retype Password...">
						<input id="add_button" type="submit" name="add_student" value="Add +">
					</form>
				</div>
			</div>
		</div>
		<?php
			if (isset($_POST['search'])) {
				$keyword = $_POST['keyword'];
				$query = "SELECT * FROM class 
						  NATURAL JOIN teacher 
						  NATURAL JOIN course 
						  NATURAL JOIN semester
						  WHERE class_id 
						  LIKE '%$keyword%'
						  OR course_name
						  LIKE '%$keyword%'
						  OR school_year
						  LIKE '%$keyword%'";
			} else{
				$query = "SELECT * FROM class NATURAL JOIN teacher NATURAL JOIN course NATURAL JOIN semester";
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
					    <th>Class ID</th> 
					    <th>Teacher</th>
					    <th>Section</th>
					    <th>Course</th>
					    <th>S.Y. Semester</th>
					    <th colspan="4">Actions</th>
				  	</tr>
				<?php  
					$number = 1;
					foreach ($data as $value): ?>
					<tr>
						<td class="center"><?=$number;?></td>
						<td class="center"><?=$value['class_id']?></td>
						<td><a href="#" class="linkprofile"><?=$value['lastname'].", ".$value['firstname']." ".$value['middlename']?></a></td> 
						<td class="center"><?=$value['section']." "?></td>
						<td><?=$value['course_name']?></td>
						<td>S.Y. <?=$value['school_year']." "?>
							<?php
								if ($value['sem_no'] == 1){
									echo "1st Semester";
								} else if ($value['sem_no'] == 2){
									echo "2nd Semester";
								} else if ($value['sem_no'] > 2) {
									echo "Summer Class";
								}
							?>
						</td>
						<td class="button-container"><button class="button table enroll" id="enroll<?=$number?>" onclick="">Enroll</button></td>
						<td class="button-container"><button class="button table drop" id="drop<?=$number?>" onclick="">Drop</button></td>
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
		    <th>Class ID</th> 
		    <th>Teacher</th>
		    <th>Section</th>
		    <th>Course</th>
		    <th>S.Y. Semester</th>
		    <th colspan="2">Actions</th>
		  </tr>
		  <?php
				$query = "SELECT * FROM class NATURAL JOIN teacher NATURAL JOIN course NATURAL JOIN semester";
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
					<td><?=$value['class_id']?></td>
					<td><a href="#" class="linkprofile"><?=$value['lastname'].", ".$value['firstname']." ".$value['middlename']?></a></td> 
					<td><?=$value['section']." "?></td>
					<td><?=$value['course_name']?></td>
					<td>S.Y. <?=$value['school_year']." "?>
						<?php
							if ($value['sem_no'] == 1){
								echo "1st Semester";
							} else if ($value['sem_no'] == 2){
								echo "2nd Semester";
							} else if ($value['sem_no'] > 2) {
								echo "Summer Class";
							}
						?>
					</td>
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