<?php
// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');
//require_once('generarPDF.php');
require_once('generarGrafico.php');
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo_example.jpg';
        //$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        //$imagen = '<img src="../../img/header.jpg" style="text-align: center;" align="middle" /><hr />';
        $img = "../../img/header.jpg";
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example <h1>003</h1> >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        //$this->writeHTMLCell(0, 0, '', '', $imagen, 0, 1, 0, true, '', true);
        $this->Image($img, 'C', '', '', '', 'JPG', false, 'C', false, 300, 'C', false, false, 0, false, false, false);
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
$pdf->SetFont('helvetica', '', 9, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage('L', 'A4');

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>0, 'blend_mode'=>'Normal'));

$datos = '';
//$info = explode("_", $_COOKIE["info"]);

 if(isset($_COOKIE["tipo"]))
{
	// Se crea objeto de la clase GenerarCombo
    $datos = new Grafico();
    switch($_COOKIE["tipo"])
    {
    	  case 'tutor':
            $datos = $datos->generarGrafico();
            $datos = '<hr><h2>Rúbrica para el desempeño del tutor</h2><br><br><table  style="text-align:center; border: 1px solid lightgray; padding: 5px;">
								<tr><td><img src="grafico.png" /></td></tr></table>';
        break;
        case 'administrador':
            $datos = $datos->generarGrafico();
            $datos = '<hr><h2>Rúbrica para el desempeño del tutor</h2><br><br><table  style="text-align:center; border: 1px solid lightgray; padding: 5px;">
								<tr><td><img src="grafico.png" /></td></tr></table>';
        break;
    }
}

// Set some content to print
$html = $datos;

// Print text using writeHTMLCell()
//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
$pdf->writeHTML($html, true, false, true, false, '');
unlink('grafico.png');
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean(); 
$pdf->Output(strtoupper('evaluacion_'.$_COOKIE['info']).'.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
