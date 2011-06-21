-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 21, 2011 as 09:43 
-- Versão do Servidor: 5.5.11
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
  `CODALUNO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ENDERECO` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `TELEFONE` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `ATIVO` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`CODALUNO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`CODALUNO`, `NOME`, `ENDERECO`, `TELEFONE`, `ATIVO`) VALUES
(2, 'Pio Tofanelli', 'jabu', '87654321', 0),
(4, 'pioo', 'casaa', '123456789', 0),
(7, 'hugo', 'cravinhos', '87654321', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias_semana`
--

CREATE TABLE IF NOT EXISTS `dias_semana` (
  `CODDIA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(25) NOT NULL,
  PRIMARY KEY (`CODDIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `dias_semana`
--

INSERT INTO `dias_semana` (`CODDIA`, `DESCRICAO`) VALUES
(1, 'segunda'),
(2, 'terça'),
(3, 'quarta'),
(4, 'quinta'),
(5, 'sexta'),
(6, 'sabado'),
(7, 'segunda-quarta'),
(8, 'segunda-quarta-sexta'),
(9, 'segunda-sexta'),
(10, 'quarta-sexta'),
(11, 'terça-quinta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturas`
--

CREATE TABLE IF NOT EXISTS `faturas` (
  `CODFATURA` int(11) NOT NULL AUTO_INCREMENT,
  `VALOR` decimal(6,2) NOT NULL,
  `REFERENCIA` varchar(20) DEFAULT NULL,
  `DATA_VENC` date NOT NULL,
  `DATA_PGTO` date DEFAULT NULL,
  `MULTA` decimal(6,2) DEFAULT NULL,
  `CODALUNO` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODFATURA`),
  KEY `CODALUNO` (`CODALUNO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `faturas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `CODMATRICULA` int(11) NOT NULL AUTO_INCREMENT,
  `CODALUNO` int(11) DEFAULT NULL,
  `CODTURMA` int(11) DEFAULT NULL,
  `AJUSTE_MENS` decimal(5,2) DEFAULT NULL,
  `DATA_INICIO` date NOT NULL,
  `DATA_TERMINO` date DEFAULT NULL,
  PRIMARY KEY (`CODMATRICULA`),
  KEY `CODALUNO` (`CODALUNO`),
  KEY `CODTURMA` (`CODTURMA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`CODMATRICULA`, `CODALUNO`, `CODTURMA`, `AJUSTE_MENS`, `DATA_INICIO`, `DATA_TERMINO`) VALUES
(2, 4, 1, NULL, '2011-06-07', NULL),
(3, 2, 1, NULL, '2011-06-23', NULL),
(10, 4, 1, NULL, '2011-10-10', NULL),
(11, 4, 1, NULL, '2011-10-10', NULL),
(12, 4, 1, NULL, '2011-10-10', NULL),
(13, 4, 1, NULL, '2011-10-10', NULL),
(16, 7, 1, NULL, '2011-06-20', NULL),
(17, 7, 1, NULL, '2011-06-19', NULL),
(18, 7, 1, NULL, '2011-06-02', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidades`
--

CREATE TABLE IF NOT EXISTS `modalidades` (
  `CODMODALIDADE` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(50) NOT NULL,
  `MENSALIDADE_BASE` decimal(6,2) NOT NULL,
  PRIMARY KEY (`CODMODALIDADE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `modalidades`
--

INSERT INTO `modalidades` (`CODMODALIDADE`, `DESCRICAO`, `MENSALIDADE_BASE`) VALUES
(1, 'Capoeira', 20.00),
(2, 'capoeira 2', 20.00),
(3, 'capoeira 3', 30.00),
(5, 'Cavalo', 7.00),
(6, 'Capoeira treino', 60.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mod_dias`
--

CREATE TABLE IF NOT EXISTS `mod_dias` (
  `CODMODALIDADE` int(11) NOT NULL DEFAULT '0',
  `CODDIA` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CODMODALIDADE`,`CODDIA`),
  KEY `CODDIA` (`CODDIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mod_dias`
--

INSERT INTO `mod_dias` (`CODMODALIDADE`, `CODDIA`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `CODPROFESSOR` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(50) NOT NULL,
  PRIMARY KEY (`CODPROFESSOR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`CODPROFESSOR`, `NOME`) VALUES
(1, 'Reginaldo'),
(4, 'Conrado'),
(5, 'Conrado'),
(6, 'Hugo'),
(7, 'Caio viado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prof_mod`
--

CREATE TABLE IF NOT EXISTS `prof_mod` (
  `CODPROFESSOR` int(11) NOT NULL DEFAULT '0',
  `CODMODALIDADE` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`CODPROFESSOR`,`CODMODALIDADE`),
  KEY `CODMODALIDADE` (`CODMODALIDADE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prof_mod`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE IF NOT EXISTS `turmas` (
  `CODTURMA` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(50) NOT NULL,
  `CODDIA` int(11) NOT NULL,
  `HORA_INICIO` time NOT NULL,
  `HORA_TERMINO` time NOT NULL,
  `MAX_VAGAS` int(11) DEFAULT NULL,
  `CODMODALIDADE` int(11) DEFAULT NULL,
  `CODPROFESSOR` int(11) DEFAULT NULL,
  PRIMARY KEY (`CODTURMA`),
  KEY `CODDIA` (`CODDIA`),
  KEY `CODMODALIDADE` (`CODMODALIDADE`),
  KEY `CODPROFESSOR` (`CODPROFESSOR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`CODTURMA`, `DESCRICAO`, `CODDIA`, `HORA_INICIO`, `HORA_TERMINO`, `MAX_VAGAS`, `CODMODALIDADE`, `CODPROFESSOR`) VALUES
(1, 'Capoeira', 1, '00:00:10', '00:00:11', 10, 1, 1),
(2, 'capoeira full', 10, '00:00:11', '00:00:12', 40, 6, 7);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `faturas`
--
ALTER TABLE `faturas`
  ADD CONSTRAINT `faturas_ibfk_1` FOREIGN KEY (`CODALUNO`) REFERENCES `alunos` (`CODALUNO`);

--
-- Restrições para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`CODALUNO`) REFERENCES `alunos` (`CODALUNO`),
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`CODTURMA`) REFERENCES `turmas` (`CODTURMA`);

--
-- Restrições para a tabela `mod_dias`
--
ALTER TABLE `mod_dias`
  ADD CONSTRAINT `mod_dias_ibfk_1` FOREIGN KEY (`CODMODALIDADE`) REFERENCES `modalidades` (`CODMODALIDADE`),
  ADD CONSTRAINT `mod_dias_ibfk_2` FOREIGN KEY (`CODDIA`) REFERENCES `dias_semana` (`CODDIA`);

--
-- Restrições para a tabela `prof_mod`
--
ALTER TABLE `prof_mod`
  ADD CONSTRAINT `prof_mod_ibfk_1` FOREIGN KEY (`CODPROFESSOR`) REFERENCES `professores` (`CODPROFESSOR`),
  ADD CONSTRAINT `prof_mod_ibfk_2` FOREIGN KEY (`CODMODALIDADE`) REFERENCES `modalidades` (`CODMODALIDADE`);

--
-- Restrições para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`CODDIA`) REFERENCES `dias_semana` (`CODDIA`),
  ADD CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`CODMODALIDADE`) REFERENCES `modalidades` (`CODMODALIDADE`),
  ADD CONSTRAINT `turmas_ibfk_3` FOREIGN KEY (`CODPROFESSOR`) REFERENCES `professores` (`CODPROFESSOR`);
