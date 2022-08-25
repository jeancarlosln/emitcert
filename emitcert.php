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

   //Connect db
   include 'db.php';
   
   //Set vars for searching
   $email = $_POST['email'];
   $id = $_POST['myId'];

   //Result of searching
   $sql = "SELECT `nome`, `email`, `id_evento` FROM `tb_certificados` WHERE `email` LIKE '$email' AND `id_evento` LIKE '$id'";
   $result = $conn->query($sql);  
   
   if ($result->num_rows > 0) {
       // Output name
       while($row = $result->fetch_assoc()) {
           $nome = $row["nome"];
       } 
     }
    

    // background
    if ($id == 1){
		$this->Image('img/background.jpg',0,0,298);
	} elseif ($id == 2){
		$this->Image('img/Certificado_Webinar_Espondiloartrites_SRB.jpg',0,0,298);		
	} elseif ($id == 3){
		$this->Image('img/Certificado_Webinar_impactodadornaqualidadedevidadopaciente.jpg',0,0,298);	
	} elseif ($id == 4){
		$this->Image('img/CertificadoWebinar_ArtritePsoriﾃ｡sica.jpg',0,0,298);	
	} elseif ($id == 5){
		$this->Image('img/Certificado_MonitoramentoSanguineo.jpg',0,0,298);	
	} elseif ($id == 6){
		$this->Image('img/Certificado_Webinar_Setembro_SRB.jpg',0,0,298);	
	} elseif ($id == 7){
		$this->Image('img/Certificado Webinar Novembro_SRB.jpg',0,0,298);	
	} elseif ($id == 8){
		$this->Image('img/Certificado Webinar reumatologista e midias_entesopatias tendinopatias_SRB.jpg',0,0,298);	
	} elseif ($id == 9){
		$this->Image('img/id9',0,0,298);	
	}  elseif ($id == 10){
		$this->Image('img/2022-dieta-antinflamatoria-e-highlights-summit.jpg',0,0,298);	
	}  elseif ($id == 11){
		$this->Image('img/id11.jpg',0,0,298);	
	}   elseif ($id == 12){
		$this->Image('img/id12.jpg',0,0,298);	
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
