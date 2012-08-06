<?php echo $this->fetch('lib/top.lbi'); ?>
<div class="nav">
<a href="admin.php?m=sites">分站管理</a>
</div>
<div class="nav_title">分站管理</div>
<div class="rbox">
<form method="post" action="admin.php?m=sites&a=post">
<table border="0" cellspacing="0" class="tb1">
  <tr>
    <td width="123" align="center">ID</td>
    <td width="331" align="center">站点名称</td>
    <td width="307" align="center">排序</td>
    <td width="378" align="center">绑定域名</td>
    <td width="378" align="center">地理位置</td>
    <td width="378" align="center">操作</td>
  </tr>
  <?php $_from = $this->_var['sites']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 's');if (count($_from)):
    foreach ($_from AS $this->_var['s']):
?>
  <tr>
    <td align="center"><?php echo $this->_var['s']['siteid']; ?></td>
    <td align="center"><input type="text" name="sitename[<?php echo $this->_var['s']['siteid']; ?>]" id="sitename[]" value="<?php echo $this->_var['s']['sitename']; ?>"></td>
    <td align="center"> 
      <input name="orderindex[<?php echo $this->_var['s']['siteid']; ?>]" type="text" id="orderindex[]" size="8" value="<?php echo $this->_var['s']['orderindex']; ?>"></td>
    <td align="center"><input type="text" name="domain[<?php echo $this->_var['s']['siteid']; ?>]" value="<?php echo $this->_var['s']['domain']; ?>" /></td>
    <td align="center"><label for="latlng[]"></label>
      <input type="text" name="latlng[<?php echo $this->_var['s']['siteid']; ?>]" id="latlng[<?php echo $this->_var['s']['siteid']; ?>]" value="<?php echo $this->_var['s']['lat']; ?>,<?php echo $this->_var['s']['lng']; ?>" /></td>
    <td align="center"><a href="admin.php?m=sites&a=del&siteid=<?php echo $this->_var['s']['siteid']; ?>">删除</a>  <a href="admin.php?m=top&setsite=yes&siteid=<?php echo $this->_var['s']['siteid']; ?>" target="header-frame">切换</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><label for="newsitename"></label>
      <input type="text" name="newsitename" id="newsitename"></td>
    <td align="center"><label for="neworderindex"></label>
      <input name="neworderindex" type="text" id="neworderindex" size="8"></td>
    <td align="center"><input type="text" name="newdomain" value="" /></td>
    <td align="center"><label for="newlatlng"></label>
      <input type="text" name="newlatlng" id="newlatlng" /></td>
    <td align="center">新增</td>
  </tr>
  <tr>
    <td colspan="6" align="left">地理位置说明： <a  href="javascript:;" onclick='$("#mapbox").css("visibility","visible")'  >点击获取地理位置</a> 然后复制即可  </td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="4" align="left"><input type="submit" name="button" id="button" value="保存" class="btn"></td>
    </tr>
</table>
</form>
</div>
<div id="mapbox" style=" visibility:hidden; position:fixed; left:200px; top:40px; width:640px;  height:460px; background-color:#FFFFFF; padding:5px 10px; border:1px solid #6C9;">
<div style="background-color:#66CC99; height:30px; line-height:30px; padding-left:10px; padding-right:10px;"><span style="float:left;">地图标注::</span> <span style="float:right;"><a href="javascript:;" id="getlatlng_close" onclick="$('#mapbox').css('visibility','hidden')">关闭</a></span></div>
<iframe src="index.php?m=getlatlng" style="width:600px; height:420px; border:0;"></iframe></div>
<?php echo $this->fetch('lib/foot.lbi'); ?>