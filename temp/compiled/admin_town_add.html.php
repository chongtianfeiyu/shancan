<?php echo $this->fetch('lib/top.lbi'); ?>
<div class="nav"><a href="admin.php?m=province&">һ���������</a> <a href="admin.php?m=city&">�����������</a> <a href="admin.php?m=town&">�����������</a></div>
<div class="nav_title">������������</div>
<div class="rbox">
<form method="post" action="admin.php?m=town&a=add_db&cityid=<?php echo $this->_var['cityid']; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="16%">&nbsp;</td>
    <td width="84%"><textarea name="towns" id="towns" cols="45" rows="5"></textarea>
      һ�ο������Ӷ�� ÿ��һ��</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="����" class="btn"></td>
  </tr>
</table>


</form>

</div>

<?php echo $this->fetch('lib/foot.lbi'); ?>