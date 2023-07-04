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
                 <a class="navbar-brand col-lg-12" id="brand" style="color:black;"> 
						<span style="font-family:elephant">Secured E-Voting Using QR Code</span>
					
				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center current"><a href="candidate_detail.php">Candidate Detail</a></li>
                    <li class="text-center "><a href="candidate_schedule.php">Election Schedule</a></li>
                    <li class="text-center "><a href="#">Voter List</a></li>
                    
                    
                   
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
								Candidate Detail
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
										<td> Image</td>								
										<td> candidate Name </td>						
										<td> Qualification </td>
										<td> DOB </td>
										<td> Mobile </td>
										<td>City</td>
										<td> Age </td>
										<td> Address </td>
										<td class="last-col"> View Card </td>
									</tr>
								</thead>
									
								<tbody id="user-area">
									<tr class="odd gradeX">
										<td><img src="images/dummy.png" width="50" height="50"></td>
										<td>Ajith</td>
										<td>M.Sc</td>
										<td>13/05/1997</td>
										<td>7689234562</td>
										<td>Chennai</td>
										<td>30</td>
										<td>Chennai</td>
										
										<td class="center last-col">
											<a href="#" class="btn btn-primary btn-view mtop2" role="button" data-toggle="modal"> 
												View
											</a>
											<!--<a href="graph.php?sid=class="btn btn-primary btn-view mtop2" role="button" data-toggle="modal"> 
												Graph
											</a>-->
											<a href="#" class="btn btn-success btn-view mtop2" role="button" data-toggle="modal"> 
												Edit
											</a>
											<a href="#"class="btn btn-danger btn-view mtop2" role="button" data-toggle="modal"> 
												Delete
											</a>
										</td>
									</tr>
									<tr class="odd gradeX">
										<td><img src="images/dummy.png" width="50" height="50"></td>
										<td>Vijay</td>
										<td>B.Sc</td>
										<td>11/02/1997</td>
										<td>7689234562</td>
										<td>Trichy</td>
										<td>30</td>
										<td>trichy</td>
										
										<td class="center last-col">
											<a href="#" class="btn btn-primary btn-view mtop2" role="button" data-toggle="modal"> 
												View
											</a>
											<!--<a href="graph.php?sid=class="btn btn-primary btn-view mtop2" role="button" data-toggle="modal"> 
												Graph
											</a>-->
											<a href="#" class="btn btn-success btn-view mtop2" role="button" data-toggle="modal"> 
												Edit
											</a>
											<a href="#"class="btn btn-danger btn-view mtop2" role="button" data-toggle="modal"> 
												Delete
											</a>
										</td>
									</tr>
									<tr class="odd gradeX">
										<td><img src="images/dummy.png" width="50" height="50"></td>
										<td>Surya</td>
										<td>B.A</td>
										<td>10/02/1995</td>
										<td>9989234562</td>
										<td>karur</td>
										<td>40</td>
										<td>karur</td>
										
										<td class="center last-col">
											<a href="#" class="btn btn-primary btn-view mtop2" role="button" data-toggle="modal"> 
												View
											</a>
											<!--<a href="graph.php?sid=class="btn btn-primary btn-view mtop2" role="button" data-toggle="modal"> 
												Graph
											</a>-->
											<a href="#" class="btn btn-success btn-view mtop2" role="button" data-toggle="modal"> 
												Edit
											</a>
											<a href="#"class="btn btn-danger btn-view mtop2" role="button" data-toggle="modal"> 
												Delete
											</a>
										</td>
									</tr>
									
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
