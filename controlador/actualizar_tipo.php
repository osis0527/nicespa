<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/tipo.php";

$datos=New tipo();
$datos->datosTipo(
	strtoupper($_POST['DescripcionT'])
);
$resultado=$datos->actualizarTipo();
if($resultado)
header("location:../vista/inicio.php?pag=planes&msj=5");
else
header("location:../vista/inicio.php?pag=planes&msj=6");
