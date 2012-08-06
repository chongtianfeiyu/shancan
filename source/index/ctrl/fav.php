<?php
if(!defined("CT"))
{
	die("IS WRONG");
}

$aion=array('shopadd','shopdel');
if(!in_array($_GET['a'],$aion))
{
	errback('网页不存在');
}
check_login();
$userid=$_SESSION['ssuser']['userid'];
switch($_GET['a'])
{
	case 'shopadd':
				$shopid=intval($_GET['shopid']);
				$id=$db->getOne("SELECT id FROM ".table('fav_shop')." WHERE shopid='$shopid'  AND userid='$userid' ");
				if(!$id)
				{
					$siteid=$db->getOne("SELECT siteid FROM ".table('shop')." WHERE shopid='$shopid' ");
					$db->query("INSERT INTO ".table('fav_shop')." SET shopid='$shopid',userid='$userid',dateline=".time().",siteid='$siteid' ");
					$db->query("UPDATE ".table('shop')." SET favs=favs+1 WHERE shopid='$shopid' ");
				}
				if(!$_GET['ajax'])
				{
					errback("商店收藏成功","index.php?m=shop&shopid=$shopid");
				}
				exit();
			break;
	case 'shopdel':
				$shopid=intval($_GET['shopid']);
				
				if($db->getOne("SELECT id FROM ".table('fav_shop')." WHERE shopid='$shopid'  AND userid='$userid' "))
				{
					$db->query("DELETE FROM ".table('fav_shop')." WHERE shopid='$shopid' AND userid='$userid' ");
					$db->query("UPDATE ".table('shop')." SET favs=favs-1 WHERE shopid='$shopid' ");
				}
				if(!$_GET['ajax'])
				{
					errback("商店收藏取消成功");
				}
				exit();
			break;	
}
?>