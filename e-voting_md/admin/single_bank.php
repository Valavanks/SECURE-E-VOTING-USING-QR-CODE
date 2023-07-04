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
                 <a class="navbar-brand col-lg-12" id="brand" style="color:black;"> 
					AUTOMATIC QUESTION PAPER GENERATION SYSTEM  WITH SPAQ
					
				</a>
            </div>
            
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				
				<ul class="nav navbar-nav navbar-right admin-ul" id="collapse-ul">
                    
                    <li class="text-center "><a href="staff.php">Staff Detail</a></li>
                    <li class="text-center current"><a href="quest_bank.php">Question Bank</a></li>
                    
                    
                   
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
								QUESTION BANK
							<span class="span-crumb pull-right mtop10"> 
							</span>
						</div>
						
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-white">
					<!-- /.panel-heading -->
						<!--<div style="background:white;margin-top:-10px;margin-bottom:60px;min-height:500px">	-->
							<div class="container">
							<div class="row">
							<div class="col-sm-12 ">
							
		
							
								</div>
								</div>	
								<br/>
							</div>
							<?php 
							$qbid=$_REQUEST['qbid'];
							$query=mysql_query("select * from question_bank where qbid=$qbid");
							$row =mysql_fetch_array($query);
							$two_mark=$row['two_marks'];
							$thirteen_mark=$row['thirteen_marks'];
							$fivteen_mark=$row['fifteen_marks'];
							$two_marks=explode(",",$two_mark);
							$thirteen_marks=explode(",",$thirteen_mark);
							$fivteen_marks=explode(",",$fivteen_mark);
											
							?>
<button onclick="printProfile()" class="noPrint btn btn-info" style="float:right;margin:20px">Print</button><br><br>
								<br/>
								<br/>
							
											
											<div class="container " style="border:1px solid black;width:75%;margin:0 auto;">
											
<center>
<h1><?php echo ucwords($row['question_title']); ?></h1>
<h3>Answer all the questions</h3>
<h3>Part - A</h3>
<h4 style="float:right">(10 x 2 = 20)</h4> 
</center><br><br>
<?php
$qno=1;
foreach($two_marks as $x)
{
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	echo $qno,". ",$quest_row['question'],"<br>";
	$qno++;
}

?><br>

<center>
<h3>Part - B</h3>
<h4 style="float:right">(5 x 13 = 65)</h4> 
</center><br><br>
<?php
$qno=11;
$qn=11;
foreach($thirteen_marks as $x)
{
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	
	if($qno%2!=0)
	{	
		
		echo $qn,". a) ",$quest_row['question'],"<br>";
		
		echo "<br/> <center>--------  OR -------------- </center><BR/>";
	}
	else
	{
		
		echo $qn,". b) ",$quest_row['question'],"<br>";
		$qn++;
		
	}
	$qno++;
	echo "<br/>";
}

?><br>

<center>
<h3>Part - c</h3>
<h4 style="float:right">(1 x 15 = 15)</h4> 
</center><br><br>
<?php
$qno=16;

for($i=0;$i<4;$i++)
{
	if($i==0||$i==2)
	{
		continue;
	}
	$x=$fivteen_marks[$i];
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	if($i==1)
	{
		echo $qno,". a) ",$quest_row['question'],"<br>";
		echo "<br/> <center>--------  OR -------------- </center><BR/>";
	}
	else
	{
		echo $qno,". b) ",$quest_row['question'],"<br>";
	}
	
	
}



?><br>
			
							
						</div>
						<button onclick="printProfile()" class="noPrint btn btn-info" style="float:right;margin:20px">Print</button><br><br>
						
					
						<div style="height:50px;background:black;margin-top:60px">
						
						</div>
    
					
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
