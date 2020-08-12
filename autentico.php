<?php
include("conexion.php");

$rst_usr = $pdo->prepare("SELECT * FROM usuarios WHERE usr_email='".trim($_POST["user"])."' AND usr_clave=SHA1('".$_POST["pass"]."')");
$rst_usr->execute();
$fila = $rst_usr->fetch();
$num = $rst_usr->rowCount();

if($num>0)
{
	//VERIFICAR SI EL USUARIO ESTÁ ACTIVO
	//if($fila['usr_estado']=='0'){header("Location:index.php?error=1");exit();}
	//INICIO SESION
	session_start();
	$_SESSION["id"] = $fila[0];
	$url = 'admin/index.php';
	
	header("Location:".$url);	
	exit();
}else{
	header("Location:index.php?error=1");
	exit();
}