# ************************************************************
# Sequel Ace SQL dump
# Version 20033
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 5.5.5-10.5.15-MariaDB-0+deb11u1)
# Database: petsitter
# Generation Time: 2022-04-04 21:18:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table animaux
# ------------------------------------------------------------

DROP TABLE IF EXISTS `animaux`;

CREATE TABLE `animaux` (
  `chien` tinyint(1) DEFAULT NULL,
  `chat` tinyint(1) DEFAULT NULL,
  `lapin` tinyint(1) DEFAULT NULL,
  `rongeur` tinyint(1) DEFAULT NULL,
  `furet` tinyint(1) DEFAULT NULL,
  `herisson` tinyint(1) DEFAULT NULL,
  `aquarium` tinyint(1) DEFAULT NULL,
  `oiseaux` tinyint(1) DEFAULT NULL,
  `reptiles` tinyint(1) DEFAULT NULL,
  `userAnimauxID` int(11) DEFAULT 1,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `animaux` WRITE;
/*!40000 ALTER TABLE `animaux` DISABLE KEYS */;

INSERT INTO `animaux` (`chien`, `chat`, `lapin`, `rongeur`, `furet`, `herisson`, `aquarium`, `oiseaux`, `reptiles`, `userAnimauxID`, `id`)
VALUES
	(0,1,1,1,1,0,1,1,1,10,10),
	(1,1,1,1,1,1,1,1,1,60,11),
	(1,0,0,1,0,0,1,0,0,61,12),
	(1,1,0,0,0,0,0,0,0,10,13),
	(1,1,0,0,0,0,0,0,0,10,14),
	(1,1,1,0,0,0,0,0,0,10,15),
	(1,1,1,1,1,0,0,0,0,10,16),
	(1,1,0,0,0,0,0,0,0,10,17),
	(1,1,0,0,0,0,0,0,0,10,18),
	(1,1,0,0,0,0,0,0,0,10,19),
	(1,0,0,0,0,0,0,0,0,10,20),
	(1,0,0,0,0,0,0,0,0,10,21),
	(1,0,0,0,0,0,0,0,0,10,22),
	(1,0,0,0,0,0,0,0,0,10,23),
	(1,0,0,0,0,0,0,0,0,28,24),
	(1,0,0,0,0,0,0,0,0,68,25),
	(1,0,0,0,0,0,0,0,0,27,26),
	(0,1,0,0,0,0,0,0,0,27,27),
	(1,0,0,0,0,0,0,0,0,27,28),
	(0,0,0,0,0,0,0,0,0,73,29),
	(0,0,0,0,0,0,0,0,0,73,30),
	(1,0,0,0,0,0,0,0,0,73,31),
	(0,0,0,0,0,0,0,0,0,73,32),
	(0,0,0,0,0,0,0,0,0,73,33),
	(0,0,0,0,0,0,0,0,0,73,34),
	(0,0,0,0,0,0,0,0,0,73,35),
	(1,0,0,0,0,0,0,0,0,73,36),
	(0,1,0,0,0,0,0,0,0,73,37),
	(1,0,0,0,0,0,0,0,0,73,38),
	(1,0,0,0,0,0,0,0,0,73,39),
	(1,0,0,0,0,0,0,0,0,73,40),
	(1,0,0,0,0,0,0,0,0,73,41),
	(1,0,0,0,0,0,0,0,0,73,42),
	(1,0,0,0,0,0,0,0,0,73,43),
	(1,0,0,0,0,0,0,0,0,73,44),
	(1,0,0,0,0,0,0,0,0,73,45),
	(0,0,0,0,0,0,0,0,0,73,46),
	(1,1,0,0,0,0,0,0,0,78,47),
	(1,0,0,0,0,0,0,0,0,78,48),
	(0,1,0,0,0,0,0,0,0,73,49),
	(0,0,0,1,0,0,0,0,0,73,50),
	(0,0,0,1,0,0,0,0,0,73,51),
	(1,0,0,0,0,0,0,0,0,73,52),
	(1,0,0,0,0,0,0,0,0,79,53),
	(0,1,0,0,0,0,0,0,0,79,54),
	(1,0,0,0,0,0,0,0,0,82,55);

/*!40000 ALTER TABLE `animaux` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table annonce
# ------------------------------------------------------------

DROP TABLE IF EXISTS `annonce`;

CREATE TABLE `annonce` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `horaire` int(1) DEFAULT NULL,
  `prix` int(4) DEFAULT 10,
  `startDate` text DEFAULT NULL,
  `endDate` text DEFAULT NULL,
  `note` int(5) unsigned DEFAULT 1,
  `actif` tinyint(1) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `animaux_id` int(11) DEFAULT 1,
  `biographie` varchar(300) DEFAULT NULL,
  `garder_ID` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `annonce` WRITE;
/*!40000 ALTER TABLE `annonce` DISABLE KEYS */;

INSERT INTO `annonce` (`id`, `horaire`, `prix`, `startDate`, `endDate`, `note`, `actif`, `userID`, `animaux_id`, `biographie`, `garder_ID`)
VALUES
	(30,8,10,'0','0',4,1,61,61,NULL,1),
	(31,0,10,'4','1648425600',1,1,10,1,NULL,1),
	(34,12,10,'1648425600','1651104000',1,1,10,1,NULL,1),
	(35,12,10,'1651104000','1653696000',1,1,10,1,NULL,1),
	(36,2,10,'1649462400','1649462400',21,1,10,1,NULL,1),
	(37,3,10,'1651104000','1653696000',32,1,33,1,NULL,1),
	(38,0,10,'1649462400','1649462400',1,1,33,1,NULL,1),
	(39,0,10,'1649808000','1649894400',1,1,27,1,NULL,1),
	(40,11,10,'1648425600','1649808000',1,1,60,60,NULL,1),
	(41,NULL,10,'1648425600','1648425600',NULL,NULL,NULL,1,NULL,1),
	(42,1000,10,'1649203200','1651017600',45,1,67,1,NULL,1),
	(43,11,10,'1650067200','1650153600',4,1,27,1,NULL,1),
	(44,11,10,'1649462400','1649635200',4,1,27,1,NULL,1),
	(45,11,10,'1649462400','1649548800',5,1,27,1,NULL,1),
	(46,11,10,'1649203200','1649462400',10,1,27,1,NULL,1),
	(47,0,10,'1649462400','1649721600',3,1,27,1,NULL,1),
	(48,11,10,'1649462400','1650931200',4,1,27,1,NULL,1),
	(55,0,10,'','',0,NULL,10,1,NULL,1),
	(56,2,10,'1651190400','1651795200',3,1,10,1,NULL,1),
	(57,2,10,'2','2',45,NULL,10,1,NULL,1),
	(58,1000,10,'1649721600','1650326400',45,1,10,1,NULL,1),
	(59,1000,10,'1649721600','1650326400',2,1,10,1,NULL,1),
	(60,1000,10,'1649376000','1649548800',45,1,10,1,NULL,1),
	(61,2,10,'1651622400','1651795200',45,NULL,10,1,NULL,1),
	(62,1000,10,'1649980800','1650067200',45,1,10,1,NULL,1),
	(63,NULL,10,NULL,NULL,NULL,NULL,NULL,1,NULL,1),
	(64,2,10,'1649376000','1649462400',50,1,10,1,NULL,1),
	(65,NULL,10,NULL,NULL,NULL,NULL,NULL,1,NULL,1),
	(66,1000,10,'1650067200','1650672000',65,1,10,1,NULL,1),
	(67,1221,10,'1649376000','1649462400',453,1,10,17,'jejaeaejiza',1),
	(68,1000,10,'1649376000','1649462400',45,1,10,18,NULL,1),
	(69,1000,10,'1649376000','1649462400',45,1,10,19,NULL,1),
	(70,1000,10,'1649376000','1649376000',45,1,10,20,NULL,1),
	(71,1000,10,'1648684800','1651190400',45,NULL,10,21,NULL,1),
	(72,0,10,'1649376000','1651190400',666,1,10,22,NULL,1),
	(73,1000,10,'1648771200','1651276800',45,1,10,23,NULL,1),
	(74,11,10,'1648857600','1648857600',4,1,27,1,'coucouc zemmour a tweet',NULL),
	(75,11,10,'1648857600','1648857600',1,1,27,1,'27',NULL),
	(76,11,10,'1649462400','1649462400',4,1,27,1,'27',NULL),
	(77,11,10,'1650672000','1650672000',4,1,27,1,'27',NULL),
	(78,11,10,'1650672000','1650672000',4,1,27,1,NULL,NULL),
	(79,11,10,'1650672000','1650672000',4,1,27,1,'coucou zemmour a tweet',NULL),
	(80,11,10,'1650672000','1650672000',4,1,27,1,'J’adore les animaux depuis toute petite, petite c’était un zoo chez moi. Mais j’aime la compagnie de nos amis des animaux !',NULL),
	(81,1000,10,'1649376000','1649462400',45,1,68,25,NULL,NULL),
	(82,1000,10,'1649376000','1649376000',NULL,1,73,42,'zea',1),
	(83,1000,10,'1649980800','1649980800',NULL,NULL,73,43,'je veux de l\'argent pour maus etude eoa aze ',1),
	(85,66,10,'1649030400','1649030400',1,NULL,73,45,'Je suis aueiouaoueiaeza uazie',1),
	(86,0,10,'','',1,NULL,73,46,'',1),
	(87,1000,10,'1648771200','1651190400',1,1,78,47,'rzzezrezr',1),
	(88,21,10,'1648771200','1650585600',1,1,78,48,'zea',1),
	(89,1000,10,'1649376000','1649462400',1,1,73,49,'zea',1),
	(90,8,10,'1649376000','1649376000',1,1,73,50,'je suis gentille',1),
	(91,8,10,'1651104000','1651881600',1,1,73,51,'je suis gentille',1),
	(93,11,10,'1649030400','1650931200',1,1,79,53,'J’adore les animaux depuis toute petite, petite c’était un zoo chez moi. Mais j’aime la compagnie de nos amis des animaux !',1),
	(94,11,10,'1649030400','1651622400',1,1,79,54,'J’adore les animaux depuis toute petite, petite c’était un zoo chez moi. Mais j’aime la compagnie de nos amis des animaux !',1),
	(95,11,10,'1649376000','1649376000',1,1,82,55,'J’adore les animaux depuis toute petite, petite c’était un zoo chez moi. Mais j’aime la compagnie de nos amis des animaux !',1);

/*!40000 ALTER TABLE `annonce` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table commentaires
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commentaires`;

CREATE TABLE `commentaires` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(1000) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `petsitterID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `commentaires` WRITE;
/*!40000 ALTER TABLE `commentaires` DISABLE KEYS */;

INSERT INTO `commentaires` (`id`, `commentaire`, `userID`, `petsitterID`)
VALUES
	(1,'hkuhkhkjh',27,79),
	(2,'coucou ca. va ',73,79),
	(3,'coucou ca. va ',73,10),
	(4,'coucou ca. va ',NULL,0),
	(5,'coucou ca. va ',73,10),
	(6,'hkuhkhkjh',73,10),
	(7,'coucou ca. va ',73,10),
	(8,'t trop fort plus beau',80,10),
	(9,'coucou ca. va ',73,82),
	(10,'coucou ca. va ',80,79),
	(11,'bla',73,79),
	(12,'coucou ca. va ',80,73),
	(13,'coucou ca. va ',80,73),
	(14,'et vasi ',82,80),
	(15,'c\'est suuuuuu',80,82),
	(16,'c\'est moi',80,82);

/*!40000 ALTER TABLE `commentaires` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table garder
# ------------------------------------------------------------

DROP TABLE IF EXISTS `garder`;

CREATE TABLE `garder` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `promener` tinyint(1) DEFAULT 0,
  `nourrir` tinyint(1) DEFAULT 0,
  `garder` tinyint(1) DEFAULT 0,
  `userSeviceID` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `garder` WRITE;
/*!40000 ALTER TABLE `garder` DISABLE KEYS */;

INSERT INTO `garder` (`id`, `promener`, `nourrir`, `garder`, `userSeviceID`)
VALUES
	(1,1,1,0,100),
	(2,0,1,NULL,30),
	(3,NULL,0,NULL,3),
	(4,0,0,NULL,2),
	(5,0,0,NULL,1),
	(6,0,0,NULL,10),
	(7,NULL,NULL,NULL,10),
	(8,NULL,NULL,NULL,10),
	(9,NULL,NULL,NULL,10),
	(31,NULL,NULL,NULL,10),
	(32,0,0,NULL,26),
	(33,NULL,0,0,10),
	(34,NULL,0,0,10),
	(35,0,0,0,10),
	(36,NULL,0,0,NULL),
	(37,NULL,0,0,NULL),
	(38,NULL,0,1,0),
	(39,NULL,0,NULL,0),
	(40,0,0,NULL,0),
	(41,0,NULL,0,0),
	(42,NULL,NULL,0,0),
	(43,NULL,NULL,NULL,NULL),
	(44,0,0,NULL,NULL),
	(45,NULL,NULL,NULL,NULL),
	(46,NULL,0,NULL,NULL),
	(47,NULL,NULL,NULL,10),
	(48,0,0,NULL,110),
	(49,0,0,NULL,10),
	(50,NULL,0,NULL,10),
	(51,0,NULL,NULL,NULL),
	(52,0,0,NULL,56),
	(53,1,1,1,57),
	(54,1,1,NULL,58),
	(55,1,1,1,60),
	(56,1,NULL,1,61),
	(57,NULL,NULL,1,62),
	(58,NULL,1,NULL,63),
	(59,1,NULL,NULL,64),
	(60,NULL,1,1,65),
	(61,0,0,1,66),
	(62,1,1,1,10),
	(63,0,NULL,0,76),
	(64,NULL,NULL,NULL,77),
	(65,0,0,0,78),
	(66,NULL,NULL,0,79),
	(67,NULL,NULL,0,80),
	(68,0,1,0,81),
	(69,0,0,1,82);

/*!40000 ALTER TABLE `garder` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table utilisateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `naissance` text DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telephone` int(10) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `postal` int(5) DEFAULT NULL,
  `rue` int(40) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `descript` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `naissance`, `mail`, `telephone`, `photo`, `pays`, `ville`, `postal`, `rue`, `mdp`, `descript`)
VALUES
	(2,'1','2','3','4',5,'6','7','8',9,10,'12',NULL),
	(3,'0','0','0','0',0,'0','0','0',0,0,'0',NULL),
	(6,'100','100','100','azerty@ae',78156,'100','100','27200',100,100,'100',NULL),
	(7,'12','12','12','admin@ae',12,'12','12','12',12,12,'0',NULL),
	(8,'12','12','0','admin@xn--ae2-cma',0,'0','0','0',0,0,'0',NULL),
	(9,'0','0','4052002','azerty@gmail.com',12345,'1234','1234','1234',2345,1234,'123456789',NULL),
	(10,'Rom','monfret','123','a@gmail.com',781566570,'624a3a85db6f20.98612486.jpg','France','Vincennes',93400,12,'romain',NULL),
	(11,'Compiano','Lucas','5062002','lccompiano@gmail.com',651625642,'0','France','Paris',75116,11,'lucas',NULL),
	(12,'Star','Poke','4052002','b@gmail.com',781566570,'12','France','Vernon',27200,12,'bb',NULL),
	(13,'Monfret','ROMAIN','4052002','c@gmail.com',781566570,'12','France','Vincennes',93400,0,'c',NULL),
	(14,'Maison','ROMAIN','4052002','d@gmail.com',781566570,'12','France','Vernon',27111,0,'d',NULL),
	(15,'Maison','monfret','4052002','e@gmail.com',781566570,'12','France','Vernon',27111,0,'e',NULL),
	(16,'Star','Poke','4052002','g@gmail.com',781566570,'12','France','Vernon',27200,0,'g',NULL),
	(17,'Star','Poke','4052002','f@gmail.com',781566570,'12','France','Vernon',27200,0,'f',NULL),
	(18,'sf','Poke','12','h@gmail.com',781566570,'12','12','Vernon',27200,12,'h',NULL),
	(19,'Sf','Poke','12','j@gmail.com',781566570,'12','12','Vernon',27200,12,'h',NULL),
	(20,'Sf','Poke','12','k@gmail.com',781566570,'12','12','Vernon',27200,12,'h',NULL),
	(21,'Sf','Poke','12','l@gmail.com',781566570,'12','12','Vernon',27200,12,'h',NULL),
	(22,'Sf','Poke','12','m@gmail.com',781566570,'12','12','Vernon',27200,12,'h',NULL),
	(23,'Sf','Poke','12','n@gmail.com',781566570,'12','12','Vernon',27200,12,'h',NULL),
	(24,'Star','Poke','4052002','o@gmail.com',781566570,'12','France','Vernon',27200,0,'o',NULL),
	(25,'Star','Poke','4052002','q@gmail.com',781566570,'12','France','Vernon',27200,0,'q',NULL),
	(26,'Star','Poke','4052002','r@gmail.com',781566570,'12','France','Vernon',27200,0,'r',NULL),
	(27,'suuuu','jeremi','5062002','z@gmail.com',651625642,'0','Gana','Paris',75116,11,'z','ans et d’origine française. J’aime me promener dans les parcs. Les animaux ont toujours eu une grande place dans ma vie. En effet, issue d’une grande famille nous avions beaucoup d’animaux ! Sérieuse, volontaire, dynamique et sociable, vous pouvez me laisser vos animaux en toute sérénité car je saur'),
	(28,'Luc','Luc','0','x@gmail.com',651625642,'0','France','Paris',75116,11,'x',NULL),
	(29,'suuuu','luc','0','w@gmail.com',651625642,'0','France','Paris',75116,11,'w',NULL),
	(30,'suuuu','luc','0','y@gmail.com',651625642,'0','France','Paris',75116,11,'y',NULL),
	(31,'suuuu','luc','0','u@gmail.com',651625642,'0','France','Paris',75116,11,'u',NULL),
	(32,'suuuu','luc','0','v@gmail.com',651625642,'0','France','Paris',75116,11,'v',NULL),
	(33,'Star','Poke','4052002','aa@gmail.com',781566570,'12','Italie','Vernon',111111,0,'aa',NULL),
	(34,'Star','Poke','4052002','bb@gmail.com',781566570,'12','France','Vernon',27200,0,'bb',NULL),
	(35,'Star','Poke','4052002','cc@gmail.com',781566570,'12','France','Vernon',27200,12,'cc',NULL),
	(36,'Monfret','ROMAIN','4052002','dd@gmail.com',781566570,'12','France','Vincennes',93400,0,'dd',NULL),
	(38,'Star','Poke','4052002','vv@gmail.com',781566570,'12','France','Vernon',27200,0,'vv',NULL),
	(39,'Star','Poke','4052002','admin@azza.com',781566570,'12','France','Vernon',27200,0,'11',NULL),
	(40,'Star','Poke','4052002','admin@efzeds.com',781566570,'12','France','Vernon',27200,0,'azaz',NULL),
	(41,'Star','Poke','4052002','admin@zaert.com',781566570,'12','France','Vernon',27200,0,'sdf',NULL),
	(42,'Star','Poke','4052002','aze@zae.com',781566570,'12','France','Vernon',27200,12,'zezr',NULL),
	(43,'Star','Poke','0','admin@zae.com',781566570,'6','France','Vernon',27200,0,'Oceane04',NULL),
	(44,'Star','Poke','4052002','admin@zearty.com',781566570,'12','France','Vernon',27200,12,'eza',NULL),
	(45,'Star','Poke','0','azezeaeaee@gmail.com',781566570,'12','France','Vernon',27200,0,'zaezae',NULL),
	(46,'Monfret','ROMAIN','4052002','admin@zaezeaeza.com',781566570,'12','France','Vincennes',93400,0,'12',NULL),
	(47,'Star','Poke','4052002','admin@egkzhjral.com',781566570,'12','France','Vernon',27200,0,'ezrazr',NULL),
	(48,'Monfret','ROMAIN','4052002','adminrezr@gmail.com',781566570,'12','France','Vincennes',93400,0,'dezr',NULL),
	(49,'Star','Poke','4052002','admin@rdfghj.com',781566570,'6','France','Vernon',27200,0,'\'(§§è',NULL),
	(50,'Star','Poke','4052002','zeae04@gmail.com',781566570,'12','France','Vernon',27200,0,'zaeé',NULL),
	(51,'Star','Poke','4052002','sdqzd@gmail.com',781566570,'12','France','Vernon',27200,0,'zer',NULL),
	(52,'Star','Poke','4052002','admin@zesrdfghj.com',781566570,'12','France','Vernon',27200,0,'erztyj',NULL),
	(53,'Star','Poke','4052002','admin@azef.com',781566570,'12','France','Vernon',27200,0,'dsfqfqf',NULL),
	(54,'ef','sdf','29121978','aa@aa.fer',921,'0','FR','Montreuil',9322,0,'toto',NULL),
	(55,'Ef','Sdf','29121978','aa@aa.fhjr',0,'0','FR','Montreuil',9322,0,'jh',NULL),
	(56,'NOM1','PRENOM1','29121978','aa@aa.com',102,'0','FR','Montreuil',9322,0,'jh',NULL),
	(57,'NOM2','OPRENOM1','29192929','sdlfkj@fs.fr',101,'0','zdf','sdg',91929,0,'toto',NULL),
	(58,'Suuuu','Luc','0','ddd@gmail.com',651625642,'0','France','Paris',75116,11,'kldnsm',NULL),
	(59,'suuuu','luc','0','cccccccccccc@gmail.com',651625642,'0','France','Paris',75116,11,'dkfbjlnkvmsù',NULL),
	(60,'test','test','30','test@test.fr',606060606,'0','Liban','Rennes',55555,0,'test',NULL),
	(61,'Leiv','Bénédicte','30','coucou@gmail.com',89349308,'8','franche','rennet',33333,58,'azert',NULL),
	(62,'suuuu','luc','16','hh@gmail.com',651625642,'0','France','Paris',75116,11,'hh',NULL),
	(63,'SUUUU','jeremi','16','ll@gmail.com',651625642,'0','France','Paris',75116,11,'ll',NULL),
	(64,'ezr','jeremi','15','lll@gmail.com',651625642,'0','France','Paris',75116,11,'ggg',NULL),
	(65,'Monfret','Romain','1020470400','aaa@gmail.com',781467248,'0','France','Vernon',27200,0,'aaa',NULL),
	(66,'Star','27200','1648857600','aza@gmail.com',781566570,'6','France','Vernon',27200,0,'aza',NULL),
	(67,'Star','27200','1648857600','azaa@gmail.com',781566570,'0','France','Vernon',27200,12,'aza',NULL),
	(68,'Star','27200','1649030400','xx@gmail.com',781566570,'624a40714929f8.99793215.jpg','France','Vernon',93400,0,'xx',NULL),
	(69,'Star','Roma','1650067200','wx@gmail.com',781566570,'624a5053f16511.26387744.jpg','France','Vernon',93400,0,'wx',NULL),
	(70,'Star','EZA','1649980800','zzz@gmail.com',781566570,'624a50bb1c4aa1.14387107.png','France','Vernon',27200,0,'zzz',NULL),
	(71,'Star','27200','1651276800','abc@gmail.com',781566570,'624a51d492ac15.90866299.png','France','Vernon',27200,0,'abc',NULL),
	(72,'Star','27200','1649030400','acc@gmail.com',781566570,'624a53b0598929.18079340.jpg','France','Vernon',27200,0,'$2y$10$enreOE/EL34g9GobyEwQVu9MSvYaHgp.VBp7UyuwnUt5xHcJ/39R6',NULL),
	(73,'Star','27200','1649030400','ada@gmail.com',781566570,'624a544ad0ffe3.74804975.png','France','Vernon',27200,0,'$2y$10$uJU.f0z7MODeQ7V1JxG7vOmFbl/JSCkn/t/pFrYUOen6fhtrZ0AJG',NULL),
	(74,'Monfret','93400','1649030400','awa@gmail.com',781566570,'624a5490b91268.54915800.png','Vincenne','Vincennes',27200,0,'$2y$10$hbDbQECZbLCH1tfMLb6TxOmPdNkKidaggOucx7sEDkRc21CF3DV7u',NULL),
	(75,'Star','27200','1649376000','aze@gmail.com',781566570,'624a767f4dff80.67050199.jpg','France','Vernon',27200,0,'$2y$10$5BJrUxeNX6ni7u3qmcKmWe4lBJUE4z5l5Gls0OfTQFyjC3m7DlfSm',NULL),
	(76,'Star','27200','1649462400','aqa@gmail.com',781566570,'624a77a883f1d6.11516445.png','France','Vernon',27200,0,'$2y$10$JXXruS2BFPC0PhbLoFgOnOvIrJCB9eH2kMtPBgIBQf31UxpmubMCi',NULL),
	(77,'Star','27200','1649030400','sds@gmail.com',781566570,'624a9a3506c1d0.92088005.png','France','Vernon',27200,0,'$2y$10$C7kjUZtvlpzik2h7wW9EkO9rWw2hL8CwRUrDW0S5vRM8vipMGjRP.',NULL),
	(78,'Star','27200','1648598400','fgf@gmail.com',781566570,'624a9a71e4c1e1.79592225.png','France','Vernon',93400,0,'$2y$10$V/8H7hApNjR4Hm6wxTdUK..bGsatcAspdO1GuW1wSVOMQyd4t920y',NULL),
	(79,'luc','Lucas','','luc@gmail.com',651625642,'624af941de6df3.60680735.jpg','France','Paris',93400,11,'$2y$10$r1GvbYAQ1ivG2TmeFX229O/DHj4XiNq.h4duU4nEzHiBOMZ.dZjeS',NULL),
	(80,'Suuuu','Su','1649030400','suuu@gmail.com',651625642,'624afbcb54ffb9.13444502.png','France','Paris',93400,11,'$2y$10$q/JKLUCSpPAPQtW8keR9x.BCILRrjj8ffHf2mNfltjpANfskaxwDi',NULL),
	(81,'luc','jeremi','','hec@gmail.com',651625642,'624afe65a6bfd0.67739633.jpg','France','Paris',93400,11,'$2y$10$awQGO2gKt5SrE6qrUAdBmeE8IpaBDGd0C9RHRJWJnSOjpXZIoe9mK',NULL),
	(82,'SUUUU','jeremi','1650067200','jerem@gmail.com',651625642,'624b4a7c530961.42952650.jpg','France','Paris',93400,11,'$2y$10$PyVpYtDfjnRKklpO2YXcX.9H6uDU//WezkP4WJODPepqVg4Oh21UO',NULL);

/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
