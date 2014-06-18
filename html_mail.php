<?php
if (isset($_POST['equipo'])) {
  $a_equipo = implode(', ',$_POST['equipo']);//convertir Array de checkbox en cadena separada por coma ","
  $to  .= 'intranet.sistemas@cerrajes.com' . ', ';
} else {
  $a_equipo = "Sin equipo";
}

if (isset($_POST['coffe'])) {
  $a_coffe = implode(', ',$_POST['coffe']);  
  $to  .= 'mcabrera@cerrajes.com' . ', ';
} else {
  $a_coffe = "Sin coffe break"; 
}
// multiple recipients
$to .= 'epacheco@cerrajes.com' . ', '; // note the comma
$to .= 'intranet@cerrajes.com';

// subject
$subject = 'Apartado de sala';

// message
$message = '
<html lang="es">
<head>
<meta charset="utf-8">
  <title>Formato para apartado de Salas</title>
</head>
<style type="text/css">
<!--
/*------------ @font-face ------------------*/
body {
  font-family: calibri;
}
#logo {
  background: #71BF44;
  color: #FEFEFE;
  font-size: 2em;
  line-height: 2em;
  margin-bottom: 1em;
  text-align: right;
  padding: 5px;
  width: 100%;
  }
#logo img {
  display: inline-block;
  margin: 15px 0 15px 0;
  position: relative;
}
#salas  {
  margin: 0 auto;
  padding: 15px;
  width: 95%;
}
#sala_eventos, #sala_formato {
  display: inline-block;
  height: auto;
  padding-top: 10px;
  vertical-align: top;  
}
#sala_eventos {
  margin-left: 12px;
  width: 35%;
}
#sala_formato {
  margin-left: 1em;
  width: 60%;
}
#sala_text {
  background: #F1F1E2;
  color: #797676;
  height: auto;
  line-height: 2em;
  min-height: 100px;
  padding: 5px;
  width: 100%;
}
#sala_text span {
  color:#494646;
}
#sala_text textarea {
  background-color: #F1F1E2;
  border: none;
  color:#494646;
  width: 100%;
}

.circulo {
  background: #FEFEFE;
  color: #71BF44;
  display: inline-block;
  font-size: 1.2em;
  height: 1.2em;
  line-height: 1.2em;
  margin-bottom: 5px;
  text-align: left;
}
.sala_check {
  border-left: #C6C7BD;
  border-width: 2px;
  margin: 15px 0px 15px 0px;
  width: 58%;
}
.sala_check label {
  margin-left: 2em;
}
-->
</style>
<body>
  <section id="salas">
    <div id="logo">
      Formato de apartado de salas
    </div>
    <article><div class="circulo">Información del solicitante</div></article>
    <div id="sala_text">
              <div id="nombre_solicita">Nombre del solicitante: <span>'.$_POST['nombre_solicita'].'</span></div>
              <div id="departamento">Departamento: <span>'.$_POST['departamento'].'</span></div>
              <div id="ext">Extensión: <span>'.$_POST['ext'].'</span></div>
            </div>
            <br>
    <article><p><div class="circulo">Información del evento</div></p></article>
    <div id="sala_text">
              <div id="nombre_evento">Nombre: <span>'.$_POST['nombre_evento'].'</span></div>
              <div id="fecha">Fecha: <span>'.$_POST['fecha'].'</span></div>
              <div id="hora_inicio">Hora de inicio: <span>'.$_POST['hora_inicio'].'</span></div>
              <div id="hora_termino">Hora de término: <span>'.$_POST['hora_termino'].'</span></div>
              <div id="no_participantes">Número de particpantes: <span>'.$_POST['no_participantes'].'</span></div>
    </div>
    <br>
    <article><p><div class="circulo">Sala solicitada</div></p></article>
    <div class="sala_check">
      <p>
    '.$_POST['sala'].'
      <br>
        </p>
    </div>
    <article><p><div class="circulo">Equipo</div></p></article>
    <div class="sala_check">
      <p>'.
$a_equipo.'<br></p>
    </div>   
    <article><p><div class="circulo">Coffe Break</div></p></article>
    <div class="sala_check">
      <p>'.
$a_coffe.'<br></p>
    </div>
    <article><p><div class="circulo">Observaciones</div></p></article>
    <div id="sala_text"><span>'.$_POST['observaciones'].'</span></div>  
    <br>  
    <div id="logo">
      <img src="http://192.168.1.8/intranet/imagenesSitio/logo.png" alt="">
    </div>
  </div>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= 'To: Apartado de salas <epacheco@cerrajes.com>' . "\r\n";
$headers .= 'From: Intranet - Apartado de sala <intranet@cerrajes.com>' . "\r\n";
//$headers .= 'Cc: csoto@cerrajes.com' . "\r\n";
$headers .= 'Bcc: avega@cerrajes.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);
?>