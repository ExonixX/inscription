-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 24 Mars 2017 à 10:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inscription_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `AGNTID` smallint(11) NOT NULL,
  `CMPTNUM` int(11) NOT NULL,
  `AGNTNOM` char(32) DEFAULT NULL,
  `AGNTPRENOM` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `RPSLID` smallint(5) NOT NULL,
  `EDNTID` smallint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `CATGID` int(11) NOT NULL,
  `CATGLIBELLE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CATGID`, `CATGLIBELLE`) VALUES
(1, 'Agriculteurs'),
(2, 'Artisans,Commerçant'),
(3, 'Cadres , Profession Supérieurs'),
(4, 'Professions Intermédiaires'),
(5, 'Employés'),
(6, 'Ouvriers'),
(7, 'Retraites'),
(8, 'Autres Inactifs');

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE `composer` (
  `FRMTID` smallint(2) NOT NULL,
  `NTPCID` smallint(2) NOT NULL,
  `CMPRNUMRANG` smallint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `CMPTNUM` int(11) NOT NULL,
  `CMPTLOGIN` char(32) DEFAULT NULL,
  `CMPTPASSWORD` char(32) DEFAULT NULL,
  `TCMPNUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`CMPTNUM`, `CMPTLOGIN`, `CMPTPASSWORD`, `TCMPNUM`) VALUES
(1, 'julien', '12345', 1),
(2, 'jimmy', '12345', 2),
(3, 'loan', '12345', 1);

-- --------------------------------------------------------

--
-- Structure de la table `deposer`
--

CREATE TABLE `deposer` (
  `EDNTID` smallint(4) NOT NULL,
  `PIDEID` int(11) NOT NULL,
  `DPSRDATEDEPOT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `EDNTID` smallint(4) NOT NULL,
  `EDNTNOMETU` char(32) DEFAULT NULL,
  `EDNTPRENOMETU` char(32) DEFAULT NULL,
  `EDNTINEBEA` char(10) DEFAULT NULL,
  `EDNTSEXE` char(5) DEFAULT NULL,
  `EDNTDATENAISS` char(10) DEFAULT NULL,
  `EDNTLIEUNAISS` char(32) DEFAULT NULL,
  `EDNTCPNAISS` char(5) DEFAULT NULL,
  `EDNTPAYSNAISS` char(32) DEFAULT NULL,
  `EDNTTEL` char(10) DEFAULT NULL,
  `EDNTMAIL` char(64) DEFAULT NULL,
  `EDNTBOURSIER` char(3) DEFAULT NULL,
  `EDNTCYCLE` char(16) DEFAULT NULL,
  `EDNTADRESSETU` char(128) DEFAULT NULL,
  `EDNTCPADRESSETU` char(5) DEFAULT NULL,
  `EDNTVILLEADRESSETU` char(32) DEFAULT NULL,
  `CMPTNUM` int(11) NOT NULL,
  `FRMTID` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `FRMTID` smallint(2) NOT NULL,
  `FRMTNOM` char(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`FRMTID`, `FRMTNOM`) VALUES
(1, 'Adaptation Technicien Supérieur (après BTS ou DUT)'),
(2, 'BTS Conception de Produits Industriels'),
(3, 'BTS Comptabilité et gestion'),
(4, 'BTS Electrotechnique'),
(5, 'BTS Métiers du Géomètre-Topographe et de la Modélisation Numérique'),
(6, 'BTS Maintenance des systèmes - option A Systèmes de production'),
(7, 'BTS Management des Unités Commerciales'),
(8, 'BTS Négociation et Relation Client'),
(9, 'BTS Services Informatiques aux Organisations'),
(10, 'DCG (Diplôme de Comptabilité et de Gestion)'),
(11, 'DCG (2ème année après BTS ou DUT)'),
(12, 'Classe préparatoire économique et commerciale (ENS Rennes D1)'),
(13, 'Classe préparatoire économique et commerciale (ENS Cachan D2)'),
(14, 'Classe préparatoire scientifique (PCSI)'),
(15, 'Classe préparatoire scientifique (PTSI)');

-- --------------------------------------------------------

--
-- Structure de la table `nature_piece`
--

CREATE TABLE `nature_piece` (
  `NTPCID` smallint(2) NOT NULL,
  `NTPCINTITULE` char(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nature_piece`
--

INSERT INTO `nature_piece` (`NTPCID`, `NTPCINTITULE`) VALUES
(3, 'Carte D\'identité');

-- --------------------------------------------------------

--
-- Structure de la table `piece_depose`
--

CREATE TABLE `piece_depose` (
  `PIDEID` int(11) NOT NULL,
  `PIDENOMFICHIER` char(32) DEFAULT NULL,
  `PIDEVALIDEE` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE `profession` (
  `PFSNID` int(11) NOT NULL,
  `PFSNLIBELLE` char(250) DEFAULT NULL,
  `CATGID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `profession`
--

INSERT INTO `profession` (`PFSNID`, `PFSNLIBELLE`, `CATGID`) VALUES
(1, 'Agriculteurs', 1),
(2, 'Chefs D\'Entreprises ( 10 + )', 2),
(3, 'Commerçant et assimilés', 2),
(4, 'Artisans', 2),
(5, 'Profession Libérales', 3),
(6, 'Cadres de la fonction publique', 3),
(9, 'Professeurs et assimilés', 3),
(10, 'Profession de l\'information des arts et du spectacle', 3),
(11, 'Cadres administratifs et commerciaux d\'entreprise', 3),
(12, 'Ingénieurs et cadres techniques d\'entrprise', 3),
(13, 'Instituteurs et assimilé', 4),
(14, 'Professions intermédiaire de la santé et du travail social', 4),
(15, 'Clergé , Religieux', 4),
(16, 'Professions intermédiaires administrative de la fonction publique', 4),
(17, 'Professions intermédiaires adminsitratives et commerciale des entreprises', 4),
(18, 'Techniciens', 4),
(19, 'Contremaîtres , agents de maîtise', 4),
(20, 'Employés civils et agents de services de la fonction publique', 5),
(21, 'Policiers et Militaires', 5),
(22, 'Employés administratifs d\'entreprise', 5),
(23, 'Employés de commerce', 5),
(24, 'Personnels des services directs au particuliers', 5),
(25, 'Ouvriers Qualifiés', 6),
(26, 'Ouvriers Non Qualifiés', 6),
(27, 'Ouvriers Agricoles', 6),
(28, 'Retraité Agricoles Exploitants', 7),
(29, 'Retraités artisans,commerciaux et chefs d\'entrprise', 7),
(30, 'Retraités cadres et profession intermédiaires', 7),
(31, 'Retraités Ouvriers et Employés', 7),
(32, 'Chômeurs n\'ayant jamais travaillé', 8),
(33, 'Personnes sans activité professionnelle', 8);

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE `responsable` (
  `RPSLID` smallint(5) NOT NULL,
  `RPSLNOMRESP` char(32) DEFAULT NULL,
  `RPSLPRENOMRESP` char(32) DEFAULT NULL,
  `RPSLLIENPARENTE` char(16) DEFAULT NULL,
  `RPSLADRESSRESP` char(64) DEFAULT NULL,
  `RPSLCPADRESSRESP` char(5) DEFAULT NULL,
  `RPSLVILLEADRESSRESP` char(32) DEFAULT NULL,
  `RPSLPAYSADRESSRESP` char(32) DEFAULT NULL,
  `RPSLTELRESP` char(10) DEFAULT NULL,
  `RPSLFIXRESP` char(10) DEFAULT NULL,
  `RPSLMAILRESP` char(64) DEFAULT NULL,
  `RPSLLEGAL` char(3) DEFAULT NULL,
  `RPSLNBENFSCOLARISES` char(3) DEFAULT NULL,
  `RPSLNBTOTENFANTS` char(3) DEFAULT NULL,
  `PFSNID` int(11) NOT NULL,
  `STEPID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `situation_emploi`
--

CREATE TABLE `situation_emploi` (
  `STEPID` int(11) NOT NULL,
  `STEPLIBELLE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `situation_emploi`
--

INSERT INTO `situation_emploi` (`STEPID`, `STEPLIBELLE`) VALUES
(1, 'Occupe Un Emploi'),
(2, 'Au Chômage'),
(3, 'Préretraite , Retraire'),
(4, 'Autre Situation');

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

CREATE TABLE `typecompte` (
  `TCMPNUM` int(11) NOT NULL,
  `TCMPLIBELLE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typecompte`
--

INSERT INTO `typecompte` (`TCMPNUM`, `TCMPLIBELLE`) VALUES
(1, 'Etudiant'),
(2, 'Agent');

-- --------------------------------------------------------

--
-- Structure de la table `verifier`
--

CREATE TABLE `verifier` (
  `PIDEID` int(11) NOT NULL,
  `AGNTID` smallint(11) NOT NULL,
  `VRFEDATECONTROLE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`AGNTID`),
  ADD KEY `I_FK_AGENT_COMPTE` (`CMPTNUM`);

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`RPSLID`,`EDNTID`),
  ADD KEY `I_FK_APPARTENIR_RESPONSABLE` (`RPSLID`),
  ADD KEY `I_FK_APPARTENIR_ETUDIANT` (`EDNTID`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`CATGID`);

--
-- Index pour la table `composer`
--
ALTER TABLE `composer`
  ADD PRIMARY KEY (`FRMTID`,`NTPCID`),
  ADD KEY `I_FK_COMPOSER_FORMATION` (`FRMTID`),
  ADD KEY `I_FK_COMPOSER_NATURE_PIECE` (`NTPCID`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`CMPTNUM`),
  ADD KEY `I_FK_COMPTE_TYPECOMPTE` (`TCMPNUM`);

--
-- Index pour la table `deposer`
--
ALTER TABLE `deposer`
  ADD PRIMARY KEY (`EDNTID`,`PIDEID`),
  ADD KEY `I_FK_DEPOSER_ETUDIANT` (`EDNTID`),
  ADD KEY `I_FK_DEPOSER_PIECE_DEPOSE` (`PIDEID`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`EDNTID`),
  ADD KEY `I_FK_ETUDIANT_COMPTE` (`CMPTNUM`),
  ADD KEY `I_FK_ETUDIANT_FORMATION` (`FRMTID`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`FRMTID`);

--
-- Index pour la table `nature_piece`
--
ALTER TABLE `nature_piece`
  ADD PRIMARY KEY (`NTPCID`);

--
-- Index pour la table `piece_depose`
--
ALTER TABLE `piece_depose`
  ADD PRIMARY KEY (`PIDEID`);

--
-- Index pour la table `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`PFSNID`),
  ADD KEY `I_FK_PROFESSION_CATEGORIE` (`CATGID`);

--
-- Index pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`RPSLID`),
  ADD KEY `I_FK_RESPONSABLE_PROFESSION` (`PFSNID`),
  ADD KEY `I_FK_RESPONSABLE_SITUATION_EMPLOI` (`STEPID`);

--
-- Index pour la table `situation_emploi`
--
ALTER TABLE `situation_emploi`
  ADD PRIMARY KEY (`STEPID`);

--
-- Index pour la table `typecompte`
--
ALTER TABLE `typecompte`
  ADD PRIMARY KEY (`TCMPNUM`);

--
-- Index pour la table `verifier`
--
ALTER TABLE `verifier`
  ADD PRIMARY KEY (`PIDEID`,`AGNTID`),
  ADD KEY `I_FK_VERIFIER_PIECE_DEPOSE` (`PIDEID`),
  ADD KEY `I_FK_VERIFIER_AGENT` (`AGNTID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agent`
--
ALTER TABLE `agent`
  MODIFY `AGNTID` smallint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `appartenir`
--
ALTER TABLE `appartenir`
  MODIFY `RPSLID` smallint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `CATGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `composer`
--
ALTER TABLE `composer`
  MODIFY `FRMTID` smallint(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `CMPTNUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `deposer`
--
ALTER TABLE `deposer`
  MODIFY `EDNTID` smallint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `EDNTID` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `FRMTID` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `nature_piece`
--
ALTER TABLE `nature_piece`
  MODIFY `NTPCID` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `piece_depose`
--
ALTER TABLE `piece_depose`
  MODIFY `PIDEID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `profession`
--
ALTER TABLE `profession`
  MODIFY `PFSNID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `RPSLID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `situation_emploi`
--
ALTER TABLE `situation_emploi`
  MODIFY `STEPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `typecompte`
--
ALTER TABLE `typecompte`
  MODIFY `TCMPNUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `verifier`
--
ALTER TABLE `verifier`
  MODIFY `PIDEID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`CMPTNUM`) REFERENCES `compte` (`CMPTNUM`);

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`RPSLID`) REFERENCES `responsable` (`RPSLID`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`EDNTID`) REFERENCES `etudiant` (`EDNTID`);

--
-- Contraintes pour la table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `composer_ibfk_1` FOREIGN KEY (`FRMTID`) REFERENCES `formation` (`FRMTID`),
  ADD CONSTRAINT `composer_ibfk_2` FOREIGN KEY (`NTPCID`) REFERENCES `nature_piece` (`NTPCID`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`TCMPNUM`) REFERENCES `typecompte` (`TCMPNUM`);

--
-- Contraintes pour la table `deposer`
--
ALTER TABLE `deposer`
  ADD CONSTRAINT `deposer_ibfk_1` FOREIGN KEY (`EDNTID`) REFERENCES `etudiant` (`EDNTID`),
  ADD CONSTRAINT `deposer_ibfk_2` FOREIGN KEY (`PIDEID`) REFERENCES `piece_depose` (`PIDEID`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`CMPTNUM`) REFERENCES `compte` (`CMPTNUM`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`FRMTID`) REFERENCES `formation` (`FRMTID`);

--
-- Contraintes pour la table `profession`
--
ALTER TABLE `profession`
  ADD CONSTRAINT `profession_ibfk_1` FOREIGN KEY (`CATGID`) REFERENCES `categorie` (`CATGID`);

--
-- Contraintes pour la table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `responsable_ibfk_1` FOREIGN KEY (`PFSNID`) REFERENCES `profession` (`PFSNID`),
  ADD CONSTRAINT `responsable_ibfk_2` FOREIGN KEY (`STEPID`) REFERENCES `situation_emploi` (`STEPID`);

--
-- Contraintes pour la table `verifier`
--
ALTER TABLE `verifier`
  ADD CONSTRAINT `verifier_ibfk_1` FOREIGN KEY (`PIDEID`) REFERENCES `piece_depose` (`PIDEID`),
  ADD CONSTRAINT `verifier_ibfk_2` FOREIGN KEY (`AGNTID`) REFERENCES `agent` (`AGNTID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
