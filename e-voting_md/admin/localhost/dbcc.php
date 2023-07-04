<?php
$host="localhost";
	 $user='root';
	 $pass='';
	 $dbname='evoting';
	$connect=mysql_connect("localhost","root","") or
	die("mysql couldn't connect");
	
	mysql_select_db("evoting",$connect)or
	die("db doesn't exist");

	
?>