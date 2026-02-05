<?php

// O MASTER IRÁ ALTERAR INFORMAÇÕES DO USUÁRIO

include("conexao.php");

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Usuário não especificado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nova_senha = $_POST['nova_senha'];
    $confirma_senha = $_POST['confirma_senha'];

    if ($nova_senha !== $confirma_senha) {
        echo "As senhas não coincidem!";
    } else {
        $hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET senha='$hash' WHERE id='$id'";
        if (mysqli_query($conexao, $sql)) {
            echo "Senha alterada com sucesso!<br>";
            echo "<a href='User_Consult.html'>Voltar</a>";
        } else {
            echo "Erro ao alterar senha: " . mysqli_error($conexao);
        }
    }
    exit;
}
//NOVA SENHA DE JORGE 1234jorge



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Senha</title>
</head>
<body style="background-color:#202020; color:white;">
    <h2>Alterar senha do usuário</h2>
    <form action="alterar_senha.php?id=<?php echo $id; ?>" method="post">
        <label>Nova senha:</label><br>
        <input type="password" name="nova_senha" required><br><br>

        <label>Confirmar nova senha:</label><br>
        <input type="password" name="confirma_senha" required><br><br>

        <button type="submit">Alterar</button>
        <a href="User_Consult.html" style="color: #f74000;">Cancelar</a>
    </form>
</body>
</html>
