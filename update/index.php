<?php
error_reporting(0);
define('ROOT_PATH',  dirname(str_replace('\\', '/', dirname(__FILE__)))."/");
require_once("../config/config.inc.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>自动更新文件</title>
</head>

<body>
<?php
header("Content-type:text/html;charset=gb2312;");
if(empty($_GET['a']))
{
	echo "升级前请确认备份好数据库内容,升级完删除此目录。<br><a href='index.php?a=update'>开始升级</a>";
}
if($_GET['a']=='update')
{
	require_once("../config/config.inc.php");
	if(!$link=mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PWD))
	{
		exit('连接数据库失败');
	}
	mysql_select_db(MYSQL_DB,$link);
	include("updatesql.php");	
	movedir("update");
	echo "更新成功请删除update目录";
	exit();

}


/*复制目录*/
function movedir($from)
{
	if(!file_exists($from)) return false;
	$dh=opendir($from);
	while(($file=readdir($dh))!=false)
	{
		if($file!="."&&$file!="..")
		{
			
			$f=substr("$from/$file",strpos("$from/$file","/"));
			
			if(is_dir($from."/".$file))
			{
				if(!file_exists(ROOT_PATH.$f))
				{
					mkdir(ROOT_PATH.$f);
				}
				movedir("$from/$file");
			}else
			{	
				@copy("$from/$file",ROOT_PATH.$f);
			}
		}
	}
}


?>
</body>
</html>