<?php
$id_filme = $_GET['id_filme'];

require_once "conect.php";
$conexao = conectar();

$sql = "SELECT id_filme, nome,duracao,data_lancamento,descricao,categoria FROM filme
        WHERE id_filme = $id_filme";
$resultado = executarSQL($conexao, $sql);
$usuario = mysqli_fetch_assoc($resultado);
echo json_encode($usuario);
?>