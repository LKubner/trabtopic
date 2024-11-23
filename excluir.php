
<?php
include "conect.php";
$id = $_GET['id_filme'];
$conexao = conectar();
$sql = "DELETE FROM filme WHERE id_filme=$id";
$retorno = executarSQL($conexao, $sql);
echo json_encode($retorno);

?>
