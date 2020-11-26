<?php
include("sesion.php");

$sql = "UPDATE usuarios SET usr_suscripcion = :estado WHERE usr_id = :idR";                                   
$stmt = $pdo->prepare($sql);

$estado = 1;
if($_GET["estado"]==1) $estado=0;

$stmt->bindParam(':estado', $estado, PDO::PARAM_INT);

$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_STR);
                                     
$stmt->execute();

header("Location:usuarios.php?idR=".$_GET['idR']."&msg=4");