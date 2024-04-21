<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/profesional.php";

$datos=New profesional();
$datos->datosProfesional(
	 strtoupper($_POST['Cod_Prf'])
	,strtoupper($_POST['Nom_Prf'])
	,strtoupper($_POST['Ape_Prf'])
	,$_POST['Prf_Cod']
);
$resultado=$datos->crearProfesional();
if($resultado)
header("location:../vista/inicio.php?pag=profesionales&msj=5");
else
header("location:../vista/inicio.php?pag=profesionales&msj=6");
