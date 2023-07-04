<?php
	include "dbcc.php";
	$cid=$_REQUEST['cid'];
	$delete=mysql_query("delete from condidate where cid=$cid");
	if($delete)
	{
		echo "<script>alert('Deleted!')
		window.location='candidate_detail.php'</script>";
		
	}
	else
	{
		echo "<script>alert('Try Again!')</script>";
	}
 ?>
 