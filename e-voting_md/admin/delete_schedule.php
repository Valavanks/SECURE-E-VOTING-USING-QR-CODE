<?php
	include "dbcc.php";
	$eid=$_REQUEST['eid'];
	$delete=mysql_query("delete from election where ele_id=$eid");
	if($delete)
	{
		echo "<script>alert('Deleted!')
		window.location='candidate_schedule.php'</script>";
		
	}
	else
	{
		echo "<script>alert('Try Again!')</script>";
	}
 ?>
 