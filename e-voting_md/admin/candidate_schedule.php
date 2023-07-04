<?php ob_start(); include "session.php"; ?>
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
	<?php /* include_once("../config/db_connection.php"); */ ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" id="menu">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" id="collapse-btn" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand col-lg-12" id="brand" style="color:black;"> 
					<span style="font-family:elephant">Secured E-Voting Using QR Code</span>
					
				</a>
				
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center current"><a href="candidate_detail.php">Candidate Detail</a></li>
                    <li class="text-center "><a href="candidate_schedule.php">Election Schedule</a></li>
					<li class="text-center "><a href="approved_candidate.php">Approved Candidate</a></li>
                    <li class="text-center "><a href="voter.php">Voter List</a></li>
                    
                    
                   
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
								Election Schedule
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						
						
					<!-- /.panel-heading -->
						
						
							<span style="padding:20px 20px;text-align:center;float:left;"><h2>Phase-wise polling constituencies in each state </h2></span>
						<!--<div class="col-md-4 mtop20 pbot20 hidden-xs">
							<a href="add_staff.php" class="btn btn-success btn-add pull-right"> 
								Add Staff Detail
							</a>
						</div>
						<div class="col-md-4 mtop20 pbot20 visible-xs">
							<a href="add_staff.php" class="btn btn-success btn-add"> 
								Add Staff Detail
							</a>
						</div>-->
					<a href="candidate_add_schedule.php" style="background:green;color:white;padding:10px 20px;text-align:center;float:right;margin-top:10px;margin-right:10px"> Add schedule</a>
						
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead class="thead">
							
									<tr>
										<td> Election name</td>								
										<td> Election Date </td>						
										<td> Election place </td>
										<td> District </td>
										
										<td>Edit </td>
										<td>Delete </td>
									</tr>
								</thead>
									
								<tbody id="user-area">
								<?php
									include "dbcc.php";
									$select=mysql_query("select * from election");
									while($row=mysql_fetch_array($select))
									{

								?>
									<tr class="odd gradeX">
										
										<td><?php echo $row['ename'] ?></td>
										<td> <?php echo $row['date'] ?></td>
										<td><?php echo $row['eplace'] ?></td>
										<td><?php echo $row['state'] ?></td>
										
										<td class="center last-col">
											
											<a href="edit_schedule.php?eid=<?php echo $row['ele_id']; ?>" class="btn btn-success btn-view mtop2" role="button" data-toggle="modal"> 
												Edit
											</a>
											
										</td>
										<td>
											<a href="delete_schedule.php?eid=<?php echo $row['ele_id']; ?>"class="btn btn-danger btn-view mtop2" role="button" data-toggle="modal"> 
												Delete
											</a>
										</td>
									</tr>
									<?php } ?>
									
									
								</tbody>
							</table>
							</table>
						</div><br/>
						<!-- /.table-responsive -->
						
					</div>
					
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
	
	
</body>

</html>
