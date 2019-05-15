<?php

require("fpdf/fpdf.php");
class pdf {
    private $pdf;
public function __construct() {
    $pdf = new FPDF();;
}
public function show_pdf($printing){
    $pdf->AddPage();
     $pdf->SetFont("Arial","B",16);
     $pdf->cell(0,0,$printing,0,0,'C');
     $pdf->output();
    
}
}