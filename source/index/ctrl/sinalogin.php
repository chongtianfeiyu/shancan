<?php
if(!defined("CT"))
{
	die("IS WRONG");
}

require_once("config/sina_config.php");
require_once("api/sina/weibooauth.php");

$a=trim($_REQUEST['a']);
if(empty($a))
{
	$a="index";
}
if($a=='geturl')
{
	//��ȡ��½url
	$o=new WeiboOAuth(WB_AKEY,WB_SKEY);
	$keys=$o->getRequestToken();
	$aurl=$o->getAuthorizeURL($keys['oauth_token'],false,CALLBACK);
	$_SESSION['keys'] = $keys; 
	header("Location: $aurl");
}
elseif($a=='apilogin')
{
//�����½���� ���˶�
//��ȡ��������
$o = new WeiboOAuth( WB_AKEY , WB_SKEY , $_SESSION['keys']['oauth_token'] , $_SESSION['keys']['oauth_token_secret']  );

$last_key = $o->getAccessToken(  $_REQUEST['oauth_verifier'] ) ;

$_SESSION['last_key'] = $last_key;

header("Location: index.php?m=sinalogin&a=show");
}elseif($a=="show")
{
	//�����û����� ��վ��
$c = new WeiboClient( WB_AKEY , WB_SKEY , $_SESSION['last_key']['oauth_token'] , $_SESSION['last_key']['oauth_token_secret']  );

$xuser=$c->show_user($_SESSION['last_key']['user_id']);
if(empty($xuser['id']))
{
	errback('����΢����¼����','index.php?m=user&a=login');
}
//ת���ַ�������
$xuser=iconvstr("utf-8","gbk",$xuser);
$userid=$db->getOne("select uid from  ".table('userapi')." where xuserid=".$xuser['id']." and xfrom='sina' ");
//���ڼ�¼
	if($userid)
	{
		$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid=".intval($userid)."  ");
		
	}else
	{
		//������������������		
			$db->query("insert into  ".table('userapi')." set xuserid=".$xuser['id'].",xusername='".$xuser['name']."',xfrom='sina' ");
		//���û���� ����һ���˺� ��
			$tempname=$username=$xuser['name'];
			$i=1;
			$j=0;
			while($i)
			{
				
				$i=$db->getOne("select count(*) from ".table('user')." where username='$tempname' ");
				if($i>0)
				{
				$tempname=$username.$j;
				$j++;
				}
			}
			$username.=$j?$j:"";
			$db->query("insert into ".table('user')." set username='$username',nickname='".$xuser['name']."' ");	
			$userid=$db->insert_id(); 
			$db->query("update ".table('userapi')." set uid='$userid' where xuserid=".$xuser['id']." and xfrom='sina' ");
			$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid=".intval($userid)."  ");

	}
	errback('��½�ɹ�','index.php');
}
?>