-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `vagasweb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `idCidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `idade` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nome`, `endereco`, `email`, `senha`, `idade`, `curso`, `cidade`) VALUES
(2, 'teste', 'rua A', 'teste@teste.com', '123456', '19', 'moda', 'riogrande'),
(3, 'teste', 'tedsr', 'fsadf', '555', '16', 'ads', 'poa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE IF NOT EXISTS `vagas` (
  `idVaga` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `cidades_idCidade` int(11) NOT NULL,
  `cursos_idCurso` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `turno` varchar(10) NOT NULL,
  PRIMARY KEY (`idVaga`),
  KEY `fk_vagas_cidades_idx` (`cidades_idCidade`),
  KEY `fk_vagas_cursos1_idx` (`cursos_idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_vagas_cidades` FOREIGN KEY (`cidades_idCidade`) REFERENCES `cidades` (`idCidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vagas_cursos1` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
