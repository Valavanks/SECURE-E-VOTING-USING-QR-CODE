<?php
include 'admin/dbcc.php';
echo $otp=$_REQUEST['data'];
$check=mysql_query("select * from qr_coin where qr_id='$otp' and status='0'");
$row=mysql_fetch_array($check);
$n=mysql_num_rows($check);
if($n==1)
{
	
	session_start();
	$_SESSION['vid']=$row['uid'];
	$_SESSION['eid']=$row['eid'];
	$eid=$row['eid'];
	$vid=$_SESSION['vid'];
	$update=mysql_query("update block_status set stage3='1' where uid='$vid'");
	header("location:candidate_list.php?eid=$eid&uid=$vid");
}
else
{
	echo "<script>alert('Your voting period has been expired. Or you have voted already')
	window.location='index.php'</script>";
} 
?>