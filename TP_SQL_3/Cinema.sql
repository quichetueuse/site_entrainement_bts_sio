-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Mer 29 Novembre 2023 à 09:47
-- Version du serveur: 5.5.10
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `Cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `idRealisateur` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `anneeNaiss` int(11) NOT NULL,
  PRIMARY KEY (`idRealisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`idRealisateur`, `nom`, `prenom`, `anneeNaiss`) VALUES
('Michel G', 'Gar', 'Michel', 1967),
('Robert M', 'Mer', 'Robert', 1995);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE IF NOT EXISTS `film` (
  `idFilm` varchar(50) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `année` int(11) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `resume` varchar(50) NOT NULL,
  `#idRealistateur` varchar(50) NOT NULL,
  `#codePays` varchar(50) NOT NULL,
  PRIMARY KEY (`idFilm`),
  KEY `#idRealistateur` (`#idRealistateur`,`#codePays`),
  KEY `#codePays` (`#codePays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `film`
--

INSERT INTO `film` (`idFilm`, `titre`, `année`, `genre`, `resume`, `#idRealistateur`, `#codePays`) VALUES
('03', 'Le Requin', 2013, 'horreur', 'un film de requins', 'Robert M', 'France'),
('04', 'Amongus', 2019, 'psychologie', 'sussy imposter', 'Michel G', 'Allemagne');

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

CREATE TABLE IF NOT EXISTS `internaute` (
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `internaute`
--

INSERT INTO `internaute` (`email`, `nom`, `prenom`, `region`) VALUES
('albertg2@gmail.com', 'G', 'Albert', 'Marne'),
('albertg@gmail.com', 'Albert', '', ''),
('jeankevin2@gmail.com', 'Kevin', 'Jean', 'Paris'),
('jeankevin@gmail.com', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

CREATE TABLE IF NOT EXISTS `notation` (
  `idNotation` varchar(50) NOT NULL,
  `#email` varchar(50) NOT NULL,
  `#idFilm` varchar(50) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`idNotation`),
  KEY `#email` (`#email`,`#idFilm`),
  KEY `#idFilm` (`#idFilm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notation`
--

INSERT INTO `notation` (`idNotation`, `#email`, `#idFilm`, `note`) VALUES
('888', 'jeankevin2@gmail.com', '03', 10),
('999', 'jeankevin2@gmail.com', '04', 2);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `codePays` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `langue` varchar(50) NOT NULL,
  PRIMARY KEY (`codePays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`codePays`, `nom`, `langue`) VALUES
('Allemagne', 'Allemagne', 'Allemand'),
('France', 'France', 'Français');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `idRole` varchar(50) NOT NULL,
  `#idFilm` varchar(50) NOT NULL,
  `#idRealisateur` varchar(50) NOT NULL,
  `nomRole` varchar(50) NOT NULL,
  PRIMARY KEY (`idRole`),
  KEY `#idFilm` (`#idFilm`,`#idRealisateur`),
  KEY `#idRealisateur` (`#idRealisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`idRole`, `#idFilm`, `#idRealisateur`, `nomRole`) VALUES
('Méchanicien', '04', 'Robert M', 'Méchanicien'),
('Scénariste', '03', 'Robert M', 'Scénariste');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`#codePays`) REFERENCES `pays` (`codePays`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`#idRealistateur`) REFERENCES `artiste` (`idRealisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notation`
--
ALTER TABLE `notation`
  ADD CONSTRAINT `notation_ibfk_1` FOREIGN KEY (`#idFilm`) REFERENCES `film` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notation_ibfk_2` FOREIGN KEY (`#email`) REFERENCES `internaute` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_2` FOREIGN KEY (`#idRealisateur`) REFERENCES `artiste` (`idRealisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`#idFilm`) REFERENCES `film` (`idFilm`) ON DELETE CASCADE ON UPDATE CASCADE;
