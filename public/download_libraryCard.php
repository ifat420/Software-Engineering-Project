<?php 
    require_once('../include/initialize.php');
    $print = "disabled";
    if(isset($_GET['sid'])){
       $sid = $_GET['sid'];
       $std = Student::find_by_id($sid);

    }

?>
<?php 
    require('fpdf181/fpdf.php');
    
    $pdf = new FPDF('p', 'mm', 'A4');
    $pdf-> Addpage();
    
    $pdf->Image('image/just.png',10, 10, 10);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(82, 3, "Jessore University of Science and Technology", 0, 1, 'C');
    $pdf->Cell(82, 3, "Jessore-7408, Bangladesh", 0, 1, 'C');

    $pdf->Cell(20, 10, "", 0, 0, 'C');
    
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(180,180,255);
    $pdf->SetDrawColor(50,50,100);
    $pdf->Multicell(40, 5, "Library Card", 0, 'C', true);

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(20, 5, "Name:", 0, 0, 'L');
    $pdf->Cell(50, 5, "{$std->first_name}"." "."{$std->last_name}", 0, 1, 'L');

    $pdf->Cell(20, 5, "Department:", 0, 0, 'L');
    $pdf->Cell(50, 5, "CSE", 0, 1, 'L');

    $pdf->Cell(20, 5, "Roll No:", 0, 0, 'L');
    $pdf->Cell(50, 5, "{$std->roll}", 0, 1, 'L');

    $pdf->Cell(20, 5, "Session", 0, 0, 'L');
    $pdf->Cell(50, 5, "{$std->session}", 0, 1, 'L');

    $pdf->Ln(5);
    $pdf->Cell(40, 5, "Signature of student", 0, 0, 'L');
    $pdf->Cell(50, 5, "Signature of Librarian", 0, 0, 'L');

    $pdf->Image("image/{$std->img_name}",60, 33, 20);

    $pdf->Ln(20);

    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(80, 8, "Instruction", 0, 1, 'C');
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(80, 3, "1. Only registered users may borrow books from the Library.", 0, 1, 'L');
    $pdf->Cell(80, 3, "2. Students are fully responsible for maintaining the condition of the books they borrow.", 0, 1, 'L');
    $pdf->Cell(80, 5, "Any lost or damaged books should be reported to the Library immediately.", 0, 1, 'L');
    $pdf->Cell(80, 3, "3. Students may request a one-time extension (or renewal) of the borrowing period, ", 0, 1, 'L');
    $pdf->Cell(80, 3, "provided that no other student has requested the same book.", 0, 1, 'L');
   
    
    $pdf->Output();
?>