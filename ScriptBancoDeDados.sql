-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2017 at 06:29 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `FormularioSubs`
--

CREATE TABLE `FormularioSubs` (
  `idFormularioSubs` int(11) NOT NULL,
  `professor_req` bigint(20) DEFAULT NULL,
  `professor_substituto` bigint(20) DEFAULT NULL,
  `coordenador_req` bigint(20) DEFAULT NULL,
  `coordenador` bigint(20) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  `motivo` text,
  `data_da_substituicao` date DEFAULT NULL,
  `horario_substituicao` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FormularioSubs`
--

INSERT INTO `FormularioSubs` (`idFormularioSubs`, `professor_req`, `professor_substituto`, `coordenador_req`, `coordenador`, `materia`, `motivo`, `data_da_substituicao`, `horario_substituicao`) VALUES
(3249847, 4, NULL, NULL, NULL, 7875994, 'Por Que ele quer', '2017-10-10', '10:40:00'),
(4901490, 4, NULL, NULL, NULL, 7875994, 'Por Que ele quer', '2017-10-10', '10:40:00'),
(7551300, 1, NULL, NULL, NULL, 7875994, 'Por Que ele quer', '2017-10-10', '10:40:00'),
(7985730, 4, 1, NULL, NULL, 7875994, 'Por Que ele quer', '2017-10-10', '10:40:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FormularioSubs`
--
ALTER TABLE `FormularioSubs`
  ADD PRIMARY KEY (`idFormularioSubs`),
  ADD KEY `fk_FormularioSubs_1_idx` (`professor_substituto`),
  ADD KEY `fk_FormularioSubs_2_idx` (`materia`),
  ADD KEY `fk_FormularioSubs_3_idx` (`coordenador`),
  ADD KEY `fk_FormularioSubs_4_idx` (`professor_req`),
  ADD KEY `fk_FormularioSubs_5_idx` (`coordenador_req`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FormularioSubs`
--
ALTER TABLE `FormularioSubs`
  ADD CONSTRAINT `fk_FormularioSubs_coordenador` FOREIGN KEY (`coordenador`) REFERENCES `Pessoa` (`cadastro_identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FormularioSubs_coordenador_req` FOREIGN KEY (`coordenador_req`) REFERENCES `Pessoa` (`cadastro_identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FormularioSubs_materia` FOREIGN KEY (`materia`) REFERENCES `Materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FormularioSubs_professor_substituto` FOREIGN KEY (`professor_substituto`) REFERENCES `Pessoa` (`cadastro_identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FormularioSubs_professor_substituto_req` FOREIGN KEY (`professor_req`) REFERENCES `Pessoa` (`cadastro_identificador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
