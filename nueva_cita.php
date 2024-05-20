<?php
	if (isset($_POST['id_pac'])) {
		include "conn_pac.php";
		include "conn_cit.php";
		$id_pac = $_POST['id_pac'];
		$id_doc = $_POST['id_doc'];
		$hora = $_POST['hora'];
		$fecha = $_POST['fecha'];

		$sql = "INSERT INTO cita (id_pac, id_doc, hora, fecha) VALUES ('$id_pac', '$id_doc', '$hora', '$fecha')";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/paciente.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{
		include "conn_doc.php";
		$sql = "SELECT * FROM doctor WHERE eliminado = 0";
		$doctor = $mysqli->query($sql);
	}
		
		if (isset($_GET['id'])) {
			include "conn_pac.php";
			$id = $_GET['id'];
			$sql = "SELECT * FROM paciente WHERE id = '$id'";
			$resultado = $mysqli->query($sql);
			$paciente = $resultado->fetch_object();
		}else{
			echo "Paciente no existente";
			exit();
		}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Generar Cita</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="container text-center">
			<div class="col-sm-auto">
		        <div class="row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1>Generar cita</h1>
			     	</div>
			     	<div class= "text-center" style="margin-top: 10px;">
			         	<h3>Paciente:</h3>
			     	</div>
			     	<div class="text-center" style="margin-top: 15px;">
			     		<div class="row justify-content-sm-center">
				     		<div class="col-sm-8">
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
						            <tr>
						              <td><?=$paciente->nombre?></td>
						              <td><?=$paciente->apellidos?></td>
						              <td><?=$paciente->diagnóstico?></td>
						              <td><?=$paciente->edad?></td>
						            </tr>
						          </tbody>
						        </table>
					    	</div>
				    	</div>
				        <div class= "text-center" style="margin-top: 40px;">
			         		<h3>Info de cita:</h3>
			     		</div>
			     		<div class="row justify-content-sm-center">
			     			<div class="col-sm-5">
						        <form method="post" action="">
						        	<input type="hidden" name="id_pac" value="<?=$paciente->id?>">
							        <div class="form-group">
							        	<div>
											<label> Doctor </label>
										</div>
										<div style="margin-bottom: 30px;">
									        <select name="id_doc" class="form-control" required>
									        	<option value="" selected disabled>Selecciona un doctor</option>
									        	<?php while ($fila = $doctor->fetch_assoc()) { ?>
									        		<option value="<?=$fila['id']?>"><?=$fila['nombre']?> <?=$fila['apellidos']?></option>
									        	<?php } ?>
								        	</select>
								        </div>
							        </div>
								    <div class="form-group">
								    	<div>
											<label> Hora </label>
										</div>
										<div style="margin-bottom: 30px;">
								        	<input type="time" class="form-control" name="hora" placeholder="Hora Aquí" required>
								        </div>
							        </div>
							        <div class="form-group">
								    	<div>
											<label> Fecha </label>
										</div>
										<div style="margin-bottom: 30px;">
								        	<input type="date" class="form-control" name="fecha" placeholder="Fecha de horas Aquí" required>
								        </div>
							        </div>
							     <button type="submit" class="btn btn-dark">Guardar</button>
							 	</form>
						 	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>