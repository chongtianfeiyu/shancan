<?php echo $this->fetch('lib/top.lbi'); ?>
<div class="nav"><a href="admin.php?m=province&">一级区域管理</a> <a href="admin.php?m=city&">二级区域管理</a> <a href="admin.php?m=town&">三级区域管理</a></div>
<div class="nav_title">二级区域添加</div>
<div class="rbox">
<form method="post" action="admin.php?m=city&a=add_db&provinceid=<?php echo $this->_var['provinceid']; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="16%">&nbsp;</td>
    <td width="84%"><textarea name="citys" id="citys" cols="45" rows="5"></textarea>
      一次可以添加多个 每行一个</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="添加" class="btn"></td>
  </tr>
</table>


</form>

</div>

<?php echo $this->fetch('lib/foot.lbi'); ?>