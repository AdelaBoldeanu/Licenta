-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3306
-- Timp de generare: sept. 11, 2019 la 11:52 AM
-- Versiune server: 5.7.26
-- Versiune PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `licenta`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `alimente`
--

DROP TABLE IF EXISTS `alimente`;
CREATE TABLE IF NOT EXISTS `alimente` (
  `id_produs` int(11) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(55) NOT NULL DEFAULT '',
  `cantitate` varchar(55) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_produs`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `alimente`
--

INSERT INTO `alimente` (`id_produs`, `denumire`, `cantitate`) VALUES
(1, 'Paine', '50'),
(2, 'Ceapa', '3kg'),
(3, 'Cartofi', '10kg'),
(4, 'Lapte', '5L'),
(5, 'Mere', '10kg');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `aprobarec`
--

DROP TABLE IF EXISTS `aprobarec`;
CREATE TABLE IF NOT EXISTS `aprobarec` (
  `id_aprobare` int(11) NOT NULL AUTO_INCREMENT,
  `id_cerere` int(11) NOT NULL,
  `aprobata` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_aprobare`),
  KEY `id_cerere` (`id_cerere`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `aprobarec`
--

INSERT INTO `aprobarec` (`id_aprobare`, `id_cerere`, `aprobata`) VALUES
(11, 10, 'Aprobata'),
(12, 11, 'Aprobata'),
(13, 12, 'Aprobata'),
(14, 13, 'Respinsa');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cerere`
--

DROP TABLE IF EXISTS `cerere`;
CREATE TABLE IF NOT EXISTS `cerere` (
  `id_cerere` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(55) NOT NULL DEFAULT '',
  `prenume` varchar(55) NOT NULL DEFAULT '',
  `motiv` varchar(100) NOT NULL DEFAULT '',
  `departament` varchar(55) NOT NULL DEFAULT '',
  `prima_zi` date DEFAULT NULL,
  `ultima_zi` date DEFAULT NULL,
  `tip_cerere` varchar(55) NOT NULL DEFAULT '',
  `coment_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cerere`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `cerere`
--

INSERT INTO `cerere` (`id_cerere`, `nume`, `prenume`, `motiv`, `departament`, `prima_zi`, `ultima_zi`, `tip_cerere`, `coment_status`) VALUES
(10, 'Boldeanu', 'Adela', 'Personal', 'bucatarie', '2019-09-30', '2019-10-11', 'Cerere concediu', 1),
(11, 'Goran', 'Andrei', 'Medical', 'fochist', '2019-09-10', '2019-09-14', 'Cerere concediu', 1),
(12, 'Boldeanu', 'Denisa', 'Medical', 'magazie', '2019-09-03', '2019-09-05', 'Cerere concediu', 1),
(13, 'Boldeanu', 'Denisa', 'Personal', 'magazie', '2019-08-26', '2019-08-30', 'Cerere schimb tura', 1),
(14, 'Boldeanu', 'Adela', 'Personal', 'bucatarie', '2019-10-31', '2019-11-08', 'Cerere concediu', 0),
(15, 'Goran', 'Andrei', 'Personal', 'fochist', '2019-10-31', '2019-11-07', 'Cerere concediu', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `magazie`
--

DROP TABLE IF EXISTS `magazie`;
CREATE TABLE IF NOT EXISTS `magazie` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `denumire` varchar(55) NOT NULL DEFAULT '',
  `cantitate` varchar(55) NOT NULL DEFAULT '',
  `data_achizitie` date DEFAULT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `magazie`
--

INSERT INTO `magazie` (`id_prod`, `denumire`, `cantitate`, `data_achizitie`) VALUES
(1, 'Pat', '100', '2019-05-12'),
(2, 'Saltea', '100', '2019-05-12'),
(3, 'Lenejerie pat', '100', '2019-09-11'),
(4, 'Perna', '100', '2019-05-12'),
(5, 'Noptiera', '100', '2019-08-02'),
(6, 'Oglinda baie', '50', '2019-07-22');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_cont` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(55) NOT NULL DEFAULT '',
  `password` varchar(55) NOT NULL DEFAULT '',
  `first_name` varchar(55) NOT NULL DEFAULT '',
  `last_name` varchar(55) NOT NULL DEFAULT '',
  `email` varchar(55) NOT NULL DEFAULT '',
  `position` varchar(55) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_cont`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id_cont`, `user_name`, `password`, `first_name`, `last_name`, `email`, `position`) VALUES
(3, 'KXUMNJWD', 'JMNUJ', 'Boldeanu', 'Adela', 'adela.boldeanu@yahoo.ro', 'bucatarie'),
(2, 'IQTCP', 'JWMANR', 'Goran', 'Andrei', 'andrei.goran@yahoo.com', 'fochist'),
(4, 'HURJKGTA', 'EFOJTB', 'Boldeanu', 'Denisa', 'denisa.boldeanu@yahoo.com', 'magazie'),
(6, 'DNGLCP', 'PEVMWE', 'Blejan', 'Larisa', 'larisa.blejan@yahoo.com', 'Administrator');

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `aprobarec`
--
ALTER TABLE `aprobarec`
  ADD CONSTRAINT `aprobarec_ibfk_1` FOREIGN KEY (`id_cerere`) REFERENCES `cerere` (`id_cerere`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
