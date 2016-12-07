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