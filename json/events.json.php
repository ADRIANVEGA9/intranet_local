<?php 
header('Content-type: application/json');
require"../Connections/conect.php";
//var_dump($mysqli);
$sql = "SELECT * FROM intranet.salas ";
$res = $mysqli->query($sql);
//mysql_query("SET NAMES 'utf8'");
$numeroRegistros = $res->num_rows;
echo '[';
$separator = "";
while($registro=$res->fetch_array(MYSQLI_ASSOC ))
	{
		echo $separator;
		echo '	{ 
			"date": "'; echo $registro["inicio"]; echo '000",
			"sala": "'; echo $registro["sala"]; echo '",
			"title": "'; echo $registro["nombre_evento"]; echo '",
			"description": "'; echo $registro["observaciones"]; echo '",
			"url": "000",
			"finDate":"'; echo $registro["fin"]; echo '000"
		}';
		$separator = ",";
	}
echo ']';
?>