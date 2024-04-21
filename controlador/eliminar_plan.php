<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/plan.php";

$datos=New plan();
$resultado=$datos->borrarPlan();
if($resultado)
header("location:../vista/inicio.php?pag=planes&msj=11");
else
header("location:../vista/inicio.php?pag=planes&msj=12");
