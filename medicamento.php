<?php
  include "conn_med.php"
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include "layout.php"; ?>
    <div class= "container text-center">
      <div class="row">
        <div class="col mb-1" style="margin-left: 420px;">
          <h1>Medicamentos</h1>
        </div>
        <div class="col mb-12" style="margin-left: 200px; margin-top: 7px;">
          <a href="nuevo_medicamento.php" class="btn btn-outline-success">Nuevo Medicamento</a>
        </div> 
      </div>
    <div class="row justify-content-center">
      <div class="col-md-11">
        <table class="table table-responsive table-bordered">
           <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ($fila = $resultado->fetch_assoc()) { ?>
            <tr>
              <td><?=$fila["nombre"]?></td>
              <td>$<?=$fila["precio"]?></td>
              <td><?=$fila["cantidad"]?></td>
              <td>
                  <a href="editar_medicamento.php?id=<?=$fila['id']?>" class="btn btn-outline-primary">Editar</a>
                  <a href="eliminar_medicamento.php?id=<?=$fila['id']?>" class="btn btn-outline-danger">Eliminar</a>
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