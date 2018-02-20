-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 20 fév. 2018 à 16:38
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
  `id_deposant` varchar(11) CHARACTER SET utf8 NOT NULL,
  `nom_deposant` varchar(100) CHARACTER SET utf8 NOT NULL,
  `prenom_deposant` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ville_deposant` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pays_deposant` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email_deposant` varchar(50) CHARACTER SET utf8 NOT NULL,
  `droit_deposant` int(11) NOT NULL,
  `no_etudiant` int(8) DEFAULT NULL,
  `password_deposant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `deposant_temporaire`
--

CREATE TABLE `deposant_temporaire` (
  `id_deposant_temporaire` varchar(11) CHARACTER SET utf8 NOT NULL,
  `nom_deposant` varchar(100) CHARACTER SET utf8 NOT NULL,
  `prenom_deposant` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ville_deposant` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pays_deposant` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email_deposant` varchar(50) CHARACTER SET utf8 NOT NULL,
  `droit_deposant` int(11) NOT NULL,
  `no_etudiant` int(8) DEFAULT NULL,
  `password_deposant` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `depot_temporaire`
--

CREATE TABLE `depot_temporaire` (
  `id_depot_temporaire` varchar(11) NOT NULL,
  `id_deposant` varchar(11) NOT NULL,
  `id_individu` varchar(11) NOT NULL,
  `date_depot` datetime DEFAULT CURRENT_TIMESTAMP,
  `motilite` float NOT NULL,
  `viabilite` float NOT NULL,
  `concentration` float NOT NULL,
  `quantite_paillette` int(11) NOT NULL,
  `motif_entree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `echantillon`
--

CREATE TABLE `echantillon` (
  `id_echantillon` varchar(11) NOT NULL,
  `id_deposant` varchar(11) NOT NULL,
  `id_individu` int(11) NOT NULL,
  `date_depot` datetime DEFAULT CURRENT_TIMESTAMP,
  `motilite` float NOT NULL,
  `viabilite` float NOT NULL,
  `concentration` float NOT NULL,
  `quantite_paillette` int(11) NOT NULL,
  `motif_entree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `espece`
--

CREATE TABLE `espece` (
  `id_espece` int(11) NOT NULL,
  `libelle_espece` varchar(255) NOT NULL,
  `nom_vernaculaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `individu`
--

CREATE TABLE `individu` (
  `id_individu` int(11) NOT NULL,
  `id_lignee` int(11) NOT NULL,
  `taille_individu` int(11) NOT NULL COMMENT 'taille en cm',
  `couleur_individu` varchar(20) NOT NULL,
  `naisseur` int(11) NOT NULL,
  `eleveur` int(11) NOT NULL,
  `statut_sanitaire` varchar(100) NOT NULL,
  `sexe_individu` enum('Mâle','Femelle','Hermaphrodite','Inconnu') NOT NULL,
  `id_pere` int(11) NOT NULL,
  `id_mere` int(11) NOT NULL,
  `no_identification_officiel` int(11) DEFAULT NULL,
  `maladie_individu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignee`
--

CREATE TABLE `lignee` (
  `id_lignee` int(11) NOT NULL,
  `id_race` int(11) NOT NULL,
  `libelle_lignee` varchar(255) NOT NULL,
  `type_lignee` enum('I','II','III') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `id_race` int(11) NOT NULL,
  `id_espece` int(11) NOT NULL,
  `libelle_race` varchar(255) NOT NULL,
  `alias_race` varchar(255) DEFAULT NULL,
  `motilite_min` float NOT NULL,
  `viabilite_min` float NOT NULL,
  `concentration_min` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id_deposant`) USING BTREE;

--
-- Index pour la table `deposant_temporaire`
--
ALTER TABLE `deposant_temporaire`
  ADD PRIMARY KEY (`id_deposant_temporaire`);

--
-- Index pour la table `depot_temporaire`
--
ALTER TABLE `depot_temporaire`
  ADD KEY `id_deposant` (`id_deposant`);

--
-- Index pour la table `echantillon`
--
ALTER TABLE `echantillon`
  ADD PRIMARY KEY (`id_echantillon`),
  ADD UNIQUE KEY `id_déposant` (`id_deposant`) USING BTREE,
  ADD KEY `id_individu` (`id_individu`);

--
-- Index pour la table `espece`
--
ALTER TABLE `espece`
  ADD PRIMARY KEY (`id_espece`);

--
-- Index pour la table `individu`
--
ALTER TABLE `individu`
  ADD PRIMARY KEY (`id_individu`),
  ADD KEY `id_lignee` (`id_lignee`);

--
-- Index pour la table `lignee`
--
ALTER TABLE `lignee`
  ADD PRIMARY KEY (`id_lignee`),
  ADD KEY `id_race` (`id_race`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`id_race`),
  ADD KEY `id_espece` (`id_espece`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `espece`
--
ALTER TABLE `espece`
  MODIFY `id_espece` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `individu`
--
ALTER TABLE `individu`
  MODIFY `id_individu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lignee`
--
ALTER TABLE `lignee`
  MODIFY `id_lignee` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `id_race` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `depot_temporaire`
--
ALTER TABLE `depot_temporaire`
  ADD CONSTRAINT `depot_temporaire_ibfk_1` FOREIGN KEY (`id_deposant`) REFERENCES `deposant` (`id_deposant`);

--
-- Contraintes pour la table `echantillon`
--
ALTER TABLE `echantillon`
  ADD CONSTRAINT `echantillon_ibfk_1` FOREIGN KEY (`id_deposant`) REFERENCES `deposant` (`id_deposant`),
  ADD CONSTRAINT `echantillon_ibfk_2` FOREIGN KEY (`id_individu`) REFERENCES `individu` (`id_individu`);

--
-- Contraintes pour la table `individu`
--
ALTER TABLE `individu`
  ADD CONSTRAINT `individu_ibfk_1` FOREIGN KEY (`id_lignee`) REFERENCES `lignee` (`id_lignee`);

--
-- Contraintes pour la table `lignee`
--
ALTER TABLE `lignee`
  ADD CONSTRAINT `lignee_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id_race`);

--
-- Contraintes pour la table `race`
--
ALTER TABLE `race`
  ADD CONSTRAINT `race_ibfk_1` FOREIGN KEY (`id_espece`) REFERENCES `espece` (`id_espece`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
