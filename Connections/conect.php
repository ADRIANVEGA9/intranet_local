<?php
//header('Content-Type: text/html; charset=UTF-8');
$mysqli = new mysqli('localhost', 'Cerrajes', 'PRAXAIR1', 'intranet');
$mysqli->set_charset("utf8");

/*
 * Esta es la forma OO "oficial" de hacerlo,
 * AUNQUE $connect_error estaba averiado hasta PHP 5.2.9 y 5.3.0.
 */
// if ($mysqli->connect_error) {
//     die('Error de Conexión (' . $mysqli->connect_errno . ') '
//             . $mysqli->connect_error);
// }

/*
 * Use esto en lugar de $connect_error si necesita asegurarse
 * de la compatibilidad con versiones de PHP anteriores a 5.2.9 y 5.3.0.
 */
if (mysqli_connect_error()) {
    die('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

//echo 'Éxito Conectado... ' . $mysqli->host_info . "\n";
//printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
//var_dump($mysqli);

//$mysqli->close();

?>