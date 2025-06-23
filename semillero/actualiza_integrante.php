
<?php

session_start();
if(!isset($_SESSION["usuario"])){

  header("location:index.html");
}


$semillero = $_SESSION['nombre_de_agrupacion'];
$tipo_agrupacion = $_SESSION["tipo_agrupacion"];
$estado_tutor = $_SESSION['estado'];
$estatus = $_SESSION['estatus'];
$folio_semillero = $_SESSION["clave"];


$folio_semillero = $_POST["id_unico"];
$nombre       = $_POST["nombre"];
$a_paterno     = $_POST['a_paterno'];
$a_materno     = $_POST['a_materno'];
$nacionalidad = $_POST["nacionalidad"];
$curp_id      = $_POST["curp_id"];
$edad        = $_POST["edad"];
$genero      = $_POST["genero"];
$instrumento = $_POST["instrumento"];
$email       = $_POST["email"];
$tel         = $_POST["tel"];
$nombre_escuela   = $_POST["nombre_escuela"];
$nivel_escuela    = $_POST["nivel_escuela"];
$grado_escuela    = $_POST["grado_escuela"];
$clave_escuela    =$_POST['clave_escuela'];
$email_escuela    = $_POST["email_escuela"];
$tel_escuela      = $_POST["tel_escuela"];
$dir_escuela      = $_POST['dir_escuela'];
$nombre_tutor     = $_POST["nombre_tutor"];
$nombre_tutor1     = $_POST["nombre_tutor1"];
$parentesco_tutor = $_POST["parentesco_tutor"];
$parentesco_tutor1 = $_POST["parentesco_tutor1"];
$poblacion_tutor  = $_POST['poblacion_tutor'];
$dir_tutor        = $_POST["direccion_tutor"];
$municipio_tutor  = $_POST["municipio_tutor"];
$cp_tutor          = $_POST["cp_tutor"];
$tel_tutor   = $_POST["tel_tutor"];
$tel_tutor1   = $_POST["tel_tutor1"];
$email_tutor = $_POST['email_tutor'];

$nombre       = ucwords($nombre);
$a_paterno     = ucwords($a_paterno);
$a_materno     = ucwords($a_materno);
$curp_id      = strtoupper($curp_id);
$email       = strtolower ($email);
$nombre_escuela   = ucwords($nombre_escuela);
$clave_escuela    =strtoupper($clave_escuela);
$dir_escuela      = ucwords($dir_escuela);
$nombre_tutor     =ucwords($nombre_tutor);
$nombre_tutor1     =ucwords($nombre_tutor1);
$poblacion_tutor  =ucwords($poblacion_tutor);
$dir_tutor        = ucwords($dir_tutor);
$municipio_tutor  = ucwords($municipio_tutor);
$email_tutor = strtolower($email_tutor);


require("datos_conexion.php");

$conn = new mysqli($db_host, $db_usuario, $db_contra,$db_nombre);
if($conn->connect_error){
  die("Conection failed: " .$conn->connect_error);
}


$pusch = "UPDATE db_gral SET 
nombre = '$nombre', 
a_paterno = '$a_paterno',
a_materno = '$a_materno', 
genero = '$genero', 
nacionalidad = '$nacionalidad', 
curp_id = '$curp_id', 
edad = '$edad', 
email = '$email', 
tel = '$tel', 
instrumento = '$instrumento',  
estatus = '$estatus', 
nombre_escuela = '$nombre_escuela', 
clave_escuela = '$clave_escuela', 
dir_escuela = '$dir_escuela', 
nivel_escuela = '$nivel_escuela', 
grado_escuela = '$grado_escuela', 
email_escuela = '$email_escuela', 
tel_escuela = '$tel_escuela', 
nombre_tutor = '$nombre_tutor', 
parentesco_tutor = '$parentesco_tutor', 
dir_tutor = '$dir_tutor', 
poblacion_tutor = '$poblacion_tutor', 
municipio_tutor = '$municipio_tutor', 
cp_tutor = '$cp_tutor', 
estado_tutor = '$estado_tutor', 
tel_tutor = '$tel_tutor', 
email_tutor = '$email_tutor', 
nombre_tutor1 = '$nombre_tutor1', 
tel_tutor1 = '$tel_tutor1', 
parentesco_tutor1 = '$parentesco_tutor1' WHERE folio_semillero = '$folio_semillero'";


if ($conn -> query($pusch) == False) {
  echo "Error: ". $pusch . "<br>" . $conn->error;
}else{
  echo'<script type="text/javascript">
      alert("Registro actualizado con éxito");
      window.location.href="home_semillero.php";
      </script>';
}
/*
$pusch = "INSERT INTO db_gral (folio_semillero, semillero, nombre, a_paterno, a_materno, genero, nacionalidad, curp_id, edad, email, tel, instrumento, f_ingreso, estatus, nombre_escuela, clave_escuela, dir_escuela, nivel_escuela, grado_escuela, email_escuela, tel_escuela, nombre_tutor, parentesco_tutor, dir_tutor, poblacion_tutor, municipio_tutor, cp_tutor, estado_tutor, tel_tutor, email_tutor, nombre_tutor1, tel_tutor1, parentesco_tutor1, AI) VALUES ('$folio_semillero','$semillero','$nombre','$a_paterno','$a_materno','$genero','$nacionalidad','$curp_id','$edad','$email','$tel','$instrumento','$f_ingreso','$estatus','$nombre_escuela','$clave_escuela','$dir_escuela','$nivel_escuela','$grado_escuela','$email_escuela','$tel_escuela','$nombre_tutor','$parentesco_tutor','$dir_tutor','$poblacion_tutor','$municipio_tutor','$cp_tutor','$estado_tutor','$tel_tutor','$email_tutor','$nombre_tutor1','$tel_tutor1','$parentesco_tutor1', 'Null')";

if ($conn -> query($pusch) == False) {
  echo "Error: ". $pusch . "<br>" . $conn->error;
}else{
  echo'<script type="text/javascript">
      alert("Registro guardado con éxito");
      window.location.href="home_semillero.php";
      </script>';
}*/

?>