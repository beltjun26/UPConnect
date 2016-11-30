<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="topnav">
		<a href="home.html" class="floattran">UP Connect</a>
		<a href="profile.html" class="floattran">Your Profile</a>
		<a href="home.html" class="floattran">Home</a>
		<a href="index.html" class="floattran">Logout</a>
	</div>
	<div class="container" style="width: 80%; margin-top: 7%;">
		<header class="class">
			<h1 class="classtitle">CMSC 128</h1>
			<ul class="class description">
				<li><p class="description">Ara Abigail Ambita</p></li>
				<li><p class="description">S.Y. 2016-2017</p></li>
				<li><p class="description">1st Semester</p></li>
				<li><p class="description">Section 1</p></li>	
			</ul>
		</header>
		<ul class="grouplinks">
			<li><a href="members.html" class="floattran">Members</a></li>
			<li><a href="#" class="floattran">Files</a></li>
			<li><a href="#" class="floattran">Images</a></li>
		</ul>
		
		<div class="topost">
			<p class="user">Clyde Joshua Delgado</p>
			<form>
				<textarea name="caption" class="text" placeholder="Want to Post?"></textarea>
				<input type="button" value="+ Image" class="hoveranim">
				<input type="button" value="+ File" class="hoveranim">
				<input type="submit" name="post" value="Post" class="hoveranim">
			</form>
		</div>
		<!-- <ul class="actionbtns">
			<li class="tooltip"><button>M</button><span class="tooltiptext">+ Add Member</span></li>
			<li class="tooltip"><button>F</button><span class="tooltiptext">+ Add File</span></li>
			<li class="tooltip"><button>I</button><span class="tooltiptext">+ Add Image</span></li> 
		</ul> -->
		<div class="post">
			<p class="user">Clyde Joshua Delgado</p>
			<p class="caption">Clyde uploaded a photo in CMSC 128.</p>
			<img src="../images/notes.jpg" class="uploadedphoto">
			<input type="button" value="Download" class="hoveranim">
			<input type="button" value="Comment" class="hoveranim">
			<input type="button" value="Follow" class="hoveranim">
		</div>
		<div class="post">
			<p class="user">Clyde Joshua Delgado</p>
			<p class="caption">Clyde uploaded a file in CMSC 128.</p>
			<div class="filecontainer">
				<img src="../images/file.png" id="file">
				<p>File.fle</p>
			</div>
			<input type="button" value="Download" class="hoveranim">
			<input type="button" value="Comment" class="hoveranim">
			<input type="button" value="Follow" class="hoveranim">
		</div>
	</div>
</body>
</html>