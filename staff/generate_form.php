<?php
include_once("dbcon.php");

if(isset($_GET["leave_requests_id"]) && !empty(trim($_GET["leave_requests_id"]))){
$leave_requests_id = $_GET['leave_requests_id'];

$sql = "SELECT * FROM leave_requests WHERE  leave_requests_id  =  '".$leave_requests_id."' ";
$resultset = $connect->query($sql);
$row = $resultset->fetch_array();

$starting_date = $row['start_date'];
$end_date = $row['end_date'];
$destination = $row['destination'];
$bio = $row['bio'];
$no_of_days = $row['no_of_days'];
$relative_name = $row['relative_name'];


/*call the FPDF library*/
require('fpdf/fpdf.php');

/*A4 width : 219mm*/

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

/*Cell(width , height , text , border , end line , [align] )*/

$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'LEAVE FROM',0,0);
$pdf->Cell(59 ,10,'',0,1);


$pdf->SetFont('Arial','',10);


$pdf->Cell(35 ,5,'STARTING DATE:',0,0);
$pdf->Cell(400,5,$starting_date,0,1);

$pdf->Cell(35 ,5,'ENDING DATE:',0,0);
$pdf->Cell(400,5,$end_date,0,1);


$pdf->Cell(35 ,5,'DAYS TAKEN:',0,0);
$pdf->Cell(400,5,$no_of_days,0,1);

$pdf->Cell(35 ,5,'DESTINATION:',0,0);
$pdf->Cell(400,5,$destination,0,1);

$pdf->Cell(35 ,5,'DESC:',0,0);
$pdf->Cell(400,5,$bio,0,1);

$pdf->Cell(35 ,5,'RELATIVES:',0,0);
$pdf->Cell(400,5,$relative_name,0,1);





$pdf->Output();
}else{

}
?>
