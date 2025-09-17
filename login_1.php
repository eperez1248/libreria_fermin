<?php
include_once 'includes/conecta_1.php';

$usuario=$_REQUEST['usuario'];
$pass=$_REQUEST['pass'];

$mibase = new conexion("localhost","elena","P@ssw0rd","biblioteca");

if ($mibase->entra($usuario,$pass)){
    echo "estoy dentro";
    
}else
{
    echo "estoy fuera";
} 
