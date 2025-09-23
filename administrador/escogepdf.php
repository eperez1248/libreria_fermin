<?php

include_once '../includes/cabecera.php';

echo "<p><a href='pdftotal.php'> Fichero unico </a></p>";

echo "<p>Ficheros por usuario</p>";

$mificherod = new textoarray("..\\datos\\acceso.txt");
$miarraygeneral = $mificherod->getarray();
$mitablatotal = "";
foreach ($miarraygeneral as $value) {
    $midato = explode('*', $value);

    echo "<form action='porusuariopdf.php' method='post'>";
    echo " <input type='hidden'  name='impresion' value='" . $midato[0] . "'>";
    echo " <p><input type='submit'   value='" . $midato[0] . "'><p>";
    echo "</form>";
}
echo "<p><a href='iniciogestion.php'>Volver a principal</a></p>";

include_once '../includes/pie.php';

