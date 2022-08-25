<?php
/**
 * Plugin Name: e-mitcert
 */
require 'vendor/autoload.php';

// echo $_POST['myId']; exit();
 

use Fpdf\Fpdf;

class PDF extends FPDF
{
// Page header
function Header()
{   
   //Form email validation
   if ($_POST['email'] > 0){
    $email = $_POST['email'];
   } else {
    $email = "aderson_filho@uol.com.br";
   }

   //Connect db
   include 'db.php';
   $id = $_POST['myId'];
   $sql = "SELECT * FROM `tb_certificados` WHERE `email` LIKE '$email' AND `id_evento` LIKE '$id'";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           $nome = $row["nome"];
       }
     }

    // background
    if ($id == 12){
		$this->Image('img/id11.jpg',0,0,298);
	} elseif ($id == 12){
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
