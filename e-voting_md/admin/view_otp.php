<?php ob_start();
	session_start();
	/* $pid = $_REQUEST['id'];
	$id = $_REQUEST['id']; */
	include "dbcc.php"; 
	$id = $_REQUEST['data'];
	
	$qry=mysql_query("select * from qr_otp where qr_id=$id");
	$row=mysql_fetch_array($qry);
	$id1=$row['otp'];
?>



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
	
		
		<!-- wrapper starts-->
		
					<h2>QR COIN GENERATOR.......</h2>
					
					
				
					
					<?php    

    
   
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';
	$qr=rand();
    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.$id1.'.png';
    
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
        $filename = $PNG_TEMP_DIR.$id1.'.png';
        QRcode::png($id1, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
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
    
    header("location:otp.php?id=$id1");
      

    
?>
    
    
					
			
