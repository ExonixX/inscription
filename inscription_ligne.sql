-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 09 fév. 2018 à 09:53
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `AGNTID` smallint(11) NOT NULL AUTO_INCREMENT,
  `CMPTNUM` int(11) NOT NULL,
  `AGNTNOM` char(32) DEFAULT NULL,
  `AGNTPRENOM` char(32) DEFAULT NULL,
  PRIMARY KEY (`AGNTID`),
  KEY `I_FK_AGENT_COMPTE` (`CMPTNUM`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`AGNTID`, `CMPTNUM`, `AGNTNOM`, `AGNTPRENOM`) VALUES
(1, 2, 'PHOMMARATH', 'Jimmy');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `RPSLID` smallint(5) NOT NULL,
  `EDNTID` smallint(4) NOT NULL,
  PRIMARY KEY (`RPSLID`,`EDNTID`),
  KEY `I_FK_APPARTENIR_ETUDIANT` (`EDNTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`RPSLID`, `EDNTID`) VALUES
(2, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `CATGID` int(11) NOT NULL AUTO_INCREMENT,
  `CATGLIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`CATGID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CATGID`, `CATGLIBELLE`) VALUES
(1, 'Agriculteurs'),
(2, 'Artisans, Commerçant'),
(3, 'Cadres, Profession Supérieurs'),
(4, 'Professions Intermédiaires'),
(5, 'Employés'),
(6, 'Ouvriers'),
(7, 'Retraites'),
(8, 'Autres Inactifs');

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

DROP TABLE IF EXISTS `composer`;
CREATE TABLE IF NOT EXISTS `composer` (
  `FRMTID` smallint(2) NOT NULL AUTO_INCREMENT,
  `NTPCID` smallint(2) NOT NULL,
  PRIMARY KEY (`FRMTID`,`NTPCID`),
  KEY `I_FK_COMPOSER_FORMATION` (`FRMTID`),
  KEY `I_FK_COMPOSER_NATURE_PIECE` (`NTPCID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `CMPTNUM` int(11) NOT NULL AUTO_INCREMENT,
  `TCMPNUM` int(11) NOT NULL,
  `CMPTLOGIN` char(32) DEFAULT NULL,
  `CMPTPASSWORD` char(32) DEFAULT NULL,
  `CMPTMAIL` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`CMPTNUM`),
  KEY `I_FK_COMPTE_TYPECOMPTE` (`TCMPNUM`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`CMPTNUM`, `TCMPNUM`, `CMPTLOGIN`, `CMPTPASSWORD`, `CMPTMAIL`) VALUES
(1, 1, 'jimmy', '12345', NULL),
(2, 2, 'admin', '12345', NULL),
(3, 1, 'loan', '12345', NULL),
(4, 1, 'lou', '12345', NULL),
(6, 1, 'toto', '12345', NULL),
(7, 1, 'test', '12345', NULL),
(32, 1, 'jimmy.phommarath', 'jimjim64', 'jimmy.phommarath@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `deposer`
--

DROP TABLE IF EXISTS `deposer`;
CREATE TABLE IF NOT EXISTS `deposer` (
  `EDNTID` smallint(4) NOT NULL AUTO_INCREMENT,
  `PIDEID` int(11) NOT NULL,
  PRIMARY KEY (`EDNTID`,`PIDEID`),
  KEY `I_FK_DEPOSER_ETUDIANT` (`EDNTID`),
  KEY `I_FK_DEPOSER_PIECE_DEPOSE` (`PIDEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `EDNTID` smallint(4) NOT NULL AUTO_INCREMENT,
  `CMPTNUM` int(11) NOT NULL,
  `FRMTID` smallint(2) NOT NULL,
  `EDNTNOMETU` char(32) DEFAULT NULL,
  `EDNTPRENOMETU` char(32) DEFAULT NULL,
  `EDNTINEBEA` char(11) DEFAULT NULL,
  `EDNTSEXE` tinyint(1) DEFAULT NULL,
  `EDNTDATENAISS` varchar(10) DEFAULT NULL,
  `EDNTLIEUNAISS` char(32) DEFAULT NULL,
  `EDNTCPNAISS` char(5) DEFAULT NULL,
  `PSNSID` int(3) NOT NULL,
  `EDNTTEL` char(10) DEFAULT NULL,
  `EDNTMAIL` char(64) DEFAULT NULL,
  `EDNTBOURSIER` tinyint(1) DEFAULT NULL,
  `EDNTCYCLE` char(16) DEFAULT NULL,
  `EDNTADRESSETU` char(128) DEFAULT NULL,
  `EDNTCPADRESSETU` char(5) DEFAULT NULL,
  `EDNTVILLEADRESSETU` char(32) DEFAULT NULL,
  `EDNTANCETAB` varchar(32) DEFAULT NULL,
  `EDNTANCCLASSE` varchar(32) DEFAULT NULL,
  `EDNTANCTYPEETAB` tinyint(1) DEFAULT NULL,
  `EDNTANCACDM` varchar(32) DEFAULT NULL,
  `EDNTANCCP` varchar(8) DEFAULT NULL,
  `EDNTANCVILLE` varchar(32) DEFAULT NULL,
  `EDNTLV1` varchar(16) DEFAULT NULL,
  `EDNTLV2` varchar(16) DEFAULT NULL,
  `EDNTDOUBLEMENT` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`EDNTID`),
  KEY `I_FK_ETUDIANT_COMPTE` (`CMPTNUM`),
  KEY `I_FK_ETUDIANT_FORMATION` (`FRMTID`),
  KEY `I_FK_ETUDIANT_PAYSNAISSANCE` (`PSNSID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`EDNTID`, `CMPTNUM`, `FRMTID`, `EDNTNOMETU`, `EDNTPRENOMETU`, `EDNTINEBEA`, `EDNTSEXE`, `EDNTDATENAISS`, `EDNTLIEUNAISS`, `EDNTCPNAISS`, `PSNSID`, `EDNTTEL`, `EDNTMAIL`, `EDNTBOURSIER`, `EDNTCYCLE`, `EDNTADRESSETU`, `EDNTCPADRESSETU`, `EDNTVILLEADRESSETU`, `EDNTANCETAB`, `EDNTANCCLASSE`, `EDNTANCTYPEETAB`, `EDNTANCACDM`, `EDNTANCCP`, `EDNTANCVILLE`, `EDNTLV1`, `EDNTLV2`, `EDNTDOUBLEMENT`) VALUES
(4, 1, 9, 'PHOMMARATH', 'Jimmy', '1234567896D', 1, '10/01/1992', 'Tourcoing', '59200', 75, '0611874017', 'dupont@gmail.com', 1, 'second', '24 cours de la Somme', '33800', 'Bordeaux', 'Lycée Gustave Eiffel', 'terminale S', 1, 'Bordeaux', '33800', 'Bordeaux', 'Anglais', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `FRMTID` smallint(2) NOT NULL AUTO_INCREMENT,
  `FRMTNOM` char(255) DEFAULT NULL,
  PRIMARY KEY (`FRMTID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`FRMTID`, `FRMTNOM`) VALUES
(1, 'Adaptation Technicien Supérieur (après BTS ou DUT)'),
(2, 'BTS Conception de Produits Industriels'),
(3, 'BTS Comptabilité et Gestion'),
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

DROP TABLE IF EXISTS `nature_piece`;
CREATE TABLE IF NOT EXISTS `nature_piece` (
  `NTPCID` smallint(2) NOT NULL AUTO_INCREMENT,
  `NTPCINTITULE` char(64) DEFAULT NULL,
  PRIMARY KEY (`NTPCID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nature_piece`
--

INSERT INTO `nature_piece` (`NTPCID`, `NTPCINTITULE`) VALUES
(11, 'Relevé de notes'),
(12, 'Photo identité'),
(13, 'pizza');

-- --------------------------------------------------------

--
-- Structure de la table `pays_naissance`
--

DROP TABLE IF EXISTS `pays_naissance`;
CREATE TABLE IF NOT EXISTS `pays_naissance` (
  `PSNSID` int(3) NOT NULL AUTO_INCREMENT,
  `PSNSCODE` varchar(2) NOT NULL,
  `PSNSNOM` varchar(32) NOT NULL,
  PRIMARY KEY (`PSNSID`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays_naissance`
--

INSERT INTO `pays_naissance` (`PSNSID`, `PSNSCODE`, `PSNSNOM`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albanie'),
(3, 'AQ', 'Antarctique'),
(4, 'DZ', 'Algérie'),
(5, 'AS', 'Samoa Américaines'),
(6, 'AD', 'Andorre'),
(7, 'AO', 'Angola'),
(8, 'AG', 'Antigua-et-Barbuda'),
(9, 'AZ', 'Azerbaïdjan'),
(10, 'AR', 'Argentine'),
(11, 'AU', 'Australie'),
(12, 'AT', 'Autriche'),
(13, 'BS', 'Bahamas'),
(14, 'BH', 'Bahreïn'),
(15, 'BD', 'Bangladesh'),
(16, 'AM', 'Arménie'),
(17, 'BB', 'Barbade'),
(18, 'BE', 'Belgique'),
(19, 'BM', 'Bermudes'),
(20, 'BT', 'Bhoutan'),
(21, 'BO', 'Bolivie'),
(22, 'BA', 'Bosnie-Herzégovine'),
(23, 'BW', 'Botswana'),
(24, 'BV', 'Île Bouvet'),
(25, 'BR', 'Brésil'),
(26, 'BZ', 'Belize'),
(27, 'IO', 'Territoire Britannique de l\'Océa'),
(28, 'SB', 'Îles Salomon'),
(29, 'VG', 'Îles Vierges Britanniques'),
(30, 'BN', 'Brunéi Darussalam'),
(31, 'BG', 'Bulgarie'),
(32, 'MM', 'Myanmar'),
(33, 'BI', 'Burundi'),
(34, 'BY', 'Bélarus'),
(35, 'KH', 'Cambodge'),
(36, 'CM', 'Cameroun'),
(37, 'CA', 'Canada'),
(38, 'CV', 'Cap-vert'),
(39, 'KY', 'Îles Caïmanes'),
(40, 'CF', 'République Centrafricaine'),
(41, 'LK', 'Sri Lanka'),
(42, 'TD', 'Tchad'),
(43, 'CL', 'Chili'),
(44, 'CN', 'Chine'),
(45, 'TW', 'Taïwan'),
(46, 'CX', 'Île Christmas'),
(47, 'CC', 'Îles Cocos (Keeling)'),
(48, 'CO', 'Colombie'),
(49, 'KM', 'Comores'),
(50, 'YT', 'Mayotte'),
(51, 'CG', 'République du Congo'),
(52, 'CD', 'République Démocratique du Congo'),
(53, 'CK', 'Îles Cook'),
(54, 'CR', 'Costa Rica'),
(55, 'HR', 'Croatie'),
(56, 'CU', 'Cuba'),
(57, 'CY', 'Chypre'),
(58, 'CZ', 'République Tchèque'),
(59, 'BJ', 'Bénin'),
(60, 'DK', 'Danemark'),
(61, 'DM', 'Dominique'),
(62, 'DO', 'République Dominicaine'),
(63, 'EC', 'Équateur'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Guinée Équatoriale'),
(66, 'ET', 'Éthiopie'),
(67, 'ER', 'Érythrée'),
(68, 'EE', 'Estonie'),
(69, 'FO', 'Îles Féroé'),
(70, 'FK', 'Îles (malvinas) Falkland'),
(71, 'GS', 'Géorgie du Sud et les Îles Sandw'),
(72, 'FJ', 'Fidji'),
(73, 'FI', 'Finlande'),
(74, 'AX', 'Îles Åland'),
(75, 'FR', 'France'),
(76, 'GF', 'Guyane Française'),
(77, 'PF', 'Polynésie Française'),
(78, 'TF', 'Terres Australes Françaises'),
(79, 'DJ', 'Djibouti'),
(80, 'GA', 'Gabon'),
(81, 'GE', 'Géorgie'),
(82, 'GM', 'Gambie'),
(83, 'PS', 'Territoire Palestinien Occupé'),
(84, 'DE', 'Allemagne'),
(85, 'GH', 'Ghana'),
(86, 'GI', 'Gibraltar'),
(87, 'KI', 'Kiribati'),
(88, 'GR', 'Grèce'),
(89, 'GL', 'Groenland'),
(90, 'GD', 'Grenade'),
(91, 'GP', 'Guadeloupe'),
(92, 'GU', 'Guam'),
(93, 'GT', 'Guatemala'),
(94, 'GN', 'Guinée'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haïti'),
(97, 'HM', 'Îles Heard et Mcdonald'),
(98, 'VA', 'Saint-Siège (état de la Cité du '),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong-Kong'),
(101, 'HU', 'Hongrie'),
(102, 'IS', 'Islande'),
(103, 'IN', 'Inde'),
(104, 'ID', 'Indonésie'),
(105, 'IR', 'République Islamique d\'Iran'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Irlande'),
(108, 'IL', 'Israël'),
(109, 'IT', 'Italie'),
(110, 'CI', 'Côte d\'Ivoire'),
(111, 'JM', 'Jamaïque'),
(112, 'JP', 'Japon'),
(113, 'KZ', 'Kazakhstan'),
(114, 'JO', 'Jordanie'),
(115, 'KE', 'Kenya'),
(116, 'KP', 'République Populaire Démocratiqu'),
(117, 'KR', 'République de Corée'),
(118, 'KW', 'Koweït'),
(119, 'KG', 'Kirghizistan'),
(120, 'LA', 'République Démocratique Populair'),
(121, 'LB', 'Liban'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Lettonie'),
(124, 'LR', 'Libéria'),
(125, 'LY', 'Jamahiriya Arabe Libyenne'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lituanie'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macao'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaisie'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malte'),
(136, 'MQ', 'Martinique'),
(137, 'MR', 'Mauritanie'),
(138, 'MU', 'Maurice'),
(139, 'MX', 'Mexique'),
(140, 'MC', 'Monaco'),
(141, 'MN', 'Mongolie'),
(142, 'MD', 'République de Moldova'),
(143, 'MS', 'Montserrat'),
(144, 'MA', 'Maroc'),
(145, 'MZ', 'Mozambique'),
(146, 'OM', 'Oman'),
(147, 'NA', 'Namibie'),
(148, 'NR', 'Nauru'),
(149, 'NP', 'Népal'),
(150, 'NL', 'Pays-Bas'),
(151, 'AN', 'Antilles Néerlandaises'),
(152, 'AW', 'Aruba'),
(153, 'NC', 'Nouvelle-Calédonie'),
(154, 'VU', 'Vanuatu'),
(155, 'NZ', 'Nouvelle-Zélande'),
(156, 'NI', 'Nicaragua'),
(157, 'NE', 'Niger'),
(158, 'NG', 'Nigéria'),
(159, 'NU', 'Niué'),
(160, 'NF', 'Île Norfolk'),
(161, 'NO', 'Norvège'),
(162, 'MP', 'Îles Mariannes du Nord'),
(163, 'UM', 'Îles Mineures Éloignées des État'),
(164, 'FM', 'États Fédérés de Micronésie'),
(165, 'MH', 'Îles Marshall'),
(166, 'PW', 'Palaos'),
(167, 'PK', 'Pakistan'),
(168, 'PA', 'Panama'),
(169, 'PG', 'Papouasie-Nouvelle-Guinée'),
(170, 'PY', 'Paraguay'),
(171, 'PE', 'Pérou'),
(172, 'PH', 'Philippines'),
(173, 'PN', 'Pitcairn'),
(174, 'PL', 'Pologne'),
(175, 'PT', 'Portugal'),
(176, 'GW', 'Guinée-Bissau'),
(177, 'TL', 'Timor-Leste'),
(178, 'PR', 'Porto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Réunion'),
(181, 'RO', 'Roumanie'),
(182, 'RU', 'Fédération de Russie'),
(183, 'RW', 'Rwanda'),
(184, 'SH', 'Sainte-Hélène'),
(185, 'KN', 'Saint-Kitts-et-Nevis'),
(186, 'AI', 'Anguilla'),
(187, 'LC', 'Sainte-Lucie'),
(188, 'PM', 'Saint-Pierre-et-Miquelon'),
(189, 'VC', 'Saint-Vincent-et-les Grenadines'),
(190, 'SM', 'Saint-Marin'),
(191, 'ST', 'Sao Tomé-et-Principe'),
(192, 'SA', 'Arabie Saoudite'),
(193, 'SN', 'Sénégal'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapour'),
(197, 'SK', 'Slovaquie'),
(198, 'VN', 'Viet Nam'),
(199, 'SI', 'Slovénie'),
(200, 'SO', 'Somalie'),
(201, 'ZA', 'Afrique du Sud'),
(202, 'ZW', 'Zimbabwe'),
(203, 'ES', 'Espagne'),
(204, 'EH', 'Sahara Occidental'),
(205, 'SD', 'Soudan'),
(206, 'SR', 'Suriname'),
(207, 'SJ', 'Svalbard etÎle Jan Mayen'),
(208, 'SZ', 'Swaziland'),
(209, 'SE', 'Suède'),
(210, 'CH', 'Suisse'),
(211, 'SY', 'République Arabe Syrienne'),
(212, 'TJ', 'Tadjikistan'),
(213, 'TH', 'Thaïlande'),
(214, 'TG', 'Togo'),
(215, 'TK', 'Tokelau'),
(216, 'TO', 'Tonga'),
(217, 'TT', 'Trinité-et-Tobago'),
(218, 'AE', 'Émirats Arabes Unis'),
(219, 'TN', 'Tunisie'),
(220, 'TR', 'Turquie'),
(221, 'TM', 'Turkménistan'),
(222, 'TC', 'Îles Turks et Caïques'),
(223, 'TV', 'Tuvalu'),
(224, 'UG', 'Ouganda'),
(225, 'UA', 'Ukraine'),
(226, 'MK', 'L\'ex-République Yougoslave de Ma'),
(227, 'EG', 'Égypte'),
(228, 'GB', 'Royaume-Uni'),
(229, 'IM', 'Île de Man'),
(230, 'TZ', 'République-Unie de Tanzanie'),
(231, 'US', 'États-Unis'),
(232, 'VI', 'Îles Vierges des États-Unis'),
(233, 'BF', 'Burkina Faso'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Ouzbékistan'),
(236, 'VE', 'Venezuela'),
(237, 'WF', 'Wallis et Futuna'),
(238, 'WS', 'Samoa'),
(239, 'YE', 'Yémen'),
(240, 'CS', 'Serbie-et-Monténégro'),
(241, 'ZM', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `piece_depose`
--

DROP TABLE IF EXISTS `piece_depose`;
CREATE TABLE IF NOT EXISTS `piece_depose` (
  `PIDEID` int(11) NOT NULL AUTO_INCREMENT,
  `PIDENOMFICHIER` char(32) DEFAULT NULL,
  `PIDECHEMIN` varchar(64) NOT NULL,
  `PIDEDATEDEPOT` date NOT NULL,
  `PIDEVALIDEE` tinyint(1) DEFAULT NULL,
  `NTPCID` smallint(2) NOT NULL,
  PRIMARY KEY (`PIDEID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `PFSNID` int(11) NOT NULL AUTO_INCREMENT,
  `CATGID` int(11) NOT NULL,
  `PFSNLIBELLE` char(255) DEFAULT NULL,
  PRIMARY KEY (`PFSNID`),
  KEY `I_FK_PROFESSION_CATEGORIE` (`CATGID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profession`
--

INSERT INTO `profession` (`PFSNID`, `CATGID`, `PFSNLIBELLE`) VALUES
(1, 1, 'Agriculteurs'),
(2, 2, 'Chefs D\'Entreprises (10+)'),
(3, 2, 'Commerçant et assimilés'),
(4, 2, 'Artisans'),
(5, 3, 'Profession Libérales'),
(6, 3, 'Cadres de la fonction publique'),
(9, 3, 'Professeurs et assimilés'),
(10, 3, 'Profession de l\'information des arts et du spectacle'),
(11, 3, 'Cadres administratifs et commerciaux d\'entreprise'),
(12, 3, 'Ingénieurs et cadres techniques d\'entrprise'),
(13, 4, 'Instituteurs et assimilé'),
(14, 4, 'Professions intermédiaire de la santé et du travail social'),
(15, 4, 'Clergé, Religieux'),
(16, 4, 'Professions intermédiaires administrative de la fonction publique'),
(17, 4, 'Professions intermédiaires adminsitratives et commerciale des entreprises'),
(18, 4, 'Techniciens'),
(19, 4, 'Contremaîtres, agents de maîtrise'),
(20, 5, 'Employés civils et agents de services de la fonction publique'),
(21, 5, 'Policiers et Militaires'),
(22, 5, 'Employés administratifs d\'entreprise'),
(23, 5, 'Employés de commerce'),
(24, 5, 'Personnels des services directs au particuliers'),
(25, 6, 'Ouvriers Qualifiés'),
(26, 6, 'Ouvriers Non Qualifiés'),
(27, 6, 'Ouvriers Agricoles'),
(28, 7, 'Retraité Agricoles Exploitants'),
(29, 7, 'Retraités artisans,commerciaux et chefs d\'entreprise'),
(30, 7, 'Retraités cadres et profession intermédiaires'),
(31, 7, 'Retraités Ouvriers et Employés'),
(32, 8, 'Chômeurs n\'ayant jamais travaillé'),
(33, 8, 'Personnes sans activité professionnelle');

-- --------------------------------------------------------

--
-- Structure de la table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
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
  `PSNSID` int(3) NOT NULL,
  `RPSLTELRESP` char(10) DEFAULT NULL,
  `RPSLFIXRESP` char(10) DEFAULT NULL,
  `RPSLMAILRESP` char(64) DEFAULT NULL,
  `RPSLLEGAL` tinyint(1) DEFAULT NULL,
  `RPSLNBENFSCOLARISES` varchar(2) DEFAULT NULL,
  `RPSLNBTOTENFANTS` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`RPSLID`),
  KEY `I_FK_RESPONSABLE_PROFESSION` (`PFSNID`),
  KEY `I_FK_RESPONSABLE_SITUATION_EMPLOI` (`STEPID`),
  KEY `I_FK_RESPONSABLE_PAYSNAISSANCE` (`PSNSID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `responsable`
--

INSERT INTO `responsable` (`RPSLID`, `PFSNID`, `STEPID`, `RPSLNOMRESP`, `RPSLPRENOMRESP`, `RPSLLIENPARENTE`, `RPSLADRESSRESP`, `RPSLCPADRESSRESP`, `RPSLVILLEADRESSRESP`, `PSNSID`, `RPSLTELRESP`, `RPSLFIXRESP`, `RPSLMAILRESP`, `RPSLLEGAL`, `RPSLNBENFSCOLARISES`, `RPSLNBTOTENFANTS`) VALUES
(2, 1, 1, 'PHOMMARATH', 'Pascal', 'Pere', '4 rue de la plaine de l\'ousse', '64447', 'Soumoulou', 1, '0612226848', '0551984654', 'dupont@gmail.com', 0, '1', '1');

-- --------------------------------------------------------

--
-- Structure de la table `situation_emploi`
--

DROP TABLE IF EXISTS `situation_emploi`;
CREATE TABLE IF NOT EXISTS `situation_emploi` (
  `STEPID` int(11) NOT NULL AUTO_INCREMENT,
  `STEPLIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`STEPID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `situation_emploi`
--

INSERT INTO `situation_emploi` (`STEPID`, `STEPLIBELLE`) VALUES
(1, 'Occupe un emploi'),
(2, 'Au chômage'),
(3, 'Préretraite, retraite'),
(4, 'Autre situation');

-- --------------------------------------------------------

--
-- Structure de la table `typecompte`
--

DROP TABLE IF EXISTS `typecompte`;
CREATE TABLE IF NOT EXISTS `typecompte` (
  `TCMPNUM` int(11) NOT NULL AUTO_INCREMENT,
  `TCMPLIBELLE` char(32) DEFAULT NULL,
  PRIMARY KEY (`TCMPNUM`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typecompte`
--

INSERT INTO `typecompte` (`TCMPNUM`, `TCMPLIBELLE`) VALUES
(1, 'Etudiant'),
(2, 'Agent');

-- --------------------------------------------------------

--
-- Structure de la table `verifier`
--

DROP TABLE IF EXISTS `verifier`;
CREATE TABLE IF NOT EXISTS `verifier` (
  `PIDEID` int(11) NOT NULL AUTO_INCREMENT,
  `AGNTID` smallint(11) NOT NULL,
  `VRFEDATECONTROLE` date DEFAULT NULL,
  PRIMARY KEY (`PIDEID`,`AGNTID`),
  KEY `I_FK_VERIFIER_PIECE_DEPOSE` (`PIDEID`),
  KEY `I_FK_VERIFIER_AGENT` (`AGNTID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
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
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`FRMTID`) REFERENCES `formation` (`FRMTID`),
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`PSNSID`) REFERENCES `pays_naissance` (`PSNSID`);

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
  ADD CONSTRAINT `responsable_ibfk_2` FOREIGN KEY (`STEPID`) REFERENCES `situation_emploi` (`STEPID`),
  ADD CONSTRAINT `responsable_ibfk_3` FOREIGN KEY (`PSNSID`) REFERENCES `pays_naissance` (`PSNSID`);

--
-- Contraintes pour la table `verifier`
--
ALTER TABLE `verifier`
  ADD CONSTRAINT `verifier_ibfk_1` FOREIGN KEY (`PIDEID`) REFERENCES `piece_depose` (`PIDEID`),
  ADD CONSTRAINT `verifier_ibfk_2` FOREIGN KEY (`AGNTID`) REFERENCES `agent` (`AGNTID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
