<?php
	if (isset($_POST['nombre'])) {
		include "conn_med.php";
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$cantidad = $_POST['cantidad'];
		$sql = "INSERT INTO medicamento (nombre, precio, cantidad) VALUES ('$nombre', '$precio', '$cantidad')";

		if ($mysqli->query($sql) === TRUE) {
			header("Location: http://localhost/PharmaSystem/medicamento.php");
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
		<title>Nuevo Medicamento</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Nuevo Medicamento </h1>
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
									<label> Precio	</label>
								</div>
								<div style="margin-bottom: 20px;">
									<div class="input-group">
										<span class="input-group-text">$</span>
						        		<input type="text" class="form-control" name="precio" placeholder="Precio Aquí" required>
						        	</div>
						        </div>
					        </div>
						    <div class="form-group">
						    	<div>
									<label> Cantidad	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="cantidad" placeholder="Cantidad Aquí" required>
						        </div>
					        </div>                  
							<button type="submit" class="btn btn-dark">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>