<?php
session_start();
require '../Dao/PersonasDao.php';
$daoPersonas = new PersonasDao();
if(isset($_POST['btn-guardar'])){
if($_POST['btn-guardar']=="Guardar"){
$DNI=$_POST['txt-documento'];
$APELLIDOS=$_POST['txt-lastname'];
$NOMBRES =$_POST['txt-nombres'];
if(strlen($DNI)==8 and is_numeric($DNI) and strlen($APELLIDOS)>0 and strlen($NOMBRES)>0){
    $response = $daoPersonas->createPersona($DNI,$APELLIDOS,$NOMBRES);
    if($response=="1"){
    $_SESSION['mensaje']="<h3 class='alert alert-success'>Persona Registrado</h3>";  
    header("Location:../vistas/personas.php");  
    }else{
    if($response=="existe"){
    $_SESSION['mensaje']="<h3 class='alert alert-warning'>Ya existe esa persona con ese DNI</h3>"; 
    header("Location:../vistas/personas.php");       
    }else{
    $_SESSION['mensaje']="<h3 class='alert alert-danger'>Error al registrar persona</h3>"; 
    header("Location:../vistas/personas.php");   
    }
    }
}else{
    $_SESSION['mensaje']="<h3 class='alert alert-danger'>Error al registrar persona</h3>"; 
    header("Location:../vistas/personas.php"); 
}
}    
} 

?>