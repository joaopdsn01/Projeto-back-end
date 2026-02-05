<?php
//session_start(); // INUTILIZADO
include("conexao.php"); // sua conexão com o banco

// Recebe os dados do formulário
$login = $_POST['ulogin'];
$senha = $_POST['senha'];

// Busca o usuário no banco
$sql = "SELECT id, nome, ulogin, senha FROM usuarios WHERE ulogin = ? OR email = ? LIMIT 1";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $login, $login);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // Verifica a senha digitada com a hash do banco
    if (password_verify($senha, $usuario['senha'])) {

        //Verifica se é master
        if ($login == 'admin') {
            header("Location: painelmaster.html");
            exit;
        } else { // Login correto → cria sessão
            session_start(); //A SESSÃO AGORA INICIA AQUI
            $_SESSION['temp_user_id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['ulogin'] = $usuario['ulogin'];

            //  Registra o log
            $stmt_log = $conexao->prepare("INSERT INTO log_usuarios (id, action) VALUES (?, 'login')");
            $stmt_log->bind_param("i", $usuario['id']);
            $stmt_log->execute();

            // Redireciona para a área logada
            header("Location: verificar2fa.php");
            exit;
        }
    } else {
        // Senha errada
        echo "<script>
                alert('Senha incorreta!');
                window.location.href='index.html';
              </script>";
    }
} else {
    // Usuário não encontrado
    echo "<script>
            alert('Usuário não encontrado!');
            window.location.href='index.html';
          </script>";
}

$stmt->close();
$conexao->close();
