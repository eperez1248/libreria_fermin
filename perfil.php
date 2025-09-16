<?php
include_once 'includes/cabecera.php';

if ($_SESSION['perfil']=='1'){
    header("Location: usuario\inicio.php");
    
}
if ($_SESSION['perfil']=='2'){
    header("Location: gestor\iniciogestion.php");
    
}
if ($_SESSION['perfil']=='3'){
    header("Location: administrador\inicioadministracion.php");
    
}
