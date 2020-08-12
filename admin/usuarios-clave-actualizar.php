<?php
include("sesion.php");


if($_POST['claveNueva']!=$_POST['claveNueva2']){
	header("Location:clave.php?error=1");
	exit();
}

$sql = "UPDATE usuarios SET usr_clave = SHA1(:claveNueva) WHERE usr_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':claveNueva', $_POST['claveNueva'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_POST["idR"], PDO::PARAM_STR);
                                     
$stmt->execute();

header("Location:usuarios-editar-clave.php?msg=1&idR=".$_POST["idR"]);