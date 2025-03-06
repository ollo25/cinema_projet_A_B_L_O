-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 06 mars 2025 à 11:03
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lom_gestion_cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `genre` varchar(100) NOT NULL,
  `duree` time NOT NULL,
  `affiche` varchar(255) NOT NULL,
  PRIMARY KEY (`id_film`)
) ;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `description`, `genre`, `duree`, `affiche`) VALUES
(1, 'Inception', 'Dom Cobb est un voleur expérimenté dans l\'art périlleux de l\'extraction : il s\'approprie les secrets les plus précieux d\'une personne en infiltrant son esprit pendant qu\'elle rêve. Cette rare compétence a fait de lui un acteur clé dans l\'univers de l\'espionnage industriel, mais elle l\'a également transformé en fugitif international, lui coûtant tout ce qu\'il a jamais aimé. Aujourd\'hui, on lui offre une chance de rédemption : une dernière mission qui pourrait lui rendre sa vie d\'avant, à condition qu\'il parvienne à l\'impossible, l\'inception. Au lieu de dérober une idée, Cobb et son équipe doivent accomplir l\'inverse : implanter une idée dans l\'esprit d\'un individu.', 'Thriller, Science-fiction', '00:02:28', 'https://tse2.mm.bing.net/th?id=OIP.b8WjJA8J2IJgblXaSliy3QHaLH&w=474&h=474&c=7'),
(2, 'The Dark Knight : Le Chevalier noir', 'Lorsqu\'une menace connue sous le nom du Joker émerge de son passé mystérieux et déclenche le chaos sur la ville de Gotham, Batman doit faire face à l\'un des plus grands défis psychologiques et physiques pour combattre l\'injustice.', 'Action, Crime, Drame', '00:02:32', 'https://tse2.mm.bing.net/th?id=OIP.SaTyImL0SXgHLEDAY6it6wHaLH&w=474&h=474&c=7'),
(3, 'Interstellar', 'Dans un futur proche, la Terre est ravagée par des catastrophes naturelles et une agriculture déclinante. Un groupe d\'explorateurs entreprend une mission à travers un trou de ver récemment découvert, voyageant au-delà de notre galaxie pour trouver une nouvelle planète habitable pour l\'humanité.', 'Science-fiction, Aventure, Drame', '00:02:49', 'https://www.themoviedb.org/t/p/original/nCbkOyOMTEwlEV0LtCOvCnwEONA.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `ref_user` int NOT NULL,
  `ref_seance` int NOT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `ref_user` (`ref_user`),
  KEY `ref_seance` (`ref_seance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `nb_places` int NOT NULL,
  `numero` varchar(50) NOT NULL,
  PRIMARY KEY (`id_salle`),
  UNIQUE KEY `numero` (`numero`)
) ;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nb_places`, `numero`) VALUES
(1, 250, '254'),
(2, 15, '252');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id_seance` int NOT NULL AUTO_INCREMENT,
  `ref_film` int NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `ref_salle` int NOT NULL,
  `places_dispo` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_seance`),
  KEY `ref_film` (`ref_film`),
  KEY `ref_salle` (`ref_salle`)
) ;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `ref_film`, `heure_debut`, `heure_fin`, `ref_salle`, `places_dispo`, `date`) VALUES
(3, 3, '15:00:00', '17:00:00', 1, 250, '2222-09-25');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `email`, `nom`, `prenom`, `mdp`, `role`) VALUES
(1, 'a@a', 'admin', 'admin', '$2y$10$5o6I/qBbxSV8pxqfX81jde0EkZdQaIJrVyx/2VHL.x2jb/NyDxxqG', 'admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`ref_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ref_seance`) REFERENCES `seance` (`id_seance`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`ref_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`ref_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
