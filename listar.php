<?php
include_once "conect.php";
$conexao = conectar();

// Consulta no banco de dados para obter os filmes
$sql = "SELECT * FROM filme";
$resultado = executarSQL($conexao, $sql);

// Inicializa um array para armazenar os filmes
$filmes = [];

while ($linha = mysqli_fetch_assoc($resultado)) {
    $filmes[] = $linha; // Adiciona cada filme ao array
}

// Retorna os filmes no formato JSON
echo json_encode($filmes);
?>