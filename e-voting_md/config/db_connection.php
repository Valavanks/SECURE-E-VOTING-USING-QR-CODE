<?php
	$connect = mysql_connect("localhost","root","")or die("Connection Err");
	mysql_select_db("question",$connect)or die("DB Err");
?>