<!doctype html>
<?php $m=2; 
  require"Connections/conect.php";
  /***VARIABLES POR GET ***/
$numero1 = count($_GET);
$tags1 = array_keys($_GET);// obtiene los nombres de las varibles
$valores1 = array_values($_GET);// obtiene los valores de las varibles

for($i=0;$i<$numero1;$i++){// crea las variables y les asigna el valor
$$tags1[$i]=$valores1[$i];
}

if (isset($orden)) {
  $orden = $orden;
} else {
	$orden='nombre';
}

 //inicializo el criterio y recibo cualquier cadena que se desee buscar	        
if (isset($criterio))
{
	$txt_criterio = $criterio;
	$criterio = " where activo = 1 AND (nombre like '%" . $txt_criterio . "%' or departamento like '%" . $txt_criterio . "%' or ext like '%" . $txt_criterio . "%' or unidad like '%" . $txt_criterio . "%' )";
}else{
	$txt_criterio = "CerracoMex";
	$criterio = " where activo = 1 AND unidad like '%" . $txt_criterio . "%'";	
}

$sql				=	"SELECT * FROM intranet.directorio ".$criterio;
$res 				=	$mysqli->query($sql);
$numeroRegistros	=	$res->num_rows;

$unidad = "SELECT unidad FROM intranet.directorio GROUP BY unidad";
$resUni = $mysqli->query($unidad);
$regUni = $resUni->num_rows;
?>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<title>Cerrajes&reg; el herraje ideal para su mueble</title>
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/ordenar.css">
<script src="js/prefixfree.min.js"></script>
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

</head>
<body>
	<header>
        <section id="logo"><a href="http://www.cerrajes.com"  target="_blank"><img src="imagenesSitio/logo.png"></a></section>
        <section id="titulo">directorio - extensiones</section>
		<?php  require_once("menu.php") ?>
	</header>
	<section id="contenedor">

		<section id="opciones">
			<section id="unidad">
				<?
				while($rUnidad=$resUni->fetch_array(MYSQLI_ASSOC))
						{
							echo "<section id='unidadNeg'><a class=' ";
							if ($rUnidad["unidad"]==$txt_criterio)
							{
								echo "active";
							}
							echo"'href='".$_SERVER["PHP_SELF"]."?&criterio=".$rUnidad["unidad"]."'>".$rUnidad["unidad"]."</a></section>";
						}
				?>
				<section id="busqueda">
					<form action="directorio.php" method="get" >
						<input type="text" name="criterio" size="22" maxlength="150" placeholder="buscar: <?php  echo $txt_criterio; ?>">
						<input type="submit" value="Buscar" id="buscar" >
					</form>
				</section>
			</section>
		</section>

		<section id="mostrar">
			<?php
			// var_dump($txt_criterio);
			// var_dump($criterio);
		       
				if($numeroRegistros<=0)
				{
					echo "<div align='center'>";
					echo "<font face='TChevin' size='5'>No se encontraron resultados</font>";
					echo "</div>";
				}else{
					//elementos para el orden
					if(!isset($orden))
					{
						$orden="nombre";
					}
						//creacion de la consulta
						$sql	=	"SELECT * FROM intranet.directorio ".$criterio." ORDER BY ".$orden.",nombre ASC ";
						$res	=	$mysqli->query($sql);
						
						echo "<table width='100%' border='0' cellspacing='1' cellpadding='1'>";
						echo "<th width='33%'><a class='ord' href='".$_SERVER["PHP_SELF"]."?&orden=nombre&criterio=".$txt_criterio."'>Nombre</a></th>";
						echo "<th width='33%'><a class='ord' href='".$_SERVER["PHP_SELF"]."?&orden=departamento&criterio=".$txt_criterio."'>Departamento</a></th>";
						echo "<th width='33%'><a class='ord' href='".$_SERVER["PHP_SELF"]."?&orden=ext&criterio=".$txt_criterio."'>Extensi&oacute;n</a></th>";
						while($registro=$res->fetch_array(MYSQLI_ASSOC ))
						{
			?>
			<!-- tabla de resultados -->
			  <tr>
			    <td><b><? echo $registro["nombre"]; ?></b></font></td>
			    <td><b><? echo $registro["departamento"]; ?></b></font></td>
			    <td><b><? echo $registro["ext"]; ?></b></font></td>
			  </tr>
			<!-- fin tabla resultados -->
			<?
					}//fin while
					echo "</table>";
				}//fin else
			?>
		</section>

	</section>
	<?php  require_once("footer.html") ?>	
</body>
</html>