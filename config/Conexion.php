<?php
class Conexion{
/// variables para la conexión
private $usuario="root";//cambias tu name user de tu MySQL
private $pasword="software24";/// cambias tu password de tu MySQL
private $puerto="3306";/// puede cambiar
private $server="localhost";
private $dataBase="usuarios";
private $conector;
public $sql; public $pps;public $rs;

public function __construct(){
$this->conector = new mysqli($this->server,$this->usuario,$this->pasword,
$this->dataBase,$this->puerto);
$this->conector->set_charset("utf-8"); 
}

public function getConection(){return $this->conector;}

/// Cerramos la conexión a la base de datos 
public function CerrarBD(){
if($this->conector!=null){
$this->conector->close();    
}
if($this->pps!=null){
$this->pps->close();    
}
if($this->rs!=null){
$this->rs->close();    
}
    
}

}
 
 

?>
