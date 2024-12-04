-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 07 avr. 2024 à 23:38
-- Version du serveur : 8.0.33
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `couture_for_fun`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `identifiant` int DEFAULT NULL,
  `cours` smallint NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`identifiant`, `cours`, `date`) VALUES
(1, 1, '2024-04-06'),
(1, 2, '2024-04-06'),
(1, 3, '2024-04-06'),
(2, 1, '2024-04-07'),
(2, 2, '2024-04-07'),
(2, 3, '2024-04-07'),
(3, 1, '2024-04-07'),
(3, 2, '2024-04-07'),
(3, 3, '2024-04-07'),
(4, 1, '2024-04-07'),
(4, 2, '2024-04-07'),
(4, 3, '2024-04-07');

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `identifiant` int DEFAULT NULL,
  `nom_utilisateur` varchar(15) NOT NULL,
  `commentaire` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `review`
--

INSERT INTO `review` (`identifiant`, `nom_utilisateur`, `commentaire`, `date`) VALUES
(1, 'test', 'HELLO LE MONDE', '2024-04-06'),
(2, 'test222', 'tessfds', '2024-04-07'),
(3, 'Utilisateur123', 'Très bon cours, j_ai beaucoup appris !', '2024-04-07'),
(4, 'JohnDoe', 'Le professeur était très compétent.', '2024-04-07'),
(4, 'JaneDoe', 'Je recommande ce cours à tous mes amis.', '2024-04-07'),
(3, 'Utilisateur123', 'Très bon cours, j_ai beaucoup appris !', '2024-04-07'),
(1, 'JohnDoe', 'Le professeur était très compétent.', '2024-04-07'),
(1, 'JaneDoe', 'Je recommande ce cours à tous mes amis.', '2024-04-07');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `identifiant` int NOT NULL,
  `nom_utilisateur` varchar(15) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`identifiant`, `nom_utilisateur`, `nom`, `prenom`, `email`, `mot_de_passe`) VALUES
(1, 'test', 'test', 'test', 'mcd087@gmail.com', 'bd24e012bda231dc8efd1918aaef3c178e0684f939fdb1fbb18d29d7fe298e1b'),
(2, 'test222', 'test', 'test', 'mcd087@gmail.com', 'bd24e012bda231dc8efd1918aaef3c178e0684f939fdb1fbb18d29d7fe298e1b'),
(3, 'test35434', 'test', 'test', 'testtest.services@gmail.com', 'bd24e012bda231dc8efd1918aaef3c178e0684f939fdb1fbb18d29d7fe298e1b'),
(4, 'test24523453', 'test', 'test', 'testtest.services@gmail.com', 'bd24e012bda231dc8efd1918aaef3c178e0684f939fdb1fbb18d29d7fe298e1b'),
(5, 'gsdfgsfdhsfdgh', 'test', 'test', 'mcd087@gmail.com', 'bd24e012bda231dc8efd1918aaef3c178e0684f939fdb1fbb18d29d7fe298e1b');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD KEY `identifiant` (`identifiant`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD KEY `identifiant` (`identifiant`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`identifiant`),
  ADD UNIQUE KEY `nom_utilisateur` (`nom_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `identifiant` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`identifiant`) REFERENCES `utilisateur` (`identifiant`);

--
-- Contraintes pour la table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`identifiant`) REFERENCES `utilisateur` (`identifiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
