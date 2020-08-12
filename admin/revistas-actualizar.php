<?php
include("sesion.php");
	
if($_FILES['portada']['name']!=""){
	$destino = "img/portadas";
	$extension = end(explode(".", $_FILES['portada']['name']));
	$portada = uniqid('port_').".".$extension;
	@unlink($destino."/".$portada);
	move_uploaded_file($_FILES['portada']['tmp_name'], $destino ."/".$portada);
	
	$sql = "UPDATE revistas SET rev_portada = '".$portada."' WHERE rev_id = :idR";                                   
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_STR);                                  
	$stmt->execute();
}

if($_FILES['archivo']['name']!=""){
	$destino = "revistas";
	$extension = end(explode(".", $_FILES['archivo']['name']));
	$archivo = uniqid('rev_').".".$extension;
	@unlink($destino."/".$archivo);
	move_uploaded_file($_FILES['archivo']['tmp_name'], $destino ."/".$archivo);
	
	$sql = "UPDATE revistas SET rev_archivo = '".$archivo."' WHERE rev_id = :idR";                                   
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_STR);                                  
	$stmt->execute();
}

$sql = "UPDATE revistas SET rev_titulo = :titulo, rev_descripcion = :descripcion, rev_publicacion = :publicacion, rev_keywords = :keywords WHERE rev_id = :idR";                                   
$stmt = $pdo->prepare($sql);
                                              
$stmt->bindParam(':titulo', $_POST['titulo'], PDO::PARAM_STR);
$stmt->bindParam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
$stmt->bindParam(':publicacion', $_POST['fecha'], PDO::PARAM_STR);
$stmt->bindParam(':keywords', $_POST['keywords'], PDO::PARAM_STR);

$stmt->bindParam(':idR', $_POST['idR'], PDO::PARAM_STR);
                                     
$stmt->execute();