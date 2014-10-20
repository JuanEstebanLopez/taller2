	<?php session_start();
$nombre=$_SESSION['nombre'];
session_destroy();
header ("Location: ../index.php?mensaje=Se ha cerrado la sesión de ".$nombre);	
	?>