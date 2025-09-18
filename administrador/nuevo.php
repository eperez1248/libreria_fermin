<?php
include_once '../includes/cabecera.php';
include_once '../includes/clases.php';
include_once '../includes/datosconexion.php';
include_once '../includes/objconexion.php';


$mibase = new Conexion("../");
$mibase->conecta();
$sql = "SELECT usuarios.id_usuarios, libros.titulo, autor.nombre, "
        . "alquilan.fecha_devolucion FROM usuarios, clientes, alquilan, libros, "
        . "autor WHERE libros.id_autor=autor.id_autor AND libros.id_libros=alquilan.id_libro "
        . "AND alquilan.id_cliente=clientes.id_cliente AND clientes.id_usuarios=usuarios.id_usuarios "
        . "AND usuarios.id_usuarios='".$_SESSION['id_usuario']."'";
$miarray=$mibase->consulta($sql);
$verArray = new tabla_datos($miarray);
$tabla = $verArray->tabla();
echo "<p>".$tabla."</p>";

include_once '../includes/pie.php';

