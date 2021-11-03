-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2021 às 20:56
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `orgaoId` bigint(20) NOT NULL,
  `master` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `cpf`, `email`, `senha`, `telefone`, `orgaoId`, `master`) VALUES
(1, 'Encontre Aqui Master', NULL, 'master@encontreaqui.com.br', 'Encontreaqui@2021', '21990891807', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagemobjeto`
--

CREATE TABLE `imagemobjeto` (
  `id` bigint(20) NOT NULL,
  `diretorio` varchar(50) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `objetoId` bigint(20) NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `id` bigint(20) NOT NULL,
  `dataEncontrado` datetime DEFAULT current_timestamp(),
  `userEncontrouId` bigint(20) NOT NULL,
  `orgaoId` bigint(20) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `tipoObjetoId` bigint(20) NOT NULL,
  `userPerdeuId` bigint(20) DEFAULT NULL,
  `status` varchar(30) NOT NULL,
  `subStatus` varchar(30) NOT NULL,
  `dataAlteracao` datetime DEFAULT NULL,
  `admId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orgao`
--

CREATE TABLE `orgao` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `enderecoNumero` varchar(15) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `admId` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orgao`
--

INSERT INTO `orgao` (`id`, `nome`, `cnpj`, `email`, `telefone`, `cep`, `bairro`, `enderecoNumero`, `rua`, `admId`) VALUES
(3, 'EncontreAquiMaster', '02757054000121', 'master@encontreaqui.com.br', '21990891807', '20011030', 'Centro', '50', 'Rua da Quitanda', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoobjeto`
--

CREATE TABLE `tipoobjeto` (
  `id` bigint(20) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `token` varchar(20) NOT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `bairro` varchar(50) NOT NULL,
  `enderecoNumero` varchar(8) NOT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `expiraToken` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `cpf`, `senha`, `email`, `token`, `cep`, `bairro`, `enderecoNumero`, `telefone`, `rua`, `expiraToken`) VALUES
(1, '', '1234', 'gabriel@fintex.com.br', '', NULL, '', '', NULL, NULL, 0),
(3, '', '8864', NULL, '', NULL, '', '', NULL, NULL, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orgaoId_administrador` (`orgaoId`);

--
-- Índices para tabela `imagemobjeto`
--
ALTER TABLE `imagemobjeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_objetoId` (`objetoId`);

--
-- Índices para tabela `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_userEncontrouId_objeto` (`userEncontrouId`),
  ADD KEY `fk_userPerdeuId_objeto` (`userPerdeuId`),
  ADD KEY `fk_orgaoId_objeto` (`orgaoId`),
  ADD KEY `fk_tipoObjeto_objeto` (`tipoObjetoId`);

--
-- Índices para tabela `orgao`
--
ALTER TABLE `orgao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_admId_orgao` (`admId`);

--
-- Índices para tabela `tipoobjeto`
--
ALTER TABLE `tipoobjeto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `imagemobjeto`
--
ALTER TABLE `imagemobjeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `orgao`
--
ALTER TABLE `orgao`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipoobjeto`
--
ALTER TABLE `tipoobjeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_orgaoId_administrador` FOREIGN KEY (`orgaoId`) REFERENCES `orgao` (`id`);

--
-- Limitadores para a tabela `imagemobjeto`
--
ALTER TABLE `imagemobjeto`
  ADD CONSTRAINT `fk_objetoId` FOREIGN KEY (`objetoId`) REFERENCES `objeto` (`id`);

--
-- Limitadores para a tabela `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `fk_orgaoId_objeto` FOREIGN KEY (`orgaoId`) REFERENCES `orgao` (`id`),
  ADD CONSTRAINT `fk_tipoObjeto_objeto` FOREIGN KEY (`tipoObjetoId`) REFERENCES `tipoobjeto` (`id`),
  ADD CONSTRAINT `fk_userEncontrouId_objeto` FOREIGN KEY (`userEncontrouId`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_userPerdeuId_objeto` FOREIGN KEY (`userPerdeuId`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `userId_fk` FOREIGN KEY (`userEncontrouId`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `orgao`
--
ALTER TABLE `orgao`
  ADD CONSTRAINT `fk_admId_orgao` FOREIGN KEY (`admId`) REFERENCES `administrador` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
