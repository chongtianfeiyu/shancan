<?php
if(!defined("CT"))
{
	die("IS WRONG");
}

$smarty->assign("topic",urlencode(iconv("gbk","utf-8","мЬио╤╘╡м")));
$smarty->display("weibo.html");
?>