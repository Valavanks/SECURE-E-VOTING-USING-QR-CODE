<?php ob_start();
	session_start();
	$id = $_REQUEST['data'];
?>
<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<php>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			
			@media print 
			{ 

			 body{ visibility:hidden; !important; } 
			 div.print {visibility:visible;}
			}
		
		</style>
		<script type="text/javascript">
			function showprint()
			{
				window.print();
			}
		</script>
	</head>
	
	<body>
		<?php
			
			include 'config/db_connection.php';
			
			?>
		<!-- wrapper starts-->
		<div id="wrapper">			
			
			<div id="header">	
				<h1>WEBSITE SECURITY USING DATA HIDING IN QR CODE</h1>
			</div>
			
			<div id="menu">		
				<ul>					
					<li> <a href="welcome.php">Profile</a>  </li>			
					<li> <a href="index2.php" class="active">QR Code Generator</a>  </li>			
					<li> <a href="capture.php">Web cam</a>  </li>			
					<li> <a href="decode.php">QR Reader</a>  </li>	
					
					<li> <a href="index.php">LOGOUT</a></li>			
				</ul>
			</div>
		
			<div id="content">	
					<h2>DATA HIDING USING QR CODE GENERATOR.......</h2>
					
					
				
					
					<?php    

    
   
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.$id.'.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'H';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = 'H';    

    $matrixPointSize = 6;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.$id.'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } /* else {    
    
        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    */ 
        
    //display generated file
    echo '<div class="print">
	
	<center><img src="'.$PNG_WEB_DIR.basename($filename).'" />
	

	</center/>
	
	</div>
	
	';  
    
   
      

    header("location:admin/add_staff.php");	
?>
    
    
					
					
			</div>
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	
	</body>
	
