<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

</body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST['usu']) || empty($_POST['con'])) {
        header("Location: ../index.html?error=campos_vacios");
        exit();
    }

    $usuario = trim($_POST["usu"]);
    $contrasena = $_POST["con"];

    require("datos_conexion.php");

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);
    if (mysqli_connect_errno()) {
        header("Location: ../index.html?error=conexion");
        exit();
    }

    mysqli_set_charset($conexion, "utf8");

    // Solo buscamos por usuario
    $consulta = "SELECT id, nombre_de_agrupacion, tipo_agrupacion, estado, estatus, usuario, contrasena, clave 
                 FROM semilleros WHERE usuario = ? LIMIT 1";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        mysqli_stmt_bind_result($stmt, $id, $nombre_de_agrupacion, $tipo_agrupacion, $estado, $estatus, $usuario_db, $hash_contrasena, $clave);
        mysqli_stmt_fetch($stmt);

        if (password_verify($contrasena, $hash_contrasena)) {
            session_regenerate_id(true);
            $_SESSION['usuario'] = $usuario_db;
            $_SESSION['nombre_de_agrupacion'] = $nombre_de_agrupacion;
            $_SESSION['tipo_agrupacion'] = $tipo_agrupacion;
            $_SESSION['estado'] = $estado;
            $_SESSION['estatus'] = $estatus;
            $_SESSION['clave'] = $clave;

            if ($id == 1) {
                header("Location: ../semillero/home_semillero.php");
            } elseif ($id == 2) {
                header("Location: ../admin/home_admin.php");
            } else {
                header("Location: ../index.html?error=tipo_usuario");
            }
        } else {
            header("Location: ../index.html?error=credenciales");
        }
    } else {
        header("Location: ../index.html?error=credenciales");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    header("Location: ../index.html");
    exit();
}