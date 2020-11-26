<?php
include("sesion.php");
$sql = "DELETE FROM revistas WHERE rev_id = :idR";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':idR', $_GET['idR'], PDO::PARAM_INT);   
$stmt->execute();
header("Location:revistas.php?msg=2");