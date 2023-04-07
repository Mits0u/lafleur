-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 avr. 2023 à 08:03
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

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`reference`, `designation`, `photo`, `prix`, `qte`) VALUES
('b01', '3 bulbes de bégonias', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/bulbes_begonia.jpg?raw=true', 5, 125),
('b02', '10 bulbes de dahlias', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/bulbes_dahlia.jpg?raw=true', 12, 100),
('b03', '50 glaïeuls', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/bulbes_glaieul.jpg?raw=true', 9, 98),
('m01', 'lot de 3 marguerites', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/massif_marguerite.jpg?raw=true', 5, 52),
('m02', 'Pour un bouquet de 6 pensées', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/massif_pensee.jpg?raw=true', 6, 45),
('m03', 'Mélange varié de 10 plantes à massifs', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/massif_melange.jpg?raw=true', 15, 21),
('r01', '1 pied spécial grandes fleurs', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/rosiers_gdefleur.jpg?raw=true', 20, 35),
('r02', 'une variété selectionnées pour son parfum', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/rosiers_parfum.jpg?raw=true', 9, 78),
('r03', 'rossier arbuste', 'https://github.com/Mits0u/lafleur/blob/master/assets/img/rosiers_arbuste.jpg?raw=true', 8, 29);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `ref` varchar(3) COLLATE utf8_bin NOT NULL,
  `libelle` varchar(100) COLLATE utf8_bin NOT NULL,
  KEY `fk_articles_categorie` (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`ref`, `libelle`) VALUES
('b01', 'Bulbes'),
('b02', 'Bulbes'),
('b03', 'Bulbes'),
('m01', 'Plantes à massif'),
('m02', 'Plantes à massif'),
('m03', 'Plantes à massif'),
('r01', 'Rosiers'),
('r02', 'Rosiers'),
('r03', 'Rosiers');

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
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
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
