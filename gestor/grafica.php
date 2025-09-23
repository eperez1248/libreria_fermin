<?php
include_once '../includes/cabecera.php';
$usu=$_SESSION['usuario'];
$mificherod = new textoarray("..\\datos\\acceso.txt");
$miarraygeneral= $mificherod->getarray();

$chart = new \Libchart\View\Chart\LineChart();
$dataSet = new \Libchart\Model\XYDataSet();

$arrayg = $mificherod->getarray();
$total=0;
$libros=0;
$grantotal=0;
$todosloslibros=0;
foreach ($arrayg as $value) {//recorro los usuarios
    $linea= explode('*', $value);
    $mificherog = new textoarray("..\\datos\\" . $linea[0] . ".txt");
    $datos=$mificherog->getarray();
    foreach ($datos as $ver) {//recorro los ficheros de datos
        $linea2=explode('*',$ver);
        $libros=$libros+intval( $linea2[1]);
        $total=$total+intval($linea2[2]);  
    }
    $arraysuma[]=$linea[0]."*".$libros."*".$total;
    echo "<p>El empleado ".$linea[0]." ha vendido ".$libros." y ha generado ".$total."</p>"; 
    $dataSet->addPoint(new \Libchart\Model\Point($linea[0], $total));
     $grantotal=$grantotal+$libros;
     $todosloslibros=$todosloslibros+$libros;
}

$chart->setDataSet($dataSet);
$chart->setTitle("Libros Fermin");
$chart->render("..\\datos\\fermin.png");

//echo "<img src='..\\datos\\fermin.png' alt='alt'/>";
//echo "<img src='..\\datos\\fermin.png'  alt='no se cargo la imagen'/>";
$mitablatotal="<p> Datos de Libreria Fermin </p>";
//$mitablatotal=$mitablatotal."<p><img src='..\\datos\\fermin.png'  alt='no se cargo la imagen'/></p>";
echo $mitablatotal;
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
ob_get_clean();
$dompdf->loadHtml($mitablatotal);
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();

echo "<p><a href='iniciogestion.php'>Volver a principal</a></p>";
include_once '../includes/pie.php';

?>
