				
			<?php
				include_once("../config/db_connection.php");
				$sid=$_REQUEST['sid'];
				$delete=mysql_query("delete from staff where sid='$sid'");
									
				if($delete)
				{
					header("location:staff.php");
				}
				else
				{
					echo "<script>alert('FAILURE');</script>";
				}
			?>					