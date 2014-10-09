-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11-Set-2014 às 01:08
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vagasweb`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `vagas`
--

INSERT INTO `vagas` (`idVaga`, `nome`, `descricao`, `cidades_idCidade`, `cursos_idCurso`, `status`, `turno`) VALUES
(1, 'Programador WEB', 'Estamos em busca de um Desenvolvedor Web Júnior que tenha interesse de aprender e desenvolver em equipe as tarefas.\r\n\r\nAtividades: Atuar na atualização e manutenção de sites, blogs e afins, além do desenvolvimento de landing pages.\r\n\r\nConhecimento: Wordpress, PHP, Html, CSS e Magento.\r\n\r\nCarga horária flexível de 4 a 6 h/dia.\r\n\r\nOferecemos salário compatível, VT e almoço.\r\n\r\nAlém de um ótimo ambiente de trabalho.', 1, 1, 1, 'manhã'),
(2, 'Desenvolvedor iOS', 'Desenvolver novo app da empresa', 2, 1, 1, 'tarde'),
(3, 'Desenvolvedor .NET', 'Auxiliar no desenvolvimento dos novos projetos', 1, 1, 0, 'tarde'),
(4, 'Técnico em Redes', 'monitorar e prestar manutenção na rede interna', 2, 2, 1, 'manhã'),
(5, 'Suporte', 'Realizar reparos na rede dos clientes', 3, 2, 0, 'tarde');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `vagas`
--
ALTER TABLE `vagas`
  ADD CONSTRAINT `fk_vagas_cidades` FOREIGN KEY (`cidades_idCidade`) REFERENCES `cidades` (`idCidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vagas_cursos1` FOREIGN KEY (`cursos_idCurso`) REFERENCES `cursos` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
