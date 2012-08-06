<?php
/*�������ݲ�������*/
require_once("function_base.php");
require("function_art.php");
require("function_cai.php");
require("function_shopcar.php");
require("function_address.php");
require("function_modfun.php");
require_once("function_shop.php");
/*��վ��Ϣ����*/
function web()
{
	global $db,$smarty,$cksiteid;
	$web=$db->getRow("select * from ".table('web')." WHERE siteid='$cksiteid' ");
	
	$smarty->assign("web",$web);
	return $web;	
}
/*
��ȡ��������
���� navchild �Ƿ�����������
*/

function nav($navchild=0)
{
	global $db,$smarty;
	$arr=array();
	//��ȡ��������
	$cachetime=100000;
	$file="nav.sql";
	if(is_sqlcache($file,$cachetime))
	{
		$arr=getsqlcache($file);
	}else
	{
		$res=$db->query("select id,title,navurl from ".table('nav')." where pid=0 order by orderid asc ");
		while($rs=$db->fetch_array($res))
		{
			$arr[$rs['id']]=$rs;
			if($navchild)
			{
				$arr[$rs['id']]['child']=$db->getAll("select id,title,navurl from ".table('nav')." where pid=".$rs['id']." order by orderid asc ");
			}
				
		}
	}
	$smarty->assign("nav",$arr);
}
/*��������*/
function friendlink()
{
	global $db,$smarty,$cksiteid;
	$smarty->assign("links",$db->getAll("SELECT * FROM ".table('link')." WHERE siteid='$cksiteid' ORDER BY orderid ASC LIMIT 100 "));
}




/*��վ*/
function sitelist()
{
	return $GLOBALS['db']->getAll("SELECT siteid,sitename,domain FROM ".table('sites')." ORDER BY orderindex ASC ");
}




