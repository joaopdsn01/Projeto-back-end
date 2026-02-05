<?php
include ('conexao.php');
header('Content-Type: application/json; charset=utf-8');

$sql = "SELECT * FROM log_usuarios ORDER BY logid ASC";
$result = $conexao->query($sql);

$dados = [];
while ($row = $result-> fetch_assoc()) {
    $dados[] = $row;
}

echo json_encode($dados);
?>