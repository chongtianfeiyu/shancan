<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>后台框架</title>
<script language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="xheditor/xheditor.js" ></script>
<script language="javascript" src="<?php echo $this->_var['skins']; ?>js/common.js"></script>
<script language="javascript">
$(document).ready(function()
{
$('#content').xheditor({forcePtag:false,upImgUrl:"shopadmin.php?m=upfile&xh=1",upImgExt:"jpg,jpeg,gif,png",html5Upload:false});
});
</script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">

<div class="right">
<div class="nav"><a href="shopadmin.php?m=cai&">美食管理</a> <a href="shopadmin.php?m=cai&a=add">添加美食</a></div>
<div class="nav_title">添加美食</div>
<div class="rbox">
<form action="shopadmin.php?m=cai&a=add_db" method="post" name="f1" id="f1">
<table width="100%" border="0"   cellpadisding="0" cellspacing="0" class="tb1">
  <tr>
    <td width="134" height="25" align="right">菜名：</td>
    <td width="944" height="25">
      <input name="title" type="text" id="title" value="<?php echo $this->_var['rs']['title']; ?>" size="40" />
      <input name="id" type="hidden" id="id" value="<?php echo $this->_var['rs']['id']; ?>" /></td>
  </tr>
  <tr>
    <td height="25" align="right">所属分类：</td>
    <td height="25">
      <select name="catid" id="catid">
      <?php if ($this->_var['rs']['catid']): ?><option value="<?php echo $this->_var['rs']['catid']; ?>"><?php echo $this->_var['rs']['cname']; ?></option><?php endif; ?>
      <option>请选择分类</option>
      <?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
      <option value="<?php echo $this->_var['t']['catid']; ?>"><?php echo $this->_var['t']['cname']; ?></option>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select></td>
  </tr>
  <tr>
    <td height="25" align="right">美食做法：</td>
    <td height="25">
      <select name="doid" id="doid">
       <?php if ($this->_var['rs']['doid']): ?><option value="<?php echo $this->_var['rs']['doid']; ?>"><?php echo $this->_var['rs']['dname']; ?></option><?php endif; ?>
      <option>请选择做法</option>
      <?php $_from = $this->_var['dolist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
      <option value="<?php echo $this->_var['t']['id']; ?>"><?php echo $this->_var['t']['dname']; ?></option>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select></td>
  </tr>
  <tr>
    <td height="25" align="right">美食味道：</td>
    <td height="25">
      <select name="weiid" id="weiid">
       <?php if ($this->_var['rs']['weiid']): ?><option value="<?php echo $this->_var['rs']['weiid']; ?>"><?php echo $this->_var['rs']['wname']; ?></option><?php endif; ?>
      <option>请选择味道</option>
      <?php $_from = $this->_var['weilist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
      <option value="<?php echo $this->_var['t']['id']; ?>"><?php echo $this->_var['t']['wname']; ?></option>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select></td>
  </tr>
  <tr>
    <td height="25" align="right">缩略图：</td>
    <td height="25"><input name="thum_img" type="text" id="thum_img" value="<?php echo $this->_var['rs']['thum_img']; ?>" size="50" />
      <input type="button" name="button3" id="button3" value="上传图片" onclick="window.open('shopadmin.php?m=upload&formname=f1&editname=thum_img&f_type=1','文件上传','left=300px,height=400,width=500');" class="btn" />
      (可不填 图片宽高：200*200)</td>
  </tr>
  <tr>
    <td height="25" align="right">美食图片：</td>
    <td height="25">
      <input name="img" type="text" id="img" value="<?php echo $this->_var['rs']['img']; ?>" size="50" />
      <input type="button" name="button2" id="button2" value="上传图片" onclick="window.open('shopadmin.php?m=upload&formname=f1&editname=img&f_type=1','文件上传','left=300px,height=400,width=500');" class="btn" /></td>
  </tr>
  <tr>
    <td height="25" align="right">关键字：</td>
    <td height="25">
      <input name="keyword" type="text" id="keyword" value="<?php echo $this->_var['rs']['keyword']; ?>" size="60" /></td>
  </tr>
  <tr>
    <td height="20" align="right">描述：</td>
    <td height="20">
      <textarea name="des" id="des" cols="60" rows="5"><?php echo $this->_var['rs']['des']; ?></textarea></td>
  </tr>
  <tr>
    <td height="25" align="right">价格：</td>
    <td height="20"><input name="price" type="text" id="price" value="<?php echo $this->_var['rs']['price']; ?>" size="8" />
      元</td>
  </tr>
  <tr>
    <td height="25" align="right">标签：</td>
    <td height="20"><input name="tagname" type="text" id="tagname" value="<?php echo $this->_var['tagname']; ?>" size="60" />
      <input name="tagname2" type="hidden" id="tagname2" value="<?php echo $this->_var['tagname']; ?>" />
      (多个用英文逗号隔开)</td>
  </tr>
  <tr>
    <td height="25" align="right">推荐属性：</td>
    <td height="20"><input name="isding" type="checkbox" id="isding" value="1" <?php if ($this->_var['rs']['isding'] == 1): ?> checked="checked"<?php endif; ?> />推荐 
        <input name="ishot" type="checkbox" id="ishot" value="1" <?php if ($this->_var['rs']['ishot'] == 1): ?> checked="checked" <?php endif; ?> />热门
               
          <input name="isnew" type="checkbox" id="isnew" value="1" <?php if ($this->_var['rs']['isnew'] == 1): ?> checked="checked" <?php endif; ?> /> 
          最新 
          <input name="promote" type="checkbox" id="promote" value="1" <?php if ($this->_var['rs']['promote'] == 1): ?> checked="checked"<?php endif; ?> />
          促销 （促销价
          <input name="lowprice" type="text" id="lowprice" size="8" value="<?php echo $this->_var['rs']['lowprice']; ?>" />
          ）</td>
  </tr>
  <tr>
    <td height="20" align="right">星期属性：</td>
    <td height="20">
    	<input name="week1" type="checkbox" id="week1" class="weeksele" value="1" <?php if ($this->_var['rs']['week1'] == 1): ?> checked="checked"<?php endif; ?> />周一 
        <input name="week2" type="checkbox" id="week2" class="weeksele" value="1" <?php if ($this->_var['rs']['week2'] == 1): ?> checked="checked"<?php endif; ?>/>周二 
        <input name="week3" type="checkbox" id="week3" class="weeksele" value="1" <?php if ($this->_var['rs']['week3'] == 1): ?> checked="checked"<?php endif; ?>/>周三 
        <input name="week4" type="checkbox" id="week4" class="weeksele" value="1" <?php if ($this->_var['rs']['week4'] == 1): ?> checked="checked"<?php endif; ?>/>周四
        <input name="week5" type="checkbox" id="week5" class="weeksele" value="1" <?php if ($this->_var['rs']['week5'] == 1): ?> checked="checked"<?php endif; ?>/>
        周五 
        <input name="week6" type="checkbox" id="week6" class="weeksele" value="1" <?php if ($this->_var['rs']['week6'] == 1): ?> checked="checked"<?php endif; ?>/>周六 
        <input name="week7" type="checkbox" id="week7" class="weeksele" value="1" <?php if ($this->_var['rs']['week7'] == 1): ?> checked="checked"<?php endif; ?>/>
        周日
        <a href="javascript:;" onclick="$('.weeksele').attr('checked',true)">全选</a></td>
  </tr>
  <tr>
    <td height="20" align="right">详情：</td>
    <td height="20"><textarea name="content" id="content"  style="width:100%; height:600px;">
    <?php echo $this->_var['rs']['content']; ?></textarea></td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
    <td height="20"><input type="submit" name="button" id="button" class="btn" value="确定" /></td>
  </tr>
</table>

</form>
</div>

</div>


</div>
</body>
</html>
