<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>网站基本设置</title>
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="<?php echo $this->_var['skins']; ?>js/common.js"></script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">

<div class="right">
<div class="nav"><a href="javascript::">网站信息</a></div>
<div class="nav_title">网站信息管理</div>
<div class="rbox">
<form action="admin.php?m=web&a=add_db" name="f1" method="post">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td width="16%" height="25" align="right">网站名称：</td>
    <td width="84%"><label for="webname"></label>
      <input name="webname" type="text" id="webname" value="<?php echo $this->_var['web']['webname']; ?>" size="40" /></td>
  </tr>
  <tr>
    <td height="25" align="right">logo：</td>
    <td><input name="weblogo" type="text" id="weblogo" value="<?php echo $this->_var['web']['weblogo']; ?>" size="40" />
      <input type="submit" name="button2" id="button2" value="上传logo" onclick="window.open('admin.php?m=upload&formname=f1&editname=weblogo&f_type=1','文件上传','left=300px,height=400,width=500');" class="btn" /></td>
  </tr>
  <tr>
    <td height="25" align="right">wap：</td>
    <td><input name="wapurl" type="text" id="wapurl" value="<?php echo $this->_var['web']['wapurl']; ?>" />
      （例如:wap.koufukeji.com）</td>
  </tr>
  <tr>
    <td height="25" align="right">网站标题：</td>
    <td><label for="webtitle"></label>
      <input name="webtitle" type="text" id="webtitle" value="<?php echo $this->_var['web']['webtitle']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="25" align="right">网站网址：</td>
    <td><label for="weburl"></label>
      <input name="weburl" type="text" id="weburl" value="<?php echo $this->_var['web']['weburl']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="25" align="right">关键字：</td>
    <td><label for="webkey"></label>
      <input name="webkey" type="text" id="webkey" value="<?php echo $this->_var['web']['webkey']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="25" align="right">描述：</td>
    <td><label for="webdesc"></label>
      <textarea name="webdesc" cols="80" rows="6" id="webdesc"><?php echo $this->_var['web']['webdesc']; ?></textarea></td>
  </tr>
  <tr>
    <td height="25" align="right">公告：</td>
    <td><textarea name="webgg" id="webgg" cols="80" rows="6"><?php echo $this->_var['web']['webgg']; ?></textarea></td>
  </tr>
  <tr>
    <td height="25" align="right">备案号：</td>
    <td><label for="beian"></label>
      <input name="beian" type="text" id="beian" value="<?php echo $this->_var['web']['beian']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="25" align="right">公司地址：</td>
    <td><label for="address"></label>
      <input name="address" type="text" id="address" value="<?php echo $this->_var['web']['address']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="25" align="right">QQ：</td>
    <td><label for="webqq"></label>
      <input name="webqq" type="text" id="webqq" value="<?php echo $this->_var['web']['webqq']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="25" align="right">MSN：</td>
    <td><label for="webmsn"></label>
      <input name="webmsn" type="text" id="webmsn" value="<?php echo $this->_var['web']['webmsn']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="25" align="right">电话：</td>
    <td><label for="phone"></label>
      <input name="phone" type="text" id="phone" value="<?php echo $this->_var['web']['phone']; ?>" /></td>
  </tr>
  <tr>
    <td height="25" align="right">暂停网站：</td>
    <td><input name="weboff" type="radio" id="radio" value="0" <?php if ($this->_var['web']['weboff'] == 0): ?> checked="checked" <?php endif; ?> />
      运营
      <label for="weboff">
        <input type="radio" name="weboff" id="radio2" value="1" <?php if ($this->_var['web']['weboff'] == 1): ?> checked="checked" <?php endif; ?> />
      暂停</label></td>
  </tr>
  <tr>
    <td height="25" align="right">暂停原因：</td>
    <td><label for="offwhy"></label>
      <textarea name="offwhy" id="offwhy" cols="80" rows="5"><?php echo $this->_var['web']['offwhy']; ?></textarea></td>
  </tr>
  <tr>
    <td height="35" align="right">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="确认" class="btn"/></td>
  </tr>
</table>

</form>
</div>
</div>


</div>
</body>
</html>
