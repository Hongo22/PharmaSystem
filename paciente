<?php include "conn_pac.php"?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include "layout.php"; ?>
    <div class= "container text-center">
      <div class="row">
        <div class="col mb-1" style="margin-left: 470px;">
          <h1>Pacientes</h1>
        </div>
        <div class="col mb-12" style="margin-left: 300px; margin-top: 7px;">
          <a href="nuevo_paciente.php" class="btn btn-outline-success">Nuevo Paciente</a>
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
              <th scope="col">Opciones</th>
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
              <td>
                <div class="btn-group" role="group">
                  <a href="editar_paciente.php?id=<?=$fila['id']?>" class="btn btn-outline-primary">Editar</a>
                  <div class="dropdown">
                    <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Crear
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="nueva_receta.php?id=<?=$fila['id']?>">Crear Receta</a></li>
                      <li><a class="dropdown-item" href="nueva_cita.php?id=<?=$fila['id']?>">Crear Cita</a></li>
                    </ul>
                  </div>
                  <a href="eliminar_paciente.php?id=<?=$fila['id']?>" class="btn btn-outline-danger">Eliminar</a>
                </div>
                </div>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  </body>
</html>
