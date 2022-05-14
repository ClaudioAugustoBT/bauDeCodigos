-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Abr-2019 às 21:53
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `caixa`
--
CREATE DATABASE IF NOT EXISTS `caixa` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `caixa`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE IF NOT EXISTS `dados` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nm_cliente` varchar(70) DEFAULT NULL,
  `cd_senha` int(6) NOT NULL,
  `vl_saldo` float(9,2) DEFAULT NULL,
  `cd_cpf` char(11) DEFAULT NULL,
  `ds_endereco` varchar(200) DEFAULT NULL,
  `ds_idade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id_cliente`, `nm_cliente`, `cd_senha`, `vl_saldo`, `cd_cpf`, `ds_endereco`, `ds_idade`) VALUES
(1, 'Claudio', 123456, 8000.30, '12345678909', 'Rua Zero - Nº 20', 29),
(2, 'TESTE', 123456, 50.01, '98765432101', 'RUA TESTE', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
