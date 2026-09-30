<?php
declare(strict_types=1);

header("Content-Type: application/json");

require "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];

// Verifica se o método é POST
if ($metodo == "POST"){
    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);
    $sql = "INSERT INTO pecas (nome, categoria, fornecedor, quantidade, preco_unitario) VALUES (?, ?, ?, ?, ?)";
    $comando = $pdo->prepare($sql);
    $comando->execute([
        $dados["nome"],
        $dados["categoria"],
        $dados["fornecedor"],
        $dados["quantidade"],
        $dados["preco_unitario"]
    ]);

    echo json_encode(["Mensagem" => "Nova peça cadastrada!"]);

};

// Verifica se o método é GET
if ($metodo == "GET"){
    $sql = "SELECT * FROM pecas ORDER BY id";
    $comando = $pdo->query($sql);
    $pecas = $comando->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($pecas);
};

// Verifica se o método é PUT
if ($metodo == "PUT"){
    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);
    $sql = "UPDATE pecas SET nome=?, categoria=?, fornecedor=?, quantidade=?, preco_unitario=? WHERE id=?";
    $comando = $pdo->prepare($sql);
    $comando->execute([
        $dados["nome"],
        $dados["categoria"],
        $dados["fornecedor"],
        $dados["quantidade"],
        $dados["preco_unitario"],
        $dados["id"]
    ]);

    echo json_encode(["Mensagem" => "Peça atualizada com sucesso!"]);

};

// Verifica se o método é DELETE
if ($metodo == "DELETE"){
    $json = file_get_contents("php://input");
    $dados = json_decode($json, true);
    $sql = "DELETE FROM pecas WHERE id=?";
    $comando = $pdo->prepare($sql);
    $comando->execute([
        $dados["id"]
    ]);

    echo json_encode(["Mensagem" => "Peça excluída com sucesso!"]);

};
?>