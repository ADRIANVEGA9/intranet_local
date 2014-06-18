<!doctype html>
<?php $m=6; 
  require_once("Connections/conect.php");
 //inicializo el criterio y recibo cualquier cadena que se desee buscar
$criterio = "";		        
if ($_GET["criterio"]!="")
{
	$txt_criterio = $_GET["criterio"];
	$criterio = " where nombre like '%" . $txt_criterio . "%' or telefono like '%" . $txt_criterio . "%' or numero like '%" . $txt_criterio . "%' or unidad like '%" . $txt_criterio . "%'";
}else{
	$txt_criterio = "Tiendas Cerrajes";
	$criterio = " where unidad like '%" . $txt_criterio . "%'";	
}

$sql="SELECT * FROM intranet.ncortos ".$criterio;
$res=mysql_query($sql);
$numeroRegistros=mysql_num_rows($res);
$unidad="SELECT unidad FROM intranet.ncortos GROUP BY unidad";
$resUni=mysql_query($unidad);
$regUni=mysql_num_rows($resUni);
?>
<html lang="es">
<head>
<meta>
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
        <section id="titulo">directorio - n&uacute;meros cortos </section>
		<?php  require_once("menu.php") ?>
	</header>
	<section id="contenedor">

		<section id="opciones">
			<section id="unidad">
				<?
				while($rUnidad=mysql_fetch_array($resUni))
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
					<form action="cortos.php" method="get" >
					<input type="text" name="criterio" size="22" maxlength="150" placeholder="buscar: <?  echo $txt_criterio; ?>">
					<input type="submit" value="Buscar" id="buscar">
				</section>
			</section>
		</section>

		<section id="mostrar">
			<?php
		       
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
						$sql="SELECT * FROM intranet.ncortos ".$criterio." ORDER BY ".$orden.",nombre ASC ";
						$res=mysql_query($sql);

						echo "<table width='100%' border='0' cellspacing='1' cellpadding='1'>";
						echo "<th width='33%'><a class='ord' href='".$_SERVER["PHP_SELF"]."?&orden=numero&criterio=".$txt_criterio."'>N&uacute;mero Corto</a></th>";
						echo "<th width='33%'><a class='ord' href='".$_SERVER["PHP_SELF"]."?&orden=telefono&criterio=".$txt_criterio."'>Tel&eacutefono</a></th>";
						echo "<th width='33%'><a class='ord' href='".$_SERVER["PHP_SELF"]."?&orden=nombre&criterio=".$txt_criterio."'>Nombre</a></th>";
						while($registro=mysql_fetch_array($res))
						{							
			?>
			<!-- tabla de resultados -->
			  <tr>
			    <td><b><? echo $registro["numero"]; ?></b></font></td>
			    <td><b><? echo $registro["telefono"]; ?></b></font></td>
			    <td><b><? echo $registro["nombre"]; ?></b></font></td>
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