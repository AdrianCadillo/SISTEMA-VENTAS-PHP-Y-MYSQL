<!DOCTYPE html>
<?php
if(isset($_GET['ID'])){
    $persona = $_GET['persona'];  
    $ID=$_GET['ID']; 
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <br><br>
    <div class="container">
     <div class="row justify-content-center">
     <div class="col-xl-10 col-lg-10  col-12">
     <div class="card shadow">
    <div class="card-body">
    <br>
    <div class="card-title  ">
     <h5 class="float-start">¿Deseas Eliminar a la persona ?</h5><h4 class=" float-end text-danger"><?php echo $persona;?></h4>    
    </div>  
    <br>
    <div class="card-text text-center mt-5">
     <form action="../Controllers/C_Personas.php" method="POST">
      <input type="text" hidden="" name="txt-id-delete" value="<?php echo $ID; ?>">
      <div class="row justify-content-center">
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
      <input type="submit"  name="btn-delete" class="btn btn-success" value="Eliminar">
      </div>  
      <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
      <a href="listado.php" class="btn btn-danger" >Cancelar</a>
      </div>    
      </div>
     </form>   
    </div>  
    </div>
    </div>
     </div>   
     </div>
    </div>
</body>
</html>