<?php
include("sesion.php");
$sql = "DELETE FROM usuarios WHERE usr_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_INT);   
$stmt->execute();
header("Location:usuarios.php?msg=2");