<?php
include_once 'includes/clases.php';
include_once 'includes/objconexion.php';
if (!isset($_REQUEST['usuario'])){
    header("Location: index.php?error=1");   
}
$usuario=$_REQUEST['usuario'];
$pass=$_REQUEST['pass'];
$pasa = new accede($usuario,$pass);
if ($pasa->entra()){
    session_start();
    $_SESSION['perfil']=$pasa->perfil();
    $_SESSION['usuario']=$usuario;
    $_SESSION['id_usuario']=$pasa->id_usuario();
    header("Location: perfil.php");   
}else
{
  header("Location: index.php?error=1");  
}


