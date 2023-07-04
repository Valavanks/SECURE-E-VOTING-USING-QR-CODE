				
			<?php
				include_once("../config/db_connection.php");
				$aid=$_REQUEST['aid'];
				$delete=mysql_query("delete from attendance where aid='$aid'");
									
				if($delete)
				{
					header("location:attendance.php");
				}
				else
				{
					echo "<script>alert('FAILURE');</script>";
				}
			?>					