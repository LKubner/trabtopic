<?php

require_once "conexao.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO filme 
        (nome, email, senha)
        VALUES 
        ('$usuario->nome', 
        '$usuario->duracao', 
        '$usuario->data_lancamento', 
		'$usuario->descricao',
		'$usuario->categoria')";

executarSQL($conexao, $sql);

$usuario->id_usuario = mysqli_insert_id($conexao);
echo json_encode($usuario);
