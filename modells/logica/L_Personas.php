<?php
require_once '../config/Conexion.php';
require_once '../config/Controlador.php';
class L_Personas{
private $control;
/// constructor
public function __construct()
{
$this->control = new Controlador();    
}
/// creamos los métodos 
/**
 *Método que sirve para crear nuevas personas 
 **/ 
public function addPersonas($persona){
$response="";
/// llamamos a la conexión
$conex = new Conexion();
/// datos a enviar
$DNI = $persona->getDni();
$APELLIDOS = $persona->getApellidos();
$NOMBRES = $persona->getNombres();
/// query para verificar la existencia de la persona por el # de documento
$queryExist ="SELECT *FROM personas where dni=?";
try{
$conex->sql="INSERT INTO personas(dni,apellidos,nombres) values(?,?,?)";
$conex->pps=$conex->getConection()->prepare($conex->sql);
$conex->pps->bind_param("sss",$DNI,$APELLIDOS,$NOMBRES);
/// MANDAMOS A REGISTRAR 
if($this->control->existeDato($queryExist,$DNI)==0){
/// como no existe la persona con un dni nuevo, por lo tanto mandamos a registrar a la persona
/// ahora verificamos si todo esta correcto
if($conex->pps->execute()>0){$response="1";}else{$response="0";} 
}else{
$response="existe";
}
}catch(Exception $e){$conex->CerrarBD();}
return $response;
}
}
?>
 
 
 