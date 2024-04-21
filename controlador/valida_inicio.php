<?php
session_start();
extract ($_POST);
require "../modelo/conexion_bd.php";

$usuario = $_POST['usuario'];
$contrasena = md5($_POST['contrasena']);


$conexion=conectarse();

$query=$conexion->query("SELECT * FROM usuarios WHERE codigo='$usuario'");

if ($query->num_rows == 1){
	$datos=$query->fetch_object() or die ("Error");
	$_SESSION['nombre']= $datos-> nombre;
	$_SESSION['apellido']= $datos-> apellido;
	$_SESSION['tipo']= $datos-> tipo;
	header("location:../vista/inicio.php?pag=contenido");
} else {
	header("location:../vista/indexsis.php?x=2");  //x=2, quiere decir que el usuario no esta registrado
}
?>
