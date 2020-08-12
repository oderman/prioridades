<?php
include("../conexion.php");

$consultaUsr = $pdo->prepare("SELECT * FROM usuarios
WHERE usr_id='".$_GET["idUsuario"]."'
");
$consultaUsr->execute();
$num = $consultaUsr->rowCount();
$usr = $consultaUsr->fetch();


if($num == 0){
	$exception['exception']['cod'] = 1;
	$exception['exception']['mesage'] = 'El usuario no existe.';
	echo json_encode($exception);
	exit();
}

if($usr['usr_suscripcion'] == 1){

	$arreglo = array();

	$consulta = $pdo->prepare("SELECT rev_id AS id, CONCAT('https://revistaprioridades.com/admin/revistas/', rev_archivo) AS pdf FROM revistas
	WHERE rev_id='".$_GET["idRevista"]."'
	");
	$consulta->execute();
	$res = $consulta->fetch(PDO::FETCH_ASSOC);

	$arreglo['Magazine'] = $res;

	echo json_encode($arreglo);
}else{
	$exception['exception']['cod'] = 2;
	$exception['exception']['mesage'] = 'El usuario no tiene suscripción activa.';
	echo json_encode($exception);
	exit();
}