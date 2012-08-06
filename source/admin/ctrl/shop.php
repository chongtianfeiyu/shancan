<?php

check_login();
$a=$_GET['a']?$_GET['a']:"index";
if($a=='index')
{
	
	$provinces=provinces($siteid);
	$shopname=htmlspecialchars(trim($_GET['shopname']));
	$citys=$_GET['provinceid']?citys(intval($_GET['provinceid'])):array();
	$towns=$_GET['city']?towns(intval($_GET['cityid'])):array();
	$smarty->assign("provinces",$provinces);
	$smarty->assign("citys",$citys);
	$smarty->assign("towns",$towns);
	$isrecommend=intval($_GET['isrecommend']);
	$isnew=intval($_GET['isnew']);
	$ishot=intval($_GET['ishot']);
	$visible=intval($_GET['visible']);
	$shoplist=array();
	$sql="SELECT * FROM ".table('shop')."  WHERE siteid='$siteid' ";
	$w.=$shopname?" AND shopname like '".$shopname."%'":"";
	$w.=$isrecommend?" AND isrecommend='$isrecommend' ":"";
	$w.=$isnew?" AND isnew='$isnew' ":"";
	$w.=$ishot?" AND ishot='$ishot' ":"";
	$w.=$visible?" AND visible='$visible' ":"";
	$w.=$_GET['provinceid']?" AND provinceid=".intval($_GET['provinceid'])." ":"";
	$w.=$_GET['cityid']?" AND cityid=".intval($_GET['cityid'])." ":"";
	$w.=$_GET['townid']?" AND townid=".intval($_GET['townid'])." ":"";
	$pagesize=20;
	$page=max(1,intval($_GET['page']));
	$start=($page-1)*$pagesize;
	$sql.=" $w ORDER BY shopid DESC LIMIT $start,$pagesize ";

	$rscount=$db->getOne("SELECT count(*) FROM ".table('shop')." WHERE siteid='$siteid' $w ");
	$res=$db->query($sql);
	
	while($rs=$db->fetch_array($res))
	{
		$rs['province']=$rs['provinceid']?$provinces[$rs['provinceid']]:0;
		$rs['city']=$rs['cityid']?$citys[$rs['cityid']]:0;
		$rs['town']=$rs['townid']?$towns[$rs['townid']]:0;
		$shoplist[]=$rs;
	}
	$smarty->assign("pagelist",multipage($rscount,$pagesize,$page,"admin.php?m=shop&shopname={$_GET['shopname']}&provinceid={$_GET['provinceid']}&cityid={$_GET['cityid']}&townid={$_GET['townid']}&isrecommend=$isrecommend&isnew=$isnew&ishot=$ishot&visible=$visible"));
	$smarty->assign("shoplist",$shoplist);
	
	$smarty->display("shop.html");
	
}elseif($a=='add')
{
	$shopid=intval($_GET['shopid']);
	$provinces=provinces($siteid);
	
	if($shopid)
	{
		$shop=$db->getRow("SELECT * FROM ".table('shop')." WHERE shopid='$shopid' ");
		$shop['province']=$shop['provinceid']?$provinces[$shop['provinceid']]:0;
		$shop['city']=$shop['cityid']?$citys[$shop['cityid']]:0;
		$citys=$shop['provinceid']?citys($shop['provinceid']):array();
		$towns=$shop['cityid']?towns($shop['cityid']):array();
		$shop['town']=$shop['townid']?$towns[$shop['townid']]:0;
		$shopareas=$db->getAll("SELECT p.province,s.provinceid,s.cityid,s.townid,c.city,t.town FROM ".table('shoparea')." s ".
		"LEFT JOIN ".table('province')." p ON s.provinceid=p.provinceid ".
		"LEFT JOIN ".table('city')." c ON s.cityid=c.cityid ".
		"LEFT JOIN ".table('town')." t ON s.townid=t.townid WHERE s.shopid='$shopid'   ");
		$smarty->assign("shopareas",$shopareas);
	}
	$smarty->assign("shop",$shop);
	$smarty->assign("provinces",$provinces);
	$smarty->assign("citys",$citys);
	$smarty->assign("towns",$towns);
	$smarty->assign("catlist",$db->getAll("SELECT catid,cname FROM ".table('shop_cat')." WHERE siteid='$siteid' "));
	$smarty->display("shop_add.html");
}elseif($a=='add_db')
{
	$shopid=intval($_POST['shopid']);
	$shopname=trim($_POST['shopname']);
	$provinceid=intval($_POST['provinceid']);
	$cityid=intval($_POST['cityid']);
	$townid=intval($_POST['townid']);
	$address=htmlspecialchars($_POST['address']);
	$qq=htmlspecialchars($_POST['qq']);
	$phone=htmlspecialchars($_POST['phone']);
	$shopno=htmlspecialchars($_POST['shopno']);
	$info=$_POST['info'];
	$content=$_POST['content'];
	$shopareas=$_POST['sendarea'];
	$catid=intval($_POST['catid']);
	if(empty($shopname))
	{
		errback('商店名称不能为空');
	}
	if($shopid)
	{
		$db->query("UPDATE ".table('shop')." SET endtime=".time().",catid='$catid',shopname='$shopname',provinceid='$provinceid',cityid='$cityid',townid='$townid',address='$address',qq='$qq',phone='$phone',shopno='$shopno',info='$info',content='$content' WHERE shopid='$shopid' ");
		
		
	}else
	{
		$db->query("INSERT INTO ".table('shop')." SET starttime=".time().",catid='$catid',shopname='$shopname',provinceid='$provinceid',cityid='$cityid',townid='$townid',address='$address',qq='$qq',phone='$phone',shopno='$shopno',info='$info',content='$content',siteid='$siteid' ");
		
		$shopid=$db->insert_id();
		
	}
	
		$db->query("DELETE FROM ".table('shoparea')." WHERE shopid='$shopid' ");
		$db->query("INSERT INTO ".table('shoparea')." set shopid='$shopid',provinceid=".intval($provinceid).",cityid=".intval($cityid).",townid=".intval($townid)." ");
		if($shopareas)
	{
		foreach($shopareas as $shoparea)
		{
			list($provinceid,$cityid,$townid)=explode(",",$shoparea);
			if(!$db->getOne("SELECT shopid FROM ".table('shoparea')." WHERE provinceid=".intval($provinceid)." and cityid=".intval($cityid)." and townid=".intval($townid)." AND shopid='$shopid' "))
			{
			$db->query("INSERT INTO ".table('shoparea')." set shopid='$shopid',provinceid=".intval($provinceid).",cityid=".intval($cityid).",townid=".intval($townid).",siteid='$siteid' ");
			}
		}
	}
	gourl("admin.php?m=shop&");
	
}elseif($a=='del')
{
	$shopid=intval($_GET['shopid']);
	$db->query("DELETE FROM ".table('shop')." WHERE shopid='$shopid' ");
	gourl();
}elseif($a=='recommend')
{
	$shopid=intval($_GET['shopid']);
	$isrecommend=intval($_GET['isrecommend']);
	$db->query("UPDATE ".table('shop')." SET isrecommend='$isrecommend' WHERE shopid='$shopid' ");
}elseif($a=='hot')
{
	$shopid=intval($_GET['shopid']);
	$ishot=intval($_GET['ishot']);
	$db->query("UPDATE ".table('shop')." SET ishot='$ishot' WHERE shopid='$shopid' ");
}elseif($a=='new')
{
	$shopid=intval($_GET['shopid']);
	$isnew=intval($_GET['isnew']);
	$db->query("UPDATE ".table('shop')." SET isnew='$isnew' WHERE shopid='$shopid' ");
}elseif($a=='visible')
{
	$shopid=intval($_GET['shopid']);
	$visible=intval($_GET['visible']);
	$db->query("UPDATE ".table('shop')." SET visible='$visible' WHERE shopid='$shopid' ");
}elseif($a=='cat')
{
	if($_GET['op'])
	{
		$cnames=$_POST['cname'];
		$orderindexs=$_POST['orderindex'];
		if($cnames)
		{
			foreach($cnames as $catid=>$cname)
			{
				$db->query("UPDATE ".table('shop_cat')." SET cname='".$cname."',orderindex=".$orderindexs[$catid]." WHERE siteid='$siteid' AND catid='$catid' ");
			}
		}
		$newcname=htmlspecialchars(trim($_POST['newcname']));
		$neworderindex=intval($_POST['neworderindex']);
		if($newcname)
		{
			$db->query("INSERT INTO ".table('shop_cat')." SET siteid='$siteid',cname='$newcname',orderindex='$neworderindex' ");
		}
		gourl();
	}else
	{
		$smarty->assign("catlist",$db->getAll("SELECT * FROM ".table('shop_cat')." WHERE siteid='$siteid' "));
		$smarty->display("shop_cat.html");
	}
	
}elseif($a=='delcat')
{
	$catid=intval($_GET['catid']);
	$db->query("DELETE FROM ".table('shop_cat')." WHERE catid='$catid' ");
	gourl();
}
?>