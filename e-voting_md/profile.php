
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
			.nav-item{
				padding:3px 25px;
				font-size:20px;
				font-weight:bold;
			}
			.active{
				color:white !important;
				background:black;
			}
			
			label{
				color:#4576db;
				font-size:20px;
				font-weight:bold;
				margin-left:25px;
			}
			span{
				font-size:20px;
				margin-left:20px;
			}
			#sss:hover
			{
				color:white;
				background:black;
			}
		</style>
	</head>
	<body style="background:#dcd5bc">
		<?php
			include_once('auth.php');
			include 'config/db_connection.php';
			include "session.php";
			
			$select=mysql_query("select * from staff where sid='$sid'");
			$row=mysql_fetch_array($select);			?>
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
									<a class="nav-link active"  href="profile.php">Profile</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="sss" href="sub_code.php">Subject Code</a>
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
							<div class="row">
								<div class="5" >
									<img style="margin:20px;margin-left:30px" src="admin/staff_image/<?php echo $row['photo'] ?>" width="300" height="400">
								</div>
								<div class="7">
								<br/>
									<label>Name:</label><span><?php echo $row['sname'] ?></span><br/><br/>
									<label>Qualification:</label><span><?php echo $row['qualification'] ?></span><br/><br/>
									<label>Designation:</label><span><?php echo $row['designation'] ?></span><br/><br/>
									<label>Department:</label><span><?php echo $row['dept'] ?></span><br/><br/>
									<label>Mobile:</label><span><?php echo $row['mobile'] ?></span><br/><br/>
									<label>Email ID:</label><span><?php echo $row['email'] ?></span><br/><br/>
									<label>Address:</label><span><?php echo $row['address'] ?></span><br/><br/>
								</div>
							</div>
						</div>
						<div style="height:50px;background:black;margin-top:-60px">
						
						</div>
    
					</div>
				
				
				<div id="footer">			
				</div></div>
			</div>
		</div>
		<!-- wrapper ends-->
	
	</body>
	
