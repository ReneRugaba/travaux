-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 14 nov. 2020 à 12:40
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionemploye`
--
CREATE DATABASE IF NOT EXISTS `gestionemploye` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gestionemploye`;

-- --------------------------------------------------------

--
-- Structure de la table `emp`
--

CREATE TABLE `emp` (
  `noemp` int(4) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `emploi` varchar(20) DEFAULT NULL,
  `sup` int(4) DEFAULT NULL,
  `embauche` date DEFAULT NULL,
  `sal` float(9,2) DEFAULT NULL,
  `comm` float(9,2) DEFAULT NULL,
  `noserv` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `emp`
--

INSERT INTO `emp` (`noemp`, `nom`, `prenom`, `emploi`, `sup`, `embauche`, `sal`, `comm`, `noserv`) VALUES
(1000, 'LEROY', 'PAUL', 'PRESIDENT', NULL, '2020-10-01', 55005.50, NULL, 1),
(1100, 'DELPIERRE', 'DOROTHEE', 'SECRETAIRE', 1000, '1987-10-25', 12351.24, NULL, 1),
(1101, 'DUMONT', 'LOUIS', 'VENDEUR', 1300, '1987-10-25', 9047.99, NULL, 1),
(1102, 'MINET', 'MARC', 'VENDEUR', 1300, '1987-10-25', 8085.81, 30.00, 1),
(1105, 'DENIMAL', 'JEROME', 'COMPTABLE', 1600, '1987-10-25', 15746.57, NULL, 1),
(1200, 'LEMAIRE', 'GUY', 'DIRECTEUR', 1000, '1987-03-11', 36303.63, NULL, 2),
(1300, 'LENOIR', 'GERARD', 'DIRECTEUR', 1000, '1987-04-02', 31353.14, 13071.00, 3),
(1301, 'GERARD', 'ROBERT', 'VENDEUR', 1300, '1999-04-16', 7694.77, 12430.00, 3),
(1500, 'DUPONT', 'JEAN', 'DIRECTEUR', 1000, '1987-10-23', 28434.84, NULL, 5),
(1502, 'DURAND', 'BERNARD', 'PROGRAMMEUR', 1500, '1987-07-30', 13201.32, NULL, 5),
(1503, 'DELNATTE', 'LUC', 'PUPITREUR', 1500, '1999-01-15', 9000.00, NULL, 5),
(1600, 'LAVARE', 'PAUL', 'DIRECTEUR', 1000, '1991-12-13', 31238.12, NULL, 6),
(1601, 'CARON', 'ALAIN', 'COMPTABLE', 1600, '1985-09-16', 33003.00, NULL, 6);

-- --------------------------------------------------------

--
-- Structure de la table `serv`
--

CREATE TABLE `serv` (
  `noserv` int(2) NOT NULL,
  `service` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `serv`
--

INSERT INTO `serv` (`noserv`, `service`, `ville`) VALUES
(1, 'DIRECTION', 'bourg'),
(2, 'LOGISTIQUE', 'SECLIN'),
(3, 'VENTES', 'ROUBAIX'),
(5, 'INFORMATIQUE', 'LILLE'),
(6, 'COMPTABILITE', 'tulle');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id` int(4) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `profil` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `username`, `password`, `profil`) VALUES
(4, 'elijah@mail.com', '$2y$10$uqH2KB1hGEn/dbMS0DucY.Wsoysv5Dh83e3.Yna8c4KQFPZEIW/WW', 'utilisateur'),
(5, 'malackaie@mail.com', '$2y$10$lnHrTnnD.GAbG1.7vGvbYe/PzBcjU41spBUZzMX4OjWcfrLifHj42', 'utilisateur'),
(6, 'rutijd@mail.com', '$2y$10$MP5eL85wtTR..jNolCRzsexkrFOX59vwSzmkGOmJ2SgUOg50FYnRi', 'utilisateur'),
(7, 'rukundo@mail.com', '$2y$10$do84PWKaW6eLs2Qq5VT6ueF/mFMKDzpCjpPy7O2gmBeegwBtRcVDS', 'utilisateur'),
(9, 'muk@mail.com', '$2y$10$1VpVjDmUNgJa2xoOD7xCqOc0BoFaCpTJ3bMzlV/F4bvi7Q30fYbAe', 'utilisateur'),
(10, 'rugira@mail.com', '$2y$10$uKYNMSYMAKEh5aWlQ3BVveAd.lq4ROZpKgYrfEUUnWdGbYGYeovoO', 'utilisateur'),
(11, 'rugabarj@mail.com', '$2y$10$d.lxTltA2sRjLe6LqXOzNOPBYEEkDqgA1Qyf/VolwM5FNh1qdpfSS', 'admin'),
(12, 'jknlk@hg.com', '$2y$10$bU/Hsw7QDOjw6axIIiGRQeCdV5/OnHa1v1FfephZYeLMmYYz7r7f6', 'utilisateur'),
(13, 'rrene@mail.com', '$2y$10$8hnE4oZ3u2Du/cQsCd2vReSeoE4ztiJ82kT7zhFRKAC4QfDyoiv/2', 'utilisateur'),
(14, 'trayvis@mail.com', '$2y$10$9yBkigJEt3JJymNmlr.DRO8CuYf6eP8LPxfHb5l/hDwo6kIbviIAu', 'utilisateur'),
(15, 'rr@mail.com', '$2y$10$a5HNej.bCSvFHlzrf3imYuYuCDte2/xeDwMYkaBISjw01L/KfpbB6', 'utilisateur'),
(16, 'rugirajf@mail.com', '$2y$10$8J6pZglzogZ4DfcSeYzKZeUK0sgdiLbCrmTteQFp/QHKhUfzGXoi6', 'utilisateur'),
(17, 'rugirajf@mail.com', '$2y$10$LzGreXOK1CaO1GFhokLPy.yXOeANOCdsUDNPnZVqEYi5Y2H.JItFm', 'utilisateur'),
(18, 'mukj@mail.com', '$2y$10$SlLhiTY0hSc3ZYn0HpE8Q.AP8hvgdPasuSHcChvRwyA0Br9EMNM5y', 'utilisateur'),
(19, 'jeanpopol@gmail.com', '$2y$10$KRWk2CfMx4hySpKFA921LuKDTg6jwxcjG9m7.eD400H.1AzqKBeQm', 'utilisateur'),
(20, 'malakaie@mail.com', '$2y$10$VRXDMEKsFpLYYCHnN9nICO2qOqsHecZ1/B6rbYc/mEJhSVG6V9Ugu', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`noemp`),
  ADD KEY `noserv` (`noserv`);

--
-- Index pour la table `serv`
--
ALTER TABLE `serv`
  ADD PRIMARY KEY (`noserv`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Base de données : `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
