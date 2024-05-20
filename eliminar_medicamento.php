<?php
	if (isset($_POST['eliminado'])) {
		include "conn_med.php";
		$id = $_POST['id'];
		$eliminado = $_POST['eliminado'];
		$sql = "UPDATE medicamento SET eliminado = 1 WHERE id = '$id'";

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
		<title>Eliminar Medicamento</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Eliminar medicamento </h1>
			     	</div>
			     	<div class="col-md-11">
				        <table class="table table-responsive table-bordered">
				           <thead>
				            <tr>
				              <th scope="col">Nombre</th>
				              <th scope="col">Precio</th>
				              <th scope="col">Cantidad</th>
				            </tr>
				          </thead>
				          <tbody>
				            <tr>
				              <td><?=$medicamento->nombre?></td>
				              <td><?=$medicamento->precio?></td>
				              <td><?=$medicamento->cantidad?></td>
				            </tr>
				          </tbody>
				        </table>
				        <div class= "text-center" style="margin-top: 5px;">
			         		<h3> ¿Seguro eliminar este medicamento?</h3>
			     		</div>
				      </div>
				      <div class= "text-center" style="margin-top: 15px;">
			         	<a href="medicamento.php" class="btn btn-success">No Eliminar</a>
			         </div>
			         	<div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$medicamento->id?>">
							<input type="hidden" name="eliminado" value="<?=$medicamento->eliminado?>">
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>