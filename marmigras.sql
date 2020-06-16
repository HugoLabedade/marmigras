-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 juin 2020 à 18:23
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `marmigras`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `mdp_admin` varchar(255) NOT NULL,
  `mail_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `username_admin`, `mdp_admin`, `mail_admin`) VALUES
(1, 'hugo', '$2y$10$AwNDtJzX7ANGPngnf7ts3.RTQ6Bv1lV/1sivJE.lm2PonrfLJSNt6', 'hugo@hugo.com');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `username_client` varchar(255) NOT NULL,
  `mail_client` varchar(255) NOT NULL,
  `imc` float NOT NULL,
  `mdp_client` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `username_client`, `mail_client`, `imc`, `mdp_client`) VALUES
(1, 'index2', 'index@index.com', 50, '$2y$10$.sJieaDbpT0FykthRdrULOSUCsLMm1udPJ1VTAj3SuIqULzqJKbP.'),
(2, 'test22', 'test2@test.com', 50, '$2y$10$dnX5M1lNPEvhks/dvmDZVu2shH5AakbwdT79/8YDDHSmUHCRMWEJC'),
(3, 'hugo', 'hugo.labedade@ynov.com', 4, '$2y$10$1zQst0JntQOZAxRpbaYsmuuSk/pXFy2TmCQO3YuxEuyYcN7Hv4woG'),
(4, 'vico', 'victor.garcia@gmail.com', 3, '$2y$10$IalArQntpoS8xH//9mMfSe0Y7bhyC7aS5WaUeDUIqW/pPbwH6rguy');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id_ingredient` int(11) NOT NULL,
  `id_recette` int(11) DEFAULT NULL,
  `ingredient` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id_ingredient`, `id_recette`, `ingredient`) VALUES
(180, 107, 'pate'),
(181, 107, 'sauce tomate'),
(182, 107, 'jambon'),
(183, 107, 'oignon'),
(184, 107, 'chorizo'),
(185, 107, 'fromage'),
(186, 108, 'galette'),
(187, 108, 'frite'),
(188, 108, 'sauce fromagere'),
(189, 108, 'cordon bleu'),
(190, 108, 'tenders'),
(191, 108, 'merguez'),
(192, 108, 'sauce algerienne'),
(193, 109, 'reblochon'),
(194, 109, 'pomme de terre'),
(195, 109, 'jambon'),
(196, 109, 'oignon'),
(197, 109, 'apermont'),
(198, 110, 'pain'),
(199, 110, 'steak haché'),
(200, 110, 'cheddar'),
(201, 110, 'bacon'),
(202, 110, 'oignon rouge'),
(203, 110, 'tomate'),
(204, 110, 'ketchup'),
(205, 110, 'mayonnaise'),
(206, 111, 'pain'),
(207, 111, 'salade'),
(208, 111, 'tomate'),
(209, 111, 'oignon'),
(210, 111, 'kebab'),
(211, 111, 'ketchup'),
(212, 111, 'sauce algerienne'),
(217, 113, 'poulet'),
(218, 113, 'miel'),
(219, 113, 'jus de citron'),
(220, 113, 'ail'),
(221, 113, 'piment');

-- --------------------------------------------------------

--
-- Structure de la table `recettes`
--

CREATE TABLE `recettes` (
  `id_recette` int(11) NOT NULL,
  `nom_recette` varchar(255) NOT NULL,
  `text_recette` varchar(2000) NOT NULL,
  `temps_recette` varchar(255) NOT NULL,
  `nb_personne` varchar(255) NOT NULL,
  `id_client` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recettes`
--

INSERT INTO `recettes` (`id_recette`, `nom_recette`, `text_recette`, `temps_recette`, `nb_personne`, `id_client`, `image`) VALUES
(107, 'Pizza', 'Étalez votre pâte à pizza dans une plaque.\r\nÉtalez de la sauce tomate sur toute la surface de la pâte.\r\nCoupez les deux tranches de jambon en deux. Disposez-les sur la sauce tomate.\r\nDéposez les oignons comme vous le voulez.\r\nDe même pour les olives', '30 minutes', '1 ou 2', 2, 'images/Pizza/Pizza.jpg'),
(108, 'Tacos 3 viandes', 'Faire préchauffer votre four à 200°C (thermostat 7).\r\nLaver et éplucher les pommes de terre.\r\nLes découper en fins bâtonnets afin d en faire des frites.\r\nDans une plaque de four tapissée de papier sulfurisé, disposer vos frites, les saler, les huiler et les faire cuire au four 40 minutes à 180°C.\r\nUne fois que tout est cuit et la sauce fromagère prête, disposer 2 tortillas en les faisant se chevaucher. Répartir la viande et les frites.\r\nAssaisonner vos tortillas avec la sauce et recouvrir de cuillères de sauce fromagère.\r\nPlier les tortillas en commençant par les longueurs puis replier par dessus les largeurs.\r\nPlacer le tout dans un grill chaud pendant 5 minutes.', '10 minutes', '1', 2, 'images/Tacos 3 viandes/Tacos 3 viandes.jpg'),
(109, 'Tartiflette', 'Faites cuire les pommes de terre avec leur peau. Épluchez-les et coupez-les en rondelles.\r\nÉmincez les oignons puis faites-les revenir avec un peu de beurre. Une fois dorés, y ajouter le jambon (ou les lardons), ainsi que les pommes de terre. Laissez mijoter 15 min.\r\nSi vous utilisez du vin blanc, c est le moment de l ajouter. Salez un peu, poivrez, laissez les pommes de terre s imprégner du vin blanc quelques minutes avant de transférer le tout dans un plat à gratin.\r\nGrattez au couteau les reblochons, coupez-les en 2 dans le sens de l épaisseur et posez les sur les pommes de terre.\r\nFaites cuire à four chaud (220°C) pendant 20 à 30 min. Servez avec une salade verte, voire quelques tomates, juste assaisonnées d un peu de vinaigre d échalote.', '50 min', '6', 2, 'images/Tartiflette/Tartiflette.jpg'),
(110, 'Burger bacon cheddar', 'Faites griller les tranches de bacon dans une poêle à sec sur feu moyen. Elles doivent être bien grillées.\r\n\r\n\r\nDébarrassez les tranches de bacon grillées de la poêle et réservez-les au chaud.\r\n\r\n\r\nPlacez les steaks hachés dans la poêle et faites-les quelques minutes de chaque côté jusqu à obtenir la cuisson souhaitée. Salez et poivrez.\r\n\r\n\r\nDébarrassez les steaks cuits de la poêle et réservez-les eux aussi au chaud.\r\n\r\n\r\nNettoyez et épongez la tomate. Coupez-la en fines rondelles.\r\n\r\n\r\nEpluchez et coupez aussi l oignon en rondelles.\r\n\r\n\r\nNettoyez et essorez les feuilles de salade.\r\n\r\n\r\nCoupez les pains à hamburger en deux.\r\n\r\n\r\nTartinez chaque face des pains de ketchup.\r\n\r\n\r\nSur les talons des pains, placez les feuilles de salade puis les rondelles de tomate, les steaks hachés cuits, les tranches de cheddar, les rondelles d oignon rouge et les tranches de bacon grillées.\r\n\r\n\r\nRefermez les burgers avec les couronnes des pains.\r\n\r\n\r\nDégustez aussitôt accompagné de frites faites maison.', '25 min', '4', 2, 'images/Burger bacon cheddar/Burger bacon cheddar.jpg'),
(111, 'Kebab', 'Ne dégraissez pas la viande.\r\n\r\nDétailler les oignons en lamelles. Faire revenir dans l huile d olive quelques minutes.\r\nCiseler les feuilles de laitue en lanières et couper les tomates en dés.\r\nCouper la viande kebab en fines lamelles et les faire cuire à feu vif pendant environ 5 minutes.\r\nRéchauffer les petits pains au four puis les couper en 2 sur un tiers de leur longueur.\r\nRépartir dans chaque pain : salade, tomates, oignons et viande.\r\nTerminer avec un mélange de ketchup et sauce algérienne \r\nServir immédiatement.', '10 min', '1', 2, 'images/Kebab/Kebab.jpg'),
(113, 'Chicken wings', 'Eplucher et hacher finement les gousses d ail.\r\nDans un bol, mélanger le miel, le jus de citron, l ail haché, le piment, le sel et le poivre.\r\nTremper les ailes de poulet dans la marinade puis les placer dans un plat allant au four. \r\nArroser les ailes de poulet avec la marinade restante.\r\nRéserver 2h au frais.\r\nEnfourner 30 minutes à four chaud à 220°C (thermostat 7). \r\nPendant la cuisson, arroser régulièrement les ailes de poulet avec la marinade.\r\nServir bien chaud et bien gras.', '2h45', '4', 2, 'images/Chicken wings/Chicken wings.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recommendations`
--

CREATE TABLE `recommendations` (
  `id_ingredient` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `ingredient` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recommendations`
--

INSERT INTO `recommendations` (`id_ingredient`, `id_client`, `ingredient`) VALUES
(2, 1, 'tacos'),
(3, 2, 'tacos'),
(4, 2, 'frites'),
(6, 1, 'kebab'),
(7, 1, 'huile'),
(8, 3, 'huile'),
(9, 3, 'kebab'),
(10, 3, 'frites'),
(11, 4, 'kebab');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id_ingredient`),
  ADD KEY `recettes_ingredient` (`id_recette`);

--
-- Index pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD PRIMARY KEY (`id_recette`),
  ADD KEY `foreign_1` (`id_client`);

--
-- Index pour la table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id_ingredient`),
  ADD KEY `recommendations_client` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT pour la table `recettes`
--
ALTER TABLE `recettes`
  MODIFY `id_recette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT pour la table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `recettes_ingredient` FOREIGN KEY (`id_recette`) REFERENCES `recettes` (`id_recette`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recettes`
--
ALTER TABLE `recettes`
  ADD CONSTRAINT `foreign_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);

--
-- Contraintes pour la table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
