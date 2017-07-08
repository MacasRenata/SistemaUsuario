-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql04-farm59.uni5.net
-- Tempo de geração: 25/01/2017 às 16:41
-- Versão do servidor: 5.5.40-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `eduardobarbosa01`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(400) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `idsala` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `idreserva` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `idsala` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `horainicio` DATE NOT NULL,
  `horainicio` TIME NOT NULL,
  `horafim` TIME NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

