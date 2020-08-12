<?php
include("sesion.php");

$rst_usr = $pdo->prepare("SELECT * FROM usuarios WHERE usr_id='".$_SESSION["id"]."' AND usr_clave=SHA1('".$_POST["claveActual"]."')");
$rst_usr->execute();
$num = $rst_usr->rowCount();
if($num == 0){
	header("Location:clave.php?error=1");
	exit();
}

if($_POST['claveNueva']!=$_POST['claveNueva2']){
	header("Location:clave.php?error=2");
	exit();
}

$sql = "UPDATE usuarios SET usr_clave = SHA1(:claveNueva) WHERE usr_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':claveNueva', $_POST['claveNueva'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_SESSION["id"], PDO::PARAM_STR);
                                     
$stmt->execute();

header("Location:clave.php?msg=1");