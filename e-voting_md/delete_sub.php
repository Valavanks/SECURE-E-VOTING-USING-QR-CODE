
<?php
	
			include 'config/db_connection.php';
			
	$iid=$_REQUEST['id'];
	
	$qry=mysql_query("delete from sub_code where id='$iid'");
	
	if($qry)
	{
		header("location:sub_code.php");
	}
	else
	{
		echo mysql_error();
	}

?>