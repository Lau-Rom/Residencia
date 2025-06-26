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
    	header("Location:../index.html");

    	exit();
    }
} else {
    //Activamos sesion tiempo.
	$_SESSION['tiempo'] = time();
}

if(!isset($_SESSION["usuario"])){

	header("location:../index.html");
}
$nombre_de_agrupacion = $_SESSION['nombre_de_agrupacion'];
$tipo_agrupacion = $_SESSION["tipo_agrupacion"];
$estado = $_SESSION['estado'];
$estatus = $_SESSION['estatus'];
$clave = $_SESSION["clave"];

?>
