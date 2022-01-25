<?php
class Personas {
private $Dni;
private $Apellidos;
private $Nombres;
/// Getters and Setters
public function setDni($doc){$this->Dni=$doc;}

public function setApellidos($lastName){$this->Apellidos=$lastName;}

public function setNombres($name){$this->Nombres=$name;}

public function getDni(){return $this->Dni;}

public function getApellidos(){return $this->Apellidos;}

public function getNombres(){return $this->Nombres;}
    
}

?>