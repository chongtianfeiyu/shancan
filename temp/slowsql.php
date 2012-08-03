<?php exit(); ?>/hck2/admin.php?m=city&a=add_db&provinceid=1 时间:2012-06-19 18:54:48--INSERT INTO koufu_city set city='前埔',provinceid='1',siteid='1' ---执行时间：0.130922079086秒

/hck2/admin.php?m=town&a=add_db&cityid=1 时间:2012-06-19 18:54:57--INSERT INTO koufu_town set town='岭兜',cityid='1',siteid='1' ---执行时间：0.210522890091秒

/hck2/admin.php?m=shop&a=add_db 时间:2012-06-19 18:57:59--INSERT INTO koufu_shop SET catid='3',shopname='鲁肉世家',provinceid='1',cityid='1',townid='1',address='前埔南区菜市场正门16号店',qq='1986175315',phone='0592-3369999',shopno='',info='本店是一家台湾品牌的古早味鲁肉快餐，主营台式套餐，公司统一配送主菜，人员统一培训管理，同时公司本着以人为本，服务每一个顾客的宗旨，为每一个无法回家就餐的工作人员提供如家似的套餐。目前厦门已有四家分店。',content='<span style=\"color: rgb(26, 26, 26); font-family: Tahoma, Arial, sans-serif; line-height: 22px; \">本店是一家台湾品牌的古早味鲁肉快餐，主营台式套餐，公司统一配送主菜，人员统一培训管理，同时公司本着以人为本，服务每一个顾客的宗旨，为每一个无法回家就餐的工作人员提供如家似的套餐。目前厦门已有四家分店。</span>',siteid='1' ---执行时间：0.122985839844秒

/hck2/admin.php?m=shop&a=add_db 时间:2012-06-19 18:58:00--DELETE FROM koufu_shoparea WHERE shopid='1' ---执行时间：0.200450181961秒

/hck2/index.php?m=shop&shopid=1 时间:2012-06-19 18:58:10--SELECT DISTINCT shopid  FROM koufu_shopcar s WHERE    s.ssid='134006355988b7194eee2e0abed62baf81bc9c58d8'  AND siteid='1' ---执行时间：0.169738054276秒

/hck2/index.php?m=shop&shopid=1 时间:2012-06-19 18:58:10--SELECT shopid FROM koufu_fav_shop WHERE userid='0' AND shopid='1'  ---执行时间：0.221148967743秒

/hck2/shopadmin.php?m=cai&a=add 时间:2012-06-19 18:58:51--select id,dname from koufu_cai_do order by orderid asc ---执行时间：0.102396011353秒

/hck2/index.php 时间:2012-06-19 19:09:04--SELECT * FROM koufu_flash WHERE siteid=1 ORDER BY fid DESC LIMIT 4---执行时间：0.21040892601秒

/hck2/ 时间:2012-06-24 21:37:43--SELECT o.*,s.shopname FROM koufu_order o LEFT JOIN koufu_shop s ON o.shopid=s.shopid WHERE o.isvalid=1 AND o.siteid=1 ORDER BY o.dateline DESC LIMIT 10  ---执行时间：0.112535953522秒

/hck2/index.php?m=shoplist 时间:2012-06-24 21:37:49--SELECT * FROM koufu_province WHERE siteid='1' ORDER BY orderindex ASC---执行时间：0.121042013168秒

/hck2/index.php?m=maps 时间:2012-06-24 21:38:31--SELECT * FROM koufu_hotarea WHERE siteid=1 ---执行时间：0.395322084427秒

/hck2/index.php?m=goods&a=cat 时间:2012-06-24 21:51:45--SELECT g.*,c.cname FROM koufu_goods g LEFT JOIN koufu_goods_cat c ON g.catid=c.catid WHERE g.visible=1  LIMIT 0,21 ---执行时间：0.1358730793秒

