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
						session_start();
						$vid=$_SESSION['vid'];
						$eid=$_SESSION['eid'];
						$cid=$_REQUEST['cid'];
							$select=mysql_query("select * from condidate where cid=$cid");
							$row=mysql_fetch_array($select);
							
							$select1=mysql_query("select * from allocate_party where cid=$cid");
							$row1=mysql_fetch_array($select1);
							function e_data($data)
						{
							$edata=base64_encode($data);
							return $edata;
						}
						
						function d_data($data)
						{
							$ddata=base64_decode($data);
							return $ddata;
						}
							
						?>
						<input type="hidden" name="vid" value="<?php echo $vid; ?>">
						<input type="hidden" name="eid" value="<?php echo $eid; ?>">
						<input type="hidden" name="cid" value="<?php echo $cid; ?>">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
						<div class="col-md-4 mtop20 pbot20">
							<div class="row">
								<img src="admin/images/party/<?php echo $row1['symbol'] ?>" height="300" width="300px">
							</div>		
						</div>		
						<div class="col-md-8 mtop20 pbot20">						
							<h2 style="margin-top:47px;font-size:20px;margin-left:18px"><?php echo $row1['party'] ?></h2>
							<button style="margin-top: 147px;padding: 10px 40px;margin-left:40px" class="btn btn-danger btn-view mtop2" role="button" onclick="goBack()">Back</button>
							<input type="submit" name="s1" style="margin-top: 147px;padding: 10px 60px;margin-left:40px;float:right" class="btn btn-success btn-view mtop2" role="button" value="Confirm">
						</div>
						
						<br/>
						<!-- /.table-responsive -->
						
					</div>
					</form>
					<?php
					if(isset($_POST['s1']))
					{
						extract($_POST);
						$vid1=e_data($vid);
						$eid1=e_data($eid);
						$cid1=e_data($cid);
						$insert=mysql_query("insert into vote (vid,cid,eid) values ('$vid1','$cid1','$eid1') ");
						if($insert)
						{
							$check=mysql_query("update block_status set stage4='1' where uid='$vid' ");
							$check=mysql_query("update qr_coin set status='1' where uid='$vid' and eid='$eid'");
							echo "<script>alert('Your vote has been submitted successfully')
							window.location='loader.php?uid=$vid'</script>";
						}
					}
					?>
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
