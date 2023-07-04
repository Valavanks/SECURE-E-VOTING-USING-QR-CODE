<?php
	include_once("../config/db_connection.php");
	$uniqueId = $_REQUEST['id'];
	$tableName = $_REQUEST['tableName'];
	$imageName = $_REQUEST['image'];
	
	if($imageName!=""){
		unlink("../images/".$imageName);
	}
	
	$deleteQuery = mysql_query("DELETE from $tableName WHERE id=$uniqueId");
	if($deleteQuery){
		header("location:gallery.php");
	}else{
		echo '<script>
				window.alert("Sorry Image not deleted now. Please try again");
			</script>';
	}
?>