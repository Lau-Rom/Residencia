<?php

session_start();
if(!isset($_SESSION["usuario"])){

	header("location:index.html");
}

$nombre_de_agrupacion = $_SESSION['nombre_de_agrupacion'];

require("datos_conexion.php");

$conn = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM dotacion";
$result = mysqli_query($conn, $sql);


mysqli_close($conn);

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
<style type="text/css">
	.firts_letter{
		text-transform: capitalize;
	}
</style>
<body>
	<div class="container">
		<div class="container-fluid text-center">
			<h1 class="text-success">Semilleros Creativos de Música</h1>
			<p>Unidad de Agrupaciones Musicales Comunitarias</p>
			<p>Administrador: <strong><?php echo $nombre_de_agrupacion; ?></strong></p>
		</div>
		<div class="col-xs-12 col-sm- col-md-6 col-lg-3 text-left">
			<strong>- - - . . . - - - . . . </strong>
		</div>

		<form id="loginform" action="add_agru.php" method="post">
			<fieldset>
				<legend>Ingresar la siguiente información:</legend>
				<div class="row aling-items-center form-group">
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Nombre semillero de música:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<input type="text" name="nombre" class="form-control form-control-sm firts_letter" required onkeyup="this.value=Letras(this.value)">
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<label>Selecciona tipo de agrupación:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<select name="agrupacion" class="form-select" aria-label="Default select example">
							<option value="0">Seleccione...</option>
							<option value="Orquesta Sinfónica">Orquesta Sinfónica</option>
							<option value="Banda Sinfónica">Banda Sinfónica</option>
							<option value="Banda Tradicional">Banda Tradicional</option>
							<option value="Coro Comunitario">Coro Comunitario</option>
							<option value="Ensamble Huasteco">Ensamble Huasteco</option>
							<option value="Ensamble Jarocho">Ensamble Jarocho</option>
							<option value="Ensamble de arpa grande">Ensamble de arpa grande</option>
							<option value="Ensamble de cuerdas">Ensamble de cuerdas</option>
							<option value="Mariachi Tradicional">Mariachi Tradicional</option>
						</select>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Estado:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<select name="estado" class="form-select" aria-label="Default select example">
							<option value="no">Seleccione...</option>
							<option value="Aguascalientes">Aguascalientes</option>
							<option value="Baja California">Baja California</option>
							<option value="Baja California Sur">Baja California Sur</option>
							<option value="Campeche">Campeche</option>
							<option value="Chiapas">Chiapas</option>
							<option value="Chihuahua">Chihuahua</option>
							<option value="CDMX">Ciudad de México</option>
							<option value="Coahuila">Coahuila</option>
							<option value="Colima">Colima</option>
							<option value="Durango">Durango</option>
							<option value="Estado de México">Estado de México</option>
							<option value="Guanajuato">Guanajuato</option>
							<option value="Guerrero">Guerrero</option>
							<option value="Hidalgo">Hidalgo</option>
							<option value="Jalisco">Jalisco</option>
							<option value="Michoacán">Michoacán</option>
							<option value="Morelos">Morelos</option>
							<option value="Nayarit">Nayarit</option>
							<option value="Nuevo León">Nuevo León</option>
							<option value="Oaxaca">Oaxaca</option>
							<option value="Puebla">Puebla</option>
							<option value="Querétaro">Querétaro</option>
							<option value="Quintana Roo">Quintana Roo</option>
							<option value="San Luis Potosí">San Luis Potosí</option>
							<option value="Sinaloa">Sinaloa</option>
							<option value="Sonora">Sonora</option>
							<option value="Tabasco">Tabasco</option>
							<option value="Tamaulipas">Tamaulipas</option>
							<option value="Tlaxcala">Tlaxcala</option>
							<option value="Veracruz">Veracruz</option>
							<option value="Yucatán">Yucatán</option>
							<option value="Zacatecas">Zacatecas</option>
						</select>
					</div>

					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Municipio:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<input type="text" name="municipio" class="form-control form-control-sm firts_letter" required onkeyup="this.value=Letras(this.value)">
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Localidad:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<input type="text" name="localidad" class="form-control form-control-sm firts_letter" required onkeyup="this.value=Letras(this.value)">
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Usuario:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<input type="text" name="usuario" class="form-control form-control-sm firts_letter" required>
					</div>
						<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Contraseña:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<input type="text" name="contrasenia" class="form-control form-control-sm firts_letter" required>
					</div>
						<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Clave/Identificador:</label>
					</div>
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
						<input type="text" name="clave" class="form-control form-control-sm firts_letter" required>
					</div>
				</div>
			</fieldset>

		</fieldset>
		<div class="row">
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">
				<!-- sucio truco -->
				<p></p>
				<!-- fin sucio truco -->
			</div>
			<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 mb-5">

				<button type="button" class="btn btn-outline-dark" onclick="location.href='agregar_admin.php'">Atrás</button>
				<button class="btn btn-outline-secondary" type="reset">Limpiar</button>
				<button class="btn btn-outline-primary" type="submit">Agregar</button>
			</div>
		</div>
	</form>
</div>
<!-- Boostrap -->
<script src="instalar-bp-ac/js/bootstrap.bundle.js"></script>
</body>
<footer>
	<div class="container-fluid text-center">
		<em>Sistema Nacional de Fomento Musical 2023</em>
	</div>
</footer>