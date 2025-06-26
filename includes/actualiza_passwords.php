<!--Nota: se creo un script temporal para encriptar todas las contraseñas guardadas en la base de datos.
    No se debe volver a ejecutar ya que se cifrara lo que ya esta cifrado, se agrego el archivo 
    solamente como evidencia del trabajo realizado, queda como sugerencia su eliminación.-->
<?php
require("datos_conexion.php");

$conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);
mysqli_set_charset($conexion, "utf8");

// Se hace una consulta para obtener todas las contraseñas guardadas en la tabla semilleros de la base de datos
$query = "SELECT id, contrasena FROM semilleros";
$resultado = mysqli_query($conexion, $query);

while ($fila = mysqli_fetch_assoc($resultado)) {
    $id = $fila['id'];
    $password_texPlano = $fila['contrasena'];

    // Se genero la contraseña cifrada
    $password_seguro = password_hash($password_texPlano, PASSWORD_DEFAULT);

    // Se realiza un UPDATE para guardar las contraseñas
    $update = "UPDATE semilleros SET contrasena = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $update);
    mysqli_stmt_bind_param($stmt, 'si', $password_seguro, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

mysqli_close($conexion);
echo "Se actualizaron las contraseñas";
