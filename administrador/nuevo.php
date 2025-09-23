<?php

include_once '../includes/cabecera.php';
include_once '../includes/objconexion.php';
include_once '../includes/clases.php';

echo "<h2><p> Menu edicion</p></h2>";
$datos_base= new Conexion("../");
$datos_base->conecta();

//$mitabla = new tabla_datos($array_datos);
//$datos_tabla=$mitabla->tabla();
echo "<p>hola ".$usu." usuarios del sistema</p>";
$array_datos=$datos_base->consulta("SELECT usuarios.login,usuarios.pass FROM usuarios; ");

$mitabla = new tabla_datos($array_datos);
echo $mitabla->tabla();


echo "<form action='graba.php'><table>";            
         echo "<tr><td>login<input type='text' name='login'/></td></tr>";
          echo "<tr><td>pass<input type='text' name='pass'/></td></tr>";  
           echo "<tr><td>nombre<input type='text' name='nombre'/></td></tr>";
          echo "<tr><td>apellidos<input type='text' name='apellidos'/></td></tr>";
           echo "<tr><td><input type='submit' value='nuevo usuario'/></td></tr></table>"; 
           echo "</form>";

?>


<?php
echo "<p><a href='salir.php'> Salir </a>";
echo "<p><a href='inicioadministracion.php'> Volver </a>";
include_once '../includes/pie.php';
?>

