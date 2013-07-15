/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50096
Source Host           : 127.0.0.1:3306
Source Database       : myci

Target Server Type    : MYSQL
Target Server Version : 50096
File Encoding         : 65001

Date: 2013-07-08 11:32:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('10', '中国', 'aaa');
INSERT INTO `users` VALUES ('12', 'sdfsdfdsf', 'sdfdsf');
INSERT INTO `users` VALUES ('14', '士大夫撒旦法大赛', 'aaaaaa');
