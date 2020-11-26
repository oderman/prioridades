<?php
include("sesion.php");

$sql = "UPDATE usuarios SET usr_apellidos = :apellidos, usr_nombres = :nombres, usr_email = :email, usr_tipo = :tipo, usr_suscripcion = :suscripcion WHERE usr_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':apellidos', $_POST['apellidos'], PDO::PARAM_STR);
$stmt->bindParam(':nombres', $_POST['nombres'], PDO::PARAM_STR);
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(':tipo', $_POST['tipo'], PDO::PARAM_INT);
$stmt->bindParam(':suscripcion', $_POST['suscripcion'], PDO::PARAM_INT);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_STR);
                                     
$stmt->execute();

header("Location:usuarios.php?idR=".$_POST['idR']."&msg=3");