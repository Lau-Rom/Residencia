<?php 

session_start();
if(!isset($_SESSION["usuario"])){

	header("location:index.html");
}
$nombre_de_agrupacion = $_SESSION['nombre_de_agrupacion'];

require ("datos_conexion.php");


$conn = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM semilleros";

$result = mysqli_query($conn, $sql);


mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Semilleros Creativos M&uacute;sica</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" href="instalar-bp-ac/css/bootstrap.min.css">
</head>
<body>
	<div class="container abc">
		<div class="container-fluid text-center">
			<h1 class="text-success">Agrupaciones Musicales Comunitarias</h1>
			<p>***** **** *** ** * ** *** **** *****</p>
			<p>Bienvenido/a: <strong><?php  echo $nombre_de_agrupacion; ?></strong></p>
			<div class="espacio"><h3>-- oo -- oo -- oo</h3></div>
		</div>

		<form action="prueba_domingo.php" method="POST">
			<fieldset>
				<legend>Consulta por agrupación</legend>
				<div class="row aling-items-center form-group">
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 text-left">
						<label>Selecciona agrupación:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 text-left">
						<select name="agrupacion" class="form-select" aria-label="Default select example">
							<option value="0">Seleccione:</option><?php
							while($fila = mysqli_fetch_row($result)){
								echo '<option value="'.$fila[3].'">'.$fila[3].'</option>';
								}?>
						</select>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 text-left">
						<label>Estatus</label>						
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 text-left">
						<select name = "estatus" class =  "form-select" aria-label = "Default select example">
							<option value="Activo">Activo</option>
							<option value="Inactivo">Inactivo</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5"></div>
					<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 mb-5">
						<!-- sucio truco -->
						<p></p>
						<!-- fin sucio truco -->
						<button type="button" class="btn btn-outline-dark" onclick="location.href='ver_gral.php'">Atrás</button>
						<button class="btn btn-outline-secondary" type="reset">Limpiar</button>
						<button class="btn btn-outline-primary" type="submit">Buscar</button>
					</div>
				</div>
			</fieldset>
		</form>
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
