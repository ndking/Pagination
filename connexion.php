<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=test;host=127.0.0.1';
$user = 'root';
$password = '';

$pdo = new PDO($dsn, $user, $password);

?>