<?php
function CalendarioPHP($year, $month, $day_heading_length = 3){ 
$nombreFichero = basename($_SERVER['PHP_SELF']); 
$ColorFondoCelda = '#F1F1E9'; //
$ColorFondoTabla = '#F1F1E9'; 
$ColorFondoCeldasDiaSemana = '#CAE0B1'; //
$AnchoCalendario = '85%'; 
$AltoCalendario = '1%'; 
$AnchoCeldas = '25'; 
$AltoCeldas = '20'; 
$AlineacionVerticalTexto = 'center'; 

// ----------- INICIO Dias marcados ---------- 
//descanso obligatorio
$obligatorio[0] = '1/1/2014'; // 1 de enero 
$obligatorio[1] = '3/2/2014'; // por 5 de Febrero 
$obligatorio[2] = '17/3/2014'; // por 20 de marzo
$obligatorio[3] = '1/5/2014'; // 1 de mayo 
$obligatorio[4] = '16/9/2014'; // 16 de septiembre 
$obligatorio[5] = '17/11/2014'; // por 20 nov
$obligatorio[6] = '1/12/2012'; // 1 de diciembre de cada 6 años
$obligatorio[7] = '25/12/2014'; // 25 de diciembre 
$obligatorio[8] = '1/1/2015'; // 1 de enero 
$obligatorio[9] = '1/1/2013'; // 1 de enero 
$obligatorio[10] = '4/2/2013'; // por 5 de Febrero 
$obligatorio[11] = '18/3/2013'; // por 20 de marzo
$obligatorio[12] = '1/5/2013'; // 1 de mayo 
$obligatorio[13] = '16/9/2013'; // 16 de septiembre 
$obligatorio[14] = '18/11/2013'; // por 20 nov
$obligatorio[15] = '25/12/2013'; // 25 de diciembre 
// vacaciones pagados
$vacaciones[0] = '24/12/2008'; // 24 de diciembre
$vacaciones[1] = '25/12/2008'; // 25 de diciembre
$vacaciones[2] = '26/12/2008'; // 26 de diciembre
$vacaciones[3] = '29/12/2008'; // 29 de diciembre
$vacaciones[4] = '30/12/2008'; // 30 de diciembre
$vacaciones[5] = '31/12/2008'; // 31 de diciembre
$vacaciones[6] = '1/1/2009'; // 1 de enero
$vacaciones[7] = '2/1/2009'; // 2 de enero
//a cuenta de vacaciones
$cuenta[0] = '17/4/2014'; // 17 abril
$cuenta[1] = '18/4/2014'; // 18 abril
$cuenta[2] = '4/4/2012'; // 20 abril
$cuenta[3] = '5/4/2012'; // 21 abril
$cuenta[4] = '6/4/2012'; // 22 abril
$cuenta[5] = '30/4/2012'; // 30 de abril
$cuenta[6] = '24/12/2012'; // 24 de diciembre
$cuenta[7] = '31/12/2012'; // 31 de diciembre
$cuenta[8] = '29/12/2011'; // 29 de diciembre
$cuenta[9] = '30/12/2011'; // 30 de diciembre
//sabados laborables
$SabadoLaborable[0] = '1/11/2008'; // 1 de noviembre 
$SabadoLaborable[1] = '8/11/2008'; // 1 de noviembre 
$SabadoLaborable[2] = '15/11/2008'; // 1 de noviembre 
$SabadoLaborable[3] = '22/11/2008'; // 1 de noviembre 
$SabadoLaborable[4] = '29/11/2008'; // 1 de noviembre 
$SabadoLaborable[5] = '6/12/2008'; // 1 de noviembre 
$SabadoLaborable[6] = '13/12/2008'; // 1 de noviembre 
$SabadoLaborable[7] = '20/12/2008'; // 1 de noviembre 
//dias de trabajo obligatorios
$suspension[0] = '4/2/2011'; // 4 de febrero 
$suspension[1] = '8/2/2011'; // 8 de febrero 
$suspension[2] = '18/3/2011'; // 18 de marzo 
$suspension[3] = '22/3/2011'; // 22 de marzo 
$suspension[4] = '15/4/2011'; // 15 de abril
$suspension[5] = '25/4/2011'; // 25 de abril 
$suspension[6] = '9/5/2011'; // 9 de mayo 
$suspension[7] = '11/5/2011'; // 11 de mayo 
$suspension[8] = '15/9/2011'; // 15 de septiembre 
$suspension[9] = '19/9/2011'; // 19 de septiembre
$suspension[10] = '1/11/2011'; // 1 de noviembre 
$suspension[11] = '3/11/2011'; // 3 de noviembre 
$suspension[12] = '18/11/2011'; // 18 de noviembre
$suspension[13] = '22/11/2011'; // 22 de noviembre 
$suspension[14] = '9/12/2011'; // 9 de diciembre 
$suspension[15] = '13/12/2011'; // 13 de diciembre
$suspension[16] = '23/12/2011'; // 22 de diciembre
//medio dia laborable otorgado por la empresa
$medio[0] = '10/5/2013'; // 10 de mayo
$medio[1] = '12/12/2014'; //   
$medio[2] = '24/12/2014'; // 24 de diciembre  
$medio[3] = '31/12/2014'; // 31 de diciembre 
$medio[4] = '12/12/2013'; //   
$medio[5] = '24/12/2013'; // 24 de diciembre  
$medio[6] = '31/12/2013'; // 31 de diciembre 

$dia_actual=date("j",time());  //obtiene dia del mes sin cero inicial de 1 a 31
$mes_actual=date("n",time());  //obtiene mes sin cero inicial de 1 a 12
$anio_actual=date("Y",time()); //obtiene año con cuatro cifras

$first_of_month = mktime (0,0,0, $month, 1, $year); //obtiene primer dia del mes
//Formato de mktime(hr,min,seg,mes,dia,año)

static $day_headings = array('D','L','M','M','J','V','S'); 
$maxdays = date('t', $first_of_month);
//'t' obtiene el numero de dias del mes seleccionado de 28 a 31
$date_info = getdate($first_of_month);
//var_dump($date_info);
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
"month"	Una representación textual completa de un mes, como January o March	January a December
0	Segundos desde el Epoch Unix, similar a los valores devueltos por time() y usados por date(). 	Depende del sistema, típicamente -2147483648 a 2147483647. 
*/
$month = $date_info['month']; //obtiene el mes del array date_info[ ]
$year = $date_info['year']; //obtiene el año del array date_info[ ]
switch ($date_info['month']) { 
case 1 : $date_info['mon']="enero";break; 
case 2 : $date_info['mon']="febrero";break; 
case 3 : $date_info['mon']="marzo";break; 
case 4 : $date_info['mon']="abril";break; 
case 5 : $date_info['mon']="mayo";break; 
case 6 : $date_info['mon']="junio";break; 
case 7 : $date_info['mon']="julio";break; 
case 8 : $date_info['mon']="agosto";break; 
case 9 : $date_info['mon']="septiembre";break; 
case 10 : $date_info['mon']="octubre";break; 
case 11 : $date_info['mon']="noviembre";break; 
case 12 : $date_info['mon']="diciembre";break; 
}; 
//var_dump($date_info['month']);

$calendar = ("<table "). 
("border='0' "). 
//("height='".$AltoCalendario."' "). 
("width='".$AnchoCalendario."' "). 
("cellspacing='0' cellpadding='0' "). 
("class='mes'>\n"); 
$calendar .= ("<tr>\n"). 
("<td colspan='7'>"). 
//("<font color='".$ColorDiaFestivo."' size=".$TamanioFuente." face='".$TipoFuente."'>"). 
("<div class='mesNombre'>$date_info[month]</div>"). 
//("</font>"). 
("</td>\n</tr>\n"); 

if($day_heading_length > 0 and $day_heading_length <= 4){ 
$calendar .= "<tr>\n"; 
foreach($day_headings as $day_heading){ 
$calendar .= ("<th height='".$AltoCeldas."' abbr='".$day_heading."' class='dayofweek' >"). 
($day_heading_length != 4 ? substr($day_heading, 0, $day_heading_length) : $day_heading). 
("</font>"). 
("</th>\n"); 
} 
$calendar .= "</tr>\n"; 
} 
$calendar .= "<tr>\n"; 

$weekday = $date_info['wday']; //Para que sea el Domingo el primer dia de la semana 
//$weekday = $date_info['wday']-1;
if ($weekday==-1) $weekday=6;
$day = 1; #starting day of the month 

if($weekday > 0){ 
$calendar .= ("<td bgcolor='".$ColorFondoTabla). 
("' colspan='".$weekday."'></td>\n"); 
} 

while ($day <= $maxdays){ 
if($weekday == 7){
$calendar .= "</tr>\n<tr>\n"; 
$weekday = 0; 
} 

$esObligatorio = 0; 
$esVacaciones = 0; 
$esCuenta = 0; 
$esSabadoLaborable = 0; 
$esSuspension = 0; 
$esMedio = 0; 
$tmp_date=$day."/".$month."/".$year;
for ($i=0;$i<20;$i++) { 
if ($tmp_date==$obligatorio[$i]) {$esObligatorio=1;break;} 
if ($tmp_date==$vacaciones[$i]) {$esVacaciones=1;break;} 
if ($tmp_date==$cuenta[$i]) {$esCuenta=1;break;} 
if ($tmp_date==$SabadoLaborable[$i]) {$esSabadoLaborable=1;break;} 
if ($tmp_date==$suspension[$i]) {$esSuspension=1;break;} 
if ($tmp_date==$medio[$i]) {$esMedio=1;break;} 
} 

$calendar .= ("<td width='".$AnchoCeldas). 
("' height='".$AltoCeldas). 
("' valign='".$AlineacionVerticalTexto). 
("' "); 

$calendar .= "class='"; 
if (($day==$dia_actual) and ($month==$mes_actual) and ($year==$anio_actual)) 
	{
		$calendar .= eDiaActual; 
		$calendar .= "' ";
		$calendar .= "alt='adr'";
	} 
	else 
		{ //inicio else 1
		if (($esObligatorio==1)) 
			{
			$calendar .= 'eDiaObligatorio';
			} 
			else  //inicio else 2
				{ 
			if (($esSuspension==1)) 
				{
				$calendar .= 'eDiaSuspension';
				} 
					else  //inicio else 2a
						{ 
					if (($esCuenta==1)) 
						{
						$calendar .= 'eDiaCuenta';
						} 
						else  //inicio else 2b
							{ 
						if (($esSabadoLaborable==1)) 
							{
							$calendar .= 'eDiaSabadoL';
							} 
							else  //inicio else 2c
								{ 
								if (($esVacaciones==1)) 
									{
									$calendar .= 'eDiaVacaciones';
									$calendar .= "' ";
									$calendar .= "class='Estilo1n' style='border-color:#FFFF00; ";
									
									} 
								else  //inicio else 2d
									{ 
									if (($esMedio==1)) 
										{
										$calendar .= 'eDiaMedio';
										} 
										else  //inicio else 2e
											{ 
											if (($weekday == 0) or ($weekday == 6)) 
												{ 
												$calendar .= 'eDiaFinSemana';
												} 
												else  //inicio else 3
												{
												$calendar .= 'eDiaLaboral'; 
												}  //fin else 3
										}  //fin else 2e
									}  //fin else 2d
								}  //fin else 2c
							}  //fin else 2b
						}  //fin else 2a
				};   //fin else 2
		};  //fin else 1


$calendar .= "'><a class='"; 

/* Asignar el estilo según el tipo de dia*/
if (($day==$dia_actual) and ($month==$mes_actual) and ($year==$anio_actual)) {
$calendar .= 'eDiaActual'; 
} else {
	if ($esObligatorio==1){
	$calendar .= 'eDiaObligatorio'; 
	} 
	else 
	{
		if ($esVacaciones==1){
		$calendar .= 'eDiaVacaciones'; 
		} 
		else 
		{
			if ($esCuenta==1){
			$calendar .= 'eDiaCuenta'; 
			} 
			else 
			{
				if ($esSabadoLaborable==1){
				$calendar .= 'eDiaSabadoL'; 
				} 
				else 
				{
					if ($esSuspension==1){
					$calendar .= 'eDiaSuspension'; 
					} 
					else 
					{
						if ($esMedio==1){
						$calendar .= 'eDiaMedio'; 
						} 
						else 
						{
							if (($weekday == 0) or ($weekday == 6)) //color sábado y domingo
							 {
							$calendar .= 'eDiaFinSemana'; 
							}else{
							$calendar .= 'eDiaLaboral';
							} 
						}; 
					}; 
				}; 
			}; 
		}; 
	}; 
}; 

/*variables para comparar la fecha seleccionada con la actual*/		
$fechaComp = date("Ymd",mktime (0,0,0, $month, $day, $year));
$fechaHoy = strftime("%Y%m%d");

// if(!($fechaComp<$fechaHoy))
// {
// 	$fechalink = date("d",mktime (0,0,0,0, $day,0)); 
// 	$link = (basename($_SERVER["PHP_SELF"]))."?anoactual=$year&mesactual=$month&fecha=".$fechalink; 
// 	$link = 'formato.php'."?anioactual=$year&mesactual=$month&dia=".$fechalink;
// 	$calendar .= "' href=javascript:Abrir_ventana('$link')>"; 
// }
// else
// {
$calendar .= ("'>") ;
// }
$calendar .= ($day). 
("</a>"). 
("</td>\n"); 
$day++; 
$weekday++; 
} 

if($weekday != 7){ 
$calendar .= '<td class="eDiaLaboral" colspan="' . (7 - $weekday) . '"></td>'; 
} 
$calendar .= "</tr>\n"; 
$calendar .= "</table>\n"; 
return $calendar; 
}

extract($_POST);
extract($_GET);
$mesactual=date("n",time());
$anoactual=date("Y",time());
 
$dia_actual = date("d",time());
$mes_actual = date("n",mktime (0,0,0, $mesactual, $dia_actual, $anoactual)); 
$anio_actual = date("Y",mktime (0,0,0, $mesactual, $dia_actual, $anoactual)); 
?>