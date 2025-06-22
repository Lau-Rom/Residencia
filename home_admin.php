<?php

	session_start();
	if(!isset($_SESSION["usuario"])){

		header("location:index.html");
	}
	$nombre_de_agrupacion = $_SESSION['nombre_de_agrupacion'];
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agrupaciones Musicales Comunitarias</title>
	<link rel="stylesheet" type="text/css" href="css/my_css.css">
	<link rel="stylesheet" href="instalar-bp-ac/css/bootstrap.min.css">
</head>

<style type="text/css">

</style>

<body>
	<div class="container abc">
		<div class="container-fluid text-center">
			<h1 class="text-success">Agrupaciones Musicales Comunitarias</h1>
			<p>Administrador/a: <strong><?php  echo $nombre_de_agrupacion; ?></strong></p>
			<div class="espacio"><h3>¿Qué deseas hacer?</h3></div>
		</div>

		<div class="row aling-items-center">
			<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-3 text-center">
				<button class="button1" onclick="location.href='agregar_admin.php'" >Agregar</button>
			</div>
			<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-3 text-center">
				<button class="button2" onclick="location.href='ver_gral.php'">Ver</button>
			</div>
			<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-3 text-center" >
				<button class="button3" onclick="location.href='#">Editar</button>
			</div>
			<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-3 text-center">
				<button class="button4" onclick="location.href='closed.php'">Salir</button>
			</div>
		</div>
	</div>
	<!-- Boostrap -->
	<script src="instalar-bp-ac/js/bootstrap.bundle.js"></script>
</body>
<footer>
	<div class="container text-center">
		<em>Sistema Nacional de Fomento Musical 2022</em>
	</div>
</footer>
</html>