-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/11/2025 às 05:33
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kali_racers`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `log_usuarios`
--

CREATE TABLE `log_usuarios` (
  `logid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `details` text DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `log_usuarios`
--

INSERT INTO `log_usuarios` (`logid`, `id`, `action`, `details`, `ip_address`, `created_at`) VALUES
(1, 3, 'login', NULL, NULL, '2025-11-23 01:47:44'),
(2, 3, 'logout', NULL, NULL, '2025-11-23 01:55:39'),
(3, 3, 'login', NULL, NULL, '2025-11-23 01:55:58'),
(4, 3, 'logout', NULL, NULL, '2025-11-23 01:58:41'),
(5, 3, 'login', NULL, NULL, '2025-11-23 02:27:29'),
(6, 3, 'logout', NULL, NULL, '2025-11-23 02:27:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_prod` int(11) NOT NULL,
  `nome_prod` varchar(255) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `marca_prod` varchar(255) NOT NULL,
  `preco` char(255) NOT NULL,
  `quant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo_prod` enum('turbinas','alimentacao','power train','perifericos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `tipo_prod`) VALUES
(1, 'turbinas'),
(2, 'perifericos'),
(3, 'power train'),
(4, 'alimentacao');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` char(11) NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` enum('masculino','feminino','outro') NOT NULL,
  `mae` varchar(150) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `ulogin` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `pergunta` enum('cachorro','cor','musica') NOT NULL,
  `resposta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `nascimento`, `sexo`, `mae`, `telefone`, `celular`, `endereco`, `email`, `ulogin`, `senha`, `criado_em`, `pergunta`, `resposta`) VALUES
(1, 'João Pedro', '15670080700', '2001-06-13', 'masculino', 'Ana Lucia', '31089277', '21981225886', 'Rua Jornalista Argeu Affonso, 261', 'joao@gmail.com', 'joao', '$2y$10$6q7ACgsLioKoA.RO5zpLxOJGsGOBnYH1wqMZvwK/4UpWM73.bzove', '2025-10-02 01:06:16', 'cachorro', ''),
(2, 'Jorge', '12365487900', '2001-06-25', 'outro', 'Ana', '', '21584579568', 'Rua 50, casa 01', 'jorge@gmai.com', 'jorge', '$2y$10$wbrGhthKKWLGuR8lF48h5.RMWahUPCNQnyClT0YDrD8Hd5uq2w56W', '2025-10-12 03:05:28', 'musica', '$2y$10$.AmqeWJgE7JjKhICjLB6Rey.cV5cTXGan/YTpTXxXmA5dULocVPp2'),
(3, 'kali', '02130264000', '1998-07-14', 'feminino', 'Ana', '', '2191458749821', 'Rua 2, casa 03', 'kali@gmail.com', 'kali', '$2y$10$y1xT.lfsOn9iM.9L.EbMlOIPA7HxBVlIFx5HyaNEo5TLw.ulRW0FW', '2025-10-12 13:23:00', 'cachorro', '$2y$10$I6HbYyoA1hcQ6SDYV9/CUOr559EpUyQLeHZYW5iiSSY6oC1rbL/wa'),
(4, 'renan santos', '12312842777', '2001-06-21', 'masculino', 'renata ', '21977645392', '21977645392', 'rua visconde de araguaia 726', 'renanpdfd@gmail.com', 'renannrk', '$2y$10$4ov.kWERAZGmOkhMusDpO.eUIK/hoNRAUlDTur0j5rJBkJj6ZfIhi', '2025-10-23 23:26:00', 'cachorro', '$2y$10$l3/5NziMrD3YP/LormmePOu0npYHZrzMXuzGkMogbJ1Y1bu.pQFNC'),
(5, 'admin', '00000000000', '0001-01-01', 'outro', 'a', '', '000000000', 'a', 'admin@admin.com', 'admin', '$2y$10$wYKZUd7Vix9F3RBXnWIkj.nOUG88bd02.AbZWS/kaSoNCCoCfbGeK', '2025-11-22 21:18:13', 'cachorro', '$2y$10$OGjZSUJ7QjmV0Sj1HTfV/.xKFS9Bw5C7EI1gq1cH3HeNGBafWs1zi'),
(6, 'kg ', '15163368796', '2004-08-07', 'masculino', 'ingrid ramos', '', '21975163118', 'beco jabas', 'kaua.ramos.guilherme@hotmail.com', 'kg71', '$2y$10$oTBpsHOdxCvzddRIVpj0s.O01HN71v9.muH9kGKSukY.AQBwGY.Xa', '2025-11-22 23:38:51', 'cachorro', '$2y$10$eFR1fyH77o7uDjOhICqRcuXi7W8Ot8gj5tsXgmIfeX0vXOzzDVrny');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `log_usuarios`
--
ALTER TABLE `log_usuarios`
  ADD PRIMARY KEY (`logid`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ulogin` (`ulogin`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `log_usuarios`
--
ALTER TABLE `log_usuarios`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `log_usuarios`
--
ALTER TABLE `log_usuarios`
  ADD CONSTRAINT `log_usuarios_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
