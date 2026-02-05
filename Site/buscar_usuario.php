<?php
include("conexao.php");

$busca = trim($_GET['busca'] ?? '');

if ($busca == '') {
    echo "Digite um nome ou login para buscar.";
    exit;
}

$sql = "SELECT id, nome, ulogin, email, celular FROM usuarios 
        WHERE nome LIKE '%$busca%' OR ulogin LIKE '%$busca%'";
$result = mysqli_query($conexao, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='color:white; width:80%; text-align:left;'>";
    echo "<tr><th>Nome</th><th>Login</th><th>Email</th><th>Celular</th>></tr>";

    while ($usuario = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($usuario['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($usuario['ulogin']) . "</td>";
        echo "<td>" . htmlspecialchars($usuario['email']) . "</td>";
        echo "<td>" . htmlspecialchars($usuario['celular']) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}
?>
