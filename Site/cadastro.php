<?php
    include("conexao.php");

    //Recebe o formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $nascimento = $_POST['nascimento'];
    $sexo = $_POST['sexo'];
    $mae = $_POST['mae'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $login = $_POST['ulogin'];
    $senha = $_POST['senha'];
    $hash = password_hash($senha, PASSWORD_BCRYPT);//transforma a senha em um hash
    $senha_conf = $_POST['senha_conf'];
    $fa2p = $_POST['pergunta'];// Pergunta de autenticação de segundo fator
    $fa2r = $_POST['resposta'];//Resposta da 2FA
    $hashfa2 = password_hash($fa2r, PASSWORD_BCRYPT);//transforma a 2FA em hash

    //LOGIN DE TESTE
//kali
//kali1234
//ze

            //COMANDO DE CRIAÇÃO DA TABELA USUÁRIOS

    //CREATE TABLE usuarios (
    //    id INT AUTO_INCREMENT PRIMARY KEY,
    //    nome VARCHAR(150) NOT NULL,
    //    cpf CHAR(11) NOT NULL UNIQUE,
    //    nascimento DATE NOT NULL,
    //    sexo ENUM('masculino', 'feminino', 'outro') NOT NULL,
    //    mae VARCHAR(150) NOT NULL,
    //    telefone VARCHAR(15),
    //    celular VARCHAR(15) NOT NULL,
    //    endereco VARCHAR(255) NOT NULL,
    //    email VARCHAR(150) NOT NULL UNIQUE,
    //    ulogin VARCHAR(50) NOT NULL UNIQUE,
    //    senha VARCHAR(255) NOT NULL,  -- vai armazenar o hash (password_hash gera até 255 caracteres)
    //    pergunta ENUM('cachorro', 'cor', 'musica') NOT NULL,
    //    resposta VARCHAR(255) NOT NULL,
    //    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    //);


    //Comando para adicionar ao BD (SQL)
    $sql = "INSERT INTO usuarios (nome, cpf, nascimento, sexo, mae, telefone, celular, endereco, email, ulogin, senha, pergunta, resposta)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    //statement
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssssssssssss", $nome, $cpf, $nascimento, $sexo, $mae, $telefone, $celular, $endereco, $email, $login, $hash, $fa2p, $hashfa2);

    if($stmt->execute()) {
        header("Location: index.html?msg=sucesso");
        exit;
    } else {
        header("Location: index.html?msg=erro");
        exit;
    }

    $stmt->close();
    $conexao->close();
            
?>