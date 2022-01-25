<?php
class Conexion{
/// variables para la conexión
private $usuario="root";//cambias tu name user de tu MySQL
private $pasword="software24";/// cambias tu password de tu MySQL
private $puerto="3306";/// puede cambiar
private $server="localhost";
private $dataBase="usuarios";
private $conector;

public function __construct(){
$this->conector = new mysqli($this->server,$this->usuario,$this->pasword,
$this->dataBase,$this->puerto);
$this->conector->set_charset("utf-8"); 
}

public function getConection(){return $this->conector;}
}

?>
<?php
/// Realizando prueba de la conexión
$con = new Conexion();
if($con->getConection()){
echo "Conexion exitoso";  
}else{
echo "error en la conexion";
}
?>