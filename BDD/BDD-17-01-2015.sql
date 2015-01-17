-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 17 Janvier 2015 à 20:35
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
-- Structure de la table `annonce_equipement`
--

CREATE TABLE IF NOT EXISTS `annonce_equipement` (
  `id_logement` int(11) NOT NULL,
  `id_equipement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonce_equipement`
--

INSERT INTO `annonce_equipement` (`id_logement`, `id_equipement`) VALUES
(2, 2),
(28, 3),
(28, 5),
(28, 4);

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
  `en_cours` int(11) DEFAULT '0',
  `demandeur_has_visited` int(11) DEFAULT NULL,
  `proprietaire_has_visited` int(11) DEFAULT NULL,
  `demandeur_want` int(11) DEFAULT NULL,
  `proprietaire_want` int(11) DEFAULT NULL,
  `end_ech` int(11) NOT NULL DEFAULT '0',
  `id_logement_asked` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_echange`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE IF NOT EXISTS `equipement` (
  `id_equipement` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  PRIMARY KEY (`id_equipement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `equipement`
--

INSERT INTO `equipement` (`id_equipement`, `nom`) VALUES
(3, 'Jardin'),
(4, 'Television'),
(5, 'Piscine'),
(6, 'Climatisation');

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
  `id_logement_proposed` int(11) NOT NULL,
  PRIMARY KEY (`id_favoris`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`id_favoris`, `id_user`, `nom_favoris`, `id_logement`, `id_ami`, `friend`, `id_logement_proposed`) VALUES
(109, 11, '', 40, 31, 1, 39),
(110, 31, '', 39, 11, 1, 40);

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
(2, 'Site', 'Toutes les news concernant le site (améliorations, propositions etc)', 0, '30'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `forum_post`
--

INSERT INTO `forum_post` (`id_post`, `id_user`, `id_topic`, `texte_post`) VALUES
(6, 23, 4, 'Essai 2'),
(7, 23, 2, 'Ouais j''avoue'),
(9, 23, 2, 'A fond !'),
(10, 23, 1, 'Une petite réponse pour meubler quand même'),
(12, 23, 1, 'Encore une'),
(15, 1, 5, 'I''d like to share with you something very disturbing, BITCH'),
(16, 1, 6, 'Eh oh ?'),
(17, 30, 6, 'Ca marche bien !\r\n'),
(18, 30, 7, 'Where are you ? Still fucking this indian child ?!'),
(19, 23, 6, 'A voir ! Putain la boite de dialogue s''affiche n''importe comment, je te hais !'),
(23, 30, 6, 'Ca commence à avoir de la gueule dites donc ! ');

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
(5, 3, 23, 'Barre de menu', 'Recentrer le menu car il pose problème !', 1, 17, NULL),
(6, 2, 1, 'Essai d''un nouveau sujet', '1, 3, 6 , 18 !', 0, 68, NULL),
(7, 5, 30, 'Carrie, my love', 'I''m alive !', 0, 9, NULL),
(9, NULL, 30, 'essai 2', 'try outing !', 0, 0, NULL),
(10, 4, 30, 'Back-Office', 'On peut considérer comme un problème le lack de back-office non ? :P', 0, 3, NULL),
(11, 4, 30, 'Essai', 'J''essaye !', 0, 2, NULL),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `id_users`, `localisation`, `type_endroit`, `nom_maison`, `nombre_voyageurs`, `type_logement`, `nb_chambres`, `nb_salles_bains`, `superficie`, `description_logement`, `attributs_logement`, `date_début_disponibilite`, `date_fin_disponibilite`, `date_publication_logement`, `television`, `machine_a_laver`, `parking`, `climatisation`, `piscine`, `jardin`, `numero_logement`) VALUES
(1, 2, 'Paris, Ile-de-France', '', 'Au coeur de Paris', 4, 'Appartement', 3, 2, 0, 'Adorable pied a-terre, a quinze minutes a pied de Montmartre, de l''Opera , des grands magasins et du Louvre, et surtout, a l''angle de la rue des Martyrs, l''une des rues les plus animees de Paris, avec tous ses commerces, ses artisans, et ses restaura', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 11, 'Deauville, Basse Normandie', '', 'Chambre avec vue', 3, 'Maison', 2, 1, 15, 'Ideale pour passe de bonnes vacances a la mer. <br> </br>\r\n\r\nC''est une maison en rez-de-chausse en plein centre ville. <br> </br>\r\n\r\nMaison idealement situee a 10mn de la plage, du casino et de la gare.\r\n\r\n', '', '0000-00-00', '0000-00-00', '0000-00-00', 1, NULL, 1, NULL, NULL, NULL, NULL),
(3, 9, 'Nice, Provence-Alpes-Cotes-d''Azure', 'ville', 'Nice en toute tranquilite', 5, 'maison', 3, 2, 150, 'Nouvel appartement dans la vieille ville de Nice a 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personnes, dispose d''une chambre en mezzanine ainsi que d''un canape lit au salon. L''appartement vient d''etre completement refait, il dispose de la clim ainsi qu''internet.', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 10, 'Strasbourg, Alsace', '', '2 pieces pres du centre ville', 2, 'Appartement', 1, 1, 0, 'Charmant appartement au coeur de Strasbourg, a deux pas de la cathedrale, des marches de noel, des musees, des boutiques et des meilleurs winstubs traditionnels. Ce 2 pieces est idealement situe dans la zone pietonne du Carre d''Or.', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 11, 'Lyon, Rhones-Alpes', '', 'Ancien atelier de soierie', 4, 'Loft', 0, 0, 0, 'Ancien atelier de soierie que j''ai rehabilite pour y vivre il y a deux ans dans un esprit \r\n"Loft" chaleureux,calme et epure. Entierement equipe et dote de nombreux espaces de rangement,il constitue certainement un pied a terre ideal pour decouvrir Lyon,de par son emplacement et son confort.', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'Marseille, Provence-Alpes-Cote-d''Azure', '', 'Le vieux Port', 6, 'Pavillon', 4, 2, 3000, 'Franchement je mets une description, parce que sinon ça fait sacrément claudo, qu''on se le dise', '', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 0, 0, 1, 1, NULL),
(8, 11, 'Angers', '', '', NULL, 'Pavillon', 1, 1, 0, 'Un logement moisi', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 0, 'Paris', '', 'Maison lune', NULL, 'Maison', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 19, 'Paris', '', 'Maison lune', NULL, 'Appartement', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 24, 'Paris', '', 'Parker''s House', NULL, 'Pavillon', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 25, 'dzedezd', '', 'fdzfe', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 28, 'Paris', '', 'Pas la viande, l''humoriste !', NULL, 'Pavillon', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 11, 'Paris', '', '', NULL, 'Maison', 2, 2, 0, 'Maison blanche', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(26, 11, 'Corse', '', '', NULL, 'Maison', 2, 2, 0, 'dada', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 6),
(27, 11, 'Corse', '', 'Le paradis des mafioso', NULL, 'Pavillon', 2, 2, 15, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, 1, NULL, 1, 1, NULL, 7),
(28, 23, 'Los Angeles', '', 'Maison d''Iron Man', NULL, 'Pavillon', 15, 10, 0, 'Allé !', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 3),
(39, 11, 'Washington', '', 'White House', NULL, 'Maison', 50, 30, 0, 'Maison blanche', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 8),
(40, 31, 'Paris', '', 'Matignon', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, 32, 'Paris', '', 'maison', NULL, 'Camping car', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(42, 1, 'Tokyo', '', 'Asian villa', NULL, 'Maison', 20, 10, 0, 'Une superbe villa asiatique', '', '0000-00-00', '0000-00-00', '0000-00-00', 1, 1, 1, 1, 1, 1, 1);

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
  `id_destinataire` int(11) DEFAULT NULL,
  `date_update` datetime DEFAULT '0000-00-00 00:00:00',
  `titre_message` text CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `lu_nonlu` int(11) DEFAULT NULL,
  `echange` int(11) DEFAULT NULL,
  `choix` int(11) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id_message`, `id_expediteur`, `id_destinataire`, `date_update`, `titre_message`, `message`, `lu_nonlu`, `echange`, `choix`, `id_logement`) VALUES
(1, 0, 0, '0000-00-00 00:00:00', 'Flan', 'J''aime le flan', NULL, NULL, 0, NULL),
(2, 7, 0, '0000-00-00 00:00:00', 'Slip', 'Je porte des slips', NULL, NULL, 0, NULL),
(3, 7, 0, '0000-00-00 00:00:00', 'Tamer', 'Elle est...bien', NULL, NULL, 0, NULL),
(4, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL, 0, NULL),
(5, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL, 0, NULL),
(6, 7, 1, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL, 0, NULL),
(7, 7, 3, '0000-00-00 00:00:00', 'Roule', 'Ma poule', NULL, NULL, 0, NULL),
(8, 1, 1, '0000-00-00 00:00:00', 'Moi meme', 'Je m''écris à moi même, il faut changer ça', NULL, NULL, 0, NULL),
(9, 1, 3, '0000-00-00 00:00:00', 'Second message', 'Je m''écris à moi même, il faut changer ça', NULL, NULL, 0, NULL),
(10, 1, 3, '2014-12-18 10:28:16', 'Proposition d''échange', 'essai jeudi matin', NULL, 1, 0, NULL),
(11, 1, 3, '2014-12-18 10:29:57', 'Proposition d''échange', 'essai jeudi matin', NULL, 1, 0, NULL),
(12, 15, 3, '2014-12-18 10:43:07', 'Proposition d''échange', 'Salut vieux, tu veux échanger ta barak ?', NULL, 1, 0, NULL),
(13, 3, 15, '2014-12-18 10:49:58', 'Service', 'Par contre je prends ta mère', NULL, NULL, 0, NULL),
(14, 3, 1, '2014-12-18 10:52:02', 'Wesh yoko', 't tro bon', NULL, NULL, 0, NULL),
(15, 3, 15, '2014-12-18 10:52:21', 'Azy', 'T''as la kam ?', NULL, NULL, 0, NULL),
(16, 3, 15, '2014-12-18 10:53:52', 'essai', 'lkk', NULL, NULL, 0, NULL),
(17, 15, 3, '2014-12-18 10:54:47', 'adazdazd', 'dazdazdazd', NULL, NULL, 0, NULL),
(18, 15, 11, '2014-12-18 11:23:13', 'Proposition d''échange', 'ezez', NULL, 1, 0, NULL),
(19, 23, 9, '2014-12-18 22:36:14', 'Proposition d''échange', 'Salut ma grande ! On échange ?', NULL, 1, 0, NULL),
(20, 23, 1, '2014-12-18 22:39:52', 'Proposition d''échange', 'Wesh Yoko ! On se connait t''as vu ? On échange ?', NULL, 1, 0, NULL),
(21, 23, 1, '2014-12-19 14:28:04', 'Proposition d''échange', 'Salut Yoko, on échange ?', NULL, 1, 0, NULL),
(22, 24, 23, '2014-12-19 14:32:39', 'Proposition d''échange', 'SAlut bonhomme !', NULL, 1, 0, NULL),
(23, 23, 24, '2014-12-19 14:37:01', 'Wesh', 'Je veux du cash !', NULL, NULL, 0, NULL),
(24, 24, 1, '2014-12-19 17:27:43', 'Proposition d''échange', 'Salut Yoko, tu veux échanger avec moi ?', NULL, 1, 0, NULL),
(25, 23, 1, '2015-01-09 16:28:03', 'Test', 'Teste !', NULL, NULL, 0, NULL),
(26, 23, 1, '2015-01-09 16:41:59', 'Proposition d''échange', 'Test d''echange pour choix', NULL, 1, NULL, NULL),
(27, 1, 23, '2015-01-09 16:58:43', 'Test', 'Oui Non', NULL, NULL, NULL, NULL),
(28, 23, 1, '2015-01-09 16:59:25', 'Proposition d''échange', 'Echange !', NULL, 1, NULL, NULL),
(29, 1, 1, '2015-01-09 17:15:59', 'Essai', 'Refresh après envoi message ?', NULL, NULL, NULL, NULL),
(30, 1, 1, '2015-01-09 17:17:11', 'What the', 'Shit ?', NULL, NULL, NULL, NULL),
(31, 1, 1, '2015-01-09 17:18:06', 'court', 'circuit', NULL, NULL, NULL, NULL),
(32, 1, 1, '2015-01-09 17:18:39', 'circuit', 'cours !', NULL, NULL, NULL, NULL),
(33, 1, 1, '2015-01-09 17:19:58', 'ref', 'resh', NULL, NULL, NULL, NULL),
(34, 1, 1, '2015-01-09 17:20:35', 're', 'fef', NULL, NULL, NULL, NULL),
(35, 1, 1, '2015-01-09 17:20:45', 'hry', 'hr', NULL, NULL, NULL, NULL),
(36, 1, 1, '2015-01-09 17:22:59', 'greg', 'geg', NULL, NULL, NULL, NULL),
(37, 1, 1, '2015-01-09 17:24:49', 'greg', 'geg', NULL, NULL, NULL, NULL),
(38, 1, 1, '2015-01-09 17:25:24', 'essai', 'fructueux', NULL, NULL, NULL, NULL),
(39, 1, 1, '2015-01-09 17:32:54', 'try', 'out', NULL, NULL, NULL, NULL),
(40, 1, 1, '2015-01-09 17:37:05', 'eazea', 'eazeaz', NULL, NULL, NULL, NULL),
(41, 3, 1, '2015-01-10 04:38:10', 'Coucou mon ami', 'Hey !', NULL, NULL, NULL, NULL),
(42, 23, 1, '2015-01-10 04:56:59', 'fzfez', 'fezfezf', NULL, NULL, NULL, NULL),
(43, 1, 3, '2015-01-12 15:25:58', 'Azy', 'Manuuuu', NULL, NULL, NULL, NULL),
(44, 23, 32, '2015-01-14 17:42:49', 'Proposition d''échange', 'Coucou Maéva, tu veux échanger ton caillou avec moi ?', NULL, 1, NULL, NULL),
(45, 32, 11, '2015-01-14 17:42:58', 'Proposition d''échange', 'hola', NULL, 1, 1, NULL),
(46, 32, 23, '2015-01-14 17:43:37', '', 'Je sais pas je tiens beaucoup à mon caillou!!', NULL, NULL, NULL, NULL),
(47, 32, 23, '2015-01-14 17:44:06', 'caillou', 'Je sais pas je tiens beaucoup à mon caillou!!', NULL, NULL, NULL, NULL),
(48, 23, 32, '2015-01-14 17:44:46', 'allez ', 'J''ai pas un poil sur le caillou !', NULL, NULL, NULL, NULL),
(49, 23, 32, '2015-01-14 17:45:42', '', 'Eh oh !', NULL, NULL, NULL, NULL),
(50, 1, 23, '2015-01-14 23:53:07', 'Proposition d''échange', 'Accepterais-tu d''échanger ta maison avec moi ?', NULL, 1, NULL, NULL),
(51, 1, 11, '2015-01-15 00:23:41', 'Proposition d''échange', 'On échange ?', NULL, 1, NULL, NULL),
(52, 1, 3, '2015-01-15 10:46:43', '', 'J''essaie un truc !', NULL, NULL, NULL, NULL),
(53, 1, NULL, '2015-01-15 12:08:40', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat egestas leo et euismod. Sed quis leo tellus. In hac habitasse platea dictumst. Nam non arcu at leo sollicitudin sollicitudin. Pellentesque bibendum turpis sit amet sem viverra, vel vestibulum massa vestibulum. Vivamus feugiat hendrerit nunc vel porta. Etiam congue dolor eu dolor suscipit, eu sollicitudin dui fringilla. Aliquam erat volutpat. Vestibulum convallis posuere ornare. Donec vestibulum, lacus quis luctus accumsan, sapien arcu pretium enim, a volutpat mi risus in d', NULL, NULL, NULL, 39),
(54, 1, NULL, '2015-01-15 12:09:10', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat egestas leo et euismod. Sed quis leo tellus. In hac habitasse platea dictumst. Nam non arcu at leo sollicitudin sollicitudin. Pellentesque bibendum turpis sit amet sem viverra, vel vestibulum massa vestibulum. Vivamus feugiat hendrerit nunc vel porta. Etiam congue dolor eu dolor suscipit, eu sollicitudin dui fringilla. Aliquam erat volutpat. Vestibulum convallis posuere ornare. Donec vestibulum, lacus quis luctus accumsan, sapien arcu pretium enim, a volutpat mi risus in d', NULL, NULL, NULL, 39),
(55, 3, 11, '2015-01-16 21:26:43', 'Proposition d''échange', 'On échange mon petit John ?', NULL, 1, NULL, NULL),
(56, 1, 3, '2015-01-17 00:29:59', 'Proposition d''échange', 'Ca te dit qu''on échange à nouveau ?', NULL, 1, 1, NULL),
(57, 1, 3, '2015-01-17 00:34:22', 'Proposition d''échange', 'Ca te dit qu''on échange à nouveau ?', NULL, 1, NULL, NULL),
(58, 3, 11, '2015-01-17 00:43:34', 'Proposition d''échange', 'Washington contre un vieux port, sounds fair ?', NULL, 1, NULL, NULL),
(59, 1, 11, '2015-01-17 00:55:42', 'Proposition d''échange', 'On échange John ?', NULL, 1, NULL, NULL),
(60, 11, 31, '2015-01-17 01:08:41', 'Proposition d''échange', 'J''aimerais avoir Matignon !', NULL, 1, NULL, NULL),
(61, 11, 1, '2015-01-17 01:36:39', 'Proposition d''échange', 'On échange encore ?', NULL, 1, NULL, NULL),
(62, 1, 11, '2015-01-17 01:38:16', 'Proposition d''échange', 'On échange ?', NULL, 1, 1, NULL),
(63, 11, 31, '2015-01-17 02:25:21', 'Proposition d''échange', 'Matignon contre la maison blanche !', NULL, 1, NULL, NULL),
(64, 23, 31, '2015-01-17 13:08:31', 'Proposition d''échange', 'C''est mon voeu le plus cher !', NULL, 1, 0, NULL),
(66, 23, 31, '2015-01-17 13:09:22', '', 'Je suis prêt pour échanger mon logement avec le votre. Quand vous serez prêt, renseignez le afin que l''échange puisse commencer !', NULL, NULL, NULL, NULL),
(67, 31, 11, '2015-01-17 13:20:37', '', 'Je suis prêt pour échanger mon logement avec le votre. Quand vous serez prêt, renseignez le afin que l''échange puisse commencer !', NULL, NULL, NULL, NULL),
(68, 11, 31, '2015-01-17 13:53:02', 'Proposition d''échange', 'Still okay ?', NULL, 1, NULL, NULL),
(69, 11, 31, '2015-01-17 16:49:23', 'Proposition d''échange', 'Encore matignon !', NULL, 1, NULL, NULL),
(70, 31, 11, '2015-01-17 16:57:02', 'Proposition d''échange', 'On échange ?', NULL, 1, NULL, NULL),
(71, 11, 31, '2015-01-17 16:57:51', '', 'Je suis désolé, je ne souhaite pas échanger mon logement avec vous', NULL, NULL, NULL, NULL),
(72, 31, 1, '2015-01-17 17:04:10', 'Proposition d''échange', 'Matignon contre ta bouse !', NULL, 1, NULL, NULL),
(73, 31, 11, '2015-01-17 17:05:05', '', 'Je peux encore te faire chier haha !', 1, NULL, NULL, NULL),
(74, 31, 11, '2015-01-17 17:05:28', '', 'Hey...en fait ptet pas ! :D', 1, NULL, NULL, NULL),
(75, 31, 11, '2015-01-17 17:06:15', '', 'Bon je suis tout seul...j''abandonne !', 1, NULL, NULL, NULL),
(76, 31, 11, '2015-01-17 17:06:17', '', '', 1, NULL, NULL, NULL),
(77, 31, 11, '2015-01-17 17:07:28', '', 'On peut même plus envoyer de message vide ! Rah !', 1, NULL, NULL, NULL),
(78, 1, 31, '2015-01-17 17:08:43', '', 'Je suis désolé, je ne souhaite plus échanger mon logement avec vous', NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

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
(8, 20, 'http://www.directvillasproperties.com/wp-content/gallery/white-house-vdl/vale%20do%20lobo%20luxury%20villa%20for%20rent%20%20(7).JPG', ''),
(9, 21, 'http://www.lareserve-ramatuelle.com/files/9212/8704/6210/villa16_4.jpg', ''),
(10, 22, 'http://www.trendsnow.net/cms/uploads/2012/07/villa-in-andalucia-by-mclean-quinlan-architects-04.jpg', ''),
(11, 23, 'http://www.fr.villasimagen.com/images/villa_vista_ibiza/villa_vistaibizai_javea.jpg', ''),
(12, 24, 'http://www.domainedumirage.com/timthumb.php?src=uploads/files/image-site1modules0camera0models0camera-3.jpg&w=1200&h=700?1417824000026', ''),
(13, 25, 'http://www.casabrasil.biz/images/accueil/casabrasil-maisons-bois-exterieur-41.jpg', ''),
(14, 26, '../photos_logement/26.jpg', ''),
(16, 27, '../photos_logement/7.jpg', ''),
(17, 28, '../photos_logement/3.jpg', ''),
(18, 28, '../photos_logement/3-2.jpg', ''),
(29, 39, '../photos_logement/39-8.jpg', ''),
(66, 27, '../photos_logement/27-7-3.jpg', ''),
(67, 40, '../photos_logement/40.jpg', ''),
(68, 41, '../photos_logement/41.jpg', ''),
(69, 42, '../photos_logement/42-1.jpg', '');

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
-- Structure de la table `temp_logement`
--

CREATE TABLE IF NOT EXISTS `temp_logement` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Contenu de la table `temp_logement`
--

INSERT INTO `temp_logement` (`id_logement`, `id_users`, `localisation`, `type_endroit`, `nom_maison`, `nombre_voyageurs`, `type_logement`, `nb_chambres`, `nb_salles_bains`, `superficie`, `description_logement`, `attributs_logement`, `date_début_disponibilite`, `date_fin_disponibilite`, `date_publication_logement`, `television`, `machine_a_laver`, `parking`, `climatisation`, `piscine`, `jardin`, `numero_logement`) VALUES
(40, 31, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(41, 32, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(42, 33, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(43, 34, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(44, 35, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(45, 36, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(46, 37, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(47, 38, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(48, 39, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(49, 40, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(50, 41, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(51, 42, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(52, 43, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(53, 44, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(54, 45, 'Paris', '', 'Théatre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(55, 46, 'Paris', '', 'Théâtre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(56, 47, 'Paris', '', 'Théâtre main d''or', NULL, 'Studio', 0, 0, 0, '', '', '0000-00-00', '0000-00-00', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `temp_photo`
--

CREATE TABLE IF NOT EXISTS `temp_photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_logement` int(11) NOT NULL,
  `lien_photo` varchar(800) CHARACTER SET utf8 NOT NULL,
  `chemin_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Contenu de la table `temp_photo`
--

INSERT INTO `temp_photo` (`id_photo`, `id_logement`, `lien_photo`, `chemin_photo`) VALUES
(67, 40, '../photos_logement/40.jpg', ''),
(68, 41, '../photos_logement/41.jpg', ''),
(69, 42, '../photos_logement/42.jpg', ''),
(70, 43, '../photos_logement/43.jpg', ''),
(71, 44, '../photos_logement/44.jpg', ''),
(72, 45, '../photos_logement/45.jpg', ''),
(73, 46, '../photos_logement/46.jpg', ''),
(74, 47, '../photos_logement/47.jpg', ''),
(75, 48, '../photos_logement/48.jpg', ''),
(76, 49, '../photos_logement/49.jpg', ''),
(77, 50, '../photos_logement/50.jpg', ''),
(78, 51, '../photos_logement/51.jpg', ''),
(79, 52, '../photos_logement/52.jpg', ''),
(80, 53, '../photos_logement/53.jpg', ''),
(81, 54, '../photos_logement/54.jpg', ''),
(82, 55, '../photos_logement/55.jpg', ''),
(83, 56, '../photos_logement/56.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `temp_users`
--

CREATE TABLE IF NOT EXISTS `temp_users` (
  `confirm_code` varchar(75) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Contenu de la table `temp_users`
--

INSERT INTO `temp_users` (`confirm_code`, `id_users`, `username`, `nom_user`, `prenom_user`, `description_users`, `preference_echange`, `password`, `email`, `rights`, `signup_date`, `avatar`, `sexe`, `tel`, `situation`, `profession`, `description`) VALUES
('69ec3b5c567a83d438e6d22410b8f6eb', 31, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/31.jpg', NULL, NULL, NULL, NULL, NULL),
('79735899dda23c9c6ed3e18153050fa3', 32, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/32.jpg', NULL, NULL, NULL, NULL, NULL),
('98786aef79c7bde00eab98e73cb439d5', 33, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/33.jpg', NULL, NULL, NULL, NULL, NULL),
('ba611b5b0f7f07664f40a06897c1e93c', 34, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/34.jpg', NULL, NULL, NULL, NULL, NULL),
('4a0753685b16968b89cba5a38247f309', 35, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/35.jpg', NULL, NULL, NULL, NULL, NULL),
('596d375aa97974e118dcdba746c549e7', 36, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/36.jpg', NULL, NULL, NULL, NULL, NULL),
('e8e92b9276f834deb83ad8fee0253ee9', 37, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/37.jpg', NULL, NULL, NULL, NULL, NULL),
('fc920d336fd60749df62a1f568acd895', 38, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/38.jpg', NULL, NULL, NULL, NULL, NULL),
('263cd405b1eed57824d3f8956a6db68b', 39, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/39.jpg', NULL, NULL, NULL, NULL, NULL),
('2946ef42683a1268213c383a358286c4', 40, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/40.jpg', NULL, NULL, NULL, NULL, NULL),
('5875c0e2c40f5a1587f801b946fc0c06', 41, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/41.jpg', NULL, NULL, NULL, NULL, NULL),
('15d8570100eb8af4f4e020cdb839cc0c', 42, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/42.jpg', NULL, NULL, NULL, NULL, NULL),
('cdc530644cf7b76f8cdafe5bb6e6835d', 43, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/43.jpg', NULL, NULL, NULL, NULL, NULL),
('99a4fcce34c08299c1bb0700c7804fa9', 44, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/44.jpg', NULL, NULL, NULL, NULL, NULL),
('6669aff4f1f22c1e2358126e6fc66f34', 45, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dieudo49370@yopmail.com', '', '0000-00-00', '../photos_utilisateurs/45.jpg', NULL, NULL, NULL, NULL, NULL),
('9c29f89f2c5eadabdb989e3b495b97a8', 46, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'marvinroche14@gmail.com', '', '0000-00-00', '../photos_utilisateurs/46.jpg', NULL, NULL, NULL, NULL, NULL),
('b0a7be2aadd765815eb19381aa2a28b5', 47, 'Dieudonné', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'marvinroche14@gmail.com', '', '0000-00-00', '../photos_utilisateurs/47.jpg', NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `nom_user`, `prenom_user`, `description_users`, `preference_echange`, `password`, `email`, `rights`, `signup_date`, `avatar`, `sexe`, `tel`, `situation`, `profession`, `description`) VALUES
(1, 'Yoko', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yoko@moncul.com', '0', '0000-00-00', '../photos_utilisateurs/1.jpg', 'Femme', '0965489484', 'Célibataire', 'Baiseuse de gosse', 'Une superbe jeune femme, en pleine force de l''âge !'),
(2, 'Alexis', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'alex@gmai.com', '', '0000-00-00', 'http://img.clubic.com/05486567-photo-scott-forstall.jpg', NULL, NULL, NULL, NULL, NULL),
(3, 'Manu', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'manu@gmail.com', '', '0000-00-00', '../photos_utilisateurs/3.jpg', NULL, '', NULL, NULL, 'Beau gosse pas drôle, mais j''ai joué dans Kaamelott Livre VI, ça fait de moi un demi dieu'),
(4, 'Geekelektro', '', '', '', '', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'beaudru.manuel@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(5, 'Tsuno', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(6, 'Toto', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'toto@mail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(7, 'tata', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', 'http://s1.lemde.fr/image/2013/10/18/200x200/3498024_4_a45e_dieudonne-m-bala-m-bala-lors-de-la-premiere-d_e6c9bd1687111d373d5a7869369d6632.jpg', NULL, NULL, NULL, NULL, NULL),
(8, 'Titi', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(9, 'Julie', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'julie@gmail.com', '', '0000-00-00', 'http://golem13.fr/wp-content/uploads/2013/06/profile.jpg', NULL, NULL, NULL, NULL, NULL),
(10, 'Georges', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Georges.Dupont@gmail.com', '', '0000-00-00', 'http://a141.idata.over-blog.com/300x300/3/97/66/52/george-clooney-nespresso.jpg', NULL, NULL, NULL, NULL, NULL),
(11, 'John', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'john.dumont@gmail.com', '', '0000-00-00', '../photos_utilisateurs/11.jpg', 'Homme', '0761116127', 'Couple', 'Mentalist', 'J''suis un beau gosse ténébreux, arrête'),
(12, 'aclementi', '', '', '', '', '083db9d38d267637fe9d28e09ef1710bc50cbe0d', 'clem07alex@aol.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(13, 'marvin', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'example@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(15, 'Thomas', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tfeneon@juniorisep.com', '', '0000-00-00', '../photos_utilisateurs/1.jpg', NULL, NULL, NULL, NULL, NULL),
(16, 'Test', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dzdz@dzdz.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(17, 'Test2', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test2@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(18, 'Test3', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test2@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(19, 'Test4', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test2@gmail.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(20, 'test5', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sasa@gmail.cp', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(23, 'Manuel', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'beaudru.manuel@gmail.com', '1', '0000-00-00', '../photos_utilisateurs/23.jpg', 'Homme', '0761116127', 'Marié', 'Chemistry Teacher', 'I am the one who knocks'),
(24, '', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jparker@isep.fr', '', '0000-00-00', 'http://image.noelshack.com/fichiers/2014/51/1418995868-1939495-10205357694924760-5825936887810904973-n.jpg', NULL, NULL, NULL, NULL, NULL),
(25, 'zfzefez', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'efezfz@fezfe.com', '', '0000-00-00', '', NULL, NULL, NULL, NULL, NULL),
(28, 'Bigard', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'jmbigard@gmail.com', '', '0000-00-00', '../photos_utilisateurs/28.jpg', 'Homme', '', 'Marié', NULL, 'Dans la vie il n''y a pas qu''le cul, il y a aussi la bite et les couilles !...Merde c''est pas de moi ça'),
(30, 'Brody', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'brody@gmail.com', '', '0000-00-00', '../photos_utilisateurs/30.jpg', 'Homme', '0761116127', 'Couple', 'Marine', 'My name is Nicholas Brody and I''m a Sergeant in the United States Marine Corps. I have a wife, and two kids, who I love. By the time you watch this, you''ll have read a lot of things about me, about what I''ve done, and so I wanted to explain myself, so that you''ll know the truth.'),
(31, 'Manuel Valls', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'mvalls@gmail.com', '', '0000-00-00', '../photos_utilisateurs/31.jpg', NULL, NULL, NULL, NULL, NULL),
(32, 'Rouault', '', '', '', '', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'maeva.rouault@hotmail.fr', '', '0000-00-00', '../photos_utilisateurs/32.jpg', NULL, NULL, NULL, NULL, NULL);

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
