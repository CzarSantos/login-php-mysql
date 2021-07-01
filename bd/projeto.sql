-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2021 às 03:56
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`) VALUES
(1, 'hop', 'hop@gmail.com', '8c728e685ddde9f7fbbc452155e29639'),
(2, 'julio', 'julio@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Hope', 'teste@teste.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'uiolo', 'uilo@outlook.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'tt', 'tt@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'julianao', 'juliano@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'Julio Cesar Souza dos Santos', '88888888888888888888@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 'lop', 'lop@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, 'ki', 'ki@gmail.com', '202cb962ac59075b964b07152d234b70'),
(10, 'ly', 'ly@gmail.com', '202cb962ac59075b964b07152d234b70'),
(11, 'w', 'w@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'ww', 'ww@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(13, 'ee', 'ee@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(14, 'yy', 'yy@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(15, 'rt', 'rt@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd'),
(16, 'uu', 'uu@gmail.com', '3fcf6748deb8c48fcbfef4a9cd6e55a0'),
(17, 'rodolfo', 'rodo@gmail.com', '202cb962ac59075b964b07152d234b70'),
(18, 'tihu', 'tihu@gmail.com', '202cb962ac59075b964b07152d234b70'),
(19, 'user', 'user@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
