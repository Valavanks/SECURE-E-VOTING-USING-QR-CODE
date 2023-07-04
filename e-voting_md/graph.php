
<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<html>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<script src="jquery1.9.1.js" rel="javascript" type="text/javascript">
	</script>
	
	
</head>
<body>
		<?php
			include_once('auth.php');
			include_once('config/db_connection.php');
		?>
		<!-- wrapper starts-->
		<div id="wrapper">			
			
			<div id="header">	
				<h1>WEBSITE SECURITY USING DATA HIDING IN QR CODE</h1>
			</div>
			
			<div id="menu">		
				<ul>					
					<li> <a href="welcome.php" class="active">Profile</a>  </li>			
					<li> <a href="index2.php">QR Code Generator</a>  </li>		<li> <a href="capture.php" >Web cam</a>  </li>		
					<li> <a href="decode.php">QR Reader</a>  </li>	
					<li> <a href="graph.php">Graph</a>  </li>
					<li> <a href="index.php">LOGOUT</a></li>			
				</ul>
			</div>
		
			<div id="content">	
					<h2>Secured Login Using Image Processing</h2>
<body>

	<?php
		
		$sid = $_SESSION['sid'];
		$retrieve = mysql_query("SELECT * FROM staff where sid='$sid'");
		$fetch = mysql_fetch_array($retrieve);
	
	?>
	<div class="col-lg-12 bg-white" id="chart-area">
						
						<div id="visualization" style="width: 900px; height: 400px;"></div>

						<?php
						/**	
						$querys = mysql_query("select * from purchase"); 
						**/
						$total_days = 80;
						$querys = array(
									array('name'=>'Suresh','attended'=>80),
									array('name'=>'Prabhu','attended'=>69),
									array('name'=>'Malathi','attended'=>62),
									array('name'=>'Mahesh','attended'=>53)
								);
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
											foreach($querys as $querys_element){
												$absent = $total_days - $querys_element['attended'];
												$person_name = $querys_element['name'];
												$attended = $querys_element['attended'];
												
												echo "['{$person_name}', {$total_days}, {$attended}, {$absent}],";
											}
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
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	
	</body>
	</html>