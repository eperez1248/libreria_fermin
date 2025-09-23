<?php
$login=$_GET['login'];
$pass=$_GET['pass'];
$nombre=$_GET['nombre'];
$apellidos=$_GET['apellidos'];
echo $login;
echo $pass;
include_once '../includes/objconexion.php';
$datos_base= new Conexion("../");
$datos_base->conecta();
$sql="INSERT INTO usuarios (id_usuarios, login, pass, perfil) VALUES (NULL,'".$login."','".$pass."','1');";
$salida=$datos_base->consulta($sql);
$sql = "SELECT id_usuarios FROM usuarios where login='".$login."' and pass='".$pass."'";
$salida=$datos_base->consulta($sql);


$sql="INSERT INTO clientes (id_cliente, nombre, apellidos, telefono, id_usuarios) VALUES (NULL,'".$nombre."','".$apellidos."','666','".$salida[0]['id_usuarios']."')";
var_dump($sql); 
$salida=$datos_base->consulta($sql);  
header("Location: nuevo.php");
?>
