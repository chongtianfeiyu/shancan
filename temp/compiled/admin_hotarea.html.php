<?php echo $this->fetch('lib/top.lbi'); ?>
<div class="nav"><a href="admin.php?m=hotarea">�ȵ���Ȧ</a></div>
<div class="nav_title">�ȵ���Ȧ����  </div>
<div class="rbox">
<form method="post" action="admin.php?m=hotarea&a=post">
<table width="100%" border="0" cellpadding="0" class="tb1">
  <tr>
    <td width="11%" align="center">ID</td>
    <td width="20%" align="center">��Ȧ����</td>
    <td width="28%" align="center">����</td>
    <td width="18%" align="center">����λ��</td>
    <td width="23%" align="center">����</td>
  </tr>
  <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ps');if (count($_from)):
    foreach ($_from AS $this->_var['ps']):
?>
  <tr>
    <td align="center"><?php echo $this->_var['ps']['id']; ?></td>
    <td align="center"><input type="text" name="title[<?php echo $this->_var['ps']['id']; ?>]" id="title[]" value="<?php echo $this->_var['ps']['title']; ?>"></td>
    <td align="center"><input type="text" name="orderindex[<?php echo $this->_var['ps']['id']; ?>]" id="orderindex[]" value="<?php echo $this->_var['ps']['orderindex']; ?>"></td>
    <td align="center"><label for="latlng"></label>
      <input type="text"   id="latlng" name="latlng[<?php echo $this->_var['ps']['id']; ?>]" value="<?php echo $this->_var['ps']['lat']; ?>,<?php echo $this->_var['ps']['lng']; ?>" /></td>
    <td align="center">
 
    <a href="admin.php?m=hotarea&a=del&id=<?php echo $this->_var['ps']['id']; ?>">ɾ��</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <tr>
    <td align="center">����</td>
    <td align="center"><input type="text" name="newtitle" id="newtitle"></td>
    <td align="center"><input type="text" name="neworderindex"></td>
    <td align="center"><input type="text"   id="newlatlng" name="newlatlng" value="" /></td>
    <td align="center">&nbsp;</td>
  </tr>
   <tr>
    <td colspan="6" align="left">����λ��˵���� <a  href="javascript:;" onclick='$("#mapbox").css("visibility","visible")'  >�����ȡ����λ��</a> Ȼ���Ƽ���  </td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><input type="submit" name="button" id="button" value="�ύ" class="btn"></td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>


</form>

</div>

<div id="mapbox" style=" visibility:hidden; position:fixed; left:200px; top:40px; width:640px;  height:460px; background-color:#FFFFFF; padding:5px 10px; border:1px solid #6C9;">
<div style="background-color:#66CC99; height:30px; line-height:30px; padding-left:10px; padding-right:10px;"><span style="float:left;">��ͼ��ע::</span> <span style="float:right;"><a href="javascript:;" id="getlatlng_close" onclick="$('#mapbox').css('visibility','hidden')">�ر�</a></span></div>
<iframe src="index.php?m=getlatlng" style="width:600px; height:420px; border:0;"></iframe></div>
<?php echo $this->fetch('lib/foot.lbi'); ?>