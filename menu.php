<link href="css/menu.css" rel="stylesheet" type="text/css" />
<script src="js/prefixfree.min.js"></script>
<nav id="tableMenu">
	<table>
	  <tr>
	    <td <?php if ($m==1) {echo "class='activo'>";} else { echo "><a href='calendar.php' >"; }?>Calendario</a></td>
	    <td <?php if ($m==3) {echo "class='activo'>";} else { echo "><a href='mail.php' >"; }?>E-mail</a></td>
	    <td <?php if ($m==2) {echo "class='activo'>";} else { echo "><a href='directorio.php' >"; }?>Extensiones</a></td>
	    <td <?php if ($m==5) {echo "class='activo'>";} else { echo "><a href='nextel.php' >"; }?>Nextel</a></td>
	    <td <?php if ($m==6) {echo "class='activo'>";} else { echo "><a href='cortos.php' >"; }?>N&uacute;meros Cortos</a></td>
	    <td <?php if ($m==4) {echo "class='activo'>";} else { echo "><a href='cumple.php' >"; }?>Cumplea&ntilde;os</a></td>
	    <td <?php if ($m==7) {echo "class='activo'>";} else { echo "><a href='salas.php' >"; }?>Apartar sala</a></td>
	  </tr>
	</table>
</nav>
