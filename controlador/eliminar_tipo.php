<?php
session_start();
extract($_POST);
require"../modelo/conexion_bd.php";
require"../modelo/tipo.php";

$datos=New tipo();
$resultado=$datos->borrarTipo();
if($resultado)
header("location:../vista/inicio.php?pag=planes&msj=7");
else
header("location:../vista/inicio.php?pag=planes&msj=8");
