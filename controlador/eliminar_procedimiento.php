<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/procedimiento.php";

$datos=New procedimiento();
$resultado=$datos->borrarProcedimiento();
if($resultado)
header("location:../vista/inicio.php?pag=procedimientos&msj=5");
else
header("location:../vista/inicio.php?pag=procedimientos&msj=6");
