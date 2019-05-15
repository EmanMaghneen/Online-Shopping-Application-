<?php 
     
     require("fpdf/fpdf.php");
class PDF extends FPDF
{
// Page header
function Header()
{
    
    
    
    $this->SetFont('Arial','B',15);
    
    $this->Cell(80);
    
    $this->Cell(30,10,'report',1,0,'C');
    
    $this->Ln(20);
}
   
// Page footer
function Footer()
{
    
    $this->SetY(-15);
   
    $this->SetFont('Arial','I',8);
   
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
     $pdf = new FPDF();
     $pdf->AddPage();
     $pdf->SetFont("Arial","B",16);
     $pdf->cell(0,0,"welcome anas",0,0,'C');
     $pdf->output();
    
    ?>


