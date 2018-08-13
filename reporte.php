<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

/*
Genero la tabla
*/
include_once('incluir/DB.php');
$db = new DB();
$tabla = $db->get('insumo');

ob_start();
?>
<style>
table{
	border: 1px solid #000000;
	font-size: 11px;
	padding:4px;
}
#titulo{
	background-color: #898989;
}
</style>
<table>
	<tr id="titulo">
		<td style="border:1px solid #000;"><strong>Nombre insumo</strong></td>
		<td style="border:1px solid #000;"><strong>Cantidad Disponible</strong></td>
		<td style="border:1px solid #000;"><strong>Unidad</strong></td>
		<td style="border:1px solid #000;"><strong>Ubicación</strong></td>
	</tr>
<?php
foreach ($tabla as $llave => $info) {
	?>
	<tr>
		<td><?php print($info['nombre']); ?></td>
		<td><?php print($info['cantidad']); ?></td>
		<td><?php print($info['unidad']); ?></td>
		<td><?php print($info['ubicacion']); ?></td>
	</tr>
	<?php
}
?>
</table>
<?php
$tabla = ob_get_contents();
ob_clean();


class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        //$image_file = K_PATH_IMAGES.'logo_example.jpg';
        //$this->Image('img/encabezado.png', 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->Image('img/encabezado.png', 15, 6, 180,28);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        //$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
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
$pdf->SetCreator('SisInventario');
$pdf->SetAuthor('SisInventario');
$pdf->SetTitle('Reporte General Inventario');
$pdf->SetSubject('Reporte');
$pdf->SetKeywords('reporte, inventario');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

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
$pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
$pdf->Text(16,34,'Fecha: '.date('d-m-Y'));
// Set some content to print
$html = <<<EOD
$tabla
EOD;
$pdf->SetXY(14,42);
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('reporte.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
