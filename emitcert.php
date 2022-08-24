<?php
/**
 * Plugin Name: e-mitcert
 */
require 'vendor/autoload.php';


use Fpdf\Fpdf;

class PDF extends FPDF
{
// Page header
function Header()
{   
    
   //Connect db
   include 'db.php';
   $sql = "SELECT * FROM `tb_certificados` WHERE `email` LIKE 'aderitogcruz@gmail.com' AND `id_evento` LIKE '1'";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $nome = $row["nome"];
       }
     }

    // background
    if (11 == 11){
		$this->Image('img/id11.jpg',0,0,298);
	}

    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(5);
    // Title
    $this->Cell(0,205,''.$nome,0,1,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("L");
$pdf->SetFont('Times','',12);
$pdf->Output();
