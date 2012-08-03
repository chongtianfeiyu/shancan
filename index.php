<?php
define("CT",1);
define("APPURL","index.php");
/*取得根目录所在路径*/
error_reporting(E_ALL& ~E_NOTICE);
if(ini_get('register_globals'))
{
	die('请关闭全局变量');
}

if(!file_exists("config/install.lock"))
{
	header("Location: install/");
}

date_default_timezone_set('PRC');  //设置默认时区
define('ROOT_PATH',  str_replace('\\', '/', dirname(__FILE__))."/");
//引入配置文件
require_once(ROOT_PATH."config/config.inc.php");//数据库配置
@ini_set("session.cookie_domain", DOMAIN);
require_once(ROOT_PATH."config/lib_config.php");//常用配置
/*载入公共库文件*/
require_once(ROOT_PATH."includes/lib_base.php");
require_once(ROOT_PATH."includes/lib_safe.php");
require_once(ROOT_PATH."includes/cls_db.php");//引入数据库文件
$db=new Db_class(MYSQL_HOST,MYSQL_USER,MYSQL_PWD,MYSQL_DB,MYSQL_CHARSET);
/*开启数据库存储session
require_once(ROOT_PATH."includes/cls_session.php");
$session=new session($db,3600);
*/
session_start();
//配置模板
require_once(ROOT_PATH."includes/cls_smarty.php");//引入模板文件
$smarty=new Smarty();
$smarty->caching=true;
$smarty->cache_lifetime = 3600;
if($_COOKIE['ck_ss_id']=='')
{
	$ss_id=time().session_id();
	setcookie("ck_ss_id",$ss_id,time()+360000,'/',DOMAIN);	
}
$ss_id=$_COOKIE['ck_ss_id'];
//有数据的公共文件
require_once(ROOT_PATH."source/function/function_common.php");

/*默认城市站点设置*/
if($_GET['setsite']=='yes')
{
	setcookie("cksiteid",intval($_GET['siteid']),time()+36000,'/',DOMAIN);
	
	$domain=$db->getOne("SELECT domain FROM ".table('sites')." WHERE siteid=".intval($_GET['siteid'])."  ");
	if($domain && !$_GET['iswap'])
	{
		gourl(str_replace($_SERVER['HTTP_HOST'],$domain,$_SERVER['HTTP_REFERER']));
	}else
	{
		gourl(); 
	}
}

if($siteid=$db->getOne("SELECT siteid FROM ".table('sites')." WHERE domain='".$_SERVER['HTTP_HOST']."' "))
{
	setcookie("cksiteid",intval($siteid),time()+36000,'/',DOMAIN);
	$cksiteid=$siteid;
}else{
	if(!$_COOKIE['cksiteid'])
	{
		$cksiteid=1;
	}else
	{
		$cksiteid=$_COOKIE['cksiteid'];
	}
}


$smarty->assign("site",$db->getRow("SELECT siteid,sitename,lat,lng,domain FROM ".table('sites')." WHERE siteid='$cksiteid' "));
$smarty->assign("sitelist",sitelist());
$web=web();//调用网站
$nav=nav();//调用导航
friendlink();//调用友情链接 
/*默认城市*/

if($_GET['skins'] )
{
	$_SESSION['skins']=$_GET['skins'];
}
if($_SESSION['skins'])
{
	$skins=$_SESSION['skins'];
}else
{
	$skins=SKINS;
}
if(empty($skins))
{
	$skins="default";
}

if( $_SERVER['SERVER_NAME']==WAPURL   or $skins=="wap" or $skins=="phone")
{
	if(!defined("ISWAP"))
	{
 		define("ISWAP",true);
	}
	$skins="wap";
}else
{
	define("ISWAP",false);
}


$smarty->cache_dir      = ROOT_PATH . 'temp/caches';
$smarty->compile_dir    = ROOT_PATH . 'temp/compiled';

$smarty->template_dir   = ROOT_PATH . "themes/{$skins}";
require_once("rewriterule.php");
$smarty->rewriterule=$rewriterule;
$smarty->assign("aaa","ddddddddddddddd");
$smarty->assign("skins","themes/{$skins}/");
$smarty->assign("ssuser",$_SESSION['ssuser']);


if($web['weboff']==1)
{
	echo '<table align="center" width="500px" height="300px;" style=" padding:20px;margin:0 auto; background-color:#E2CD67; margin-top:100px;"><tr><td>'.$web['offwhy'].'</td></tr></table></div>';	
	exit();
}



$m=isset($_GET['m'])?htmlspecialchars($_GET['m']):"index";
$m=str_replace(array("/","\\"),"",$m);

if(!file_exists("source/index/ctrl/$m.php"))
{
	$m="index";
}
require_once("source/index/ctrl/$m.php");


function check_login()
{
	if(!$_SESSION['ssuser']['userid'])
	{
		errback('请先登录','index.php?m=user&a=login');
	}
}

?>