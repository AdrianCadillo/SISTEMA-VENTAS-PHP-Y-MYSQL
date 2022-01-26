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
/**
 * Metodo para mostrar las personas existentes 
 */
public function viewPersonas($persona){
$conexion = new Conexion();$filas=0;
/// creamos un arreglo para almacenar a todas las personas
$dataPersona = array();
try{
$conexion->sql="SELECT *FROM personas";
$conexion->pps = $conexion->getConection()->prepare($conexion->sql);
$conexion->pps->execute();
$conexion->rs =$conexion->pps->get_result();
while($datos = $conexion->rs->fetch_row()){
$persona = new Personas();
$persona->setIdPersona($datos[0]);
$persona->setDni($datos[1]);
$persona->setApellidos($datos[2]);
$persona->setNombres($datos[3]);
array_push($dataPersona,$persona);
}
}catch(Exception $e){$conexion->CerrarBD();}
return $dataPersona;
}
public function viewPersonasPorId($persona){
    $conexion = new Conexion();$filas=0;
    /// madamos el dato DNI para filtrar
    $ID=$persona->getIdPersona();
    /// creamos un arreglo para almacenar a todas las personas
    $dataPersona = array();
    try{
    $conexion->sql="SELECT *FROM personas WHERE id_persona=?";
    $conexion->pps = $conexion->getConection()->prepare($conexion->sql);
    $conexion->pps->bind_param("i",$ID);
    $conexion->pps->execute();
    $conexion->rs =$conexion->pps->get_result();
    while($datos = $conexion->rs->fetch_row()){
    $persona = new Personas();
    $persona->setDni($datos[1]);
    $persona->setApellidos($datos[2]);
    $persona->setNombres($datos[3]);
    array_push($dataPersona,$persona);
    }
    }catch(Exception $e){$conexion->CerrarBD();}
    return $dataPersona;
    }
    /**
     * Método para editar las personas
     */
    public function modifyPersonas($persona){

        $response="";
        /// llamamos a la conexión
        $conex = new Conexion();
        /// datos a enviar
        $DNI = $persona->getDni();
        $APELLIDOS = $persona->getApellidos();
        $NOMBRES = $persona->getNombres();
        $ID= $persona->getIdPersona();
        /// query para verificar la existencia de la persona por el # de documento
        $queryExist ="SELECT *FROM personas where dni=?";
        try{
        $conex->sql="UPDATE personas SET dni=?,apellidos=?,nombres=? WHERE id_persona=?";
        $conex->query="UPDATE personas SET apellidos=?,nombres=? WHERE id_persona=?";
        /// MANDAMOS A REGISTRAR 
        if($this->control->existeDato($queryExist,$DNI)==0){
        $conex->pps=$conex->getConection()->prepare($conex->sql);
        $conex->pps->bind_param("sssi",$DNI,$APELLIDOS,$NOMBRES,$ID);
        /// como no existe la persona con un dni nuevo, por lo tanto mandamos a registrar a la persona
        /// ahora verificamos si todo esta correcto
        if($conex->pps->execute()>0){$response="1";}else{$response="0";} 
        }else{
        $conex->pps=$conex->getConection()->prepare($conex->query);
        $conex->pps->bind_param("ssi",$APELLIDOS,$NOMBRES,$ID);
            /// como no existe la persona con un dni nuevo, por lo tanto mandamos a registrar a la persona
            /// ahora verificamos si todo esta correcto
        if($conex->pps->execute()>0){$response="1";}else{$response="0";} 
        $response="existe";
        }
        }catch(Exception $e){$conex->CerrarBD();}
        return $response;
        }
 /**
  *Método para eliminar personas 
   */       
  public function deletePersona($persona){
  $conexion = new Conexion();$response=0;
  $ID=$persona->getIdPersona();
  try{
  $conexion->query="SELECT *from personas WHERE id_persona=?";
  $filas=$this->control->existeDato($conexion->query,$ID);
  if($filas>0){
  $conexion->sql="DELETE FROM personas WHERE id_persona=?";
  $conexion->pps=$conexion->getConection()->prepare($conexion->sql);
  $conexion->pps->bind_param("i",$ID);
 if($conexion->pps->execute()>0){
 $response=1;    
 }
  }
  }catch(Exception $e){$conexion->CerrarBD();}
  return $response;
  }
}
?>

 
 
 