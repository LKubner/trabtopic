<?php

require_once "conect.php";
$conexao = conectar();

$usuario = json_decode(file_get_contents("php://input"));
$sql = "UPDATE filme SET
        nome='$usuario->nome', 
        duracao='$usuario->duracao', 
        data_lancamento='$usuario->data_lancamento',
        descricao='$usuario->descricao', 
        categoria='$usuario->categoria'
        WHERE id_filme=$usuario->id_filme";

executarSQL($conexao, $sql);

echo json_encode($usuario);
