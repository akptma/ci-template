/*
Navicat MySQL Data Transfer

Source Server         : LOCALHEART
Source Server Version : 100411
Source Host           : localhost:3306
Source Database       : cmsku

Target Server Type    : MYSQL
Target Server Version : 100411
File Encoding         : 65001

Date: 2022-04-24 10:56:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acl
-- ----------------------------
DROP TABLE IF EXISTS `acl`;
CREATE TABLE `acl` (
  `id_user` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `akses` varchar(1) NOT NULL,
  `add` varchar(1) DEFAULT '',
  `edit` varchar(1) DEFAULT NULL,
  `detail` varchar(1) DEFAULT NULL,
  `delete` varchar(1) DEFAULT '',
  KEY `fk_users` (`id_user`),
  KEY `fk_menu` (`id_menu`),
  CONSTRAINT `fk_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id`),
  CONSTRAINT `fk_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of acl
-- ----------------------------
INSERT INTO `acl` VALUES ('1', '1', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '2', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '3', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '4', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '5', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '6', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '7', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '8', 'Y', 'Y', 'Y', 'Y', 'Y');
INSERT INTO `acl` VALUES ('1', '9', 'N', 'N', 'N', 'N', 'N');
INSERT INTO `acl` VALUES ('1', '10', 'N', 'N', 'N', 'N', 'N');

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_logo` varchar(255) DEFAULT NULL,
  `nav_brand` varchar(255) DEFAULT NULL,
  `foo_brand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'logo.png', 'CMSKU', 'Dibuat Dengan Cinta');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) DEFAULT NULL,
  `kode_menu` varchar(255) DEFAULT NULL,
  `routes` varchar(255) NOT NULL DEFAULT '#',
  `title_menu` varchar(255) NOT NULL DEFAULT '#',
  `nama_menu` varchar(255) NOT NULL DEFAULT '#',
  `icons` varchar(255) DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`routes`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '1', '1', '#', 'master data', '#', '<i class=\"la la-home\"></i>', '1', '2021-06-26 16:07:09', '2021-08-17 20:16:14', null);
INSERT INTO `menu` VALUES ('2', '1', '1', 'user', '#', 'master user', '#', '1', '2021-06-26 16:08:09', '2021-07-08 22:43:07', null);
INSERT INTO `menu` VALUES ('3', '2', '1', 'role', '#', 'master role', '#', '1', '2021-06-26 16:08:36', '2021-07-08 22:43:26', null);
INSERT INTO `menu` VALUES ('4', '3', '1', 'menu', '#', 'master menu', '#', '1', '2021-06-26 16:25:12', '2021-07-08 22:43:27', null);
INSERT INTO `menu` VALUES ('5', '2', '5', '#', 'Configs', '#', '<i class=\"la la-terminal\"></i>', '1', '2021-06-28 15:10:54', '2022-04-24 10:21:24', null);
INSERT INTO `menu` VALUES ('6', '2', '5', 'app-config', '#', 'App config', '#', '1', '2021-06-26 16:28:30', '2022-04-24 10:23:49', null);
INSERT INTO `menu` VALUES ('7', '1', '5', 'acl', '#', 'Access Control List', '', '1', '2021-07-03 11:08:45', '2022-04-24 10:23:51', null);
INSERT INTO `menu` VALUES ('8', '3', '5', 'menu-config', '#', 'menu config', '', '1', '2021-07-04 11:45:28', '2022-04-24 10:23:54', null);
INSERT INTO `menu` VALUES ('9', '3', '9', '#', 'Develop', '#', '<i class=\"la la-cog\"></i>', '1', '2021-08-17 20:20:44', '2021-08-17 20:22:02', null);
INSERT INTO `menu` VALUES ('10', '1', '9', 'backup-db', '#', 'backup-database', '', '1', '2021-08-17 20:22:44', null, null);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(150) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrator', '1', '2021-06-21 14:22:41', '2021-06-26 11:46:18');
INSERT INTO `roles` VALUES ('2', 'admin', '1', '2021-06-25 15:53:35', '2021-07-15 11:09:51');
INSERT INTO `roles` VALUES ('3', 'users', '1', '2021-06-26 11:29:12', '2021-07-15 11:13:15');
INSERT INTO `roles` VALUES ('4', 'customers', '1', '2021-08-17 19:52:44', null);

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `tanggal` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nominal` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('2022-01-06', 'TEST 1', '20000');
INSERT INTO `transaksi` VALUES ('2022-01-07', 'TEST 2', '100000');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `nama` varchar(150) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `password_reset` varchar(255) DEFAULT NULL,
  `img` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles` (`role_id`),
  CONSTRAINT `roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'super141', 'Andika Pratama', 'super@cmsku.com', '1', '74a94a1c11605a97d434fab0843d6ba71f844832f4c2b6f4c51f91e469fd899df1b9d914f3c9bcf2edc3383328960fbb98c6dd2cf460d4c0f0255e95419888e2YymiyTIj6HkYt5ZFX1p57leVMVCfPDc4pnFaRyofgug=', null, 'default.png', '2021-07-05 11:05:26', '2022-04-24 00:32:43', null);
INSERT INTO `users` VALUES ('2', '2', 'demo212', 'Demo', 'demo@cmsku.com', '0', 'b120e7dc13c271ad916c528cc021512e049d99e66ede398d83b61e9f15da9d30c3b2cb55c23b5b03d833f2425908329dc57e6f4da24b458608a78a30db837248W8w0P1vcJ5NahpLcDaD63k6dUavJAIPkiEEUXX/MCJM=', null, 'default.png', '2021-07-05 11:11:05', '2022-04-24 01:00:43', '2022-04-24 01:00:43');
INSERT INTO `users` VALUES ('3', '3', 'raden553', 'Raden Fatah', 'raden@gmail.com', '0', 'b53f9c2bef4d35913663f242b85cf396d7408464feb1cc9f2bade7fe57a13ed34ad461a7d5fc462ede703425eb49f6923c22e66dea331505ac3e622940d834e70wF6CxSPKtw29MlDfll9hA6ce8b5c5EbbpsE4X4D/d8=', null, 'default.png', '2021-08-17 20:20:14', '2022-04-24 01:00:33', '2022-04-24 01:00:33');
INSERT INTO `users` VALUES ('4', '1', 'admin', 'Andika Pratama', 'engkapratama56@gmail.com', '0', '9c83d1969a89753adf743814b36e50699737166a7ac28e9e69f6da093062a9d4d23a843b2725b0a0467d5c81ee1b4df6494b3555c474eb11721235a88c20637cxBF9iZZasPZHN705uDX/sRznb8C8U2Th6Pj9oQzfjrk=', null, 'default.jpg', '2022-04-24 00:35:04', '2022-04-24 01:00:39', '2022-04-24 01:00:39');

-- ----------------------------
-- Table structure for users_backup
-- ----------------------------
DROP TABLE IF EXISTS `users_backup`;
CREATE TABLE `users_backup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `nama` varchar(150) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `password_reset` varchar(255) DEFAULT NULL,
  `img` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `backup_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users_backup
-- ----------------------------
DROP TRIGGER IF EXISTS `status_updt`;
DELIMITER ;;
CREATE TRIGGER `status_updt` AFTER UPDATE ON `menu` FOR EACH ROW BEGIN
	IF NEW.status = 0 AND OLD.kode_menu = OLD.id
	THEN
	  UPDATE menu SET status = 0 WHERE kode_menu = OLD.id;
	END IF;
	
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `upd_users`;
DELIMITER ;;
CREATE TRIGGER `upd_users` AFTER UPDATE ON `roles` FOR EACH ROW BEGIN
IF new.status = 0
THEN
	UPDATE users SET status = 0 WHERE role_id = old.id;
END IF;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_access_upd`;
DELIMITER ;;
CREATE TRIGGER `hapus_access_upd` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
	IF NEW.status = 0
	THEN
	  DELETE FROM acl WHERE id_user = OLD.id;
	END IF;
	
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `hapus_access_del`;
DELIMITER ;;
CREATE TRIGGER `hapus_access_del` AFTER DELETE ON `users` FOR EACH ROW BEGIN
	DELETE FROM acl WHERE id_user = old.id;
END
;;
DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;
