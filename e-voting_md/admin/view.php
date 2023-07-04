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
	<?php include_once("dbcc.php"); ?>
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
								Generate Coin
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
						<br/><br/>
						<center>
							<div class="part"><br/><br/><br/>
								<div class="inner_part">
									<center>
										<?php
											$data=$_REQUEST['data'];
											
											$qry1=mysql_query("select * from qr_coin where qr_id='$data'");
											
											$row1=mysql_fetch_array($qry1);
											$vid=$row1['uid'];
											$qry=mysql_query("select * from voter where vid='$vid'");
											
											$row=mysql_fetch_array($qry);
											
							$photo=$row['photo'];
							
							if($row['photo']=="")
							{
										
								echo '<img src="images/dummy.png" />';
										
							}
											else
											{
											?>
											<img class="round" src="images/voter/<?php echo $photo; ?>" />
											
										<?php
											}
											echo "<br/>";
											echo "<span  class='clr'>".$row['name']."</span>&nbsp;";
											echo "<br><br>";
											
											$qr=$data.".png"; ?>
											<img src="temp/<?php echo $qr; ?>" />
											
										
									</center>
									
								</div>
								
							</div><br>
							<a href="sms.php?vid=<?php echo $vid; ?>&data=<?php echo $data;?>" class="btn btn-success">Send</a>
						</center>
						<br/><br/>
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
	
</body>

</html>
