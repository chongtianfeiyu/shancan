<?php exit(); ?>/hck2/admin.php?m=city&a=add_db&provinceid=1 ʱ��:2012-06-19 18:54:48--INSERT INTO koufu_city set city='ǰ��',provinceid='1',siteid='1' ---ִ��ʱ�䣺0.130922079086��

/hck2/admin.php?m=town&a=add_db&cityid=1 ʱ��:2012-06-19 18:54:57--INSERT INTO koufu_town set town='�붵',cityid='1',siteid='1' ---ִ��ʱ�䣺0.210522890091��

/hck2/admin.php?m=shop&a=add_db ʱ��:2012-06-19 18:57:59--INSERT INTO koufu_shop SET catid='3',shopname='³������',provinceid='1',cityid='1',townid='1',address='ǰ���������г�����16�ŵ�',qq='1986175315',phone='0592-3369999',shopno='',info='������һ��̨��Ʒ�ƵĹ���ζ³���ͣ���Ӫ̨ʽ�ײͣ���˾ͳһ�������ˣ���Աͳһ��ѵ����ͬʱ��˾��������Ϊ��������ÿһ���˿͵���ּ��Ϊÿһ���޷��ؼҾͲ͵Ĺ�����Ա�ṩ����Ƶ��ײ͡�Ŀǰ���������ļҷֵꡣ',content='<span style=\"color: rgb(26, 26, 26); font-family: Tahoma, Arial, sans-serif; line-height: 22px; \">������һ��̨��Ʒ�ƵĹ���ζ³���ͣ���Ӫ̨ʽ�ײͣ���˾ͳһ�������ˣ���Աͳһ��ѵ����ͬʱ��˾��������Ϊ��������ÿһ���˿͵���ּ��Ϊÿһ���޷��ؼҾͲ͵Ĺ�����Ա�ṩ����Ƶ��ײ͡�Ŀǰ���������ļҷֵꡣ</span>',siteid='1' ---ִ��ʱ�䣺0.122985839844��

/hck2/admin.php?m=shop&a=add_db ʱ��:2012-06-19 18:58:00--DELETE FROM koufu_shoparea WHERE shopid='1' ---ִ��ʱ�䣺0.200450181961��

/hck2/index.php?m=shop&shopid=1 ʱ��:2012-06-19 18:58:10--SELECT DISTINCT shopid  FROM koufu_shopcar s WHERE    s.ssid='134006355988b7194eee2e0abed62baf81bc9c58d8'  AND siteid='1' ---ִ��ʱ�䣺0.169738054276��

/hck2/index.php?m=shop&shopid=1 ʱ��:2012-06-19 18:58:10--SELECT shopid FROM koufu_fav_shop WHERE userid='0' AND shopid='1'  ---ִ��ʱ�䣺0.221148967743��

/hck2/shopadmin.php?m=cai&a=add ʱ��:2012-06-19 18:58:51--select id,dname from koufu_cai_do order by orderid asc ---ִ��ʱ�䣺0.102396011353��

/hck2/index.php ʱ��:2012-06-19 19:09:04--SELECT * FROM koufu_flash WHERE siteid=1 ORDER BY fid DESC LIMIT 4---ִ��ʱ�䣺0.21040892601��

/hck2/ ʱ��:2012-06-24 21:37:43--SELECT o.*,s.shopname FROM koufu_order o LEFT JOIN koufu_shop s ON o.shopid=s.shopid WHERE o.isvalid=1 AND o.siteid=1 ORDER BY o.dateline DESC LIMIT 10  ---ִ��ʱ�䣺0.112535953522��

/hck2/index.php?m=shoplist ʱ��:2012-06-24 21:37:49--SELECT * FROM koufu_province WHERE siteid='1' ORDER BY orderindex ASC---ִ��ʱ�䣺0.121042013168��

/hck2/index.php?m=maps ʱ��:2012-06-24 21:38:31--SELECT * FROM koufu_hotarea WHERE siteid=1 ---ִ��ʱ�䣺0.395322084427��

/hck2/index.php?m=goods&a=cat ʱ��:2012-06-24 21:51:45--SELECT g.*,c.cname FROM koufu_goods g LEFT JOIN koufu_goods_cat c ON g.catid=c.catid WHERE g.visible=1  LIMIT 0,21 ---ִ��ʱ�䣺0.1358730793��

