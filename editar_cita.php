<?php
	if (isset($_POST['id_doc'])) {
		include "conn_cit.php";
		include "conn_pac.php";
		$id = $_POST['id'];
		$id_doc = $_POST['id_doc'];
		$hora = $_POST['hora'];
		$fecha = $_POST['fecha'];

		$sql = "UPDATE cita SET id_doc ='$id_doc', hora ='$hora', fecha = '$fecha' WHERE id = '$id'";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/cita.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{

		include "conn_doc.php";
		$sql = "SELECT * FROM doctor WHERE eliminado = 0";
		$doctor = $mysqli->query($sql);

		if (isset($_GET['id'])) {
			include "conn_cit.php";
			$id = $_GET['id'];
			$sql = "SELECT * FROM cita WHERE id = '$id'";
			$resultado = $mysqli->query($sql);
			$cita = $resultado->fetch_object();
		}else{
			echo "Cita no existente";
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Editar Cita</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Editar cita </h1>
			     	</div>
			         <div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$cita->id?>">
					        <div class="form-group">
					        	<div>
									<label> Medicamento </label>
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
									<label> Cantidad	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="time" class="form-control" name="hora" placeholder="Diagnostico Aquí" required value="<?=$cita->hora?>">
						        </div>
					        </div>
						    <div class="form-group">
						    	<div>
									<label> Intervalo	</label>
								</div>
								<div style="margin-bottom: 30px;">
						        	<input type="date" class="form-control" name="fecha" placeholder="Intervalo Aquí" required value="<?=$cita->fecha?>">
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