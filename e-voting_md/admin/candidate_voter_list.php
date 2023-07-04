<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title> QR Code Generation || Admin </title>
	<link rel="shortcut icon" href="../images/favicon.ico" />
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/mobile.css" rel="stylesheet">
	<style>
		#brand:hover{
			color		:	#000000;
		}
	</style>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>

<body>
	
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" id="menu">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" id="collapse-btn" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand col-lg-12" id="brand" style="color:black;"> 
					<span style="font-family:elephant">Secured E-Voting Using QR Code</span>
				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center current"><a href="candidate_detail.php">Candidate Detail</a></li>
                    <li class="text-center "><a href="candidate_schedule.php">Election Schedule</a></li>
					<li class="text-center "><a href="approved_candidate.php">Approved Candidate</a></li>
                    <li class="text-center "><a href="voter.php">Voter List</a></li>
                    
                    
                   
                   <li class="text-center"><a href="logout.php"> Logout </a></li> 
				</ul>
            </div> <!-- /.navbar-collapse -->
		</div>  <!-- /.container -->
		
    </nav>
    
    <div class="container">
		<div class="row-fluid mtop120">
			<div class="col-lg-12 ">
				<div class="panel panel-default bg-white">
						<div class="panel-heading hidden-xs">
							<img src="images/user.png" alt=""> 
								Candidate Detail
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						
						
					<!-- /.panel-heading -->
						
						
						<span style="padding:20px 20px;text-align:center;"><h2>Add Voter List </h2></span>
					
						 <form action="#" method="post" enctype="multipart/form-data" style="max-width:500px;margin:auto">
							
							  <div class="input-container">
								<i class="fa fa-user icon"></i>
								<input class="input-field" type="text" placeholder="candidate name" name="name">
							  </div>
							   <div class="input-container">
								<i class="fa fa-calender icon">photo</i>
								<input class="input-field" type="file" placeholder="" name="photo">
							  </div>
							  <div class="input-container">
								<i class="fa fa-user icon"></i>
								<input class="input-field" type="text" placeholder="Father name" name="father_name">
							  </div>
							  
							  <div class="input-container">
								<i class="fa fa-ma-marker icon">Gender</i>
								<select name="gender" class="form-control">
									<option value="male">Male</option>
									<option value="Female">Female</option>
									<option value="others">others</option>
								</select>
							  </div>
							  
							  <div class="input-container">
								<i class="fa fa-calender icon">DOB</i>
								<input class="input-field" type="date" placeholder="DOB" name="dob">
							  </div>
							  
							  <div class="input-container">
								<i class="fa fa-map-marker icon"></i>
								<textarea class="input-field"  placeholder="Address" name="address"></textarea>
							  </div>
							  
							    <div class="input-container">
								<i class="fa fa-map-marker icon"></i>
								<textarea class="input-field"  placeholder="Voter Election Place" name="city"></textarea>
							  </div>
							  
							    <div class="input-container">
								<i class="fa fa-map-marker icon"></i>
								<textarea class="input-field"  placeholder="phone" name="phone"></textarea>
							  </div>
							  
							  <input  type="submit" name="sub" class="btn">
							
							</form>
							
							<?php
							
									echo $voter_id;
								include "dbcc.php";
								if(isset($_POST['sub']))
								{
									extract($_POST);
									$voter=rand(10000,100);
									$voter_id="upx".$voter;
									$photo=$_FILES['photo']['name'];
						$lmove=move_uploaded_file($_FILES['photo']['tmp_name'],"images/voter/".$photo);
						$insert=mysql_query("INSERT INTO  `voter` 
						(`name` ,`photo` ,`father_name` ,`gender` ,`dob` ,`address` ,`voter_id`,`city`,`phone`)
					VALUES ('$name',  '$photo',  '$father_name',  '$gender',  '$dob',  '$address',  '$voter_id','$city','$phone')");
					if($insert)
					{
						echo "<script>alert('Successfully inserted!')
							window.location='voter.php'</script>";
					}else
					{
						
					}
								}
							?>
						  <br/>  <br/>
					</div>
					
					</div> <!-- col-main-7 -->
					
				</div><!-- /.panel -->
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
	</div> <!-- ./container -->
			<?php
				include_once("modal_delete.php");
			?>		
   <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/delete.js"></script>
	
	
</body>

</html>
