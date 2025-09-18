<?php

class conecta {

    private $IP;
    private $usuario;
    private $pass;
    private $base;
    private $canal;

    public function __construct($IP, $usuario, $pass, $base) {
        $this->IP = $IP;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->base = $base;
    }

    public function conecta() {
        $this->canal = mysqli_connect($this->IP, $this->usuario, $this->pass, $this->base);
    }

    public function consulta($sql) {

        $array = mysqli_query($this->canal, $sql);
        return $array;
    }

    public function nregistros($sql) {
        $num = mysqli_num_rows(mysqli_query($this->canal, $sql));
        return $num;
    }

    public function autenticar($login, $pass) {
        $salida = false;
        $sql = "SELECT * FROM usuarios WHERE usuarios.login='" . $login . "' and usuarios.pass='" . $pass . "'";
        $num = $this->nregistros($sql);
        if ($num == '1') {
            $salida = true;
        }
        return $salida;
    }
    public function id_usuario($login, $pass){
            $salida='0';
            $sql = "SELECT id_usuarios FROM usuarios WHERE usuarios.login='" . $login . "' and usuarios.pass='" . $pass . "'";
            $array_id = $this->consulta($sql);
            foreach ($array_id as $value) {
                $salida=$value['id_usuarios'];
            }
            return $salida;
    }
} 

