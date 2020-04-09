/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 80016
Source Host           : localhost:3306
Source Database       : ud_xiangxin_me

Target Server Type    : MYSQL
Target Server Version : 80016
File Encoding         : 65001

Date: 2020-04-09 21:38:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ysk_admin
-- ----------------------------
DROP TABLE IF EXISTS `ysk_admin`;
CREATE TABLE `ysk_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'UID',
  `auth_id` int(11) NOT NULL DEFAULT '1' COMMENT '角色ID',
  `nickname` varchar(63) DEFAULT NULL COMMENT '昵称',
  `username` varchar(31) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(63) NOT NULL DEFAULT '' COMMENT '密码',
  `mobile` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `reg_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态',
  `reg_type` varchar(20) DEFAULT NULL COMMENT '注册人',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='后台管理员表格';

-- ----------------------------
-- Records of ysk_admin
-- ----------------------------
INSERT INTO `ysk_admin` VALUES ('1', '1', '超级管理员', 'admin', '8f3bd6b4d00391c9d09cc14e32fee28c', '', '0', '1438651748', '1552141214', '1', '');

-- ----------------------------
-- Table structure for ysk_bankcard
-- ----------------------------
DROP TABLE IF EXISTS `ysk_bankcard`;
CREATE TABLE `ysk_bankcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT 'uid',
  `name` varchar(225) NOT NULL COMMENT '持卡人',
  `bankname` varchar(225) NOT NULL COMMENT '所属银行',
  `banknum` varchar(225) NOT NULL COMMENT '银行卡号',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='银行卡管理';

-- ----------------------------
-- Records of ysk_bankcard
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_coinprice
-- ----------------------------
DROP TABLE IF EXISTS `ysk_coinprice`;
CREATE TABLE `ysk_coinprice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(16,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ysk_coinprice
-- ----------------------------
INSERT INTO `ysk_coinprice` VALUES ('1', '7.02000');

-- ----------------------------
-- Table structure for ysk_complaint
-- ----------------------------
DROP TABLE IF EXISTS `ysk_complaint`;
CREATE TABLE `ysk_complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '投诉人id',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT '投诉内容',
  `imgs` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '图片路径',
  `status` tinyint(1) DEFAULT '0' COMMENT '0 未查看 1 已查看',
  `create_time` int(10) DEFAULT NULL COMMENT '投诉时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='投诉建议表';

-- ----------------------------
-- Records of ysk_complaint
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_config
-- ----------------------------
DROP TABLE IF EXISTS `ysk_config`;
CREATE TABLE `ysk_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '配置标题',
  `name` varchar(32) DEFAULT NULL COMMENT '配置名称',
  `value` text NOT NULL COMMENT '配置值',
  `group` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `type` varchar(16) NOT NULL DEFAULT '' COMMENT '配置类型',
  `options` varchar(255) NOT NULL DEFAULT '' COMMENT '配置额外值',
  `tip` varchar(100) NOT NULL DEFAULT '' COMMENT '配置说明',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `sort` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统配置表';

-- ----------------------------
-- Records of ysk_config
-- ----------------------------
INSERT INTO `ysk_config` VALUES ('1', '站点开关', 'TOGGLE_WEB_SITE', '1', '3', '0', '0:关闭\r\n1:开启', '商城建设中......', '1378898976', '1406992386', '1', '1');
INSERT INTO `ysk_config` VALUES ('2', '网站标题', 'WEB_SITE_TITLE', '', '1', '0', '', '网站标题前台显示标题', '1378898976', '1379235274', '2', '1');
INSERT INTO `ysk_config` VALUES ('3', '网站LOGO', 'WEB_SITE_LOGO', '', '1', '0', '', '网站LOGO', '1407003397', '1407004692', '3', '1');
INSERT INTO `ysk_config` VALUES ('4', '网站描述', 'WEB_SITE_DESCRIPTION', '', '1', '0', '', '网站搜索引擎描述', '1378898976', '1379235841', '4', '1');
INSERT INTO `ysk_config` VALUES ('5', '网站关键字', 'WEB_SITE_KEYWORD', '', '1', '0', '', '网站搜索引擎关键字', '1378898976', '1381390100', '5', '1');
INSERT INTO `ysk_config` VALUES ('6', '版权信息', 'WEB_SITE_COPYRIGHT', '', '1', '0', '', '设置在网站底部显示的版权信息，如“版权所有 © 2014-2015 科斯克网络科技”', '1406991855', '1406992583', '6', '1');
INSERT INTO `ysk_config` VALUES ('7', '网站备案号', 'WEB_SITE_ICP', '', '1', '0', '', '设置在网站底部显示的备案号，如“苏ICP备1502009号\"', '1378900335', '1415983236', '9', '1');
INSERT INTO `ysk_config` VALUES ('26', '微信二维码', 'WEB_SITE_WX', '', '1', '', '', '', '0', '0', '0', '1');
INSERT INTO `ysk_config` VALUES ('32', '注册开关', 'close_reg', '1', '3', '', '0:关闭1:开启', '关闭注册功能说明', '0', '0', '12', '1');
INSERT INTO `ysk_config` VALUES ('33', '交易开关', 'close_trading', '1', '3', '', '0:关闭1:开启', '交易暂时关闭，16:00后开启', '0', '0', '13', '0');
INSERT INTO `ysk_config` VALUES ('41', '实时价格每分钟增长', 'growem', '', '2', '', '', '', '0', '0', '12', '1');
INSERT INTO `ysk_config` VALUES ('44', '奖励开关', 'regjifen', '0', '1', '0', '', '', '1407003397', '1407004692', '3', '1');

-- ----------------------------
-- Table structure for ysk_ewm
-- ----------------------------
DROP TABLE IF EXISTS `ysk_ewm`;
CREATE TABLE `ysk_ewm` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '记录id',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `ewm_class` int(11) NOT NULL COMMENT '二维码类型',
  `ewm_url` varchar(225) NOT NULL COMMENT '二维码地址',
  `ewm_price` decimal(16,5) NOT NULL COMMENT '二维码收款金额',
  `ewm_acc` varchar(225) NOT NULL COMMENT '二维码账号',
  `uaccount` varchar(225) NOT NULL COMMENT '用户账号',
  `uname` varchar(225) NOT NULL COMMENT '用户名',
  `yname` varchar(255) NOT NULL DEFAULT '',
  `ynameson` varchar(255) NOT NULL DEFAULT '',
  `yuname` varchar(255) NOT NULL DEFAULT '',
  `ycard` varchar(255) NOT NULL DEFAULT '',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='二维码管理';

-- ----------------------------
-- Records of ysk_ewm
-- ----------------------------
INSERT INTO `ysk_ewm` VALUES ('1', '1', '1', '1', '/Public/attached/2020/02/12/5e43c72b90f56.png', '100000.00000', '123', '13111111111', '13111111111', '', '', '', '', '1581500206');
INSERT INTO `ysk_ewm` VALUES ('2', '1', '1', '2', '/Public/attached/2020/03/24/5e7a0692ec08c.jpg', '100000.00000', 'wahaha', '13111111111', '13111111111', '', '', '', '', '1585055387');

-- ----------------------------
-- Table structure for ysk_group
-- ----------------------------
DROP TABLE IF EXISTS `ysk_group`;
CREATE TABLE `ysk_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '部门ID',
  `pid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上级部门ID',
  `title` varchar(31) NOT NULL DEFAULT '' COMMENT '部门名称',
  `icon` varchar(31) NOT NULL DEFAULT '' COMMENT '图标',
  `menu_auth` text NOT NULL COMMENT '权限列表',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态',
  `auth_id` int(11) DEFAULT NULL,
  `hylb` varchar(10) DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='部门信息表';

-- ----------------------------
-- Records of ysk_group
-- ----------------------------
INSERT INTO `ysk_group` VALUES ('1', '0', '超级管理员', '', '', '1426881003', '1427552428', '0', '1', '1', '0');
INSERT INTO `ysk_group` VALUES ('2', '0', '财务查看', '', '1,7,8,9,3,323', '1498324367', '1571819694', '0', '0', '2', '5');
INSERT INTO `ysk_group` VALUES ('7', '0', '超级管理', '', '1,3,4,6,327,7,8,9,316,318,322,323', '1526152893', '1528963727', '0', '-1', '0', '');
INSERT INTO `ysk_group` VALUES ('8', '0', '数据管理', '', '1,3,4,327,7,8,10,11,315,324,325,334,329,328', '1527085184', '1527140823', '0', '-1', '0', '0');

-- ----------------------------
-- Table structure for ysk_menu
-- ----------------------------
DROP TABLE IF EXISTS `ysk_menu`;
CREATE TABLE `ysk_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '菜单名称',
  `pid` int(11) NOT NULL COMMENT '父级id',
  `gid` int(11) NOT NULL DEFAULT '0' COMMENT '爷爷ID、',
  `col` varchar(30) NOT NULL COMMENT '控制器',
  `act` varchar(30) NOT NULL COMMENT '方法',
  `patch` varchar(50) DEFAULT NULL COMMENT '全路径',
  `level` int(11) NOT NULL COMMENT '级别',
  `icon` varchar(50) DEFAULT NULL,
  `sort` char(4) NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=363 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ysk_menu
-- ----------------------------
INSERT INTO `ysk_menu` VALUES ('327', '数据库管理', '3', '1', 'Database', 'index', '', '2', 'fa fa-lock', '14', '0');
INSERT INTO `ysk_menu` VALUES ('323', '系统公告', '3', '1', 'News', 'index', '', '2', 'fa-twitter-square', '51', '1');
INSERT INTO `ysk_menu` VALUES ('356', '支付成功订单', '352', '1', 'Roborder', 'ordersucc', '', '2', 'fa-calendar-check-o', '49', '0');
INSERT INTO `ysk_menu` VALUES ('355', '匹配成功支付中', '352', '1', 'Roborder', 'robsucc', '', '2', 'fa-calendar-plus-o', '40', '0');
INSERT INTO `ysk_menu` VALUES ('354', '抢单分配列表', '352', '1', 'Roborder', 'userrob', '', '2', 'fa-child', '39', '-1');
INSERT INTO `ysk_menu` VALUES ('1', '系统', '0', '0', '', '', '', '0', 'fa-cog', '0', '1');
INSERT INTO `ysk_menu` VALUES ('9', '推荐结构', '7', '1', 'Tree', 'index', '', '2', 'fa-th-large', '22', '1');
INSERT INTO `ysk_menu` VALUES ('8', '会员列表', '7', '1', 'User', 'index', '', '2', 'fa-user', '21', '1');
INSERT INTO `ysk_menu` VALUES ('7', '会员管理', '1', '1', '', '', '', '1', 'fa-folder-open-o', '1', '1');
INSERT INTO `ysk_menu` VALUES ('5', '角色管理', '3', '1', 'Group', 'index', '', '2', 'fa-sitemap', '12', '1');
INSERT INTO `ysk_menu` VALUES ('3', '统用功能', '1', '1', '', '', '', '1', 'fa-folder-open-o', '3', '1');
INSERT INTO `ysk_menu` VALUES ('6', '管理员管理', '3', '1', 'Manage', 'index', '', '2', 'fa fa-cog', '13', '1');
INSERT INTO `ysk_menu` VALUES ('352', '抢单管理', '1', '1', '', '', '', '1', 'fa-globe', '2', '0');
INSERT INTO `ysk_menu` VALUES ('353', '全部订单列表', '352', '1', 'Roborder', 'index', '', '2', 'fa-calendar', '38', '0');
INSERT INTO `ysk_menu` VALUES ('357', '游戏参数设置', '7', '1', 'Roborder', 'asystem', '', '2', 'fa-binoculars', '44', '1');
INSERT INTO `ysk_menu` VALUES ('351', '银行卡管理', '7', '1', 'User', 'bankcard', '', '2', 'fa-credit-card', '37', '1');
INSERT INTO `ysk_menu` VALUES ('350', '二维码管理', '7', '1', 'User', 'ewm', '', '2', 'fa-qrcode', '36', '1');
INSERT INTO `ysk_menu` VALUES ('349', '提现管理', '7', '1', 'User', 'withdraw', '', '2', 'fa-cube', '35', '1');
INSERT INTO `ysk_menu` VALUES ('348', '充值管理', '7', '1', 'User', 'recharge', '', '2', 'fa-cubes', '34', '1');
INSERT INTO `ysk_menu` VALUES ('358', '收款二维码管理', '3', '1', 'Roborder', 'skewm', '', '2', 'fa-twitter-square', '42', '0');
INSERT INTO `ysk_menu` VALUES ('359', '资金流水', '7', '1', 'User', 'bill', '', '2', 'fa-building-o', '43', '1');
INSERT INTO `ysk_menu` VALUES ('360', '未支付等待审查', '352', '1', 'Roborder', 'orderhasfali', '', '2', 'fa-calendar-o', '41', '0');
INSERT INTO `ysk_menu` VALUES ('361', '未支付订单', '352', '1', 'Roborder', 'orderfali', '', '2', 'fa-calendar-times-o', '42', '0');
INSERT INTO `ysk_menu` VALUES ('362', '注册管理', '7', '1', 'User', 'regmanage', null, '2', 'fa-user', '0', '1');

-- ----------------------------
-- Table structure for ysk_news
-- ----------------------------
DROP TABLE IF EXISTS `ysk_news`;
CREATE TABLE `ysk_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '文章图片',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `desc` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `is_out` tinyint(4) NOT NULL DEFAULT '0',
  `content` text NOT NULL COMMENT '内容',
  `from` varchar(255) NOT NULL DEFAULT '' COMMENT '文章来源',
  `visit` smallint(6) NOT NULL DEFAULT '0',
  `lang` tinyint(4) NOT NULL DEFAULT '0',
  `tuijian` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统公告';

-- ----------------------------
-- Records of ysk_news
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_notice
-- ----------------------------
DROP TABLE IF EXISTS `ysk_notice`;
CREATE TABLE `ysk_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_tittle` varchar(80) NOT NULL COMMENT '公告标题',
  `notice_content` varchar(600) NOT NULL COMMENT '公告详情',
  `notice_addtime` varchar(20) NOT NULL COMMENT '公告添加时间',
  `notice_read` text NOT NULL COMMENT '看过公告会员',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ysk_notice
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_orderconfig
-- ----------------------------
DROP TABLE IF EXISTS `ysk_orderconfig`;
CREATE TABLE `ysk_orderconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paypipeiouttime` int(11) NOT NULL DEFAULT '0' COMMENT '支付匹配超时时间/s',
  `payonlineouttime` int(11) NOT NULL DEFAULT '0' COMMENT '支付在线超时时间/s',
  `payouttime` int(11) NOT NULL DEFAULT '0' COMMENT '支付超时时间/s',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ysk_orderconfig
-- ----------------------------
INSERT INTO `ysk_orderconfig` VALUES ('1', '16', '6', '300');

-- ----------------------------
-- Table structure for ysk_qrcode
-- ----------------------------
DROP TABLE IF EXISTS `ysk_qrcode`;
CREATE TABLE `ysk_qrcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `uname` varchar(225) NOT NULL COMMENT '会员名称',
  `code_class` int(2) NOT NULL COMMENT '二维码类型1支付宝2微信3银行卡',
  `code_url` varchar(225) NOT NULL COMMENT '二维码图片地址',
  `uaccount` varchar(225) NOT NULL COMMENT '会员账号',
  `code_acc` varchar(225) NOT NULL COMMENT '二维码账号，如支付宝账号',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='二维码管理';

-- ----------------------------
-- Records of ysk_qrcode
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_recharge
-- ----------------------------
DROP TABLE IF EXISTS `ysk_recharge`;
CREATE TABLE `ysk_recharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) DEFAULT NULL COMMENT '会员ID',
  `account` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '会员账号',
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '姓名',
  `price` decimal(16,5) DEFAULT NULL COMMENT '充值金额',
  `way` int(11) DEFAULT NULL COMMENT '充值方式：1支付宝 2微信 3银行卡 4erc20  5omini',
  `img` varchar(255) DEFAULT NULL,
  `addtime` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '充值日期',
  `status` int(11) DEFAULT NULL COMMENT '充值状态1提交，2退回，3成功 4待支付',
  `marker` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='会员充值表';

-- ----------------------------
-- Records of ysk_recharge
-- ----------------------------
INSERT INTO `ysk_recharge` VALUES ('1', '11', '18551276133', '', '0.00000', '4', null, '1580830155', '4', '');
INSERT INTO `ysk_recharge` VALUES ('2', '11', '18551276133', '', '0.00000', '4', null, '1580830164', '4', '');
INSERT INTO `ysk_recharge` VALUES ('3', '13', '15047703409', '', '0.00000', '4', null, '1580831039', '4', '');
INSERT INTO `ysk_recharge` VALUES ('4', '13', '15047703409', '', '0.00000', '4', null, '1580831062', '4', '');
INSERT INTO `ysk_recharge` VALUES ('5', '13', '15047703409', '', '0.00000', '4', null, '1580877911', '4', '');
INSERT INTO `ysk_recharge` VALUES ('6', '13', '15047703409', '', '0.00000', '4', null, '1580877921', '4', '');
INSERT INTO `ysk_recharge` VALUES ('7', '1', '13111111111', '13111111111', '1000.00000', '5', '/Public/attached/2020/02/12/5e43c7fc094c5.jpg', '1581500377', '3', '');
INSERT INTO `ysk_recharge` VALUES ('8', '1', '13111111111', '13111111111', '0.00000', '4', null, '1583803385', '4', '');
INSERT INTO `ysk_recharge` VALUES ('9', '1', '13111111111', '13111111111', '0.00000', '4', null, '1583803584', '4', '');
INSERT INTO `ysk_recharge` VALUES ('10', '23', '13222222222', '13222222222', '100.00000', '4', null, '1586171039', '3', '');
INSERT INTO `ysk_recharge` VALUES ('11', '23', '13222222222', '13222222222', '100.00000', '4', null, '1586171325', '3', '');
INSERT INTO `ysk_recharge` VALUES ('12', '23', '13222222222', '13222222222', '80.00000', '5', null, '1586171334', '3', '');
INSERT INTO `ysk_recharge` VALUES ('13', '23', '13222222222', '13222222222', '10.00000', '5', null, '1586171512', '3', '');
INSERT INTO `ysk_recharge` VALUES ('14', '22', '13111111111', '13111111111', null, '4', null, '1586172694', '4', null);
INSERT INTO `ysk_recharge` VALUES ('15', '22', '13111111111', '13111111111', '123.00000', '4', '/Public/attached/2020/04/06/5e8b136d6c213.png', '1586172776', '3', null);

-- ----------------------------
-- Table structure for ysk_regpath
-- ----------------------------
DROP TABLE IF EXISTS `ysk_regpath`;
CREATE TABLE `ysk_regpath` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `uidsubordinate` int(11) NOT NULL,
  `uiduidsubordinatesuperior` int(11) DEFAULT NULL,
  `lown` int(11) DEFAULT NULL,
  `regtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ysk_regpath
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_roborder
-- ----------------------------
DROP TABLE IF EXISTS `ysk_roborder`;
CREATE TABLE `ysk_roborder` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `class` int(2) NOT NULL COMMENT '收款类型',
  `pricermb` decimal(16,2) NOT NULL DEFAULT '0.00',
  `price` decimal(16,5) NOT NULL COMMENT '收款金额',
  `pricec` decimal(16,5) NOT NULL DEFAULT '0.00000',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  `uponlinetime` varchar(255) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL COMMENT '订单状态',
  `uid` int(11) NOT NULL COMMENT '匹配用户ID',
  `uname` varchar(225) NOT NULL COMMENT '匹配用户名称',
  `umoney` decimal(16,5) NOT NULL COMMENT '匹配用户余额',
  `pipeitime` varchar(225) NOT NULL COMMENT '匹配时间',
  `finishtime` varchar(225) NOT NULL COMMENT '完成时间',
  `ordernum` varchar(225) NOT NULL COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='抢单表';

-- ----------------------------
-- Records of ysk_roborder
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_running
-- ----------------------------
DROP TABLE IF EXISTS `ysk_running`;
CREATE TABLE `ysk_running` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `money` decimal(10,2) DEFAULT '0.00' COMMENT '收入',
  `time` int(11) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8 COMMENT='虚假流水表';

-- ----------------------------
-- Records of ysk_running
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_selcity
-- ----------------------------
DROP TABLE IF EXISTS `ysk_selcity`;
CREATE TABLE `ysk_selcity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `starttime` varchar(20) NOT NULL DEFAULT '0',
  `endtime` varchar(20) NOT NULL DEFAULT '',
  `cityv` varchar(255) NOT NULL DEFAULT '',
  `seltime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ysk_selcity
-- ----------------------------
INSERT INTO `ysk_selcity` VALUES ('1', '1', '1582287104', '1584879104', '海南省', '1583803392');

-- ----------------------------
-- Table structure for ysk_skm
-- ----------------------------
DROP TABLE IF EXISTS `ysk_skm`;
CREATE TABLE `ysk_skm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wxewm` varchar(225) NOT NULL,
  `zfbewm` varchar(225) NOT NULL,
  `bankewm` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='收款码';

-- ----------------------------
-- Records of ysk_skm
-- ----------------------------
INSERT INTO `ysk_skm` VALUES ('1', '2019pay/2019-03-20/5c911c22156dc.png', '2019pay/2019-03-20/5c911c22188b8.png', '2019pay/2019-03-20/5c911c221b2c7.png');

-- ----------------------------
-- Table structure for ysk_somebill
-- ----------------------------
DROP TABLE IF EXISTS `ysk_somebill`;
CREATE TABLE `ysk_somebill` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `jl_class` int(11) NOT NULL COMMENT '流水类别：1佣金2团队奖励3充值4提现5订单匹配',
  `info` varchar(225) NOT NULL COMMENT '说明',
  `addtime` varchar(225) NOT NULL COMMENT '事件时间',
  `jc_class` varchar(225) NOT NULL COMMENT '分+ 或-',
  `num` decimal(16,5) NOT NULL COMMENT '币量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='会员流水账单';

-- ----------------------------
-- Records of ysk_somebill
-- ----------------------------
INSERT INTO `ysk_somebill` VALUES ('1', '1', '151', '切换地区激活 | 30天', '1582287104', '-', '10.00000');

-- ----------------------------
-- Table structure for ysk_store
-- ----------------------------
DROP TABLE IF EXISTS `ysk_store`;
CREATE TABLE `ysk_store` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `cangku_num` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '钱包余额',
  `fengmi_num` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '积分',
  `plant_num` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '播种总数',
  `huafei_total` decimal(16,5) unsigned NOT NULL DEFAULT '0.00000' COMMENT '施肥累计',
  `vip_grade` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of ysk_store
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_system
-- ----------------------------
DROP TABLE IF EXISTS `ysk_system`;
CREATE TABLE `ysk_system` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT '记录ID',
  `qd_cf` int(11) NOT NULL COMMENT '抢单余额比列',
  `qd_nd` varchar(225) NOT NULL COMMENT '抢单难度，数组(0.1,0.2,0.3)',
  `qd_wxyj` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '微信抢单佣金30%填0.3',
  `qd_zfbyj` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '支付宝抢单佣金30%填0.3',
  `qd_bkyj` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '银行卡抢单佣金30%填0.3',
  `qd_ndtime` varchar(225) NOT NULL COMMENT '增加难度时间点',
  `qd_yjjc` varchar(12) NOT NULL COMMENT '佣金加成',
  `qd_minmoney` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '抢单最低额度',
  `min_recharge` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '最低充值额度',
  `mix_withdraw` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '最小提现额度',
  `max_withdraw` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '最大提现额度',
  `tx_yeb` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '提现要求：收款与余额比例 ',
  `team_oneyj` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '1代佣金比例30%写0.3',
  `team_twoyj` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '2代佣金比例30%写0.3',
  `team_threeyj` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '3代佣金比例30%写0.3',
  `cz_yh` varchar(255) NOT NULL,
  `cz_xm` varchar(255) NOT NULL,
  `cz_kh` varchar(255) NOT NULL,
  `erc20_address` varchar(255) DEFAULT NULL,
  `omini_address` varchar(255) DEFAULT NULL,
  `handcoinprice` decimal(16,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='游戏参数设置表';

-- ----------------------------
-- Records of ysk_system
-- ----------------------------
INSERT INTO `ysk_system` VALUES ('1', '80', '0.2', '0.01000', '0.01000', '0.01000', '1,12', '0.000', '0.10000', '500.00000', '500.00000', '10000.00000', '50.00000', '0.00000', '0.00000', '0.00000', '农业银行', '朱德义', '6228481198233289579', '0x5a19d6b1b7920ef12e933c77d93c15ab2d13a9d5', '155V1eUNyXRen6rXzcAHrSWMnkz7xVJ1XG', '7.02000');

-- ----------------------------
-- Table structure for ysk_upload
-- ----------------------------
DROP TABLE IF EXISTS `ysk_upload`;
CREATE TABLE `ysk_upload` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT 'UID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '文件名',
  `path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件路径',
  `url` varchar(255) DEFAULT NULL COMMENT '文件链接',
  `ext` char(4) NOT NULL DEFAULT '' COMMENT '文件类型',
  `size` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `md5` char(32) DEFAULT NULL COMMENT '文件md5',
  `sha1` char(40) DEFAULT NULL COMMENT '文件sha1编码',
  `location` varchar(15) NOT NULL DEFAULT '' COMMENT '文件存储位置',
  `download` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '下载次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上传时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `sort` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文件上传表';

-- ----------------------------
-- Records of ysk_upload
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_user
-- ----------------------------
DROP TABLE IF EXISTS `ysk_user`;
CREATE TABLE `ysk_user` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL COMMENT '上级ID',
  `gid` int(11) NOT NULL DEFAULT '0' COMMENT '上上级ID',
  `ggid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '上上上级ID',
  `account` char(20) NOT NULL DEFAULT '0' COMMENT '用户账号',
  `mobile` char(20) NOT NULL COMMENT '用户手机号',
  `u_yqm` varchar(225) NOT NULL COMMENT '邀请码',
  `username` varchar(255) NOT NULL DEFAULT '',
  `login_pwd` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `login_salt` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `money` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '用户余额',
  `smoney` decimal(16,5) NOT NULL DEFAULT '0.00000',
  `real` tinyint(1) NOT NULL DEFAULT '0' COMMENT '注册审核    0待审核   1审核通过  2审核失败',
  `reg_date` int(11) NOT NULL COMMENT '注册时间',
  `reg_ip` varchar(20) NOT NULL COMMENT '注册IP',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户锁定  1 不锁  0拉黑  -1 删除',
  `activate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活 1-已激活 0-未激活',
  `session_id` varchar(225) DEFAULT NULL,
  `wx_no` varchar(225) DEFAULT NULL COMMENT '微信账号',
  `alipay` varchar(225) DEFAULT NULL COMMENT '支付宝',
  `usdt_erc20` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `usdt_omini` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `truename` varchar(225) DEFAULT NULL COMMENT '真实姓名',
  `email` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '电子邮件',
  `userqq` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'QQ',
  `usercard` varchar(32) NOT NULL COMMENT '身份证号码',
  `path` text,
  `use_grade` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户等级',
  `u_ztnum` int(11) NOT NULL COMMENT '直推人数',
  `rz_st` int(1) NOT NULL DEFAULT '0' COMMENT '资料完善状态，0未完善  1已完善',
  `tx_status` int(11) NOT NULL COMMENT '提现状态',
  `zsy` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '总收益',
  `qd_status` tinyint(4) NOT NULL DEFAULT '1',
  `cpriceproportion` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格比例',
  `superioruid` int(11) NOT NULL DEFAULT '0',
  `regpath` text NOT NULL,
  PRIMARY KEY (`userid`) USING BTREE,
  UNIQUE KEY `mobile` (`mobile`) USING BTREE,
  UNIQUE KEY `account` (`account`) USING BTREE,
  KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of ysk_user
-- ----------------------------
INSERT INTO `ysk_user` VALUES ('22', '0', '0', '0', '13111111111', '13111111111', 'mYZVaoFYZwb4', '13111111111', '1ea9bb4c15e153968b495debcac1b5a1', 'nJfl', '100.00000', '500000.00000', '1', '1553320281', '60.217.21.254', '1', '0', 'r803ahrmln6urrgc9isev58k4g', '123123', '123123', '', '0x11111111111111', '13111111111', '421692188@qq.com', '421692188', '123123', '', '1', '16', '1', '1', '34963.01821', '1', '100.00', '0', '');
INSERT INTO `ysk_user` VALUES ('26', '25', '24', '22', '15658475124', '15658475124', 'DF7f3B4ya9ZC', 'root', '1fdca7222212239fef321b39d78db9e0', 'rVFN', '0.00000', '0.00000', '0', '1586438821', '127.0.0.1', '1', '0', null, null, null, null, null, '123123', null, null, '511622199102246427', '-22-24-25-', '1', '0', '0', '1', '0.00000', '1', '0.00', '25', '22,24,25');

-- ----------------------------
-- Table structure for ysk_userrob
-- ----------------------------
DROP TABLE IF EXISTS `ysk_userrob`;
CREATE TABLE `ysk_userrob` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `class` int(2) NOT NULL COMMENT '支付类别',
  `pricermb` decimal(16,2) NOT NULL DEFAULT '0.00',
  `price` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '金额',
  `pricec` decimal(16,5) NOT NULL DEFAULT '0.00000',
  `yjjc` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '佣金加成',
  `umoney` decimal(16,5) NOT NULL DEFAULT '0.00000' COMMENT '会员余额',
  `uaccount` varchar(225) NOT NULL COMMENT '会员账号',
  `uname` varchar(225) NOT NULL COMMENT '会员姓名',
  `ppid` int(11) NOT NULL COMMENT '匹配的ID号',
  `hasfalistate` tinyint(4) NOT NULL DEFAULT '0' COMMENT '未支付审查：1已审查；-1未审查',
  `hasfailres` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1返还；-1未返还',
  `status` int(2) NOT NULL COMMENT '状态1等2匹配中3成功',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  `pipeitime` varchar(225) NOT NULL COMMENT '匹配成功时间',
  `finishtime` varchar(225) NOT NULL COMMENT '交易完成时间',
  `ordernum` varchar(225) NOT NULL COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员抢单表前台发起的';

-- ----------------------------
-- Records of ysk_userrob
-- ----------------------------

-- ----------------------------
-- Table structure for ysk_withdraw
-- ----------------------------
DROP TABLE IF EXISTS `ysk_withdraw`;
CREATE TABLE `ysk_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `account` varchar(225) NOT NULL COMMENT '提现账号',
  `name` varchar(225) NOT NULL COMMENT '提现人姓名',
  `way` varchar(225) NOT NULL COMMENT '提现方式',
  `price` decimal(16,5) NOT NULL COMMENT '提现金额',
  `addtime` varchar(225) NOT NULL COMMENT '提现时间',
  `endtime` varchar(225) NOT NULL COMMENT '完成时间',
  `status` int(11) NOT NULL COMMENT '状态1提交，2退回3成功',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='提现申请表';

-- ----------------------------
-- Records of ysk_withdraw
-- ----------------------------
