<?php
session_start();
include("conexao.php");

if(!isset($_SESSION['temp_user_id'])) {
    header("Location: index.html");
    exit;
}

$id = $_SESSION['temp_user_id'];
$fa2r = trim($_POST['resposta']);

$sql = "SELECT resposta FROM usuarios WHERE id = '$id'";
$result = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($result);

if (password_verify($fa2r, $usuario['resposta'])) {
    //Autenticação completa!
    $_SESSION['id'] = $id;
    unset($_SESSION['temp_user_id']);
    header("Location: main-page.html");
    exit;
} else {
    echo "Reposta incorreta. Tente novamente.";
}
?>