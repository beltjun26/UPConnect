<?php 
	session_start();
	$_SESSION['page'] = 4;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>UP Connect</title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/class.css">
	<link rel="stylesheet" type="text/css" href="css/post.css">
	<link rel="stylesheet" type="text/css" href="css/navigationbar.css">
</head>
<body>
	<?php require "nav.php"; ?>
	<div class="container" id="classContainer">
			<div class="post" style="margin-top: 30px!important;">	
				<header>
					<img class="userphoto" src="images/profile_images/1.jpg" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
					<a class="user" href="profile.php">Clyde Joshua Delgado</a>
				</header>
				<p class="caption">Something</p>
				<img src="<?php echo $dir."/".$file_array[2]; ?>" class="uploadedphoto">

				<div class="filecontainer">
					<img src="images/file.png" class="file">
					<p><?=$file_array[2];?></p>
				</div>

				<ul class="button options"> 
					<li>
						<a href="download.php?post=1&file=1" target="_blank" class = "hoveranim download-btn">Download</a>
					</li>
					<li><input type="button" value="Comment" class="hoveranim"></li>
					<li><input type="button" value="Follow" class="hoveranim"></li>
				</ul>
				<ul class="comments" style="display: none">
					<li class="comment commented">
						<img src="aa" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<div class="content">
							<span class="delete">x</span>
							<a class="usercom">Clyde Joshua Delgado</a>
							<span class="timestamp">December 7, 2016 8:42pm</span>
							<p class="comment-content">Hello po, ask lang ko tani kng okay na ni ang comment? :D XD</p>
						</div>
					</li>
					<li class="comment commented">
						<img src="aa" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<div class="content">
							<span class="delete">x</span>
							<a class="usercom">Clyde Joshua Delgado</a>
							<span class="timestamp">December 7, 2016 8:42pm</span>
							<p class="comment-content">Hello po, ask lang ko tani kng okay na ni ang comment? :D XD</p>
						</div>
					</li>
					<li class="comment commented">
						<img src="aa" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<div class="content">
							<span class="delete">x</span>
							<a class="usercom">Clyde Joshua Delgado</a>
							<span class="timestamp">December 7, 2016 8:42pm</span>
							<p class="comment-content">Hello po, ask lang ko tani kng okay na ni ang comment? :D XD</p>
						</div>
					</li>
					<li class="comment commented">
						<img src="aa" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<div class="content">
							<span class="delete">x</span>
							<a class="usercom">Clyde Joshua Delgado</a>
							<span class="timestamp">December 7, 2016 8:42pm</span>
							<p class="comment-content">Hello po, ask lang ko tani kng okay na ni ang comment? :D XD</p>
						</div>
					</li>
					<li class="comment commented">
						<img src="aa" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<div class="content">
							<span class="delete">x</span>
							<a class="usercom">Clyde Joshua Delgado</a>
							<span class="timestamp">December 7, 2016 8:42pm</span>
							<p class="comment-content">Hello po, ask lang ko tani kng okay na ni ang comment? :D XD</p>
						</div>
					</li>
					<li class="comment commenting">
						<img src="aa" onerror="this.src='images/profile_images/profile_picture_default.jpg'">
						<form>
							<textarea class="description" placeholder="Comment here..."></textarea>		
							<button><span class="glyphicon glyphicon-comment"></span></button>
						</form>
					</li>
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
		h = h - 5;
		document.getElementById('classContainer').setAttribute("style","height: "+x+"px;width:100%;margin-top:"+h+"px;padding:0");
	</script>

	<script>
		var loadImage = function(event){
			var image_preview = document.getElementById('image_preview');

			image_preview.src = URL.createObjectURL(event.target.files[0]);
			image_preview.style.display = "block";


			var file_item = document.getElementById('file_item');
			file_item.style.display = "none";

			document.getElementById('cancel_upload').style.display = "block";
		};

		var loadFile = function(event){
			var image_item = document.getElementById('image_item');
			image_item.style.display = "none";


			document.getElementById('cancel_upload').style.display = "block";	
			document.getElementById('file_button').style.display = "block";

			document.getElementById('file_button_label').style.display = "none";
		};

		var cancel_upload = function(event){
			var image_button = document.getElementById('image_button');
			image_button.value = '';

			var image_preview = document.getElementById('image_preview');
			image_preview.src = '';
			image_preview.style.display = 'none';

			var file_item = document.getElementById('file_item');
			file_item.style.display = "block";

			var file_item = document.getElementById('image_item');
			file_item.style.display = "block";


			document.getElementById('cancel_upload').style.display = "none";
			document.getElementById('file_button').style.display = "none";
			document.getElementById('file_button_label').style.display = "block";
		}
	</script>

	


</body>
</html>


