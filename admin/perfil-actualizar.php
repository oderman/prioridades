<?php
include("sesion.php");

$sql = "UPDATE usuarios SET usr_apellidos = :apellidos, usr_nombres = :nombres, usr_email = :email WHERE usr_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':apellidos', $_POST['apellidos'], PDO::PARAM_STR);
$stmt->bindParam(':nombres', $_POST['nombres'], PDO::PARAM_STR);
$stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_SESSION["id"], PDO::PARAM_STR);
                                     
$stmt->execute();

header("Location:perfil.php?msg=1");