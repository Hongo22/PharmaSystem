<?php
	if (isset($_POST['eliminado'])) {
		include "conn_cit.php";
		$id = $_POST['id'];
		$eliminado = $_POST['eliminado'];
		$sql = "UPDATE cita SET eliminado = 1 WHERE id = '$id'";

		if ($mysqli->query($sql) === TRUE) {
			 header("Location: http://localhost/PharmaSystem/cita.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	}else{
		if (isset($_GET['id'])) {
			include "conn_pac.php";
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
		<title>Eliminar Cita</title>
	</head>
	<body>
		<?php include "layout.php"; ?>
		<div class="row justify-content-center">
			<div class="col-auto">
		        <div class = "row">
		        	<div class= "text-center" style="margin-top: 5px;">
			         	<h1> Eliminar cita </h1>
			     	</div>
			     	<div class="col-md-11">
				        <table class="table table-responsive table-bordered">
				           <thead>
				            <tr>
				              <th scope="col">Id_Doc</th>
				              <th scope="col">Hora</th>
				              <th scope="col">Fecha</th>
				            </tr>
				          </thead>
				          <tbody>
				            <tr>
				              <td><?=$cita->id_doc?></td>
				              <td><?=$cita->hora?></td>
				              <td><?=$cita->fecha?></td>
				            </tr>
				          </tbody>
				        </table>
				        <div class= "text-center" style="margin-top: 5px;">
			         		<h3> ¿Seguro eliminar este cita?</h3>
			     		</div>
				      </div>
				      <div class= "text-center" style="margin-top: 15px;">
			         	<a href="cita.php" class="btn btn-success">No Eliminar</a>
			         </div>
			         	<div class= "text-center" style="margin-top: 15px;">
						<form method="post" action="">
							<input type="hidden" name="id" value="<?=$cita->id?>">
							<input type="hidden" name="eliminado" value="<?=$cita->eliminado?>">
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>