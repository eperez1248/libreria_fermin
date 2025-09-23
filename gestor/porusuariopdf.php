<?php
include_once '../includes/cabecera.php';

$usu=$_REQUEST['impresion'];

$mifichero= new textoarray("..\\datos\\".$usu.".txt");
$miarray=$mifichero->getarray();

$mitabla = new vertabla($miarray);
$imprime="<style> table {border-collapse: collapse;} table,th,td {border: 1px solid black;} th,td {padding: 5px;}</style>";

$imprime=$imprime."<h2><p style='text-align: center'>LIBRERIA FERMIN</p></h2>";
$imprime=$imprime."hola ".$usu." tus datos de ventas son";
$imprime=$imprime.$mitabla->sacatabla();

use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
ob_get_clean();
$dompdf->loadHtml($imprime);
$dompdf->render();
header("Content-type: application/pdf");
$cadena="Content-Disposition: inline; filename=".$usu.".pdf";
header($cadena);
echo $dompdf->output();?>

