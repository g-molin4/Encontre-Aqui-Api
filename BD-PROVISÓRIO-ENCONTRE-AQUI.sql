-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Set-2021 às 17:25
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
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagensobjeto`
--

CREATE TABLE `imagensobjeto` (
  `id` bigint(20) NOT NULL,
  `diretorio` varchar(80) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `objetoId` bigint(20) NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objetoencontrado`
--

CREATE TABLE `objetoencontrado` (
  `id` bigint(20) NOT NULL,
  `tipoObjeto` varchar(50) DEFAULT NULL,
  `dataEncontrado` datetime DEFAULT current_timestamp(),
  `userEncontrouId` bigint(20) NOT NULL,
  `localEntId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objetoencontrado`
--

INSERT INTO `objetoencontrado` (`id`, `tipoObjeto`, `dataEncontrado`, `userEncontrouId`, `localEntId`) VALUES
(1, 'livro', '2021-09-02 14:47:24', 1, 0),
(2, 'fones de ouvido', '2021-09-02 20:15:35', 1, 0),
(3, 'anel', '2021-09-02 17:21:48', 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` bigint(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`) VALUES
(1, 'yan', '1234', 'gabriel@fintex.com.br'),
(3, 'gabriel', '8864', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imagensobjeto`
--
ALTER TABLE `imagensobjeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_objetoId` (`objetoId`);

--
-- Índices para tabela `objetoencontrado`
--
ALTER TABLE `objetoencontrado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId_fk` (`userEncontrouId`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imagensobjeto`
--
ALTER TABLE `imagensobjeto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `objetoencontrado`
--
ALTER TABLE `objetoencontrado`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagensobjeto`
--
ALTER TABLE `imagensobjeto`
  ADD CONSTRAINT `fk_objetoId` FOREIGN KEY (`objetoId`) REFERENCES `objetoencontrado` (`id`);

--
-- Limitadores para a tabela `objetoencontrado`
--
ALTER TABLE `objetoencontrado`
  ADD CONSTRAINT `userId_fk` FOREIGN KEY (`userEncontrouId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
