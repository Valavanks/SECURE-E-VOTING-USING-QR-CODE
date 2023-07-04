<?php

	$connect=mysql_connect("localhost","root","") or die("mysql could not connect");
	
	mysql_select_db("crm",$connect) or die("No DB Select");


?>