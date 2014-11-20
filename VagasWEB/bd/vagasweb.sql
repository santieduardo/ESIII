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
  `municipio` varchar(50) NOT NULL,
  PRIMARY KEY (`idCidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`idCidade`, `municipio`) VALUES
(1, 'Porto Alegre'),
(2, 'Rio Grande'),
(3, 'Toronto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(50) NOT NULL,
  PRIMARY KEY (`idCurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`idCurso`, `curso`) VALUES
(1, 'Análise e Desenvolvimento de Sistemas'),
(2, 'Moda'),
(3, 'Gastronomia');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `cidades_idCidade` int(11) NOT NULL,
  `cursos_idCurso` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `publico` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idVaga`),
  KEY `fk_vagas_cidades_idx` (`cidades_idCidade`),
  KEY `fk_vagas_cursos1_idx` (`cursos_idCurso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`idVaga`, `nome`, `descricao`, `cidades_idCidade`, `cursos_idCurso`, `status`, `turno`, `publico`) VALUES
(1, 'Desenvolvedor PHP', 'Auxiliar no desenvolvimento de novas aplicações', 1, 1, 1, 'manhã', 0),
(2, 'Desenvolvedor Android', 'Desenvolvimento de novos aplicativos para clientes externos', 1, 1, 1, 'tarde', 0),
(3, 'Chefe de Cozinha', 'Liderar a equipe de cozinheiros', 2, 3, 1, 'manhã', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagaselecionada`
--

CREATE TABLE IF NOT EXISTS `vagaselecionada` (
  `idVaga` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idVaga`,`idUsuario`),
  KEY `fk_vagas_has_usuarios_usuarios1_idx` (`idUsuario`),
  KEY `fk_vagas_has_usuarios_vagas1_idx` (`idVaga`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_vagas_cidades` FOREIGN KEY (`cidades_idCidade`) REFERENCES `cidades` (`idCidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vagas_cursos1` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `vagaselecionada`
--
ALTER TABLE `vagaselecionada`
  ADD CONSTRAINT `fk_vagas_has_usuarios_vagas1` FOREIGN KEY (`idVaga`) REFERENCES `vagas` (`idVaga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vagas_has_usuarios_usuarios1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
