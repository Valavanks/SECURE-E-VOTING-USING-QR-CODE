
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
									<a class="nav-link active" id="sss" href="question_generator.php">Question Generator</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " id="sss" href="view_question_bank.php">Question Bank</a>
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
							<form  action="#" method="post">
  	<div class="row">
  <div class="form-group col-sm-6">
  <label> </label><br>
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
  <div class="form-group col-sm-6">
  <label> Choose any 1 unit:</label><br>
   <input type="radio" name="unit" value="1" > Unit 1
   <input type="radio" name="unit" value="2" > Unit 2
   <input type="radio" name="unit" value="3" > Unit 3
   <input type="radio" name="unit" value="4" > Unit 4
   <input type="radio" name="unit" value="5" > Unit 5
  
  </div>
  <div class="form-group col-sm-6">
  <label> Question Paper Title:</label><br>
   <input type="text" name="question_title" class="form-control" required > 
  
  </div>
  <div class="form-group col-sm-6">
  <label> Date:</label><br>
   <input type="date" name="date" class="form-control" required > 
  
  </div>
  
  <!--<div class="form-group col-sm-6">
  <label> Application Question for 15 marks:</label><br>
   <input type="radio" name="aq" class="" value="1" checked> 1 Question
   <input type="radio" name="aq" class="" value="2" > 2 Questions
  
  </div>-->
  </div>
  <div class="form-group">
    <input type="submit" name="sub" class="btn btn-primary" value="Proceed" style="float:right">
  </div>
  
</form>
							
								</div>
								</div>	<br/>
							
							</div>
							<?php 
							if(isset($_POST['sub']))
							{
								extract($_POST);
								
							
								
								/* two marks */
							
							$two_marks=getQuestions(10,'2m',$unit,$sub_code);
							$two=implode(",",$two_marks);
							$ten_marks=getQuestions(3,'10m',$unit,$sub_code);
							$ten=implode(",",$ten_marks);
							/* $u2_2m=getQuestions(2,'2m',2,$sub_code);
							$u3_2m=getQuestions(2,'2m',3,$sub_code);
							$u4_2m=getQuestions(2,'2m',4,$sub_code);
							$u5_2m=getQuestions(2,'2m',5,$sub_code); */
							
								/* $two_marks=array_merge($u1_2m,$u2_2m,$u3_2m,$u4_2m,$u5_2m); */
								/* print_r($two_marks); */
								/* 13 marks */
								
								/* $thirteen_marks=getQuestions(10,'13m',$unit,$sub_code);	
								$thirteen=implode(",",$thirteen_marks); */
								/* $u2_13m=getQuestions(2,'13m',2,$sub_code);	
								$u3_13m=getQuestions(2,'13m',3,$sub_code);	
								$u4_13m=getQuestions(2,'13m',4,$sub_code);	
								$u5_13m=getQuestions(2,'13m',5,$sub_code); */
								
								/* $thirteen_marks=array_merge($u1_13m,$u2_13m,$u3_13m,$u4_13m,$u5_13m); */
								// echo "<br/> 13 marks <br/>";
								/* print_r($thirteen_marks); */
								/* 15 marks */
								/* if($aq==1)
								{
								$fivteen_marks=getQuestions15(2,'15m',1,$sub_code,1);	
								}
								else
								{
								$fivteen_marks=getQuestions15(2,'15m',1,$sub_code,2);	
								}
								$fifteen=implode(",",$fivteen_marks); */
								/* echo "<br/> 15 marks <br/>"; */
								/* print_r($fivteen_marks); */
								

											
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
/* $qn=11; */
foreach($ten_marks as $x)
{
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	
	echo $qno,". ",$quest_row['question'],"<br>";
	$qno++;
}

?><br>
<!--
<center>
<h3>Part - c</h3>
<h4 style="float:right">(1 x 15 = 15)</h4> 
</center><br><br>-->
<?php
/* $qno=16;

for($i=0;$i<2;$i++)
{
	
	$x=$fivteen_marks[$i];
	$quest=mysql_query("select * from question where q_id=$x")or die(mysql_error());
	$quest_row=mysql_fetch_array($quest);
	if($i==0)
	{
		echo $qno,". a) ",$quest_row['question'],"<br>";
		echo "<br/> <center>--------  OR -------------- </center><BR/>";
	}
	else
	{
		echo $qno,". b) ",$quest_row['question'],"<br>";
	}
	
	
} */
echo "<a href='quest_bank.php?sub_code=$sub_code&author=$sid&cat=1unit&unit=$unit&t1=$two&t2=$ten&question_title=$question_title&date=$date' style='float:right;margin:20px' class='btn btn-success'>Save</a>";
}


								function getQuestions($n,$type,$unit,$sub)
								{
									
									if($type=="15m")
									{
										if($unit==1)
										{
											
										  $question=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit BETWEEN 1 AND 3 ");
										}                     
										else
										{
										  $question=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit BETWEEN 1 AND 3 ");
										}  
									}
									else
									{
										$question=mysql_query("select q_id from question where sub_code='$sub' and type='$type' and unit='$unit'");
									
										
									}
									
									
									
									
									while($row=mysql_fetch_array($question))
									{
										$que[]=$row[0];
									}
									
									$max=count($que);
									if($n<=$max)
									{
										$rand_keys = array_rand($que,$n);

										for($i=0;$i<$n;$i++)
										{
											$result[]=$que[$rand_keys[$i]];
										}
										return $result;

									}
									else
									{
										echo "max limit";
									}
								}
							/* 	function getQuestions15($n,$type,$unit,$sub,$z)
								{
									
									if($type=="15m")
									{
										if($unit==1)
										{
											if($z==1)
											{
										  $question1=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit='$unit' AND quest_cat=' ' OR quest_cat='syllabus'");
										  $question2=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit='$unit' AND quest_cat='application'");
											
											}
											else
											{
										 $question=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit='$unit' AND quest_cat='application' ");
										}                     
										}                     
										else
										{
										  if($z==1)
											{
										  $question1=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit='$unit' AND quest_cat=' ' OR quest_cat='syllabus'");
										  $question2=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit='$unit' AND quest_cat='application'");
											
											}
											else
											{
										 $question=mysql_query("select q_id from question where type='$type' AND sub_code='$sub' AND unit='$unit' AND quest_cat='application' ");
										}  
										}  
									}
									else
									{
										$question=mysql_query("select q_id from question where sub_code='$sub' and type='$type' and unit='$unit'");
									
										
									}
									
									
									
									if($z==1)
									{
									while($row=mysql_fetch_array($question1))
									{
										$que1[]=$row[0];
									}
									while($row=mysql_fetch_array($question2))
									{
										$que2[]=$row[0];
									}
									$que=array_merge($que1,$que2);
									}
									else
									{
									while($row=mysql_fetch_array($question))
									{
										$que[]=$row[0];
									}
									}
									$max=count($que);
									if($n<=$max)
									{
										$rand_keys = array_rand($que,$n);

										for($i=0;$i<$n;$i++)
										{
											$result[]=$que[$rand_keys[$i]];
										}
										return $result;

									}
									else
									{
										echo "max limit";
									}
								} */

?><br>
			
							
						</div>
						
						
					
						<div style="height:50px;background:black;margin-top:60px">
						
						</div>
    
					</div>
				
				<div id="footer">			
				</div></div>
				
			</div>
		</div>
		<!-- wrapper ends-->
	
	</body>
	
