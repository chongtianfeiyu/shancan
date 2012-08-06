<?php
if(!defined("CT"))
{
	die("IS WRONG");
}
$_GET['a']=isset($_GET['a'])?htmlspecialchars($_GET['a']):'index';
$shopid=intval($_GET['shopid']);
switch($_GET['a'])
{
	case 'index':
		header("Content-type:text/html;charset=gb2312");
		$userid=intval($_SESSION['ssuser']['userid']);
		//调用购物车信息
		$shopcarinfo=shopcarinfo();
		$smarty->assign("totalmoney",$shopcarinfo['totalmoney']);
		$smarty->assign("shopcart",$shopcarinfo['shoplist']);
		$isfav=$db->getOne("SELECT shopid FROM ".table('fav_shop')." WHERE userid='$userid' AND shopid='$shopid'  ");
		
		$cat=array();
		$shop=$db->getRow("SELECT * FROM ".table('shop')." WHERE shopid='$shopid' AND siteid='$cksiteid' AND visible=0    ");
		if(!$shop)
		{
			errback("店铺不存在或者已经禁止",'index.php');
		}

		if($isfav)
		{
			$shop['isfav']=1;
		}
		$shopconfig=$db->getRow("SELECT * FROM ".table('shopconfig')." WHERE shopid='$shopid' ");
		$opentype='doing';
		if($shopconfig['opentime']==1)
		{
			$opentype=opentype($shopconfig['starthour'],$shopconfig['startminute'],$shopconfig['endhour'],$shopconfig['endminute']);
		}
		$shop['opentype']=$opentype;
		$smarty->assign("shopconfig",$shopconfig);
		$res2=$db->query("SELECT catid,cname FROM ".table('cai_cat')." WHERE shopid=".$shopid." ");
		while($rs2=$db->fetch_array($res2))
		{
			$rs2['cailist']=shopcailist($shopid," AND catid=".$rs2['catid']."");
			$cat[]=$rs2;
		}
		$shop['caicat']=$cat;
		$smarty->assign("shop",$shop);
		
		
		if($_GET['ajax'])
		{
			$smarty->display('ajaxshopinfo.html');
		}else
		{
			//附近的商店
			if($shop['lat'])
			{
				$ilng=$shop['lng']+$meter;
				$mlng=$shop['lng']-$meter;
				$ilat=$shop['lat']+$meter;
				$mlat=$shop['lat']-$meter;
				$shoplist=$db->getAll(" SELECT shopid,shopname FROM ".table('shop')."   WHERE  (lng<'$ilng' AND  lng>'$mlng' AND  lat>'$mlat' AND  lat<'$ilat')  AND visible=0  LIMIT 0,10  ");
				$smarty->assign('shoplist',$shoplist);
				
			}
			/*留言板*/
			$guestlist=$db->getAll("SELECT * FROM ".table('guest')." WHERE status=1 AND shopid='$shopid' AND siteid='$cksiteid' ORDER BY id DESC LIMIT 10 ");
			$smarty->assign("guestlist",$guestlist);
			//seo项
			$smarty->assign("title",$shop['shopname']."|".$web['webtitle']);
			$smarty->assign("keywords",$shop['shopname'].",".$web['webkey']);
			$smarty->assign("description",$shop['info']);
			$smarty->display("shopindex.html");
		}
	break;
	
	case 'detail':
		$userid=intval($_SESSION['ssuser']['userid']);
		getshopinfo($shopid,1);
		$shopcarinfo=shopcarinfo();
		$smarty->assign("totalmoney",$shopcarinfo['totalmoney']);
		$smarty->assign("shopcart",$shopcarinfo['shoplist']);
		$smarty->display("shop_detail.html");		
	break;
	
	case 'promote':
		$userid=intval($_SESSION['ssuser']['userid']);
		getshopinfo($shopid,1);
		$shopcarinfo=shopcarinfo();
		$smarty->assign("totalmoney",$shopcarinfo['totalmoney']);
		$smarty->assign("shopcart",$shopcarinfo['shoplist']);
		$cailist=$db->getAll("SELECT * FROM ".table('cai')." WHERE shopid='$shopid' AND promote=1 ");
		$smarty->assign("cailist",$cailist);
		$smarty->display("shop_promote.html");
	
	break;
	case 'guest':
		getshopinfo($shopid,1);
		assignlist("guest",10," AND shopid='$shopid' AND status=1   ",'',"index.php?m=shop&a=guest&shopid=$shopid");
		
		$smarty->display("shop_guest.html");
	break;
	case 'comment':
		
		getshopinfo($shopid,1);
		assignlist("shop_comment",2," AND shopid='$shopid' ",'',"index.php?m=shop&a=comment&shopid=$shopid");
		$smarty->display("shop_comment.html");
	break;
	
	case 'neworder':
		getshopinfo($shopid,1);
		$res=$db->query("SELECT * FROM ".table('order')." WHERE shopid='$shopid' AND isvalid=1 ORDER BY id DESC LIMIT 30 ");
		$oids=array();
		while($rs=$db->fetch_array($res))
		{
			$list[$rs['id']]=$rs;
			$oids[]=$rs['id'];
		}
		
		if($oids)
		{
			$res2=$db->query("SELECT c.title,oc.orderid FROM ".table('order_cai')." oc LEFT JOIN ".table('cai')." c ON oc.caiid=c.id WHERE oc.orderid in("._implode($oids).") ");
			while($r2=$db->fetch_array($res2))
			{
				$list[$r2['orderid']]['cais'][]=$r2;
			}
		}
		
		$smarty->assign("list",$list);
		$smarty->display("shop_neworder.html");
	break;


}

?>