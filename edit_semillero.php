<?php

session_start();
if(!isset($_SESSION["usuario"])){

	header("location:index.html");
}
$semillero = $_SESSION['nombre_de_agrupacion'];
$tipo_agrupacion = $_SESSION["tipo_agrupacion"];
$estado = $_SESSION['estado'];
$estatus = $_SESSION['estatus'];
$clave = $_SESSION["clave"];


$db_hostt="127.0.0.1:3306";
$db_nombree="u464958812_ods_db";
$db_usuarioo="u464958812_medel";
$db_contraa="FomentoMusical1";

$connect = mysqli_connect($db_hostt, $db_usuarioo, $db_contraa);
if (mysqli_connect_errno()) {
	echo "Falló tú conexión con la BBDD";
	exit();
}

mysqli_select_db($connect, $db_nombree) or die ("No se encuentra la BD");
mysqli_set_charset($connect, "utf8");


$sql = "SELECT * FROM db_gral WHERE semillero = '$semillero' && estatus = 'activo'";
$result = mysqli_query($connect, $sql);

mysqli_close($connect);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Semilleros Creativos M&uacute;sica</title>
	<link rel="stylesheet" type="text/css" href="css/homee.css">
	<link rel="stylesheet" href="instalar-bp-ac/css/bootstrap.min.css">
	<script type="text/javascript" src="js/form_orquesta.js"></script>
</head>


</style>
<body>
	<div class="container">
		<div class="container-fluid text-center">
			<h1 class="text-success">Agrupaciones Musicales Comunitarias</h1>
			
			<p>Semillero: <strong><?php echo $semillero; ?></strong></p>
		</div>
		<form id="loginform" action="elimina_integrante.php" method="post">
			<div class="row aling-items-center form-group">
				<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 text-left"> 
					<button type="button" class="btn btn-outline-dark" onclick="location.href='home_semillero.php'">Atrás</button>
						<label>Ingresa el <strong>Folio Agrupación</strong> a <strong>eliminar:</strong></label>
						<input  input type="text" required name="eliminar" class="form-control form-control-sm firts_letter"><br>
						
						<button type="submit" class="btn btn-warning">Eliminar</button>
				</div>
			</div>	
		</form>
	
		<div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Folio Agrupación</th>
						<th scope="col">Nombre</th>
						<th scope="col">Apellido Paterno</th>
						<th scope="col">Apellido Materno</th>
						<th scope="col">Género</th>
						<th scope="col">CURP</th>
						<th scope="col">Instrumento</th>
						<th scope="col">Estatus</th>
					</tr>
					
					<?php 

					$contador = 1;
					while($fila = mysqli_fetch_row($result)){
						echo "<tr><td>";
						echo $contador."</td><td>";
						echo $fila[1]."</td><td>";
						echo $fila[3]."</td><td>";
						echo $fila[4]."</td><td>";
						echo $fila[5]."</td><td>";
						echo $fila[6]."</td><td>";
						echo $fila[8]."</td><td>";
						echo $fila[12]."</td><td>";
						echo $fila[14]."</td><tr>";
						$contador++;
					}
					?>

				</thead>
			</table>
		</div>
	</div>
</div>
	<!-- Boostrap -->
	<script src="instalar-bp-ac/js/bootstrap.bundle.js"></script>
</body>
<footer>
	<div class="container-fluid text-center">
		<em>Sistema Nacional de Fomento Musical 2022</em>
	</div>
</footer>