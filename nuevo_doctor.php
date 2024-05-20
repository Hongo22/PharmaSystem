<?php
	if (isset($_POST['nombre'])) {
		include "conn_doc.php";
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$titulo = $_POST['titulo'];
		$sql = "INSERT INTO doctor (nombre, apellidos, titulo) VALUES ('$nombre', '$apellidos', '$titulo')";

		if ($mysqli->query($sql) === TRUE) {
			header("Location: http://localhost/PharmaSystem/doctor.php");
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
		<title>Nuevo Doctor</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Agregar doctor </h1>
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
									<label> Título	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="titulo" placeholder="Título Aquí" required>
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