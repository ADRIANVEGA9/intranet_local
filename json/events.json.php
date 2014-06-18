<?php 
header('Content-type: application/json');
require_once("../Connections/conect.php");
$sql="SELECT * FROM intranet.salas ";
$res=mysqli_connect($sql);
//mysql_query("SET NAMES 'utf8'");
$numeroRegistros=mysqli_stmt_num_rows ($res);
echo '[';
$separator = "";
while($registro=mysqli_fetch_array($res))
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