<div class="post">
			<header>
				<img class="userphoto" src="images/profile_images/<?=$_SESSION['userid'] ?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
				<a class="user" href="#"><?=$_SESSION['firstname']." ".$_SESSION['lastname']?></a>
			</header>
			<p class="caption">Clyde uploaded a photo in CMSC 128.</p>
			<img src="images/notes.jpg" class="uploadedphoto">
			<ul class="button options">
				<li><input type="button" value="Download" class="hoveranim"></li>
				<li><input type="button" value="Comment" class="hoveranim"></li>
				<li><input type="button" value="Follow" class="hoveranim"></li>
			</ul>
		</div>
		<div class="post">
			<header>
				<img class="userphoto" src="images/profile_images/<?=$_SESSION['userid'] ?>.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
				<a class="user" href="#"><?=$_SESSION['firstname']." ".$_SESSION['lastname']?></a>
			</header>
			<p class="caption">Clyde uploaded a file in CMSC 128.</p>
			<div class="filecontainer">
				<img src="images/file.png" id="file">
				<p>File.fle</p>
			</div>
			<ul class="button options">
				<li><input type="button" value="Download" class="hoveranim"></li>
				<li><input type="button" value="Comment" class="hoveranim"></li>
				<li><input type="button" value="Follow" class="hoveranim"></li>
			</ul>
		</div>