-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2022 às 22:33
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

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
  `emailBiblioteca` varchar(60) NOT NULL,
  `senhaBiblioteca` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbeditora`
--

CREATE TABLE `tbeditora` (
  `idEditora` int(11) NOT NULL,
  `nomeEditora` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbexemplar`
--

CREATE TABLE `tbexemplar` (
  `idExemplar` int(11) NOT NULL,
  `numExemplar` int(11) NOT NULL,
  `idLivro` int(11) NOT NULL,
  `idBiblioteca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `idGenero` int(11) NOT NULL,
  `nomeGenero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, NULL, 'Leandro Santos', 'leandro@gmail.com', '', '', '0000-00-00', '', '', '123456.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `idLivro` int(11) NOT NULL,
  `capaLivro` blob NOT NULL,
  `nomeLivro` varchar(45) NOT NULL,
  `sinopseLivro` varchar(1000) NOT NULL,
  `dtLancamento` date NOT NULL,
  `faixaetaria` varchar(5) NOT NULL DEFAULT 'Livre',
  `idAutor` int(11) NOT NULL,
  `idEditora` int(11) NOT NULL,
  `idGenero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `statusExemplar` tinyint(1) DEFAULT NULL,
  `idExemplar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estrutura da tabela `tbtelleitor`
--

CREATE TABLE `tbtelleitor` (
  `idTelLeitor` int(11) NOT NULL,
  `numTelLeitor` char(14) NOT NULL,
  `idLeitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuserbiblioteca`
--

CREATE TABLE `tbuserbiblioteca` (
  `idUserBiblioteca` int(11) NOT NULL,
  `loginUserBiblioteca` varchar(25) NOT NULL,
  `senhaUserBiblioteca` varchar(20) NOT NULL,
  `idBiblioteca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbuserleitor`
--

CREATE TABLE `tbuserleitor` (
  `idUserLeitor` int(11) NOT NULL,
  `loginUserLeitor` varchar(40) NOT NULL,
  `senhaUserLeitor` varchar(20) NOT NULL,
  `idLeitor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`idBiblioteca`);

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
  ADD UNIQUE KEY `idLivro` (`idLivro`),
  ADD UNIQUE KEY `idBiblioteca` (`idBiblioteca`);

--
-- Índices para tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Índices para tabela `tbleitor`
--
ALTER TABLE `tbleitor`
  ADD PRIMARY KEY (`idLeitor`);

--
-- Índices para tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD PRIMARY KEY (`idLivro`),
  ADD UNIQUE KEY `idAutor` (`idAutor`),
  ADD UNIQUE KEY `idEditora` (`idEditora`),
  ADD UNIQUE KEY `idGenero` (`idGenero`);

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
-- Índices para tabela `tbtelleitor`
--
ALTER TABLE `tbtelleitor`
  ADD PRIMARY KEY (`idTelLeitor`),
  ADD UNIQUE KEY `idLeitor` (`idLeitor`);

--
-- Índices para tabela `tbuserbiblioteca`
--
ALTER TABLE `tbuserbiblioteca`
  ADD PRIMARY KEY (`idUserBiblioteca`),
  ADD UNIQUE KEY `idBiblioteca` (`idBiblioteca`);

--
-- Índices para tabela `tbuserleitor`
--
ALTER TABLE `tbuserleitor`
  ADD PRIMARY KEY (`idUserLeitor`),
  ADD UNIQUE KEY `idLeitor` (`idLeitor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbbiblioteca`
--
ALTER TABLE `tbbiblioteca`
  MODIFY `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbeditora`
--
ALTER TABLE `tbeditora`
  MODIFY `idEditora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbexemplar`
--
ALTER TABLE `tbexemplar`
  MODIFY `idExemplar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbleitor`
--
ALTER TABLE `tbleitor`
  MODIFY `idLeitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblivroalugado`
--
ALTER TABLE `tblivroalugado`
  MODIFY `idLivroAlugado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbstatusexemplar`
--
ALTER TABLE `tbstatusexemplar`
  MODIFY `idStatusExemplar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelbiblioteca`
--
ALTER TABLE `tbtelbiblioteca`
  MODIFY `idTelBiblioteca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtelleitor`
--
ALTER TABLE `tbtelleitor`
  MODIFY `idTelLeitor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbuserbiblioteca`
--
ALTER TABLE `tbuserbiblioteca`
  MODIFY `idUserBiblioteca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbuserleitor`
--
ALTER TABLE `tbuserleitor`
  MODIFY `idUserLeitor` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
