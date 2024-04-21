<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/profesional.php";

$datos=New profesional();
$datos->datosProfesionalM(
	 strtoupper($_POST['Cod_Prf'])
	,strtoupper($_POST['Nom_Prf'])
	,strtoupper($_POST['Ape_Prf'])
	,strtoupper($_POST['Prf_Cod'])
	,$_POST['Estado']
);
$resultado=$datos->actualizarProfesional();
if($resultado)
header("location:../vista/inicio.php?pag=profesionales&msj=7");
else
header("location:../vista/inicio.php?pag=profesionales&msj=8");
