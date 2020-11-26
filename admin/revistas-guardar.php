<?php
include("sesion.php");
	
if($_FILES['portada']['name']!=""){
	$destino = "img/portadas";
	$extension = end(explode(".", $_FILES['portada']['name']));
	$portada = uniqid('port_').".".$extension;
	@unlink($destino."/".$portada);
	move_uploaded_file($_FILES['portada']['tmp_name'], $destino ."/".$portada);
}else{
	echo "Debes escoger una foto de portada";
	exit();
}

if($_FILES['archivo']['name']!=""){
	$destino = "revistas";
	$extension = end(explode(".", $_FILES['archivo']['name']));
	$archivo = uniqid('rev_').".".$extension;
	@unlink($destino."/".$archivo);
	move_uploaded_file($_FILES['archivo']['tmp_name'], $destino ."/".$archivo);
}else{
	echo "Debes escoger una archivo para la revista (PDF).";
	exit();
}

if(trim($_POST['titulo']) == ""){
	echo "El campo titulo no puede estar en blanco.";
	exit();
}

$sql = "INSERT INTO revistas(rev_titulo, rev_descripcion, rev_portada, rev_publicacion, rev_keywords, rev_archivo, rev_disponible)VALUES (:titulo, :descripcion, '".$portada."', :publicacion, :keywords, '".$archivo."', 1)";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$stmt->bindParam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$stmt->bindParam(':publicacion', $_POST['fecha'], PDO::PARAM_STR);
$stmt->bindParam(':keywords', $_POST['keywords'], PDO::PARAM_STR);
                                     
$stmt->execute();
$newId = $pdo->lastInsertId();

header("Location:revistas.php?id=".$newId);