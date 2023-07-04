<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<html>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
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
<script type="text/javascript" src="llqrcode.js"></script>
<script type="text/javascript" src="webqr.js"></script>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>

</head>
<body onload="load(); setimg();">

		<?php
			include_once('auth.php');
			 include_once("config/db_connection.php");
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
					<h2>Please wait,You will be redirected to Staff attendance Capture!</h2>
<?php
if($_REQUEST['data']!="")
{
						extract($_POST);
						
						$sid=$_REQUEST['data'];
						$date=date('d-m-Y / h:i:sa');
						
						$explode=explode("/",$date);
						
						$adate=$explode[0];
						$time_in=$explode[1];
						
		$retrieve = mysql_query("SELECT *FROM staff WHERE sid='$sid'");
		$rows = mysql_num_rows($retrieve);
		if($rows==1)
		{
						
		$retrieve2 = mysql_query("SELECT *FROM attendance WHERE sid='$sid' && adate='$adate'");
		/* $rows2 = mysql_num_rows($retrieve2);	 */
					if($retrieve2)
					{					
						$qry=mysql_query("insert into attendance(sid,adate,status,time_in)values('$sid','$adate','p','$time_in')");
						
							if($qry)
							{
								session_start();
										
										$_SESSION['sid']=$sid;
								header("location:profile.php");
							}					
							else
							{
								echo "<script>alert('FAILURE');</script>";
								
							}
					}
					else
					{
							
							echo "<script>alert('Attendance already Submitted for this Date !');</script>";
							
					}
			}
			
					}
				?>
						


</div>
			
			<div id="footer">			
			</div>
			<script type="text/javascript">

function Redirect() 
{
    window.location="index.php";
}


setTimeout('Redirect()', 1000);

</script>
		</div>
		<!-- wrapper ends-->
	<!-- JavaScript -->
    
	</body>
	</html>