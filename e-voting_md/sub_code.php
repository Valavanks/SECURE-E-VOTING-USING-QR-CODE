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
			label,{
				color:#4576db;
				font-size:20px;
				font-weight:bold;
				margin-top:25px;
			}
			span{
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
				background:black;
			}
			#sss:hover
			{
				color:white;
				background:black;
			}
			.head{
				color:#4576db;
				font-size:30px;
				font-weight:bold;
				margin-top:45px;
				text-align:center;
				
			}
			table{
				text-align:center;
			}
			table, th, td {
			  border: 1px solid gray;
			}
		</style>
	</head>
	<body style="background:#dcd5bc">
		<?php
			include_once('auth.php');
			include 'config/db_connection.php';
			include "session.php";
			
			$select=mysql_query("select * from sub_code where sid='$sid'");
			
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
					<div id="content"> 	
						<div style="background:white;margin-top:-50px;margin-bottom:60px;min-height:500px;">
						<br><br><br>
							<a href="add_sub_code.php" class="btn btn-danger" style="float:right;margin-right:70px">Add Subject Code</a>	
							<center class="head">Subject Code</center><br><br/>
							<center>
								<table cellpadding="5" style="width:900px;color:gray;">
								<tr>
									<th>S.NO</th>
									<th>Subject Code</th>
									<th>Title</th>
									<th>Description</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
									<?php 
										$i=1;
									while($row=mysql_fetch_array($select)){ ?>
										<tr>
										<td><?php echo $i;  ?></td>
										<td><?php echo $row['sub_code']; ?></td>
										<td><?php echo $row['title']; ?></td>
										<td><?php echo $row['description']; ?></td>
										<td><a href="edit_sub_code.php?id=<?php echo $row['id'];?>" class="btn btn-info">Edit</a></td>
										<td><a href="delete_sub.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
										
										</tr>
									<?php	$i++; }?>
								</table>
							</center>
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
	
