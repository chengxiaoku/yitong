/*
Navicat MySQL Data Transfer

Source Server         : 本地连接
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : ytjz

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-02-27 17:54:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_adinm_role_priv
-- ----------------------------
DROP TABLE IF EXISTS `tbl_adinm_role_priv`;
CREATE TABLE `tbl_adinm_role_priv` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roleid` int(10) DEFAULT NULL COMMENT '角色ID',
  `module` varchar(225) DEFAULT NULL COMMENT '模块',
  `controller` varchar(225) DEFAULT NULL COMMENT '控制器',
  `action` varchar(225) DEFAULT NULL COMMENT '方法',
  `data` varchar(60) DEFAULT NULL COMMENT '传参',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_adinm_role_priv
-- ----------------------------
INSERT INTO `tbl_adinm_role_priv` VALUES ('1', '2', 'a:10:{i:0;s:5:\"Admin\";i:1;s:5:\"Admin\";i:2;s:5:\"Admin\";i:3;s:5:\"Admin\";i:4;s:5:\"Admin\";i:5;s:5:\"Admin\";i:6;s:5:\"Admin\";i:7;s:5:\"Admin\";i:8;s:5:\"Admin\";i:9;s:5:\"Admin\";}', 'a:10:{i:0;s:5:\"Index\";i:1;s:5:\"Video\";i:2;s:10:\"Profession\";i:3;s:6:\"Member\";i:4;s:5:\"Photo\";i:5;s:6:\"Inform\";i:6;s:6:\"Adminn\";i:7;s:5:\"Admin\";i:8;s:4:\"Role\";i:9;s:3:\"Set\";}', 'a:10:{i:0;s:5:\"index\";i:1;s:5:\"index\";i:2;s:5:\"index\";i:3;s:5:\"index\";i:4;s:5:\"index\";i:5;s:5:\"index\";i:6;s:5:\"index\";i:7;s:5:\"Index\";i:8;s:5:\"Index\";i:9;s:5:\"index\";}', null);
INSERT INTO `tbl_adinm_role_priv` VALUES ('9', '5', 'a:10:{i:0;s:5:\"Admin\";i:1;s:5:\"Admin\";i:2;s:5:\"Admin\";i:3;s:5:\"Admin\";i:4;s:5:\"Admin\";i:5;s:5:\"Admin\";i:6;s:5:\"Admin\";i:7;s:5:\"Admin\";i:8;s:5:\"Admin\";i:9;s:5:\"Admin\";}', 'a:10:{i:0;s:5:\"Index\";i:1;s:5:\"Video\";i:2;s:10:\"Profession\";i:3;s:6:\"Member\";i:4;s:5:\"Photo\";i:5;s:6:\"Inform\";i:6;s:6:\"Adminn\";i:7;s:5:\"Admin\";i:8;s:4:\"Role\";i:9;s:3:\"Set\";}', 'a:10:{i:0;s:5:\"index\";i:1;s:5:\"index\";i:2;s:5:\"index\";i:3;s:5:\"index\";i:4;s:5:\"index\";i:5;s:5:\"index\";i:6;s:5:\"index\";i:7;s:5:\"Index\";i:8;s:5:\"Index\";i:9;s:5:\"index\";}', null);
INSERT INTO `tbl_adinm_role_priv` VALUES ('37', '3', 'a:3:{i:0;s:5:\"Admin\";i:1;s:5:\"Admin\";i:2;s:5:\"Admin\";}', 'a:3:{i:0;s:6:\"Member\";i:1;s:5:\"Photo\";i:2;s:5:\"Admin\";}', 'a:3:{i:0;s:5:\"index\";i:1;s:5:\"index\";i:2;s:5:\"Index\";}', null);
INSERT INTO `tbl_adinm_role_priv` VALUES ('38', '1', 'a:2:{i:0;s:5:\"Admin\";i:1;s:5:\"Admin\";}', 'a:2:{i:0;s:5:\"Photo\";i:1;s:6:\"Inform\";}', 'a:2:{i:0;s:5:\"index\";i:1;s:5:\"index\";}', null);

-- ----------------------------
-- Table structure for tbl_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` varchar(60) DEFAULT NULL COMMENT '密码',
  `roleid` smallint(5) DEFAULT NULL COMMENT '角色',
  `lastip` varchar(15) DEFAULT NULL COMMENT '最后一次登陆IP',
  `lasttime` datetime DEFAULT NULL COMMENT '最后一次登陆时间',
  `email` varchar(40) DEFAULT NULL COMMENT '邮箱地址',
  `realname` varchar(60) DEFAULT NULL COMMENT '真实姓名',
  `addtime` datetime DEFAULT NULL COMMENT '添加时间',
  `headimg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES ('1', 'admin', '670b14728ad9902aecba32e22fa4f6bd', '2', '127.0.0.1', '2017-02-27 17:52:56', null, null, null, null);
INSERT INTO `tbl_admin` VALUES ('3', 'test', '670b14728ad9902aecba32e22fa4f6bd', '3', '192.168.1.101', '2016-12-08 19:17:01', null, null, null, null);
INSERT INTO `tbl_admin` VALUES ('10', 'qqq', '670b14728ad9902aecba32e22fa4f6bd', '1', '', '2016-12-19 17:41:12', null, null, null, null);

-- ----------------------------
-- Table structure for tbl_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin_role`;
CREATE TABLE `tbl_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL COMMENT '角色名称',
  `description` varchar(255) DEFAULT NULL COMMENT '描述',
  `disabled` enum('0','1') DEFAULT '1' COMMENT '是否启用 0未启用1已启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_admin_role
-- ----------------------------
INSERT INTO `tbl_admin_role` VALUES ('1', '1', 'sdf', '0');
INSERT INTO `tbl_admin_role` VALUES ('2', '2', '3.0', '1');
INSERT INTO `tbl_admin_role` VALUES ('3', '11', 'asd', '1');
INSERT INTO `tbl_admin_role` VALUES ('4', '1234', 'safd', '1');
INSERT INTO `tbl_admin_role` VALUES ('5', '1asd', 'adsf', '1');
INSERT INTO `tbl_admin_role` VALUES ('6', 'dzvs', 'sdf', '1');
INSERT INTO `tbl_admin_role` VALUES ('8', '1321', '232', '1');
INSERT INTO `tbl_admin_role` VALUES ('9', 'wwwww4', '2313213', '1');
INSERT INTO `tbl_admin_role` VALUES ('10', 'asdas ', 'sad', '1');

-- ----------------------------
-- Table structure for tbl_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL COMMENT '课程名称',
  `description` varchar(20) DEFAULT NULL COMMENT '课程描述',
  `course_type` enum('profession','public') DEFAULT NULL COMMENT '课时类型 profession专业课，public公需课',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态 0禁止1启用',
  `videos` int(10) DEFAULT NULL COMMENT '视频数量',
  `add_time` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT '添加人ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_company
-- ----------------------------
DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(10) DEFAULT NULL COMMENT '主表ID',
  `occ_a` varchar(255) DEFAULT NULL COMMENT '代码组织机构证',
  `occ_b` varchar(255) DEFAULT NULL COMMENT '代码组织机构证',
  `occ_image` varchar(255) DEFAULT NULL COMMENT '代码组织机构证扫描件',
  `city` varchar(255) DEFAULT NULL COMMENT '所属城市',
  `company_name` varchar(255) DEFAULT NULL COMMENT '公司名称',
  `company_type` varchar(255) DEFAULT NULL COMMENT '公司性质',
  `leader` varchar(20) DEFAULT NULL COMMENT '领导',
  `leader_tel` varchar(20) DEFAULT NULL COMMENT '领导人手机',
  `company_tel` varchar(20) DEFAULT NULL COMMENT '公司电话',
  `company_address` varchar(255) DEFAULT NULL COMMENT '公司地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_company
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_course
-- ----------------------------
DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL COMMENT '课时名称',
  `category_id` int(10) DEFAULT NULL COMMENT '分类ID',
  `course_type` enum('profession','public') DEFAULT NULL COMMENT '课时类型 profession专业课，public公需课',
  `duration` float(10,0) DEFAULT NULL COMMENT '课程时长',
  `description` varchar(255) DEFAULT NULL COMMENT '简介',
  `status` enum('0','1') DEFAULT '1' COMMENT '课程状态0禁止1启用',
  `video_url` varchar(255) DEFAULT NULL COMMENT '课程地址',
  `add_time` datetime DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL COMMENT '添加人ID',
  `period` int(10) DEFAULT NULL COMMENT '学时',
  `audit` enum('pending','checked','reject','revoke') DEFAULT NULL COMMENT 'audits审核状态：pending待审核、checked已审核、reject拒绝、revoke撤销',
  `grade` int(5) DEFAULT NULL COMMENT '视频等级',
  `type` enum('0','1') DEFAULT NULL COMMENT '视频类型0专需课，1公需课',
  `specialty` varchar(255) DEFAULT NULL COMMENT '专业ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_course
-- ----------------------------
INSERT INTO `tbl_course` VALUES ('1', '1', null, null, null, null, '1', 'Public/upload/20161209/584a464932b94.mp4', '2016-12-27 19:51:36', null, '2', 'checked', '0', null, '1');
INSERT INTO `tbl_course` VALUES ('2', '2', null, null, null, null, '1', 'Public/upload/20161209/584a464932b94.mp4', '2016-12-27 19:51:39', null, '5', 'checked', '0', null, '1');
INSERT INTO `tbl_course` VALUES ('3', '3', null, null, null, null, '1', 'Public/upload/20161209/584a464932b94.mp4', '2016-12-05 19:51:42', null, '2', 'checked', '0', '1', '1');
INSERT INTO `tbl_course` VALUES ('4', '4', null, null, null, null, '1', 'Public/upload/20161209/584a464932b94.mp4', null, null, '4', 'checked', '0', '1', '1');
INSERT INTO `tbl_course` VALUES ('5', '5', null, null, null, null, '1', 'Public/upload/20161209/584a464932b94.mp4', null, null, null, 'checked', '2', '1', '1');
INSERT INTO `tbl_course` VALUES ('6', '9', null, null, '9', '9', '1', '9', '2016-12-07 17:58:24', '1', '9', 'checked', '1', '0', '2');
INSERT INTO `tbl_course` VALUES ('7', '视频测试', null, null, '50', '哈哈哈', '0', 'public/upload/20161208/5848cff989129.mp4', '2016-12-08 11:17:14', '2', '4', 'checked', '2', '0', '1');
INSERT INTO `tbl_course` VALUES ('8', '哈哈哈', null, null, '12', '12', '1', 'public/upload/20161208/5849579a0ba3b.mp4', '2016-12-08 20:52:57', '2', '12', 'reject', '2', '0', '1');
INSERT INTO `tbl_course` VALUES ('9', '测试2', null, null, '50', '123', '1', 'Public/upload/20161209/584a464932b94.mp4', '2016-12-09 13:51:25', '2', '3', 'pending', '1', '0', '1');
INSERT INTO `tbl_course` VALUES ('10', '中级建筑专业视频', null, null, '44', '中级建筑专业视频', '1', 'Public/upload/20161212/584e1f4b7f391.mp4', '2016-12-12 11:53:55', '2', '3', 'checked', '1', '0', '1');
INSERT INTO `tbl_course` VALUES ('11', '公需课视频', null, null, '44', '公需课', '1', 'Public/upload/20161212/584e1ffb78e42.mp4', '2016-12-12 11:57:07', '2', '5', 'checked', '0', '1', '');

-- ----------------------------
-- Table structure for tbl_grade
-- ----------------------------
DROP TABLE IF EXISTS `tbl_grade`;
CREATE TABLE `tbl_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberid` int(11) DEFAULT NULL COMMENT '学员ID',
  `grade` varchar(60) DEFAULT NULL COMMENT '学员成绩',
  `year` varchar(60) DEFAULT NULL COMMENT '成绩的年份',
  `time` varchar(255) DEFAULT NULL COMMENT '考试日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_grade
-- ----------------------------
INSERT INTO `tbl_grade` VALUES ('1', '1', '60', '2016', null);
INSERT INTO `tbl_grade` VALUES ('2', '33', '80', '2016', null);
INSERT INTO `tbl_grade` VALUES ('3', '34', '99', '2016', '2016-12-19');
INSERT INTO `tbl_grade` VALUES ('9', '1', '0', '2016', '2016-12-12 19:01:19');
INSERT INTO `tbl_grade` VALUES ('10', '1', '0', '2016', '2016-12-12 19:01:56');
INSERT INTO `tbl_grade` VALUES ('11', '1', '0', '2016', '2016-12-12 19:06:53');
INSERT INTO `tbl_grade` VALUES ('12', '1', '0', '2016', '2016-12-12 19:09:09');
INSERT INTO `tbl_grade` VALUES ('13', '1', '0', '2016', '2016-12-12 19:10:41');

-- ----------------------------
-- Table structure for tbl_member
-- ----------------------------
DROP TABLE IF EXISTS `tbl_member`;
CREATE TABLE `tbl_member` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT '' COMMENT '姓名',
  `occ_a` varchar(20) DEFAULT '' COMMENT '组织结构代码证第一部分',
  `occ_b` varchar(20) DEFAULT '' COMMENT '第二部分',
  `identity` varchar(255) DEFAULT '' COMMENT '身份证',
  `password` varchar(60) DEFAULT '' COMMENT '密码',
  `thumb` varchar(255) DEFAULT '' COMMENT '个人照片',
  `phone` varchar(20) DEFAULT '' COMMENT '手机号码',
  `level` int(5) DEFAULT '0' COMMENT '0表示初级，1表示中级，2表示高级',
  `sex` enum('female','male') DEFAULT 'male' COMMENT '枚举类型，female女性 、male男性',
  `nation` varchar(255) DEFAULT NULL COMMENT '民族',
  `email` varchar(60) DEFAULT NULL COMMENT '邮箱',
  `company` varchar(100) DEFAULT '' COMMENT '工作单位',
  `educational` enum('0','1','2','3','4','5') DEFAULT '0' COMMENT '0 高中、1专科、2本科、3研究生、4硕士、5博士',
  `profession` int(60) DEFAULT NULL COMMENT '专业',
  `school` varchar(60) DEFAULT NULL COMMENT '学校',
  `graduation_date` datetime DEFAULT NULL COMMENT '毕业时间',
  `duty` varchar(60) DEFAULT NULL COMMENT '行政职务',
  `duty_level` varchar(60) DEFAULT NULL COMMENT '行政级别',
  `total_hour` int(10) DEFAULT NULL COMMENT '总学时',
  `hour` int(10) DEFAULT NULL COMMENT '已完成学时',
  `graduation` enum('0','1') DEFAULT '0' COMMENT '是否毕业 0否1是',
  `fee` decimal(10,0) DEFAULT NULL COMMENT '学费',
  `fee_status` enum('0','1') DEFAULT '0' COMMENT '交费状态 0否1是',
  `training_time` datetime DEFAULT NULL COMMENT '培训时间',
  `courses` int(10) DEFAULT NULL COMMENT '累计课时',
  `add_time` datetime DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL COMMENT '添加人ID',
  `status` enum('0','1') DEFAULT '0' COMMENT '状态 0禁止1启用',
  `role` enum('personal','company') DEFAULT 'personal' COMMENT ' 角色',
  `grade` float DEFAULT '0' COMMENT '成绩',
  `card` varchar(255) DEFAULT NULL COMMENT '身份证照片地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_member
-- ----------------------------
INSERT INTO `tbl_member` VALUES ('1', '程龙飞', '', '', '000000', '670b14728ad9902aecba32e22fa4f6bd', '', '123342424235', '2', 'male', '汉', 'qwhq', '', '2', '1', '河南科技大学', '2016-11-30 00:00:00', '122', null, '12', '123', '0', null, '0', null, null, '2016-12-01 10:43:05', null, '1', 'personal', '55', 'Public/upload/20161219/585771c542eb6.png');
INSERT INTO `tbl_member` VALUES ('30', '小黄', '', '', '12316649979756466', '670b14728ad9902aecba32e22fa4f6bd', 'yitong/Public/upload/20161219/585771c542eb6.png', '15835556552', '0', 'male', '汉', 'asjasdas@gamil.com', '', '1', '1', '河南科技大学', '2016-12-09 00:00:00', '1', '', null, '20', '1', '200', '1', '2016-12-28 00:00:00', '20', '2016-12-19 13:48:19', null, '0', 'personal', '0', 'Public/upload/20161219/585771c542eb6.png');
INSERT INTO `tbl_member` VALUES ('31', '小王', '', '', '222222222222222222', '96e79218965eb72c92a549dd5a330112', 'yitong/Public/upload/20161219/585777d9a7d4e.jpeg', '15635525664', '1', 'male', '汉', 'asjdas@gamil.com', '', '1', '1', '河南科技大学', '2016-12-09 00:00:00', '1', '', null, '20', '1', '200', '1', '2016-12-16 00:00:00', '20', '2016-12-19 14:11:17', null, '0', 'personal', '0', 'Public/upload/20161219/585771c542eb6.png');
INSERT INTO `tbl_member` VALUES ('32', '你妹', '', '', '111111111111101011', '670b14728ad9902aecba32e22fa4f6bd', 'yitong/Public/upload/20161219/58577a27b1301.png', '11111111144', '0', 'male', '汉', '1690112145@qq.com', '', '1', '1111', '河南科技大学', '2016-12-21 00:00:00', '1', '', null, '414', '1', '14141', '1', '2016-12-29 00:00:00', '41414', '2016-12-19 14:16:56', null, '0', 'personal', '0', 'Public/upload/20161219/585771c542eb6.png');
INSERT INTO `tbl_member` VALUES ('33', '阿黄', '', '', '111111111111111111', '670b14728ad9902aecba32e22fa4f6bd', 'yitong/Public/upload/20161219/58577c192fb54.jpeg', '15686654551', '1', 'male', '汉', '1690113145@qq.com', '', '1', '1', '河南科技大学', '2016-12-21 00:00:00', '1', '', null, '20', '1', '200', '1', '2016-12-15 00:00:00', '20', '2016-12-19 14:25:09', null, '0', 'personal', '0', 'Public/upload/20161219/585771c542eb6.png');
INSERT INTO `tbl_member` VALUES ('34', '小赵', '', '', '111111111111111122', '670b14728ad9902aecba32e22fa4f6bd', 'yitong/Public/upload/20161219/58577ee02ed60.jpeg', '15037678210', '1', 'female', '汉', 'asjasdas@gamil.com', '', '3', '1', '河南科技大学', '2016-12-21 00:00:00', '1', '', null, '988', '1', '20', '1', '2016-12-22 00:00:00', '30', '2016-12-19 14:32:57', null, '0', 'personal', '0', 'Public/upload/20161219/585771c542eb6.png');
INSERT INTO `tbl_member` VALUES ('48', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('49', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('50', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('51', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('52', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('53', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('54', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('55', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('56', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('57', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('58', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('59', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('60', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('61', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('62', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('63', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('64', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('65', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('66', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);
INSERT INTO `tbl_member` VALUES ('67', '', '', '', '', '', '', '', '0', 'male', null, null, '', '0', null, null, null, null, null, null, null, '0', null, '0', null, null, null, null, '0', 'personal', '0', null);

-- ----------------------------
-- Table structure for tbl_member_history
-- ----------------------------
DROP TABLE IF EXISTS `tbl_member_history`;
CREATE TABLE `tbl_member_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL COMMENT '学员ID',
  `z_grade` varchar(10) DEFAULT '0' COMMENT '专业成绩',
  `g_grade` varchar(10) DEFAULT '0' COMMENT '公共课成绩',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_member_history
-- ----------------------------
INSERT INTO `tbl_member_history` VALUES ('1', '1', '50', '50.5');

-- ----------------------------
-- Table structure for tbl_member_log
-- ----------------------------
DROP TABLE IF EXISTS `tbl_member_log`;
CREATE TABLE `tbl_member_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_id` int(10) DEFAULT NULL COMMENT '用户ID',
  `video_id` int(10) DEFAULT NULL COMMENT '视频ID',
  `progress` float(10,0) DEFAULT NULL COMMENT '当前进度',
  `end` enum('0','1') DEFAULT '0' COMMENT '视频是否看完 ( 0未看完 1 看完)',
  `add_time` varchar(30) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_member_log
-- ----------------------------
INSERT INTO `tbl_member_log` VALUES ('21', '1', '9', '18', '1', '1481507130', null);
INSERT INTO `tbl_member_log` VALUES ('22', '1', '4', '6', '1', '2016-12-12 10:53:56', null);
INSERT INTO `tbl_member_log` VALUES ('23', '1', '10', '19', '1', '1481519503', null);
INSERT INTO `tbl_member_log` VALUES ('24', '1', '7', '50', '1', '1481521576', null);
INSERT INTO `tbl_member_log` VALUES ('25', '1', '3', '32', '0', '2016-12-12 17:38:20', null);

-- ----------------------------
-- Table structure for tbl_notice
-- ----------------------------
DROP TABLE IF EXISTS `tbl_notice`;
CREATE TABLE `tbl_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `user_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `views` int(10) DEFAULT NULL COMMENT '阅读数量',
  `status` enum('0','1') DEFAULT '1' COMMENT '状态 0禁止表示不显示，1启用表示显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_notice
-- ----------------------------
INSERT INTO `tbl_notice` VALUES ('3', '', null, null, null, null, '1');
INSERT INTO `tbl_notice` VALUES ('4', null, null, null, null, null, '1');
INSERT INTO `tbl_notice` VALUES ('6', null, '114', '2016-12-06 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('7', null, '6', '2016-12-06 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('8', '11111', '666666666666666', '2016-12-19 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('9', null, '5也还好吧的女云', '2016-12-08 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('10', null, '88888888888888', '2016-12-19 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('11', '123456', '43634', '2016-12-19 00:00:00', null, null, '0');
INSERT INTO `tbl_notice` VALUES ('12', '666', '6666', '2016-12-07 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('13', null, '8888888888888888888888888', '2016-12-19 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('14', '99', '999', '2016-12-19 00:00:00', null, null, '1');
INSERT INTO `tbl_notice` VALUES ('15', null, '777777', '2016-12-08 00:00:00', null, null, '1');

-- ----------------------------
-- Table structure for tbl_setting
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE `tbl_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(60) DEFAULT NULL COMMENT '配置信息KEY',
  `setting_value` text COMMENT '相应的值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_setting
-- ----------------------------
INSERT INTO `tbl_setting` VALUES ('1', 'domain_name', '0');
INSERT INTO `tbl_setting` VALUES ('2', 'site_name', '2');
INSERT INTO `tbl_setting` VALUES ('3', 'site_keywords', '3');
INSERT INTO `tbl_setting` VALUES ('4', 'site_description', '41');
INSERT INTO `tbl_setting` VALUES ('5', 'site_status', '1');
INSERT INTO `tbl_setting` VALUES ('6', 'close_reason', '1111');
INSERT INTO `tbl_setting` VALUES ('7', 'all_class_time', '120');

-- ----------------------------
-- Table structure for tbl_specialty
-- ----------------------------
DROP TABLE IF EXISTS `tbl_specialty`;
CREATE TABLE `tbl_specialty` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '专业名称',
  `content` text COMMENT '专业描述',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `level` int(5) DEFAULT NULL COMMENT '专业等级',
  `period` int(10) DEFAULT NULL COMMENT '学时',
  `status` enum('0','1') DEFAULT '0' COMMENT '状态（0启用，1禁用）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_specialty
-- ----------------------------
INSERT INTO `tbl_specialty` VALUES ('34', '11111111', '11111111111111111111111', '2016-12-19 18:07:03', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('1', '建筑', '建筑描述', '2016-11-29 11:15:30', '2', '5', '1');
INSERT INTO `tbl_specialty` VALUES ('3', '原理', '原理描述', '2016-12-09 11:22:57', '0', '4', '1');
INSERT INTO `tbl_specialty` VALUES ('19', 'sheji1', '1', '2016-12-19 04:12:06', '1', '1', '1');
INSERT INTO `tbl_specialty` VALUES ('20', '2', '2', '2016-12-19 04:12:27', '1', '2', '1');
INSERT INTO `tbl_specialty` VALUES ('21', '22', '2', '2016-12-19 04:12:41', '1', '2', '1');
INSERT INTO `tbl_specialty` VALUES ('22', '111', '1', '2016-12-19 04:12:15', '0', '1', '1');
INSERT INTO `tbl_specialty` VALUES ('24', '标题', '描述', '2016-12-19 17:18:14', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('25', '9999', '99999999999', '2016-12-19 17:20:47', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('26', '标题2222', '描述', '2016-12-19 17:25:01', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('27', '添加成功', 'content', '2016-12-19 17:26:18', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('28', '跳转页面', '跳转页面', '2016-12-19 17:28:42', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('29', '1', '1', '2016-12-19 17:41:39', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('30', 'status', '描述', '2016-12-19 17:52:31', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('32', '11', '1111', '2016-12-19 18:04:07', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('35', '233432', '2434234', '2016-12-19 18:08:34', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('36', '123123', '123123', '2016-12-19 18:09:16', null, '1', '1');
INSERT INTO `tbl_specialty` VALUES ('37', '44444', '44444', '2016-12-19 18:14:03', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('38', '113', '131', '2016-12-19 18:16:23', null, null, '1');
INSERT INTO `tbl_specialty` VALUES ('39', '3', '', '2016-12-19 18:54:41', '0', '0', '1');
INSERT INTO `tbl_specialty` VALUES ('40', '5', '', '2016-12-19 18:55:36', '0', '0', '1');
INSERT INTO `tbl_specialty` VALUES ('41', 'eqwe', '', '2016-12-19 18:55:51', '0', '0', '1');

-- ----------------------------
-- Table structure for tbl_specialty_copy
-- ----------------------------
DROP TABLE IF EXISTS `tbl_specialty_copy`;
CREATE TABLE `tbl_specialty_copy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '专业名称',
  `content` text COMMENT '专业描述',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_specialty_copy
-- ----------------------------
