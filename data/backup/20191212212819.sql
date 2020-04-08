-- MySQL database dump
-- 主机: 
-- 生成日期: 2019 年  12 月 12 日 21:28
-- MySQL版本: 
-- PHP 版本: 5.6.40
-- 数据库: `pf_xiangxin_me`
-- ---------------------------------------------------------
-- 表的结构ysk_admin
--
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

--
-- 转存表中的数据 ysk_admin

INSERT INTO `ysk_admin` VALUES('1','1','超级管理员','admin','8f3bd6b4d00391c9d09cc14e32fee28c','','0','1438651748','1552141214','1','');
--
-- 表的结构ysk_bankcard
--
DROP TABLE IF EXISTS `ysk_bankcard`;
CREATE TABLE `ysk_bankcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT 'uid',
  `name` varchar(225) NOT NULL COMMENT '持卡人',
  `bankname` varchar(225) NOT NULL COMMENT '所属银行',
  `banknum` varchar(225) NOT NULL COMMENT '银行卡号',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='银行卡管理';

--
-- 转存表中的数据 ysk_bankcard

INSERT INTO `ysk_bankcard` VALUES('20','51','刘勇','1','1','1575967955');
INSERT INTO `ysk_bankcard` VALUES('19','50','谭成山','兴业银行','622908376782662819','1553320346');
--
-- 表的结构ysk_complaint
--
DROP TABLE IF EXISTS `ysk_complaint`;
CREATE TABLE `ysk_complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '投诉人id',
  `content` text CHARACTER SET utf8mb4 COMMENT '投诉内容',
  `imgs` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '图片路径',
  `status` tinyint(1) DEFAULT '0' COMMENT '0 未查看 1 已查看',
  `create_time` int(10) DEFAULT NULL COMMENT '投诉时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='投诉建议表';

--
-- 转存表中的数据 ysk_complaint

--
-- 表的结构ysk_config
--
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

--
-- 转存表中的数据 ysk_config

INSERT INTO `ysk_config` VALUES('1','站点开关','TOGGLE_WEB_SITE','1','3','0','0:关闭\r\n1:开启','商城建设中......','1378898976','1406992386','1','1');
INSERT INTO `ysk_config` VALUES('2','网站标题','WEB_SITE_TITLE','','1','0','','网站标题前台显示标题','1378898976','1379235274','2','1');
INSERT INTO `ysk_config` VALUES('3','网站LOGO','WEB_SITE_LOGO','','1','0','','网站LOGO','1407003397','1407004692','3','1');
INSERT INTO `ysk_config` VALUES('4','网站描述','WEB_SITE_DESCRIPTION','','1','0','','网站搜索引擎描述','1378898976','1379235841','4','1');
INSERT INTO `ysk_config` VALUES('5','网站关键字','WEB_SITE_KEYWORD','','1','0','','网站搜索引擎关键字','1378898976','1381390100','5','1');
INSERT INTO `ysk_config` VALUES('6','版权信息','WEB_SITE_COPYRIGHT','','1','0','','设置在网站底部显示的版权信息，如“版权所有 © 2014-2015 科斯克网络科技”','1406991855','1406992583','6','1');
INSERT INTO `ysk_config` VALUES('7','网站备案号','WEB_SITE_ICP','','1','0','','设置在网站底部显示的备案号，如“苏ICP备1502009号\"','1378900335','1415983236','9','1');
INSERT INTO `ysk_config` VALUES('26','微信二维码','WEB_SITE_WX','','1','','','','0','0','0','1');
INSERT INTO `ysk_config` VALUES('32','注册开关','close_reg','1','3','','0:关闭1:开启','关闭注册功能说明','0','0','12','1');
INSERT INTO `ysk_config` VALUES('33','交易开关','close_trading','1','3','','0:关闭1:开启','交易暂时关闭，16:00后开启','0','0','13','0');
INSERT INTO `ysk_config` VALUES('41','实时价格每分钟增长','growem','','2','','','','0','0','12','1');
INSERT INTO `ysk_config` VALUES('44','奖励开关','regjifen','0','1','0','','','1407003397','1407004692','3','1');
--
-- 表的结构ysk_ewm
--
DROP TABLE IF EXISTS `ysk_ewm`;
CREATE TABLE `ysk_ewm` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '记录id',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `ewm_class` int(11) NOT NULL COMMENT '二维码类型',
  `ewm_url` varchar(225) NOT NULL COMMENT '二维码地址',
  `ewm_price` float(10,3) NOT NULL COMMENT '二维码收款金额',
  `ewm_acc` varchar(225) NOT NULL COMMENT '二维码账号',
  `uaccount` varchar(225) NOT NULL COMMENT '用户账号',
  `uname` varchar(225) NOT NULL COMMENT '用户名',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COMMENT='二维码管理';

--
-- 转存表中的数据 ysk_ewm

INSERT INTO `ysk_ewm` VALUES('64','51','1','1','/Public/attached/2019/12/09/5dedf2408b212.png','500.000','道1','13165124666','liu111999','1575875150');
INSERT INTO `ysk_ewm` VALUES('65','51','1','1','/Public/attached/2019/12/09/5dedf26012405.png','800.000','道','13165124666','liu111999','1575875182');
INSERT INTO `ysk_ewm` VALUES('60','50','1','3','/Public/attached/2019/12/08/5ded008776417.jpeg','123.000','123','13969901196','王大可1','1575813259');
INSERT INTO `ysk_ewm` VALUES('66','50','1','2','/Public/attached/2019/12/09/5dee582cb924f.jpg','123.000','111','13969901196','王大可1','1575901240');
INSERT INTO `ysk_ewm` VALUES('69','50','1','1','/Public/attached/2019/12/10/5dee732a6e47e.png','100.000','ghjkkkk','13969901196','王大可1','1575908149');
INSERT INTO `ysk_ewm` VALUES('70','50','0','1','/Public/attached/2019/12/10/5def4a8f5225c.png','200.000','123123','13969901196','王大可1','1575963287');
INSERT INTO `ysk_ewm` VALUES('71','51','1','2','/Public/attached/2019/12/10/5def5652ebed7.png','1000.000','支','13165124666','liu111999','1575966367');
--
-- 表的结构ysk_group
--
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

--
-- 转存表中的数据 ysk_group

INSERT INTO `ysk_group` VALUES('1','0','超级管理员','','','1426881003','1427552428','0','1','1','0');
INSERT INTO `ysk_group` VALUES('2','0','财务查看','','1,7,8,9,3,323','1498324367','1571819694','0','0','2','5');
INSERT INTO `ysk_group` VALUES('7','0','超级管理','','1,3,4,6,327,7,8,9,316,318,322,323','1526152893','1528963727','0','-1','0','');
INSERT INTO `ysk_group` VALUES('8','0','数据管理','','1,3,4,327,7,8,10,11,315,324,325,334,329,328','1527085184','1527140823','0','-1','0','0');
--
-- 表的结构ysk_menu
--
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
) ENGINE=MyISAM AUTO_INCREMENT=362 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 ysk_menu

INSERT INTO `ysk_menu` VALUES('327','数据库管理','3','1','Database','index','','2','fa fa-lock','14','1');
INSERT INTO `ysk_menu` VALUES('323','系统公告','3','1','News','index','','2','fa-twitter-square','51','1');
INSERT INTO `ysk_menu` VALUES('356','支付成功订单','352','1','Roborder','ordersucc','','2','fa-calendar-check-o','49','1');
INSERT INTO `ysk_menu` VALUES('355','匹配成功支付中','352','1','Roborder','robsucc','','2','fa-calendar-plus-o','40','1');
INSERT INTO `ysk_menu` VALUES('354','抢单分配列表','352','1','Roborder','userrob','','2','fa-child','39','-1');
INSERT INTO `ysk_menu` VALUES('1','系统','0','0','','','','0','fa-cog','0','1');
INSERT INTO `ysk_menu` VALUES('9','推荐结构','7','1','Tree','index','','2','fa-th-large','22','1');
INSERT INTO `ysk_menu` VALUES('8','会员列表','7','1','User','index','','2','fa-user','21','1');
INSERT INTO `ysk_menu` VALUES('7','会员管理','1','1','','','','1','fa-folder-open-o','1','1');
INSERT INTO `ysk_menu` VALUES('5','角色管理','3','1','Group','index','','2','fa-sitemap','12','1');
INSERT INTO `ysk_menu` VALUES('3','统用功能','1','1','','','','1','fa-folder-open-o','3','1');
INSERT INTO `ysk_menu` VALUES('6','管理员管理','3','1','Manage','index','','2','fa fa-cog','13','1');
INSERT INTO `ysk_menu` VALUES('352','抢单管理','1','1','','','','1','fa-globe','2','1');
INSERT INTO `ysk_menu` VALUES('353','全部订单列表','352','1','Roborder','index','','2','fa-calendar','38','1');
INSERT INTO `ysk_menu` VALUES('357','游戏参数设置','7','1','Roborder','asystem','','2','fa-binoculars','44','1');
INSERT INTO `ysk_menu` VALUES('351','银行卡管理','7','1','User','bankcard','','2','fa-credit-card','37','1');
INSERT INTO `ysk_menu` VALUES('350','二维码管理','7','1','User','ewm','','2','fa-qrcode','36','1');
INSERT INTO `ysk_menu` VALUES('349','提现管理','7','1','User','withdraw','','2','fa-cube','35','1');
INSERT INTO `ysk_menu` VALUES('348','充值管理','7','1','User','recharge','','2','fa-cubes','34','1');
INSERT INTO `ysk_menu` VALUES('358','收款二维码管理','3','1','Roborder','skewm','','2','fa-twitter-square','42','0');
INSERT INTO `ysk_menu` VALUES('359','资金流水','7','1','User','bill','','2','fa-building-o','43','1');
INSERT INTO `ysk_menu` VALUES('360','未支付等待审查','352','1','Roborder','orderhasfali','','2','fa-calendar-o','41','1');
INSERT INTO `ysk_menu` VALUES('361','未支付订单','352','1','Roborder','orderfali','','2','fa-calendar-times-o','42','1');
--
-- 表的结构ysk_news
--
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

--
-- 转存表中的数据 ysk_news

--
-- 表的结构ysk_notice
--
DROP TABLE IF EXISTS `ysk_notice`;
CREATE TABLE `ysk_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_tittle` varchar(80) NOT NULL COMMENT '公告标题',
  `notice_content` varchar(600) NOT NULL COMMENT '公告详情',
  `notice_addtime` varchar(20) NOT NULL COMMENT '公告添加时间',
  `notice_read` text NOT NULL COMMENT '看过公告会员',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 ysk_notice

--
-- 表的结构ysk_orderconfig
--
DROP TABLE IF EXISTS `ysk_orderconfig`;
CREATE TABLE `ysk_orderconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paypipeiouttime` int(11) NOT NULL DEFAULT '0' COMMENT '支付匹配超时时间/s',
  `payonlineouttime` int(11) NOT NULL DEFAULT '0' COMMENT '支付在线超时时间/s',
  `payouttime` int(11) NOT NULL DEFAULT '0' COMMENT '支付超时时间/s',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 ysk_orderconfig

INSERT INTO `ysk_orderconfig` VALUES('1','16','6','300');
--
-- 表的结构ysk_qrcode
--
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

--
-- 转存表中的数据 ysk_qrcode

--
-- 表的结构ysk_recharge
--
DROP TABLE IF EXISTS `ysk_recharge`;
CREATE TABLE `ysk_recharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `account` varchar(225) NOT NULL COMMENT '会员账号',
  `name` varchar(225) NOT NULL COMMENT '姓名',
  `price` float(10,3) NOT NULL COMMENT '充值金额',
  `way` int(11) NOT NULL COMMENT '充值方式：1支付宝2微信3银行卡',
  `addtime` varchar(225) NOT NULL COMMENT '充值日期',
  `status` int(11) NOT NULL COMMENT '充值状态1提交，2退回，3成功',
  `marker` varchar(225) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='会员充值表';

--
-- 转存表中的数据 ysk_recharge

INSERT INTO `ysk_recharge` VALUES('30','50','13969901196','王大可1','100.000','3','1576148093','1','');
INSERT INTO `ysk_recharge` VALUES('29','50','13969901196','还回家','2000.000','3','1576133315','2','还回家');
INSERT INTO `ysk_recharge` VALUES('23','50','13969901196','王大可1','10000.000','3','1572882761','3','额度');
INSERT INTO `ysk_recharge` VALUES('24','51','13165124666','刘勇','1000.000','3','1575842851','3','');
INSERT INTO `ysk_recharge` VALUES('25','51','13165124666','刘勇','20000.000','3','1575873838','3','');
INSERT INTO `ysk_recharge` VALUES('26','51','13165124666','刘勇','1000.000','3','1575968937','3','');
INSERT INTO `ysk_recharge` VALUES('27','52','15064030366','沐阳','10000.000','3','1576065315','1','');
INSERT INTO `ysk_recharge` VALUES('28','50','13969901196','对对对','1000.000','3','1576115843','3','在宿舍');
--
-- 表的结构ysk_roborder
--
DROP TABLE IF EXISTS `ysk_roborder`;
CREATE TABLE `ysk_roborder` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `class` int(2) NOT NULL COMMENT '收款类型',
  `price` float(10,3) NOT NULL COMMENT '收款金额',
  `addtime` varchar(225) NOT NULL COMMENT '添加时间',
  `uponlinetime` varchar(255) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL COMMENT '订单状态',
  `uid` int(11) NOT NULL COMMENT '匹配用户ID',
  `uname` varchar(225) NOT NULL COMMENT '匹配用户名称',
  `umoney` float(10,3) NOT NULL COMMENT '匹配用户余额',
  `pipeitime` varchar(225) NOT NULL COMMENT '匹配时间',
  `finishtime` varchar(225) NOT NULL COMMENT '完成时间',
  `ordernum` varchar(225) NOT NULL COMMENT '订单号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COMMENT='抢单表';

--
-- 转存表中的数据 ysk_roborder

INSERT INTO `ysk_roborder` VALUES('1','1','100.000','1572919646','1572919663','5','0','','0.000','','1572919821','1027171572919646486516');
INSERT INTO `ysk_roborder` VALUES('2','1','100.000','1572919668','1572919821','5','0','','0.000','','1572919821','1027111572919668103298');
INSERT INTO `ysk_roborder` VALUES('3','1','100.000','1572919832','1572919839','5','0','','0.000','','1572919847','1027191572919832405559');
INSERT INTO `ysk_roborder` VALUES('4','1','1000.000','1572919852','1572919860','3','50','谭成山','4065.000','1572919861','1572919880','1027161572919852988418');
INSERT INTO `ysk_roborder` VALUES('5','1','1000.000','1572920335','1572920350','5','0','','0.000','','1572920351','1027131572920335965971');
INSERT INTO `ysk_roborder` VALUES('6','1','1000.000','1572920382','1572920382','3','50','谭成山','3078.000','1572920383','1572920492','1027121572920382436292');
INSERT INTO `ysk_roborder` VALUES('7','1','100.000','1572921055','1572921012','5','0','','0.000','','1572921020','1027121572921055852721');
INSERT INTO `ysk_roborder` VALUES('8','1','100.000','1572921484','1572921498','5','0','','0.000','','1572921500','1027161572921484389762');
INSERT INTO `ysk_roborder` VALUES('9','1','100.000','1572921832','1572921832','5','0','','0.000','','1572921838','1027111572921832644959');
INSERT INTO `ysk_roborder` VALUES('10','1','1000.000','1572921898','1572921898','5','0','','0.000','','1572921904','1027181572921898968312');
INSERT INTO `ysk_roborder` VALUES('11','1','1000.000','1572921901','1572921901','3','50','谭成山','2091.000','1572921903','1572921954','1027161572921901358428');
INSERT INTO `ysk_roborder` VALUES('12','1','100.000','1572922701','1572922701','3','50','谭成山','1104.000','1572922702','1572922826','1027131572922701316727');
INSERT INTO `ysk_roborder` VALUES('13','1','100.000','1572957515','1572959543','5','0','','0.000','','1575806376','1027121572957515213498');
INSERT INTO `ysk_roborder` VALUES('14','2','100.000','1575811234','1575811250','5','0','','0.000','','1575811251','1027141575811234650318');
INSERT INTO `ysk_roborder` VALUES('15','2','100.000','1575811257','1575811273','5','0','','0.000','','1575811274','1027171575811257434583');
INSERT INTO `ysk_roborder` VALUES('16','2','100.000','1575811370','1575811386','5','0','','0.000','','1575811387','1027141575811370317672');
INSERT INTO `ysk_roborder` VALUES('17','1','100.000','1575811439','1575811439','3','50','谭成山','1005.300','1575811440','1575811473','1027111575811439871423');
INSERT INTO `ysk_roborder` VALUES('18','1','100.000','1575811517','1575811517','3','50','谭成山','906.600','1575811518','1575811561','1027191575811517459119');
INSERT INTO `ysk_roborder` VALUES('19','1','100.000','1575811992','1575811992','3','50','谭成山','807.900','1575811992','1575812032','1027151575811992296454');
INSERT INTO `ysk_roborder` VALUES('20','1','100.000','1575816591','1575816591','4','50','谭成山','709.200','1575816591','1575817079','1027131575816591794617');
INSERT INTO `ysk_roborder` VALUES('21','1','100.000','1575817570','1575817570','3','50','谭成山','609.200','1575817570','1575817862','1027151575817570127747');
INSERT INTO `ysk_roborder` VALUES('22','1','100.000','1575820186','1575820202','5','0','','0.000','','1575820202','1027161575820186113899');
INSERT INTO `ysk_roborder` VALUES('23','1','100.000','1575822697','1575822712','5','0','','0.000','','1575822714','1027161575822697650913');
INSERT INTO `ysk_roborder` VALUES('24','1','100.000','1575822737','1575822737','3','50','谭成山','510.200','1575822738','1575822767','1027161575822737399273');
INSERT INTO `ysk_roborder` VALUES('25','1','100.000','1575860875','1575860875','4','50','谭成山','411.200','1575860876','1575861176','1027141575860875248544');
INSERT INTO `ysk_roborder` VALUES('26','1','100.000','1575863178','1575863178','4','50','谭成山','311.200','1575863178','1575863478','1027121575863178262938');
INSERT INTO `ysk_roborder` VALUES('27','1','300.000','1575872581','1575872596','5','0','','0.000','','1575872598','1031151575872581143179');
INSERT INTO `ysk_roborder` VALUES('28','1','300.000','1575872615','1575872623','5','0','','0.000','','1575872630','1031161575872615195668');
INSERT INTO `ysk_roborder` VALUES('29','1','1000.000','1575872755','1575872764','4','51','刘勇','1000.000','1575872764','1575873064','1031181575872755252132');
INSERT INTO `ysk_roborder` VALUES('30','1','500.000','1575875216','1575875216','3','51','刘勇','20000.000','1575875216','1575875427','1031161575875216727283');
INSERT INTO `ysk_roborder` VALUES('31','2','500.000','1575875307','1575875323','5','0','','0.000','','1575875324','1031151575875307555778');
INSERT INTO `ysk_roborder` VALUES('32','1','1000.000','1575876413','1575876422','3','51','刘勇','19507.500','1575876423','1575876436','1031041575876413701453');
INSERT INTO `ysk_roborder` VALUES('33','1','100.000','1575893829','1575893829','4','50','谭成山','213.450','1575893831','1575894132','1027141575893829776398');
INSERT INTO `ysk_roborder` VALUES('34','1','100.000','1575894576','1575894576','3','50','谭成山','100000.000','1575894576','1575894772','1027121575894576161755');
INSERT INTO `ysk_roborder` VALUES('35','1','100.000','1575894671','1575894686','5','0','','0.000','','1575894687','1027191575894671171744');
INSERT INTO `ysk_roborder` VALUES('36','1','100.000','1575894792','1575894792','4','50','谭成山','99901.500','1575894793','1575895094','1027161575894792650195');
INSERT INTO `ysk_roborder` VALUES('37','1','100.000','1575895141','1575895141','4','50','谭成山','99801.500','1575895142','1575895442','1027191575895141140074');
INSERT INTO `ysk_roborder` VALUES('38','1','100.000','1575895370','1575895385','5','0','','0.000','','1575895386','1027171575895370218735');
INSERT INTO `ysk_roborder` VALUES('39','1','100.000','1575895724','1575895725','4','50','谭成山','99701.500','1575895726','1575896026','1027131575895724636945');
INSERT INTO `ysk_roborder` VALUES('40','1','100.000','1575896047','1575896048','4','50','谭成山','99601.500','1575896049','1575896349','1027171575896047253462');
INSERT INTO `ysk_roborder` VALUES('41','1','100.000','1575896362','1575896363','4','50','谭成山','99501.500','1575896364','1575896664','1027121575896362306227');
INSERT INTO `ysk_roborder` VALUES('42','1','100.000','1575896697','1575896697','4','50','谭成山','99401.500','1575896698','1575896998','1027181575896697710131');
INSERT INTO `ysk_roborder` VALUES('43','1','100.000','1575897069','1575897069','4','50','谭成山','99301.500','1575897070','1575897370','1027111575897069322095');
INSERT INTO `ysk_roborder` VALUES('44','1','100.000','1575898284','1575898284','4','50','谭成山','99201.500','1575898285','1575898586','1027181575898284863943');
INSERT INTO `ysk_roborder` VALUES('45','1','100.000','1575898599','1575898599','4','50','谭成山','99101.500','1575898600','1575898901','1027131575898599244363');
INSERT INTO `ysk_roborder` VALUES('46','1','100.000','1575898914','1575898916','4','50','谭成山','99001.500','1575898917','1575899218','1027111575898914169851');
INSERT INTO `ysk_roborder` VALUES('47','1','100.000','1575899239','1575899239','4','50','谭成山','98901.500','1575899240','1575899540','1027131575899239285745');
INSERT INTO `ysk_roborder` VALUES('48','1','100.000','1575899487','1575899499','5','0','','0.000','','1575899504','1027171575899487137362');
INSERT INTO `ysk_roborder` VALUES('49','1','100.000','1575899551','1575899552','4','50','谭成山','98801.500','1575899553','1575899854','1027181575899551992541');
INSERT INTO `ysk_roborder` VALUES('50','1','100.000','1575899712','1575899727','5','0','','0.000','','1575899728','1027151575899712916292');
INSERT INTO `ysk_roborder` VALUES('51','1','100.000','1575899914','1575899914','4','50','谭成山','98701.500','1575899915','1575900216','1027131575899914336643');
INSERT INTO `ysk_roborder` VALUES('52','1','100.000','1575901255','1575901271','5','0','','0.000','','1575901272','1027161575901255695584');
INSERT INTO `ysk_roborder` VALUES('53','1','100.000','1575901317','1575901333','5','0','','0.000','','1575901334','1027191575901317820822');
INSERT INTO `ysk_roborder` VALUES('54','1','100.000','1575901439','1575901439','5','0','','0.000','','1575901446','1027171575901439614867');
INSERT INTO `ysk_roborder` VALUES('55','2','100.000','1575901477','1575901492','5','0','','0.000','','1575901494','1027111575901477496364');
INSERT INTO `ysk_roborder` VALUES('56','1','100.000','1575901549','1575901549','3','50','谭成山','98601.500','1575901550','1575901566','1027131575901549788431');
INSERT INTO `ysk_roborder` VALUES('57','2','100.000','1575901699','1575901716','5','0','','0.000','','1575901716','1027111575901699292818');
INSERT INTO `ysk_roborder` VALUES('58','2','100.000','1575901726','1575901741','5','0','','0.000','','1575901742','1027111575901726940938');
INSERT INTO `ysk_roborder` VALUES('59','3','100.000','1575901765','1575901780','5','0','','0.000','','1575901782','1027141575901765661355');
INSERT INTO `ysk_roborder` VALUES('60','1','100.000','1575901973','1575901988','5','0','','0.000','','1575901990','1027141575901973256813');
INSERT INTO `ysk_roborder` VALUES('61','1','100.000','1575902163','1575902163','4','50','谭成山','98503.000','1575902163','1575902464','1027121575902163128868');
INSERT INTO `ysk_roborder` VALUES('62','1','100.000','1575902606','1575902621','5','0','','0.000','','1575902622','1027161575902606941578');
INSERT INTO `ysk_roborder` VALUES('63','1','100.000','1575902869','1575902869','3','50','谭成山','98403.000','1575902871','1575903159','1027191575902869266176');
INSERT INTO `ysk_roborder` VALUES('64','1','100.000','1575903173','1575903173','3','50','谭成山','98304.500','1575903174','1575903183','1027131575903173195074');
INSERT INTO `ysk_roborder` VALUES('65','1','100.000','1575903580','1575903582','3','50','谭成山','98206.000','1575903583','1575903657','1027111575903580867872');
INSERT INTO `ysk_roborder` VALUES('66','1','100.000','1575903649','1575903652','5','0','','0.000','','1575903659','1027161575903649298538');
INSERT INTO `ysk_roborder` VALUES('67','1','100.000','1575903708','1575903708','3','50','谭成山','98107.500','1575903709','1575903747','1027191575903708645185');
INSERT INTO `ysk_roborder` VALUES('68','1','100.000','1575904623','1575904623','5','0','','0.000','','1575904630','1027151575904623812912');
INSERT INTO `ysk_roborder` VALUES('69','1','100.000','1575904716','1575904716','3','50','谭成山','98009.000','1575904717','1575904850','1027171575904716730546');
INSERT INTO `ysk_roborder` VALUES('70','1','100.000','1575904974','1575904974','3','50','谭成山','97910.500','1575904976','1575905069','1027171575904974790653');
INSERT INTO `ysk_roborder` VALUES('71','1','100.000','1575905140','1575905140','3','50','谭成山','97812.000','1575905142','1575905385','1027131575905140195696');
INSERT INTO `ysk_roborder` VALUES('72','1','100.000','1575905401','1575905401','3','50','谭成山','97713.500','1575905402','1575905615','1027141575905401198899');
INSERT INTO `ysk_roborder` VALUES('73','1','100.000','1575905640','1575905640','3','50','谭成山','97615.000','1575905640','1575905652','1027141575905640681344');
INSERT INTO `ysk_roborder` VALUES('74','1','100.000','1575905673','1575905674','3','50','谭成山','97516.500','1575905675','1575905690','1027171575905673556283');
INSERT INTO `ysk_roborder` VALUES('75','1','100.000','1575905829','1575905830','3','50','谭成山','97418.000','1575905831','1575905842','1027161575905829340049');
INSERT INTO `ysk_roborder` VALUES('76','1','100.000','1575905907','1575905907','3','50','谭成山','97319.500','1575905909','1575905913','1027111575905907281727');
INSERT INTO `ysk_roborder` VALUES('77','1','100.000','1575905972','1575905976','3','50','谭成山','97221.000','1575905976','1575905983','1027111575905972491226');
INSERT INTO `ysk_roborder` VALUES('78','1','100.000','1575906267','1575906267','3','50','谭成山','97122.500','1575906268','1575906448','1027181575906267955847');
INSERT INTO `ysk_roborder` VALUES('79','1','100.000','1575906519','1575906519','3','50','谭成山','97024.000','1575906519','1575906552','1027121575906519688521');
INSERT INTO `ysk_roborder` VALUES('80','1','100.000','1575907027','1575907043','5','0','','0.000','','1575907044','1027141575907027194323');
INSERT INTO `ysk_roborder` VALUES('81','1','100.000','1575908043','1575908043','5','0','','0.000','','1575908049','1027171575908043200174');
INSERT INTO `ysk_roborder` VALUES('82','1','100.000','1575908064','1575908079','5','0','','0.000','','1575908080','1027141575908064834627');
INSERT INTO `ysk_roborder` VALUES('83','1','100.000','1575908175','1575908175','3','50','谭成山','96925.500','1575908175','1575908252','1027151575908175501382');
INSERT INTO `ysk_roborder` VALUES('84','1','500.000','1575965740','1575965899','5','0','','0.000','','1575965899','1031011575965740434662');
INSERT INTO `ysk_roborder` VALUES('85','1','500.000','1575965948','1575965948','4','51','刘勇','18522.500','1575965949','1575966249','1031061575965948679481');
INSERT INTO `ysk_roborder` VALUES('86','1','1000.000','1575966420','1575966438','5','0','','0.000','','1575966438','1031061575966420684428');
INSERT INTO `ysk_roborder` VALUES('87','1','1000.000','1575966457','1575966469','5','0','','0.000','','1575966474','1031081575966457151494');
INSERT INTO `ysk_roborder` VALUES('88','2','1000.000','1575966487','1575966487','3','51','刘勇','18022.500','1575966488','1575966499','1031061575966487729492');
INSERT INTO `ysk_roborder` VALUES('89','2','1000.000','1575966961','1575966961','3','51','刘勇','17034.500','1575966961','1575966969','1031161575966961594396');
INSERT INTO `ysk_roborder` VALUES('90','1','800.000','1575967470','1575967484','5','0','','0.000','','1575967486','1031121575967470507066');
INSERT INTO `ysk_roborder` VALUES('91','1','800.000','1575967518','1575967523','3','51','刘勇','16046.500','1575967524','1575967624','1031111575967518787261');
INSERT INTO `ysk_roborder` VALUES('92','1','500.000','1575967582','1575967597','5','0','','0.000','','1575967599','1031171575967582595813');
INSERT INTO `ysk_roborder` VALUES('93','1','500.000','1575967663','1575967679','5','0','','0.000','','1575967680','1031141575967663566719');
INSERT INTO `ysk_roborder` VALUES('94','1','500.000','1575967691','1575967699','3','51','刘勇','15258.500','1575967699','1575967723','1031161575967691376384');
INSERT INTO `ysk_roborder` VALUES('95','1','500.000','1575969346','1575969347','3','51','刘勇','15766.000','1575969347','1575969355','1031111575969346394453');
INSERT INTO `ysk_roborder` VALUES('96','1','500.000','1575969459','1575969461','3','51','刘勇','15373.500','1575969462','1575969469','1031161575969459804974');
INSERT INTO `ysk_roborder` VALUES('97','1','100.000','1576133701','1576133701','3','50','谭成山','97842.852','1576133703','1576133714','1027111576133701549633');
INSERT INTO `ysk_roborder` VALUES('98','1','1000.000','1576134475','1576134485','5','0','','0.000','','1576134491','1031071576134475426226');
INSERT INTO `ysk_roborder` VALUES('99','2','1000.000','1576134502','1576134502','3','51','刘勇','14881.000','1576134503','1576134518','1031061576134502164315');
INSERT INTO `ysk_roborder` VALUES('100','2','1000.000','1576134691','1576134691','3','51','刘勇','13913.000','1576134692','1576134706','1031081576134691191252');
INSERT INTO `ysk_roborder` VALUES('101','1','100.000','1576135099','1576135099','3','50','谭成山','97750.750','1576135100','1576135104','1027171576135099198056');
--
-- 表的结构ysk_skm
--
DROP TABLE IF EXISTS `ysk_skm`;
CREATE TABLE `ysk_skm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wxewm` varchar(225) NOT NULL,
  `zfbewm` varchar(225) NOT NULL,
  `bankewm` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='收款码';

--
-- 转存表中的数据 ysk_skm

INSERT INTO `ysk_skm` VALUES('1','2019pay/2019-03-20/5c911c22156dc.png','2019pay/2019-03-20/5c911c22188b8.png','2019pay/2019-03-20/5c911c221b2c7.png');
--
-- 表的结构ysk_somebill
--
DROP TABLE IF EXISTS `ysk_somebill`;
CREATE TABLE `ysk_somebill` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `jl_class` int(11) NOT NULL COMMENT '流水类别：1佣金2团队奖励3充值4提现5订单匹配',
  `info` varchar(225) NOT NULL COMMENT '说明',
  `addtime` varchar(225) NOT NULL COMMENT '事件时间',
  `jc_class` varchar(225) NOT NULL COMMENT '分+ 或-',
  `num` float(10,3) NOT NULL COMMENT '币量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COMMENT='会员流水账单';

--
-- 转存表中的数据 ysk_somebill

INSERT INTO `ysk_somebill` VALUES('1','50','5','微信抢单本金','1572919880','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('2','50','1','微信抢单佣金','1572919880','+','13.000');
INSERT INTO `ysk_somebill` VALUES('3','50','5','微信抢单本金','1572920492','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('4','50','1','微信抢单佣金','1572920492','+','13.000');
INSERT INTO `ysk_somebill` VALUES('5','50','5','微信抢单本金','1572921954','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('6','50','1','微信抢单佣金','1572921954','+','13.000');
INSERT INTO `ysk_somebill` VALUES('7','50','5','微信抢单本金','1572922826','-','100.000');
INSERT INTO `ysk_somebill` VALUES('8','50','1','微信抢单佣金','1572922826','+','1.300');
INSERT INTO `ysk_somebill` VALUES('9','50','5','微信抢单本金','1575811473','-','100.000');
INSERT INTO `ysk_somebill` VALUES('10','50','1','微信抢单佣金','1575811473','+','1.300');
INSERT INTO `ysk_somebill` VALUES('11','50','5','微信抢单本金','1575811561','-','100.000');
INSERT INTO `ysk_somebill` VALUES('12','50','1','微信抢单佣金','1575811561','+','1.300');
INSERT INTO `ysk_somebill` VALUES('13','50','5','微信抢单本金','1575812032','-','100.000');
INSERT INTO `ysk_somebill` VALUES('14','50','1','微信抢单佣金','1575812032','+','1.300');
INSERT INTO `ysk_somebill` VALUES('15','50','5','微信抢单本金','1575817862','-','100.000');
INSERT INTO `ysk_somebill` VALUES('16','50','1','微信抢单佣金','1575817862','+','1.000');
INSERT INTO `ysk_somebill` VALUES('17','50','5','微信抢单本金','1575822767','-','100.000');
INSERT INTO `ysk_somebill` VALUES('18','50','1','微信抢单佣金','1575822767','+','1.000');
INSERT INTO `ysk_somebill` VALUES('19','51','5','微信抢单本金','1575875427','-','500.000');
INSERT INTO `ysk_somebill` VALUES('20','51','1','微信抢单佣金','1575875427','+','7.500');
INSERT INTO `ysk_somebill` VALUES('21','50','1','直推抢单成功佣金','1575875427','+','0.750');
INSERT INTO `ysk_somebill` VALUES('22','51','5','微信抢单本金','1575876436','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('23','51','1','微信抢单佣金','1575876436','+','15.000');
INSERT INTO `ysk_somebill` VALUES('24','50','1','直推抢单成功佣金','1575876436','+','1.500');
INSERT INTO `ysk_somebill` VALUES('25','50','5','微信抢单本金','1575894772','-','100.000');
INSERT INTO `ysk_somebill` VALUES('26','50','1','微信抢单佣金','1575894772','+','1.500');
INSERT INTO `ysk_somebill` VALUES('27','50','5','微信抢单本金','1575901566','-','100.000');
INSERT INTO `ysk_somebill` VALUES('28','50','1','微信抢单佣金','1575901566','+','1.500');
INSERT INTO `ysk_somebill` VALUES('29','50','5','微信抢单本金','1575903159','-','100.000');
INSERT INTO `ysk_somebill` VALUES('30','50','1','微信抢单佣金','1575903159','+','1.500');
INSERT INTO `ysk_somebill` VALUES('31','50','5','微信抢单本金','1575903183','-','100.000');
INSERT INTO `ysk_somebill` VALUES('32','50','1','微信抢单佣金','1575903183','+','1.500');
INSERT INTO `ysk_somebill` VALUES('33','50','5','微信抢单本金','1575903657','-','100.000');
INSERT INTO `ysk_somebill` VALUES('34','50','1','微信抢单佣金','1575903657','+','1.500');
INSERT INTO `ysk_somebill` VALUES('35','50','5','微信抢单本金','1575903747','-','100.000');
INSERT INTO `ysk_somebill` VALUES('36','50','1','微信抢单佣金','1575903747','+','1.500');
INSERT INTO `ysk_somebill` VALUES('37','50','5','微信抢单本金','1575904850','-','100.000');
INSERT INTO `ysk_somebill` VALUES('38','50','1','微信抢单佣金','1575904850','+','1.500');
INSERT INTO `ysk_somebill` VALUES('39','50','5','微信抢单本金','1575905069','-','100.000');
INSERT INTO `ysk_somebill` VALUES('40','50','1','微信抢单佣金','1575905069','+','1.500');
INSERT INTO `ysk_somebill` VALUES('41','50','5','微信抢单本金','1575905385','-','100.000');
INSERT INTO `ysk_somebill` VALUES('42','50','1','微信抢单佣金','1575905385','+','1.500');
INSERT INTO `ysk_somebill` VALUES('43','50','5','微信抢单本金','1575905615','-','100.000');
INSERT INTO `ysk_somebill` VALUES('44','50','1','微信抢单佣金','1575905615','+','1.500');
INSERT INTO `ysk_somebill` VALUES('45','50','5','微信抢单本金','1575905652','-','100.000');
INSERT INTO `ysk_somebill` VALUES('46','50','1','微信抢单佣金','1575905652','+','1.500');
INSERT INTO `ysk_somebill` VALUES('47','50','5','微信抢单本金','1575905690','-','100.000');
INSERT INTO `ysk_somebill` VALUES('48','50','1','微信抢单佣金','1575905690','+','1.500');
INSERT INTO `ysk_somebill` VALUES('49','50','5','微信抢单本金','1575905842','-','100.000');
INSERT INTO `ysk_somebill` VALUES('50','50','1','微信抢单佣金','1575905842','+','1.500');
INSERT INTO `ysk_somebill` VALUES('51','50','5','微信抢单本金','1575905913','-','100.000');
INSERT INTO `ysk_somebill` VALUES('52','50','1','微信抢单佣金','1575905913','+','1.500');
INSERT INTO `ysk_somebill` VALUES('53','50','5','微信抢单本金','1575905983','-','100.000');
INSERT INTO `ysk_somebill` VALUES('54','50','1','微信抢单佣金','1575905983','+','1.500');
INSERT INTO `ysk_somebill` VALUES('55','50','5','微信抢单本金','1575906448','-','100.000');
INSERT INTO `ysk_somebill` VALUES('56','50','1','微信抢单佣金','1575906448','+','1.500');
INSERT INTO `ysk_somebill` VALUES('57','50','5','微信抢单本金','1575906552','-','100.000');
INSERT INTO `ysk_somebill` VALUES('58','50','1','微信抢单佣金','1575906552','+','1.500');
INSERT INTO `ysk_somebill` VALUES('59','50','5','微信抢单本金','1575908252','-','100.000');
INSERT INTO `ysk_somebill` VALUES('60','50','1','微信抢单佣金','1575908252','+','1.500');
INSERT INTO `ysk_somebill` VALUES('61','51','5','支付宝抢单本金','1575966499','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('62','51','1','支付宝抢单佣金','1575966499','+','12.000');
INSERT INTO `ysk_somebill` VALUES('63','50','1','直推抢单成功佣金','1575966499','+','1.200');
INSERT INTO `ysk_somebill` VALUES('64','51','5','支付宝抢单本金','1575966969','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('65','51','1','支付宝抢单佣金','1575966969','+','12.000');
INSERT INTO `ysk_somebill` VALUES('66','50','1','直推抢单成功佣金','1575966969','+','1.200');
INSERT INTO `ysk_somebill` VALUES('67','51','5','微信抢单本金','1575967624','-','800.000');
INSERT INTO `ysk_somebill` VALUES('68','51','1','微信抢单佣金','1575967624','+','12.000');
INSERT INTO `ysk_somebill` VALUES('69','50','1','直推抢单成功佣金','1575967624','+','1.200');
INSERT INTO `ysk_somebill` VALUES('70','51','5','微信抢单本金','1575967723','-','500.000');
INSERT INTO `ysk_somebill` VALUES('71','51','1','微信抢单佣金','1575967723','+','7.500');
INSERT INTO `ysk_somebill` VALUES('72','50','1','直推抢单成功佣金','1575967723','+','0.750');
INSERT INTO `ysk_somebill` VALUES('73','51','5','微信抢单本金','1575969355','-','500.000');
INSERT INTO `ysk_somebill` VALUES('74','51','1','微信抢单佣金','1575969355','+','107.500');
INSERT INTO `ysk_somebill` VALUES('75','50','1','直推抢单成功佣金','1575969355','+','10.750');
INSERT INTO `ysk_somebill` VALUES('76','51','5','微信抢单本金','1575969469','-','500.000');
INSERT INTO `ysk_somebill` VALUES('77','51','1','微信抢单佣金','1575969469','+','7.500');
INSERT INTO `ysk_somebill` VALUES('78','50','1','直推抢单成功佣金','1575969469','+','0.750');
INSERT INTO `ysk_somebill` VALUES('79','50','5','微信抢单本金','1576133714','-','100.000');
INSERT INTO `ysk_somebill` VALUES('80','50','1','微信抢单佣金','1576133714','+','3.500');
INSERT INTO `ysk_somebill` VALUES('81','51','5','支付宝抢单本金','1576134518','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('82','51','1','支付宝抢单佣金','1576134518','+','32.000');
INSERT INTO `ysk_somebill` VALUES('83','50','1','直推抢单成功佣金','1576134518','+','3.200');
INSERT INTO `ysk_somebill` VALUES('84','51','5','支付宝抢单本金','1576134706','-','1000.000');
INSERT INTO `ysk_somebill` VALUES('85','51','1','支付宝抢单佣金','1576134706','+','12.000');
INSERT INTO `ysk_somebill` VALUES('86','50','1','直推抢单成功佣金','1576134706','+','1.200');
INSERT INTO `ysk_somebill` VALUES('87','50','5','微信抢单本金','1576135104','-','100.000');
INSERT INTO `ysk_somebill` VALUES('88','50','1','微信抢单佣金','1576135104','+','1.500');
--
-- 表的结构ysk_store
--
DROP TABLE IF EXISTS `ysk_store`;
CREATE TABLE `ysk_store` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户id',
  `cangku_num` decimal(13,5) NOT NULL DEFAULT '0.00000' COMMENT '钱包余额',
  `fengmi_num` decimal(13,5) NOT NULL DEFAULT '0.00000' COMMENT '积分',
  `plant_num` decimal(13,4) NOT NULL DEFAULT '0.0000' COMMENT '播种总数',
  `huafei_total` decimal(13,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '施肥累计',
  `vip_grade` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- 转存表中的数据 ysk_store

--
-- 表的结构ysk_system
--
DROP TABLE IF EXISTS `ysk_system`;
CREATE TABLE `ysk_system` (
  `id` int(2) NOT NULL AUTO_INCREMENT COMMENT '记录ID',
  `qd_cf` int(11) NOT NULL COMMENT '抢单余额比列',
  `qd_nd` varchar(225) NOT NULL COMMENT '抢单难度，数组(0.1,0.2,0.3)',
  `qd_wxyj` float(10,3) NOT NULL COMMENT '微信抢单佣金30%填0.3',
  `qd_zfbyj` float(10,3) NOT NULL COMMENT '支付宝抢单佣金30%填0.3',
  `qd_bkyj` float(10,3) NOT NULL COMMENT '银行卡抢单佣金30%填0.3',
  `qd_ndtime` varchar(225) NOT NULL COMMENT '增加难度时间点',
  `qd_yjjc` varchar(12) NOT NULL COMMENT '佣金加成',
  `qd_minmoney` float NOT NULL COMMENT '抢单最低额度',
  `min_recharge` float(10,3) NOT NULL COMMENT '最低充值额度',
  `mix_withdraw` float(10,3) NOT NULL COMMENT '最小提现额度',
  `max_withdraw` float(10,3) NOT NULL COMMENT '最大提现额度',
  `tx_yeb` float NOT NULL COMMENT '提现要求：收款与余额比例 ',
  `team_oneyj` float(10,3) NOT NULL COMMENT '1代佣金比例30%写0.3',
  `team_twoyj` float(10,3) NOT NULL COMMENT '2代佣金比例30%写0.3',
  `team_threeyj` float(10,3) NOT NULL COMMENT '3代佣金比例30%写0.3',
  `cz_yh` varchar(255) NOT NULL,
  `cz_xm` varchar(255) NOT NULL,
  `cz_kh` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='游戏参数设置表';

--
-- 转存表中的数据 ysk_system

INSERT INTO `ysk_system` VALUES('1','70','0.2','0.015','0.012','0.010','13,22','0.002','100','500.000','500.000','10000.000','50','0.100','0.050','0.030','农业银行','朱德义','6228481198233289579');
--
-- 表的结构ysk_upload
--
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

--
-- 转存表中的数据 ysk_upload

--
-- 表的结构ysk_user
--
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
  `login_pwd` varchar(225) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `login_salt` char(5) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `money` float(10,3) NOT NULL DEFAULT '0.000' COMMENT '用户余额',
  `reg_date` int(11) NOT NULL COMMENT '注册时间',
  `reg_ip` varchar(20) NOT NULL COMMENT '注册IP',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户锁定  1 不锁  0拉黑  -1 删除',
  `activate` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否激活 1-已激活 0-未激活',
  `session_id` varchar(225) DEFAULT NULL,
  `wx_no` varchar(225) DEFAULT NULL COMMENT '微信账号',
  `alipay` varchar(225) DEFAULT NULL COMMENT '支付宝',
  `truename` varchar(225) DEFAULT NULL COMMENT '真实姓名',
  `email` varchar(225) NOT NULL COMMENT '电子邮件',
  `userqq` varchar(32) NOT NULL COMMENT 'QQ',
  `usercard` varchar(32) NOT NULL COMMENT '身份证号码',
  `path` text,
  `use_grade` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户等级',
  `u_ztnum` int(11) NOT NULL COMMENT '直推人数',
  `rz_st` int(1) NOT NULL COMMENT '资料完善状态，1OK2no',
  `tx_status` int(11) NOT NULL COMMENT '提现状态',
  `zsy` float(10,3) NOT NULL COMMENT '总收益',
  PRIMARY KEY (`userid`) USING BTREE,
  UNIQUE KEY `mobile` (`mobile`) USING BTREE,
  UNIQUE KEY `account` (`account`) USING BTREE,
  KEY `username` (`username`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 ysk_user

INSERT INTO `ysk_user` VALUES('52','50','0','0','15064030366','15064030366','cEi2FNFedkYD','沐阳','4b9c3a8ccd7d6fa2f21efbaf85c1cc82','WPEK','0.000','1575900947','223.11.49.47','1','0','84281f0m1fq205mopp36nvfir3','15064038366','15064030366','沐阳','43539369@qq.com','43539369','140108198208262222','-8570-1-7-8-50-','1','0','1','1','0.000');
INSERT INTO `ysk_user` VALUES('51','50','0','0','13165124666','13165124666','d91E8dd0cKDL','liu111999','87cff43506fa0273d32ce7f37fc01774','blCH','12925.000','1575842287','60.216.169.218','1','0','vqhq648a9ufuv7rsehe9hjvm44','shdg','d','刘勇','1234@qq.com','5588','372510','-8570-1-7-8-50-','1','0','1','1','8025.000');
INSERT INTO `ysk_user` VALUES('50','0','0','0','13969901196','13969901196','mYZVaoFYZwb4','王大可1','1ea9bb4c15e153968b495debcac1b5a1','nJfl','97652.250','1553320281','60.217.21.254','1','0','jt35irn3sjigh7485d6vripi44','tcs777','13969901196','谭成山','421692188@qq.com','421692188','371328199107070032','-8570-1-7-8-','1','2','1','1','23912.199');
--
-- 表的结构ysk_userrob
--
DROP TABLE IF EXISTS `ysk_userrob`;
CREATE TABLE `ysk_userrob` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `class` int(2) NOT NULL COMMENT '支付类别',
  `price` float(10,3) NOT NULL COMMENT '金额',
  `yjjc` float(10,3) NOT NULL COMMENT '佣金加成',
  `umoney` float(10,3) NOT NULL COMMENT '会员余额',
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
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='会员抢单表前台发起的';

--
-- 转存表中的数据 ysk_userrob

INSERT INTO `ysk_userrob` VALUES('1','50','1','1000.000','0.000','4065.000','13969901196','谭成山','4','-1','0','3','1572919861','1572919861','1572919880','1027161572919852988418');
INSERT INTO `ysk_userrob` VALUES('2','50','1','1000.000','0.000','3078.000','13969901196','谭成山','6','-1','0','3','1572920383','1572920383','1572920492','1027121572920382436292');
INSERT INTO `ysk_userrob` VALUES('3','50','1','1000.000','0.000','2091.000','13969901196','谭成山','11','-1','0','3','1572921903','1572921903','1572921954','1027161572921901358428');
INSERT INTO `ysk_userrob` VALUES('4','50','1','100.000','0.000','1104.000','13969901196','谭成山','12','-1','0','3','1572922702','1572922702','1572922826','1027131572922701316727');
INSERT INTO `ysk_userrob` VALUES('5','50','1','100.000','0.000','1005.300','13969901196','谭成山','17','-1','0','3','1575811440','1575811440','1575811473','1027111575811439871423');
INSERT INTO `ysk_userrob` VALUES('6','50','1','100.000','0.000','906.600','13969901196','谭成山','18','-1','0','3','1575811518','1575811518','1575811561','1027191575811517459119');
INSERT INTO `ysk_userrob` VALUES('7','50','1','100.000','0.000','807.900','13969901196','谭成山','19','-1','0','3','1575811992','1575811992','1575812032','1027151575811992296454');
INSERT INTO `ysk_userrob` VALUES('8','50','1','100.000','0.000','709.200','13969901196','谭成山','20','-1','0','4','1575816591','1575816591','1575817079','1027131575816591794617');
INSERT INTO `ysk_userrob` VALUES('9','50','1','100.000','0.000','609.200','13969901196','谭成山','21','-1','0','3','1575817570','1575817570','1575817862','1027151575817570127747');
INSERT INTO `ysk_userrob` VALUES('10','50','1','100.000','0.000','510.200','13969901196','谭成山','24','-1','0','3','1575822738','1575822738','1575822767','1027161575822737399273');
INSERT INTO `ysk_userrob` VALUES('11','50','1','100.000','0.000','411.200','13969901196','谭成山','25','-1','0','4','1575860876','1575860876','1575861176','1027141575860875248544');
INSERT INTO `ysk_userrob` VALUES('12','50','1','100.000','0.000','311.200','13969901196','谭成山','26','-1','0','4','1575863178','1575863178','1575863478','1027121575863178262938');
INSERT INTO `ysk_userrob` VALUES('13','51','1','1000.000','0.000','1000.000','13165124666','刘勇','29','-1','0','4','1575872764','1575872764','1575873064','1031181575872755252132');
INSERT INTO `ysk_userrob` VALUES('14','51','1','500.000','0.000','20000.000','13165124666','刘勇','30','-1','0','3','1575875216','1575875216','1575875427','1031161575875216727283');
INSERT INTO `ysk_userrob` VALUES('15','51','1','1000.000','0.000','19507.500','13165124666','刘勇','32','-1','0','3','1575876423','1575876423','1575876436','1031041575876413701453');
INSERT INTO `ysk_userrob` VALUES('16','50','1','100.000','0.000','213.450','13969901196','谭成山','33','-1','0','4','1575893831','1575893831','1575894132','1027141575893829776398');
INSERT INTO `ysk_userrob` VALUES('17','50','1','100.000','0.000','100000.000','13969901196','谭成山','34','-1','0','3','1575894576','1575894576','1575894772','1027121575894576161755');
INSERT INTO `ysk_userrob` VALUES('18','50','1','100.000','0.000','99901.500','13969901196','谭成山','36','-1','0','4','1575894793','1575894793','1575895094','1027161575894792650195');
INSERT INTO `ysk_userrob` VALUES('19','50','1','100.000','0.000','99801.500','13969901196','谭成山','37','-1','0','4','1575895142','1575895142','1575895442','1027191575895141140074');
INSERT INTO `ysk_userrob` VALUES('20','50','1','100.000','0.000','99701.500','13969901196','谭成山','39','-1','0','4','1575895726','1575895726','1575896026','1027131575895724636945');
INSERT INTO `ysk_userrob` VALUES('21','50','1','100.000','0.000','99601.500','13969901196','谭成山','40','-1','0','4','1575896049','1575896049','1575896349','1027171575896047253462');
INSERT INTO `ysk_userrob` VALUES('22','50','1','100.000','0.000','99501.500','13969901196','谭成山','41','-1','0','4','1575896364','1575896364','1575896664','1027121575896362306227');
INSERT INTO `ysk_userrob` VALUES('23','50','1','100.000','0.000','99401.500','13969901196','谭成山','42','-1','0','4','1575896698','1575896698','1575896998','1027181575896697710131');
INSERT INTO `ysk_userrob` VALUES('24','50','1','100.000','0.000','99301.500','13969901196','谭成山','43','-1','0','4','1575897070','1575897070','1575897370','1027111575897069322095');
INSERT INTO `ysk_userrob` VALUES('25','50','1','100.000','0.000','99201.500','13969901196','谭成山','44','-1','0','4','1575898285','1575898285','1575898586','1027181575898284863943');
INSERT INTO `ysk_userrob` VALUES('26','50','1','100.000','0.000','99101.500','13969901196','谭成山','45','-1','0','4','1575898600','1575898600','1575898901','1027131575898599244363');
INSERT INTO `ysk_userrob` VALUES('27','50','1','100.000','0.000','99001.500','13969901196','谭成山','46','-1','0','4','1575898917','1575898917','1575899218','1027111575898914169851');
INSERT INTO `ysk_userrob` VALUES('28','50','1','100.000','0.000','98901.500','13969901196','谭成山','47','-1','0','4','1575899240','1575899240','1575899540','1027131575899239285745');
INSERT INTO `ysk_userrob` VALUES('29','50','1','100.000','0.000','98801.500','13969901196','谭成山','49','-1','0','4','1575899553','1575899553','1575899854','1027181575899551992541');
INSERT INTO `ysk_userrob` VALUES('30','50','1','100.000','0.000','98701.500','13969901196','谭成山','51','-1','0','4','1575899915','1575899915','1575900216','1027131575899914336643');
INSERT INTO `ysk_userrob` VALUES('31','50','1','100.000','0.000','98601.500','13969901196','谭成山','56','-1','0','3','1575901550','1575901550','1575901566','1027131575901549788431');
INSERT INTO `ysk_userrob` VALUES('32','50','1','100.000','0.000','98503.000','13969901196','谭成山','61','-1','0','4','1575902163','1575902163','1575902464','1027121575902163128868');
INSERT INTO `ysk_userrob` VALUES('33','50','1','100.000','0.000','98403.000','13969901196','谭成山','63','-1','0','3','1575902871','1575902871','1575903159','1027191575902869266176');
INSERT INTO `ysk_userrob` VALUES('34','50','1','100.000','0.000','98304.500','13969901196','谭成山','64','-1','0','3','1575903174','1575903174','1575903183','1027131575903173195074');
INSERT INTO `ysk_userrob` VALUES('35','50','1','100.000','0.000','98206.000','13969901196','谭成山','65','-1','0','3','1575903583','1575903583','1575903657','1027111575903580867872');
INSERT INTO `ysk_userrob` VALUES('36','50','1','100.000','0.000','98107.500','13969901196','谭成山','67','-1','0','3','1575903709','1575903709','1575903747','1027191575903708645185');
INSERT INTO `ysk_userrob` VALUES('37','50','1','100.000','0.000','98009.000','13969901196','谭成山','69','-1','0','3','1575904717','1575904717','1575904850','1027171575904716730546');
INSERT INTO `ysk_userrob` VALUES('38','50','1','100.000','0.000','97910.500','13969901196','谭成山','70','-1','0','3','1575904976','1575904976','1575905069','1027171575904974790653');
INSERT INTO `ysk_userrob` VALUES('39','50','1','100.000','0.000','97812.000','13969901196','谭成山','71','-1','0','3','1575905142','1575905142','1575905385','1027131575905140195696');
INSERT INTO `ysk_userrob` VALUES('40','50','1','100.000','0.000','97713.500','13969901196','谭成山','72','-1','0','3','1575905402','1575905402','1575905615','1027141575905401198899');
INSERT INTO `ysk_userrob` VALUES('41','50','1','100.000','0.000','97615.000','13969901196','谭成山','73','-1','0','3','1575905640','1575905640','1575905652','1027141575905640681344');
INSERT INTO `ysk_userrob` VALUES('42','50','1','100.000','0.000','97516.500','13969901196','谭成山','74','-1','0','3','1575905675','1575905675','1575905690','1027171575905673556283');
INSERT INTO `ysk_userrob` VALUES('43','50','1','100.000','0.000','97418.000','13969901196','谭成山','75','-1','0','3','1575905831','1575905831','1575905842','1027161575905829340049');
INSERT INTO `ysk_userrob` VALUES('44','50','1','100.000','0.000','97319.500','13969901196','谭成山','76','-1','0','3','1575905909','1575905909','1575905913','1027111575905907281727');
INSERT INTO `ysk_userrob` VALUES('45','50','1','100.000','0.000','97221.000','13969901196','谭成山','77','-1','0','3','1575905976','1575905976','1575905983','1027111575905972491226');
INSERT INTO `ysk_userrob` VALUES('46','50','1','100.000','0.000','97122.500','13969901196','谭成山','78','-1','0','3','1575906268','1575906268','1575906448','1027181575906267955847');
INSERT INTO `ysk_userrob` VALUES('47','50','1','100.000','0.000','97024.000','13969901196','谭成山','79','-1','0','3','1575906519','1575906519','1575906552','1027121575906519688521');
INSERT INTO `ysk_userrob` VALUES('48','50','1','100.000','0.000','96925.500','13969901196','谭成山','83','-1','0','3','1575908175','1575908175','1575908252','1027151575908175501382');
INSERT INTO `ysk_userrob` VALUES('49','51','1','500.000','0.000','18522.500','13165124666','刘勇','85','-1','0','4','1575965949','1575965949','1575966249','1031061575965948679481');
INSERT INTO `ysk_userrob` VALUES('50','51','2','1000.000','0.000','18022.500','13165124666','刘勇','88','-1','0','3','1575966488','1575966488','1575966499','1031061575966487729492');
INSERT INTO `ysk_userrob` VALUES('51','51','2','1000.000','0.000','17034.500','13165124666','刘勇','89','-1','0','3','1575966961','1575966961','1575966969','1031161575966961594396');
INSERT INTO `ysk_userrob` VALUES('52','51','1','800.000','0.000','16046.500','13165124666','刘勇','91','-1','0','3','1575967524','1575967524','1575967624','1031111575967518787261');
INSERT INTO `ysk_userrob` VALUES('53','51','1','500.000','0.000','15258.500','13165124666','刘勇','94','-1','0','3','1575967699','1575967699','1575967723','1031161575967691376384');
INSERT INTO `ysk_userrob` VALUES('54','51','1','500.000','0.200','15766.000','13165124666','刘勇','95','-1','0','3','1575969347','1575969347','1575969355','1031111575969346394453');
INSERT INTO `ysk_userrob` VALUES('55','51','1','500.000','0.000','15373.500','13165124666','刘勇','96','-1','0','3','1575969462','1575969462','1575969469','1031161575969459804974');
INSERT INTO `ysk_userrob` VALUES('56','50','1','100.000','0.020','97842.852','13969901196','谭成山','97','-1','0','3','1576133703','1576133703','1576133714','1027111576133701549633');
INSERT INTO `ysk_userrob` VALUES('57','51','2','1000.000','0.020','14881.000','13165124666','刘勇','99','-1','0','3','1576134503','1576134503','1576134518','1031061576134502164315');
INSERT INTO `ysk_userrob` VALUES('58','51','2','1000.000','0.000','13913.000','13165124666','刘勇','100','-1','0','3','1576134692','1576134692','1576134706','1031081576134691191252');
INSERT INTO `ysk_userrob` VALUES('59','50','1','100.000','0.000','97750.750','13969901196','谭成山','101','-1','0','3','1576135100','1576135100','1576135104','1027171576135099198056');
--
-- 表的结构ysk_withdraw
--
DROP TABLE IF EXISTS `ysk_withdraw`;
CREATE TABLE `ysk_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `uid` int(11) NOT NULL COMMENT '会员ID',
  `account` varchar(225) NOT NULL COMMENT '提现账号',
  `name` varchar(225) NOT NULL COMMENT '提现人姓名',
  `way` varchar(225) NOT NULL COMMENT '提现方式',
  `price` float(10,3) NOT NULL COMMENT '提现金额',
  `addtime` varchar(225) NOT NULL COMMENT '提现时间',
  `endtime` varchar(225) NOT NULL COMMENT '完成时间',
  `status` int(11) NOT NULL COMMENT '状态1提交，2退回3成功',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='提现申请表';

--
-- 转存表中的数据 ysk_withdraw

