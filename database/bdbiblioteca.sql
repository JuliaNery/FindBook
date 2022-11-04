-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2022 às 21:33
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdbiblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbautor`
--

CREATE TABLE `tbautor` (
  `idAutor` int(11) NOT NULL,
  `nomeAutor` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbautor`
--

INSERT INTO `tbautor` (`idAutor`, `nomeAutor`) VALUES
(1, 'john green'),
(2, 'jojo moyes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbbiblioteca`
--

CREATE TABLE `tbbiblioteca` (
  `idBiblioteca` int(11) NOT NULL,
  `fotoBiblioteca` blob NOT NULL,
  `nomeBiblioteca` varchar(60) NOT NULL,
  `ruaBiblioteca` varchar(35) NOT NULL,
  `numBiblioteca` varchar(10) NOT NULL,
  `compBiblioteca` varchar(30) NOT NULL,
  `cepBiblioteca` char(9) NOT NULL,
  `bairroBiblioteca` varchar(35) NOT NULL,
  `cidadeBiblioteca` varchar(30) NOT NULL,
  `horarioAbertura` time NOT NULL,
  `horarioFechamento` time NOT NULL,
  `emailBiblioteca` varchar(60) NOT NULL,
  `senhaBiblioteca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbbiblioteca`
--

INSERT INTO `tbbiblioteca` (`idBiblioteca`, `fotoBiblioteca`, `nomeBiblioteca`, `ruaBiblioteca`, `numBiblioteca`, `compBiblioteca`, `cepBiblioteca`, `bairroBiblioteca`, `cidadeBiblioteca`, `horarioAbertura`, `horarioFechamento`, `emailBiblioteca`, `senhaBiblioteca`) VALUES
(3, '', 'Cora Coralina', 'Rua Otelo Augusto Ribeiro', '113', '', '08412-000', 'Guaianazes', 'São Paulo', '08:00:00', '16:00:00', 'coracoralina@gmail.com', '123456'),
(4, '', 'Mario de Andrade', 'Rua da Consolação', '94', '', '01302-000', 'Republica', 'São Paulo', '00:00:00', '00:00:00', 'marioandrade@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbeditora`
--

CREATE TABLE `tbeditora` (
  `idEditora` int(11) NOT NULL,
  `nomeEditora` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbeditora`
--

INSERT INTO `tbeditora` (`idEditora`, `nomeEditora`) VALUES
(1, 'intrinseca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbexemplar`
--

CREATE TABLE `tbexemplar` (
  `idExemplar` int(11) NOT NULL,
  `numExemplar` int(11) DEFAULT NULL,
  `idBiblioteca` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbexemplar`
--

INSERT INTO `tbexemplar` (`idExemplar`, `numExemplar`, `idBiblioteca`, `idLivro`) VALUES
(1, 456, 3, 2),
(3, 455, 3, 2),
(4, 123, 3, 1),
(5, 485, 3, 1),
(6, 459, 3, 3),
(7, 171, 3, 3),
(8, 157, 3, 3),
(9, 155, 3, 3),
(11, 180, 4, 3),
(12, 159, 4, 3),
(13, 1, 4, 1),
(14, 2, 4, 1),
(17, 3, 4, 1),
(18, 4, 4, 1),
(19, 9, 4, 1),
(20, 8, 4, 1),
(23, 1000, 4, 1),
(24, 44, 4, 1),
(26, 39, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `idGenero` int(11) NOT NULL,
  `nomeGenero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbgenero`
--

INSERT INTO `tbgenero` (`idGenero`, `nomeGenero`) VALUES
(1, 'romance');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbleitor`
--

CREATE TABLE `tbleitor` (
  `idLeitor` int(11) NOT NULL,
  `fotoLeitor` blob DEFAULT NULL,
  `nomeLeitor` varchar(60) NOT NULL,
  `emailLeitor` varchar(120) NOT NULL,
  `cpfLeitor` char(14) NOT NULL,
  `rgLeitor` char(12) NOT NULL,
  `dtNascLeitor` date NOT NULL,
  `generoLeitor` char(9) NOT NULL,
  `loginLeitor` varchar(25) NOT NULL,
  `senhaLeitor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbleitor`
--

INSERT INTO `tbleitor` (`idLeitor`, `fotoLeitor`, `nomeLeitor`, `emailLeitor`, `cpfLeitor`, `rgLeitor`, `dtNascLeitor`, `generoLeitor`, `loginLeitor`, `senhaLeitor`) VALUES
(1, NULL, 'Leandro Santos', 'leandro@gmail.com', '', '', '0000-00-00', '', '', '123456'),
(2, NULL, 'julinha', 'julia@gmail.com', '', '', '0000-00-00', '', '', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `idLivro` int(11) NOT NULL,
  `capaLivro` blob DEFAULT NULL,
  `nomeLivro` varchar(120) DEFAULT NULL,
  `sinopseLivro` varchar(1000) DEFAULT NULL,
  `dtLancamento` date DEFAULT NULL,
  `faixaEtaria` tinyint(2) DEFAULT NULL,
  `idAutor` int(6) NOT NULL,
  `idGenero` int(6) NOT NULL,
  `idEditora` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblivro`
--

INSERT INTO `tblivro` (`idLivro`, `capaLivro`, `nomeLivro`, `sinopseLivro`, `dtLancamento`, `faixaEtaria`, `idAutor`, `idGenero`, `idEditora`) VALUES
(1, '', 'a culpa é das estrelas', 'kdsjllllllllj', '2022-10-12', 12, 1, 1, 1),
(2, '', 'a culpa é das estrelas 2', 'kdsjllllllllj', '2022-10-12', 12, 1, 1, 1),
(3, NULL, 'Como eu era antes de você', 'Will Traynor, de 35 anos, é inteligente, rico e mal-humorado. Preso a uma cadeira de rodas depois de um acidente de moto, o antes ativo e esportivo Will desconta toda a sua amargura em quem estiver por perto e planeja dar um fim ao seu sofrimento. O que Will não sabe é que Lou está prestes a trazer cor a sua vida.', '2012-01-05', 14, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivroalugado`
--

CREATE TABLE `tblivroalugado` (
  `idLivroAlugado` int(11) NOT NULL,
  `idExemplar` int(11) NOT NULL,
  `idLeitor` int(11) NOT NULL,
  `dataALuguel` date NOT NULL,
  `dataDevolucao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbstatusexemplar`
--

CREATE TABLE `tbstatusexemplar` (
  `idStatusExemplar` int(11) NOT NULL,
  `statusExemplar` tinyint(1) DEFAULT 1,
  `idExemplar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbstatusexemplar`
--

INSERT INTO `tbstatusexemplar` (`idStatusExemplar`, `statusExemplar`, `idExemplar`) VALUES
(1, 1, 0),
(5, 1, 24),
(6, 1, 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtelbiblioteca`
--

CREATE TABLE `tbtelbiblioteca` (
  `idTelBiblioteca` int(11) NOT NULL,
  `numTelBiblioteca` char(14) NOT NULL,
  `idBiblioteca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vwexemplar`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vwexemplar` (
`nomeLivro` varchar(120)
,`numExemplar` int(11)
,`nomeAutor` varchar(60)
,`nomeEditora` char(30)
,`nomeGenero` varchar(20)
,`faixaEtaria` tinyint(2)
,`nomeBiblioteca` varchar(60)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vwexemplar`
--
DROP TABLE IF EXISTS `vwexemplar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwexemplar`  AS SELECT `tblivro`.`nomeLivro` AS `nomeLivro`, `tbexemplar`.`numExemplar` AS `numExemplar`, `tbautor`.`nomeAutor` AS `nomeAutor`, `tbeditora`.`nomeEditora` AS `nomeEditora`, `tbgenero`.`nomeGenero` AS `nomeGenero`, `tblivro`.`faixaEtaria` AS `faixaEtaria`, `tbbiblioteca`.`nomeBiblioteca` AS `nomeBiblioteca` FROM (((((`tbexemplar` join `tblivro` on(`tbexemplar`.`idLivro` = `tblivro`.`idLivro`)) join `tbautor` on(`tblivro`.`idAutor` = `tbautor`.`idAutor`)) join `tbeditora` on(`tblivro`.`idEditora` = `tbeditora`.`idEditora`)) join `tbgenero` on(`tblivro`.`idGenero` = `tbgenero`.`idGenero`)) join `tbbiblioteca` on(`tbexemplar`.`idBiblioteca` = `tbbiblioteca`.`idBiblioteca`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbautor`
--
ALTER TABLE `tbautor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Índices para tabela `tbbiblioteca`
--
ALTER TABLE `tbbiblioteca`
  ADD PRIMARY KEY (`idBiblioteca`),
  ADD UNIQUE KEY `emailBiblioteca` (`emailBiblioteca`);

--
-- Índices para tabela `tbeditora`
--
ALTER TABLE `tbeditora`
  ADD PRIMARY KEY (`idEditora`);

--
-- Índices para tabela `tbexemplar`
--
ALTER TABLE `tbexemplar`
  ADD PRIMARY KEY (`idExemplar`),
  ADD UNIQUE KEY `numExemplar` (`numExemplar`),
  ADD KEY `idBiblioteca` (`idBiblioteca`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Índices para tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Índices para tabela `tbleitor`
--
ALTER TABLE `tbleitor`
  ADD PRIMARY KEY (`idLeitor`),
  ADD UNIQUE KEY `emailLeitor` (`emailLeitor`);

--
-- Índices para tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`idLivro`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idGenero` (`idGenero`),
  ADD KEY `idEditora` (`idEditora`);

--
-- Índices para tabela `tblivroalugado`
--
ALTER TABLE `tblivroalugado`
  ADD PRIMARY KEY (`idLivroAlugado`),
  ADD UNIQUE KEY `idExemplar` (`idExemplar`),
  ADD UNIQUE KEY `idLeitor` (`idLeitor`);

--
-- Índices para tabela `tbstatusexemplar`
--
ALTER TABLE `tbstatusexemplar`
  ADD PRIMARY KEY (`idStatusExemplar`),
  ADD UNIQUE KEY `idExemplar` (`idExemplar`);

--
-- Índices para tabela `tbtelbiblioteca`
--
ALTER TABLE `tbtelbiblioteca`
  ADD PRIMARY KEY (`idTelBiblioteca`),
  ADD UNIQUE KEY `idBiblioteca` (`idBiblioteca`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbbiblioteca`
--
ALTER TABLE `tbbiblioteca`
  MODIFY `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbeditora`
--
ALTER TABLE `tbeditora`
  MODIFY `idEditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbexemplar`
--
ALTER TABLE `tbexemplar`
  MODIFY `idExemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbleitor`
--
ALTER TABLE `tbleitor`
  MODIFY `idLeitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tblivroalugado`
--
ALTER TABLE `tblivroalugado`
  MODIFY `idLivroAlugado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbstatusexemplar`
--
ALTER TABLE `tbstatusexemplar`
  MODIFY `idStatusExemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbtelbiblioteca`
--
ALTER TABLE `tbtelbiblioteca`
  MODIFY `idTelBiblioteca` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbexemplar`
--
ALTER TABLE `tbexemplar`
  ADD CONSTRAINT `tbexemplar_ibfk_1` FOREIGN KEY (`idBiblioteca`) REFERENCES `tbbiblioteca` (`idBiblioteca`),
  ADD CONSTRAINT `tbexemplar_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `tblivro` (`idLivro`);

--
-- Limitadores para a tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `tblivro_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `tbautor` (`idAutor`),
  ADD CONSTRAINT `tblivro_ibfk_2` FOREIGN KEY (`idGenero`) REFERENCES `tbgenero` (`idGenero`),
  ADD CONSTRAINT `tblivro_ibfk_3` FOREIGN KEY (`idEditora`) REFERENCES `tbeditora` (`idEditora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
