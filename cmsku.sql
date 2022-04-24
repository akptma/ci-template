/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 100411
Source Host           : localhost:3306
Source Database       : cmsku

Target Server Type    : MYSQL
Target Server Version : 100411
File Encoding         : 65001

Date: 2021-07-05 11:59:06
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
  `add` varchar(1) DEFAULT NULL,
  `edit` varchar(1) DEFAULT NULL,
  `detail` varchar(1) DEFAULT NULL,
  `delete` varchar(1) DEFAULT NULL
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
INSERT INTO `acl` VALUES ('1', '9', 'Y', 'Y', 'Y', 'Y', 'Y');

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
INSERT INTO `config` VALUES ('1', 'logo.png', 'Cmsku', 'Dibuat Dengan Cinta');

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
  PRIMARY KEY (`id`,`routes`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '1', '1', '#', 'master data', '#', '<i class=\"la la-home\"></i>', '1', '2021-06-26 16:07:09', '2021-07-04 22:07:52', null);
INSERT INTO `menu` VALUES ('2', '1', '1', 'user', '#', 'master user', '#', '1', '2021-06-26 16:08:09', '2021-06-28 16:52:51', null);
INSERT INTO `menu` VALUES ('3', '3', '1', 'role', '#', 'master role', '#', '1', '2021-06-26 16:08:36', '2021-07-04 22:00:28', null);
INSERT INTO `menu` VALUES ('4', '2', '1', 'menu', '#', 'master menu', '#', '1', '2021-06-26 16:25:12', '2021-07-04 22:00:11', null);
INSERT INTO `menu` VALUES ('5', '2', '6', 'app-config', '#', 'App config', '#', '1', '2021-06-26 16:28:30', '2021-07-04 21:58:26', null);
INSERT INTO `menu` VALUES ('6', '2', '6', '#', 'Configs', '#', '<i class=\"la la-terminal\"></i>', '1', '2021-06-28 15:10:54', '2021-07-04 22:08:10', null);
INSERT INTO `menu` VALUES ('7', '1', '6', 'acl', '#', 'Access Control List', '', '1', '2021-07-03 11:08:45', '2021-07-04 21:58:30', null);
INSERT INTO `menu` VALUES ('8', '3', '6', 'menu-config', '#', 'menu config', '', '1', '2021-07-04 11:45:28', null, null);
INSERT INTO `menu` VALUES ('9', '3', '9', '#', 'Develop', '#', '<i class=\"la la-cog\"></i>', '1', '2021-07-04 21:41:36', '2021-07-04 22:08:13', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrator', '1', '2021-06-21 14:22:41', '2021-06-26 11:46:18');
INSERT INTO `roles` VALUES ('2', 'admin', '1', '2021-06-25 15:53:35', null);
INSERT INTO `roles` VALUES ('3', 'users', '1', '2021-06-26 11:29:12', '2021-06-26 11:30:06');

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
  PRIMARY KEY (`id`,`username`,`email`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'super141', 'Andika Pratama', 'super@cmsku.com', '1', '3e9345ae1e148b7fbb82e8d84ed4f058b0f1827f2447249f97af1b6fb3b979d718d0cd50e092f95df20ccf022df66d6562c982fcda1fc9e368b9551ef8615229xOArwDx5xJi9ygYjPmVXCx986T3PGlPVyG1Ja69Wnf0=', null, 'default.png', '2021-07-05 11:05:26', null, null);
INSERT INTO `users` VALUES ('2', '2', 'demo212', 'Demo', 'demo@cmsku.com', '1', 'b120e7dc13c271ad916c528cc021512e049d99e66ede398d83b61e9f15da9d30c3b2cb55c23b5b03d833f2425908329dc57e6f4da24b458608a78a30db837248W8w0P1vcJ5NahpLcDaD63k6dUavJAIPkiEEUXX/MCJM=', null, 'default.png', '2021-07-05 11:11:05', '2021-07-05 11:19:02', '2021-07-05 11:18:48');
INSERT INTO `users` VALUES ('3', '3', 'users203', 'Users', 'users@cmsku.net', '1', 'db4a00c1b4dd44c46945b7dfaf220e2335b3d50966eea63a682ce0fbea3465bc58732a316cb97ee9bb1f4c8b7671695d0996a39d57599287c968db0caf51bfe9brKqbYxRT92LmTiUnRyb9cnLfBSjduoIwLb1NPYB0gM=', null, 'default.png', '2021-07-05 11:11:27', '2021-07-05 11:19:04', '2021-07-05 11:18:42');
SET FOREIGN_KEY_CHECKS=1;
