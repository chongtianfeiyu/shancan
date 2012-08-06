<?php

check_login();
$a=isset($_GET['a'])?htmlspecialchars($_GET['a']):"index";
if($a=='index')
{

	$shopid=intval($_SESSION['adminshop']['shopid']);
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
	}else
	{
		gourl('参数出错','shopadmin.php?m=main');
	}
	$smarty->assign("shop",$shop);
	$smarty->assign("provinces",$provinces);
	$smarty->assign("citys",$citys);
	$smarty->assign("towns",$towns);
	$smarty->display("shop_add.html");
}elseif($a=='add_db')
{
	$shopid=intval($_SESSION['adminshop']['shopid']);
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
	
	$logo=trim(htmlspecialchars($_POST['logo']));
	//判断logo
	if($shopid)
	{
		$s=$db->getOne("SELECT logo FROM ".table('shop')." WHERE shopid='$shopid' ");
		if($s!=$logo)
		{
			require_once(ROOT_PATH."includes/cls_image.php");
			$clsimg=new image();
			$clsimg->makethumb($logo,$logo,400,400);
		}
	}else
	{
		require_once(ROOT_PATH."includes/cls_image.php");
		$clsimg=new image();
		$clsimg->makethumb($logo,$logo,400,400);
	}
	
	//
	if(empty($shopname))
	{
		errback('商店名称不能为空');
	}
	if($shopid)
	{
		$db->query("UPDATE ".table('shop')." SET shopname='$shopname',provinceid='$provinceid',cityid='$cityid',townid='$townid',address='$address',qq='$qq',phone='$phone',shopno='$shopno',info='$info',content='$content',logo='$logo' WHERE shopid='$shopid' ");
		
		
	}
	
	
		$db->query("DELETE FROM ".table('shoparea')." WHERE shopid='$shopid' ");
			
		if(!empty($shopareas))
	{
		 
		foreach($shopareas as $shoparea)
		{
			 
			list($provinceid,$cityid,$townid)=explode(",",$shoparea);

			$db->query("INSERT INTO ".table('shoparea')." set shopid='$shopid',provinceid=".intval($provinceid).",cityid=".intval($cityid).",townid=".intval($townid)." ");
			
			
			
		}
	}
	gourl("shopadmin.php?m=shop");
	
}

?>