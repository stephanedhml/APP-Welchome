-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 09 Décembre 2014 à 15:56
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
  `Localisation` text NOT NULL,
  `Nombre de voyageurs` int(11) NOT NULL,
  `Type de logement` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `Localisation`, `Nombre de voyageurs`, `Type de logement`, `Description`) VALUES
(1, 'Paris, Ile-de-France', 4, 'Appartement', 'Magnifique appartement au coeur de Paris. Comprend 2 salles de bain, 5 chambres, 1 cuisine et 1 balcon.'),
(2, 'Deauville, Basse Normandie', 3, 'Maison', 'Maison face à la mer.'),
(3, 'Nice, Provence-Alpes-Cotes-d''Azure', 2, 'Villa', 'Nouvel appartement dans la vieille ville de Nice à 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personne, dispose d''une chambre en mezzanine ainsi que d''un canapé lit au salon. L''appartement vient d''être complètement refait, il dispose de la clim ainsi qu''internet.'),
(4, 'Strasbourg, Alsace', 2, 'Appartement', 'Charmant appartement au coeur de Strasbourg, à deux pas de la cathédrale, des marchés de noël, des musées, des boutiques et des meilleurs winstubs traditionnels. Ce 2 pièces est idéalement situé dans la zone piétonne du Carré d''Or.'),
(5, 'Lyon, Rhônes-Alpes', 4, 'Loft', 'Ancien atelier de soierie que j''ai réhabilité pour y vivre il y a deux ans dans un esprit \r\n"Loft" chaleureux,calme et épuré. Entierement équipé et doté de nombreux espaces de rangement,il constitue certainement un pied à terre idéal pour découvrir Lyon,de par son emplacement et son confort.'),
(6, 'Marseille, Provence-Alpes-Côte-d''Azure', 6, 'Maison', 'Votre logement au cœur de Marseille à la plaine dans une maison au calme avec jardin et terrasse.\r\nVous serez au cœur de la vie Marseillaise resto, café, galerie d''art et cinéma.. tout en étant au calme et profitez de l''accès facile au tram métro bus'),
(7, 'Nantes, Pays de la Loire', 4, 'Appartement', 'Appartement de 35 m² sur la butte Sainte Anne à Nantes dans une rue calme, à 5 minutes du centre ville. Transport en commun à proximité (Tram et bus). \r\nUne grande chambre et un salon/cuisine équipé. '),
(8, 'Toulouse, Midi-Pyrénées', 2, 'Appartement', 'L''appartement se situe à 3min du metro Compans, à 10 min de la place du Capitole. \r\nIdéalement situé pour un point de départ à la découverte de la ville rose. Je serais ravi de vous indiquer les endroits à voir et à vous faire partager mon expérience');

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
(1, 1, 'http://www.mcalpes.com/wp-content/uploads/2012/08/maison11.png'),
(2, 2, 'http://www.les-energies-renouvelables.eu/imgfr/image/Construction-maison-bbc/maison-bbc-accueil.jpg'),
(3, 4, 'http://www.villedecarignan.org/upload/villedecarignan/editor/image/Communications/Maison%20Enfant%20Soleil(1).jpg'),
(4, 3, 'http://site.techno.guitton.pagesperso-orange.fr/5/CI%20Construire%20une%20maison/Images/maison_bois_2.jpg');

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
