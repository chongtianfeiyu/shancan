-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- 主机: localhost
-- 生成日期: 2012 年 07 月 27 日 04:11
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: 'hck'
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_admin'
-- 

CREATE TABLE hck_admin (
  adminid smallint(6) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  adminname varchar(20) collate gbk_bin NOT NULL,
  `password` varchar(100) collate gbk_bin NOT NULL,
  email varchar(100) collate gbk_bin NOT NULL,
  zuid smallint(2) unsigned NOT NULL default '0',
  isfounder tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (adminid),
  KEY adminname (adminname),
  KEY zuid (zuid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_admin_log'
-- 

CREATE TABLE hck_admin_log (
  id int(11) NOT NULL auto_increment,
  ip varchar(50) collate gbk_bin NOT NULL,
  ztime int(11) unsigned NOT NULL default '0',
  logdesc varchar(400) collate gbk_bin NOT NULL,
  adminname varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_admin_zu'
-- 

CREATE TABLE hck_admin_zu (
  id smallint(6) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  title varchar(50) collate gbk_bin NOT NULL,
  orderindex smallint(6) unsigned NOT NULL default '0',
  content text collate gbk_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_art'
-- 

CREATE TABLE hck_art (
  id mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  userid mediumint(8) unsigned NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  keyword varchar(125) collate gbk_bin NOT NULL,
  des varchar(255) collate gbk_bin NOT NULL,
  click smallint(6) unsigned NOT NULL default '0',
  catid smallint(6) unsigned NOT NULL default '0',
  isding tinyint(4) unsigned NOT NULL default '0',
  ishot tinyint(4) unsigned NOT NULL default '0',
  isnew tinyint(4) unsigned NOT NULL default '0',
  istop int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY title_sitei_id (title,siteid,id),
  KEY catid_siteid_id (catid,siteid,id),
  KEY title_catid_siteid_id (title,catid,siteid,id),
  KEY siteid_id (siteid,id,isnew),
  KEY siteid_isnew_id (siteid,isnew,id),
  KEY siteid_ishot_id (siteid,ishot,id),
  KEY siteid_isding_id (siteid,isding,id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_art_cat'
-- 

CREATE TABLE hck_art_cat (
  catid smallint(6) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  cname varchar(50) collate gbk_bin NOT NULL,
  title varchar(200) collate gbk_bin NOT NULL,
  orderid smallint(6) unsigned NOT NULL default '0',
  pid smallint(6) unsigned NOT NULL default '0',
  keyword varchar(200) collate gbk_bin NOT NULL,
  info varchar(250) collate gbk_bin NOT NULL,
  cattpl varchar(50) collate gbk_bin NOT NULL,
  listtpl varchar(50) collate gbk_bin NOT NULL,
  contpl varchar(50) collate gbk_bin NOT NULL,
  t tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (catid),
  KEY orderid (orderid),
  KEY shopid (shopid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_art_comment'
-- 

CREATE TABLE hck_art_comment (
  rid int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  pid mediumint(9) unsigned NOT NULL default '0',
  userid mediumint(8) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  content varchar(255) collate gbk_bin NOT NULL,
  ip varchar(30) collate gbk_bin NOT NULL,
  reply varchar(1000) collate gbk_bin NOT NULL,
  `status` tinyint(1) unsigned NOT NULL default '0',
  username varchar(30) collate gbk_bin NOT NULL,
  PRIMARY KEY  (rid),
  KEY siteid_status_rid (siteid,`status`,rid),
  KEY shopid_status_rid (shopid,`status`,rid),
  KEY pid_siteid_status_rid (pid,siteid,`status`,rid),
  KEY pid_shopid_status_rid (pid,shopid,`status`,rid),
  KEY userid_rid (userid,rid),
  KEY pid_status_rid (pid,`status`,rid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_art_data'
-- 

CREATE TABLE hck_art_data (
  id mediumint(8) unsigned NOT NULL,
  content text collate gbk_bin NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai'
-- 

CREATE TABLE hck_cai (
  id mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  title varchar(50) collate gbk_bin NOT NULL,
  catid mediumint(8) unsigned NOT NULL default '0',
  isding tinyint(1) unsigned NOT NULL default '0',
  reply smallint(6) NOT NULL default '0',
  img varchar(100) collate gbk_bin NOT NULL,
  des varchar(255) collate gbk_bin NOT NULL,
  keyword varchar(200) collate gbk_bin NOT NULL,
  author varchar(50) collate gbk_bin NOT NULL,
  cainum smallint(6) unsigned NOT NULL default '10',
  dateline int(11) unsigned NOT NULL default '0',
  thum_img varchar(100) collate gbk_bin NOT NULL,
  delicious int(11) unsigned NOT NULL default '0' COMMENT '好吃',
  ishot tinyint(1) unsigned NOT NULL default '0',
  isnew tinyint(1) unsigned NOT NULL default '0',
  visible tinyint(1) unsigned NOT NULL default '1',
  price decimal(8,2) NOT NULL default '0.00',
  doid smallint(6) unsigned NOT NULL default '0',
  weiid smallint(6) unsigned NOT NULL default '0',
  promote tinyint(1) unsigned NOT NULL default '0',
  undelicious int(11) unsigned NOT NULL default '0' COMMENT '难吃',
  lowprice decimal(8,2) NOT NULL default '0.00',
  oos tinyint(1) unsigned NOT NULL default '0' COMMENT '缺货',
  middle_img varchar(255) collate gbk_bin NOT NULL,
  orders mediumint(9) unsigned NOT NULL default '0',
  week1 tinyint(1) unsigned NOT NULL default '0',
  week2 tinyint(1) unsigned NOT NULL default '0',
  week3 tinyint(1) unsigned NOT NULL default '0',
  week4 tinyint(1) unsigned NOT NULL default '0',
  week5 tinyint(1) unsigned NOT NULL default '0',
  week6 tinyint(1) unsigned NOT NULL default '0',
  week7 tinyint(1) unsigned NOT NULL default '0',
  click smallint(6) unsigned NOT NULL default '0',
  favs mediumint(9) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY catid (catid),
  KEY doid (doid),
  KEY weiid (weiid),
  KEY shopid (shopid),
  KEY week1_id (week1,id),
  KEY week2_id (week2,id),
  KEY week3_id (week3,id),
  KEY week4_id (week4,id),
  KEY week5_id (week5,id),
  KEY week6_id (week6,id),
  KEY week7_id (week7,id),
  KEY siteid_id (siteid,id),
  KEY siteid_isding_id (siteid,isding,id),
  KEY siteid_ishot_id USING BTREE (siteid,ishot,id),
  KEY title_siteid_shopid_id (title,siteid,shopid,id),
  KEY catid_visible_shopid_id (catid,visible,shopid,id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai_cat'
-- 

CREATE TABLE hck_cai_cat (
  catid mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  cname varchar(50) collate gbk_bin NOT NULL,
  orderid smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (catid),
  KEY shopid (shopid),
  KEY orderid (orderid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai_comment'
-- 

CREATE TABLE hck_cai_comment (
  rid int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  pid mediumint(6) unsigned NOT NULL default '0',
  userid mediumint(8) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  content varchar(255) collate gbk_bin NOT NULL,
  reply varchar(255) collate gbk_bin NOT NULL,
  ip varchar(50) collate gbk_bin NOT NULL,
  `status` tinyint(1) unsigned NOT NULL default '0',
  username varchar(30) collate gbk_bin NOT NULL,
  PRIMARY KEY  (rid),
  KEY siteid_rid (siteid,rid),
  KEY siteid_status_rid (siteid,`status`,rid),
  KEY shopid_status_rid (shopid,`status`,rid),
  KEY pid_shopid_status_rid (pid,`status`,shopid,rid),
  KEY pid_siteid_status_rid (pid,siteid,`status`,rid),
  KEY pid_status_rid (pid,`status`,rid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai_data'
-- 

CREATE TABLE hck_cai_data (
  id mediumint(9) NOT NULL,
  content text character set gbk NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai_do'
-- 

CREATE TABLE hck_cai_do (
  id smallint(6) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  dname varchar(50) collate gbk_bin NOT NULL,
  orderid smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai_ping'
-- 

CREATE TABLE hck_cai_ping (
  id int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  caiid smallint(6) unsigned NOT NULL default '0',
  userid mediumint(8) unsigned NOT NULL default '0',
  ctype tinyint(4) NOT NULL default '0',
  ip varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY caiid (caiid,userid),
  KEY shopid (shopid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai_tags'
-- 

CREATE TABLE hck_cai_tags (
  caiid mediumint(8) unsigned NOT NULL default '0',
  tagname varchar(30) collate gbk_bin NOT NULL,
  KEY caiid (caiid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cai_wei'
-- 

CREATE TABLE hck_cai_wei (
  id smallint(6) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  wname varchar(50) collate gbk_bin NOT NULL,
  orderid smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_city'
-- 

CREATE TABLE hck_city (
  cityid mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  provinceid mediumint(8) unsigned NOT NULL default '0',
  city varchar(30) collate gbk_bin NOT NULL,
  orderindex smallint(6) unsigned NOT NULL default '0',
  lat decimal(9,6) NOT NULL,
  lng decimal(9,6) NOT NULL,
  PRIMARY KEY  (cityid),
  KEY orderindex (orderindex),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_config'
-- 

CREATE TABLE hck_config (
  id tinyint(1) NOT NULL auto_increment,
  opentime tinyint(4) NOT NULL default '0',
  phone_on tinyint(4) NOT NULL default '0',
  phone_user varchar(100) collate gbk_bin NOT NULL,
  phone_pwd varchar(100) collate gbk_bin NOT NULL,
  phone_num varchar(20) collate gbk_bin NOT NULL,
  smtphost varchar(100) collate gbk_bin NOT NULL,
  smtpport smallint(6) NOT NULL default '0',
  smtpemail varchar(100) collate gbk_bin NOT NULL,
  smtpuser varchar(100) collate gbk_bin NOT NULL,
  smtppwd varchar(100) collate gbk_bin NOT NULL,
  water_on tinyint(4) NOT NULL default '0',
  water_type tinyint(4) NOT NULL default '0',
  water_pos tinyint(4) NOT NULL default '0',
  water_str varchar(100) collate gbk_bin NOT NULL,
  water_img varchar(100) collate gbk_bin NOT NULL,
  water_size tinyint(4) NOT NULL default '0',
  rewrite_on tinyint(1) NOT NULL default '0',
  sina_on tinyint(4) NOT NULL default '0',
  qq_on tinyint(4) NOT NULL default '0',
  sina_user varchar(100) collate gbk_bin NOT NULL,
  sina_pwd varchar(100) collate gbk_bin NOT NULL,
  qq_user varchar(100) collate gbk_bin NOT NULL,
  qq_pwd varchar(100) collate gbk_bin NOT NULL,
  spread_on tinyint(4) NOT NULL default '0',
  spread_discount tinyint(4) NOT NULL default '0',
  grade_on tinyint(4) NOT NULL default '0',
  starthour tinyint(4) NOT NULL default '0',
  endhour tinyint(4) NOT NULL default '0',
  startminute tinyint(4) NOT NULL default '0',
  endminute tinyint(4) NOT NULL default '0',
  showweek tinyint(1) NOT NULL default '0',
  minprice decimal(8,2) NOT NULL,
  shopid mediumint(9) NOT NULL default '0',
  thumb_width smallint(6) NOT NULL default '0',
  thumb_height smallint(6) NOT NULL default '0',
  alipay tinyint(1) NOT NULL default '0',
  tenpay tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cook'
-- 

CREATE TABLE hck_cook (
  cookid mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  nickname varchar(100) collate gbk_bin NOT NULL,
  weibo varchar(100) collate gbk_bin NOT NULL,
  pic varchar(100) collate gbk_bin NOT NULL,
  info varchar(255) collate gbk_bin NOT NULL,
  url varchar(100) collate gbk_bin NOT NULL,
  content text collate gbk_bin NOT NULL,
  isding tinyint(4) unsigned NOT NULL default '0',
  orderid tinyint(4) unsigned NOT NULL default '0',
  grade int(11) unsigned NOT NULL default '0',
  click int(11) unsigned NOT NULL default '0',
  delicious int(11) unsigned NOT NULL default '0',
  undelicious int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (cookid),
  KEY nickname (nickname),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cook_cai'
-- 

CREATE TABLE hck_cook_cai (
  id int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  caiid mediumint(8) unsigned NOT NULL default '0',
  cookid mediumint(8) unsigned NOT NULL default '0',
  orderid tinyint(4) unsigned NOT NULL default '0',
  shopid mediumint(9) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cook_comment'
-- 

CREATE TABLE hck_cook_comment (
  rid int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(8) unsigned NOT NULL default '0',
  pid smallint(6) NOT NULL default '0',
  userid int(11) NOT NULL default '0',
  dateline int(11) NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  content text collate gbk_bin NOT NULL,
  reply text collate gbk_bin NOT NULL,
  ip varchar(50) collate gbk_bin NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  username varchar(30) collate gbk_bin NOT NULL,
  PRIMARY KEY  (rid),
  KEY shopid_status_rid (shopid,`status`,rid),
  KEY siteid_status_rid (siteid,`status`,rid),
  KEY pid_siteid_status_rid (pid,siteid,`status`,rid),
  KEY pid_shopid_status_rid (pid,shopid,`status`,rid),
  KEY pid_status_rid (pid,`status`,rid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_cook_ping'
-- 

CREATE TABLE hck_cook_ping (
  id int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  cookid smallint(6) NOT NULL default '0',
  userid int(11) NOT NULL default '0',
  ctype tinyint(4) NOT NULL default '0',
  ip varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY caiid (cookid,userid),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_fav_shop'
-- 

CREATE TABLE hck_fav_shop (
  id int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid int(11) unsigned NOT NULL,
  userid mediumint(9) unsigned NOT NULL,
  dateline int(11) unsigned NOT NULL,
  PRIMARY KEY  (id),
  KEY shopid (shopid,userid),
  KEY userid (userid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_flash'
-- 

CREATE TABLE hck_flash (
  fid mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  ftitle varchar(50) collate gbk_bin NOT NULL,
  furl varchar(100) collate gbk_bin NOT NULL,
  fimg varchar(100) collate gbk_bin NOT NULL,
  forder tinyint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (fid),
  KEY shopid (shopid),
  KEY siteid_fid (siteid,fid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_goods'
-- 

CREATE TABLE hck_goods (
  id mediumint(8) unsigned NOT NULL auto_increment,
  catid smallint(5) unsigned NOT NULL default '0',
  title varchar(50) collate gbk_bin NOT NULL,
  thumb_img varchar(255) collate gbk_bin NOT NULL,
  middle_img varchar(255) collate gbk_bin NOT NULL,
  img varchar(255) collate gbk_bin NOT NULL,
  info varchar(255) collate gbk_bin NOT NULL,
  price decimal(8,2) NOT NULL,
  grade mediumint(9) unsigned NOT NULL,
  content text collate gbk_bin NOT NULL,
  orders mediumint(9) unsigned NOT NULL,
  visible tinyint(1) unsigned NOT NULL,
  comments mediumint(9) unsigned NOT NULL,
  clicks mediumint(9) unsigned NOT NULL,
  isrecommend tinyint(1) unsigned NOT NULL,
  isnew tinyint(1) unsigned NOT NULL,
  ishot tinyint(1) unsigned NOT NULL,
  keyword varchar(255) collate gbk_bin NOT NULL,
  dateline int(11) unsigned NOT NULL,
  PRIMARY KEY  (id),
  KEY title_id (title,id),
  KEY title_catid_id (title,catid,id),
  KEY catid_id (catid,id),
  KEY visible_catid (visible,catid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_goods_cat'
-- 

CREATE TABLE hck_goods_cat (
  catid smallint(5) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  cname varchar(20) collate gbk_bin NOT NULL,
  orderindex smallint(6) unsigned NOT NULL,
  t tinyint(1) unsigned NOT NULL,
  cattpl varchar(50) collate gbk_bin NOT NULL,
  listtpl varchar(50) collate gbk_bin NOT NULL,
  contpl varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (catid),
  KEY orderindex (orderindex),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_goods_comment'
-- 

CREATE TABLE hck_goods_comment (
  rid int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  pid mediumint(8) unsigned NOT NULL default '0',
  userid mediumint(9) unsigned NOT NULL default '0',
  dateline int(11) NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  content varchar(2000) collate gbk_bin NOT NULL,
  reply varchar(1000) collate gbk_bin NOT NULL,
  ip varchar(50) collate gbk_bin NOT NULL,
  `status` tinyint(4) unsigned NOT NULL default '0',
  username varchar(30) collate gbk_bin NOT NULL,
  PRIMARY KEY  (rid),
  KEY pid_status_rid (pid,`status`,rid),
  KEY siteid_status_rid (siteid,`status`,rid),
  KEY pid_siteid_status_rid (pid,siteid,`status`,rid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_goods_order'
-- 

CREATE TABLE hck_goods_order (
  id int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  orderno varchar(50) collate gbk_bin NOT NULL,
  goodsid mediumint(8) unsigned NOT NULL,
  grade mediumint(9) unsigned NOT NULL,
  userid mediumint(9) unsigned NOT NULL,
  nickname varchar(20) collate gbk_bin NOT NULL,
  address varchar(50) collate gbk_bin NOT NULL,
  `status` tinyint(2) unsigned NOT NULL,
  phone varchar(20) collate gbk_bin NOT NULL,
  email varchar(20) collate gbk_bin NOT NULL,
  content text collate gbk_bin NOT NULL,
  sendtype tinyint(4) unsigned NOT NULL,
  isvalid tinyint(1) unsigned NOT NULL,
  money decimal(8,2) NOT NULL,
  dateline int(11) unsigned NOT NULL,
  PRIMARY KEY  (id),
  KEY orderno (orderno),
  KEY money (money),
  KEY dateline_id (dateline,id),
  KEY sendtype_id (sendtype,id),
  KEY userid_isvalid_id (userid,isvalid,id),
  KEY isvalid_id (isvalid,id),
  KEY isvalid_dateline_id (isvalid,dateline,id),
  KEY userid_sendtype_grade (userid,sendtype,grade)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_grade'
-- 

CREATE TABLE hck_grade (
  id int(11) NOT NULL auto_increment,
  userid mediumint(9) unsigned NOT NULL default '0',
  grade decimal(8,2) NOT NULL default '0.00',
  PRIMARY KEY  (id),
  KEY userid (userid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_grade_log'
-- 

CREATE TABLE hck_grade_log (
  id int(11) NOT NULL auto_increment,
  userid mediumint(9) unsigned NOT NULL default '0',
  content varchar(200) collate gbk_bin NOT NULL,
  grade decimal(8,2) NOT NULL,
  dateline int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_groupbuy'
-- 

CREATE TABLE hck_groupbuy (
  id int(11) NOT NULL auto_increment,
  title varchar(50) character set gbk NOT NULL,
  img varchar(200) character set gbk NOT NULL,
  siteid smallint(6) NOT NULL,
  shopid int(11) NOT NULL,
  catid smallint(5) unsigned NOT NULL,
  joins mediumint(8) unsigned NOT NULL,
  minjoins smallint(5) unsigned NOT NULL,
  goodsprice decimal(9,1) NOT NULL,
  groupprice decimal(9,1) NOT NULL,
  endtime int(11) NOT NULL,
  shopname varchar(20) character set gbk NOT NULL,
  `status` tinyint(4) NOT NULL,
  isrecommend tinyint(4) NOT NULL,
  info varchar(255) character set gbk NOT NULL,
  content text character set gbk NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_groupbuy_category'
-- 

CREATE TABLE hck_groupbuy_category (
  catid int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL,
  cname varchar(25) NOT NULL,
  orderindex tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (catid)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_groupbuy_order'
-- 

CREATE TABLE hck_groupbuy_order (
  orderid int(10) unsigned NOT NULL auto_increment,
  groupid int(10) unsigned NOT NULL,
  userid int(10) unsigned NOT NULL,
  phone varchar(20) character set gbk NOT NULL,
  address varchar(100) character set gbk NOT NULL,
  goodsnum smallint(5) unsigned NOT NULL,
  title varchar(50) character set gbk NOT NULL,
  dateline int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  groupprice decimal(8,2) NOT NULL,
  totalprice decimal(8,2) NOT NULL,
  nickname varchar(20) NOT NULL,
  ispay tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (orderid)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_guest'
-- 

CREATE TABLE hck_guest (
  id int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  userid mediumint(8) unsigned NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  content varchar(255) collate gbk_bin NOT NULL,
  dateline int(11) unsigned NOT NULL default '0',
  ip varchar(50) collate gbk_bin NOT NULL,
  reply varchar(255) collate gbk_bin NOT NULL,
  qq int(11) NOT NULL default '0',
  email varchar(100) collate gbk_bin NOT NULL,
  phone varchar(20) collate gbk_bin NOT NULL,
  `status` tinyint(1) unsigned NOT NULL default '0',
  username varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY status_id (`status`,id),
  KEY status_shopid_id (`status`,shopid,id),
  KEY userid_id (userid,id),
  KEY userid_shopid_id (userid,shopid,id),
  KEY shopid_id (shopid,id),
  KEY siteid_status_id (siteid,`status`,id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_hotarea'
-- 

CREATE TABLE hck_hotarea (
  id mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL,
  title varchar(50) collate gbk_bin NOT NULL,
  lat decimal(9,6) NOT NULL,
  lng decimal(9,6) NOT NULL,
  orderindex tinyint(4) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_html'
-- 

CREATE TABLE hck_html (
  id mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  userid mediumint(9) unsigned NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  keyword varchar(200) collate gbk_bin NOT NULL,
  des varchar(255) collate gbk_bin NOT NULL,
  tagname varchar(20) collate gbk_bin NOT NULL,
  content text collate gbk_bin NOT NULL,
  orderid smallint(6) unsigned NOT NULL default '0',
  isnav tinyint(1) unsigned NOT NULL default '0',
  catid tinyint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY tagname (tagname),
  KEY shopid (shopid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_html_cat'
-- 

CREATE TABLE hck_html_cat (
  catid tinyint(4) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  cname varchar(100) collate gbk_bin NOT NULL,
  orderid tinyint(4) unsigned NOT NULL default '0',
  PRIMARY KEY  (catid),
  KEY shopid (shopid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_link'
-- 

CREATE TABLE hck_link (
  id smallint(6) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  title varchar(50) collate gbk_bin NOT NULL,
  linkurl varchar(100) collate gbk_bin NOT NULL,
  linkimg varchar(100) collate gbk_bin NOT NULL,
  linktype tinyint(1) NOT NULL default '0',
  orderid smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_message'
-- 

CREATE TABLE hck_message (
  id int(10) unsigned NOT NULL auto_increment,
  userid mediumint(8) unsigned NOT NULL,
  content text character set gbk collate gbk_bin NOT NULL,
  dateline int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (id),
  KEY status_id (`status`,id),
  KEY userid_status_id (userid,`status`,id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_nav'
-- 

CREATE TABLE hck_nav (
  id smallint(6) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  title varchar(30) collate gbk_bin NOT NULL,
  navurl varchar(100) collate gbk_bin NOT NULL,
  orderid smallint(6) unsigned NOT NULL default '0',
  ctype tinyint(4) unsigned NOT NULL default '0',
  pid smallint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY shopid (shopid),
  KEY pid (pid),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_order'
-- 

CREATE TABLE hck_order (
  id int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  userid mediumint(9) unsigned NOT NULL default '0',
  isvalid tinyint(1) unsigned NOT NULL default '0',
  money decimal(9,2) NOT NULL default '0.00',
  dateline int(11) unsigned NOT NULL default '0',
  orderno varchar(20) collate gbk_bin NOT NULL,
  ssid varchar(60) collate gbk_bin NOT NULL,
  orderphone varchar(30) collate gbk_bin NOT NULL,
  orderaddress varchar(200) collate gbk_bin NOT NULL,
  orderuser varchar(100) collate gbk_bin NOT NULL,
  sendtype tinyint(1) unsigned NOT NULL default '0' COMMENT '配送状态',
  senddes text collate gbk_bin NOT NULL,
  ispay tinyint(4) unsigned NOT NULL default '0' COMMENT '余额支付',
  iscomment tinyint(1) unsigned NOT NULL,
  orderinfo text collate gbk_bin NOT NULL,
  received tinyint(1) unsigned NOT NULL default '0' COMMENT '已收货',
  PRIMARY KEY  (id),
  KEY orderno (orderno),
  KEY siteid_isvalid_id (siteid,isvalid,id),
  KEY money (money),
  KEY siteid_isvalid_dateline_id (siteid,isvalid,dateline,id),
  KEY siteid_isvalid_money (siteid,money,isvalid,dateline),
  KEY shopid_isvalid_id (shopid,isvalid,id),
  KEY siteid_isvalid_sendtype (siteid,isvalid,sendtype,id),
  KEY siteid_isvalid_user_id (siteid,isvalid,orderuser,id),
  KEY userid_isvalid_siteid_id (userid,isvalid,siteid,id),
  KEY siteid_sendtype (siteid,sendtype),
  KEY sendtype_money (sendtype,money),
  KEY userid_siteid (userid,siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_order_cai'
-- 

CREATE TABLE hck_order_cai (
  id int(11) unsigned NOT NULL auto_increment,
  shopid mediumint(9) unsigned NOT NULL default '0',
  orderid int(11) unsigned NOT NULL default '0',
  caiid mediumint(8) unsigned NOT NULL default '0',
  cainum smallint(6) unsigned NOT NULL default '0',
  title varchar(50) collate gbk_bin NOT NULL,
  price decimal(8,2) NOT NULL,
  PRIMARY KEY  (id),
  KEY shopid (shopid),
  KEY orderid (orderid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_photo'
-- 

CREATE TABLE hck_photo (
  pid mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  title varchar(100) collate gbk_bin NOT NULL,
  info text collate gbk_bin NOT NULL,
  keyword varchar(200) collate gbk_bin NOT NULL,
  des varchar(255) collate gbk_bin NOT NULL,
  ctime int(11) NOT NULL default '0',
  logo varchar(200) collate gbk_bin NOT NULL,
  isnew tinyint(4) NOT NULL default '0',
  isding tinyint(4) NOT NULL default '0',
  ishot tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (pid),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_photo_pic'
-- 

CREATE TABLE hck_photo_pic (
  id int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  pid smallint(6) NOT NULL default '0',
  picurl varchar(400) collate gbk_bin NOT NULL,
  thumb_picurl varchar(100) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY pid (pid),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_pm'
-- 

CREATE TABLE hck_pm (
  id mediumint(9) NOT NULL auto_increment,
  shopid mediumint(9) NOT NULL default '0',
  content varchar(255) collate gbk_bin NOT NULL,
  userid mediumint(9) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_province'
-- 

CREATE TABLE hck_province (
  provinceid mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  province varchar(50) NOT NULL,
  orderindex tinyint(4) unsigned NOT NULL,
  lat decimal(9,6) NOT NULL,
  lng decimal(9,6) NOT NULL,
  PRIMARY KEY  (provinceid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_room'
-- 

CREATE TABLE hck_room (
  id mediumint(8) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid smallint(6) NOT NULL default '0',
  room varchar(50) collate gbk_bin NOT NULL,
  room_type tinyint(1) NOT NULL default '0',
  room_men smallint(2) NOT NULL default '0',
  room_pic varchar(100) collate gbk_bin NOT NULL,
  room_desc varchar(255) collate gbk_bin NOT NULL,
  room_content text collate gbk_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_roomorder'
-- 

CREATE TABLE hck_roomorder (
  id int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  roomid mediumint(8) unsigned NOT NULL,
  room varchar(50) collate gbk_bin NOT NULL,
  room_men tinyint(4) NOT NULL,
  nickname varchar(50) collate gbk_bin NOT NULL,
  phone varchar(30) collate gbk_bin NOT NULL,
  info text collate gbk_bin NOT NULL,
  dateline int(11) NOT NULL,
  stype tinyint(4) NOT NULL,
  uid mediumint(9) NOT NULL,
  reply text collate gbk_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_sendarea'
-- 

CREATE TABLE hck_sendarea (
  catid mediumint(9) NOT NULL auto_increment,
  pid mediumint(9) NOT NULL,
  cname varchar(255) collate gbk_bin NOT NULL,
  orderid smallint(6) NOT NULL,
  shopid smallint(6) NOT NULL,
  info text collate gbk_bin NOT NULL,
  PRIMARY KEY  (catid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_session'
-- 

CREATE TABLE hck_session (
  id char(100) NOT NULL,
  `data` varchar(5000) default NULL,
  dateline int(10) unsigned NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shop'
-- 

CREATE TABLE hck_shop (
  shopid mediumint(9) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  catid int(10) unsigned NOT NULL,
  balance decimal(8,1) NOT NULL,
  tixian varchar(255) character set gbk NOT NULL,
  uid int(10) unsigned NOT NULL,
  shopname varchar(255) NOT NULL,
  grade decimal(6,2) unsigned NOT NULL,
  logo varchar(255) NOT NULL,
  provinceid tinyint(4) unsigned NOT NULL,
  cityid smallint(6) unsigned NOT NULL,
  townid mediumint(9) unsigned NOT NULL,
  shop varchar(255) NOT NULL,
  qq varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  info varchar(255) NOT NULL,
  visible tinyint(1) unsigned NOT NULL default '0',
  shopno varchar(255) NOT NULL,
  starttime int(11) unsigned NOT NULL,
  endtime int(10) unsigned NOT NULL,
  lasttime int(11) unsigned NOT NULL,
  lat decimal(9,6) NOT NULL,
  lng decimal(9,6) NOT NULL,
  sendarea varchar(255) NOT NULL,
  isrecommend tinyint(1) unsigned NOT NULL default '0',
  address varchar(255) NOT NULL,
  orders mediumint(9) unsigned NOT NULL default '0',
  favs mediumint(9) unsigned NOT NULL default '0',
  ishot tinyint(1) unsigned NOT NULL,
  isnew tinyint(1) unsigned NOT NULL,
  content text NOT NULL,
  jf_all tinyint(3) unsigned NOT NULL default '0',
  jf_fuwu decimal(2,1) unsigned NOT NULL,
  jf_kouwei decimal(2,1) unsigned NOT NULL,
  jf_jiage decimal(2,1) unsigned NOT NULL,
  jf_shijian decimal(2,1) unsigned NOT NULL,
  sendmeter smallint(6) NOT NULL default '1000',
  PRIMARY KEY  (shopid),
  KEY shopname_shopid (shopname,shopid),
  KEY lat_lng_siteid_shopid (lat,lng,siteid,shopid),
  KEY siteid_shopid (siteid,shopid),
  KEY siteid_visible (siteid,visible),
  KEY siteid_isnew_shopid (siteid,isnew,shopid),
  KEY siteid_ishot_shopid (siteid,ishot,shopid),
  KEY siteid_isrecommend_shopid (siteid,isrecommend,shopid),
  KEY siteid_provinceid_shopid (siteid,provinceid,shopid),
  KEY grade (grade)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shopadmin'
-- 

CREATE TABLE hck_shopadmin (
  adminid mediumint(9) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  adminname varchar(50) character set gbk collate gbk_bin NOT NULL,
  `password` varchar(50) character set gbk collate gbk_bin NOT NULL,
  rank tinyint(4) NOT NULL default '0',
  email varchar(255) character set gbk collate gbk_bin NOT NULL,
  PRIMARY KEY  (adminid),
  KEY adminname (adminname),
  KEY siteid (siteid),
  KEY shopid_adminid (shopid,adminid)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shopadmin_log'
-- 

CREATE TABLE hck_shopadmin_log (
  id int(11) NOT NULL auto_increment,
  ip varchar(50) collate gbk_bin NOT NULL,
  ztime int(11) NOT NULL default '0',
  logdesc varchar(400) collate gbk_bin NOT NULL,
  adminname varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shoparea'
-- 

CREATE TABLE hck_shoparea (
  id int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  provinceid mediumint(8) unsigned NOT NULL default '0',
  cityid mediumint(8) unsigned NOT NULL default '0',
  townid mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY shopid (shopid,provinceid,cityid,townid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shopcar'
-- 

CREATE TABLE hck_shopcar (
  id int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  userid mediumint(9) unsigned NOT NULL default '0',
  ssid varchar(60) collate gbk_bin NOT NULL,
  caiid mediumint(8) unsigned NOT NULL default '0',
  cainum smallint(6) unsigned NOT NULL default '0',
  title varchar(50) collate gbk_bin NOT NULL,
  price decimal(8,2) NOT NULL,
  PRIMARY KEY  (id),
  KEY siteid (siteid),
  KEY userid (userid,ssid),
  KEY shopid (shopid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shopconfig'
-- 

CREATE TABLE hck_shopconfig (
  shopid mediumint(9) unsigned NOT NULL default '0',
  opentime tinyint(4) unsigned NOT NULL default '0',
  starthour tinyint(4) unsigned NOT NULL default '0',
  endhour tinyint(4) unsigned NOT NULL default '0',
  startminute tinyint(4) unsigned NOT NULL default '0',
  endminute tinyint(4) unsigned NOT NULL default '0',
  showweek tinyint(1) unsigned NOT NULL default '0',
  minprice decimal(8,2) NOT NULL,
  sendarea varchar(255) collate gbk_bin NOT NULL,
  email varchar(255) collate gbk_bin NOT NULL,
  isemail tinyint(4) unsigned NOT NULL default '0',
  isphone tinyint(1) unsigned NOT NULL default '0',
  phone varchar(20) collate gbk_bin NOT NULL,
  sendprice decimal(4,1) unsigned NOT NULL default '0.0',
  ordertype tinyint(1) unsigned NOT NULL default '0',
  KEY shopid (shopid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shop_cat'
-- 

CREATE TABLE hck_shop_cat (
  catid int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL,
  cname varchar(25) NOT NULL,
  orderindex tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (catid)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shop_comment'
-- 

CREATE TABLE hck_shop_comment (
  id int(10) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL,
  shopid mediumint(8) unsigned NOT NULL,
  ctype tinyint(1) NOT NULL COMMENT '评价类型 店铺 美食',
  userid mediumint(8) unsigned NOT NULL,
  nickname varchar(25) collate gb2312_bin NOT NULL,
  orderid int(10) unsigned NOT NULL,
  orderno varchar(20) collate gb2312_bin NOT NULL,
  caiid mediumint(8) unsigned NOT NULL,
  jf_fuwu tinyint(2) unsigned NOT NULL COMMENT '服务',
  jf_kouwei tinyint(2) unsigned NOT NULL COMMENT '口味',
  jf_shijian tinyint(2) unsigned NOT NULL COMMENT '时间',
  jf_jiage tinyint(1) unsigned NOT NULL COMMENT '价格',
  jf_all tinyint(1) NOT NULL,
  `status` tinyint(2) unsigned NOT NULL,
  dateline int(10) unsigned NOT NULL,
  content varchar(255) collate gb2312_bin NOT NULL,
  reply varchar(255) collate gb2312_bin NOT NULL,
  PRIMARY KEY  (id),
  KEY siteid_id (siteid,id),
  KEY shopid_status_id (shopid,`status`,id)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shop_paylog'
-- 

CREATE TABLE hck_shop_paylog (
  id int(10) unsigned NOT NULL auto_increment,
  shopid int(10) unsigned NOT NULL,
  money decimal(8,1) NOT NULL,
  dateline int(10) unsigned NOT NULL,
  content varchar(255) character set gbk NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_shop_tixian'
-- 

CREATE TABLE hck_shop_tixian (
  id int(10) unsigned NOT NULL auto_increment,
  shopid int(10) unsigned NOT NULL,
  shopname varchar(30) character set gbk NOT NULL,
  money int(11) NOT NULL,
  `status` tinyint(3) unsigned NOT NULL,
  dateline int(10) unsigned NOT NULL,
  info varchar(255) NOT NULL,
  reply varchar(255) character set gbk NOT NULL,
  redateline int(10) unsigned NOT NULL,
  PRIMARY KEY  (id),
  KEY money (money),
  KEY shopid_status (shopid,`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_sites'
-- 

CREATE TABLE hck_sites (
  siteid smallint(5) unsigned NOT NULL auto_increment,
  sitename varchar(20) character set gbk NOT NULL,
  lat decimal(9,6) NOT NULL,
  lng decimal(9,6) NOT NULL,
  orderindex smallint(5) unsigned NOT NULL,
  domain varchar(50) character set gbk collate gbk_bin NOT NULL,
  PRIMARY KEY  (siteid),
  KEY orderindex (orderindex),
  KEY lat_lng (lat,lng),
  KEY domain (domain)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_town'
-- 

CREATE TABLE hck_town (
  townid mediumint(9) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  provinceid mediumint(9) unsigned NOT NULL default '0',
  cityid mediumint(9) unsigned NOT NULL default '0',
  town varchar(50) NOT NULL,
  orderindex smallint(6) unsigned NOT NULL default '0',
  lat decimal(9,6) NOT NULL,
  lng decimal(9,6) NOT NULL,
  PRIMARY KEY  (townid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_user'
-- 

CREATE TABLE hck_user (
  userid mediumint(9) unsigned NOT NULL auto_increment,
  username varchar(50) collate gbk_bin NOT NULL,
  `password` varchar(100) collate gbk_bin NOT NULL,
  email varchar(200) collate gbk_bin NOT NULL,
  address varchar(200) collate gbk_bin NOT NULL,
  phone varchar(30) collate gbk_bin NOT NULL,
  qq int(11) unsigned NOT NULL default '0',
  `status` tinyint(1) unsigned NOT NULL default '0',
  nickname varchar(50) collate gbk_bin NOT NULL,
  grade decimal(9,2) NOT NULL default '0.00' COMMENT '消费积分',
  usegrade decimal(9,2) NOT NULL,
  fuserid mediumint(9) unsigned NOT NULL default '0' COMMENT '推荐人',
  dateline int(11) unsigned NOT NULL default '0',
  shopid int(11) unsigned NOT NULL,
  followers mediumint(8) unsigned NOT NULL,
  followeeds mediumint(8) unsigned NOT NULL,
  balance decimal(8,1) unsigned NOT NULL,
  PRIMARY KEY  (userid),
  KEY username (username),
  KEY dateline (dateline),
  KEY status_userid (`status`,userid),
  KEY fuserid (fuserid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_userapi'
-- 

CREATE TABLE hck_userapi (
  xid int(11) unsigned NOT NULL auto_increment,
  xuserid int(11) unsigned NOT NULL default '0' COMMENT 'x用户id',
  xusername varchar(30) collate gbk_bin NOT NULL COMMENT 'x用户名',
  xfrom varchar(20) collate gbk_bin NOT NULL COMMENT '来自哪个插件',
  uid mediumint(9) unsigned NOT NULL default '0' COMMENT '站点id',
  bind tinyint(1) NOT NULL default '0' COMMENT '是否已经绑定',
  openid varchar(40) collate gbk_bin NOT NULL,
  PRIMARY KEY  (xid),
  KEY uid (uid),
  KEY xuserid (xuserid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_user_address'
-- 

CREATE TABLE hck_user_address (
  id int(11) unsigned NOT NULL auto_increment,
  userid mediumint(9) unsigned NOT NULL,
  address varchar(255) NOT NULL,
  PRIMARY KEY  (id),
  KEY userid_id (userid,id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_user_gps'
-- 

CREATE TABLE hck_user_gps (
  id int(10) unsigned NOT NULL auto_increment,
  userid mediumint(9) NOT NULL,
  lat decimal(9,6) NOT NULL,
  lng decimal(9,6) NOT NULL,
  dateline int(10) unsigned NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_user_paylog'
-- 

CREATE TABLE hck_user_paylog (
  logid int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL default '0',
  content varchar(255) collate gbk_bin NOT NULL,
  money decimal(8,1) NOT NULL default '0.0',
  dateline int(11) NOT NULL default '0',
  ftype varchar(20) collate gbk_bin NOT NULL,
  orderno varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (logid),
  KEY orderno (orderno),
  KEY userid_logid (userid,logid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_user_rank'
-- 

CREATE TABLE hck_user_rank (
  id tinyint(4) unsigned NOT NULL auto_increment,
  shopid mediumint(9) unsigned NOT NULL default '0',
  rank_name varchar(50) collate gbk_bin NOT NULL,
  min_grade int(11) unsigned NOT NULL default '0',
  max_grade int(11) unsigned NOT NULL default '0',
  discount int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_vote'
-- 

CREATE TABLE hck_vote (
  vid int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  title varchar(50) collate gbk_bin NOT NULL,
  vtype tinyint(4) unsigned NOT NULL default '0',
  dateline int(11) unsigned NOT NULL default '0',
  detail text collate gbk_bin NOT NULL,
  vtoption text collate gbk_bin NOT NULL,
  logo varchar(200) collate gbk_bin NOT NULL,
  isding tinyint(4) unsigned NOT NULL default '0',
  showtype tinyint(4) unsigned NOT NULL default '0' COMMENT '展示形式',
  mustlogin tinyint(4) unsigned NOT NULL default '0' COMMENT '是否登录',
  PRIMARY KEY  (vid),
  KEY siteid (siteid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_vote_sele'
-- 

CREATE TABLE hck_vote_sele (
  sid int(11) unsigned NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) unsigned NOT NULL default '0',
  tid smallint(6) unsigned NOT NULL default '0',
  orderid smallint(6) unsigned NOT NULL default '0',
  vid smallint(6) unsigned NOT NULL default '0',
  vcount int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (sid),
  KEY tid (tid,vid),
  KEY vid (vid),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_vote_tt'
-- 

CREATE TABLE hck_vote_tt (
  tid int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  title varchar(200) collate gbk_bin NOT NULL,
  img varchar(200) collate gbk_bin NOT NULL,
  url varchar(200) collate gbk_bin NOT NULL,
  catid smallint(6) NOT NULL default '0',
  PRIMARY KEY  (tid),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_vote_ttcat'
-- 

CREATE TABLE hck_vote_ttcat (
  catid smallint(6) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL default '1',
  shopid mediumint(9) NOT NULL default '0',
  cname varchar(100) collate gbk_bin NOT NULL,
  PRIMARY KEY  (catid),
  KEY siteid (siteid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_vote_user'
-- 

CREATE TABLE hck_vote_user (
  id mediumint(8) unsigned NOT NULL auto_increment,
  shopid mediumint(9) unsigned NOT NULL default '0',
  vid smallint(6) unsigned NOT NULL default '0',
  userid mediumint(9) unsigned NOT NULL default '0',
  ip varchar(50) collate gbk_bin NOT NULL,
  dateline int(11) NOT NULL default '0',
  sid int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY vid (vid,userid)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_web'
-- 

CREATE TABLE hck_web (
  id tinyint(4) unsigned NOT NULL auto_increment,
  siteid smallint(6) NOT NULL default '0',
  webname varchar(20) collate gbk_bin NOT NULL,
  webtitle varchar(200) collate gbk_bin NOT NULL,
  webkey varchar(200) collate gbk_bin NOT NULL,
  webdesc varchar(500) collate gbk_bin NOT NULL,
  weboff tinyint(4) NOT NULL default '0',
  webmsn varchar(200) collate gbk_bin NOT NULL,
  webqq varchar(200) collate gbk_bin NOT NULL,
  beian varchar(100) collate gbk_bin NOT NULL,
  weburl varchar(100) collate gbk_bin NOT NULL,
  address varchar(100) collate gbk_bin NOT NULL,
  phone varchar(20) collate gbk_bin NOT NULL,
  offwhy text collate gbk_bin NOT NULL,
  webgg text collate gbk_bin NOT NULL,
  weblogo varchar(200) collate gbk_bin NOT NULL,
  wapurl varchar(50) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;

-- --------------------------------------------------------

-- 
-- 表的结构 'hck_webstats'
-- 

CREATE TABLE hck_webstats (
  id mediumint(9) unsigned NOT NULL auto_increment,
  url varchar(255) collate gbk_bin NOT NULL,
  title varchar(255) collate gbk_bin NOT NULL,
  stype tinyint(1) NOT NULL,
  dateline int(11) NOT NULL,
  logo varchar(255) collate gbk_bin NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COLLATE=gbk_bin;
