<?php

session_start();
if(!isset($_SESSION["usuario"])){
	header("location:index.html");
	}
$nombre_de_agrupacion = $_SESSION['nombre_de_agrupacion'];

$agrupacion =  $_POST['agrupacion'];
$estatus = $_POST['estatus'];


require ("datos_conexion.php");
$conn = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT semillero, estado_tutor, COUNT(*) FROM 
db_gral WHERE estatus = 'Activo' AND
semillero = '$agrupacion' 
GROUP BY semillero";

$sql1 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion'";

$sqla = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND edad  <=6 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion'";

$sql10 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND edad BETWEEN 7 AND 12 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion'";

$sql11 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND edad BETWEEN 13 AND 17 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion'";

$sql12 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND edad >=18 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion'";



$sql2 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion'";

$sqlb = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND edad <=6 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion' ";

$sql20 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND edad BETWEEN 7 AND 12 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion' ";

$sql21 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND edad BETWEEN 13 AND 17 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion' ";

$sql22 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND edad >=18 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion' ";

$result = mysqli_query($conn, $sql);

$resulta  = mysqli_query($conn, $sqla);
$result1  = mysqli_query($conn, $sql1);
$result10 = mysqli_query($conn, $sql10);
$result11 = mysqli_query($conn, $sql11);
$result12 = mysqli_query($conn, $sql12);

$resultb  = mysqli_query($conn, $sqlb);
$result2  = mysqli_query($conn, $sql2);
$result20 = mysqli_query($conn, $sql20);
$result21 = mysqli_query($conn, $sql21);
$result22 = mysqli_query($conn, $sql22);


$sql_inactivo = "SELECT semillero, estado_tutor, COUNT(*) FROM 
db_gral WHERE 
semillero = '$agrupacion' AND estatus = 'Inactivo'
GROUP BY semillero";

$sql_i1 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND estatus = 'Inactivo' AND
SEMILLERO = '$agrupacion'";

$sql_i10 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND edad BETWEEN 7 AND 12 AND estatus = 'Inactivo' AND
SEMILLERO = '$agrupacion'";

$sql_i11 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND edad BETWEEN 13 AND 17 AND estatus = 'Inactivo' AND
SEMILLERO = '$agrupacion'";

$sql_i12 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Hombre' AND edad >=18 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion'";



$sql_i2 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND estatus = 'Inactivo' AND
SEMILLERO = '$agrupacion'";

$sql_i20 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND edad BETWEEN 7 AND 12 AND estatus = 'Inactivo' AND
SEMILLERO = '$agrupacion' ";

$sql_i21 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND edad BETWEEN 13 AND 17 AND estatus = 'Inactivo' AND
SEMILLERO = '$agrupacion' ";

$sql_i22 = "SELECT semillero, estado_tutor, genero, COUNT(*) FROM
db_gral WHERE genero = 'Mujer' AND edad >=18 AND estatus = 'Activo' AND
SEMILLERO = '$agrupacion' ";

$result_inactivo = mysqli_query($conn, $sql_inactivo);

$result_i1  = mysqli_query($conn, $sql_i1);
$result_i10 = mysqli_query($conn, $sql_i10);
$result_i11 = mysqli_query($conn, $sql_i11);
$result_i12 = mysqli_query($conn, $sql_i12);

$result_i2  = mysqli_query($conn, $sql_i2);
$result_i20 = mysqli_query($conn, $sql_i20);
$result_i21 = mysqli_query($conn, $sql_i21);
$result_i22 = mysqli_query($conn, $sql_i22);

$consulta = "SELECT * FROM db_gral WHERE semillero = '$agrupacion' && estatus = '$estatus'";
$abc = mysqli_query($conn, $consulta);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agrupaciones Musicales Comunitarias</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" href="instalar-bp-ac/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="container-fluid text-center">
			<h1 class="text-success">Agrupaciones Musicales Comunitarias</h1>
			<p>***** ***** ***** ***** *****</p>
			<p>Semillero: <strong><?php echo $nombre_de_agrupacion; ?></strong></p>
		</div>
		<div class="row aling-items-center">
			<div class="col-xs-12 col-sm-9 col-md-6 col-lg-3 text-center">

			</div>
			<div class="col-xs-12 col-sm-9 col-md-6 col-lg-5 text-center">
				<?php		echo "<strong>".$agrupacion."</strong>";
				echo "<br>Activos";
				while($fila = mysqli_fetch_row($result)){
					echo "<strong> ".$fila[2]."</strong>";
				}

				while($fila = mysqli_fetch_row($result1)){
					echo "<br><em>Hombres:</em> "."<strong>".$fila[3]."</strong>".";";
				}
				while($fila = mysqli_fetch_row($resulta)){
		            echo " <em> Menores de 7 años:</em> "."<strong>".$fila[3]."</strong>".",";
				}

				while($fila = mysqli_fetch_row($result10)){
					echo " <em>7 - 12 años:</em> "."<strong>".$fila[3]."</strong>".",";
				}

				while($fila = mysqli_fetch_row($result11)){
					echo " <em>12 - 17 años:</em> "."<strong>".$fila[3]."</strong>".",";
				}

				while($fila = mysqli_fetch_row($result12)){
					echo " <em>mayores de 18 años:</em> "."<strong>".$fila[3]."</strong>";
				}

				while($fila = mysqli_fetch_row($result2)){
					echo "<br><em>Mujeres:</em> "."<strong>".$fila[3]."</strong>".";";
				}
				
				while($fila = mysqli_fetch_row($resultb)){
					echo "<em> Menores de 7 años:</em> "."<strong>".$fila[3]."</strong>".",";
				}

				while($fila = mysqli_fetch_row($result20)){
					echo "<em> 7 - 12 años:</em> "."<strong>".$fila[3]."</strong>".",";
				}

				while($fila = mysqli_fetch_row($result21)){
					echo "<em> 12 - 17 años:</em> "."<strong>".$fila[3]."</strong>".",";
				}
				while($fila = mysqli_fetch_row($result22)){
					echo " <em> mayores de 18 años:</em> "."<strong>".$fila[3]."</strong>";
				} 
				echo "<br>Inactivo ";
				
				while($fila = mysqli_fetch_row($result_inactivo)){

					echo "<strong>".$fila[2]."</strong>";
				}

				while($fila = mysqli_fetch_row($result_i1)){
					echo "<br><em>Hombres:</em> "."<strong>".$fila[3]."</strong>;";
				}

				while($fila = mysqli_fetch_row($result_i10)){
					echo "<em> de 7 - 12 años:</em> "."<strong>".$fila[3]."</strong>,";
				}

				while($fila = mysqli_fetch_row($result_i11)){
					echo "<em> de 12 - 17 años</em>: "."<strong>".$fila[3]."</strong>,";
				}
				while($fila = mysqli_fetch_row($result_i12)){
					echo "<em> mayores de 18 años</em>: "."<strong>".$fila[3]."</strong>";
				}

				while($fila = mysqli_fetch_row($result_i2)){
					echo "<br><em>Mujeres: </em> "."<strong>".$fila[3]."</strong>;";
				}

				while($fila = mysqli_fetch_row($result_i20)){
					echo "<em> de 7 - 12 años:</em> "."<strong>".$fila[3]."</strong>,";
				}

				while($fila = mysqli_fetch_row($result_i21)){
					echo "<em> de 12 - 17 años:</em> "."<strong>".$fila[3]."</strong>,";
				}

				while($fila = mysqli_fetch_row($result_i22)){
					echo "<em> Mayores de 18 años:</em> "."<strong>".$fila[3]."</strong>";
				}
				?>
			</div>
			<div>
				<p>Usted está viedo a los participantes <?php echo "<strong>".$estatus . "s</strong>";  ?></p>
			</div>
			<div>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Folio único</th>
						<th scope="col">Nombre</th>
						<th scope="col">A. Paterno</th>
						<th scope="col">A. Materno</th>
						<th scope="col">Género</th>
						<th scope="col">CURP</th>
						<th scope="col">Edad</th>
						<th scope="col">Instrumento</th>
						<th scope="col">Fecha de ingreso</th>
						<th scope="col">Celular</th>
						<th scope="col">Email Personal</th>
						<th scope="col">Tutor</th>
						<th scope="col"></th>
					</tr>
					
					<?php 

					$contador = 1;
					while($fila = mysqli_fetch_row($abc)){
						echo "<tr><td>";
						echo $contador."</td><td>";#No
						echo $fila[1]."</td><td>";#Folio unico
						echo $fila[3]."</td><td>";#Nombre
						echo $fila[4]."</td><td>";#A. Paterno
						echo $fila[5]."</td><td>";#A. Materno
						echo $fila[6]."</td><td>";#Género
						echo $fila[8]."</td><td>";#CURP
						echo $fila[9]."</td><td>";#Edad
						echo $fila[12]."</td><td>";#Instrumento
						echo $fila[13]."</td><td>";#Fecha de ingreso
						echo $fila[11]."</td><td>";#Celular
						echo $fila[10]."</td><td>";#Email personal
						echo $fila[22]."</td><td";#tutor
						echo $fila["#"]."</td></tr>";
						$contador++;
					}
					?>

				</thead>
			</table>

		</div>
	</div>	
	<div class="row">
		<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">

		</div>
		<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 mb-5">
			<!-- sucio truco -->
			<p></p>
			<!-- fin sucio truco -->
			<button type="button" class="btn btn-outline-dark" onclick="location.href='seleccion.php'">Atrás</button>
				<button type="button" class="btn btn-outline-success" onclick="javascript:window.print()">Imprimir PDF</button>
		</div>
	</div>		
</div>
</body>
<footer>
	<div class="container-fluid text-center">
		<em>Sistema Nacional de Fomento Musical 2022</em>
	</div>
</footer>