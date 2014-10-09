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
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`idCidade`, `nome`) VALUES
(1, 'Porto Alegre'),
(2, 'Rio Grande'),
(3, 'Toronto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idCurso`, `curso`) VALUES
(1, 'ads'),
(2, 'moda'),
(3, 'gastronomia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `idade` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `curso` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idUsuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nome`, `endereco`, `email`, `senha`, `idade`, `curso`, `cidade`) VALUES
(2, 'Eduardo Santi', 'Av. Heitor Vieira, 1665', 'eduardoivaniskisanti@yahoo.com.br', 'Edu102030', '20', 'ads', 'toronto'),
(3, 'adriano', 'dwsd', 'adriano@adriano.com', 'adriano', '16', 'ads', 'poa'),
(4, 'Roberto Nunes', 'Rua da Zueira, 969', 'roberton@gmail.com', '123456', '19', 'ads', 'poa'),
(5, 'João', 'asasa', 'joao@joao.com', 'joao', '16', 'ads', 'poa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

CREATE TABLE IF NOT EXISTS `vagas` (
  `idVaga` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `cidades_idCidade` int(11) NOT NULL,
  `cursos_idCurso` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `turno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idVaga`),
  KEY `fk_vagas_cidades_idx` (`cidades_idCidade`),
  KEY `fk_vagas_cursos1_idx` (`cursos_idCurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`idVaga`, `nome`, `descricao`, `cidades_idCidade`, `cursos_idCurso`, `status`, `turno`) VALUES
(1, 'Desenvolvedor PHP', 'Auxiliar no desenvolvimento de novas aplicações', 1, 1, 1, 'manhã'),
(2, 'Desenvolvedor Android', 'Desenvolvimento de novos aplicativos para clientes externos', 1, 1, 1, 'tarde'),
(3, 'Chefe de Cozinha', 'Liderar a equipe de cozinheiros', 2, 3, 1, 'manhã');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
