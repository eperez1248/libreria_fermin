<!DOCTYPE html>
<?php 
if (isset($_REQUEST['error'])){    
    echo " Tus credenciales no son correctas";
}
?>
  <html>
    <head>
        <meta charset="UTF-8">
        <title>biblioteca fermin</title>
        <link rel="stylesheet" href="css/libre.css"/>
        <script src="js/libre.js"></script>   
    </head>
    <body>   <h2><p>Bienvenido a BIBLIOTECA FERMIN</p></h2>                
        <form  method="POST" action="login_1.php" >
            <fieldset>
                <legend>ACCESO AL SISTEMA DE BIBLIOTECA FERMIN</legend>
                <p id= "tip" class= "tip" >   </p> 
                <p > Usuario :<input type="text"   title="Usuario" name="usuario" onfocus="TextoAyuda(0)"  /></p>                         
                    <p onclick="pass()">Pass: <input type="password"  name="pass"onfocus="TextoAyuda(1)" title="password"  /></p>
                    <p><input type="submit" value="enviar"   /></p>                    
            </fieldset> 
        </form>          
    </body>
</html>
