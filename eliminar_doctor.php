<?php
	if (isset($_POST['eliminado'])) {
		include "conn_doc.php";
		$id = $_POST['id'];
		$eliminado = $_POST['eliminado'];
		$sql = "UPDATE doctor SET eliminado = 1 WHERE id = '$id'";

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
		<title>Eliminar Paciente</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Eliminar doctor </h1>
			     	</div>
			     	<div class="col-md-11">
				        <table class="table table-responsive table-bordered">
				           <thead>
				            <tr>
				              <th scope="col">Nombre</th>
				              <th scope="col">Apellidos</th>
				              <th scope="col">Título</th>
				            </tr>
				          </thead>
				          <tbody>
				            <tr>
				              <td><?=$doctor->nombre?></td>
				              <td><?=$doctor->apellidos?></td>
				              <td><?=$doctor->titulo?></td>
				            </tr>
				          </tbody>
				        </table>
				        <div class= "text-center" style="margin-top: 5px;">
			         		<h3> ¿Seguro eliminar este doctor?</h3>
			     		</div>
				      </div>
				      <div class= "text-center" style="margin-top: 15px;">
			         	<a href="doctor.php" class="btn btn-success">No Eliminar</a>
			         </div>
			         	<div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$doctor->id?>">
							<input type="hidden" name="eliminado" value="<?=$doctor->eliminado?>">
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>