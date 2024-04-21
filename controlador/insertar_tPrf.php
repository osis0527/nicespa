<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/tipo_prf.php";

$datos=New tipoPrf();
$datos->datosTipoPrf(
	strtoupper($_POST['TipoProfesional'])
);
$resultado=$datos->crearTipoPrf();
if($resultado)
header("location:../vista/inicio.php?pag=profesionales&msj=1");
else
header("location:../vista/inicio.php?pag=profesionales&msj=2");
