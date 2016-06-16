/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50135
Source Host           : localhost:3306
Source Database       : kw

Target Server Type    : MYSQL
Target Server Version : 50135
File Encoding         : 65001

Date: 2012-06-05 15:06:03
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `keke_witkey_ad`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_ad`;
CREATE TABLE `keke_witkey_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `target_id` int(11) DEFAULT NULL,
  `ad_type` char(20) DEFAULT NULL,
  `ad_position` char(20) DEFAULT NULL,
  `ad_name` varchar(300) DEFAULT NULL,
  `ad_file` varchar(300) DEFAULT NULL,
  `ad_content` text,
  `ad_url` varchar(100) DEFAULT NULL,
  `start_time` int(11) DEFAULT '0',
  `end_time` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `width` varchar(15) DEFAULT NULL,
  `height` varchar(15) DEFAULT NULL,
  `tpl_type` char(20) DEFAULT NULL,
  `is_allow` tinyint(1) DEFAULT NULL,
  `on_time` int(10) DEFAULT '0',
  PRIMARY KEY (`ad_id`),
  KEY `index_1` (`ad_id`),
  KEY `ad_name` (`ad_name`)
) ENGINE=MyISAM AUTO_INCREMENT=265 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_ad
-- ----------------------------
INSERT INTO keke_witkey_ad VALUES ('262', '12', 'image', 'global', '��������_���²����', 'data/uploads/sys/ad/95164f3dc640dfd7b.jpg', null, null, '0', '0', null, null, '0', '308', '90', null, '1', '1332574349');
INSERT INTO keke_witkey_ad VALUES ('236', '13', 'image', 'global', '��ҳ_�����õ�Ƭ', 'data/uploads/sys/ad/49494f3b632e6da18.jpg', null, null, '0', '0', null, null, '4', '525', '270', 'default', '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('264', '5', 'image', 'right', '��ҳ_�в��������3', 'data/uploads/sys/ad/258904eeaa57b124ce.jpg', null, null, '0', '0', null, null, '0', '310', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('188', '5', 'image', 'left', '��ҳ_�в��������1', 'data/uploads/sys/ad/163894f70041c54abf.jpg', 'ad', 'http://www.baidu.com', '0', '0', null, null, '0', '310', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('241', '4', 'image', 'global', 'kppw���ϲ���ҳ���', 'data/uploads/sys/ad/308644f3cd6a47d8ba.jpg', null, 'http://www.phpclub.cn/kppw20', '0', '0', null, null, '0', '950', '90', 'default', '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('195', '4', 'image', 'global', '��ҳ_���ϲ�ͨ�����', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '/* 150&#42;151 */', 'http://www.baidu.com', '0', '0', null, null, null, '950', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('196', '6', 'image', 'left', '��ҳ_���²��������1', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', 'google_ad_width = 180;', 'http://www.baidu.com', '0', '0', null, null, null, '470', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('197', '6', 'image', 'right', '��ҳ_���²��������2', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', 'google_ad_height = 150;', 'http://www.baidu.com', '0', '0', null, null, null, '470', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('198', '7', 'image', 'left', '�����б�_ͷ���������1', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '//-->', 'http://www.baidu.com', '0', '0', null, null, null, '310', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('199', '7', 'image', 'right', '�����б�_ͷ���������2', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '</script>', 'http://www.baidu.com', '0', '0', null, null, null, '630', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('200', '9', 'image', 'global', '�����б�_�ײ�ͨ�����', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', '<script type=\"text/javascript\"', 'http://www.baidu.com', '0', '0', null, null, null, '950', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('201', '10', 'image', 'global', '��Ѷ_����ͨ�����', 'data/uploads/2011/12/16/258904eeaa57b124cf.jpg', 'src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\">', 'http://www.baidu.com', '0', '0', null, null, '0', '950', '90', null, '0', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('255', '6', 'image', 'right', '��ҳ_���²��������', 'data/uploads/sys/ad/47604f3cd3f7ec9b7.jpg', null, null, '0', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('254', '6', 'image', 'left', '��ҳ_���²��������', 'data/uploads/sys/ad/111124f3cd3e0326f4.jpg', null, null, '0', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('234', '13', 'image', 'global', '��ҳ_�����õ�Ƭ', 'data/uploads/sys/ad/68614f3b632041212.jpg', null, null, '0', '0', null, null, '1', '525', '270', 'default', '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('240', '13', 'image', 'global', '��ҳ_�����õ�Ƭ', 'data/uploads/sys/ad/294054f3b6311c7e19.jpg', null, 'http://www.kppw.cn', '0', '0', null, null, '5', '525', '270', null, '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('216', '48', 'image', 'global', '��������_���²����', 'data/uploads/2011/12/30/61594efd64ca66d35.jpg', null, null, '0', '0', null, null, null, '308', '90', 'default', '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('253', '10', 'image', 'global', '��Ѷ_����ͨ�����', 'data/uploads/sys/ad/133364f3cd2be7f2b5.jpg', null, null, '0', '0', null, null, '0', '950', '90', null, '1', '1332574125');
INSERT INTO keke_witkey_ad VALUES ('251', '11', 'image', 'left', '��ҳ_�ײ��������', 'data/uploads/sys/ad/118894f3cd3a07ff52.jpg', null, null, '1329321600', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('252', '11', 'image', 'right', '��ҳ_�ײ��������', 'data/uploads/sys/ad/264514f3cd36006759.jpg', null, null, '0', '0', null, null, '0', '470', '90', null, '1', '1338880530');
INSERT INTO keke_witkey_ad VALUES ('256', '7', 'image', 'left', '�����б�_ͷ���������', 'data/uploads/sys/ad/256864f3cd45b425e4.jpg', null, null, '0', '0', null, null, '0', '310', '90', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('257', '7', 'image', 'right', '�����б�_ͷ�����������', 'data/uploads/sys/ad/73834f3cd4b95f6b8.jpg', null, null, '0', '0', null, null, '0', '630', '90', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('258', '8', 'image', 'top', '�����б�_�Ҳ����¹��-��', 'data/uploads/sys/ad/297344f3cd5705cb7c.jpg', null, null, '0', '0', null, null, '0', '145', '250', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('259', '8', 'image', 'bottom', '�����б�_�Ҳ����¹�� ��', 'data/uploads/sys/ad/181384f3cd5a7cb20d.jpg', null, null, '0', '0', null, null, '0', '145', '250', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('260', '9', 'image', 'global', '�����б�_�ײ�ͨ�����', 'data/uploads/sys/ad/273774f3cd61fd0035.jpg', null, null, '0', '0', null, null, '0', '950', '90', null, '1', '1332571819');
INSERT INTO keke_witkey_ad VALUES ('261', '13', 'image', 'global', '��ҳ_�����õ�Ƭ', 'data/uploads/sys/ad/10574f3dae0c4bc6b.jpg', null, null, '0', '0', null, null, '2', '525', '270', null, '1', '1332398875');
INSERT INTO keke_witkey_ad VALUES ('263', '5', 'image', 'center', '��ҳ_�в��������2', 'data/uploads/sys/ad/258904eeaa57b124cf.jpg', null, null, '0', '0', null, null, '0', '310', '90', null, '1', '1338880530');

-- ----------------------------
-- Table structure for `keke_witkey_ad_target`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_ad_target`;
CREATE TABLE `keke_witkey_ad_target` (
  `target_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `code` char(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `targets` varchar(255) DEFAULT '',
  `position` varchar(150) DEFAULT NULL,
  `ad_size` varchar(255) DEFAULT NULL,
  `ad_num` int(11) DEFAULT NULL,
  `sample_pic` varchar(100) DEFAULT NULL,
  `is_allow` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`target_id`),
  KEY `target_id` (`target_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_ad_target
-- ----------------------------
INSERT INTO keke_witkey_ad_target VALUES ('1', 'ȫ��_ҳ��ͨ�����', 'GLOBAL_TOP_BANNER', 'ȫ��_ҳ��ͨ�����', 'index,task_list,shop,article,case', 'a:1:{s:6:\"global\";s:6:\"950*90\";}', '', '1', 'data/adpic/global_top_banner.jpg', '0');
INSERT INTO keke_witkey_ad_target VALUES ('4', '��ҳ_���ϲ�ͨ�����', 'HOME_UPPER_BANNER', '��ҳ_���ϲ�ͨ�����', 'index', 'a:1:{s:6:\"global\";s:6:\"950*90\";} ', '', '1', 'data/adpic/home_upper_banner.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('5', '��ҳ_�в��������', 'HOME_CENTAL_THREE', '��ҳ_�в��������', 'index', 'a:3:{s:4:\"left\";s:6:\"310*90\";s:6:\"center\";s:6:\"310*90\";s:5:\"right\";s:6:\"310*90\";} ', '', '3', 'data/adpic/home_central_three.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('6', '��ҳ_���²��������', 'HOME_LOWER_SECOND', '��ҳ_���²��������', 'index', 'a:2:{s:4:\"left\";s:6:\"470*90\";s:5:\"right\";s:6:\"470*90\";} ', '', '2', 'data/adpic/home_lower_second.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('7', '�����б�_ͷ���������', 'LIST_HEAD_TWO', '�����б�_ͷ���������', 'task_list,shop_list', 'a:2:{s:4:\"left\";s:6:\"310*90\";s:5:\"right\";s:6:\"630*90\";} ', '', '2', 'data/adpic/list_head_two.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('8', '�����б�_�Ҳ����¹��', 'LIST_SIDE_RIGHT', '�����б�_�Ҳ����¹��', 'task_list,shop_list', 'a:2:{s:3:\"top\";s:7:\"145*250\";s:6:\"bottom\";s:7:\"145*250\";} ', '', '2', 'data/adpic/list_side_right.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('9', '�����б�_�ײ�ͨ�����', 'LIST_BOTTOM_BANNER', '�����б�_�ײ�ͨ�����', 'task_list,shop_list', 'a:1:{s:6:\"global\";s:6:\"950*90\";} ', '', '1', 'data/adpic/list_bottom_banner.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('10', '��Ѷ_����ͨ�����', 'INFO_TOP_BANNER', '��Ѷ_����ͨ�����', 'article', 'a:1:{s:6:\"global\";s:6:\"950*90\";} ', '', '1', 'data/adpic/info_top_banner.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('11', '��ҳ_�ײ��������', 'HOME_BOTTOM_SECOND', '��ҳ_�ײ��������', 'index', 'a:2:{s:4:\"left\";s:6:\"310*90\";s:5:\"right\";s:6:\"630*90\";} ', '', '2', 'data/adpic/home_bottom_second.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('12', '��������_���²����', 'TASK_SIDE_RIGHT', '��������_���²����', 'task', 'a:1:{s:6:\"global\";s:6:\"308*90\";}', '', '1', 'data/adpic/task_side_right.jpg', '1');
INSERT INTO keke_witkey_ad_target VALUES ('13', '��ҳ_�����õ�Ƭ', 'HOME_TOP_SLIDE', '��ҳ_�����õ�Ƭ', 'index', 'a:1:{s:6:\"global\";s:7:\"525*270\";}', '', '5', 'data/adpic/home_top_slide.jpg', '1');

-- ----------------------------
-- Table structure for `keke_witkey_agreement`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_agreement`;
CREATE TABLE `keke_witkey_agreement` (
  `agree_id` int(11) NOT NULL AUTO_INCREMENT,
  `agree_status` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `buyer_uid` int(11) DEFAULT NULL,
  `buyer_status` int(11) DEFAULT NULL,
  `buyer_accepttime` int(11) DEFAULT NULL,
  `buyer_confirmtime` int(11) DEFAULT NULL,
  `seller_uid` int(11) DEFAULT NULL,
  `seller_status` int(11) DEFAULT NULL,
  `seller_accepttime` int(11) DEFAULT NULL,
  `seller_confirmtime` int(11) DEFAULT NULL,
  `agree_title` varchar(100) DEFAULT NULL,
  `file_ids` varchar(50) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`agree_id`),
  KEY `agree_id` (`agree_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_agreement
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_article`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_article`;
CREATE TABLE `keke_witkey_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_cat_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `art_title` varchar(200) DEFAULT NULL,
  `art_source` varchar(200) DEFAULT NULL,
  `art_pic` varchar(100) DEFAULT NULL,
  `content` longtext,
  `is_recommend` int(11) DEFAULT '0',
  `seo_title` varchar(500) DEFAULT NULL,
  `seo_keyword` varchar(500) DEFAULT NULL,
  `seo_desc` varchar(500) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '1',
  `is_delineas` int(11) DEFAULT '0',
  `pub_time` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`art_id`),
  KEY `index_2` (`art_cat_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_article
-- ----------------------------
INSERT INTO keke_witkey_article VALUES ('13', '217', '0', 'admin', '���λ����', 'yertyetry', 'data/uploads/2011/09/13/89244e6f0512d32b3.gif', '���λ����', '0', '���λ����', '���λ����', '���λ����', '0', '1', '0', '1200758400', '102');
INSERT INTO keke_witkey_article VALUES ('14', '367', '0', 'ert112121', 'ע��Э��', 'yertyetry', 'data/uploads/2012/01/14/276764f10f578bada0.png', 'ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��', '0', '���Ӱ���wss', '���Ӱ���wss', '����˵��������ˮ������������Ҳ����˵��������ƣ�Խ��Խ����������˵��������磬��ȥ����...��˵��������һ˫���ӡ�������һ�����ӣ�Ů����һ�����ӣ�����������Ե����һ�𣬳�Ϊһ˫���ӣ��Ǿ��ǰ��顣  һ˫���ӣ�����һ���룬����һ��ʹ�����ܰ����õ����Ӽ��������ͽ����ǵĿ��С����˺�Ů�ˣ�������һ�������У�һ', '1', '1', '0', '1326511480', '136');
INSERT INTO keke_witkey_article VALUES ('246', '5', '0', '����', '����Ӫ���ĳɹ�֮·��Ǳ��Σ������', '', '', '&lt;p&gt;����������Ҳ���ǱȽϻ��һ����׬ƽ̨��ֻҪ�����һ�����س����ܹ��ҵ����ʵļ�ְ����������ֻ���ˮ�����������������ܹ��ҵ���������񣬶����ⷽ��������ǱȽ϶�ģ����������������Ҫô�۸�����ľ��ˣ�Ҫô�Ǽ۸�ܾ����ջ��������ڼ۸�͵ģ��������Ϊ�����г���������ף���Ϊ�������彵����ҵ�ļ�ֵ���ƣ����緢���ӣ������е��˾ͳ�һëǮ��һ�����ӣ�ʵ���ǻ��ƣ�����ë��ʤ���ˣ�������Щ�۸�ǳ����˵ģ�������������һ�����б꣬ʵ���е���թ֮�ӣ���Ȼ��Щ�������������Ĺ���ʵ���Ǻܶ��˵�������Ϊ!&lt;/p&gt;&lt;p&gt;��������Խ��Խ����˲��뵽���͵��У��������ķ�չҲӭ���ļ���Ļ�������ô������������ν���Ӫ����?����֪����˽�������Ӫ���ķǳ��ɹ�����&lt;a href=\"http://www.0202010.com/\"&gt;�����ƹ�&lt;/a&gt;����������Ҳ������������ЩӪ��Ҳ���ǿ��ƾ��䣬Ѹ�ٵ�����˽��֪���ȴ����˺ܶ�!�������͵��г�Ҳ��ʮ�־޴�ģ����ڻ������˿�Ҳ�ﵽ�������ˣ���Щ����ʵ���ܹ���Ϊ���ͣ�ֻҪ����֪ʶ���о��飬���ܹ�ͨ�����͵�ƽ̨ת��Ϊʵ�����棬��ô�������ĳɹ�֮·��ȻҪ�ӷ�չ���Ϳ�ʼ!&lt;/p&gt;&lt;p&gt;������һ����Ȼ�ǰ��˱�����ͣ����Ⱦ������������ܹ�׬Ǯ��ЧӦ���ܹ������ڼ��������Ͱ�Ǯ���������Ĺ��ʿ϶��Ƿǳ������˵ģ���ע���Ϊһ��������Ȼ�Ƿǳ��򵥵Ĺ��̣�ͬʱ�������������Ը����ṩ�ƹ�Ļ��ᣬ�ƹ�һ���˲μ����;��ܹ�������֣���ɣ�������������Ҳ�������ɣ��ɹ��������Ҳ�ܹ�������ɣ���Щ���ܹ���Ч��ת��Ϊ���棬��Ȼ���ܹ��Ѻܶ��˸ı��Ϊ����!&lt;/p&gt;&lt;p&gt;�����ڶ����Ǿ�������ҵҲ��Ϊ���ͣ����ںܶ����������Ϸ�������Ĵ��������������ҵ���Ͼ���ҵ���ǲƴ�������������Ŀ�����ܹ��Ƴ����������ڸ�����˵�Ƴ������񳬹���ǧԪ���Ǿ��Ǵ��ֱ��ˣ��󲿷ֻ���ͣ����һ������һԪ�Ľ׶Σ���󽵵��˷����ĳɱ���ȴ���˺ܶ෢���֣�׬��ǮԽ��Խ�٣����������϶�������͵ķ�չ��������������Ӫ��Ҫ��취�ı�������棬��ô��õķ�����Ȼ���Ǵ���ҵ���ȱ�ڣ��Ӷ���ô�����������Դ�����������ż�!�Ӷ����������ߵ���ȷ�Ĺ������!&lt;/p&gt;&lt;p&gt;������ʵ����Ӫ��Ҳ��һ��˫�н�������Ҳ����Լ���ɻ���Ĵ�������������Ӫ�����ɹ�����ô���͵�׬ǮЧӦ�ͻ��󽵵ͣ����������⵽&lt;a href=\"http://www.36job.com/\"&gt;��ҵ&lt;/a&gt;�ĵ��ƣ��Ͼ�&lt;a href=\"http://www.nfrencai.com/trade.shtml\"&gt;��ҵ&lt;/a&gt;��ֵ�ᱻĳЩ���˵ĵͼ۶��ٵ��ˣ�����������Ҳ�����ž޴�ľ��������������ļ��ϵͳ��һ������㵽�������־��׵�ʱ�򣬻�����ƭ��ʱ���������ܻ��Ϊ����˼��ϵĵ�һ���ܺ��ߣ������������ĵ���֮���ʹ���һ��˫�н����ģ�ֻ������������Ӫ�����������ܹ�����ȡ�óɹ�!&lt;/p&gt;', '0', '����Ӫ���ĳɹ�֮·��Ǳ��Σ������', '����Ӫ���ĳɹ�֮·��Ǳ��Σ������', '����Ӫ���ĳɹ�֮·��Ǳ��Σ������', '0', '1', '0', '1329461419', '2');
INSERT INTO keke_witkey_article VALUES ('244', '17', '0', '', 'ʲô�����ͣ�', '', '', ' ������Ӣ��Witkey��wit�ǻۡ�keyԿ�ף������롣������ָ������ʱ��ƾ���Լ����������ǻۺʹ��⣩���ڻ������ϳ����Լ��ĸ�ԣ����ʱ����Ͷ��ɹ�����ñ�����ˡ�ͨ�׵ؽ������;���������ƽ̨�ϳ����Լ������ʲ��ɹ���ֵ�Ĺ�����Ⱥ�塣&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;���¾��ã���ҵ�������������͵��ˣ������ʽ���������˸�����ҵ����������֮�⣬���������ո��ഴ�����ۣ����ú͹������ˡ�����Щ���ո��ഴ�����ۣ����ú͹��������У��о������͡��������ͺ��������͵ȸ�����������͡��������Կ��ŵ�˵���ڻ�����������ƽ̨�ϣ�û����ν�ľ���ѧ�ҡ�����ѧ�ҵȸ�ʽ������ר��ѧ�ߣ�ֻ�����͡�����������վ�ĳ��֣�Ϊ��֪ʶ�����ӹ������ĸ��˴�����һ������֪ʶ��Ʒ����ҵƽ̨�ͻ��ᡣ&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;�ܶ���֮������ģʽ�ĳ��֣�Ϊ���˵�֪ʶ����Դ�����������̻�����������ʱ�������٣�ÿһ�����Ͷ����Խ��Լ���֪ʶ�������ѧ���о��ɹ���Ϊһ�����εġ�֪ʶ��Ʒ���ͷ����������������ۡ�����ͨ��������վ���ƽ̨������֪ʶ��Ʒ�������Լ���֪ʶ�������ѧ���о��ɹ���ת���ɸ��˲Ƹ���������ģʽ�£����˵�֪ʶ����Դ���������������������Ǹ��˵ĲƸ�������֪ʶ��ԴӦ�ÿ������¾��ã���ҵ��ʱ���������Ǹ��˻���֯ӵ��֪ʶ��ӵ�вƸ���&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461289', '2');
INSERT INTO keke_witkey_article VALUES ('38', '100', '0', 'ert', '������д����������', 'yertyetry', '0', '<h6>������һ�������˲ſ⣬���Ǿ���Ϊ���ṩ׿Խ�Ĵ������<br />���Ǹ����ύ�Լ��ķ���������ѡ���������еķ�������õ����ṩ�ı��ꡣ </h6><br />ʱ��Ƹ������������������������и�ҵ��ְͬҵ�����רҵ�˲���ʮ���ˣ�ÿ�춼����ǧ�˵�������<br />���ǿ�Ϊ���ṩ����ƽ����ơ���վ���衢������������������������������ý������������߻������ִ��������İ���������˼����׫���롢���������������ƹ㡢�����������г����顢��ı���ߵȷ���Ϊ���ṩ�ʱ����ȫ��Ľ���취��<br />������д���������ֻ�跢��������Ŀ�����ٽ����ͳ���йܵ�ʱ��Ƹ�����������ͽ�������ʱ��Ƹ��������ģ���Щ������صĴ����˲žͿ�ʼΪ���ṩ��������ˣ�<br />�����������Ǹ��Ի���Լ��Ĵ��ⷽ���ύ��������Ŀ�£�������ѡ��<br /><p>ֻ��������ѡ����˭�ķ����������õ������ͽ�</p><p>Ŀǰ���н������ҵ�͸��˷�����Ŀ�����ͽ���������ٵĴ������⡣<br />������д�����������ֻ��ǰ��<a title=\"�����гɰ���ǧ����Ŀ��\" href=\"http://www.vikecn.com/Task/List/\"></a>��Ѱ���Լ�����Ȥ����Ŀ������Ŀ�ڽ���ǰ�ݽ��Լ��ķ������Ϳ����ˡ�<br />�����������ķ����������Ŀ������ѡ�У�������˶���ø���Ŀ���ͽ�<br />������һ����ƽ������������������Ҫ������ѧ����ְҵ������������Ҫ����˾����ɫ��û�а칫�����εķ��ţ�һ��ƾ��Ʒ˵����<br />һЩ���ύ���ⷽ������ȫΪ���б꣬�����ھ�������ѧϰ���ɳ���<br />ʱ��Ƹ����ṩ��ȫ��λ������չʾϵͳ���������������ͽ����ҵ��׼ȷ�������ҵ�����1<br /></p><br />', '0', '������д����������', '������д����������', '������һ�������˲ſ⣬���Ǿ���Ϊ���ṩ׿Խ�Ĵ���������Ǹ����ύ�Լ��ķ���������ѡ���������еķ�������õ����ṩ�ı��ꡣ ʱ��Ƹ������������������������и�ҵ��ְͬҵ�����רҵ�˲���ʮ���ˣ�ÿ�춼����ǧ�˵����������ǿ�Ϊ���ṩ����ƽ����ơ���վ���衢������������������������������ý�������������', '0', '1', '0', '1325903242', '2');
INSERT INTO keke_witkey_article VALUES ('66', '100', '0', '', 'ΪʲôҪ�н���Э��?', '', null, 'Э���ܹ��Է����ߺ��б���˫���ṩ��ƽ���������ݣ����������κΰ�Ȩ��������˫���з��磬���ļ�����Ϊ�������ݡ����ļ����С��л����񹲺͹��Ͷ������ķ���Ч�档һ��ǩ��������Ч��<br />', '0', 'ΪʲôҪ�н���Э��?', 'ΪʲôҪ�н���Э��?', 'Э���ܹ��Է����ߺ��б���˫���ṩ��ƽ���������ݣ����������κΰ�Ȩ��������˫���з��磬���ļ�����Ϊ�������ݡ����ļ����С��л����񹲺͹��Ͷ������ķ���Ч�档һ��ǩ��������Ч��', '0', '1', '0', '1326184206', '6');
INSERT INTO keke_witkey_article VALUES ('67', '100', '0', '', '��Э�������������', '', null, '��Э��������������ҵ�淶��ͨ���ԱȽ�ǿ�������и�����������������ϵ<!--{eval echo $_K[\'phone\']}-->����Э�鲻�����κθ��Ļ��޸ģ����Ӹ���Э�齫����ϵͳ��Ϣ����ʽ��֪˫�����������ݽ�������˫�������֪�����˸���Э��ֻ���ڷ��������б�������֮�䣬�뱾ƽ̨�޹�<br />', '0', '', '', '', '0', '1', '0', '1326185007', '5');
INSERT INTO keke_witkey_article VALUES ('228', '17', '0', '', '2012�ƹ�������룡', '', '', '&lt;span style=\"font-family:Verdana;font-size:16px;\"&gt;��2011�꣬�������ǲ��ϵ�Ŭ�����Ż�������ƽ̨���Գ��š���ƽ��������������ԭ�򣬵õ��ܶ���������ֵ��Ͽɡ����ǵķ�����ּ�ǣ���ÿһ������������ƹ�Ч������ÿһ�����ֶ���׬��Ǯ��Ȼ�����ڹ�ȥ��һ������Ƕ�����ٻ�����һ���ź���������Щ����ʵ�ֵ����룬�ڼ���������2012�꣬��Ϊ���ƹ�������룬�������Ϊ��ʵ��������һ����������ʵ�ְɣ�&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;����1������Ҫ�ƹ�&lt;span style=\"color:#ff0000;\"&gt;��ҵ��Ʒ&lt;/span&gt;��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;����2������Ҫ�ƹ�&lt;span style=\"color:#ff0000;\"&gt;����Ʒ&lt;/span&gt;��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;����3������Ҫ�ƹ�&lt;span style=\"color:#ff0000;\"&gt;��˾����&lt;/span&gt;��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;����4������Ҫ�ƹ�&lt;span style=\"color:#ff0000;\"&gt;���̼�����Ŀ&lt;/span&gt;��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;����5������Ҫ�ƹ�&lt;span style=\"color:#ff0000;\"&gt;ƽ̨��վ&lt;/span&gt;��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;����6������Ҫ�ƹ�����&lt;span style=\"color:#ff0000;\"&gt;�Ա���&lt;/span&gt;��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;font-size:16px;color:#0033ff;\"&gt;&lt;span style=\"font-family:Verdana;font-size:16px;\"&gt;�����㻹�������ǣ���Ҳ����ֱ����ϵ���ǵĿͷ������ǻ�Ϊ������רҵ�������ƹ�ָ����&lt;/span&gt;&lt;br /&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459458', '5');
INSERT INTO keke_witkey_article VALUES ('224', '100', '0', '�Ϳ�С��', '��֤����', '�Ϳ���', '', '&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;�װ����û������ǣ�&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����û��ԿͿ�ʵ����֤����˹����˽⣬�����������֤��˲���ͨ����������ֽ���֤��˹����֪�û���ϣ���ܸ���ҵ���֤�������������&lt;br /&gt;�������£�&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:14pt;\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;ʵ����֤��&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;���ϴ���ͼƬ���������֤����ЧͼƬ&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;���ϴ���ͼƬΪ���֤�޹ص�ͼƬ��������ͨ����֤������������Ч�������Ӱ�������û�����֤�ٶȣ����Ի����Ƹ��û�һ�����ڲ����������ύ��֤��Ϣ��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;��ͼƬ����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;ͼƬģ�����壬�޷�����֤����Ϣ�ģ����޷�ͨ����֤������ʹ�����������֤ԭ����ɨ������ɫ�����գ���ӡ������Ƭ��Ч��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;�����֤��Ϣ����ע����Ϣ���&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;�����֤�ϵ���Ϣ���û��ύ����Ϣ���������޷�ͨ����֤��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;������ύ��֤���ǻ��գ������鿴֤�����Ƿ���֤�����룬���û�����޷���ʵ������ݣ�������ͨ����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4�����֤��Ч�ڴ���90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;֤����Ч��С��&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;�졢��ʱ���֤����Ч��֤�����ǲ���������֤�ġ�&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5��������&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;18&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;δ��&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;18�������޷�ͨ�������֤�ġ�&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6���ϴ���֤��ͼƬ��ʾ����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;ʹ�����������֤��ʱ��Ҫ������֤�������������ϴ�������ϴ���֤��ͼƬ��ʾ������������ͨ����&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;���ڶ������֤��Ҫ�ṩ˫���ͼƬ����һ�����֤��Ҫ�ṩ���и�����Ϣ��һ���ͼƬ��&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;��һ�����ֻ֤��Ҫ�ṩ���֤�����ͼƬ�������и�����Ϣ��һ�档���ڶ������֤��Ҫ�ṩ˫���ͼƬ�����򣬽�����ͨ����֤��ˡ�&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8���빫�����ص���֤һ��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;���֤��Ϣ�빫��ϵͳ��֤��һ�µģ�������ͨ����˽�����֤��ˡ�&lt;br /&gt;&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:14pt;\"&gt;&lt;strong&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;��ҵ��֤��&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;���ϴ���ͼƬ������Ӫҵִ�յ���ЧͼƬ&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;���ϴ���ͼƬΪӪҵִ���޹ص�ͼƬ��������ͨ����֤������������Ч�������Ӱ�������û�����֤�ٶȣ����Ի����Ƹ��û�һ�����ڲ����������ύ��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;��ͼƬ����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;ͼƬģ�����壬�޷�����֤����Ϣ�ģ����޷�ͨ����֤������ʹ��������Ӫҵִ��ԭ����ɨ������ɫ�����գ���ӡ������Ƭ��Ч��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;��Ӫҵִ����Ϣ����ע����Ϣ���&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ӫҵִ���ϵ���Ϣ���û��ύ����Ϣ���������޷�ͨ����֤��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4��֤����Ч�ڴ���90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;֤����Ч��С��&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;90&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-size:12pt;\"&gt;&lt;span style=\"font-family:Microsoft YaHei;\"&gt;�����Ч��֤�����ǲ���������֤�ġ�&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5���ϴ���֤��ͼƬ��ʾ����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ʹ�����������֤��ʱ��Ҫ������֤�������������ϴ�������ϴ���֤��ͼƬ��ʾ������������ͨ����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6���빤�̻��ص���֤һ��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;Ӫҵִ����Ϣ�빤��ϵͳ��֤��һ�µģ�������ͨ���Ϳ���֤��ˡ�&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;', '1', '��֤����', '��֤����', '', '0', '1', '0', '1329458015', '0');
INSERT INTO keke_witkey_article VALUES ('229', '17', '0', '', '�����һ����������', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt; һ������Ҫ��߱�ÿ�쳤ʱ�����ߵ�����,ӵ�и��˵��Ի��ڵ�λ�߱���˽�������,�����ɵľ�&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;���Ƽ���,�Ͼ�����������������.��ξ��������ѡ��,����ǿ��,���Բ��ŵ�����,�����ǵ���&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;��ͨ������ͨ,���˽Ͽ������,����Ч�ʲŻ��,��Ȼ��,��������Ҳ����,�����ٶȲ���,���о�&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;���е�ʱ����Ҫ��IP�Ļ��Ͳ�������.����������3G�����Ļ��Ǳ�����,�����������������޿���,&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;����Ҫ��,3G�������ٶȻ�����,���Ƿ��þ��е����,�����ʵ�.&lt;/span&gt;&lt;/span&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;/span&gt;&lt;p&gt;&nbsp;&lt;/p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;�������ߣ��������������ֵıر����͸�����һ����û��ǹ�Ͳ�����ս������Ҫ��Ǯ�����ù�����ȫ�����ֵĹ��߼�˵����ID��������̳ID������IDע��ʱ�価���磬��ͷ��IDע��ʱ�������������ƣ�������2~3������֮����ã���������������&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;����ִ�У����ƹ�����У�ִ������Ҫ��Ҫ�ѹأ����÷�����������˵�������õ���֤���ܶ��ƹ�����Ч�������������ǰ���Ϣ�������ظ�������£���������Ҫ����ȷ��̳����飬�����ڲ��������У���Ҫ���ݹ����ṩʵ��Ҫ���������������������ͨ������������������һζ���������ظ���Ϣ����Ҫ�������������ڻظ���������Ҫ���ݸ��ֽ�ɫ�����Ҳ�Ҫһ�浹��ͬһ��������������ȡһЩ������Ϣ����Ӧ��ͬʱ�����������ʱ��ظ�������Ҫһ�����ظ��꣬�������׵������ӱ��������⡢��ɾ��ͬʱ����������Ҳû�еõ����ӣ�ʵ�����ǣ���ʵ����õ����£��Լ��ظ��������Ӿ��Ƕ�����������Ҫ������ظ��Ķ������Լ�ͷ�ϣ���������Ǻܶ����ֶ��ǲ����⣬��ʵֻҪ�о����������ϸ�۲���ܷ�����Щ�����ֻص���Щ������صģ�&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;�ġ���Դ�������ֽ�����ID�ǲ����ģ����÷�չ������Դ���粻������̳ID������һЩ�����Ϣ��վID��ͬʱ�������ID����չID���ѡ��ռ���ѡ����ͺ����������ѡ����͡�SNS�����ȵȣ�������Щ��Դ���ܱ�֤���ֵĻ���ԴԴ���ϡ�&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;�塢ѧϰ�����������ڴ���ʲô��λ���������������ںδ���������������ʲô��������Ҫ���ϳɳ����벻����֪ʶ�ĳ�ʵ��ֻ�뵽��������Ǯ��ԶԶ�����ģ�����ʱ��Ҫѧϰ���˵��ƹ㷽ʽ�����˵��ƹ㼼�����Լ�һЩ�ƹ�����֪ʶ���ƹ㾭��ȵȡ��磺SEO�������ƹ㾭��ȡ�&lt;br /&gt;&nbsp;&lt;br /&gt;&lt;span style=\"font-family:Verdana;\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;/span&gt;����Ŀ�꣺��Ŀ�����ǰ���ķ��򣬰��Լ������鵱����ҵ�����������֣����Լ���һ��Ŀ�꣡������ÿ����������ǮΪĿ�꣡��Ҫ��Ϊ̸��Ǯ���Ե��ף��������뿪��Ǯ���ܻ���������ʵ�������벻����ֻ����ԣ�����Ŀ�������������з���ͬʱҲ���ܼ����Լ�&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459503', '1');
INSERT INTO keke_witkey_article VALUES ('69', '298', '0', '', '��ôע���Ϊ���ͻ�Ա��', '', null, '<p>1�������ҳ�����ע�ᰴť������ע��ҳ�档</p><p>2����Ҫ����д���ע����Ϣ�����磺�û��������䡢�����</p><p>3�������ע�ᡱ��ť�ύ����ʾע��ɹ���</p><br />', '0', '��ôע���Ϊ���ͻ�Ա��', '��ôע���Ϊ���ͻ�Ա��', '1�������ҳ�����ע�ᰴť������ע��ҳ�档2����Ҫ����д���ע����Ϣ�����磺�û��������䡢�����3�������ע�ᡱ��ť�ύ����ʾע��ɹ���', '0', '1', '0', '1325901897', '2');
INSERT INTO keke_witkey_article VALUES ('70', '298', '0', '', '�û�ע��ʱӦע����Щ���⣿', '', null, '1�����Ǻ��û�������Ϊע��󽫲��ɸ��ġ�<br />2����д��ʵ��Ϣ���Ա����Ա��ȷ���������б�֪ͨʱ��ϵ��<br />3���������á�Ϊ��֤�û�����ȫ��������һ�����ӵ����롣<br />4��ע��ʱ����ϸ�Ķ���ע���������ϸ�˽������й�����ع���ʹ����׼ȷ���˽�����ӵ�е�Ȩ����<br />', '0', '�û�ע��ʱӦע����Щ���⣿', '�û�ע��ʱӦע����Щ���⣿', '1�����Ǻ��û�������Ϊע��󽫲��ɸ��ġ�2����д��ʵ��Ϣ���Ա����Ա��ȷ���������б�֪ͨʱ��ϵ��3���������á�Ϊ��֤�û�����ȫ��������һ�����ӵ����롣4��ע��ʱ����ϸ�Ķ���ע���������ϸ�˽������й�����ع���ʹ����׼ȷ���˽�����ӵ�е�Ȩ����', '0', '1', '0', '1322120479', '2');
INSERT INTO keke_witkey_article VALUES ('71', '328', '0', '', 'ע��ʱ��Ҫע����Щ���⣿', '', null, '<p>1����Ա����5-15���ַ���Ӣ�ġ����֡��»��ߣ�ע��ɹ��������޸ġ�����ʹ�������û����� </p><p>2�����룺6-16λ��ɣ�����ʹ��Ӣ����ĸ�����ֻ���ŵ����������밲ȫ�ȡ������������ð�ȫ���롱�� </p><p>3�����䣺������֤�ǿ�������ȡ������ģ����ע�����������������֤�� </p><p>4����֤�룺������ұߵ���֤�룬�������������������У����ִ�Сд������д������������д��ȷ����˳��ע�ᡣ </p><br />', '0', 'ע��ʱ��Ҫע����Щ���⣿', 'ע��ʱ��Ҫע����Щ���⣿', '1����Ա����5-15���ַ���Ӣ�ġ����֡��»��ߣ�ע��ɹ��������޸ġ�����ʹ�������û����� 2�����룺6-16λ��ɣ�����ʹ��Ӣ����ĸ�����ֻ���ŵ����������밲ȫ�ȡ������������ð�ȫ���롱�� 3�����䣺������֤�ǿ�������ȡ������ģ����ע�����������������֤�� 4����֤�룺������ұߵ���֤�룬���������������', '0', '1', '0', '1322120640', '2');
INSERT INTO keke_witkey_article VALUES ('72', '298', '0', '', 'ʲô����֤�룿', '', null, '1��ע��ʱ��д����֤����ǰ��������֡� <br />2����������֤�룬�п���������IEû�����á���ű�������ȫ�������õĹ��ߡ� <br />���������´��� <br />��������ߡ�����Internetѡ�������ȫ������Ĭ�ϼ��𡱡���ȷ���� <br />ͬʱ������ɾ��һ���������ϵ���ʱ�ļ����������£� <br />IE6.0�汾�Ĵ������� <br />1�������������������ߡ��˵����򿪡�INTERNETѡ��ĶԻ��� ��<br />2����������桱ѡ���ѡ��ɾ��COOKIES�����ڵ����ĶԻ����ڰ�ȷ����Ȼ������ɾ���ļ�������ɾ�������ѻ�����ǰ���Ϲ����ٰ�ȷ���� <br />3���������ȫ��ѡ���������½ǵġ�Ĭ�ϼ��𡱣�����ǻ�ɫ�Ĳ��ɰ��İ�ť���������˲��輴�ɡ� <br />4���������˽��ѡ���ѡ�����½ǵġ�Ĭ�ϡ�������ǻ�ɫ�Ĳ��ɰ��İ�ť���������˲��輴�ɡ�������߼������ڵ�����ҳ���ϰѡ������Զ�cookie����ѡ�С�����ĵ�һ��cookie �͵�����cookieѡ�񡰽��ܡ����ٵ����ȷ������ <br />5��������߼���ѡ���Ȼ��ѡ�����½ǵġ���ԭĬ�����á���ť��Ȼ����������ġ�ȷ������ť ��<br />6���ر����е��������Ȼ��򿪣����½��뱾վ����һ�������Ƿ��Ѿ������                <br />', '0', 'ʲô����֤�룿', 'ʲô����֤�룿', '1��ע��ʱ��д����֤����ǰ��������֡� 2����������֤�룬�п���������IEû�����á���ű�������ȫ�������õĹ��ߡ� ���������´��� ��������ߡ�����Internetѡ�������ȫ������Ĭ�ϼ��𡱡���ȷ���� ͬʱ������ɾ��һ���������ϵ���ʱ�ļ����������£� IE6.0�汾�Ĵ������� 1�������������������ߡ��˵�����', '0', '1', '0', '1322120818', '3');
INSERT INTO keke_witkey_article VALUES ('73', '299', '0', '', '�����û�����ô�죿', '', null, '<span style=\"font-family:Times New Roman;font-size:13px;\">����ϵ�ͷ����������ܵ��ṩ����ʱע��ʱ���µ���Ϣ������ע�����䡢��ʵ���������֤�š����п��š������������Ϣ��ע���¼���ͷ�������һ��û�����</span><br />', '0', '�����û�����ô�죿', '�����û�����ô�죿', '����ϵ�ͷ����������ܵ��ṩ����ʱע��ʱ���µ���Ϣ������ע�����䡢��ʵ���������֤�š����п��š������������Ϣ��ע���¼���ͷ�������һ��û�����', '0', '1', '0', '1322121583', '1');
INSERT INTO keke_witkey_article VALUES ('74', '299', '0', '', '���ǵ�¼������ô�죿', '', null, '����������ڡ���¼��ҳ�棬��ͼ1��<p><br /></p><p>������������룿�� �����Կ������������û��������Ѿ��������ַ��Ȼ�������������������������ʼ�����ť��ϵͳ�ᷢһ�����������ʼ���������֤���䡣<br />&nbsp;�յ��ʼ�������������ʼ��ڵ�������ר��ҳ�沢�������������µ�¼���롣<br /></p>                        <br />', '0', '���ǵ�¼������ô�죿', '���ǵ�¼������ô�죿', '����������ڡ���¼��ҳ�棬��ͼ1��������������룿�� �����Կ������������û��������Ѿ��������ַ��Ȼ�������������������������ʼ�����ť��ϵͳ�ᷢһ�����������ʼ���������֤���䡣&nbsp;�յ��ʼ�������������ʼ��ڵ�������ר��ҳ�沢�������������µ�¼���롣', '0', '1', '0', '1322121745', '1');
INSERT INTO keke_witkey_article VALUES ('75', '329', '0', '', '�����µ�������ʲô�ô���', '', null, '<p>1��������������µ�����ѡ�������йܿ���ף�һ�����������ף������Է����˿����롣</p><p>2��������������µ���ѡ��ķ������ǳ��Ż�Ա���Ѽ��뽻�ױ��Ϸ���һ�����������ײ����������ʧ�����������������⸶��</p><p>3��������������µ����������ԶԷ������ṩ�ķ������ȫ�����ۣ����շ��������õ�����Ȩ����ʹ�������ṩ�������</p><br />', '0', '�����µ�������ʲô�ô���', '�����µ�������ʲô�ô���', '1��������������µ�����ѡ�������йܿ���ף�һ�����������ף������Է����˿����롣2��������������µ���ѡ��ķ������ǳ��Ż�Ա���Ѽ��뽻�ױ��Ϸ���һ�����������ײ����������ʧ�����������������⸶��3��������������µ����������ԶԷ������ṩ�ķ������ȫ�����ۣ����շ��������õ�����Ȩ����ʹ�������ṩ', '0', '1', '0', '1322122124', '1');
INSERT INTO keke_witkey_article VALUES ('76', '298', '0', '', 'ע������', '', null, '<p>1����¼XX�������ҳ�����Ϸ��ġ����ע�ᡱ�� </p><p>&nbsp;</p><p>2��������д���û����ϡ�ҳ�棬����ҳ����ʾ����д�����û����ϣ� <span class=\"Wbt547\"></span></p><p>&nbsp;&nbsp;&nbsp; </p><p>3����ȷ����Ϣ���󣬲��Ķ����û�ʹ������󣬵����ͬ������ʹ������ύע����Ϣ����ť�����ɳɹ�ע���ΪXX�û���</p>                        <br />', '0', 'ע������', 'ע������', '1����¼XX�������ҳ�����Ϸ��ġ����ע�ᡱ�� &#160;2��������д���û����ϡ�ҳ�棬����ҳ����ʾ����д�����û����ϣ� &#160;&#160;&#160; 3����ȷ����Ϣ���󣬲��Ķ����û�ʹ������󣬵����ͬ������ʹ������ύע����Ϣ����ť�����ɳɹ�ע���ΪXX�û���', '0', '1', '0', '1325902035', '3');
INSERT INTO keke_witkey_article VALUES ('77', '297', '0', '', '��������', '', null, '<p><span style=\"font-family:Arial;\">��¼XX���󣬽��롰�ҵ�XX����ҳ���ҳ������·����������ר��������������롱 </span></p><p>&nbsp;</p><p><span style=\"font-family:Arial;\">����ҳ�����Ϸ�����Ա���ġ����ڡ����������Ŀ�µġ��������롱�� </span></p><p>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ������Ҫ����һ�������˺ţ���֧�������ǲƸ�ͨ�ʺ�����������XXX���еĽ��ת����ָ�����ʻ��У��������ſ���ͨ��������ȡ���ֽ� </p><p>&nbsp;</p><p>&nbsp;�������ֽ��󣬵��������ֺ�XXX�����������Ա����1-2�����������ֵ���ָ�����ʺţ�<br />&nbsp;<br /></p>                        <br />', '0', '��������', '��������', '��¼XX���󣬽��롰�ҵ�XX����ҳ���ҳ������·����������ר��������������롱 &#160;����ҳ�����Ϸ�����Ա���ġ����ڡ����������Ŀ�µġ��������롱�� &#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160; ������Ҫ����һ�������˺ţ���֧�������ǲƸ�ͨ�ʺ�����������', '0', '1', '0', '1325901995', '2');
INSERT INTO keke_witkey_article VALUES ('78', '297', '0', '', '��ֵ����', '', null, '<p><span style=\"font-family:Arial;\">1����¼��XXX�������롰�ҵ�XXX����Ȼ�����ࡰ�������ҳ�棺��������߳�ֵ����ť��&nbsp;<br />&nbsp;&nbsp; </span></p><p>&nbsp;</p><p><span style=\"font-family:Arial;\">&nbsp;&nbsp;&nbsp;&nbsp; ���ߵ�¼�������������롰�ҵ�XXX����������м�ġ��ҵ��˻�������������ֵ�� �� </span></p><p><span style=\"font-family:Arial;\"><br />&nbsp; <br />&nbsp;<br />&nbsp; <br />2�����뵽��ֵҳ�� �����������������˻��Ľ���ѡ��֧����ʽ��Ȼ��㡰ȥ��ֵ��<br />�������һ������ť�� <br />&nbsp;<br />&nbsp;&nbsp; <br />3���Զ�Ϊ��ת�뵽��ѡ���֧����ʽҳ�����ת�˳�ֵ������</span></p>                        <br />', '0', '��ֵ����', '��ֵ����', '1����¼��XXX�������롰�ҵ�XXX����Ȼ�����ࡰ�������ҳ�棺��������߳�ֵ����ť��&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ���ߵ�¼�������������롰�ҵ�XXX����������м�ġ��ҵ��˻�������������ֵ�� �� &nbsp; &nbsp;&nbsp; 2�����뵽��ֵҳ�� ��������', '0', '1', '0', '1322122471', '4');
INSERT INTO keke_witkey_article VALUES ('79', '310', '0', '', '��֤����', '', null, '<p><span style=\"font-family:Arial;\">��¼��XX�������롰�ҵ���������Ȼ�����ࡰ��֤���ġ�ҳ�档</span></p><p><span style=\"font-family:Arial;\">�����������ṩ����֤�У�ʵ����֤��������֤����ҵ��֤��������֤��VIP��Ա��֤��</span></p><p><span style=\"font-family:Arial;\">�����Լ���ʵ�����Ҫ�����ĸ���֤��ֻҪ�㡰������֤������ʾ�������У�</span></p>                        <br />', '0', '��֤����', '��֤����', '��¼��XX�������롰�ҵ���������Ȼ�����ࡰ��֤���ġ�ҳ�档�����������ṩ����֤�У�ʵ����֤��������֤����ҵ��֤��������֤��VIP��Ա��֤�������Լ���ʵ�����Ҫ�����ĸ���֤��ֻҪ�㡰������֤������ʾ�������У�', '0', '1', '0', '1322122540', '2');
INSERT INTO keke_witkey_article VALUES ('80', '329', '0', '', '�б���������', '', null, '<span style=\"font-family:Arial;\">����ѡ�񷢲��б�����Ϊ�˶ž�����������Ϣ���б������������շ�10Ԫ���б����񷢲������ͽ���Ͷ�꣬��Э�̺󣬹���ѡ�����������ִ�������б������Զ���ת����ָ���нӡ�������С�</span><br />', '0', '�б���������', '�б���������', '����ѡ�񷢲��б�����Ϊ�˶ž�����������Ϣ���б������������շ�10Ԫ���б����񷢲������ͽ���Ͷ�꣬��Э�̺󣬹���ѡ�����������ִ�������б������Զ���ת����ָ���нӡ�������С�', '0', '1', '0', '1322122670', '1');
INSERT INTO keke_witkey_article VALUES ('81', '301', '0', '', 'ȫ��������������', '', null, '<span style=\"font-family:Arial;\">һ����������ȫ����������ԭ�������񣩺󣬵ȴ������������μӸ�ȫ����������<br />����XXX�����Ϳ���ͨ�������鿴����ȫ���������񣬲�������������������ύ��Ʒ��<br />���������鿴����������������Ʒ�󣬼��ɽ�����������Ϊ�б��ߣ���Ϊ�䷢�������ͽ��ȫ����������ɹ�������</span><br />', '0', 'ȫ��������������', 'ȫ��������������', 'һ����������ȫ����������ԭ�������񣩺󣬵ȴ������������μӸ�ȫ���������񡣶���XXX�����Ϳ���ͨ�������鿴����ȫ���������񣬲�������������������ύ��Ʒ�����������鿴����������������Ʒ�󣬼��ɽ�����������Ϊ�б��ߣ���Ϊ�䷢�������ͽ��ȫ����������ɹ�������', '0', '1', '0', '1322122739', '2');
INSERT INTO keke_witkey_article VALUES ('82', '312', '0', '', '���׬Ǯ��', '', null, '<span style=\"font-family:Arial;\">ĿǰXX����һ��������׬Ǯ;�����ڽ��������и����׬Ǯ�������ų�����<br />a) ��Ҫ;�������������ҵ�����������ͨ�������񡱵���ʽ�����ģ��������󣬱����ѡ��Ϊ�б�Ϳ��Ի�ñ��ꡣ���ھ�ȥ�������б���ѡ�����<br />b) ���۷���/��Ʒ������������ġ��˲��̡����۷������Ʒ����������ҹ������Ҳ��Щ���롣<br />c) �μ��ƹ�Ա���ˣ������ɡ������Խ���������ע�����ܡ������������񡱣�Ҳ���Խ������Ѽ���������������������˽⡾�ƹ�Ա��<br />d) ֱ�ӽ��ס���ֻ��Ҫ�����̸������ͼ�Ǯ���Ϳ��Ժ���������ֱ�ӽ��ף����������ݵĻ�ñ��ꡣ</span>                        <br />', '0', '���׬Ǯ��', '���׬Ǯ��', 'ĿǰXX����һ��������׬Ǯ;�����ڽ��������и����׬Ǯ�������ų�����a) ��Ҫ;�������������ҵ�����������ͨ�������񡱵���ʽ�����ģ��������󣬱����ѡ��Ϊ�б�Ϳ��Ի�ñ��ꡣ���ھ�ȥ�������б���ѡ�����b) ���۷���/��Ʒ������������ġ��˲��̡����۷������Ʒ����������ҹ������Ҳ��Щ���롣c) ��', '0', '1', '0', '1322122817', '1');
INSERT INTO keke_witkey_article VALUES ('83', '301', '0', '', '���֪���Լ��б��ˣ�', '', null, '<p><span style=\"font-family:Arial;\">a) ��¼XXX�������롰�ҵ�XXX������̨<br />b) ���롰�������͡������Ҳμӵ���������</span></p><p><span style=\"font-family:Arial;\">c) ������б����񡱱�ɲ鿴�Լ�����������Ƿ��б�</span></p><p>&nbsp;<span style=\"font-family:Arial;\">d) �����б�󣬱������һ�����������Ϸ������׶�������---�����յ��Ľ��ס��п��Բ鿴����</span></p>                        <br />', '0', '���֪���Լ��б��ˣ�', '���֪���Լ��б��ˣ�', 'a) ��¼XXX�������롰�ҵ�XXX������̨b) ���롰�������͡������Ҳμӵ���������c) ������б����񡱱�ɲ鿴�Լ�����������Ƿ��б�&nbsp;d) �����б�󣬱������һ�����������Ϸ������׶�������---�����յ��Ľ��ס��п��Բ鿴����', '0', '1', '0', '1322122861', '1');
INSERT INTO keke_witkey_article VALUES ('84', '301', '0', '', 'XX�������û�ȫ����������ʹ�ù���', '', null, '&nbsp; ���ű�������������Ȩ�����ּ�����Ź�������ƽ�������ͳ�ʵ���õ�ԭ�������ڴ����й����������Ŀ����ƽ̨��������ʹ��ǰ��ϸ�Ķ�����ȫ�����������������񣩹���<br />&nbsp;<br />һ��XXX������������������<br /><br />����1�����������ɶ��ۣ�����ȷ��ȫ�����������ʱ�䡢������������ϵ�绰����������ȷ���б깤���ߺ��б귽����<br />&nbsp;<br />����2��ȫ�����������100%�й������������������������Ǳ���ֳ��⡣�йܿ����ͨ�����������������ĸ����˻����������и������ת�ʡ�֧����ת�ʷ�ʽ֧��������80%�ָ��б����ͣ�20%��Ϊ��վ��Ӫ�������ѡ�<br /><br />����3��ÿ��ȫ����������������һ������/��Ʒ�б꣬���������˲μӻ���Ʒ��Ч������⣬һ�㲻�ó��������˿<br /><br />����4�������Լ�������֯�����������κ��˾��������κ���ʽ�μ��Լ�������������һ����ʵ����������������Ȩ���д���������������ͨ�����ɵȸ���;����ȷ������˫���ĺϷ�Ȩ�档<br /><br />����5��������������Ľ�����100Ԫʱ����������������Ϊ7�졣<br /><br />����6�������ύ���йܿ���������������ͷ�����30�����ڣ�����ʱ�䣩��˷�������վ�������ǹ���ʱ�佫˳�ӡ��Բ�������������󣬿�����˲��غ�������˻������ʻ���<br />&nbsp;<br />����7���������л��Ϊ����Ԥ���ѵ��û����ڻ��ɹ��������û������̨������������Ϊ�������������ߣ�����ʱ��ע��[������]�������Ϣ ������������������Ա����������߽��д�����ȷ������ʱ�����������ύ��������һ����δ�յ��йܵ�ƽ̨�����������ύ������Ϣ�����Զ�ɾ��������������<br /><br />����8�����������������⣬������ѡ��Ӽ��������񡣽����100Ԫ���ϣ���100Ԫ����������3�μӼ����ڻ��ᣬ��1�μӼ۲��õ����������10%����2�μӼ۲��õ��������ܽ���20%����3�β��õ��������ܽ���50%�������100Ԫ���µ���������Ӽ����ڣ������ټӼ�100Ԫ��ÿ�����ڲ��ܳ���10�죬������������ʵ��ӳ���<br /><br />����9�� ����������������ڼ�����ʱ��ѡ��������������ڹ�ʾ�ڽ�����3�����ѡ�꣬�����б��������Ʒ����һ��֪ʶ��Ȩ�������������ڰ�Ȩ������Ȩ������������С���������������3���ڵ绰֪ͨ2�κ��Բ�ѡ��򲻼Ӽۣ�����Ϊ����ί������������ѡ�塣<br /><br />����10������ѡ��48Сʱ�������������ͷ�������б���Ʒ����48Сʱ����������Ӧ���߲鿴�������Ƿ��г�Ϯ���׵������<br /><br />����11�������������б�󱻾ٱ���Ʒ���ӳ�Ϯ�����������ʵ����ȡ���б����б��ʸ�ͬʱ�����Ϊ����������1�Σ�������7�졣<br /><br />&nbsp;&nbsp;&nbsp; 12�������û��˻����ʽ�δ���������������˻�������100Ԫ�������²ſ����������֣�������С���Ϊ100Ԫ��������ʱ��ȫ��ѡ�<br /><br />&nbsp;<br /><br />������ȡ�ֽ�Ĺ���<br /><br />����1����ȡ�ֽ����С���Ϊ50Ԫ��<br /><br />����2��������ȡ�ֽ������ͨ���󣬼�����2-5�����������յ����Ŀǰ����ȡ�κ������ѡ�<br /><br />�����������Ĺ���<br />&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ���¼���������Գ��������˿<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1����������г����������ʺ�������������������Υ�������񷢲���������ȡ���������100%���������ʻ��С�<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2����������������ַ�Ϊ���¼��ִ���ʽ��<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; a�������������ύ����������������������������100%���������ʻ��У�<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b��������1�����ϣ���1�ˣ������ύ������������������ͷ��ж�����Ϊ�˽��Ϊ��Ч��Ʒ����ԭ����Ʒ���������ȣ�����������������������ʱ�������û�����飬�����100%���������ʻ��У�<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; c��������1�����ϣ���1�ˣ������ύ������������������ͷ��ж�����Ϊ�˽��Ϊ��Ч��Ʒ����ԭ����Ʒ���������ȣ�����������������������ʱ������ͳ������飬����������ͻ����������������ͷ���֤����֤���Լ����������������ò�������֤��֤���Լ���ƷΪ��Ч��Ʒ���ҹ������ɳ�ֵ�����£������100%���������ʻ��У�<br /><br />&nbsp;<br /><br />�ġ���ʾ�Ĺ���<br /><br />������Ĭ������£�ÿ���������񶼻��й�ʾ�ڣ��������ǶԹ�ʾ����˵����<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ��ʾ��ָ��ĳһʱ���ڣ������������Ὣ�����������������Ʒ���û����ļල�����۹���������Ϸ���������Ƿ���������Ʒ���ܣ�������������Ա���Զ���Ʒ�������ۡ�ͨ��ʵ����֤�Ļ�Ա���ɶ���Ʒ���С������͡��ȡ��Ĳ�����<br />&nbsp;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ��ʾĿ�����ڴٽ����ͼ�Ľ�����ѧϰ��ͬʱ������������Ⱥ�ڼල���������õ�������Ʒͨ�����ڵ�ͶƱ���������Կ϶��͹���������ʾʱ������δ��������ô��������ͨ����Ʒ���������͡��ȡ�����������ȿ�����Щ���õ���Ʒ����һ������Ʒɸѡ���á�<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; һ����ʾ��ʼ��һ�ղ�ѡ���б���Ʒ����ʾ�Ͳ���������ѡ���б���Ʒ���ͷ�ͨ�������б����룬�����������һ�̣���Ҫ��ʾ10�졣<br /><br />', '0', 'XX�������û�ȫ����������ʹ�ù���', 'XX�������û�ȫ����������ʹ�ù���', '&nbsp; ���ű�������������Ȩ�����ּ�����Ź�������ƽ�������ͳ�ʵ���õ�ԭ�������ڴ����й����������Ŀ����ƽ̨��������ʹ��ǰ��ϸ�Ķ�����ȫ�����������������񣩹���&nbsp;һ��XXX�����������������򡡡�1�����������ɶ��ۣ�����ȷ��ȫ�����������ʱ�䡢������������ϵ�绰����������ȷ���б깤����', '0', '1', '0', '1322122959', '0');
INSERT INTO keke_witkey_article VALUES ('85', '301', '0', '', 'XXX�������û��μ��б��������', '', null, '�˰��б�����μӹ��򽫴�2011��1��1����ʼִ��<br /><br />�μ��б��������<br /><br />1����Ϊ����б�����ķ��������������Ķ������ߵ�Ҫ��󣬲ſ����ύ���񷽰���<br /><br />2���������Ѳμӵ������б��ڵ��б������������ύ���񷽰������ɶ�ζԷ��������޸ġ�һ���б��ڽ����������ύ���޸ķ�����<br /><br />3�����б������������������У����вμ����ύ�ķ��������ڱ���״̬���������߼�������Ӧ���ύ��֮�⣬�����û������ɼ���<br /><br />4���������߻�ѡ������ķ��������������ύ����д����ִ�к�ͬ��<br />&nbsp;<br />5����ִ�к�ͬ�����������ͨ���ҷ����߳��벻����ִ�к�ͬ�е�һ�������Ľ������Ϻ�������뵽ִ���У�����ֱ�ӽ��������ڷ��������ͨ��ִ�мƻ���ֱ�ӽ�������ͬʱ��ִ�мƻ�����д�߳�Ϊ������ĳн��ߣ������бꡣ<br /><br />6�����н����谴����д��ִ�к�ͬ���й�����ִ���гн��߿��޸������ͬ�����޸������ͬ���辭���������ͨ��������Ч��<br /><br />7�����н���ͨ��������˳����������ͬ��д���������յĹؼ�ָ��󣬽��ɹ��ύ�������˺󣬿����뷢�Ŷ�Ӧ�ڵ�����������ͬ����������ֱ�ӷ��Ž���н��ߵ��˻���<br /><br />8�����н�����һ��������ͬ�ĸ��ڲ��õ����ŵ����������������<br />&nbsp;<br />9������������󷢲��߽��Գн��߽������ۣ������۽������ڳн����û�������ҳ�棬ͬʱ�н����û�������ֵ�����Ż�õ����������ӡ�<br /><br />10������������ִ����˫�������޷�����ķ��磬��н��ߺͷ�������һ��������ٲ����룬�ٲý�����ʵ��������ѳ���������δ���ŵ��������з��䲢��������������ٲý�����<br /><br />11���������ڽ�����н��߿��ڡ����бꡱҳ���в鿴�б����񣬲ο��Լ��ύ�ķ������鿴��д������ִ�мƻ����鿴���Է����˵����ۡ�<br /><br /><br />', '0', 'XXX�������û��μ��б��������', 'XXX�������û��μ��б��������', '�˰��б�����μӹ��򽫴�2011��1��1����ʼִ�вμ��б��������1����Ϊ����б�����ķ��������������Ķ������ߵ�Ҫ��󣬲ſ����ύ���񷽰���2���������Ѳμӵ������б��ڵ��б������������ύ���񷽰������ɶ�ζԷ��������޸ġ�һ���б��ڽ����������ύ���޸ķ�����3�����б������������������У����вμ����ύ', '0', '1', '0', '1322122999', '0');
INSERT INTO keke_witkey_article VALUES ('86', '300', '0', '', 'XXX�������û��μ������������', '', null, '�˰�ȫ����������μӹ��򽫴�2011��1��1����ʼִ��<br /><br />�μ�ȫ�������������<br /><br />1��������������Ϊ��֤��ƽ��������վ�Ϸ���������ȫ������Ԥ���ʽ�������˿ɷ��Ĳ��롣<br />&nbsp;<br />2����Ϊ��֤��ƽ������������Ա�������μ��κ�һ������ľ��ꡣ<br /><br />3��������״̬�ڽ����е����񣬲μ��߿����ɲμӲ��ύ�Լ�����Ʒ�����뾺�ꡣ<br /><br />4�����μӾ�����Ʒ�����ύ���񸽼���ʱ�򣬸�������ܳ���2M������<br /><br />5���������ڼ乤���߿����ύ������޸���Ʒ���о��꣬�����ֹ�򲻿��ύ���޸���Ʒ��������涨�������ύ������������Ľ������������ύ������Ҫ���޹صġ���ԭ�����ӳ�Ϯ���ύ�����������������������ɾ���ύ�����������Ӧ�Ĵ���<br /><br />6��������ɹ��󣬱�վ���������������򾺱�ɹ��Ĺ�����֧�������80%�����ͽ�������վ�ٰ����Ի�ڵĹ���Ϊ׼��<br /><br />7����������񷢲���Υ�����������Ϊ��������������ͨ��ͶƱ��ʽѡ���б��ߣ�����ͶƱ�б��߷��������������׵ķ����ߣ�����������������վ�������ʽ���������ϡ�<br /><br /><br />', '0', 'XXX�������û��μ������������', 'XXX�������û��μ������������', '�˰�ȫ����������μӹ��򽫴�2011��1��1����ʼִ�вμ�ȫ�������������1��������������Ϊ��֤��ƽ��������վ�Ϸ���������ȫ������Ԥ���ʽ�������˿ɷ��Ĳ��롣&nbsp;2����Ϊ��֤��ƽ������������Ա�������μ��κ�һ������ľ��ꡣ3��������״̬�ڽ����е����񣬲μ��߿����ɲμӲ��ύ�Լ�����Ʒ�����뾺�ꡣ4��', '0', '1', '0', '1322123040', '4');
INSERT INTO keke_witkey_article VALUES ('87', '300', '0', '', 'XXX���û��μ������������', '', null, '�μ�ȫ�������������<br />1����XXX��Ϊ��֤��ƽ��������վ�Ϸ���������ȫ������Ԥ���ʽ�������˿ɷ��Ĳ��롣<br />2����Ϊ��֤��ƽ��XXX��Ա�������μ��κ�һ������ľ��ꡣ<br />3��������״̬�ڽ����е����񣬲μ��߿����ɲμӲ��ύ�Լ�����Ʒ�����뾺�ꡣ<br />4�����μӾ�����Ʒ�����ύ���񸽼���ʱ�򣬸�������ܳ���2M������<br />5���������ڼ乤���߿����ύ������޸���Ʒ���о��꣬�����ֹ�򲻿��ύ���޸���Ʒ��������涨�������ύ������������Ľ������������ύ������Ҫ���޹صġ���ԭ�����ӳ�Ϯ���ύ�����������������������ɾ���ύ�����������Ӧ�Ĵ���<br />6��������ɹ��󣬱�վ���������������򾺱�ɹ��Ĺ�����֧�������80%�����ͽ�������վ�ٰ����Ի�ڵĹ���Ϊ׼��<br />7����������񷢲���Υ�����������Ϊ��XXX����ͨ��ͶƱ��ʽѡ���б��ߣ�����ͶƱ�б��߷��������������׵ķ����ߣ�XXX��������վ�������ʽ���������ϡ�<br /><br />�˰�ȫ����������μӹ��򽫴�2011��1��1����ʼִ��<br /><br /><br />', '0', 'XXX���û��μ������������', 'XXX���û��μ������������', '�μ�ȫ�������������1����XXX��Ϊ��֤��ƽ��������վ�Ϸ���������ȫ������Ԥ���ʽ�������˿ɷ��Ĳ��롣2����Ϊ��֤��ƽ��XXX��Ա�������μ��κ�һ������ľ��ꡣ3��������״̬�ڽ����е����񣬲μ��߿����ɲμӲ��ύ�Լ�����Ʒ�����뾺�ꡣ4�����μӾ�����Ʒ�����ύ���񸽼���ʱ�򣬸�������ܳ���2M������5������', '0', '1', '0', '1322123151', '3');
INSERT INTO keke_witkey_article VALUES ('88', '300', '0', '', '�ҷ�������������˿���', '', null, '<span style=\"font-family:Verdana;\">�𣺷������������й��ͽ��Ҳ����˿ֻ�����������Ͳż�����ĳ��⣬���ύ��Ѵ�����Ʒ�������û�о������������������վ��������˫��Э�̡�</span>                         <br />', '0', '�ҷ�������������˿���', '�ҷ�������������˿���', '�𣺷������������й��ͽ��Ҳ����˿ֻ�����������Ͳż�����ĳ��⣬���ύ��Ѵ�����Ʒ�������û�о������������������վ��������˫��Э�̡�', '0', '1', '0', '1322123196', '3');
INSERT INTO keke_witkey_article VALUES ('89', '300', '0', '', '���񷢲��󣬹����ܲ����޸�����', '', null, '<span style=\"font-family:Verdana;\">����������ڼ䣬������ϵ����ר���ͷ�Ϊ���޸ġ���Ҳ�������Ӳ���˵�����޸Ľ��������������������漰��������������</span>                         <br />', '0', '���񷢲��󣬹����ܲ����޸�����', '���񷢲��󣬹����ܲ����޸�����', '����������ڼ䣬������ϵ����ר���ͷ�Ϊ���޸ġ���Ҳ�������Ӳ���˵�����޸Ľ��������������������漰��������������', '0', '1', '0', '1322123229', '3');
INSERT INTO keke_witkey_article VALUES ('90', '296', '0', '', '��α����Լ��ʻ��İ�ȫ', '', null, '�����ͨ����ʵ����֤����������������ʺű���ʱ��ֻҪ�ṩ��ص���Ч֤����XXX���������ߣ����Ϳ��������û������ʺ����룺<br />������ʵ����֤�ķ�����<br />����,��¼XXX����<br />����,������֤����<br />����,���ʵ����֤����ġ�����ʵ����֤��<br />����,��д���������Ϣ<br />&nbsp;&nbsp;&nbsp; ��,��д����ȷ����Ϣ���ύ��֤�����ǵĹ�����Ա����һ���������ڸ����ظ� <br /><br />', '0', '��α����Լ��ʻ��İ�ȫ', '��α����Լ��ʻ��İ�ȫ', '�����ͨ����ʵ����֤����������������ʺű���ʱ��ֻҪ�ṩ��ص���Ч֤����XXX���������ߣ����Ϳ��������û������ʺ����룺������ʵ����֤�ķ���������,��¼XXX��������,������֤���ġ���,���ʵ����֤����ġ�����ʵ����֤������,��д���������Ϣ&nbsp;&nbsp;&nbsp; ��,��д����ȷ����Ϣ���ύ��֤������', '0', '1', '0', '1322123315', '2');
INSERT INTO keke_witkey_article VALUES ('91', '296', '0', '', '�ʺű������������û���������ô��', '', null, '�����ע��ʱ��д���������ͨ����������֤��������ͨ���һ����빦�������µõ������ʺš�<br />ʹ�÷�����<br />��,�����¼ҳ��<br />��,����� ���������ˣ������ӣ������һ��������<br />��,��д�����û����������һ��<br />��,��д��������أ������ȡ�����롱��ť<br />��,���ῴ��������Ϣ��<br />ȡ������ķ����Ѿ�ͨ�� Email ���͵����������У�<br />���� 3 ��֮���޸��������롣<br />��,�밴ϵͳ��ʾ��������ȡ���������롣 <br /><br />', '0', '�ʺű������������û���������ô��', '�ʺű������������û���������ô��', '�����ע��ʱ��д���������ͨ����������֤��������ͨ���һ����빦�������µõ������ʺš�ʹ�÷�������,�����¼ҳ�棲,����� ���������ˣ������ӣ������һ�������򡣣�,��д�����û����������һ����,��д��������أ������ȡ�����롱��ť��,���ῴ��������Ϣ��ȡ������ķ����Ѿ�ͨ�� Email ���͵����������У����� 3', '0', '1', '0', '1322123351', '1');
INSERT INTO keke_witkey_article VALUES ('92', '328', '0', '', '��������������Ŀ��', '', null, '1��&nbsp; ��¼״̬�£������������ť��<br /><br />2��&nbsp; ѡ�񷢲��������ͣ���������<br /><br />3��&nbsp; ��Ҫ����д���������Ϣ���磺������������ڡ�������ࡢ������⡢�������ݡ����񸽼���<br /><br />4��&nbsp; ���������������д�߼�ѡ�����߼�ģʽ��ѡ������б�ͼƼ��б�����бꣻ����������ѡ���û��ƹ������<br /><br />5��&nbsp; ����ȷ�ϣ���������˻�������������ȯ�����ȷ�ϸ������Զ��ۿ���˻���������ת��֧��ҳ�档<br /><br /><br />', '0', '��������������Ŀ��', '��������������Ŀ��', '1��&nbsp; ��¼״̬�£������������ť��2��&nbsp; ѡ�񷢲��������ͣ���������3��&nbsp; ��Ҫ����д���������Ϣ���磺������������ڡ�������ࡢ������⡢�������ݡ����񸽼���4��&nbsp; ���������������д�߼�ѡ�����߼�ģʽ��ѡ������б�ͼƼ��б�����бꣻ����������ѡ���û��ƹ��', '0', '1', '0', '1322123441', '2');
INSERT INTO keke_witkey_article VALUES ('93', '328', '0', '', '�������񷢲����������ƣ�', '', null, '<p>�������񷢲���������Ϊ�˱�֤��ϵͳ������������Ч�ԣ��������ʵ����ơ�Ŀǰ����������������������������γ�һ���ı�������:</p><p>100Ԫ�������񣬿��Գ���7��</p><p>500Ԫ�������񣬿��Գ���15��</p><p>1500Ԫ�������񣬿��Գ���30��</p><p>����ʱ���Ǹ��������������жϵģ�</p><br />', '0', '�������񷢲����������ƣ�', '�������񷢲����������ƣ�', '�������񷢲���������Ϊ�˱�֤��ϵͳ������������Ч�ԣ��������ʵ����ơ�Ŀǰ����������������������������γ�һ���ı�������:100Ԫ�������񣬿��Գ���7��500Ԫ�������񣬿��Գ���15��1500Ԫ�������񣬿��Գ���30�����ʱ���Ǹ��������������жϵģ�', '0', '1', '0', '1322123496', '2');
INSERT INTO keke_witkey_article VALUES ('94', '328', '0', '', 'ʲô�Ƕ����б�����', '', null, '<p>����ѡ������б�ģʽ��˵���˴�������Ҫ��������ɡ���������ѡ���������ϵ���Ʒ�бꡣ</p><p>�����б�ģʽ����������������ƽ�����������������������ÿ��������Ӧ���������ͽ����������1000Ԫ�����������������</p><p>һ�Ƚ�&nbsp;&nbsp; ��1��&nbsp;&nbsp; ƽ������&nbsp; ����300Ǯ</p><p>���Ƚ�&nbsp;&nbsp; ��2��&nbsp;&nbsp; ƽ������&nbsp; ����400Ǯ</p><p>���Ƚ�&nbsp;&nbsp; ��3��&nbsp;&nbsp; ƽ������&nbsp; ����300ԪǮ</p>                        <br />', '0', 'ʲô�Ƕ����б�����', 'ʲô�Ƕ����б�����', '����ѡ������б�ģʽ��˵���˴�������Ҫ��������ɡ���������ѡ���������ϵ���Ʒ�бꡣ�����б�ģʽ����������������ƽ�����������������������ÿ��������Ӧ���������ͽ����������1000Ԫ�����������������һ�Ƚ�&nbsp;&nbsp; ��1��&nbsp;&nbsp; ƽ������&nbsp; ����300Ǯ���Ƚ�&nbs', '0', '1', '0', '1322123538', '2');
INSERT INTO keke_witkey_article VALUES ('95', '328', '0', '', 'ʲô�ǼƼ�����', '', null, '<p>�Ƽ������Ƕ����б�ģʽ��һ�����죬���ڼƼ�����Ҫ��ϸ����ﵽһ�����������ֻҪ�������������Ϲ���Ҫ�󣬼����бꡣ�����ڷ�������ʱ��ȷ����������ͽ�Ҫ��������Ŀ��ϵͳ��ݴ����ÿ��������ͽ����Ͳ���Ƽ�����ÿ���һ�����ɻ�õ��������</p>                        <br />', '0', 'ʲô�ǼƼ�����', 'ʲô�ǼƼ�����', '�Ƽ������Ƕ����б�ģʽ��һ�����죬���ڼƼ�����Ҫ��ϸ����ﵽһ�����������ֻҪ�������������Ϲ���Ҫ�󣬼����бꡣ�����ڷ�������ʱ��ȷ����������ͽ�Ҫ��������Ŀ��ϵͳ��ݴ����ÿ��������ͽ����Ͳ���Ƽ�����ÿ���һ�����ɻ�õ��������', '0', '1', '0', '1322123563', '2');
INSERT INTO keke_witkey_article VALUES ('96', '304', '0', '', 'ѡ��������������', '', null, '<p>����ѡ��������Ǹ������ͽ���������жϵġ�</p><p>��������Ŀ����ѡ���������ޣ�����������޶ȵı������ͻ�Ա���Ͷ��ɹ�Ȩ�档 </p><p>����Ŀ��������Ʒ��������ܴ�̶��������ͳ��۸񲻺���ԭ�����£����鷢���߽�������мӼ����ڣ���ȷ�������ܹ�˳����ɡ�</p>                        <br />', '0', 'ѡ��������������', 'ѡ��������������', '����ѡ��������Ǹ������ͽ���������жϵġ���������Ŀ����ѡ���������ޣ�����������޶ȵı������ͻ�Ա���Ͷ��ɹ�Ȩ�档 ����Ŀ��������Ʒ��������ܴ�̶��������ͳ��۸񲻺���ԭ�����£����鷢���߽�������мӼ����ڣ���ȷ�������ܹ�˳����ɡ�', '0', '1', '0', '1322123608', '3');
INSERT INTO keke_witkey_article VALUES ('97', '304', '0', '', '����������Ŀ��', '', null, '<p>1��ע���Ϊ��Ա��</p><p>2�������Ŀ��������롣(�Ѿ������Ļ�������״̬����Ŀ�����ٲ���)��<br />3��������ɺ󣬽���������ģ��ҵ��Ҳ������Ŀ���ϴ����ɣ���Ϊ���ּ�������ʽ�ķ��������ַ�����ֱ��д�ڷ���˵�����<br />4����δ����֮ǰ�����޸ķ�����<br />5���ȴ��ͻ����ꡣ<br />6���ͻ�ѡ���б���Ʒ��ϵͳ�������б�֪ͨ���������б��߼�����Ʒ��</p>                        <br />', '0', '����������Ŀ��', '����������Ŀ��', '1��ע���Ϊ��Ա��2�������Ŀ��������롣(�Ѿ������Ļ�������״̬����Ŀ�����ٲ���)��3��������ɺ󣬽���������ģ��ҵ��Ҳ������Ŀ���ϴ����ɣ���Ϊ���ּ�������ʽ�ķ��������ַ�����ֱ��д�ڷ���˵�����4����δ����֮ǰ�����޸ķ�����5���ȴ��ͻ����ꡣ6���ͻ�ѡ���б���Ʒ��ϵͳ�������б�֪ͨ���������б���', '0', '1', '0', '1322123648', '2');
INSERT INTO keke_witkey_article VALUES ('98', '304', '0', '', '��Ŀʧ���˿�', '', null, '<p>1����Ŀ�����˳нӻ����ʧ�ܺ�ϵͳ��۳����񷢲����ú󣬽�ʣ������Դ���ȯ��ʽ�������û��˻����û�����ȯ������Ϊ�û�վ���������´����񷢲�ʹ�á�</p><p>2���ƹ�����ʧ�ܣ�ϵͳ����ȡӶ��</p>                        <br />', '0', '��Ŀʧ���˿�', '��Ŀʧ���˿�', '1����Ŀ�����˳нӻ����ʧ�ܺ�ϵͳ��۳����񷢲����ú󣬽�ʣ������Դ���ȯ��ʽ�������û��˻����û�����ȯ������Ϊ�û�վ���������´����񷢲�ʹ�á�2���ƹ�����ʧ�ܣ�ϵͳ����ȡӶ��', '0', '1', '0', '1322123697', '2');
INSERT INTO keke_witkey_article VALUES ('99', '218', '0', '', '���ڻ�Ӽ�����', '', null, '<p>1��&nbsp; �ͻ�������Ŀ��Ӧ��ʱ�鿴��Ŀ�ɹ�����Ŀ��ֹ�󷢲�����7�������ڡ���7��ʱ����ȷ���б����������Ӽۡ����ھ����� </p><p>2��&nbsp; ��Ŀ�״��������˲������Ŀ��������һ��������ڣ�����ʱ�䲻����7�졣</p><p>3��&nbsp; ��������ֻ��3�μӼۻ��ᣬ��1�μӼ۲��õ����������10%����2�μӼ۲��õ��������ܽ���20%����3�β��õ��������ܽ���50%��ÿ�����ڲ��ܳ���10�죬�Ӽ۽�����50Ԫ</p>                        <br />', '0', '���ڻ�Ӽ�����', '���ڻ�Ӽ�����', '1��&nbsp; �ͻ�������Ŀ��Ӧ��ʱ�鿴��Ŀ�ɹ�����Ŀ��ֹ�󷢲�����7�������ڡ���7��ʱ����ȷ���б����������Ӽۡ����ھ����� 2��&nbsp; ��Ŀ�״��������˲������Ŀ��������һ��������ڣ�����ʱ�䲻����7�졣3��&nbsp; ��������ֻ��3�μӼۻ��ᣬ��1�μӼ۲��õ����������10%����2�μӼ۲��õ��������ܽ�', '0', '1', '0', '1322123727', '0');
INSERT INTO keke_witkey_article VALUES ('100', '311', '0', '', '���������б�����', '', null, '<p>1��&nbsp; ��¼״̬�£������������ť��</p><p>2��&nbsp; ѡ�񷢲��������ͣ��б�����</p><p>3��&nbsp; ��Ҫ����д���������Ϣ���磺������������ڡ�������ࡢ������⡢�������ݡ����񸽼���</p><p>4��&nbsp; ����ȷ�ϣ���������˻�������������ȯ�����ȷ�ϸ������Զ��ۿ���˻���������ת��֧��ҳ�档�б�������۳��̶������񷢲����á�</p>                        <br />', '0', '���������б�����', '���������б�����', '1��&nbsp; ��¼״̬�£������������ť��2��&nbsp; ѡ�񷢲��������ͣ��б�����3��&nbsp; ��Ҫ����д���������Ϣ���磺������������ڡ�������ࡢ������⡢�������ݡ����񸽼���4��&nbsp; ����ȷ�ϣ���������˻�������������ȯ�����ȷ�ϸ������Զ��ۿ���˻���������ת��֧��ҳ�档', '0', '1', '0', '1322123771', '1');
INSERT INTO keke_witkey_article VALUES ('101', '312', '0', '', '��������Щ֧����ʽ��', '', null, '<span style=\"font-size:16px;\">֧�����˻����֧�����ױ��˻����֧������Ǯ�˻����֧��������������Ӫ֧�������ÿ�֧����<br />                        </span><br />', '0', '��������Щ֧����ʽ��', '��������Щ֧����ʽ��', '֧�����˻����֧�����ױ��˻����֧������Ǯ�˻����֧��������������Ӫ֧�������ÿ�֧����', '0', '1', '0', '1322123831', '0');
INSERT INTO keke_witkey_article VALUES ('102', '260', '0', '', '��η����Լ��ķ�������', '', null, '�������ģ��л���������<br />', '0', '��η����Լ��ķ�������', '��η����Լ��ķ�������', '�������ģ��л���������', '0', '1', '0', '1322123870', '0');
INSERT INTO keke_witkey_article VALUES ('103', '260', '0', '', 'ʲô�Ǹ��˷�����̣�', '', null, '���˵����������̳�רΪ���˷����̿����ĵ��̲�Ʒ���ò�Ʒ���Գ�����ָ��˷����̵ķ����ֵ���������ͻ���ˡ���ע�Ὺͨ����൱���Լ�����Ѹ�����վ�������Լ��༭���������������ۡ����˷������Ϊ��Ѳ�Ʒ����������ȫ���ʹ�øò�Ʒ��                                                <br />', '0', 'ʲô�Ǹ��˷�����̣�', 'ʲô�Ǹ��˷�����̣�', '���˵����������̳�רΪ���˷����̿����ĵ��̲�Ʒ���ò�Ʒ���Գ�����ָ��˷����̵ķ����ֵ���������ͻ���ˡ���ע�Ὺͨ����൱���Լ�����Ѹ�����վ�������Լ��༭���������������ۡ����˷������Ϊ��Ѳ�Ʒ����������ȫ���ʹ�øò�Ʒ��', '0', '1', '0', '1322123902', '0');
INSERT INTO keke_witkey_article VALUES ('104', '260', '0', '', '��ο�ͨ���˵���?', '', null, '<p>��ͨ���̽���������ע�� &#187; ��д�������� &#187; ��������</p>                        <br />', '0', '��ο�ͨ���˵���?', '��ο�ͨ���˵���?', '��ͨ���̽���������ע�� &#187; ��д�������� &#187; ��������', '0', '1', '0', '1322123931', '0');
INSERT INTO keke_witkey_article VALUES ('105', '239', '0', '', '�����鿴�Ҳ������Ŀ��', '', null, '<p>1����¼״̬�½���������<br />2������Ҳ������Ŀ���ͻ���ʾ���������������Ŀ�������б���Ŀ������ʾ���бꡱ������δ�ύ��������Ŀ�С��ϴ���������</p>                        <br />', '0', '�����鿴�Ҳ������Ŀ��', '�����鿴�Ҳ������Ŀ��', '1����¼״̬�½���������2������Ҳ������Ŀ���ͻ���ʾ���������������Ŀ�������б���Ŀ������ʾ���бꡱ������δ�ύ��������Ŀ�С��ϴ���������', '0', '1', '0', '1322123962', '0');
INSERT INTO keke_witkey_article VALUES ('106', '260', '0', '', 'ʲô���Ŷӷ�����̣�', '', null, '<p class=\"text02\">�Ŷӵ����������̳�רΪ��������ҵ���Ŷ��͹������û������ĵ��̲�Ʒ���ò�Ʒ���Գ�������Ŷӷ����̵ķ����ֵ������Ҫ�����¼����ŵ㣺</p><p class=\"text03\">(1)��ҵ��վ�㣬�����Ŷ�Ʒ������<br />(2)ȫ��λչʾ����ȷ���ַ����ֵ��<br />(3)�������Ȧ����ѻ����ÿͻ���<br />(4)�ʺ���ҵ�����˹����ҵ��Ŷ��û���</p>                        <br />', '0', 'ʲô���Ŷӷ�����̣�', 'ʲô���Ŷӷ�����̣�', '�Ŷӵ����������̳�רΪ��������ҵ���Ŷ��͹������û������ĵ��̲�Ʒ���ò�Ʒ���Գ�������Ŷӷ����̵ķ����ֵ������Ҫ�����¼����ŵ㣺(1)��ҵ��վ�㣬�����Ŷ�Ʒ������(2)ȫ��λչʾ����ȷ���ַ����ֵ��(3)�������Ȧ����ѻ����ÿͻ���(4)�ʺ���ҵ�����˹����ҵ��Ŷ��û���', '0', '1', '0', '1322123986', '0');
INSERT INTO keke_witkey_article VALUES ('107', '237', '0', '', '���֪���Լ�����Ʒ�бꣿ', '', null, '<p>1��&nbsp; ��վ�ϻᷢ���б�֪ͨ�ġ�</p><p>2��&nbsp; �ڹ������ģ��Ҳ������Ŀ������ʾ���бꡱ������</p><p>3���ڸ�����Ϣ���ģ������յ��б��ϵͳ��Ϣ��</p>                        4����վ�����ʼ�����ʽ���͵���ע���������ȥ��<br />', '0', '���֪���Լ�����Ʒ�бꣿ', '���֪���Լ�����Ʒ�бꣿ', '1��&nbsp; ��վ�ϻᷢ���б�֪ͨ�ġ�2��&nbsp; �ڹ������ģ��Ҳ������Ŀ������ʾ���бꡱ������3���ڸ�����Ϣ���ģ������յ��б��ϵͳ��Ϣ��                        4����վ�����ʼ�����ʽ���͵���ע���������ȥ��', '0', '1', '0', '1322124066', '0');
INSERT INTO keke_witkey_article VALUES ('108', '265', '0', '', '�˿�ע������', '', null, '<p>1���ͻ���������˿�ʱ������ϸ��֪������ݣ������������ݡ���ͨ��¼�������¼�ȣ�֤�����񲻷���Ҫ���֤�ݡ�</p><p>2�� �����̳��յ��ͻ��˿����룬����24Сʱ����ϵ�����ṩ�̣��Ե����������˽��ʵ�����Э�̵��Ⲣ����������ٲã���˫��������ϣ�</p><p>3������˿�����ڿͻ��������̳��йܵĽ��׽�</p>                        <br />', '0', '�˿�ע������', '�˿�ע������', '1���ͻ���������˿�ʱ������ϸ��֪������ݣ������������ݡ���ͨ��¼�������¼�ȣ�֤�����񲻷���Ҫ���֤�ݡ�2�� �����̳��յ��ͻ��˿����룬����24Сʱ����ϵ�����ṩ�̣��Ե����������˽��ʵ�����Э�̵��Ⲣ����������ٲã���˫��������ϣ�3������˿�����ڿͻ��������̳��йܵĽ��׽�', '0', '1', '0', '1322124097', '0');
INSERT INTO keke_witkey_article VALUES ('109', '312', '0', '', '��θ���/���ʽ', '', null, '<p>�����µ��������йܽ��׸��ʽ</p><p class=\"text02\">1�����ʻ����֧��</p><p class=\"text02\">2�����������г�ֵ���ʻ�֧��</p><p class=\"text02\">3����֧������ֵ���ʻ�֧��</p><p class=\"text02\">4���òƸ�ͨ��ֵ���ʻ�֧��</p><p class=\"text02\">5������ȥ���л�����绰֪ͨ�ͷ�Ϊ���ʺų�ֵ��</p><p class=\"text02\">&nbsp;</p>                        <br />', '0', '��θ���/���ʽ', '��θ���/���ʽ', '�����µ��������йܽ��׸��ʽ1�����ʻ����֧��2�����������г�ֵ���ʻ�֧��3����֧������ֵ���ʻ�֧��4���òƸ�ͨ��ֵ���ʻ�֧��5������ȥ���л�����绰֪ͨ�ͷ�Ϊ���ʺų�ֵ��&nbsp;', '0', '1', '0', '1322124227', '0');
INSERT INTO keke_witkey_article VALUES ('110', '313', '0', '', 'ʲô�����ͣ�', '', null, '<p>&nbsp;&nbsp;&nbsp; ������Ӣ��Witkey��wit�ǻۡ�keyԿ�ף������롣������ָ������ʱ��ƾ���Լ����������ǻۺʹ��⣩���ڻ������ϳ����Լ��ĸ�ԣ����ʱ����Ͷ��ɹ�����ñ�����ˡ�ͨ�׵ؽ������;���������ƽ̨�ϳ����Լ������ʲ��ɹ���ֵ�Ĺ�����Ⱥ�塣&nbsp;<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;���¾��ã���ҵ�������������͵��ˣ������ʽ���������˸�����ҵ����������֮�⣬���������ո��ഴ�����ۣ����ú͹������ˡ�����Щ���ո��ഴ�����ۣ����ú͹��������У��о������͡��������ͺ��������͵ȸ�����������͡��������Կ��ŵ�˵���ڻ�����������ƽ̨�ϣ�û����ν�ľ���ѧ�ҡ�����ѧ�ҵȸ�ʽ������ר��ѧ�ߣ�ֻ�����͡�����������վ�ĳ��֣�Ϊ��֪ʶ�����ӹ������ĸ��˴�����һ������֪ʶ��Ʒ����ҵƽ̨�ͻ��ᡣ<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;�ܶ���֮������ģʽ�ĳ��֣�Ϊ���˵�֪ʶ����Դ�����������̻�����������ʱ�������٣�ÿһ�����Ͷ����Խ��Լ���֪ʶ�������ѧ���о��ɹ���Ϊһ�����εġ�֪ʶ��Ʒ���ͷ����������������ۡ�����ͨ��������վ���ƽ̨������֪ʶ��Ʒ�������Լ���֪ʶ�������ѧ���о��ɹ���ת���ɸ��˲Ƹ���������ģʽ�£����˵�֪ʶ����Դ���������������������Ǹ��˵ĲƸ�������֪ʶ��ԴӦ�ÿ������¾��ã���ҵ��ʱ���������Ǹ��˻���֯ӵ��֪ʶ��ӵ�вƸ���</p>                        <br />', '0', 'ʲô�����ͣ�', 'ʲô�����ͣ�', '&nbsp;&nbsp;&nbsp; ������Ӣ��Witkey��wit�ǻۡ�keyԿ�ף������롣������ָ������ʱ��ƾ���Լ����������ǻۺʹ��⣩���ڻ������ϳ����Լ��ĸ�ԣ����ʱ����Ͷ��ɹ�����ñ�����ˡ�ͨ�׵ؽ������;���������ƽ̨�ϳ����Լ������ʲ��ɹ���ֵ�Ĺ�����Ⱥ�塣&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', '0', '1', '0', '1322124296', '0');
INSERT INTO keke_witkey_article VALUES ('111', '313', '0', '', 'ʲô�ǹ�����', '', null, '<span style=\"font-family:Arial;\">����</span>������ָ�ڱ���վ�Ϸ�������Ļ�Ա��', '0', 'ʲô�ǹ�����', 'ʲô�ǹ�����', '����������ָ�ڱ���վ�Ϸ�������Ļ�Ա��', '0', '1', '0', '1322124385', '0');
INSERT INTO keke_witkey_article VALUES ('112', '317', '0', '', '��Ϊ������Ҫʲô����', '', null, '1��û��רҵ��ѧ�������ƣ�ֻҪ�Լ�����Ȥ���������Ӧ�����񣬾Ϳɲ��롣<br /><br />2��XXX����һ�����Ϲ���ƽ̨��ֻҪע��ΪXXX����Ա���ܳ�Ϊ��һ�����֡�<br /><br />3��XXX���ᳫ�������ɳ���ѧϰ��<br /><br /><br />', '0', '��Ϊ������Ҫʲô����', '��Ϊ������Ҫʲô����', '1��û��רҵ��ѧ�������ƣ�ֻҪ�Լ�����Ȥ���������Ӧ�����񣬾Ϳɲ��롣2��XXX����һ�����Ϲ���ƽ̨��ֻҪע��ΪXXX����Ա���ܳ�Ϊ��һ�����֡�3��XXX���ᳫ�������ɳ���ѧϰ��', '0', '1', '0', '1322124563', '0');
INSERT INTO keke_witkey_article VALUES ('113', '318', '0', '', '����ƹ����֮�����½���XX��ע�ᣬ�������ƹ�Ŀͻ���', '', null, '����ģ�����ƹ����֮����������Զ�����¼��ֻҪ����������Cookie��¼�������15����ע���Ա����ɹ��ƹ㡣                        <br />', '0', '����ƹ����֮�����½���XX��ע�ᣬ�������ƹ�Ŀͻ���', '����ƹ����֮�����½���XX��ע�ᣬ�������ƹ�Ŀͻ���', '����ģ�����ƹ����֮����������Զ�����¼��ֻҪ����������Cookie��¼�������15����ע���Ա����ɹ��ƹ㡣', '0', '1', '0', '1322124693', '0');
INSERT INTO keke_witkey_article VALUES ('114', '318', '0', '', '�����ƹ�Ա�ܵõ�ʲô��', '', null, '&nbsp;                                                        ����ʵ���ƹ�����в�����ѧϰ�������Ӫ��֪ʶ�����Լ�����־��ͬʱ�ܽύ���־ͬ���ϵ����ѣ���Ȼ����Ч�ƹ�֮�󻹿��Ի�÷ǳ������ֽ𱨳ꡣ                                                <br />', '0', '�����ƹ�Ա�ܵõ�ʲô��', '�����ƹ�Ա�ܵõ�ʲô��', '&nbsp;                                                        ����ʵ���ƹ�����в�����ѧϰ�������Ӫ��֪ʶ�����Լ�����־��ͬʱ�ܽύ���־ͬ���ϵ����ѣ���Ȼ����Ч�ƹ�֮�󻹿��Ի�÷ǳ������ֽ𱨳ꡣ', '0', '1', '0', '1322124734', '0');
INSERT INTO keke_witkey_article VALUES ('115', '317', '0', '', 'ʲô���ƹ����ӣ�', '', null, '<span style=\"font-family:Arial;\">���ƹ�����Ҳ�����ڼ�¼�ƹ�ɼ��Ĺ��ߣ�������������ʽ�����ͨ���������ַ���ʡ�</span><br />', '0', 'ʲô���ƹ����ӣ�', 'ʲô���ƹ����ӣ�', '���ƹ�����Ҳ�����ڼ�¼�ƹ�ɼ��Ĺ��ߣ�������������ʽ�����ͨ���������ַ���ʡ�', '0', '1', '0', '1322124816', '1');
INSERT INTO keke_witkey_article VALUES ('116', '317', '0', '', '�������ȡ�Լ����ƹ�����\\���룿', '', null, '���ڵ�¼״̬��ֱ�ӽ���XX���ƹ�Աҳ�棨http://www.XXX.com/index.php?do=prom�����ܿ�������ȡ���Լ����ƹ�����\\���롣                        <br />', '0', '�������ȡ�Լ����ƹ����Ӵ��룿', '�������ȡ�Լ����ƹ����Ӵ��룿', '���ڵ�¼״̬��ֱ�ӽ���XX���ƹ�Աҳ�棨http://www.XXX.com/index.php?do=prom�����ܿ�������ȡ���Լ����ƹ����Ӵ��롣', '0', '1', '0', '1322124861', '0');
INSERT INTO keke_witkey_article VALUES ('240', '2', '0', '', '��ϵ��ʽ', '', '', '&lt;strong&gt;���ߵ绰��&lt;/strong&gt;&lt;br /&gt;��ϵ�绰��00000000&lt;br /&gt;���棺000-00000000&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;���������&lt;/strong&gt;&lt;br /&gt;Tel��000-0000000&nbsp; &lt;br /&gt;Email��&lt;a href=\"mailto:00@00000.com\"&gt;00@00000.com&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;������ѯ&lt;/strong&gt;&lt;br /&gt;00000000000&lt;br /&gt;����������:000&lt;br /&gt;QQ��00000000&lt;br /&gt;MSN�� &lt;a href=\"mailto:0000000000@000.com\"&gt;0000000000@000.com&lt;/a&gt;&lt;br /&gt;Email��&lt;a href=\"mailto:000000@0000.com\"&gt;000000@0000.com&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;�˲���Ƹ&lt;/strong&gt;&lt;br /&gt;�绰��0000000&lt;br /&gt;Email��&lt;a href=\"mailto:000@000000.com\"&gt;000@000000.com&lt;/a&gt;&lt;br /&gt;QQ:0000000000&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;��˾��ַ��&lt;/strong&gt;&lt;br /&gt;00��00��00000000����00¥&lt;br /&gt;�������룺000000&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460932', '2');
INSERT INTO keke_witkey_article VALUES ('227', '203', '0', '����', '���轻��թƭ��ע���ʻ���ȫ', '', '', '&lt;p&gt;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;���罻��ƭ�������������Ϳ������������û�����䲻�����ڡ�ֻҪע��������κ�ƭ�����޷��óѡ�&nbsp;����չ�ּ��ֳ����İ�ȫ������ƭ���������л�Աע�⣡&lt;/p&gt;&lt;p&gt;��&lt;strong&gt;���ø������룬ע�Ᵽ���˻�&lt;/strong&gt;��&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ŀǰ��վ�ṩ����˫������İ�ȫ���ϣ����ڵ�¼�Ȼ���������Ҫ��֤��¼���룬�������֡������漰���ʽ�Ĳ�������Ҫ��֤��ȫ���롣�ӽ����ʽ𱻵��ļ������У���������Щ�û������붼���ڼ򵥣��е�����δ���ð�ȫ���룬��������������ױ������ƽ⡣&lt;br /&gt;&lt;strong&gt;��ȫ��ʾ��&lt;/strong&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;����ԱӦ��ע�����ò����Ʊ������룬��ȡ���´�ʩ����ֹ���뱻����&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;1.&nbsp;&nbsp;&nbsp;&nbsp;���ý�Ϊ���ӵ����룬��Ҫʹ�����û���һ�¡��򵥵�������ϵ����룻&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp;&nbsp;&nbsp;&nbsp;���ò�ͬ�ĵ�¼����Ͱ�ȫ���룻&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp;&nbsp;&nbsp;&nbsp;���ܺ��˺����룬������Ҫ�ڹ��������ĵ����ϵ�¼ʹ�á�&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;/p&gt;', '1', '���轻��թƭ��ע���ʻ���ȫ', '���轻��թƭ��ע���ʻ���ȫ', '���轻��թƭ��ע���ʻ���ȫ', '0', '1', '0', '1329459645', '32');
INSERT INTO keke_witkey_article VALUES ('126', '100', '0', '', '��վ����5', '', null, '<p>��Ʒ�����ļ��������ص���ʽ���۵ģ��ṩ�������������Ͷ�����ʱ����Ϊ���������ġ���Ʒ��Ȩ���������У�������ֻ����ʹ��Ȩ���޸�Ȩ���ṩ�����Ȩ�鹺�������С���Ʒ��ͬ�Ĺ�����ֻ��Ҫ����һ�������ѾͿ����������أ��ṩ������ͬ�Ĺ����߸�������������ѡ�</p><br />', '0', '��վ����5', '��վ����5', '<p>��Ʒ�����ļ��������ص���ʽ���۵ģ��ṩ�������������Ͷ�����ʱ����Ϊ���������ġ���Ʒ��Ȩ���������У�������ֻ����ʹ��Ȩ���޸�Ȩ���ṩ�����Ȩ�鹺�������С���Ʒ��ͬ�Ĺ�����ֻ��Ҫ����һ�������ѾͿ����������أ��ṩ������ͬ�Ĺ����߸�������������ѡ�</p>', '0', '1', '0', '1325903353', '2');
INSERT INTO keke_witkey_article VALUES ('243', '17', '0', '', '���ͱؿ����������������֪', '', '', '&lt;h1&gt;&lt;strong&gt;1��������βμӷ�������׬Ǯ��&lt;/strong&gt;&lt;br /&gt;����������ķ�������ҳ��(&lt;a href=\"http://jijian.taskcn.com/list/index/\" target=\"_blank\"&gt;���з��������б�&lt;/a&gt;)��&lt;u&gt;����&lt;/u&gt;����ҳ�渽���е�txt���£�����������ȫ��&lt;u&gt;����&lt;/u&gt;��&lt;u&gt;ճ��&lt;/u&gt;������ָ������վ��(�������û��ָ�������ʾ���Է��������������վ����)��Ȼ��������ҳ�桰�μ����񡱵İ�ť���ѷ��õ�URL&lt;u&gt;���ӵ�ַ&lt;/u&gt;���ύһ�¼��ɡ�����ƹ�������ύ�󣬱���24Сʱ��Ч(�������������ʣ�����ɾ��)����ô�Ϳ���ֱ�ӻ����Ӧ���������ˡ�&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;2����������һ�����ڶ���أ�&lt;/strong&gt;&lt;br /&gt;����������Ĭ�Ͻ���ʱ��Ϊ30�죬ϵͳ���Զ�����������Ч��Ʒ��ֱ��������������Ϻ󣬸������Զ�ֹͣ������&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;3������ж����ύ�������Ƿ���Ч��&lt;/strong&gt;&lt;br /&gt;������������Ƚ�������ץȡ�������б������Ʒ�Ƿ�Ϊ��Ч���ύ��Ĭ�������ϵͳ������ĳ����Ʒ�ύ���24Сʱ������Զ�ץȡ�����жϸ���Ʒ�����Ƿ���ڼ���Ϣ�Ƿ���ȷ����ȷ�������Ʒ���Զ���������ͽ��Ѳ����ڵ���Ʒ���ӻ���Ϣ���󽫲���õ������ͽ�&lt;br /&gt;&lt;strong&gt;&lt;span style=\"color:red;\"&gt;�����ύΪ��Ч�ύ��&lt;br /&gt;&lt;/span&gt;&lt;/strong&gt;a. û���ύ������ָ������վ������δָ�����⣩��&lt;br /&gt;b. ����ԭ��������(������������е��ƹ������޹ص�����)��&lt;br /&gt;c. �������ṩ�����½��ж��δ�������ɾ���޸ģ���&lt;br /&gt;d. ��¼��Ա�󷽿ɼ�����վ���ӡ�&lt;br /&gt;e. ���������½����ͣ�&lt;br /&gt;f. ͬһ�������ظ�����2ƪ���ϣ���2ƪ����&lt;br /&gt;&lt;br /&gt;&lt;br /&gt;&lt;strong&gt;4���������޲μ�ĳ������������&lt;/strong&gt;&lt;br /&gt;&lt;a href=\"http://my.taskcn.com/audite\" target=\"_blank\"&gt;ʵ����֤&lt;/a&gt;�����Ͳμ�ÿ�������ύ�ƹ����ӵ�����Ϊ10����ַ����ÿ�����������ύ3�����ϣ��������ϵͳ���Զ���������������ʵ����֤���Ͳ��ܲμӷ�������&lt;/h1&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461237', '2');
INSERT INTO keke_witkey_article VALUES ('241', '4', '0', '', '��������', '', '', '1������վ�����������񡢼�����Ŀת�ã����Ȩ����ԭ�������У����ݱ�����ʵ�Ϸ�������վ�����κ����Ρ�&lt;br /&gt;&lt;br /&gt;2�������κ�ý�塢��վ����˴ӱ�������ʹ�ã����Ը���Ȩ�ȷ������Σ�����վ�����κ����Ρ�&lt;br /&gt;&lt;br /&gt;3������վ������ת�����£���Ȩ��ԭ�������У��������˵Ĺ۵�Ϳ����������Ը�������վ�����κ����Ρ�&lt;br /&gt;&lt;br /&gt;4��������վ��������ʽ�Ƽ�������վ����ʱ������վ����֤��Щ��վ����Դ�Ŀ����Ը�����ʵ�ԡ��Ϸ��ԡ�&lt;br /&gt;&lt;br /&gt;5�������κ���ʹ�����ӵ�������վ�����֮��������й¶���ɴ˶����µ��κη�������ͺ��������վ�����κ����Ρ�&lt;br /&gt;&lt;br /&gt;6�������뱾��վ���ӵ�������վ�����֮��������й¶���ɴ˶����µ��κη�������ͺ��������վ�����κ����Ρ�&lt;br /&gt;&lt;br /&gt;7���κε�λ�������Ϊͨ����վ�����ݿ��������ַ���Ϸ�Ȩ�棬Ӧ�ü�ʱ��վ����Ա���淴�������ṩ���֤����Ȩ��֤������ϸ��Ȩ���֤�����������յ����������ļ��󣬽��ᾡ�찲�Ŵ���&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460971', '0');
INSERT INTO keke_witkey_article VALUES ('242', '203', '0', '', '֧����ʽ', '', '', '&lt;p&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;֧����ʽһ�����л��&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;�� �� �У�XXXXXXX���С����� �ţ�000-000-000-000&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;ע�����������ڳ���Ϊ��xxxxx&nbsp; .....&lt;/p&gt;&lt;p&gt;����QQ��xxxxxxxx��xxxxxxx&lt;/p&gt;&lt;p&gt;��ϵ�绰��027-0000000��00000000��000000��000000&lt;/p&gt;&lt;p&gt;������뼰ʱ֪ͨ���ǣ���ע���������С����������͵��û�������������Ŀ���ơ�&lt;/p&gt;&lt;p&gt;��ҵ���迪�ݷ�Ʊ����ѹ�˾���ơ���ַ���ʱ�������Ϣ�������䣨&lt;a href=\"mailto:xxxx@xxx.com\"&gt;xxxx@xxx.com&lt;/a&gt;��,������ơ� &lt;br /&gt;&lt;br /&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;strong&gt;&lt;span style=\"font-size:16px;color:#ff0000;\"&gt;֧����ʽ����ͨ���Ƹ�ͨ����&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;strong&gt;���ͨ���Ƹ�ͨԤ���ͽ�&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461007', '3');
INSERT INTO keke_witkey_article VALUES ('247', '7', '0', '', 'ӵ������Ŀ�������', '', '', '�������ǲɷõ�������netslave������֮ƽ������һ����ó��˾�����ʦ���������й�һֱ������ְ���͡�����һ���Ȱ��������ֹ۵��ˣ�ϲ�����顢���С�������ǿ�����������׬��Ǯ��������Լ��ĳ������Դ������ŵ��������ߣ������й�����ɽ�����������������Ͼʱϲ�������������԰��ɽ����Ӱ��׷��һ���������&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461388', '1');
INSERT INTO keke_witkey_article VALUES ('248', '4', '0', '', '������ϵ֮���ű���', '', '', '&lt;p&gt;&lt;span style=\"font-family:simsun;\"&gt;&lt;span style=\"FONT-SIZE: 10pt\"&gt;���ű��Ͻ��Ǽ���&lt;span style=\"TEXT-DECORATION: underline\"&gt;���ű��Ϸ���&lt;/span&gt;����������Ͱ��Խɵ�&lt;span style=\"color:red;\"&gt;���ű�֤��&lt;/span&gt;��/����Ͱ������&lt;span style=\"color:red;\"&gt;���ű��϶��&lt;/span&gt;���ܺ͡����ű�֤����ָ������ű��Ϸ����������������Ͱ�Ԥ�ɵĳ��ű����ʽ�����ȷ�������е���ҺϷ�Ȩ���ܵõ���ʵ���ϣ��ڷ���ó������������⸶�������ʱ������Ӧ�ı����ʽ��⸶����ң����̶Ƚ�����ҵĺ�����ʧ��һ�������£����ҿ���֧ȡ�������˻س��ű��Ͻ𣬲���Ȩ����ͰͶ��ᡢ���ó��ű��Ͻ𡣳��ű��϶����ָ����Ͱ͸�����ҵ�����ͨ��һ��������ģ�ͣ��Լ�����ű��Ϸ�������ң�����һ����ȵĳ��ű��Ͻ�&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-family:simsun;\"&gt;&lt;span style=\"FONT-SIZE: 10pt\"&gt;���ű��Ͻ�������Ϊ����Ԥ����һ�������⸶�𡣿����ж��ַ�ʽ��չʾ&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461474', '2');
INSERT INTO keke_witkey_article VALUES ('249', '5', '0', '', '����������˰������г���', '', '', '&lt;span style=\"FONT-SIZE: 14px; LINE-HEIGHT: 25px\"&gt; ����������˰����������г��Ὠ��Ŀ͹�Ҫ���ǹ����˰�˹��������г���ľ������֡�&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;һ������������˰����������г��Ὠ�����Ҫ���ʱ���&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;˰���ǹ��Ҳ�����������������Ҫ����淶����ʽ���Ｏ���������ȶ��ɿ����ҹ���˰��������ռ���������95%���ң��ǲ�����������Ҫ����Դ���ҹ�ʵ����������ƶȣ����ҡ�����͸���֮��ĸ���������һ�µģ�˰�յ������ǡ�ȡ֮������֮���񡱡���������˰�ճＯ�������룬ͨ��Ԥ�㰲�����ڲ���֧�����ṩ������Ʒ�͹������񣬽��н�ͨ��ˮ���Ȼ�����ʩ�ͳ��й������裬֧�֡���ũ����չ�����ڻ�����������̬���裬�ٽ���������ѧ���Ļ��������������ҵ��չ��������ᱣ�Ϻ���ḣ�����ٽ�����Э����չ�����й������裬ά������ΰ���������������������չ�⽻������Ϲ��Ұ�ȫ���ٽ�������ᷢչ����������Ⱥ�����������������Ļ��ȷ������Ҫ�� &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;���������ҹ�˰�����뱣�ֳ�������������ͷ��2006��ﵽ37636��Ԫ������������21.9%�����ǹ��񾭼ÿ�����������ҵЧ������ߵķ�ӳ���Ǹ�����ί�������������˰�չ�����֧�ֺ�ȫ��˰��ϵͳ�ƽ�������˰����ǿ˰�����ܵĽ����Ҳ�ǹ����˰������������˰Ϊ���������Ĺ��ס�����˰�սϿ������������ǿ�˲���ʵ����Ϊ���ӹ�����Ʒ�ͷ��񣬸��������ṩ�˲������ϡ�Ҫ������������г��ᣬ��Ҫ��������ҹ����ڵľ�����ᡢ���緢չ��ƽ������⣬֧��ũ�巢չ��ũ�����գ���չҽ���������������Ļ��������ҵ���ٽ���ҵ����ᱣ�ϣ���һ��������������Щ����Ҫ������ǿ��Ĳ�������֤�����Ҫ��˰�����ž��÷�չ����ƽ�������������Ｏ����Ĳ������롣&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;��������������˰�ǹ�����������г������Ҫ����&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;�����Ѱ�����ȫ��ụ�ﻥ������ʵ���ţ�ȫ������ƽ���Ѱ�����Ǣ�ദ������������г����Ҫ���ϣ�����������г����Ҫ��־����ʵ���Ͼ���Ҫ���������ι����Ե��ι����ϣ��ƽ���������г��Ὠ�衣 &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;����������˰�ӷ��ɺ͵�����������淶��Լ��˰����غ���˰�˵���Ϊ���ǹ�����������г��������Ӧ��֮�塣�ҹ��ܷ���ȷ�涨���л����񹲺͹����������շ�����˰�������κβ�������˰����Ϊ����Ҫ�ܵ����ɵĳʹ�������������˰Ҳ����˰����õ�����֤�������Ų�����һ��Ʒ�У�����һ�����Σ�������һ�ֵ��壬����һ��׼�򣻲�����һ������������һ����Դ���͸��˶��ԣ������Ǹ��е��˸�����������ҵ���ԣ������Ǳ���������ʲ����������Ų����������Ų��ˡ���ʧȥ�����þ��������г����������㡣ֻ�м���ط���Ӫ��������˰�������������õ���ҵ����������ʵ�ֳ�Զ��չ�������˰�˱�������������˰�������ƶ��γ�ȫ����ʵ���š������ط������÷�����&nbsp;&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt;��������������˰��������г�����Ҫ����˫����ͬŬ��&lt;/strong&gt; &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;˰�����ܷ�����ʵʩϸ����ȷ�涨��˰����غ���˰�˵�Ȩ�������񡣾�˰����ض��ԣ�����Ҫ�ϸ�ִ�����������񡣾���˰�˶��ԣ�����Ҫ�Ծ�������˰�������շ��ɡ���������Ĺ涨��ʱ������˰�ͬʱ����˰�˻���������������⻺˰���������顢ѡ���걨��ʽ����١��ظ�˰����Ա��Υ����Ϊ��Ȩ����ʵ������������˰���ٽ���г��Ὠ�裬����˰����˰����صĹ�ͬ���Ρ� &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;�Ӵ�˰���������ȣ���ǿȫ�������������˰��ʶ��Ҫ��һ���Ľ�������ʽ����ʵ���˰��������Ч�����㷺����ʱ��׼ȷ������˰������˰�շ��ɡ���������ߣ��ռ���˰֪ʶ��Ҫ��ǿ��˰����������ѯ����˰����ʵ��֪ʶ��������ѵ����Ҫʹ��˰����ȷ��˰������Ҫʹ��˰���������������˰����Ϊ��˰��ѧ�����÷����ط�����������Ҫ��ǿ˰��ְ�����á�˰��ȡ֮������֮�����������ʹ���Ⱥ���˽�˰��Ϊ��������������͹��������ṩ�������ϣ����ھ��ú͵��ڷ��䣬�ٽ����Ҿ��ý���������ҵ��չ����Ҫ���ã��Ӷ���һ����ǿ����������˰�������к��Ծ��ԡ� &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;�Ľ����Ż���˰���񣬹�����г��˰�����ɹ�ϵ����г��˰�����ɹ�ϵ�Ǵٽ�����˰����ҵ��չ������˰��ְ�����õ���Ҫ������Ҳ�Ǻ�г������Ҫ��ɲ��֡�Ҫ�����˰����ӶȺͷ�����˰�˼�ʱ�����˰ΪĿ�꣬��ǿ�͸Ľ���˰����������ʵά����˰�˺Ϸ�Ȩ�棬������г��˰�����ɹ�ϵ����˰��������Ҫע�������˰�˰�˰�������´�����������Ҫ����˰�˱��͵ĸ��ֱ������ϣ�������˰���ظ����͡�������˰��Ҫ��һ���������ϰ���˰��Ǽǡ���չ˰��������������˰���õȼ��Լ���ǿ˰����Э���ȷ��湤���� &lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;�����ƽ�������˰�����칫ƽ������˰�ջ�����������ʵ������˰��Ӧ�վ��գ�������չ�ͷ˰�������ֹ����ֹԽȨ����˰����֯����ԭ����ȷ����������˰��֧�־��÷�չ��������˰�����˰�ռƻ���������˰����˰����������˰������˰��֮��Ĺ�ϵ������������˰���������ܡ�Ҫǿ��˰��ִ���ල����������˰��ִ�������ƣ��ƹ�˰��ִ��������Ϣϵͳ���ϸ�ִ����������׷������ʵ��չ˰��ִ����飬�������ٺ͹淶˰�����򡣼�ǿ˰����飬��������˰Υ����Ϊ��������������鿪�͹�������鿪��ֵ˰ר�÷�Ʊ�������ɵֿ�Ʊ��ƭȡ������˰���Լ����������ˡ������ˡ����⾭Ӫ͵˰����Ϊ���Է��ز���������װ���������֡�ʳƷҩƷ������������Ӫ���е���ҵ��˰����Լ���������ҵ��������˰���������չר���飬��һЩ˰������Ƚϻ��ҡ����ܻ����Ƚϱ����ĵ�������˰��ר�����Ρ�&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329461526', '1');
INSERT INTO keke_witkey_article VALUES ('250', '358', '0', '����', '�н����ֱ��Facebook��Ȩ������100����ż�', '21���;��ñ���', '', '&lt;p&gt;&nbsp; ���ϵ۹�����һ���ţ�Ҳ�Ὺ��һ�ȴ���&lt;/p&gt;&lt;p&gt;������ƽ�����С�QDII��Ȩ�ҹ��ṹ�Բ�Ʒ-����(Facebook)δ���й�Ȩ���в�Ʒ��ʧ֮���������(2011��1��6�ա�2��10��23�桶��ʢ��ָת��Facebook��Ȩ ƽ�����������ڵظ��ˡ�����ƽ���������Facebook �й���������IPOʢ�硷���豨��)������һ�Ҵ�����Ӫ��ҵ����������(����)����ӵ������н�˾(���)�ĵ绰���ٶȵ�ȼ���Խ�Facebook����ʢ���ϣ����&lt;/p&gt;&lt;p&gt;��������Facebookһֽ�����������ѵݽ�����֤ȯ����ίԱ��(SEC)�칫�ң����ƹ�Ȩ����Ѷ������н�˾(���)˽�����в�������ȻΪ�й��߶�Ͷ�ʿͣ��ṩ��һ��Ͷ��Facebookδ���й�Ȩ�ġ��ݾ�����&lt;/p&gt;&lt;p&gt;���������ƽ���������ڸϲ���Facebook���н��ȱ�����ͣ���в�Ʒ���ۣ��߶�Ͷ���߿���ͨ���н�(���)������ֱ����Facebook��Ȩ������ǩ����Ȩת��Э�飬��ͨ�����ֵ��ַ��ܿ�Facebook(���ڵݽ�IPO����)����������ơ���һλ�ӽ��н�(���)��ʿ͸¶�����н�(���)������������Ͷ������Э�̣�������Ϊ���״�Ϸ���&lt;/p&gt;&lt;p&gt;����Ȼ�����Ծ��⹫˾��ȨͶ�ʾ��鲢��������ն��ԣ�������������ʯͷ���ӡ����������ж��٣�&lt;/p&gt;&lt;p&gt;����&lt;strong&gt;3700����Ԫ�ż����ջ�&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;�����н�����ƽ��Facebookδ���й�Ȩ����ÿ��37��Ԫ��ת��������Ͷ������������̸�̶���&lt;/p&gt;&lt;p&gt;������ȴ�ǰ��ز�ۡ���ƽ������QDII��Ʒ1000��Ԫ�����Ͷ���ż����н�(���)�ݶ���Ͷ���ż���������һ����Ͷ��100���Facebookδ���й�Ʊ�����н�(���)�ݶ���ÿ��37��Ԫ���㣬ÿλ�����ߵ�Ͷ���ż�������3700����Ԫ(Լ2.3�������)��Ŀǰ��׼���ż���ϸ�ڻ����ڱ�����&lt;/p&gt;&lt;p&gt;��������ʵ�н�(���)ֻ�ᾫѡ��λ���ʽ�ʵ���ĸ߶�Ͷ���ߣ�����Ͷ��Facebookδ���й�Ȩ����Ҫ�����ڡ���һλ�ӽ��н�(���)����ʿ͸¶��Ŀǰ�н�(���)����Ǳ��Ͷ���ߵģ�ֻ��һ��Facebook�й�˵���飬����Ĺ�Ȩת��������Ҫ����Ͷ������������̸�̶���&lt;/p&gt;&lt;p&gt;���������������˽�ģ���Ϊ���н�(���)���������Facebook�չ��۸�Ҫ��ƽ�����и߳�2��Ԫ/�ɡ�&lt;/p&gt;&lt;p&gt;��������Ϊ�н�(���)��Facebookδ���й�Ȩת��������ƽ�������ǽ�Ȼ��ͬ�ġ��������ӽ��н�(���)��ʿ͸¶������Ҳ����˫�������ڸ߶�Ͷ�����ṩ���ֲ�ͬ��Ͷ��·������&lt;/p&gt;&lt;p&gt;�������ƽ������ͨ������һ��QDII��Ȩ�ҹ��ṹ�Բ�Ʒ�Ϲ�Facebookδ���й�Ȩ���н�(���)�����У��߶�Ͷ������ֱ������ǩ����Ȩת��Э�顣�����˽⵽���н�(���)����Ϊ�����н飬��Ȩת�õ�����������˫������Э��ȷ����&lt;/p&gt;&lt;p&gt;��������˽�����з���һ������в�Ʒ�ܹ�����Ͷ������������������նԾ������мܹ���ṹ��Ʊ���ڱ�˰���ܷ����ܷ���ıȽ����������˽⡣��ƽ�����С�ز�ۡ������в�ƷΪ����ͨ����Facebookδ���й�Ȩ�����ڳ����ˡ���Ȩת������Ͷ������������ͬ��Ƴ�һ��ṹ��Ʊ�ݣ�����Ͷ���������밶���в�Ʒ�ܹ������ܹ�ܾ��ڰ���Ȼ�˻�˾������˰�ļ�ܹ涨������ͨ���������мܹ��ƿ���������Ͷ�ʵļ�ܷ��档&lt;/p&gt;&lt;p&gt;���������˽⵽��ƽ��������һ��Ʒֻ��е�10%��Ϣ˰��������ʱ�����˰������������н�(���)ͨ��ת�÷�ʽ�õ�Facebookδ���й�Ȩ���ܷ��˰���ܿ�������ڼ�ܣ�ȴ��δ֪����������˵��&lt;/p&gt;&lt;p&gt;�����������ĵ��ǣ����н�(���)�Ƽ���Facebook��Ȩת��Ͷ���Ƿ���ڡ����֡���Ϊ��&lt;/p&gt;&lt;p&gt;��������Facebook�ѵݽ����������ҹ�Ȩת��ȫ�������ᣬ��ʱͶ����δ���й�Ȩ���ƺ�ֻʣ�¡����֡�·������Ͷ���߹���Ĺ�ƱFacebook�����ȱ�ԭ�ɶ���ĳ���ض��������֣�����Ʊ����󣬲�ͨ���ض���ʽ���������ǵľ����˻���һ����ˣ������ڼ�Ͷ���߱�����������Facebook��Ȩ��ʵ�ʿ����ˣ�����Ͷ�ʷ��ա�&lt;/p&gt;&lt;p&gt;����Ϊ�ˣ�����ר����ĳЩ�˽⾳����ּܹ���������ʦ��ѯ��ȴ����֪���������漰��Ļ���׵����⣬�������ٵ��ؼ�ܲ��ŵ��顣���⣬���ֽ��ױ������Ϣ��͸�����⣬Ҳ����������Ȩת��������ס�&lt;/p&gt;&lt;p&gt;�����������α�ʾ��Ŀǰ�����н�(���)���Ƽ�Facebookδ���й�Ȩת�õ��˽⣬��������֪���ɷݴ���6���½����ڣ�������Facebook�ѵݽ��������룬������Ϊ�ƺ����Ա��⡣&lt;/p&gt;&lt;p&gt;������������·ͨ������һλ�˽⾳����ּܹ�����ʦ�������ϻ���͸¶������Ľ���참��������ǰ��ƽ�����в�Ʒ�Ȳ�ȡĳ���밶���в�Ʒ�ܹ�����Facebookδ���й�Ȩ�����ڳ����ˡ���Ȩת��������Ʊ���ּ��������Ͷ������������ͬ�����һ���밶���в�Ʒ�У�Ȼ���밶���в�Ʒע���ڿ���Ⱥ���Ƚ��ڼ����Կ��ɵġ���˰���á�����������ͨ��һ���ض��Ŀ�Ͷ�ʹ�˾(SPV���������տ���)��ͨ��ǩ��ĳЩ�����Facebookδ���й�ȨͶ�ʹ���Ȩ����Ӵ���Facebookδ���й�Ȩ�������������Ϊͨ�������Ľ��С���&lt;/p&gt;&lt;p&gt;���������һ��ͨ�����ַ�ʽͶ��Facebookδ���й�Ȩ�����б��������������յ�ֱ���ǣ���Facebook���в����ٽ�ʱ��һ��ԭʼ�ɶ���������������߶�Ͷ�ʿ�����Facebookδ���й�Ȩ����������ĳ�ֲ���˵�ġ����ܡ���&lt;/p&gt;&lt;p&gt;����&lt;strong&gt;�ɷ���Դ��Facebook����㣿&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;���������ղ�����ǣ�˭Ը����Facebook����ֻ������һ��ʱ�����ɸ���IPOͶ�����棬ҲҪ����Facebook��Ȩ��&lt;/p&gt;&lt;p&gt;�������ܿ��ҵ��𰸡�������Facebook�����Ŷӳ�Ա����������Facebookδ���й�Ȩ����ƽ�����С�ز�ۡ����в�Ʒ���Ϲ���Facebookδ���й�Ȩ�����п������Ը�ʢ����ȥ������е�һ�����ڹ���FacebookԼ2%��Ȩ��14����Ԫ��ģ����Ͷ�ʹ��ߡ�Ŀǰ������Ͷ�ʹ�����Facebook��һ�ɶ�Glodman Sachs Clients��������ʾ��&lt;/p&gt;&lt;p&gt;�������ɺϵ��ǣ��ر�Ͷ�ʹ��ߵ�ĳЩ����ֳ������ƽ�����д�ǰ������QDII��Ʒ���ơ������ս��жԱȺ��֣�һ�Ǹ�ʢ�����е��ر�Ͷ�ʹ���Լ����������Ͷ��������ʱ������Ҫ���ʢ����5%Ͷ�����桱��ƽ������ҲҪ��Ͷ���ߵ�Ͷ������һ������20%��ƽ��������Ȩ����5%Ӷ����ɣ������ƽ���������QDII��Ʒ������ȷһ��Facebook���У����в�Ʒ��Ͷ�ʽṹ��Ʊ�ݽ��Զ�תΪ100%����Facebook�ɼ۲�����ҵ���ҹ�Ʊ�ݣ����ⲿ�ֹ�Ȩ�������Խ���ʾ������Ͷ�С����ƺ��롰Glodman Sachs Clients���Ĵ��ַ�ʽ��ı���ϡ�&lt;/p&gt;&lt;p&gt;�������ң����շ��ָ�ʢ����ر�Ͷ�ʹ��߳�����Ҳ��IPOǰ��ǰ���ֵĶ�������ʢ�����ر�Ͷ�ʹ���Ŀ��֮һ����ͨ���趨ĳЩ���ȫ��Ͷ���ߡ��޶���ΪFacebook��һ�ɶ��������ŵ�ǰSEC���ֵ���Facebook�Ǽ��ڲ�Ĺɶ�ʵ�����������𡰲��Ϲ桱�����˿�����Ҫ��ǰ���֣���ܽ��ڼ�ܣ���Ҳ���ų�����Ͷ�����Լ������֡���&lt;/p&gt;&lt;p&gt;���������������µ��ʢ������֤ʱ������ȷ����ƽ���������������Facebookδ���й�Ȩ���Ը�ʢ��&lt;/p&gt;&lt;p&gt;������ȶ��ԣ��н�(���)���Ƽ���Facebookδ���й�Ȩ��������������������˵Facebook����߲������Ա�����IPO�������ڼ�����һ���ֹ�Ȩ���ݶ���37��Ԫ/��ת�ö��ۣ���Facebook�ڲ����۵����з��м�Ԥ��Ҫ��15%-20%����&lt;/p&gt;&lt;p&gt;�������߶෽�˽⵽����Facebook�ڲ������ڹ�˾�Ƿ���ҪIPO�Դ������飬���ֹ������Ϊ��˾������Ҫ���ܵ�Ͷ�С����ȡ�����������ǰ��������Facebook��Ȩת��������ҵ�Ĵ��㡣&lt;/p&gt;&lt;p&gt;������Ŀǰ�н�(���)��Ҫ��Ѱ��Ǳ�ڵľ��ڸ߶�Ͷ���ˣ���û��ʵ������������Facebook��Ȩ����(��ί����ʦ)Э�̾���Ͷ������Ļ��ڡ�������ϣ��һ����Ͷ�ʵ�100��Facebook��Ʊ��ò�Ҫ�ֲ���ۣ�����������������Ӱ�쵽���ּܹ�����������ǰ���ӽ��н���۵���ʿǿ����ת�÷�ʽ����ȷ��Ϊ��Ȩֱ��ת�ã������֡�������Facebook���������ڼ���ع�Ʊ������ġ����ɲ��������Ը��Э�����ڸ߶�Ͷ������ɡ���ع�Ʊ��ת����&lt;/p&gt;', '0', '�н����ֱ��Facebook��Ȩ������100����ż�', '�н����ֱ��Facebook��Ȩ������100����ż�', '�н����ֱ��Facebook��Ȩ������100����ż�', '0', '1', '0', '1329461625', '3');
INSERT INTO keke_witkey_article VALUES ('226', '17', '0', '', '�������˽�ר�����װ��ģ�����Լ��ɣ�', '', '', '&lt;div&gt;&lt;span style=\"font-size:16px;\"&gt;���������㰮��������Щ���˰�������أ�&lt;/span&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;\"&gt;&lt;/span&gt;&lt;/div&gt;&lt;span style=\"font-size:16px;\"&gt; &lt;/span&gt;&lt;div&gt;&lt;br /&gt;���죬������԰������ͳ���ô���Ļ����أ�&lt;/div&gt;&lt;span style=\"font-size:16px;\"&gt;&lt;span style=\"font-size:16px;\"&gt;�뽫������顢���ġ��氮�������ǵ�����ƽ̨�ɣ�ףԸ����������������ϧ����ķַ����룬Я�ֹ����������&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;\"&gt;&nbsp;&lt;span style=\"color:#e53333;\"&gt;Ҫ��&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;color:#e53333;\"&gt;1.���Խ���һ�������������ϵĸ��˰�����£�&lt;/span&gt;&lt;br /&gt;&lt;br /&gt;&lt;span style=\"font-size:16px;color:#e53333;\"&gt;2.����дһЩ���㰮��������˵�Ļ���&lt;/span&gt;&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459290', '3');
INSERT INTO keke_witkey_article VALUES ('203', '100', '0', '', '��Ѷ����', '', 'data/uploads/2011/12/19/133474eeeb5f4d626c.png', '��ȷ����������<img src=\"data/uploads/2011/12/19/228664eeeb5f262e6f.gif\" alt=\"\" /><br />', '0', '��Ѷ����', '��Ѷ����', '333333333333333333333333333333333333', '0', '2', '0', '1325650111', '63');
INSERT INTO keke_witkey_article VALUES ('239', '2', '0', '�Ϳ�', '��ϵ����', '�Ϳ�', '', '&lt;p class=\"font14\"&gt;�人�Ϳ���Ϣ�������޹�˾&lt;br /&gt;��˾��ַ���人�к�ɽ���۳������������3��¥1005�� &lt;br /&gt;��ѯ���ߣ�027 87733922 &lt;br /&gt;�ͷ�QQ��1278454916 &lt;br /&gt;�̶��绰:18971533922&lt;/p&gt;&lt;h4&gt;��ǰ��ѯ&lt;/h4&gt;&lt;p&gt;���������Ϊ�Ϳͳ�Ʒϵͳ��ҵ��Ȩ�û�����Ŀ���ƿ��������������Ҳ����Ͽͷ�ϵͳ��ֱ���빤����Ա����������ѯ��&lt;/p&gt;&lt;p&gt;����ʱ�䡾5��8Сʱ����09:00~18:00����ͣ�12:00~13:00���������������������&lt;/p&gt;&lt;h4&gt;�ۺ���ѯ&lt;/h4&gt;&lt;p&gt;�Ϳͳ�Ʒ�ٷ���̳��ҵ�û��������ṩ��ҵ�û�����ĵ�¼��ڣ���Ϊ���ṩȫ��λ�Ľ̳�ָ�������ⷴ������&lt;/p&gt;&lt;p&gt;������ǿͿͳ�Ʒ��ҵ��Ȩ�û�����ʹ�ù����г�����������ʣ����µ���Ӫ���ģ�027-87733921&lt;/p&gt;&lt;p&gt;����ʱ�䡾5��8Сʱ����09:00~18:00����ͣ�12:00~13:00���������ղ������� &lt;/p&gt;&lt;h4&gt;����Э��&lt;/h4&gt;&lt;p&gt;�����ر�Ϊ��ҵ��Ȩ����Ŀ���ƿ����û��ṩ�˼�ʱ���߼���֧�ֿ���ͨ�����������ʹ�ù����������������⣬��ֱ����������֧��ȡ����ϵ����ͨ���Ϳ͹�����̳��ҵ�û����������ԣ����ǻἴʱ����ȡ����ϵ��&lt;/p&gt;&lt;p&gt;����ʱ�䡾5��8Сʱ����09:00~18:00����ͣ�12:00~13:00���������ղ�������&lt;/p&gt;&lt;h4&gt;ս�Ժ���&lt;/h4&gt;&lt;p&gt;����������人�Ϳ���Ϣ�������޹�˾����ս�Ժ�����ϵ���뷢�ʼ���yoko@kekezu.com&lt;/p&gt;&lt;p&gt;Ϊ���ܼ�ʱ����ȡ����ϵ����������Ч����ϵ��ʽ���磺�ֻ������QQ��MSN����������������&lt;/p&gt;&lt;p&gt;����ʱ�䣺������Ա��������ȡ�ʼ���24Сʱ�ڸ���ظ�����ĩ���ڼ�������ʱ��˳�ӣ�&nbsp;&lt;/p&gt;', '0', '��ϵ����', '��ϵ����', '��ϵ����', '0', '1', '0', '1329460896', '1');
INSERT INTO keke_witkey_article VALUES ('218', '200', '0', '', '��¼Э��', '', '', '�����ǵ�¼Э����������<img alt=\"΢Ц\" src=\"resource/js/xheditor/xheditor_emot/default/smile.gif\" /><img alt=\"����\" src=\"resource/js/xheditor/xheditor_emot/default/mad.gif\" /><img alt=\"�ô�\" src=\"resource/js/xheditor/xheditor_emot/default/knock.gif\" /><img alt=\"ץ��\" src=\"resource/js/xheditor/xheditor_emot/default/crazy.gif\" />�������ǵ�¼Э�飬�����ǵ�¼Э��<br />', '0', '', '', '', '0', '1', '0', '1326704236', '0');
INSERT INTO keke_witkey_article VALUES ('219', '200', '0', '', 'ע��Э��', '', '', '<p>������ע��Э������</p><p>�����Զ�������<img alt=\"΢Ц\" src=\"resource/js/xheditor/xheditor_emot/default/smile.gif\" /><img alt=\"���\" src=\"resource/js/xheditor/xheditor_emot/default/wail.gif\" /><img alt=\"����\" src=\"resource/js/xheditor/xheditor_emot/default/awkward.gif\" /><img alt=\"����\" src=\"resource/js/xheditor/xheditor_emot/default/doubt.gif\" />����Ǻ��ܧѹ���޿��κλ���ȥ��ܧ��<br /></p><br />', '0', '', '', '', '0', '1', '0', '1326704927', '0');
INSERT INTO keke_witkey_article VALUES ('220', '200', '0', '', '���񷢲�Э��', '', '', '<p>���񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э��</p><p>���񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э��</p><p>���񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э�����񷢲�Э��<br /></p><br />', '0', '', '', '', '0', '1', '0', '1326704968', '0');
INSERT INTO keke_witkey_article VALUES ('221', '200', '0', '', '��Ʒ����Э��', '', '', '<p><span class=\"font14\" style=\"text-indent: 2em;\">��Э���ǹ��ڽ���˫�����������б����������Ʒ��֪ʶ��Ȩ�ƽ��ġ�</span></p><p><span class=\"font14\" style=\"text-indent:2em\"></span> <span class=\"font14 block\" style=\"text-indent: 2em;\">��</span><span class=\"font14 block\" style=\"text-indent: 2em;\">��Ʒ�̵깺��һ����Ƶ�ʱ�򣬷����ߺ��б��߾ͻᱻ��Ϊ������һ����з���Լ������Э�顣</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\"></span> <span class=\"font14 block\" style=\"text-indent: 2em;\">������Һ����ҷֱ���������ʽͬ���Э������ һ���μ�һ��������ͣ���������һ������ҵ���ݣ�</span></p><p><span class=\"font14 block\" style=\"text-indent: 2em;\">����Ĭ��Ϊͬ���Э�����������˴�Э��ĵ�����Ϊ��Һ�����������ѡ�����б����ң�������</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\">�Ƴ�Ʒ�̵깺�����Ʒ������ߣ���������³������������ҡ���</span><span class=\"font14 block\" style=\"text-indent: 2em;\">�����ֹһ���������ң���ô��ҽ���</span></p><p><span class=\"font14 block\" style=\"text-indent:2em\">��Ϊ���������ҵ���������Э�顣Э�����������ѡ�������е������ƣ�ת�õ���ƣ�������Ƴ�Ʒ�̵���ת�õ���Ƶ�����Ϊ׼��</span></p>', '0', '', '', '', '0', '1', '0', '1326764543', '0');
INSERT INTO keke_witkey_article VALUES ('225', '358', '0', '���˿Ƽ�', 'Ψ���ٿ�iPadάȨ�����᣺����ƻ����άȨ', '���˿Ƽ�', '', '&lt;p&gt;���˿Ƽ�Ѷ 2��17�������Ϣ������Ψ�ڽ������Ϻ;���ҵ�ܲ����ࡢ���ƻ���ʦ�����ڱ����ٿ������ᣬ˵��Ψ����ƻ��֮���iPad�̱�Ȩ���ס�Ψ�ڴ�ʼ������ɽ��ʾ��ƻ����˾���깺��iPad��ȫ���������̱�Ȩʱ������թ��Ϊ����������ƻ����ά��Ȩ�档&lt;/p&gt;&lt;p&gt;����&lt;strong&gt;Ψ��iPad��ǰ������&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;��������Ψ�ڽ����ٿ���άȨ���������������ע���ڹ�����ʦ�����������칫�ҵ�һ��������60���ý�強�������������ң��ܶ����ϵ���ý��ֻ��վ�ڲ�����顣&lt;/p&gt;&lt;p&gt;����Ψ�ڴ�ʼ������ɽ����������Ψ��������iPad��Ʒ���������ܣ�iPad��һ���Ʒ����(ȫ����internet Personal Access Device)��ͬ��Ҳ��һ���̱ꡣΨ�ڹ�˾��1998���°��꿪ʼ���iPad��Ʒ���з�Ͷ�볬��3000������&lt;/p&gt;&lt;p&gt;��������ɽָ����iPad��Ψ��iFamilyϵ�в�Ʒ֮һ��2000����ʽ���ⷢ���������ڵ�ʱ��һ������Բ�Ʒ����2003�꣬Ψ���з���һ��iPad��Ʒ������Ψ�ڲ���ӵ��iPad���������̱꣬iPadֻ����OEM��ʽ��������&lt;a href=\"http://weibo.com/hpchina?zw=tech\" target=\"_blank\" __sina1329459174687=\"7\"&gt;(΢��)&lt;/a&gt;��&lt;/p&gt;&lt;p&gt;�����ڽ���ķ������ϣ�Ψ�ڹ�˾���ֳ�ý��ɢ����Ψ��iPad�Ľ������ϡ������ṩ�Ĳ��ϣ�Ψ��iPad��һ������ꡢ���̡���ʾ����С��̨ʽ������ƻ����˾���ڳ��۵�iPadƽ�������ȫ��ͬ�����⣬Ψ��iFamilyϵ�в�Ʒ������iNote��iPDA��iDVD��iClient�ȡ�&lt;/p&gt;&lt;p&gt;����&lt;strong&gt;ƻ������iPad�̱���̴�����թ&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;����������ɽ���䣬��iPad�̱���Ψ����ƻ�����й������𡱡�2003�꣬ƻ������ŷ��ע��iPod�̱꣬��ΪiPod��iPad�кܴ�������ԣ�Ψ�ڻ��˺ܶྫ����ֹƻ���������ѡ�������&lt;/p&gt;&lt;p&gt;��������ɽ˵��2008��ƻ����˾������������ơ�����Ӣ��������һ������ΪIP Application Development�Ĺ�˾(��ơ�Ӣ��IP��˾��)��������Ψ����ϵ��˵��˾�����iPad�̱�����ƣ�Ҫ����˫�������̸��ֻ��iPad��ŷ�޵������̱�Ȩ��&lt;/p&gt;&lt;p&gt;��������ɽ˵��Ӣ��IP��˾���������2��Ӣ�������⻹����ע����ã��������û��ͬ����ۡ�������������Ӣ��IP��˾��Ψ�ڹ�˾����һ���ʼ�������һ�۸���ʣ�ͬʱ��ʾ������������ͻᷢ�������ϡ���&lt;/p&gt;&lt;p&gt;��������ɽ��ʾ��2009��Ψ�ڳ��ֲ���Σ������˾���ڴ�����������ҵ��Ψ��̨����˾��������iPad�̱꣬��Ϊ������ϣ���˾Ҫ���ܶ���ʦ�ѡ�&lt;/p&gt;&lt;p&gt;�������ǣ�2009��12�£�����ɽ��ȨԱ��������ǩ�����Э�飬��10���̱��ȫ��Ȩ����3.5��Ӣ���ļ۸�ת�ø�Ӣ��IP��˾��&lt;/p&gt;&lt;p&gt;������Ϊ˫��ǩ����Э�鸽�����ᵽ�����й��ڵص�iPad�̱�ת��Э�飬������Ҳ��Ϊ��ƻ����Ψ�ڹ�˾˫���������׵ĸ�Դ���ڡ�&lt;/p&gt;&lt;p&gt;��������ɽ��Ϊ��ƻ������һ�����д�����թ��Ϊ��&lt;/p&gt;&lt;p&gt;����&lt;strong&gt;Ψ��û����������⳥&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;�������������������100��Ԫ���⣬����ɽҲ������Ӧ������ʾ����ȻΨ�����ڴ��ڲ���Σ�������������ڻ�û�й���Ҫ������⳥���֡�&lt;/p&gt;&lt;p&gt;���������������Ǹ����й����ɣ�ά��Ȩ�档����������������100��Ԫ��������Ψ�ڵ�Ҫ������רҵ��ʿ�Ŀ�����������ɽ��ʾ��&lt;/p&gt;&lt;p&gt;����������ʾ��ƻ��ȷʵ��iPad�������ƾ������ܵ�ȫ���û�ϲ����������ȷʵû���̱�ͽ����й���Ψ�����ڵ���Ϊ����Ϊ��ά��Ȩ�档&lt;/p&gt;&lt;p&gt;����������ʾ�����ܶ�����Ϊ������ע�̱꣬��ʵ���ϣ�iPad��1998��Ͱ���Ψ�ڵ����졣Ψ�����ں�ί������&lt;/p&gt;&lt;p&gt;������͸¶��Ψ������Ѱ���µĻ�������վ����������ʾ�����Ѿ���������ƻ���Ͷ���ˡ�(����)&lt;/p&gt;&lt;!-- publish_helper_end --&gt;&lt;!-- ���� begin --&gt;', '1', 'Ψ���ٿ�iPadάȨ�����᣺����ƻ����άȨ', 'Ψ���ٿ�iPadάȨ�����᣺����ƻ����άȨ', 'Ψ���ٿ�iPadάȨ�����᣺����ƻ����άȨ', '0', '1', '0', '1329459262', '9');
INSERT INTO keke_witkey_article VALUES ('230', '203', '0', '����', '�ͻ���α����ʻ���ȫ', '�Ϳ�', '', '&lt;div class=\"con clearfix\"&gt;���Ͻ��ף���ȫ��һ��&lt;br /&gt;&lt;br /&gt;��Ҷ��ȽϹ��Ľ��׹����еİ�ȫ���⣬����������˵�һ����ȫ���ߣ��ľ����Լ����ʺ����룡&nbsp;&lt;br /&gt;�Ƚϰ�ȫ����������Ӧ�÷��������������&lt;br /&gt;&lt;br /&gt;1,��ɲ��֣���ĸ�����֣������ַ���&lt;br /&gt;2,���ȣ�����ĳ���Ӧ����6��18λ֮�䡣&lt;br /&gt;&lt;br /&gt;ʾ����&lt;br /&gt;&nbsp;just@1108556&lt;br /&gt;&nbsp;hellococo#38324&lt;br /&gt;&nbsp;3638&amp;heyjude&lt;br /&gt;&lt;br /&gt;�����������������������������ʺ������������ٰ�ȫ��в��&lt;br /&gt;&lt;br /&gt;1,�����а����û�����&lt;br /&gt;2,�����а����򵥵����ִ�����12345�����ַ���(��abcd,asdf)��&lt;br /&gt;3,�����а��������õ���Ϣ����绰���롢���ա��ʱࡢ���ŵȡ� &nbsp;&lt;/div&gt;', '0', '�ͻ���α����ʻ���ȫ', '�ͻ���α����ʻ���ȫ', '�ͻ���α����ʻ���ȫ', '0', '1', '0', '1329459615', '5');
INSERT INTO keke_witkey_article VALUES ('231', '17', '0', '', '���ֹ�������', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;���ִ����������������ÿ�ܶ�ͳһ������������ܵ����֡���Ϊ����ÿ�����ֵ����������϶࣬���촦�����ֵ�ʱ�佫����Ӱ�죬��ʱ�����Ӻ�����������ֵ����֡���������������յ������̨������δ�������⣬������������������˵������������ȫ�������֮���ٽ���ͳһ����&lt;/span&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459594', '1');
INSERT INTO keke_witkey_article VALUES ('232', '17', '0', '', '�������ֳ�Ϯ������Ʒ����Ĵ����涨', '', '', '&lt;span style=\"font-family:Verdana;\"&gt;��������վ�ӵ��ٱ���������ͨ����Ϯ������Ʒ�����壬�ַ�����֪ʶ��Ȩ������Υ������վ�Ĺ涨��&lt;/span&gt;&lt;p&gt;&lt;span style=\"font-family:Verdana;\"&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ϊ�ˣ���վ�Գ�Ϯ������Ʒ�ģ������΢�Ľ��о��洦����Ϯ������ϣ���������صĽ���ID���⴦��&lt;/span&gt;&lt;/p&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459681', '4');
INSERT INTO keke_witkey_article VALUES ('233', '358', '0', '���˿Ƽ�', '�й�����������������iPhone 4S', '���˿Ƽ�', '', '&lt;p id=\"[object]\"&gt;���˿Ƽ�Ѷ 2��17����Ϣ��֪����ʿ͸¶���й�����&lt;a href=\"http://weibo.com/ct189?zw=tech\" target=\"_blank\" __sina1329459735968=\"7\"&gt;(΢��)&lt;/a&gt;����������������iPhone 4S����ʱ��CDMA��iPhone 4S�ļ۸�Ͳ������߽����ˡ�&lt;/p&gt;&lt;p&gt;������ǰ��1����Ѯ���й���ͨ&lt;a href=\"http://weibo.com/chinaunicom?zw=tech\" target=\"_blank\"&gt;(΢��)&lt;/a&gt;����������WCDMA���iPhone 4S�������Ҳ�������й�������ƻ�����iPhone 4S��Э�飬Ŀǰ�����ڵ��Ű�iPhone 4S���ʷѵȴ�������ɣ�����ʵ�ܶ��������������ܽ�����&lt;/p&gt;&lt;p&gt;�������ң����ڵ��Ű�iPhone 4S���кܶ�ì�ܵ�˵���������䵽���ǻ�������Ļ��ǻ���һ��ģ���Ҳ��Ҫ�й������Լ���͸¶��&lt;/p&gt;', '0', '�й�����������������iPhone 4S', '�й�����������������iPhone 4S', '�й�����������������iPhone 4S', '0', '1', '0', '1329459777', '4');
INSERT INTO keke_witkey_article VALUES ('234', '203', '0', '', '�ͷ���ʵ����֤', '', '', '�������վ����ϵ�绰�µ籾��˾��֤��&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329459878', '2');
INSERT INTO keke_witkey_article VALUES ('235', '358', '0', '������', '����Ȩ����֯���й��ֻ�������ȫ�����ڶ�', '������', '', '&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;�̹��ڹ�����������۸�ߡ������������й���Ȩ����֯������ʾ�������ֻ������������ٶ���������ĩ�ˣ�����ӡ�Ⱥá��з�����ʾ���ֻ��������ٶ�����Լ�˹����ֻ���Ƶ��վ��չ��&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;�� ��GSMA(ȫ���ƶ�ͨ��Э��)���չ����ı��棬�ֻ���������ٶ��������������ҷֱ���ӡ�Ⱥ��й����෴�ء��������Ĵ����ǡ�����������̫�����͹��ң��� �����پ��Ͽ졣����2010�꣬ӡ�Ⱥ��й�ƽ�������ٶȷֱ��Ϊ19 kbps��50 kpbs�����ձ��ͺ�����ƽ���ٶ��Ѵ�1400 kbps��&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;�� ��������ӡ�����ֻ���������չѸ�٣�GSMAҲ�����ֹ۵Ĺ��ơ�GSMA��Ϊ���������ڵķ�չ�ٶȣ���2015�꣬ӡ����Ӫ�̵��ƶ����ƽ���ٶȽ��ﵽ 1037 Kbps���й��ɴﵽ1384 Kbps��������Ȼ���������������ҡ�����Ϊ��ʱ�������ﵽ4984 Kbps���Ĵ����Ǻ����������ﵽ5194 Kbps��&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;����GSMA�ı��棬��ҵ����ʿ������Ϊ���й�2009��ŷ�3G�ƣ�3G�û�����ֱ��2011��ų���ͻ���ͽ�����ˣ�GSMA�ı�������2010������ݽ��бȽ���ʧƫ�ġ�&lt;/p&gt;&lt;p style=\"TEXT-ALIGN: justify; TEXT-INDENT: 30px; MARGIN: 0px 3px 15px\" align=\"justify\"&gt;��Ŀǰ�����ֻ����ٶ��ֻ���Ƶҵ��Ӱ����󡣡�����ĳ��Ƶ��վһ�߹����ʾ�������ֻ���Ƶ��վ��չ�������ܴ�̶���Դ���ֻ������ٶ��ձ鲻�죬�����ʷѼ۸���Ըߡ���ˣ������ֻ���Ƶҵ���ձ鱻��Ϊ���ƽ�ҵ�񡱣����������������ش�ͻ�ơ�&lt;/p&gt;', '0', '����Ȩ����֯���й��ֻ�������ȫ�����ڶ�', '����Ȩ����֯���й��ֻ�������ȫ�����ڶ�', '����Ȩ����֯���й��ֻ�������ȫ�����ڶ�', '0', '1', '0', '1329460032', '2');
INSERT INTO keke_witkey_article VALUES ('236', '203', '0', '', 'Ϊʲô���á�ʵ����֤����', '', '', '&lt;strong&gt;&lt;/strong&gt; Ϊȷ�������û���Ȩ���ܵõ���Ч���������ϻ�Ա�ʻ��ʽ�İ�ȫ���û��������Ա�ʻ��ʽ�����ʱ��Ϊʹ���ܼ�ʱ��׼ȷ���յ������ǲ�ȡ�� ʵ����֤��ʩ���Է�ֹð���������ʧ������ԭ������������ʧ��&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460211', '2');
INSERT INTO keke_witkey_article VALUES ('237', '202', '0', '', '��������', '', '', '&lt;div class=\"textttitle\"&gt;&lt;span class=\"ttitle\"&gt;&lt;/span&gt;&lt;br /&gt;        &lt;/div&gt;        &lt;div class=\"ftdiv\"&gt;XXXX����XXXXXX������Ӫ����վƽ̨�����й�����š���רҵ�����͹��������߹���ƽ̨��֪ʶ�ɹ��������ҵ�ɹ��������б꣩����ƽ̨��XXXXX������֪ʶ�ͲƸ�������ͨ����ʱ��ͱ���ȱȽ�����ԭ�������ڴ�����߹淶��Ӫ���ϵ�֪ʶ�ɹ�������ɹ������������߽����г�������һ�п����ֻ�ת�����Ͷ��ɹ�����񶼿���XXXXX��ƽ̨����ɽ��ס�&lt;br /&gt;&lt;br /&gt;&lt;div align=\"left\"&gt;&nbsp;&nbsp;&nbsp;&nbsp;XXXXX��XXXX��X�³����������������XXXXX�ȶ����ҵ������ϰ���רҵ�����߻�Ա������ƾ���Լ���רҵ֪ʶ���ɹ������������ܻ�Ծ��XXXX��Ϊ������ҵ����λ����˵ĸ��ֳɹ������ṩ������õĽ��������&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;XXXXXû���κ��ż���ֻҪ����������֪ʶ�ʹ����ǻۣ�������XXXXXXX��ƽ̨�ϳ�����ּ�ֵ�������ĸ�ԣʱ����Ͷ��ɹ����н��ף���չ���Ĺ�����ʽ�ͱ�������������������ַ���Ǳ����չʾ�Ż��������ɹ��ĵط���&lt;br /&gt;&lt;br /&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; �������ϡ�����Ϊ���������û�������Ȩ�������ǵ���Ӫ��ּ������Ϊ��Ӫ��һ����ƽ�����������������ͷ���ƽ̨��ȫ�����컥������Ṥ����ʽ�ĸ�����&lt;br /&gt;&lt;br /&gt;&lt;/div&gt;&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp; xxxx��ָ����ַ��&lt;/p&gt;&lt;/div&gt;&lt;br /&gt;', '0', '', '', '', '0', '1', '0', '1329460359', '3');
INSERT INTO keke_witkey_article VALUES ('238', '5', '0', '�¾���', '���͹���������3000�򣺲�����թ��Ϊ���ѿ���', '�¾���', '', '&lt;h1 id=\"artibodyTitle\" fid=\"1554\" did=\"11352678\" tid=\"1\" pid=\"31\"&gt;&lt;p&gt;&lt;span style=\"font-family:KaiTi_GB2312, KaiTi;\"&gt;&lt;/span&gt;&lt;h1 id=\"artibodyTitle\" fid=\"1554\" did=\"11319103\" tid=\"1\" pid=\"31\"&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��Ŀǰ������ͻ�ͨ������������վ��Ѱ��������ɽ��ס���Щ������ҵ�������ң�һ��ʼδ���ܹ��б꣬׼��������Ҫ��ѧϰ�����Լ���ר��ܡ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�������ͣ�һ��ָ��Щͨ�����������Լ���֪ʶ���ǻۡ����顢����ת����ʵ��������ˡ���һ����������2005����֣���������ý�����������������Ⱥ�岻�Ϸ�չ׳�󣬹�����������Ѿ�����3000��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;����������������������ϢϢ��أ�������ʽ������ɣ����Ա��������˵����������л�����ȥ�꽫������Ϊ��90����Ϊ�Ƴ��ʮ��ʱ��ְҵ֮һ����ר���Լ������������ѣ���Ȼ����רְ�����͵���Խ��Խ�࣬����ְ��Ȼ��������רְ��������ս�ϴ����������ְ������Ҳ��������뱾ְ�����Ĺ�ϵ��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;����IT����ơ���վ���衢����Ӫ��������������&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������(witkey)ģʽ���˵�֪ʶ���ǻۡ����顢����ͨ��������ת����ʵ������Ļ�������ģʽ����ҪӦ�ð��������ѧ�����������������ѧϰ����������⣬�����˻���������ȡ�������Ϊ���ĵ��������һ���������ɹ���������2005�������&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������ʵ����������Ķ��岢����һ��ְҵ��ֻ����һ�ֻ��������󣬵������ػ������������ش����⡯��Ϊһ��ְҵ�������������״��ߡ���������ʼ��������ͣ������͵Ĳ������ǹ���֪ʶ��ֵǮ�ģ�֪ʶ�ͼ���Խ�࣬�Ƹ��Ż�Խ�ࡣ��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;���������˽⵽��Ŀǰ������ͻ�ͨ������������վ��Ѱ��������ɽ��ס����������������м�����֮�࣬������ơ����������ɡ�����Ƚ�רҵ�������⣬�����簮���ס���Ǹ���š��������Ŷӡ�����ȡ���ȷǳ����������&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�����ݹ�������������վ��˽���&lt;a href=\"http://weibo.com/zhubajiewang?zw=finance\" target=\"_blank\"&gt;(΢��)&lt;/a&gt;���ܲ����������ܣ�ĿǰIT����ơ���վ���衢����Ӫ��������������������ŵġ�����Ѱ������ķ�ʽһ�������֣����ڽ϶���ǿͻ������������������ó��Լ��ķ��������꣬��һ����һ��һ���䣬�ͻ�ֱ��Ѱ���������������&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�����õ�����Ҫ�ж���һ���רҵ����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;���������͹���������ŵ��ǹ�ƽ��������û���˻�ȥ��һ���˵�ѧ������ҵ��ʲôѧУ����ͥ�����ȵȣ�����ƾ�����浶��ǹ��ʵ���������������ŵ������񲻶������ҵ��չ�����͵ķ�չǰ������ܺá���������ָ���������ڴ󲿷ֵ�������Ȼ�Ǽ�ְ����Ҳ���ֳ�רְ����Խ��Խ������ơ��е���������һ����֪����֮�󣬻�������Լ��Ĺ����һ��߽�����˾�����д�ҵ�����������������80��90�������ռ�������������60%����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;���������Ǻ��Ͻ���ְҵ����ѧԺ��һ������ѧ����ȥ��3�·�����ʼ���ÿ���ʱ�������ͣ���Ҫ���һЩ����Ӫ������������˷������Ϣ�ȵȡ����տ�ʼ��ʱ�Ƚ��ѣ���ʱһ�������ëǮ������Ǯ�����������������г�֮��ƽ��һ������50��Ǯ��������Ӫ���ż��ͣ������Ƚϼ��ң�����Ҳ��̫������������̹�ԣ���Ϊѧ�����ѵ����������ã��򵥵�������ûǰ;������Ҳ������ô�õ��ġ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;������һ���õ�����һ��Ҫ��ĳ�����רҵ���ܣ��ܹ�����һ�档���������Ĺ�����ѯ������ϯְҵ�滮ʦ������ָ���������ۺϽǶȿ������ͻ���Ҫ������Ŀ�����������ʱ��������������ͻ��Ĺ�ͨ������ͬʱ������Ҫһ��������Լ����������&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������Ҫ������ͻ����������&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;����������������Ҳ��Ϊ����������Ҫ���ģ�����רְ���ͺܿ��ܻ�������ŵ��Թ��������������������ɹ��������ǰ����ƽ������ƹ����������ְ�����ͣ���������ȥ������Ϊרְ���ͣ���������������ȶ�������ࡣ�����飬��������ʱҪ���ռ������о����˵İ��������ԴӼ�ְ���𣬵ȵ�������Ӳ�������ȶ�֮��������Ҫ���Կ���רְ��������ͬʱ��ʾ��רְ�����Ϳ϶�����һ����ѹ����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������ʵ��������վע������ʹ��Ҳ��60%���ҿ�������Ǯ����Ȼ��Щע���û�����ֻ�ǿ�����û���������롣��ȷʵ��Щ�����ڿ�ʼ�ļ���������������Ǯ�ġ������������ۣ��������ƽ̨�ϣ�����Ҫ��������ͻ�������������ܶ�������ϲ�����ƽ̨����Ϊһ���˵�������������Եõ������ļ��顣��&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;������ ����˵&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;������ȤΪ�Ȳ��ֱ���ҵ������ˮƽ&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;���������ǣ�רְ����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;������ǰ����һ����ҵ��λ�ϰ࣬���ϰ�֮�������ͣ���Ҫ����ҳ��ơ��տ�ʼ����ʱ���Ҳ�֪���Լ���ʲôˮƽ��Ҳû��ʲô������ֻ���������������˵����ҽ��ĵ�һ�����Ӿ��б��ˡ����������Ķ����𽥱��������Ͽɣ�������ϲ���Լ�֧��ʱ�䣬����ȥ��ʹ�ְרְ�������ˡ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�����Ҿ�������������Ҫ�Լ�����Ȥ������Ҫ�����Լ��ڹ����еõ����㣬�������ܼ����ȥ����ζ���ҵ������ˮƽҪ�����ֱ棬����������󡣿�����������һ��������Լ��Ķ����ܱ����Ͽɣ������Լ���ߵúܿ죬һ�α�һ����ɵúã��б�İ���Խ��Խ�������пͻ����������㣬�Ϳ��Կ��Ǽ�������ȥ�����򣬾�Ҫ�����Լ��Ƿ�����ʺ����͵Ĺ�����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;����һЩ��թ��Ϊ��û�кõĻ���ȥ����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;���������ȣ���ְ����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������ǰ���ҿ�����Χ�����������ͣ��Ҿ��ú���Ҳ��ְ����ƽ����Ƶ����͡����͵�����Ҫ��;����λ��Ҫ���ǲ��ģ������Ҫ��ĳ������ļ��ܡ��տ�ʼ��ʱ����һ���µ�����Ҳ��һǧ�࣬������������֮��һ���¿�����������ǧ��������һ�������ġ�������񣬲�������ۡ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�����Ҹ��˽������ǲ�Ҫ��רְ���ͣ���������ۡ���ƽ����Ƶ��ż������ߣ������ܼ��ҡ�Ҫ�����ö�һЩ����Ҫÿ����ɺܶ����񡣵�Ȼ��Щ��ҵ������������Ǯ���һЩ����ʱ�ܷ��б겻�⿿ʵ����ҲҪ�������ò��á�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;����ֵ��ע����ǣ���������ʱҲ��������թ��Ϊ����ɾ�����ʧ����Ŀǰ������վҲ��û���ر�õĻ���ȥ���ơ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;������ ҵ�ڽ���&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�������½�������������&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;����������������˽������ܲ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�������ڵ�������վ�кܶ࣬��ݬ���롣�����������һ��Ҫѡ���ġ�֪��������������վ���������ܻ�ø��õ�ƽ̨���ϡ���񲿷����ͻ�ѡ��������½��ף���������Ҳ�ܴ�˫�����ò������ϡ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������Ϊ��Ȼ��ҵ��ר�������������Ҳ��Ҫ���Լ������ں�խ�ķ�Χ�ڡ���ƽ̨�ϣ��ܶ඼����ʵ�İ�����������������������Կ���ĳ�ҹ�˾�б�ı�־�����Կ��������������������տͻ���Ҫ���������Ƶģ���Щ���ǿ���ѧϰ�ġ�&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������ܴٽ���ְ����&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;��������������������Ĺ�����ѯ������ϯְҵ�滮ʦ&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;����Ŀǰ���������ʹﵽְҵ�����˲�����̫�࣬�󲿷��˻��ǰ�������һ�ݼ�ְ����������Ϊ����ѧϰ�ġ������̬������������һ���ȽϺõĶԴ���ʽ������Ժܶ������ѧ����ְ��������������һ�ֺܺõ�ѧϰ��ʽ���������Ҳ�Ƚ����ף��������������Ҳ���Եõ����顣&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;�������Ǽ�ְ������һ��Ҫ������Լ��ı�ְ�����г�ͻ��Ҫ�������뱾ְ�����Ĺ�ϵ���Ͼ�һ���˵ľ��������޵ġ�ͬʱҲҪע���Ƿ�Ա�ְ�������дٽ����ã����ѡ���ܸ���ְ������������Ӱ��ļ�ְ������&lt;/span&gt;&lt;/p&gt;&lt;span style=\"font-size:16px;font-weight: normal;\"&gt;&lt;br /&gt;&lt;/span&gt;&lt;/h1&gt;&lt;br /&gt;&lt;/p&gt;&lt;/h1&gt;', '0', '���͹���������3000�򣺲�����թ��Ϊ���ѿ���', '���͹���������3000�򣺲�����թ��Ϊ���ѿ���', '���͹���������3000�򣺲�����թ��Ϊ���ѿ���', '0', '1', '0', '1329460459', '4');

-- ----------------------------
-- Table structure for `keke_witkey_article_category`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_article_category`;
CREATE TABLE `keke_witkey_article_category` (
  `art_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_cat_pid` int(11) DEFAULT '0',
  `cat_name` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `is_show` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  `cat_type` char(10) DEFAULT '0',
  `art_index` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`art_cat_id`),
  KEY `index_1` (`art_cat_id`),
  KEY `index_2` (`art_cat_pid`)
) ENGINE=MyISAM AUTO_INCREMENT=359 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_article_category
-- ----------------------------
INSERT INTO keke_witkey_article_category VALUES ('1', '0', '�Ϳ���Ѷ', '10', '1', '1324978745', 'article', '{1}{1}');
INSERT INTO keke_witkey_article_category VALUES ('2', '1', '��ϵ����', '2', '1', '1324026539', 'article', '{1}{2}');
INSERT INTO keke_witkey_article_category VALUES ('5', '1', '��ҵ��̬', '1', '1', '1274101606', 'article', '{1}{5}');
INSERT INTO keke_witkey_article_category VALUES ('7', '1', 'ý�屨��', '1', '1', '1274101647', 'article', '{1}{7}');
INSERT INTO keke_witkey_article_category VALUES ('17', '1', '��վ����', '0', '1', '1278323605', 'article', '{1}{17}');
INSERT INTO keke_witkey_article_category VALUES ('200', '0', '��ҳ', '0', '0', '0', '0', '{200}');
INSERT INTO keke_witkey_article_category VALUES ('202', '1', '��������', '1', '0', '1324952444', 'article', '{1}{202}');
INSERT INTO keke_witkey_article_category VALUES ('4', '1', '���߷���', '1', '1', '1274089497', 'article', '{1}{4}');
INSERT INTO keke_witkey_article_category VALUES ('203', '1', '��ȫ����', '0', '0', '1292658881', 'article', '{1}{203}');
INSERT INTO keke_witkey_article_category VALUES ('328', '290', '�������', '2', '0', '1323165361', 'help', '{100}{290}{328}');
INSERT INTO keke_witkey_article_category VALUES ('358', '1', '�����б�', '1', '0', '1324264090', 'article', '{1}{358}');
INSERT INTO keke_witkey_article_category VALUES ('345', '294', '���ʽ��', '5', '0', '1325746402', 'help', '{100}{294}{345}');
INSERT INTO keke_witkey_article_category VALUES ('290', '100', '�������', '2', '0', '1323157973', 'help', '{100}{290}');
INSERT INTO keke_witkey_article_category VALUES ('298', '294', 'ע���½', '1', '0', '1323158406', 'help', '{100}{294}{298}');
INSERT INTO keke_witkey_article_category VALUES ('300', '290', '�����б�', '2', '0', '1323158451', 'help', '{100}{290}{300}');
INSERT INTO keke_witkey_article_category VALUES ('304', '290', '��Ӷ����', '6', '0', '1323158531', 'help', '{100}{290}{304}');
INSERT INTO keke_witkey_article_category VALUES ('291', '100', '�����̳�', '3', '0', '1323157978', 'help', '{100}{291}');
INSERT INTO keke_witkey_article_category VALUES ('100', '0', '��������', '3', '1', '1278556511', 'help', '{100}');
INSERT INTO keke_witkey_article_category VALUES ('310', '294', '�����֤', '1', '0', '1323158633', 'help', '{100}{294}{310}');
INSERT INTO keke_witkey_article_category VALUES ('316', '292', '�ƹ�ע��', '1', '0', '1323158833', 'help', '{100}{292}{316}');
INSERT INTO keke_witkey_article_category VALUES ('329', '290', '���Ƿ�����', '1', '0', '1323165371', 'help', '{100}{290}{329}');
INSERT INTO keke_witkey_article_category VALUES ('327', '294', '�˺Ź���', '3', '0', '1323165351', 'help', '{100}{327}{294}');
INSERT INTO keke_witkey_article_category VALUES ('296', '294', '�˺Ű�ȫ', '1', '0', '1323158348', 'help', '{100}{294}{296}');
INSERT INTO keke_witkey_article_category VALUES ('312', '294', '���֧��', '1', '0', '1323158707', 'help', '{100}{294}{312}');
INSERT INTO keke_witkey_article_category VALUES ('311', '294', '���׬Ǯ', '1', '0', '1323158698', 'help', '{100}{294}{311}');
INSERT INTO keke_witkey_article_category VALUES ('315', '292', '�ƹ����', '1', '0', '1323158822', 'help', '{100}{292}{315}');
INSERT INTO keke_witkey_article_category VALUES ('297', '294', '���ֳ�ֵ', '1', '0', '1323158368', 'help', '{100}{294}{297}');
INSERT INTO keke_witkey_article_category VALUES ('346', '294', '����άȨ', '1', '0', '1324028081', 'help', '{100}{294}{346}');
INSERT INTO keke_witkey_article_category VALUES ('295', '289', '��վ����', '6', '0', '1323158308', 'help', '{100}{289}{295}');
INSERT INTO keke_witkey_article_category VALUES ('293', '100', '��������', '5', '0', '1323157990', 'help', '{100}{293}');
INSERT INTO keke_witkey_article_category VALUES ('294', '100', '������·', '1', '0', '1323157997', 'help', '{100}{294}');
INSERT INTO keke_witkey_article_category VALUES ('301', '290', '��������', '3', '0', '1323158461', 'help', '{100}{290}{301}');
INSERT INTO keke_witkey_article_category VALUES ('302', '290', '����&�ȼ�', '4', '0', '1323158473', 'help', '{100}{290}{302}');
INSERT INTO keke_witkey_article_category VALUES ('303', '290', '��������', '5', '0', '1323158488', 'help', '{100}{290}{303}');
INSERT INTO keke_witkey_article_category VALUES ('305', '290', '��������', '7', '0', '1323158544', 'help', '{100}{290}{305}');
INSERT INTO keke_witkey_article_category VALUES ('306', '290', '�б�����', '8', '0', '1323158554', 'help', '{100}{290}{306}');
INSERT INTO keke_witkey_article_category VALUES ('307', '290', '���½���', '9', '0', '1323158565', 'help', '{100}{290}{307}');
INSERT INTO keke_witkey_article_category VALUES ('308', '290', '����ѡ��', '10', '0', '1323158580', 'help', '{100}{290}{308}');
INSERT INTO keke_witkey_article_category VALUES ('309', '290', '֧�����', '11', '0', '1323158589', 'help', '{100}{290}{309}');
INSERT INTO keke_witkey_article_category VALUES ('317', '292', '�ƹ�����', '1', '0', '1323158840', 'help', '{100}{292}{317}');
INSERT INTO keke_witkey_article_category VALUES ('318', '292', '�ƹ���վ', '1', '0', '1323158848', 'help', '{100}{292}{318}');
INSERT INTO keke_witkey_article_category VALUES ('319', '293', '�˺ų�ֵ', '1', '0', '1323158882', 'help', '{100}{293}{319}');
INSERT INTO keke_witkey_article_category VALUES ('320', '271', '����֧��', '1', '0', '1323158894', 'help', '{100}{271}{320}');
INSERT INTO keke_witkey_article_category VALUES ('321', '271', '����֧��', '1', '0', '1323158902', 'help', '{100}{271}{321}');
INSERT INTO keke_witkey_article_category VALUES ('322', '271', '��������', '1', '0', '1323158916', 'help', '{100}{271}{322}');
INSERT INTO keke_witkey_article_category VALUES ('323', '291', '�̳ǹ���', '1', '0', '1323158935', 'help', '{100}{291}{323}');
INSERT INTO keke_witkey_article_category VALUES ('324', '291', '������Ʒ', '1', '0', '1323158964', 'help', '{100}{291}{324}');
INSERT INTO keke_witkey_article_category VALUES ('325', '291', '���ͷ���', '1', '0', '1323158974', 'help', '{100}{291}{325}');
INSERT INTO keke_witkey_article_category VALUES ('326', '293', '���׸���', '4', '0', '1323158986', 'help', '{100}{293}{326}');
INSERT INTO keke_witkey_article_category VALUES ('347', '294', 'Υ��', '1', '0', '1324028127', 'help', '{100}{294}{347}');

-- ----------------------------
-- Table structure for `keke_witkey_auth_bank`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_bank`;
CREATE TABLE `keke_witkey_auth_bank` (
  `bank_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(35) DEFAULT NULL,
  `bank_account` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `deposit_area` varchar(100) DEFAULT NULL,
  `deposit_name` varchar(100) DEFAULT NULL,
  `pay_to_user_cash` decimal(10,2) DEFAULT '0.00',
  `user_get_cash` decimal(10,2) DEFAULT '0.00',
  `pay_time` int(11) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `bank_sname` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`bank_a_id`),
  KEY `index_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_email`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_email`;
CREATE TABLE `keke_witkey_auth_email` (
  `email_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `auth_time` int(11) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`email_a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_email
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_enterprise`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_enterprise`;
CREATE TABLE `keke_witkey_auth_enterprise` (
  `enterprise_auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `licen_num` varchar(100) DEFAULT NULL,
  `licen_pic` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `legal` varchar(50) DEFAULT NULL,
  `staff_num` int(11) DEFAULT NULL,
  `run_years` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`enterprise_auth_id`),
  KEY `index_1` (`enterprise_auth_id`),
  KEY `index_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_enterprise
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_item`;
CREATE TABLE `keke_witkey_auth_item` (
  `auth_code` char(20) NOT NULL,
  `auth_title` varchar(100) DEFAULT NULL,
  `auth_day` varchar(100) DEFAULT NULL,
  `auth_small_ico` varchar(100) DEFAULT NULL,
  `auth_small_n_ico` varchar(100) DEFAULT NULL,
  `auth_big_ico` varchar(100) DEFAULT NULL,
  `auth_desc` text,
  `auth_cash` decimal(10,2) DEFAULT '0.00',
  `auth_expir` int(11) DEFAULT NULL,
  `auth_open` int(11) DEFAULT NULL,
  `auth_show` int(11) DEFAULT NULL,
  `muti_auth` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `auth_dir` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `config` text,
  PRIMARY KEY (`auth_code`),
  KEY `index_2` (`update_time`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_item
-- ----------------------------
INSERT INTO keke_witkey_auth_item VALUES ('email', '������֤', '1-2', 'data/uploads/sys/auth/288714f3b0a610f12e.png?fid=2086', 'data/uploads/sys/auth/209984f3b0a5d75a91.png?fid=2085', 'data/uploads/sys/auth/12494f3b0a4e3f184.png?fid=2084', '<ul class=\"mt15\"><li><strong class=\"mr5\">�����ַ��¼</strong> ��ֱ��ʹ�á������ַ����¼���Ϳ���</li><li><strong class=\"mr5\">��Ҫ�¼�����</strong> ���У�֧��/����/ѡ��/�б꣩ʱ���ɼ�ʱ�յ��ʼ�����</li><li><strong>��ʱ�˽���վ��̬</strong><br /></li></ul>', '1.00', '0', '1', '0', '0', '1329269346', 'email', '3', 'a:6:{s:10:\"auth_title\";s:8:\"������֤\";s:8:\"auth_day\";s:3:\"1-2\";s:9:\"auth_cash\";s:1:\"1\";s:10:\"auth_expir\";s:1:\"0\";s:9:\"auth_desc\";s:100:\"������ͣ�ϵͳ���Զ�����һ���ʼ����������䣬����24Сʱ֮�ڵ���ʼ�������ӽ���������֤��24֮����Ч��\";s:9:\"auth_open\";s:1:\"1\";}');
INSERT INTO keke_witkey_auth_item VALUES ('enterprise', '��ҵ��֤', '1-3', 'data/uploads/sys/auth/125234f3b0a2b64ffa.png?fid=2082', 'data/uploads/sys/auth/113224f3b0a2787aef.png?fid=2081', 'data/uploads/sys/auth/77524f3b0a381537a.png?fid=2083', '<ul><li>��ҵ��֤��һ����ݵ���֤��������������ô󵥴�����ҵ��������<br /></li></ul>', '0.00', '0', '1', '0', null, '1329269306', 'enterprise', '2', null);
INSERT INTO keke_witkey_auth_item VALUES ('bank', '������֤', '1-3', 'data/uploads/sys/auth/21944f3b0aa6ee63f.png?fid=2092', 'data/uploads/sys/auth/36134f3b0aa420af9.png?fid=2091', 'data/uploads/sys/auth/222604f3b0a950dbef.png?fid=2090', '������֤����', '1.00', '0', '1', '0', null, '1329269416', 'bank', '5', null);
INSERT INTO keke_witkey_auth_item VALUES ('mobile', '�ֻ���֤', '1-3', 'data/uploads/sys/auth/263574f3b0a76e2bd7.png?fid=2088', 'data/uploads/sys/auth/113084f3b0a7372e1d.png?fid=2087', 'data/uploads/sys/auth/114024f3b0a80619df.png?fid=2089', '<ul><li>��ҵ��֤��һ����ݵ���֤��������������ô�</li><li>������ҵ��������<br /></li></ul>', '1.00', '0', '1', '0', '0', '1329269378', 'mobile', '4', null);
INSERT INTO keke_witkey_auth_item VALUES ('realname', 'ʵ����֤', '1-3', 'data/uploads/sys/auth/223734f3b09ff3b85d.png?fid=2080', 'data/uploads/sys/auth/226204f3b09f878636.png?fid=2079', 'data/uploads/sys/auth/61224f3b754fa45b2.png?fid=2170', '���֤��֤', '0.00', '0', '1', '0', null, '1329296722', 'realname', '1', null);

-- ----------------------------
-- Table structure for `keke_witkey_auth_mobile`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_mobile`;
CREATE TABLE `keke_witkey_auth_mobile` (
  `mobile_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `mobile` char(11) DEFAULT NULL,
  `valid_code` char(6) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `auth_status` tinyint(1) DEFAULT NULL,
  `auth_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`mobile_a_id`),
  KEY `uid` (`uid`),
  KEY `mobile_a_id` (`mobile_a_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_mobile
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_realname`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_realname`;
CREATE TABLE `keke_witkey_auth_realname` (
  `realname_a_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `realname` varchar(50) DEFAULT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `id_pic` varchar(100) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`realname_a_id`),
  KEY `auth_status` (`auth_status`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_realname
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_record`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_record`;
CREATE TABLE `keke_witkey_auth_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_code` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `ext_data` text,
  PRIMARY KEY (`record_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_record
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_auth_weibo`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_auth_weibo`;
CREATE TABLE `keke_witkey_auth_weibo` (
  `weibo_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `weibo_type` varchar(20) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `auth_status` int(11) DEFAULT NULL,
  `account_data` text,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`weibo_id`),
  KEY `weibo_id` (`weibo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_auth_weibo
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_basic_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_basic_config`;
CREATE TABLE `keke_witkey_basic_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` char(20) DEFAULT NULL,
  `v` text,
  `type` char(20) DEFAULT NULL,
  `desc` text,
  `listorder` int(10) DEFAULT NULL,
  PRIMARY KEY (`config_id`),
  KEY `config_id` (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_basic_config
-- ----------------------------
INSERT INTO keke_witkey_basic_config VALUES ('1', 'website_name', '�Ϳͳ�Ʒרҵ����ϵͳ', 'web', '0', '1');
INSERT INTO keke_witkey_basic_config VALUES ('2', 'website_title', 'KPPW', 'web', '0', '2');
INSERT INTO keke_witkey_basic_config VALUES ('3', 'website_url', 'http://localhost/k2', 'web', '0', '3');
INSERT INTO keke_witkey_basic_config VALUES ('4', 'install_path', '0', '0', '0', '4');
INSERT INTO keke_witkey_basic_config VALUES ('5', 'web_logo', 'logo.png', 'web', '0', '5');
INSERT INTO keke_witkey_basic_config VALUES ('6', 'seo_title', '�Ϳͳ�Ʒרҵ����ϵͳ', 'sys', '0', '6');
INSERT INTO keke_witkey_basic_config VALUES ('7', 'seo_keyword', '�Ϳͳ�Ʒרҵ����ϵͳ', 'sys', '0', '7');
INSERT INTO keke_witkey_basic_config VALUES ('8', 'seo_desc', '�Ϳͳ�Ʒרҵ����ϵͳ', 'sys', '0', '8');
INSERT INTO keke_witkey_basic_config VALUES ('9', 'company', '�Ϳ���Ϣ�������޹�˾', 'web', '0', '9');
INSERT INTO keke_witkey_basic_config VALUES ('10', 'address', '����ʡ�人��', 'web', '0', '10');
INSERT INTO keke_witkey_basic_config VALUES ('11', 'phone', '027-88776968', 'web', '0', '11');
INSERT INTO keke_witkey_basic_config VALUES ('12', 'kf_phone', '027-88665355', 'web', '0', '12');
INSERT INTO keke_witkey_basic_config VALUES ('13', 'postcode', '430001', 'web', '0', '13');
INSERT INTO keke_witkey_basic_config VALUES ('14', 'filing', '��B2-20080005', 'web', '0', '14');
INSERT INTO keke_witkey_basic_config VALUES ('15', 'is_close', '2', 'web', '0', '15');
INSERT INTO keke_witkey_basic_config VALUES ('16', 'close_reason', '<b>��ʱ�رա�������33333333333</b>', 'web', '0', '16');
INSERT INTO keke_witkey_basic_config VALUES ('17', 'stats_code', '������ͳ�ƴ���', 'web', '0', '17');
INSERT INTO keke_witkey_basic_config VALUES ('18', 'max_size', '4', 'sys', '0', '18');
INSERT INTO keke_witkey_basic_config VALUES ('19', 'file_type', 'doc|docx|xls|ppt|wps|zip|rar|txt|jpg|jpeg|gif|bmp|swf|png', 'sys', '0', '19');
INSERT INTO keke_witkey_basic_config VALUES ('20', 'ban_users', 'admin|����|�����', 'sys', '0', '20');
INSERT INTO keke_witkey_basic_config VALUES ('21', 'ban_content', '���ܲ�|̫�ϻ�', 'sys', '0', '21');
INSERT INTO keke_witkey_basic_config VALUES ('22', 'reg_limit', '0', 'sys', '0', '22');
INSERT INTO keke_witkey_basic_config VALUES ('24', 'mail_server_cat', 'smtp', 'mail', '0', '24');
INSERT INTO keke_witkey_basic_config VALUES ('25', 'mail_server_port', '25', 'mail', '0', '25');
INSERT INTO keke_witkey_basic_config VALUES ('26', 'mail_ssl', '2', 'mail', '0', '26');
INSERT INTO keke_witkey_basic_config VALUES ('27', 'smtp_url', 'smtp.qq.com', 'mail', '0', '27');
INSERT INTO keke_witkey_basic_config VALUES ('28', 'post_account', '', 'mail', '0', '28');
INSERT INTO keke_witkey_basic_config VALUES ('29', 'account_pwd', '', 'mail', '0', '29');
INSERT INTO keke_witkey_basic_config VALUES ('30', 'mail_replay', '', 'mail', '0', '30');
INSERT INTO keke_witkey_basic_config VALUES ('31', 'mail_charset', 'utf-8', 'mail', '0', '31');
INSERT INTO keke_witkey_basic_config VALUES ('32', 'credit_is_allow', '2', 'sys', '0', '32');
INSERT INTO keke_witkey_basic_config VALUES ('33', 'user_intergration', '1', '0', '0', '33');
INSERT INTO keke_witkey_basic_config VALUES ('34', 'is_rewrite', '0', 'sys', '0', '34');
INSERT INTO keke_witkey_basic_config VALUES ('35', 'mark_start_status', '1', '0', '0', '35');
INSERT INTO keke_witkey_basic_config VALUES ('36', 'auto_mark_time', '3', '0', '0', '36');
INSERT INTO keke_witkey_basic_config VALUES ('37', 'auto_mark_status', '1', '0', '0', '37');
INSERT INTO keke_witkey_basic_config VALUES ('38', 'credit_rename', 'Ԫ��', 'sys', '0', '38');
INSERT INTO keke_witkey_basic_config VALUES ('39', 'exp_rename', '����', '0', '0', '39');
INSERT INTO keke_witkey_basic_config VALUES ('44', 'qq_app_id', null, 'interface', 'QQ����appid', '44');
INSERT INTO keke_witkey_basic_config VALUES ('45', 'qq_app_secret', null, 'interface', 'QQ��¼appSecret', '45');
INSERT INTO keke_witkey_basic_config VALUES ('48', 'taobao_app_id', null, 'interface', '�Ա�����appid', '48');
INSERT INTO keke_witkey_basic_config VALUES ('49', 'taobao_app_secret', null, 'interface', '�Ա�����secret', '49');
INSERT INTO keke_witkey_basic_config VALUES ('50', 'allow_reg_action', '0', 'sys', '0', '50');
INSERT INTO keke_witkey_basic_config VALUES ('64', 'mobile_password', null, 'mobile', '', '0');
INSERT INTO keke_witkey_basic_config VALUES ('63', 'mobile_username', null, 'mobile', '', '0');
INSERT INTO keke_witkey_basic_config VALUES ('62', 'oauth_api_open', '', 'oauth_api', null, '62');
INSERT INTO keke_witkey_basic_config VALUES ('54', 'sina_app_id', null, 'weibo', '���˵���appid', '54');
INSERT INTO keke_witkey_basic_config VALUES ('55', 'sina_app_secret', null, 'weibo', '���˵���secret', '55');
INSERT INTO keke_witkey_basic_config VALUES ('56', 'sohu_app_id', null, 'weibo', '�Ѻ�����appid', '56');
INSERT INTO keke_witkey_basic_config VALUES ('57', 'sohu_app_secret', null, 'weibo', '�Ѻ�����secret', '57');
INSERT INTO keke_witkey_basic_config VALUES ('58', 'netease_app_id', null, 'weibo', '���׵���appid', '58');
INSERT INTO keke_witkey_basic_config VALUES ('59', 'netease_app_secret', null, 'weibo', '���׵���secret', '59');
INSERT INTO keke_witkey_basic_config VALUES ('60', 'ten_app_id', null, 'weibo', '��Ѷ����appid', '60');
INSERT INTO keke_witkey_basic_config VALUES ('61', 'ten_app_secret', null, 'weibo', '��Ѷ����secret', '61');
INSERT INTO keke_witkey_basic_config VALUES ('65', 'alipay_app_id', null, 'interface', '֧������¼app_id', null);
INSERT INTO keke_witkey_basic_config VALUES ('66', 'alipay_app_secret', null, 'interface', '֧������¼app_secret', null);
INSERT INTO keke_witkey_basic_config VALUES ('78', 'attent_api_open', '', 'attent_api', null, null);
INSERT INTO keke_witkey_basic_config VALUES ('67', 'keke_id', null, 'union', '����ID', null);
INSERT INTO keke_witkey_basic_config VALUES ('68', 'keke_secret', null, 'union', '����ͨ��key', null);
INSERT INTO keke_witkey_basic_config VALUES ('69', 'copyright', 'KPPW 2.0 Copyright &#169; 2009 -2011 kekezu. All rights reserved', null, '��վ��Ȩ', null);
INSERT INTO keke_witkey_basic_config VALUES ('70', 'prom_open', '1', 'prom', '�ƹ㿪��', null);
INSERT INTO keke_witkey_basic_config VALUES ('71', 'prom_period', '20', 'prom', '�ƹ���Ч��', null);
INSERT INTO keke_witkey_basic_config VALUES ('74', 'sina_attent', null, 'attention', '����΢��', '74');
INSERT INTO keke_witkey_basic_config VALUES ('75', 'ten_attent', null, 'attention', '��Ѷ΢��', '75');
INSERT INTO keke_witkey_basic_config VALUES ('76', 'netease_attent', null, 'attention', '����΢��', '76');
INSERT INTO keke_witkey_basic_config VALUES ('77', 'sohu_attent', null, 'attention', '�Ѻ�΢��', '77');
INSERT INTO keke_witkey_basic_config VALUES ('79', 'google_api', null, 'map', '�ȸ��ͼ', '79');
INSERT INTO keke_witkey_basic_config VALUES ('80', 'baidu_api', null, 'map', '�ٶȵ�ͼ', '80');
INSERT INTO keke_witkey_basic_config VALUES ('81', 'map_api_open', 'a:1:{s:9:\"baidu_api\";i:0;}', 'map_api', null, '81');
INSERT INTO keke_witkey_basic_config VALUES ('82', 'info_static', 'article', 'static', '��̬������', '82');

-- ----------------------------
-- Table structure for `keke_witkey_case`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_case`;
CREATE TABLE `keke_witkey_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `case_img` varchar(150) DEFAULT NULL,
  `case_title` varchar(50) DEFAULT NULL,
  `case_desc` varchar(500) DEFAULT NULL,
  `case_price` decimal(10,2) DEFAULT '0.00',
  `case_auther` varchar(20) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `case_id` (`case_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_case
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_comment`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_comment`;
CREATE TABLE `keke_witkey_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT '0',
  `origin_id` int(11) DEFAULT '0',
  `obj_type` char(20) DEFAULT NULL,
  `p_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `index_1` (`comment_id`),
  KEY `index_2` (`obj_id`),
  KEY `index_3` (`p_id`),
  KEY `index_4` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_favorite`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_favorite`;
CREATE TABLE `keke_witkey_favorite` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `keep_type` char(20) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `obj_name` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `on_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`f_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_favorite
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_feed`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_feed`;
CREATE TABLE `keke_witkey_feed` (
  `feed_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_id` int(11) DEFAULT '0',
  `obj_link` varchar(100) DEFAULT NULL,
  `feedtype` varchar(20) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `icon` char(10) DEFAULT '0',
  `title` text,
  `feed_desc` text,
  `feed_pic` varchar(100) DEFAULT NULL,
  `feed_time` int(11) DEFAULT '0',
  `ext_data` text,
  PRIMARY KEY (`feed_id`),
  KEY `index_2` (`obj_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_feed
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_field`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_field`;
CREATE TABLE `keke_witkey_field` (
  `field_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_type` varchar(20) DEFAULT NULL,
  `field_name` varchar(50) DEFAULT NULL,
  `field_items` text,
  `field_table` varchar(50) DEFAULT NULL,
  `field_description` varchar(200) DEFAULT NULL,
  `valid` varchar(100) DEFAULT NULL,
  `valid_require` int(11) DEFAULT NULL,
  `valid_min` int(11) DEFAULT '0',
  `valid_max` int(11) DEFAULT '0',
  `valid_type` varchar(200) DEFAULT NULL,
  `field_errordesc` varchar(200) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `dateline` int(11) DEFAULT NULL,
  PRIMARY KEY (`field_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_field
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_fielddata`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_fielddata`;
CREATE TABLE `keke_witkey_fielddata` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `data_value` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_fielddata
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_file`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_file`;
CREATE TABLE `keke_witkey_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj_type` varchar(20) DEFAULT NULL,
  `obj_id` int(20) DEFAULT NULL,
  `task_id` int(11) DEFAULT '0',
  `work_id` int(11) DEFAULT NULL,
  `task_title` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `save_name` varchar(200) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`file_id`),
  KEY `index_3` (`task_id`),
  KEY `index_4` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_file
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_finance`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_finance`;
CREATE TABLE `keke_witkey_finance` (
  `fina_id` int(11) NOT NULL AUTO_INCREMENT,
  `fina_type` char(10) DEFAULT '0',
  `fina_action` char(20) DEFAULT NULL,
  `order_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(10) DEFAULT NULL,
  `fina_cash` decimal(10,2) DEFAULT '0.00',
  `user_balance` decimal(10,2) DEFAULT '0.00',
  `fina_credit` decimal(10,2) DEFAULT NULL,
  `user_credit` decimal(10,2) DEFAULT NULL,
  `fina_source` char(20) DEFAULT NULL,
  `fina_time` int(11) DEFAULT '0',
  `recharge_cash` decimal(10,2) DEFAULT NULL,
  `site_profit` decimal(10,2) DEFAULT NULL,
  `unique_num` char(10) DEFAULT NULL,
  `is_trust` int(1) DEFAULT '0',
  `trust_type` char(20) DEFAULT NULL,
  PRIMARY KEY (`fina_id`),
  KEY `index_1` (`fina_id`),
  KEY `index_2` (`order_id`),
  KEY `index_3` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_finance
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_industry`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_industry`;
CREATE TABLE `keke_witkey_industry` (
  `indus_id` int(11) NOT NULL AUTO_INCREMENT,
  `indus_pid` int(11) DEFAULT '0',
  `indus_name` varchar(100) DEFAULT NULL,
  `is_recommend` int(11) DEFAULT NULL,
  `indus_type` int(11) DEFAULT '1',
  `listorder` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  `list_type` varchar(20) DEFAULT NULL,
  `list_tpl` varchar(20) DEFAULT NULL,
  `indus_intro` varchar(200) DEFAULT NULL,
  `list_desc` text,
  PRIMARY KEY (`indus_id`),
  KEY `indus_id` (`indus_id`),
  KEY `indus_pid` (`indus_pid`)
) ENGINE=MyISAM AUTO_INCREMENT=377 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_industry
-- ----------------------------
INSERT INTO keke_witkey_industry VALUES ('1', '0', 'Ʒ�����', '0', '1', '1', '1332569948', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('2', '0', '��վ����', '0', '1', '3', '1332569953', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('3', '0', '�İ�д��', '0', '1', '16', '1332569944', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('229', '218', 'Palm���', '0', '1', '9', '1292554457', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('228', '218', '��ݮ���', '0', '1', '6', '1292554432', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('8', '1', '��־���', '1', '1', '0', '1324288313', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('9', '1', 'VI���', '1', '1', '0', '1324288332', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('10', '1', '��Ƭ���', '1', '1', '0', '1324288376', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('11', '1', '�������', '0', '1', '0', '1324288546', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('12', '2', '������ҳ', '0', '1', '0', '1324288827', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('13', '1', '��ͨ���', '0', '1', '0', '1324086640', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('14', '1', '�������', '0', '1', '0', '1324288851', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('16', '1', '������', '0', '1', '0', '1324086655', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('121', '0', '�������', '0', '1', '4', '1332569956', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('26', '2', '��վ����', '0', '1', '0', '1326079168', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('27', '2', '��վ����', '0', '1', '0', '1292549118', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('28', '2', '��վģ��', '0', '1', '0', '1292549137', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('29', '2', '��Դ�޸�', '0', '1', '32', '1326087725', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('30', '2', '��վ���', '0', '1', '0', '1292549182', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('31', '2', '��ҳ����', '1', '1', '0', '1292549199', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('32', '2', '�̳ǿ���', '1', '1', '0', '1292549217', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('33', '2', '���ݿ����', '1', '1', '30', '1292549237', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('34', '2', '�ӿڲ���', '1', '1', '0', '1292549255', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('35', '2', '������ϵͳ', '1', '1', '31', '1292549279', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('36', '121', '���򿪷�', '1', '1', '0', '1292549438', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('37', '121', '��д�ű�', '1', '1', '0', '1292549500', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('38', '121', '���Ƥ��', '1', '1', '0', '1292549533', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('39', '121', '�������', '1', '1', '0', '1292549558', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('40', '2', '����', '1', '1', '100', '0', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('41', '3', '��������', '1', '1', '0', '1292551396', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('42', '3', '�����д��', '1', '1', '0', '1292551430', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('43', '3', '�߻�', '1', '1', '0', '1292551453', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('44', '3', 'д����', '1', '1', '0', '1292551482', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('45', '3', '�༭У��', '1', '1', '0', '1292551502', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('46', '3', 'д����', '0', '1', '0', '1292551528', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('47', '3', '��Ʒ˵��', '0', '1', '0', '1292551569', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('48', '3', '�籾�ű�', '0', '1', '0', '1292551594', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('49', '3', 'д��', '0', '1', '0', '1292551633', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('50', '3', '׫д����', '0', '1', '0', '1292551666', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('51', '3', 'Ӧ����д��', '0', '1', '0', '1292551705', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('52', '3', '�ݽ���', '0', '1', '0', '1292551734', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('169', '167', 'FLASH', '0', '1', '1', '1326087790', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('167', '0', '��ý�����', '1', '1', '11', '1326256844', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('57', '3', '����', '0', '1', '0', '0', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('227', '218', 'Windows mobile���', '0', '1', '5', '1292554412', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('226', '218', 'PalmOS���', '0', '1', '30', '1292554374', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('225', '218', 'Symbian SDK���', '0', '1', '2', '1292554348', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('223', '218', 'iOS���', '0', '1', '3', '1292554295', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('222', '218', 'Android���', '0', '1', '1', '1292554274', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('336', '335', '�·�װ��', '1', '1', '1', '1326088071', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('219', '218', '������', '0', '1', '4', '1292554146', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('218', '0', '�ƶ�Ӧ��', '0', '1', '30', '1292556202', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('217', '211', '�ʾ����', '0', '1', '0', '1292554039', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('216', '211', '�������', '0', '1', '0', '1292553967', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('215', '211', 'д����', '0', '1', '0', '1292553942', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('214', '211', '��������', '0', '1', '0', '1292553913', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('213', '211', '�ռ������', '0', '1', '0', '1292553863', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('212', '211', '�߻�', '0', '1', '0', '1292553842', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('211', '0', 'ͷ�Է籩', '1', '1', '18', '1326259260', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('236', '234', '������ѯ', '0', '1', '0', '1292554638', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('235', '234', 'Ƹ����ʦ', '0', '1', '0', '1292554609', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('234', '0', '���ɷ���', '0', '1', '19', '1292556230', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('233', '218', '�ֻ�Ӧ�ú���', '0', '1', '13', '1292554545', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('232', '218', '�ֻ�Ӧ�ô���', '0', '1', '11', '1292554522', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('231', '218', '�ֻ���Ϸ����', '0', '1', '8', '1292554501', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('230', '218', 'Amazon kindle���', '0', '1', '7', '1292554478', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('96', '249', '���δ���', '1', '1', '0', '1326091312', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('122', '121', '�������', '0', '1', '0', '1292549609', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('123', '121', '��Ϸ����', '0', '1', '0', '1292549642', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('125', '125', '��װ���', '0', '1', '0', '1324288915', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('126', '126', '�������', '0', '1', '0', '1324288992', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('127', '127', '��Ƭ���', '0', '1', '2', '1324289089', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('128', '128', 'ͼƬ�༭', '0', '1', '0', '1324289111', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('129', '129', '��Ʒ���', '0', '1', '0', '1324289132', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('130', '1', '�������', '0', '1', '1', '1326078327', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('131', '1', '�ؿ����', '0', '1', '2', '1326078338', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('132', '1', '��Ʒ���', '0', '1', '3', '1326078346', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('133', '1', 'QQ����', '0', '1', '22', '1292549906', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('134', '1', '�ĸ�����', '0', '1', '4', '1326078355', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('135', '1', '�������', '0', '1', '5', '1326078363', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('136', '1', '�Ű����', '0', '1', '6', '1326078371', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('137', '1', '�������', '0', '1', '7', '1326078379', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('138', '1', 'ppt���', '0', '1', '100', '1326078722', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('139', '1', 'T�����', '0', '1', '0', '1292550094', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('140', '1', '̨�����', '0', '1', '8', '1326078388', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('141', '1', '��ͼ����', '0', '1', '0', '1292550202', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('142', '1', '��·���', '0', '1', '0', '1292550225', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('143', '1', '�ľ����', '0', '1', '0', '1292550247', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('144', '1', '��ҵ���', '0', '1', '0', '1292550272', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('145', '1', '��ťͼ��', '0', '1', '0', '1292550300', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('147', '167', '������', '0', '1', '8', '1292550405', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('148', '167', '�������', '0', '1', '4', '1292550489', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('149', '1', '���ݽ������', '0', '1', '200', '1292550886', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('150', '1', '��װ���', '0', '1', '0', '1292550918', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('151', '1', 'չ�����', '0', '1', '0', '1292550942', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('152', '1', '�칫װ��', '0', '1', '0', '1292550977', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('153', '1', '԰�־���', '0', '1', '0', '1292551003', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('154', '167', '����ȡ��', '0', '1', '5', '1292550671', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('155', '167', '����ģ��', '0', '1', '6', '1292550700', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('156', '167', '������Ӱ', '0', '1', '7', '1326091215', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('158', '1', '����ǽ���', '0', '1', '20', '1292550817', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('159', '1', '����װ��', '0', '1', '0', '1292550854', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('160', '0', '����ȡ��', '0', '1', '19', '1292556019', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('161', '160', '��������', '0', '1', '0', '1292551095', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('162', '160', '��������', '0', '1', '0', '1292551118', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('163', '160', '��˾����', '0', '1', '0', '1292551152', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('164', '160', '��������', '0', '1', '0', '1292551193', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('165', '160', 'Ʒ������', '0', '1', '0', '1292551246', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('166', '160', '����', '0', '1', '0', '1292551260', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('170', '167', '��Ƶ����', '0', '1', '9', '1292552050', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('172', '167', '��ά��Ⱦ', '0', '1', '11', '1292552099', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('175', '0', '����Ӫ��', '1', '1', '30', '1326259251', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('177', '175', '���������Ż�', '0', '1', '0', '1292552302', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('178', '175', '��̳�ƹ�', '0', '1', '0', '1292552348', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('179', '175', 'QQȺ�ƹ�', '0', '1', '0', '1292552376', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('180', '175', '�����ƹ�', '0', '1', '0', '1292552410', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('181', '175', '�ƹ�ע��', '0', '1', '0', '1292552445', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('182', '0', '�������', '1', '1', '9', '1326256832', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('183', '182', 'Ӣ�﷭��', '0', '1', '1', '1292552549', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('184', '182', '���﷭��', '0', '1', '4', '1292552565', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('185', '182', '���﷭��', '0', '1', '3', '1292552583', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('186', '182', '���﷭��', '0', '1', '2', '1292552604', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('187', '182', '�������﷭��', '0', '1', '5', '1292552632', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('188', '182', '������﷭��', '0', '1', '6', '1292552657', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('189', '182', '�������﷭��', '0', '1', '8', '1292552698', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('190', '182', '���﷭��', '0', '1', '7', '1292552726', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('191', '182', '���﷭��', '0', '1', '9', '1292552760', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('192', '0', '�������', '0', '1', '25', '1292556114', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('193', '192', '�г�����', '0', '1', '0', '1292552891', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('194', '192', '������ѯ', '0', '1', '0', '1292552932', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('195', '192', '������ѯ', '0', '1', '0', '1292552957', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('196', '192', '�����ѯ', '0', '1', '0', '1292553000', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('197', '192', '����ͶƱ', '0', '1', '0', '1292553035', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('198', '192', '�����Ŷ�', '0', '1', '0', '1292553065', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('199', '192', '��������', '0', '1', '0', '1292553095', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('200', '192', '���ݵ���', '0', '1', '0', '1292553126', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('201', '0', '����ף��', '0', '1', '13', '1332569940', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('202', '201', '����ף��', '0', '1', '2', '1292553296', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('203', '201', '������', '1', '1', '1', '1326080754', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('204', '201', 'ʥ��ף��', '0', '1', '3', '1292553343', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('205', '201', '����ף��', '0', '1', '4', '1292553378', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('206', '201', '��Ǹ����', '0', '1', '9', '1292553406', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('207', '201', '������ף��', '1', '1', '8', '1326080770', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('208', '201', '�ж�����', '0', '1', '7', '1292553475', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('209', '201', 'ף��ϲ�ù���', '0', '1', '5', '1292553507', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('210', '201', 'ף����Ǩ�¾�', '0', '1', '6', '1292553556', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('237', '234', 'д���ɺ�ͬ', '0', '1', '0', '1292554661', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('238', '234', 'д��ʦ��', '0', '1', '0', '1292554683', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('239', '234', 'д����״', '0', '1', '0', '1292554712', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('240', '0', '��Ƹ����', '0', '1', '40', '1292556254', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('241', '240', '��Ƹ', '0', '1', '0', '1292554785', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('242', '240', '��ְ', '0', '1', '0', '1292554817', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('243', '240', 'Ѱ��', '0', '1', '0', '1292554925', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('244', '243', '�Ҷ���', '0', '1', '0', '1292554951', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('245', '240', '��������', '0', '1', '0', '1292554973', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('246', '240', '�ҿͻ�', '0', '1', '0', '1292554993', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('247', '240', '�ҹ�Ӧ��', '0', '1', '0', '1292555016', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('248', '240', '������', '0', '1', '0', '1292555036', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('249', '0', '���η���', '0', '1', '14', '1292556272', '0', '0', '', '0');
INSERT INTO keke_witkey_industry VALUES ('250', '249', '�ֻ���Ϸ', '0', '1', '0', '1292555192', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('251', '249', '��Ϸ����', '0', '1', '0', '1292555216', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('252', '249', '���ⱨ��', '0', '1', '0', '1292555239', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('253', '249', '�汾���', '0', '1', '0', '1292555270', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('254', '249', '����߻�', '0', '1', '0', '1292555293', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('255', '249', 'ѹ������', '0', '1', '0', '1292555312', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('256', '249', '��д����', '0', '1', '0', '1292555335', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('257', '249', '��߻�', '0', '1', '0', '1292555359', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('258', '249', '��������', '0', '1', '0', '1292555388', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('259', '249', '��Ϸ��Ƶ', '0', '1', '0', '1292555405', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('290', '290', '�����ӹ�����', '0', '1', '0', '1324261141', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('263', '1', '����', '0', '1', '40', '1292555839', '0', '0', '0', '0');
INSERT INTO keke_witkey_industry VALUES ('310', '26', 'php����', null, '1', '1', '1325059180', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('323', '2', '��վ�ƹ�', '1', '1', '0', '1326079286', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('324', '121', '�������', '1', '1', '0', '1326079451', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('325', '121', '�����ܿ���', '0', '1', '2', '1326079476', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('326', '121', '�������', '0', '1', '0', '1326079503', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('327', '121', '�����ĵ���д', '0', '1', '0', '1326079573', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('328', '121', '��������', '0', '1', '0', '1326079657', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('334', '240', '�������', '1', '1', '0', '1326087903', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('330', '201', '�����ʹ�', '0', '1', '0', '1326079936', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('331', '201', '����', '0', '1', '30', '1326079987', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('332', '249', '�ʾ����', '0', '1', '0', '1326080222', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('337', '335', '���ַ�װ��', '1', '1', '2', '1326088083', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('335', '0', '����/װ��', '1', '1', '17', '1326088053', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('333', '182', '���ķ���', '1', '1', '15', '1326081016', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('338', '335', '��ˮ��ѯ', '0', '1', '4', '1326088094', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('339', '335', 'װ�޼���', '0', '1', '8', '1326088103', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('340', '335', 'ͥԺ�������', '0', '1', '3', '1326088114', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('341', '335', '�칫����װ��', '1', '1', '6', '1326088123', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('342', '335', '�Խ������', '0', '1', '10', '1326088131', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('343', '335', '�������', '0', '1', '12', '1326088142', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('344', '335', '3Dģ�����', '0', '1', '14', '1326088150', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('348', '1', 'logo���', null, '1', '0', '1329450844', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('349', '1', 'vi���', null, '1', '0', '1329450844', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('350', '0', '��Ƭ����/�༭', '1', '1', '18', '1329451426', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('351', '350', '�����մ���', null, '1', '1', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('352', '350', '��Ƭ�俨ͨ', null, '1', '2', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('353', '350', '�������', null, '1', '3', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('354', '350', '��Ƭ����', null, '1', '4', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('355', '350', '��ɴ������', null, '1', '5', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('356', '350', 'ͼƬ�༭', null, '1', '6', '1329451052', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('357', '0', 'Ӱ��/����/���', '1', '1', '19', '1329451198', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('358', '357', 'д�籾', null, '1', '1', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('359', '357', 'Ӱ������', null, '1', '2', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('360', '357', '�������', null, '1', '3', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('361', '357', 'Ӱ������', null, '1', '4', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('362', '357', '��������', null, '1', '5', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('363', '357', '��������', null, '1', '6', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('364', '357', '��������', null, '1', '7', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('365', '357', '��������', null, '1', '8', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('366', '357', '��������', null, '1', '9', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('367', '357', '��ʴ���', null, '1', '10', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('368', '357', '�������', null, '1', '11', '1329451335', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('370', '1', '��Ϸ����', null, '1', '0', '1330410030', null, null, null, null);
INSERT INTO keke_witkey_industry VALUES ('376', '1', 'leeţ�п�', '0', '1', '0', '1330411423', null, null, null, null);

-- ----------------------------
-- Table structure for `keke_witkey_link`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_link`;
CREATE TABLE `keke_witkey_link` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_type` int(11) DEFAULT NULL,
  `link_name` varchar(100) DEFAULT NULL,
  `link_url` varchar(100) DEFAULT NULL,
  `link_pic` varchar(100) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `link_status` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `on_time` (`on_time`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_link
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_mark`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark`;
CREATE TABLE `keke_witkey_mark` (
  `mark_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` char(20) DEFAULT '0',
  `origin_id` int(11) DEFAULT NULL,
  `obj_id` int(11) DEFAULT '0',
  `obj_cash` decimal(10,0) DEFAULT NULL,
  `mark_status` int(11) DEFAULT '0',
  `mark_content` text,
  `mark_time` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(20) DEFAULT NULL,
  `mark_max_time` int(11) DEFAULT '0',
  `by_uid` int(11) DEFAULT '0',
  `by_username` varchar(20) DEFAULT NULL,
  `aid` varchar(50) DEFAULT NULL,
  `aid_star` varchar(50) DEFAULT NULL,
  `mark_value` decimal(10,2) DEFAULT '0.00',
  `mark_type` int(1) DEFAULT NULL,
  PRIMARY KEY (`mark_id`),
  KEY `index_3` (`uid`),
  KEY `index_4` (`obj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_mark_aid`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_aid`;
CREATE TABLE `keke_witkey_mark_aid` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `aid_name` varchar(255) DEFAULT NULL,
  `aid_type` int(1) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark_aid
-- ----------------------------
INSERT INTO keke_witkey_mark_aid VALUES ('1', '�����ٶ�', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('2', '��������', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('3', '����̬��', '2');
INSERT INTO keke_witkey_mark_aid VALUES ('4', '���ʱ��', '1');
INSERT INTO keke_witkey_mark_aid VALUES ('5', '��������', '1');

-- ----------------------------
-- Table structure for `keke_witkey_mark_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_config`;
CREATE TABLE `keke_witkey_mark_config` (
  `mark_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj` char(20) DEFAULT NULL,
  `good` int(3) DEFAULT NULL,
  `normal` int(3) DEFAULT NULL,
  `bad` int(3) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`mark_config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark_config
-- ----------------------------
INSERT INTO keke_witkey_mark_config VALUES ('2', 'sreward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('3', 'mreward', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('4', 'mreward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('5', 'preward', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('6', 'preward', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('7', 'dtender', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('8', 'dtender', '100', '50', '1', '1');
INSERT INTO keke_witkey_mark_config VALUES ('9', 'tender', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('10', 'tender', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('11', 'goods', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('12', 'goods', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('13', 'service', '100', '50', '0', '1');
INSERT INTO keke_witkey_mark_config VALUES ('14', 'service', '100', '50', '0', '2');
INSERT INTO keke_witkey_mark_config VALUES ('1', 'sreward', '100', '50', '0', '1');

-- ----------------------------
-- Table structure for `keke_witkey_mark_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_mark_rule`;
CREATE TABLE `keke_witkey_mark_rule` (
  `mark_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `g_value` int(11) DEFAULT NULL,
  `m_value` int(11) DEFAULT NULL,
  `g_title` varchar(50) DEFAULT NULL,
  `m_title` varchar(50) DEFAULT NULL,
  `g_ico` varchar(200) DEFAULT NULL,
  `m_ico` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mark_rule_id`),
  KEY `index_1` (`mark_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_mark_rule
-- ----------------------------
INSERT INTO keke_witkey_mark_rule VALUES ('1', '200', '200', 'һ������', 'һ������', 'data/uploads/sys/mark/120594f3b07e5c4215.gif?fid=2066', 'data/uploads/sys/mark/309044f3b07ef87c95.gif?fid=2067');
INSERT INTO keke_witkey_mark_rule VALUES ('2', '500', '500', '��������', '��������', 'data/uploads/sys/mark/98734f3b080f7c2ee.gif?fid=2068', 'data/uploads/sys/mark/189344f3b081362561.gif?fid=2069');
INSERT INTO keke_witkey_mark_rule VALUES ('3', '1000', '1000', '��������', '��������', 'data/uploads/sys/mark/98544f3b082a11c00.gif?fid=2070', 'data/uploads/sys/mark/306874f3b082e22fc3.gif?fid=2071');
INSERT INTO keke_witkey_mark_rule VALUES ('4', '2000', '2000', '�ļ�����', '�ļ�����', 'data/uploads/sys/mark/140154f3b084cba568.gif?fid=2072', 'data/uploads/sys/mark/126844f3b085182758.gif?fid=2073');
INSERT INTO keke_witkey_mark_rule VALUES ('5', '3000', '3000', '�弶����', '�弶����', 'data/uploads/sys/mark/262274f3b086f5cbfe.gif?fid=2074', 'data/uploads/sys/mark/228324f3b0872c6f04.gif?fid=2075');
INSERT INTO keke_witkey_mark_rule VALUES ('6', '3500', '3500', '��������', '��������', 'data/uploads/sys/mark/188574f3b088a50adf.gif?fid=2076', 'data/uploads/sys/mark/28624f3b088d957db.gif?fid=2077');

-- ----------------------------
-- Table structure for `keke_witkey_member`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member`;
CREATE TABLE `keke_witkey_member` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `rand_code` char(6) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member
-- ----------------------------
INSERT INTO keke_witkey_member VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '3msyue', 'admin@admin.com');

-- ----------------------------
-- Table structure for `keke_witkey_member_bank`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_bank`;
CREATE TABLE `keke_witkey_member_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `real_name` char(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `card_id` char(20) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `bank_address` varchar(150) DEFAULT NULL,
  `bank_sub_name` varchar(100) DEFAULT NULL,
  `card_num` char(20) DEFAULT NULL,
  `bank_type` int(1) DEFAULT NULL,
  `bind_status` int(1) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`bank_id`),
  KEY `bank_id` (`bank_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_bank
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_black`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_black`;
CREATE TABLE `keke_witkey_member_black` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `expire` int(10) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`b_id`),
  KEY `b_id` (`b_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_black
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_ext`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_ext`;
CREATE TABLE `keke_witkey_member_ext` (
  `ext_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `k` varchar(50) DEFAULT NULL,
  `v1` varchar(255) DEFAULT NULL,
  `v2` varchar(255) DEFAULT NULL,
  `v3` varchar(255) DEFAULT NULL,
  `v4` varchar(255) DEFAULT NULL,
  `v5` varchar(255) DEFAULT NULL,
  `type` char(20) DEFAULT NULL,
  PRIMARY KEY (`ext_id`),
  KEY `ext_id` (`ext_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_ext
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_group`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_group`;
CREATE TABLE `keke_witkey_member_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(20) DEFAULT NULL,
  `group_roles` text,
  `on_time` int(10) DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_group
-- ----------------------------
INSERT INTO keke_witkey_member_group VALUES ('3', '������Ա', '139,31,3,27,76,5,33,36,34,37,35,53,52,m714', '1325037462');
INSERT INTO keke_witkey_member_group VALUES ('7', '�ͷ�', '136', '1321261979');
INSERT INTO keke_witkey_member_group VALUES ('2', '��Χ�ͷ�', '31,3,4,27,76,5', '1324285254');
INSERT INTO keke_witkey_member_group VALUES ('1', '��ʼ��', '138,139,31,3,4,27,76,5,10,11,33,13,12,36,78,79,38,68,69,70,77,71,80,81,82,133,134,136,135,137,59,60,58,61,34,1,23,2,37,35,41,6,7,24,8,63,66,67,73,20,17,18,19,21,28,29,57,30,32,16,15,14,22,45,44,43,42,53,54,52,9,40,m10,m11,m22,m23,m34,m35,m46,m47,m58,m59,m610,m611,m612,m713,m714,m715', '1324449757');

-- ----------------------------
-- Table structure for `keke_witkey_member_oauth`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_oauth`;
CREATE TABLE `keke_witkey_member_oauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` char(20) DEFAULT NULL,
  `account` varchar(50) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `on_time` int(10) DEFAULT NULL,
  `oauth_id` varchar(50) DEFAULT NULL,
  `bind_key` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_oauth
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_member_oltime`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_member_oltime`;
CREATE TABLE `keke_witkey_member_oltime` (
  `oltime_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `user_status` tinyint(4) DEFAULT NULL,
  `last_op_time` int(11) DEFAULT NULL,
  `online_total_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`oltime_id`),
  KEY `oltime_id` (`oltime_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_member_oltime
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_model`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_model`;
CREATE TABLE `keke_witkey_model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` varchar(20) DEFAULT NULL,
  `model_name` varchar(20) DEFAULT NULL,
  `model_dir` varchar(20) DEFAULT NULL,
  `model_type` char(10) DEFAULT NULL,
  `model_dev` varchar(20) DEFAULT NULL,
  `model_status` int(11) DEFAULT NULL,
  `model_desc` text,
  `on_time` int(11) DEFAULT NULL,
  `hide_mode` int(11) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `model_intro` varchar(50) DEFAULT NULL,
  `indus_bid` text,
  `config` text,
  PRIMARY KEY (`model_id`),
  KEY `model_id` (`model_id`),
  KEY `on_time` (`on_time`),
  KEY `model_status` (`model_status`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_model
-- ----------------------------
INSERT INTO keke_witkey_model VALUES ('2', 'mreward', '��������', 'mreward', 'task', 'kekezu', '1', '&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ��������������ָ���ڷ�������ʱ���Ƚ������ͽ�ȫ���йܵ�ƽ̨���ٴӽ�����ѡ������ĸ�����񡣸����������Ϊ������������ʱ���õĽ�������Ŀ��һ�Ƚ������Ƚ������Ƚ����ܺͣ�,���߽�������Լ��Ľ���������ȡ��Ӧ���ͽ�&lt;br /&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;strong&gt;�������������һ�������ǣ�&lt;/strong&gt;&lt;br /&gt;1��������������Ὣ��Ӧ���������йܵ���վƽ̨��&lt;br /&gt;2���ڶ����Ͳ��������ύ�������ȴ�����ѡ�񷽰���&lt;br /&gt;3����������ݷ��������ӣ�������Ӧ�ĸ�������������磺һ�Ƚ������Ƚ��ȣ���&lt;br /&gt;4���������佱������ѡ���ڽ������������빫ʾ�ڣ��ڸ�ʱ�����Ϳ�������Ӧ����Ȩ�ޣ�һ����ʾ�ڽ�����ƽ̨����񽱵�����֧���ͽ�ƽ̨���һ���ı�����������������ж���Ľ�ƽ̨�Ὣ����Ľ�����������ƽ̨���һ���ı�������&lt;p&gt;&lt;/p&gt;', '1335333283', '0', '2', '�������������ǰ������ڸ������л񽱵���������ȡ֧�������һ������ģʽ��', '', 'a:13:{s:10:\"audit_cash\";s:2:\"10\";s:8:\"min_cash\";s:1:\"2\";s:9:\"task_rate\";s:2:\"20\";s:14:\"task_fail_rate\";s:2:\"10\";s:10:\"end_action\";s:5:\"split\";s:8:\"defeated\";s:1:\"1\";s:13:\"notice_period\";s:1:\"3\";s:7:\"min_day\";s:1:\"1\";s:11:\"vote_period\";s:1:\"2\";s:11:\"choose_time\";s:1:\"4\";s:11:\"open_select\";s:4:\"open\";s:14:\"min_delay_cash\";s:1:\"2\";s:9:\"max_delay\";s:1:\"2\";}');
INSERT INTO keke_witkey_model VALUES ('3', 'preward', '�Ƽ�����', 'preward', 'task', 'kekezu', '1', '�Ƽ����������һ�������ǣ�&lt;br /&gt;1���������������������йܵ���վƽ̨&lt;br /&gt;2���ڶ����Ͳ��벢�ύ����&lt;br /&gt;3������ѡ�����ⷽ�������÷����б�״̬&lt;br /&gt;4�������б귢���ͽ�&lt;br /&gt;', '1335333322', '0', '3', '�Ƽ�����������������ɵ����������֧�������һ������ģʽ��������ģʽ�ʺϼ��������Ƚϵͣ�����΢��', '344,330,203,202,204,205,209,210,208,207,206,331', 'a:14:{s:10:\"audit_cash\";s:3:\"100\";s:8:\"min_cash\";s:2:\"10\";s:9:\"task_rate\";s:2:\"20\";s:8:\"defeated\";s:1:\"1\";s:14:\"task_fail_rate\";s:2:\"10\";s:7:\"min_day\";s:1:\"2\";s:11:\"choose_time\";s:1:\"1\";s:8:\"mark_day\";s:1:\"1\";s:11:\"open_select\";s:4:\"open\";s:14:\"min_delay_cash\";s:1:\"0\";s:9:\"max_delay\";s:1:\"5\";s:12:\"work_percent\";s:3:\"100\";s:15:\"is_auto_adjourn\";s:1:\"1\";s:11:\"adjourn_num\";s:1:\"1\";}');
INSERT INTO keke_witkey_model VALUES ('4', 'tender', '��ͨ�б�', 'tender', 'task', 'kekezu', '1', '<p>��ͨ�б꣬����ѡ���б��ߺ󣬽�������������ɣ�����ȷ�Ϻ�������ɣ������б꣬��վֻ��ȡ�̶��ķ������,</p><p>��ͨ�б꽫��������˫��������ֵ��������ֵ<br /></p><br />', '1325150155', '0', '4', '��ͨ�б꣬��վ���й��б���������κξ�����վ������', '0', 'a:5:{s:8:\"zb_audit\";s:1:\"2\";s:7:\"zb_fees\";s:2:\"20\";s:11:\"zb_max_time\";s:2:\"30\";s:11:\"choose_time\";s:1:\"7\";s:11:\"open_select\";s:4:\"open\";}');
INSERT INTO keke_witkey_model VALUES ('5', 'dtender', '�����б�', 'dtender', 'task', 'kekezu', '1', '<div class=\"mod-top\"><div class=\"card-summary nslog-area\" data-nslog-type=\"72\"><div class=\"card-summary-content\"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; �����б���ָ�й����񶩽�ѡ��Ӧ���������������������͡��������ѡ�������������ķ�ʽ��������ȫ����������������Ʒ�˷ѵ�����<br /></p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; �����б����̽ϸ��ӣ���ʱ�ϳ�����Ч���Ϻ�������Ч��ֹթƭ���ر��ʺϴ���������ķ�����Щ������Կ���ʹ�ö����б꣺VI/SI�ȴ��������Ŀ�����ڵĻ�������������ҳ�����ҳ��ƣ�������־��ƣ���վ���򿪷����������������Ƶ����/��������Ƶ��Ƭ�����ͷ��롭�� <br /></p><p>��<strong>�������̣��������������б������й������󣬵ȴ��������μ��������Ϳ���ͨ�������ȷ�ʽ�鿴���ö����б����񣬲�����������������������������������鿴�������������ķ����󣬼��������ύ�˷���������д�����ͬ��˫���������ͬЭ��������󣬼���ȷ���ú�ͬ��Ч������������ʵʩ�׶Ρ����ڷ��������ͽ𡣶����б�����ɹ�����</strong>��<br /></p></div></div></div><br />', '1326858482', '0', '5', '�����б������ǲ���ѡ�������������ķ�ʽ��������ȫ����������������Ʒ�˷ѵ�����', '0', 'a:10:{s:7:\"deposit\";s:3:\"100\";s:9:\"task_rate\";s:2:\"20\";s:14:\"task_fail_rate\";s:1:\"9\";s:8:\"defeated\";s:1:\"2\";s:8:\"bid_time\";s:1:\"2\";s:11:\"select_time\";s:1:\"2\";s:14:\"pay_limit_time\";s:1:\"2\";s:10:\"open_audit\";s:5:\"close\";s:11:\"open_select\";s:4:\"open\";s:7:\"on_time\";s:10:\"1332992835\";}');
INSERT INTO keke_witkey_model VALUES ('6', 'goods', '������Ʒ', 'goods', 'shop', 'kekezu', '1', '&lt;strong&gt;������Ʒ��һ�������ǣ�&lt;/strong&gt;&lt;br /&gt;&lt;p&gt;1���������վƽ̨���ϴ���Ʒ���ȴ���̨���&lt;/p&gt;&lt;p&gt;2�����ͨ���󣬸���Ʒ�ͻ��ϼܣ�����վ�̳�����ʾ&lt;/p&gt;&lt;p&gt;3�����ҹ�����Ʒ�󣬸���&lt;/p&gt;&lt;p&gt;4������󣬵ȴ�����ṩ����&lt;/p&gt;&lt;p&gt;5������ȷ�Ϸ������Ҽ��ɵõ���Ӧ�ķ�����&lt;/p&gt;&lt;p&gt;������׹����в����⣬���������ٲ�&lt;br /&gt;&lt;/p&gt;&lt;br /&gt;', '1336189964', '0', '6', '������Ʒ�������̳ǵ�һ�ֽ���ģʽ��666', '', 'a:4:{s:10:\"audit_cash\";s:1:\"2\";s:8:\"min_cash\";s:1:\"1\";s:14:\"service_profit\";s:1:\"1\";s:13:\"max_filecount\";s:1:\"1\";}');
INSERT INTO keke_witkey_model VALUES ('7', 'service', '���ͷ���', 'service', 'shop', 'kekezu', '1', '&lt;strong&gt;������Ʒ��һ�������ǣ�&lt;/strong&gt;&lt;br /&gt;&lt;p&gt;1���������վƽ̨���ϴ����񣬵ȴ���̨���&lt;/p&gt;&lt;p&gt;2�����ͨ���󣬸÷���ͻ��ϼܣ�����վ�̳�����ʾ&lt;/p&gt;&lt;p&gt;3�����ҹ������󣬸���&lt;/p&gt;&lt;p&gt;4������󣬵ȴ�����ṩ����111&lt;/p&gt;&lt;br /&gt;', '1336189037', '0', '7', '���ͷ����������̳ǵ�һ�ֽ���ģʽ', '0', 'a:3:{s:14:\"service_profit\";s:2:\"23\";s:8:\"min_cash\";s:1:\"5\";s:10:\"audit_cash\";s:2:\"67\";}');
INSERT INTO keke_witkey_model VALUES ('1', 'sreward', '��������', 'sreward', 'task', 'kekezu', '1', '&lt;p&gt;&nbsp;&nbsp;&nbsp;&nbsp;&lt;strong&gt; �������ͳ����ڷ���һЩʱ��̣���Ҫ�����͵�����������������������������������վlogo���ؿ���ƣ������Ŷ����ȣ�д�����߻���ȵȡ�&lt;/strong&gt;&lt;/p&gt;', '1337587842', '0', '1', '�������ͳ����ڷ���һЩʱ��̣���Ҫ�����͵�����������������������������������վlogo���ؿ����', '', 'a:17:{s:10:\"audit_cash\";s:3:\"100\";s:8:\"min_cash\";s:2:\"50\";s:9:\"task_rate\";s:1:\"2\";s:14:\"task_fail_rate\";s:1:\"2\";s:10:\"end_action\";s:5:\"split\";s:10:\"witkey_num\";s:1:\"1\";s:8:\"defeated\";s:1:\"1\";s:13:\"notice_period\";s:1:\"2\";s:7:\"min_day\";s:1:\"2\";s:11:\"vote_period\";s:1:\"2\";s:14:\"reg_vote_limit\";s:1:\"2\";s:11:\"choose_time\";s:1:\"2\";s:11:\"open_select\";s:4:\"open\";s:14:\"min_delay_cash\";s:1:\"2\";s:9:\"max_delay\";s:1:\"2\";s:15:\"agree_sign_time\";s:1:\"1\";s:19:\"agree_complete_time\";s:1:\"2\";}');

-- ----------------------------
-- Table structure for `keke_witkey_msg`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg`;
CREATE TABLE `keke_witkey_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_pid` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `to_uid` int(11) DEFAULT NULL,
  `to_username` varchar(50) DEFAULT NULL,
  `msg_status` tinyint(4) DEFAULT '0',
  `view_status` tinyint(4) DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`msg_id`),
  KEY `msg_pid` (`msg_pid`),
  KEY `on_time` (`on_time`),
  KEY `recive_uid` (`to_uid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_msg
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_msg_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg_config`;
CREATE TABLE `keke_witkey_msg_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(30) DEFAULT NULL,
  `obj` char(20) DEFAULT NULL,
  `desc` varchar(30) DEFAULT NULL,
  `v` varchar(255) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_msg_config
-- ----------------------------
INSERT INTO keke_witkey_msg_config VALUES ('9', 'task_pub', 'task', '���񷢲�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('10', 'task_bid', 'task', '�����б�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('3', 'pay_success', 'found', '֧���ɹ�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('4', 'pay_fail', 'found', '֧��ʧ��', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('11', 'task_auth_fail', 'task', '���ʧ��', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('12', 'task_auth_success', 'task', '���ͨ��', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('5', 'draw_success', 'found', '���ֳɹ�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('2', 'freeze', 'user', '�û�����', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('13', 'task_freeze', 'task', '���񶳽�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('21', 'update_password', 'safe', '��������', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1322020124');
INSERT INTO keke_witkey_msg_config VALUES ('1', 'reg', 'user', 'ע��ɹ�', 'a:1:{s:8:\"send_sms\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('6', 'recharge_success', 'found', '��ֵ�ɹ�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('7', 'recharge_fail', 'found', '��ֵʧ��', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('20', 'update_sec_code', 'safe', '���İ�ȫ��', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('8', 'space_change', 'space', '�ռ���', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1332553672');
INSERT INTO keke_witkey_msg_config VALUES ('16', 'transrights_pass', 'trans', '����άȨ����', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('17', 'transrights_nopass', 'trans', '����άȨ������', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('18', 'transrights_accept', 'trans', '����άȨ����', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('19', 'transrights_freeze', 'trans', '����άȨ����', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('14', 'task_sign', 'task', '������', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('15', 'task_hand', 'task', '���񽻸�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('81', 'agreement', 'task', 'Э��ǩ��', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('82', 'agreement_file', 'task', 'Э���ļ�����', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('83', 'service_pub', 'service', '���񷢲�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('84', 'service_order', 'service', '���񶩵��ύ', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('99', 'unfreeze', 'user', '�û��ⶳ', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('88', 'order_change', 'service', '����״̬���', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('87', 'auto_choose', 'task', '�Զ�ѡ��', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('100', 'get_password', 'user', '�����һ�', 'a:2:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;}', '1321954987');
INSERT INTO keke_witkey_msg_config VALUES ('101', 'dispose_task', 'task', '�������', 'a:3:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;s:15:\"send_mobile_sms\";i:1;}', null);
INSERT INTO keke_witkey_msg_config VALUES ('102', 'task_unbid', 'task', '�����̭', 'a:3:{s:8:\"send_sms\";i:1;s:10:\"send_email\";i:1;s:15:\"send_mobile_sms\";i:1;}', '1339840532');
-- ----------------------------
-- Table structure for `keke_witkey_msg_tpl`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_msg_tpl`;
CREATE TABLE `keke_witkey_msg_tpl` (
  `tpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpl_code` varchar(30) DEFAULT '0',
  `content` text,
  `send_type` int(1) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`tpl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_msg_tpl
-- ----------------------------
INSERT INTO keke_witkey_msg_tpl VALUES ('1', 'reg', '<p>�𾴵� {�û���}��</p><p>&nbsp;��л����{��վ����}�����Σ������յ�����ŵ�ʱ�����Ѿ��ɹ�ע��Ϊ{��վ����}��Ա������������Ը��ܵ����š����á���Ч�����罻���Ļ���</p><p>�����κ����ʣ���ӭ��ʱ��������ϵ�����ǽ��߳�Ϊ������<br />&nbsp;&nbsp;&nbsp;�� ��ӭ������ע{��վ����}�� </p><p>&nbsp;&nbsp;&nbsp; ף��</p><p>��&nbsp; ����ѧϰ˳���� ������죡 </p><p>{��վ����}�ͷ�����</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('33', 'task_pub', '<p>�𾴵� {�û���}��</p><p>���������ѷ����ɹ�����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>�����ţ�{������}</p><p>������⣺{��������}</p>����״̬��{����״̬}<p>��ʼʱ�䣺{��ʼʱ��}</p><p>Ͷ�����ʱ�䣺{Ͷ�����ʱ��}</p><p>ѡ�����ʱ�䣺{ѡ�����ʱ��}<br /></p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('35', 'task_bid', '<p>�𾴵� {�û���}��</p><p>��ϲ���ɹ��б꣬��л����{��վ����}�������Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>�����ţ�{������}</p><p>������⣺{�������}</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('5', 'pay_success', '<p>�𾴵� {�û���}��</p><p>���ɹ���ֵ{��ֵ���}Ԫ����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('7', 'draw_success', '<p>����{��վ����}�����������ѱ������������ֽ��Ϊ{���ֽ��}������գ�</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('37', 'task_auth_success', '<p>�𾴵� {�û���}��</p><p>���ķ�����������ͨ����ˣ���л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>�����ţ�{������}</p><p>�������ӣ�{��������}</p><p>��ʼʱ�䣺{��ʼʱ��}</p><p>����ʱ�䣺{����ʱ��}</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('39', 'task_auth_fail', '<p>�𾴵� {�û���}��</p><p>���ķ��������� {�������} δͨ����ˣ���л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('4', 'freeze', '<p>�𾴵� {�û���}��</p><p>�����û��ѱ����ᣬ��л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('31', 'task_freeze', '<p>�𾴵� {�û���}��</p><p>��������<u>��{�������}��</u>�ѱ����ᣬ��л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('13', 'update_password', '<p>�𾴵� {�û���}��</p><p>���������Ѿ��޸ģ��������ǣ�<u>��{������}��</u>����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('2', 'reg', '�𾴵� {�û���}����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('34', 'task_pub', '�𾴵� {�û���}�����������ѷ����ɹ�����л����{��վ����}�����Ρ����������������ƽ�µ�ͷ���', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('36', 'task_bid', '<p>�𾴵� {�û���}����ϲ���ɹ��б꣬��л����{�û���}�������Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('6', 'pay_fail', '<p>�𾴵� {�û���}������ֵ{��ֵ���}Ԫҵ��ʧ�ܣ���л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('8', 'draw_success', '<p>����{��վ����}�����������ѱ������������ֽ��Ϊ{���ֽ��}������գ�</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('38', 'task_auth_success', '<p>�𾴵� {�û���}�����ķ�����������ͨ����ˣ���л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣�����ţ�{������}</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('40', 'task_auth_fail', '<p>�𾴵� {�û���}�����ķ��������� {�������} δͨ����ˣ���л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('3', 'freeze', '<p>�𾴵� {�û���}�������û��ѱ����ᣬ��л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('32', 'task_freeze', '<p>�𾴵� {�û���}����������<u>��{�������}��</u>�ѱ����ᣬ��л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('14', 'update_password', '<p>�𾴵� {�û���}�����������Ѿ��޸ģ��������ǣ�<u>��{������}��</u>����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('41', 'agreement', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{Э��״̬}��</p><p>Э�����ӣ�{Э������}</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('42', 'agreement', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('9', 'recharge_success', '<p>�𾴵� {�û���}��</p><p>���ĵ���Ϊ:{��ֵ����}�ĳ�ֵ����ɹ�����ֵ��{��ֵ���}����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('10', 'recharge_fail', '<p>�𾴵� {�û���}��</p><p>���ĵ���Ϊ:{��ֵ����}�ĳ�ֵ����ʧ�ܣ���л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p><br />', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('11', 'recharge_success', '<p></p><p>�𾴵� {�û���}��</p><p>���ĵ���Ϊ:{��ֵ����}�ĳ�ֵ����ɹ�����ֵ��{��ֵ���}����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p><br />', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('12', 'recharge_fail', '<p></p><p>�𾴵� {�û���}��</p><p>���ĵ���Ϊ:{��ֵ����}�ĳ�ֵ����ʧ�ܣ���л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('15', 'update_sec_code', '<p>�𾴵� {�û���}��</p><p>���İ�ȫ��ɹ��������°�ȫ��Ϊ��{��ȫ��}����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э</p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('16', 'update_sec_code', '<p></p><p>�𾴵� {�û���}��</p><p>���İ�ȫ��ɹ��������°�ȫ��Ϊ��{��ȫ��}����л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э</p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('17', 'space_change', '<p></p><p></p><p>�𾴵� {�û���}��</p><p>�������������Լ�����ҵ��֤��Ϣ�����Ŀռ䣺{�ռ���}���Ϊ�����˿ռ䡿���뾡�������ҵ��֤����ɺ����������û�������������Ϊ��ҵ�ռ䡣</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('18', 'space_change', '<p></p><p>�𾴵� {�û���}��</p><p>�������������Լ�����ҵ��֤��Ϣ�����Ŀռ䣺{�ռ���}���Ϊ�����˿ռ䡿���뾡�������ҵ��֤����ɺ����������û�������������Ϊ��ҵ�ռ䡣</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('19', 'transrights_pass', '<p></p><p></p><p>�𾴵� {�û���}��</p><p>������صı��Ϊ{����άȨ���}��{����άȨ����}��¼��վ�Ѿ�������ɣ�{����άȨ����}������Ϊ��</p><p>{������}</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('20', 'transrights_pass', '<p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>���ı��Ϊ{����άȨ���}��{����άȨ����}��¼��վ�Ѿ�������ɣ�{����άȨ����}������Ϊ��{������}</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('21', 'transrights_nopass', '<p></p><p></p><p>�𾴵� {�û���}��</p><p>������صı��Ϊ{����άȨ���}��{����άȨ����}��¼��վȷ��Ϊ��������ԭ���ǣ�</p><p>{������}</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('22', 'transrights_nopass', '<p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>���ı��Ϊ{����άȨ���}��{����άȨ����}��¼��վȷ��Ϊ��������ԭ���ǣ�</p><p>{������}</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('23', 'transrights_accept', '<p></p><p></p><p>�𾴵� {�û���}��</p><p>������صı��Ϊ{����άȨ���}��{����άȨ����}��¼��վȷ�Ѿ�������Ӧ{����άȨ����}{����άȨ����}�ѱ�{����}��</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('24', 'transrights_accept', '<p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>������صı��Ϊ{����άȨ���}��{����άȨ����}��¼��վȷ�Ѿ�������Ӧ{����άȨ����}{����άȨ����}�ѱ�{����}��</p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('25', 'transrights_freeze', '<p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>��{����}��{����άȨ����}�����άȨ��¼�Ѿ��ύ�ɹ�����Ӧ{����άȨ����}�ѱ����ᣬ��ȴ���վ�����ύԭ��</p><p>{�ύԭ��}<br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('26', 'transrights_freeze', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>��{����}��{����άȨ����}�����άȨ��¼�Ѿ��ύ�ɹ�����Ӧ{����άȨ����}�ѱ����ᣬ��ȴ���վ�����ύԭ��</p><p>{�ύԭ��}<br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('27', 'task_sign', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}������{��ν}��{�������}��</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('28', 'task_sign', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}������{��ν}��{�������}��</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('29', 'task_hand', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('30', 'task_hand', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('156', 'unfreeze', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>�����û��ѱ���⣬��л����{��վ����}�����Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('142', 'agreement_file', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>�û�{������}�Ѿ�{����}��</p><p>Э�����ӣ�{Э������}</p><p>Э��״̬��{Э��״̬}<br /></p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('143', 'agreement_file', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('144', 'service_pub', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>����{��������}�ѷ����ɹ���{��������}��Ϣ��</p><p>{��������}���ӣ�{��Ʒ����}</p><p>����ʱ�䣺{����ʱ��}<br /></p><p>{��������}״̬��{��Ʒ״̬}<br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('145', 'service_pub', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('146', 'service_order', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�����}������{��������}��{��������}���뾡��ǰ���û�����ȷ�ϡ�</p><p>�������ӣ�{��������}<br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p><br /></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('147', 'service_order', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('157', 'unfreeze', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('154', 'order_change', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}{����}���뾡��ǰ���û����Ĵ���������Ϣ��</p><p>������ţ�{�������}</p><p>�������ӣ�{��������}</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('155', 'order_change', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('152', 'auto_choose', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>�����������{������}�������Զ�ѡ�壬������Ϣ��</p><p>������⣺{�������}</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('153', 'auto_choose', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('158', 'get_password', '<p>�𾴵� {�û���}��</p><p>&nbsp;��л����{��վ����}�����Σ�����������Ϊ{����}����ȫ��Ϊ{��ȫ��}���뱣���������˺š�</p><p>�����κ����ʣ���ӭ��ʱ��������ϵ�����ǽ��߳�Ϊ������<br />&nbsp;&nbsp;&nbsp;�� ��ӭ������ע{��վ����}�� </p><p>&nbsp;&nbsp;&nbsp; ף��</p><p>��&nbsp; ����ѧϰ˳���� ������죡 </p><br />', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('159', 'get_password', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>{�û�}��{��ν}��{�������}�ύ�˸����</p><p><br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('160', 'dispose_task', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>������������Ѿ�������</p><p>�����ţ�{������}</p><p>�������ӣ�{��������}<br /></p><p>��л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><p></p><p></p><p></p><p></p><p></p><p></p>', '1', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('161', 'dispose_task', '<p></p><p>�𾴵� {�û���}��������������Ѿ������������ţ�{������}���������ӣ�{��������}����л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><br />', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('162', 'dispose_work', '<p></p><p>�𾴵� {�û���}��������������Ѿ�{����״̬}�������ţ�{������}���������ӣ�{��������}����л����{��վ����}�����Ρ�����������������µ�ͷ�</p><p></p><br />', '2', '0');
INSERT INTO keke_witkey_msg_tpl VALUES ('177', 'task_unbid', '<p></p><p></p><p></p><p>�𾴵� {�û���}��</p><p>�����������{�������}�����������ѱ�������̭����л����{��վ����}�������Ρ�����������������µ�ͷ������ǽ�Э����������⡣</p><p>�����ţ�{������}</p><p>--------------------------------------------------------------------------------------------------------------------</p><p>���ʼ�Ϊϵͳ�Զ��������ʼ�������ֱ�ӻظ���</p><br />', '1', '0');
-- ----------------------------
-- Table structure for `keke_witkey_nav`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_nav`;
CREATE TABLE `keke_witkey_nav` (
  `nav_id` int(11) NOT NULL AUTO_INCREMENT,
  `nav_url` varchar(200) DEFAULT NULL,
  `nav_title` varchar(20) DEFAULT NULL,
  `nav_style` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `newwindow` int(11) DEFAULT '0',
  `ishide` int(11) DEFAULT '0',
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_nav
-- ----------------------------
INSERT INTO keke_witkey_nav VALUES ('1', 'index.php', '��ҳ', 'index', '1', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('4', 'index.php?do=task', '�������', 'task', '2', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('5', 'index.php?do=shop', '�����̳�', 'shop', '3', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('6', 'index.php?do=article', '��Ѷ����', 'article', '4', '0', '0');
INSERT INTO keke_witkey_nav VALUES ('7', 'index.php?do=case', '�ɹ�����', 'case', '5', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_order`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order`;
CREATE TABLE `keke_witkey_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_name` varchar(150) DEFAULT NULL,
  `order_time` int(10) DEFAULT NULL,
  `order_amount` decimal(12,2) DEFAULT '0.00',
  `order_status` char(15) DEFAULT NULL,
  `order_body` varchar(200) DEFAULT NULL,
  `order_uid` int(11) DEFAULT NULL,
  `order_username` varchar(20) DEFAULT NULL,
  `seller_uid` int(11) DEFAULT NULL,
  `seller_username` varchar(30) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_order
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_order_charge`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order_charge`;
CREATE TABLE `keke_witkey_order_charge` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_type` varchar(20) DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT '0',
  `return_order_id` int(11) DEFAULT '0',
  `obj_id` int(11) DEFAULT '0',
  `uid` varchar(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT '0',
  `pay_time` int(11) DEFAULT '0',
  `pay_money` decimal(11,2) DEFAULT '0.00',
  `order_status` char(20) DEFAULT NULL,
  `pay_info` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_order_charge
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_order_detail`;
CREATE TABLE `keke_witkey_order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `detail_name` varchar(100) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `obj_type` varchar(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_id` (`detail_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_payitem`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_payitem`;
CREATE TABLE `keke_witkey_payitem` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_code` varchar(100) DEFAULT NULL,
  `item_code` char(20) DEFAULT NULL,
  `small_pic` varchar(100) DEFAULT NULL,
  `big_pic` varchar(100) DEFAULT NULL,
  `item_name` char(20) DEFAULT NULL,
  `user_type` char(20) DEFAULT NULL,
  `item_cash` decimal(10,2) DEFAULT '0.00',
  `item_standard` char(20) DEFAULT NULL,
  `item_limit` int(11) DEFAULT NULL,
  `item_desc` text,
  `ext` text,
  `is_open` int(1) DEFAULT NULL,
  `item_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `item_id` (`item_id`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_payitem
-- ----------------------------
INSERT INTO keke_witkey_payitem VALUES ('3', 'sreward,mreward,preward,tender', 'urgent', 'data/uploads/sys/tools/94564f3b0b7264e13.gif?fid=2093', 'data/uploads/sys/tools/26654f3b0b7aa0514.gif?fid=2094', '����Ӽ�', 'employer', '30.00', 'times', '10', '�����Ҫ����ʱ��ȽϽ�������Ҫ�ڽ�����ɵ���������Ӽ����ܸ��������������鿴<br />', null, '1', 'task');
INSERT INTO keke_witkey_payitem VALUES ('2', 'sreward,mreward,preward,tender,dtender', 'top', 'data/uploads/sys/tools/74064f3b0ba6a17c3.gif?fid=2095', 'data/uploads/sys/tools/14234f3b0ba9d5c9d.gif?fid=2096', '�����ö�', 'employer', '20.00', 'day', '10', '�����ö��󣬸���������ҳ�������б�������ҳ������ʾ�������������鿴', null, '1', 'task');
INSERT INTO keke_witkey_payitem VALUES ('1', 'sreward,mreward,preward,tender,dtender', 'workhide', 'data/uploads/sys/tools/210914f3b0bca96811.gif?fid=2097', 'data/uploads/sys/tools/282564f3b0bcd5bb39.gif?fid=2098', '�������', 'witkey', '10.00', 'times', '10', '������񽻸崦����������ܸ��õı�������˸�Ȩ��<br />', null, '1', 'work');
INSERT INTO keke_witkey_payitem VALUES ('4', 'sreward,mreward,preward,tender,dtender', 'map', 'data/uploads/sys/tools/288854f3b0beadf0a3.gif?fid=2099', 'data/uploads/sys/tools/84264f3b0bee314b0.gif?fid=2100', '��ͼ��λ', 'employer', '10.00', 'times', '10', '��ͼ��λ�����񷢲��󣬿����ڵ�ͼ��ָ��λ����ʾ', null, '1', 'task_service');

-- ----------------------------
-- Table structure for `keke_witkey_payitem_record`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_payitem_record`;
CREATE TABLE `keke_witkey_payitem_record` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_code` char(20) DEFAULT NULL,
  `use_type` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `obj_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `use_cash` decimal(10,2) DEFAULT '0.00',
  `use_num` int(2) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`record_id`),
  KEY `record_id` (`record_id`),
  KEY `item_code` (`item_code`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_payitem_record
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_pay_api`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_pay_api`;
CREATE TABLE `keke_witkey_pay_api` (
  `payment` varchar(50) NOT NULL,
  `type` char(20) DEFAULT NULL,
  `config` text,
  PRIMARY KEY (`payment`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_pay_api
-- ----------------------------
INSERT INTO keke_witkey_pay_api VALUES ('alipayjs', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('chinabank', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('paypal', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('tenpay', 'online', '');
INSERT INTO keke_witkey_pay_api VALUES ('icbc', 'offline', '');
INSERT INTO keke_witkey_pay_api VALUES ('aboc', 'offline', '');
INSERT INTO keke_witkey_pay_api VALUES ('cmb', 'offline', '');
INSERT INTO keke_witkey_pay_api VALUES ('spdb', 'offline', '');

-- ----------------------------
-- Table structure for `keke_witkey_pay_config`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_pay_config`;
CREATE TABLE `keke_witkey_pay_config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `k` varchar(50) DEFAULT NULL,
  `v` varchar(150) DEFAULT NULL,
  `t` char(20) DEFAULT NULL,
  `d` char(50) DEFAULT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_pay_config
-- ----------------------------
INSERT INTO keke_witkey_pay_config VALUES ('1', 'currency', '10', '0', '0');
INSERT INTO keke_witkey_pay_config VALUES ('2', 'recharge_min', '0.01', '0', '0');
INSERT INTO keke_witkey_pay_config VALUES ('3', 'withdraw_min', '2', '0', '0');
INSERT INTO keke_witkey_pay_config VALUES ('4', 'withdraw_max', '10000', '0', '0');

-- ----------------------------
-- Table structure for `keke_witkey_priv_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_priv_item`;
CREATE TABLE `keke_witkey_priv_item` (
  `op_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `op_code` varchar(20) DEFAULT NULL,
  `op_name` varchar(50) DEFAULT NULL,
  `allow_times` int(1) DEFAULT NULL,
  `limit_obj` int(111) DEFAULT NULL,
  `condit` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`op_id`),
  KEY `op_id` (`op_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_priv_item
-- ----------------------------
INSERT INTO keke_witkey_priv_item VALUES ('1', '1', 'pub', '��������', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('58', '5', 'work_hand', '����', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('3', '1', 'comment', '����', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('4', '1', 'report', '�ٱ�', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('5', '2', 'pub', '��������', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('6', '2', 'comment', '����', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('7', '2', 'report', '�ٱ�', '1', '1', 'realname,bank');
INSERT INTO keke_witkey_priv_item VALUES ('9', '3', 'pub', '��������', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('2', '1', 'work_hand', '����', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('12', '3', 'comment', '����', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('10', '3', 'report', '�ٱ�', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('61', '5', 'comment', '�ٱ�', '1', '1', null);
INSERT INTO keke_witkey_priv_item VALUES ('8', '2', 'work_hand', '����', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('59', '5', 'pub', '��������', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('11', '3', 'work_hand', '����', '1', '1', '');
INSERT INTO keke_witkey_priv_item VALUES ('60', '5', 'report', '�ٱ�', '1', '1', null);
INSERT INTO keke_witkey_priv_item VALUES ('51', '4', 'comment', '����', '1', '1', 'realname');
INSERT INTO keke_witkey_priv_item VALUES ('57', '4', 'report', '�ٱ�', '1', '1', null);
INSERT INTO keke_witkey_priv_item VALUES ('49', '4', 'pub', '��������', '1', '2', '');
INSERT INTO keke_witkey_priv_item VALUES ('50', '4', 'work_hand', '����', '1', '1', null);

-- ----------------------------
-- Table structure for `keke_witkey_priv_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_priv_rule`;
CREATE TABLE `keke_witkey_priv_rule` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `mark_rule_id` char(5) DEFAULT NULL,
  `rule` char(5) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `r_id` (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=304 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_priv_rule
-- ----------------------------
INSERT INTO keke_witkey_priv_rule VALUES ('1', '1', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('2', '1', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('3', '1', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('4', '1', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('5', '1', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('7', '2', '1', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('8', '2', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('9', '2', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('10', '2', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('11', '2', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('13', '3', '1', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('14', '3', '2', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('15', '3', '3', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('16', '3', '4', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('17', '3', '5', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('19', '4', '1', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('20', '4', '2', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('21', '4', '3', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('22', '4', '4', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('23', '4', '5', '-1');
INSERT INTO keke_witkey_priv_rule VALUES ('25', '5', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('26', '5', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('27', '5', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('28', '5', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('29', '5', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('145', '49', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('147', '59', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('148', '59', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('149', '59', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('49', '7', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('50', '7', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('51', '7', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('52', '7', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('53', '7', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('55', '8', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('56', '8', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('57', '8', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('58', '8', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('59', '8', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('140', '57', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('142', '49', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('143', '49', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('144', '49', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('67', '9', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('68', '9', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('69', '9', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('70', '9', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('71', '9', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('73', '10', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('74', '10', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('75', '10', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('76', '10', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('77', '10', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('136', '57', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('137', '57', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('138', '57', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('139', '57', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('85', '11', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('86', '11', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('87', '11', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('88', '11', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('89', '11', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('115', '6', '1', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('116', '6', '2', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('117', '6', '3', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('118', '6', '4', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('119', '6', '5', '2');
INSERT INTO keke_witkey_priv_rule VALUES ('130', '52', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('131', '52', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('132', '52', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('133', '52', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('134', '52', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('121', '12', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('122', '12', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('123', '12', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('124', '12', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('125', '12', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('126', '12', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('127', '49', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('128', '50', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('129', '51', '1', '1');
INSERT INTO keke_witkey_priv_rule VALUES ('150', '59', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('151', '59', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('152', '59', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('153', '58', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('154', '58', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('155', '58', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('156', '58', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('157', '58', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('158', '58', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('159', '60', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('160', '60', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('161', '60', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('162', '60', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('163', '60', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('165', '61', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('166', '61', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('167', '61', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('168', '61', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('169', '61', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('170', '61', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('171', '62', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('172', '62', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('173', '62', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('174', '62', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('175', '62', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('176', '62', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('177', '63', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('178', '63', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('179', '63', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('180', '63', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('181', '63', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('182', '63', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('183', '64', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('184', '64', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('185', '64', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('186', '64', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('187', '64', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('189', '65', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('190', '65', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('191', '65', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('192', '65', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('193', '65', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('195', '66', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('196', '66', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('197', '66', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('198', '66', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('199', '66', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('200', '67', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('201', '67', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('202', '67', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('203', '67', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('204', '67', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('205', '68', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('206', '68', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('207', '68', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('208', '68', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('209', '68', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('210', '69', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('211', '69', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('212', '69', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('213', '69', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('214', '69', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('215', '1', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('217', '2', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('220', '3', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('222', '4', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('292', '6', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('224', '5', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('294', '51', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('226', '7', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('295', '51', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('228', '8', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('296', '51', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('230', '9', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('297', '51', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('232', '10', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('298', '51', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('234', '11', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('300', '50', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('299', '50', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('301', '50', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('238', '49', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('302', '50', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('240', '52', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('241', '57', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('303', '50', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('248', '60', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('252', '62', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('253', '63', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('256', '64', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('258', '65', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('260', '66', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('262', '67', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('264', '68', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('266', '69', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('268', '70', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('269', '70', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('270', '70', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('271', '70', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('272', '70', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('273', '70', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('293', '71', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('275', '71', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('276', '71', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('277', '71', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('278', '71', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('279', '71', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('280', '72', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('281', '72', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('282', '72', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('283', '72', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('284', '72', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('285', '72', '6', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('286', '73', '1', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('287', '73', '2', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('288', '73', '3', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('289', '73', '4', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('290', '73', '5', '0');
INSERT INTO keke_witkey_priv_rule VALUES ('291', '73', '6', '0');

-- ----------------------------
-- Table structure for `keke_witkey_prom_event`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_event`;
CREATE TABLE `keke_witkey_prom_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_desc` varchar(250) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `parent_uid` int(11) DEFAULT NULL,
  `parent_username` varchar(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `rake_cash` decimal(10,2) DEFAULT '0.00',
  `rake_credit` decimal(10,2) DEFAULT '0.00',
  `event_status` tinyint(1) DEFAULT NULL,
  `event_time` int(10) DEFAULT NULL,
  `action` char(20) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_event
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_prom_item`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_item`;
CREATE TABLE `keke_witkey_prom_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` char(20) DEFAULT NULL,
  `prom_type` char(20) DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_pic` varchar(200) DEFAULT NULL,
  `item_content` text,
  `on_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_item
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_prom_relation`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_relation`;
CREATE TABLE `keke_witkey_prom_relation` (
  `relation_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_type` char(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `prom_uid` int(11) DEFAULT NULL,
  `prom_username` varchar(20) DEFAULT NULL,
  `relation_status` int(1) DEFAULT '0',
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`relation_id`),
  KEY `relation_id` (`relation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_relation
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_prom_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_prom_rule`;
CREATE TABLE `keke_witkey_prom_rule` (
  `prom_id` int(11) NOT NULL AUTO_INCREMENT,
  `prom_item` varchar(50) DEFAULT NULL,
  `prom_code` varchar(30) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `cash` decimal(10,2) DEFAULT '0.00',
  `credit` decimal(10,2) DEFAULT '0.00',
  `rate` int(10) DEFAULT NULL,
  `config` text,
  `is_open` int(1) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`prom_id`),
  KEY `prom_id` (`prom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_prom_rule
-- ----------------------------
INSERT INTO keke_witkey_prom_rule VALUES ('5', '����ע��', 'reg', '20', '0.00', '0.00', null, 'a:1:{s:9:\"auth_step\";s:10:\"email_auth\";}', '1', 'reg');
INSERT INTO keke_witkey_prom_rule VALUES ('1', 'ʵ����֤', 'realname_auth', '20', '2.00', '5.00', null, null, '1', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('2', '�ֻ���֤', 'mobile_auth', '20', '50.00', '50.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('3', '�����ƹ�', 'pub_task', '40', '4.00', '4.00', '10', 'a:3:{s:5:\"model\";s:7:\"2,3,5,1\";s:18:\"pub_task_rake_type\";s:1:\"1\";s:13:\"pub_task_rate\";d:10;}', '1', 'task');
INSERT INTO keke_witkey_prom_rule VALUES ('4', '����н�', 'bid_task', '2', null, null, '10', 'a:2:{s:5:\"model\";s:3:\"2,1\";s:13:\"bid_task_rake\";i:10;}', '1', 'task');
INSERT INTO keke_witkey_prom_rule VALUES ('6', '��ҵ��֤', 'enterprise_auth', '20', '5.00', '3.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('8', '������֤', 'bank_auth', '20', '1.00', '5.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('9', '������֤', 'email_auth', '20', '10.00', '20.00', null, null, '2', 'auth');
INSERT INTO keke_witkey_prom_rule VALUES ('10', '��Ʒ����', 'service', '3', null, null, '10', 'a:1:{s:5:\"model\";s:3:\"6,7\";}', '1', 'service');

-- ----------------------------
-- Table structure for `keke_witkey_report`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_report`;
CREATE TABLE `keke_witkey_report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `obj` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `obj_id` int(11) DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `front_status` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `user_type` int(1) DEFAULT NULL,
  `to_uid` int(11) DEFAULT NULL,
  `to_username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `is_hide` tinyint(1) DEFAULT NULL,
  `report_desc` text CHARACTER SET utf8,
  `report_file` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `report_status` int(11) DEFAULT '0',
  `on_time` int(10) DEFAULT NULL,
  `report_type` tinyint(1) DEFAULT NULL,
  `op_uid` int(11) DEFAULT NULL,
  `op_username` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `op_result` text CHARACTER SET utf8,
  `op_time` int(10) DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `qq` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`report_id`),
  KEY `report_id` (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_report
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_resource`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_resource`;
CREATE TABLE `keke_witkey_resource` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_name` varchar(20) DEFAULT NULL,
  `resource_url` varchar(100) DEFAULT NULL,
  `submenu_id` varchar(20) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`resource_id`),
  KEY `resource_id` (`resource_id`),
  KEY `submenu_id` (`submenu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_resource
-- ----------------------------
INSERT INTO keke_witkey_resource VALUES ('2', '֧���ӿ�', 'index.php?do=config&view=pay', '28', '5');
INSERT INTO keke_witkey_resource VALUES ('3', '�������', 'index.php?do=finance&view=report', '2', '2');
INSERT INTO keke_witkey_resource VALUES ('4', '������ϸ', 'index.php?do=finance&view=all', '2', '1');
INSERT INTO keke_witkey_resource VALUES ('5', '�������', 'index.php?do=finance&view=withdraw', '2', '5');
INSERT INTO keke_witkey_resource VALUES ('6', '��ҵ���', 'index.php?do=task&view=industry_edit', '5', '2');
INSERT INTO keke_witkey_resource VALUES ('7', '��ҵ����', 'index.php?do=task&view=industry', '5', '1');
INSERT INTO keke_witkey_resource VALUES ('8', '���ܹ���', 'index.php?do=task&view=skill&op=list', '5', '3');
INSERT INTO keke_witkey_resource VALUES ('9', '��������', 'index.php?do=task&view=comment', '37', '0');
INSERT INTO keke_witkey_resource VALUES ('10', '����û�', 'index.php?do=user&view=add', '7', '1');
INSERT INTO keke_witkey_resource VALUES ('11', '�û�����', 'index.php?do=user&view=list', '7', '2');
INSERT INTO keke_witkey_resource VALUES ('12', '���ϵͳ��', 'index.php?do=user&view=group_add&op=add', '8', '0');
INSERT INTO keke_witkey_resource VALUES ('13', 'ϵͳ�����', 'index.php?do=user&view=group_list', '8', '0');
INSERT INTO keke_witkey_resource VALUES ('14', '�������', 'index.php?do=article&view=cat_list&type=art', '9', '3');
INSERT INTO keke_witkey_resource VALUES ('15', '�������', 'index.php?do=article&view=edit', '9', '2');
INSERT INTO keke_witkey_resource VALUES ('16', '���¹���', 'index.php?do=article&view=list', '9', '1');
INSERT INTO keke_witkey_resource VALUES ('19', 'ϵͳ��־', 'index.php?do=tool&view=log', '10', '4');
INSERT INTO keke_witkey_resource VALUES ('20', '���»���', 'index.php?do=tool&view=cache&sbt_edit=1&ckb_obj_cache=1&ckb_tpl_cache=1', '10', '7');
INSERT INTO keke_witkey_resource VALUES ('21', '��������', 'index.php?do=tool&view=file', '10', '5');
INSERT INTO keke_witkey_resource VALUES ('22', '�������', 'index.php?do=article&view=cat_edit&type=art', '9', '4');
INSERT INTO keke_witkey_resource VALUES ('141', '��ͼ�ӿ�', 'index.php?do=msg&view=map', '28', '2');
INSERT INTO keke_witkey_resource VALUES ('24', '�������', 'index.php?do=task&view=skill_edit', '5', '4');
INSERT INTO keke_witkey_resource VALUES ('77', '�ֻ���֤', 'index.php?do=auth&view=list&auth_code=mobile', '29', '4');
INSERT INTO keke_witkey_resource VALUES ('140', '΢����ע', 'index.php?do=msg&view=attention', '0', '2');
INSERT INTO keke_witkey_resource VALUES ('28', 'ģ�����', 'index.php?do=config&view=tpl', '12', '1');
INSERT INTO keke_witkey_resource VALUES ('29', '��ǩ����', 'index.php?do=tpl&view=taglist', '12', '2');
INSERT INTO keke_witkey_resource VALUES ('30', '��������', 'index.php?do=tpl&view=link', '12', '3');
INSERT INTO keke_witkey_resource VALUES ('32', '������', 'index.php?do=tpl&view=ad', '12', '4');
INSERT INTO keke_witkey_resource VALUES ('33', '�ͷ�����', 'index.php?do=user&view=custom_list', '7', '20');
INSERT INTO keke_witkey_resource VALUES ('34', 'ȫ������', 'index.php?do=config&view=basic&op=info', '1', '0');
INSERT INTO keke_witkey_resource VALUES ('35', '��Ա����', 'index.php?do=config&view=integration', '1', '20');
INSERT INTO keke_witkey_resource VALUES ('36', '��������', 'index.php?do=config&view=mark', '14', '1');
INSERT INTO keke_witkey_resource VALUES ('37', 'ģ�͹���', 'index.php?do=config&view=model', '1', '10');
INSERT INTO keke_witkey_resource VALUES ('38', '��֤��Ŀ', 'index.php?do=auth&view=item_list', '29', '0');
INSERT INTO keke_witkey_resource VALUES ('40', '�ͷ�����', 'index.php?do=task&view=custom', '371', '0');
INSERT INTO keke_witkey_resource VALUES ('41', '�����˵�', 'index.php?do=config&view=nav', '1', '100');
INSERT INTO keke_witkey_resource VALUES ('42', '��������', 'index.php?do=article&view=list&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('43', '�������', 'index.php?do=article&view=edit&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('44', '��������', 'index.php?do=article&view=cat_list&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('45', '�������', 'index.php?do=article&view=cat_edit&type=help', '17', '0');
INSERT INTO keke_witkey_resource VALUES ('46', '��������', 'index.php?do=shop&view=banner', '20', '0');
INSERT INTO keke_witkey_resource VALUES ('47', '�������', 'index.php?do=shop&view=edit_banner', '20', '0');
INSERT INTO keke_witkey_resource VALUES ('49', '�û���', 'index.php?do=group', '22', '0');
INSERT INTO keke_witkey_resource VALUES ('52', '��������', 'index.php?do=case&view=list', '37', '0');
INSERT INTO keke_witkey_resource VALUES ('53', '��ҳ����', 'index.php?do=article&view=list&type=single', '24', '0');
INSERT INTO keke_witkey_resource VALUES ('54', '��ҳ���', 'index.php?do=article&view=edit&type=single', '24', '1');
INSERT INTO keke_witkey_resource VALUES ('139', '�����¼', 'index.php?do=payitem&view=buy', '34', '1');
INSERT INTO keke_witkey_resource VALUES ('138', '���������', 'index.php?do=payitem', '34', '0');
INSERT INTO keke_witkey_resource VALUES ('57', '��̬����', 'index.php?do=tpl&view=feed', '12', '3');
INSERT INTO keke_witkey_resource VALUES ('58', '�ƹ��ϵ����', 'index.php?do=prom&view=relation', '27', '5');
INSERT INTO keke_witkey_resource VALUES ('59', '�ƹ����ù���', 'index.php?do=prom&view=config', '27', '1');
INSERT INTO keke_witkey_resource VALUES ('60', '�ƹ��زĹ���', 'index.php?do=prom&view=item', '0', '2');
INSERT INTO keke_witkey_resource VALUES ('61', '�ƹ�������', 'index.php?do=prom&view=event', '27', '6');
INSERT INTO keke_witkey_resource VALUES ('63', 'OAuth��¼', 'index.php?do=msg&view=weibo', '28', '1');
INSERT INTO keke_witkey_resource VALUES ('66', '��������', 'index.php?do=msg&view=config', '28', '3');
INSERT INTO keke_witkey_resource VALUES ('67', '���ŷ���', 'index.php?do=msg&view=send', '0', '4');
INSERT INTO keke_witkey_resource VALUES ('68', '������֤', 'index.php?do=auth&view=list&auth_code=bank', '29', '1');
INSERT INTO keke_witkey_resource VALUES ('69', '��ҵ��֤', 'index.php?do=auth&view=list&auth_code=enterprise', '29', '2');
INSERT INTO keke_witkey_resource VALUES ('70', 'ʵ����֤', 'index.php?do=auth&view=list&auth_code=realname', '29', '3');
INSERT INTO keke_witkey_resource VALUES ('71', '������֤', 'index.php?do=auth&view=list&auth_code=email', '29', '4');
INSERT INTO keke_witkey_resource VALUES ('73', '����ģ��', 'index.php?do=msg&view=internal', '28', '5');
INSERT INTO keke_witkey_resource VALUES ('76', '��ֵ���', 'index.php?do=finance&view=recharge', '2', '4');
INSERT INTO keke_witkey_resource VALUES ('78', '��������', 'index.php?do=config&view=mark&op=config', '14', '2');
INSERT INTO keke_witkey_resource VALUES ('79', '������¼', 'index.php?do=config&view=mark&op=log', '14', '3');
INSERT INTO keke_witkey_resource VALUES ('80', 'άȨ����', 'index.php?do=trans&view=rights', '30', '1');
INSERT INTO keke_witkey_resource VALUES ('81', '�ٱ�����', 'index.php?do=trans&view=report', '30', '2');
INSERT INTO keke_witkey_resource VALUES ('82', 'Ͷ�߹���', 'index.php?do=trans&view=complaint', '30', '3');
INSERT INTO keke_witkey_resource VALUES ('133', '����API', 'index.php?do=keke&view=account', '33', '1');
INSERT INTO keke_witkey_resource VALUES ('134', '�ƹ����', 'index.php?do=keke&view=finance', '33', '2');
INSERT INTO keke_witkey_resource VALUES ('135', '��ȡ����', 'index.php?do=keke&view=gettask', '33', '3');
INSERT INTO keke_witkey_resource VALUES ('137', '�ύ����', 'index.php?do=keke&view=posttask', '33', '4');
INSERT INTO keke_witkey_resource VALUES ('142', '���ݿ����', 'index.php?do=tool&view=dbbackup', '10', '0');
INSERT INTO keke_witkey_resource VALUES ('146', '�������', 'index.php?do=tool&view=payitem', '39', '1');

-- ----------------------------
-- Table structure for `keke_witkey_resource_submenu`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_resource_submenu`;
CREATE TABLE `keke_witkey_resource_submenu` (
  `submenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `submenu_name` varchar(20) DEFAULT NULL,
  `menu_name` varchar(10) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  PRIMARY KEY (`submenu_id`),
  KEY `submenu_id` (`submenu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_resource_submenu
-- ----------------------------
INSERT INTO keke_witkey_resource_submenu VALUES ('1', 'ϵͳ����', 'config', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('2', '����ģ��', 'finance', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('5', '��ҵ����', 'config', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('7', '�û�����', 'user', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('8', 'ϵͳ�����', 'user', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('9', '����ģ��', 'article', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('10', 'վ������', 'tool', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('12', 'ģ���ǩ', 'tool', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('14', '�û���ϵ', 'user', '3');
INSERT INTO keke_witkey_resource_submenu VALUES ('17', '����ģ��', 'article', '3');
INSERT INTO keke_witkey_resource_submenu VALUES ('34', '��ֵ����', 'finance', '0');
INSERT INTO keke_witkey_resource_submenu VALUES ('24', '��ҳ�����', 'article', '5');
INSERT INTO keke_witkey_resource_submenu VALUES ('27', '��վ�ƹ�', 'keke', '1');
INSERT INTO keke_witkey_resource_submenu VALUES ('28', '�ӿڹ���', 'config', '3');
INSERT INTO keke_witkey_resource_submenu VALUES ('29', '��֤����', 'user', '4');
INSERT INTO keke_witkey_resource_submenu VALUES ('30', '����άȨ', 'user', '4');
INSERT INTO keke_witkey_resource_submenu VALUES ('33', '�ƹ�����', 'keke', '2');
INSERT INTO keke_witkey_resource_submenu VALUES ('37', '��������', 'task', '8');
INSERT INTO keke_witkey_resource_submenu VALUES ('39', '��ֵ����', 'tool', '3');

-- ----------------------------
-- Table structure for `keke_witkey_service`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service`;
CREATE TABLE `keke_witkey_service` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `profit_rate` int(3) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `indus_path` varchar(100) DEFAULT NULL,
  `cus_cate_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `unite_price` varchar(50) DEFAULT NULL,
  `service_time` int(255) DEFAULT NULL,
  `unit_time` varchar(50) DEFAULT NULL,
  `obj_name` varchar(100) DEFAULT NULL,
  `pic` varchar(255) DEFAULT '',
  `ad_pic` varchar(200) DEFAULT NULL,
  `area_range` varchar(100) DEFAULT NULL,
  `key_word` varchar(50) DEFAULT NULL,
  `submit_method` char(20) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `content` text,
  `on_time` int(11) DEFAULT NULL,
  `is_stop` int(11) DEFAULT '0',
  `sale_num` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `mark_num` int(11) DEFAULT '0',
  `leave_num` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `pay_item` char(20) DEFAULT NULL,
  `att_cash` decimal(10,2) DEFAULT '0.00',
  `refresh_time` int(11) DEFAULT NULL,
  `unique_num` char(8) DEFAULT NULL,
  `total_sale` decimal(10,2) DEFAULT '0.00',
  `service_status` int(1) DEFAULT NULL,
  `is_top` int(1) DEFAULT '0',
  `point` char(20) DEFAULT NULL,
  `city` char(20) DEFAULT NULL,
  `payitem_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`service_id`),
  KEY `indus_id` (`indus_id`),
  KEY `shop_id` (`shop_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_service
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_service_order`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service_order`;
CREATE TABLE `keke_witkey_service_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `sale_uid` int(11) DEFAULT NULL,
  `sale_username` varchar(20) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_type` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `count_cash` float DEFAULT NULL,
  `pay_cash` float DEFAULT NULL,
  `clr_cash` float DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `sale_status` int(11) DEFAULT NULL,
  `buyer_status` varchar(20) DEFAULT NULL,
  `order_status` int(11) DEFAULT NULL,
  `buy_username` varchar(20) DEFAULT NULL,
  `buy_uid` int(11) DEFAULT NULL,
  `cost_cash` float(10,2) DEFAULT NULL,
  `cost_credit` float(10,2) DEFAULT NULL,
  `order_num` char(8) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `buy_uid` (`buy_uid`),
  KEY `order_status` (`order_status`),
  KEY `sale_uid` (`sale_uid`),
  KEY `shop_id` (`model_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_service_order
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_service_order_detail`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_service_order_detail`;
CREATE TABLE `keke_witkey_service_order_detail` (
  `detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `step_num` int(11) DEFAULT NULL,
  `step_cash` float(10,2) DEFAULT NULL,
  `step_detail` varchar(200) DEFAULT NULL,
  `step_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`detail_id`),
  KEY `detail_id` (`detail_id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_service_order_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_session`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_session`;
CREATE TABLE `keke_witkey_session` (
  `session_id` char(100) NOT NULL,
  `session_expirse` int(10) DEFAULT NULL,
  `session_data` text,
  `session_ip` char(15) DEFAULT NULL,
  `session_uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_session
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop`;
CREATE TABLE `keke_witkey_shop` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `shop_type` int(1) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `shop_name` varchar(100) DEFAULT NULL,
  `service_range` varchar(50) DEFAULT NULL,
  `shop_desc` text,
  `work` varchar(100) DEFAULT NULL,
  `work_year` int(2) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `shop_background` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `banner` text,
  `shop_slogans` varchar(255) DEFAULT NULL,
  `shop_skin` char(20) DEFAULT NULL,
  `shop_backstyle` varchar(255) DEFAULT NULL,
  `shop_font` char(20) DEFAULT NULL,
  `shop_active` char(20) DEFAULT NULL,
  `is_close` int(1) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT NULL,
  `homebanner` text,
  PRIMARY KEY (`shop_id`),
  KEY `shop_id` (`shop_id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop_case`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop_case`;
CREATE TABLE `keke_witkey_shop_case` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `case_type` int(1) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `case_name` varchar(100) DEFAULT NULL,
  `case_desc` text,
  `case_pic` varchar(100) DEFAULT NULL,
  `case_url` varchar(200) DEFAULT NULL,
  `start_time` int(11) DEFAULT NULL,
  `end_time` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  KEY `case_id` (`case_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop_case
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop_cate`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop_cate`;
CREATE TABLE `keke_witkey_shop_cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(20) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `cate_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cate_id`),
  KEY `cate_id` (`cate_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop_cate
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shop_member`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shop_member`;
CREATE TABLE `keke_witkey_shop_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `truename` varchar(50) DEFAULT NULL,
  `member_pic` varchar(50) DEFAULT NULL,
  `member_job` varchar(50) DEFAULT NULL,
  `entry_age` int(11) DEFAULT NULL,
  `top_eduction` varchar(50) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `member_desc` text,
  PRIMARY KEY (`member_id`),
  KEY `member_id` (`member_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shop_member
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_shortcuts`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_shortcuts`;
CREATE TABLE `keke_witkey_shortcuts` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `resource_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_shortcuts
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_skill`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_skill`;
CREATE TABLE `keke_witkey_skill` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `indus_id` int(11) DEFAULT '0',
  `skill_name` varchar(50) DEFAULT NULL,
  `listorder` int(11) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`skill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_skill
-- ----------------------------
INSERT INTO keke_witkey_skill VALUES ('107', '1', '����', '0', '1330412414');
INSERT INTO keke_witkey_skill VALUES ('40', '26', 'asp.net', '4', '1322184227');
INSERT INTO keke_witkey_skill VALUES ('41', '26', 'flex', '5', '1322184247');
INSERT INTO keke_witkey_skill VALUES ('42', '27', 'Photoshop', '1', '1323999362');
INSERT INTO keke_witkey_skill VALUES ('43', '28', 'div+css', '0', '1322184297');
INSERT INTO keke_witkey_skill VALUES ('44', '28', 'jquery', '1', '1322184309');
INSERT INTO keke_witkey_skill VALUES ('45', '29', 'php', '0', '1322184328');
INSERT INTO keke_witkey_skill VALUES ('47', '31', 'ajax', '0', '1322184367');
INSERT INTO keke_witkey_skill VALUES ('48', '33', 'sqlserver', '0', '1322184389');
INSERT INTO keke_witkey_skill VALUES ('49', '33', 'oracle', '1', '1322184408');
INSERT INTO keke_witkey_skill VALUES ('50', '33', 'mysql', '2', '1322184420');
INSERT INTO keke_witkey_skill VALUES ('51', '34', 'vb.net', '0', '1322184441');
INSERT INTO keke_witkey_skill VALUES ('52', '34', 'java', '1', '1322184459');
INSERT INTO keke_witkey_skill VALUES ('53', '35', 'linux', '0', '1322184477');
INSERT INTO keke_witkey_skill VALUES ('54', '35', 'fedora', '1', '1322184498');
INSERT INTO keke_witkey_skill VALUES ('55', '35', 'centos', '2', '1322184511');
INSERT INTO keke_witkey_skill VALUES ('56', '35', 'redhat', '3', '1322184536');
INSERT INTO keke_witkey_skill VALUES ('65', '36', '�߼�php', '5', '1322186604');
INSERT INTO keke_witkey_skill VALUES ('66', '36', '�߼�java', '0', '1322185790');
INSERT INTO keke_witkey_skill VALUES ('67', '36', 'OpenGL���', '1', '1322186350');
INSERT INTO keke_witkey_skill VALUES ('69', '36', 'jsp', '3', '1322186539');
INSERT INTO keke_witkey_skill VALUES ('70', '36', 'PHP Web', '4', '1322186568');
INSERT INTO keke_witkey_skill VALUES ('71', '36', 'apache', '6', '1322186676');
INSERT INTO keke_witkey_skill VALUES ('72', '36', 'iis', '7', '1322186692');
INSERT INTO keke_witkey_skill VALUES ('73', '36', 'Python', '8', '1322186982');
INSERT INTO keke_witkey_skill VALUES ('74', '37', 'json', '0', '1322188517');
INSERT INTO keke_witkey_skill VALUES ('75', '37', 'xml', '1', '1322188532');
INSERT INTO keke_witkey_skill VALUES ('76', '37', 'Xhtml', '2', '1322188627');
INSERT INTO keke_witkey_skill VALUES ('77', '38', 'ui���', '0', '1322188649');
INSERT INTO keke_witkey_skill VALUES ('80', '123', 'VB', '0', '1322188731');
INSERT INTO keke_witkey_skill VALUES ('81', '123', 'C����', '1', '1322188746');
INSERT INTO keke_witkey_skill VALUES ('82', '123', 'Builder/Dephi', '2', '1322188780');
INSERT INTO keke_witkey_skill VALUES ('83', '125', 'ps����', '0', '1322188835');
INSERT INTO keke_witkey_skill VALUES ('84', '130', '�������', '0', '1322188897');
INSERT INTO keke_witkey_skill VALUES ('85', '131', '�ؿ����', '0', '1322188912');
INSERT INTO keke_witkey_skill VALUES ('86', '132', '��Ʒ���', '0', '1322188928');
INSERT INTO keke_witkey_skill VALUES ('87', '133', '�������', '0', '1322188951');
INSERT INTO keke_witkey_skill VALUES ('88', '138', 'ppt���', '0', '1322188979');
INSERT INTO keke_witkey_skill VALUES ('89', '148', '�Ű沼��', '0', '1322189011');
INSERT INTO keke_witkey_skill VALUES ('90', '154', '����ȡ��', '0', '1322189029');
INSERT INTO keke_witkey_skill VALUES ('91', '156', '��Ӱ����', '0', '1329449538');

-- ----------------------------
-- Table structure for `keke_witkey_space`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_space`;
CREATE TABLE `keke_witkey_space` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sec_code` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_pic` varchar(100) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `isvip` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `user_type` varchar(50) DEFAULT NULL,
  `sex` char(10) DEFAULT NULL,
  `marry` char(10) DEFAULT NULL,
  `hometown` char(10) DEFAULT NULL,
  `residency` varchar(30) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `truename` char(20) DEFAULT NULL,
  `idcard` varchar(20) DEFAULT NULL,
  `idpic` varchar(100) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `msn` varchar(50) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `indus_id` int(11) DEFAULT NULL,
  `indus_pid` int(11) DEFAULT NULL,
  `skill_ids` varchar(150) DEFAULT NULL,
  `summary` text,
  `experience` text,
  `reg_time` int(11) DEFAULT NULL,
  `reg_ip` varchar(20) DEFAULT NULL,
  `domain` varchar(50) DEFAULT NULL,
  `credit` decimal(11,2) DEFAULT '0.00',
  `balance` decimal(11,2) DEFAULT '0.00',
  `balance_status` int(11) DEFAULT NULL,
  `pub_num` int(11) DEFAULT '0',
  `take_num` int(11) DEFAULT '0',
  `nominate_num` int(11) DEFAULT '0',
  `accepted_num` int(11) DEFAULT '0',
  `vip_start_time` int(11) DEFAULT NULL,
  `vip_end_time` int(11) DEFAULT NULL,
  `pay_zfb` varchar(100) DEFAULT NULL,
  `pay_cft` varchar(100) DEFAULT NULL,
  `pay_bank` text,
  `score` int(11) DEFAULT NULL,
  `buyer_credit` int(11) DEFAULT '0',
  `buyer_good_num` int(11) DEFAULT '0',
  `buyer_level` text,
  `buyer_total_num` int(11) DEFAULT '0',
  `seller_credit` int(11) DEFAULT '0',
  `seller_good_num` int(11) DEFAULT '0',
  `seller_level` text,
  `seller_total_num` int(11) DEFAULT '0',
  `studio_id` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `client_status` char(11) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_space
-- ----------------------------
INSERT INTO keke_witkey_space VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '55cd560ab6d996cd9d3ffb7b00cd0471', 'admin@admin.com', null, '1', null, '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1338879927', null, null, '0.00', '0.00', null, '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', null, '0', '0', '0', null, '0', null, null, null);

-- ----------------------------
-- Table structure for `keke_witkey_system_log`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_system_log`;
CREATE TABLE `keke_witkey_system_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_type` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `log_content` varchar(250) DEFAULT NULL,
  `log_ip` char(15) DEFAULT NULL,
  `log_time` int(11) DEFAULT '0',
  PRIMARY KEY (`log_id`),
  KEY `log_time` (`log_time`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_system_log
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_tag`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_tag`;
CREATE TABLE `keke_witkey_tag` (
  `tag_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(50) DEFAULT NULL,
  `tag_type` int(11) DEFAULT NULL,
  `task_type` int(11) DEFAULT NULL,
  `task_indus_id` int(11) DEFAULT NULL,
  `task_indus_ids` varchar(100) DEFAULT NULL,
  `task_status` int(11) DEFAULT NULL,
  `start_time1` int(11) DEFAULT NULL,
  `start_time2` int(11) DEFAULT NULL,
  `end_time1` int(11) DEFAULT NULL,
  `end_time2` int(11) DEFAULT NULL,
  `left_day` int(11) DEFAULT NULL,
  `left_hour` int(11) DEFAULT NULL,
  `task_cash1` int(11) DEFAULT NULL,
  `task_cash2` int(11) DEFAULT NULL,
  `prom_cash1` int(11) DEFAULT NULL,
  `prom_cash2` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `task_ids` varchar(100) DEFAULT NULL,
  `open_is_top` int(11) DEFAULT NULL,
  `listorder` int(11) DEFAULT NULL,
  `art_cat_id` int(11) DEFAULT NULL,
  `art_cat_ids` varchar(100) DEFAULT NULL,
  `art_iscommend` int(11) DEFAULT NULL,
  `art_hasimg` int(11) DEFAULT NULL,
  `art_time1` int(11) DEFAULT NULL,
  `art_time2` int(11) DEFAULT NULL,
  `art_ids` varchar(100) DEFAULT NULL,
  `loadcount` int(11) DEFAULT NULL,
  `perpage` int(11) DEFAULT NULL,
  `tplname` varchar(20) DEFAULT NULL,
  `cat_type` int(11) DEFAULT NULL,
  `cat_cat_id` int(11) DEFAULT NULL,
  `cat_cat_ids` varchar(100) DEFAULT NULL,
  `cat_loadsub` int(11) DEFAULT NULL,
  `cat_onlyrecommend` int(11) DEFAULT NULL,
  `tag_sql` text,
  `code` text,
  `cache_time` int(11) DEFAULT NULL,
  `tag_code` text,
  `tpl_type` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tagname` (`tagname`),
  KEY `tag_id` (`tag_id`),
  KEY `cat_cat_id` (`cat_cat_id`),
  KEY `cache_time` (`cache_time`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_tag
-- ----------------------------
INSERT INTO keke_witkey_tag VALUES ('132', '��վ��ȫ', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '203', null, '0', '0', '0', '0', '', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=article&view=article_info&art_id={$v[id]}\">{$v[title]}</a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('153', '���Ż', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '<div class=\"pb_5\">  <a href=\"#\"><img src=\"resource/img/system/adv.jpg\" alt=\"\" height=\"90\" width=\"165\" /></a></div><div class=\"clearfix\"><ul class=\"small_list clearfix\"><li><div class=\"item clearfix\"><a title=\"��վ�\" href=\"#\">��վ�</a></div></li><li><div class=\"item clearfix\"><a title=\"��վ�\" href=\"#\">��վ�</a></div></li><li><div class=\"item clearfix\"><a title=\"��վ�\" href=\"#\">��վ�</a></div></li><li><div class=\"item clearfix\"><a title=\"��վ�\" href=\"#\">��վ�</a></div></li><li><div class=\"item clearfix\"><a title=\"��վ�\" href=\"#\">��վ�</a></div></li></ul></div>', '666', null, 'default,orange,red');
INSERT INTO keke_witkey_tag VALUES ('154', 'ע��Э��', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, 'ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��ע��Э��<br />', '3600', null, 'default');
INSERT INTO keke_witkey_tag VALUES ('42', '����ҳ��������', '5', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '', '0', '0', '0', '0', '', '0', '0', '', '0', '0', '', '0', '0', '', '<li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">logo���</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">װ��</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">��վ����</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">����</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">�ƹ�</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">��ҳ���</a></li><li><a href=\"javascript:;\" onclick=\"hotsearch_f(this.innerHTML)\">��������Ա</a></li>', '0', null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('131', '��վ����', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '297', null, '0', '0', '0', '0', '', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=article&view=article_info&art_id={$v[id]}\">{$v[title]}</a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('53', '�ļ�����Э��', '5', null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '<p><span style=\"font-family:Arial;\">һ����������Ĺ涨 <br />1���׷���������վ�������񡡡�<br /></span><span style=\"font-family:Arial;\">������������&nbsp;&nbsp;&nbsp;&nbsp; <br /></span><span style=\"font-family:Arial;\">�����׷���Ȩ������ <br />1���׷��ڷ��������ڼ䣬ȷ���ҷ����Ϊ�б������ҷ������񽫸����Դ�ļ�������Ч��ͼ��ʱת���������������������յ�Դ�ļ��󽻸��׷����׷��յ�Դ�ļ���֪ͨ�����������������ͽ��80%��֧�����ҷ��� <br />2���׷�ѡ���ҷ����б����������������ҷ�֧�������ͽ�󣬼�ӵ�иø����֪ʶ��Ȩ�� <br />3���׷���Ȩ����֧�������ͽ���б������и��ơ����С����⡢չ�������ݡ���ӳ���㲥�����紫�������ơ��ıࡢ���롢����Լ�Ӧ��������Ȩ�����е�����Ȩ���������κε�λ�͸��˲����ַ��׷�����Ȩ�������򣬼׷���Ȩ׷���䷨�����Ρ� <br />4���׷���Ȩ�������֪ʶ��Ȩ��������֪ʶ��Ȩ����������б���������Ͷ�������߽�������Ȩ���в�Ʒ��ϸ����ƣ�����ȡ��Ӧ�ı��ꡣ <br />5���׷������������ҷ�֧�������ͽ�󣬿���Ҫ���ҷ����б��������ʵ��޸ģ��޸ı����ɼ���˫�������̶��� </span></p><p><span style=\"font-family:Arial;\">�����ҷ���Ȩ������ <br />�׷���������ȷ�����ҷ��б���Ӧ�������¹涨���������ҷ��е��ø��������κη������Σ���׷��޹أ� <br />1���б�������Υ�����ҹ���֪ʶ��Ȩ�ķ��ɷ������ع涨�� <br />2���б���ӦΪԭ������ǰδ���κ���ʽ���������ڹ�������� <br />3���б���Ӧ�����������й����������κι��һ�����ĸ�������֯�ı�־�� <br />4���б������κ����ڴ�����ѡ������زľ������ַ���������ר��Ȩ������Ȩ���̱�Ȩ�������κ�ר��Ȩ���� <br />5���б�����������֪ʶ��Ȩ��׷����У� <br />6���б������ú����κ������������ӡ��ڽ����ӡ���в���Ҽ������Ѻù�ϵ�Լ���������������·��е����ݡ� </span></p><p><span style=\"font-family:Arial;\">�ġ�����֪ʶ��Ȩ���׵Ĵ��� <br />1���ס���˫��ǩ����Э�鼴��ʾ˫��ͬ���������ͬʱ��������������֪ʶ��Ȩ�������� <br />2������׷�����б����ַ��������κε����˵�Ȩ�����⵽��ʧ����Ȩ�����ҷ�׷���� <br />3����Э��һʽ���ݣ��ס���˫��������һ�ݡ� <br />4����Э���Լ���˫��ǩ��֮������Ч�������ϵ��ȷ�ϵ���Ϊǩ����Э�飩��</span></p>', null, null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('54', '���ͽ���Э��', '5', null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '<p><span style=\"font-family:Arial;\">һ������վ��Ϊ��Ա�ṩһ����Ϣ����ƽ̨������ҷ�����������������ṩ���������һ�������г�������վ�Խ���˫���������Լ��ӻ���ƣ��಻���뽻�׵Ĺ��̡�</span></p><p><span style=\"font-family:Arial;\">��������վ�����������м���ˮƽ�Ļ�����Ŭ��ȷ���������Ͻ���ƽ̨���������У�������������жϻ��ж�ʱ�����������ʱ���ڣ���֤��Ա���Ͻ������˳�����С��� </span></p><p><span style=\"font-family:Arial;\">��������վ������Ի�Ա��ע��ʹ�ñ���վ��Ϣƽ̨�����������뽻�׻�ע���йص����⼰��ӳ�������ʱ�����ظ����� ��<br />&nbsp;&nbsp;&nbsp; �ġ�����վ��Ȩ�Ի�Ա��ע�����Ͻ�����飬�Դ����κ�������ɵ�ע�����ϣ�����վ��Ȩ����֪ͨѯ�ʻ�Ա��Ҫ���Ա�������͡��������� �� <br />&nbsp;&nbsp;&nbsp; �塢��Ա���ڱ���վ���Ͻ�����������Ա�������׵ģ���Ա�����׸�֪����վ������վ֪Ϥ��������ģ�����˺󣬱���վ��Ȩͨ�������ʼ����绰��ϵ�����˫���˽����������������˽�����ͨ�������ʼ�����֪ͨ�Է�����Աͨ��˾���������շ�������Ҫ����վ�ṩ������ϣ�����վ��������ϲ��ṩ�й����ϡ�����</span></p><p><span style=\"font-family:Arial;\">������������Ϣƽ̨�������ԣ�����վû����������л�Ա�Ľ�����Ϊ�Լ��뽻���йص������������������飬���緢���������Σ�����վ��Ȩ�������û�Ա��ͬ�����ƻ�Ա�Ļ�����Ա��ʵ�й����ϡ���������֪ͨ����ʱ��ֹ����������ֹ���ܾ���û�Ա�ṩ����<br />&nbsp;&nbsp; ��һ������ԱΥ����Э������ἰ�����뱾Э�����ع��򣻡���<br />&nbsp;&nbsp; �����������ڻ�Ա������������֪ͨ����վ����Ϊĳ����Ա����彻���������Υ���򲻵���Ϊ�����ṩ���֤�ݣ�������վ�޷���ϵ���û�Ա��֤����֤�û�Ա����վ�ṩ���κ����ϣ����� <br />&nbsp;&nbsp; �����������ڻ�Ա������������֪ͨ����վ����Ϊĳ����Ա����彻���������Υ���򲻵���Ϊ�����ṩ���֤�ݡ�����վ����ͨ��רҵ�����ߵ�֪ʶˮƽ��׼��������ݽ����б𣬿���������Ϊ��Щ���ݻ���Ϊ���ܶԱ���վ��Ա����վ��ɲ�����ʧ�������Ρ��� ��<br />&nbsp;&nbsp;&nbsp; �ߡ����ݹ��ҷ��ɡ����桢�������¹涨����Э������ݺͱ���վ�����յ���ʵ���ݣ������϶��û�Ա����Υ����Υ����Э����Ϊ�Լ��ڱ���վ����ƽ̨�ϵ�����������Ϊ������վ��Ȩ�������û�Ա��ͬ���ڱ���վ����ƽ̨��������վ�������緢����ʽ�����û�Ա��Υ����Ϊ������Ȩ��ʱ����ɾ�������Ϣ����ֹ�����ṩ�ȴ���</span></p><p><span style=\"font-family:Arial;\">�ˡ�����վ���ݱ�Э�鼰��ع��򣬿��Զ��ᡢʹ�á������⸶���˿���û�Ա�ɴ沢�����ڱ���վ�˻��ڵ��ʽ𡣡���<br />&nbsp;&nbsp;&nbsp; �š�����վ��Ȩ�ڲ�֪ͨ��Ա��ǰ���£�ɾ�����ȡ���������Դ�ʩ����������Ϣ���������������Թ�ܷ���ΪĿ�ģ��Գ�������ΪĿ�ģ�������թ�ȶ����������ݣ������Ͻ����޹ػ����Խ���ΪĿ�ģ����ڶ��⾺�ۻ�������ͼ�������������������أ�����ϢΥ�������������������𺦱���վ��������Ա�Ϸ�����ġ�</span></p>', null, null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('59', '�ײ�', '5', null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '&amp;lt;ul&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ�&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ıı����ѧ�ʴ����ڲƸ�ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;li&amp;gt;&amp;lt;p&amp;gt;ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ıѧ���£�ı����ѧ�ʴ����ڲƸ���ıѧ���£�ı����ѧ�ʴ����ڲƸ���&amp;lt;/p&amp;gt;&amp;lt;/li&amp;gt;&amp;lt;/ul&amp;gt;', null, null, 'default,red,blue,orange');
INSERT INTO keke_witkey_tag VALUES ('44', '�̳�ҳ_������ϵ��ʽ', '5', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '', '', '0', '0', '0', '', '0', '0', '0', '0', '', '0', '0', '', '0', '0', '', '0', '0', '', '<ul><li></li><li>QQ :0101001</li><li>�绰:3838438</li></ul>', '0', null, null);
INSERT INTO keke_witkey_tag VALUES ('130', '��վ����', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '100', null, '0', '0', '0', '0', '69,70,71,72', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=help&spid={$v[catid]}#art_{$v[id]}\">{$v[title]}</a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('110', '�Զ���������', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, null, null, null, null, null, null, '0', '0', '', '��&lt;br /&gt;', '0', null, 'orange');
INSERT INTO keke_witkey_tag VALUES ('122', 'ʲô����������', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&nbsp;&lt;h3 class=&quot;font14b&quot;&gt;ʲô���������� &lt;/h3&gt;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &lt;p&gt;��������ָ����ڷ�������ʱ���Ƚ������ͽ�ȫ���йܵ���˽������ٴӷ����̽�����ѡ��������������<br />', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('123', '����Э��', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '<p class=\"font14\" style=\"text-indent:2em\"></p><p class=\"font14\" style=\"text-indent:2em\"></p><p class=\"font14\" style=\"text-indent:2em\"></p>&lt;p class=&quot;font14&quot; style=&quot;text-indent:2em&quot;&gt;��Э���ǹ��ڽ���˫�����������б����������Ʒ��֪ʶ��Ȩ�ƽ��ġ������������ѡ��һ���б���ƣ�������Ƴ�Ʒ�̵깺��һ����Ƶ�ʱ�򣬷����ߺ��б��߾ͻᱻ��Ϊ������һ����з���Լ������Э�顣������Һ����ҷֱ���������ʽͬ���Э������ һ���μ�һ��������ͣ���������һ������ҵ���ݣ�����Ĭ��Ϊͬ���Э�����������˴�Э��ĵ�����Ϊ��Һ�����������ѡ�����б����ң�������Ƴ�Ʒ�̵깺�����Ʒ������ߣ���������³������������ҡ��������ֹһ���������ң���ô��ҽ�����Ϊ���������ҵ���������Э�顣Э�����������ѡ�������е������ƣ�ת�õ���ƣ�������Ƴ�Ʒ�̵���ת�õ���Ƶ�����Ϊ׼��&lt;/p&gt;&lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;�˷���Э���ʹ�ñ���ͬ�����ǵ��ۺϷ���Э�顣 &lt;/span&gt;<span class=\"font14 block\" style=\"text-indent:2em\"></span><span class=\"font14 block\" style=\"text-indent:2em\"></span>', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('151', '��ҳ_�����õ�Ƭ', '9', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '999999', '{loop $datalist $k $v}\r\n<a href=\"{$v[ad_url]}\" title=\"{$v[ad_content]}\" target=\"_blank\"><img src=\"{$v[ad_file]}\" width=\"525\" height=\"300\" alt=\"Slide {$k}\"></a>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('129', '��վ����', '2', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, '0', '17', null, '0', '0', '0', '0', '', '4', null, null, '2', null, '', '0', '0', null, null, '3600', '{loop $datalist $v}\r\n<li><a href=\"index.php?do=article&view=article_info&art_id={$v[id]}\"><!--{eval echo kekezu::cutstr($v[title],23)}--></a></li>\r\n{/loop}', 'default');
INSERT INTO keke_witkey_tag VALUES ('125', '��Ʒ����Э��', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&lt;span class=&quot;font14&quot; style=&quot;text-indent:2em&quot;&gt;��Э���ǹ��ڽ���˫�����������б����������Ʒ��֪ʶ��Ȩ�ƽ��ġ�&lt;/span&gt; &lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;�����������ѡ��һ���б���ƣ��������<br />��Ʒ�̵깺��һ����Ƶ�ʱ�򣬷����ߺ��б��߾ͻᱻ��Ϊ������һ����з���Լ������Э�顣&lt;/span&gt; &lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;������Һ����ҷֱ���������ʽͬ���Э������ һ���μ�һ��������ͣ���������һ������ҵ���ݣ�����Ĭ��Ϊͬ���Э�����������˴�Э��ĵ�����Ϊ��Һ�����������ѡ�����б����ң�������Ƴ�Ʒ�̵깺�����Ʒ������ߣ���������³������������ҡ���&lt;/span&gt;&lt;span class=&quot;font14 block&quot; style=&quot;text-indent:2em&quot;&gt;�����ֹһ���������ң���ô��ҽ�����Ϊ���������ҵ���������Э�顣Э�����������ѡ�������е������ƣ�ת�õ���ƣ�������Ƴ�Ʒ�̵���ת�õ���Ƶ�����Ϊ׼��&lt;/span&gt;<br />', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('127', '�������Ļ�ӭҳ��', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&lt;div class=&quot;all_content&quot;&gt;&lt;div class=&quot;question mt_10&quot;&gt;&lt;h3 class=&quot;q_title pl_20 t_c&quot;&gt;��ӭ������������&lt;/h3&gt;&lt;/div&gt;&lt;div class=&quot;article pl_20 pr_20 pb_20&quot;&gt;&lt;h4 class=&quot;mt_10&quot;&gt;һƷ����������Э�飨���У�&lt;/h4&gt;&lt;p class=&quot;art_one&quot;&gt;һƷ�����������¼�ơ�����վ�������ݡ�һƷ����������Э�顷�����¼�ơ���Э�顱���Ĺ涨�ṩ���񣬱�Э����к�ͬЧ����ע���Աʱ�����������Ķ���Э�飬���Ĳ����ܻ򲻽��ܱ�Э�飨δ������Ӧ�ڷ����໤����ͬ�����ģ��������Ѿ�ע��Ϊ��վ��Ա������ʾ���ѳ���Ķ�����Ⲣͬ���Լ��뱾��վ������Э�飬������Ը�ܱ�Э�������Լ�������� վ��Ȩ��ʱ�����Э�鲢�ڱ���վ�����Թ��档���޶�������һ���ڱ���վ�Ĺ����������Զ���Ч��������ͬ����ر������ֹͣʹ�ñ���վ����Э�����ݰ���Э�����ļ�����һƷ�������Ѿ������ĸ���������й���Ϊ��Э�鲻�ɷָ��һ�����뱾Э�����ľ���ͬ�ȷ���Ч����һ��������ʹ�ñ���վ�����ʾ���ѽ��ܲ���Ը���ؾ��޶�������&lt;/p&gt;&lt;h4&gt;��һ�� ��Ա�ʸ�&lt;/h4&gt;&lt;p&gt;һ�� ֻ�з�����������֮һ����Ȼ�˻��˲��������Ϊ����վ��Ա������ʹ�ñ���վ�ķ���&lt;/p&gt;&lt;p&gt;��һ��������ʮ���꣬����������Ȩ��������������Ϊ��������Ȼ�ˣ�&lt;/p&gt;&lt;p&gt;����������������Ϊ�����˻�����������Ϊ������Ӧ������໤�˵�ͬ�⣻&lt;/p&gt;&lt;p&gt;�������������й����ɡ����桢�������³������Ϸ����ڵĻ��ء�����ҵ��λ��������֯��������֯���޷����ʸ�ĵ�λ��<br />��֯����ע��Ϊ����վ��Ա�ģ����뱾��վ֮���Э����ʼ��Ч������վһ�����֣���Ȩ����ע���û�Ա����׷����ʹ�ñ� ��վ�����һ�з������Ρ�&lt;/p&gt;&lt;p&gt;���� ��Ա��Ҫ�ṩ��ȷ����ϵ��ַ����ϵ�绰�����ṩ��ʵ���������ơ�&lt;/p&gt;&lt;h4&gt;�ڶ��� ��Ա��Ȩ��������&lt;/h4&gt;&lt;p&gt;һ����Ա��Ȩ���ݱ�Э�鼰����վ��������ع������ñ���վ����������Ϣ����ѯ��Ա��Ϣ���μ������ڱ���վ��������ز�Ʒ������Ϣ���μӱ���վ���йػ����Ȩ���ܱ���վ�ṩ�������й���Ѷ����Ϣ����&lt;/p&gt;&lt;p&gt;������Ա�����и����Լ��Ļ�Ա�˺ź����룬������ڻ�Ա�˺������·��������л�������������ڷ���������Ϣ�����ϵ��ͬ�����Э�顢���򡢲μӾ���ȣ��е����Ρ���Ա��Ȩ������Ҫ���ĵ�¼���˻��������롣&lt;/p&gt;&lt;p&gt;������ԱӦ������վ�ṩ��ʵ׼ȷ��ע����Ϣ����������������ʵ���������֤�š���ϵ�绰����ַ����������ȡ���֤����վ����ͨ��������ϵ��ʽ���Լ�������ϵ��ͬʱ����ԱҲӦ�����������ʵ�ʱ��ʱ��ʱ�����й�ע�����ϡ�&lt;/p&gt;&lt;p&gt;�ġ���Ա�������κ���ʽ����ת�û���Ȩ����ʹ���Լ��ڱ���վ�Ļ�Ա�ʺš�&lt;/p&gt;&lt;p&gt;�塢��Ա������ȷ���ڱ���վ�Ϸ�����������Ϣ��ʵ��׼ȷ�������ԡ�&lt;/p&gt; &lt;/div&gt;<br />&lt;/div&gt;', '3600', null, 'default,red');
INSERT INTO keke_witkey_tag VALUES ('155', 'ʲô��΢��ת������', '5', null, null, null, null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', null, null, null, null, null, null, '0', '0', '0', '0', null, '9', null, null, '2', null, null, '0', '0', null, '&nbsp;<h3 class=\"font14b\">ʲô��΢��ת������ </h3><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <p>΢��ת������ָ����ڷ�������ʱ���Ƚ������ͽ�ȫ���йܵ���˽������ٴӷ����̽�����ѡ��������������<br /></p>', '3600', null, 'default');

-- ----------------------------
-- Table structure for `keke_witkey_task`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task`;
CREATE TABLE `keke_witkey_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` char(10) DEFAULT NULL,
  `work_count` int(11) DEFAULT NULL,
  `single_cash` float(10,2) DEFAULT NULL,
  `profit_rate` int(3) DEFAULT NULL,
  `task_fail_rate` int(3) DEFAULT NULL,
  `task_status` int(11) DEFAULT '0',
  `task_title` varchar(100) DEFAULT NULL,
  `task_desc` text,
  `task_file` varchar(100) DEFAULT NULL,
  `task_pic` varchar(100) DEFAULT NULL,
  `indus_id` int(11) DEFAULT '0',
  `indus_pid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `start_time` int(10) DEFAULT '0',
  `sub_time` int(10) DEFAULT NULL,
  `end_time` int(10) DEFAULT '0',
  `sp_end_time` int(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `task_cash` decimal(10,2) DEFAULT '0.00',
  `real_cash` decimal(10,2) DEFAULT '0.00',
  `task_cash_coverage` int(11) DEFAULT NULL,
  `cash_cost` decimal(10,2) DEFAULT '0.00',
  `credit_cost` decimal(10,2) DEFAULT '0.00',
  `view_num` int(11) DEFAULT '0',
  `work_num` int(11) DEFAULT '0',
  `leave_num` int(11) DEFAULT '0',
  `focus_num` int(11) DEFAULT '0',
  `mark_num` int(11) DEFAULT '0',
  `is_delineas` int(11) DEFAULT '0',
  `kf_uid` int(11) DEFAULT '0',
  `pay_item` varchar(50) DEFAULT NULL,
  `att_cash` decimal(8,2) DEFAULT '0.00',
  `contact` varchar(255) DEFAULT NULL,
  `unique_num` char(8) DEFAULT NULL,
  `ext_desc` text,
  `task_union` tinyint(1) DEFAULT '0',
  `alipay_trust` tinyint(1) DEFAULT NULL,
  `is_delay` tinyint(1) DEFAULT '0',
  `r_task_id` int(11) DEFAULT NULL,
  `is_trust` tinyint(1) DEFAULT '0',
  `trust_type` char(20) DEFAULT NULL,
  `is_top` int(1) DEFAULT '0',
  `is_auto_bid` int(1) DEFAULT '0',
  `point` varchar(100) DEFAULT NULL,
  `payitem_time` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`task_id`),
  KEY `task_id` (`task_id`),
  KEY `model_id` (`model_id`),
  KEY `uid` (`uid`),
  KEY `indus_id` (`indus_id`),
  KEY `task_status` (`task_status`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_bid`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_bid`;
CREATE TABLE `keke_witkey_task_bid` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `quote` decimal(8,2) DEFAULT NULL,
  `cycle` int(11) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `message` text,
  `bid_status` int(11) DEFAULT '0',
  `bid_time` int(11) DEFAULT '0',
  `hidden_status` int(11) DEFAULT NULL,
  `ext_status` int(11) DEFAULT NULL,
  `comment_num` int(11) DEFAULT '0',
  PRIMARY KEY (`bid_id`),
  KEY `index_2` (`task_id`),
  KEY `index_3` (`uid`),
  KEY `index_4` (`bid_status`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_bid
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_cash_cove`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_cash_cove`;
CREATE TABLE `keke_witkey_task_cash_cove` (
  `cash_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_cove` float(10,2) DEFAULT NULL,
  `end_cove` float(10,2) DEFAULT NULL,
  `cove_desc` varchar(250) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `model_code` char(20) DEFAULT NULL,
  PRIMARY KEY (`cash_rule_id`),
  KEY `cash_rule_id` (`cash_rule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_cash_cove
-- ----------------------------
INSERT INTO keke_witkey_task_cash_cove VALUES ('1', '500.00', '1003.00', '500.00Ԫ-1003.00Ԫ', '1332560481', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('2', '1000.00', '2000.00', '1000.00Ԫ��2000.00Ԫ', '1315625322', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('3', '2000.00', '5000.00', '2000.00Ԫ��5000.00Ԫ', '1294303661', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('4', '5000.00', '10000.00', '5000.00Ԫ��10000.00Ԫ', '1294303661', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('5', '10000.00', '50000.00', '10000.00Ԫ��50000.00Ԫ', '1294303661', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('11', '6000.00', '10000.00', '6000.00Ԫ-10000.00Ԫ', '1332560493', 'tender');
INSERT INTO keke_witkey_task_cash_cove VALUES ('12', '100.00', '300.00', '100.00Ԫ-300.00Ԫ', '1332563125', 'dtender');

-- ----------------------------
-- Table structure for `keke_witkey_task_delay`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_delay`;
CREATE TABLE `keke_witkey_task_delay` (
  `delay_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `delay_cash` decimal(10,2) DEFAULT '0.00',
  `delay_day` int(10) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `on_time` int(11) DEFAULT NULL,
  `delay_status` int(11) DEFAULT '0',
  PRIMARY KEY (`delay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_delay
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_delay_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_delay_rule`;
CREATE TABLE `keke_witkey_task_delay_rule` (
  `defer_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `defer_times` int(11) DEFAULT '0',
  `defer_rate` float(11,2) DEFAULT '0.00',
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`defer_rule_id`),
  KEY `index_2` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_delay_rule
-- ----------------------------
INSERT INTO keke_witkey_task_delay_rule VALUES ('10', '1', '1.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('11', '2', '2.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('12', '3', '3.00', '1');
INSERT INTO keke_witkey_task_delay_rule VALUES ('13', '2', '15.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('14', '3', '20.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('9', '1', '10.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('15', '4', '1.00', '3');
INSERT INTO keke_witkey_task_delay_rule VALUES ('18', '1', '10.00', '2');
INSERT INTO keke_witkey_task_delay_rule VALUES ('19', '2', '20.00', '2');

-- ----------------------------
-- Table structure for `keke_witkey_task_frost`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_frost`;
CREATE TABLE `keke_witkey_task_frost` (
  `frost_id` int(11) NOT NULL AUTO_INCREMENT,
  `frost_status` int(11) DEFAULT '0',
  `task_id` int(11) DEFAULT '0',
  `frost_time` int(11) DEFAULT '0',
  `restore_time` int(11) DEFAULT '0',
  `admin_uid` int(11) DEFAULT '0',
  `admin_username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`frost_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_frost
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_plan`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_plan`;
CREATE TABLE `keke_witkey_task_plan` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bid_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `plan_title` varchar(150) DEFAULT NULL,
  `plan_desc` text,
  `plan_step` tinyint(4) DEFAULT NULL,
  `plan_amount` decimal(10,2) DEFAULT '0.00',
  `plan_status` char(10) DEFAULT NULL,
  `start_time` int(10) DEFAULT NULL,
  `end_time` int(10) DEFAULT NULL,
  `over_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`plan_id`),
  UNIQUE KEY `plan_id` (`plan_id`),
  KEY `task_id` (`task_id`),
  KEY `bid_id` (`bid_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_plan
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_prize`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_prize`;
CREATE TABLE `keke_witkey_task_prize` (
  `prize_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `prize` int(11) DEFAULT NULL,
  `prize_count` int(11) DEFAULT NULL,
  `prize_cash` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`prize_id`),
  KEY `task_id` (`task_id`),
  KEY `prize_id` (`prize_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_prize
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_relation`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_relation`;
CREATE TABLE `keke_witkey_task_relation` (
  `relation_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `r_task_id` int(11) DEFAULT NULL,
  `app_id` bigint(30) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`relation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_relation
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_task_time_rule`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_time_rule`;
CREATE TABLE `keke_witkey_task_time_rule` (
  `day_rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_cash` float(10,2) DEFAULT '0.00',
  `rule_day` int(11) DEFAULT '0',
  `model_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`day_rule_id`),
  KEY `index_2` (`model_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1343 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_time_rule
-- ----------------------------
INSERT INTO keke_witkey_task_time_rule VALUES ('1301', '200.00', '30', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1318', '100.00', '10', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('3', '500.00', '40', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('2', '200.00', '30', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('1298', '100.00', '20', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1306', '200.00', '30', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1302', '100.00', '20', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1303', '500.00', '40', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1319', '500.00', '20', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1320', '2000.00', '30', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1321', '4000.00', '40', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1337', '1000.00', '60', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1323', '2000.00', '4000', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1324', '3000.00', '6000', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1325', '4000.00', '8000', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1336', '500.00', '40', '2');
INSERT INTO keke_witkey_task_time_rule VALUES ('1335', '1000.00', '60', '1');
INSERT INTO keke_witkey_task_time_rule VALUES ('1328', '7000.00', '50', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1329', '10000.00', '60', '9');
INSERT INTO keke_witkey_task_time_rule VALUES ('1332', '1000.00', '500', '8');
INSERT INTO keke_witkey_task_time_rule VALUES ('1340', '100.00', '5', '10');
INSERT INTO keke_witkey_task_time_rule VALUES ('1338', '1000.00', '60', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1339', '2000.00', '90', '3');
INSERT INTO keke_witkey_task_time_rule VALUES ('1341', '500.00', '10', '10');
INSERT INTO keke_witkey_task_time_rule VALUES ('1342', '1000.00', '15', '10');

-- ----------------------------
-- Table structure for `keke_witkey_task_work`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_task_work`;
CREATE TABLE `keke_witkey_task_work` (
  `work_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` char(50) DEFAULT NULL,
  `work_title` varchar(100) DEFAULT NULL,
  `work_price` decimal(10,3) DEFAULT '0.000',
  `work_desc` text,
  `work_file` varchar(100) DEFAULT NULL,
  `work_pic` varchar(100) DEFAULT NULL,
  `work_time` int(11) DEFAULT '0',
  `hide_work` int(11) DEFAULT NULL,
  `vote_num` int(11) unsigned DEFAULT '0',
  `comment_num` int(11) DEFAULT '0',
  `work_status` int(11) DEFAULT '0',
  PRIMARY KEY (`work_id`),
  KEY `task_id` (`task_id`),
  KEY `uid` (`uid`),
  KEY `work_status` (`work_status`),
  KEY `work_time` (`work_time`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_task_work
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_template`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_template`;
CREATE TABLE `keke_witkey_template` (
  `tpl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpl_title` varchar(200) DEFAULT NULL,
  `tpl_desc` text,
  `develop` varchar(50) DEFAULT NULL,
  `tpl_pic` varchar(200) DEFAULT NULL,
  `tpl_path` varchar(200) DEFAULT NULL,
  `is_selected` int(2) DEFAULT '0',
  `on_time` int(11) DEFAULT '0',
  PRIMARY KEY (`tpl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_template
-- ----------------------------
INSERT INTO keke_witkey_template VALUES ('1', 'default', '��רҵ������ģ��', '���', 'blue', 'default', '1', '1274131150');

-- ----------------------------
-- Table structure for `keke_witkey_unit_image`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_unit_image`;
CREATE TABLE `keke_witkey_unit_image` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(50) DEFAULT NULL,
  `unit_pic` varchar(50) DEFAULT NULL,
  `unit_type` int(11) DEFAULT '1',
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_unit_image
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_vote`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_vote`;
CREATE TABLE `keke_witkey_vote` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT '0',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `vote_ip` varchar(50) DEFAULT '0',
  `vote_time` int(11) DEFAULT '0',
  PRIMARY KEY (`vote_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_vote
-- ----------------------------

-- ----------------------------
-- Table structure for `keke_witkey_withdraw`
-- ----------------------------
DROP TABLE IF EXISTS `keke_witkey_withdraw`;
CREATE TABLE `keke_witkey_withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `withdraw_cash` decimal(10,2) DEFAULT '0.00',
  `uid` int(11) DEFAULT '0',
  `username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pay_username` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `withdraw_status` int(11) DEFAULT '0',
  `applic_time` int(11) DEFAULT '0',
  `process_uid` int(11) DEFAULT '0',
  `process_username` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `process_time` int(11) DEFAULT '0',
  `pay_account` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `pay_type` char(20) CHARACTER SET utf8 DEFAULT '0',
  PRIMARY KEY (`withdraw_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of keke_witkey_withdraw
-- ----------------------------
