<?php
if(!defined("CT"))
{
	die("IS WRONG");
}

$smarty->assign("topic",urlencode(iconv("gbk","utf-8","���϶���")));
$smarty->display("weibo.html");
?>