
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
<body>
	<?php
		$userName	= $_REQUEST['userName'];
	?>
	<div id="success">
		<h2>Welcome
			<span style="color:#4CB848;"> <?php echo $userName; ?>
			</span>
		</h2><hr>
		<p>
			<center>
			Your registration has been submitted successfully<br>
			This is high secured login system provided by company name<br>
			You can login now<br>
			<a class="add" style="float:none;width:100px;" href="index.php">click here</a>
			</center>
		</p>
	</div>
</div>
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	
	</body>
	</html>