<?php
class conexion{
    private $IP;
    private $user;
    private $pass;
    private $base;
    private $canal;
    
    public function __construct($IP, $user,$pass,$base) {
        $this->IP=$IP;
        $this->user=$user;
        $this->pass=$pass;
        $this->base=$base;
    }
    
    public function conecta() {
        $this->canal = mysqli_connect($this->IP, $this->user,$this->pass,$this->base);
    }
    public function consultar($sql) {
        $array = mysqli_query($this->canal,$sql);
        return $array;
    }
}