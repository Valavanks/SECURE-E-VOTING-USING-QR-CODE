
<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		   
<link rel="stylesheet" type="text/css" href="assets/css/styles.css" />
<link rel="stylesheet" type="text/css" href="assets/fancybox/jquery.fancybox-1.3.4.css" />

	</head>
	
	<body>
	
		<?php
			include_once('auth.php');
			include 'config/db_connection.php';
			
			?>
		<!-- wrapper starts-->
		<div id="wrapper">			
			<div class="container-fluid">
			<div id="header">	
				<h1>AUTOMATIC QUESTION PAPER GENERATION SYSTEM <center>WITH SPAQ </center></h1>
			</div>
			
			<div id="menu">		
				
			</div>
		
			<div id="content">	
					<h2>CAPTURE ID QR CODE GENERATOR.......</h2>
					
    
    
					
							
								
									<div id="photos"></div>
											<div id="camera">
				<span class="tooltip"></span>
				<span class="camTop"></span>
    
				<div id="screen"></div>
				<div id="buttons">
					<div class="buttonPane">
							<a id="shootButton" href="" class="blueButton">Shoot!</a>
					</div>
					<div class="buttonPane hidden">
					<a id="cancelButton" href="" class="blueButton">Cancel</a>
					<a id="uploadButton" href="" class="greenButton">Upload!</a>
					</div>
				</div>
    
				<span class="settings"></span>
			</div>
			
<script src="assets/js/jquery.min.js"></script>
<script src="assets/fancybox/jquery.easing-1.3.pack.js"></script>
<script src="assets/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script src="assets/webcam/webcam.js"></script>
<script src="assets/js/script.js"></script>

									
							
							
					

						
						
					
				
					
   </div>
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	</div>
	</body>
	
