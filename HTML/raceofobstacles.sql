-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Fev-2017 às 18:20
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raceofobstacles`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `valor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `configs`
--

INSERT INTO `configs` (`id`, `nome`, `valor`) VALUES
(1, 'colorsLaps', '#CCCCCC;#D9D93F;#4DFF40'),
(2, 'oitavos', '2'),
(3, 'quartos', '2'),
(4, 'meias', '2'),
(5, 'final', '3'),
(6, 'terceiro', '2'),
(7, 'penalty', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `finals`
--

CREATE TABLE `finals` (
  `id` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `posicao` int(11) NOT NULL,
  `id_equipa` int(11) NOT NULL,
  `n_vitorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `finals`
--

INSERT INTO `finals` (`id`, `round`, `posicao`, `id_equipa`, `n_vitorias`) VALUES
(1, 1, 6, 8, 0),
(2, 1, 2, 4, 0),
(3, 1, 4, 9, 0),
(4, 1, 5, 5, 0),
(5, 1, 1, 6, 0),
(6, 1, 3, 3, 0),
(7, 1, 7, 7, 0),
(8, 1, 8, 2, 0),
(9, 1, 9, 1, 0),
(10, 1, 10, 10, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalsteams`
--

CREATE TABLE `finalsteams` (
  `id` int(11) NOT NULL,
  `idTeam` int(11) NOT NULL,
  `nomeTeam` varchar(50) NOT NULL,
  `positions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultados_final`
--

CREATE TABLE `resultados_final` (
  `id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `valor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rounds`
--

CREATE TABLE `rounds` (
  `id` int(11) NOT NULL,
  `toWin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rounds`
--

INSERT INTO `rounds` (`id`, `toWin`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 3),
(5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `tempo` varchar(150) NOT NULL DEFAULT '59:59:999',
  `voltas` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `teams`
--

INSERT INTO `teams` (`id`, `nome`, `tempo`, `voltas`) VALUES
(1, 'MiniBots', '00:09:122', 1),
(4, 'Robotis', '00:07:621', 1),
(5, 'Os_Guedes', '59:59:999', 0),
(6, 'FireWheels', '59:59:999', 0),
(7, 'Baiao1', '59:59:999', 0),
(8, 'Baiao2', '59:59:999', 0),
(9, 'AEFA1', '59:59:999', 0),
(10, 'AEFA2', '59:59:999', 0),
(13, 'ROBOYS2017', '59:59:999', 0),
(14, 'flashrobot', '59:59:999', 0),
(15, 'BitByte', '59:59:999', 0),
(16, 'AEVA_A', '59:59:999', 0),
(17, 'MECAS PO', '59:59:999', 0),
(18, 'Meirinhas', '59:59:999', 0),
(19, 'IEMA ', '59:59:999', 0),
(21, 'RobotLRA', '59:59:999', 0),
(22, 'Robotop', '59:59:999', 0),
(23, 'MECAS_ER', '59:59:999', 0),
(27, 'INETEBOT 1', '59:59:999', 0),
(28, 'INETEBOT 2', '59:59:999', 0),
(30, 'Robot Erc', '59:59:999', 0),
(31, 'Biscoito', '59:59:999', 0),
(32, 'sa2020', '59:59:999', 0),
(33, 'sa2021', '59:59:999', 0),
(34, 'FafeBot', '59:59:999', 0),
(35, 'DevRobot', '59:59:999', 0),
(36, 'AEVA_B', '59:59:999', 0),
(37, 'O_Empada', '59:59:999', 0),
(38, 'OrbitXL', '59:59:999', 0),
(39, 'mlpXL', '59:59:999', 0),
(40, 'Virus', '59:59:999', 0),
(41, 'AntiVirus', '59:59:999', 0),
(42, 'EBTAIPAS1', '59:59:999', 0),
(43, 'GagoWatch', '59:59:999', 0),
(44, 'TeamPI10', '59:59:999', 0),
(45, 'teslanosta', '59:59:999', 0),
(47, 'Tecnicos', '59:59:999', 0),
(48, 'ROBOESAS', '59:59:999', 0),
(49, 'MBytinhos', '59:59:999', 0),
(50, 'Gort', '59:59:999', 0),
(51, 'DAI Team', '59:59:999', 0),
(52, 'Robnaticos', '59:59:999', 0),
(53, 'Robzilla', '59:59:999', 0),
(54, 'SkyFusion', '59:59:999', 0),
(55, 'Autobots', '59:59:999', 0),
(56, 'ESJD1', '59:59:999', 0),
(57, 'ESJD2', '59:59:999', 0),
(58, 'ESJD3', '59:59:999', 0),
(59, 'EBMMO', '59:59:999', 0),
(60, 'EletroBOT', '59:59:999', 0),
(61, 'TorreBOT', '59:59:999', 0),
(62, 'ESABYTE', '59:59:999', 0),
(63, 'EsproRobot', '59:59:999', 0),
(64, 'CBB_2', '59:59:999', 0),
(65, 'OSMECA', '59:59:999', 0),
(66, 'DAONELAS', '59:59:999', 0),
(67, 'Afonsinos', '59:59:999', 0),
(68, 'Flood Team', '59:59:999', 0),
(69, 'Carenque', '59:59:999', 0),
(70, 'TGEI1', '59:59:999', 0),
(71, 'TGEI2', '59:59:999', 0),
(72, 'TGEI3', '59:59:999', 0),
(73, 'EGAS', '59:59:999', 0),
(74, 'XROBOTICO', '59:59:999', 0),
(75, '10E', '59:59:999', 0),
(76, 'HARAMBES', '59:59:999', 0),
(77, '10E T2', '59:59:999', 0),
(78, 'OsPenduras', '59:59:999', 0),
(79, 'TecStrong', '59:59:999', 0),
(80, 'RobOscar20', '59:59:999', 0),
(81, 'ATEC_ARCI', '59:59:999', 0),
(82, 'Fermil1', '59:59:999', 0),
(83, 'AEPBS1', '59:59:999', 0),
(84, 'AEPBS2', '59:59:999', 0),
(85, 'AESB1', '59:59:999', 0),
(86, 'AESB2', '59:59:999', 0),
(87, 'altBot', '59:59:999', 0),
(88, 'EPF', '59:59:999', 0),
(89, 'RobEsfa 2', '59:59:999', 0),
(90, 'RobESFA1', '59:59:999', 0),
(91, 'ATEC_ARCIP', '59:59:999', 0),
(92, 'HARAMBE', '59:59:999', 0),
(93, 'Fermil 2', '59:59:999', 0),
(94, 'EPA Bot', '59:59:999', 0),
(95, 'EPA F1', '59:59:999', 0),
(96, 'EPA_Droide', '59:59:999', 0),
(97, 'EPA_Rover', '59:59:999', 0),
(98, 'epaRun', '59:59:999', 0),
(99, 'ProjectKid', '59:59:999', 0),
(100, 'IGLamp', '59:59:999', 0),
(101, 'EL22', '59:59:999', 0),
(102, 'EL23', '59:59:999', 0),
(103, 'MASEP', '59:59:999', 0),
(104, 'O Tremoco', '59:59:999', 0),
(105, 'Random420', '59:59:999', 0),
(107, 'AEJICS', '59:59:999', 0),
(108, 'AEV_Robo1', '59:59:999', 0),
(109, 'AEV_Robo2', '59:59:999', 0),
(110, 'Random', '59:59:999', 0),
(111, 'DSancho I', '59:59:999', 0),
(112, 'AEVL ROBOT', '59:59:999', 0),
(113, 'Castilhus', '59:59:999', 0),
(114, 'Simaozinho', '59:59:999', 0),
(115, 'IT Robot 2', '59:59:999', 0),
(116, 'EPB Team', '59:59:999', 0),
(117, 'Team ADA', '59:59:999', 0),
(118, 'LiceBotica', '59:59:999', 0),
(119, 'CBB_1', '59:59:999', 0),
(120, 'EBTAIPAS2', '59:59:999', 0),
(121, 'AEP Team1', '59:59:999', 0),
(122, 'AEP Team2', '59:59:999', 0),
(123, 'AEV10', '59:59:999', 0),
(124, 'AEV11', '59:59:999', 0),
(125, 'AEV12', '59:59:999', 0),
(126, 'EsaRobots1', '59:59:999', 0),
(127, 'ESARobots3', '59:59:999', 0),
(128, 'ESARobots2', '59:59:999', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempos`
--

CREATE TABLE `tempos` (
  `id` int(11) NOT NULL,
  `round` int(11) NOT NULL,
  `id_equipa` int(11) NOT NULL,
  `tempo` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tempos`
--

INSERT INTO `tempos` (`id`, `round`, `id_equipa`, `tempo`) VALUES
(1, 3, 6, '00:00:03'),
(2, 3, 9, '00:00:13'),
(3, 1, 1, '00:04:11'),
(4, 1, 2, '00:10:23'),
(5, 1, 3, '00:12:23'),
(6, 2, 10, '00:10:21'),
(7, 2, 9, '00:05:23'),
(8, 2, 7, '00:04:07'),
(9, 2, 9, '00:00:02'),
(10, 2, 1, '00:00:00'),
(11, 2, 10, '00:00:00'),
(12, 2, 10, '00:00:00'),
(13, 2, 1, '00:00:00'),
(14, 3, 6, '00:00:00'),
(15, 3, 9, '00:00:00'),
(16, 3, 6, '00:00:00'),
(17, 3, 9, '00:00:00'),
(18, 3, 10, '00:00:00'),
(19, 3, 1, '00:00:00'),
(20, 3, 10, '00:00:00'),
(21, 3, 1, '00:00:00'),
(22, 3, 6, '00:00:00'),
(23, 3, 9, '00:00:00'),
(24, 3, 9, '00:00:00'),
(25, 3, 6, '00:00:00'),
(26, 1, 2, '00:00:00'),
(27, 1, 7, '00:00:00'),
(28, 3, 9, '00:00:00'),
(29, 3, 6, '00:00:00'),
(30, 3, 6, '00:00:00'),
(31, 3, 9, '00:00:00'),
(32, 3, 6, '00:00:00'),
(33, 3, 9, '00:00:00'),
(34, 3, 6, '00:00:00'),
(35, 3, 9, '00:00:00'),
(36, 3, 6, '00:00:00'),
(37, 3, 9, '00:00:00'),
(38, 3, 6, '00:00:00'),
(39, 3, 9, '00:00:00'),
(40, 3, 6, '00:00:00'),
(41, 3, 9, '00:00:00'),
(42, 3, 6, '00:00:00'),
(43, 3, 9, '00:00:00'),
(44, 3, 6, '00:00:00'),
(45, 3, 9, '00:00:00'),
(46, 3, 6, '00:00:00'),
(47, 3, 9, '00:00:00'),
(48, 3, 9, '00:00:00'),
(49, 3, 6, '00:00:00'),
(50, 3, 10, '00:00:00'),
(51, 3, 1, '00:00:00'),
(52, 3, 10, '00:00:00'),
(53, 3, 1, '00:00:00'),
(54, 3, 10, '00:00:00'),
(55, 3, 1, '00:00:00'),
(56, 4, 9, '00:00:00'),
(57, 4, 1, '00:00:00'),
(58, 4, 1, '00:00:00'),
(59, 4, 9, '00:00:00'),
(60, 4, 1, '00:00:00'),
(61, 4, 9, '00:00:00'),
(62, 4, 10, '00:00:00'),
(63, 4, 6, '00:00:00'),
(64, 4, 10, '00:00:00'),
(65, 4, 6, '00:00:00'),
(66, 4, 10, '00:00:00'),
(67, 4, 6, '00:00:00'),
(68, 3, 9, '00:00:00'),
(69, 3, 6, '00:00:00'),
(70, 3, 6, '00:00:00'),
(71, 3, 9, '00:00:00'),
(72, 3, 10, '00:00:00'),
(73, 3, 1, '00:00:00'),
(74, 3, 10, '00:00:00'),
(75, 3, 1, '00:00:00'),
(76, 4, 10, '00:00:00'),
(77, 4, 6, '00:00:00'),
(78, 4, 10, '00:00:00'),
(79, 4, 6, '00:00:00'),
(80, 4, 10, '00:00:00'),
(81, 4, 6, '00:00:00'),
(82, 4, 1, '00:00:00'),
(83, 4, 9, '00:00:00'),
(84, 4, 1, '00:00:00'),
(85, 4, 9, '00:00:00'),
(86, 4, 1, '00:00:00'),
(87, 4, 9, '00:00:00'),
(88, 4, 10, '00:00:00'),
(89, 4, 6, '00:00:00'),
(90, 4, 10, '00:00:00'),
(91, 4, 6, '00:00:00'),
(92, 4, 10, '00:00:00'),
(93, 4, 6, '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finals`
--
ALTER TABLE `finals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempos`
--
ALTER TABLE `tempos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `finals`
--
ALTER TABLE `finals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `tempos`
--
ALTER TABLE `tempos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
