<?php echo $this->fetch('lib/top.lbi'); ?>
<div class="nav"><a href="admin.php?m=shop">���̹���</a> <a href="admin.php?m=shop&a=cat">���̷���</a></div>
<div class="nav_title">���̷���</div>
<form method="post" action="admin.php?m=shop&a=cat&op=post">
<table class="tb1">
<tr>
<td align="center">ID</td>
<td>����</td>
<td>����</td>
<td>����</td>
</tr>
<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
  <td><?php echo $this->_var['c']['catid']; ?></td>
  <td><input type="text" name="cname[<?php echo $this->_var['c']['catid']; ?>]" value="<?php echo $this->_var['c']['cname']; ?>"></td>
  <td><input type="text" name="orderindex[<?php echo $this->_var['c']['catid']; ?>]" value="<?php echo $this->_var['c']['orderindex']; ?>"></td>
  <td><a href="admin.php?m=shop&a=delcat&catid=<?php echo $this->_var['c']['catid']; ?>" onClick="return confirm('ɾ���󲻿ɻָ���ȷ��ɾ����')">ɾ��</a></td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<tr>
  <td>&nbsp;</td>
  <td><input type="text" name="newcname" value=""></td>
  <td><input type="text" name="neworderindex" value=""></td>
  <td>����</td>
</tr>
<tr>
  <td colspan="4" align="center"><input type="submit" name="" value="����" class="btn"></td>
  </tr>
</table>

</form>
<?php echo $this->fetch('lib/foot.lbi'); ?>