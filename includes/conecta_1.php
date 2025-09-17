<?php
Class conexion {
    private $IP;
    private $user;
    private $pass;
    private $base;
    private $canal;
    public function __construct($IP, $user, $pass, $base) {
        $this->IP = $IP;
        $this->user = $user;
        $this->pass = $pass;
        $this->base = $base;
         $this->canal = mysqli_connect($this->IP, $this->user, $this->pass, $this->base);
    }
   
    public function entra($user,$pass) {
       $salida = false;
        $result = mysqli_query($this->canal, "SELECT * FROM usuarios WHERE login = '$user' AND pass = '$pass';");
        if (mysqli_num_rows($result) == '1') {
            $salida = true;
        }
        return $salida;
    } 
    
    
     public function consulta($sql) {
       $array = mysqli_query($this->canal,$sql);
       return $array;
    } 
    }
  
?> 