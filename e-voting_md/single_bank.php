
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
		
<script>
	function printProfile()
	{
		window.print();
	}
</script>
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
									<a class="nav-link" id="sss" href="sub_code.php">Subject Code</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " id="sss" href="question.php">Question Manager</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " id="sss" href="question_generator.php">Question Generator</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active " id="sss" href="view_question_bank.php">Question Bank</a>
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
							
		
							
								</div>
								</div>	
								<br/>
							</div>
							<?php 
							$qbid=$_REQUEST['qbid'];
							$query=mysql_query("select * from question_bank where qbid=$qbid");
							$row =mysql_fetch_array($query);
							if($row['question_category']=='1unit')
							{
								$two_mark=$row['two_marks'];
							$thirteen_mark=$row['thirteen_marks'];
							$two_marks=explode(",",$two_mark);
							$thirteen_marks=explode(",",$thirteen_mark);
							
							}
							else
							{
							$two_mark=$row['two_marks'];
							$thirteen_mark=$row['thirteen_marks'];
							$fivteen_mark=$row['fifteen_marks'];
							$two_marks=explode(",",$two_mark);
							$thirteen_marks=explode(",",$thirteen_mark);
							$fivteen_marks=explode(",",$fivteen_mark);
							}			
							?>
<button onclick="printProfile()" class="noPrint btn btn-info" style="float:right;margin:20px">Print</button><br><br>
								<br/>
								<br/>
							
											
											<div class="container " style="border:1px solid black;width:75%;margin:0 auto;">
<?php
if($row['question_category']=='1unit')
{
?>				
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
<h4 style="float:right">(3 x 10 = 30)</h4> 
</center><br><br>
<?php
$qno=11;
$qn=11;
foreach($thirteen_marks as $x)
{
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	
	echo $qno,". ",$quest_row['question'],"<br>";
	$qno++;
}

?><br>
<?php
}
else
{ 
?>	
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
<?php
}
?>
			
							
						</div>
						<button onclick="printProfile()" class="noPrint btn btn-info" style="float:right;margin:20px">Print</button><br><br>
						
					
						<div style="height:50px;background:black;margin-top:60px">
						
						</div>
    
					</div>
				
				<div id="footer">			
				</div></div>
				
			</div>
		</div>
		<!-- wrapper ends-->
	
	</body>
	
