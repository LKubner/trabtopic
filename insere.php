<?php

require_once "conect.php";
$conexao = conectar();

// Lê os dados da requisição
$filme = json_decode(file_get_contents("php://input"));

// Verifica se a decodificação foi bem-sucedida
if ($filme === null) {
    echo json_encode(["error" => "Dados inválidos ou formato JSON incorreto"]);
    exit();
}

// Prepara a consulta SQL
$sql = "INSERT INTO filme 
        (nome, duracao, data_lancamento, descricao, categoria)
        VALUES 
        ('$filme->nome', 
        '$filme->duracao', 
        '$filme->data_lancamento', 
        '$filme->descricao',
        '$filme->categoria')";

// Executa a consulta
executarSQL($conexao, $sql);

// Recupera o ID do filme inserido
$filme->id_filme = mysqli_insert_id($conexao);

// Retorna os dados do filme com o ID inserido
echo json_encode($filme);
