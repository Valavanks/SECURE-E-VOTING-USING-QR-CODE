<?php
include "dbcc.php";

 $otp=$_REQUEST['data'];
 $vid=$_REQUEST['vid'];
$qrym=mysql_query("select * from voter where vid='$vid'");
			$rowm=mysql_fetch_array($qrym);
			$mobile=$rowm['phone'];
			$update=mysql_query("update block_status set stage2='1' where uid='$vid'");
$message="https://ilifetech.in/qr/index.php?id=$otp";
echo '<iframe src="http://pay4sms.in/sendsms/?token= b81edee36bcef4ddbaa6ef535f8db03e&credit=2&sender= RandDC&message='.$message.'&number=91'.$mobile.'" style="display:none"></iframe>';
echo "<script>alert('OTP has send to your mobile')
window.location='voter.php'</script>";
?>