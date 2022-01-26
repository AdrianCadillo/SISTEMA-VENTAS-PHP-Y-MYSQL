<?php
require '../modells/logica/L_Personas.php';
require '../modells/entidades/Personas.php';

class PersonasDao{
private $personalogica;
private $personasEntidad;
public function __construct()
{
$this->personalogica = new L_Personas();  
$this->personasEntidad = new Personas();
}

/// creamos los métodos 
public function createPersona($dni,$lastName,$name){
$row_Affects="";
$this->personasEntidad->setDni($dni);
$this->personasEntidad->setApellidos($lastName);
$this->personasEntidad->setNombres($name);
$row_Affects=$this->personalogica->addPersonas($this->personasEntidad);
return $row_Affects;
}
/**
 * Método que trae la data de las personas
 */

 public function mostrarPersonas(){
 $listado = $this->personalogica->viewPersonas($this->personasEntidad);  
 $tr="";$contador=0;
 foreach ($listado as $value) {$contador+=1;
 $tr.="<tr><td>".$contador."</td><td>".$value->getDni()."</td>
 <td>".$value->getApellidos()." ".$value->getNombres()."</td>
 <td class='text-center'><a href='editar.php?ID=".$value->getIdPersona()."' class='btn btn-warning btn-sm'>Editar</a>
 <a href='eliminar.php?ID=".$value->getIdPersona()."&&persona=".$value->getApellidos()." ".$value->getNombres()."' class='btn btn-danger btn-sm'>eliminar</a></td></tr>";
 }
 echo $tr;
 }

 /// EDITAR PERSONAS
public function buscarPorId($id){
$this->personasEntidad->setIdPersona($id);
$listadoPorDni=$this->personalogica->viewPersonasPorId($this->personasEntidad);
foreach ($listadoPorDni as  $value) {
 
echo '
<div class="form-group">
<label for="txt-dni">DNI (*) </label>
<input type="text" id="txt-dni" name="txt-documento-edit" class="form-control" placeholder="# dni.."
value="'.$value->getDni().'">    
</div> 
<div class="form-group">
<label for="txt-apellidos">APELLIDOS (*) </label>
<input type="text" id="txt-apellidos" name="txt-lastname-edit" class="form-control" 
value="'.$value->getApellidos().'">    
</div> 
<div class="form-group">
<label for="txt-name">NOMBRES (*) </label>
<input type="text" id="txt-name" name="txt-nombres-edit" class="form-control" placeholder="Nombres completos.."
value="'.$value->getNombres().'">    
</div>
' ;   
}
}
/// Método para guardar los cambios al modificar persona
public function updatePersona($dni,$lastName,$name,$id){
    $row_Affects="";
    $this->personasEntidad->setDni($dni);
    $this->personasEntidad->setApellidos($lastName);
    $this->personasEntidad->setNombres($name);
    $this->personasEntidad->setIdPersona($id);
    $row_Affects=$this->personalogica->modifyPersonas($this->personasEntidad);
    return $row_Affects;
    }
public function EliminarPersona($ID){
$this->personasEntidad->setIdPersona($ID);
$valor=$this->personalogica->deletePersona($this->personasEntidad); 
return $valor;  
}
}
?>
 

