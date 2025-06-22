<?php

session_start();

	//Comprobamos si esta definida la sesión 'tiempo'.
if(isset($_SESSION['tiempo']) ) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 1000;//20min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
    if($vida_session > $inactivo)
    {
            //Removemos sesión.
    	session_unset();
            //Destruimos sesión.
    	session_destroy();              
            //Redirigimos pagina.
    	header("Location: index.html");

    	exit();
    }
} else {
    //Activamos sesion tiempo.
	$_SESSION['tiempo'] = time();
}






if(!isset($_SESSION["usuario"])){

	header("location:index.html");
}
$nombre_de_agrupacion = $_SESSION['nombre_de_agrupacion'];
$tipo_agrupacion = $_SESSION["tipo_agrupacion"];
$estado = $_SESSION['estado'];
$estatus = $_SESSION['estatus'];
$clave = $_SESSION["clave"]

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agrupaciones Musicales Comunitarias</title>
	<link rel="stylesheet" type="text/css" href="css/hom.css">
	<link rel="stylesheet" href="instalar-bp-ac/css/bootstrap.min.css">
</head>


<body>
	<div class="container abc">
		<div class="container-fluid text-center">
			<h1 class="titulo">Agrupaciones Musicales Comunitarias</h1>
			
			<p>Bienvenido/a: <strong><?php  echo $nombre_de_agrupacion; ?></strong></p>
			<div class="espacio"><h3>¿Qué deseas hacer?</h3></div>
		</div>

		<div class="row aling-items-center">
			<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-3 text-center">
				<button class="button1" onclick="location.href='add_semillero.php'" >Agregar</button>
			</div>
			<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-3 text-center">
				<button class="button2" onclick="location.href='view_semillero.php'">Ver/Editar</button>
			</div>
			<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-3 text-center" >
				<button class="button3" onclick="location.href='delete_semillero.php'">Eliminar</button>
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
	<div style="text-align:center;padding:1em 0;"> 
		<strong>Sistema Nacional de Fomento Musical 2025</strong>
		<h4><a style="text-decoration:none;" href="#"><span style="color:gray;">Hora actual en</span><br />Mexico City, México</a></h4> <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FMexico_City" width="90%" height="90" frameborder="0" seamless></iframe> </div>
</footer>
</html>