<?php 
echo '[';
$today = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")); 
$today .='000';

	echo '	{ 
		"date": "'; echo $today; echo '",
	 	"type": "junta", "title": "'; echo $today; echo '", 
	 	"description": "descripción", "url": "http://localhost/" 
	 	},';
	echo '	{ 
		"date": "'; echo $today+17200000; echo '", 
		"type": "reunión", "title": "Test Next Year", 
		"description": "Lorem Ipsum dolor set", "url": "#" 
		}';
echo ']';
header('Content-type: application/json');
?>
