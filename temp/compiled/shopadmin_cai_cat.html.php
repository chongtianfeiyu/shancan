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
<div class="nav"><a href="javascript::">美食分类</a></div>
<div class="nav_title">美食分类</div>
<div class="rbox">
<form action="shopadmin.php?m=cai_cat&a=add_db" method="post">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  class="tb1">
  <tr>
    <td width="167" height="30" align="right">分类名：</td>
    <td width="207"><label for="cname"></label>
      <input type="text" name="cname" id="cname" /></td>
    <td width="366"><input type="submit" name="button" id="button" value="添加" class="btn"/></td>
  </tr>
  </table>  
</form>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td width="81" height="30" align="center">ID</td>
    <td width="294" height="30" align="center">名称</td>
    <td width="92" height="30" align="center">排序</td>
    <td width="273" align="center">操作</td>
  </tr>
  <?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <form action="shopadmin.php?m=cai_cat&a=add_db" method="post">
  <tr>
    <td height="25" align="center"><?php echo $this->_var['t']['catid']; ?></td>
    <td height="25" align="center"><label for="cname"></label>
      <input name="cname" type="text" id="cname" value="<?php echo $this->_var['t']['cname']; ?>" />
      <input name="catid" type="hidden" id="id" value="<?php echo $this->_var['t']['catid']; ?>" /></td>
    <td height="25" align="center"><label for="orderid"></label>
      <input name="orderid" type="text" id="orderid" value="<?php echo $this->_var['t']['orderid']; ?>" size="6" /></td>
    <td align="center"><input type="submit" name="button2" id="button2" class="btn" value="编辑" />
    <input type="button" class="btn" onclick="location.href='shopadmin.php?m=cai_cat&a=del&catid=<?php echo $this->_var['t']['catid']; ?>'" value="删除" />
    </td>
  </tr>
  </form>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>

</div>

</div>


</div>
</body>
</html>
