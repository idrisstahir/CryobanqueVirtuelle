-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 31 jan. 2018 à 16:24
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `membres`
--

-- --------------------------------------------------------

--
-- Structure de la table `deposant`
--

CREATE TABLE `deposant` (
  `Identifiant_PAR` varchar(11) CHARACTER SET utf8 NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Addresse1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Addresse2` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Boite_postal` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `Code_postal` char(10) CHARACTER SET utf8 NOT NULL,
  `Ville` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Pays` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Téléphone1` varchar(20) CHARACTER SET utf8 NOT NULL,
  `Téléphone2` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Fax` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `echantillon`
--

CREATE TABLE `echantillon` (
  `id_echantillon` varchar(11) NOT NULL,
  `id_déposant` varchar(11) NOT NULL,
  `id_individu` varchar(11) NOT NULL,
  `date_depot` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userid` int(25) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `niveau` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `date_ins` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `der_log` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `cleConfirmation` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Information membre';

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userid`, `nom`, `prenom`, `email`, `pseudo`, `password`, `info`, `niveau`, `date_ins`, `der_log`, `active`, `cleConfirmation`) VALUES
(1, 'Teguia', 'michel', 'michel1@univ-tours.fr', 'michel1', '6a62415b43a0268f38f117f076dce135705d7895', 'responsable M2 CCI', '0', '2018-01-26 21:47:19', '0000-00-00 00:00:00', '0', '24683450166490'),
(2, 'Tahir', 'idriss', 'idrisstahir@hotmail.fr', 'eddy64', '6a62415b43a0268f38f117f076dce135705d7895', 'Reconversion en informatique', '0', '2018-01-26 21:49:41', '2018-01-30 23:22:52', '1', '73598019401748'),
(3, 'Haggar', 'idriss', 'idrisstahir@yahoo.fr', 'eddy37', '6a62415b43a0268f38f117f076dce135705d7895', 'exercices php done!!!', '0', '2018-01-26 22:02:37', '2018-01-26 22:04:35', '1', '00771864511251'),
(6, 'rototot', 'tatat', 'idrisstahir@gmail.com', 'eddy', '6a62415b43a0268f38f117f076dce135705d7895', '', '0', '2018-01-31 14:22:19', '2018-01-31 14:26:53', '1', '79270193610001');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `deposant`
--
ALTER TABLE `deposant`
  ADD PRIMARY KEY (`Identifiant_PAR`) USING BTREE;

--
-- Index pour la table `echantillon`
--
ALTER TABLE `echantillon`
  ADD PRIMARY KEY (`id_echantillon`),
  ADD UNIQUE KEY `id_déposant` (`id_déposant`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
