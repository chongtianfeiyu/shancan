<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��̨���</title>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="<?php echo $this->_var['skins']; ?>js/common.js"></script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">

<div class="right">
<div class="nav"><a href="javascript::">��ζ����</a></div>
<div class="nav_title">��ζ��ʳ����</div>
<div class="rbox">
<form action="admin.php?m=cai_wei&a=add_db" method="post">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  class="tb1">
  <tr>
    <td width="248" height="30" align="right">��������</td>
    <td width="204"><label for="wname"></label>
      <input type="text" name="wname" id="wname" /></td>
    <td width="647"><input type="submit" name="button" id="button" value="���" class="btn" /></td>
  </tr>
  </table>  
</form>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td width="81" height="30" align="center">ID</td>
    <td width="294" height="30" align="center">����</td>
    <td width="92" height="30" align="center">����</td>
    <td width="273" align="center">����</td>
  </tr>
  <?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <form action="admin.php?m=cai_wei&a=add_db" method="post">
  <tr>
    <td height="25" align="center"><?php echo $this->_var['t']['id']; ?></td>
    <td height="25" align="center"><label for="wname"></label>
      <input name="wname" type="text" id="wname" value="<?php echo $this->_var['t']['wname']; ?>" />
      <input name="id" type="hidden" id="id" value="<?php echo $this->_var['t']['id']; ?>" /></td>
    <td height="25" align="center"><label for="orderid"></label>
      <input name="orderid" type="text" id="orderid" value="<?php echo $this->_var['t']['orderid']; ?>" size="6" /></td>
    <td align="center"><input type="submit" name="button2" id="button2" class="btn" value="�༭" />
    <input type="button" class="btn" value="ɾ��" onclick="location.href='admin.php?m=cai_wei&a=del&amp;id=<?php echo $this->_var['t']['id']; ?>'" />
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
