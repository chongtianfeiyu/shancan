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
<div class="nav">
<a href="shopadmin.php?m=config&">营业设置</a>

</div>
<div class="nav_title">营业信息设置</div>
<div class="rbox">
<form action="shopadmin.php?m=config&a=db" method="post">
<table width="100%" border="0" cellspacing="1" cellpadding="0" class="tb1">
  <tr>
    <td height="30" align="right">订餐方式：</td>
    <td height="30">
    <input type="radio" name="ordertype" id="radio7" value="1" <?php if ($this->_var['rs']['ordertype'] == 1): ?> checked="checked" <?php endif; ?> /> 电话订餐
       
        <input type="radio" name="ordertype" id="radio8" value="0" <?php if ($this->_var['rs']['ordertype'] == 0): ?> checked="checked" <?php endif; ?>  /> 网上订餐
       </td>
  </tr>
  <tr>
    <td height="30" align="right">按星期显示：</td>
    <td height="30"><input type="radio" name="showweek" id="radio3" value="1" <?php if ($this->_var['rs']['showweek'] == 1): ?> checked="checked"<?php endif; ?> />开启 
        <input type="radio" name="showweek" id="radio4" value="0" <?php if ($this->_var['rs']['showweek'] == 0): ?> checked="checked"<?php endif; ?> />关闭</td>
  </tr>
  <tr>
    <td height="30" align="right">开启开业时间：</td>
    <td height="30"><input type="radio" name="opentime" id="radio" value="1" <?php if ($this->_var['rs']['opentime'] == 1): ?> checked="checked"<?php endif; ?> />开启 
        <input name="opentime" type="radio" id="radio2" value="0"<?php if ($this->_var['rs']['opentime'] != 1): ?> checked="checked"<?php endif; ?> />
        不开启 (开启后在可以自动关闭 非营业时间的购物功能)</td>
  </tr>
  <tr>
    <td width="186" height="30" align="right">开始时间：</td>
    <td width="910" height="30"><input name="starthour" type="text" id="starthour" value="<?php echo $this->_var['rs']['starthour']; ?>" size="6" />
      时
        <input name="startminute" type="text" id="startminute" value="<?php echo $this->_var['rs']['startminute']; ?>" size="6" />
        分 （时间为24小时制如：开始 9时 10分 结束 20时0分）</td>
  </tr>
  <tr>
    <td height="30" align="right">结束时间：</td>
    <td height="30"><input name="endhour" type="text" id="endhour" value="<?php echo $this->_var['rs']['endhour']; ?>" size="6" />
      时
        <input name="endminute" type="text" id="endminute" value="<?php echo $this->_var['rs']['endminute']; ?>" size="6" />
        分</td>
  </tr>
  <tr>
    <td height="30" align="right">最低送餐金额：</td>
    <td height="30"><input name="minprice" type="text" id="minprice" size="8" value="<?php echo $this->_var['rs']['minprice']; ?>" />
      元 送餐费用
        <label for="sendprice"></label>
        <input name="sendprice" type="text" id="sendprice" size="10" value="<?php echo $this->_var['rs']['sendprice']; ?>" />
        元</td>
  </tr>
  <tr>
    <td height="30" align="right">邮箱：</td>
    <td height="30">
      <input name="isemail" type="radio" id="radio5" value="0" <?php if ($this->_var['rs']['isemail'] == 0): ?>checked="checked"  <?php endif; ?>/>
    关闭
    <input name="isemail" type="radio" id="radio6" value="1" <?php if ($this->_var['rs']['isemail'] == 1): ?>checked="checked" <?php endif; ?> />
    开启 
      <input name="email" type="text" id="email" value="<?php echo $this->_var['rs']['email']; ?>" />
      邮箱地址（开启则订单会发往邮箱）</td>
  </tr>
  
  <tr>
    <td height="30" align="right">&nbsp;</td>
    <td height="30"><input type="submit" name="button" id="button" value="提交" class="btn" /></td>
  </tr>
  </table>


</form>

</div>

</div>


</div>
</body>
</html>
