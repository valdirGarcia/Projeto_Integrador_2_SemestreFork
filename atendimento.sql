-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/06/2023 às 19:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atendimento`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarConsultas` (IN `qtde` INT)   BEGIN
    SELECT p.nome AS nome_professor, m.nome AS nome_medico, DATE_FORMAT(c.data, "%d/%m/%Y") AS data_consulta
    FROM consulta c
    INNER JOIN professor p
	ON c.id_prof = p.id_professor
    INNER JOIN medico m
	ON c.id_med = m.id_medico
    LIMIT qtde;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_med` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cep` int(11) DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medico`
--

INSERT INTO `medico` (`id_medico`, `nome`, `telefone`, `email`, `sexo`, `senha`, `token`) VALUES
(20, 'teste', '3878684463', 'teste@teste', 'm', 'teste', 'a504488ea3e651710c77e3812feaad7385e35f70c528b3281b0c9b5eb9449541dc0ba94fd99f63a509d4e12f775a736d406f'),
(21, 'thiagosefudeu', '372385335', 'thiago@fatec', 'm', '1234', '0372900e9607483e0c90d9b86a683b0aa1cf03e1ff36ea3e9eb007aa67b28b260a470c8f22d7587e36506375ff007559596d');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome`, `telefone`, `email`, `sexo`, `senha`, `token`) VALUES
(1, 'teste2', '87563844', 'teste@teste2', 'm', 'teste2', '28bc8f16939dee980514aefe53109b363f99c01e62023f316bce714c87a6887c4450f12eeaa106d72f6129dccf7cf596cd36'),
(2, 'husk', '846846', 'husk@husk', 'm', 'husk', 'a31d8a373c2f71eab3a2f760acbd1b03c9386b60c524a9eb1578438105c4826284952b32bae639b61c0782fdbce22b1b791c');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_id_profc` (`id_prof`),
  ADD KEY `fk_id_medc` (`id_med`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD UNIQUE KEY `id_prof` (`id_prof`);

--
-- Índices de tabela `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_id_medc` FOREIGN KEY (`id_med`) REFERENCES `medico` (`id_medico`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_profc` FOREIGN KEY (`id_prof`) REFERENCES `professor` (`id_professor`);

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_id_prof` FOREIGN KEY (`id_prof`) REFERENCES `professor` (`id_professor`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
