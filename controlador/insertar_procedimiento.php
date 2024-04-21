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
$resultado=$datos->crearProcedimiento();
if($resultado)
header("location:../vista/inicio.php?pag=procedimientos&msj=1");
else
header("location:../vista/inicio.php?pag=procedimientos&msj=2");
