<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

</body>
</html>
<?php

	$usuario = $_POST["usu"];
	$contrasena = $_POST["con"];

	require("datos_conexion.php");

	$conexion = mysqli_connect($db_host, $db_usuario, $db_contra);

	if (mysqli_connect_errno()) {
		echo "Falló la conexión con la BD";
		exit();
	}

	mysqli_select_db($conexion, $db_nombre) or die ("No se encuentra la BD");
	mysqli_set_charset($conexion, "utf8");


	$consulta = "SELECT id, nombre_de_agrupacion, tipo_agrupacion, estado, estatus, usuario, contrasena, clave FROM semilleros WHERE usuario = ? AND contrasena = ?";

	$resultados = mysqli_prepare($conexion, $consulta);
	$ok = mysqli_stmt_bind_param($resultados, 'ss', $usuario, $contrasena);
	$ok = mysqli_stmt_execute($resultados);

	if($ok == false){
		echo "Error en la consulta";
	}else{ 
		$ok = mysqli_stmt_bind_result($resultados, $id, $nombre_de_agrupacion, $tipo_agrupacion, $estado, $estatus, $usuario, $contrasena, $clave);
	}
	
	while (mysqli_stmt_fetch($resultados)) {
		session_start();
		$_SESSION['usuario'] = $_POST['usu'];
		$_SESSION['nombre_de_agrupacion'] = $nombre_de_agrupacion;
		$_SESSION['tipo_agrupacion'] = $tipo_agrupacion;
		$_SESSION['estado'] = $estado;
		$_SESSION['estatus'] = $estatus;
		$_SESSION['clave'] = $clave; 
}
		if($id == 1){
			header("Location:home_semillero.php");
		}
		elseif($id == 2){

			header("Location:home_admin.php");
		}
		else{
			header("Location:index.html");
		}
	

	mysqli_stmt_close($resultados);
	mysqli_close($conexion);

?>