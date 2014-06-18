
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
#hora_inicio,
#hora_termino {
  display: inline-block;
  width: 45%;
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
#sala_text textarea {
  background-color: #F1F1E2;
  border: none;
  max-height: 570px;
  max-width: 100%;
  outline: none;
  resize: none;
  width: 100%;
}

.circulo {
  background: #71BF44;
  color: #FEFEFE;
  display: inline-block;
  font-size: 1.2em;
  height: 1.2em;
  line-height: 1.2em;
  margin-bottom: 5px;
  text-align: center;
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
              <div id="nombre_solicita">Nombre del solicitante: </div>
              <div id="departamento">Departamento: </div>
              <div id="ext">Extensión: </div>
            </div>
            <br>
    <article><p><div class="circulo">Información del evento</div></p></article>
    <div id="sala_text">
              <div id="nombre_evento">Nombre: </div>
              <div id="fecha">Fecha: </div>
              <div id="hora_inicio">Hora de inicio:</div>
              <div id="hora_termino">Hora de término:</div>
              <div id="no_participantes">Número de particpantes: </div>
    </div>
    <br>
    <article><p><div class="circulo">Sala solicitada</div></p></article>
    <div>
        <input name="sala" type="radio" id="sala_0" value="Talentos" >
        <label for="sala_0">Talentos<span></span></label>
      <br>
        <input name="sala" type="radio" id="sala_1"  value="Cerrajes del Centro" >
        <label for="sala_1">Cerrajes del Centro<span></span></label>
      <br>
        <input name="sala" type="radio" id="sala_2"  value="Auditorio" >
        <label for="sala_2">Auditorio<span></span></label>
      <br>
        <input name="sala" type="radio" id="sala_3"  value="Cerrajes" >
        <label for="sala_3">Cerrajes<span></span></label>
      <br>
        <input name="sala" type="radio" id="sala_4"  value="Sala de juntas" >
        <label for="sala_4">Sala de juntas<span></span></label>
      <br>
    </div>
    <article><p><div class="circulo">Equipo</div></p></article>
    <div>
      <p>
        <input name="equipo[]" type="checkbox" id="equipo_0"  value="Laptop">
        <label for="equipo_0">Laptop:<span></span></label>
      <br>
        <input name="equipo[]" type="checkbox" id="equipo_1"  value="Papelería">
        <label for="equipo_1">Papelería:<span></span></label>
      <br>
        <input name="equipo[]" type="checkbox" id="equipo_2"  value="Proyector">
        <label for="equipo_2">Proyector:<span></span></label>
        </p>
    </div>
    <article><p><div class="circulo">Coffe Break</div></p></article>
    <div>
      <p>
        <input name="coffe[]" type="checkbox" id="coffe_0"  value="Café / Galletas">
        <label for="coffe_0">Café / Galletas:<span></span></label>
      <br>
        <input name="coffe[]" type="checkbox" id="coffe_1"  value="Agua">
        <label for="coffe_1">Agua:<span></span></label>             
      <br>
        <input name="coffe[]" type="checkbox" id="coffe_2"  value="Té">
        <label for="coffe_2">Té:<span></span></label>             
      <br>
        <input name="coffe[]" type="checkbox" id="coffe_3"  value="Jugo">
        <label for="coffe_3">Jugo:<span></span></label>             
      <br>
        <input name="coffe[]" type="checkbox" id="coffe_4"  value="Comida">
        <label for="coffe_4">Comida:<span></span></label>    
        </p>
    </div>
    <article><p><div class="circulo">Observaciones</div></p></article>
    <div id="sala_text"><textarea name="observaciones" rows="7"  id="observaciones" >Observaciones: </textarea></div>  
    <br>  
    <div id="logo">
      <img src="http://192.168.1.8/intranet/imagenesSitio/logo.png" alt="">
    </div>
  </div>
</body>
</html>