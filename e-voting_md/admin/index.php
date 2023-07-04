<?php ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login </title>
	<link rel="shortcut icon" href="images/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/mobile.css" rel="stylesheet">
   
</head>

<body>
    
    <div class="container-fluid">
		<div class="row mtop150">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<img src="images/user.png" alt=""> 
						Admin Login
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body" id="login-pages">
					
					
					
						<form name="loginForm" method="POST" action="">
							<div class="row">
								<label name="username" class="col-md-3 col-md-offset-1 col-xs-10 col-xs-offset-1 mtop10 login-text">
									Admin Name 
								</label>
									<input type="text" id="username" name="username" class="col-md-6 col-md-offset-1 col-xs-10 col-xs-offset-1 mtop10">
							</div>
							<div class="row">
								<label class="col-md-3 col-md-offset-1 col-xs-10 col-xs-offset-1 mtop10 login-text">Password </label>
									<input type="password" name="password" id="password" class="mtop10 col-md-6 col-md-offset-1 col-xs-10 col-xs-offset-1">
							</div>
							<div class="row">
								<a href="candidate_detail.php"><button type="submit" name="login" class="btn btn-pink mtop10 col-md-6 col-md-offset-5 col-xs-10 col-xs-offset-1"> 
									Login 
								</button></a>
							</div>
						</form>
						
						<?php 
						include "dbcc.php";
							if(isset($_POST['login']))
							{
								extract($_POST);
								
								$qry=mysql_query("SELECT * FROM admin WHERE username ='$username' && password ='$password'");
								
								$n=mysql_num_rows($qry);
								
								if($n==1)
								{
									$row=mysql_fetch_array($qry);
									
									session_start();
									$_SESSION['aid']=$row['aid'];
									
									header("location:candidate_schedule.php");
								}
								else
								{
									echo "invalid login details";
								}
								
							}
						?>
					</div>
					<!-- /.panel-body -->
					<a class="btn panel-heading" style="margin-left:30px;margin-bottom:20px; padding:5px 40px;" href="../">Evoting Home</a>
				</div><!-- /.panel -->
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div> <!-- ./container -->
   
	
   <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
	
</body>

</html>
