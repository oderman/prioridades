<?php
$server = 'localhost';
$user = 'root';
$pass = '1234';
$dbName = 'prioridades';

try{
	$pdo = new PDO('mysql:host='.$server.';dbname='.$dbName, $user, $pass);
    $pdo->exec("SET CHARACTER SET utf-8");
}catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	die();
}