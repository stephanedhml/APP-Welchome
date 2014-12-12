-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 09 Décembre 2014 à 14:30
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `Welchome`
--

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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Photo`
--
ALTER TABLE `Photo`
 ADD PRIMARY KEY (`idPhoto`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Photo`
--
ALTER TABLE `Photo`
MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;