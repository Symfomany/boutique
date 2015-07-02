-- ----------------------------------------------------------------------------
-- Software        :  JPDB Admin for MariaDB - Free Edition [Linux]
-- Server Version  :  mariadb.org binary distribution - 5.5.43-MariaDB-1~trusty-log
-- Database        :  boutique
-- Host            :  localhost
-- Date/Time       :  07/02/2015 01:02:26 PM
-- ----------------------------------------------------------------------------

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';
SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT;
SET NAMES utf8;

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `category` DISABLE KEYS;
SET AUTOCOMMIT=0;
INSERT INTO `category` VALUES ('1', 'Smartphone', 'Smartphone');
INSERT INTO `category` VALUES ('2', 'Tablette', 'Tablette');
COMMIT;
ALTER TABLE `category` ENABLE KEYS;

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `description` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_product_id` (`id`),
  UNIQUE KEY `uk_product_title` (`title`),
  KEY `indx_product_id` (`id`),
  KEY `new_foreign_key_421874400675231` (`category_id`),
  CONSTRAINT `new_foreign_key_421874400675231` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

ALTER TABLE `product` DISABLE KEYS;
SET AUTOCOMMIT=0;
INSERT INTO `product` VALUES ('1', 'Iphone 5s', 'Test', '1', '1');
INSERT INTO `product` VALUES ('2', NULL, 'Test', '0', '2');
COMMIT;
ALTER TABLE `product` ENABLE KEYS;

DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag` (
  `product_id` int(60) NOT NULL DEFAULT '0',
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`,`tag_id`),
  KEY `new_foreign_key_421874617490625` (`tag_id`),
  CONSTRAINT `new_foreign_key_421874615954745` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `new_foreign_key_421874617490625` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `product_tag` DISABLE KEYS;
SET AUTOCOMMIT=0;
INSERT INTO `product_tag` VALUES ('1', '1');
INSERT INTO `product_tag` VALUES ('1', '2');
COMMIT;
ALTER TABLE `product_tag` ENABLE KEYS;

DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

ALTER TABLE `tag` DISABLE KEYS;
SET AUTOCOMMIT=0;
INSERT INTO `tag` VALUES ('1', 'GPS');
INSERT INTO `tag` VALUES ('2', 'Siri');
INSERT INTO `tag` VALUES ('3', 'Map');
COMMIT;
ALTER TABLE `tag` ENABLE KEYS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET SQL_MODE=@OLD_SQL_MODE;
SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT;
