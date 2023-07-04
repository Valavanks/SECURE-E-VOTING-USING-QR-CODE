
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
	</head>
	
	<body style="background:#dcd5bc">
		<?php
			
			include 'dbcc.php';
			
			?>
		<!-- wrapper starts-->
				
		<div class="container" >
		<div class="row" style="background:white;">
			
			<div class="col-lg-12">
			<div id="header">	
				<h1 style="background:midnightblue;color:white;font-size:26px;padding:30px;font-family:elephant"> Secured E-Voting Using QR Code </h1>
			</div>
			
			<?php 
				$cid=$_REQUEST['cid'];
				$select=mysql_query("select * from condidate where cid=$cid");
				$row=mysql_fetch_array($select);
			?>
			
			<div class="" style="margin-top:50px;padding:0px 20px">
			<form method="post" enctype="multipart/form-data">
				<span style="margin-bottom:10px"><center><h1>Edit Candidate Application</h1></center></span>
				  <div class="form-row">
					<div class="form-group col-md-6">
					  <label for="inputEmail4">Name</label>
					  <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name"  placeholder="Name">
					</div>
					<div class="form-group col-md-6">
					  <label for="inputPassword4">First Name</label>
					  <input type="firstname" name="fname" class="form-control" value="<?php echo $row['fname'] ?>"  placeholder="First Name">
					</div>
				  </div>
				  
				  
				  <div class="form-row">
					<div class="form-group col-md-4">
					 <label for="inputAddress">Age</label>
					<input type="text" name="age" class="form-control" value="<?php echo $row['age'] ?>" placeholder="Enter Your age">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputAddress">DOB</label>
					<input type="date" name="dob" class="form-control"  value="<?php echo $row['dob'] ?>" placeholder="Date of Birth">
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
					<input type="text" name="gname" value="<?php echo $row['gname'] ?>" class="form-control" id="inputAddress" placeholder="Enter Name">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputAddress">Mobile</label>
					<input type="text" name="mobile" value="<?php echo $row['mobile'] ?>" class="form-control" placeholder="Mobile">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputAddress">Qualification</label>
					<input type="text" name="qualification" value="<?php echo $row['qualification'] ?>" class="form-control" placeholder="Qualification">
					</div>
					
				  </div>
					
				  
				  <div class="form-group">
					<label for="inputAddress">Present Address</label>
					<textarea class="form-control" name="pre_address" value="<?php echo $row['pre_address'] ?>" id="inputAddress" placeholder="1234 Main St"></textarea>					
				  </div>
				  
				  <div class="form-group">
					<label for="inputAddress2">Permanent Address </label>
					<textarea class="form-control" value="<?php echo $row['per_address'] ?>" name="per_address" id="inputAddress2" placeholder="Apartment, studio, or floor"></textarea>
				  </div>
				  
				  <div class="form-row">
					<div class="form-group col-md-6">
					  <label for="inputCity">City</label>
					  <input type="text" value="<?php echo $row['city'] ?>" name="city" class="form-control" id="inputCity">
					</div>
					<div class="form-group col-md-4">
					  <label for="inputState">State</label>
					  <select id="inputState" name="state" class="form-control">
						<option selected>Choose...</option>
						<option value="Andra Pradesh">Andra Pradesh</option>
						<option value="Arunachal Pradesh">Arunachal Pradesh</option>
						<option value="Assam">Assam</option>
						<option value="Bihar">Bihar</option>
						<option value="Chhattisgarh">Chhattisgarh</option>
						<option value="Goa">Goa</option>
						<option value="Gujarat">Gujarat</option>
						<option value="Haryana">Haryana</option>
						<option value="Himachal Pradesh">Himachal Pradesh</option>
						<option value="Jammu and Kashmir">Jammu and Kashmir</option>
						<option value="Jharkhand">Jharkhand</option>
						<option value="Karnataka">Karnataka</option>
						<option value="Kerala">Kerala</option>
						<option value="Madya Pradesh">Madya Pradesh</option>
						<option value="Maharashtra">Maharashtra</option>
						<option value="Manipur">Manipur</option>
						<option value="Meghalaya">Meghalaya</option>
						<option value="Mizoram">Mizoram</option>
						<option value="Nagaland">Nagaland</option>
						<option value="Orissa">Orissa</option>
						<option value="Punjab">Punjab</option>
						<option value="Rajasthan">Rajasthan</option>
						<option value="Sikkim">Sikkim</option>
						<option value="Tamil Nadu">Tamil Nadu</option>
						<option value="Telagana">Telagana</option>
						<option value="Tripura">Tripura</option>
						<option value="Uttaranchal">Uttaranchal</option>
						<option value="Uttar Pradesh">Uttar Pradesh</option>
						<option value="West Bengal">West Bengal</option>
						
						
					  </select>
					</div>
					<div class="form-group col-md-2">
					  <label for="inputZip">PinCode</label>
					  <input type="text" value="<?php echo $row['pincode'] ?>" name="pincode" class="form-control">
					</div>
				  </div>
				  <div  style="margin-bottom:20px">
					<img src="../candidate/<?php echo $row['photo']; ?>" height="100" width="100">
				  </div>
				  				  
				  <div  style="margin-bottom:20px">
					
					  <input type="file" name="photo" class="form-control">
					  
				 </div>
				  
				  <button type="submit" name="apply" class="btn btn-primary">Submit</button>
				</form>
				
				<?php 
					if(isset($_POST['apply']))
					{
						extract($_POST);
						$photo=$_FILES['photo']['name'];
						$lmove=move_uploaded_file($_FILES['photo']['tmp_name'],"../candidate/".$photo);
						
						$update=mysql_query("update condidate set name='$name',fname='$fname',age='$age',dob='$dob',gender='$gender',
						gname='$gname',mobile='$mobile',qualification='$qualification',pre_address='$pre_address',per_address='$per_address',
						city='$city',state='$state',pincode='$pincode',photo='$photo'where cid=$cid");
						
						
						if($update)
						{
							echo "<script>alert('Successfully updated!')
							window.location='candidate_detail.php';</script>";
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
	
