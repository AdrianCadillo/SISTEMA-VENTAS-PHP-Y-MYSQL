<!DOCTYPE html>
<?php
   session_start();
require '../config/Controlador.php';
require '../Dao/PersonasDao.php';
$control = new Controlador();
$daoPersonas = new PersonasDao();
  /// validando la URL
  if(isset($_GET['ID']) and $_GET['ID']!=null){
  $ID=$_GET['ID'];
  $sqlData = "SELECT *FROM personas WHERE id_persona=?";
  $filas=$control->existeDato($sqlData,$ID);
  if($filas==0){ header("Location:listado.php");}
  }else{
   header("Location:listado.php");
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE VENTAS CON PHP Y MYSQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <br><br>
  <div class="container mt-5">
  <div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-5 col-sm-10 col-12">
  <div class="card shadow"> 
  <div class="card-title m-1">
  <h4 class="float-start">Edición de Personas</h4> 
  <span class="float-end"><a href="listado.php" class="btn btn-primary btn-sm">Ver Personas</a></span>
  </div>
  <div class="card-body">
   <form action="../Controllers/C_Personas.php" method="POST">
    <input type="text" hidden="" name="txt-id" value="<?php echo $ID;?>">
    <?php
    $daoPersonas->buscarPorId($ID);
    ?>
  <div class="row justify-content-center mt-3">
  <input type="submit" class="btn btn-success col-4" id="btn-edit-save" name="btn-guardar-edit" value="Guardar Cambios">
  </div> 
  <div class="row text-center mt-3">
  <?php 
  if(isset($_SESSION['mensaje-edit'])){
  if($_SESSION['mensaje-edit']!=null){
    echo $_SESSION['mensaje-edit'];       
  } 
  }
  ?>
  </div>
   </form> 
  </div>
  </div>
  </div>
  </div>
  </div>
   
</body>
</html>
 