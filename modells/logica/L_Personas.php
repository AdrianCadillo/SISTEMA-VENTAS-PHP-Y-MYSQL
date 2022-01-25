<?php
require '../../config/Conexion.php';
class L_Personas{

/// creamos los métodos 
/**
 *Método que sirve para crear nuevas personas 
 **/ 
public function addPersonas($DNI,$APELLIDOS,$NOMBRES){
$valor=0;
/// llamamos a la conexión
$conex = new Conexion();
/// datos a enviar
//$DNI = $persona->getDni();
//$APELLIDOS = $persona->getApellidos();
//$NOMBRES = $persona->getNombres();
try{
$conex->sql="INSERT INTO personas(dni,apellidos,nombres) values(?,?,?)";
$conex->pps=$conex->getConection()->prepare($conex->sql);
$conex->pps->bind_param("sss",$DNI,$APELLIDOS,$NOMBRES);
/// MANDAMOS A REGISTRAR 
$valor = $conex->pps->execute();
}catch(Exception $e){$conex->CerrarBD();}
return $valor;
}
}
?>
 