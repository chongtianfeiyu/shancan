<?php
/*1.6ธüะย*/
@mysql_query("ALTER TABLE ".TABLE_PRE."shop ADD balance decimal(8,1) NOT NULL  ");
@mysql_query("ALTER TABLE ".TABLE_PRE."shop ADD endtime int(10) UNSIGNED NOT NULL  ");
@mysql_query("ALTER TABLE ".TABLE_PRE."shop ADD  tixian VARCHAR( 255 ) CHARACTER SET gbk COLLATE gbk_chinese_ci NOT NULL");
@mysql_query("CREATE TABLE IF NOT EXISTS ".TABLE_PRE."shop_paylog (
  id int(10) unsigned NOT NULL auto_increment,
  shopid int(10) unsigned NOT NULL,
  money decimal(8,1) NOT NULL,
  dateline int(10) unsigned NOT NULL,
  content varchar(255) character set gbk NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;");
@mysql_query("ALTER TABLE ".TABLE_PRE."user ADD balance decimal(8,1) NOT NULL  ");
@mysql_query("CREATE TABLE ".TABLE_PRE."user_paylog (
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
) ENGINE=MyISAM  DEFAULT CHARSET=gbk COLLATE=gbk_bin;");

@mysql_query("ALTER TABLE  ".TABLE_PRE."order CHANGE  `isbonus`  `ispay` TINYINT( 4 ) UNSIGNED NOT NULL DEFAULT  '0' COMMENT  'ำเถ๎ึงธถ'");
@mysql_query("CREATE TABLE ".TABLE_PRE."shop_tixian (
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
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;
");
@mysql_query("
CREATE TABLE ".TABLE_PRE."groupbuy (
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
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;
");

@mysql_query("
CREATE TABLE ".TABLE_PRE."groupbuy_category (
  catid int(11) NOT NULL auto_increment,
  siteid smallint(5) unsigned NOT NULL,
  cname varchar(25) NOT NULL,
  orderindex tinyint(3) unsigned NOT NULL,
  PRIMARY KEY  (catid)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

");

@mysql_query("
CREATE TABLE ".TABLE_PRE."groupbuy_order (
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
) ENGINE=MyISAM  DEFAULT CHARSET=gbk;

");



?>