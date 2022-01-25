<?php
require_once 'Conexion.php';
class Controlador{
/**
 * Validar la existencia de datos
 */
public function existeDato($sql,$dato){
$conexion = new Conexion();
$filas=0;
try{
$conexion->pps = $conexion->getConection()->prepare($sql);
$conexion->pps->bind_param("s",$dato);
$conexion->pps->execute();
$conexion->rs = $conexion->pps->get_result();
$filas =$conexion->rs->num_rows;
}catch(Exception $e){}finally{$conexion->CerrarBD();}
return $filas;
}
}
?>
