-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 18 Décembre 2014 à 10:56
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `welchome1`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `echange`
--

INSERT INTO `echange` (`id_echange`, `id_demandeur`, `id_proprietaire`, `id_logement`, `date_update`, `user1`, `user2`) VALUES
(1, 1, 3, 6, '2014-12-18 10:26:58', 1, 1),
(2, 1, 3, 6, '2014-12-18 10:28:16', 1, 1),
(3, 1, 3, 6, '2014-12-18 10:29:57', 1, 1),
(4, 15, 3, 6, '2014-12-18 10:43:07', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
(10, 15, '', 0, 3, 1);

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
  PRIMARY KEY (`id_logement`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `id_users`, `localisation`, `type_endroit`, `nom_maison`, `nombre_voyageurs`, `type_logement`, `nb_chambres`, `nb_salles_bains`, `superficie`, `description_logement`, `attributs_logement`, `date_début_disponibilite`, `date_fin_disponibilite`, `date_publication_logement`) VALUES
(1, 2, 'Paris, Ile-de-France', '', 'Au coeur de Paris', 4, 'Appartement', 3, 2, 0, 'Adorable pied a-terre, a quinze minutes a pied de Montmartre, de l''Opera , des grands magasins et du Louvre, et surtout, a l''angle de la rue des Martyrs, l''une des rues les plus animees de Paris, avec tous ses commerces, ses artisans, et ses restaura', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(2, 11, 'Deauville, Basse Normandie', '', 'Chambre avec vue', 3, 'Maison', 2, 1, 0, 'Ideale pour passe de bonnes vacances a la mer. <br> </br>\r\n\r\nC''est une maison en rez-de-chausse en plein centre ville. <br> </br>\r\n\r\nMaison idealement situee a 10mn de la plage, du casino et de la gare.\r\n\r\n', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(3, 9, 'Nice, Provence-Alpes-Cotes-d''Azure', 'ville', 'Nice en toute tranquilite', 5, 'maison', 3, 2, 150, 'Nouvel appartement dans la vieille ville de Nice a 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personnes, dispose d''une chambre en mezzanine ainsi que d''un canape lit au salon. L''appartement vient d''etre completement refait, il dispose de la clim ainsi qu''internet.', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(4, 10, 'Strasbourg, Alsace', '', '2 pieces pres du centre ville', 2, 'Appartement', 1, 1, 0, 'Charmant appartement au coeur de Strasbourg, a deux pas de la cathedrale, des marches de noel, des musees, des boutiques et des meilleurs winstubs traditionnels. Ce 2 pieces est idealement situe dans la zone pietonne du Carre d''Or.', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(5, 11, 'Lyon, Rhones-Alpes', '', 'Ancien atelier de soierie', 4, 'Loft', 0, 0, 0, 'Ancien atelier de soierie que j''ai rehabilite pour y vivre il y a deux ans dans un esprit \r\n"Loft" chaleureux,calme et epure. Entierement equipe et dote de nombreux espaces de rangement,il constitue certainement un pied a terre ideal pour decouvrir Lyon,de par son emplacement et son confort.', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(6, 3, 'Marseille, Provence-Alpes-Cote-d''Azure', '', 'Le vieux Port', 6, 'Maison', 4, 2, 0, 'Votre logement au coeur de Marseille a la plaine dans une maison au calme avec jardin et terrasse.\r\nVous serez au coeur de la vie Marseillaise resto, cafe, galerie d''art et cinema.. tout en etant au calme et profitez de l''acces facile au tram metro bus', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(7, 9, 'Paris, Ile-de-France', '', 'Chez Zadig et Voltaire', 4, 'Appartement', 0, 0, 0, 'Appartement de 35 m2 sur la butte Sainte Anne &#224; Nantes dans une rue calme, &#224; 5 minutes du centre ville. Transport en commun &#224; proximit&#233; (Tram et bus). \r\nUne grande chambre et un salon/cuisine &#233;quip&#233;. ', '', '0000-00-00', '0000-00-00', '0000-00-00'),
(8, 11, 'Paris, Ile-de-France', '', 'La Maison lumi&#232;re', 2, 'Appartement', 0, 0, 0, 'L''appartement se situe &#224; 3min du metro Compans, &#224; 10 min de la place du Capitole. \r\nId&#233;alement situ&#233; pour un point de d&#233;part &#224; la d&#233;couverte de la ville rose. Je serais ravi de vous indiquer les endroits &#224; voir et &#224; vous faire partager mon exp&#233;rience', '', '0000-00-00', '0000-00-00', '0000-00-00');

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
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `messages`
--

INSERT INTO `messages` (`id_message`, `id_expediteur`, `id_destinataire`, `date_update`, `titre_message`, `message`, `lu_nonlu`, `echange`) VALUES
(1, 0, 0, '0000-00-00 00:00:00', 'Flan', 'J''aime le flan', NULL, NULL),
(2, 7, 0, '0000-00-00 00:00:00', 'Slip', 'Je porte des slips', NULL, NULL),
(3, 7, 0, '0000-00-00 00:00:00', 'Tamer', 'Elle est...bien', NULL, NULL),
(4, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL),
(5, 7, 0, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL),
(6, 7, 1, '0000-00-00 00:00:00', 'Banane', 'J''aime les bananes', NULL, NULL),
(7, 7, 3, '0000-00-00 00:00:00', 'Roule', 'Ma poule', NULL, NULL),
(8, 1, 1, '0000-00-00 00:00:00', 'Moi meme', 'Je m''écris à moi même, il faut changer ça', NULL, NULL),
(9, 1, 3, '0000-00-00 00:00:00', 'Second message', 'Je m''écris à moi même, il faut changer ça', NULL, NULL),
(10, 1, 3, '2014-12-18 10:28:16', 'Proposition d''échange', 'essai jeudi matin', NULL, 1),
(11, 1, 3, '2014-12-18 10:29:57', 'Proposition d''échange', 'essai jeudi matin', NULL, 1),
(12, 15, 3, '2014-12-18 10:43:07', 'Proposition d''échange', 'Salut vieux, tu veux échanger ta barak ?', NULL, 1),
(13, 3, 15, '2014-12-18 10:49:58', 'Service', 'Par contre je prends ta mère', NULL, NULL),
(14, 3, 1, '2014-12-18 10:52:02', 'Wesh yoko', 't tro bon', NULL, NULL),
(15, 3, 15, '2014-12-18 10:52:21', 'Azy', 'T''as la kam ?', NULL, NULL),
(16, 3, 15, '2014-12-18 10:53:52', 'essai', 'lkk', NULL, NULL),
(17, 15, 3, '2014-12-18 10:54:47', 'adazdazd', 'dazdazdazd', NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `id_logement`, `lien_photo`, `chemin_photo`) VALUES
(1, 1, 'http://luxurymust-hospitality.com/sites/default/files/hotel-edmond-0.jpg', ''),
(2, 2, 'http://location-villa-marrakech.fr/wp-content/uploads/2013/05/location_villa_riad_marrakech_0cdd6021cf47bf3c3c524ee7985353c5_medium.jpg', ''),
(3, 4, 'http://static.mytravelchic.com/images/hotels/243/18983.jpg', ''),
(4, 3, 'http://www.clapeau.com/site/wp-content/uploads/2013/11/home.jpg', ''),
(6, 5, 'http://www.casabrasil.biz/images/accueil/casabrasil-maisons-bois-exterieur-41.jpg', ''),
(7, 6, 'http://www.domainedumirage.com/timthumb.php?src=uploads/files/image-site1modules0camera0models0camera-3.jpg&w=1200&h=700?1417824000026', ''),
(8, 7, 'http://www.directvillasproperties.com/wp-content/gallery/white-house-vdl/vale%20do%20lobo%20luxury%20villa%20for%20rent%20%20(7).JPG', ''),
(9, 8, 'http://www.lareserve-ramatuelle.com/files/9212/8704/6210/villa16_4.jpg', '');

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
  `avatar` varchar(300) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `nom_user`, `prenom_user`, `description_users`, `preference_echange`, `password`, `email`, `rights`, `signup_date`, `avatar`) VALUES
(1, 'Yoko', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yoko@moncul.com', '', '0000-00-00', ''),
(2, 'Alexis', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'alex@gmai.com', '', '0000-00-00', 'http://img.clubic.com/05486567-photo-scott-forstall.jpg'),
(3, 'Manu', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'manu@gmail.com', '', '0000-00-00', 'https://pbs.twimg.com/profile_images/421396899036295168/jRjL34RS.jpeg'),
(4, 'Geekelektro', '', '', '', '', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'beaudru.manuel@gmail.com', '', '0000-00-00', ''),
(5, 'Tsuno', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', ''),
(6, 'Toto', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'toto@mail.com', '', '0000-00-00', ''),
(7, 'tata', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', ''),
(8, 'Titi', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', '0000-00-00', ''),
(9, 'Julie', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'julie@gmail.com', '', '0000-00-00', 'http://golem13.fr/wp-content/uploads/2013/06/profile.jpg'),
(10, 'Georges', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'Georges.Dupont@gmail.com', '', '0000-00-00', 'http://a141.idata.over-blog.com/300x300/3/97/66/52/george-clooney-nespresso.jpg'),
(11, 'John', '', '', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'john.dumont@gmail.com', '', '0000-00-00', 'http://s.plurielles.fr/mmdia/i/98/4/festival-de-monte-carlo-les-stars-de-la-tele-sont-au-rendez-vous-4695984xwoja.jpg?v=4'),
(12, 'aclementi', '', '', '', '', '083db9d38d267637fe9d28e09ef1710bc50cbe0d', 'clem07alex@aol.com', '', '0000-00-00', ''),
(13, 'marvin', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'example@gmail.com', '', '0000-00-00', ''),
(14, 'essai', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'example@gmail.com', '', '0000-00-00', ''),
(15, 'Thomas', '', '', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'tfeneon@juniorisep.com', '', '0000-00-00', '');

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
