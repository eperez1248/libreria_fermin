<?php


include_once 'clases.php';

$login = $_REQUEST['login'];
$pass = $_REQUEST['pass'];

$miacceso = new conecta("localhost","elena","P@ssw0rd","biblioteca");
$miacceso->conecta();

if ($miacceso->autenticar($login, $pass)) {
    
    session_start();
    $_SESSION['id_usuarios']=$miacceso->id_usuario($login, $pass);
    
    header("Location: sistema.php");
} else {
    header("Location: index_2.php");
} 