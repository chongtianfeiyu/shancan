<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>������̨</title>
<link type="text/css" rel="stylesheet" href="<?php echo $this->_var['skins']; ?>css.css" />
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript">
$(document).ready(function()
{
		$(".mtitle").click(function()
	{
		if($(this).next(".menu").css("display")=="block")
		{
		$(this).next(".menu").css({display:"none"});
		}else
		{
		$(this).next(".menu").css({display:"block"});
		}
	});
});
</script>
</head>

<body>


<div class="mtitle">��վ����</div>
<div class="menu" style="display:block;">
<ul>
<li><a href="shopadmin.php?m=order&" target="main-frame">��������</a></li>
<li><a href="shopadmin.php?m=guest&" target="main-frame">���Թ���</a></li>
<li><a href="shopadmin.php?m=comment" target="main-frame">��������</a></li>
<li><a href="shopadmin.php?m=map&" target="main-frame">���̵�ͼ</a>
<li><a href="shopadmin.php?m=shop" target="main-frame">������Ϣ</a>
<li><a href="shopadmin.php?m=config&" target="main-frame">��������</a></li>

</ul>
</div>



<div class="mtitle">��ʳģ��</div>
<div class="menu"  style="display:block;" >
<ul>
<li><a href="shopadmin.php?m=cai&" target="main-frame">��ʳ����</a></li>
<li><a href="shopadmin.php?m=cai&a=add" target="main-frame">��ʳ����</a></li>
<li><a href="shopadmin.php?m=cai_comment&" target="main-frame">��ʳ����</a></li>
<li><a href="shopadmin.php?m=cai_cat&" target="main-frame">��ʳ����</a></li>


</ul>
</div>


<div class="mtitle">����Ա</div>
<div class="menu"  style="display:block;">
<ul>
<li><a href="shopadmin.php?m=admin&" target="main-frame">����Ա</a></li>
<li><a href="shopadmin.php?m=admin&a=add"  target="main-frame">����Ա����</a></li>
</ul>
</div>





<div class="ztitle">��Ȩ����</div>
<div class="zbox" style="">
��Ȩ�����ս�����<br>
����΢��:<a href="http://t.sina.com.cn/lrjxgl">���ս���ҵ</a><br/>
http://t.sina.com.cn/lrjxgl<br>
���¿�˽�� 

</div>
</body>
</html>