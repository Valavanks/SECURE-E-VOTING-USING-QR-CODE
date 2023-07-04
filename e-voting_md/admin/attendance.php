<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> QR Code Generation || Admin </title>
	<link rel="shortcut icon" href="../images/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/mobile.css" rel="stylesheet">
	<style>
		#brand:hover{
			color		:	#000000;
		}
	</style>
</head>

<body>
	<?php include_once("../config/db_connection.php"); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" id="menu">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" id="collapse-btn" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand col-lg-12" id="brand"> 
					WEBSITE SECURITY USING DATA HIDING IN QR CODE
				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center"><a href="staff.php">Staff Detail</a></li>
                    <li class="text-center current"><a href="attendance.php">Attendance</a></li>
                    <li class="text-center"><a href="qre.php">QR Code</a></li>
                   <li class="text-center"><a href="logout.php"> Logout </a></li> 
				</ul>
            </div> <!-- /.navbar-collapse -->
		</div>  <!-- /.container -->
		
    </nav>
    
    <div class="container">
		<div class="row-fluid mtop120">
			<div class="col-lg-12 ">
				<div class="panel panel-default bg-white">
						<div class="panel-heading hidden-xs">
							<img src="images/user.png" alt=""> 
								View Staff Attendance
							<span class="span-crumb pull-right mtop10"> 
								<a href="UK ACCOUNTS & TAX LTD" class="white-color mtop10"> Logout </a>
							</span>
						</div>
						
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
						<div class="col-md-5 mtop20 pbot20">
							<div class="row">
								
							</div>		
						</div>		
						<div class="col-md-3 mtop20 pbot20">						
							
						</div>
						<div class="col-md-4 mtop20 pbot20 hidden-xs">
							<a href="add_attendance.php" class="btn btn-success btn-add pull-right"> 
								Add Attendance
							</a>
						</div>
						<div class="col-md-4 mtop20 pbot20 visible-xs">
							<a href="add_attendance.php" class="btn btn-success btn-add"> 
								Add Attendance
							</a>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead class="thead">
							<?php
								$i=1;
								$qry=mysql_query("select * from attendance");
								if($qry)
								{
							?>
								
									<tr>
										<td> S.No </td>								
										<td> Photo</td>								
										<td> Staff ID </td>								
										<td> Staff Name </td>								
										<td> Date </td>						
										<td> Time </td>						
										<td> Staff ID </td>
										<td class="last-col"> Status </td>
									</tr>
								</thead>
							<?php
							
							while($row=mysql_fetch_array($qry))
							{
								$aid=$row['aid'];
								$sid=$row['sid'];
								
								$qry2=mysql_query("select * from staff where sid='$sid'");
								$row2=mysql_fetch_array($qry2);
							?>			
								<tbody id="user-area">
									<tr class="odd gradeX">
										<td><?php echo $i;?></td>
										<td><img src="staff_image/<?php echo $row2['photo']; ?>" width="80" height="80" /></td>
										<td><?php echo $row['sid']; ?></td>
										<td><?php echo $row2['sname']; ?></td>
										<td><?php echo $row['adate']; ?></td>
										<td><?php echo $row['time_in']; ?></td>
										<td><?php echo $row['status']; ?></td>
										
										<td class="center last-col">
											
											<a href="delete_attendance.php?aid=<?php echo $aid; ?>" class="btn btn-danger btn-view mtop2" role="button" data-toggle="modal"> 
												Delete
											</a>
										</td>
									</tr>
							<?php
							$i++;
							}
						}
					else
						{
							echo "<p class=error >There is no booking..</p>";
						}
							
							?>	
									
								</tbody>
							</table>
							</table>
						</div><br/>
						<!-- /.table-responsive -->
						
					</div><!-- /.panel-body -->
					</div> <!-- col-main-7 -->
					
				</div><!-- /.panel -->
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div> <!-- ./container -->
			<?php
				include_once("modal_delete.php");
			?>		
   <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/delete.js"></script>
	<script>
		$(function(){
				/**
				 * function to filter the data using D-Code,D-Name,D-Qual,D-Specs
				 **/
			 
			$("#filter-user").keyup(function(){
				var current_query = $("#filter-user").val().toLowerCase();
				
				if(current_query!=""){
					$("#user-area tr").hide();
					
					$("#user-area tr").each(function(){                       
						 var keyword1 = $(this).attr("datakeyword1");
						 var keyword2 = $(this).attr("datakeyword2");
						 var keyword3 = $(this).attr("datakeyword3");
						
						if(keyword1.indexOf(current_query) >=0 || keyword2.indexOf(current_query) >=0 || keyword3.indexOf(current_query) >=0){
							$(this).show();
						} 
					}); 
				}else{
					$("#user-area tr").show();
				}  
			}); /*** end of filtering user **/
		});
	</script>
	
</body>

</html>
