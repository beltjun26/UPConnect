<!-- NOTE: <br> is just for readability purposes. -->
<?php
 	session_start();
 	session_unset();
	session_destroy();   // function that Destroys Session 
  	header("Location: index.php");
?>