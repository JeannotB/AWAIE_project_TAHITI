-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 11 oct. 2018 à 15:22
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `awaie`
--

-- --------------------------------------------------------

--
-- Structure de la table `alertes`
--

DROP TABLE IF EXISTS `alertes`;
CREATE TABLE IF NOT EXISTS `alertes` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL,
  `temp` float NOT NULL,
  `sonde_id` int(11) NOT NULL,
  `is_display` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 : not displayed / 1 : displayed',
  PRIMARY KEY (`alert_id`),
  KEY `sonde_id` (`sonde_id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `alertes`
--

INSERT INTO `alertes` (`alert_id`, `time`, `temp`, `sonde_id`, `is_display`) VALUES
(1, '2018-10-07 22:00:00', 25, 3, 1),
(2, '2018-10-09 10:15:00', 25, 2, 1),
(3, '2018-10-09 10:30:00', 23, 2, 1),
(4, '2018-10-09 10:40:00', 25, 2, 1),
(5, '2018-10-09 11:10:00', 21, 2, 1),
(6, '2018-10-09 11:25:00', 21, 2, 1),
(7, '2018-10-09 11:30:00', 23, 2, 1),
(8, '2018-10-09 11:45:00', 24, 2, 1),
(9, '2018-10-09 11:50:00', 22, 2, 1),
(10, '2018-10-09 11:55:00', 21, 2, 1),
(11, '2018-10-09 12:10:00', 21, 2, 1),
(12, '2018-10-09 12:15:00', 21, 2, 1),
(13, '2018-10-09 12:20:00', 22, 2, 1),
(14, '2018-10-09 12:25:00', 23, 2, 1),
(15, '2018-10-09 12:35:00', 21, 2, 1),
(16, '2018-10-09 12:40:00', 23, 2, 1),
(17, '2018-10-09 13:00:00', 22, 2, 1),
(18, '2018-10-09 13:05:00', 22, 2, 1),
(19, '2018-10-09 13:15:00', 23, 2, 1),
(20, '2018-10-09 13:25:00', 22, 2, 1),
(21, '2018-10-09 13:35:00', 21, 2, 1),
(22, '2018-10-09 13:40:00', 22, 2, 1),
(23, '2018-10-09 13:55:00', 23, 2, 1),
(24, '2018-10-09 14:05:00', 23, 2, 1),
(25, '2018-10-09 14:20:00', 21, 2, 1),
(26, '2018-10-09 14:30:00', 22, 2, 1),
(27, '2018-10-09 14:40:00', 22, 2, 1),
(28, '2018-10-09 14:50:00', 25, 2, 1),
(29, '2018-10-09 14:55:00', 23, 2, 1),
(30, '2018-10-09 15:05:00', 23, 2, 1),
(31, '2018-10-09 15:10:00', 24, 2, 1),
(32, '2018-10-09 15:25:00', 22, 2, 1),
(33, '2018-10-09 15:35:00', 24, 2, 1),
(34, '2018-10-09 15:45:00', 24, 2, 1),
(35, '2018-10-09 16:05:00', 23, 2, 1),
(36, '2018-10-09 16:35:00', 22, 2, 1),
(37, '2018-10-09 16:40:00', 24, 2, 1),
(38, '2018-10-09 16:45:00', 22, 2, 1),
(39, '2018-10-09 17:05:00', 23, 2, 1),
(40, '2018-10-09 17:25:00', 25, 2, 1),
(41, '2018-10-09 17:30:00', 25, 2, 1),
(42, '2018-10-09 17:40:00', 23, 2, 1),
(43, '2018-10-09 17:45:00', 24, 2, 1),
(44, '2018-10-09 18:00:00', 21, 2, 1),
(45, '2018-10-09 18:10:00', 25, 2, 1),
(46, '2018-10-09 18:15:00', 25, 2, 1),
(47, '2018-10-09 18:19:00', 21, 2, 1),
(48, '2018-10-09 18:29:00', 22, 2, 1),
(49, '2018-10-09 18:34:00', 23, 2, 1),
(50, '2018-10-09 18:44:00', 22, 2, 1),
(51, '2018-10-09 18:49:00', 22, 2, 1),
(52, '2018-10-09 18:54:00', 22, 2, 1),
(53, '2018-10-09 18:59:00', 24, 2, 1),
(54, '2018-10-09 19:04:00', 22, 2, 1),
(55, '2018-10-09 19:19:00', 22, 2, 1),
(56, '2018-10-09 19:24:00', 25, 2, 1),
(57, '2018-10-09 19:34:00', 23, 2, 1),
(58, '2018-10-09 19:39:00', 24, 2, 1),
(59, '2018-10-09 19:44:00', 25, 2, 1),
(60, '2018-10-09 19:54:00', 24, 2, 1),
(61, '2018-10-09 19:59:00', 22, 2, 1),
(62, '2018-10-09 20:04:00', 24, 2, 1),
(63, '2018-10-09 20:09:00', 23, 2, 1),
(64, '2018-10-09 20:14:00', 24, 2, 1),
(65, '2018-10-09 20:34:00', 25, 2, 1),
(66, '2018-10-09 20:59:00', 24, 2, 1),
(67, '2018-10-09 21:14:00', 22, 2, 1),
(68, '2018-10-09 21:19:00', 23, 2, 1),
(69, '2018-10-09 21:24:00', 24, 2, 1),
(70, '2018-10-09 21:29:00', 22, 2, 1),
(71, '2018-10-09 21:54:00', 21, 2, 1),
(72, '2018-10-09 22:09:00', 22, 2, 1),
(73, '2018-10-09 22:14:00', 24, 2, 1),
(74, '2018-10-09 22:29:00', 22, 2, 1),
(75, '2018-10-09 22:39:00', 22, 2, 1),
(76, '2018-10-09 22:49:00', 23, 2, 1),
(77, '2018-10-09 22:59:00', 24, 2, 1),
(78, '2018-10-09 23:09:00', 25, 2, 1),
(79, '2018-10-09 23:14:00', 24, 2, 1),
(80, '2018-10-09 23:24:00', 21, 2, 1),
(81, '2018-10-09 23:29:00', 23, 2, 1),
(82, '2018-10-09 23:34:00', 24, 2, 1),
(83, '2018-10-09 23:49:00', 21, 2, 1),
(84, '2018-10-09 23:54:00', 22, 2, 1),
(85, '2018-10-09 23:59:00', 22, 2, 1),
(86, '2018-10-10 00:14:00', 25, 2, 1),
(87, '2018-10-10 00:19:00', 25, 2, 1),
(88, '2018-10-10 00:29:00', 23, 2, 1),
(89, '2018-10-10 00:54:00', 22, 2, 1),
(90, '2018-10-10 01:04:00', 24, 2, 1),
(91, '2018-10-10 01:09:00', 23, 2, 1),
(92, '2018-10-10 01:19:00', 22, 2, 1),
(93, '2018-10-10 01:24:00', 25, 2, 1),
(94, '2018-10-10 01:34:00', 24, 2, 1),
(95, '2018-10-10 01:44:00', 25, 2, 1),
(96, '2018-10-10 01:49:00', 25, 2, 1),
(97, '2018-10-10 02:19:00', 21, 2, 1),
(98, '2018-10-10 02:39:00', 23, 2, 1),
(99, '2018-10-10 02:54:00', 25, 2, 1),
(100, '2018-10-10 03:09:00', 22, 2, 1),
(101, '2018-10-10 03:39:00', 24, 2, 1),
(102, '2018-10-10 03:44:00', 24, 2, 1),
(103, '2018-10-10 03:49:00', 25, 2, 1),
(104, '2018-10-10 03:54:00', 22, 2, 1),
(105, '2018-10-10 04:04:00', 25, 3, 1),
(106, '2018-10-10 04:09:00', 22, 3, 1),
(107, '2018-10-10 04:14:00', 24, 3, 1),
(108, '2018-10-10 04:19:00', 22, 3, 1),
(109, '2018-10-10 04:24:00', 21, 3, 1),
(110, '2018-10-10 04:44:00', 22, 3, 1),
(111, '2018-10-10 04:54:00', 24, 3, 1),
(112, '2018-10-10 05:04:00', 22, 3, 1),
(113, '2018-10-10 05:14:00', 22, 3, 1),
(114, '2018-10-10 05:24:00', 21, 3, 1),
(115, '2018-10-10 05:34:00', 25, 3, 1),
(116, '2018-10-10 05:44:00', 25, 3, 1),
(117, '2018-10-10 05:54:00', 25, 3, 1),
(118, '2018-10-10 06:04:00', 23, 3, 1),
(119, '2018-10-10 06:24:00', 21, 3, 1),
(120, '2018-10-10 06:34:00', 24, 3, 1),
(121, '2018-10-10 06:39:00', 25, 3, 1),
(122, '2018-10-10 06:44:00', 25, 3, 1),
(123, '2018-10-10 06:49:00', 23, 3, 1),
(124, '2018-10-10 06:59:00', 21, 3, 1),
(125, '2018-10-10 07:09:00', 25, 3, 1),
(126, '2018-10-10 07:14:00', 21, 3, 1),
(127, '2018-10-10 07:19:00', 21, 3, 1),
(128, '2018-10-10 07:29:00', 22, 3, 1),
(129, '2018-10-10 07:34:00', 22, 3, 1),
(130, '2018-10-10 07:44:00', 24, 3, 1),
(131, '2018-10-10 08:04:00', 22, 3, 1),
(132, '2018-10-10 08:14:00', 21, 3, 1),
(133, '2018-10-10 08:19:00', 21, 3, 1),
(134, '2018-10-10 08:34:00', 22, 3, 1),
(135, '2018-10-10 08:39:00', 24, 3, 1),
(136, '2018-10-10 08:44:00', 21, 3, 1),
(137, '2018-10-10 09:09:00', 24, 3, 1),
(138, '2018-10-10 09:14:00', 21, 3, 1),
(139, '2018-10-10 09:19:00', 25, 3, 1),
(140, '2018-10-10 09:24:00', 22, 3, 1),
(141, '2018-10-10 09:39:00', 22, 3, 1),
(142, '2018-10-10 09:59:00', 22, 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

DROP TABLE IF EXISTS `capteur`;
CREATE TABLE IF NOT EXISTS `capteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sonde_id` int(11) NOT NULL,
  `date` timestamp NOT NULL,
  `temperature` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sonde_id` (`sonde_id`)
) ENGINE=InnoDB AUTO_INCREMENT=580 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id`, `sonde_id`, `date`, `temperature`) VALUES
(1, 1, '2018-10-04 22:00:00', 21),
(2, 1, '2018-10-04 22:05:00', 16),
(3, 1, '2018-10-04 22:10:00', 29),
(4, 1, '2018-10-04 22:15:00', 15),
(5, 1, '2018-10-04 22:20:00', 15),
(6, 1, '2018-10-04 22:25:00', 26),
(7, 1, '2018-10-04 22:30:00', 17),
(8, 1, '2018-10-04 22:35:00', 28),
(9, 1, '2018-10-04 22:40:00', 23),
(10, 1, '2018-10-04 22:45:00', 19),
(11, 1, '2018-10-04 22:50:00', 25),
(12, 1, '2018-10-04 22:55:00', 20),
(13, 1, '2018-10-04 23:00:00', 24),
(14, 1, '2018-10-04 23:05:00', 21),
(15, 1, '2018-10-04 23:10:00', 19),
(16, 1, '2018-10-04 23:15:00', 16),
(17, 1, '2018-10-04 23:20:00', 23),
(18, 1, '2018-10-04 23:25:00', 24),
(19, 1, '2018-10-04 23:30:00', 18),
(20, 1, '2018-10-04 23:35:00', 29),
(21, 1, '2018-10-04 23:40:00', 23),
(22, 1, '2018-10-04 23:45:00', 18),
(23, 1, '2018-10-04 23:50:00', 20),
(24, 1, '2018-10-04 23:55:00', 27),
(25, 1, '2018-10-05 00:00:00', 28),
(26, 1, '2018-10-05 00:05:00', 27),
(27, 1, '2018-10-05 00:10:00', 16),
(28, 1, '2018-10-05 00:15:00', 21),
(29, 1, '2018-10-05 00:20:00', 25),
(30, 1, '2018-10-05 00:25:00', 26),
(31, 1, '2018-10-05 00:30:00', 17),
(32, 1, '2018-10-05 00:35:00', 29),
(33, 1, '2018-10-05 00:40:00', 17),
(34, 1, '2018-10-05 00:45:00', 22),
(35, 1, '2018-10-05 00:50:00', 24),
(36, 1, '2018-10-05 00:55:00', 30),
(37, 1, '2018-10-05 01:00:00', 30),
(38, 1, '2018-10-05 01:05:00', 21),
(39, 1, '2018-10-05 01:10:00', 26),
(40, 1, '2018-10-05 01:15:00', 18),
(41, 1, '2018-10-05 01:20:00', 23),
(42, 1, '2018-10-05 01:25:00', 19),
(43, 1, '2018-10-05 01:30:00', 21),
(44, 1, '2018-10-05 01:35:00', 16),
(45, 1, '2018-10-05 01:40:00', 26),
(46, 1, '2018-10-05 01:45:00', 16),
(47, 1, '2018-10-05 01:50:00', 21),
(48, 1, '2018-10-05 01:55:00', 26),
(49, 1, '2018-10-05 02:00:00', 29),
(50, 1, '2018-10-05 02:05:00', 17),
(51, 1, '2018-10-05 02:10:00', 26),
(52, 1, '2018-10-05 02:15:00', 19),
(53, 1, '2018-10-05 02:20:00', 22),
(54, 1, '2018-10-05 02:25:00', 30),
(55, 1, '2018-10-05 02:30:00', 26),
(56, 1, '2018-10-05 02:35:00', 28),
(57, 1, '2018-10-05 02:40:00', 15),
(58, 1, '2018-10-05 02:45:00', 20),
(59, 1, '2018-10-05 02:50:00', 19),
(60, 1, '2018-10-05 02:55:00', 25),
(61, 1, '2018-10-05 03:00:00', 25),
(62, 1, '2018-10-05 03:05:00', 30),
(63, 1, '2018-10-05 03:10:00', 16),
(64, 1, '2018-10-05 03:15:00', 22),
(65, 1, '2018-10-05 03:20:00', 17),
(66, 1, '2018-10-05 03:25:00', 17),
(67, 1, '2018-10-05 03:30:00', 22),
(68, 1, '2018-10-05 03:35:00', 25),
(69, 1, '2018-10-05 03:40:00', 19),
(70, 1, '2018-10-05 03:45:00', 18),
(71, 1, '2018-10-05 03:50:00', 23),
(72, 1, '2018-10-05 03:55:00', 27),
(73, 1, '2018-10-05 04:00:00', 19),
(74, 1, '2018-10-05 04:05:00', 29),
(75, 1, '2018-10-05 04:10:00', 25),
(76, 1, '2018-10-05 04:15:00', 15),
(77, 1, '2018-10-05 04:20:00', 20),
(78, 1, '2018-10-05 04:25:00', 24),
(79, 1, '2018-10-05 04:30:00', 30),
(80, 1, '2018-10-05 04:35:00', 28),
(81, 1, '2018-10-05 04:40:00', 30),
(82, 1, '2018-10-05 04:45:00', 19),
(83, 1, '2018-10-05 04:50:00', 25),
(84, 1, '2018-10-05 04:55:00', 21),
(85, 1, '2018-10-05 05:00:00', 23),
(86, 1, '2018-10-05 05:05:00', 17),
(87, 1, '2018-10-05 05:10:00', 29),
(88, 1, '2018-10-05 05:15:00', 27),
(89, 1, '2018-10-05 05:20:00', 24),
(90, 1, '2018-10-05 05:25:00', 29),
(91, 1, '2018-10-05 05:30:00', 30),
(92, 1, '2018-10-05 05:35:00', 21),
(93, 1, '2018-10-05 05:40:00', 16),
(94, 1, '2018-10-05 05:45:00', 22),
(95, 1, '2018-10-05 05:50:00', 28),
(96, 1, '2018-10-05 05:55:00', 27),
(97, 1, '2018-10-05 06:00:00', 26),
(98, 1, '2018-10-05 06:05:00', 16),
(99, 1, '2018-10-05 06:10:00', 24),
(100, 1, '2018-10-05 06:15:00', 26),
(101, 1, '2018-10-05 06:19:59', 20),
(102, 1, '2018-10-05 06:24:59', 29),
(103, 1, '2018-10-05 06:29:59', 26),
(104, 1, '2018-10-05 06:34:59', 24),
(105, 1, '2018-10-05 06:39:59', 20),
(106, 1, '2018-10-05 06:44:59', 18),
(107, 1, '2018-10-05 06:49:59', 29),
(108, 1, '2018-10-05 06:54:59', 19),
(109, 1, '2018-10-05 06:59:59', 21),
(110, 1, '2018-10-05 07:04:59', 21),
(111, 1, '2018-10-05 07:09:59', 21),
(112, 1, '2018-10-05 07:14:59', 29),
(113, 1, '2018-10-05 07:19:59', 17),
(114, 1, '2018-10-05 07:24:59', 17),
(115, 1, '2018-10-05 07:29:59', 30),
(116, 1, '2018-10-05 07:34:59', 17),
(117, 1, '2018-10-05 07:39:59', 21),
(118, 1, '2018-10-05 07:44:59', 17),
(119, 1, '2018-10-05 07:49:59', 26),
(120, 1, '2018-10-05 07:54:59', 19),
(121, 1, '2018-10-05 07:59:59', 22),
(122, 1, '2018-10-05 08:04:59', 24),
(123, 1, '2018-10-05 08:09:59', 26),
(124, 1, '2018-10-05 08:14:59', 18),
(125, 1, '2018-10-05 08:19:59', 29),
(126, 1, '2018-10-05 08:24:59', 29),
(127, 1, '2018-10-05 08:29:59', 27),
(128, 1, '2018-10-05 08:34:59', 26),
(129, 1, '2018-10-05 08:39:59', 23),
(130, 1, '2018-10-05 08:44:59', 25),
(131, 1, '2018-10-05 08:49:59', 23),
(132, 1, '2018-10-05 08:54:59', 24),
(133, 1, '2018-10-05 08:59:59', 23),
(134, 1, '2018-10-05 09:04:59', 28),
(135, 1, '2018-10-05 09:09:59', 25),
(136, 1, '2018-10-05 09:14:59', 18),
(137, 1, '2018-10-05 09:19:59', 21),
(138, 1, '2018-10-05 09:24:59', 29),
(139, 1, '2018-10-05 09:29:59', 16),
(140, 1, '2018-10-05 09:34:59', 24),
(141, 1, '2018-10-05 09:39:59', 21),
(142, 1, '2018-10-05 09:44:59', 30),
(143, 1, '2018-10-05 09:49:59', 24),
(144, 1, '2018-10-05 09:54:59', 21),
(145, 1, '2018-10-05 09:59:59', 19),
(146, 1, '2018-10-05 10:04:59', 24),
(147, 1, '2018-10-05 10:09:59', 15),
(148, 1, '2018-10-05 10:14:59', 23),
(149, 1, '2018-10-05 10:19:59', 30),
(150, 1, '2018-10-05 10:24:59', 21),
(151, 1, '2018-10-05 10:29:59', 24),
(152, 1, '2018-10-05 10:34:59', 30),
(153, 1, '2018-10-05 10:39:59', 19),
(154, 1, '2018-10-05 10:44:59', 21),
(155, 1, '2018-10-05 10:49:59', 27),
(156, 1, '2018-10-05 10:54:59', 18),
(157, 1, '2018-10-05 10:59:59', 15),
(158, 1, '2018-10-05 11:04:59', 21),
(159, 1, '2018-10-05 11:09:59', 30),
(160, 1, '2018-10-05 11:14:59', 15),
(161, 1, '2018-10-05 11:19:59', 30),
(162, 1, '2018-10-05 11:24:59', 16),
(163, 1, '2018-10-05 11:29:59', 29),
(164, 1, '2018-10-05 11:34:59', 28),
(165, 1, '2018-10-05 11:39:59', 20),
(166, 1, '2018-10-05 11:44:59', 16),
(167, 1, '2018-10-05 11:49:59', 27),
(168, 1, '2018-10-05 11:54:59', 24),
(169, 1, '2018-10-05 11:59:59', 29),
(170, 1, '2018-10-05 12:04:59', 30),
(171, 1, '2018-10-05 12:09:59', 18),
(172, 1, '2018-10-05 12:14:59', 20),
(173, 1, '2018-10-05 12:19:59', 19),
(174, 1, '2018-10-05 12:24:59', 24),
(175, 1, '2018-10-05 12:29:59', 15),
(176, 1, '2018-10-05 12:34:59', 28),
(177, 1, '2018-10-05 12:39:59', 19),
(178, 1, '2018-10-05 12:44:59', 25),
(179, 1, '2018-10-05 12:49:59', 24),
(180, 1, '2018-10-05 12:54:59', 20),
(181, 1, '2018-10-05 12:59:59', 27),
(182, 1, '2018-10-05 13:04:59', 15),
(183, 1, '2018-10-05 13:09:59', 26),
(184, 1, '2018-10-05 13:14:59', 18),
(185, 1, '2018-10-05 13:19:59', 15),
(186, 1, '2018-10-05 13:24:59', 15),
(187, 1, '2018-10-05 13:29:59', 22),
(188, 1, '2018-10-05 13:34:59', 23),
(189, 1, '2018-10-05 13:39:59', 28),
(190, 1, '2018-10-05 13:44:59', 28),
(191, 1, '2018-10-05 13:49:59', 15),
(192, 1, '2018-10-05 13:54:59', 26),
(193, 1, '2018-10-05 13:59:59', 24),
(194, 1, '2018-10-05 14:04:59', 25),
(195, 1, '2018-10-05 14:09:59', 24),
(196, 1, '2018-10-05 14:14:59', 22),
(197, 1, '2018-10-05 14:19:59', 26),
(198, 1, '2018-10-05 14:24:59', 29),
(199, 1, '2018-10-05 14:29:59', 17),
(200, 1, '2018-10-05 14:34:59', 18),
(201, 1, '2018-10-05 14:39:59', 19),
(202, 1, '2018-10-05 14:44:59', 16),
(203, 1, '2018-10-05 14:49:59', 25),
(204, 1, '2018-10-05 14:54:59', 29),
(205, 1, '2018-10-05 14:59:59', 30),
(206, 1, '2018-10-05 15:04:59', 30),
(207, 1, '2018-10-05 15:09:59', 28),
(208, 1, '2018-10-05 15:14:59', 20),
(209, 1, '2018-10-05 15:19:59', 27),
(210, 1, '2018-10-05 15:24:59', 27),
(211, 1, '2018-10-05 15:29:59', 20),
(212, 1, '2018-10-05 15:34:59', 24),
(213, 1, '2018-10-05 15:39:59', 29),
(214, 1, '2018-10-05 15:44:59', 27),
(215, 1, '2018-10-05 15:49:59', 15),
(216, 1, '2018-10-05 15:54:59', 29),
(217, 1, '2018-10-05 15:59:59', 30),
(218, 1, '2018-10-05 16:04:59', 30),
(219, 1, '2018-10-05 16:09:59', 15),
(220, 1, '2018-10-05 16:14:59', 24),
(221, 1, '2018-10-05 16:19:59', 28),
(222, 1, '2018-10-05 16:24:59', 24),
(223, 1, '2018-10-05 16:29:59', 23),
(224, 1, '2018-10-05 16:34:59', 24),
(225, 1, '2018-10-05 16:39:59', 24),
(226, 1, '2018-10-05 16:44:59', 22),
(227, 1, '2018-10-05 16:49:59', 19),
(228, 1, '2018-10-05 16:54:59', 16),
(229, 1, '2018-10-05 16:59:59', 27),
(230, 1, '2018-10-05 17:04:59', 28),
(231, 1, '2018-10-05 17:09:59', 24),
(232, 1, '2018-10-05 17:14:59', 20),
(233, 1, '2018-10-05 17:19:59', 20),
(234, 1, '2018-10-05 17:24:59', 20),
(235, 1, '2018-10-05 17:29:59', 20),
(236, 1, '2018-10-05 17:34:59', 29),
(237, 1, '2018-10-05 17:39:59', 19),
(238, 1, '2018-10-05 17:44:59', 26),
(239, 1, '2018-10-05 17:49:59', 29),
(240, 1, '2018-10-05 17:54:59', 29),
(241, 1, '2018-10-05 17:59:59', 16),
(242, 1, '2018-10-05 18:04:59', 22),
(243, 1, '2018-10-05 18:09:59', 15),
(244, 1, '2018-10-05 18:14:59', 16),
(245, 1, '2018-10-05 18:19:59', 15),
(246, 1, '2018-10-05 18:24:59', 17),
(247, 1, '2018-10-05 18:29:59', 15),
(248, 1, '2018-10-05 18:34:59', 29),
(249, 1, '2018-10-05 18:39:59', 15),
(250, 1, '2018-10-05 18:44:59', 20),
(251, 1, '2018-10-05 18:49:59', 27),
(252, 1, '2018-10-05 18:54:59', 29),
(253, 1, '2018-10-05 18:59:59', 16),
(254, 1, '2018-10-05 19:04:59', 20),
(255, 1, '2018-10-05 19:09:59', 21),
(256, 1, '2018-10-05 19:14:59', 30),
(257, 1, '2018-10-05 19:19:59', 15),
(258, 1, '2018-10-05 19:24:59', 15),
(259, 1, '2018-10-05 19:29:59', 23),
(260, 1, '2018-10-05 19:34:59', 25),
(261, 1, '2018-10-05 19:39:59', 24),
(262, 1, '2018-10-05 19:44:59', 18),
(263, 1, '2018-10-05 19:49:59', 18),
(264, 1, '2018-10-05 19:54:59', 28),
(265, 1, '2018-10-05 19:59:59', 29),
(266, 1, '2018-10-05 20:04:59', 21),
(267, 1, '2018-10-05 20:09:59', 17),
(268, 1, '2018-10-05 20:14:59', 19),
(269, 1, '2018-10-05 20:19:59', 17),
(270, 1, '2018-10-05 20:24:59', 24),
(271, 1, '2018-10-05 20:29:59', 23),
(272, 1, '2018-10-05 20:34:59', 20),
(273, 1, '2018-10-05 20:39:59', 27),
(274, 1, '2018-10-05 20:44:59', 16),
(275, 1, '2018-10-05 20:49:59', 16),
(276, 1, '2018-10-05 20:54:59', 26),
(277, 1, '2018-10-05 20:59:59', 22),
(278, 1, '2018-10-05 21:04:59', 26),
(279, 1, '2018-10-05 21:09:59', 21),
(280, 1, '2018-10-05 21:14:59', 22),
(281, 1, '2018-10-05 21:19:59', 18),
(282, 1, '2018-10-05 21:24:59', 26),
(283, 1, '2018-10-05 21:29:59', 20),
(284, 1, '2018-10-05 21:34:59', 16),
(285, 1, '2018-10-05 21:39:59', 25),
(286, 1, '2018-10-05 21:44:59', 18),
(287, 1, '2018-10-05 21:49:59', 30),
(288, 1, '2018-10-05 21:54:59', 18),
(289, 1, '2018-10-05 21:59:59', 22),
(290, 3, '2018-10-07 22:00:00', 25),
(291, 2, '2018-10-09 10:00:00', 16),
(292, 2, '2018-10-09 10:05:00', 16),
(293, 2, '2018-10-09 10:10:00', 18),
(294, 2, '2018-10-09 10:15:00', 25),
(295, 2, '2018-10-09 10:20:00', 18),
(296, 2, '2018-10-09 10:25:00', 15),
(297, 2, '2018-10-09 10:30:00', 23),
(298, 2, '2018-10-09 10:35:00', 18),
(299, 2, '2018-10-09 10:40:00', 25),
(300, 2, '2018-10-09 10:45:00', 20),
(301, 2, '2018-10-09 10:50:00', 20),
(302, 2, '2018-10-09 10:55:00', 16),
(303, 2, '2018-10-09 11:00:00', 15),
(304, 2, '2018-10-09 11:05:00', 15),
(305, 2, '2018-10-09 11:10:00', 21),
(306, 2, '2018-10-09 11:15:00', 15),
(307, 2, '2018-10-09 11:20:00', 16),
(308, 2, '2018-10-09 11:25:00', 21),
(309, 2, '2018-10-09 11:30:00', 23),
(310, 2, '2018-10-09 11:35:00', 20),
(311, 2, '2018-10-09 11:40:00', 19),
(312, 2, '2018-10-09 11:45:00', 24),
(313, 2, '2018-10-09 11:50:00', 22),
(314, 2, '2018-10-09 11:55:00', 21),
(315, 2, '2018-10-09 12:00:00', 16),
(316, 2, '2018-10-09 12:05:00', 19),
(317, 2, '2018-10-09 12:10:00', 21),
(318, 2, '2018-10-09 12:15:00', 21),
(319, 2, '2018-10-09 12:20:00', 22),
(320, 2, '2018-10-09 12:25:00', 23),
(321, 2, '2018-10-09 12:30:00', 16),
(322, 2, '2018-10-09 12:35:00', 21),
(323, 2, '2018-10-09 12:40:00', 23),
(324, 2, '2018-10-09 12:45:00', 16),
(325, 2, '2018-10-09 12:50:00', 18),
(326, 2, '2018-10-09 12:55:00', 15),
(327, 2, '2018-10-09 13:00:00', 22),
(328, 2, '2018-10-09 13:05:00', 22),
(329, 2, '2018-10-09 13:10:00', 17),
(330, 2, '2018-10-09 13:15:00', 23),
(331, 2, '2018-10-09 13:20:00', 15),
(332, 2, '2018-10-09 13:25:00', 22),
(333, 2, '2018-10-09 13:30:00', 18),
(334, 2, '2018-10-09 13:35:00', 21),
(335, 2, '2018-10-09 13:40:00', 22),
(336, 2, '2018-10-09 13:45:00', 20),
(337, 2, '2018-10-09 13:50:00', 18),
(338, 2, '2018-10-09 13:55:00', 23),
(339, 2, '2018-10-09 14:00:00', 19),
(340, 2, '2018-10-09 14:05:00', 23),
(341, 2, '2018-10-09 14:10:00', 15),
(342, 2, '2018-10-09 14:15:00', 16),
(343, 2, '2018-10-09 14:20:00', 21),
(344, 2, '2018-10-09 14:25:00', 15),
(345, 2, '2018-10-09 14:30:00', 22),
(346, 2, '2018-10-09 14:35:00', 19),
(347, 2, '2018-10-09 14:40:00', 22),
(348, 2, '2018-10-09 14:45:00', 19),
(349, 2, '2018-10-09 14:50:00', 25),
(350, 2, '2018-10-09 14:55:00', 23),
(351, 2, '2018-10-09 15:00:00', 18),
(352, 2, '2018-10-09 15:05:00', 23),
(353, 2, '2018-10-09 15:10:00', 24),
(354, 2, '2018-10-09 15:15:00', 15),
(355, 2, '2018-10-09 15:20:00', 16),
(356, 2, '2018-10-09 15:25:00', 22),
(357, 2, '2018-10-09 15:30:00', 18),
(358, 2, '2018-10-09 15:35:00', 24),
(359, 2, '2018-10-09 15:40:00', 15),
(360, 2, '2018-10-09 15:45:00', 24),
(361, 2, '2018-10-09 15:50:00', 15),
(362, 2, '2018-10-09 15:55:00', 16),
(363, 2, '2018-10-09 16:00:00', 18),
(364, 2, '2018-10-09 16:05:00', 23),
(365, 2, '2018-10-09 16:10:00', 19),
(366, 2, '2018-10-09 16:15:00', 17),
(367, 2, '2018-10-09 16:20:00', 20),
(368, 2, '2018-10-09 16:25:00', 16),
(369, 2, '2018-10-09 16:30:00', 17),
(370, 2, '2018-10-09 16:35:00', 22),
(371, 2, '2018-10-09 16:40:00', 24),
(372, 2, '2018-10-09 16:45:00', 22),
(373, 2, '2018-10-09 16:50:00', 19),
(374, 2, '2018-10-09 16:55:00', 15),
(375, 2, '2018-10-09 17:00:00', 17),
(376, 2, '2018-10-09 17:05:00', 23),
(377, 2, '2018-10-09 17:10:00', 16),
(378, 2, '2018-10-09 17:15:00', 17),
(379, 2, '2018-10-09 17:20:00', 15),
(380, 2, '2018-10-09 17:25:00', 25),
(381, 2, '2018-10-09 17:30:00', 25),
(382, 2, '2018-10-09 17:35:00', 18),
(383, 2, '2018-10-09 17:40:00', 23),
(384, 2, '2018-10-09 17:45:00', 24),
(385, 2, '2018-10-09 17:50:00', 18),
(386, 2, '2018-10-09 17:55:00', 17),
(387, 2, '2018-10-09 18:00:00', 21),
(388, 2, '2018-10-09 18:05:00', 18),
(389, 2, '2018-10-09 18:10:00', 25),
(390, 2, '2018-10-09 18:15:00', 25),
(391, 2, '2018-10-09 18:19:00', 21),
(392, 2, '2018-10-09 18:24:00', 15),
(393, 2, '2018-10-09 18:29:00', 22),
(394, 2, '2018-10-09 18:34:00', 23),
(395, 2, '2018-10-09 18:39:00', 17),
(396, 2, '2018-10-09 18:44:00', 22),
(397, 2, '2018-10-09 18:49:00', 22),
(398, 2, '2018-10-09 18:54:00', 22),
(399, 2, '2018-10-09 18:59:00', 24),
(400, 2, '2018-10-09 19:04:00', 22),
(401, 2, '2018-10-09 19:09:00', 17),
(402, 2, '2018-10-09 19:14:00', 17),
(403, 2, '2018-10-09 19:19:00', 22),
(404, 2, '2018-10-09 19:24:00', 25),
(405, 2, '2018-10-09 19:29:00', 16),
(406, 2, '2018-10-09 19:34:00', 23),
(407, 2, '2018-10-09 19:39:00', 24),
(408, 2, '2018-10-09 19:44:00', 25),
(409, 2, '2018-10-09 19:49:00', 15),
(410, 2, '2018-10-09 19:54:00', 24),
(411, 2, '2018-10-09 19:59:00', 22),
(412, 2, '2018-10-09 20:04:00', 24),
(413, 2, '2018-10-09 20:09:00', 23),
(414, 2, '2018-10-09 20:14:00', 24),
(415, 2, '2018-10-09 20:19:00', 18),
(416, 2, '2018-10-09 20:24:00', 16),
(417, 2, '2018-10-09 20:29:00', 18),
(418, 2, '2018-10-09 20:34:00', 25),
(419, 2, '2018-10-09 20:39:00', 15),
(420, 2, '2018-10-09 20:44:00', 20),
(421, 2, '2018-10-09 20:49:00', 17),
(422, 2, '2018-10-09 20:54:00', 17),
(423, 2, '2018-10-09 20:59:00', 24),
(424, 2, '2018-10-09 21:04:00', 20),
(425, 2, '2018-10-09 21:09:00', 18),
(426, 2, '2018-10-09 21:14:00', 22),
(427, 2, '2018-10-09 21:19:00', 23),
(428, 2, '2018-10-09 21:24:00', 24),
(429, 2, '2018-10-09 21:29:00', 22),
(430, 2, '2018-10-09 21:34:00', 16),
(431, 2, '2018-10-09 21:39:00', 20),
(432, 2, '2018-10-09 21:44:00', 19),
(433, 2, '2018-10-09 21:49:00', 20),
(434, 2, '2018-10-09 21:54:00', 21),
(435, 2, '2018-10-09 21:59:00', 19),
(436, 2, '2018-10-09 22:04:00', 20),
(437, 2, '2018-10-09 22:09:00', 22),
(438, 2, '2018-10-09 22:14:00', 24),
(439, 2, '2018-10-09 22:19:00', 18),
(440, 2, '2018-10-09 22:24:00', 17),
(441, 2, '2018-10-09 22:29:00', 22),
(442, 2, '2018-10-09 22:34:00', 20),
(443, 2, '2018-10-09 22:39:00', 22),
(444, 2, '2018-10-09 22:44:00', 18),
(445, 2, '2018-10-09 22:49:00', 23),
(446, 2, '2018-10-09 22:54:00', 19),
(447, 2, '2018-10-09 22:59:00', 24),
(448, 2, '2018-10-09 23:04:00', 15),
(449, 2, '2018-10-09 23:09:00', 25),
(450, 2, '2018-10-09 23:14:00', 24),
(451, 2, '2018-10-09 23:19:00', 16),
(452, 2, '2018-10-09 23:24:00', 21),
(453, 2, '2018-10-09 23:29:00', 23),
(454, 2, '2018-10-09 23:34:00', 24),
(455, 2, '2018-10-09 23:39:00', 20),
(456, 2, '2018-10-09 23:44:00', 15),
(457, 2, '2018-10-09 23:49:00', 21),
(458, 2, '2018-10-09 23:54:00', 22),
(459, 2, '2018-10-09 23:59:00', 22),
(460, 2, '2018-10-10 00:04:00', 19),
(461, 2, '2018-10-10 00:09:00', 17),
(462, 2, '2018-10-10 00:14:00', 25),
(463, 2, '2018-10-10 00:19:00', 25),
(464, 2, '2018-10-10 00:24:00', 20),
(465, 2, '2018-10-10 00:29:00', 23),
(466, 2, '2018-10-10 00:34:00', 20),
(467, 2, '2018-10-10 00:39:00', 18),
(468, 2, '2018-10-10 00:44:00', 16),
(469, 2, '2018-10-10 00:49:00', 19),
(470, 2, '2018-10-10 00:54:00', 22),
(471, 2, '2018-10-10 00:59:00', 17),
(472, 2, '2018-10-10 01:04:00', 24),
(473, 2, '2018-10-10 01:09:00', 23),
(474, 2, '2018-10-10 01:14:00', 20),
(475, 2, '2018-10-10 01:19:00', 22),
(476, 2, '2018-10-10 01:24:00', 25),
(477, 2, '2018-10-10 01:29:00', 15),
(478, 2, '2018-10-10 01:34:00', 24),
(479, 2, '2018-10-10 01:39:00', 20),
(480, 2, '2018-10-10 01:44:00', 25),
(481, 2, '2018-10-10 01:49:00', 25),
(482, 2, '2018-10-10 01:54:00', 17),
(483, 2, '2018-10-10 01:59:00', 16),
(484, 2, '2018-10-10 02:04:00', 15),
(485, 2, '2018-10-10 02:09:00', 15),
(486, 2, '2018-10-10 02:14:00', 16),
(487, 2, '2018-10-10 02:19:00', 21),
(488, 2, '2018-10-10 02:24:00', 16),
(489, 2, '2018-10-10 02:29:00', 16),
(490, 2, '2018-10-10 02:34:00', 15),
(491, 2, '2018-10-10 02:39:00', 23),
(492, 2, '2018-10-10 02:44:00', 16),
(493, 2, '2018-10-10 02:49:00', 20),
(494, 2, '2018-10-10 02:54:00', 25),
(495, 2, '2018-10-10 02:59:00', 17),
(496, 2, '2018-10-10 03:04:00', 17),
(497, 2, '2018-10-10 03:09:00', 22),
(498, 2, '2018-10-10 03:14:00', 18),
(499, 2, '2018-10-10 03:19:00', 20),
(500, 2, '2018-10-10 03:24:00', 16),
(501, 2, '2018-10-10 03:29:00', 19),
(502, 2, '2018-10-10 03:34:00', 20),
(503, 2, '2018-10-10 03:39:00', 24),
(504, 2, '2018-10-10 03:44:00', 24),
(505, 2, '2018-10-10 03:49:00', 25),
(506, 2, '2018-10-10 03:54:00', 22),
(507, 3, '2018-10-10 03:59:00', 15),
(508, 3, '2018-10-10 04:04:00', 25),
(509, 3, '2018-10-10 04:09:00', 22),
(510, 3, '2018-10-10 04:14:00', 24),
(511, 3, '2018-10-10 04:19:00', 22),
(512, 3, '2018-10-10 04:24:00', 21),
(513, 3, '2018-10-10 04:29:00', 15),
(514, 3, '2018-10-10 04:34:00', 19),
(515, 3, '2018-10-10 04:39:00', 15),
(516, 3, '2018-10-10 04:44:00', 22),
(517, 3, '2018-10-10 04:49:00', 18),
(518, 3, '2018-10-10 04:54:00', 24),
(519, 3, '2018-10-10 04:59:00', 16),
(520, 3, '2018-10-10 05:04:00', 22),
(521, 3, '2018-10-10 05:09:00', 17),
(522, 3, '2018-10-10 05:14:00', 22),
(523, 3, '2018-10-10 05:19:00', 18),
(524, 3, '2018-10-10 05:24:00', 21),
(525, 3, '2018-10-10 05:29:00', 20),
(526, 3, '2018-10-10 05:34:00', 25),
(527, 3, '2018-10-10 05:39:00', 19),
(528, 3, '2018-10-10 05:44:00', 25),
(529, 3, '2018-10-10 05:49:00', 16),
(530, 3, '2018-10-10 05:54:00', 25),
(531, 3, '2018-10-10 05:59:00', 18),
(532, 3, '2018-10-10 06:04:00', 23),
(533, 3, '2018-10-10 06:09:00', 19),
(534, 3, '2018-10-10 06:14:00', 16),
(535, 3, '2018-10-10 06:19:00', 16),
(536, 3, '2018-10-10 06:24:00', 21),
(537, 3, '2018-10-10 06:29:00', 20),
(538, 3, '2018-10-10 06:34:00', 24),
(539, 3, '2018-10-10 06:39:00', 25),
(540, 3, '2018-10-10 06:44:00', 25),
(541, 3, '2018-10-10 06:49:00', 23),
(542, 3, '2018-10-10 06:54:00', 20),
(543, 3, '2018-10-10 06:59:00', 21),
(544, 3, '2018-10-10 07:04:00', 15),
(545, 3, '2018-10-10 07:09:00', 25),
(546, 3, '2018-10-10 07:14:00', 21),
(547, 3, '2018-10-10 07:19:00', 21),
(548, 3, '2018-10-10 07:24:00', 18),
(549, 3, '2018-10-10 07:29:00', 22),
(550, 3, '2018-10-10 07:34:00', 22),
(551, 3, '2018-10-10 07:39:00', 17),
(552, 3, '2018-10-10 07:44:00', 24),
(553, 3, '2018-10-10 07:49:00', 19),
(554, 3, '2018-10-10 07:54:00', 16),
(555, 3, '2018-10-10 07:59:00', 17),
(556, 3, '2018-10-10 08:04:00', 22),
(557, 3, '2018-10-10 08:09:00', 16),
(558, 3, '2018-10-10 08:14:00', 21),
(559, 3, '2018-10-10 08:19:00', 21),
(560, 3, '2018-10-10 08:24:00', 17),
(561, 3, '2018-10-10 08:29:00', 17),
(562, 3, '2018-10-10 08:34:00', 22),
(563, 3, '2018-10-10 08:39:00', 24),
(564, 3, '2018-10-10 08:44:00', 21),
(565, 3, '2018-10-10 08:49:00', 18),
(566, 3, '2018-10-10 08:54:00', 19),
(567, 3, '2018-10-10 08:59:00', 17),
(568, 3, '2018-10-10 09:04:00', 19),
(569, 3, '2018-10-10 09:09:00', 24),
(570, 3, '2018-10-10 09:14:00', 21),
(571, 3, '2018-10-10 09:19:00', 25),
(572, 3, '2018-10-10 09:24:00', 22),
(573, 3, '2018-10-10 09:29:00', 18),
(574, 3, '2018-10-10 09:34:00', 15),
(575, 3, '2018-10-10 09:39:00', 22),
(576, 3, '2018-10-10 09:44:00', 19),
(577, 3, '2018-10-10 09:49:00', 16),
(578, 3, '2018-10-10 09:54:00', 15),
(579, 3, '2018-10-10 09:59:00', 22);

--
-- Déclencheurs `capteur`
--
DROP TRIGGER IF EXISTS `copy2alert`;
DELIMITER $$
CREATE TRIGGER `copy2alert` BEFORE INSERT ON `capteur` FOR EACH ROW IF NEW.temperature > 20 THEN
	BEGIN
    	INSERT INTO alertes(alertes.time, alertes.temp, alertes.sonde_id, alertes.is_display)
        	VALUES (NEW.date, NEW.temperature, NEW.sonde_id, '1');
    END;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` text COLLATE utf8_unicode_ci NOT NULL,
  `Tel` int(11) NOT NULL,
  `Adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`company_id`, `Nom`, `Tel`, `Adresse`, `logo`) VALUES
(1, 'INSA', 123456789, '5 rue de la chocolaterie 41000 Blois', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `isOnline` tinyint(2) NOT NULL COMMENT '0: offline / 1:online / 2:busy',
  `id_company` int(11) NOT NULL,
  `date_inscription` timestamp NOT NULL,
  `admin` tinyint(1) NOT NULL COMMENT '0 : not an admin / 1 : admin',
  PRIMARY KEY (`member_id`),
  KEY `id_company` (`id_company`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`member_id`, `name`, `email`, `password`, `isOnline`, `id_company`, `date_inscription`, `admin`) VALUES
(3, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, 1, '2018-10-08 22:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `ref_produit` text COLLATE utf8_unicode_ci NOT NULL,
  `GPS_lat` double NOT NULL,
  `GPS_long` double NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_entreprise` (`id_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `ref_produit`, `GPS_lat`, `GPS_long`, `id_entreprise`) VALUES
(1, 'INSA_1', 47.58470153808594, 1.325850009918213, 1),
(2, 'INSA_2', 47.584537506103516, 1.3255150318145752, 1),
(3, 'INSA_3', 47.58516311645508, 1.3252040147781372, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alertes`
--
ALTER TABLE `alertes`
  ADD CONSTRAINT `alertes_ibfk_1` FOREIGN KEY (`sonde_id`) REFERENCES `produits` (`id_produit`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`sonde_id`) REFERENCES `produits` (`id_produit`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `entreprise` (`company_id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`company_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
