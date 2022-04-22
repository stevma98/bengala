<?php 
require('vendor/fpdf/fpdf.php');

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(275,10,'REPORTE DE PRODUCTOS AGOTADOS',0,0,'C');
$pdf->ln(15);
$pdf->SetFont('Arial','',11);
$pdf->Cell(30,10,'Cod. Interno',TB,0,'');
$pdf->Cell(10,10,'',TB,0);
$pdf->Cell(105,10,'Producto',TB,0,'');
$pdf->Cell(10,10,'',TB,0);
$pdf->Cell(30,10,'Costo',TB,0,'');
$pdf->Cell(10,10,'',TB,0);
$pdf->Cell(30,10,'P. Venta',TB,0,'');
$pdf->Cell(10,10,'',TB,0);
$pdf->Cell(30,10,'Stock',TB,0,'R');
$pdf->Cell(10,10,'',TB,0);
$pdf->ln(10);
$count=1;
foreach ($datas as $data) {
    $count+=1;
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(30,10,$data->ID_PROD_INV,0,0,'');
    $pdf->Cell(10,10,'',0,0);
    $pdf->Cell(105,10,$data->NOM_PRO,0,0,'');
    $pdf->Cell(10,10,'',0,0);
    $pdf->Cell(30,10,"$".number_format($data->PRECIO_COMPRA,0,',','.'),0,0,'');
    $pdf->Cell(10,10,'',0,0);
    $pdf->Cell(30,10,"$".number_format($data->PRECIO,0,',','.'),0,0,'');
    $pdf->Cell(10,10,'',0,0);
    $pdf->Cell(30,10,$data->STOCK,0,0,'R');
    $pdf->Cell(10,10,'',0,0);
    $pdf->ln(6);
}
$pdf->ln(4);
$pdf->Cell(275,1,"",B,0,"");
$pdf->ln(6);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(275,1,"Total de productos sin stock: ".$count,0,0,"");
$pdf->footer();
$pdf->Output();    


?>