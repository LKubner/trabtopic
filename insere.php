<?php

require_once "conect.php";
$conexao = conectar();

$filme = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO filme 
        (nome, duracao, data_lancamento, descricao, categoria)
        VALUES 
        ('$filme->nome', 
        '$filme->duracao', 
        '$filme->data_lancamento', 
		'$filme->descricao',
		'$filme->categoria')";

executarSQL($conexao, $sql);

$filme->id_filme = mysqli_insert_id($conexao);
echo json_encode($filme);
