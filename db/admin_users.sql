-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 avr. 2024 à 15:10
-- Version du serveur : 8.3.0
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `mail`, `pass`, `date`) VALUES
(1, 'oyonoeffe11@gmail.com', '$2y$10$DSMhu8j83LZxrh5oTQ.WEe8Q66SoAOso/.oa884aFTg6ySSFKp4vS', '2024-04-30 09:54:41');

-- --------------------------------------------------------

--
-- Structure de la table `delete`
--

DROP TABLE IF EXISTS `delete`;
CREATE TABLE IF NOT EXISTS `delete` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `pin` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `Netflix` varchar(250) NOT NULL,
  `primevideo` varchar(250) NOT NULL,
  `disney` varchar(250) NOT NULL,
  `Crunchyroll` varchar(250) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `montant` varchar(250) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `delete`
--

INSERT INTO `delete` (`id`, `nom`, `mail`, `pin`, `telephone`, `Netflix`, `primevideo`, `disney`, `Crunchyroll`, `debut`, `fin`, `montant`, `statut`, `date`) VALUES
(2, 'nick', 'oyonoeffe11@gmail.com', '3333', '0785303879', 'aucun', 'primevideo', 'aucun', 'aucun', '2024-03-27', '2024-04-26', '2000', 'expirer', '2024-04-30 09:21:33');

-- --------------------------------------------------------

--
-- Structure de la table `deletes`
--

DROP TABLE IF EXISTS `deletes`;
CREATE TABLE IF NOT EXISTS `deletes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `pin` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `Netflix` varchar(250) NOT NULL,
  `primevideo` varchar(250) NOT NULL,
  `disney` varchar(250) NOT NULL,
  `Crunchyroll` varchar(250) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `montant` varchar(250) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `deletes`
--

INSERT INTO `deletes` (`id`, `nom`, `mail`, `pin`, `telephone`, `Netflix`, `primevideo`, `disney`, `Crunchyroll`, `debut`, `fin`, `montant`, `statut`, `date`) VALUES
(2, 'nick', 'oyonoeffe11@gmail.com', '3333', '0785303879', 'aucun', 'primevideo', 'aucun', 'aucun', '2024-03-27', '2024-04-26', '2000', 'expirer', '2024-04-30 09:21:33'),
(3, 'nick', 'oyonoeffe11@gmail.com', '3333', '0785303879', 'aucun', 'primevideo', 'aucun', 'aucun', '2024-03-27', '2024-05-30', '2000', 'a jour', '2024-04-30 14:30:46'),
(4, 'nick', 'oyonoeffe11@gmail.com', '3333', '0703734931', 'Netflix', 'aucun', 'aucun', 'aucun', '2024-04-17', '2024-05-17', '2000', '', '2024-04-30 14:32:24');

-- --------------------------------------------------------

--
-- Structure de la table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `mail`
--

INSERT INTO `mail` (`id`, `email`, `date`) VALUES
(1, 'oyonoeffe11@gmail.com', '2024-04-30 09:20:50');

-- --------------------------------------------------------

--
-- Structure de la table `sauvegarde`
--

DROP TABLE IF EXISTS `sauvegarde`;
CREATE TABLE IF NOT EXISTS `sauvegarde` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `pin` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `Netflix` varchar(250) NOT NULL,
  `primevideo` varchar(250) NOT NULL,
  `disney` varchar(250) NOT NULL,
  `Crunchyroll` varchar(250) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `montant` varchar(250) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sauvegarde`
--

INSERT INTO `sauvegarde` (`id`, `nom`, `mail`, `pin`, `telephone`, `Netflix`, `primevideo`, `disney`, `Crunchyroll`, `debut`, `fin`, `montant`, `statut`, `date`) VALUES
(2, 'nick', 'oyonoeffe11@gmail.com', '3333', '0785303879', 'aucun', 'primevideo', 'aucun', 'aucun', '2024-03-27', '2024-04-26', '2000', 'expirer', '2024-04-30 09:21:33'),
(3, 'nick', 'oyonoeffe11@gmail.com', '3333', '0703734931', 'Netflix', 'aucun', 'aucun', 'aucun', '2024-04-17', '2024-05-17', '2000', '', '2024-04-30 14:32:10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `mail` varchar(250) NOT NULL,
  `pin` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `Netflix` varchar(250) NOT NULL,
  `primevideo` varchar(250) NOT NULL,
  `disney` varchar(250) NOT NULL,
  `Crunchyroll` varchar(250) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `montant` varchar(250) NOT NULL,
  `statut` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
