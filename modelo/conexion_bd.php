<?php
function conectarse()
{
	$conexion = new mysqli("localhost","root","","con_sentido");
	if ($conexion-> connect_errno){
		echo "Nuestro sitio experimenta fallos....";
		exit();
	} else {
		return $conexion;
	}
}
?>