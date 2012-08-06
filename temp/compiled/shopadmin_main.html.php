<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>后台框架</title>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="<?php echo $this->_var['skins']; ?>js/common.js"></script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">

<div class="right">
<div class="nav">管理首页</div>
<div class="nav_title">管理首页</div>
<div class="rbox">
<table width="100%" border="0"  cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td  height="30">
    新订单： <font color="red"><?php echo $this->_var['ordernewnum']; ?></font> 单, 今日成交 <font color="red"><?php echo $this->_var['orderdaynum']; ?></font> 单，共 <font color="red"><?php echo $this->_var['daymoney']; ?></font> 元。总成交订单： <font color="red"><?php echo $this->_var['ordernum']; ?></font> 单，共<font color="red"><?php echo $this->_var['money']; ?></font> 元。
    
    </td>
    </tr>
  <tr>
    <td height="30">新留言 <font color="red"><?php echo $this->_var['guestnum']; ?></font> 条， 
    新美食评论 <font color="red"><?php echo $this->_var['caicommentnum']; ?></font> 条 ,

    </td>
    </tr>

</table>

</div> 

</div></div>
</body>
</html>
