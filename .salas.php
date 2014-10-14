<?php require_once("Connections/conect.php"); 
$today = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")); 
  $nombre_host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $ip_host = gethostbyname($_SERVER['REMOTE_ADDR']);   
$n_evento=$_POST[utf8_encode('nombre_evento')];
$n_observaciones=$_POST[utf8_encode('observaciones')];
$n_solicita=$_POST[utf8_encode('nombre_solicita')];
$n_departamento=$_POST[utf8_encode('departamento')];

if (isset($_POST['equipo'])) {
  $a_equipo = implode(', ',$_POST['equipo']);//convertir Array de checkbox en cadena separada por coma ","
} else {
  $a_equipo = "Sin equipo";
}

if (isset($_POST['coffe'])) {
  $a_coffe = implode(', ',$_POST['coffe']);
} else {
  $a_coffe = "Sin coffe break"; 
}

$fecha_inicio = strtotime($_POST['fecha']." ".$_POST['hora_inicio']);
$fecha_fin = strtotime($_POST['fecha']." ".$_POST['hora_termino']);
$fecha_final = $fecha_fin - 600;

$fecha_inicioNormal = $_POST['fecha']." ".$_POST['hora_inicio'];
$fecha_finNormal = $_POST['fecha']." ".$_POST['hora_termino'];

//mysql_select_db($database_productos,$productos);

$sala = $_POST['sala'];
$query = "SELECT sala, inicio, fin from salas WHERE sala='$sala' ";
$consulta = $mysqli->query($query);
// Verificamos si hemos realizado bien nuestro Query
if(!$consulta){
exit("Error en la consulta SQL");
}

$resp_ocupada = "La ".$sala." ya esta apartada en el horario que elegiste";
$resp_finmayor = "La hora de término debe ser al menos 10 minutos mayor a la hora de inicio";
$resp_regresa = "<br>";
$resp_regresa .= "<div id='regresar'><a href='javascript:history.go(-1)''>Regresar</a></div></section>";
$resp_regresa .= "<br>";
$resp_ocupada .= $resp_regresa;
$resp_finmayor .= $resp_regresa;
$resp_today = "No puedes ingresar una fecha/hora anterior a la actual, ingresa una fecha/hora valida con el formato aaaa/mm/dd";
$resp_today .= $resp_regresa;

echo "<section id='resultado'>";

  if ($today<$fecha_inicio)
  {//if today
    if (($fecha_final) >= $fecha_inicio)
    { //if 1
        $f = 0; 
        while ($row_consulta=$consulta->fetch_array(MYSQLI_ASSOC))
        {
          if ( 
                (($fecha_inicio > $row_consulta['inicio']) AND ($fecha_inicio<$row_consulta['fin'])) 
            OR  (($row_consulta['inicio'] > $fecha_inicio) AND ($row_consulta['inicio']<$fecha_fin))
            )
          {
            if ($f==0) {
              echo $resp_ocupada;
            }
            $f = 1; //valor 1 si la fecha inicio del formulario esta dentro de un rago almacenado en BD
          }
        }//fin while
    }//fin if 1
    else {
      echo $resp_finmayor;
      $f=-1;
    }
  }//fin if today
  else
  {
      echo $resp_today; 
      $f=-1;  //valor de $f por ser fecha anterior a la actual
  }
    if ($f==0) {//if f
      $fecha = strftime("%Y-%m-%d ") . " " . strftime("%H:%M:%S ");
      $insertar = "INSERT INTO salas (nombre_evento, sala, inicio, fin, observaciones, nombre_solicita, departamento, ext, equipo, coffe, participantes,ip, host, fecha, fechaInicio, FechaFin) VALUES ('{$n_evento}', '{$_POST['sala']}', '{$fecha_inicio}', '{$fecha_fin}', '{$n_observaciones}', '{$n_solicita}', '{$n_departamento}', '{$_POST['ext']}', '{$a_equipo}', '{$a_coffe}', '{$_POST['no_participantes']}','{$ip_host}','{$nombre_host}','{$fecha}','{$fecha_inicioNormal}','{$fecha_finNormal}')";
      $resultado = $mysqli->query($insertar);
      //var_dump($resultado);
         if (!$resultado) {
            $mensaje  = $resp_ocupada;
            die($mensaje);
        } else { 
          echo "La ".$_POST['sala']." se ha apartado satisfactoriamente";
          echo "<br>";
          require"html_mail.php";
        }
      }//fin if f

echo "</section>";
?>