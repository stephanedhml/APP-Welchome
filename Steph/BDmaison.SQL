-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 21 Novembre 2014 à 13:19
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Recherche`
--

-- --------------------------------------------------------

--
-- Structure de la table `recherche`
--

CREATE TABLE `recherche` (
`id` int(11) NOT NULL,
  `Localisation` text NOT NULL,
  `Nombre de voyageurs` int(11) NOT NULL,
  `Type de logement` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recherche`
--

INSERT INTO `recherche` (`id`, `Localisation`, `Nombre de voyageurs`, `Type de logement`, `Description`) VALUES
(1, 'Paris, Ile-de-France', 4, 'Appartement', 'Magnifique appartement au coeur de Paris. Comprend 2 salles de bain, 5 chambres, 1 cuisine et 1 balcon.'),
(2, 'Deauville, Basse Normandie', 3, 'Maison', 'Maison face à la mer.'),
(3, 'Nice, Provence-Alpes-Cotes-d''Azure', 2, 'Villa', 'Nouvel appartement dans la vieille ville de Nice à 2 minutes du cours Saleya et de la promenade des anglais. Il peut accueillir 4 personne, dispose d''une chambre en mezzanine ainsi que d''un canapé lit au salon. L''appartement vient d''être complètement refait, il dispose de la clim ainsi qu''internet.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `recherche`
--
ALTER TABLE `recherche`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `recherche`
--
ALTER TABLE `recherche`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;