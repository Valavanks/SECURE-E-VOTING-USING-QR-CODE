
<!Doctype html>

	<head>
	
		<title>WEB ROBO</title>
		
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">	 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
	
	<body style="background:#dcd5bc">
		<?php
			include_once('auth.php');
			include 'admin/dbcc.php';
			
			?>
		<!-- wrapper starts-->
				
		<div class="container" >
		<div class="row" style="background:white;">
			
			<div class="col-lg-12">
			<div id="header">	
				<h1 style="background:midnightblue;color:white;font-size:26px;padding:30px;font-family:elephant"> Secure E-Voting Using QR Code </h1>
			</div>
			
			
			
			<div class="" style="margin-top:50px;padding:0px 20px">
			<form method="post" enctype="multipart/form-data">
				<span style="margin-bottom:10px"><center><h1>Candidate Application</h1></center></span>
				  <div class="form-row">
					<div class="form-group col-md-6">
					  <label for="inputEmail4">Name</label>
					  <input type="text" class="form-control" name="name"  placeholder="Name">
					</div>
					<div class="form-group col-md-6">
					  <label for="inputPassword4">First Name</label>
					  <input type="firstname" name="fname" class="form-control"  placeholder="First Name">
					</div>
				  </div>
				  
				  
				  <div class="form-row">
					<div class="form-group col-md-4">
					 <label for="inputAddress">Age</label>
					<input type="text" name="age" class="form-control" placeholder="Enter Your age">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputAddress">DOB</label>
					<input type="date" name="dob" class="form-control" placeholder="Date of Birth">
					</div>
					<div class="form-group col-md-4">
					   <label for="inputState">Gender</label>
					  <select id="inputState" name="gender" class="form-control">
						<option selected>Choose...</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					  </select>
					</div>
				  </div>
				  
				  <div class="form-row">
					<div class="form-group col-md-4">
					<label for="inputAddress">Father/Mother/Husband Name</label>
					<input type="text" name="gname" class="form-control" id="inputAddress" placeholder="Enter Name">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputAddress">Mobile</label>
					<input type="text" name="mobile" class="form-control" placeholder="Mobile">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputAddress">Qualification</label>
					<input type="text" name="qualification" class="form-control" placeholder="Qualification">
					</div>
					
				  </div>
					
				  
				  <div class="form-group">
					<label for="inputAddress">Present Address</label>
					<textarea class="form-control" name="pre_address" id="inputAddress" placeholder="1234 Main St"></textarea>					
				  </div>
				  
				  <div class="form-group">
					<label for="inputAddress2">Permanent Address </label>
					<textarea class="form-control" name="per_address" id="inputAddress2" placeholder="Apartment, studio, or floor"></textarea>
				  </div>
				  
				  <div class="form-row">
					<div class="form-group col-md-6">
					  <label for="inputCity">City</label>
					  <input type="text" name="city" class="form-control" id="inputCity">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputState">District</label>
					    <input type="text" name="state" class="form-control">
					</div>
					<div class="form-group col-md-2">
					  <label for="inputZip">PinCode</label>
					  <input type="text" name="pincode" class="form-control">
					</div>
				  </div>
				  
				  				  
				  <div  style="margin-bottom:20px">
					  <input type="file" name="photo" class="form-control">
					  
				 </div>
				   <div  style="margin-bottom:20px">
				   <label for="inputZip">Election Schedule</label>
					  <select id="inputState" name="election" class="form-control">
						<option selected>Choose...</option>
						<?php
						$qry=mysql_query("select * from election");
						while($row=mysql_fetch_array($qry))
						{
						?>
						<option value="<?php echo $row['ele_id']; ?>"><?php echo $row['ename']."_".$row['eplace']; ?></option>
						<?php
						}
						?>
					  </select>
					  
				 </div>
				  
				  <button type="submit" name="apply" class="btn btn-primary">Submit</button>
				</form>
				
				<?php 
					if(isset($_POST['apply']))
					{
						extract($_POST);
						$photo=$_FILES['photo']['name'];
						$lmove=move_uploaded_file($_FILES['photo']['tmp_name'],"candidate/".$photo);
						$insert=mysql_query("INSERT INTO `condidate` 
						(`name` ,`fname` ,`age` ,`dob` ,`gender` ,`gname` ,`mobile` ,`qualification` ,`pre_address` ,`per_address` ,`city` ,`state` ,`pincode` ,`photo`,`election`)VALUES 
						('$name',  '$fname',  '$age',  '$dob',  '$gender',  '$gname','$mobile', '$qualification',  '$pre_address',  '$per_address', '$city',  '$state',  '$pincode',  '$photo','$election')");
						
						if($insert)
						{
							echo "<script>alert('Successfully Applied!');</script>";
						}else{
							echo "<script>alert('Try Again!');</script>";
						}
					}
				?>
				</div>
				<br/>
			<div style="height:50px;background:black">
						
			</div>
			</div>
		
			<div id="footer">			
			</div>
			</div>
		</div>
		<!-- wrapper ends-->
	
	</body>
	
