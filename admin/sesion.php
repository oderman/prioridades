<?php
session_start();
if($_SESSION["id"]=="")
	header("Location:../salir.php");
else
{
	include("../conexion.php");
	
	//USUARIO ACTUAL
	$consultaUsuarioActual = $pdo->prepare("SELECT * FROM usuarios WHERE usr_id='".$_SESSION["id"]."'");
	$consultaUsuarioActual->execute();
	
	$numUsuarioActual = $consultaUsuarioActual->rowCount();
	$datosUsuarioActual = $consultaUsuarioActual->fetch(); 
	
	//Arrays
	$tiposUsuarios = array("Desc.", "Administrador", "Usuario");
	$estadosSuscripcion = array("Inactiva", "Activa");
}