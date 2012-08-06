<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>地图标注</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">
<div class="right">
<div class="nav"><a href="shopadmin.php?m=map&">店铺信息</a></div>
<div class="nav_title">店铺信息</div>
<div class="rbox">
<div style="float:left; width:55%;"><div id="map_canvas" style="width:100%; height:500px; "></div></div>

<div style="float:right; width:44%;">
<form method="post" action="shopadmin.php?m=map&a=post">
<table width="100%" border="0" cellpadding="1" class="tb1">
  <tr>
    <td width="20%" height="27" align="right">商店名称：</td>
    <td width="80%"><input name="shopname" type="text" id="shopname" value="<?php echo $this->_var['rs']['shopname']; ?>" size="40" /></td>
  </tr>
  <tr>
    <td height="23" align="right">联系电话：</td>
    <td><input name="phone" type="text" id="phone" value="<?php echo $this->_var['rs']['phone']; ?>" size="40" /></td>
  </tr>
  <tr>
    <td height="24" align="right">QQ：</td>
    <td><label for="qq"></label>
      <input name="qq" type="text" id="qq" value="<?php echo $this->_var['rs']['qq']; ?>" /></td>
  </tr>
  <tr>
    <td height="24" align="right">标注参数：</td>
    <td><input name="area" type="text" id="area" value="<?php echo $this->_var['rs']['lat']; ?>,<?php echo $this->_var['rs']['lng']; ?>" size="40" /> <a href="javascript:;" onclick="document.getElementById('area').value='118.18045211417393,24.481007243304155 ';">初始化</a></td>
  </tr>
  <tr>
    <td height="24" align="right">详细地址：</td>
    <td><input name="address" type="text" id="address" value="<?php echo $this->_var['rs']['address']; ?>" size="40" /></td>
  </tr>
  <tr>
    <td align="right">配送范围：</td>
    <td><label for="sendarea"></label>
      <textarea name="sendarea" id="sendarea" cols="45" rows="5"><?php echo $this->_var['rs']['sendarea']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">其他信息：</td>
    <td><textarea name="info" id="info" style="width:80%; height:80px;"><?php echo $this->_var['rs']['info']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">说明：</td>
    <td>点击地图标注即可，在标注参数里会显示标注信息，标注完提交</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="提交" class="btn" /></td>
  </tr>
</table>
</form>
</div>
<script type="text/javascript">

		var map = new BMap.Map("map_canvas");
		var point = new BMap.Point(<?php if ($this->_var['rs']['lat'] != 0): ?><?php echo $this->_var['rs']['lat']; ?>,<?php echo $this->_var['rs']['lng']; ?><?php else: ?>118.1804,24.4810<?php endif; ?>);
		map.centerAndZoom(point, 14);
		map.enableScrollWheelZoom();
		var marker = new BMap.Marker(point);
		map.addOverlay(marker);
		 
		map.addEventListener("click", function(e){
		  document.getElementById("area").value=e.point.lng + ", " + e.point.lat;
		  var newpoint=new BMap.Point(e.point.lng,e.point.lat);
		  map.clearOverlays(marker);
		 marker = new BMap.Marker(newpoint);
		  map.addOverlay(marker);
		});

</script>

</div>
</div>
</div>

</body>
</html>
