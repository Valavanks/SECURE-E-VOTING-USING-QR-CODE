<?php ob_start();
	
	session_start();
	if(empty($_SESSION['aid']))
	{
		header("location:index.php");
	}

?>