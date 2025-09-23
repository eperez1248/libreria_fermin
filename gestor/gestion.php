<?php
include_once '../includes/cabecera.php';
$mificherod = new textoarray("..\\datos\\acceso.txt");
$miarraygeneral= $mificherod->getarray();

foreach ($miarraygeneral as $value) {
    $midato=explode('*',$value);   
    $mificherot = new textoarray("..\\datos\\".$midato[0].".txt");
    $miarrayt =$mificherot->getarray();
    echo "<p>Estos son los datos de ".$midato[0]."</p>";
    $mitabla = new vertabla($miarrayt);
    echo $mitabla->sacatabla()."<div>";
    
}

echo "<p><a href='iniciogestion.php'>Volver a principal</a></p>";
include_once '../includes/pie.php';


