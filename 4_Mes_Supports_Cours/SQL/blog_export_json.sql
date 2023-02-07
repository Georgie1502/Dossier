-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 07 fév. 2023 à 16:42
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

DELIMITER $$
--
-- Fonctions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `limited_art` (`ofs` INTEGER) RETURNS LONGTEXT CHARSET utf8mb4 COLLATE utf8mb4_bin  BEGIN
SELECT id_art, nom_art INTO @id, @nom FROM article LIMIT 10, ofs;
set @tab = CONCAT("[",@id, @nom,"]");
RETURN @tab;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `ajouter`
--

CREATE TABLE `ajouter` (
  `id_util` int(11) NOT NULL,
  `id_art` int(11) NOT NULL,
  `com` varchar(255) DEFAULT NULL,
  `date_com` datetime NOT NULL,
  `validate_com` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ajouter`
--

INSERT INTO `ajouter` (`id_util`, `id_art`, `com`, `date_com`, `validate_com`) VALUES
(10, 20, 'super articlehiuguug', '2022-09-23 15:04:00', NULL),
(10, 20, 'super article', '2022-09-23 15:05:00', NULL),
(10, 20, 'test objet et manager', '2022-09-27 16:19:00', NULL),
(10, 20, 'super article', '2022-09-29 00:00:00', NULL),
(10, 20, 'super article', '2022-09-29 15:04:00', NULL),
(10, 20, 'super article', '2022-09-30 00:00:00', NULL),
(10, 21, 'test version objet', '2022-09-27 16:18:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_art` int(11) NOT NULL,
  `nom_art` varchar(50) NOT NULL,
  `contenu_art` text NOT NULL,
  `date_art` date NOT NULL,
  `img_art` varchar(100) DEFAULT NULL,
  `validate_art` tinyint(1) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_util` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_art`, `nom_art`, `contenu_art`, `date_art`, `img_art`, `validate_art`, `id_cat`, `id_util`) VALUES
(20, 'dfajhfho', 'fgqdgmnkm', '2022-09-08', 'test.jpg', 1, 2, 14),
(21, 'dh', 'hgfgh', '2022-09-08', 'test2.jpg', 1, 3, 14),
(22, 'test', 'test', '2022-12-15', 'test4.jpg', 1, 3, 14),
(23, 'add', 'add', '2022-11-11', 'test6.jpg', 1, 2, 14),
(24, 'add2', 'add2', '2022-11-14', 'test7.jpg', 1, 2, 14);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_cat`, `nom_cat`) VALUES
(1, 'new'),
(2, 'sport'),
(3, 'actu'),
(4, 'politique'),
(5, 'cuisine'),
(6, 'informatique'),
(7, 'tech'),
(8, 'cat'),
(9, 'Testing'),
(11, 'news');

-- --------------------------------------------------------

--
-- Structure de la table `codeauto`
--

CREATE TABLE `codeauto` (
  `id_codeauto` int(11) NOT NULL,
  `valeur_codeauto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `codeauto`
--

INSERT INTO `codeauto` (`id_codeauto`, `valeur_codeauto`) VALUES
(1, 1011),
(2, 2033),
(3, 4032);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nom_role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nom_role`) VALUES
(1, 'utilisateur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_util` int(11) NOT NULL,
  `nom_util` varchar(50) NOT NULL,
  `prenom_util` varchar(50) NOT NULL,
  `mail_util` varchar(50) NOT NULL,
  `password_util` varchar(100) NOT NULL,
  `img_util` varchar(100) DEFAULT NULL,
  `validate_util` tinyint(1) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_util`, `nom_util`, `prenom_util`, `mail_util`, `password_util`, `img_util`, `validate_util`, `id_role`) VALUES
(14, 'Mithridate', 'Mathieu', 'mathieu.mith@laposte.net', '$2y$10$fc7bBSkg7cTq4h8n4097z.MBsIV5neA8i4lixQOurMSIOBwU.0ugK', './asset/image/5bhbxd.png', 1, 1),
(16, 'Mithridate', 'Mathieu', 'mathieu@adrardev.fr', '$2y$10$8QlVa/8RtMnGNF//grwfPeuHDZbfexJyu0M57GzAlg/Yf5C9NZFv2', './asset/image/defaut.png', 1, NULL);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `_vwliste_article`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `_vwliste_article` (
`titre` varchar(50)
,`contenu` text
,`date_creation` date
,`image` varchar(100)
,`categorie` varchar(50)
,`nom` varchar(50)
,`prenom` varchar(50)
,`statut` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `_vwliste_article3`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `_vwliste_article3` (
`titre` varchar(50)
,`contenu` text
,`date_creation` date
,`image` varchar(100)
,`categorie` varchar(50)
,`nom` varchar(50)
,`prenom` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `_vwliste_article4`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `_vwliste_article4` (
`titre` varchar(50)
,`contenu` text
,`date_creation` date
,`image` varchar(100)
,`categorie` varchar(50)
,`nom` varchar(50)
,`prenom` varchar(50)
,`statut` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `_vwliste_article5`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `_vwliste_article5` (
`titre` varchar(50)
,`contenu` text
,`date_creation` date
,`image` varchar(100)
,`categorie` varchar(50)
,`nom` varchar(50)
,`prenom` varchar(50)
,`statut` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la vue `_vwliste_article`
--
DROP TABLE IF EXISTS `_vwliste_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_vwliste_article`  AS SELECT `article`.`nom_art` AS `titre`, `article`.`contenu_art` AS `contenu`, `article`.`date_art` AS `date_creation`, `article`.`img_art` AS `image`, `categorie`.`nom_cat` AS `categorie`, `utilisateur`.`nom_util` AS `nom`, `utilisateur`.`prenom_util` AS `prenom`, `role`.`nom_role` AS `statut` FROM (((`article` join `categorie` on(`article`.`id_cat` = `categorie`.`id_cat`)) join `utilisateur` on(`article`.`id_util` = `utilisateur`.`id_util`)) join `role` on(`utilisateur`.`id_role` = `role`.`id_role`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `_vwliste_article3`
--
DROP TABLE IF EXISTS `_vwliste_article3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_vwliste_article3`  AS SELECT `article`.`nom_art` AS `titre`, `article`.`contenu_art` AS `contenu`, `article`.`date_art` AS `date_creation`, `article`.`img_art` AS `image`, `categorie`.`nom_cat` AS `categorie`, `utilisateur`.`nom_util` AS `nom`, `utilisateur`.`prenom_util` AS `prenom` FROM ((`article` join `categorie` on(`article`.`id_cat` = `categorie`.`id_cat`)) join `utilisateur` on(`article`.`id_util` = `utilisateur`.`id_util`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `_vwliste_article4`
--
DROP TABLE IF EXISTS `_vwliste_article4`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_vwliste_article4`  AS SELECT `article`.`nom_art` AS `titre`, `article`.`contenu_art` AS `contenu`, `article`.`date_art` AS `date_creation`, `article`.`img_art` AS `image`, `categorie`.`nom_cat` AS `categorie`, `utilisateur`.`nom_util` AS `nom`, `utilisateur`.`prenom_util` AS `prenom`, `role`.`nom_role` AS `statut` FROM (((`article` join `categorie` on(`article`.`id_cat` = `categorie`.`id_cat`)) join `utilisateur` on(`article`.`id_util` = `utilisateur`.`id_util`)) join `role` on(`role`.`id_role` = `utilisateur`.`id_role`))  ;

-- --------------------------------------------------------

--
-- Structure de la vue `_vwliste_article5`
--
DROP TABLE IF EXISTS `_vwliste_article5`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_vwliste_article5`  AS SELECT `article`.`nom_art` AS `titre`, `article`.`contenu_art` AS `contenu`, `article`.`date_art` AS `date_creation`, `article`.`img_art` AS `image`, `categorie`.`nom_cat` AS `categorie`, `utilisateur`.`nom_util` AS `nom`, `utilisateur`.`prenom_util` AS `prenom`, `role`.`nom_role` AS `statut` FROM (((`article` join `categorie` on(`article`.`id_cat` = `categorie`.`id_cat`)) join `utilisateur` on(`article`.`id_util` = `utilisateur`.`id_util`)) join `role` on(`role`.`id_role` = `utilisateur`.`id_role`))  ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajouter`
--
ALTER TABLE `ajouter`
  ADD PRIMARY KEY (`id_util`,`id_art`,`date_com`),
  ADD KEY `fk_ajouter_article` (`id_art`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `fk_ecrire_utilisateur` (`id_util`),
  ADD KEY `fk_completer_categorie` (`id_cat`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `codeauto`
--
ALTER TABLE `codeauto`
  ADD PRIMARY KEY (`id_codeauto`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_util`),
  ADD KEY `fk_posseder_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `codeauto`
--
ALTER TABLE `codeauto`
  MODIFY `id_codeauto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_util` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajouter`
--
ALTER TABLE `ajouter`
  ADD CONSTRAINT `fk_ajouter_article` FOREIGN KEY (`id_art`) REFERENCES `article` (`id_art`),
  ADD CONSTRAINT `fk_ajouter_utilisateur` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_completer_categorie` FOREIGN KEY (`id_cat`) REFERENCES `categorie` (`id_cat`),
  ADD CONSTRAINT `fk_ecrire_utilisateur` FOREIGN KEY (`id_util`) REFERENCES `utilisateur` (`id_util`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_posseder_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
