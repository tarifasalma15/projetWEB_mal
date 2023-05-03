-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 28 avr. 2020 à 20:01
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP : 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet4_pizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `cid` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `statut` enum('preparation','livraison','terminee','') NOT NULL DEFAULT 'preparation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`cid`, `ref`, `uid`, `rid`, `date`, `statut`) VALUES
(1, 'AZ17YT', 2, 1, '2017-05-01 11:48:00', 'terminee'),
(2, 'I7GTL4', 2, 4, '2017-04-25 18:15:00', 'livraison'),
(3, 'YT65RQ', 4, 2, '2017-05-02 13:00:00', 'preparation'),
(4, 'YHGT5', 3, 3, '2017-05-16 14:28:00', 'livraison'),
(5, 'QW34BN', 5, 1, '2017-05-09 12:00:00', 'preparation'),
(6, 'SFGFZD', 29, 1, '2020-04-01 22:14:49', 'preparation'),
(7, '87F858', 15, 1, '2020-04-14 22:50:02', 'preparation'),
(288, '966912', 15, 1, '2020-04-21 20:53:30', 'preparation'),
(289, 'AD3715', 15, 4, '2020-04-23 01:17:29', 'preparation'),
(297, '4B00AD', 15, 1, '2020-04-27 13:07:28', 'preparation'),
(298, '01C1F4', 30, 1, '2020-04-28 18:23:45', 'preparation');

-- --------------------------------------------------------

--
-- Structure de la table `extras`
--

CREATE TABLE `extras` (
  `cid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `extras`
--

INSERT INTO `extras` (`cid`, `sid`) VALUES
(298, 1),
(289, 2),
(3, 4),
(5, 4),
(298, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `rid` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`rid`, `nom`, `prix`) VALUES
(1, ' Margherita', 8.5),
(2, 'Regina', 10.5),
(3, 'Napoletana', 11.5),
(4, '4 stagioni', 11.5),
(27, 'Mario pizza', 100),
(29, 'Alert(\'test\')', 42);

-- --------------------------------------------------------

--
-- Structure de la table `supplements`
--

CREATE TABLE `supplements` (
  `sid` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `supplements`
--

INSERT INTO `supplements` (`sid`, `nom`, `prix`) VALUES
(1, 'Fromage', 0.5),
(2, 'Thon', 0.75),
(4, 'Boisson', 2),
(5, 'Frites', 2.5),
(7, 'Viande hachée', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`uid`, `nom`, `prenom`, `login`, `mdp`, `role`) VALUES
(1, 'Admin', 'User', 'admin', '$2y$10$WUXmfWOTO3gf.QIwxuHH0ecG51cmEsgW5YmHbQaAHcYL6wV11GgOm', 'admin'),
(2, 'Test', 'User', 'test', '$2y$10$rwE2jgPjPrw1i8DBi5xgY.aZuqV..6w9ZEFQmiYAy1G3slnJpKFVy', 'user'),
(3, 'Dupont', 'Jean', 'jean', '$2y$10$uCA3FR6xf6b1SvEXedZ3ju5/qae4wQvIaRN6LnrbVwml1bta.6Gbm', 'user'),
(4, 'Monin', 'Michel', 'michel', '$2y$10$BwrkqA3/Snps08LSYwttyOPUGp/8eaGDslq9Zv3aoDUEFqjtM7QmW', 'user'),
(5, NULL, NULL, 'anne', '$2y$10$Y7YSA5gcMB/It.Azzz.SBumneYSwOInCSUI9.JPdneltcNH3UC2JC', 'user'),
(15, 'admin', 'admin', 'admin2', '$2y$10$DNcicFCMIw14dzgQyIU9gujFxt2H420pS8UoyKbsltvJFRkGRMSVO', 'admin'),
(23, '<script>alert(\'X\')</script>', '<script>alert(\'X\')</script>', 'sql', '$2y$10$J9ebfYLrA6240pM78t/NX.Z0GIOEsrh/PS1SwBHBWDsw4ae8SgHai', 'user'),
(29, 'test', 'regex', 'regex', '$2y$10$qfwfbPFLIV4SElK89HUu8O/6BeUYPduxJvjgZOB899E03IrciwMra', 'user'),
(30, 'test', 'test', 'testt', '$2y$10$DNcicFCMIw14dzgQyIU9gujFxt2H420pS8UoyKbsltvJFRkGRMSVO', 'user'),
(39, '<script>alert(\'X\')</script>', '<script>alert(\'X\')</script>', 'injection', '$2y$10$cR7bvG9EpMMWXDAfCcxwmuvELyR/WqGXFKEkwGl9u6IjyrmRm54zu', 'user'),
(40, 'alert(\'X\')', 'alert(\'X\')', 'injection2', '$2y$10$fYuyw/lL2LByHNOwToX.lu5Ud1RxIudqW365NXHosQOco7HM8xOdy', 'user'),
(42, 'alert(\"XSS\")', 'alert(\"XSS\")', 'injection3', '$2y$10$phWOJLLViCxCe01laW/BWuLhQXTr/ltO9Lk92Nyy4ZQubN63sRuUS', 'user'),
(43, '&lt;script&gt;alert(&quot;X', 'alert(\"X)', 'injection4', '$2y$10$AGMpBJ7vTYsyr5qzpWoQkeg1ht1iiaFPdNMYBl5ZotCzQgOTql8Ga', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `rid` (`rid`);

--
-- Index pour la table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`cid`,`sid`),
  ADD KEY `sid` (`sid`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`rid`);

--
-- Index pour la table `supplements`
--
ALTER TABLE `supplements`
  ADD PRIMARY KEY (`sid`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `supplements`
--
ALTER TABLE `supplements`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `recettes` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `extras`
--
ALTER TABLE `extras`
  ADD CONSTRAINT `extras_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `supplements` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `extras_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `commandes` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
