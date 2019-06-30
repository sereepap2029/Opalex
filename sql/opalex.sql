/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 80016
Source Host           : localhost:3306
Source Database       : opalex

Target Server Type    : MYSQL
Target Server Version : 80016
File Encoding         : 65001

Date: 2019-07-01 00:30:15
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `firstname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `lastname` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `username` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `prefix` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `phone` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1234567890', 'sadmin', 'sadmin', 'sadmin', 'sadmin', 'ddd', 'นาย', null);

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8_unicode_ci,
  `sort_order` bigint(11) DEFAULT '999',
  `main_pic` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('0fabae23f4', 'Tate no Yuusha no Nariagari', 'dasdas', '999', '0fabae23f4-1561915777_main.png');

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `maid`
-- ----------------------------
DROP TABLE IF EXISTS `maid`;
CREATE TABLE `maid` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `maid_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maid_list_des` text COLLATE utf8_unicode_ci,
  `maid_description` text COLLATE utf8_unicode_ci,
  `maid_short_des` text COLLATE utf8_unicode_ci,
  `thumb_pic` text COLLATE utf8_unicode_ci,
  `main_pic` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of maid
-- ----------------------------

-- ----------------------------
-- Table structure for `perm`
-- ----------------------------
DROP TABLE IF EXISTS `perm`;
CREATE TABLE `perm` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `admin_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` enum('delete','data','account','req_withdraw','approve_withdraw','report','send_data','select_adjuster','super_data','inform','verify') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of perm
-- ----------------------------
INSERT INTO `perm` VALUES ('1', '1234567890', 'account');
INSERT INTO `perm` VALUES ('109', '1234567890', 'data');
INSERT INTO `perm` VALUES ('110', '1234567890', 'delete');
