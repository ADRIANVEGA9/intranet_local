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
<?php if (($ip_host == '192.168.1.880') OR ($ip_host == '192.168.1.20')) {?>
    <script type="text/javascript">
    // window.onload = function() {

    //     // open a welcome message as soon as the window loads
    //     Shadowbox.open({
    //         content:    '<div id="welcome"><img id="hoy" src="ImagenesSitio/hoy.png" /></>',
    //         player:     "html",
    //         title:      "¡Felicidades!",
    //         height:     680,
    //         width:      1180
    //     });

    // };
    </script>
<?php } ?>
</head>
<body>
<header>
        <section id="logo"><a href="http://www.cerrajes.com"  target="_blank"><img src="imagenesSitio/logo.png"></a></section>
        <section id="titulo">cumpleaños</section>
    <?php  require_once("menu.php") ?>
</header>
    <section id="contenedor">    
    <?php if (($ip_host <> '192.168.1.880') AND ($ip_host <> '192.168.1.20')) {?>
        <!-- <a href="ImagenesSitio/hoy.png" rel="shadowbox"> --><!-- COMENTAR ESTA LINEA PARA DESACTIVAR -->
    <?php } ?>
            <img id="cumple" src="ImagenesSitio/cumple.jpg" />
        </a>
    </section>
    <?php  require_once("footer.html") ?>   
</body>
</html>