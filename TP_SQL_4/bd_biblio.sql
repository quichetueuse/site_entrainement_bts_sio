-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Mer 06 Décembre 2023 à 10:40
-- Version du serveur: 5.5.10
-- Version de PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd_biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherents`
--

CREATE TABLE IF NOT EXISTS `adherents` (
  `ID_Adherent` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Date_adhesion` date NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Num_tel` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Adherent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `adherents`
--

INSERT INTO `adherents` (`ID_Adherent`, `Nom`, `Prenom`, `Date_naissance`, `Date_adhesion`, `Adresse`, `Num_tel`, `mail`) VALUES
(1, 'B', 'Kevin', '2023-12-14', '2023-12-18', '19 truc', '203920932832', 'kevin@gmail'),
(2, 'M', 'Roger', '2023-12-29', '2023-12-23', '17 machin', '2323902302', 'Roger@gmail'),
(3, 'kevin', 'Robert', '2023-12-02', '2023-12-11', '21 goeroea', '30493280', 'robert@gmail');

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--

CREATE TABLE IF NOT EXISTS `auteurs` (
  `ID_Auteur` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Date_naissance` date NOT NULL,
  PRIMARY KEY (`ID_Auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `auteurs`
--

INSERT INTO `auteurs` (`ID_Auteur`, `Nom`, `Prenom`, `Date_naissance`) VALUES
('32031228tfd', 'A', 'Ali', '2023-12-11'),
('tpe2', 'T', 'tituan', '2023-12-27'),
('tré20', 'C', 'Theo', '2023-12-04');

-- --------------------------------------------------------

--
-- Structure de la table `emprunts`
--

CREATE TABLE IF NOT EXISTS `emprunts` (
  `ID_Emprunt` int(11) NOT NULL AUTO_INCREMENT,
  `Date_emprunt` date NOT NULL,
  `Duree` int(11) NOT NULL,
  `#ID_Adherent` int(11) NOT NULL,
  `#Reference_livre` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_Emprunt`),
  KEY `#ID_Adherent` (`#ID_Adherent`,`#Reference_livre`),
  KEY `#Reference_livre` (`#Reference_livre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `emprunts`
--

INSERT INTO `emprunts` (`ID_Emprunt`, `Date_emprunt`, `Duree`, `#ID_Adherent`, `#Reference_livre`) VALUES
(1, '2023-12-09', 121029, 3, 'opreoa'),
(2, '2023-12-15', 120912, 2, 'le monstre'),
(3, '2023-12-22', 3291, 1, '032"_113');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE IF NOT EXISTS `livres` (
  `Reference_livre` varchar(50) NOT NULL,
  `Nbre_pages` int(11) NOT NULL,
  `ID_Auteur` varchar(50) NOT NULL,
  `Date_publication` date NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Disponibilité` tinyint(1) NOT NULL,
  `Nbre_emprunts` int(11) NOT NULL,
  `Etat` varchar(50) NOT NULL,
  `Nbre\exemplaire` int(11) NOT NULL,
  PRIMARY KEY (`Reference_livre`),
  KEY `#ID_Auteur` (`ID_Auteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`Reference_livre`, `Nbre_pages`, `ID_Auteur`, `Date_publication`, `Genre`, `Disponibilité`, `Nbre_emprunts`, `Etat`, `Nbre\exemplaire`) VALUES
('032"_113', 332, 'tré20', '2023-12-22', 'ROman', 0, 40, 'propre', 52),
('le monstre', 90, '32031228tfd', '2023-12-28', 'Horreur', 0, 12, 'correct', 90),
('opreoa', 129, 'tpe2', '2023-12-15', 'nouvelle', 0, 45, 'sale', 123);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `emprunts`
--
ALTER TABLE `emprunts`
  ADD CONSTRAINT `emprunts_ibfk_2` FOREIGN KEY (`#Reference_livre`) REFERENCES `livres` (`Reference_livre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunts_ibfk_1` FOREIGN KEY (`#ID_Adherent`) REFERENCES `adherents` (`ID_Adherent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livres`
--
ALTER TABLE `livres`
  ADD CONSTRAINT `livres_ibfk_1` FOREIGN KEY (`ID_Auteur`) REFERENCES `auteurs` (`ID_Auteur`) ON DELETE CASCADE ON UPDATE CASCADE;
