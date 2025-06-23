<?php

session_start();
if(!isset($_SESSION["usuario"])){
	header("location:index.html");
}

$random = rand(999, 1499);
$desde = "A";
$hasta = "Z";
$letraA = chr(rand(ord($desde), ord($hasta)));

$folio_semillero = $_SESSION['clave'];
	$folio_semillero = $folio_semillero . $random . $letraA;

$semillero    = $_SESSION['nombre_de_agrupacion'];
$nombre       = $_POST['nombre'];
$a_paterno    = $_POST['a_paterno'];
$a_materno    = $_POST['a_materno'];
$genero       = $_POST['genero'];
$nacionalidad = $_POST['nacionalidad'];
$curp_id      = $_POST['curp_id'];
$edad         = $_POST['edad'];
$email        = $_POST['email'];
$tel          = $_POST['tel'];
$instrumento  = $_POST['instrumento'];
$f_ingreso    = date("d/m/y", strtotime($_POST["f_ingreso"]));
$estatus      = $_SESSION['estatus'];

$nombre_escuela = strtoupper($_POST['nombre_escuela']);
$clave_escuela  = strtoupper($_POST['clave_escuela']);
$dir_escuela    = strtoupper($_POST['dir_escuela']);
$nivel_escuela  = $_POST['nivel1'];
$grado_escuela  = strtoupper($_POST['grado']);
$email_escuela  = $_POST['email_escuela'];
$tel_escuela    = $_POST['tel_escuela'];

$nombre_tutor      = strtoupper($_POST['nombre_tutor']);
$parentesco_tutor  = $_POST['parentesco_tutor'];
$dir_tutor         = strtoupper($_POST['direccion_tutor']);
$poblacion_tutor   = strtoupper($_POST['poblacion_tutor']);
$municipio_tutor   = strtoupper($_POST['municipio_tutor']);
$cp_tutor          = $_POST['cp_tutor'];
$estado_tutor      = $_SESSION['estado'];
$tel_tutor         = $_POST['tel_tutor'];
$email_tutor       = $_POST['email_tutor'];

$origen      = $_POST['origen'];
$hablante    = $_POST['hablante'];
$lengua      = $_POST['lengua'];
$fecha_carga = $_POST['variable'];


$fecha = new DateTime('now', new DateTimeZone('America/Mexico_City'));
$fecha_carga = $fecha->format('Y-m-d H:i:s');


$servername = "localhost:3306";
$username   = "root";
$password   = "admin123";
$dbname     = "u464958812_ods_db";



$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){ 
	die("Conection failed: " . $conn->connect_error); 
}

$sql = "INSERT INTO db_gral 
(folio_semillero, semillero, nombre, a_paterno, a_materno, genero, nacionalidad, curp_id, edad, email, tel, instrumento, f_ingreso, estatus, nombre_escuela, clave_escuela, dir_escuela, nivel_escuela, grado_escuela, email_escuela, tel_escuela, nombre_tutor,
parentesco_tutor, dir_tutor, poblacion_tutor, municipio_tutor, cp_tutor, estado_tutor, tel_tutor, email_tutor, origen, hablante, lengua, fecha_carga) VALUES 
('$folio_semillero', '$semillero', '$nombre', '$a_paterno', '$a_materno', '$genero', '$nacionalidad', '$curp_id', '$edad', '$email', '$tel', '$instrumento', '$f_ingreso', '$estatus', '$nombre_escuela', '$clave_escuela', '$dir_escuela', '$nivel_escuela', '$grado_escuela', '$email_escuela', '$tel_escuela', '$nombre_tutor', '$parentesco_tutor', '$dir_tutor', '$poblacion_tutor', '$municipio_tutor', '$cp_tutor', '$estado_tutor', '$tel_tutor', '$email_tutor', '$origen', '$hablante', '$lengua', '$fecha_carga')";



if($conn->query($sql) === TRUE){
	echo '<script type="text/javascript">
			alert("New Record Created Successfully");
			window.location.href="home_semillero.php";
		</script>';
}else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->closed();



?>