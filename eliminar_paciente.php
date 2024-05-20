<?php
	if (isset($_POST['eliminado'])) {
		include "conn_pac.php";
		$id = $_POST['id'];
		$eliminado = $_POST['eliminado'];
		$sql = "UPDATE paciente SET eliminado = 1 WHERE id = '$id'";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/paciente.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{
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
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Eliminar Paciente</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Eliminar paciente </h1>
			     	</div>
			     	<div class="col-md-11">
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
				        <div class= "text-center" style="margin-top: 5px;">
			         		<h3> ¿Seguro eliminar este paciente?</h3>
			     		</div>
				      </div>
				      <div class= "text-center" style="margin-top: 15px;">
			         	<a href="paciente.php" class="btn btn-success">No Eliminar</a>
			         </div>
			         	<div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$paciente->id?>">
							<input type="hidden" name="eliminado" value="<?=$paciente->eliminado?>">
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>