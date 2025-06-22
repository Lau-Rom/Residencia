<?php

session_start();
if(!isset($_SESSION["usuario"])){

  header("location:index.html");
}

$folio_eliminar = $_POST['eliminar'];

require("datos_conexion.php");
$conn = new mysqli($db_host, $db_usuario, $db_contra,$db_nombre);
if($conn->connect_error){
  die("Conection failed: " .$conn->connect_error);
}

$sql = "UPDATE db_gral SET estatus = ('Inactivo') where folio_semillero = '$folio_eliminar'";


if ($conn->query($sql) === TRUE){
      echo'<script type="text/javascript">
      alert("Registro eliminado con éxito");
      window.location.href="home_semillero.php";
      </script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


?>