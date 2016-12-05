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
	<?php require "admin_nav.php" ?>
	<div id="container">
		<h1>Students</h1>
		<form class="search">
			<input type="text" name="keyword" placeholder="Search">
			<input type="submit" name="search" value="Go">
		</form>
		<button class="button add">Add Student +</button>
		<table border="0">
		  <tr>
		  	<th>No.</th>
		  	<th>Student ID</th>
		    <th>Name</th>
		    <th>Course and Year</th> 
		    <th>Email</th>
		    <th colspan="2">Actions</th>
		  </tr>
		  <tr>
		  	<td>1</td>
		    <td>2014-39334</td>
		    <td><a href="#" class="linkprofile">Delgado, Clyde Joshua Nonaillada</a></td> 
		    <td>BS in Computer Science III</td>
		    <td>cjubs.delgado@gmail.com</td>
		    <td><button class="button edit">Edit</button></td>
		    <td><button class="button delete">Delete</button></td>
		  </tr>
		  <tr>
		  	<td>2</td>
		    <td>2014-39334</td>
		    <td><a href="#" class="linkprofile">Delgado, Clyde Joshua Nonaillada</a></td> 
		    <td>BS in Computer Science III</td>
		    <td>cjubs.delgado@gmail.com</td>
		    <td><button class="button edit">Edit</button></td>
		    <td><button class="button delete">Delete</button></td>
		  </tr>
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