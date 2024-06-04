-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 30 avr. 2024 à 10:24
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sauvegarde`
--

INSERT INTO `sauvegarde` (`id`, `nom`, `mail`, `pin`, `telephone`, `Netflix`, `primevideo`, `disney`, `Crunchyroll`, `debut`, `fin`, `montant`, `statut`, `date`) VALUES
(2, 'nick', 'oyonoeffe11@gmail.com', '3333', '0785303879', 'aucun', 'primevideo', 'aucun', 'aucun', '2024-03-27', '2024-04-26', '2000', 'expirer', '2024-04-30 09:21:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
