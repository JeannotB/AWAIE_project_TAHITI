-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 09 oct. 2018 à 16:51
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
  PRIMARY KEY (`alert_id`),
  KEY `sonde_id` (`sonde_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `alertes`
--

INSERT INTO `alertes` (`alert_id`, `time`, `temp`, `sonde_id`) VALUES
(1, '2018-10-07 22:00:00', 25, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(290, 3, '2018-10-07 22:00:00', 25);

--
-- Déclencheurs `capteur`
--
DROP TRIGGER IF EXISTS `copy2alert`;
DELIMITER $$
CREATE TRIGGER `copy2alert` BEFORE INSERT ON `capteur` FOR EACH ROW IF NEW.temperature > 20 THEN
	BEGIN
    	INSERT INTO alertes(alertes.time, alertes.temp, alertes.sonde_id)
        	VALUES (NEW.date, NEW.temperature, NEW.sonde_id);
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
  `admin` tinyint(1) NOT NULL COMMENT '0 : not an admin / 1 : admin',
  PRIMARY KEY (`member_id`),
  KEY `id_company` (`id_company`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`member_id`, `name`, `email`, `password`, `isOnline`, `id_company`, `admin`) VALUES
(3, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, 1, 1);

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
