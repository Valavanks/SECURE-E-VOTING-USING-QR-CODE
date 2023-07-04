<?php ob_start();include "session.php"; ?>
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
		
		table tr td{
			margin-left:20px;
		}
	</style>
</head>

<body>
	<?php include "dbcc.php"; ?>
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
								Candidate Detail
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						<?php
						$cid=$_REQUEST['cid'];
						$select=mysql_query("select * from condidate where cid=$cid");
						$row=mysql_fetch_array($select); ?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
						<div class="col-md-4 mtop20 pbot20">
							<div class="row">
								<img src="../candidate/<?php echo $row['photo'] ?>" width="200" height="200">
							</div>		
						</div>		
						<div class="col-md-7 mtop20 pbot20">						
							<table>
									<tr style="margin-top:20px"><th style="color:#FF00AA">Name:</th><td style="padding-left:40px"><?php echo $row['name'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Age:</th><td style="padding-left:40px"><?php echo $row['age'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Date Of Birth:</th><td style="padding-left:40px"><?php echo $row['dob'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Gender:</th><td style="padding-left:40px"><?php echo $row['gender'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Mobile No:</th><td style="padding-left:40px"><?php echo $row['mobile'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Guardian Name:</th><td style="padding-left:40px"><?php echo $row['gname'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Qualification:</th><td style="padding-left:40px"><?php echo $row['qualification'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Present Address:</th><td style="padding-left:40px"><?php echo $row['pre_address'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Permanent Address:</th><td style="padding-left:40px"><?php echo $row['per_address'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">City:</th><td style="padding-left:40px"><?php echo $row['city'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">district:</th><td style="padding-left:40px"><?php echo $row['state'] ?></td></tr>
									<tr style="margin-top:10px"><th style="color:#FF00AA">Pincode:</th><td style="padding-left:40px"><?php echo $row['pincode'] ?></td></tr>
									
								</table>
								
						</div>
						
						<div style="height:30px;background:#007FFF;margin-top:310px">
			
						</div>
					</div>
					<!-- /.panel-body -->
					</div> <!-- col-main-7 -->
					
				</div><!-- /.panel -->
				
			</div>
			<!-- /.col-lg-12 -->
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
