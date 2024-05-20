<?php
	if (isset($_POST['id_pac'])) {
		include "conn_pac.php";
		include "conn_rec.php";
		$id_pac = $_POST['id_pac'];
		$diagnostico = $_POST['diagnostico'];
		$id_med = $_POST['id_med'];
		$cantidad = $_POST['cantidad'];
		$intervalo = $_POST['intervalo'];

		$sql = "INSERT INTO receta (id_pac, diagnostico, id_med, cantidad, intervalo) VALUES ('$id_pac', '$diagnostico', '$id_med', '$cantidad', '$intervalo')";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/paciente.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{
		include "conn_med.php";
		$sql = "SELECT * FROM medicamento WHERE eliminado = 0";
		$medicamento = $mysqli->query($sql);
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
		<title>Generar Receta</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="container text-center">
			<div class="col-sm-auto">
		        <div class="row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1>Generar receta</h1>
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
			         		<h3>Info de receta:</h3>
			     		</div>
			     		<div class="row justify-content-sm-center">
			     			<div class="col-sm-5">
						        <form method="post" action="">
						        	<input type="hidden" name="id_pac" value="<?=$paciente->id?>">
						        	<div class="form-group" style="margin-top: 20px;">
										<div>
											<label> Diagnóstico	</label>
										</div>
										<div style="margin-bottom: 30px;">
								        	<input type="text" class="form-control" name="diagnostico" placeholder="Diagnostico Aquí" required>
								        </div>
							        </div>
							        <div class="form-group">
							        	<div>
											<label> Medicamento </label>
										</div>
										<div style="margin-bottom: 30px;">
								        <select name="id_med" class="form-control" required>
								        	<option value="" selected disabled>Selecciona un medicamento</option>
								        	<?php while ($fila = $medicamento->fetch_assoc()) { ?>
								        		<option value="<?=$fila['id']?>"><?=$fila['nombre']?></option>
								        	<?php } ?>
								        </select>
								        </div>
							        </div>
								    <div class="form-group">
								    	<div>
											<label> Cantidad </label>
										</div>
										<div style="margin-bottom: 30px;">
								        	<input type="text" class="form-control" name="cantidad" placeholder="Cantidad Aquí" required>
								        </div>
							        </div>
							        <div class="form-group">
								    	<div>
											<label> Intervalo </label>
										</div>
										<div style="margin-bottom: 30px;">
								        	<input type="text" class="form-control" name="intervalo" placeholder="Intervalo de horas Aquí" required>
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