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
	<?php require "admin_nav.php" ?>
	<div id="container">
		<header class="table-header">
			<h1>Courses</h1>
			<form class="search">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<button class="button add">Add Student +</button>
		</header>
		<table>
		  <tr>
		    <th>No.</th>
		    <th>Courses ID</th> 
		    <th>Name</th>
		 	<th>Title</th>
		    <th>Description</th>
		    <th colspan="2">Actions</th>
		  </tr>
		  <tr>
		    <td>1</td>
		    <td>1</td>
		    <td>CMSC 22</td>
		    <td>Java Programming</td>
		    <td class="description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
		    <td><button class="button table edit">Edit</button></td>
		    <td><button class="button table delete">Delete</button></td>
		  </tr>
		  <tr>
		    <td>2</td>
		    <td>2</td>
		    <td>CMSC 128</td>
		    <td>Software Development</td>
		    <td class="description"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
		    <td><button class="button table edit">Edit</button></td>
		    <td><button class="button table delete">Delete</button></td>
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