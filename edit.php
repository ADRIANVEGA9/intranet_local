<?php
require_once("Connections/conect.php");
$m=7;
date_default_timezone_set('America/Mexico_City');
/***VARIABLES POR GET ***/
$numero1 = count($_GET);
$tags1 = array_keys($_GET);// obtiene los nombres de las varibles
$valores1 = array_values($_GET);// obtiene los valores de las varibles

for($i=0;$i<$numero1;$i++){// crea las variables y les asigna el valor
$$tags1[$i]=$valores1[$i];
}
/***VARIABLES POR POST ***/
$numero = count($_POST);
$tags = array_keys($_POST); // obtiene los nombres de las varibles
$valores = array_values($_POST);// obtiene los valores de las varibles

for($i=0;$i<$numero;$i++){ // crea las variables y les asigna el valor
$$tags[$i]=$valores[$i]; 
}
/*ahora solo hay que llamar las variables por su nombre*/

mysql_select_db($database_productos,$productos);
$consulta = mysql_query("SELECT * from salas WHERE sala='$sala' AND inicio='$date'");
// Verificamos si hemos realizado bien nuestro Query
if(!$consulta){
exit("Error en la consulta SQL" .' - '. mysql_error());
}
$row=mysql_fetch_array($consulta)

?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<title>Cerrajes&reg; el herraje ideal para su mueble - Editar Sala</title>
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/input.css">
<link rel="stylesheet" href="css/normalize.css">

<link rel="stylesheet" href="datepicker/metallic.css" type="text/css">
<link rel="stylesheet" href="datepicker/style.css" type="text/css">

<script src="js/prefixfree.min.js"></script>
<script src="js/jquery.min.js"></script>
<script>
	document.createElement('article');
	document.createElement('aside');
	document.createElement('figure');
	document.createElement('footer');
	document.createElement('header');
	document.createElement('hgroup');
	document.createElement('nav');
	document.createElement('section');
</script>

<script>
//Me permite remplazar valores dentro de una cadena
function str_replace($cambia_esto, $por_esto, $cadena) {
   return $cadena.split($cambia_esto).join($por_esto);
}

//Valida que no sean ingresado ENTER dentro del textarea
function Textarea_Sin_Enter($char, $id){
   //alert ($char);
   $textarea = document.getElementById($id);
   
   if($char == 13){
      $texto_escapado = escape($textarea.value);
      if(navigator.appName == "Opera" || navigator.appName == "Microsoft Internet Explorer") $texto_sin_enter = str_replace("%0D%0A", "", $texto_escapado); 
      else $texto_sin_enter = str_replace("%0A", "", $texto_escapado);      
      $textarea.value = unescape($texto_sin_enter); 
   }
}

function validar(e) { 
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron =/(^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|Á|É|Í|Ó|Ú|Ñ|Ü|\s)+|^)$/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
} 

function validarNum(e) { 
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron = /(^([0-9])+|^)$/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
} 

function validarTxtNum(e) { 
    tecla = (document.all) ? e.keyCode : e.which; 
    if (tecla==8) return true; 
    patron =/(^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|Á|É|Í|Ó|Ú|Ñ|Ü|[0-9]|\s)+|^)$/; 
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
} 

</script>

</head>
<body>
	<header>
        <section id="logo"><a href="http://www.cerrajes.com"  target="_blank"><img src="imagenesSitio/logo.png"></a></section>
        <section id="titulo">Formato<br>para apartado<br>de Salas</section>
		<?php  require_once("menu.php") ?>
	</header>
	<section id="contenedor">
		<section id="sala_eventos">
 			<?php require_once("event.php") ?>
		</section>
		<section id="sala_formato">
			<?php
			 if (!$_POST){ ?>
				<form id="salas" method="post">
						<?php
							$fecha2=time();							
						?>

					<article><div class="circulo">I</div>nformación del solicitante</article>
					<section id="sala_text">
	                  <input name="nombre_solicita" type="text" required id="nombre_solicita" form="salas" placeholder="Nombre:" tabindex="1" onkeypress="return validar(event)" value="<?php echo $row['nombre_solicita'];?>">
	                  <input name="departamento" type="text" required id="departamento" form="salas" placeholder="Departamento" tabindex="2" onkeypress="return validar(event)" value="<?php echo $row['departamento'];?>">
	                  <input name="ext" type="number" id="ext" form="salas" placeholder="Extensión:" max="329" min="200" tabindex="3" onkeypress="return validarNum(event)" value="<?php echo $row['ext'];?>">
	                </section>
				  	<article><p><div class="circulo">I</div>nformación del evento</p></article>
					<section id="sala_text">
	                  <input name="nombre_evento" type="text" required id="nombre_evento" form="salas"  placeholder="Nombre:" tabindex="4" onkeypress="return validarTxtNum(event)" value="<?php echo $row['nombre_evento'];?>" ><br>
					  <label for="fecha">Fecha:</label>
	                  <input name="fecha" type="TEXT" required id="fecha" form="salas" tabindex="5" title"aaaa/mm/dd" placeholder="aaaa/mm/dd" value="<?php echo $row['inicio'];?>"><br>
	                  <label for="hora_inicio">Hora de inicio:</label>
	                  <input name="hora_inicio" type="time" required id="hora_inicio" form="salas" max="19:00" min="07:00" tabindex="6" value="<?php echo $row['inicio'];?>">
	                  <label for="hora_termino">Hora de término:</label>
	                  <input name="hora_termino" type="time" required id="hora_termino" form="salas" max="22:00" min="08:00" tabindex="7" value="<?php echo $row['fin'];?>">
	                  <input name="no_participantes" type="number" required id="no_participantes" form="salas" placeholder="Número de participantes:" max="100" min="1" tabindex="8" onkeypress="return validarNum(event)"value="<?php echo $row['participantes'];?>">
	          		</section>
					<article class="sala_der">Seleccione la(s) opción(es) deseada(s)</article>
					<article class="sala_titulos"><p><div class="circulo">S</div>ala solicitada</p></article>
					<section class="sala_check">
					  <p>
				  		<input name="sala" type="radio" id="sala_0" form="salas" tabindex="9" value="Sala Talentos" <?php if (($row['sala']) == 'Sala Talentos'){echo 'checked';}?>  required>
					    <label for="sala_0">Sala Talentos<span></span></label>
				    <br>
				  		<input name="sala" type="radio" id="sala_1" form="salas" tabindex="10" value="Sala Cerrajes del Centro" <?php if (($row['sala']) == 'Sala Cerrajes del Centro'){echo 'checked';}?> required>
					    <label for="sala_1">Sala Cerrajes del Centro<span></span></label>
				    <br>
				  		<input name="sala" type="radio" id="sala_2" form="salas" tabindex="11" value="Sala Auditorio" <?php if (($row['sala']) == 'Sala Auditorio'){echo 'checked';}?> required>
					    <label for="sala_2">Sala Auditorio<span></span></label>
				    <br>
				  		<input name="sala" type="radio" id="sala_3" form="salas" tabindex="12" value="Sala Cerrajes" <?php if (($row['sala']) == 'Sala Cerrajes'){echo 'checked';}?> required>
					    <label for="sala_3">Sala Cerrajes<span></span></label>
				    <br>
				  		<input name="sala" type="radio" id="sala_4" form="salas" tabindex="13" value="Sala de juntas" <?php if (($row['sala']) == 'Sala de juntas'){echo 'checked';}?> required>
					    <label for="sala_4">Sala de juntas<span></span></label>
				    <br>
				      </p>
					</section>
				  <article class="sala_titulos"><p><div class="circulo">E</div>quipo</p></article>
					<section class="sala_check">
					  <p>
					    <input name="equipo[]" type="checkbox" id="equipo_0" form="salas" tabindex="15" value="Laptop">
					    <label for="equipo_0">Laptop:<span></span></label>
				    <br>
					    <input name="equipo[]" type="checkbox" id="equipo_1" form="salas" tabindex="16" value="Papelería">
					    <label for="equipo_1">Papelería:<span></span></label>
				    <br>
					    <input name="equipo[]" type="checkbox" id="equipo_2" form="salas" tabindex="17" value="Proyector">
					    <label for="equipo_2">Proyector:<span></span></label>
				    <br>
				      </p>
					</section>
				  <article class="sala_titulos"><p><div class="circulo">C</div>offe Break</p></article>
					<section class="sala_check">
					  <p>
					    <input name="coffe[]" type="checkbox" id="coffe_0" form="salas" tabindex="18" value="Café / Galletas">
					    <label for="coffe_0">Café / Galletas:<span></span></label>
				    <br>
					    <input name="coffe[]" type="checkbox" id="coffe_1" form="salas" tabindex="19" value="Agua">
					    <label for="coffe_1">Agua:<span></span></label>			        
				    <br>
					    <input name="coffe[]" type="checkbox" id="coffe_2" form="salas" tabindex="20" value="Té">
					    <label for="coffe_2">Té:<span></span></label>			        
				    <br>
					    <input name="coffe[]" type="checkbox" id="coffe_3" form="salas" tabindex="21" value="Jugo">
					    <label for="coffe_3">Jugo:<span></span></label>			        
				    <br>
					    <input name="coffe[]" type="checkbox" id="coffe_4" form="salas" tabindex="22" value="Comida">
					    <label for="coffe_4">Comida:<span></span></label>			        
				    <br>
				      </p>
					</section>
				  <article><p><div class="circulo">O</div>bservaciones</p></article>
					<section id="sala_text"><textarea name="observaciones" rows="7"  id="observaciones" form="salas" tabindex="23" onkeyup="Textarea_Sin_Enter(event.keyCode, this.id);" onkeypress="Textarea_Sin_Enter(event.keyCode, this.id);return validarTxtNum(event)"> <?php echo $row['observaciones'];?></textarea></section>
	                <input name="enviar" type="submit" id="enviar" form="salas" value="guardar">
				</form>
			<?php }
				else { require_once(".edit.php");
				}//fin else
			?>
		</section>
	</section>	
	<?php  require_once("footer.html") ?>

<!-- <script type="text/javascript" src="datepicker/jquery-1.10.2.js"></script> -->
<script type="text/javascript" src="datepicker/zebra_datepicker.js"></script>        

</body>
</html>		