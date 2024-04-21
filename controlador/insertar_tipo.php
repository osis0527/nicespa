<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/tipo.php";

$datos=New tipo();
$datos->datosTipo(
	strtoupper($_POST['DescripcionT'])
);
$resultado=$datos->crearTipo();
if($resultado)
header("location:../vista/inicio.php?pag=planes&msj=1");
else
header("location:../vista/inicio.php?pag=planes&msj=2");
