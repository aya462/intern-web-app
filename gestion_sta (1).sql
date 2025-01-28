-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 26 jan. 2025 à 12:00
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_sta`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id_s` int(9) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sujet` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_s`, `nom`, `email`, `sujet`, `message`, `Date`) VALUES
(1, 'aya ayadi', 'eyamohsni01@gmail.com', 'rapport', 'je veux envoyer le rapport ce lundi ', '2024-02-08 17:22:04'),
(2, 'mohamed ali', 'mohamed@gmail.com', 'rappo', 'haaaa', '0000-00-00 00:00:00'),
(3, 'mariem', 'mariem@gmail.com', 'demande', 'aeaee', '0000-00-00 00:00:00'),
(4, 'maram', 'mariem@gmail.com', 'photo', 'photo', '2024-01-30 18:53:17'),
(5, 'sami salah', 'salmi@gmail.com', 'attestation ', 'je veux mon attestation', '2024-03-03 19:33:17'),
(6, 'sami salah', 'salmi@gmail.com', 'attestation ', 'je veux mon attestation', '2024-03-03 20:18:43'),
(7, 'hiba ayadi', 'hiba@gmail.com', 'photo', 'xxxxaaaayyyy', '2024-03-03 20:27:08'),
(8, 'mohamed hadi', 'hadi@gmail.com', 'rapport', 'aaaaaaaa', '2024-03-03 20:31:57'),
(9, 'mohamed hadi', 'hadi@gmail.com', 'rapport', 'aaaaaaaa', '2024-03-03 20:44:11'),
(10, 'salma abidi', 'salmaayadi@gmail.com', 'rapport', 'je veux un exemple de rapport', '2024-03-04 18:30:05');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id-R` int(11) NOT NULL,
  `intern_id` int(8) NOT NULL,
  `evaluation` varchar(100) NOT NULL,
  `evaluation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id-R`, `intern_id`, `evaluation`, `evaluation_date`) VALUES
(1, 9, 'bien travail', '2024-03-03 20:24:52'),
(2, 2, 'excellent', '2024-03-04 21:53:00'),
(3, 3, 'tres bien\r\n', '2024-03-04 22:30:47');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(8) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `datedeb` date NOT NULL,
  `datefin` date NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_urll` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `files`
--

INSERT INTO `files` (`id`, `nom_prenom`, `datedeb`, `datefin`, `name`, `file_urll`) VALUES
(3, 'aya ayadi', '2020-02-02', '2020-03-01', 'Rapport-de-stage (2).pdf', 'files/Rapport-de-stage (2).pdf'),
(5, 'mohamd ali', '2024-05-02', '2024-09-06', 'communiquÃ©.pdf', 'files/communiquÃ©.pdf'),
(6, 'ayadi haifa', '2024-02-02', '2024-03-28', 'Template_RAPPORT_perfectionnement_ISETJ_DSI_FEV_2023.pdf', 'files/Template_RAPPORT_perfectionnement_ISETJ_DSI_FEV_2023.pdf'),
(7, 'ayadi haifa', '2024-02-02', '2024-03-28', 'Template_RAPPORT_perfectionnement_ISETJ_DSI_FEV_2023.pdf', 'files/Template_RAPPORT_perfectionnement_ISETJ_DSI_FEV_2023.pdf'),
(8, 'maram', '2020-02-02', '2020-05-01', 'chapitre6-activity.pdf', 'files/chapitre6-activity.pdf'),
(9, 'islem islem', '2020-02-01', '2020-09-23', 'cours2-1.pdf', 'files/cours2-1.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `stagiere`
--

CREATE TABLE `stagiere` (
  `id` int(8) NOT NULL,
  `NomPrenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `DateNaiss` date NOT NULL,
  `tel` int(10) NOT NULL,
  `etablissement` varchar(80) NOT NULL,
  `typeStage` varchar(60) NOT NULL,
  `message` varchar(100) NOT NULL,
  `statut` varchar(50) NOT NULL DEFAULT 'en cours'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stagiere`
--

INSERT INTO `stagiere` (`id`, `NomPrenom`, `mail`, `DateNaiss`, `tel`, `etablissement`, `typeStage`, `message`, `statut`) VALUES
(3, 'ayadi salem', 'aya.mohsni@gmail.fr', '2003-02-01', 12345678, 'iset', 'technicien', 'demande', 'accepter'),
(5, 'mohamed saleh', 'salah@gmail.com', '1999-05-01', 98943823, 'iset', 'initiation', 'xxxxx', 'en cours'),
(6, 'hadil ayadi', 'mariem@gmail.com', '2020-03-02', 12345678, 'fac jendouba', 'technicien', 'mpmpmp', 'refuser'),
(7, 'hadil ayadi', 'aya.mohsni@gmail.fr', '2012-02-01', 23150892, 'iset', 'PFE', 'azezza', 'accepter'),
(8, 'Mohsni aya', 'eyamohsni01@gmail.com', '2020-02-01', 28130580, 'iset', 'initiation', 'azzeee', 'refuser'),
(9, 'hadil mohsni', 'eyamohsni01@gmail.com', '2020-02-01', 23150659, 'iset', 'initiation', 'ooooo', 'accepter'),
(10, 'salma ayafi', 'eyamohsni01@gmail.com', '2000-02-01', 28130580, 'iset', 'PFE', 'je veux un stage', 'en cours');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_s`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id-R`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `stagiere`
--
ALTER TABLE `stagiere`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id_s` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id-R` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `stagiere`
--
ALTER TABLE `stagiere`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `c1` FOREIGN KEY (`id`) REFERENCES `stagiere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
