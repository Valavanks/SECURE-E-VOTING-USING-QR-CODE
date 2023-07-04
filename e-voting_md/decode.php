<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<html>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<?php include_once("config/db_connection.php"); ?>


</head>
<body>

		<?php
			include_once('./lib/QrReader.php');
			include_once('auth.php');
		?>
		<!-- wrapper starts-->
		<div id="wrapper">			
			
			<div id="header">	
				<h1>WEBSITE SECURITY USING DATA HIDING IN QR CODE</h1>
			</div>
			
			<div id="menu">		
				<ul>					
					<li> <a href="welcome.php">Profile</a>  </li>			
					<li> <a href="index2.php">QR Code Generator</a>  </li>		<li> <a href="capture.php" >Web cam</a>  </li>		
					<li> <a href="decode.php" class="active">QR Reader</a>  </li>	
					<li> <a href="graph.php">Graph</a>  </li>	
					<li> <a href="index.php">LOGOUT</a></li>			
				</ul>
			</div>
		
			<div id="content">	
					<h2>Quick Response Code Reader</h2>
	<?php

    
    $qrcode = new QrReader('user.png');
    print $text = $qrcode->text();
	if($text!="")
	{
		unlink("user.png");
	}
    header("location:attend.php?data=$text");

?>
</div>
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	<!-- JavaScript -->
	
	
	<script type="text/javascript" src="llqrcode.js"></script>
<script type="text/javascript" src="webqr.js"></script>

<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script>
		$(function(){
			handleFiles('user.png');
		});
    </script>
    
	</body>
	</html>