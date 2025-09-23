
<?php
include_once '../includes/cabecera.php';

$usu=$_SESSION['usuario'];
$nfactura=$_SESSION['nfactura'];

$mifichero= new textoarray("..\\datos\\".$usu.".txt");
$miarray=$mifichero->getarray();
$mifactura= new facturas($mifichero->getarray(),$nfactura);
$mitabla = new vertabla($mifactura->sacafactura());
$mif="<h2><p style='text-align: center'> LIBRERIA FERMIN</p></h2>";
$mif=$mif."<p> Le atendio ".$usu."       Numero de factura ".$nfactura."</p>";
$mif=$mif.$mitabla->sacatabla();
$mif=$mif."<p> Direccion postal : C/ La colcha 32</p>";
$mif=$mif."<p> Telefono : 666 666 666</p>";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
ob_get_clean();
$dompdf->loadHtml($mif);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();


