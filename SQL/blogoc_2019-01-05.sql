# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.7.21)
# Base de données: blogoc
# Temps de génération: 2019-01-05 13:18:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table commentaires
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commentaires`;

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(45) DEFAULT NULL,
  `contenu` text,
  `datePublication` date DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL,
  `is_signal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id_idx` (`id_article`),
  CONSTRAINT `post_id` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `commentaires` WRITE;
/*!40000 ALTER TABLE `commentaires` DISABLE KEYS */;

INSERT INTO `commentaires` (`id`, `auteur`, `contenu`, `datePublication`, `id_article`, `is_signal`)
VALUES
	(1,'max','test','2019-01-01',NULL,NULL),
	(2,'bonjour','test','2019-01-05',6,'0');

/*!40000 ALTER TABLE `commentaires` ENABLE KEYS */;
UNLOCK TABLES;

# Affichage de la table utilisateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utilisateur`;

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;

INSERT INTO `utilisateur` (`id`, `nom`, `mot_de_passe`, `is_admin`)
VALUES
	(1,'admin','21232f297a57a5a743894a0e4a801fc3',1);

/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

