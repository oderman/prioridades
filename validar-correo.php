<?php
if(!isset($_GET["id"]) or !is_numeric($_GET["id"])){
    echo "Acceso incorrecto";
    exit();
}
if(md5($_GET["id"]) != $_GET["token"]){
    echo "Validación fallida.";
    exit();
}
include("conexion.php");
$sql = "UPDATE usuarios SET usr_suscripcion = 1 WHERE usr_id = :idR";                                   
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':idR', $_GET["id"], PDO::PARAM_STR);
                                     
$stmt->execute();

echo "Su correo fue validado correctamente. Cierre esta página e ingrese por la Aplicación.";