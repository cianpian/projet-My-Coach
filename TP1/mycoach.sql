-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 oct. 2023 à 11:16
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mycoach`
--

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

DROP TABLE IF EXISTS `jour`;
CREATE TABLE IF NOT EXISTS `jour` (
  `numJour` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`numJour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `jour`
--

INSERT INTO `jour` (`numJour`, `nom`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi'),
(7, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `numNiveau` int NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`numNiveau`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`numNiveau`, `libelle`) VALUES
(1, 'débutant'),
(2, 'intermédiaire'),
(3, 'avancé');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `numSalle` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `cp` char(5) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`numSalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`numSalle`, `nom`, `adress`, `cp`, `ville`) VALUES
(1, 'ozenne', '7 rue merly', '31000', 'toulouse'),
(2, 'bourdelle', '9 fbg du moustier', '82000', 'moutauban'),
(3, 'claude naugaro', '7 rue lassere', '82000', 'montauban');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `numSeance` int NOT NULL AUTO_INCREMENT,
  `numSalle` int NOT NULL,
  `numSport` int NOT NULL,
  `numNiveau` int NOT NULL,
  `numJour` int NOT NULL,
  `Hdeb` time NOT NULL,
  `Hfin` time NOT NULL,
  PRIMARY KEY (`numSeance`),
  KEY `seance_fkSalle` (`numSalle`),
  KEY `seance_fkSport` (`numSport`),
  KEY `seance_fkJour` (`numJour`),
  KEY `seance_fkNiveau` (`numNiveau`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`numSeance`, `numSalle`, `numSport`, `numNiveau`, `numJour`, `Hdeb`, `Hfin`) VALUES
(1, 1, 3, 1, 2, '14:00:00', '16:00:00'),
(2, 2, 2, 2, 4, '17:30:00', '20:30:00'),
(3, 3, 1, 3, 6, '08:00:00', '09:30:00'),
(4, 1, 3, 2, 1, '17:30:00', '20:30:00'),
(5, 1, 3, 3, 5, '18:00:00', '21:00:00'),
(6, 2, 2, 3, 7, '18:00:00', '21:00:00'),
(7, 2, 2, 1, 3, '18:00:00', '21:00:00'),
(8, 3, 1, 2, 1, '12:00:00', '14:30:00'),
(9, 2, 2, 3, 7, '15:00:00', '17:00:00'),
(10, 2, 1, 1, 2, '18:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `numSport` int NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`numSport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`numSport`, `libelle`) VALUES
(1, 'pilat'),
(2, 'marche rythmic'),
(3, 'gym');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`,`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_fkJour` FOREIGN KEY (`numJour`) REFERENCES `jour` (`numJour`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_fkNiveau` FOREIGN KEY (`numNiveau`) REFERENCES `niveau` (`numNiveau`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_fkSalle` FOREIGN KEY (`numSalle`) REFERENCES `salle` (`numSalle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_fkSport` FOREIGN KEY (`numSport`) REFERENCES `sport` (`numSport`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
