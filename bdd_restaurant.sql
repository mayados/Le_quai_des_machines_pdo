-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour restaurant
CREATE DATABASE IF NOT EXISTS `restaurant` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `restaurant`;

-- Listage de la structure de la table restaurant. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id-categorie` int(11) NOT NULL,
  `nom-categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id-categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table restaurant.categorie : ~3 rows (environ)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id-categorie`, `nom-categorie`) VALUES
	(1, 'entree'),
	(2, 'plat'),
	(3, 'dessert');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. jour
CREATE TABLE IF NOT EXISTS `jour` (
  `id-jour` int(11) NOT NULL,
  `nom-jour` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id-jour`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table restaurant.jour : ~6 rows (environ)
DELETE FROM `jour`;
/*!40000 ALTER TABLE `jour` DISABLE KEYS */;
INSERT INTO `jour` (`id-jour`, `nom-jour`) VALUES
	(1, 'Lundi'),
	(2, 'Mardi'),
	(3, 'Mercredi'),
	(4, 'Jeudi'),
	(5, 'Vendredi'),
	(6, 'Samedi'),
	(7, 'Dimanche');
/*!40000 ALTER TABLE `jour` ENABLE KEYS */;

-- Listage de la structure de la table restaurant. plat
CREATE TABLE IF NOT EXISTS `plat` (
  `id-plat` int(11) NOT NULL,
  `intitule` varchar(200) NOT NULL DEFAULT '0',
  `id-jour` int(11) NOT NULL DEFAULT '0',
  `id-categorie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id-plat`),
  KEY `id-jour` (`id-jour`),
  KEY `id-categorie` (`id-categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table restaurant.plat : ~2 rows (environ)
DELETE FROM `plat`;
/*!40000 ALTER TABLE `plat` DISABLE KEYS */;
INSERT INTO `plat` (`id-plat`, `intitule`, `id-jour`, `id-categorie`) VALUES
	(1, 'Salade ou velouté de mâche nantaise', 1, 1),
	(2, 'Pavé de sandre au beurre blanc du Pays Nantais (riz ou pomme de terre)', 1, 2),
	(3, 'Fondant baulois et fleur de glace Pêche de Vigne', 1, 3),
	(4, 'Rillettes au lapin', 2, 1),
	(5, 'Chaudrée de palourdes', 2, 2),
	(6, 'Fouace perdue aux fruits rouges', 2, 3),
	(7, 'Grenouilles des marais à la crème', 3, 1),
	(8, 'canard de Challans plongé dans une mare de sauce au muscadet (Accompagnement légumes de saison)', 3, 2),
	(9, 'Fouace perdue aux fruits rouges', 3, 3),
	(10, 'Pâté de foie chaud', 4, 1),
	(11, 'Bardatte aux herbes fraîches sur un fondu de carotte et poireau primeur', 4, 2),
	(12, 'Fondue de curé Nantais gratinée et variante de poires', 4, 3),
	(13, 'Poires tapées au vin', 5, 1),
	(14, 'Plateau de fruits de mer de l’Atlantique', 5, 2),
	(15, 'Tourton du pays nantais et son Curé nantais', 5, 3),
	(16, 'Truite fumée, crème ciboulette', 6, 1),
	(17, 'Saucisse au Muscadet et sa robe de crêpe au sarrasin', 6, 2),
	(18, 'Gâteau nantais et crémeux de yaourt', 6, 3),
	(19, 'Salade de Langouille', 7, 1),
	(20, 'Carré de côtes de porc braisé', 7, 2),
	(21, 'Petit beurre sur lit de Confiture de Muroise du Pays Nantais', 7, 3);
/*!40000 ALTER TABLE `plat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
