@@ -0,0 +1,269 @@
-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 15 Décembre 2014 à 18:04
-- Version du serveur: 5.5.40-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `welchome`
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
-- Structure de la table `favoris`
--

CREATE TABLE IF NOT EXISTS `favoris` (
  `id_fav` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `id_logement` int(11) NOT NULL,
  PRIMARY KEY (`id_fav`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE IF NOT EXISTS `logement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_users` int(11) NOT NULL,
  `Localisation` text CHARACTER SET utf8 NOT NULL,
  `Type_endroit` varchar(50) NOT NULL,
  `Nom_maison` text NOT NULL,
  `Nombre_voyageurs` int(11) NOT NULL,
  `Type_logement` text CHARACTER SET utf8 NOT NULL,
  `Nb_chambres` int(11) NOT NULL,
  `Nb_salles_bain` int(11) NOT NULL,
  `superficie` int(11) NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL,
  `date_publication` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `id_users`, `Localisation`, `Type_endroit`, `Nom_maison`, `Nombre_voyageurs`, `Type_logement`, `Nb_chambres`, `Nb_salles_bain`, `superficie`, `Description`, `date_publication`) VALUES
(1, 2, 'Paris, Ile-de-France', '', 'Au coeur de Paris', 4, 'Appartement', 3, 2, 0, 'Adorable pied a-terre, a quinze minutes a pied de Montmartre, de l''Opera , des grands magasins et du Louvre, et surtout, a l''angle de la rue des Martyrs, l''une des rues les plus animees de Paris, avec tous ses commerces, ses artisans, et ses restaura', '0000-00-00'),
(2, 11, 'Deauville, Basse Normandie', '', 'Chambre avec vue', 3, 'Maison', 2, 1, 0, 'Ideale pour passe de bonnes vacances a la mer. <br> </br>\r\n\r\nC''est une maison en rez-de-chausse en plein centre ville. <br> </br>\r\n\r\nMaison traditionnelle de ville de Normandie, idealement situee a 10mn de la plage, du casino et de la gare.\r\n\r\n', '0000-00-00'),
(3, 9, 'Nice, Provence-Alpes-Cotes-d''Azure', '', 'Nice en toute tranquilite', 5, 'Villa', 3, 2, 0, 'Nouvel appartement dans la vieille ville de Nice a 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personnes, dispose d''une chambre en mezzanine ainsi que d''un canape lit au salon. L''appartement vient d''etre completement refait, il dispose de la clim ainsi qu''internet.', '0000-00-00'),
(4, 10, 'Strasbourg, Alsace', '', '2 pieces pres du centre ville', 2, 'Appartement', 1, 1, 0, 'Charmant appartement au coeur de Strasbourg, a deux pas de la cathedrale, des marches de noel, des musees, des boutiques et des meilleurs winstubs traditionnels. Ce 2 pieces est idealement situe dans la zone pietonne du Carre d''Or.', '0000-00-00'),
(5, 11, 'Lyon, Rhones-Alpes', '', 'Ancien atelier de soierie', 4, 'Loft', 0, 0, 0, 'Ancien atelier de soierie que j''ai rehabilite pour y vivre il y a deux ans dans un esprit \r\n"Loft" chaleureux,calme et epure. Entierement equipe et dote de nombreux espaces de rangement,il constitue certainement un pied a terre ideal pour decouvrir Lyon,de par son emplacement et son confort.', '0000-00-00'),
(6, 10, 'Marseille, Provence-Alpes-Cote-d''Azure', '', 'Le vieux Port', 6, 'Maison', 4, 2, 0, 'Votre logement au coeur de Marseille a la plaine dans une maison au calme avec jardin et terrasse.\r\nVous serez au coeur de la vie Marseillaise resto, cafe, galerie d''art et cinema.. tout en etant au calme et profitez de l''acces facile au tram metro bus', '0000-00-00'),
(7, 0, 'Nantes, Pays de la Loire', '', '', 4, 'Appartement', 0, 0, 0, 'Appartement de 35 m² sur la butte Sainte Anne à Nantes dans une rue calme, à 5 minutes du centre ville. Transport en commun à proximité (Tram et bus). \r\nUne grande chambre et un salon/cuisine équipé. ', '0000-00-00'),
(8, 0, 'Toulouse, Midi-Pyrénées', '', '', 2, 'Appartement', 0, 0, 0, 'L''appartement se situe à 3min du metro Compans, à 10 min de la place du Capitole. \r\nIdéalement situé pour un point de départ à la découverte de la ville rose. Je serais ravi de vous indiquer les endroits à voir et à vous faire partager mon expérience', '0000-00-00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Structure de la table `Photo`
--

CREATE TABLE IF NOT EXISTS `Photo` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `Id` int(11) NOT NULL,
  `Liendelaphoto` varchar(800) NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `Photo`
--

INSERT INTO `Photo` (`idPhoto`, `Id`, `Liendelaphoto`) VALUES
(1, 1, 'http://luxurymust-hospitality.com/sites/default/files/hotel-edmond-0.jpg'),
(2, 2, 'http://location-villa-marrakech.fr/wp-content/uploads/2013/05/location_villa_riad_marrakech_0cdd6021cf47bf3c3c524ee7985353c5_medium.jpg'),
(3, 4, 'http://static.mytravelchic.com/images/hotels/243/18983.jpg'),
(4, 3, 'http://www.clapeau.com/site/wp-content/uploads/2013/11/home.jpg'),
(6, 5, 'http://www.casabrasil.biz/images/accueil/casabrasil-maisons-bois-exterieur-41.jpg'),
(7, 6, 'http://www.domainedumirage.com/timthumb.php?src=uploads/files/image-site1modules0camera0models0camera-3.jpg&w=1200&h=700?1417824000026');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `Description`, `Preference_echange`, `password`, `email`, `rights`, `signup_date`, `avatar`) VALUES
(1, 'Yoko', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yoko@moncul.com', '', 0, ''),
(2, 'Alexis', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'alex@gmai.com', '', 0, 'http://img.clubic.com/05486567-photo-scott-forstall.jpg'),
(3, 'Manu', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'manu@gmail.com', '', 0, ''),
(4, 'Geekelektro', '', '', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'beaudru.manuel@gmail.com', '', 0, ''),
(5, 'Tsuno', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(6, 'Toto', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'toto@mail.com', '', 0, ''),
(7, 'tata', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(8, 'Titi', '', '', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(9, 'Julie', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'julie@gmail.com', '', 0, 'http://gol...(line truncated)...
(10, 'Georges', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'Georges.Dupont@gmail.com', '', 0,...(line truncated)...
(11, 'John', 'Famille de trois enfants, de 14, 12 et 10 ans. <br></br>\r\nMon epouse et moi-meme sommes architectes liberaux. \r\nTres urbains, nous vivons dans le centre ville de Paris en France, et nos voyages se concentrent surtout sur les grandes villes.', 'Nous serions fortement interesses par un echange de maison dans le Sud de la France entre le 15 Juin et le 30 aout. <br></br> Nous sommes ouvert sinon a toute possibilite d''echange partout en France.     ', '0', 'john.dumont@gmail.com', '', 0, 'http...(line truncated)...

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
  ADD CONSTRAINT `fk_logement_has_contrainte_logement1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logement_has_contrainte_contrainte1` FOREIGN KEY (`contrainte_id_contrainte`) REFERENCES `contrainte` (`id_contrainte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `logement_has_services`
--
ALTER TABLE `logement_has_services`
  ADD CONSTRAINT `fk_logement_has_services_logement1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logement_has_services_services1` FOREIGN KEY (`services_id_service`) REFERENCES `services` (`id_service`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
