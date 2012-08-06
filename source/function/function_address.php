<?php
/*µØµã*/
//Ê¡
function provinces($siteid=1)
{
	global $db;
	$arr=array();
	$res=$db->query("SELECT * FROM ".table('province')." WHERE siteid='$siteid' ORDER BY orderindex ASC");
	while($rs=$db->fetch_array($res))
	{
		$arr[$rs['provinceid']]=$rs;
	}
	return $arr;
	
}

function citys($provinceid=0)
{
	global $db;
	$arr=array();
	$sql=$provinceid?"SELECT * FROM ".table('city')." WHERE provinceid='$provinceid' ORDER BY orderindex ASC ":"SELECT * FROM ".table('city')." ORDER BY orderindex ASC ";
	$res=$db->query($sql);
	while($rs=$db->fetch_array($res))
	{
		$arr[$rs['cityid']]=$rs;
	}
	return $arr;
}
function towns($cityid=0)
{
	global $db;
	$arr=array();
	$sql=$cityid?"SELECT * FROM ".table('town')." WHERE cityid='$cityid' ORDER BY orderindex ASC":"SELECT * FROM ".table('town')."  ORDER BY orderindex ASC";
	$res=$db->query($sql);
	while($rs=$db->fetch_array($res))
	{
		$arr[$rs['townid']]=$rs;
	}
	return $arr;
}