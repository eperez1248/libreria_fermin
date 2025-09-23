<?php
include '../includes/cabecera.php';
include_once '../includes/objconexion.php';
include_once '../includes/clases.php';

$usu=$_SESSION['usuario'];
$id=$_SESSION['id_usuario'];

$datos_base= new Conexion("../");
$datos_base->conecta();
$array_datos=$datos_base->consulta("SELECT id_cliente FROM clientes where id_usuarios=".$id.";");
foreach ($array_datos as $value) {
    $value=$array_datos[0]['id_cliente'];   
}

$sql="SELECT libros.titulo,autor.nombre,autor.apellidos,alquilan.fecha_devolucion
    FROM clientes,alquilan,libros,autor
WHERE clientes.id_cliente=alquilan.id_cliente AND alquilan.id_libro=libros.id_libros 
AND autor.id_autor=libros.id_autor and clientes.id_cliente=".$value;

$mitabla_datos=$datos_base->consulta($sql);
//var_dump($mitabla_datos);
$mitabla = new tabla_datos($mitabla_datos);
//$mitabla->ver_tabla();



//$tabla_salida=$mitabla->tabla();
//var_dump($tabla_salida);

$imprime="<style> table {border-collapse: collapse;} table,th,td {border: 1px solid black;} th,td {padding: 5px;}</style>";
$imprime=$imprime."<h2><p style='text-align: center'>LIBRERIA FERMIN</p></h2>";

$imprime=$imprime."hola ".$usu." tus lecturas han sido:";
$imprime=$imprime.$mitabla->tabla();

use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
ob_get_clean();
$dompdf->loadHtml($imprime);
$dompdf->render();
header("Content-type: application/pdf");
$cadena="Content-Disposition: inline; filename=".$usu.".pdf";
header($cadena);
echo $dompdf->output();


