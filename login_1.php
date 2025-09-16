<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once 'includes/conecta.php';

$usuario=$_REQUEST['usuario'];
$pass=$_REQUEST['pass'];

$sql= "SELECT * FROM `usuarios` WHERE usuarios.login ='".$usuario."' AND usuarios.pass='".$pass."';";
echo $sql;

$mibase = new conexion("localhost","elena","P@ssw0rd","biblioteca");
$mibase->conecta();

$pepe = $mibase->consultar($sql);
var_dump($pepe);
foreach ($pepe as $value){
    foreach ($value as $key){
        echo "<p>".$key."</p>";
    }
}
