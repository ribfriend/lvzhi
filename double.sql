/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50133
Source Host           : 127.0.0.1:3306
Source Database       : double

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2015-03-13 21:56:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for agent
-- ----------------------------
DROP TABLE IF EXISTS `agent`;
CREATE TABLE `agent` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `auth_id` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `chanel` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `chanel_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telphone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` datetime NOT NULL,
  `is_auth` int(10) unsigned NOT NULL DEFAULT '0',
  `remark` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_agent_1` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of agent
-- ----------------------------
INSERT INTO `agent` VALUES ('1', '1', '20150313000000', '0', '淘宝', '1', '测试', '13800138000', '广东深圳', '2015-12-31 09:55:38', '0', '123123', '一级代理商');
INSERT INTO `agent` VALUES ('3', '2', '2015031320000', '1', '淘宝', '1', '测试内容', '13800138000', '广东甚则很难', '2015-12-31 17:20:57', '0', '2342342', '二级代理商');
INSERT INTO `agent` VALUES ('4', '3', '20150313000000', '3', '淘宝', '1', '测试', '13800138000', '广东深圳', '2015-12-31 09:55:38', '0', '123123', '一级代理商');
INSERT INTO `agent` VALUES ('5', '4', '20150313000000', '4', '淘宝', '1', '测试', '13800138000', '广东深圳', '2015-12-31 09:55:38', '0', '123123', '一级代理商');
INSERT INTO `agent` VALUES ('6', '2', '20150313000000', '0', '淘宝', '1', '测试2', '13800138000', '广东深圳', '2015-12-31 09:55:38', '0', '123123', '一级代理商');
INSERT INTO `agent` VALUES ('7', '2', '20150313000000', '6', '淘宝', '1', '测试2', '13800138000', '广东深圳', '2015-12-31 09:55:38', '0', '123123', '一级代理商');

-- ----------------------------
-- Table structure for double_batch_content
-- ----------------------------
DROP TABLE IF EXISTS `double_batch_content`;
CREATE TABLE `double_batch_content` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `contentId` int(11) NOT NULL,
  `isCheck` tinyint(1) NOT NULL COMMENT '0为未发送，1为发送',
  `createTime` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0为失败，1为成功',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of double_batch_content
-- ----------------------------

-- ----------------------------
-- Table structure for double_content
-- ----------------------------
DROP TABLE IF EXISTS `double_content`;
CREATE TABLE `double_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `createtime` int(11) NOT NULL,
  `is_del` tinyint(1) DEFAULT '0',
  `updatetime` int(11) DEFAULT NULL,
  `is_batch` tinyint(1) DEFAULT NULL,
  `status` smallint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of double_content
-- ----------------------------
INSERT INTO `double_content` VALUES ('1', 'ad', 'ad', 'asd', '123123123', '1', '112313', '1', '1');
INSERT INTO `double_content` VALUES ('2', '测试', 'asdfasdfasdfasdf', 'adfadsfasdfadf', '1425600000', '0', '1427414400', '0', '0');

-- ----------------------------
-- Table structure for double_user
-- ----------------------------
DROP TABLE IF EXISTS `double_user`;
CREATE TABLE `double_user` (
  `id` varchar(255) NOT NULL,
  `wx_openid` varchar(255) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `isdel` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of double_user
-- ----------------------------

-- ----------------------------
-- Table structure for man_config
-- ----------------------------
DROP TABLE IF EXISTS `man_config`;
CREATE TABLE `man_config` (
  `id` int(11) NOT NULL,
  `company_tel` varchar(30) NOT NULL DEFAULT '' COMMENT '公司电话',
  `company_fax` varchar(30) NOT NULL DEFAULT '' COMMENT '公司传真',
  `site_name` varchar(30) NOT NULL DEFAULT '' COMMENT '站点名称',
  `site_icp` varchar(60) NOT NULL DEFAULT '' COMMENT '站点备案信息',
  `site_copy` varchar(60) NOT NULL DEFAULT '' COMMENT '站点版权',
  `site_logo` varchar(255) NOT NULL DEFAULT '' COMMENT '站点LOGO',
  `site_page` int(11) NOT NULL DEFAULT '0' COMMENT '翻页数',
  `site_postnum` int(11) NOT NULL DEFAULT '0' COMMENT '结贴数',
  `post_time` int(11) NOT NULL DEFAULT '0' COMMENT '发帖间隔时间',
  `role_value` text NOT NULL COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of man_config
-- ----------------------------
INSERT INTO `man_config` VALUES ('1', '0755-83800000', '370052899@qq.com', '测试', '粤ICP备12345678号-1', '@ceshi 2015', '', '1', '1', '5', '');

-- ----------------------------
-- Table structure for man_user
-- ----------------------------
DROP TABLE IF EXISTS `man_user`;
CREATE TABLE `man_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `username` varchar(64) DEFAULT NULL COMMENT '管理员用户名',
  `password` varchar(50) DEFAULT NULL COMMENT '管理员密码',
  `livisit_date` int(11) DEFAULT NULL COMMENT '登录时间',
  `livisit_ip` varchar(64) DEFAULT NULL COMMENT '登录IP',
  `user_status` smallint(6) DEFAULT NULL COMMENT '管理员状态',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of man_user
-- ----------------------------
INSERT INTO `man_user` VALUES ('1', 'admin', '0192023a7bbd73250516f069df18b500', '0', '\'\'', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '25d55ad283aa400af464c76d713c07ad');
