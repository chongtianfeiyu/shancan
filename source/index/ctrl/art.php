<?php

$id=intval($_GET['id']);
require_once("includes/cls_comment.php");
$a=$_GET['a'];
if($a=='addcomment')
{
	addcomment("art_comment","index.php?m=art&id=",$cksiteid);	
}
if(empty($id))
{
	gourl("index.php");
}



//��ȡ��������
$art=$db->getRow("select a.*,d.content,c.cname,c.contpl from ".table('art')." as a LEFT JOIN ".table('art_data')." d ON a.id=d.id  left join ".table('art_cat')." as c on a.catid=c.catid  where a.id='$id' ");
if(empty($art))
{
	gourl("index.php");
}
//���ӵ����
$db->query("update ".table('art')." set click=click+1 where id='$id' ");
$smarty->assign("art",$art);
$catid=$art['catid'];


//��ȡ��ǰ�������������� Ĭ�������������
$childid=getartchildid($catid);

$w="";
if($childid)
{
$ids=_implode($childid);
$w.=" and catid in({$ids}) ";

}else
{
	if($catid)
	{
	$w= " and  catid ='{$catid}' ";
	}
}
//��ȡ����  �Ƽ� ��������

//��ȡ��������
$artnew=artlist(" {$w} and isnew=1 "," order by  id desc ",0,10);
$smarty->assign("artnew",$artnew);
//��ȡ��������
$arthot=artlist(" {$w} and ishot=1 "," order by  click desc ",0,10);
$smarty->assign("arthot",$arthot);
//�Ƽ�����
$artding=artlist(" {$w} and isding=1 "," order by  id desc ",0,10);
$smarty->assign("artding",$artding);

//��ȡ��վ����
$artcat=art_cat($catid);

$smarty->assign("artcat",$artcat);
//��ȡ����ƪ����
$sql=" select id,title from ".table('art')." where 1=1  ";
$nx=$db->getRow($sql." and id>'$id' order by id asc limit 1");
if($nx)
{
$nextart="<a href=\"index.php?m=art&id=".$nx['id']."\">".$nx['title']."</a>";
}else
{
$nextart="�Ѿ������һƪ";	
}
$smarty->assign("nextrs",$nextart);
$lt=$db->getRow($sql." and id<'$id' order by id desc limit 1 ");

if($lt)
{
$lastart="<a href=\"index.php?m=art&id=".$lt['id']."\">".$lt['title']."</a>";	
}else
{
$lastart="�Ѿ��ǵ�һƪ";	
}
$smarty->assign("lastrs",$lastart);
//��ǰλ��
$where="::<a href=\"index.php\">��վ��ҳ</a>";
$ps=$db->getRow("select catid,cname from ".table('art_cat')." where catid=(select pid from ".table('art_cat')." where catid=".$art['catid']." ) ");
if($ps)
{
	$where .=" > <a href=\"index.php?m=art_cat&catid=".$ps['id']."\">".$ps['cname']."</a>";
}
$where .=" > <a href=\"index.php?m=art_cat&catid=".$art['catid']."\">".$art['cname']."</a>"." > ".$art['title'];

$smarty->assign("where",$where);

commentlist("art_comment","index.php?m=art",$id);
//seoѡ��
$smarty->assign("title",$art['title'].'-'.$web['webtitle']);
$smarty->assign("keywords",$art['keywoord'].','.$web['webkey']);
$smarty->assign("description",$art['des']);
//seoѡ�����
if($art['contpl'])
{
	$smarty->display($art['contpl']);	
}else
{
$smarty->display("art.html");
}
?>