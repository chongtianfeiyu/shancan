<?php
if(!defined("CT"))
{
	die("IS WRONG");
}

$userid=intval($_SESSION['ssuser']['userid']);
//区域选择
$provinces=provinces($cksiteid);
$smarty->assign("provinces",$provinces);
if($_GET['provinceid'])
{
	$citys=citys(intval($_GET['provinceid']));
	$towns=towns(intval($_GET['cityid']));
	$smarty->assign("citys",$citys);
	$smarty->assign("towns",$towns);
}

//区域结束
$sw="";
$shopids=array();
if(intval($_GET['provinceid']))
{
	$sw.=" AND s.provinceid=".intval($_GET['provinceid'])." ";
	if(intval($_GET['cityid']))
	{
		$sw.=" AND s.cityid=".intval($_GET['cityid'])." ";
		if(intval($_GET['townid']))
		{
			$sw.=" AND s.townid=".intval($_GET['townid'])." ";
		}
		
	}
	
}

if($_GET['catid'])
{
	$sw.=" AND s.catid=".intval($_GET['catid'])." ";
}


$smarty->assign("shopnum",$shopnum=$db->getOne("SELECT count(*) FROM ".table("shop")." s    WHERE s.siteid='$cksiteid' AND s.visible=0 $sw "));


//调用收藏
$favshops=$db->getCols("SELECT shopid FROM ".table('fav_shop')." WHERE userid=".$userid." ");
//调用购物车信息
$shopcarinfo=shopcarinfo();

$smarty->assign("shopcart",$shopcarinfo['shoplist']); 
$smarty->assign("totalmoney",$shopcarinfo['totalmoney']);
$pagesize=ISWAP?12:21;
$page=max(1,intval($_GET['page']));
$start=($page-1)*$pagesize;
$sql="SELECT s.shopid,s.shopname,s.logo,s.phone,s.address,s.info,s.sendarea,c.opentime,c.starthour,c.endhour,c.startminute,c.endminute,c.showweek,c.minprice FROM ".table('shop')." s  LEFT JOIN ".table('shopconfig')." c ON s.shopid=c.shopid WHERE s.siteid='$cksiteid' AND s.visible=0 $sw   LIMIT $start,$pagesize ";


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
$smarty->assign("shoplist",$shoplist);
$smarty->assign("pagelist",multipage($shopnum,$pagesize,$page,"index.php?m=shoplist&provinceid=$provinceid&cityid=$cityid&townid=$townid&catid=$catid"));
$smarty->assign("catlist",$db->getAll("SELECT catid,cname FROM ".table('shop_cat')." WHERE siteid='$cksiteid' "));
//seo项
$smarty->assign("title",$web['webtitle']);
$smarty->assign("keywords",$web['webkey']);
$smarty->assign("description",$web['webdesc']);
$smarty->display("shoplist.html");

?>