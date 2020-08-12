<?php
include("sesion.php");

$sql = "INSERT INTO usuarios(usr_email, usr_clave, usr_apellidos, usr_nombres, usr_tipo, usr_suscripcion)VALUES (:email, SHA1(:clave), :apellidos, :nombres, 2, 0)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->bindParam(':clave', $_POST['clave'], PDO::PARAM_STR);
$stmt->bindParam(':apellidos', $_POST['apellidos'], PDO::PARAM_STR);
$stmt->bindParam(':nombres', $_POST['nombres'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:usuarios.php?id=".$newId);