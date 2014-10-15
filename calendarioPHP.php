<?php
function CalendarioPHP($year, $month, $day_heading_length)
{ 
	//$nombreFichero = basename($_SERVER['PHP_SELF']); 
	$AlineacionVerticalTexto = 'center'; 

	// ----------- INICIO Dias marcados ---------- 
	//descanso obligatorio
	$obligatorio[0] = '1/1/2014'; // 1 de enero 
	$obligatorio[1] = '3/2/2014'; // por 5 de Febrero 
	$obligatorio[2] = '17/3/2014'; // por 20 de marzo
	$obligatorio[3] = '1/5/2014'; // 1 de mayo 
	$obligatorio[4] = '16/9/2014'; // 16 de septiembre 
	$obligatorio[5] = '17/11/2014'; // por 20 nov
	$obligatorio[6] = '25/12/2014'; // 25 de diciembre 
	$obligatorio[7] = '1/1/2015'; // 1 de enero 
	//echo sizeof($obligatorio); //conocer la longitud del arreglo
	//a cuenta de vacaciones
	$cuenta[0] = '17/4/2014'; // 17 abril
	$cuenta[1] = '18/4/2014'; // 18 abril
	//echo sizeof($cuenta);
	//var_dump($cuenta);
	//medio dia laborable otorgado por la empresa
	$medio[0] = '15/9/2014'; // 
	$medio[1] = '12/12/2014'; //   
	$medio[2] = '24/12/2014'; // 24 de diciembre  
	$medio[3] = '31/12/2014'; // 31 de diciembre
	//echo sizeof($medio);
	//var_dump($medio); 

	$dia_actual		=	date("j",time());	//obtiene dia del mes sin cero inicial (de 1 a 31).
	$mes_actual		=	date("n",time());	//obtiene mes sin cero inicial (de 1 a 12).
	$anio_actual	=	date("Y",time());	//obtiene año con cuatro cifras
	$first_of_month = mktime (0,0,0, $month, 1, $year); //obtiene primer dia del mes
	//Formato de mktime(hr,min,seg,mes,dia,año)

	static $day_headings = array('dom','lun','mar','mier','jue','vie','sab'); 
	$maxdays = date('t', $first_of_month);
	//'t' obtiene el numero de dias que tiene el mes seleccionado (de 28 a 31)
	$date_info = getdate($first_of_month);
	//getdate Devuelve un valor array asociativo que contiene información de fecha 
	/*Clave	Descripción	Ejemplo de valores devueltos
	"seconds"	Representación numérica de segundos	0 a 59
	"minutes"	Representación numérica de minutos	0 a 59
	"hours"	Representación numérica de horas	0 a 23
	"mday"	Representación numérica del día del mes	1 a 31
	"wday"	Representación numérica del día de la semana	0 (para el Domingo) a 6 (para el Sábado)
	"mon"	Representación numérica de un mes	1 a 12
	"year"	Una representación numérica completa de un año, 4 dígitos	Ejemplos: 1999 o 2003
	"yday"	Representación numérica del día del año	0 a 365
	"weekday"	Una representación textual completa del día de la semana	Sunday a Saturday
	"month"	Una representación textual completa de un mes, como January o March	(January a December)
	0	Segundos desde el Epoch Unix, similar a los valores devueltos por time() y usados por date(). 	Depende del sistema, típicamente -2147483648 a 2147483647. 
	*/
	$month = $date_info['mon']; //obtiene el mes del array date_info[ ]
	$year = $date_info['year']; //obtiene el año del array date_info[ ]

	switch ($date_info['mon']) 
	{ 
		case 1 : $date_info['month']  = "enero";break; 
		case 2 : $date_info['month']  = "febrero";break; 
		case 3 : $date_info['month']  = "marzo";break; 
		case 4 : $date_info['month']  = "abril";break; 
		case 5 : $date_info['month']  = "mayo";break; 
		case 6 : $date_info['month']  = "junio";break; 
		case 7 : $date_info['month']  = "julio";break; 
		case 8 : $date_info['month']  = "agosto";break; 
		case 9 : $date_info['month']  = "septiembre";break; 
		case 10 : $date_info['month'] = "octubre";break; 
		case 11 : $date_info['month'] = "noviembre";break; 
		case 12 : $date_info['month'] = "diciembre";break; 
	}; 

	$calendar = ("<table ").("border='0' ").("class='mes'>\n"); 
	$calendar .= ("<tr>\n").("<td colspan='7'>").("<div class='mesNombre $date_info[month]' >$date_info[month]</div>").("</td>\n</tr>\n"); 

	if($day_heading_length > 0 and $day_heading_length <= 4)
	{ 
		$calendar .= "<tr>\n"; 
		foreach($day_headings as $day_heading){ 
			$calendar .= ("<th class='dayofweek' >"). 
			($day_heading_length != 4 ? substr($day_heading, 0, $day_heading_length) : $day_heading). 
			("</th>\n"); 
		} 
		$calendar .= "</tr>\n"; 
	} 
	$calendar .= "<tr>\n"; 

	$weekday = $date_info['wday']; //Para que sea el Domingo el primer dia de la semana 
	//$weekday = $date_info['wday']-1;
	if ($weekday==-1) $weekday=6;
	$day = 1; #starting day of the month 

	if($weekday > 0)
	{ 
		$calendar .= ("<td "). 
		(" colspan='".$weekday."'></td>\n"); 
	} 

	while ($day <= $maxdays)
	{ 
		if($weekday == 7){
			$calendar 	.= "</tr>\n<tr>\n"; 
			$weekday 	 = 0; 
		} 

		$esObligatorio 	= 0; 
		$esCuenta 		= 0; 
		$esMedio 		= 0; 

		$tmp_date	=	$day."/".$month."/".$year;
		
		for ($i=0;$i<sizeof($obligatorio);$i++) { 
			if ($tmp_date == $obligatorio[$i]) 	{$esObligatorio=1;	break;}  
		}
		for ($i=0;$i<sizeof($cuenta);$i++) { 
			if ($tmp_date == $cuenta[$i]) 		{$esCuenta=1;		break;}  
		}		
		for ($i=0;$i<sizeof($medio);$i++) { 
			if ($tmp_date == $medio[$i]) 		{$esMedio=1;		break;} 
		}

		$calendar .= "<td valign='".$AlineacionVerticalTexto."' class='"; 

		if (($day==$dia_actual) and ($month==$mes_actual) and ($year==$anio_actual)) 
			{
				$calendar .= 'eDiaActual'; 
			} 
			else 
				{ //inicio else 1
				if (($esObligatorio==1)) {	$calendar .= 'eDiaObligatorio';	} 
					else  //inicio else 2
						{	if (($esCuenta==1)) {	$calendar .= 'eDiaCuenta';	} 
								else  //inicio else 2b
									{	if (($esMedio==1))	{	$calendar .= 'eDiaMedio';	} 
											else  //inicio else 2e
												{	if (($weekday == 0) or ($weekday == 6))	{	$calendar .= 'eDiaFinSemana';	} 
														else  //inicio else 3
														{	$calendar .= 'eDiaLaboral';	}  //fin else 3
												}  //fin else 2e
									}  //fin else 2b
						};   //fin else 2
				};  //fin else 1

		$calendar .= "'>".$day."</td>\n"; 
		$day++; 
		$weekday++; 
	} 

	if($weekday != 7)
	{ 
		$calendar .= '<td colspan="' . (7 - $weekday) . '"></td>'; 
	} 
		$calendar .= "</tr>\n</table>\n"; 
		return $calendar; 
}

extract($_POST);
extract($_GET);
$mesactual	=	date("n",time());
$anoactual	=	date("Y",time());
 
$dia_actual		= date("d",time());
$mes_actual 	= date("n",mktime (0,0,0, $mesactual, $dia_actual, $anoactual)); 
$anio_actual 	= date("Y",mktime (0,0,0, $mesactual, $dia_actual, $anoactual)); 
?>