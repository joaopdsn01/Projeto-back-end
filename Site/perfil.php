<?php
session_start();
include("conexao.php");

// Verifica se o usuário está logado
if(!isset($_SESSION['id'])) {
    echo "<p>Você precisa estar logado.</p>";
    exit;
}

$id = $_SESSION['id'];

$sql = "SELECT nome, endereco FROM usuarios WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$stmt->close();
$conexao->close();

// Monta o HTML que será retornado via AJAX
echo "<p><strong>Nome:</strong> " . htmlspecialchars($usuario['nome']) . "</p>";
echo "<p><strong>Endereço:</strong> " . htmlspecialchars($usuario['endereco']) . "</p>";
