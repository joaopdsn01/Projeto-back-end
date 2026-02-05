<?php
session_start();

// Se não estiver logado, manda de volta
if(!isset($_SESSION['id'])) {
    header("Location: index.html");
    exit;
}

echo "<h1>Bem-vindo, " . $_SESSION['nome'] . "!</h1>";
echo "<a href='logout.php'>Sair</a>";
?>