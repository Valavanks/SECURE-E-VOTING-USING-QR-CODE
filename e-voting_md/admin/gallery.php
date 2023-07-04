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
					WEBSITE SECURITY USING DATA HIDING IN QR CODE
				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    <li class="text-center current"><a href="gallery.php">User Images</a></li>
                    <li class="text-center"><a href="staff.php">Staff Detail</a></li>
                    <li class="text-center"><a href="attendance.php">Attendance</a></li>
                   
                   <li class="text-center"><a href="logout.php"> Logout </a></li> 
				</ul>
            </div> <!-- /.navbar-collapse -->
		</div>  <!-- /.container -->
		
    </nav>
    
    <div class="container">
		<div class="row-fluid mtop120">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-default bg-white">
						<div class="panel-heading hidden-xs">
							<img src="images/user.png" alt=""> 
								User Images
							<span class="span-crumb pull-right mtop10"> 
								<a href="UK ACCOUNTS & TAX LTD" class="white-color mtop10"> Logout </a>
							</span>
						</div>
						
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
					<div class="panel-body">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pbot20">
							<div class="row">
								<form name="addProductForm" method="POST" action="" class="pad20" enctype="multipart/form-data">
									<input type="file" name="imageName" id="gallery-image" class="col-lg-7 col-md-7 col-sm-7 col-xs-12 mtop10">
									<input type="submit" value="Add Image" name="addImage" id="add-image" class="btn btn-success col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12 mtop10">
								</form>
								<?php
									if(isset($_POST['addImage'])){
										$imageName = $_FILES['imageName']['name'];
										if($imageName!=""){
											/** Gets maxid from gallery table to merge to the image name **/
											$getId = mysql_query("SELECT MAX(id) AS 'max' FROM admin");
											$fetchId = mysql_fetch_array($getId);
											$maxId = $fetchId['max'];
											$imageName =  $maxId.$imageName;
											
											$moveImage = move_uploaded_file($_FILES['imageName']['tmp_name'],"../images/".$imageName);
											/** insert data to the gallery table **/
											$insertData = mysql_query("INSERT into admin(image_name) values('$imageName')");
											if($insertData){
												header("location:gallery.php");
											}else{
												echo '<script>
														window.alert("Sorry Image not added. Try again");
													</script>';
											} 
										}else{
											echo '<script>
													window.alert("Please Add the image before proceed");
												</script>';
										}
									}
								?>
							</div>		
						</div>
						<?php
							$retrieveData = @mysql_query("SELECT *FROM admin");
							$countData = @mysql_num_rows($retrieveData);
							if($countData>=1){
								while($fetchData=@mysql_fetch_array($retrieveData)){
									?>
									<div class="pad5 col-lg-3 col-md-3 col-sm-3 mtop10 no-margin no-padding">
										<img src="../images/<?php echo $fetchData['image_name']; ?>" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-margin no-padding  blue-br-3"> 
										<span class="col-lg-12 col-md-12 col-md-12 col-xs-12 no-margin no-padding dmtop50">
											<a data-toggle="modal" href="#modal-delete" image="<?php echo $fetchData['image_name']; ?>" table="admin" id="<?php echo $fetchData['id']; ?>" class="delete-item">
												<img src="images/delete.png" class="no-margin no-padding" width="50">
											</a>
										</span>
									</div>
									<?php
								}
							}else{
								echo '<center class="blue-color lead"> No any Images available now. ADD IT NOW. </center>';
							}
						?>
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
