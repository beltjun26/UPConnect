<?php 
	/*if(!isset($_SESSION['userid'])){
       header("Location: index.php");  
	}	*/
	$_SESSION['page'] = 2;
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
	<?php require "connect.php" ?>
	<?php require "admin_nav.php" ?>
	<div id="container">
		<header class="table-header">
			<h1>Students</h1>
			<form class="search">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<button class="button add" id="add">Add Student +</button>
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
		<table>
			<tr>
				<th>No.</th>
				<th>Student ID</th>
				<th>Name</th>
				<th>Course and Year</th> 
				<th>Email</th>
				<th colspan="2">Actions</th>
			</tr>
			<?php
				$query = "SELECT * FROM student NATURAL JOIN degree";
				$result = mysqli_query($dbconn, $query);
				$data = [];
				if(mysqli_affected_rows($dbconn)){
					while($row = mysqli_fetch_assoc($result)){
					$data[] = $row;
					}
				}
				$number = 1;
				foreach ($data as $value): ?>
				<tr>
					<td><?=$number;?></td>
					<td><?=$value['student_id']?></td>
					<td><a href="#" class="linkprofile"><?=$value['lastname'].", ".$value['firstname']." ".$value['middlename']?></a></td> 
					<td><?=$value['degree_name']." "?>
						<?php 
							if ($value['year_lvl']==1){
								echo "I";
							} else if ($value['year_lvl']==2){
								echo "II";
							} else if ($value['year_lvl']==3){
								echo "III";
							} else if ($value['year_lvl']==4){
								echo "IV";
							}
						?></td>
					<td><?=$value['email']?></td>
					<td><button class="button table edit" id="edit<?=$number?>" onclick="showeditmodal(<?=$number?>)">Edit</button></td>
					<td><button class="button table delete" id="delete<?=$number?>" onclick="showdeletemodal(<?=$number?>)">Delete</button></td>
				</tr>
				<div id="edit-panel<?=$number?>" class="modal">
					<div class="modal-content">
						<div class="modal-header">
						    <span id="cancel-edit<?=$number?>" class="close">×</span>
						    <h2>Edit <?=$value['firstname']?></h2>
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
				<div id="delete-panel<?=$number?>" class="modal delete-panel">
					<div class="modal-content">
						<div class="modal-header">
						    <span id="cancel-delete" class="close">×</span>
						    <h2>Delete <?=$value['firstname']?>?</h2>
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
				<?php 
					$number++;
					endforeach 
				?>
		</table>
	</div>
	<script>
		function showeditmodal(student_no){
			var modal = document.getElementById('edit-panel'+student_no);
			modal.style.display = "flex"; 
		}

		function showdeletemodal(student_no){
			var modal = document.getElementById('delete-panel'+student_no);
			modal.style.display = "flex"; 
		}

		nav = $('#nav').outerHeight(true);
		console.log(nav);
		container = window.innerHeight;
		console.log(container);
		container = container - nav;
		console.log(container);
		document.getElementById('container').setAttribute("style","height: "+container+"px; width:100% ;margin-top:"+nav+"px;");

		tsakto = 1;
		sala = 0;

		var addpanel = document.getElementById("add-panel");
		var addbutton = document.getElementById("add");
		var canceladd = document.getElementById("cancel-add");

		addbutton.onclick = function() {
		    addpanel.style.display = "flex";
		}

		canceladd.onclick = function() {
		    addpanel.style.display = "none";
		}

		/*var editpanel = document.getElementById("edit-panel");
		var editbutton = document.getElementById("edit");
		var canceledit = document.getElementById("cancel-edit");

		editbutton.onclick = function() {
		    editpanel.style.display = "flex";
		}

		canceledit.onclick = function() {
		    editpanel.style.display = "none";
		}*/

		/*var deletepanel = document.getElementById("delete-panel");
		var deletebutton = document.getElementById("delete");
		var canceldelete = document.getElementById("cancel-delete");

		deletebutton.onclick = function() {
		    deletepanel.style.display = "flex";
		}

		canceldelete.onclick = function() {
		    deletepanel.style.display = "none";
		}*/

		window.onclick = function(event) {
		    if (event.target == addpanel){
		    	addpanel.style.display = "none";
		    } 
		}

	</script>
</body>
</html>