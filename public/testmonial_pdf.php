<?php 
    require_once('../include/initialize.php');
    $print = "disabled";
    if(isset($_GET['sid'])){
       $sid = $_GET['sid'];
       $std = Student::find_by_id($sid);

    }

?>

<?php

	require("fpdf181/fpdf.php");
	$pdf=new FPDF('L');
	
	//var_dump(get_class_methods($pdf));
	$pdf->AddPage();
	$pdf->Image("image/just.png",5,5,25,26);
	$pdf->SetFont("Arial","IB","20");
	$pdf->Cell(0,10,"Department of Computer Science & Engineering",0,1,"C");
	$pdf->SetFont("Arial","I","17");
	$pdf->Cell(0,10,"Jessore University of Science and Technology,Bangladesh",0,1,"C");
	$pdf->SetFont("Arial","B","24");
	$pdf->Cell(0,10,"TESTIMONIAL",0,1,"C");
	$pdf->SetFont("Arial","I","14");
	$pdf->MultiCell(0,10,"This is certify that,".$std->first_name." ".$std->last_name.", Son of".$std->f_name."and ".$std->m_name." bearing Roll No.".$std->roll." Registration No. 12345, 
Session: #dummy has been a student in the Department of Computer Science and Engineering at Jessore University of Science and Technology. He has fullfilled the prescribed requirements of the four years Degree of Bachelor 
of Computer Science and Engineering in the Year ".$std->session.", GPA: 3.75 in a scale of 4.00.",0,"L");
	$pdf->SetFont("Arial","I","14");
	$pdf->MultiCell(0,10,"While in this University, I found him to be diligent,sincere and puntual. He is good in his character and has not act against the state. I wish all the best in his future endevors.",0,"L");
	$pdf->SetFont("Arial","","14");
	$pdf->Cell(95,10,"Prepared by................",0,1,"L");
	$pdf->SetFont("Arial","","14");
	$pdf->Cell(95,10,"Checked by.............. Date #Dummy",0,0,"L");
	$pdf->SetFont("Arial","","14");
	$pdf->MultiCell(200,10,"Chairman
Department of Computer Science and Engineering
Jessore University of Science and Technology,Jessore.",0,"C");
	$pdf->Output();
?>