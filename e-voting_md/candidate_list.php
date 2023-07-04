<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> QR Code Generation || Admin </title>
	<link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet">
    <link href="admin/assets/css/mobile.css" rel="stylesheet">
	<style>
		#brand:hover{
			color		:	#000000;
		}
	</style>
</head>

<body>
	<?php include "admin/dbcc.php"; ?>
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
						<span style="font-family:elephant">Secure E-Voting Using QR Code</span>
					
				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center current"><a href="candidate_application_form.php">candidate application form</a></li>
                   <!-- <li class="text-center "><a href="candidate_schedule.php">Election Schedule</a></li>
					<li class="text-center "><a href="approved_candidate.php">Approved Candidate</a></li>
                    <li class="text-center "><a href="voter.php">Voter List</a></li>
                    
                    
                   
                    <li class="text-center"><a href="index.php"> Logout </a></li>  -->
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
								 candidate List
							<span class="span-crumb pull-right mtop10"> 
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
						
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead class="thead">
								
									<tr>
										<td> Photo</td>								
										<td> candidate Name </td>						
										<td> Symbol </td>
										<td> Party Name </td>
										<td> Vote </td>
										
										
									</tr>
								</thead>
									
								<tbody id="user-area">
									<?php  
									session_start();
									$vid=$_SESSION['vid'];
									$eid=$_SESSION['eid'];
									
									$vid=$_REQUEST['uid'];
									$eid=$_REQUEST['eid'];
									
									
									$date=date("Y-m-d");/* 
										$select=mysql_query("select * from allocate_party");
										while($row=mysql_fetch_array($select))
										{
											$cid=$row['cid']; */
											$select1=mysql_query("SELECT * FROM condidate where election=$eid");
											while($fetch=mysql_fetch_array($select1)){
												$cid=$fetch['cid'];
											$n=mysql_num_rows($select1);
											if($n>0)
											{
												$select=mysql_query("select * from allocate_party where cid=$cid");
												$row=mysql_fetch_array($select);
											?>
									<tr class="odd gradeX">
										<td><img src="candidate/<?php echo $fetch['photo'] ?>" width="50" height="50"></td>
										<td><?php echo $fetch['name'] ?></td>
										<td><img src="admin/images/party/<?php echo $row['symbol'] ?>" width="50" height="50"></td>
										
										<td><?php echo $row['party'] ?></td>
										
										<td><a href="vote.php?cid=<?php echo $row['cid'] ?>" class="btn btn-primary btn-view mtop2" role="button" data-toggle="modal"> 
												Vote
											</a></td>
										
										
									</tr>
											<?php } 
											
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
				//include_once("modal_delete.php");
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
