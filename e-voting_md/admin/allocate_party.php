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
	<?php include "dbcc.php"; ?>
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
                    <li class="text-center "><a href="candidate_voter_list.php">Voter List</a></li>
                    
                    
                   
                   <li class="text-center"><a href="logout.php"> Logout </a></li> 
				</ul>
            </div> <!-- /.navbar-collapse -->
		</div>  <!-- /.container -->
		
    </nav>
    
    <div class="container">
		<div class="row">
		
				<div class="panel panel-default bg-white">
						<div class="panel-heading hidden-xs">
							<img src="images/user.png" alt=""> 
								Allocate Party
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						
						<!-- start-->
						<span style="padding:20px 20px;text-align:center;"><h2>Allocate Party </h2></span>
					
						 <form action="#" method="post" enctype="multipart/form-data" style="max-width:500px;margin:auto">
								<?php $cid=$_REQUEST['cid']; 
								$select=mysql_query("select * from condidate where cid=$cid");
								$row=mysql_fetch_array($select);
								?>
								<div class="input-container">
								
								<center><img style="margin-left:191px;border:1px;border-radius:50%" src="../candidate/<?php echo $row['photo'] ?>" width="250" height="250"></center>
							  </div>
							  <div class="input-container">
								<i class="fa fa-envelo icon">Name</i>
								<input class="input-field" type="text" placeholder="Candidate name" value="<?php echo $row['name'] ?>" name="ename">
							  </div>
							  
							  <div class="input-container">
								
								<i class="fa fa-envelo icon">Party</i>
									<select name="party" class="form-control" id="exampleFormControlSelect1">
										<option>Choose Party...</option>
										<?php $party=mysql_query("select * from party where status=0");
										while($fparty=mysql_fetch_array($party)){?>
									  <option value="<?php echo $fparty['party_name'] ?>"><?php echo $fparty['party_name'] ?></option>
										<?php } ?>
										
									</select><a style="padding:5px 10px" class=" btn-primary " href="add_party.php">ADD</a>
								</div>
								<div class="input-container">
								<i class="fa fa-envelo icon">Symbol</i>
								<input class="input-field" type="file" placeholder=""  name="image">
							  </div>
								
							 <input type="submit" name="s1" value="SUBMIT" class="btn">
							
							</form>
							<?php
								include "dbcc.php";
								if(isset($_POST['s1']))
								{
									extract($_POST);
									$image=$_FILES['image']['name'];
						$lmove=move_uploaded_file($_FILES['image']['tmp_name'],"images/party/".$image);
									$insert=mysql_query("INSERT INTO  `allocate_party` 
									(`cid` ,`party` ,`symbol` )VALUES ('$cid',  '$party',  '$image')");
									if($insert)
									{
										$update=mysql_query("update party set status=1 where party_name='$party'");
										echo "<script>alert('success')</script>";
										
									}else{
										echo "<script>alert('Try again!')</script>";
									}
								}
							?>
							
						  <br/>  <br/>
						<!-- end-->
						
				</div>
	
			
			
		</div><!-- /.panel -->
			</div><!-- /.col-lg-12 -->
	
	
			<?php
				include_once("modal_delete.php");
			?>		
   <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/delete.js"></script>
	
	
</body>

</html>
