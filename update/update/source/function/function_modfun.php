<?php
/*超级数据调用函数*/
function mod_base($v,$sql,$type='all')
{
	global $smarty,$db;
	switch($type)
	{
		case 'one'://获取一个字段记录
				$data=$db->getOne($sql);
			break;
		case 'row'://获取一行记录
				$data=$db->getRow($sql);
			break;
		case 'col'://获取一列记录
				$data=$db->getCols($sql);
			break;
		case 'all'://获取所有记录
				$data=$db->getAll($sql);
			break;
		default://获取所有记录
				$data=$db->getAll($sql);
			break;
	}
	$smarty->assign($v,$data);
}
/*调用文章列表*/
function mod_artlist($v,$catid=0,$w='',$ord='ORDER BY a.id DESC',$limit=10)
{
	global $smarty,$db;
	$catids=$db->getCols("SELECT catid FROM ".table('art_cat')." WHERE pid=".intval($catid)." ");
	if($catid)
	{
	$catids[]=$catid;
	}
	$sql="SELECT a.*,c.cname FROM ".table('art')." a LEFT JOIN ".table('art_cat')." c ON a.catid=c.catid  WHERE  a.siteid=".$GLOBALS['cksiteid']." ";
	$sql.=$catid?" AND a.catid in("._implode($catids).") ":"";
	$sql.=$w?" $w ":"";
	$sql.=" $ord ";
	$sql.=$limit?"LIMIT $limit":" LIMIT 10 ";
	
	$arr=$db->getAll($sql);
	$smarty->assign($v,$arr);
		
}
/*调用美食列表*/
function mod_cailist($k,$w='',$ord='ORDER BY id DESC',$limit=0)
{
	global $smarty,$db;
	$sql="SELECT * FROM ".table('cai')." WHERE visible>=0    $w $ord ";
	$sql.=$limit?" LIMIT $limit":" LIMIT 10 ";
	$arr=$db->getAll($sql);
	$smarty->assign($k,$arr); 
}

/*调用商店列表*/
function mod_shoplist($k,$w='',$ord='',$limit=0)
{
	global $smarty,$db;
	$ord=$ord?$ord:" ORDER BY s.shopid DESC ";
	$sql="SELECT s.* FROM ".table('shop')." s LEFT JOIN ".table('shop_config')." sc ON s.shopid=sc.shopid  WHERE s.visible>0  $w $ord ";
	$sql.=$limit?" LIMIT $limit":" LIMIT 10 ";
	$arr=$db->getAll($sql);
	$smarty->assign($k,$arr); 
}
function mod_links($k,$w='')
{
	global $smarty,$db;
	$sql="SELECT * FROM ".table('link')." WHERE 1=1  $w ORDER BY orderid ASC ";
	$sql.=$limit?" LIMIT $limit":" LIMIT 10 ";
	$arr=$db->getAll($sql);
	$smarty->assign($k,$arr); 
	
}

function mod_orderfeed($k,$w='',$limit=10)
{
	global $smarty,$db;
	$sql="SELECT o.*,s.shopname FROM ".table('order')." o LEFT JOIN ".table('shop')." s ON o.shopid=s.shopid WHERE o.isvalid=1 AND o.siteid=".intval($GLOBALS['cksiteid'])." ORDER BY o.dateline DESC LIMIT $limit  ";
	$arr= $db->getAll($sql);
	$smarty->assign($k,$arr);
}


?>