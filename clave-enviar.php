<?php
include("conexion.php");

$consulta = $pdo->prepare("SELECT * FROM usuarios WHERE usr_email = :email");
$consulta->bindParam(':email', $_POST["email"], PDO::PARAM_STR);
$consulta->execute();
$consulta->execute();
$numRev = $consulta->rowCount();
$res = $consulta->fetch(PDO::FETCH_ASSOC);

if ($numRev == 0) {
    header("Location:recordar-clave.php?error=1");
    exit();
}

header("Location:clave-nueva.php?msg=1&usrid=".$res['usr_id']."user=".md5($res['usr_id']));
exit();
