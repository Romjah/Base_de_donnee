-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 18 jan. 2023 à 22:04
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Banque`
--

-- --------------------------------------------------------

--
-- Structure de la table `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `id_user` int(11) NOT NULL,
  `phone` int(10) NOT NULL,
  `monnaie` int(11) NOT NULL,
  `created _at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `currencies`
--

CREATE TABLE `currencies` (
  `id_monnaie` int(11) NOT NULL,
  `nom_monnaie` int(11) NOT NULL,
  `taux_change` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `deposits`
--

CREATE TABLE `deposits` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `date_depos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `monnaie` int(11) NOT NULL,
  `description_depot` text NOT NULL,
  `id_depo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rôles`
--

CREATE TABLE `rôles` (
  `id` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id_user` int(11) NOT NULL,
  `montant_depot` int(100) NOT NULL,
  `date_depos` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_retrait` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description_depot` text NOT NULL,
  `montant_retrait` int(100) NOT NULL,
  `id_transaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `created _at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade` int(11) NOT NULL DEFAULT 0,
  `id_transaction` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `monnaie` int(11) NOT NULL,
  `date_retrait` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant_retrait` int(100) NOT NULL,
  `id_retrait` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `monnaie` (`monnaie`);

--
-- Index pour la table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id_monnaie`);

--
-- Index pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id_depo`),
  ADD KEY `monnaie` (`monnaie`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `rôles`
--
ALTER TABLE `rôles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `date_retrait` (`date_retrait`),
  ADD KEY `date_depos` (`date_depos`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_transaction` (`id_transaction`),
  ADD KEY `role` (`role`);

--
-- Index pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id_retrait`),
  ADD KEY `monnaie` (`monnaie`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rôles`
--
ALTER TABLE `rôles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD CONSTRAINT `bankaccounts_ibfk_2` FOREIGN KEY (`monnaie`) REFERENCES `currencies` (`id_monnaie`),
  ADD CONSTRAINT `bankaccounts_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_ibfk_1` FOREIGN KEY (`monnaie`) REFERENCES `currencies` (`id_monnaie`),
  ADD CONSTRAINT `deposits_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `rôles` (`id`),
  ADD CONSTRAINT `deposits_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_transaction`) REFERENCES `transactions` (`id_transaction`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`role`) REFERENCES `rôles` (`id`);

--
-- Contraintes pour la table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`monnaie`) REFERENCES `currencies` (`id_monnaie`),
  ADD CONSTRAINT `withdrawals_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `rôles` (`id`),
  ADD CONSTRAINT `withdrawals_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
