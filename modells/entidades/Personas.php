<?php
class Personas {
private $IdPersona;
private $Dni;
private $Apellidos;
private $Nombres;
/// Getters and Setters
public function setIdPersona($id){$this->IdPersona=$id;}

public function setDni($doc){$this->Dni=$doc;}

public function setApellidos($lastName){$this->Apellidos=$lastName;}

public function setNombres($name){$this->Nombres=$name;}

public function getIdPersona(){return $this->IdPersona;}

public function getDni(){return $this->Dni;}

public function getApellidos(){return $this->Apellidos;}

public function getNombres(){return $this->Nombres;}
    
}

?>