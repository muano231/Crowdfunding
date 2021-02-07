-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 07 fév. 2021 à 21:50
-- Version du serveur :  5.7.23
-- Version de PHP :  7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_crowdfunding`
--

-- --------------------------------------------------------

--
-- Structure de la table `don`
--

DROP TABLE IF EXISTS `don`;
CREATE TABLE IF NOT EXISTS `don` (
  `utilisateur_id` int(11) NOT NULL,
  `projet_id` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date_don` datetime NOT NULL,
  PRIMARY KEY (`utilisateur_id`,`projet_id`),
  KEY `id_utilisateur` (`utilisateur_id`),
  KEY `id_projet` (`projet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `nom_projet` varchar(255) NOT NULL,
  `description_projet` longtext NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_butoir` datetime NOT NULL,
  `objectif` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilisateur_id` (`utilisateur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id`, `utilisateur_id`, `nom_projet`, `description_projet`, `date_creation`, `date_butoir`, `objectif`) VALUES
(1, 36, 'Fusée Ariane 23', 'Aidez-moi à réaliser mon rêve de créer une fusée capable de transporter des visiteurs dans l\'espace !!!!!! ', '2021-02-07 22:42:34', '2021-02-07 00:00:00', 1000000),
(2, 36, 'Voiture sous-marine', 'Un sous-marin ? une voiture ? Pourquoi pas les deux en un ! ', '2021-02-07 22:43:07', '2021-08-13 00:00:00', 10000),
(3, 38, 'Trottinette volante ', 'Vous en avez marre des embouteillages ? Adoptez la trottinette volante ! ', '2021-02-07 22:47:07', '2021-06-26 00:00:00', 500),
(4, 37, 'Lave-vaisselles qui débarrasse tout seul ', 'Tout est dans le titre. ', '2021-02-07 22:48:27', '2021-05-29 00:00:00', 1000);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL,
  `solde` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `mot_de_passe`, `email`, `date_inscription`, `solde`) VALUES
(36, 'Bataillard', 'Yann', 'yanntest', '8cb2237d0679ca88db6464eac60da96345513964', 'yannphp@gmail.com', '2021-02-01 20:08:51', 1020),
(37, 'Test', 'Thomas', 'thomastest', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'thomastest@gmail.com', '2021-02-01 20:19:15', 7890),
(38, 'Michel', 'Luc', 'luctest', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'luctest@gmail.com', '2021-02-01 23:47:30', 10);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `utilisateur_id` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
