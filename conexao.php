<?php
declare(strict_types=1);

$host = "IP";
$usuario = "USUARIO";
$senha = "SENHA";
$banco = "BANCO";

$pdo = new PDO(
    "pgsql:host=$host;port=5432;dbname=$banco",
    $usuario,
    $senha
);

?>