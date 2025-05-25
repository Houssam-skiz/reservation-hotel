-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 25 mai 2025 à 22:59
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel1`
--

-- --------------------------------------------------------

--
-- Structure de la table `rese`
--

CREATE TABLE `rese` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Valid','Expired') NOT NULL DEFAULT 'Valid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rese`
--

INSERT INTO `rese` (`id`, `name`, `email`, `address`, `phone`, `date`, `status`) VALUES
(1, 'HOUSSAM AL HYANE', 'alhyanhoussam@gmail.com', 'mhdi dajaj', '0628967984', '2050-10-22', 'Valid'),
(2, 'HOUSSAM AL HYANE', 'alhyanhoussam@gmail.com', 'mhdi dajaj', '0628967984', '2015-10-22', 'Valid'),
(3, 'HOUSSAM AL HYANE', 'alhyanhoussam@gmail.com', 'mhdi dajaj', '0628967984', '2015-10-22', 'Valid'),
(4, 'HOUSSAM AL HYANE', 'alhyanhoussam@gmail.com', 'mhdi dajaj', '0628967984', '2004-02-10', 'Valid');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('houssam', 'Houssam@10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rese`
--
ALTER TABLE `rese`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rese`
--
ALTER TABLE `rese`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
