-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2022 às 04:24
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

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAutor` (IN `nome` VARCHAR(60))  BEGIN	
	DECLARE codAutor int;
    insert INTO tbAutor(nomeAutor)
    	values(nome);
        set codAutor = (select max(idAutor) from tbAutor);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spContaLivro` (IN `biblioteca` INT)  BEGIN
    SELECT count(nomeLivro) as qtd, nomeLivro, nomeBiblioteca FROM tbExemplar
        INNER JOIN tbLivro ON tbExemplar.idLivro = tbLivro.idLivro
            INNER JOIN tbBiblioteca ON tbExemplar.idBiblioteca = tbBiblioteca.idBiblioteca
                WHERE tbExemplar.idBiblioteca = biblioteca
               		GROUP by nomeLivro;       
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `spInsertLeitor` (IN `nome` VARCHAR(60), IN `email` VARCHAR(60), IN `senha` VARCHAR(20))  BEGIN	
	DECLARE codLeitor int;
        insert INTO tbLeitor(nomeLeitor, emailLeitor, senhaLeitor)
            values(nome, email, senha);
            set codLeitor = (select max(idLeitor) from tbLeitor);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diafuncionamento`
--

CREATE TABLE `diafuncionamento` (
  `idDiaFuncionamento` int(11) NOT NULL,
  `horarioAbertura` time DEFAULT NULL,
  `horarioFechamneto` time DEFAULT NULL,
  `diaSemana` int(1) DEFAULT NULL,
  `statusFuncionamento` tinyint(1) DEFAULT NULL,
  `idBiblioteca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

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
(2, 'jojo moyes'),
(3, 'j.k rolling'),
(4, 'jorge amado'),
(5, 'pedro bandeira'),
(6, 'stephen king'),
(7, 'william peter blatty'),
(8, 'neil gaiman'),
(9, ' antoine de saint-exupéry ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbbiblioteca`
--

CREATE TABLE `tbbiblioteca` (
  `idBiblioteca` int(11) NOT NULL,
  `fotoBiblioteca` varchar(180) NOT NULL,
  `nomeBiblioteca` varchar(60) NOT NULL,
  `ruaBiblioteca` varchar(35) NOT NULL,
  `numBiblioteca` varchar(10) NOT NULL,
  `compBiblioteca` varchar(30) NOT NULL,
  `cepBiblioteca` char(9) NOT NULL,
  `bairroBiblioteca` varchar(35) NOT NULL,
  `cidadeBiblioteca` varchar(30) NOT NULL,
  `horarioAbertura` time NOT NULL,
  `horarioFechamento` time NOT NULL,
  `telBiblioteca` varchar(14) NOT NULL,
  `senhaBiblioteca` varchar(20) NOT NULL,
  `emailBiblioteca` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbbiblioteca`
--

INSERT INTO `tbbiblioteca` (`idBiblioteca`, `fotoBiblioteca`, `nomeBiblioteca`, `ruaBiblioteca`, `numBiblioteca`, `compBiblioteca`, `cepBiblioteca`, `bairroBiblioteca`, `cidadeBiblioteca`, `horarioAbertura`, `horarioFechamento`, `telBiblioteca`, `senhaBiblioteca`, `emailBiblioteca`) VALUES
(3, 'image/biblioteca/16693913006380e3c46610a.jpg', 'cora coralina', 'Rua Otelo Augusto Ribeiro', '113', '', '08412-000', 'Guaianazes', 'São Paulo', '03:00:00', '04:00:00', '(11) 4002-8555', '123456', 'coracoralina@gmail.com'),
(4, 'image/biblioteca/166975428963866db11ac7a.jpg', 'Mario de Andrade', 'Rua da Consolação', '94', '', '01302-000', 'Republica', 'São Paulo', '00:00:00', '00:00:00', '', '123456', 'marioandrade@gmail.com'),
(5, 'image/biblioteca/1669234115637e7dc3e2783.jpg', 'Sérgio Buarque de Holanda', 'Rua Victório Santim', '44', '', '08290-000', 'Vila Carmosina', 'São Paulo', '23:50:00', '08:25:00', '(21) 4002-8', '123456', 'sergiobuarque@gmail.com'),
(7, '', 'Vanessa library', 'Rua Feliciano de Mendonça', '290', '', '08460-365', 'Jardim São Paulo(Zona Leste)', 'bahia', '00:00:00', '00:00:00', '', '123456', 'cora@gmail.com'),
(8, 'image/biblioteca/1669743318638642d6ac350.jpg', 'Biblioteca Machado de Assis', 'Rua Feliciano de Mendonça', '290', '', '08460-365', 'Jardim São Paulo(Zona Leste)', 'São Paulo', '09:00:00', '18:00:00', '(11) 5555-5555', '123456', 'machado@gmail.com');

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
(1, 'intrinseca'),
(2, 'rocco'),
(3, 'Companhia das letras'),
(5, 'Moderna'),
(6, 'suma'),
(7, 'harpercollins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbexemplar`
--

CREATE TABLE `tbexemplar` (
  `idExemplar` int(11) NOT NULL,
  `numExemplar` int(11) DEFAULT NULL,
  `idLivro` int(11) DEFAULT NULL,
  `idBiblioteca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbexemplar`
--

INSERT INTO `tbexemplar` (`idExemplar`, `numExemplar`, `idLivro`, `idBiblioteca`) VALUES
(1, 2, 13, 3),
(3, 3, 14, 3),
(6, 1, 14, 4),
(48, 99, 13, 4),
(50, 13, 14, 3),
(51, 5, 15, 4),
(52, 8, 15, 3),
(53, 5, 16, 3),
(54, 1, 17, 7),
(55, 16, 18, 3),
(64, 1, 13, 8),
(65, 666, 22, 3);

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
(1, 'romance'),
(2, 'ação'),
(3, 'literatura'),
(4, 'ficção'),
(5, 'terror');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbleitor`
--

CREATE TABLE `tbleitor` (
  `idLeitor` int(11) NOT NULL,
  `fotoLeitor` varchar(120) DEFAULT NULL,
  `nomeLeitor` varchar(60) NOT NULL,
  `emailLeitor` varchar(120) NOT NULL,
  `cpfLeitor` char(14) NOT NULL,
  `rgLeitor` char(12) NOT NULL,
  `dtNascLeitor` date NOT NULL,
  `generoLeitor` varchar(9) NOT NULL,
  `loginLeitor` varchar(25) NOT NULL,
  `senhaLeitor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbleitor`
--

INSERT INTO `tbleitor` (`idLeitor`, `fotoLeitor`, `nomeLeitor`, `emailLeitor`, `cpfLeitor`, `rgLeitor`, `dtNascLeitor`, `generoLeitor`, `loginLeitor`, `senhaLeitor`) VALUES
(1, 'image/leitor/166941490863813ffc73de0.jpg', 'julia', 'julianery@gmail.com', '54065713897', '390382383', '2004-04-22', 'feminino', 'nerygo', '123456'),
(6, 'image/leitor/16693862616380d01573798.jpg', 'ricardo vicente', 'rick@gmail.com', '540.657.138-97', '3903820383', '2005-04-20', 'masculino', 'rick', '123456'),
(9, 'image/leitor/1669495265638279e115c46.jpg', 'sthefany alves', 'sthefany@gmail.com', '154.189.290-97', '365167514', '2006-09-07', 'feminino', 'teteh', '123456'),
(12, 'image/leitor/1669413157638139252e626.jpg', 'Julia de Brito', 'julhamita@gmail.com', '5181506186', '305055835', '2004-04-25', 'feminino', 'JulhaMita', '123456'),
(13, 'image/leitor/166941383963813bcfac478.jpg', 'Isabella Generoso', 'sabella@gmail.com', '23066427960', '115515197', '2022-12-02', 'feminino', 'sabella', '123456'),
(14, 'image/leitor/166941425663813d70d2a52.jpg', 'Tabata Dreux', 'tbtdrx@gmail.com', '494124507', '494124507', '2003-11-13', 'feminino', 'tbtdrx', '123456'),
(15, NULL, 'Vanessa', 'vanessa@gmail.com', '', '', '0000-00-00', '', '', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivro`
--

CREATE TABLE `tblivro` (
  `idLivro` int(11) NOT NULL,
  `capaLivro` varchar(120) NOT NULL,
  `nomeLivro` varchar(120) DEFAULT NULL,
  `sinopseLivro` varchar(2000) DEFAULT NULL,
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
(13, 'image/livro/16684763316372edab2193b.jpg', 'A culpa é das Estrelas', 'Hazel Grace Lancaster e Augustus Waters são dois adolescentes que se conhecem em um grupo de apoio para pacientes com câncer. Por causa da doença, Hazel sempre descartou a ideia de se envolver amorosamente, mas acaba cedendo ao se apaixonar por Augustus. Juntos, eles viajam para Amsterdã, onde embarcam em uma jornada inesquecível.', '2014-06-05', 14, 1, 1, 1),
(14, 'image/livro/1668481493637301d5275ea.jpg', 'A droga do amor', 'Uma turma de adolescentes enfrenta o mais diabólico dos crimes! Num clima de muito mistério e suspense, cinco estudantes – os Karas – enfrentam uma macabra trama internacional: o sinistro Doutor Q.I. pretende subjugar a humanidade aos seus desígnios, aplicando na juventude uma perigosa droga!', '1984-01-01', 13, 5, 4, 5),
(15, 'image/livro/16693983686380ff606a900.jpg', 'Harry Potter e a Câmara Secreta', 'Após as sofríveis férias na casa dos tios, Harry Potter se prepara para voltar a Hogwarts e começar seu segundo ano na escola de bruxos. Na véspera do início das aulas, a estranha criatura Dobby aparece em seu quarto e o avisa de que voltar é um erro e que algo muito ruim pode acontecer se Harry insistir em continuar os estudos de bruxaria. O garoto, no entanto, está disposto a correr o risco e se livrar do lar problemático.', '2018-01-30', 16, 3, 1, 2),
(16, 'image/livro/16693988596381014b599a0.jpg', 'Capitães de areia', 'Pedro Bala, Professor, Gato, Sem Pernas e Boa Vida são adolescentes abandonados por suas famílias, que crescem nas ruas de Salvador e vivem em comunidade no Trapiche. Eles praticam uma série de assaltos e são constantemente perseguidos pela polícia. Um dia, Professor conhece Dora e seu irmão Zé Fuinha e os leva até o Trapiche, o que desencadeia a excitação dos demais garotos, que não estão acostumados à presença de uma mulher no local. Aos poucos, nasce o afeto entre o líder do grupo e a jovem.', '2009-08-01', 16, 4, 1, 5),
(17, 'image/livro/16693998366381051c2b365.jpg', 'Harry Potter e o Enigma do Príncipe', 'No sexto ano de Harry em Hogwarts, Lord Voldemort e seus Comensais da Morte estão criando o terror nos mundos bruxo e trouxa. Dumbledore convence seu velho amigo Horácio Slughorn para retornar a Hogwarts como professor de poções após Harry encontrar um estranho livro escolar. Draco Malfoy se esforça para realizar uma ação destinada por Voldemort, enquanto Dumbledore e Harry secretamente trabalham juntos a fim de descobrir o método para destruir o Lorde das Trevas uma vez por todas.\r\n', '2005-06-16', 12, 3, 4, 2),
(18, 'image/livro/166967326963853135b56a9.jpg', 'Como eu era antes de você', 'Will Traynor, de 35 anos, é inteligente, rico e mal-humorado. Preso a uma cadeira de rodas depois de um acidente de moto, o antes ativo e esportivo Will desconta toda a sua amargura em quem estiver por perto e planeja dar um fim ao seu sofrimento. O que Will não sabe é que Lou está prestes a trazer cor a sua vida.', '2018-01-30', 16, 2, 1, 1),
(19, 'image/livro/166976688763869ee720ed4.jpg', 'IT A coisa', 'Durante as férias de 1958, em uma pacata cidadezinha do Maine, Bill, Richie, Stan, Mike, Eddie, Ben e Beverly aprenderam o real sentido da amizade, do amor, da confiança… e do medo. O mais profundo e tenebroso medo. Naquele verão, eles enfrentaram pela primeira vez a Coisa, um ser sobrenatural e maligno que deixou terríveis marcas de sangue em Derry. Quase trinta anos depois, os amigos voltam a se encontrar. Uma nova onda de terror tomou a pequena cidade. Mike Hanlon, o único que permaneceu em Derry, dá o sinal. Precisam unir forças novamente. A Coisa volta a atacar e eles devem cumprir a promessa selada com sangue que fizeram quando crianças. Só eles têm a chave do enigma. Só eles sabem o que se esconde nas entranhas de Derry. O tempo é curto, mas somente eles podem vencer a Coisa. Neste clássico de Stephen King, os amigos irão até o fim, mesmo que isso signifique ultrapassar os próprios limites.', '1986-09-15', 16, 6, 5, 6),
(20, 'image/livro/16697676976386a211dbc88.jpg', 'O Exorcista', 'O exorcista é o livro que deu origem ao maior filme de terror do século XX. Quatro décadas após chocar o mundo inteiro, a obra-prima de William Peter Blatty permanece uma metáfora moderna do combate entre o sagrado e o profano, em um dos romances mais macabros já escritos.\r\nInspirado no caso real do exorcismo de um adolescente, o escritor William Peter Blatty publicou em 1971 a perturbadora história de Chris MacNeil, uma atriz que sofre com inesperadas mudanças no comportamento da filha de 11 anos, Regan. Quando todos os esforços da ciência para descobrir o que há de errado com a menina falham e uma personalidade demoníaca parece vir à tona, Chris busca a ajuda da Igreja para tentar livrar a filha do que parece ser um raro caso de possessão. Cabe a Damien Karras, um padre da universidade de Georgetown, salvar a alma de Regan e ao mesmo tempo tentar restabelecer a própria fé, abalada desde a morte da mãe.\r\nNeste livro, Blatty conseguiu dar ao demônio a sua face mais revoltante: a corrupção de uma alma inocente. A menina Regan é, ao mesmo tempo, o mal e sua vítima. Ela recebe a pena e a revolta de leitores e espectadores em doses equivalentes e, mesmo quarenta anos depois, seu sofrimento e o abismo entre o que ela era e o que se torna continuam nos atormentando a cada página, a cada cena. Um clássico do terror que se mantém atual como somente os grandes nomes do gênero poderiam criar, O exorcista não se trata apenas de uma simples história sobre o bem contra o mal, ou sobre Deus contra o Demônio, mas também sobre a renovação da fé.', '1971-01-01', 16, 7, 5, 7),
(21, 'image/livro/16697681286386a3c00c05f.jpg', 'Coraline', 'Certas portas não devem ser abertas. E Coraline descobre isso pouco tempo depois de chegar com os pais à sua nova casa, um apartamento em um casarão antigo ocupado por vizinhos excêntricos e envolto por uma névoa insistente, um mundo de estranhezas e magia, o tipo de universo que apenas Neil Gaiman pode criar.\r\nAo abrir uma porta misteriosa na sala de casa, a menina se depara com um lugar macabro e fascinante. Ali, naquele outro mundo, seus outros pais são criaturas muito pálidas, com botões negros no lugar dos olhos, sempre dispostos a lhe dar atenção, fazer suas comidas preferidas e mostrar os brinquedos mais divertidos. Coraline enfim se sente... em casa. Mas essa sensação logo desaparece, quando ela descobre que o lugar guarda mistérios e perigos, e a menina se dá conta de que voltar para sua verdadeira casa vai ser muito mais difícil — e assustador — do que imaginava.\r\n\r\nPublicado pela primeira vez em 2002, Coraline foi o primeiro livro de Neil Gaiman para o público infantojuvenil e se tornou uma das obras mais emblemáticas do escritor. Repleta de elementos ao mesmo tempo sombrios e lúdicos, a história conquistou crianças e adultos em todo o mundo e, em 2009, ganhou as telas de cinema em uma animação dirigida por Henry Selick, de O estranho mundo de Jack. Nesta edição especial em capa dura, com introdução do autor e projeto gráfico exclusivo, coube ao renomado ilustrador Chris Riddell dar vida ao universo mágico e aterrorizante criado por Neil Gaiman.', '2020-06-19', 12, 8, 5, 1),
(22, 'image/livro/16697688996386a6c3c8ac1.jpg', 'O iluminado', '“O lugar perfeito para recomeçar”, é o que pensa Jack Torrance ao ser contratado como zelador para o inverno. Hora de deixar para trás o alcoolismo, os acessos de fúria, os repetidos fracassos. Isolado pela neve com a esposa e o filho, tudo o que Jack deseja é um pouco de paz para se dedicar à escrita. Mas, conforme o inverno se aprofunda, o local paradisíaco começa a parecer cada vez mais remoto... e mais sinistro. Forças malignas habitam o Overlook, e tentam se apoderar de Danny Torrance, um garotinho com grandes poderes sobrenaturais. Possuir o menino, no entanto, se mostra mais difícil do que esperado. Então os espíritos resolvem se aproveitar das fraquezas do pai... Um dos livros mais assustadores de todos os tempos, O iluminado é um clássico de Stephen King. Edição especial com tradução revisada e prólogo e epílogo inéditos.', '1977-01-28', 16, 6, 5, 6),
(23, 'image/livro/16697692146386a7fe7285b.jpg', 'O pequeno principe', 'Nesta clássica história que marcou gerações de leitores em todo o mundo, um piloto cai com seu avião no deserto do Saara e encontra um pequeno príncipe, que o leva a uma jornada filosófica e poética através de planetas que encerram a solidão humana. A edição conta com a clássica tradução', '1946-04-06', 10, 9, 4, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblivroalugado`
--

CREATE TABLE `tblivroalugado` (
  `idLivroAlugado` int(11) NOT NULL,
  `idExemplar` int(11) DEFAULT NULL,
  `dataAluguel` date DEFAULT NULL,
  `dataDevolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tblivroalugado`
--

INSERT INTO `tblivroalugado` (`idLivroAlugado`, `idExemplar`, `dataAluguel`, `dataDevolucao`) VALUES
(1, 1, '2022-11-14', '2022-11-30'),
(2, 50, '2022-11-08', '2022-11-30'),
(3, 3, '2022-11-23', '2022-11-30'),
(4, 50, '2022-11-24', '2022-11-25');

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
(6, 1, 26),
(7, 1, 28),
(8, 1, 29),
(9, 1, 30),
(10, 1, 31),
(11, 1, 32),
(12, 1, 33),
(13, 1, 34),
(14, 1, 35),
(15, 1, 1),
(16, 1, 2),
(17, 0, 3),
(18, 1, 4),
(19, 1, 5),
(20, 1, 6),
(21, 1, 7),
(22, 1, 8),
(23, 1, 9),
(24, 1, 10),
(25, 1, 11),
(26, 1, 12),
(27, 1, 13),
(28, 1, 14),
(29, 1, 15),
(30, 1, 16),
(31, 1, 17),
(32, 1, 18),
(33, 1, 19),
(34, 1, 20),
(35, 1, 21),
(39, 1, 25),
(41, 1, 27),
(50, 1, 36),
(51, 1, 37),
(52, 1, 38),
(53, 1, 39),
(54, 1, 40),
(55, 1, 41),
(61, 1, 43),
(63, 1, 44),
(78, 1, 48),
(81, 1, 50),
(82, 1, 51),
(83, 1, 52),
(86, 1, 53),
(89, 1, 54),
(91, 1, 55),
(106, 1, 64),
(107, 1, 65);

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
-- Estrutura da tabela `tbvistos`
--

CREATE TABLE `tbvistos` (
  `idVistos` int(11) NOT NULL,
  `idLeitor` int(11) DEFAULT NULL,
  `idLivro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vwcontalivro`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vwcontalivro` (
`qtd` bigint(21)
,`nomeLivro` varchar(120)
,`nomeBiblioteca` varchar(60)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vwexemplar`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vwexemplar` (
`statusExemplar` tinyint(1)
,`nomeLivro` varchar(120)
,`capaLivro` varchar(120)
,`numExemplar` int(11)
,`idExemplar` int(11)
,`idBiblioteca` int(11)
,`nomeAutor` varchar(60)
,`nomeEditora` char(30)
,`nomeGenero` varchar(20)
,`faixaEtaria` tinyint(2)
,`sinopseLivro` varchar(2000)
,`dtLancamento` date
,`nomeBiblioteca` varchar(60)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vwlivro`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vwlivro` (
`idLivro` int(11)
,`nomeLivro` varchar(120)
,`capaLivro` varchar(120)
,`nomeAutor` varchar(60)
,`nomeEditora` char(30)
,`nomeGenero` varchar(20)
,`faixaEtaria` tinyint(2)
,`dtLancamento` date
,`sinopseLivro` varchar(2000)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vwlivrobiblioteca`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vwlivrobiblioteca` (
`capaLivro` varchar(120)
,`nomeLivro` varchar(120)
,`numExemplar` int(11)
,`idBiblioteca` int(11)
,`idExemplar` int(11)
,`nomeAutor` varchar(60)
,`nomeGenero` varchar(20)
,`nomeEditora` char(30)
,`faixaEtaria` tinyint(2)
,`sinopseLivro` varchar(2000)
,`dtLancamento` date
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vwlivros`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vwlivros` (
`idLivro` int(11)
,`nomeLivro` varchar(120)
,`nomeAutor` varchar(60)
,`nomeEditora` char(30)
,`nomeGenero` varchar(20)
,`faixaEtaria` tinyint(2)
,`dtLancamento` date
,`sinopseLivro` varchar(2000)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `wvcontalivro`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `wvcontalivro` (
`qtd` bigint(21)
,`nomeLivro` varchar(120)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vwcontalivro`
--
DROP TABLE IF EXISTS `vwcontalivro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcontalivro`  AS SELECT count(`tblivro`.`nomeLivro`) AS `qtd`, `tblivro`.`nomeLivro` AS `nomeLivro`, `tbbiblioteca`.`nomeBiblioteca` AS `nomeBiblioteca` FROM ((`tbexemplar` join `tblivro` on(`tbexemplar`.`idLivro` = `tblivro`.`idLivro`)) join `tbbiblioteca` on(`tbexemplar`.`idBiblioteca` = `tbbiblioteca`.`idBiblioteca`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vwexemplar`
--
DROP TABLE IF EXISTS `vwexemplar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwexemplar`  AS SELECT `tbstatusexemplar`.`statusExemplar` AS `statusExemplar`, `tblivro`.`nomeLivro` AS `nomeLivro`, `tblivro`.`capaLivro` AS `capaLivro`, `tbexemplar`.`numExemplar` AS `numExemplar`, `tbexemplar`.`idExemplar` AS `idExemplar`, `tbexemplar`.`idBiblioteca` AS `idBiblioteca`, `tbautor`.`nomeAutor` AS `nomeAutor`, `tbeditora`.`nomeEditora` AS `nomeEditora`, `tbgenero`.`nomeGenero` AS `nomeGenero`, `tblivro`.`faixaEtaria` AS `faixaEtaria`, `tblivro`.`sinopseLivro` AS `sinopseLivro`, `tblivro`.`dtLancamento` AS `dtLancamento`, `tbbiblioteca`.`nomeBiblioteca` AS `nomeBiblioteca` FROM ((((((`tbexemplar` join `tblivro` on(`tbexemplar`.`idLivro` = `tblivro`.`idLivro`)) join `tbautor` on(`tblivro`.`idAutor` = `tbautor`.`idAutor`)) join `tbeditora` on(`tblivro`.`idEditora` = `tbeditora`.`idEditora`)) join `tbgenero` on(`tblivro`.`idGenero` = `tbgenero`.`idGenero`)) join `tbbiblioteca` on(`tbexemplar`.`idBiblioteca` = `tbbiblioteca`.`idBiblioteca`)) join `tbstatusexemplar` on(`tbexemplar`.`idExemplar` = `tbstatusexemplar`.`idExemplar`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vwlivro`
--
DROP TABLE IF EXISTS `vwlivro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwlivro`  AS SELECT `tblivro`.`idLivro` AS `idLivro`, `tblivro`.`nomeLivro` AS `nomeLivro`, `tblivro`.`capaLivro` AS `capaLivro`, `tbautor`.`nomeAutor` AS `nomeAutor`, `tbeditora`.`nomeEditora` AS `nomeEditora`, `tbgenero`.`nomeGenero` AS `nomeGenero`, `tblivro`.`faixaEtaria` AS `faixaEtaria`, `tblivro`.`dtLancamento` AS `dtLancamento`, `tblivro`.`sinopseLivro` AS `sinopseLivro` FROM (((`tblivro` join `tbautor` on(`tblivro`.`idAutor` = `tbautor`.`idAutor`)) join `tbeditora` on(`tblivro`.`idEditora` = `tbeditora`.`idEditora`)) join `tbgenero` on(`tblivro`.`idGenero` = `tbgenero`.`idGenero`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vwlivrobiblioteca`
--
DROP TABLE IF EXISTS `vwlivrobiblioteca`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwlivrobiblioteca`  AS SELECT `tblivro`.`capaLivro` AS `capaLivro`, `tblivro`.`nomeLivro` AS `nomeLivro`, `tbexemplar`.`numExemplar` AS `numExemplar`, `tbexemplar`.`idBiblioteca` AS `idBiblioteca`, `tbexemplar`.`idExemplar` AS `idExemplar`, `tbautor`.`nomeAutor` AS `nomeAutor`, `tbgenero`.`nomeGenero` AS `nomeGenero`, `tbeditora`.`nomeEditora` AS `nomeEditora`, `tblivro`.`faixaEtaria` AS `faixaEtaria`, `tblivro`.`sinopseLivro` AS `sinopseLivro`, `tblivro`.`dtLancamento` AS `dtLancamento` FROM ((((`tbexemplar` join `tblivro` on(`tblivro`.`idLivro` = `tbexemplar`.`idLivro`)) join `tbautor` on(`tblivro`.`idAutor` = `tbautor`.`idAutor`)) join `tbgenero` on(`tblivro`.`idGenero` = `tbgenero`.`idGenero`)) join `tbeditora` on(`tblivro`.`idEditora` = `tbeditora`.`idEditora`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vwlivros`
--
DROP TABLE IF EXISTS `vwlivros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwlivros`  AS SELECT `tblivro`.`idLivro` AS `idLivro`, `tblivro`.`nomeLivro` AS `nomeLivro`, `tbautor`.`nomeAutor` AS `nomeAutor`, `tbeditora`.`nomeEditora` AS `nomeEditora`, `tbgenero`.`nomeGenero` AS `nomeGenero`, `tblivro`.`faixaEtaria` AS `faixaEtaria`, `tblivro`.`dtLancamento` AS `dtLancamento`, `tblivro`.`sinopseLivro` AS `sinopseLivro` FROM (((`tblivro` join `tbautor` on(`tblivro`.`idAutor` = `tbautor`.`idAutor`)) join `tbeditora` on(`tblivro`.`idEditora` = `tbeditora`.`idEditora`)) join `tbgenero` on(`tblivro`.`idGenero` = `tbgenero`.`idGenero`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `wvcontalivro`
--
DROP TABLE IF EXISTS `wvcontalivro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `wvcontalivro`  AS SELECT count(`tblivro`.`nomeLivro`) AS `qtd`, `tblivro`.`nomeLivro` AS `nomeLivro` FROM (`tblivro` join `tbexemplar` on(`tbexemplar`.`idLivro` = `tblivro`.`idLivro`)) GROUP BY `tblivro`.`nomeLivro` ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `diafuncionamento`
--
ALTER TABLE `diafuncionamento`
  ADD PRIMARY KEY (`idDiaFuncionamento`),
  ADD KEY `idBiblioteca` (`idBiblioteca`);

--
-- Índices para tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices para tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices para tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices para tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices para tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices para tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices para tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices para tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices para tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices para tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices para tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices para tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

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
  ADD UNIQUE KEY `idExemplar` (`idExemplar`),
  ADD KEY `idLivro` (`idLivro`),
  ADD KEY `idBiblioteca` (`idBiblioteca`);

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
  ADD KEY `idExemplar` (`idExemplar`);

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
-- Índices para tabela `tbvistos`
--
ALTER TABLE `tbvistos`
  ADD PRIMARY KEY (`idVistos`),
  ADD KEY `idLeitor` (`idLeitor`),
  ADD KEY `idLivro` (`idLivro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diafuncionamento`
--
ALTER TABLE `diafuncionamento`
  MODIFY `idDiaFuncionamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbautor`
--
ALTER TABLE `tbautor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tbbiblioteca`
--
ALTER TABLE `tbbiblioteca`
  MODIFY `idBiblioteca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbeditora`
--
ALTER TABLE `tbeditora`
  MODIFY `idEditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbexemplar`
--
ALTER TABLE `tbexemplar`
  MODIFY `idExemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbleitor`
--
ALTER TABLE `tbleitor`
  MODIFY `idLeitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tblivro`
--
ALTER TABLE `tblivro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tblivroalugado`
--
ALTER TABLE `tblivroalugado`
  MODIFY `idLivroAlugado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbstatusexemplar`
--
ALTER TABLE `tbstatusexemplar`
  MODIFY `idStatusExemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `tbtelbiblioteca`
--
ALTER TABLE `tbtelbiblioteca`
  MODIFY `idTelBiblioteca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbvistos`
--
ALTER TABLE `tbvistos`
  MODIFY `idVistos` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `diafuncionamento`
--
ALTER TABLE `diafuncionamento`
  ADD CONSTRAINT `diafuncionamento_ibfk_1` FOREIGN KEY (`idBiblioteca`) REFERENCES `tbbiblioteca` (`idBiblioteca`);

--
-- Limitadores para a tabela `tbexemplar`
--
ALTER TABLE `tbexemplar`
  ADD CONSTRAINT `tbexemplar_ibfk_1` FOREIGN KEY (`idLivro`) REFERENCES `tblivro` (`idLivro`),
  ADD CONSTRAINT `tbexemplar_ibfk_2` FOREIGN KEY (`idBiblioteca`) REFERENCES `tbbiblioteca` (`idBiblioteca`);

--
-- Limitadores para a tabela `tblivro`
--
ALTER TABLE `tblivro`
  ADD CONSTRAINT `tblivro_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `tbautor` (`idAutor`),
  ADD CONSTRAINT `tblivro_ibfk_2` FOREIGN KEY (`idGenero`) REFERENCES `tbgenero` (`idGenero`),
  ADD CONSTRAINT `tblivro_ibfk_3` FOREIGN KEY (`idEditora`) REFERENCES `tbeditora` (`idEditora`);

--
-- Limitadores para a tabela `tblivroalugado`
--
ALTER TABLE `tblivroalugado`
  ADD CONSTRAINT `tblivroalugado_ibfk_1` FOREIGN KEY (`idExemplar`) REFERENCES `tbexemplar` (`idExemplar`);

--
-- Limitadores para a tabela `tbvistos`
--
ALTER TABLE `tbvistos`
  ADD CONSTRAINT `tbvistos_ibfk_1` FOREIGN KEY (`idLeitor`) REFERENCES `tbleitor` (`idLeitor`),
  ADD CONSTRAINT `tbvistos_ibfk_2` FOREIGN KEY (`idLivro`) REFERENCES `tblivro` (`idLivro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
