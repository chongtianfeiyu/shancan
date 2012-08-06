<?php echo $this->fetch('lib/top.lbi'); ?>
<div class="nav"><a href="admin.php?m=shop">店铺管理</a> <a href="admin.php?m=shop&a=cat">店铺分类</a></div>
<div class="nav_title">店铺分类</div>
<form method="post" action="admin.php?m=shop&a=cat&op=post">
<table class="tb1">
<tr>
<td align="center">ID</td>
<td>名称</td>
<td>排序</td>
<td>操作</td>
</tr>
<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<tr>
  <td><?php echo $this->_var['c']['catid']; ?></td>
  <td><input type="text" name="cname[<?php echo $this->_var['c']['catid']; ?>]" value="<?php echo $this->_var['c']['cname']; ?>"></td>
  <td><input type="text" name="orderindex[<?php echo $this->_var['c']['catid']; ?>]" value="<?php echo $this->_var['c']['orderindex']; ?>"></td>
  <td><a href="admin.php?m=shop&a=delcat&catid=<?php echo $this->_var['c']['catid']; ?>" onClick="return confirm('删除后不可恢复，确认删除？')">删除</a></td>
</tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<tr>
  <td>&nbsp;</td>
  <td><input type="text" name="newcname" value=""></td>
  <td><input type="text" name="neworderindex" value=""></td>
  <td>新增</td>
</tr>
<tr>
  <td colspan="4" align="center"><input type="submit" name="" value="保存" class="btn"></td>
  </tr>
</table>

</form>
<?php echo $this->fetch('lib/foot.lbi'); ?>