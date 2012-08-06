<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>订单管理</title>
<script language="javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="plugin/zebra/zebra_datepicker.css" type="text/css">
<script type="text/javascript" src="plugin/zebra/zebra_datepicker.js"></script>
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
	
	$('#starttime').Zebra_DatePicker();

	$('#endtime').Zebra_DatePicker();
});



</script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">

<div class="right">
<div class="nav">
<a href="admin.php?m=order&">订单管理</a>
<a href="admin.php?m=order&t=1">今天</a>
<a href="admin.php?m=order&t=2">昨天</a>
<a href="admin.php?m=order&t=3">7天</a>
<a href="admin.php?m=order&t=4">本月</a>
<a href="admin.php?m=order&t=5">上月</a>
</div>
<div class="nav_title">订单管理  </div>
<div class="rbox">
<table width="100%" border="0" align="center" cellspacing="1" class="tb1">
  <tr>
    <td width="93" align="right">订单统计：</td>
    <td width="640" height="50">共<font color="red"><?php echo $this->_var['rscount']; ?></font>笔订单，
    总收入(<font color="red"><?php echo $this->_var['money']['summoney']; ?></font>)元，
    平均每笔(<font color="red"><?php echo $this->_var['money']['avgmoney']; ?></font>)元。 </td>
  </tr>
  </table>


<form action="admin.php" method="get">
<input type="hidden" name="m" value="order" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td height="30" align="center">客户：
      <input name="username" type="text" id="username" value="<?php echo $this->_var['username']; ?>" size="16" />
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
      开始时间 <span style="position:relative;"><input name="starttime" type="text" id="starttime" value="<?php echo $_GET['starttime']; ?>" size="12" /></span>
       结束时间 <span style="position:relative;"><input name="endtime" type="text" id="endtime" value="<?php echo $_GET['endtime']; ?>" size="12" /></span>     
       <input type="submit" name="button" id="button" value="查询" class="btn"/></td>
    </tr>
  </table>

</form>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td width="32" height="30" align="center">ID</td>
    <td width="92" align="center">订单号</td>
    <td width="98" align="center">客户</td>
    <td width="81" align="center">价格</td>
    <td width="102" align="center">订单状态</td>
    <td width="43" align="center">付款</td>
    <td width="87" align="center">收货</td>
    <td width="196" align="center">联系方式</td>
    <td width="107" align="center">商家</td>
    <td width="104" align="center">时间</td>
    <td width="128" align="center">操作</td>
    </tr>
    <form action="admin.php?m=order&" method="post" id="aa">
    <?php $_from = $this->_var['orderlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <tr>
    <td height="25" align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $this->_var['t']['id']; ?>" class="orderid" />
      <label for="id[]"></label></td>
    <td align="center"><?php echo $this->_var['t']['orderno']; ?></td>
    <td align="center"><?php echo $this->_var['t']['orderuser']; ?></td>
    <td align="center"><?php echo $this->_var['t']['money']; ?></td>
    <td align="center"><?php echo $this->_var['t']['sendtype']; ?></td>
    <td align="center"><!--<?php if ($this->_var['t']['isbonus']): ?>-->已付<!--<?php else: ?>-->到付<!--<?php endif; ?>--></td>
    <td align="center"><!--<?php if ($this->_var['t']['received']): ?>-->已收货<!--<?php else: ?>-->未收货<!--<?php endif; ?>--></td>
    <td align="center"><?php echo $this->_var['t']['orderphone']; ?></td>
    <td align="center"><?php echo $this->_var['t']['shopname']; ?></td>
    <td align="center"><?php echo $this->_var['t']['dateline']; ?></td>
    <td align="center">  <a href="admin.php?m=order&a=view&amp;id=<?php echo $this->_var['t']['id']; ?>">查看</a> <a href="admin.php?m=order&a=del&amp;id=<?php echo $this->_var['t']['id']; ?>">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
    <tr>
      <td height="30" colspan="11" align="center">
      <a href="javascript::" id="chkall"  >全选</a>
      &nbsp;<a href="javascript::" id="chknone"  >全不选</a>
        <input type="submit" name="button2" id="button2" value="未确认" class="btn" onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=0'"  />
        <input type="submit" name="button3" id="button3" value="已确认" class="btn"  onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=1'"  />
        <input type="submit" name="button4" id="button4" value="正在配送" class="btn"  onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=2'"  
         />
         
        <input type="submit" name="button6" id="button6" value="已完成" class="btn"  onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=3';return confirm('订单完成后将不可再更改订单状态');"   /></td>
      </tr>
      </form>
    <?php if ($this->_var['pagelist']): ?>  <tr>
    <td height="30" colspan="11" align="center"><?php echo $this->_var['pagelist']; ?></td>
    </tr>
    <?php endif; ?>
</table>

</div> 

</div>


</div>
</body>
</html>
