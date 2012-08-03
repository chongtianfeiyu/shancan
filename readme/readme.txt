一.安装

如果服务器不支持 rewrite  请先删除 htaccess 并在config/lib_config.php 把define("REWRITE_ON","1"); 设为 0
.htaccess 
RewriteBase /hck2/ 改成你的目录 RewriteBase /

安装直接输入程序所在地址就可以自动安装，安装后可能需要 在后台基本设置 设置文章显示的数量 

如果要重新安装 删除install.lock  即可

二、店铺管理 先添加店铺 然后在进入店铺管理 一次只能进入一家店铺 后一家会覆盖前一句 美食添加管理 在店铺里管理

三、入口文件
source/index/文件
index.php?m=文件&a=文件里面的a
比如商店 index.php?m=shop
四、测试数据 test.php
如果要测试网站负载 请复制test.php 到 source/index/ctrl/
index.php?m=test 访问
官方：http://www.koufukeji.com
微博： http://weibo.com/lrjxgl
qq群：48353999


