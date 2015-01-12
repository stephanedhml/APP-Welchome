-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Janvier 2015 à 02:39
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
  `date_commentaire` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8 NOT NULL,
  `groupe_commentaire` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_commentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `contrainte`
--

CREATE TABLE IF NOT EXISTS `contrainte` (
  `id_contrainte` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contrainte` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description_contrainte` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_contrainte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `echange`
--

CREATE TABLE IF NOT EXISTS `echange` (
  `id_echange` int(11) NOT NULL AUTO_INCREMENT,
  `id_demandeur` int(11) DEFAULT NULL,
  `id_proprietaire` int(11) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  `user1` int(11) DEFAULT NULL,
  `user2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_echange`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `echange`
--

INSERT INTO `echange` (`id_echange`, `id_demandeur`, `id_proprietaire`, `id_logement`, `date_update`, `user1`, `user2`) VALUES
(1, 1, 3, 6, '2014-12-18 10:26:58', 1, 1),
(2, 1, 3, 6, '2014-12-18 10:28:16', 1, 1),
(3, 1, 3, 6, '2014-12-18 10:29:57', 1, 1),
(4, 15, 3, 6, '2014-12-18 10:43:07', 1, 1),
(5, 15, 11, 8, '2014-12-18 11:23:13', 1, NULL),
(6, 23, 9, 7, '2014-12-18 22:36:14', 1, 1),
(7, 23, 1, 7, '2014-12-18 22:39:52', 1, 1),
(8, 23, 1, 7, '2014-12-19 14:28:04', 1, 1),
(9, 24, 23, 14, '2014-12-19 14:32:39', 1, 1),
(10, 24, 1, 7, '2014-12-19 17:27:43', 1, 1),
(11, 23, 1, 7, '2015-01-09 16:41:59', 1, 1),
(12, 23, 1, 7, '2015-01-09 16:59:25', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE IF NOT EXISTS `favoris` (
  `id_favoris` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nom_favoris` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_logement` int(11) NOT NULL,
  `id_ami` int(11) DEFAULT NULL,
  `friend` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_favoris`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`id_favoris`, `id_user`, `nom_favoris`, `id_logement`, `id_ami`, `friend`) VALUES
(1, 3, '', 0, 1, 1),
(2, 1, '', 0, 3, 1),
(3, 3, '', 0, 1, 1),
(4, 1, '', 0, 3, 1),
(5, 3, '', 0, 1, 1),
(6, 1, '', 0, 3, 1),
(7, 3, '', 0, 7, 1),
(8, 7, '', 0, 3, 1),
(9, 3, '', 0, 15, 1),
(10, 15, '', 0, 3, 1),
(11, 1, '', 0, 23, 1),
(12, 23, '', 0, 1, 1),
(13, 1, '', 0, 23, 1),
(14, 23, '', 0, 1, 1),
(15, 23, '', 0, 24, 1),
(16, 24, '', 0, 23, 1),
(17, 1, '', 0, 24, 1),
(18, 24, '', 0, 1, 1),
(19, 1, '', 0, 23, 1),
(20, 23, '', 0, 1, 1),
(21, 1, '', 0, 23, 1),
(22, 23, '', 0, 1, 1),
(23, 1, '', 0, 23, 1),
(24, 23, '', 0, 1, 1),
(25, 1, '', 0, 24, 1),
(26, 24, '', 0, 1, 1),
(27, 1, '', 0, 23, 1),
(28, 23, '', 0, 1, 1),
(29, 1, '', 0, 23, 1),
(30, 23, '', 0, 1, 1),
(31, 1, '', 0, 3, 1),
(32, 3, '', 0, 1, 1),
(33, 1, '', 0, 1, 1),
(34, 1, '', 0, 1, 1),
(35, 1, '', 0, 7, 1),
(36, 7, '', 0, 1, 1),
(37, 1, '', 0, 23, 1),
(38, 23, '', 0, 1, 1),
(39, 1, '', 0, 23, 1),
(40, 23, '', 0, 1, 1),
(41, 1, '', 0, 24, 1),
(42, 24, '', 0, 1, 1),
(43, 1, '', 0, 23, 1),
(44, 23, '', 0, 1, 1),
(45, 1, '', 0, 23, 1),
(46, 23, '', 0, 1, 1),
(47, 1, '', 0, 3, 1),
(48, 3, '', 0, 1, 1),
(49, 1, '', 0, 1, 1),
(50, 1, '', 0, 1, 1),
(51, 1, '', 0, 7, 1),
(52, 7, '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum_forum`
--

CREATE TABLE IF NOT EXISTS `forum_forum` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `nb_message` int(11) NOT NULL,
  `last_message` text,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `forum_forum`
--

INSERT INTO `forum_forum` (`id_cat`, `nom_cat`, `description`, `nb_message`, `last_message`) VALUES
(2, 'Site', 'Toutes les news concernant le site (améliorations, propositions etc)', 0, '23'),
(3, 'Boîte à idées', 'Propositions des utilisateurs pour améliorer le service proposé par l''équipe Welchome', 1, '23'),
(4, 'Problèmes', 'Vous avez un problème ? On peut vous aider ! Venez exposer votre situation sur le forum !', 2, '30'),
(5, 'Blabla Corner', 'Discussions en tous genres', 4, '30');

-- --------------------------------------------------------

--
-- Structure de la table `forum_post`
--

CREATE TABLE IF NOT EXISTS `forum_post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `texte_post` text NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `forum_post`
--

INSERT INTO `forum_post` (`id_post`, `id_user`, `id_topic`, `texte_post`) VALUES
(6, 23, 4, 'Essai 2'),
(7, 23, 2, 'Ouais j''avoue'),
(9, 23, 2, 'A fond !'),
(10, 23, 1, 'Une petite réponse pour meubler quand même'),
(12, 23, 1, 'Encore une'),
(13, 1, 6, 'Réponse ?'),
(15, 1, 5, 'I''d like to share with you something very disturbing, BITCH'),
(16, 1, 6, 'Eh oh ?'),
(17, 30, 6, 'Ca marche bien !\r\n'),
(18, 30, 7, 'Where are you ? Still fucking this indian child ?!'),
(19, 23, 6, 'A voir ! Putain la boite de dialogue s''affiche n''importe comment, je te hais !'),
(20, 23, 6, 'Ah c''est bon, problem solved !'),
(21, 3, 6, 'Ici on peut répondre à la vitesse de l''éclair !'),
(22, 23, 6, 'Essai !\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `forum_topic`
--

CREATE TABLE IF NOT EXISTS `forum_topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `id_cat` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `nom_topic` text NOT NULL,
  `topic_first_post` text NOT NULL,
  `nb_answer` int(11) NOT NULL,
  `nb_views` int(11) NOT NULL,
  `priority_topic` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `forum_topic`
--

INSERT INTO `forum_topic` (`id_topic`, `id_cat`, `id_user`, `nom_topic`, `topic_first_post`, `nb_answer`, `nb_views`, `priority_topic`) VALUES
(5, 3, 23, 'Barre de menu', 'Recentrer le menu car il pose problème !', 1, 16, NULL),
(6, 2, 1, 'Essai d''un nouveau sujet', '1, 3, 6 , 18 !', 0, 41, NULL),
(7, 5, 30, 'Carrie, my love', 'I''m alive !', 0, 9, NULL),
(9, NULL, 30, 'essai 2', 'try outing !', 0, 0, NULL),
(10, 4, 30, 'Back-Office', 'On peut considérer comme un problème le lack de back-office non ? :P', 0, 1, NULL),
(11, 4, 30, 'Essai', 'J''essaye !', 0, 1, NULL),
(12, 3, 23, 'Javascript', 'On veut du javascript !!', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE IF NOT EXISTS `logement` (
  `id_logement` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `localisation` text NOT NULL,
  `type_endroit` varchar(200) NOT NULL,
  `nom_maison` text NOT NULL,
  `nombre_voyageurs` int(11) DEFAULT NULL,
  `type_logement` longtext,
  `nb_chambres` int(11) NOT NULL,
  `nb_salles_bains` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `description_logement` text NOT NULL,
  `attributs_logement` text NOT NULL,
  `date_début_disponibilite` date NOT NULL,
  `date_fin_disponibilite` date NOT NULL,
  `date_publication_logement` date NOT NULL,
  `television` int(11) DEFAULT NULL,
  `machine_a_laver` int(11) DEFAULT NULL,
  `parking` int(11) DEFAULT NULL,
  `climatisation` int(11) DEFAULT NULL,
  `piscine` int(11) DEFAULT NULL,
  `jardin` int(11) DEFAULT NULL,
  `numero_logement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_logement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `id_users`, `localisation`, `type_endroit`, `nom_maison`, `nombre_voyageurs`, `type_logement`, `nb_chambres`, `nb_salles_bains`, `superficie`, `description_logement`, `attributs_logement`, `date_début_disponibilite`, `date_fin_disponibilite`, `date_publication_logement`, `television`, `machine_a_laver`, `parking`, `climatisation`, `piscine`, `jardin`, `numero_logement`) VALUES
(1, 2, 'Paris, Ile-de-France', '', 'Au coeur de Paris', 4, 'Appartement', 3, 2, 0, 'Adorable pied a-terre, a quinze minutes a pied de Montmartre, de l''Opera , des grands magasins et du Louvre, et surtout, a l''angle de la rue des Martyrs, l''une des rues les plus animees de Paris, avec tous ses commerces, ses artisans, et ses restaura', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 11, 'Deauville, Basse Normandie', '', 'Chambre avec vue', 3, 'Maison', 2, 1, 0, 'Ideale pour passe de bonnes vacances a la mer. <br> </br>\r\n\r\nC''est une maison en rez-de-chausse en plein centre ville. <br> </br>\r\n\r\nMaison idealement situee a 10mn de la plage, du casino et de la gare.\r\n\r\n', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 9, 'Nice, Provence-Alpes-Cotes-d''Azure', 'ville', 'Nice en toute tranquilite', 5, 'maison', 3, 2, 150, 'Nouvel appartement dans la vieille ville de Nice a 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personnes, dispose d''une chambre en mezzanine ainsi que d''un canape lit au salon. L''appartement vient d''etre completement refait, il dispose de la clim ainsi qu''internet.', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 10, 'Strasbourg, Alsace', '', '2 pieces pres du centre ville', 2, 'Appartement', 1, 1, 0, 'Charmant appartement au coeur de Strasbourg, a deux pas de la cathedrale, des marches de noel, des musees, des boutiques et des meilleurs winstubs traditionnels. Ce 2 pieces est idealement situe dans la zone pietonne du Carre d''Or.', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 11, 'Lyon, Rhones-Alpes', '', 'Ancien atelier de soierie', 4, 'Loft', 0, 0, 0, 'Ancien atelier de soierie que j''ai rehabilite pour y vivre il y a deux ans dans un esprit \r\n"Loft" chaleureux,calme et epure. Entierement equipe et dote de nombreux espaces de rangement,il constitue certainement un pied a terre ideal pour decouvrir Lyon,de par son emplacement et son confort.', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'Marseille, Provence-Alpes-Cote-d''Azure', '', 'Le vieux Port', 6, 'Pavillon', 4, 2, 3000, 'Franchement je mets une description, parce que sinon ça fait sacrément claudo, qu''on se le dise', '', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 1, 1, NULL),
(7, 1, '', '', '', 0, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 11, 'Paris, Ile-de-France', '', 'La Maison lumi&#232;re', 2, 'Appartement', 0, 0, 0, 'L''appartement se situe &#224; 3min du metro Compans, &#224; 10 min de la place du Capitole. \r\nId&#233;alement situ&#233; pour un point de d&#233;part &#224; la d&#233;couverte de la ville rose. Je serais ravi de vous indiquer les endroits &#224; voir et &#224; vous faire partager mon exp&#233;rience', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0, 'Paris', '', 'Maison lune', NULL, 'Maison', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 19, 'Paris', '', 'Maison lune', NULL, 'Appartement', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 20, '', '', 'abd', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 23, 'Albuquerque', '', 'White Whitman', 3, 'Pavillon', 1, 3, 494894, 'Photo fake', '', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 1, 1, 1, 1, NULL),
(15, 24, 'Paris', '', 'Parker''s House', NULL, 'Pavillon', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 25, 'dzedezd', '', 'fdzfe', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 28, 'Paris', '', 'Pas la viande, l''humoriste !', NULL, 'Pavillon', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 23, 'Alpes', '', 'Black house', 10, 'Pavillon', 5, 2, 400, 'Une maison sublime au milieu des montagnes', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 30, '', '', 'White House', 4, 'Maison', 3, 1, 300, '', '', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 1, 1, NULL),
(23, 11, 'Angers', '', '', NULL, 'Pavillon', 1, 1, 0, 'Un logement moisi', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, 11, 'Paris', '', '', NULL, 'Maison', 2, 2, 0, 'Maison blanche', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, 11, 'Corse', '', '', NULL, 'Maison', 2, 2, 0, 'dada', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 6),
(27, 11, 'Corse', '', 'Le paradis des mafioso', NULL, 'Pavillon', 2, 2, 15, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, NULL, 1, 1, NULL, 7);

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
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_expediteur` int(11) NOT NULL DEFAULT '0',
  `id_destinataire` int(11) NOT NULL DEFAULT '0',
  `date_update` datetime DEFAULT '0000-00-00 00:00:00',
  `titre_message` text CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `lu_nonlu` int(11) DEFAULT NULL,
  `echange` int(11) DEFAULT NULL,
  `choix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id_message`, `id_expediteur`, `id_destinataire`, `date_update`, `titre_message`, `message`, `lu_nonlu`, `echange`, `choix`) VALUES
(1, 0, 0, '0000-00-00 00:00:00', 'Flan', 'J''aime le flan', NULL, NULL, 0),
(2, 7, 0, '0000-00-00 00:00:00', 'Slip', 'Je porte des slips', NULL, NULL, 0),
(3, 7, 0, '0000-00-00 00:00:00', 'Tamer', 'Elle est...bien', NULL, NULL, 0),
(4, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL, 0),
(5, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL, 0),
(6, 7, 1, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL, 0),
(7, 7, 3, '0000-00-00 00:00:00', 'Roule', 'Ma poule', NULL, NULL, 0),
(8, 1, 1, '0000-00-00 00:00:00', 'Moi meme', 'Je m''écris à moi même, il faut changer ça', NULL, NULL, 0),
(9, 1, 3, '0000-00-00 00:00:00', 'Second message', 'Je m''écris à moi même, il faut changer ça', NULL, NULL, 0),
(10, 1, 3, '2014-12-18 10:28:16', 'Proposition d''échange', 'essai jeudi matin', NULL, 1, 0),
(11, 1, 3, '2014-12-18 10:29:57', 'Proposition d''échange', 'essai jeudi matin', NULL, 1, 0),
(12, 15, 3, '2014-12-18 10:43:07', 'Proposition d''échange', 'Salut vieux, tu veux échanger ta barak ?', NULL, 1, 0),
(13, 3, 15, '2014-12-18 10:49:58', 'Service', 'Par contre je prends ta mère', NULL, NULL, 0),
(14, 3, 1, '2014-12-18 10:52:02', 'Wesh yoko', 't tro bon', NULL, NULL, 0),
(15, 3, 15, '2014-12-18 10:52:21', 'Azy', 'T''as la kam ?', NULL, NULL, 0),
(16, 3, 15, '2014-12-18 10:53:52', 'essai', 'lkk', NULL, NULL, 0),
(17, 15, 3, '2014-12-18 10:54:47', 'adazdazd', 'dazdazdazd', NULL, NULL, 0),
(18, 15, 11, '2014-12-18 11:23:13', 'Proposition d''échange', 'ezez', NULL, 1, 0),
(19, 23, 9, '2014-12-18 22:36:14', 'Proposition d''échange', 'Salut ma grande ! On échange ?', NULL, 1, 0),
(20, 23, 1, '2014-12-18 22:39:52', 'Proposition d''échange', 'Wesh Yoko ! On se connait t''as vu ? On échange ?', NULL, 1, 0),
(21, 23, 1, '2014-12-19 14:28:04', 'Proposition d''échange', 'Salut Yoko, on échange ?', NULL, 1, 0),
(22, 24, 23, '2014-12-19 14:32:39', 'Proposition d''échange', 'SAlut bonhomme !', NULL, 1, 0),
(23, 23, 24, '2014-12-19 14:37:01', 'Wesh', 'Je veux du cash !', NULL, NULL, 0),
(24, 24, 1, '2014-12-19 17:27:43', 'Proposition d''échange', 'Salut Yoko, tu veux échanger avec moi ?', NULL, 1, 0),
(25, 23, 1, '2015-01-09 16:28:03', 'Test', 'Teste !', NULL, NULL, 0),
(26, 23, 1, '2015-01-09 16:41:59', 'Proposition d''échange', 'Test d''echange pour choix', NULL, 1, NULL),
(27, 1, 23, '2015-01-09 16:58:43', 'Test', 'Oui Non', NULL, NULL, NULL),
(28, 23, 1, '2015-01-09 16:59:25', 'Proposition d''échange', 'Echange !', NULL, 1, NULL),
(29, 1, 1, '2015-01-09 17:15:59', 'Essai', 'Refresh après envoi message ?', NULL, NULL, NULL),
(30, 1, 1, '2015-01-09 17:17:11', 'What the', 'Shit ?', NULL, NULL, NULL),
(31, 1, 1, '2015-01-09 17:18:06', 'court', 'circuit', NULL, NULL, NULL),
(32, 1, 1, '2015-01-09 17:18:39', 'circuit', 'cours !', NULL, NULL, NULL),
(33, 1, 1, '2015-01-09 17:19:58', 'ref', 'resh', NULL, NULL, NULL),
(34, 1, 1, '2015-01-09 17:20:35', 're', 'fef', NULL, NULL, NULL),
(35, 1, 1, '2015-01-09 17:20:45', 'hry', 'hr', NULL, NULL, NULL),
(36, 1, 1, '2015-01-09 17:22:59', 'greg', 'geg', NULL, NULL, NULL),
(37, 1, 1, '2015-01-09 17:24:49', 'greg', 'geg', NULL, NULL, NULL),
(38, 1, 1, '2015-01-09 17:25:24', 'essai', 'fructueux', NULL, NULL, NULL),
(39, 1, 1, '2015-01-09 17:32:54', 'try', 'out', NULL, NULL, NULL),
(40, 1, 1, '2015-01-09 17:37:05', 'eazea', 'eazeaz', NULL, NULL, NULL),
(41, 3, 1, '2015-01-10 04:38:10', 'Coucou mon ami', 'Hey !', NULL, NULL, NULL),
(42, 23, 1, '2015-01-10 04:56:59', 'fzfez', 'fezfezf', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_logement` int(11) NOT NULL,
  `lien_photo` varchar(800) CHARACTER SET utf8 NOT NULL,
  `chemin_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `id_logement`, `lien_photo`, `chemin_photo`) VALUES
(1, 1, 'http://luxurymust-hospitality.com/sites/default/files/hotel-edmond-0.jpg', ''),
(2, 2, 'http://location-villa-marrakech.fr/wp-content/uploads/2013/05/location_villa_riad_marrakech_0cdd6021cf47bf3c3c524ee7985353c5_medium.jpg', ''),
(3, 4, 'http://static.mytravelchic.com/images/hotels/243/18983.jpg', ''),
(4, 3, 'http://www.clapeau.com/site/wp-content/uploads/2013/11/home.jpg', ''),
(5, 5, 'http://www.casabrasil.biz/images/accueil/casabrasil-maisons-bois-exterieur-41.jpg', ''),
(6, 6, 'http://www.domainedumirage.com/timthumb.php?src=uploads/files/image-site1modules0camera0models0camera-3.jpg&w=1200&h=700?1417824000026', ''),
(8, 7, 'http://www.directvillasproperties.com/wp-content/gallery/white-house-vdl/vale%20do%20lobo%20luxury%20villa%20for%20rent%20%20(7).JPG', ''),
(9, 8, 'http://www.lareserve-ramatuelle.com/files/9212/8704/6210/villa16_4.jpg', ''),
(10, 14, 'http://www.trendsnow.net/cms/uploads/2012/07/villa-in-andalucia-by-mclean-quinlan-architects-04.jpg', ''),
(11, 15, 'http://www.fr.villasimagen.com/images/villa_vista_ibiza/villa_vistaibizai_javea.jpg', ''),
(12, 17, 'http://www.domainedumirage.com/timthumb.php?src=uploads/files/image-site1modules0camera0models0camera-3.jpg&w=1200&h=700?1417824000026', ''),
(13, 18, 'http://www.casabrasil.biz/images/accueil/casabrasil-maisons-bois-exterieur-41.jpg', ''),
(14, 19, '../photos_logement/19.jpg', ''),
(16, 27, '../photos_logement/7.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom_services` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description_services` text CHARACTER SET utf8 NOT NULL,
  `id_logement` int(11) NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nom_user` varchar(200) NOT NULL,
  `prenom_user` varchar(200) NOT NULL,
  `description_users` text NOT NULL,
  `preference_echange` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `signup_date` date NOT NULL,
  `avatar` text NOT NULL,
  `sexe` text,
  `tel` text,
  `situation` text,
  `profession` text,
  `description` text,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `nom_user`, `prenom_user`, `description_users`, `preference_echange`, `password`, `email`, `rights`, `signup_date`, `avatar`, `sexe`, `tel`, `situation`, `profession`, `description`) VALUES
(1, 'Yoko', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yoko@moncul.com', '0', '0000-00-00', '../photos_utilisateurs/1.jpg', 'Femme', '0965489484', 'Célibataire', 'Baiseuse de gosse', 'Moche !'),
(2, 'Alexis', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'alex@gmai.com', '', '0000-00-00', 'http://img.clubic.com/05486567-photo-scott-forstall.jpg', NULL, NULL, NULL, NULL, NULL),
(3, 'Manu', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'manu@gmail.com', '', '0000-00-00', '../photos_utilisateurs/3.jpg', NULL, '', NULL, NULL, 'Beau gosse pas drôle, mais j''ai joué dans Kaamelott Livre VI, ça fait de moi un demi dieu'),
(4, 'Geekelektro', '', '', '', '', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'beaudru.manuel@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(5, 'Tsuno', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(6, 'Toto', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'toto@mail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(7, 'tata', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(8, 'Titi', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(9, 'Julie', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'julie@gmail.com', '', '0000-00-00', 'http://golem13.fr/wp-content/uploads/2013/06/profile.jpg', NULL, NULL, NULL, NULL, NULL),
(10, 'Georges', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Georges.Dupont@gmail.com', '', '0000-00-00', 'http://a141.idata.over-blog.com/300x300/3/97/66/52/george-clooney-nespresso.jpg', NULL, NULL, NULL, NULL, NULL),
(11, 'John', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'john.dumont@gmail.com', '', '0000-00-00', '../photos_utilisateurs/11.jpg', 'Homme', '0761116127', 'Couple', 'Mentalist', 'J''suis un beau gosse ténébreux, arrête'),
(12, 'aclementi', '', '', '', '', '083db9d38d267637fe9d28e09ef1710bc50cbe0d', 'clem07alex@aol.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(13, 'marvin', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'example@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(14, 'essai', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'example@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(15, 'Thomas', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tfeneon@juniorisep.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(16, 'Test', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dzdz@dzdz.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(17, 'Test2', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test2@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(18, 'Test3', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test2@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(19, 'Test4', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test2@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(20, 'test5', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sasa@gmail.cp', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(23, 'Manuel', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'beaudru.manuel@gmail.com', '1', '0000-00-00', '../photos_utilisateurs/23.jpg', 'Homme', '0761116127', 'Marié', 'Chemistry Teacher', 'I am the one who knocks'),
(24, '', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jparker@isep.fr', '', '0000-00-00', 'http://image.noelshack.com/fichiers/2014/51/1418995868-1939495-10205357694924760-5825936887810904973-n.jpg', NULL, NULL, NULL, NULL, NULL),
(25, 'zfzefez', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'efezfz@fezfe.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(28, 'Bigard', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jmbigard@gmail.com', '', '0000-00-00', '../photos_utilisateurs/28.jpg', 'Homme', '', 'Marié', NULL, 'Dans la vie il n''y a pas qu''le cul, il y a aussi la bite et les couilles !...Merde c''est pas de moi ça'),
(30, 'Brody', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'brody@gmail.com', '', '0000-00-00', '../photos_utilisateurs/30.jpg', 'Homme', '0761116127', 'Couple', 'Marine', 'My name is Nicholas Brody and I''m a Sergeant in the United States Marine Corps. I have a wife, and two kids, who I love. By the time you watch this, you''ll have read a lot of things about me, about what I''ve done, and so I wanted to explain myself, so that you''ll know the truth.');

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
  ADD CONSTRAINT `fk_logement_has_contrainte_logement1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id_logement`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `logement_has_services`
--
ALTER TABLE `logement_has_services`
  ADD CONSTRAINT `fk_logement_has_services_logement1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id_logement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logement_has_services_services1` FOREIGN KEY (`services_id_service`) REFERENCES `services` (`id_service`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
