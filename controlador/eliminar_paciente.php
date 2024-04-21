<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/paciente.php";

$datos=New paciente();
$resultado=$datos->borrarPaciente();
if($resultado)
header("location:../vista/inicio.php?pag=pacientes&msj=1");
else
header("location:../vista/inicio.php?pag=pacientes&msj=2");
