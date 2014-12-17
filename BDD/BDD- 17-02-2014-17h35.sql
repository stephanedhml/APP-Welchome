-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 17 Décembre 2014 à 17:35
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `welchome`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contrainte`
--

CREATE TABLE IF NOT EXISTS `contrainte` (
  `id_contrainte` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_contrainte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `echange`
--

CREATE TABLE IF NOT EXISTS `echange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(11) DEFAULT NULL,
  `id_proprietaire` int(11) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `echange`
--

INSERT INTO `echange` (`id`, `id_demandeur`, `id_proprietaire`, `id_logement`, `date_update`, `user1`, `user2`) VALUES
(1, 1, 12, 1, NULL, NULL, 1),
(2, 1, 11, 8, NULL, NULL, 1),
(3, 1, 11, 8, NULL, NULL, 1),
(4, 1, 11, 8, NULL, NULL, 1),
(5, 1, 11, 8, NULL, NULL, 1),
(6, 1, 11, 8, NULL, NULL, 1),
(7, 1, 9, 7, NULL, NULL, 1),
(8, 1, 9, 7, NULL, NULL, 1),
(9, 1, 9, 7, NULL, NULL, 1),
(10, 1, 9, 7, NULL, NULL, 1),
(11, 1, 9, 7, NULL, NULL, 1),
(12, 1, 9, 7, NULL, NULL, 1),
(13, 1, 9, 7, NULL, NULL, 1),
(14, 1, 10, 6, NULL, NULL, 1),
(15, 1, 9, 7, NULL, NULL, 1),
(16, 1, 9, 7, NULL, NULL, 1),
(17, 1, 9, 7, NULL, NULL, 1),
(18, 1, 9, 7, NULL, NULL, 1),
(19, 1, 9, 7, '2014-12-17 05:30:39', NULL, 1),
(20, 1, 9, 7, '2014-12-17 05:31:23', NULL, 1),
(21, 1, 11, 8, '2014-12-17 05:31:28', NULL, 1),
(22, 1, 11, 8, '2014-12-17 05:37:58', NULL, 1),
(23, 1, 9, 7, '2014-12-17 05:39:42', NULL, 1),
(24, 1, 9, 7, '2014-12-17 05:40:31', NULL, 1),
(25, 1, 9, 7, '2014-12-17 05:42:35', NULL, 1),
(26, 1, 9, 7, '2014-12-17 05:43:14', NULL, 1),
(27, 1, 9, 7, '2014-12-17 05:43:38', NULL, 1),
(28, 1, 9, 7, '2014-12-17 05:46:13', NULL, 1),
(29, 1, 9, 7, '2014-12-17 05:48:39', NULL, 1),
(30, 1, 11, 8, '2014-12-17 05:50:00', NULL, 1),
(31, 1, 11, 8, '2014-12-17 05:50:59', NULL, 1),
(32, 1, NULL, NULL, '2014-12-17 06:11:54', NULL, 1),
(33, NULL, NULL, NULL, '2014-12-17 06:16:11', NULL, NULL),
(34, NULL, NULL, NULL, '2014-12-17 06:17:15', NULL, NULL),
(35, NULL, NULL, NULL, '2014-12-17 06:22:47', NULL, NULL),
(36, NULL, NULL, NULL, '2014-12-17 06:26:37', NULL, NULL),
(37, NULL, NULL, NULL, '2014-12-17 06:27:06', NULL, NULL),
(38, NULL, NULL, NULL, '2014-12-17 06:27:39', NULL, NULL),
(39, NULL, NULL, NULL, '2014-12-17 06:32:09', NULL, NULL),
(40, 1, 11, 8, '2014-12-17 06:33:05', NULL, 1),
(41, 1, 11, 8, '2014-12-17 06:33:39', NULL, 1),
(42, 1, 9, 7, '2014-12-17 06:34:16', NULL, 1),
(43, 1, 11, 8, '2014-12-17 11:23:42', NULL, 1),
(44, 1, 11, 8, '2014-12-17 11:29:15', 1, 1),
(45, 1, 1, 8, '2014-12-17 12:18:15', 1, 1),
(46, 12, 1, 8, '2014-12-17 12:28:55', 1, 1),
(47, 12, 1, 8, '2014-12-17 12:46:57', 1, 1),
(48, 12, 1, 8, '2014-12-17 13:12:12', 1, 1),
(49, 12, 1, 8, '2014-12-17 15:00:14', 1, 1),
(50, 12, 1, 8, '2014-12-17 15:10:09', 1, 1),
(51, 12, 1, 8, '2014-12-17 16:36:52', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_ami` int(11) DEFAULT NULL,
  `friend` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=329 ;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_user`, `nom`, `id_logement`, `id_ami`, `friend`) VALUES
(1, NULL, '', 0, 1, 1),
(2, 1, '', 0, 1, 1),
(3, 1, '', 0, 1, 1),
(4, 1, '', 0, 12, 1),
(5, 1, '', 0, 12, 1),
(6, 1, '', 0, 12, 1),
(7, 1, '', 0, 12, 1),
(8, 1, '', 0, 12, 1),
(9, 1, '', 0, 12, 1),
(10, 1, '', 0, 12, 1),
(11, 1, '', 0, 1, 1),
(12, 1, '', 0, 1, 1),
(13, 1, '', 0, 13, 1),
(14, 1, '', 0, 13, 1),
(15, 1, '', 0, 13, 1),
(16, 1, '', 0, 13, 1),
(17, 1, '', 0, 3, 1),
(18, 1, '', 0, 12, 1),
(19, 1, '', 0, 12, 1),
(20, 1, '', 0, 14, 1),
(21, 1, '', 0, 13, 1),
(22, 1, '', 0, 3, 1),
(23, 1, '', 0, 7, 1),
(24, 1, '', 0, 1, 1),
(25, 1, '', 0, 7, 1),
(26, 1, '', 0, 7, 1),
(27, 1, '', 0, 7, 1),
(28, 1, '', 0, 12, 1),
(29, 1, '', 0, 12, 1),
(30, 1, '', 0, 12, 1),
(31, 1, '', 0, 12, 1),
(32, 1, '', 0, 12, 1),
(33, 1, '', 0, 1, 1),
(34, 1, '', 0, 1, 1),
(35, 1, '', 0, 13, 1),
(36, 1, '', 0, 13, 1),
(37, 1, '', 0, 13, 1),
(38, 1, '', 0, 13, 1),
(39, 1, '', 0, 3, 1),
(40, 1, '', 0, 12, 1),
(41, 1, '', 0, 12, 1),
(42, 1, '', 0, 14, 1),
(43, 1, '', 0, 13, 1),
(44, 1, '', 0, 3, 1),
(45, 1, '', 0, 7, 1),
(46, 1, '', 0, 1, 1),
(47, 1, '', 0, 7, 1),
(48, 1, '', 0, 12, 1),
(49, 1, '', 0, 12, 1),
(50, 1, '', 0, 12, 1),
(51, 1, '', 0, 12, 1),
(52, 1, '', 0, 12, 1),
(53, 1, '', 0, 1, 1),
(54, 1, '', 0, 1, 1),
(55, 1, '', 0, 13, 1),
(56, 1, '', 0, 13, 1),
(57, 1, '', 0, 13, 1),
(58, 1, '', 0, 13, 1),
(59, 1, '', 0, 3, 1),
(60, 1, '', 0, 12, 1),
(61, 1, '', 0, 12, 1),
(62, 1, '', 0, 14, 1),
(63, 1, '', 0, 13, 1),
(64, 1, '', 0, 3, 1),
(65, 1, '', 0, 7, 1),
(66, 1, '', 0, 1, 1),
(67, 1, '', 0, 7, 1),
(68, 1, '', 0, 12, 1),
(69, 1, '', 0, 12, 1),
(70, 1, '', 0, 12, 1),
(71, 1, '', 0, 12, 1),
(72, 1, '', 0, 12, 1),
(73, 1, '', 0, 1, 1),
(74, 1, '', 0, 1, 1),
(75, 1, '', 0, 13, 1),
(76, 1, '', 0, 13, 1),
(77, 1, '', 0, 13, 1),
(78, 1, '', 0, 13, 1),
(79, 1, '', 0, 3, 1),
(80, 1, '', 0, 12, 1),
(81, 1, '', 0, 12, 1),
(82, 1, '', 0, 14, 1),
(83, 1, '', 0, 13, 1),
(84, 1, '', 0, 3, 1),
(85, 1, '', 0, 7, 1),
(86, 1, '', 0, 1, 1),
(87, 1, '', 0, 7, 1),
(88, 1, '', 0, 12, 1),
(89, 1, '', 0, 12, 1),
(90, 1, '', 0, 12, 1),
(91, 1, '', 0, 12, 1),
(92, 1, '', 0, 12, 1),
(93, 1, '', 0, 1, 1),
(94, 1, '', 0, 1, 1),
(95, 1, '', 0, 13, 1),
(96, 1, '', 0, 13, 1),
(97, 1, '', 0, 13, 1),
(98, 1, '', 0, 13, 1),
(99, 1, '', 0, 3, 1),
(100, 1, '', 0, 12, 1),
(101, 1, '', 0, 12, 1),
(102, 1, '', 0, 14, 1),
(103, 1, '', 0, 13, 1),
(104, 1, '', 0, 3, 1),
(105, 1, '', 0, 7, 1),
(106, 1, '', 0, 1, 1),
(107, 1, '', 0, 7, 1),
(108, 1, '', 0, 12, 1),
(109, 1, '', 0, 12, 1),
(110, 1, '', 0, 12, 1),
(111, 1, '', 0, 12, 1),
(112, 1, '', 0, 12, 1),
(113, 1, '', 0, 1, 1),
(114, 1, '', 0, 1, 1),
(115, 1, '', 0, 13, 1),
(116, 1, '', 0, 13, 1),
(117, 1, '', 0, 13, 1),
(118, 1, '', 0, 13, 1),
(119, 1, '', 0, 3, 1),
(120, 1, '', 0, 12, 1),
(121, 1, '', 0, 12, 1),
(122, 1, '', 0, 14, 1),
(123, 1, '', 0, 13, 1),
(124, 1, '', 0, 3, 1),
(125, 1, '', 0, 7, 1),
(126, 1, '', 0, 1, 1),
(127, 1, '', 0, 7, 1),
(128, 1, '', 0, 12, 1),
(129, 1, '', 0, 12, 1),
(130, 1, '', 0, 12, 1),
(131, 1, '', 0, 12, 1),
(132, 1, '', 0, 12, 1),
(133, 1, '', 0, 1, 1),
(134, 1, '', 0, 1, 1),
(135, 1, '', 0, 13, 1),
(136, 1, '', 0, 13, 1),
(137, 1, '', 0, 13, 1),
(138, 1, '', 0, 13, 1),
(139, 1, '', 0, 3, 1),
(140, 1, '', 0, 12, 1),
(141, 1, '', 0, 12, 1),
(142, 1, '', 0, 14, 1),
(143, 1, '', 0, 13, 1),
(144, 1, '', 0, 3, 1),
(145, 1, '', 0, 7, 1),
(146, 1, '', 0, 1, 1),
(147, 1, '', 0, 7, 1),
(148, 1, '', 0, 12, 1),
(149, 1, '', 0, 12, 1),
(150, 1, '', 0, 12, 1),
(151, 1, '', 0, 12, 1),
(152, 1, '', 0, 12, 1),
(153, 1, '', 0, 1, 1),
(154, 1, '', 0, 1, 1),
(155, 1, '', 0, 13, 1),
(156, 1, '', 0, 13, 1),
(157, 1, '', 0, 13, 1),
(158, 1, '', 0, 13, 1),
(159, 1, '', 0, 3, 1),
(160, 1, '', 0, 12, 1),
(161, 1, '', 0, 12, 1),
(162, 1, '', 0, 14, 1),
(163, 1, '', 0, 13, 1),
(164, 1, '', 0, 3, 1),
(165, 1, '', 0, 7, 1),
(166, 1, '', 0, 1, 1),
(167, 1, '', 0, 7, 1),
(168, 1, '', 0, 12, 1),
(169, 1, '', 0, 12, 1),
(170, 1, '', 0, 12, 1),
(171, 1, '', 0, 12, 1),
(172, 1, '', 0, 12, 1),
(173, 1, '', 0, 1, 1),
(174, 1, '', 0, 1, 1),
(175, 1, '', 0, 13, 1),
(176, 1, '', 0, 13, 1),
(177, 1, '', 0, 13, 1),
(178, 1, '', 0, 13, 1),
(179, 1, '', 0, 3, 1),
(180, 1, '', 0, 12, 1),
(181, 1, '', 0, 12, 1),
(182, 1, '', 0, 14, 1),
(183, 1, '', 0, 13, 1),
(184, 1, '', 0, 3, 1),
(185, 1, '', 0, 7, 1),
(186, 1, '', 0, 1, 1),
(187, 1, '', 0, 7, 1),
(188, 1, '', 0, 12, 1),
(189, 1, '', 0, 12, 1),
(190, 1, '', 0, 12, 1),
(191, 1, '', 0, 12, 1),
(192, 1, '', 0, 12, 1),
(193, 1, '', 0, 1, 1),
(194, 1, '', 0, 1, 1),
(195, 1, '', 0, 13, 1),
(196, 1, '', 0, 13, 1),
(197, 1, '', 0, 13, 1),
(198, 1, '', 0, 13, 1),
(199, 1, '', 0, 3, 1),
(200, 1, '', 0, 12, 1),
(201, 1, '', 0, 12, 1),
(202, 1, '', 0, 14, 1),
(203, 1, '', 0, 13, 1),
(204, 1, '', 0, 3, 1),
(205, 1, '', 0, 7, 1),
(206, 1, '', 0, 1, 1),
(207, 1, '', 0, 7, 1),
(208, 1, '', 0, 12, 1),
(209, 1, '', 0, 12, 1),
(210, 1, '', 0, 12, 1),
(211, 1, '', 0, 12, 1),
(212, 1, '', 0, 12, 1),
(213, 1, '', 0, 1, 1),
(214, 1, '', 0, 1, 1),
(215, 1, '', 0, 13, 1),
(216, 1, '', 0, 13, 1),
(217, 1, '', 0, 13, 1),
(218, 1, '', 0, 13, 1),
(219, 1, '', 0, 3, 1),
(220, 1, '', 0, 12, 1),
(221, 1, '', 0, 12, 1),
(222, 1, '', 0, 14, 1),
(223, 1, '', 0, 13, 1),
(224, 1, '', 0, 3, 1),
(225, 1, '', 0, 7, 1),
(226, 1, '', 0, 1, 1),
(227, 1, '', 0, 7, 1),
(228, 1, '', 0, 12, 1),
(229, 1, '', 0, 12, 1),
(230, 1, '', 0, 12, 1),
(231, 1, '', 0, 12, 1),
(232, 1, '', 0, 12, 1),
(233, 1, '', 0, 1, 1),
(234, 1, '', 0, 1, 1),
(235, 1, '', 0, 13, 1),
(236, 1, '', 0, 13, 1),
(237, 1, '', 0, 13, 1),
(238, 1, '', 0, 13, 1),
(239, 1, '', 0, 3, 1),
(240, 1, '', 0, 12, 1),
(241, 1, '', 0, 12, 1),
(242, 1, '', 0, 14, 1),
(243, 1, '', 0, 13, 1),
(244, 1, '', 0, 3, 1),
(245, 1, '', 0, 7, 1),
(246, 1, '', 0, 1, 1),
(247, 1, '', 0, 7, 1),
(248, 1, '', 0, 12, 1),
(249, 1, '', 0, 12, 1),
(250, 1, '', 0, 12, 1),
(251, 1, '', 0, 12, 1),
(252, 1, '', 0, 12, 1),
(253, 1, '', 0, 1, 1),
(254, 1, '', 0, 1, 1),
(255, 1, '', 0, 13, 1),
(256, 1, '', 0, 13, 1),
(257, 1, '', 0, 13, 1),
(258, 1, '', 0, 13, 1),
(259, 1, '', 0, 3, 1),
(260, 1, '', 0, 12, 1),
(261, 1, '', 0, 12, 1),
(262, 1, '', 0, 14, 1),
(263, 1, '', 0, 13, 1),
(264, 1, '', 0, 3, 1),
(265, 1, '', 0, 7, 1),
(266, 1, '', 0, 1, 1),
(267, 1, '', 0, 7, 1),
(268, 1, '', 0, 12, 1),
(269, 1, '', 0, 12, 1),
(270, 1, '', 0, 12, 1),
(271, 1, '', 0, 12, 1),
(272, 1, '', 0, 12, 1),
(273, 1, '', 0, 1, 1),
(274, 1, '', 0, 1, 1),
(275, 1, '', 0, 13, 1),
(276, 1, '', 0, 13, 1),
(277, 1, '', 0, 13, 1),
(278, 1, '', 0, 13, 1),
(279, 1, '', 0, 3, 1),
(280, 1, '', 0, 12, 1),
(281, 1, '', 0, 12, 1),
(282, 1, '', 0, 14, 1),
(283, 1, '', 0, 13, 1),
(284, 1, '', 0, 3, 1),
(285, 1, '', 0, 7, 1),
(286, 1, '', 0, 1, 1),
(287, 1, '', 0, 7, 1),
(288, 1, '', 0, 12, 1),
(289, 1, '', 0, 12, 1),
(290, 1, '', 0, 12, 1),
(291, 1, '', 0, 12, 1),
(292, 1, '', 0, 12, 1),
(293, 1, '', 0, 1, 1),
(294, 1, '', 0, 1, 1),
(295, 1, '', 0, 13, 1),
(296, 1, '', 0, 13, 1),
(297, 1, '', 0, 13, 1),
(298, 1, '', 0, 13, 1),
(299, 1, '', 0, 3, 1),
(300, 1, '', 0, 12, 1),
(301, 1, '', 0, 12, 1),
(302, 1, '', 0, 14, 1),
(303, 1, '', 0, 13, 1),
(304, 1, '', 0, 3, 1),
(305, 1, '', 0, 7, 1),
(306, 1, '', 0, 1, 1),
(307, 1, '', 0, 7, 1),
(308, 1, '', 0, 12, 1),
(309, 1, '', 0, 12, 1),
(310, 1, '', 0, 12, 1),
(311, 1, '', 0, 12, 1),
(312, 1, '', 0, 12, 1),
(313, 1, '', 0, 1, 1),
(314, 1, '', 0, 1, 1),
(315, 1, '', 0, 13, 1),
(316, 1, '', 0, 13, 1),
(317, 1, '', 0, 13, 1),
(318, 1, '', 0, 13, 1),
(319, 1, '', 0, 3, 1),
(320, 1, '', 0, 12, 1),
(321, 1, '', 0, 12, 1),
(322, 1, '', 0, 14, 1),
(323, 1, '', 0, 13, 1),
(324, 1, '', 0, 3, 1),
(325, 1, '', 0, 7, 1),
(326, 1, '', 0, 1, 1),
(327, 1, '', 0, 7, 1),
(328, 1, '', 0, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE IF NOT EXISTS `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `Localisation` text NOT NULL,
  `Nom de la maison` text CHARACTER SET latin1 NOT NULL,
  `Nombre_voyageurs` int(11) DEFAULT NULL,
  `Type_logement` longtext CHARACTER SET latin1,
  `Nb de chambres` int(11) NOT NULL,
  `Nb de salles de bains` int(11) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `id_users`, `Localisation`, `Nom de la maison`, `Nombre_voyageurs`, `Type_logement`, `Nb de chambres`, `Nb de salles de bains`, `Description`) VALUES
(1, 1, 'Paris, Ile-de-France', 'Au coeur de Paris', 4, 'Appartement', 3, 2, 'Adorable pied a-terre, a quinze minutes a pied de Montmartre, de l''Opera , des grands magasins et du Louvre, et surtout, a l''angle de la rue des Martyrs, l''une des rues les plus animees de Paris, avec tous ses commerces, ses artisans, et ses restaura'),
(2, 11, 'Deauville, Basse Normandie', 'Chambre avec vue', 3, 'Maison', 2, 1, 'Ideale pour passe de bonnes vacances a la mer. <br> </br>\r\n\r\nC''est une maison en rez-de-chausse en plein centre ville. <br> </br>\r\n\r\nMaison idealement situee a 10mn de la plage, du casino et de la gare.\r\n\r\n'),
(3, 9, 'Nice, Provence-Alpes-Cotes-d''Azure', 'Nice en toute tranquilite', 5, 'Villa', 3, 2, 'Nouvel appartement dans la vieille ville de Nice a 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personnes, dispose d''une chambre en mezzanine ainsi que d''un canape lit au salon. L''appartement vient d''etre completement refait, il dispose de la clim ainsi qu''internet.'),
(4, 10, 'Strasbourg, Alsace', '2 pieces pres du centre ville', 2, 'Appartement', 1, 1, 'Charmant appartement au coeur de Strasbourg, a deux pas de la cathedrale, des marches de noel, des musees, des boutiques et des meilleurs winstubs traditionnels. Ce 2 pieces est idealement situe dans la zone pietonne du Carre d''Or.'),
(5, 11, 'Lyon, Rhones-Alpes', 'Ancien atelier de soierie', 4, 'Loft', 0, 0, 'Ancien atelier de soierie que j''ai rehabilite pour y vivre il y a deux ans dans un esprit \r\n"Loft" chaleureux,calme et epure. Entierement equipe et dote de nombreux espaces de rangement,il constitue certainement un pied a terre ideal pour decouvrir Lyon,de par son emplacement et son confort.'),
(6, 10, 'Marseille, Provence-Alpes-Cote-d''Azure', 'Le vieux Port', 6, 'Maison', 4, 2, 'Votre logement au coeur de Marseille a la plaine dans une maison au calme avec jardin et terrasse.\r\nVous serez au coeur de la vie Marseillaise resto, cafe, galerie d''art et cinema.. tout en etant au calme et profitez de l''acces facile au tram metro bus'),
(7, 9, 'Paris, Ile-de-France', 'Chez Zadig et Voltaire', 4, 'Appartement', 0, 0, 'Appartement de 35 m2 sur la butte Sainte Anne &#224; Nantes dans une rue calme, &#224; 5 minutes du centre ville. Transport en commun &#224; proximit&#233; (Tram et bus). \r\nUne grande chambre et un salon/cuisine &#233;quip&#233;. '),
(8, 1, 'Paris, Ile-de-France', 'La Maison lumi&#232;re', 2, 'Appartement', 0, 0, 'L''appartement se situe &#224; 3min du metro Compans, &#224; 10 min de la place du Capitole. \r\nId&#233;alement situ&#233; pour un point de d&#233;part &#224; la d&#233;couverte de la ville rose. Je serais ravi de vous indiquer les endroits &#224; voir et &#224; vous faire partager mon exp&#233;rience');

-- --------------------------------------------------------

--
-- Structure de la table `logement_has_contrainte`
--

CREATE TABLE IF NOT EXISTS `logement_has_contrainte` (
  `logement_id` int(11) NOT NULL,
  `contrainte_id_contrainte` int(11) NOT NULL,
  PRIMARY KEY (`logement_id`,`contrainte_id_contrainte`),
  KEY `fk_logement_has_contrainte_contrainte1_idx` (`contrainte_id_contrainte`),
  KEY `fk_logement_has_contrainte_logement1_idx` (`logement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logement_has_services`
--

CREATE TABLE IF NOT EXISTS `logement_has_services` (
  `logement_id` int(11) NOT NULL,
  `services_id_service` int(11) NOT NULL,
  PRIMARY KEY (`logement_id`,`services_id_service`),
  KEY `fk_logement_has_services_services1_idx` (`services_id_service`),
  KEY `fk_logement_has_services_logement1_idx` (`logement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id_media` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_logement_id` int(11) NOT NULL,
  `Liendelaphoto` varchar(300) NOT NULL,
  PRIMARY KEY (`id_media`),
  KEY `fk_media_users1_idx` (`users_id`,`users_logement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediteur` int(11) NOT NULL DEFAULT '0',
  `id_destinataire` int(11) NOT NULL DEFAULT '0',
  `date_update` datetime DEFAULT NULL,
  `titre` text NOT NULL,
  `message` text NOT NULL,
  `lu_nonlu` int(11) DEFAULT NULL,
  `echange` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `date_update`, `titre`, `message`, `lu_nonlu`, `echange`) VALUES
(1, 0, 0, '0000-00-00 00:00:00', 'Flan', 'J''aime le flan', NULL, NULL),
(2, 7, 0, '0000-00-00 00:00:00', 'Slip', 'Je porte des slips', NULL, NULL),
(3, 7, 0, '0000-00-00 00:00:00', 'Tamer', 'Elle est...bien', NULL, NULL),
(4, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL),
(5, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL),
(6, 7, 1, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL),
(7, 7, 3, '0000-00-00 00:00:00', 'Roule', 'Ma poule', NULL, NULL),
(8, 1, 1, '0000-00-00 00:00:00', 'Moi meme', 'Je m''écris à moi même, il faut changer ça', NULL, NULL),
(9, 1, 3, '0000-00-00 00:00:00', 'Second message', 'Je m''écris à moi même, il faut changer ça', NULL, NULL),
(10, 1, 10, '0000-00-00 00:00:00', 'Hey', 'What else ?', NULL, NULL),
(11, 7, 2, '0000-00-00 00:00:00', 'Il est tard', 'Je vais être exténué en anglais...', NULL, NULL),
(12, 7, 1, '0000-00-00 00:00:00', 'Il est tard', 'Je vais être exténué en anglais...', NULL, NULL),
(13, 7, 2, '0000-00-00 00:00:00', 'Il est tard', 'Je vais être exténué en anglais...', NULL, NULL),
(14, 7, 2, '0000-00-00 00:00:00', 'Il est tard', 'Je vais être exténué en anglais...', NULL, NULL),
(15, 3, 1, '0000-00-00 00:00:00', 'Everything is fine ?', 'Je pense que tout est ok cette fois !', NULL, NULL),
(16, 13, 1, '0000-00-00 00:00:00', 'Premier message', 'Essai d''envoi de mon premier message à Manu', NULL, NULL),
(17, 14, 1, '0000-00-00 00:00:00', 'Bonjour', 'Votre logement m''intéresse !', NULL, NULL),
(18, 12, 1, '0000-00-00 00:00:00', 'Test', 'Testeuh', NULL, NULL),
(19, 12, 1, '2014-12-16 16:00:06', 'test', 'test', NULL, NULL),
(20, 3, 1, '2014-12-16 16:30:09', 'Test', 'Second message', NULL, NULL),
(21, 1, 13, '2014-12-16 16:42:11', 'Test1', 'yo', NULL, NULL),
(22, 1, 13, '2014-12-16 16:42:18', 'test2', 'Yes', NULL, NULL),
(23, 1, 13, '2014-12-16 16:42:26', 'Test3', 'papa !', NULL, NULL),
(24, 13, 1, '2014-12-17 04:41:41', 'Essai ', 'Essai de MAJ d''une entrée du champ lu_nonlu', NULL, NULL),
(25, 13, 1, '2014-12-17 04:43:06', 'Essai ', 'Essai de MAJ d''une entrée du champ lu_nonlu', NULL, NULL),
(26, 13, 1, '2014-12-17 04:43:48', 'Essai ', 'Essai de MAJ d''une entrée du champ lu_nonlu', NULL, NULL),
(27, 13, 1, '2014-12-17 04:44:04', 'Essai ', 'Essai de MAJ d''une entrée du champ lu_nonlu', NULL, NULL),
(28, 1, 11, '2014-12-17 05:37:58', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', NULL, NULL),
(29, 1, 9, '2014-12-17 05:39:42', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', 1, NULL),
(30, 1, 9, '2014-12-17 05:40:31', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', NULL, NULL),
(31, 1, 9, '2014-12-17 05:42:35', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', NULL, NULL),
(32, 1, 9, '2014-12-17 05:43:14', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', NULL, NULL),
(33, 1, 9, '2014-12-17 05:43:38', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', 1, NULL),
(34, 1, 9, '2014-12-17 05:46:13', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', 1, NULL),
(35, 1, 9, '2014-12-17 05:48:39', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', 1, NULL),
(36, 1, 11, '2014-12-17 05:50:00', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', 1, NULL),
(37, 1, 11, '2014-12-17 05:50:59', 'Proposition d''échange', 'Voulez vous échanger votre logement avec moi ?', 1, NULL),
(38, 1, 11, '2014-12-17 06:33:39', 'Proposition d''échange', 'Echange batar', 1, NULL),
(39, 1, 9, '2014-12-17 06:34:16', 'Proposition d''échange', 'Echange salop''', 1, NULL),
(40, 1, 1, '2014-12-17 11:21:26', 'test', 'Encore à moi même !', NULL, NULL),
(41, 1, 11, '2014-12-17 11:23:42', 'Proposition d''échange', 'Echange ça batar', 1, NULL),
(42, 1, 11, '2014-12-17 11:29:15', 'Proposition d''échange', 'test', 1, NULL),
(43, 1, 1, '2014-12-17 12:18:15', 'Proposition d''échange', 'Wesh yoko azy file la barak', NULL, 1),
(44, 12, 1, '2014-12-17 12:28:55', 'Proposition d''échange', 'Accepte bitch !', NULL, 1),
(45, 12, 1, '2014-12-17 12:46:57', 'Proposition d''échange', 'Seconde tentative magueule', NULL, 1),
(46, 12, 1, '2014-12-17 13:12:12', 'Proposition d''échange', 'Test', NULL, 1),
(47, 12, 1, '2014-12-17 15:00:14', 'Proposition d''échange', 'bitch', NULL, 1),
(48, 12, 1, '2014-12-17 15:10:09', 'Proposition d''échange', 'Allez !', NULL, 1),
(49, 1, 12, '2014-12-17 16:35:52', 'Pourquoi pas', 'Surtout parce que vous avez l''air mignonne !', 1, NULL),
(50, 12, 1, '2014-12-17 16:36:52', 'Proposition d''échange', 'Tu veux échanger avec moi Yoko ?', NULL, 1),
(51, 1, 12, '2014-12-17 16:37:37', 'Critères', 'Quels sont vos critères ?', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `Id` int(11) NOT NULL,
  `Liendelaphoto` varchar(800) NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `Id`, `Liendelaphoto`) VALUES
(1, 1, 'http://luxurymust-hospitality.com/sites/default/files/hotel-edmond-0.jpg'),
(2, 2, 'http://location-villa-marrakech.fr/wp-content/uploads/2013/05/location_villa_riad_marrakech_0cdd6021cf47bf3c3c524ee7985353c5_medium.jpg'),
(3, 4, 'http://static.mytravelchic.com/images/hotels/243/18983.jpg'),
(4, 3, 'http://www.clapeau.com/site/wp-content/uploads/2013/11/home.jpg'),
(6, 5, 'http://www.casabrasil.biz/images/accueil/casabrasil-maisons-bois-exterieur-41.jpg'),
(7, 6, 'http://www.domainedumirage.com/timthumb.php?src=uploads/files/image-site1modules0camera0models0camera-3.jpg&w=1200&h=700?1417824000026'),
(8, 7, 'http://www.directvillasproperties.com/wp-content/gallery/white-house-vdl/vale%20do%20lobo%20luxury%20villa%20for%20rent%20%20(7).JPG'),
(9, 8, 'http://www.lareserve-ramatuelle.com/files/9212/8704/6210/villa16_4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Preference_echange` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `signup_date` int(10) NOT NULL,
  `avatar` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `Description`, `Preference_echange`, `password`, `email`, `rights`, `signup_date`, `avatar`) VALUES
(1, 'Yoko', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yoko@moncul.com', '', 0, 'http://golem13.fr/wp-content/uploads/2013/06/profile.jpg'),
(2, 'Alexis', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'alex@gmai.com', '', 0, 'http://img.clubic.com/05486567-photo-scott-forstall.jpg'),
(3, 'Manu', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'manu@gmail.com', '', 0, ''),
(4, 'Geekelektro', '', '', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'beaudru.manuel@gmail.com', '', 0, ''),
(5, 'Tsuno', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(6, 'Toto', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'toto@mail.com', '', 0, ''),
(7, 'tata', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(8, 'Titi', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(9, 'Julie', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'julie@gmail.com', '', 0, 'http://golem13.fr/wp-content/uploads/2013/06/profile.jpg'),
(10, 'Georges', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'Georges.Dupont@gmail.com', '', 0, 'http://a141.idata.over-blog.com/300x300/3/97/66/52/george-clooney-nespresso.jpg'),
(11, 'John', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'john.dumont@gmail.com', '', 0, 'http://s.plurielles.fr/mmdia/i/98/4/festival-de-monte-carlo-les-stars-de-la-tele-sont-au-rendez-vous-4695984xwoja.jpg?v=4'),
(12, 'Manuel', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'beaudru.manuel@gmail.com', '', 0, ''),
(13, 'Stéphane', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'stephane@gmail.com', '', 0, ''),
(14, 'Montout', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'azerty@gmail.com', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `users_has_logement`
--

CREATE TABLE IF NOT EXISTS `users_has_logement` (
  `users_id` int(11) NOT NULL,
  `users_logement_id` int(11) NOT NULL,
  `logement_id` int(11) NOT NULL,
  PRIMARY KEY (`users_id`,`users_logement_id`,`logement_id`),
  KEY `fk_users_has_logement_logement1_idx` (`logement_id`),
  KEY `fk_users_has_logement_users1_idx` (`users_id`,`users_logement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_has_voeux`
--

CREATE TABLE IF NOT EXISTS `user_has_voeux` (
  `id_voeu` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `users_logement_id` int(11) NOT NULL,
  `users_id1` int(11) NOT NULL,
  `users_logement_id1` int(11) NOT NULL,
  PRIMARY KEY (`id_voeu`),
  KEY `fk_users_has_users_users2_idx` (`users_id1`,`users_logement_id1`),
  KEY `fk_users_has_users_users1_idx` (`users_id`,`users_logement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `logement_has_contrainte`
--
ALTER TABLE `logement_has_contrainte`
  ADD CONSTRAINT `fk_logement_has_contrainte_contrainte1` FOREIGN KEY (`contrainte_id_contrainte`) REFERENCES `contrainte` (`id_contrainte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logement_has_contrainte_logement1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `logement_has_services`
--
ALTER TABLE `logement_has_services`
  ADD CONSTRAINT `fk_logement_has_services_logement1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logement_has_services_services1` FOREIGN KEY (`services_id_service`) REFERENCES `services` (`id_service`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
