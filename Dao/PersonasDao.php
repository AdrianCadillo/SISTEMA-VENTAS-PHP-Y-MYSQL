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
}
?>

