-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 avr. 2022 à 08:59
-- Version du serveur : 8.0.28
-- Version de PHP : 8.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique_en_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_produit` int NOT NULL,
  `id_facture` int NOT NULL,
  `quant` int NOT NULL,
  `prix` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

DROP TABLE IF EXISTS `droit`;
CREATE TABLE IF NOT EXISTS `droit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `prix` varchar(255) NOT NULL,
  `id_catégorie` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `img`, `prix`, `id_catégorie`) VALUES
(1, 'OG Kush', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus nihil porro distinctio et consequuntur obcaecati, placeat dolores nisi, debitis, perferendis autem officia animi aperiam! Assumenda optio deleniti ducimus atque at.', 'images/p1.png', '10', 1),
(5, 'Orange Bud', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum magni, provident quas laboriosam reiciendis asperiores ullam eos exercitationem quae, recusandae quibusdam facere veritatis quis? Ad fugit eos vitae quod nobis.', 'images/p2.png', '10', 0),
(6, 'Gorilla glue', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum magni, provident quas laboriosam reiciendis asperiores ullam eos exercitationem quae, recusandae quibusdam facere veritatis quis? Ad fugit eos vitae quod nobis.', 'images/p3.png', '10', 0),
(7, 'White Widow', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum magni, provident quas laboriosam reiciendis asperiores ullam eos exercitationem quae, recusandae quibusdam facere veritatis quis? Ad fugit eos vitae quod nobis.', 'images/p4.png', '10', 0),
(8, 'Banana kush', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum magni, provident quas laboriosam reiciendis asperiores ullam eos exercitationem quae, recusandae quibusdam facere veritatis quis? Ad fugit eos vitae quod nobis.', 'images/p5.png', '10', 0),
(9, 'Bublble kush', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum magni, provident quas laboriosam reiciendis asperiores ullam eos exercitationem quae, recusandae quibusdam facere veritatis quis? Ad fugit eos vitae quod nobis.', 'images/p6.png', '10', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_droit` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `adresse`, `password`, `id_droit`) VALUES
(1, 'Test', 'Test', 'testmessage@laplateforme.io', 'feur', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 0),
(2, 'test', 'test', 'function@laplateforme.io', 'feur', 'a29b9fac1f6a92c19535b4847e8a6f37ed8cdbe24cc2912308acbc6556b4071a24f91e330236be4f4085db4876c6befbc8229f29bc60ba218091b8a49912f9fe', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
