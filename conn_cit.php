<?php

	// Varaibles de conexión
	$host = "localhost";
	$usuario = "root";
	$contraseña = "";
	$base_datos = "pharmasystem";

	// Conexión
	$mysqli = new mysqli($host, $usuario, $contraseña, $base_datos);

	// Verificar conexión
	if ($mysqli->connect_error){
		die("Error de conexión: " . $mysqli->connect_error);
		exit();
	}

	//Ejecutar Consulta
	$sql = "SELECT * FROM cita WHERE eliminado = 0";
	$resultado_cit = $mysqli->query($sql);
?>