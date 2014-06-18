<!doctype html>
<?php 
  $nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $ip_host = gethostbyname($_SERVER['REMOTE_ADDR']); 
  $m = 0; 
?>  
<html lang="es">
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="favicon.ico">
<title>Cerrajes&reg; el herraje ideal para su mueble</title>
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" href="css/normalize.css">
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
        <section id="titulo">intranet</section>
		<?php  require_once("menu.php") ?>
	</header>
	<?php if (($ip_host == '192.168.1.820') OR ($ip_host == '192.168.1.880')) {?>
		<section id="contenedor">
			<img id="home" src="ImagenesSitio/hoy.png" />
		</section>	
	<?php } else { ?>
		<section id="contenedor">
			<img id="home" src="ImagenesSitio/index.jpg" />
		</section>
	<?php } ?>	

	<?php  require_once("footer.html") ?>
</body>
</html>