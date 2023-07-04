<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<html>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<?php include_once("config/db_connection.php"); ?>
<style type="text/css">

#qrfile{
    width:320px;
    height:240px;
}
#qr-canvas{
    display:none;
}
#outdiv
{
    width:320px;
    height:240px;
    border: solid;
    border-width: 1px 1px 1px 1px;
	margin:20px 0px 0px 200px;
}
#result{
    border: solid;
    border-width: 1px 1px 1px 1px;
    padding:20px;
    width:37.3%;
	background:#e1e1e1;
	color:#4CB848;
	margin:20px 0px 0px 200px;
}
#imghelp{
    position:relative;
    left:0px;
    top:-160px;
    z-index:100;
    font:18px arial,sans-serif;
    background:#f0f0f0;
    margin-left:35px;
    margin-right:35px;
    padding-top:10px;
    padding-bottom:10px;
    border-radius:20px;
}
p.helptext{
    margin-top:54px;
    font:18px arial,sans-serif;
}
p.helptext2{
    margin-top:100px;
    font:18px arial,sans-serif;
}
</style>

</head>
<body onload="load(); setimg();">

		<?php
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
						
					<li> <a href="index.php">LOGOUT</a></li>			
				</ul>
			</div>
		
			<div id="content">	
					<h2>Quick Response Code Reader</h2>
<div id="main">
<div id="mainbody">
<div id="outdiv">
</div>
<div id="result"></div>
<a href="#" class="btn btn-success" id="go-bill" style="background:red;padding:10px;color:white;">
	Finish
</a>
</div></div>           
<canvas id="qr-canvas" width="800" height="600"></canvas> <!--Canvas to draw image -->


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