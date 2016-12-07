<?php
    $post_id = $_GET['post'];
    $file_id = $_GET['file'];

    if($file_id == 1){
        $dir = "saved_images/".$post_id;
    }
    else{
        $dir = "saved_files/".$post_id;
    }


    $file_array = scandir($dir);

    if($file_id == 1){
        $dir = "saved_images\\".$post_id;
    }
    else{
        $dir = "saved_files\\".$post_id;
    }

    $file = $dir."\\".$file_array[2];




    if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: '.filesize($file));
		readfile($file);
	}

?>