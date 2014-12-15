-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 15 Décembre 2014 à 22:53
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
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediteur` int(11) NOT NULL DEFAULT '0',
  `id_destinataire` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `titre` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `date`, `titre`, `message`) VALUES
(1, 0, 0, '0000-00-00 00:00:00', 'Flan', 'J''aime le flan'),
(2, 7, 0, '0000-00-00 00:00:00', 'Slip', 'Je porte des slips'),
(3, 7, 0, '0000-00-00 00:00:00', 'Tamer', 'Elle est...bien'),
(4, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes'),
(5, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes'),
(6, 7, 1, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes'),
(7, 7, 3, '0000-00-00 00:00:00', 'Roule', 'Ma poule'),
(8, 1, 1, '0000-00-00 00:00:00', 'Moi meme', 'Je m''écris à moi même, il faut changer ça'),
(9, 1, 3, '0000-00-00 00:00:00', 'Second message', 'Je m''écris à moi même, il faut changer ça');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
