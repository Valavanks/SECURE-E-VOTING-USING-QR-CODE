<?php
	include "dbcc.php";
	$vid=$_REQUEST['vid'];
	$delete=mysql_query("delete from voter where vid=$vid");
	if($delete)
	{
		echo "<script>alert('Deleted!')
		window.location='voter.php'</script>";
		
	}
	else
	{
		echo "<script>alert('Try Again!')</script>";
	}
 ?>
 