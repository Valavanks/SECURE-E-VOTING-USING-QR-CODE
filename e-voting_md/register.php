<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<html>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<script src="jquery1.9.1.js" rel="javascript" type="text/javascript">
	</script>
	
	<script>
		$(function(){
			$("#register").hide();
			$(".passwordImg").click(function(){
				$(".passwordImg").fadeOut();
				$(this).fadeIn();
				var id=$(this).attr("id");
				var username = $("#username").val();
				if(username!=""){
					$('#username').attr('disabled','disabled');
					$("#register").fadeIn();
					$("#userId").val(id);
					$("#userName").val(username);
					
				}else{
					$(".passwordImg").fadeOut();
					$(this).fadeIn();
				}
			});
			
		});
	</script>
	<style>
		ul{
			margin		:	0;
			padding		:	0;
			list-style	:	none;
		}
		ul li,ul li img{
			width	:	100px;
			height	:	100px;
			float	:	left;
			margin	:	5px;
		}
		
	</style>
</head>
<body>
		
		<!-- wrapper starts-->
		<div id="wrapper">			
			
			<div id="header">	
				<h1>WEBSITE SECURITY USING DATA HIDING IN QR CODE</h1>
			</div>
			
			<div id="menu">		
				<ul>					
					<li> <a href="index.php">LOGIN</a>  </li>			
						
					
				</ul>
			</div>
		
			<div id="content">	
					<h2>Secured Login Using Image Processing</h2>
<?php
	include_once('config/db_connection.php');
	ob_start();
	/* $retrieve = mysql_query("SELECT *FROM admin");
	$number = mysql_num_rows($retrieve); */
?>
<!--
<table name="registerTable" border="0" cellpadding="8">
	<form name="registerForm" method="POST" action="">
		<tr>
			<th colspan="4"><label>User Registration</label></th>
		</tr>
		<tr>
			<td><label>Name</label></td>
			<td><input style="width:290px; height:30px;" type="text" name="name" id="name"></td>
			<td><label>Age</label></td>
			<td><input style="width:290px; height:30px;" type="text" name="age" id="age"></td>
		</tr>
		
		<tr>
			<td><label>Username</label></td>
			<td colspan="3"><input style="width:652px; height:30px;" type="text" name="username" id="username"></td>
		</tr>
		
		<tr>
			<td><label>Password</label></td>
			<td colspan="3">
				<ul>
				<?php
					$query = mysql_query("SELECT max(id) as maxid FROM admin");
					$fetch = mysql_fetch_array($query);
					$maxNo = $fetch['maxid'];
					$exist[0]=$maxNo+1;
					for($i=1;$i<=6;){
			$random = rand(1,$maxNo);
			
			if(!in_array($random,$exist)){
				$query2 = mysql_query("SELECT *FROM admin WHERE id='$random'");
				$fetchQuery2 = mysql_fetch_array($query2);
				$number = mysql_num_rows($query2);
				if($number!=0)
				{
				?>
				<a href="#">
					<img src="images/<?php echo $random.".jpg"; ?>" width="150" height="150" />
				</a>
			<?php
				$exist[$i]=$random;
				$i++;
				}
			}
		}
				?>
				</ul>
			</td>
		</tr>
		
		<tr>
			<td colspan="2">
				<a href="index.php" style="width:120px; padding:4px 20px 4px 20px; margin-left:200px; border:1px solid gray; color:white; height:30px; text-decoration:none; background:black;">	
					Reset
				</a>
				<input style="width:150px; color:white; height:30px; background:green; " type="submit" name="register" value="Register" id="register">
			</td>
		</tr>
			<input type="hidden" name="userId" value="" id="userId" />
			<input type="hidden" name="userName" value="" id="userName" />
	</form>
</table>

-->
<table align="center" name="registerTable" border="0" cellpadding="8">
	<form name="registerForm" method="POST" action="">
		<tr>
			<th colspan="4"><label>User Registration</label></th>
		</tr>
		<tr>
			<td><label>Name</label></td>
			<td><input style="width:290px; height:30px;" type="text" name="name" id="name"></td>
			<td><label>Age</label></td>
			<td><input style="width:290px; height:30px;" type="text" name="age" id="age"></td>
		</tr>
		
		<tr>
			<td><label>Username</label></td>
			<td colspan="3"><input style="width:652px; height:30px;" type="text" name="username" id="username"></td>
		</tr>
		
		<tr>
			<td><label>Password</label></td>
			<td colspan="3">
				<ul>
				<?php
					$query = mysql_query("SELECT max(id) as maxid FROM admin");
					$fetch = mysql_fetch_array($query);
					$maxNo = $fetch['maxid'];
					$exist[0]=$maxNo+1;
					for($i=1;$i<=6;){
			$random = rand(1,$maxNo);
			
			if(!in_array($random,$exist)){
				$query2 = mysql_query("SELECT *FROM admin WHERE id='$random'");
				$fetchQuery2 = mysql_fetch_array($query2);
				$number = mysql_num_rows($query2);
				if($number!=0)
				{
				?>
				<a href="#">
					<img src="images/<?php echo $fetchQuery2['image_name']; ?>" class="passwordImg" id="<?php echo $fetchQuery2['id']; ?>" width="150" height="150" />
				</a>
			<?php
				$exist[$i]=$random;
				$i++;
				}
			}
		}
				?>
				</ul>
			</td>
		</tr>
		
		<tr>
			<td colspan="2">
				<a class="edit" href="register.php" >	
					Refresh
				</a>
				<input style="width:150px; color:white; height:30px; background:green; " type="submit" name="register" value="Register" id="register">
			</td>
		</tr>
			<input type="hidden" name="userId" value="" id="userId" />
			<input type="hidden" name="userName" value="" id="userName" />
	</form>
</table>
<?php
	
	if(isset($_POST['register'])){
		extract($_POST);
		$isExist = @mysql_query("SELECT *FROM client WHERE user_name='$userName'");
		$existNo = @mysql_num_rows($isExist);
		
		if($existNo==0){ // if username already exist ?
			$insert = @mysql_query("INSERT INTO client(image_id,user_name,name,age)
					values('$userId','$userName','$name','$age ')");
			if($insert){
				header("location:success.php?userName=$userName");
			}else{
				header("loction:failure.php");
			}
		}
		
		else{
			echo '<script type="text/javascript">
					window.alert("Sorry Username aleady exist.Try another Username");
				</script>';
		}
		
	}
?>
</div>
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	
	</body>
	</html>