<?php
	if (isset($_POST['diagnostico'])) {
		include "conn_rec.php";
		include "conn_pac.php";
		$id = $_POST['id'];
		$diagnostico = $_POST['diagnostico'];
		$id_med = $_POST['id_med'];
		$cantidad = $_POST['cantidad'];
		$intervalo = $_POST['intervalo'];

		$sql = "UPDATE receta SET diagnostico = '$diagnostico', id_med ='$id_med', cantidad ='$cantidad', intervalo = '$intervalo' WHERE id = '$id'";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/receta.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{

		include "conn_med.php";
		$sql = "SELECT * FROM medicamento WHERE eliminado = 0";
		$medicamento = $mysqli->query($sql);

		if (isset($_GET['id'])) {
			include "conn_rec.php";
			$id = $_GET['id'];
			$sql = "SELECT * FROM receta WHERE id = '$id'";
			$resultado = $mysqli->query($sql);
			$receta = $resultado->fetch_object();
		}else{
			echo "Receta no existente";
			exit();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Editar Receta</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Editar receta </h1>
			     	</div>
			         <div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$receta->id?>">
							<div class="form-group">
								<div>
									<label> Diagnóstico	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="diagnostico" placeholder="Nombre Aquí" required value="<?=$receta->diagnostico?>">
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
									<label> Cantidad	</label>
								</div>
								<div style="margin-bottom: 20px;">
						        	<input type="text" class="form-control" name="cantidad" placeholder="Diagnostico Aquí" required value="<?=$receta->cantidad?>">
						        </div>
					        </div>
						    <div class="form-group">
						    	<div>
									<label> Intervalo	</label>
								</div>
								<div style="margin-bottom: 30px;">
						        	<input type="text" class="form-control" name="intervalo" placeholder="Intervalo Aquí" required value="<?=$receta->intervalo?>">
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