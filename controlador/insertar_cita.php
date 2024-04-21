<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/citas.php";

$datos=New citas();
$datos->datosCita(
	 $_POST['Paciente']
	,$_POST['Fec_cita']
	,$_POST['Hora_Cita']
	,$_POST['Plan']
	,$_POST['Plan_Proc']
	,$_POST['Profesional']
);
$resultado=$datos->crearCita();
if($resultado)
header("location:../vista/inicio.php?pag=citas1&msj=1");
else
header("location:../vista/inicio.php?pag=citas1&msj=2");
