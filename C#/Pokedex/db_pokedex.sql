-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Jun-2019 às 21:40
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_pokedex`
--
CREATE DATABASE IF NOT EXISTS `db_pokedex` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_pokedex`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_poke`
--

CREATE TABLE IF NOT EXISTS `tb_poke` (
  `cd_poke` int(11) NOT NULL AUTO_INCREMENT,
  `nm_poke` varchar(100) NOT NULL,
  `ds_hp` int(11) NOT NULL,
  `ds_atk` int(11) NOT NULL,
  `ds_def` int(11) NOT NULL,
  `ds_spAtk` int(11) NOT NULL,
  `ds_spDef` int(11) NOT NULL,
  `ds_speed` int(11) NOT NULL,
  `cd_tipo1` int(11) NOT NULL,
  `cd_tipo2` int(11) NOT NULL,
  PRIMARY KEY (`cd_poke`),
  KEY `fk_poke_tipo1` (`cd_tipo1`),
  KEY `fk_poke_tipo2` (`cd_tipo2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_poke`
--

INSERT INTO `tb_poke` (`cd_poke`, `nm_poke`, `ds_hp`, `ds_atk`, `ds_def`, `ds_spAtk`, `ds_spDef`, `ds_speed`, `cd_tipo1`, `cd_tipo2`) VALUES
(1, 'Bulbasaur', 45, 49, 49, 65, 65, 45, 5, 8),
(2, 'Ivysaur', 60, 62, 63, 80, 80, 60, 5, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo`
--

CREATE TABLE IF NOT EXISTS `tb_tipo` (
  `cd_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cd_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `tb_tipo`
--

INSERT INTO `tb_tipo` (`cd_tipo`, `nm_tipo`) VALUES
(1, 'NORMAL'),
(2, 'FIRE'),
(3, 'WATER'),
(4, 'ELECTRIC'),
(5, 'GRASS'),
(6, 'ICE'),
(7, 'FIGHTING'),
(8, 'POISON'),
(9, 'GROUND'),
(10, 'FLYING'),
(11, 'PSYCHIC'),
(12, 'BUG'),
(13, 'ROCK'),
(14, 'GHOST'),
(15, 'DRAGON'),
(16, 'DARK'),
(17, 'STEEL'),
(18, 'FAIRY');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_poke`
--
ALTER TABLE `tb_poke`
  ADD CONSTRAINT `fk_poke_tipo1` FOREIGN KEY (`cd_tipo1`) REFERENCES `tb_tipo` (`cd_tipo`),
  ADD CONSTRAINT `fk_poke_tipo2` FOREIGN KEY (`cd_tipo2`) REFERENCES `tb_tipo` (`cd_tipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
