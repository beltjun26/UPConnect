<?php
	session_start(); 
	require "connect.php";
	$caption = $_POST['caption'];
	$userID = $_SESSION['userid'];
	$class_id = $_SESSION['class_id'];
	$file_id = 0;
	$_SESSION['caption'] = $caption;
	$error = false;

	//IF IMAGE IS UPLOADED
	if(is_uploaded_file($_FILES['image_upload']['tmp_name'])){
		if($_FILES["image_upload"]["error"] == 0){
			$fileType = exif_imagetype($_FILES["image_upload"]["tmp_name"]);
			$allowed = array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG);
			if (!in_array($fileType, $allowed)) {
				$error = true;
?>
				<script type="text/javascript">
					alert("Unsupported file type! Only .gif, .jpeg, .png only!");
					window.location = '<?php echo "class.php?classid=".$class_id ?>';
				</script> 
<?php				
			} else {
				$file_id = 1;
			}
		}
	}
	//IF FILE IS UPLOADED
	elseif (is_uploaded_file($_FILES['file_upload']['tmp_name'])) {
		if($_FILES["file_upload"]["error"] == 0){
			$path = $_FILES['file_upload']['name'];
			$fileType = pathinfo($path, PATHINFO_EXTENSION);


			$allowed = array("doc", "docm", "docx", "dot", "dotm", "dotx", "epub", "odf", "ods", "odt", "ott", "oxps", "pages", "pdf", "pmd", "pot", "potx", "pps", "ppsx", "ppt", "pptm", "pptx", "prn", "prnproj", "ps", "pub", "pwi", "rep", "rtf", "sdd", "sdw", "shs", "snp", "sxw", "tpl", "vsd", "wlmp", "wpd", "wps", "wri", "xps", "rar", "zip", "7zip", "xlsm", "xlsx", "xlt", "htm", "html", "csv", "dbf", "txt", "psd", "potm", "c", "sql", "java");
			if (!in_array($fileType, $allowed)){
				$error = true;
?>
				<script type="text/javascript">
					alert("Unsupported file type! Document and compressed files only.");
					window.location = '<?php echo "class.php?classid=".$class_id ?>';
				</script> 
<?php				
			} else {
				$file_id = 2;
			}
		}
	}

	


	if(!$error):
		$query = "INSERT INTO `post` (`post_id`, `class_id`, `user_id`, `time_stamp`, `text`, `file_id`) VALUES (NULL, '$class_id', '$userID', CURRENT_TIMESTAMP, '$caption', '$file_id');";
		mysqli_query($dbconn, $query);
		$post_id = mysqli_insert_id($dbconn);
		

		$user_id = $_SESSION['userid'];

 		$query = "INSERT INTO `notifications` (`notif_id`, `post_id`, `user_id_posted`, `notif_type`, `time_stamp_notif`) VALUES (NULL, '$post_id', '$user_id', '1', CURRENT_TIMESTAMP);";



		mysqli_query($dbconn, $query);



		$notif_id = mysqli_insert_id($dbconn);
		
		$query = "SELECT teacher_id FROM class where class_id = '$class_id';";

		$teacher_id = mysqli_query($dbconn, $query);

		foreach ($teacher_id as $value) {
			$teacher_id_notif = $value['teacher_id'];
		}
		

		if($teacher_id_notif != $_SESSION['userid']){
			$query = "INSERT INTO `notified` (`notif_id`, `user_id_notified`, `if_read`) VALUES ('$notif_id', '$teacher_id_notif', '0');";
			mysqli_query($dbconn, $query);
		}



		$query = "SELECT student_id from enroll_class where class_id = '$class_id'";
		$result = mysqli_query($dbconn, $query);

		foreach($result as $value) {

			$student_id = $value['student_id'];
			if($student_id != $_SESSION['userid']){
				$query = "INSERT INTO `notified` (`notif_id`, `user_id_notified`, `if_read`) VALUES ('$notif_id', '$student_id', '0');";
				mysqli_query($dbconn, $query);
			}
		}

		if($file_id == 1){
			mkdir('saved_images/'.$post_id, 0777, true);
			move_uploaded_file($_FILES['image_upload']['tmp_name'], 'saved_images/'.$post_id."/".$_FILES['image_upload']['name']);
		}
		if($file_id == 2){
			mkdir('saved_files/'.$post_id, 0777, true);
			move_uploaded_file($_FILES['file_upload']['tmp_name'], 'saved_files/'.$post_id."/".$_FILES['file_upload']['name']);
		}

		$_SESSION['caption'] = "";

?>
		<script>	
			window.location = '<?php echo "class.php?classid=".$class_id ?>';
		</script>
<?php 

	endif;

	 ?>