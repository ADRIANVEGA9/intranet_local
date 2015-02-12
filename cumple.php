<!doctype html>
<?php $m=4;
  $nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $ip_host = gethostbyname($_SERVER['REMOTE_ADDR']);  ?>
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

<link rel="stylesheet" type="text/css" href="Shadowbox/shadowbox.css">
<script src="Shadowbox/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="Shadowbox/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init({
        displayCounter:false,
        modal: false, //evita que se cierre con click fuera del recuadro principal
        overlayColor: "#000",
        overlayOpacity: 0.8
    });
</script>
</head>
<body>
<header>
        <section id="logo"><a href="http://www.cerrajes.com"  target="_blank"><img src="imagenesSitio/logo.png"></a></section>
        <section id="titulo">cumpleaños</section>
    <?php  require_once("menu.php") ?>
</header>
    <section id="contenedor"> 
        <section id="cumple">
            
        </section>   
    </section>
    <?php  require_once("footer.html") ?>   
</body>
</html>