-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 29 mai 2021 à 18:40
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `redesigned-fiesta`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `nom`, `prenom`, `email`) VALUES
(1, '2021-05-29 13:55:22', 'Andriamialy', 'Nisaina Angelot', 'angelot.andriamialy@gmail.com'),
(2, '2021-05-29 13:58:56', 'Andriamialy', 'Avotra Sandro', 'avotra.sandro@gmail.com'),
(3, '2021-05-29 13:59:08', 'Chrysostome', 'Priscillia', 'priscilliachryso@gmail.com'),
(4, '2021-05-29 18:27:17', 'Ranaivoson', 'Mialisoa', 'mialisoa.ranaivoson@gmail.com'),
(5, '2021-05-29 18:30:59', 'Rakotovao', 'Priscilla', 'priscilla.rakotovao@gmail.com'),
(6, '2021-05-29 18:31:37', 'Raobizafy', 'Fabrice', 'fabrice.raobizafy@gmail.com'),
(7, '2021-05-29 18:32:13', 'Rabemanantsoa', 'Miora', 'miora@gmail.com'),
(8, '2021-05-29 18:32:51', 'Rakotozafy', 'Gabriella', 'gabriella@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `client_voitures`
--

CREATE TABLE `client_voitures` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client_voitures`
--

INSERT INTO `client_voitures` (`id`, `client_id`, `voiture_id`, `status`) VALUES
(1, 1, 6, 1),
(2, 1, 7, 1),
(3, 2, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `voitures`
--

CREATE TABLE `voitures` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `model` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `type_moteur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voitures`
--

INSERT INTO `voitures` (`id`, `created_at`, `model`, `marque`, `type_moteur`) VALUES
(6, '2021-05-29 14:21:14', 'Toyota', 'Supra', '120CV'),
(7, '2021-05-29 18:05:01', 'Ford', 'Escort MK4', '95CV');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `client_voitures`
--
ALTER TABLE `client_voitures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voitures`
--
ALTER TABLE `voitures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `client_voitures`
--
ALTER TABLE `client_voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `voitures`
--
ALTER TABLE `voitures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
