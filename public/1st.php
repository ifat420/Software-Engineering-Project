<?php 
    require('fpdf181/fpdf.php');
    
    $pdf = new FPDF('p', 'mm', 'A4');
    $pdf-> Addpage();
    
    $pdf->Image('just.png',10, 10, 10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(88, 5, "Shaheed Mashiur Rahaman Hall", 0, 1, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(82, 3, "Jessore University of Science and Technology", 0, 1, 'C');
    $pdf->Cell(82, 3, "Jessore-7408, Bangladesh", 0, 1, 'C');

    $pdf->Cell(20, 10, "", 0, 0, 'C');
    
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(180,180,255);
    $pdf->SetDrawColor(50,50,100);
    $pdf->Multicell(40, 5, "Student's ID card\nNon Residential", 0, 'C', true);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(20, 5, "Name:", 0, 0, 'L');
    $pdf->Cell(50, 5, "Iftakhar Ahmed", 0, 1, 'L');

    $pdf->Cell(20, 5, "Department:", 0, 0, 'L');
    $pdf->Cell(50, 5, "CSE", 0, 1, 'L');

    $pdf->Cell(20, 5, "Roll No:", 0, 0, 'L');
    $pdf->Cell(50, 5, "130129", 0, 1, 'L');

    $pdf->Cell(20, 5, "Session", 0, 0, 'L');
    $pdf->Cell(50, 5, "2013-14", 0, 1, 'L');

    $pdf->Ln(5);
    $pdf->Cell(40, 5, "Signature of student", 0, 0, 'L');
    $pdf->Cell(50, 5, "Signature of provost", 0, 0, 'L');

    $pdf->Image('ashik.jpg',60, 33, 20);

    $pdf->Ln(20);

    $pdf->Cell(20, 5, "Contact No:", 0, 0, 'L');
    $pdf->Cell(25, 5, "01845454515", 0, 0, 'L');

    $pdf->Cell(23, 5, "Blood Group:", 0, 0, 'L');
    $pdf->Cell(20, 5, "A+", 0, 1, 'L');

    $pdf->Cell(20, 5, "Date of birth:", 0, 0, 'L');
    $pdf->Cell(25, 5, "  1/1/17", 0, 0, 'L');

    $pdf->Cell(23, 5, "Date of Expire:", 0, 0, 'L');
    $pdf->Cell(20, 5, "1/1/17", 0, 1, 'L');

    $pdf->Cell(30, 5, "Present Address:", 0, 0, 'L');
    $pdf->Cell(20, 5, "SRM Hall, JUST", 0, 1, 'L');

    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(80, 8, "Instruction", 0, 1, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(80, 3, "1. This ID is non transferable, you have to surrender this id ", 0, 1, 'L');
    $pdf->Cell(80, 3, "card at the time of taking release from this hall", 0, 1, 'L');
    $pdf->Cell(80, 5, "2.File GD to local police station if lost", 0, 1, 'L');
    $pdf->Cell(80, 3, "3.If found, please deposite it to local police station or", 0, 1, 'L');
    $pdf->Cell(80, 3, "post to Provost, SMR Hall, Jessore", 0, 1, 'L');
   
    
    $pdf->Output();
?>