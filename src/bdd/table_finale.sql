-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 03 mars 2025 à 01:15
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
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `objet` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `email`, `objet`, `description`) VALUES
(1, 'leomnes@gmail.com', 'poulet', '2'),
(2, 'leomnes25@gmail.com', 'iuhjuhn', 'uhuhuh');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `duree` time NOT NULL,
  `genre` varchar(50) NOT NULL,
  `affiche` varchar(200) NOT NULL,
  PRIMARY KEY (`id_film`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `description`, `duree`, `genre`, `affiche`) VALUES
(2, 'Interstellar', 'Dans un futur proche où la Terre se meurt, un groupe d’explorateurs utilise un trou de ver récemment découvert pour tenter de trouver une nouvelle planète habitable et sauver l’humanité.', '00:00:00', 'Science-fiction, Drame, Aventure', 'https://upload.wikimedia.org/wikipedia/en/b/bc/Interstellar_film_poster.jpg'),
(4, 'Inception', 'Dom Cobb est un voleur hors pair, spécialisé dans l’extraction de secrets en pénétrant les rêves de ses cibles. Mais sa nouvelle mission est plus périlleuse : il doit implanter une idée dans l’esprit d’un individu sans qu’il s’en rende compte.', '00:01:48', 'Science-fiction, Action, Thriller', 'https://upload.wikimedia.org/wikipedia/en/2/2e/Inception_%282010%29_theatrical_poster.jpg'),
(6, 'The Dark Knight', 'Batman, avec l’aide du lieutenant Gordon et du procureur Harvey Dent, tente d’éradiquer le crime organisé à Gotham. Mais leur plan est bouleversé par l’arrivée du Joker, un criminel anarchique qui sème le chaos dans la ville.', '00:01:52', 'Action, Thriller, Crime', 'https://upload.wikimedia.org/wikipedia/en/1/1c/The_Dark_Knight_%282008_film%29.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `id_film` int NOT NULL,
  `id_user` int NOT NULL,
  `nb_places` int NOT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `id_film` (`id_film`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int NOT NULL AUTO_INCREMENT,
  `nb_place` int DEFAULT NULL,
  `numero` int NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nb_place`, `numero`) VALUES
(1, 250, 0);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id_seance` int NOT NULL AUTO_INCREMENT,
  `id_film` int NOT NULL,
  `date` date NOT NULL,
  `heure_fin` time NOT NULL,
  `id_salle` int NOT NULL,
  `place_dispo` int NOT NULL,
  `heure_debut` time NOT NULL,
  PRIMARY KEY (`id_seance`),
  KEY `id_film` (`id_film`),
  KEY `id_salle` (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `id_film`, `date`, `heure_fin`, `id_salle`, `place_dispo`, `heure_debut`) VALUES
(1, 6, '2025-03-05', '07:02:01', 1, 250, '07:02:01');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
(28, 'a', 'a', 'a@a', '$2y$10$yXra/2Zxv2xnGtD8.lrJ.OrixAk4red52guQTKcI0P5h6KOuycc0q', 'admin'),
(29, 'a', 'a', 'a@a', '$2y$10$dU772SJnkmGUybGfs/qkkOONZolLSi3hyBMuwiX1RYP6hyTNBBus6', 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
