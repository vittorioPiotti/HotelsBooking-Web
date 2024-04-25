-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Apr 25, 2024 alle 06:11
-- Versione del server: 10.5.20-MariaDB
-- Versione PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22013064_gestionehotel`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `Admins`
--

CREATE TABLE `Admins` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Admins`
--

INSERT INTO `Admins` (`Id`, `Email`, `Password`) VALUES
(1, 'admin@gmail.com', 'fb001dfcffd1c899f3297871406242f097aecf1a5342ccf3ebcd116146188e4b'),
(3, 'admin666@gmail.com', '483c789e43683f6712795f05c0b324a710be9f32de1843f8db9c152bd1b53e0f');

-- --------------------------------------------------------

--
-- Struttura della tabella `Bookings`
--

CREATE TABLE `Bookings` (
  `Id` int(11) NOT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `IdClient` int(11) DEFAULT NULL,
  `IdRoom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Bookings`
--

INSERT INTO `Bookings` (`Id`, `StartDate`, `EndDate`, `IdClient`, `IdRoom`) VALUES
(1, '2024-03-23', '2024-03-25', NULL, 135),
(2, '2024-03-24', '2024-03-26', NULL, 1),
(3, '2024-03-25', '2024-03-27', NULL, 2),
(4, '2024-03-26', '2024-03-28', NULL, 3),
(5, '2024-03-27', '2024-03-29', NULL, 4),
(6, '2024-03-23', '2024-03-25', NULL, 5),
(7, '2024-03-24', '2024-03-26', NULL, 6),
(8, '2024-03-25', '2024-03-27', NULL, 7),
(9, '2024-03-26', '2024-03-28', NULL, 8),
(10, '2024-03-27', '2024-03-29', NULL, 9),
(11, '2024-03-23', '2024-03-25', NULL, 10),
(12, '2024-03-24', '2024-03-26', NULL, 11),
(13, '2024-03-25', '2024-03-27', NULL, 12),
(14, '2024-03-26', '2024-03-28', NULL, 13),
(15, '2024-03-27', '2024-03-29', NULL, 14),
(16, '2024-04-11', '2024-04-12', 1, 3),
(17, '2024-04-25', '2024-04-27', 1, 3),
(18, '2024-04-11', '2024-04-12', 1, 30),
(19, '2024-04-12', '2024-04-30', 2, 2),
(22, '2024-04-11', '2024-04-12', 1, 90),
(23, '2024-04-28', '2024-04-30', 1, 60),
(24, '2024-04-11', '2024-04-12', 1, 93),
(25, '2024-04-18', '2024-04-26', 1, 32),
(26, '2024-04-12', '2024-04-13', 1, 33),
(27, '2024-04-12', '2024-04-13', 7, 62),
(28, '2024-04-13', '2024-04-14', 9, 15),
(30, '2024-04-14', '2024-04-15', 11, 18),
(31, '2024-04-14', '2024-04-15', 1, 17),
(32, '2024-04-14', '2024-04-15', 15, 60),
(34, '2024-04-18', '2024-04-30', 1, 106),
(35, '2024-04-16', '2024-04-17', 1, 403);

-- --------------------------------------------------------

--
-- Struttura della tabella `Clients`
--

CREATE TABLE `Clients` (
  `Id` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Clients`
--

INSERT INTO `Clients` (`Id`, `Email`, `Password`) VALUES
(1, 'client@gmail.com', 'b0c487aac068df482bf0a6ca161ac7dde146730324ac52c23dc429975a64fc6e'),
(2, 'antoniorossitascio@gmail.com', '0f8a724bed6ad43bfc3953ffd8b7988d2567d763f89cda835c6e587191b52b78'),
(6, 'ectorina2000@gmail.com', '769b81efe68ed7dfec00c1901cbd5e84a6303bb1a14f2455c617ccff58ebe968'),
(7, 'riccardo.cimorosi@gmail.com', 'a03ab19b866fc585b5cb1812a2f63ca861e7e7643ee5d43fd7106b623725fd67'),
(9, 'client666@gmail.com', 'b5a85380214449b8927541f7d23c3f055a477ff2549e65044f721e6c4509e3d8'),
(10, 'admin666@gmail.com', '483c789e43683f6712795f05c0b324a710be9f32de1843f8db9c152bd1b53e0f'),
(11, 'admin777@gmail.com', '78cfdd5b5d6bebcb6170b663a42b7b64d18f9f407f764c744b90025a98052b35'),
(12, 'client555@gmail.com', '08e28c1d5af8fb067151470f2817c9619002ab7a7dd9c4d3b7fc1a26712d5ccd'),
(13, 'cliente999@gmail.com', 'b8307f2f03a013397047d51ac73b57b235608a62c282ad3a830c1c4085e0928d'),
(14, 'Massimo@gmail.com', 'aee4bea4b0faf23862aaa69df5cdf5f98e5cea13023994d7382b03a788864a13'),
(15, 'giammariomarini@gmail.com', 'a03ab19b866fc585b5cb1812a2f63ca861e7e7643ee5d43fd7106b623725fd67');

-- --------------------------------------------------------

--
-- Struttura della tabella `Hotels`
--

CREATE TABLE `Hotels` (
  `Id` int(11) NOT NULL,
  `Name` varchar(24) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `IdAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Hotels`
--

INSERT INTO `Hotels` (`Id`, `Name`, `Image`, `Description`, `IdAdmin`) VALUES
(4, 'Hotel D\'Amasco', 'https://gestionehotel.000webhostapp.com/assets/images/hotel1.png', 'Hotel D\'Amasco offre una vista panoramica e un servizio impeccabile. Goditi il comfort e l\'eleganza in un ambiente accogliente e raffinato.', NULL),
(5, 'Hotel Bacardi', 'https://gestionehotel.000webhostapp.com/assets/images/hotel2.png', 'Immergiti nel lusso di questo hotel esclusivo, dove il comfort e l\'eleganza si fondono armoniosamente. Le spaziose camere offrono una vista mozzafiato.', NULL),
(6, 'Hotel Alberta', 'https://gestionehotel.000webhostapp.com/assets/images/hotel3.png', 'Un\'oasi di lusso e comfort nel cuore della città, l\'Hotel Alberta offre camere spaziose e moderne con una vista mozzafiato sul mare.', NULL),
(7, 'Hotel D\'Ambrosio', 'https://gestionehotel.000webhostapp.com/assets/images/hotel1.png', 'Hotel D\'Amasco offre una vista panoramica e un servizio impeccabile. Goditi il comfort e l\'eleganza in un ambiente accogliente e raffinato.', NULL),
(8, 'Hotel Bocconi', 'https://gestionehotel.000webhostapp.com/assets/images/hotel2.png', 'Immergiti nel lusso di questo hotel esclusivo, dove il comfort e l\'eleganza si fondono armoniosamente. Le spaziose camere offrono una vista mozzafiato.', NULL),
(9, 'Hotel Arizona', 'https://gestionehotel.000webhostapp.com/assets/images/hotel3.png', 'Un\'oasi di lusso e comfort nel cuore della città, l\'Hotel Alberta offre camere spaziose e moderne con una vista mozzafiato sul mare.', NULL),
(10, 'Hotel D\'Adige', 'https://gestionehotel.000webhostapp.com/assets/images/hotel1.png', 'Hotel D\'Amasco offre una vista panoramica e un servizio impeccabile. Goditi il comfort e l\'eleganza in un ambiente accogliente e raffinato.', NULL),
(11, 'Hotel Bayer', 'https://gestionehotel.000webhostapp.com/assets/images/hotel2.png', 'Immergiti nel lusso di questo hotel esclusivo, dove il comfort e l\'eleganza si fondono armoniosamente. Le spaziose camere offrono una vista mozzafiato.', NULL),
(12, 'Hotel Asimov', 'https://gestionehotel.000webhostapp.com/assets/images/hotel3.png', 'Un\'oasi di lusso e comfort nel cuore della città, l\'Hotel Alberta offre camere spaziose e moderne con una vista mozzafiato sul mare.', NULL),
(34, 'Nome Hotel', 'https://gestionehotel.000webhostapp.com/assets/images/hotel1.png', 'Descrizione', 1),
(35, 'Nome Hotel', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `Rooms`
--

CREATE TABLE `Rooms` (
  `Id` int(11) NOT NULL,
  `Name` varchar(24) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Number` int(11) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `IdHotel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `Rooms`
--

INSERT INTO `Rooms` (`Id`, `Name`, `Image`, `Description`, `Number`, `Cost`, `IdHotel`) VALUES
(1, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 4),
(2, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 4),
(3, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 4),
(4, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 4),
(5, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 4),
(6, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 4),
(7, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 4),
(8, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 4),
(9, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 4),
(10, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 4),
(11, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 4),
(12, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 4),
(13, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 4),
(14, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 4),
(15, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 5),
(16, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 5),
(17, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 5),
(18, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 5),
(19, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 5),
(20, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 5),
(21, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 5),
(22, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 5),
(23, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 5),
(24, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 5),
(25, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 5),
(26, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 5),
(27, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 5),
(28, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 5),
(29, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 5),
(30, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 6),
(31, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 6),
(32, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 6),
(33, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 6),
(34, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 6),
(35, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 6),
(36, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 6),
(37, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 6),
(38, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 6),
(39, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 6),
(40, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 6),
(41, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 6),
(42, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 6),
(43, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 6),
(44, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 6),
(45, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 7),
(46, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 7),
(47, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 7),
(48, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 7),
(49, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 7),
(50, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 7),
(51, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 7),
(52, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 7),
(53, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 7),
(54, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 7),
(55, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 7),
(56, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 7),
(57, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 7),
(58, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 7),
(59, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 7),
(60, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 8),
(61, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 8),
(62, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 8),
(63, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 8),
(64, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 8),
(65, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 8),
(66, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 8),
(67, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 8),
(68, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 8),
(69, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 8),
(70, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 8),
(71, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 8),
(72, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 8),
(73, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 8),
(74, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 8),
(75, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 9),
(76, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 9),
(77, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 9),
(78, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 9),
(79, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 9),
(80, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 9),
(81, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 9),
(82, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 9),
(83, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 9),
(84, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 9),
(85, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 9),
(86, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 9),
(87, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 9),
(88, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 9),
(89, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 9),
(90, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 10),
(91, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 10),
(92, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 10),
(93, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 10),
(94, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 10),
(95, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 10),
(96, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 10),
(97, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 10),
(98, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 10),
(99, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 10),
(100, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 10),
(101, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 10),
(102, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 10),
(103, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 10),
(104, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 10),
(105, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 11),
(106, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 11),
(107, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 11),
(108, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 11),
(109, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 11),
(110, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 11),
(111, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 11),
(112, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 11),
(113, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 11),
(114, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 11),
(115, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 11),
(116, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 11),
(117, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 11),
(118, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 11),
(119, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 11),
(120, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 12),
(121, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 172, 150, 12),
(122, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 173, 300, 12),
(123, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 174, 100, 12),
(124, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 175, 150, 12),
(125, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 176, 300, 12),
(126, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 178, 100, 12),
(127, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 179, 150, 12),
(128, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 180, 300, 12),
(129, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 181, 100, 12),
(130, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 182, 150, 12),
(131, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 183, 300, 12),
(132, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 184, 100, 12),
(133, 'Stanza Matrimoniale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza matrimoniale elegante. Questa stanza matrimoniale è pensata per coppie in viaggio che desiderano un soggiorno romantico e confortevole.  ', 185, 150, 12),
(134, 'Suite Presidenziale', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Questa suite presidenziale è la scelta perfetta per coloro che cercano il massimo comfort e lusso durante il loro soggiorno. Con spazi ampi e arredi di lusso, questa suite offre una sistemazione di alto livello.', 186, 300, 12),
(135, 'Stanza Singola', 'https://gestionehotel.000webhostapp.com/assets/images/stanza1.png', 'Una stanza singola confortevole. Questa stanza singola è perfetta per chi viaggia da solo. Dotata di un comodo letto singolo, offre un ambiente accogliente e rilassante per il tuo soggiorno. ', 171, 100, 4),
(374, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 1, 150, 34),
(375, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 2, 150, 34),
(376, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 3, 150, 34),
(377, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 4, 150, 34),
(378, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 5, 150, 34),
(379, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 6, 150, 34),
(380, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 7, 150, 34),
(381, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 8, 150, 34),
(382, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 9, 150, 34),
(383, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 10, 150, 34),
(384, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 11, 150, 34),
(385, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 12, 150, 34),
(386, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 13, 150, 34),
(387, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 14, 150, 34),
(388, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 15, 150, 34),
(389, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 16, 150, 34),
(390, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 17, 150, 34),
(391, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 18, 150, 34),
(392, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 19, 150, 34),
(393, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 20, 150, 34),
(394, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 21, 150, 34),
(395, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 22, 150, 34),
(396, 'Nome Stanza', 'https://gestionehotel.000webhostapp.com/assets/images/stanza2.png', 'Descrizione', 23, 150, 34),
(403, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 1, 150, 35),
(404, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 2, 150, 35),
(405, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 3, 150, 35),
(406, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 4, 150, 35),
(407, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 5, 150, 35),
(408, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 6, 150, 35),
(409, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 7, 150, 35),
(410, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 8, 150, 35),
(411, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 9, 150, 35),
(412, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 10, 150, 35),
(413, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 11, 150, 35),
(414, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 12, 150, 35),
(415, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 13, 150, 35),
(416, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 14, 150, 35),
(417, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 15, 150, 35),
(418, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 16, 150, 35),
(419, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 17, 150, 35),
(420, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 18, 150, 35),
(421, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 19, 150, 35),
(422, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 20, 150, 35),
(423, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 21, 150, 35),
(424, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 22, 150, 35),
(425, 'Nome Stanza1', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 23, 150, 35),
(426, 'Nome Stanza2', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 1, 330, 35),
(427, 'Nome Stanza2', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 2, 330, 35),
(428, 'Nome Stanza2', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 3, 330, 35),
(429, 'Nome Stanza2', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 4, 330, 35),
(430, 'Nome Stanza2', 'https://gestionehotel.000webhostapp.com/assets/images/stanza3.png', 'Descrizione', 5, 330, 35);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_IdClient` (`IdClient`),
  ADD KEY `FK_IdRoom` (`IdRoom`);

--
-- Indici per le tabelle `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`Id`);

--
-- Indici per le tabelle `Hotels`
--
ALTER TABLE `Hotels`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_IdAdmin` (`IdAdmin`);

--
-- Indici per le tabelle `Rooms`
--
ALTER TABLE `Rooms`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_IdHotel` (`IdHotel`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Admins`
--
ALTER TABLE `Admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `Clients`
--
ALTER TABLE `Clients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `Hotels`
--
ALTER TABLE `Hotels`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT per la tabella `Rooms`
--
ALTER TABLE `Rooms`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Bookings`
--
ALTER TABLE `Bookings`
  ADD CONSTRAINT `FK_IdClient` FOREIGN KEY (`IdClient`) REFERENCES `Clients` (`Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_IdRoom` FOREIGN KEY (`IdRoom`) REFERENCES `Rooms` (`Id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `Hotels`
--
ALTER TABLE `Hotels`
  ADD CONSTRAINT `FK_IdAdmin` FOREIGN KEY (`IdAdmin`) REFERENCES `Admins` (`Id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `Rooms`
--
ALTER TABLE `Rooms`
  ADD CONSTRAINT `FK_IdHotel` FOREIGN KEY (`IdHotel`) REFERENCES `Hotels` (`Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
