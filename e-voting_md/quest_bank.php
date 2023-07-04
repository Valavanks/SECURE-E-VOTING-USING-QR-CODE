<?php
include_once('auth.php');
			include 'config/db_connection.php';
			include "session.php";
$sub=$_REQUEST['sub_code'];
$cat=$_REQUEST['cat'];
$unit=$_REQUEST['unit'];
$t1=$_REQUEST['t1'];
$t2=$_REQUEST['t2'];
$t3=$_REQUEST['t3'];
$question_title=$_REQUEST['question_title'];
$date=$_REQUEST['date'];
if($cat=='1unit')
{
	$insert=mysql_query("INSERT INTO `question_bank` (  `sub_code`, `author`,`question_category`, `unit`, `two_marks`, `thirteen_marks`, `fifteen_marks`, `question_title`, `date`) VALUES 
( '$sub', '$sid','$cat', '$unit', '$t1', '$t2', '0', '$question_title', '$date')");
}
else{
$insert=mysql_query("INSERT INTO `question_bank` (  `sub_code`, `author`,`question_category`, `unit`, `two_marks`, `thirteen_marks`, `fifteen_marks`, `question_title`, `date`) VALUES 
( '$sub', '$sid','$cat', '$unit', '$t1', '$t2', '$t3', '$question_title', '$date')");
}
								if($insert){
									echo "<script>alert('success')</script>";
								header("location:view_question_bank.php");
								}else{
									echo "<script>alert('failed')</script>";
								}
?>