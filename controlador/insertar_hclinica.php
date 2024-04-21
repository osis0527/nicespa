<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/hclinica.php";
require"../modelo/citas.php";

$datos=New clinica();
$datos->datosClinica(
	 strtoupper($_POST['Aten_cita'])
	,$_POST['Peso']
	,$_POST['Altura']
	,$_POST['IMC']
	,strtoupper($_POST['Ante_Per'])
	,strtoupper($_POST['Ante_Fam'])
	,strtoupper($_POST['Obse_Cita'])
);
$resultado=$datos->crearFolio();
if($resultado){
	$datos->atenderCita();
	header("location:../vista/inicio.php?pag=contenido&msj=5");
}else{
	header("location:../vista/inicio.php?pag=contenido&msj=6");
}

