<?php

include_once '../includes/cabecera.php';
include_once '../includes/objconexion.php';
include_once '../includes/clases.php';

echo "<h2><p> Menu principal</p></h2>";
$datos_base= new Conexion("../");
$datos_base->conecta();
$array_datos=$datos_base->consulta("SELECT usuarios.login,usuarios.pass,clientes.nombre,clientes.apellidos, usuarios.id_usuarios FROM usuarios,clientes WHERE usuarios.id_usuarios=clientes.id_usuarios; ");

$mitabla = new tabla_datos($array_datos);
echo $mitabla->tabla_con_form_libreria();
echo "<p>hola ".$usu." usuarios del sistema</p>";

     
           echo "<form action='nuevo.php'>"; 
           
         echo "<table><tr><td><input type='submit' value='nuevo usuario'/></td><tr></table>";
            
           echo "</form>";
           
            
        


?>


<?php
echo "<p><a href='salir.php'> Salir </a>";
include_once '../includes/pie.php';
?>

