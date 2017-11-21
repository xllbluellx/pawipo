<?php
// Include the main TCPDF library (search for installation path).
session_start();
ob_start();
require_once('tcpdf.php');
require_once('generaEncuestas.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image("../../img/header2.png", 'C', 6, '', 25, 'PNG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);
        //$this->Image("../../img/header2.png", 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        //$this->SetFont('helvetica', 'B', 20);
        //$imagen = '<img src="../../img/header2.png" style="text-align: center; width: 340px; height: auto;" /><hr/>';
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example <h1>003</h1> >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        //$this->writeHTMLCell(0, 0, '', '', $imagen, 0, 1, 0, true, '', true);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,0,0), array(0,0,0));
$pdf->setFooterData(array(0,64,0), array(0,0,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('helvetica', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$obj = '';
$info = explode("-", $_COOKIE["anexo"]);

 if(isset($_COOKIE["anexo"]))
{
	// Se crea objeto de la clase GenerarCombo
    switch(intval($info[0]))
    {
    	  case 1:
            $obj = new Anexo_1();
				$obj = $obj->anexo1($info[1]);
        break;
        case 2:
            $obj = new Anexo_2();
				$obj = $obj->anexo2($info[1]);
        break;
        case 3:
            $obj = new Anexo_3();
				$obj = $obj->anexo3($info[1]);
        break;
        case 4:
            $obj = new Anexo_4();
				$obj = $obj->anexo4($info[1]);
        break;
        case 5:
            $obj = new Anexo_5();
				$obj = $obj->anexo5($info[1]);
        break;
        case 6:
            $obj = new Anexo_6();
				$obj = $obj->anexo6($info[1]);
        break;
        case 7:
            $obj = new Anexo_7();
				$obj = $obj->anexo7($info[1]);
        break;
        case 8:
            $obj = new Anexo_8();
				$obj = $obj->anexo8($info[1]);
        break;
        case 9:
            $obj = new Constancia();
				$obj = $obj->Tutorado($info[1]);
        break;
        case 10:
            $obj = new Constancia();
				$obj = $obj->TutoradoAdmin($info[1]);
        break;
        case 11:
            $obj = new Constancia();
				$obj = $obj->Tutor($info[1]."-".$info[2]."-".$info[3]."-".$info[4]);
        break;
        case 12:
            $obj = new Constancia();
				$obj = $obj->Coordinador($info[1]);
        break;
    }
}

// Set some content to print
$html = $obj;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean(); 
//$pdf->Output(strtoupper($_COOKIE['anexo'].'_'.$_SESSION['alumno']).'.pdf', 'I');
$pdf->Output(strtoupper('reporte_'.$_COOKIE['info']).'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
