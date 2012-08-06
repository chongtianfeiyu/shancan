<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>订单管理</title>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="<?php echo $this->_var['skins']; ?>js/common.js"></script>
<script language="javascript">
$(document).ready(function()
{
	$("#chkall").click(function()
	{
		$(".orderid").attr("checked","checked");
	});
	$("#chknone").click(function()
	{
		$(".orderid").attr("checked",false);
	});
});

</script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">

<div class="right">
<div class="nav">
<a href="admin.php?m=goods_order&">兑换订单管理</a>
<a href="admin.php?m=goods_order&t=1">今天</a>
<a href="admin.php?m=goods_order&t=2">昨天</a>
<a href="admin.php?m=goods_order&t=3">7天</a>
<a href="admin.php?m=goods_order&t=4">本月</a>
<a href="admin.php?m=goods_order&t=5">上月</a>
</div>
<div class="nav_title">兑换订单管理  </div>
<div class="rbox">
<table width="100%" border="0" align="center" cellspacing="1" class="tb1">
  <tr>
    <td width="93" align="right">订单统计：</td>
    <td width="640" height="50">共<font color="red"><?php echo $this->_var['rscount']; ?></font>笔订单。 </td>
  </tr>
  </table>


<form action="admin.php" method="get">
<input type="hidden" name="m" value="goods_order" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td height="30" align="center">客户：
      <input name="nickname" type="text" id="nickname" value="<?php echo $this->_var['nickname']; ?>" size="16" />
      订单号
<input name="orderno" type="text" id="orderno" value="<?php echo $this->_var['orderno']; ?>" size="16" />
      配送状态
      <label for="sendtype"></label>
      <select name="sendtype" id="sendtype">
      <option value="-1" <?php if ($this->_var['sendtype'] == - 1): ?> selected="selected"<?php endif; ?>>全部</option>
      <option value="0" <?php if ($this->_var['sendtype'] == 0): ?> selected="selected"<?php endif; ?>>未确认</option>
      <option value="1" <?php if ($this->_var['sendtype'] == 1): ?> selected="selected"<?php endif; ?>>已确认</option>
      <option value="2" <?php if ($this->_var['sendtype'] == 2): ?> selected="selected"<?php endif; ?>>正在配送</option>
      <option value="3" <?php if ($this->_var['sendtype'] == 3): ?> selected="selected"<?php endif; ?>>配送中</option>
      <option value="4" <?php if ($this->_var['sendtype'] == 4): ?> selected="selected"<?php endif; ?>>已完成</option>
      </select>     
       <input type="submit" name="button" id="button" value="查询" class="btn"/></td>
    </tr>
  </table>

</form>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td width="38" height="30" align="center">ID</td>
    <td width="97" align="center">订单号</td>
    <td width="95" align="center">客户</td>
    <td width="87" align="center">积分</td>
    <td width="91" align="center">订单状态</td>
    <td width="204" align="center">联系地址</td>
  
    <td width="129" align="center">联系方式</td>
    <td width="159" align="center">时间</td>
    <td width="149" align="center">操作</td>
    </tr>
    <form action="admin.php?m=goods_order&" method="post" id="aa">
    <?php $_from = $this->_var['orderlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <tr>
    <td height="25" align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $this->_var['t']['id']; ?>" class="orderid" />
      <label for="id[]"></label></td>
    <td align="center"><?php echo $this->_var['t']['orderno']; ?></td>
    <td align="center"><?php echo $this->_var['t']['nickname']; ?></td>
    <td align="center"><?php echo $this->_var['t']['grade']; ?></td>
    <td align="center"><?php echo $this->_var['t']['sendtype']; ?></td>
    <td align="center"><?php echo $this->_var['t']['address']; ?></td>
    
    <td align="center"><?php echo $this->_var['t']['phone']; ?></td>
    <td align="center"><?php echo date("Y-m-d",$this->_var['t']['dateline']); ?></td>
    <td align="center"> 
    <a href="admin.php?m=goods_order&a=del&amp;id=<?php echo $this->_var['t']['id']; ?>">删除</a>
    </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
    <tr>
      <td height="30" colspan="10" align="center">
      <a href="javascript::" id="chkall"  >全选</a>
      &nbsp;<a href="javascript::" id="chknone"  >全不选</a>
        <input type="submit" name="button2" id="button2" value="未确认" class="btn" onclick="this.form.action='admin.php?m=goods_order&a=sendtype&sendtype=0'"  />
        <input type="submit" name="button3" id="button3" value="已确认" class="btn"  onclick="this.form.action='admin.php?m=goods_order&a=sendtype&sendtype=1'"  />
        <input type="submit" name="button4" id="button4" value="正在配送" class="btn"  onclick="this.form.action='admin.php?m=goods_order&a=sendtype&sendtype=2'"  
         />
        <input type="submit" name="button5" id="button5" value="配送中"  class="btn" 
         onclick="this.form.action='admin.php?m=goods_order&a=sendtype&sendtype=3'"  />
        <input type="submit" name="button6" id="button6" value="已完成" class="btn"  onclick="this.form.action='admin.php?m=goods_order&a=sendtype&sendtype=4';return confirm('订单完成后将不可再更改订单状态');"   /></td>
      </tr>
      </form>
    <?php if ($this->_var['pagelist']): ?>  <tr>
    <td height="30" colspan="10" align="center"><?php echo $this->_var['pagelist']; ?></td>
    </tr>
    <?php endif; ?>
</table>

</div> 

</div>


</div>
</body>
</html>
