<?php
$server = 'localhost';
$user = 'revprioridades';
$pass = '8ZTZQlnVKhoP';
$dbName = 'revprioridades_revistaprioridades';

try{
	$pdo = new PDO('mysql:host='.$server.';dbname='.$dbName, $user, $pass);
    $pdo->exec("SET CHARACTER SET utf-8");
}catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	die();
}