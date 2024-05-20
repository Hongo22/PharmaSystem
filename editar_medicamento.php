<?php
	if (isset($_POST['nombre'])) {
		include "conn_med.php";
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
		$sql = "UPDATE medicamento SET nombre = '$nombre', cantidad ='$cantidad', precio ='$precio' WHERE id = '$id'";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/medicamento.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{
		if (isset($_GET['id'])) {
			include "conn_med.php";
			$id = $_GET['id'];
			$sql = "SELECT * FROM medicamento WHERE id = '$id'";
			$resultado = $mysqli->query($sql);
			$medicamento = $resultado->fetch_object();
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
		<title>Editar Medicamento</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Editar medicamento </h1>
			     	</div>
			         <div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$medicamento->id?>">
							<div class="form-group">
								<div>
									<label> Nombre	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="nombre" placeholder="Nombre Aquí" required value="<?=$medicamento->nombre?>">
						        </div>
					        </div>
					        <div class="form-group">
					        	<div>
									<label> Precio	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="precio" placeholder="Precio Aquí" required value="<?=$medicamento->precio?>">
						        </div>
					        </div>
						    <div class="form-group">
						    	<div>
									<label> Cantidad	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="cantidad" placeholder="Cantidad Aquí" required value="<?=$medicamento->cantidad?>">
						        </div>
					        </div>                   
							<button class="btn btn-success" type="submit">Guardar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>