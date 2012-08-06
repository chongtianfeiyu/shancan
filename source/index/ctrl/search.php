<?php
if(!defined("CT"))
{
	die("IS WRONG");
}

$userid=intval($_SESSION['ssuser']['userid']);
//调用收藏
$favshops=$db->getCols("SELECT shopid FROM ".table('fav_shop')." WHERE userid=".$userid." "); 
//调用购物车信息
$shopcarinfo=shopcarinfo();

$smarty->assign("shopcart",$shopcarinfo['shoplist']);
$_GET['cai']=htmlspecialchars(trim($_GET['cai']));
$_GET['shop']=htmlspecialchars(trim($_GET['shop']));
$pagesize=10;
$page=max(1,intval($_GET['page']));
$start=($page-1)*$pagesize;
if($_GET['cai'])
{
	
	if($_GET['shop'])
	{
		$rscount=$db->getOne("SELECT count(1) FROM ".table('cai')." WHERE title LIKE  '".$_GET['cai']."%' AND shopid IN(SELECT shopid FROM ".table('shop')." WHERE siteid='$cksiteid' AND shopname LIKE  '".$_GET['shop']."%' AND visible=0  ) ");
		$sql="SELECT c.*,s.shopname,s.phone FROM ".table('cai')." c LEFT JOIN ".table('shop')." s ON c.shopid=s.shopid WHERE c.title LIKE '".$_GET['cai']."%' AND s.siteid='$cksiteid' AND s.visible=0 AND s.shopname LIKE '".$_GET['shop']."%' LIMIT $start,$pagesize  ";
	}else
	{
		$rscount=$db->getOne("SELECT count(1) FROM ".table('cai')." WHERE siteid='$cksiteid' AND title LIKE  '".$_GET['cai']."%'  ");
	
		$sql="SELECT c.*,s.shopname,s.phone FROM ".table('cai')." c LEFT JOIN ".table('shop')." s ON c.shopid=s.shopid WHERE c.siteid='$cksiteid' AND c.title LIKE '".$_GET['cai']."%'  LIMIT $start,$pagesize   ";
		
	}
	$res=$db->query($sql);
	while($rs=$db->fetch_array($res))
	{
		if($favshops)
		{
			if(in_array($rs['shopid'],$favshops))
			{
				$rs['isfav']=1;
			}
			
		}
		if($shopcarinfo['caiids'][$rs['id']])
		{
			$rs['in_cart']=1;
		}
		$cailist[]=$rs;
	}
	$smarty->assign("pagelist",multipage($rscount,$pagesize,$page,"index.php?m=search&cai={$_GET['cai']}&shop={$_GET['shop']}"));
	$smarty->assign("cailist",$cailist);
	$smarty->display("search_cai.html");
	
}else
{
	if($_GET['shop'])
	{
		$rscount=$db->getOne("SELECT count(1) FROM ".table('shop')." WHERE siteid='$cksiteid' AND visible=0 AND shopname LIKE '".$_GET['shop']."%' ");
	
		$sql="SELECT s.shopid,s.shopname,s.logo,s.phone,s.address,s.info,s.sendarea,c.opentime,c.starthour,c.endhour,c.startminute,c.endminute,c.showweek,c.minprice FROM ".table('shop')." s  LEFT JOIN ".table('shopconfig')." c ON s.shopid=c.shopid WHERE s.siteid='$cksiteid' AND s.visible=0 AND s. shopname LIKE '".$_GET['shop']."%'  LIMIT $start,$pagesize ";
		
	}else
	{
		$rscount=$db->getOne("SELECT count(1) FROM ".table('shop')." WHERE  siteid='$cksiteid' AND visible=0  ");
		$sql="SELECT s.shopid,s.shopname,s.logo,s.phone,s.address,s.info,s.sendarea,c.opentime,c.starthour,c.endhour,c.startminute,c.endminute,c.showweek,c.minprice FROM ".table('shop')." s  LEFT JOIN ".table('shopconfig')." c ON s.shopid=c.shopid WHERE s.siteid='$cksiteid' AND s.visible=0   LIMIT $start,$pagesize ";
	}
	$res=$db->query($sql);
	while($rs=$db->fetch_array($res))
	{
		if($favshops)
		{
			if(in_array($rs['shopid'],$favshops))
			{
				$rs['isfav']=1;
			}
			
		}
		$shoplist[]=$rs;
	}
	$smarty->assign("pagelist",multipage($rscount,$pagesize,$page,"index.php?m=search&cai={$_GET['cai']}&shop={$_GET['shop']}"));
	$smarty->assign("shoplist",$shoplist);
	$smarty->display("search_shop.html");

	
}
?>