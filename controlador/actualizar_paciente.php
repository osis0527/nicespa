<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/paciente.php";

$datos=New paciente();
$datos->datosPaciente(
	 $_POST['TipDocumento']
	,$_POST['Documento']
	,strtoupper($_POST['Nombres'])
	,strtoupper($_POST['Apellidos'])
	,$_POST['FechaNac']
	,$_POST['Sexo']
	,$_POST['EstaCivil']
	,strtoupper($_POST['Direccion'])
	,strtoupper($_POST['Barrio'])
	,$_POST['Tele']
	,$_POST['Celu']
	,strtoupper($_POST['Mail'])
);
$resultado=$datos->actualizarPaciente();
if($resultado)
header("location:../vista/inicio.php?pag=pacientes2&id=".$_REQUEST[Id_Pac]."&msj=1");
else
header("location:../vista/inicio.php?pag=pacientes2&id=".$_REQUEST[Id_Pac]."&msj=2");
