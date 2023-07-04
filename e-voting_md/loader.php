<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<?php

$uid=$_REQUEST['uid'];
?>
<center>
<h2>Encrypting Data</h2>
<img src="images/encrypt.jpeg">
<div style="margin-top:100px" class="loader"></div>
<script type="text/javascript">

function Redirect() 
{
    window.location="thank.php?vid=<?php echo $uid;?>";
}


setTimeout('Redirect()', 10000);

</script>
</center>
<?php
include "admin/dbcc.php";
$check=mysql_query("update block_status set stage5='1' where uid='$uid' ");
?>
</body>
</html>
