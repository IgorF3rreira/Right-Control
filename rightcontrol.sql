-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 01:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rightcontrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `produtos_`
--

CREATE TABLE `produtos_` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_produtos`
--

CREATE TABLE `tab_produtos` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_produtos`
--

INSERT INTO `tab_produtos` (`id_produto`, `nome`, `categoria`, `quantidade`, `preco`) VALUES
(33, 'teste', 'tes', 6, 12.55),
(34, 'teste', 'tes', 6, 12.55),
(35, 'teste', 'tes', 6, 12.55),
(36, 'teste', 'tes', 6, 12.55),
(37, 'teste', 'tes', 6, 12.55),
(38, 'teste', 'tes', 6, 12.55),
(39, 'teste', 'tes', 6, 12.55),
(40, 'teste', 'tes', 6, 12.55),
(41, 'teste', 'tes', 6, 12.55),
(42, 'teste', 'tes', 6, 12.55),
(43, 'teste', 'tes', 6, 12.55),
(44, 'teste', 'tes', 6, 12.55),
(45, 'teste', 'tes', 6, 12.55),
(46, 'teste', 'tes', 6, 12.55),
(47, 'teste', 'tes', 6, 12.55),
(48, 'testess', 'tesw', 64, 12.55),
(49, 'teste', 'tes', 6, 12.55),
(50, 'teste', 'tes', 6, 12.55),
(51, 'teste', 'tes', 6, 12.55),
(52, 'teste', 'tes', 6, 12.55),
(53, 'teste', 'tes', 6, 12.55),
(54, 'teste', 'tes', 6, 12.55),
(55, 'teste', 'tes', 6, 12.55),
(56, 'teste', 'tes', 6, 12.55),
(57, 'teste', 'tes', 6, 12.55),
(58, 'teste', 'tes', 6, 12.55),
(59, 'teste', 'tes', 6, 12.55),
(60, 'teste', 'tes', 6, 12.55),
(61, 'teste', 'tes', 6, 12.55),
(62, 'teste', 'tes', 6, 12.55),
(63, 'teste', 'tes', 6, 12.55),
(64, 'teste', 'tes', 6, 12.55),
(65, 'teste', 'tes', 6, 12.55),
(66, 'teste', 'tes', 6, 12.55),
(67, 'teste', 'tes', 6, 12.55),
(68, 'teste', 'tes', 6, 12.55),
(69, 'teste', 'tes', 6, 12.55),
(70, 'teste', 'tes', 6, 12.55),
(71, 'teste', 'tes', 6, 12.55),
(72, 'teste', 'tes', 6, 12.55),
(73, 'teste', 'tes', 6, 12.55),
(74, 'teste', 'tes', 6, 12.55),
(75, 'teste', 'tes', 6, 12.55),
(76, 'teste', 'tes', 6, 12.55),
(77, 'teste', 'tes', 6, 12.55),
(78, 'teste', 'tes', 6, 12.55),
(79, 'teste', 'tes', 6, 12.55),
(80, 'teste', 'tes', 6, 12.55),
(81, 'teste', 'tes', 6, 12.55),
(82, 'teste', 'tes', 6, 12.55),
(83, 'teste', 'tes', 6, 12.55),
(84, 'teste', 'tes', 6, 12.55),
(85, 'teste', 'tes', 6, 12.55),
(86, 'teste', 'tes', 5, 12.55),
(87, 'teste', 'tes', 5, 12.55),
(88, 'teste', 'tes', 5, 12.55),
(89, 'teste', 'tes', 5, 12.55),
(90, 'testess', 'tesw', 64, 12.55),
(91, 'teste', 'tes', 7, 12.55),
(92, 'testess', 'tesw', 64, 12.55),
(93, 'hd', 'tes', 6, 12.55),
(94, 'teclado', 'hardware', 6, 12.55),
(95, 'teclado', 'hardware', 7, 12.55),
(96, 'teste', 'tes', 8, 12.55),
(97, 'teste', 'tes', 8, 12.55),
(98, 'teste', 'tesa', 8, 12.55);

-- --------------------------------------------------------

--
-- Table structure for table `tab_produtos_`
--

CREATE TABLE `tab_produtos_` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_produtos_8`
--

CREATE TABLE `tab_produtos_8` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tab_produtos_9`
--

CREATE TABLE `tab_produtos_9` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_produtos_9`
--

INSERT INTO `tab_produtos_9` (`id`, `nome`, `categoria`, `quantidade`, `preco`) VALUES
(1, 'fasf', 'sfasf', 3, 11.00),
(2, 'fasf', 'sfasf', 3, 11.00),
(3, 'asds', 'dsd', 3, 4.00),
(4, 'asds', 'dsd', 3, 4.00),
(5, 'teste', 'hardware', 1, 12.30),
(6, 'fasfa', 'sfasf', 3, 11.00),
(7, 'testeaa', 'hardware', 1, 12.30),
(8, 'teste', 'hardware', 2, 12.30);

-- --------------------------------------------------------

--
-- Table structure for table `tab_produtos_10`
--

CREATE TABLE `tab_produtos_10` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_produtos_10`
--

INSERT INTO `tab_produtos_10` (`id`, `nome`, `categoria`, `quantidade`, `preco`) VALUES
(1, 'asdfasf', 'asfas', 21, 23.00);

-- --------------------------------------------------------

--
-- Table structure for table `tab_usuarios`
--

CREATE TABLE `tab_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `sobrenome` varchar(200) DEFAULT NULL,
  `dtNasc` date DEFAULT NULL,
  `empresa` varchar(150) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tab_usuarios`
--

INSERT INTO `tab_usuarios` (`id_usuario`, `nome`, `sobrenome`, `dtNasc`, `empresa`, `email`, `senha`) VALUES
(4, 'igor', 'teste', '2003-03-08', 'RightControl', 'igor@teste.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(5, 'diego', 'diego', '2003-03-08', 'dsfjij', 'diego@teste.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(6, 'SAMUEL', 'SILVA', '2003-03-08', 'fwef', 'igaotw31@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(7, 'SAMUEL', 'SILVA', '2003-03-08', 'wdf2', 'igaotw@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(8, 'SAMUEL', 'SILVAa', '2003-03-08', 'sdfef', 'igao31@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(9, 'IGOR', 'DOS SANTOS', '2003-03-08', 'sds', 'igor2095@hotmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(10, 'igor', 'igor', '2003-03-08', 'idfhfih', 'igor@teste2.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos_`
--
ALTER TABLE `produtos_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_produtos`
--
ALTER TABLE `tab_produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `tab_produtos_`
--
ALTER TABLE `tab_produtos_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_produtos_8`
--
ALTER TABLE `tab_produtos_8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_produtos_9`
--
ALTER TABLE `tab_produtos_9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_produtos_10`
--
ALTER TABLE `tab_produtos_10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos_`
--
ALTER TABLE `produtos_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_produtos`
--
ALTER TABLE `tab_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tab_produtos_`
--
ALTER TABLE `tab_produtos_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_produtos_8`
--
ALTER TABLE `tab_produtos_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_produtos_9`
--
ALTER TABLE `tab_produtos_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tab_produtos_10`
--
ALTER TABLE `tab_produtos_10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
