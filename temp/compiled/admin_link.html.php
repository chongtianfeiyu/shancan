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
<div class="nav"><a href="admin.php?m=link&">���ӹ���</a> <a href="admin.php?m=link&a=add">�������</a></div>
<div class="nav_title">���ӹ���</div>
<div class="rbox">
  <form action="admin.php?m=link&a=order" method="post">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="mid tb1">
  <tr>
    <td width="51" height="30" align="center">ID</td>
    <td width="346" height="30" align="center">��������</td>
    <td width="106" height="30" align="center">����</td>
    <td width="76" align="center">����</td>
    <td width="121" align="center">����</td>
  </tr>
  <?php $_from = $this->_var['linklist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <tr>
    <td height="25" align="center"><?php echo $this->_var['t']['id']; ?></td>
    <td height="25"><?php echo $this->_var['t']['title']; ?>
      <input name="id[]" type="hidden" id="id[]" value="<?php echo $this->_var['t']['id']; ?>" /></td>
    <td height="25" align="center"><?php if ($this->_var['t']['linktype'] == 0): ?>��ͨ<?php else: ?>��ҳ<?php endif; ?></td>
    <td align="center"><input name="orderid[]" type="text" id="orderid[]" value="<?php echo $this->_var['t']['orderid']; ?>" size="6" /></td>
    <td align="center"><a href="admin.php?m=link&a=add&id=<?php echo $this->_var['t']['id']; ?>">�༭</a> <a href="admin.php?m=link&a=del&id=<?php echo $this->_var['t']['id']; ?>">ɾ��</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <tr>
    <td height="30" align="center">&nbsp;</td>
    <td height="30" align="center">&nbsp;</td>
    <td height="30" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center"><input type="submit" name="button" id="button" class="btn" value="��������" /></td>
  </tr>
  </table>

  
  </form>
  
</div> 

</div>


</div>
</body>
</html>
