<?php

// O USUÁRIO IRÁ ALTERAR A SUA SENHA


session_start();
include("conexao.php");


// Verifica se o usuário está logado
if(!isset($_SESSION['id'])) {
    echo "<p>Você precisa estar logado.</p>";
    exit;
};

$id= $_SESSION['id'];


// Busca o usuário no banco
$sql = "SELECT id, nome, ulogin, senha FROM usuarios WHERE ulogin = ? OR email = ? LIMIT 1";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $login, $login);
$stmt->execute();
$result = $stmt->get_result();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nsenha'];
    $confirma_senha = $_POST['cnsenha'];

    if ($nova_senha !== $confirma_senha) {
        echo "As senhas não coincidem!";
    } else {
        $hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha='$hash' WHERE id='$id'";
        if (mysqli_query($conexao, $sql)) {
            echo "<script>
            alert('Senha alterada com sucesso!');
            window.location.href='main-page.html';
            </script>";
        } else {
            echo "Erro ao alterar senha: " . mysqli_error($conexao);
        }
    }
    exit;
}

$stmt->close();
$conexao->close();
?>