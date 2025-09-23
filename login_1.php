<?php
//include_once 'includes/clases.php';
include_once 'includes/objconexion.php';

$pasa = new accede('pepe','pepe');

//$dato=$pasa->entra();
//echo 'Las filas son'.$dato;
if ($pasa->entra()){
    echo 'estoy dentro';
}
else
{
    echo 'estoy fuera';
}
$n=$pasa->id_usuario();
echo $n;
//echo $n;//$datos= new Conexion();
//$datos->conecta();
//$sql="SELECT * FROM `usuarios`;";
//$numero_filas=$datos->nregistros($sql);
//var_dump($array);
//var_dump($datos->consulta($sql));
//$enlace = mysqli_connect("localhost", "biblioteca", "P@ssw0rd");
//mysqli_select_db($enlace,"biblioteca");

//$resultado = mysqli_query($enlace,"SELECT * FROM usuarios;");
//$array = mysqli_query($enlace, "SELECT * FROM usuarios");
//$numero_filas = mysqli_num_rows($array);

//echo $numero_filas." Filas\n";


//var_dump($datos->nregistros($sql));





