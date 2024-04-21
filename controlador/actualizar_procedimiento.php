<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/procedimiento.php";

$datos=New procedimiento();
$datos->datosProcedimiento(
	 $_POST['Codigo']
	,strtoupper($_POST['NombrePro'])
);
$resultado=$datos->actualizarProcedimiento();
if($resultado)
header("location:../vista/inicio.php?pag=procedimientos&msj=3");
else
header("location:../vista/inicio.php?pag=procedimientos&msj=4");
