-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 avr. 2023 à 07:19
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lafleuriste`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `reference` varchar(3) COLLATE utf8_bin NOT NULL,
  `designation` varchar(150) COLLATE utf8_bin NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL,
  `prix` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ref` varchar(3) COLLATE utf8_bin NOT NULL,
  `bul` varchar(150) COLLATE utf8_bin NOT NULL,
  `pam` varchar(150) COLLATE utf8_bin NOT NULL,
  `ros` varchar(150) COLLATE utf8_bin NOT NULL,
  KEY `fk_articles_categorie` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `numeroco` int(11) NOT NULL AUTO_INCREMENT,
  `iduti` int(11) NOT NULL,
  `produits` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numeroco`),
  KEY `fk_id_co` (`iduti`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8_bin NOT NULL,
  `tel` varchar(10) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `fk_articles_categorie` FOREIGN KEY (`ref`) REFERENCES `articles` (`reference`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_id_co` FOREIGN KEY (`iduti`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
