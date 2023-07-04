<?php
	include "dbcc.php";
	$status=$_REQUEST['status'];
	$cid=$_REQUEST['cid'];
	$update=mysql_query("update condidate set status='$status' where cid=$cid");
	if($update){
		echo "<script>alert('updated!')
		window.location='candidate_detail.php'</script>";
	}else{
		echo "<script>alert('try again!')
		</script>";
		
	}
?>