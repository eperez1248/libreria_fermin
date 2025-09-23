<?php
include_once '../includes/cabecera.php';
$mificherod = new textoarray("..\\datos\\acceso.txt");
$miarraygeneral= $mificherod->getarray();
$mitablatotal="<style> table {border-collapse: collapse;} table,th,td {border: 1px solid black;} th,td {padding: 5px;}</style>";
$mitablatotal=$mitablatotal."<h2><p style='text-align: center'>LIBRERIA FERMIN</p></h2>";
$acumula=0;$totalventas=0;$totalmislibros=0;
foreach ($miarraygeneral as $value) {
    $midato=explode('*',$value);   
    $mificherot = new textoarray("..\\datos\\".$midato[0].".txt");
    $miarrayt =$mificherot->getarray();
    $mitablatotal=$mitablatotal. "<p>Estos son los datos de ".$midato[0]."</p>";
    $mitabla =new vertabla($miarrayt);
    $mitablatotal=$mitablatotal.$mitabla->sacatabla();
    $totalmislibros=$totalmislibros+$mitabla->getlibros();
    $totalventas=$totalventas+$mitabla->gettotal();}
$mitablatotal=$mitablatotal. "<p>libros vendidos en total ".$totalmislibros."</p>";
$mitablatotal=$mitablatotal. "<p>ventas en total ".$totalventas."</p>";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
ob_get_clean();
$dompdf->loadHtml($mitablatotal);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();
