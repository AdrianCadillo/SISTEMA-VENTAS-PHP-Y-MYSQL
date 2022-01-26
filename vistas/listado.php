<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
 <div class="container-fluid m-4">
 <div class="row justify-content-center"> 
<div class="col-10">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<thead>
<th colspan="4">
<span class="float-start">Desea Volver? --> </span>    
<span class="float-end"><a href="personas.php" class="btn btn-outline-success">Nuevo <b>+</b></a></span>
</th>
<tr style="background-color:#111111;color:white">
<th>Item</th> 
<th>Dni</th>
<th>Persona</th>
<th class="text-center">Acciones</th>   
</tr>   
</thead>
<tbody>
<?php
require '../Dao/PersonasDao.php';
$daoPersona = new PersonasDao();
$daoPersona->mostrarPersonas();
?>   
</tbody>
</table>
</div>
</div>
 </div>    
 </div>   
</body>
</html>