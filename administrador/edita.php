<?php
$id =$_GET['pasa'];
include_once '../includes/cabecera.php';
include_once '../includes/objconexion.php';
include_once '../includes/clases.php';

echo "<h2><p> Menu edicion</p></h2>";
$datos_base= new Conexion("../");
$datos_base->conecta();
$array_datos=$datos_base->consulta("SELECT  clientes.id_cliente,clientes.nombre,clientes.apellidos, clientes.id_usuarios FROM clientes WHERE clientes.id_usuarios=".$id);

//$mitabla = new tabla_datos($array_datos);
//$datos_tabla=$mitabla->tabla();
echo "<p>hola ".$usu." usuarios del sistema</p>";

var_dump($array_datos);



?>


<?php
echo "<p><a href='salir.php'> Salir </a>";
include_once '../includes/pie.php';
?>

