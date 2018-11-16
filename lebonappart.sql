-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 16 nov. 2018 à 14:14
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

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `selectUserDetail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `selectUserDetail` (IN `idUser` INT(11))  NO SQL
select users.nom, users.prenom, villes.nomVille, quartiers.nomQuartier
from appartements, habite, users, villes, quartiers
where appartements.id_appartement = habite.idApparthabite
and users.id = idUser
and villes.cpVille = appartements.FK_VILLES
and quartiers.id_quartier = appartements.FK_QUARTIERS$$

DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appartements`
--

INSERT INTO `appartements` (`id_appartement`, `prix`, `description`, `etat`, `nbPiece`, `surface`, `meuble`, `ind_energie`, `dateCreation`, `dateExpiration`, `message`, `statut`, `FK_USERS`, `FK_QUARTIERS`, `FK_VILLES`) VALUES
(8, 200, 'Studio', 'Beau', 1, 12, 0, 'F', '01/01/2018', '31/12/2018', 'Studio pas chère et grand', 0, 1, 4, 75000),
(9, 120, 'Chalet', 'En bois', 2, 50, 1, 'D', '25/12/2017', '25/01/2018', 'Chalet en bois neuf', 0, 2, 1, 34000);

--
-- Déclencheurs `appartements`
--
DROP TRIGGER IF EXISTS `deleteHabite`;
DELIMITER $$
CREATE TRIGGER `deleteHabite` BEFORE DELETE ON `appartements` FOR EACH ROW BEGIN

DELETE FROM `habite` WHERE habite.FK_USERS_HABITE = OLD.FK_USERS;

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `historiqueAppart`;
DELIMITER $$
CREATE TRIGGER `historiqueAppart` BEFORE DELETE ON `appartements` FOR EACH ROW BEGIN

INSERT INTO `historique`(`id_appartement`, `prix`, `description`, `etat`, `nbPiece`, `surface`, `meuble`, `ind_energie`, `dateCreation`, `dateExpiration`, `message`, `statut`, `FK_USERS`, `FK_QUARTIERS`, `FK_VILLES`) VALUES (OLD.id_appartement, OLD.prix, OLD.description, OLD.etat, OLD.nbPiece, OLD.surface, OLD.meuble, OLD.ind_energie, OLD.dateCreation, OLD.dateExpiration, OLD.message, OLD.statut, OLD.FK_USERS, OLD.FK_QUARTIERS, OLD.FK_VILLES);

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `insertHabite`;
DELIMITER $$
CREATE TRIGGER `insertHabite` BEFORE INSERT ON `appartements` FOR EACH ROW BEGIN

insert into habite (`idApparthabite`, `FK_USERS_HABITE`, `dateVente`) VALUES (new.id_appartement, new.FK_USERS, new.dateCreation);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `habite`
--

DROP TABLE IF EXISTS `habite`;
CREATE TABLE IF NOT EXISTS `habite` (
  `idApparthabite` int(11) NOT NULL AUTO_INCREMENT,
  `FK_USERS_HABITE` int(11) NOT NULL,
  `dateVente` varchar(180) NOT NULL,
  PRIMARY KEY (`idApparthabite`) USING BTREE,
  KEY `habite_USERS0_FK` (`FK_USERS_HABITE`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `habite`
--

INSERT INTO `habite` (`idApparthabite`, `FK_USERS_HABITE`, `dateVente`) VALUES
(1, 1, '01/01/2018'),
(4, 2, '25/12/2017');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

DROP TABLE IF EXISTS `historique`;
CREATE TABLE IF NOT EXISTS `historique` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`id_appartement`, `prix`, `description`, `etat`, `nbPiece`, `surface`, `meuble`, `ind_energie`, `dateCreation`, `dateExpiration`, `message`, `statut`, `FK_USERS`, `FK_QUARTIERS`, `FK_VILLES`) VALUES
(2, 500, 'appartement T2', 'ancien', 2, 30, 1, '50', '07/01/1999', '09/10/2019', 'Appartement style ancien à louer', 0, 1, 3, 34000),
(3, 850, 'Appartement T4', 'Rénové', 4, 50, 1, '350', '25/12/2016', '25/12/2018', 'Appartement rénové', 1, 2, 3, 34000),
(6, 350, 'Studio', 'Neuf', 1, 20, 1, '150', '02/05/2018', '01/01/2019', 'Studio 20m² tout neuf disponible imméditament', 0, 2, 6, 75000);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `quartiers`
--

INSERT INTO `quartiers` (`id_quartier`, `nomQuartier`, `fk_ville_quartier`) VALUES
(1, 'Millénaire', 34000),
(2, 'Odysseum', 34000),
(3, 'Paillade', 34000),
(4, '1er arrondissement', 75000),
(5, '2ème arrondissement', 75000),
(6, '3ème arrondissement', 75000);

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
  `isAdmin` tinyint(1) NOT NULL,
  `isProprietaire` tinyint(1) NOT NULL,
  `lockedMoney` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `adress`, `phone`, `mail`, `pays`, `solde`, `password`, `isAdmin`, `isProprietaire`, `lockedMoney`) VALUES
(1, 'Martin', 'Gabriel', '25 rue des coquelicots', '0612345678', 'gabriel.martin@epsi.fr', 'France', '500', '1234', 1, 1, 150),
(2, 'Marignier', 'Vincent', 'Montpellier', '0612345678', 'vincent.marignier@epsi.fr', 'France', '150', 'abcd', 0, 0, NULL),
(3, 'Dupont', 'Jean', '25 rue de Montpellier', '0465885987', 'dupontjean@yahoo.fr', 'France', '0', '1234', 0, 0, NULL),
(4, 'Durand', 'Anthony', '34 route de nimes', '0612345679', 'a.durand@gmail.com', 'France', '900', '1234', 0, 0, NULL),
(5, 'Dupont', 'Jacques', 'Montpellier', '0612345670', 'jacques.dupont@epsi.fr', 'Frane', '0', '1234', 0, 0, NULL),
(6, 'Bertin', 'Manon', 'Montpellier', '0612345675', 'm.bertin@epsi.fr', 'France', '0', '1234', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `cpVille` int(5) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(180) NOT NULL,
  PRIMARY KEY (`cpVille`)
) ENGINE=InnoDB AUTO_INCREMENT=75001 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`cpVille`, `nomVille`) VALUES
(34000, 'Montpellier'),
(75000, 'Paris');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartements`
--
ALTER TABLE `appartements`
  ADD CONSTRAINT `APPARTEMENTS_QUARTIERS0_FK` FOREIGN KEY (`FK_QUARTIERS`) REFERENCES `quartiers` (`id_quartier`),
  ADD CONSTRAINT `APPARTEMENTS_USERS_FK` FOREIGN KEY (`FK_USERS`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `APPARTEMENTS_VILLES1_FK` FOREIGN KEY (`FK_VILLES`) REFERENCES `villes` (`cpVille`);

--
-- Contraintes pour la table `habite`
--
ALTER TABLE `habite`
  ADD CONSTRAINT `habite_USERS0_FK` FOREIGN KEY (`FK_USERS_HABITE`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `quartiers`
--
ALTER TABLE `quartiers`
  ADD CONSTRAINT `QUARTIERS_VILLES_FK` FOREIGN KEY (`fk_ville_quartier`) REFERENCES `villes` (`cpVille`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
