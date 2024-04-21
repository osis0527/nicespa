<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/plan.php";

$datos=New plan();
$datos->datosPlan(
	strtoupper($_POST['DescripcionP'])
	,$_POST['TipoP']
	,$_POST['Sesion']
);
$resultado=$datos->crearPlan();
if($resultado)
header("location:../vista/inicio.php?pag=planes&msj=3");
else
header("location:../vista/inicio.php?pag=planes&msj=4");