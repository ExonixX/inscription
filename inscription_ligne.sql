-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Mai 2017 à 10:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `inscription_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `AGNTID` smallint(11) NOT NULL AUTO_INCREMENT,
  `CMPTNUM` int(11) NOT NULL,
  `AGNTNOM` char(32) DEFAULT NULL,
  `AGNTPRENOM` char(32) DEFAULT NULL,
  PRIMARY KEY (`AGNTID`),
  KEY `I_FK_AGENT_COMPTE` (`CMPTNUM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE IF NOT EXISTS `appartenir` (
  `RPSLID` smallint(5) NOT NULL AUTO_INCREMENT,
  `EDNTID` smallint(4) NOT NULL,
  PRIMARY KEY (`RPSLID`,`EDNTID`),
  KEY `I_FK_APPARTENIR_RESPONSABLE` (`RPSLID`),
  KEY `I_FK_APPARTENIR_ETUDIANT` (`EDNTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `CATGID` int(11) NOT NULL AUTO_INCREMENT,
  `CATGLIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CATGID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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

CREATE TABLE IF NOT EXISTS `composer` (
  `FRMTID` smallint(2) NOT NULL AUTO_INCREMENT,
  `NTPCID` smallint(2) NOT NULL,
  `CMPRNUMRANG` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`FRMTID`,`NTPCID`),
  KEY `I_FK_COMPOSER_FORMATION` (`FRMTID`),
  KEY `I_FK_COMPOSER_NATURE_PIECE` (`NTPCID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `CMPTNUM` int(11) NOT NULL AUTO_INCREMENT,
  `TCMPNUM` int(11) NOT NULL,
  `CMPTLOGIN` char(32) DEFAULT NULL,
  `CMPTPASSWORD` char(32) DEFAULT NULL,
  PRIMARY KEY (`CMPTNUM`),
  KEY `I_FK_COMPTE_TYPECOMPTE` (`TCMPNUM`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`CMPTNUM`, `TCMPNUM`, `CMPTLOGIN`, `CMPTPASSWORD`) VALUES
(1, 1, 'julien', '12345'),
(2, 2, 'jimmy', '12345'),
(3, 1, 'loan', '12345');

-- --------------------------------------------------------

--
-- Structure de la table `deposer`
--

CREATE TABLE IF NOT EXISTS `deposer` (
  `EDNTID` smallint(4) NOT NULL AUTO_INCREMENT,
  `PIDEID` int(11) NOT NULL,
  `DPSRDATEDEPOT` date DEFAULT NULL,
  PRIMARY KEY (`EDNTID`,`PIDEID`),
  KEY `I_FK_DEPOSER_ETUDIANT` (`EDNTID`),
  KEY `I_FK_DEPOSER_PIECE_DEPOSE` (`PIDEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `EDNTID` smallint(4) NOT NULL AUTO_INCREMENT,
  `CMPTNUM` int(11) NOT NULL,
  `FRMTID` smallint(2) NOT NULL,
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
  `EDNTBOURSIER` tinyint(1) DEFAULT NULL,
  `EDNTCYCLE` char(16) DEFAULT NULL,
  `EDNTADRESSETU` char(128) DEFAULT NULL,
  `EDNTCPADRESSETU` char(5) DEFAULT NULL,
  `EDNTVILLEADRESSETU` char(32) DEFAULT NULL,
  PRIMARY KEY (`EDNTID`),
  KEY `I_FK_ETUDIANT_COMPTE` (`CMPTNUM`),
  KEY `I_FK_ETUDIANT_FORMATION` (`FRMTID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`EDNTID`, `CMPTNUM`, `FRMTID`, `EDNTNOMETU`, `EDNTPRENOMETU`, `EDNTINEBEA`, `EDNTSEXE`, `EDNTDATENAISS`, `EDNTLIEUNAISS`, `EDNTCPNAISS`, `EDNTPAYSNAISS`, `EDNTTEL`, `EDNTMAIL`, `EDNTBOURSIER`, `EDNTCYCLE`, `EDNTADRESSETU`, `EDNTCPADRESSETU`, `EDNTVILLEADRESSETU`) VALUES
(1, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '1111111111', 'lille', '59000', 'FRANCE', '0000000000', 'jimmy@gmail.fr', 0, 'premier', '24 cours de la somme', '33800', 'Bordeaux'),
(2, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '1111111111', 'lille', '59000', 'FRANCE', '0000000000', 'jimmy@gmail.fr', 0, 'premier', '24 cours de la somme', '33800', 'Bordeaux'),
(3, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '1111111111', 'lille', '59000', 'FRANCE', '0000000000', 'jimmy@gmail.fr', 0, 'premier', '24 cours de la somme', '33800', 'Bordeaux'),
(4, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '1111111111', 'lille', '59000', 'FRANCE', '0000000000', 'jimmy@gmail.fr', 0, 'premier', '24 cours de la somme', '33800', 'Bordeaux'),
(5, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '1111111111', 'lille', '59000', 'FRANCE', '0000000000', 'jimmy@gmail.fr', 0, 'premier', '24 cours de la somme', '33800', 'Bordeaux'),
(6, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(7, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(8, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(9, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(10, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(11, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(12, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(13, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(14, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(15, 1, 7, 'PHOMMARATH', 'Jimmy', '1111111111', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'FRANCE', '0611874017', 'jimmy@gmail.com', 0, 'premier', '24 Cours de la Somme', '33800', 'Bordeaux'),
(16, 1, 7, 'PHOMMARATH', 'Jimmy', '8888888888', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'okok@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(17, 1, 7, 'ok', 'yeah', '8888888888', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(18, 1, 7, 'ok', 'yeah', '8888888888', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(19, 1, 7, 'ok', 'yeah', '8888888888', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(20, 1, 7, 'ok', 'yeah', '8888888888', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(21, 1, 6, 'toto', 'pioou', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'okok@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(22, 1, 6, 'toto', 'pioou', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'okok@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(23, 1, 6, 'toto', 'yeah', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'julien', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(24, 1, 6, 'toto', 'yeah', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'julien', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(25, 1, 6, 'toto', 'yeah', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'julien', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(26, 1, 6, 'toto', 'yeah', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'julien', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(27, 1, 6, 'toto', 'yeah', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'julien', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(28, 1, 6, 'toto', 'yeah', '4444444444', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'julien', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(29, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(30, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(31, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(32, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(33, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(34, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(35, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(36, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(37, 1, 10, 'Coucou', 'yeah', '1010101010', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou'),
(38, 1, 8, 'PHOMMARATH', 'Jimmy', '8888888888', 'Homme', '10/01/1992', 'Tourcoing', '59200', 'France', '0611874017', 'jimmy.phommarath@gmail.com', 0, 'premier', '4 rue de la plaine de l''ousse', '64420', 'Soumoulou');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `FRMTID` smallint(2) NOT NULL AUTO_INCREMENT,
  `FRMTNOM` char(255) DEFAULT NULL,
  PRIMARY KEY (`FRMTID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`FRMTID`, `FRMTNOM`) VALUES
(6, 'BTS Maintenance des systèmes - option A Systèmes de production'),
(7, 'BTS Management des Unités Commerciales'),
(8, 'BTS Négociation et Relation Client'),
(9, 'BTS Services Informatiques aux Organisations'),
(10, 'DCG (Diplôme de Comptabilité et de Gestion)'),
(11, 'DCG (2ème année après BTS ou DUT)'),
(12, 'Classe préparatoire économique et commerciale (ENS Rennes D1)'),
(13, 'Classe préparatoire économique et commerciale (ENS Cachan D2)'),
(14, 'Classe préparatoire scientifique (PCSI)'),
(15, 'Classe préparatoire scientifique (PTSI)'),
(16, 'coucou');

-- --------------------------------------------------------

--
-- Structure de la table `nature_piece`
--

CREATE TABLE IF NOT EXISTS `nature_piece` (
  `NTPCID` smallint(2) NOT NULL AUTO_INCREMENT,
  `NTPCINTITULE` char(64) DEFAULT NULL,
  PRIMARY KEY (`NTPCID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `nature_piece`
--

INSERT INTO `nature_piece` (`NTPCID`, `NTPCINTITULE`) VALUES
(1, 'photo identité');

-- --------------------------------------------------------

--
-- Structure de la table `piece_depose`
--

CREATE TABLE IF NOT EXISTS `piece_depose` (
  `PIDEID` int(11) NOT NULL AUTO_INCREMENT,
  `PIDENOMFICHIER` char(32) DEFAULT NULL,
  `PIDEVALIDEE` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PIDEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `PFSNID` int(11) NOT NULL AUTO_INCREMENT,
  `CATGID` int(11) NOT NULL,
  `PFSNLIBELLE` char(255) DEFAULT NULL,
  PRIMARY KEY (`PFSNID`),
  KEY `I_FK_PROFESSION_CATEGORIE` (`CATGID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `profession`
--

INSERT INTO `profession` (`PFSNID`, `CATGID`, `PFSNLIBELLE`) VALUES
(1, 1, 'Agriculteurs'),
(2, 2, 'Chefs D''Entreprises ( 10 + )'),
(3, 2, 'Commerçant et assimilés'),
(4, 2, 'Artisans'),
(5, 3, 'Profession Libérales'),
(6, 3, 'Cadres de la fonction publique'),
(9, 3, 'Professeurs et assimilés'),
(10, 3, 'Profession de l''information des arts et du spectacle'),
(11, 3, 'Cadres administratifs et commerciaux d''entreprise'),
(12, 3, 'Ingénieurs et cadres techniques d''entrprise'),
(13, 4, 'Instituteurs et assimilé'),
(14, 4, 'Professions intermédiaire de la santé et du travail social'),
(15, 4, 'Clergé , Religieux'),
(16, 4, 'Professions intermédiaires administrative de la fonction publique'),
(17, 4, 'Professions intermédiaires adminsitratives et commerciale des entreprises'),
(18, 4, 'Techniciens'),
(19, 4, 'Contremaîtres , agents de maîtise'),
(20, 5, 'Employés civils et agents de services de la fonction publique'),
(21, 5, 'Policiers et Militaires'),
(22, 5, 'Employés administratifs d''entreprise'),
(23, 5, 'Employés de commerce'),
(24, 5, 'Personnels des services directs au particuliers'),
(25, 6, 'Ouvriers Qualifiés'),
(26, 6, 'Ouvriers Non Qualifiés'),
(27, 6, 'Ouvriers Agricoles'),
(28, 7, 'Retraité Agricoles Exploitants'),
(29, 7, 'Retraités artisans,commerciaux et chefs d''entreprise'),
(30, 7, 'Retraités cadres et profession intermédiaires'),
(31, 7, 'Retraités Ouvriers et Employés'),
(32, 8, 'Chômeurs n''ayant jamais travaillé'),
(33, 8, 'Personnes sans activité professionnelle');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `RPSLID` smallint(5) NOT NULL AUTO_INCREMENT,
  `PFSNID` int(11) NOT NULL,
  `STEPID` int(11) NOT NULL,
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
  `RPSLLEGAL` tinyint(1) DEFAULT NULL,
  `RPSLNBENFSCOLARISES` int(1) DEFAULT NULL,
  `RPSLNBTOTENFANTS` int(2) DEFAULT NULL,
  PRIMARY KEY (`RPSLID`),
  KEY `I_FK_RESPONSABLE_PROFESSION` (`PFSNID`),
  KEY `I_FK_RESPONSABLE_SITUATION_EMPLOI` (`STEPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `situation_emploi`
--

CREATE TABLE IF NOT EXISTS `situation_emploi` (
  `STEPID` int(11) NOT NULL AUTO_INCREMENT,
  `STEPLIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`STEPID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `typecompte` (
  `TCMPNUM` int(11) NOT NULL AUTO_INCREMENT,
  `TCMPLIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`TCMPNUM`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `verifier` (
  `PIDEID` int(11) NOT NULL AUTO_INCREMENT,
  `AGNTID` smallint(11) NOT NULL,
  `VRFEDATECONTROLE` date DEFAULT NULL,
  PRIMARY KEY (`PIDEID`,`AGNTID`),
  KEY `I_FK_VERIFIER_PIECE_DEPOSE` (`PIDEID`),
  KEY `I_FK_VERIFIER_AGENT` (`AGNTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
