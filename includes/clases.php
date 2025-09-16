<?php
class entra extends textoarray {
    private $usuario;
    private $pass;
    private $array;
    private $perfil;
    public function __construct($usuario,$pass){
        parent::__construct("datos\\acceso.txt");
        $this->usuario=$usuario;
        $this->pass=$pass; 
        $this->array=$this->getarray();  
    }
    public function autoriza() {
        $salida=false;
        foreach ($this->array as $value) {
            $linea=explode('*',$value);
            if (( $this->usuario==$linea[0])&&( $this->pass==$linea[1]))
            {
                $salida=true;
                $this->perfil=$linea[2];
            }            
        }
        return $salida;
    }
    public function getperfil() {
        return $this->perfil;
    }
}

class vertabla{
    private $arrayt;
    private $libros;
    private $total;   
    public function __construct($array)
    {$this->arrayt=$array;   }
    public function sacatabla() {
      $tabla="<style> table {border-collapse: collapse;} table,th,td {border: 1px solid black;} th,td {padding: 5px;}</style>";
        $tabla=$tabla."<table>";
        $nlibros=0;
        $ntotal=0;
        foreach ($this->arrayt as $value) {
           $tablita=explode('*',$value);
           $tabla=$tabla."<tr><td>".$tablita[0]."</td><td>".$tablita[1]."</td><td>".$tablita[2]."</td></tr>"; 
           $nlibros=$nlibros+$tablita[1];
           $ntotal=$ntotal+$tablita[2];
        }
        $tabla=$tabla."<tr><td>Totales </td><td>".$nlibros."</td><td>".$ntotal."</td></tr>"; 
        $tabla=$tabla."</table>";
        $this->libros=$nlibros;
        $this->total=$ntotal;
        return $tabla;
    }
    public function getlibros(){        
        return intval( $this->libros);}
    public function gettotal(){
        return intval($this->total);}
}


class textoarray{
    private $nombre;
    private $arraytexto;
    public function __construct($nombre){
        $this->nombre=$nombre;
        $this->arraytexto=file($this->nombre);
    }
    public function getarray(){
        return $this->arraytexto;   
    }   
}

class facturas{
    private $arrayfact;
    private $nfact;
    public function __construct($arrayfact,$nfact){
        $this->arrayfact=$arrayfact;
        $this->nfact=$nfact;
        
    }
    public function sacafactura() {
        
        foreach ($this->arrayfact as $value) {
            $linea= explode('*', $value);
            if ($linea[3]==$this->nfact){
                $salidafact[]=$value;               
            }
        }
        return $salidafact;
    }
   
    public function maximo(){
        $max=1;
        foreach ($this->arrayfact as $value) {
            $linea=explode('*',$value);
            if ($max<intval($linea[3]))
            {$max=intval($linea[3]);}        
        }
        return $max;
    }
}
class maximo{
    private $max;
    Private $arraymax;
    public function __construct($arraymax){
        $this->max=1;
        $this->arraymax=$arraymax;
    }
    public function sacamaximo() {
        foreach ($this->arraymax as $value) {
            $linea=explode('*',$value);
            
            if ($this->max < intval($linea[3])){
                $this->max=intval($linea[3]);
              
            }
            
        }
        return $this->max;
    }
    
}
