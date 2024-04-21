<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/citas.php";

$datos=New citas();
$datos->datosCancela(
	$_POST['Motivo']
);
$resultado=$datos->cancelarCita();
if($resultado)
header("location:../vista/inicio.php?pag=contenido&msj=3");
else
header("location:../vista/inicio.php?pag=contenido&msj=4");
