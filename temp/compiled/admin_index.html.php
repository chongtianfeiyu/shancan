<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理员登陆</title>
<style type="text/css">
*{font-size:14px; margin:0;}
.txt{height:18px;}
body{background-image:url(<?php echo $this->_var['skins']; ?>images/index_bg.jpg);}
.tb{ margin:0 auto; width:640px; height:300px; background:url(<?php echo $this->_var['skins']; ?>images/index_bg2.jpg); font-size:13px; color:#FFF; margin-top:130px;}
.alpha{filter:alpha(opacity=70);}
</style>
</head>

<body>

<table width="640" border="0" align="center" cellpadding="0" cellspacing="0" class="tb">
  <tr>
    <td width="296" height="117">&nbsp;</td>
    <td width="344">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="admin.php?m=login&a=login" method="post" target="_parent"><table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="31%" height="30" align="right">用户名：</td>
        <td width="69%"><input type="text" name="adminname" id="adminname" class="txt" /></td>
      </tr>
      <tr>
        <td height="30" align="right">密码：</td>
        <td><input type="password" name="password" id="password" class="txt"  /></td>
      </tr>
      <tr>
        <td height="30" align="right">校验码：</td>
        <td valign="middle"><input name="yzm" type="text" id="yzm" size="8" class="txt"  /><img src="includes/lib_yzm.php" height="25" align="absmiddle" id="img" onclick="img.src='includes/lib_yzm.php?'+Math.random()" /></td>
      </tr>
      <tr>
        <td height="25" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25" align="right">&nbsp;</td>
        <td><input type="submit" name="button" id="button" value="登陆" />
          <input type="reset" name="button2" id="button2" value="取消" /></td>
      </tr>
    </table></form></td>
  </tr>
</table>

</body>
</html>