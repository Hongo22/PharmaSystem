<?php
			include "conn_cit.php";
			include "conn_pac.php";
      include "conn_doc.php";
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
          <h1>Citas</h1>
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
                  <th scope="col">Nombre de Doctor</th>
                  <th scope="col">Hora</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  while ($fila = $resultado_cit->fetch_assoc() ) {
                    $fila_id_pac = $fila["id_pac"];
                    $fila_id_doc = $fila["id_doc"];
                  	$sql = "SELECT * FROM paciente WHERE id = '$fila_id_pac'";
                  	$resultado = $mysqli->query($sql);
                  	while ($paciente = $resultado->fetch_assoc()){
                      $sql = "SELECT * FROM doctor WHERE id = '$fila_id_doc'";
                      $resultado_id_doc = $mysqli->query($sql);
                      while ($doctor = $resultado_id_doc->fetch_assoc()){
                  ?>
                <tr>
                  <td><?=$paciente['nombre']?> <?=$paciente['apellidos']?></td>
                  <td><?=$doctor["nombre"]?> <?=$doctor['apellidos']?></td>
                  <td><?=$fila["hora"]?></td>
                  <td><?=$fila["fecha"]?></td>
                  <td>
                    <a href="editar_cita.php?id=<?=$fila['id']?>" class="btn btn-outline-primary">Editar</a>
                    <a href="eliminar_cita.php?id=<?=$fila['id']?>" class="btn btn-outline-danger">Eliminar</a>
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