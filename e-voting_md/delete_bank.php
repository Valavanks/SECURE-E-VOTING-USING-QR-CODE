
<?php
	
			include 'config/db_connection.php';
			
	$qbid=$_REQUEST['qbid'];
	
	$qry=mysql_query("delete from question_bank where qbid='$qbid'");
	
	if($qry)
	{
		header("location:view_question_bank.php");
	}
	else
	{
		echo mysql_error();
	}

?>