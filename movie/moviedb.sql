/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : moviedb

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-07-05 09:02:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT '2',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unique` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role` (
  `uid` int(11) NOT NULL COMMENT '管理员id',
  `rid` int(11) NOT NULL COMMENT '角色id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_role
-- ----------------------------

-- ----------------------------
-- Table structure for film
-- ----------------------------
DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(11) DEFAULT NULL COMMENT '影片类型',
  `title` varchar(36) DEFAULT NULL,
  `engname` varchar(100) NOT NULL COMMENT '影片英文名称',
  `picname` varchar(36) DEFAULT NULL,
  `firsttime` timestamp NULL DEFAULT NULL COMMENT '首映时间',
  `duration` varchar(255) DEFAULT NULL COMMENT '时长',
  `director` varchar(16) DEFAULT NULL COMMENT '导演',
  `actor` varchar(100) DEFAULT NULL COMMENT '主演',
  `region` varchar(10) DEFAULT NULL COMMENT '地区',
  `introduction` mediumtext,
  `language` varchar(15) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of film
-- ----------------------------
INSERT INTO `film` VALUES ('1', '1', '变形金刚5：最后的骑士', '', '20170627001.jpg', '2017-06-27 19:00:00', '150分钟', '迈克尔·贝', '马克·沃尔伯格,伊莎贝拉·莫奈,劳拉·哈德克', ' 美国', '人类和变形金刚开战，擎天柱失踪，拯救未来的关键就埋藏在历史的秘密之中，那是地球上变形金刚的历史。拯救世界的责任落在一支非同寻常的队伍身上：凯德·伊格尔（马克·沃尔伯格 饰）、大黄蜂、一位英国爵士（安东尼·霍普金斯 饰）还有一位牛津大学教授（劳拉·哈德克 饰）。每个人一生中都会遇到这样一个时刻，它召唤着我们去改变世界。一直被追捕的人将成为英雄，英雄会变成反派。我们和他们的世界，只能存活一个。', '英文', '9.7', '2');
INSERT INTO `film` VALUES ('2', '2', '异形：契约', '', '20170627002.jpg', '2017-06-21 17:50:00', '116分钟', '雷德利·斯科特', '迈克尔·法斯宾德,凯瑟琳·沃特斯顿,比利·克鲁德普,卡门·艾乔戈', '美国', '故事发生在《普罗米修斯》10年后，一群新的宇航员乘坐着“契约号”飞船前往遥远的星系寻找殖民地，他们来到一处看似天堂般的星球，实则是黑暗、危险的地狱，在那里他们见到了“普罗米修斯”号唯一的幸存者生化人大卫（迈克尔·法斯宾德 饰），一场毁灭性的巨大灾难即将到来。', '英文', '7.9', '2');
INSERT INTO `film` VALUES ('3', '3', '\r\n逆时营救', '', '20170627003.jpg', '2017-06-29 18:00:00', '106分钟', '尹鸿承', '杨幂,霍建华,刘畅', '中国大陆', '夏天（杨幂 饰）是个单亲妈妈，同时也是物理研究所的高级研究员，她多年致力于研究能回到过去的粒子技术，研究即将要成功的一天，夏天发现儿子豆豆（张艺瀚 饰）被神秘绑匪崔琥（霍建华 饰）绑架，崔琥以豆豆性命威胁夏天交出粒子技术，为了挽救豆豆的生命，夏天冒险用未完成的粒子技术返回1小时50分钟前，却令事情变得更加复杂，崔琥的背后故事也渐渐浮出水面。', '中文', '5.4', '2');

-- ----------------------------
-- Table structure for hall
-- ----------------------------
DROP TABLE IF EXISTS `hall`;
CREATE TABLE `hall` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `layout` varchar(255) DEFAULT NULL COMMENT '座位布局',
  `cid` int(11) unsigned NOT NULL COMMENT '所属影院',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hall
-- ----------------------------
INSERT INTO `hall` VALUES ('1', '1号彩虹厅', 'eeeeee-eeeeee', '2');
INSERT INTO `hall` VALUES ('2', '2号巨幕厅', 'eeeeeeeeee-eeee', '2');
INSERT INTO `hall` VALUES ('3', '3号VIP厅', 'eeeeeeee', '2');
INSERT INTO `hall` VALUES ('4', '1号时光厅', 'eeeeeeeeeeeeeee', '1');

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` mediumint(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL COMMENT '资讯标题',
  `thumb` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `content` mediumtext NOT NULL COMMENT '文章内容',
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '资讯状态：1发布，0待审核',
  `inputtime` int(10) NOT NULL,
  `updatetime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', '郑爽不满戏份少，携粉丝一起手撕剧方！网友：一场大戏啊', '', '爽妹子无时无刻都热度不断～无论是生活中陪妈妈扫货，还是工作中的电视剧热度，只要有郑爽出现的地方，就是焦点！', '近期郑爽粉丝集中火力手撕《夏至未至》制作方，为郑爽讨公道！原因是郑爽的戏份越来越少！粉丝声明：\r\n夏至未至从开播以来，郑爽和正版尽心尽力配合宣传，可剧方只把郑爽当成宣传所需的态度实在令人寒心，请剧方尊重演员郑爽的劳动成果。\r\n郑爽作为夏至未至女主，也是宣传担当，剧方却把夏至未至剪成了配角传？每集cut越来越少？且cut还包含女主和其他演员的对手戏，今晚更是高糊远镜头，立夏在剧中成了旁白和回忆里的人物，男女主预告就是每集所有戏份。\r\n开播以来无休止的买通稿，颜值演技无休止拉踩，请问每集几分钟的镜头怎样对比演技好坏？郑爽戏份少还有扛骂，扛不起收视率？请数一数女主戏份总共多少秒，这个锅我们不背。\r\n我们不撕，只请给郑爽应有的尊重，毕竟我们都是奔着女主郑爽去看的，而不是想在剧里面找镜头。\r\n粉丝还开了话题“立夏未至，配角已至”，着力在本话题里声讨剧方，截图说明郑爽的cut时长越来越短。', '0', '0', '0');
INSERT INTO `news` VALUES ('2', '只演过一次反派的霍建华，居然要在《建军大业》演蒋介石了', '', '他是史上最帅的令狐冲，是心怀家国的顾清明，是豪情万丈的镖局大师兄，也是睿智机敏的犯罪心理学教授。他， 是霍建华，一个演员。', '来大陆之前一年拍七部戏\r\n\r\n霍建华出生在台北，心怀歌手梦想的他，在2002年因出演偶像剧《摘星》正式踏入演艺圈，俊朗的外表，气质迷人，让他的演艺事业风生水起，先后出演了《千金百分百》、《海豚湾恋人》、《西街少年》等优质偶像剧，俘获大量粉丝，他本人更是创下了一年七部剧的拍摄记录。2004年后，他将演艺事业的重心转向内地，凭借其首部古装武侠剧《天下第一》 中的精彩演出，开始在内地电视剧领域崭露头角。在内地的十三年里，霍建华角色多变，戏路宽广，从古装仙侠到傲娇神坛，他塑造了一个个脍炙人口的角色，其中不乏一些口碑与收视俱佳的作品。如：《感动生命》、《仙剑奇侠传三》、《倾世皇妃》、《镖门》、《战长沙》等等。', '0', '0', '0');
INSERT INTO `news` VALUES ('3', '万里寻家故事震撼人心，《雄狮》深厚亲情引共鸣', '23346876.jpg', '万里寻家故事震撼人心，《雄狮》深厚亲情引共鸣', '由加斯·戴维斯执导，戴夫·帕特尔、鲁妮·玛拉、大卫·文翰、妮可·基德曼、桑尼·帕沃主演的情感励志大片《雄狮》正在全国火热上映。本片改编自印度真实故事，动人的寻家剧情和强大的情感能量直抵人心，是同档期内最受女性关注的暖心温情电影，也是不少家庭观影群体的第一选择。\r\n \r\n真实故事打动人心  寻家故事引发心灵共鸣\r\n\r\n电影《雄狮》讲述了一个近乎奇迹的寻家之旅传奇故事，影片改编自畅销书《漫漫回家路》作者的真实经历。5岁的印度小男孩萨罗出身贫困，在一次哥哥带他坐火车打工时，不慎走失。他被一对好心的澳洲夫妇收养，但内心深处并未淡忘对于母亲和哥哥的亲情，一个契机使得他通过网络开始寻找家乡，并最终重回印度，踏上寻亲之旅。影片聚焦在印度走失儿童小萨罗的视角，其走失后颠沛流离、危机四伏的流浪之旅让观众揪心不已。而男主人公在25年之后，以亲情激活了沉睡的雄狮，踏上了漫漫回家路的选择也令观众产生了心灵的共鸣。影片所展示的“寻根”和“回家”的主题正是人类的本能，寻找心灵的归属是人生安全感最重要的来源，这一情感表达也引起了无数人的共鸣。', '0', '1498794594', '1498794594');
INSERT INTO `news` VALUES ('4', '水电费', '1498802681.jpeg', '阿萨德无', '电饭锅', '0', '1498802681', '1498802681');
INSERT INTO `news` VALUES ('5', '北京万达影城丰台店', '1498812027.jpeg', '万里寻家故事震撼人心，《雄狮》深厚亲情引共鸣', '招待费', '0', '1498812027', '1498812027');
INSERT INTO `news` VALUES ('6', '司法改革黑寡妇', '1498812141.jpeg', '食发鬼', '电饭锅', '0', '1498812141', '1498812141');

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '操作名称',
  `method` varchar(20) DEFAULT NULL COMMENT '方法名称',
  `url` varchar(100) DEFAULT NULL COMMENT '操作地址',
  `created_at` int(20) DEFAULT NULL COMMENT '创建时间',
  `update_at` int(20) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of node
-- ----------------------------

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `totalprice` decimal(8,2) DEFAULT NULL,
  `seat` varchar(255) DEFAULT NULL,
  `playtime` datetime DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `ispay` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '38.00', '3排6座', '2017-07-03 11:47:31', '2017-07-03 14:47:35', '1');

-- ----------------------------
-- Table structure for projection
-- ----------------------------
DROP TABLE IF EXISTS `projection`;
CREATE TABLE `projection` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` int(11) NOT NULL COMMENT '影片信息id',
  `hid` int(11) NOT NULL COMMENT '影厅信息',
  `cid` int(10) unsigned NOT NULL COMMENT '影院id',
  `price` double(6,2) unsigned DEFAULT NULL COMMENT '价格',
  `seatinfo` varchar(20) DEFAULT NULL COMMENT '座位信息',
  `starttime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '放映时间',
  `endtime` datetime DEFAULT NULL COMMENT '结束时间',
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of projection
-- ----------------------------
INSERT INTO `projection` VALUES ('1', '1', '2', '2', '35.00', '宽松', '2017-07-04 17:00:00', '2017-07-04 19:00:00', null, null);
INSERT INTO `projection` VALUES ('2', '2', '1', '2', '45.00', '宽松', '2017-07-05 12:00:00', '2017-07-05 14:10:00', null, null);
INSERT INTO `projection` VALUES ('4', '3', '2', '2', '30.00', '宽松', '2017-07-05 14:20:00', '2017-07-05 16:10:00', null, null);

-- ----------------------------
-- Table structure for rel_orders
-- ----------------------------
DROP TABLE IF EXISTS `rel_orders`;
CREATE TABLE `rel_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `pid` int(11) DEFAULT NULL COMMENT '放映信息id',
  `sid` int(11) DEFAULT NULL COMMENT '商家id',
  `oid` int(11) DEFAULT NULL COMMENT '订单id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rel_orders
-- ----------------------------
INSERT INTO `rel_orders` VALUES ('1', '1', '5', '1', '1');

-- ----------------------------
-- Table structure for rel_shop
-- ----------------------------
DROP TABLE IF EXISTS `rel_shop`;
CREATE TABLE `rel_shop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL COMMENT '商家注册手机号',
  `password` varchar(32) NOT NULL COMMENT '影厅id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rel_shop
-- ----------------------------
INSERT INTO `rel_shop` VALUES ('1', '13949080053', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `rel_shop` VALUES ('2', '13681333992', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for role_node
-- ----------------------------
DROP TABLE IF EXISTS `role_node`;
CREATE TABLE `role_node` (
  `rid` int(11) NOT NULL COMMENT '角色id',
  `nid` int(11) NOT NULL COMMENT '节点id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role_node
-- ----------------------------

-- ----------------------------
-- Table structure for setup
-- ----------------------------
DROP TABLE IF EXISTS `setup`;
CREATE TABLE `setup` (
  `id` tinyint(10) unsigned NOT NULL AUTO_INCREMENT,
  `web_title` varchar(120) NOT NULL COMMENT '站点标题',
  `web_keywords` varchar(120) NOT NULL COMMENT '站点关键词',
  `web_description` varchar(255) NOT NULL COMMENT '站点描述',
  `web_icp` varchar(32) NOT NULL COMMENT '备案号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setup
-- ----------------------------

-- ----------------------------
-- Table structure for shop_detail
-- ----------------------------
DROP TABLE IF EXISTS `shop_detail`;
CREATE TABLE `shop_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shop_id` int(10) unsigned NOT NULL COMMENT '密码',
  `shopname` varchar(255) NOT NULL COMMENT '商家名称',
  `legal` varchar(16) NOT NULL COMMENT '法人代表',
  `id_card` varchar(18) NOT NULL COMMENT '身份证号',
  `city` varchar(255) NOT NULL COMMENT '城市',
  `region` varchar(255) NOT NULL COMMENT '区，县',
  `address` varchar(255) NOT NULL COMMENT '地址',
  `licence` varchar(255) NOT NULL,
  `status` int(3) unsigned NOT NULL COMMENT '1,通过审核2，未通过',
  `addtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_detail
-- ----------------------------
INSERT INTO `shop_detail` VALUES ('1', '1', '北京大地影院菓岭假日广场店', '常天飞', '140427198810108827', '北京', '昌平区', '昌平区昌崔路203号果岭假日广场四楼', '', '0', '2017-07-03 14:18:49');
INSERT INTO `shop_detail` VALUES ('2', '2', '大连万达影院', '王健林', '140427198810108812', '大连', '阿斯蒂芬', '阿飞王妃', '', '0', '2017-07-03 14:18:43');

-- ----------------------------
-- Table structure for shop_region
-- ----------------------------
DROP TABLE IF EXISTS `shop_region`;
CREATE TABLE `shop_region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL COMMENT '城市',
  `level` int(3) unsigned NOT NULL,
  `upid` mediumint(8) unsigned NOT NULL COMMENT '父id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_region
-- ----------------------------
INSERT INTO `shop_region` VALUES ('1', '北京', '1', '0');
INSERT INTO `shop_region` VALUES ('2', '天津', '1', '0');
INSERT INTO `shop_region` VALUES ('3', '东城区', '2', '1');
INSERT INTO `shop_region` VALUES ('4', '西城区', '2', '1');
INSERT INTO `shop_region` VALUES ('5', '崇文区', '2', '1');
INSERT INTO `shop_region` VALUES ('6', '宣武区', '2', '1');
INSERT INTO `shop_region` VALUES ('7', '朝阳区', '2', '1');
INSERT INTO `shop_region` VALUES ('8', '丰台区', '2', '1');
INSERT INTO `shop_region` VALUES ('9', '石景山区', '2', '1');
INSERT INTO `shop_region` VALUES ('10', '海淀区', '2', '1');
INSERT INTO `shop_region` VALUES ('11', '门头沟区', '2', '1');
INSERT INTO `shop_region` VALUES ('12', '房山区', '2', '1');
INSERT INTO `shop_region` VALUES ('13', '通州区', '2', '1');
INSERT INTO `shop_region` VALUES ('14', '顺义区', '2', '1');
INSERT INTO `shop_region` VALUES ('15', '昌平区', '2', '1');
INSERT INTO `shop_region` VALUES ('16', '大兴区', '2', '1');
INSERT INTO `shop_region` VALUES ('17', '怀柔区', '2', '1');
INSERT INTO `shop_region` VALUES ('18', '平谷区', '2', '1');
INSERT INTO `shop_region` VALUES ('19', '密云县', '2', '1');
INSERT INTO `shop_region` VALUES ('20', '延庆县', '2', '1');
INSERT INTO `shop_region` VALUES ('21', '和平区', '2', '2');
INSERT INTO `shop_region` VALUES ('22', '河东区', '2', '2');
INSERT INTO `shop_region` VALUES ('23', '河西区', '2', '2');
INSERT INTO `shop_region` VALUES ('24', '南开区', '2', '2');
INSERT INTO `shop_region` VALUES ('25', '河北区', '2', '2');
INSERT INTO `shop_region` VALUES ('26', '红桥区', '2', '2');
INSERT INTO `shop_region` VALUES ('27', '塘沽区', '2', '2');
INSERT INTO `shop_region` VALUES ('28', '汉沽区', '2', '2');
INSERT INTO `shop_region` VALUES ('29', '大港区', '2', '2');
INSERT INTO `shop_region` VALUES ('30', '蓟县', '2', '2');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` tinyint(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `addtime` datetime DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  `loginip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for users_detail
-- ----------------------------
DROP TABLE IF EXISTS `users_detail`;
CREATE TABLE `users_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firsttime` datetime DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `unique` (`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_detail
-- ----------------------------
INSERT INTO `users_detail` VALUES ('1', '拉拉啊', '1', '北京市昌平区', '1', 'admin@qq.com', '2017-06-27 14:35:33', '2017-06-28 14:35:39');
INSERT INTO `users_detail` VALUES ('2', '好好说', '0', '南京', '1', '9787767@163.com', '2017-06-06 14:37:11', '2017-06-28 14:37:14');
INSERT INTO `users_detail` VALUES ('3', '尖叫', '1', '回龙观东大街', '1', '672354687@qq.com', '2017-06-21 14:38:21', '2017-06-14 14:38:26');
INSERT INTO `users_detail` VALUES ('4', '脉动', '0', '陕西省宝鸡市', '1', 'angek@126.com', '2017-05-31 14:40:57', '2017-06-22 14:41:02');

-- ----------------------------
-- Table structure for websetup
-- ----------------------------
DROP TABLE IF EXISTS `websetup`;
CREATE TABLE `websetup` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) DEFAULT NULL,
  `keywords` varchar(120) DEFAULT NULL,
  `description` varchar(240) DEFAULT NULL,
  `icp` varchar(32) DEFAULT NULL,
  `anbei` varchar(32) DEFAULT NULL,
  `company` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `updatetime` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of websetup
-- ----------------------------
INSERT INTO `websetup` VALUES ('1', '熊猫电影 --一网打尽好电影', '电影,电视剧,票房,美剧,猫眼电影,电影排行榜,电影票,经典电影,在线观看', '猫眼电影致力于打造中国最大最全的电影信息资讯平台,在这里,海量影视资料应有尽有,热点影视讯息一网打尽,更有秒级实时票房,热门榜单,极致地满足您独特的观影口味', '京ICP备09072691号-2', '京公网安备11010502022270', '北京海蓝天空文化传播有限公司', 'admin@admin.com', null, null);
