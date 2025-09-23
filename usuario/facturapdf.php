<?php
include_once '../includes/cabecera.php';

$usu=$_SESSION['usuario'];
$nfactura=$_REQUEST['nfactura'];
$_SESSION['nfactura']=$nfactura;

echo "<p> Ver o imprimir factura</P>";
$mifichero= new textoarray("..\\datos\\".$usu.".txt");
$miarray=$mifichero->getarray();

echo "<p>Factura numero ".$nfactura."</p>";
$mifactura= new facturas($mifichero->getarray(),$nfactura);

$mitabla = new vertabla($mifactura->sacafactura());
echo $mitabla->sacatabla();
echo "<p><a href='inicio.php'>Volver a principal de usuario</a></p>";
echo "<p><a href='usuariopdf.php'>Imprimir factura</a></p>";
include_once '../includes/pie.php';