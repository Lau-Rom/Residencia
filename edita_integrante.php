
<?php

session_start();
if(!isset($_SESSION["usuario"])){

	header("location:index.html");
}

$nombre_de_agrupacion = $_SESSION['nombre_de_agrupacion'];
$tipo_agrupacion = $_SESSION["tipo_agrupacion"];
$estado = $_SESSION['estado'];
$estatus = $_SESSION['estatus'];
$clave = $_SESSION["clave"];

$edit = $_POST["edit"];


require("datos_conexion.php");

$conexion1 = mysqli_connect($db_host, $db_usuario, $db_contra);
if(mysqli_connect_errno()){
	echo "Error al conectar con la BD";
	exit();
}

mysqli_select_db($conexion1, $db_nombre) or die("No se encuentra la BD");
mysqli_set_charset($conexion1,"utf8");

$UNO = $tipo_agrupacion;
/*$consulta = "SELECT INSTRUMENTO FROM dotacion WHERE AGRUPACION = 'ORQUESTA SINFÓNICA'";*/
$consulta = "SELECT * FROM dotacion WHERE AGRUPACION = '$UNO'";
$consulta1 ="SELECT * FROM db_gral WHERE folio_semillero = '$edit'";
$consulta2 ="SELECT * FROM db_gral WHERE folio_semillero = '$edit'";

$resultados = mysqli_query($conexion1, $consulta);
$resultados1 = mysqli_query($conexion1, $consulta1);
$resultados2 = mysqli_query($conexion1, $consulta2);

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
			<h1 class="text-success">Unidad de Agrupaciones Musicales Comunitarias</h1>
			
			<p>Semillero: <strong><?php echo $nombre_de_agrupacion; ?></strong></p>
		</div>

		<form id="loginform" action="actualiza_integrante.php" method="post">
			<fieldset>
				
				<legend>Datos Personales:</legend>
				<div class="row aling-items-center form-group">
					<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left"> 
						<label>Nombre:</label>
						</div><?php while($abc = mysqli_fetch_row($resultados1)){

					echo"<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'> 
						<input type='text' name='nombre' class='form-control form-control-sm firts_letter'  onkeyup='this.value=Letras(this.value)' value = $abc[3]> ";

						
					echo"</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
						<label>A. Paterno:</label>
						</div>
					    <div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'><input type='text' name='a_paterno' class='form-control form-control-sm firts_letter' onkeyup='this.value=Letras(this.value)' value = $abc[4]>";


					echo"</div>
								<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
								<label>Tu ID es:</label>
							</div> 
							<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>$abc[1]</label>";


					echo"
						</div> 
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'> 
						<label>A. Materno:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
						<input type='text' name='a_materno' class='form-control form-control-sm firts_letter' onkeyup='this.value=Letras(this.value)' value = $abc[5]>
						</div>";

						echo"
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
						<label>Nacionalidad:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
						<select name='nacionalidad' class='form-select' aria-label='Default select example'>
						<option value='México' Selected>Méxicana</option>
						<option value='Otro'>Otro</option>
						</select>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
						<label>CURP/ID:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
						<input type='text' name='curp_id' class='form-control form-control-sm uppercase' data-mdb-showcounter='true' maxlength='18'  value = $abc[8]>
						</div>";}  ?>
						<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
							<label>Edad:</label>
						</div>
						<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
							<select name="edad" class="form-select" aria-label="Default select example">
								<option value="Null">Seleccione:</option>
								<option value="-07">&#45;07</option>
								<option value="07">07</option>
								<option value="08">08</option>
								<option value="09">09</option>
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
								<option value="16">16</option>
								<option value="17">17</option>
								<option value="18">18</option>
								<option value="+18">&#43;18</option>
							</select>
						</div>
						<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
							<label>Género:</label>
						</div>
						<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
							<input type="radio" name="genero" value="Hombre" class="form-check-input">Hombre
							<input type="radio" name="genero" value="Mujer" class="form-check-input">Mujer
						</div>

						<div class="col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left">
							<label>Instrumento:</label>
						</div>
						<div class="col-xs- 12 col-sm-9 col-md-6 col-lg-2 text-left">
							<select name="instrumento" class="form-select" aria-label="Default select example">
								<option value="0">Seleccione:</option><?php
								while($fila = mysqli_fetch_row($resultados)){
									echo '<option value="'.$fila[1].'">'.$fila[1].'</option>';
								}?>
							</select>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'> 
							<label>Correo electrónico</label>
						</div>
					<?php while($ab = mysqli_fetch_row($resultados2)){
							echo"
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<input type='email' name='email' class='form-control form-control-sm' value = $ab[10]>
						</div>"; 
					
						echo"
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>Tel/Cel:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left form-outline' for='typePhone'> 
							<input type='tel' maxlength='10' name='tel' placeholder='10 dígitos' onkeyup='this.value=Numeros(this.value)' class='form-control form-control-sm lowercase' value =$ab[11]>
						</div>
					</div> 
				</fieldset>
				<fieldset>
					<legend>Datos Escolares:</legend>
					<div class='row aling-items-center form-group'>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<label>Nombre de la escuela:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<input type='text' name='nombre_escuela' class='form-control form-control-sm firts_letter' value = $ab[15]>
					</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<label>Nivel escolar:</label>
						</div>

						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<select name='nivel_escuela' class='form-select' aria-label='Default select example'>
								<option value='Null'>Seleccione: </option>
								<option value='Primaria'>Primaria</option>
								<option value='Secundaria'>Secundaria</option>
								<option value='Bachiller/Preparatoria'>Bachiller</option>
								<option value='Otro'>Otro</option>
							</select>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<label>Grado escolar:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'id='uno'>
							<select name='grado_escuela' class='form-select' aria-label='Default select example' id='primaria'>
								<option value='Null'>Seleccione:</option>
								<option value='Primer año/semestre'>Primer año/semestre</option>
								<option value='Segundo año/semestre'>Segundo año/semestre</option>
								<option value='Tercer año/semestre'>Tercer año/semestre</option>
								<option value='Cuarto año/semestre'>Cuarto año/semestre</option>
								<option value='Quinto año/semestre'>Quinto año/semestre</option>
								<option value='Sexto año/semestre'>Sexto año/semestre</option>
							</select>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<label>Clave de la escuela:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<input type='text' name='clave_escuela' class='form-control form-control-sm uppercase' value = $ab[16]>
						</div>
						

						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<label>Dirección:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<input type='text' name='dir_escuela' class='form-control form-control-sm firts_letter' value=$ab[17]>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2'>
							<label>Correo electrónico:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<input type='text' name='email_escuela' class='form-control form-control-sm lowercase' value = $ab[20]>
						</div>'
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>Núm. Tel/Cel:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left form-outline' for='typePhone'> 
							<input type='tel' maxlength='10' name='tel_escuela' placeholder='10 dígitos' onkeyup='this.value=Numeros(this.value)' class='form-control form-control-sm lowercase'value = $ab[21]>
						</div>";
					echo"</div>
				</fieldset>
				<fieldset>"; echo"
					<div class='row aling-items-center form-group'>
						<legend>Datos tutor:</legend>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<label>Nombre padre/tutor I:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<input type='text' name='nombre_tutor' class='form-control form-control-sm firts_letter' value = $ab[22]>
						</div>";
						echo"<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>Tel/Cel:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left form-outline' for='typePhone'> 
							<input type='tel' maxlength='10' name='tel_tutor' placeholder='10 dígitos' onkeyup='this.value=Numeros(this.value)' class='form-control form-control-sm' value = $ab[29]>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<label>Parentesco:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<select name='parentesco_tutor' id='parentesco' class='form-select' aria-label='Default select example'>
								<option value='Null'>Seleccione:</option>
								<option value='Padre/Madre'>Padre/Madre</option>
								<option value='Abuelo(a)'>Abuelo(a)</option>
								<option value='Tutor(a)'>Tutor</option>
								<option value='Otro'>Otro</option>
							</select>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<label>Nombre padre/tutor II:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<input type='text' name='nombre_tutor1' class='form-control form-control-sm firts_letter' value = $ab[31]>'
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>Tel/Cel:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left form-outline' for='typePhone'> 
							<input type='tel' maxlength='10' name='tel_tutor1' placeholder='10 dígitos' onkeyup='this.value=Numeros(this.value)' class='form-control form-control-sm' value = $ab[32]>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<label>Parentesco:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<select name='parentesco_tutor1' id='parentesco' class='form-select' aria-label='Default select example'>
								<option value='Null'>Seleccione:</option>
								<option value='Padre/Madre'>Padre/Madre</option>
								<option value='Abuelo(a)'>Abuelo(a)</option>
								<option value='Tutor(a)'>Tutor</option>
								<option value='Otro'>Otro</option>
							</select>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-1 text-left' >
							<label>Dirección:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-3 text-left' >
							<input type='text' name='direccion_tutor' placeholder='Calle, Núm., Col./Población' class='form-control form-control-sm firts_letter' value = $ab[24]>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>Población/Colonia:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<input type='text' name='poblacion_tutor' class='form-control form-control-sm firts_letter' value=$ab[25]>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>Municipio/Delegación:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<input type='text' name='municipio_tutor' class='form-control form-control-sm firts_letter' value = $ab[26]>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>CP:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<input type='tel' name='cp_tutor' maxlength='5' onkeyup='this.value=Numeros(this.value)' class='form-control form-control-sm uppercase' value = $ab[27]>
						</div>

						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left'>
							<label>Correo electrónico:</label>
						</div>
						<div class='col-xs-12 col-sm-9 col-md-6 col-lg-2 text-left' >
							<input type='text' name='email_tutor' class='form-control form-control-sm lowercase' value= $ab[30]>";}?>
						</div>
					</fieldset>
					<div class="row">
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5">

						</div>
						<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 mb-5">
							<!-- sucio truco -->
							<p></p>
							<!-- fin sucio truco -->
							<button type="button" class="btn btn-outline-dark" onclick="location.href='home_semillero.php'">Atrás</button>
							<button class="btn btn-outline-primary" type="submit">Actualizar</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Boostrap -->
			<script src="instalar-bp-ac/js/bootstrap.bundle.js"></script>
		</body>
		<footer>
			<div class="container-fluid text-center">
				<em>Sistema Nacional de Fomento Musical 2022</em>
			</div>
		</footer>