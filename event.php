	<!-- Grid CSS File (only needed for demo page) -->
	<!-- <link rel="stylesheet" href="css/paragridma.css"> -->
	<!-- Core CSS File. The CSS code needed to make eventCalendar works -->
	<link rel="stylesheet" href="css/eventCalendar.css">
	<!-- Theme CSS file: it makes eventCalendar nicer -->
	<link rel="stylesheet" href="css/eventCalendar_theme_responsive.css">
	<!--<script src="js/jquery.js" type="text/javascript"></script>-->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	
	<div class="container">
		<div class="row">
				<div id="eventCalendarLocale"></div>
				<script>
					$(document).ready(function() {//configuración de calendario
						$("#eventCalendarLocale").eventCalendar({
							eventsjson: 'json/events.json.php',
							monthNames: [ "enero", "febrero", "marzo", "abril", "mayo", "junio",
								"julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre" ],
							dayNames: [ 'Domingo','Lunes','Martes','Miércoles',
								'Jueves','Viernes','Sábado' ],
							dayNamesShort: [ 'Dom','Lun','Mar','Mie', 'Jue','Vie','Sab' ],
							txt_noEvents: "No hay salas apartadas para este día",
							txt_SpecificEvents_prev: "eventos ",
							txt_SpecificEvents_after: "",
							txt_next: "siguiente",
							txt_prev: "anterior",
							txt_NextEvents: "Próximos eventos:",
							txt_GoToEventUrl: "Ver formato en pdf",
							eventsLimit: 5
						});
						$('#fecha').Zebra_DatePicker({//configuración de datepicker
				            direction: [true, 31],    // las fechas seleccionables comienzan a partir de la fecha actual 1, y terminan 365 días despues
				  			disabled_dates: ['* * * 0,7']   // 0 bloquea domingos, 6 sábados. la semana va de 0 a 6
				        });
					});
				</script> 
		</div>
	</div>

<script src="js/jquery.eventCalendar.js" type="text/javascript"></script>
