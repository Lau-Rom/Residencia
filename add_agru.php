<?php

	session_start();
	if (!isset($_SESSION["usuario"])) {
		header("location:index.html");
	}

	$id      = 1;
	$sistema = "Null";
	$estatus = "Activo";
	$nomn_agru = $_POST["nombre"];
	$tipo_agru = $_POST["agrupacion"];
	$esta_agru = $_POST["estado"];
	$muni_agru = $_POST["municipio"];
	$loca_agru = $_POST["localidad"];
	$usua_agru = $_POST["usuario"];
	$cont_agru = $_POST["contrasenia"];
	$clav_agru = $_POST["clave"];


	require("datos_conexion.php");

	$conn = new mysqli($db_host, $db_usuario, $db_contra,$db_nombre);
	if($conn->connect_error){
		die("Conection failed: " .$conn->connect_error);
	}

	$push = "INSERT INTO semilleros(id, sistema, nombre_de_agrupacion, tipo_agrupacion, estado, municipio, localidad, estatus, usuario, contrasena, clave) VALUES ('$id', '$sistema', '$nomn_agru', '$tipo_agru', '$esta_agru', '$muni_agru', '$loca_agru', '$estatus', '$usua_agru', '$cont_agru', '$clav_agru')";

	if($conn -> query($push)== False){
		echo "Error: " . "<br>" . $conn->error;
	}else{
		  echo'<script type="text/javascript">
      		alert("Registro guardado con éxito");
      		window.location.href="home_semillero.php";
      		</script>';
	}

?>