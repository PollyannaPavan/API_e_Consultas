<?php
declare(strict_types=1);

$host = "192.168.10.101";
$usuario = "postgres";
$senha = "P0lly4nn4@1008";
$banco = "almoxarifado";

$pdo = new PDO(
    "pgsql:host=$host;port=5432;dbname=$banco",
    $usuario,
    $senha
);

?>