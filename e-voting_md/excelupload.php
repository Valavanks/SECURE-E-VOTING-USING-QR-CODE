
<?php
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');

$dbHost = "localhost";
$dbDatabase = "question";
$dbPasswrod = "";
$dbUser = "root";
$mysqli = new mysqli($dbHost, $dbUser, $dbPasswrod, $dbDatabase);
print_r($_FILES);
if(isset($_POST['submit']))
{
	extract($_POST);
    $mimes = array('application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    if(in_array($_FILES["file"]["type"],$mimes))
    {
        $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);

		move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
        $Reader = new SpreadsheetReader($uploadFilePath);

		//$totalSheet = count($Reader->sheets());
        //echo "You have total ".$totalSheet." sheets".

		//$html="<table border='1'>";
        //$html.="<tr><th>Title</th><th>Description</th></tr>";

		/* For Loop for all sheets */
      //  for($i=0;$i<$totalSheet;$i++)
      //  {
           // $Reader->ChangeSheet($i);
            foreach ($Reader as $Row)
            {
				$sid= $Row[0];
                $question = $Row[1] ;
                $sub_code =  $Row[2] ;
                $unit =  $Row[3] ;
                $type =  $Row[4] ;
                $quest_cat =  $Row[5] ;
               

				$query = "INSERT INTO question (sid, question, sub_code, unit,type,quest_cat)VALUES 
				('".$sid."', '".$question."', '".$sub_code."', '".$unit."','".$type."','".$quest_cat."')";
                $mysqli->query($query);
            }
        //}
       // $html.="</table>";

           echo "<script> location.href='question.php'; </script>";
        }
        else
        {
            die("<br/>Sorry, File type is not allowed. Only Excel file.");
        }
}
?>