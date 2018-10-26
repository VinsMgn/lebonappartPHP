-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 oct. 2018 à 13:23
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lebonappart`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartements`
--

DROP TABLE IF EXISTS `appartements`;
CREATE TABLE IF NOT EXISTS `appartements` (
  `id_appartement` int(11) NOT NULL AUTO_INCREMENT,
  `prix` int(11) NOT NULL,
  `description` varchar(180) NOT NULL,
  `etat` varchar(180) NOT NULL,
  `nbPiece` int(11) NOT NULL,
  `surface` int(11) NOT NULL,
  `meuble` tinyint(1) NOT NULL,
  `ind_energie` varchar(180) NOT NULL,
  `dateCreation` varchar(180) NOT NULL,
  `dateExpiration` varchar(180) NOT NULL,
  `message` varchar(255) NOT NULL,
  `statut` tinyint(1) NOT NULL,
  `FK_USERS` int(11) NOT NULL,
  `FK_QUARTIERS` int(11) NOT NULL,
  `FK_VILLES` int(11) NOT NULL,
  PRIMARY KEY (`id_appartement`),
  KEY `APPARTEMENTS_USERS_FK` (`FK_USERS`),
  KEY `APPARTEMENTS_QUARTIERS0_FK` (`FK_QUARTIERS`),
  KEY `APPARTEMENTS_VILLES1_FK` (`FK_VILLES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `habite`
--

DROP TABLE IF EXISTS `habite`;
CREATE TABLE IF NOT EXISTS `habite` (
  `id_habite` int(11) NOT NULL,
  `FK_USERS_HABITE` int(11) NOT NULL,
  `dateVente` varchar(180) NOT NULL,
  PRIMARY KEY (`id_habite`,`FK_USERS_HABITE`),
  KEY `habite_USERS0_FK` (`FK_USERS_HABITE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `quartiers`
--

DROP TABLE IF EXISTS `quartiers`;
CREATE TABLE IF NOT EXISTS `quartiers` (
  `id_quartier` int(11) NOT NULL AUTO_INCREMENT,
  `nomQuartier` varchar(180) NOT NULL,
  `fk_ville_quartier` int(11) NOT NULL,
  PRIMARY KEY (`id_quartier`),
  KEY `QUARTIERS_VILLES_FK` (`fk_ville_quartier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `solde` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(180) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`id_ville`, `nomVille`) VALUES
(1, 'Montpellier');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartements`
--
ALTER TABLE `appartements`
  ADD CONSTRAINT `APPARTEMENTS_QUARTIERS0_FK` FOREIGN KEY (`FK_QUARTIERS`) REFERENCES `quartiers` (`id_quartier`),
  ADD CONSTRAINT `APPARTEMENTS_USERS_FK` FOREIGN KEY (`FK_USERS`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `APPARTEMENTS_VILLES1_FK` FOREIGN KEY (`FK_VILLES`) REFERENCES `villes` (`id_ville`);

--
-- Contraintes pour la table `habite`
--
ALTER TABLE `habite`
  ADD CONSTRAINT `habite_APPARTEMENTS_FK` FOREIGN KEY (`id_habite`) REFERENCES `appartements` (`id_appartement`),
  ADD CONSTRAINT `habite_USERS0_FK` FOREIGN KEY (`FK_USERS_HABITE`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `quartiers`
--
ALTER TABLE `quartiers`
  ADD CONSTRAINT `QUARTIERS_VILLES_FK` FOREIGN KEY (`fk_ville_quartier`) REFERENCES `villes` (`id_ville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
