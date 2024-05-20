<?php
include "conn_med";
	if (isset($_POST['eliminado'])) {
		include "conn_rec.php";
		$id = $_POST['id'];
		$id_med = $_POST['id_med'];
		$eliminado = $_POST['eliminado'];
		$sql = "UPDATE receta SET eliminado = 1 WHERE id = '$id'";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/receta.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{
		
		if (isset($_GET['id'])) {
			include "conn_pac.php";
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
		<title>Eliminar Receta</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Eliminar receta </h1>
			     	</div>
			     	<div class="col-md-11">
				        <table class="table table-responsive table-bordered">
				           <thead>
				            <tr>
				              <th scope="col">Diagnostico</th>
				              <th scope="col">Id_Med</th>
				              <th scope="col">Cantidad</th>
				              <th scope="col">Intervalo</th>
				            </tr>
				          </thead>
				          <tbody>
				            <tr>
				              <td><?=$receta->diagnostico?></td>
				              <td><?=$receta->id_med?></td>
				              <td><?=$receta->cantidad?></td>
				              <td><?=$receta->intervalo?></td>
				            </tr>
				          </tbody>
				        </table>
				        <div class= "text-center" style="margin-top: 5px;">
			         		<h3> ¿Seguro eliminar este receta?</h3>
			     		</div>
				      </div>
				      <div class= "text-center" style="margin-top: 15px;">
			         	<a href="receta.php" class="btn btn-success">No Eliminar</a>
			         </div>
			         	<div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$receta->id?>">
							<input type="hidden" name="eliminado" value="<?=$receta->eliminado?>">
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>