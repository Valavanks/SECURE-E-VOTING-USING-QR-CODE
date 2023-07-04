<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<html>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		
	</script>
	
	
	</head>
	<?php
	include_once('config/db_connection.php');
	ob_start();
	
?>
	<body>
		<?php
			session_start();
			$_SESSION['sid']="";
			session_destroy();
		?>
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
					<h2>Staff Login</h2>
					
						
					<form name="loginForm" method="POST" action="">
					<table align="center" cellpadding="10" cellspacing="0">
						
						<tr>
							<th colspan="2"> Login Here !</th>
						</tr>
						
						<tr>
			<td><label>Email</label></td>
			<td colspan="3"><input style="width:200px; height:30px;" type="text" name="email" id="username"></td>
		</tr>
		
		<tr>
			<td valign="top"><label>Password</label></td>
			<td colspan="3">
				<input style="width:200px; height:30px;" type="password" name="pwd" id="username">
				
			</td>
		</tr>
			
			<tr>
			<td valign="top"><label></label></td>
			<td colspan="3">
				<input type="submit" style="" name="login" value="Login" id="login">
				
			</td>
		</tr>
		
</table>
</form>
<?php
	
	if(isset($_POST['login'])){
		extract($_POST);
		$retrieve = mysql_query("SELECT *FROM staff WHERE email='$email' && pwd='$pwd'");
		$rows = mysql_num_rows($retrieve);
		if($rows==1){
			$fetch = mysql_fetch_array($retrieve);
			session_start();
			$_SESSION['sid']=$fetch['sid'];
		
			header("location:welcome.php");
		}
		else{
			echo '<script type="text/javascript">
					window.alert("Incorrect Username/Password");
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
	
