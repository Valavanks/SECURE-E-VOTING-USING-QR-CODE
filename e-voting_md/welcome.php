
<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<html>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<script src="jquery1.9.1.js" rel="javascript" type="text/javascript">
	</script>
	<style>
		#welcome{
			width	:	450px;
			min-height	:	250px;
			background	:	#e1e1e1;
			margin	:	0 auto;
			border-radius	:	8px;
			padding-top	:	4px;
		}
		#welcome h2,h4{
			color		:	black;
		}
		h4{
			margin-left		:	18px;
		}
	</style>
	
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
	<div id="welcome">
		<h2>Welcome : <?php echo $fetch['sname']; ?>
			<span style="color:white;"> 
			</span>
		</h2><hr>
		<p>
			<h4>Name	:	<?php echo  $fetch['sname']; ?></h4>
			<h4>Qualification	:	<?php echo $fetch['qualification']; ?></h4>
			<h4>Designation	:	<?php echo $fetch['designation']; ?></h4>
			<h4>Department	:	<?php echo $fetch['dept']; ?></h4>
			<h4>Mobile	:	<?php echo $fetch['mobile']; ?></h4>
			<h4>Email	:	<?php echo $fetch['email']; ?></h4>
			<h4>Address	:	<?php echo $fetch['address']; ?></h4>
			
		</p>
	</div>
</div>
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	
	</body>
	</html>