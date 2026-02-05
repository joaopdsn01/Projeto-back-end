<?php
session_start();
include("conexao.php");

if(!isset($_SESSION['temp_user_id'])) {
    header("Location: index.html");
    exit;
}

$id = $_SESSION['temp_user_id'];
$sql = "SELECT pergunta FROM usuarios WHERE id = '$id'";
$result = mysqli_query($conexao, $sql);
$usuario = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificação de segurança</title>
    
</head>
<body style="background-color: #202020; color: white;">
    <div style='justify-content:center;align-content:center;margin-top:18%;margin-left:40%;'>
        <h2>Verificação de segundo fator</h2>
        <form action="autentica2fa.php" method="post">
            <p><strong><?php echo $usuario['pergunta']; ?></strong></p>
            <input type="text" name="resposta" placeholder="Digite sua resposta" required>
            <button type="submit">Verificar</button>
        </form>
    </div>
</body>
</html>