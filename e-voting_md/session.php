<?php ob_start();

	session_start();
	
	if($_SESSION['sid']=="")
	{
		header("location:index.php");
	}
	$sid=$_SESSION['sid'];

?>