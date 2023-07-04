<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
</head>

<body>
	<?php include_once("../config/db_connection.php"); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" id="menu">
			<div class="navbar-header">
                <button type="button" class="navbar-toggle" id="collapse-btn" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                 <a class="navbar-brand col-lg-12" id="brand"> 
AUTOMATIC QUESTION PAPER GENERATION SYSTEM WITH SPAQ
								</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center current"><a href="staff.php">Staff Detail</a></li>
					 <li class="text-center "><a href="quest_bank.php">Question Bank</a></li>
                    
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
								Add Staff Detail
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
					<div class="panel-body">
						
						<form name="addForm" id="addForm" method="post" action="" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Staff Name<span>*</span> </label>
										<input type="text" class="col-md-12 col-xs-12 mtop10" name="sname" autocomplete="off" required/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Qualification<span>*</span> </label>
										<input type="text" class="col-md-12 col-xs-12 mtop10" name="qualification" autocomplete="off" required/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Designation<span>*</span> </label>
										<input type="text" class="col-md-12 col-xs-12 mtop10" name="designation" autocomplete="off" required />
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Department<span>*</span> </label>
										<input type="text" class="col-md-12 col-xs-12 mtop10" name="dept" autocomplete="off" required />
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Mobile<span>*</span> </label>
										<input type="text" class="col-md-12 col-xs-12 mtop10" name="mobile" autocomplete="off" required/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Email<span>*</span> </label>
										<input type="text" class="col-md-12 col-xs-12 mtop10" name="email" autocomplete="off" required/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Address<span>*</span> </label>
										<input type="text" class="col-md-12 col-xs-12 mtop10" name="address" autocomplete="off" required/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Photo<span>*</span> </label>
										<input type="file" class="col-md-12 col-xs-12 mtop10" name="photo" autocomplete="off" required/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="row pad20">
										<label class="col-md-12 col-xs-12 mtop10">Password<span>*</span> </label>
										<input type="password" class="col-md-12 col-xs-12 mtop10" name="pwd" autocomplete="off" required/>
									</div>
								</div>
							</div><br/>
							
							<div class="row">
							
								<div class="col-md-7">
									<div class="row pad20">
										<input type="submit" name="s1" value="Add Staff Detail" class="btn btn-primary btn-add mtop10 mleft20 col-md-3"> 
											
										<input type="reset" name="s2" value="Clear All Data" class="btn btn-danger btn-add mtop10 mleft20 col-md-3"> 
									</div>
								</div>
								
							</div>
							
							<div class="row">
				<?php
					if(isset($_POST['s1']))
					{
						extract($_POST);
						$photo=$_FILES['photo']['name'];		
						$qry=mysql_query("insert into staff(sname,qualification,designation,dept,mobile,email,address,photo,pwd)values('$sname','$qualification','$designation','$dept','$mobile','$email','$address','$photo','$pwd')");
							
						$sid=mysql_insert_id();
						$move=move_uploaded_file($_FILES['photo']['tmp_name'],"staff_image/".$photo);
						if($move)
						{
							
							if($qry)
								{
									header("location:../qr_encode.php?data=$sid");
									echo "<script>alert('SUCCESS');</script>";
								}					
								else
								{
									echo "<script>alert('FAILURE');</script>";
								}
						}
						else
						{
							echo "<script>alert('PHOTO NOT MOVED');</script>";
						}
					}
				?>
						
						</div>	
						</form>
					</div><!-- /.panel-body -->
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
	<script>
		$(function(){
				/**
				 * function to filter the data using D-Code,D-Name,D-Qual,D-Specs
				 **/
			 
			$("#filter-user").keyup(function(){
				var current_query = $("#filter-user").val().toLowerCase();
				
				if(current_query!=""){
					$("#user-area tr").hide();
					
					$("#user-area tr").each(function(){                       
						 var keyword1 = $(this).attr("datakeyword1");
						 var keyword2 = $(this).attr("datakeyword2");
						 var keyword3 = $(this).attr("datakeyword3");
						
						if(keyword1.indexOf(current_query) >=0 || keyword2.indexOf(current_query) >=0 || keyword3.indexOf(current_query) >=0){
							$(this).show();
						} 
					}); 
				}else{
					$("#user-area tr").show();
				}  
			}); /*** end of filtering user **/
		});
	</script>
	
</body>

</html>
