<?php
	if (isset($_POST['nombre'])) {
		include "conn_pac.php";
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$diagnóstico = $_POST['diagnóstico'];
		$edad = $_POST['edad'];
		$sql = "INSERT INTO paciente (nombre, apellidos, diagnóstico, edad) VALUES ('$nombre', '$apellidos', '$diagnóstico', '$edad')";

		if ($mysqli->query($sql) === TRUE) {
			header("Location: http://localhost/PharmaSystem/paciente.php");
			/*exit();*/
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nuevo Paciente</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Agregar paciente </h1>
			     	</div>
			         <div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<div class="form-group">
								<div>
									<label> Nombre	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="nombre" placeholder="Nombre Aquí" required>
						        </div>
					        </div>
					        <div class="form-group">
					        	<div>
									<label> Apellidos	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="apellidos" placeholder="Apellidos Aquí" required>
						        </div>
					        </div>
						    <div class="form-group">
						    	<div>
									<label> Diagnostico	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="diagnóstico" placeholder="Diagnostico Aquí" required>
						        </div>
					        </div>
						    <div class="form-group">
						    	<div>
									<label> Edad	</label>
								</div>
								<div style="margin-bottom: 30px;">
						        	<input type="number" class="form-control" name="edad" placeholder="Edad Aquí" required>
						        </div>
					        </div>                   
							<button type="submit" class="btn btn-outline-dark">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>