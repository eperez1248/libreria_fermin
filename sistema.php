        
<?php
include_once 'clases.php';

session_start();
$id_usuario = $_SESSION['id_usuarios'];
$miconsulta = new conecta("localhost", "elena","P@ssw0rd", "biblioteca");
$miconsulta->conecta();

$sql = "SELECT libros.titulo,autor.nombre,autor.apellidos\n"

    . "FROM\n"

    . "usuarios,clientes,alquilan,libros,autor\n"

    . "WHERE\n"

    . "usuarios.id_usuarios=clientes.id_usuarios AND\n"

    . "clientes.id_cliente=alquilan.id_cliente AND\n"

    . "alquilan.id_libro=libros.id_libros AND\n"

    . "libros.id_autor=autor.id_autor AND\n"

    . "usuarios.id_usuarios='".$id_usuario."';";

$array=$miconsulta->consulta($sql);
foreach ($array as $value) {
    echo "<p>".$value['titulo']. " ".$value['nombre']." ".$value['apellidos']. "</p>";
   
 
} 