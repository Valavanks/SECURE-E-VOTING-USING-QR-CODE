
<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype html>

	<head>
	
		<title>WEB ROBO</title>
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">	 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

	<style>
	
div#content.back1
{
	background-image:url("images/vote1.jpg")!important;
	background-repeat:no-repeat;
	background-position:center;
	background-attachment:fixed;

	margin-top:-10px;
	margin-bottom:60px;
	height:500px
}
	</style>
	</head>
	
	<body style="background:#dcd5bc">
		<?php
			
			include 'admin/dbcc.php';
			
			?>
		<!-- wrapper starts-->
				
		<div class="container">
		<div class="row">
			
			<div class="col-lg-12">
			<div id="header">	
				<h1 style="background:midnightblue;color:white;font-size:26px;padding:30px;font-family:elephant"> Secure E-Voting Using QR Code </h1>
			</div>
			
			<div id="content" class="back1">	
					<a href="candidate_application_form.php" class="btn" style="float:right;margin:20px;background:darkgreen;color:white;">Candidate Application</a>
					<a href="admin/index.php" class="btn " style="float:right;margin:20px;background:maroon;color:white;">Admin Login</a>
						<br/><br/><br/>	<br/><br/><br/>	
   <center>
   <?php
   $date=date("Y-m-d");
   $schedule=mysql_query("select * from election where date='$date'");
   $n=mysql_num_rows($schedule);
   if($n!=0)
   {
   ?>
   <div >
			<video id="preview"></video>
			<input type="hidden" value="<?php /* echo $otp; */?>" id="ot">
    <script type="text/javascript">
	////////////////////////////////////////////////////////////////////////////////////////////camera
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
		  /* var ot="<?php echo $otp; ?>"; */
		  if(content)
		  {
        
		window.location="check.php?data="+ content;
		  }
		 
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
			
			</div>
			<?php
   }
   else
   {
	  echo "<img src='images/no_election.jpg'>"; 
	 echo "<h2> There is no election schedule today </h2>";
   }
   ?>
			</center>
			</div>
			
			<div style="height:50px;background:black">
						
			</div>
			
			</div>
		
			<div id="footer">			
			</div>
			</div>
		</div>
		<!-- wrapper ends-->
	
	</body>
	
