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
</head>
<body>
	<?php require "admin_nav.php" ?>
	<div id="container">
		<header class="table-header">
			<h1>Classes</h1>
			<form class="search">
				<input type="text" name="keyword" placeholder="Search">
				<input type="submit" name="search" value="Go">
			</form>
			<button class="button add">Add Student +</button>
		</header>
		<table>
		  <tr>
		    <th>Firstname</th>
		    <th>Lastname</th> 
		    <th>Age</th>
		  </tr>
		  <tr>
		    <td>Jill</td>
		    <td>Smith</td> 
		    <td>50</td>
		  </tr>
		  <tr>
		    <td>Eve</td>
		    <td>Jackson</td> 
		    <td>94</td>
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