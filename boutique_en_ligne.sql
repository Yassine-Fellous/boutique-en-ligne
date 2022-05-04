-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 29 avr. 2022 à 14:16
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id_droit` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `adresse`, `password`, `id_droit`) VALUES
(5, 'admin', 'admin', 'admin@laplateforme.io', 'Pas d&#039;adresse', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1337),
(6, 'testedit', 'testedit', 'testedit@laplateforme.io', 'quoi', 'baedb948ac530c7c27fb2d20794f38caca0fc5e2178104aed1a438eccb7177e8218e7e30b7b5f1bc289efa2f2801377e44bb1afe66cd554d747cc67bca40bd81', 42),
(7, 'Nom', 'Prénom', 'testoraldemo@laplateforme.io', 'rue d&#039;hozier', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 42);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
