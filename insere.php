<?php

require_once "conect.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO filme 
        (nome, duracao, data_lancamento, descricao, categoria)
        VALUES 
        ('$usuario->nome', 
        '$usuario->duracao', 
        '$usuario->data_lancamento', 
		'$usuario->descricao',
		'$usuario->categoria')";

executarSQL($conexao, $sql);

$usuario->id_filme = mysqli_insert_id($conexao);
echo json_encode($usuario);
