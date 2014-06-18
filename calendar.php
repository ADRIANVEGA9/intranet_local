<!doctype html>
<?php $m=1; ?>
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<title>Cerrajes&reg; el herraje ideal para su mueble</title>
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/calendar.css">
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
    	<section id="titulo">calendario laboral corporativo</section>
	<?php  require_once("menu.php") ?>
</header>
<section id="contenedor">

	<section id="apCalendar">
		<?php require 'calendarioPHP.php'; ?>
		
	    <table id="tblCalendar" cellspacing="6">
	      <tr>
	        <td colspan="4" bgcolor="#F1F1E9">
	        	<div class="yearActual" ><?php echo date("Y",mktime (0,0,0, $mesactual, $dia_actual, $anoactual)); ?>&nbsp;</div>
	        </td>
	      </tr>
	      <tr>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 1, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 2, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 3, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 4, 4);?></td>
	      </tr>
	      <tr>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 5, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 6, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 7, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 8, 4);?></td>
	      </tr>
	      <tr>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 9, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 10, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 11, 4);?></td>
	        <td class="topPadding" valign="top"><?php echo CalendarioPHP($anio_actual, 12, 4);?></td>
	      </tr>
	      <tr>
	        <td class="topPadding" colspan="4">&nbsp;</td>
	      </tr>
	  	</table>

		<table id="tblYearSig" cellspacing="6">
			<tr>
	        	<td colspan="4" bgcolor="#F1F1F1">
	        		<div class="yearSiguiente"><?php echo (date("Y",mktime (0,0,0, $mesactual, $dia_actual, $anoactual))+1); ?>&nbsp;</div>
	        	</td>
	      	</tr>
	    </table>

		<table id="tblYearSigEne" cellspacing="6">
			<tr>
		        <td><?php echo CalendarioPHP($anio_actual+1, 1, 4);?></td>
		      	<td colspan="3">
					<table id="txt" cellpadding="0" cellspacing="0" >
		                <tr >
		                    <td colspan="2" >&nbsp;</td>
		                    <td colspan="5" >&nbsp;</td>
		                </tr>
		                <tr border="0" >
		                    <td height="8" colspan="7"></td>
		                </tr>
		                <tr class="Estilo1">
		                    <td colspan="7" class="DiaObligatorio" >descanso obligatorio</td>
		                </tr>
		                <tr >
		                    <td colspan="7" >&nbsp;</td>
		          		</tr>
		                <tr class="Estilo1a" >
		                    <td colspan="7" class="DiaCuenta" >a cuenta de vacaciones</td>
		                </tr>
		                <tr >
		                    <td colspan="7" >&nbsp;</td>
		                </tr>
		                <tr class="Estilo1b" >
		              		<td colspan="7" class="DiaMedio">trabajo medio d&iacute;a </td>
		                </tr>
		            </table>
		        </td>
		    </tr>
	      <tr>
	        <td class="topPadding" colspan="4">&nbsp;</td>
	      </tr>
		</table>
  	</section>
</section>	
	<?php  require_once("footer.html") ?>
</body>
</html>