
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
			label{
				color:#4576db;
				font-size:20px;
				font-weight:bold;
				margin-top:25px;
			}
			span,li{
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
		</style>
	</head>
	<body style="background:#dcd5bc">
		<?php
			include_once('auth.php');
			include 'config/db_connection.php';
			include "session.php";
			
			
				?>
		<!-- wrapper starts-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-1">
			
				</div>
				<div class="col-lg-10">
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
									<a class="nav-link" id="sss" href="sub_code.php">Subject Code</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " id="sss" href="question.php">Question Manager</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" id="sss" href="question_generator.php">Question Generator</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " id="sss" href="logout.php">Logout</a>
								</li>
								
							</ul>
						</nav>
					</div>
					<div id="content" >	
						<div style="background:white;margin-top:-10px;margin-bottom:60px;min-height:500px">	
							<div class="container">
							<div class="row">
							<div class="col-sm-12 ">
							<h1>Question Paper Generator</h1>
							<form class="form-inline" action="#" method="post">
  <div class="form-group">
   <select class="form-control" name="sub_code">
								<option value=""> -- Select Subject Code --</option>
								<?php  
								$sub=mysql_query("select * from sub_code where sid='$sid'");
								while($sub_row=mysql_fetch_array($sub))
								{
								?>
								<option value="<?php echo $sub_row['sub_code']; ?>"><?php echo $sub_row['sub_code']; ?></option>
								<?php
								}
								?>
								</select>
							
  </div>
  <div class="form-group">
    <input type="submit" name="sub" class="btn btn-primary" value="Proceed">
  </div>
  
</form>
							
								</div>
								</div>	<br/>
							
							</div>
							<?php if(isset($_POST['sub']))
							{
								extract($_POST);
								
								$question=mysql_query("select q_id from question where sub_code='$sub_code' and type='2m' ");
								while($row=mysql_fetch_array($question))
								{
								$que[]=$row[0];
								}
							
								$question3=mysql_query("select q_id from question where sub_code='$sub_code' and type='13m'");
								while($row1=mysql_fetch_array($question3))
								{
								$que1[]=$row1[0];
								}
								$question5=mysql_query("select q_id from question where sub_code='$sub_code' and type='15m'");
								while($row2=mysql_fetch_array($question5))
								{
								$que2[]=$row2[0];
								}
								
								function twomark($n,$que)
								{
								//$n=4;


$max=count($que);
if($n<=$max)
{
$rand_keys = array_rand($que,$n);

for($i=0;$i<$n;$i++)
{
$result[]=$que[$rand_keys[$i]];
}
?>
<div class="container " style="border:1px solid black;width:75%;margin:0 auto;">
<center>
<h1>Model Question Paper</h1>
<h3>Answer all the questions</h3>
<h3>Part - A</h3>
<h4 style="float:right">(10 x 2 = 20)</h4> 
</center><br><br>
<?php
$qno=1;
foreach($result as $x)
{
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	echo $qno,". ",$quest_row['question'],"<br>";
	$qno++;
}

?><br>

<?php
/* print_r($result); */
}
else
{
	echo "max limit";
}
							}	
								function thirteenmark($n,$que1)
								{
								//$n=4;


$max=count($que1);
if($n<=$max)
{
$rand_keys = array_rand($que1,$n);

for($i=0;$i<$n;$i++)
{
$result[]=$que1[$rand_keys[$i]];
}
?>

<center>
<h3>Part - B</h3>
<h4 style="float:right">(5 x 13 = 65)</h4> 
</center><br><br>
<?php
$qno=11;
foreach($result as $x)
{
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	echo $qno,". ",$quest_row['question'],"<br>";
	$qno++;
}

?><br>

<?php
/* print_r($result); */
}
else
{
	echo "max limit";
}
							}	
								function fifteenmark($n,$que2)
								{
								//$n=4;


$max=count($que2);
if($n<=$max)
{
$rand_keys = array_rand($que2,$n);

for($i=0;$i<$n;$i++)
{
$result[]=$que2[$rand_keys[$i]];
}
?>

<center>
<h3>Part - C</h3>
<h4 style="float:right">(2 x 15 = 30)</h4> 
</center><br><br>
<?php
$qno=16;
foreach($result as $x)
{
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	echo $qno,". ",$quest_row['question'],"<br>";
	
	$qno++;
}

?><br>
</div><br><br>
<?php
/* print_r($result); */
}
else
{
	echo "max limit";
}
							}
							twomark(10,$que);
							thirteenmark(10,$que1);
							fifteenmark(2,$que2);
							}								
							?>

							
						</div>
						<div style="height:50px;width:1095px;background:black;margin-top:-60px">
						
						</div>
    
					</div>
				</div>
				<div class="col-lg-1" >
			
				</div>
				<div id="footer">			
				</div>
			</div>
		</div>
		<!-- wrapper ends-->
	
	</body>
	
