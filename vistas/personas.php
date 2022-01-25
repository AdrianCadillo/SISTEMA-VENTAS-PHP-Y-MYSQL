<!DOCTYPE html>
<?php
  session_start();
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
  <div class="card-body">
   <form action="../Controllers/C_Personas.php" method="POST">
   <div class="card-title">
  <h3>Registro de Personas</h3>   
 </div>
  <div class="form-group">
   <label for="txt-dni">DNI (*) </label>
   <input type="text" id="txt-dni" name="txt-documento" class="form-control" placeholder="# dni..">    
  </div> 
  <div class="form-group">
   <label for="txt-apellidos">APELLIDOS (*) </label>
   <input type="text" id="txt-apellidos" name="txt-lastname" class="form-control" placeholder="Apellidos completos..">    
  </div> 
  <div class="form-group">
   <label for="txt-name">NOMBRES (*) </label>
   <input type="text" id="txt-name" name="txt-nombres" class="form-control" placeholder="Nombres completos..">    
  </div>
  <div class="row justify-content-center mt-3">
  <input type="submit" class="btn btn-success col-4" id="btn-save" name="btn-guardar" value="Guardar">
  </div> 
  <div class="row text-center mt-3">
  <?php 
  if(isset($_SESSION['mensaje'])){
  if($_SESSION['mensaje']!=null){
    echo $_SESSION['mensaje'];       
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
 