-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Mer 22 Novembre 2023 à 10:49
-- Version du serveur: 5.5.10
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_location_voiture`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `ncin` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `num_permis` int(11) NOT NULL,
  `civilite` varchar(50) NOT NULL,
  PRIMARY KEY (`ncin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`ncin`, `nom`, `prenom`, `adresse`, `date_naissance`, `num_permis`, `civilite`) VALUES
('023923493884', 'R', 'Remy', '19 rue du hammeconnage', '2023-11-16', 3920482, 'masculin'),
('0299122', 'B', 'Michel', '17 rue du commerce', '2023-11-17', 1039923, 'masculin');

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `num_location` int(11) NOT NULL AUTO_INCREMENT,
  `date_location` date NOT NULL,
  `duree` int(11) NOT NULL,
  `prix_location` float NOT NULL,
  `caution` int(11) NOT NULL,
  `#ncin` varchar(50) NOT NULL,
  `#immatriculation` varchar(50) NOT NULL,
  PRIMARY KEY (`num_location`),
  KEY `#ncin` (`#ncin`,`#immatriculation`),
  KEY `#immatriculation` (`#immatriculation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `locations`
--

INSERT INTO `locations` (`num_location`, `date_location`, `duree`, `prix_location`, `caution`, `#ncin`, `#immatriculation`) VALUES
(1, '2023-11-07', 64, 2700, 270, '0299122', '3020390323'),
(2, '2023-11-07', 30, 1300, 130, '023923493884', '0230939023GB');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

CREATE TABLE IF NOT EXISTS `voiture` (
  `immatriculation` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `nombre_porte` int(11) NOT NULL,
  `kilometrage` int(11) NOT NULL,
  `boite_vitesse` varchar(50) NOT NULL,
  `puissances` int(11) NOT NULL,
  PRIMARY KEY (`immatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voiture`
--

INSERT INTO `voiture` (`immatriculation`, `modele`, `prix`, `couleur`, `nombre_porte`, `kilometrage`, `boite_vitesse`, `puissances`) VALUES
('0230939023GB', 'CLIO', 15699, 'noir', 5, 32, 'Manuel', 1200),
('3020390323', 'McLaren', 32000, 'rouge', 2, 1230, 'Automatique', 200);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`#ncin`) REFERENCES `clients` (`ncin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`#immatriculation`) REFERENCES `voiture` (`immatriculation`) ON DELETE CASCADE ON UPDATE CASCADE;
