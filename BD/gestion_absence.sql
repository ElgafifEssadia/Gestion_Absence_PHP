-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 02 juin 2019 à 12:58
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_absence`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `idAbsence` int(11) NOT NULL AUTO_INCREMENT,
  `idEtudiant` int(11) NOT NULL,
  `idSeance` int(11) NOT NULL,
  `justification` varchar(50) NOT NULL,
  PRIMARY KEY (`idAbsence`),
  KEY `idEtudiant` (`idEtudiant`),
  KEY `idSeance` (`idSeance`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`idAbsence`, `idEtudiant`, `idSeance`, `justification`) VALUES
(1, 3, 1, 'non justifier'),
(3, 3, 2, 'Malade'),
(4, 1, 1, 'Malade');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `pseudo`, `password`) VALUES
(1, 'Elgafif', 'Essadia', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `IDEtudiant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `CNE` varchar(50) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  PRIMARY KEY (`IDEtudiant`),
  KEY `idFiliere` (`idFiliere`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`IDEtudiant`, `nom`, `prenom`, `adresse`, `email`, `tel`, `CNE`, `idFiliere`) VALUES
(1, 'bnkiran', 'saad', 'narjiss', 'saad@gmail.com', '0614725285', '125478', 1),
(3, 'Alami', 'Sanae', 'rue 3', 'alami@gmail.com', '0614702855', '45487', 1),
(4, 'Majdi', 'Anouar', 'ouad Fes', 'majdi@gmail.com', '0614702855', '45487', 3);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `IDFiliere` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  `anneeScolaire` int(11) NOT NULL,
  `numGroupe` int(11) NOT NULL,
  PRIMARY KEY (`IDFiliere`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`IDFiliere`, `description`, `anneeScolaire`, `numGroupe`) VALUES
(1, 'Genie Info', 2019, 1),
(3, 'GÃ©nie Civil', 2018, 2),
(4, 'GAA', 2019, 2);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `idModule` int(11) NOT NULL AUTO_INCREMENT,
  `descriptionM` varchar(50) NOT NULL,
  `horaire` int(11) NOT NULL,
  `idFiliere` int(11) NOT NULL,
  PRIMARY KEY (`idModule`),
  KEY `idFiliere` (`idFiliere`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`idModule`, `descriptionM`, `horaire`, `idFiliere`) VALUES
(1, 'PHP', 60, 1),
(5, 'JAVA', 140, 1),
(8, 'reseau', 50, 1),
(9, 'JEE', 140, 1);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `idSeance` int(11) NOT NULL AUTO_INCREMENT,
  `idModule` int(11) NOT NULL,
  `heureDebut` int(11) NOT NULL,
  `heureFin` int(11) NOT NULL,
  `typeSeance` varchar(50) NOT NULL,
  PRIMARY KEY (`idSeance`),
  KEY `idModule` (`idModule`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`idSeance`, `idModule`, `heureDebut`, `heureFin`, `typeSeance`) VALUES
(1, 1, 14, 18, 'cours'),
(2, 5, 10, 12, 'tp');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`idSeance`) REFERENCES `seance` (`idSeance`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`IDEtudiant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`IDFiliere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`idFiliere`) REFERENCES `filiere` (`IDFiliere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`idModule`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
