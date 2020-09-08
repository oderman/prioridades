<?php

include("../conexion.php");



$arreglo = array();





$filtro = '';

if(isset($_GET["year"]) and is_numeric($_GET["year"])){$filtro .=" AND YEAR(rev_publicacion)='".$_GET["year"]."'";}

if(isset($_GET["search"]) and $_GET["search"]!=""){$filtro .=" AND (rev_keywords LIKE '%".$_GET["search"]."%' OR rev_titulo LIKE '%".$_GET["search"]."%' OR rev_descripcion LIKE '%".$_GET["search"]."%')";}


$pdo->exec("SET lc_time_names = 'es_ES'");

$consulta = $pdo->prepare("SELECT rev_id AS id, rev_titulo AS title, rev_descripcion AS description, CONCAT('https://revistaprioridades.com/admin/img/portadas/', rev_portada) AS image, MONTH(rev_publicacion) AS month, MONTHNAME(rev_publicacion) AS monthname, YEAR(rev_publicacion) AS year FROM revistas

WHERE YEAR(rev_publicacion)='".date("Y")."' $filtro

ORDER BY rev_publicacion DESC

");

$consulta->execute();

$res = $consulta->fetchAll(PDO::FETCH_ASSOC);



foreach($res as $datos){

	$arreglo['MagazineList'][] = $datos;

}



echo json_encode($arreglo);