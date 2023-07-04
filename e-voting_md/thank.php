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
				
				<!--<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center current"><a href="candidate_detail.php">Candidate Detail</a></li>
                    <li class="text-center "><a href="candidate_schedule.php">Election Schedule</a></li>
					<li class="text-center "><a href="approved_candidate.php">Approved Candidate</a></li>
                    <li class="text-center "><a href="voter.php">Voter List</a></li>
                    
                    
                   
                    <li class="text-center"><a href="index.php"> Logout </a></li> 
				</ul>
            </div> <!-- /.navbar-collapse -->
		</div>  <!-- /.container -->
		
    </nav>
    
    <div class="container">
		<div class="row-fluid mtop120">
			<div class="col-lg-12 ">
				<div class="panel panel-default bg-white">
				<form action="#" method="post">
						<div class="panel-heading hidden-xs">
							<img src="images/user.png" alt=""> 
								Vote 
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						
						<?php 
						include "admin/dbcc.php";
						$vid=$_REQUEST['vid'];
						$status_update=mysql_query("update block_status set stage6=1 where uid='$vid'");
					?>
					<center><img src="images/thanks.jpeg"></center>
					<h2 style="text-align:center">Your vote has been submitted</h2>
					<center><a href="index.php" style="padding:10px; ">Back to Home</a></center>
					<br><br>
					<!-- /.panel-body -->
					</div> <!-- col-main-7 -->
					
				</div><!-- /.panel -->
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div> <!-- ./container -->
			<?php
				//include_once("modal_delete.php");
			?>		
   <!-- JavaScript -->
   <script>
function goBack() {
  window.history.go(-1);
}
</script>
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
