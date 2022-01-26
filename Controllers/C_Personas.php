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
/// Boton Modificar
if(isset($_POST['btn-guardar-edit'])){
if($_POST['btn-guardar-edit']=='Guardar Cambios'){
    $DNI=$_POST['txt-documento-edit'];
    $APELLIDOS=$_POST['txt-lastname-edit'];
    $NOMBRES =$_POST['txt-nombres-edit'];
    $ID=$_POST['txt-id'];
    if(strlen($DNI)==8 and is_numeric($DNI) and strlen($APELLIDOS)>0 and strlen($NOMBRES)>0){
        $response = $daoPersonas->updatePersona($DNI,$APELLIDOS,$NOMBRES,$ID);
        if($response=="1" || $response=="existe"){
        $_SESSION['mensaje-edit']="<h3 class='alert alert-success'>Persona Modificado</h3>";  
        header("Location:../vistas/editar.php");  
        } 
    }else{
        $_SESSION['mensaje-edit']="<h3 class='alert alert-danger'>Error al modificar persona</h3>"; 
        header("Location:../vistas/editar.php"); 
    }  
}    
}
/// eliminar
if(isset($_POST['btn-delete'])){
if($_POST['btn-delete']=='Eliminar'){
$ID=$_POST['txt-id-delete'];
if($daoPersonas->EliminarPersona($ID)==1){
header("Location:../vistas/listado.php");
}
}    
}

?>