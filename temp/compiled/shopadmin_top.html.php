<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>文章管理</title>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="<?php echo $this->_var['skins']; ?>js/common.js"></script>
<script language="javascript">
$(document).ready(function()
{
setInterval("play()",30000);
});


function play()
{
	if($("#isplay").is(":checked"))
	{
		$.get("shopadmin.php?m=getordermsg&",function(data)
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
<div class="logo"><img src="images/logo.png" /></div>
<div class="msg">

<?php 
echo "店铺".$_SESSION['adminshop']['shopname']." 的管理中心";
?></div>
<div class="header">
您好，<?php echo $_SESSION['ssadminshop']['adminname'];?> 
<a href="shopadmin.php?m=logint&a=logout" target="_parent">退出管理</a>
<a href="shopadmin.php?m=main&" target="main-frame">管理首页</a>
<a href="index.php?m=shop&shopid=<?php echo  $_SESSION['adminshop']['shopid'] ?>" target="_blank">店铺首页</a>
<input type="checkbox" id="isplay" value="1"  checked="checked"/> <label for='isplay'>提示音？</label> 
</div>
</div>
</body>
</html>