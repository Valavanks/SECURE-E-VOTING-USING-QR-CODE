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
.btn-success
{
	background:#F12064!important;
	margin-top:-15px !important;
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
    <?php
						include "dbcc.php";
						$vid=$_REQUEST['vid'];
						$vote=mysql_query("select * from voter where vid='$vid'");
						$vote_row=mysql_fetch_array($vote);
						$city=$vote_row['city'];
						?>
						
						
					
    <div class="container">
		<div class="row-fluid mtop120">
			<div class="col-lg-12 ">
				<div class="panel panel-default bg-white">
						<div class="panel-heading hidden-xs">
							<img src="images/user.png" alt=""> 
								Generate QR Coin
							
						</div>
						
						
					<!-- /.panel-heading -->
						
						
						<span style="padding:20px 20px;text-align:center;"><h2>Generate QR Coin </h2></span>
					
						 <form action="#" method="post" enctype="multipart/form-data" style="max-width:500px;margin:auto">
							
							  <div class="input-container">
								<i class="fa fa-user icon"></i>
								<input class="input-field" type="text" placeholder="candidate name" name="name" value="<?php echo ucwords($vote_row['name']); ?>" readonly>
							  </div>
							   <div class="input-container">
								<i class="fa fa-calender icon">photo</i>
								<img src="images/voter/<?php echo $vote_row['photo'] ?>" width="150" height="150">
								<!--<input class="input-field" type="file" placeholder="" name="photo">-->
							  </div>
							 
							  
							  <div class="input-container">
								<i class="fa fa-ma-marker icon">Election </i>
								<select name="election" class="form-control">
								<option value="">-- Select Election Type -- </option>
									<?php
						$qry=mysql_query("select * from election where eplace='$city'");
						while($row=mysql_fetch_array($qry))
						{
						?>
						<option value="<?php echo $row['ele_id']; ?>"><?php echo ucwords($row['ename']); ?></option>
						<?php
						}
						?>
								</select>
							  </div>
							  
							  
							  <input  type="submit" name="sub" class="btn" value="Generate Coin">
							
							</form>
							
							<?php
							
									/* echo $voter_id; */
								
								if(isset($_POST['sub']))
								{
									extract($_POST);
									$otp=rand(1,5);
									
									/* qr starts*/
					
    
									/* qr ends*/
									
									
									$check=mysql_query("select * from qr_coin where uid='$vid' and eid='$election'");
									$n=mysql_num_rows($check);
									$n1=mysql_fetch_array($check);
									$id1=$n1['qr_id'];
									if($n==0)
									{
						$insert=mysql_query("INSERT INTO  `qr_coin` 
						(`uid` ,`eid` ,`otp` )
					VALUES ('$vid',  '$election',  '$otp')");
					$data=mysql_insert_id();
					if($insert)
					{
						$update=mysql_query("insert into block_status (uid,stage1) values('$vid',1)");
						echo "<script>alert('Successfully Generated!')
							window.location='generate2.php?data=$data'</script>";
					}else
					{
						
					}
									}
									else{
										echo "<script>alert('Qr Coin already generated')
										window.location='view.php?data=$id1'</script>";
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
