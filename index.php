<?php

  // Varaibles de conexión
  $host = "localhost";
  $usuario = "root";
  $contraseña = "";
  $base_datos = "pharmasystem";

  // Conexión
  $mysqli = new mysqli($host, $usuario, $contraseña, $base_datos);

  // Verificar conexión
  if ($mysqli->connect_error){
    die("Error de conexión: " . $mysqli->connect_error);
    exit();
  }

  //Ejecutar Consulta
  $sql = "SELECT * FROM paciente WHERE eliminado = 0";
  $resultado = $mysqli->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PharmaSystem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PharmaSystem</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Pacientes</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Inventario</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="#">Citas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Horario</a>
          </li>
           <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
             </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="#">Action</a></li>
               <li><a class="dropdown-item" href="#">Another action</a></li>
               <li><hr class="dropdown-divider"></li>
               <li><a class="dropdown-item" href="#">Something else here</a></li>
             </ul>
           </li>
          <li class="nav-item">
               <a class="nav-link usuario" href="#">Nombre_Doctor</a>
           </li>
         </ul>
        <form class="d-flex">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe6uhqIud1jbG0UfOZv0HU16AgE8TMzOLO2wCNLyr83w&s" class="rounded float-end" width="50" height="50">
         </form>
       </div>
    </div>
   </nav>
    <div class= "container text-center">
      <div class="row">
        <div class="col mb-1">
          <h1>Pacientes</h1>
        </div>      
       </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-11">
        <table class="table table-responsive table-bordered">
           <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Apellidos</th>
              <th scope="col">Diagnóstico</th>
              <th scope="col">Edad</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
              <td><?=$fila["nombre"]?></td>
              <td><?=$fila["apellidos"]?></td>
              <td><?=$fila["diagnóstico"]?></td>
              <td><?=$fila["edad"]?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>