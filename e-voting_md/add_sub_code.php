
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
		<style>
			label{
				color:#4576db;
				font-size:20px;
				font-weight:bold;
				margin-top:25px;
			}
			span,li{
				font-size:20px;
				margin-left:20px;
			}
			.nav-item{
				padding:3px 25px;
				font-size:20px;
				font-weight:bold;
			}
			.active{
				color:white !important;
				background:#000;
			}
			#sss:hover
			{
				color:white;
				background:#000;
			}
		</style>
	</head>
	<body style="background:#dcd5bc">
		<?php
			include_once('auth.php');
			include 'config/db_connection.php';
			include "session.php";
			
			$select=mysql_query("select * from question where sid='$sid'");
				?>
		<!-- wrapper starts-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div id="header">	
						<h1 style="background:#0fa1f2;color:white;font-size:26px;padding:30px;"><center>AUTOMATIC QUESTION PAPER GENERATION SYSTEM WITH SPAQ </center>
						</h1>
					</div>
					<div style="margin-top:-10px">
						<nav class="navbar navbar-expand-sm bg-light">
							<ul class="navbar-nav">
								<li class="nav-item">
									<a class="nav-link" id="sss" href="profile.php">Profile</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" id="sss" href="sub_code.php">Subject Code</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="sss" href="question.php">Question Manager</a>
								</li>
									<li class="nav-item">
									<a class="nav-link" id="sss" href="question_generator.php">Question Generator</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " id="sss" href="view_question_bank.php">Question Bank</a>
								</li>
								
									<li class="nav-item">
									<a class="nav-link" id="sss" href="logout.php">Logout</a>
								</li>
							</ul>
						</nav>
					</div>
					<div id="content" >	
						<div style="background:white;margin-top:-10px;margin-bottom:60px;min-height:500px">	
					
							<div class="container">
								
							<form method="post" ><br>
							<center class="head"><h2>Subject Code</h2></center><br><br/>
							<div class="row">
							<div class="col-sm-6">
							<label>Subject Code:</label>
								<input style="width:100%" type="text" name="sub_code" class="form-control">
								</div>
								<div class="col-sm-6">
								<label>Title:</label>
								<input style="width:100%" type="text" name="title" class="form-control">
								</div><div class="col-sm-12">
								<label>Description:</label>
								<textarea style="width:100%" rows="5" name="description" class="form-control"></textarea>
								</div></div><br><input type="submit" name="sub" class="btn btn-primary" style="float:right"value="SUBMIT">
							</form></div>
							<?php if(isset($_POST['sub']))
							{
								extract($_POST);
								$insert=mysql_query("insert into sub_code(sid,sub_code,title,description)values('$sid','$sub_code','$title','$description')");
								if($insert){
									echo "<script>alert('success')</script>";
								}else{
									echo "<script>alert('failed')</script>";
								}
							}								
							?>

							
						</div>
						<div style="height:50px;background:black;margin-top:-60px">
						
						</div>
    
					</div>
				<div id="footer">			
				</div>
				</div>
			</div>
		</div>
		<!-- wrapper ends-->
	
	</body>
	
