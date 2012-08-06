<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>文章管理</title>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript">
$(document).ready(function()
{
setInterval("play()",30000);
});


function play()
{
	if($("#isplay").is(":checked"))
	{
		$.get("admin.php?m=getordermsg",function(data)
		{
			
			if(data)
			{
				playstop();
				playstart();
			}
		});
	}
	
	
}

	function playstart()
	{
		if(!document.all)
		{
			$("#playmsg").html('<audio src="<?php echo $this->_var['skins']; ?>images/sms.mp3" autoplay ></audio>')
		}else
		{
		$("#playmsg").html("<embed src=\"<?php echo $this->_var['skins']; ?>images/sms.mp3\" style=\"HEIGHT: 0px; WIDTH: 0px\" type=audio/mpeg AUTOSTART=\"1\" loop=\"0\"></EMBED>");
		}
	}
	function playstop()
	{
	$("#playmsg").html("");
	}
</script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="playmsg" ></div>
<div class="top">
<div class="logo"><img src="<?php echo $this->_var['skins']; ?>images/logo.png" /></div>
<div class="topnav">
<a href="admin.php?m=order" target="main-frame">订单管理</a>

<a href="admin.php?m=left&a=shop" target="menu-frame">店铺管理</a>
<a href="admin.php?m=left&a=con" target="menu-frame">内容管理</a>
<a href="admin.php?m=left&a=user" target="menu-frame">会员管理</a>

<?php if ($_SESSION['ssadmin']['isfounder']): ?>
<a href="admin.php?m=left&a=config" target="menu-frame">网站设置</a>
<a href="admin.php?m=left&a=data" target="menu-frame">数据模板</a>
<a href="admin.php?m=sites" target="main-frame"><?php echo $_SESSION['ssadmin']['sitename']; ?>分站</a>
<?php else: ?>
<a href="javascript:;" target="main-frame"><?php echo $_SESSION['ssadmin']['sitename']; ?>分站</a>
<?php endif; ?>
</div>
<div class="header">
您好，<?php echo $_SESSION['ssadmin']['adminname'];
?> 
<a href="admin.php?m=login&a=logout" target="_parent">退出管理</a>
<a href="admin.php?m=main" target="main-frame">管理首页</a>
<a href="index.php?m=index&" target="_blank">网站首页</a>
<input type="checkbox" id="isplay" value="1"  checked="checked"/> <label for='isplay'>提示音？</label>  
</div>
</div>
</body>
</html>