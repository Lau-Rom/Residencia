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
$clave = $_SESSION["clave"];

require("datos_conexion.php");

$conexion1 = mysqli_connect($db_host, $db_usuario, $db_contra);
if(mysqli_connect_errno()){
	echo "Error al conectar con la BD";
	exit();
}

mysqli_select_db($conexion1, $db_nombre) or die("No se encuentra la BD");
mysqli_set_charset($conexion1,"utf8");

$UNO = $tipo_agrupacion;

$consulta = "SELECT * FROM dotacion WHERE AGRUPACION = '$UNO'";
$resultados = mysqli_query($conexion1, $consulta);

/*
$bd_lengua = "SELECT * FROM `lenguas_indigenas`";
$resultante = mysqli_query($conexion1, $bd_lengua);*/

?>

<!Doctype html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Semilleros Creativos M&uacute;sica</title>
	<link rel="stylesheet" href="instalar-bp-ac/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/homeCss.css"> 
	<script type="text/javascript" src="js/form_orquesta.js"></script>
</head>

<style type="text/css">
	label{
		font-size: 10px;
	}

</style>
<body>
	<div class="container">
		<div class="container-fluid text-center">
			<h1>Semilleros Creativos de Música</h1>
			<h5 id="agrupacion"><strong><?php echo $nombre_de_agrupacion; ?></strong></h5>
		</div>
		<form id="loginform" action="register.php" method="post">
			<fieldset>
				<legend>DATOS INTEGRANTE --></legend>
				
				<div class="row aling-items-center form-gruop">
					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>NOMBRE</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text"  name="nombre" class="form-control form-control-sm b_radius text-uppercase" required onkeyup="this.value=Letras(this.value)" placeholder="---">
					</div>


					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold"> 
						<label>A. PATERNO</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="a_paterno" class="form-control form-control-sm b_radius text-uppercase"  required onkeyup="this.value=Letras(this.value)" placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold"> 
						<label>A. MATERNO</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="a_materno" class="form-control form-control-sm text-uppercase b_radius" onkeyup="this.value=Letras(this.value)" placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>NACIONALIDAD</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left b_radius">
						<select class="form-select b_radius" aria-label="Default select example" name="nacionalidad"  id="nacionalidad" required onkeyup="this.value=nacionalidad(this.value)" style="font-size:12px;">
							<option value = "MEXICANA" selected>MEXICANA</option>
							<option value = "EXTRANJERO">OTRO</option>
						</select>
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>CURP</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="curp_id" class="form-control form-control-sm text-uppercase b_radius" maxlength="18" minlength="18" style="display:initial;" placeholder="---">

						<label name = "extranjero"style="display:none;">
						EXTRANJERO</label>
					</div>


					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>EDAD</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<select name="edad" id="edad" class="form-select b_radius" aria-label="Default select" required style="font-size:12px;">
							<option value="null" disabled selected>SELECCIONE</option>
						</select>
					</div>


					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>GÉNERO</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<select name="genero" id="genero" class="form-select b_radius" style="font-size:12px;">
							<option selected disabled>SELECCIONE</option>
							<option value="HOMBRE">HOMBRE</option>
							<option value="MUJER">MUJER</option>
							<option value="OTRO">OTRO</option>
						</select>
	
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>INSTRUMENTO</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<select name="instrumento" class="form-select b_radius form-control form-control-sm" style="font-size: 12px;" 
						aria-label="Default select example" >
							<option value="null" selected disabled>SELECCIONE</option>
							<?php 
								while($fila = mysqli_fetch_row($resultados)){
									echo '<option value = "'.$fila[1].'">'.$fila[1].'</option>';
								}
							?>
						</select>
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>F. INGRESO</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="date" name="f_ingreso" id="f_ingreso" class="form-control form-control-sm b_radius" required style="font-size:12px;">
					</div>

					<script type="text/javascript">
						
						f_ingreso.max = new Date().toISOString().split("T")[0];


					</script>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>EMAIL</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input  type="email" name="email" id="email" class="form-control form-control-sm b_radius" placeholder="@" style="text-transform: lowercase;" required>
					</div>

					<script type="text/javascript">

						document.getElementById('loginform').addEventListener('submit', function(event) {
							const correo = document.getElementById('email').value;

    // Expresión regular para validar el formato del correo electrónico
							const correoRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

							if (!correoRegex.test(correo)) {
								alert("Ingrese un correo válido.");
                                event.preventDefault();  
  								  }
							});
					</script>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>TEL/CEL:</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="tel" name="tel" id="tel" minlength="10" maxlength="10"  
						placeholder="10 DÍGITOS" onkeyup="this.value=Numeros(this.value)" class="form-control form-control-sm b_radius">
					</div> 
					<script type="text/javascript">
						
						document.getElementById('loginform').addEventListener('submit', function(event) {
    						const telefono = document.getElementById('tel').value;
    						const telefonoRegex = /^\d{10}$/;
							if (!telefonoRegex.test(telefono)) {
								alert("Por favor, ingrese un número de teléfono válido de 10 dígitos.");
        						event.preventDefault();  
    						}
						});

					</script> 
<?php

	$db_len = "SELECT * FROM lenguas_indigenas";
	$res = mysqli_query($conexion1, $db_len);
?>

				</div> 
				<div class="row aling-items-center form-gruop">
					<div class="col-xs-12 col-sm-9 col-md-12 col-lg-4 fw-bold">
						<label>¿SE AUTOPERCIBE DE ORÍGEN INDÍGENA?</label>
						<input type="radio" name="origen" value="SÍ">SÍ
						<input type="radio" name="origen" value="NO">NO
					</div>
					<div class="col-xs-12 col-sm-9 col-md-12 col-lg-4 fw-bold">
						<label>¿HABLA ALGUNA LENGUA INDÍGENA?</label>
						<input type="radio" id="hablante" name="hablante" value="SÍ">SÍ
						<input type="radio" id="hablante" name="hablante" value="NO">NO
					</div>  
					<div class="col-xs-12 col-sm-9 col-md-12 col-lg-4 fw-bold">
						<select name="lengua" id="lengua" class="form-select b_radius form-control form-control-sm" style="font-size: 12px;"
						aria-label="Default select example" disabled> 
							<option value="null" selected disabled>SELECCIONE</option> 
							<?php
							
								while($roger = mysqli_fetch_row($res)){
									echo '<option value = "'.$roger[1].'">'.$roger[1].'</option>';
								}
							?>
						</select>
					</div>
		
				</div>

				<script type="text/javascript">
					document.querySelectorAll('input[name="hablante"]').forEach(radio =>{
						radio.addEventListener('change', ()=>{
							if(radio.value === 'NO'){
								document.getElementById('lengua').disabled = true;
							}else if(radio.value === 'SÍ'){
								document.getElementById('lengua').disabled = false;
							}
						});
					});


				</script>
			</fieldset>
			<fieldset>
				<legend>DATOS ESCOLARES --></legend>
				<div class="row aling-items-center form-group">
					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>NOM. ESC.</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="nombre_escuela" class="form-control form-control-sm text-uppercase b_radius" required placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>NIVEL ESC.</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left" class="Default select example">
						<select id="nivel1" name="nivel1" onkeyup="this.value=nivel(this.value);" class="form-select b_radius" style="font-size:12px;">
						<option disabled selected>SELECCIONE</option>
						<option value="PRIMARIA">PRIMARIA</option>
						<option value="SECUNDARIA">SECUNDARIA</option>	
						<option value="BACHILLER">BACHILLER</option>
						<option value="OTRO">OTRO</option>
						</select>
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>G. ESCOLAR</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">

						<select id="grado1" name="grado" class="form-select b_radius" aria-label="Default select example" style="display:none; font-size: 12px; text-transform: uppercase;">
							<option selected disabled>SELECCIONE</option>
							<option value="1º AÑO">1º AÑO</option>
							<option value="2º AÑO">2º AÑO</option>
							<option value="3º AÑO">3º AÑO</option>
							<option value="4º AÑO">4º AÑO</option>
							<option value="5º AÑO">5º AÑO</option>
							<option value="6º AÑO">6º AÑO</option>
						</select>

						<select id="grado2" name="grado" style="font-size:12px; display:none;" class="form-select b_radius">
							<option selected disabled>SELECCIONE</option>
							<option value="1º SEMESTRE">1º SEMESTRE</option>
							<option value="2º SEMESTRE">2º SEMESTRE</option>
							<option value="3º SEMESTRE">3º SEMESTRE</option>
							<option value="4º SEMESTRE">4º SEMESTRE</option>
							<option value="5º SEMESTRE">5º SEMESTRE</option>
							<option value="6º SEMESTRE">6º SEMESTRE</option>
						</select>

						<input type="text" name="grado" id="grado3" style="display:none;" class="form-control form-control-sm text-uppercase b_radius" style="text-transform:uppercase;" placeholder="ESPECIFIQUE">
					</div>
					<script type="text/javascript">
						
						const cambio = document.querySelector("#nivel1");
						const grado1 = document.querySelector("#grado1");
						const grado2 = document.querySelector("#grado2");
						const grado3 = document.querySelector("#grado3");

						cambio.addEventListener("change", () =>{
							if (cambio.value === "PRIMARIA") {
								grado1.style.display = "initial";
								grado2.style.display = "none";
								grado3.style.display = "none";
							}else if(cambio.value === "SECUNDARIA"){
								grado1.style.display = "none";
								grado2.style.display = "initial";
								grado3.style.display = "none";
							}else if(cambio.value === "BACHILLER"){
								grado1.style.display = "none";
								grado2.style.display = "initial";
								grado3.style.display = "none";

							}else{
								grado1.style.display = "none";
								grado2.style.display = "none";
								grado3.style.display = "initial";
							}
						});

					</script>
					
					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>CLAVE ESC.</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="clave_escuela" class="form-control form-control-sm text-uppercase b_radius" required placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>DIRECCIÓN</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="dir_escuela" class="form-control form-control-sm text-uppercase b_radius" required placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>EMAIL</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="email" name="email_escuela" class="form-control form-control-sm b_radius" style="text-transform:lowercase;" placeholder="@">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>TEL/CEL</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="tel" name="tel_escuela" maxlength="10" minlength="10" class="form-control form-control-sm lowercase b_radius" onkeyup="this.value=Numeros(this.value)" placeholder="10 DÍGITOS">
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>DATOS DE TUTOR --></legend>
				<div class="row aling-items-center form-group">
					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>NOMBRE</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="nombre_tutor" class="form-control form-control-sm text-uppercase b_radius" required placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>PARENTESCO</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<select name="parentesco_tutor" id="parentesco" class="form-select b_radius" style="font-size: 12px;">
							<option value="null"selected >SELECCIONE</option>
							<option value="PADRE/MADRE">PADRE/MADRE</option>
							<option value="ABUELO(A)">ABUELO(A)</option>
							<option value="TUTOR">TUTOR</option>
							<option value="OTRO">OTRO</option>
						</select>
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>EMAIL</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						
						<input type="email" name="email_tutor" class="form-control form-control-sm lowercase b_radius" 
						placeholder="@" style="text-transform:lowercase;">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>TELÉFONO</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="tel" name="tel_tutor" maxlength="10" minlength="10" placeholder="10 DÍGITOS" required onkeyup="this.value=Numeros(this.value)"
						class="form-control form-control-sm b_radius">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>CALLE. NÚM</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="direccion_tutor" class="form-control form-control-sm text-uppercase b_radius" placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>POBL./COL.</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="poblacion_tutor" class="form-control form-control-sm text-uppercase b_radius" required placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>MPIO./DEL.</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-left">
						<input type="text" name="municipio_tutor" class="form-control form-control-sm b_radius text-uppercase" required placeholder="---">
					</div>

					<div class="col-xs-12 col-sm-9 col-md-2 col-lg-1 fw-bold">
						<label>CP</label>
					</div>
					<div class="col-xs-12 col-sm-11 col-md-10 col-lg-3 text-right">
						<input type="tel" name="cp_tutor" class="form-control form-control-sm b_radius" maxlength="5" minlength="5" onkeyup="this.value=Numeros(this.value)" placeholder="---">
					</div>
				</div>
			</fieldset>

			<div class="row">
				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5"></div>
				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-6 mb-5">

					<button type="button" class="btn btn-warning" onclick="location.href='home_semillero.php'">Atrás</button>
					<button type="submit" class="btn btn-success">Agregar</button>
					
				</div>
				
			</div>

		</form>
		
	</div>


	<script type="text/javascript">		
		const change = document.querySelector("#nacionalidad");
		const input = document.querySelector("[name=curp_id]");
		const label = document.querySelector('[name=extranjero]');

		change.addEventListener("change", () => {
			if(change.value === "MEXICANA"){
				input.style.display = 'initial';
				label.style.display = 'none';
			}else{
				input.style.display = 'none';
				label.style.display = 'initial';
			}
		});
	</script>
	<script type="text/javascript">
		const select =document.getElementById('edad');
		for(let i=0; i <= 100; i++){
			let option = document.createElement('option');
			option.value = i;
			option.textContent = i;
			select.appendChild(option);
		}
	</script>
<footer>
<footer>
	<div style="text-align:center;padding:0px;"> 
		<strong>Sistema Nacional de Fomento Musical 2025</strong>
			<h5 style="color:gray;">Hora actual en Mexico City, México</h5>
		<iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FMexico_City" width="90%" height="90" frameborder="0" seamless>
		</iframe> 
	</div>
</footer>
</footer>

</body>
</html>