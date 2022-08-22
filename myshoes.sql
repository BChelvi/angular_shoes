-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 août 2022 à 15:04
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `myshoes`
--

-- --------------------------------------------------------

--
-- Structure de la table `shoes`
--

CREATE TABLE `shoes` (
  `article_id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prix` int(11) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `shoes`
--

INSERT INTO `shoes` (`article_id`, `nom`, `prix`, `img`, `description`) VALUES
(15, 'Nike Dunk Low Racer Blue White', 119, './img/B1.png', 'white'),
(16, 'Nike Air Max 1 Travis Scott', 233, './img/B2.png', 'Cactus Jack Saturn Gold'),
(17, 'Crocs Pollex CLog by Salehe', 166, './img/B3.png', 'Bembury Status'),
(18, 'Crocs Pollex CLog by Salehe', 284, './img/B4.png', 'Bembury Status'),
(19, 'Crocs Pollex CLog by Salehe', 284, './img/B4.png', 'Bembury Status'),
(20, 'New Balance', 566, './img/B7.png', 'bleu du futur'),
(21, 'New Balance', 566, './img/B7.png', 'bleu du futur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`article_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
