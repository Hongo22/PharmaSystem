<?php
	if (isset($_POST['nombre'])) {
		include "conn_doc.php";
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$titulo = $_POST['titulo'];
		$sql = "UPDATE doctor SET nombre = '$nombre', apellidos ='$apellidos', titulo ='$titulo' WHERE id = '$id'";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/doctor.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{
		if (isset($_GET['id'])) {
			include "conn_doc.php";
			$id = $_GET['id'];
			$sql = "SELECT * FROM doctor WHERE id = '$id'";
			$resultado = $mysqli->query($sql);
			$doctor = $resultado->fetch_object();
		}else{
			echo "Paciente no existente";
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Editar Paciente</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Editar doctor </h1>
			     	</div>
			         <div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$doctor->id?>">
							<div class="form-group">
								<div>
									<label> Nombre	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="nombre" placeholder="Nombre Aquí" required value="<?=$doctor->nombre?>">
						        </div>
					        </div>
					        <div class="form-group">
					        	<div>
									<label> Apellidos	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="apellidos" placeholder="Apellido Aquí" required value="<?=$doctor->apellidos?>">
						        </div>
					        </div>
						    <div class="form-group">
						    	<div>
									<label> Diagnostico	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="titulo" placeholder="Diagnostico Aquí" required value="<?=$doctor->titulo?>">
						        </div>
					        </div>        
							<button class="btn btn-outline-success" type="submit">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>