<?php
	include 'connect.php';
	session_start();

	$userid = $_SESSION['userid'];

	$errorinput = 0;
	$upload_pp = 0;
	
	if(isset($_POST['change_profilepic'])){
		if($_FILES["profile"]["error"] == 0){
			$fileTypePP = exif_imagetype($_FILES["profile"]["tmp_name"]);
			$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
			if ((!in_array($fileTypePP, $allowed))) { 
				$errorinput = 1;
			} else {
				$upload_pp = 1;
			}			
		}
	}

	if($errorinput == 1 ){ 	?>
		<script type="text/javascript">
			alert("Unsupported file type! Only .gif, .jpeg, .png only!");
			window.location = 'my_myprofile.php';
		</script> 
		<?php 
		die();
	}

	if($upload_pp == 1){
		$newfilename = $userid.".jpg";
		move_uploaded_file($_FILES['profile']['tmp_name'], 'images/profile_images/' . $newfilename);
	}

	header("Location: myprofile.php");
?>