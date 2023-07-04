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
					AUTOMATIC QUESTION PAPER GENERATION SYSTEM  WITH SPAQ
					
				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center "><a href="staff.php">Staff Detail</a></li>
                    <li class="text-center current"><a href="quest_bank.php">Question Bank</a></li>
                    
                    
                   
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
								QUESTION BANK
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
						<div class="col-md-4 mtop20 pbot20 hidden-xs">
							
						</div>
						<div class="col-md-4 mtop20 pbot20 visible-xs">
							
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead class="thead">
							<?php
								$i=1;
								$qry=mysql_query("select * from question_bank ");
								if($qry)
								{
							?>
								
									<tr>
										<td> S.No </td>								
										<td> Question Title </td>						
										<td> Subject Code </td>
										<td> Date </td>
										<td> Question Category </td>
										<td> Units </td>
										<td> View </td>
									</tr>
								</thead>
							<?php
							
							while($row=mysql_fetch_array($qry))
							{
								$i=1;
							?>			
								<tbody id="user-area">
									<tr class="odd gradeX">
										<td><?php echo $i;  ?></td>
										<td ><?php echo $row['question_title']; ?></td>
										<td ><?php echo $row['sub_code']; ?></td>
										<td ><?php echo $row['date']; ?></td>
										<td ><?php echo $row['question_category']; ?></td>
										<td ><?php echo $row['unit']; ?></td>
										<td style="text-align:left;font-size:18px;padding:5px;"><a href="single_bank.php?qbid=<?php echo $row['qbid']; ?>" class="btn btn-success">View</a></td>
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
