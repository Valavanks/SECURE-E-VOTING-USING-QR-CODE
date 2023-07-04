<?php ob_start();$sid=$_REQUEST['sid']; ?>
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
AUTOMATIC QUESTION PAPER GENERATION SYSTEM WITH SPAQ				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center"><a href="staff.php">Staff Detail</a></li>
                   
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
							</span>
						</div>
						
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
						<div class="col-lg-12 bg-white" id="chart-area">
						
						<div id="visualization" style="width: 900px; height: 400px;"></div>

						<?php
			
			 
			 $select_query = mysql_query("SELECT *FROM staff where sid='$sid'");
			 $row = mysql_fetch_array($select_query);
			 
		
				$sname=$row['sname'];
			 
			 
			 
				 $query = mysql_query("SELECT *FROM attendance where sid='$sid'");
				 $n=mysql_num_rows($query);
				 
			 
			 
			 
			 ?>
							<!-- load api -->
							<script type="text/javascript" src="http://www.google.com/jsapi"></script>
							
							<script type="text/javascript">
								//load package
								google.load('visualization', '1', {packages: ['corechart']});
							</script>

							<script type="text/javascript">
								function drawVisualization() {
									// Create and populate the data table.
									var data = google.visualization.arrayToDataTable([
										['PL', 'Total Days', 'Attended', 'Absent'],
										<?php
											$total_days = 30;
											
												$z = $total_days-$n;
												
												echo "['{$sname}', {$total_days}, {$n}, {$z}],";
											
										?>
									]);

									/** Create and draw the visualization.
									  * can use BarChart() or
												ColumnChart() or
												AreaChart() or
												PieChart() or
												LineChart() or
												ScatterChart()
									  **/
									new google.visualization.ColumnChart(document.getElementById('visualization')).
									draw(data, {title:"Column Chart for Staff Attendance :"});
								}

								google.setOnLoadCallback(drawVisualization);
							</script>
						
					</div> 
					
	

</div>
						
						<!-- /.table-responsive -->
						
					</div><!-- /.panel-body -->
					
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
