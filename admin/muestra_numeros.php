<?php 
session_start();
if(!isset($_SESSION["usuario"])){

	header("location:index.html");
}
$semillero = $_SESSION['nombre_de_agrupacion'];
require("datos_conexion.php");

$conn = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT semillero, estado_tutor, COUNT(*) FROM db_gral WHERE estatus = 'Activo' GROUP BY semillero";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agrupaciones Musicales Comunitarias</title>
	<link rel="stylesheet" type="text/css" href="css/homee.css">
	<link rel="stylesheet" href="instalar-bp-ac/css/bootstrap.min.css">
	<script type="text/javascript" src="js/form_orquesta.js"></script>
</head>


</style>
<body>
	<div class="container">
		<div class="container-fluid text-center">
			<h1 class="text-success">Agrupaciones Musicales Comunitarias</h1>
			<p>Total integrantes por agrupación</p>
			<p>Administrador: <strong><?php echo $semillero; ?></strong></p>
		</div>


		<div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Agrupación</th>
						<th scope="col">Estado</th>
						<th scope="col">Total</th>
					</tr>
					
					<?php 

					$contador = 1;
					while($fila = mysqli_fetch_row($result)){
						echo "<tr><td>";
						echo $contador."</td><td>";
						echo $fila[0]."</td><td>";
						echo $fila[1]."</td><td>";
						echo $fila[2]."</td><td>";
						$contador++;
					}
					?>
					<tr>
						<th scope="col">Total</th>
					</tr>
				</thead>
			</table>
			<div class="row">
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">

			</div>
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 mb-5">
				<!-- sucio truco -->
				<p></p>
				<!-- fin sucio truco -->
				<button type="button" class="btn btn-outline-dark" onclick="location.href='ver_gral.php'">Atrás</button>
				<button type="button" class="btn btn-outline-success" onclick="javascript:window.print()">Imprimir PDF</button>
			</div>
		</div>

		</div>


<?php

	mysqli_close($conn);
?>