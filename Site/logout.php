<?php
session_start();
include("conexao.php");

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    header("Location: index.html");
    exit();
}

$id = $_SESSION['id'];

//Regristra o log
$stmt = $conexao->prepare("INSERT INTO log_usuarios (id, action) VALUES (?, 'logout')");
$stmt->bind_param("i", $id);
$stmt->execute();

// Limpa todas as variáveis de sessão
$_SESSION = [];

// Destroi a sessão completamente
session_destroy();

// Redireciona para o login
header("Location: index.html");
exit();