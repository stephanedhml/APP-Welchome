-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 12 Décembre 2014 à 14:33
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Welchome`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
`id_commentaire` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contrainte`
--

CREATE TABLE `contrainte` (
`id_contrainte` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
`id_fav` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_logement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
`id` int(11) NOT NULL,
  `Localisation` text CHARACTER SET utf8 NOT NULL,
  `Nom de la maison` text NOT NULL,
  `Nombre de voyageurs` int(11) NOT NULL,
  `Type de logement` text CHARACTER SET utf8 NOT NULL,
  `Nb de chambres` int(11) NOT NULL,
  `Nb de salles de bains` int(11) NOT NULL,
  `Description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `Localisation`, `Nom de la maison`, `Nombre de voyageurs`, `Type de logement`, `Nb de chambres`, `Nb de salles de bains`, `Description`) VALUES
(1, 'Paris, Ile-de-France', 'Au coeur de Paris', 4, 'Appartement', 3, 2, 'Adorable pied a-terre, a quinze minutes a pied de Montmartre, de l''Opera , des grands magasins et du Louvre, et surtout, a l''angle de la rue des Martyrs, l''une des rues les plus animees de Paris, avec tous ses commerces, ses artisans, et ses restaura'),
(2, 'Deauville, Basse Normandie', 'Chambre avec vue', 3, 'Maison', 2, 1, 'Ideale pour passe de bonnes vacances a la mer. <br> </br>\r\n\r\nC''est une maison en rez-de-chausse en plein centre ville. <br> </br>\r\n\r\nMaison traditionnelle de ville de Normandie, idealement situee a 10mn de la plage, du casino et de la gare.\r\n\r\n'),
(3, 'Nice, Provence-Alpes-Cotes-d''Azure', 'Nice en toute tranquilite', 5, 'Villa', 3, 2, 'Nouvel appartement dans la vieille ville de Nice a 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personnes, dispose d''une chambre en mezzanine ainsi que d''un canape lit au salon. L''appartement vient d''etre completement refait, il dispose de la clim ainsi qu''internet.'),
(4, 'Strasbourg, Alsace', '2 pieces pres du centre ville', 2, 'Appartement', 1, 1, 'Charmant appartement au coeur de Strasbourg, a deux pas de la cathedrale, des marches de noel, des musees, des boutiques et des meilleurs winstubs traditionnels. Ce 2 pieces est idealement situe dans la zone pietonne du Carre d''Or.'),
(5, 'Lyon, Rhônes-Alpes', '', 4, 'Loft', 0, 0, 'Ancien atelier de soierie que j''ai réhabilité pour y vivre il y a deux ans dans un esprit \r\n"Loft" chaleureux,calme et épuré. Entierement équipé et doté de nombreux espaces de rangement,il constitue certainement un pied à terre idéal pour découvrir Lyon,de par son emplacement et son confort.'),
(6, 'Marseille, Provence-Alpes-Côte-d''Azure', '', 6, 'Maison', 0, 0, 'Votre logement au cœur de Marseille à la plaine dans une maison au calme avec jardin et terrasse.\r\nVous serez au cœur de la vie Marseillaise resto, café, galerie d''art et cinéma.. tout en étant au calme et profitez de l''accès facile au tram métro bus'),
(7, 'Nantes, Pays de la Loire', '', 4, 'Appartement', 0, 0, 'Appartement de 35 m² sur la butte Sainte Anne à Nantes dans une rue calme, à 5 minutes du centre ville. Transport en commun à proximité (Tram et bus). \r\nUne grande chambre et un salon/cuisine équipé. '),
(8, 'Toulouse, Midi-Pyrénées', '', 2, 'Appartement', 0, 0, 'L''appartement se situe à 3min du metro Compans, à 10 min de la place du Capitole. \r\nIdéalement situé pour un point de départ à la découverte de la ville rose. Je serais ravi de vous indiquer les endroits à voir et à vous faire partager mon expérience');

-- --------------------------------------------------------

--
-- Structure de la table `logement_has_contrainte`
--

CREATE TABLE `logement_has_contrainte` (
  `logement_id` int(11) NOT NULL,
  `contrainte_id_contrainte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `logement_has_services`
--

CREATE TABLE `logement_has_services` (
  `logement_id` int(11) NOT NULL,
  `services_id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
`id_media` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_logement_id` int(11) NOT NULL,
  `Liendelaphoto` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Photo`
--

CREATE TABLE `Photo` (
`idPhoto` int(11) NOT NULL,
  `Id` int(11) NOT NULL,
  `Liendelaphoto` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Photo`
--

INSERT INTO `Photo` (`idPhoto`, `Id`, `Liendelaphoto`) VALUES
(1, 1, 'http://ydil.fr/wp-content/uploads/2014/07/Magnan_House-13-1200x500.jpg'),
(2, 2, 'http://www.lamouissone.com/wp-content/uploads/2013/07/lm-gh-1010139.jpg'),
(3, 4, 'http://www.morneautremblay.ca/wp-content/uploads/2014/02/Construction-neuve-avec-garage-2-1200x500.jpg'),
(4, 3, 'http://www.clapeau.com/site/wp-content/uploads/2013/11/home.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
`id_service` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
`id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `signup_date` int(10) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `rights`, `signup_date`, `avatar`) VALUES
(1, 'Yoko', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'yoko@moncul.com', '', 0, ''),
(2, 'Alexis', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'alex@gmai.com', '', 0, ''),
(3, 'Manu', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'manu@gmail.com', '', 0, ''),
(4, 'Geekelektro', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'beaudru.manuel@gmail.com', '', 0, ''),
(5, 'Tsuno', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(6, 'Toto', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'toto@mail.com', '', 0, ''),
(7, 'tata', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, ''),
(8, 'Titi', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123456@mdp.com', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `users_has_logement`
--

CREATE TABLE `users_has_logement` (
  `users_id` int(11) NOT NULL,
  `users_logement_id` int(11) NOT NULL,
  `logement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_has_voeux`
--

CREATE TABLE `user_has_voeux` (
`id_voeu` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `users_logement_id` int(11) NOT NULL,
  `users_id1` int(11) NOT NULL,
  `users_logement_id1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
 ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `contrainte`
--
ALTER TABLE `contrainte`
 ADD PRIMARY KEY (`id_contrainte`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
 ADD PRIMARY KEY (`id_fav`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logement_has_contrainte`
--
ALTER TABLE `logement_has_contrainte`
 ADD PRIMARY KEY (`logement_id`,`contrainte_id_contrainte`), ADD KEY `fk_logement_has_contrainte_contrainte1_idx` (`contrainte_id_contrainte`), ADD KEY `fk_logement_has_contrainte_logement1_idx` (`logement_id`);

--
-- Index pour la table `logement_has_services`
--
ALTER TABLE `logement_has_services`
 ADD PRIMARY KEY (`logement_id`,`services_id_service`), ADD KEY `fk_logement_has_services_services1_idx` (`services_id_service`), ADD KEY `fk_logement_has_services_logement1_idx` (`logement_id`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
 ADD PRIMARY KEY (`id_media`), ADD KEY `fk_media_users1_idx` (`users_id`,`users_logement_id`);

--
-- Index pour la table `Photo`
--
ALTER TABLE `Photo`
 ADD PRIMARY KEY (`idPhoto`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id_service`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_has_logement`
--
ALTER TABLE `users_has_logement`
 ADD PRIMARY KEY (`users_id`,`users_logement_id`,`logement_id`), ADD KEY `fk_users_has_logement_logement1_idx` (`logement_id`), ADD KEY `fk_users_has_logement_users1_idx` (`users_id`,`users_logement_id`);

--
-- Index pour la table `user_has_voeux`
--
ALTER TABLE `user_has_voeux`
 ADD PRIMARY KEY (`id_voeu`), ADD KEY `fk_users_has_users_users2_idx` (`users_id1`,`users_logement_id1`), ADD KEY `fk_users_has_users_users1_idx` (`users_id`,`users_logement_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contrainte`
--
ALTER TABLE `contrainte`
MODIFY `id_contrainte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
MODIFY `id_media` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Photo`
--
ALTER TABLE `Photo`
MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `user_has_voeux`
--
ALTER TABLE `user_has_voeux`
MODIFY `id_voeu` int(11) NOT NULL AUTO_INCREMENT;
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

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
ADD CONSTRAINT `fk_media_users1` FOREIGN KEY (`users_id`, `users_logement_id`) REFERENCES `users` (`id`, `logement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_has_logement`
--
ALTER TABLE `users_has_logement`
ADD CONSTRAINT `fk_users_has_logement_users1` FOREIGN KEY (`users_id`, `users_logement_id`) REFERENCES `users` (`id`, `logement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_has_logement_logement1` FOREIGN KEY (`logement_id`) REFERENCES `logement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_voeux`
--
ALTER TABLE `user_has_voeux`
ADD CONSTRAINT `fk_users_has_users_users1` FOREIGN KEY (`users_id`, `users_logement_id`) REFERENCES `users` (`id`, `logement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_has_users_users2` FOREIGN KEY (`users_id1`, `users_logement_id1`) REFERENCES `users` (`id`, `logement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
    
