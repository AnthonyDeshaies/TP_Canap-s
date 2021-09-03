-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Août 2021 à 15:38
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `magasin`
--

-- --------------------------------------------------------

--
-- Structure de la table `canapes`
--

CREATE TABLE `canapes` (
  `idCanape` int(11) NOT NULL,
  `modele` varchar(155) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `matiere` varchar(50) DEFAULT NULL,
  `nbPlaces` int(11) DEFAULT NULL,
  `prix` decimal(15,2) DEFAULT NULL,
  `description` varchar(520) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `idCategorie` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `canapes`
--

INSERT INTO `canapes` (`idCanape`, `modele`, `couleur`, `matiere`, `nbPlaces`, `prix`, `description`, `img`, `idCategorie`) VALUES
(1, 'BROOKE', 'Vert Kaki', 'Tissus', 3, '490.90', 'Comment ne pas succomber au charme du canapé style scandinave 3 places vert kaki BROOKE ? Son dossier capitonné, son assise moelleuse et ses pieds obliques résolument rétro en font un meuble au style recherché et tendance. ', 'images/brooke.jpg', '1'),
(2, 'COLLINS', 'Gris clair', 'Tissus', 5, '699.90', 'Accueillez vos proches comme il se doit avec le canapé d\'angle 5 places COLLIN\'S. Avec ses coussins moelleux, il vous assure de longues heures de détente et de repos. Pratique, ce canapé d\'angle interchangeable se plie à toutes nos envies ! Il vous permettra ainsi d\'agencer votre espace salon à votre guise. On aime son look contemporain qui se marie parfaitement avec un intérieur design.', 'images/collins.jpg', '2'),
(3, 'DAKOTA', 'Gris anthracite', 'Tissus', 3, '199.90', 'Laissez-vous tenter par le design discret mais raffiné de la banquette convertible gris anthracite DAKOTA. Entre son assise capitonnée et ses pieds scandinaves, cette charmante banquette 2/3 places inspirera une décoration chic et tendance. Fonctionnelle, cette banquette se transformera en un clin d\'œil en lit 2 places.', 'images/dakota.jpg', '1'),
(4, 'ELVIS', 'vert', 'Velour', 3, '399.00', 'Craquez pour l\'élégance du canapé-lit 3 places en velours vert ELVIS. Ses lignes vintage sont soulignées par un piétement oblique en hêtre massif qui s\'inspire du mobilier scandinave. On apprécie son coloris vert, résolument tendance, associé à la douceur du velours. Son confort ferme vous offrira une bonne assise pour savourer vos moments de détente. Et prolongez ces instants grâce à ce canapé convertible qui se transformera en couchage d\'appoint. Style et praticité font bien la paire !', 'images/elvis.jpg', '1'),
(7, 'JULES', 'Gris taupe', 'Tissus', 3, '299.90', 'Amateurs de confort à prix mini, découvrez le canapé d\'angle 3 places gris taupe JULES. Ce canapé d\'angle en polyester gris vous offre une assise profonde et accueillante. La méridienne réversible vous permettra d\'agencer votre espace salon à votre guise. Ce canapé d\'angle moderne séduira le petits espaces avec ses proportions étudiées.', 'images/jules.jpg', '2'),
(8, 'NIA', 'Gris clair', 'Velour', 2, '359.90', 'De son coloris à son revêtement, la banquette convertible 2/3 places en velours vert clair NIA mise tout sur la douceur ! Dans un salon ou une chambre d\'ami aux teintes claires et apaisantes, cette banquette en velours fera l\'unanimité ! Besoin d\'un couchage supplémentaire pour garder un proche à dormir ? Cette banquette se transformera en lit d\'appoint avec un couchage d\'une épaisseur de 12 centimètres qui assurera de bonnes nuits de sommeil. Difficile de lui résister !', 'images/nia.jpg', '1'),
(9, 'NIO', 'Marron', 'cuir', 1, '199.90', 'Si vous recherchez un lit d\'appoint pour un intérieur au style indus, vous l\'avez maintenant trouvé avec la banquette convertible 1 place en suédine marron NIO ! Idéale pour un premier studio ou dans un bureau, cette banquette s\'adaptera sans encombre dans les petits espaces. Sa texture douce en suédine et son aspect moelleux apporteront le confort nécessaire pour s\'y installer en journée ou pour la nuit !', 'images/nio.jpg', '1'),
(10, 'BROADWAY', 'Vert d\'eau', 'Tissus', 3, '399.90', 'Les amateurs de mobilier fonctionnel et moderne seront comblés par le canapé-lit vert d’eau BROADWAY ! La teinte pop et rafraîchissante du revêtement en tissu de ce canapé clic-clac apportera une note vitaminée dans votre intérieur. Clic, clac ! En un claquement de doigt, allongez le dossier et votre canapé 3 places devient un couchage d’appoint plus que pratique. Rajoutez quelques notes acidulées à l\'aide de coussins colorés !', 'images/broadway.jpg', '1');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCategorie` int(11) NOT NULL,
  `genre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idCategorie`, `genre`) VALUES
(1, 'Canapé Droit'),
(2, 'Canapé d\'Angle'),
(3, '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) DEFAULT 'USER'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `pseudo`, `pass`, `mail`, `dateInscription`, `role`) VALUES
(1, 'joe', '$2y$10$9kacGXGItNrq2m/KdGyaU.xmYpkak89FeVqNmw8x4zXymqoHmCcUC', 'joe@hotmail.fr', '2021-08-20 09:41:53', 'USER'),
(2, 'Tom', '$2y$10$eTsPiQC4.mN9ijZoH9HRfuZQLY20Nw6cMqgDN2MUwnkPBay2FgFnu', 'Tom@hotmail.fr', '2021-08-23 14:43:00', 'USER');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `canapes`
--
ALTER TABLE `canapes`
  ADD PRIMARY KEY (`idCanape`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `canapes`
--
ALTER TABLE `canapes`
  MODIFY `idCanape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
