-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 15 Décembre 2014 à 17:54
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
