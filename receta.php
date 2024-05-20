<?php
			include "conn_rec.php";
			include "conn_pac.php";
      include "conn_med.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include "layout.php"; ?>
    <div class= "container text-center">
      <div class="row">
        <div class="col mb-1">
          <h1>Recetas</h1>
        </div>      
       </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-11">
        <div class="text-center">
            <table class="table table-responsive table-bordered">
               <thead>
                <tr>
                  <th scope="col">Nombre de Paciente</th>
                  <th scope="col">Medicamento</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Intervalo</th>
                  <th scope="col">Diagnostico</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($fila = $resultado_rec->fetch_assoc() ) {
                    $fila_id_pac = $fila["id_pac"];
                    $fila_id_med = $fila["id_med"];
                  	$sql = "SELECT * FROM paciente WHERE id = '$fila_id_pac'";
                  	$resultado = $mysqli->query($sql);
                  	while ($paciente = $resultado->fetch_assoc()){
                      $sql = "SELECT * FROM medicamento WHERE id = '$fila_id_med'";
                      $resultado_id_med = $mysqli->query($sql);
                      while ($medicamento = $resultado_id_med->fetch_assoc()){
                  ?>
                <tr>
                  <td><?=$paciente['nombre']?> <?=$paciente['apellidos']?></td>
                  <td><?=$medicamento["nombre"]?></td>
                  <td><?=$fila["cantidad"]?></td>
                  <td><?=$fila["intervalo"]?></td>
                  <td><?=$fila["diagnostico"]?></td>
                  <td>
                    <a href="editar_receta.php?id=<?=$fila['id']?>" class="btn btn-outline-primary">Editar</a>
                    <a href="eliminar_receta.php?id=<?=$fila['id']?>" class="btn btn-outline-danger">Eliminar</a>
                  </td>
                </tr>
                <?php 
                    }
                  }
                } ?>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </body>
</html>