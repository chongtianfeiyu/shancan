<?php echo $this->fetch('lib/top.lbi'); ?>
<script type="text/javascript" src="xheditor/xheditor.js" ></script>
<script language="javascript">
$(document).ready(function()
{
	$('#content').xheditor({tools:'simple',upImgUrl:"admin.php?m=upfile&xh=1",upImgExt:"jpg,jpeg,gif,png",html5Upload:false});
	
	$("#provinceid").live("change",function()
	{
		$.get("admin.php?m=city&a=ajaxcitys&provinceid="+$(this).val(),function(data)
		{
			$("#cityid").empty().css("display"," ").append(data);
			$("#townid").empty().css("display","none");
			 
		})
	});
	
	$("#cityid").live("change",function()
	{
		$.get("admin.php?m=town&a=ajaxtowns&cityid="+$(this).val(),function(data)
		{
			
			$("#townid").empty().append(data).show();
		
		});
	});
	
	$("#sendarea_add").live("click",function()
	{
		$("#sendarea_addbox").css("display","block");
		$.get("admin.php?m=province&a=ajaxprovinces",function(data)
		{
			$("#sprovinceid").empty().append(data).show();
		})
	});
	
	$("#sprovinceid").live("change",function()
	{
		$.get("admin.php?m=city&a=ajaxcitys&provinceid="+$(this).val(),function(data)
		{
			$("#scityid").empty().css("display"," ").append(data);
			$("#stownid").empty().css("display","none");
			 
		})
	});
	
	$("#scityid").live("change",function()
	{
		$.get("admin.php?m=town&a=ajaxtowns&cityid="+$(this).val(),function(data)
		{
			
			$("#stownid").empty().append(data).show();
		
		});
	});
	
	$("#sendareaadd").live("click",function()
	{
		provinceid=$("#sprovinceid").val();
		cityid=$("#scityid").val();
		townid=$("#stownid").val();
		
		ss=""+$("#sprovinceid option:selected").text()+","+$("#scityid option:selected").text()+","+$("#stownid option:selected").text();
		sendarea=""+provinceid+","+cityid+","+townid+"";
		$("#sendareahtml").append("<span><input type='hidden' size='20' name='sendarea[]' class='sendarea' value='"+sendarea+"'>"+ss+" <a href='javascript:;' class='delsendarea'>删除</a><br></span>");
		$("#sendarea_addbox").css("display","none");
		
	});
	
	$(".delsendarea").live("click",function()
	{
		$(this).parent("span").remove();
	})
	
	
});

</script>
<div class="nav"><a href="shopadmin.php?m=shop">店铺信息</a> </div>
<div class="nav_title">店铺信息</div>
<div class="rbox">
<form method="post" action="shopadmin.php?m=shop&a=add_db" name="f1">
<input type="hidden" name="shopid" value="<?php echo $this->_var['shop']['shopid']; ?>" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="tb1">
  <tr>
    <td width="13%" align="right">商店名称：</td>
    <td width="87%" align="left"><input name="shopname" type="text" id="shopname" value="<?php echo $this->_var['shop']['shopname']; ?>" size="50" /></td>
    </tr>
  
  <tr>
    <td align="right">店铺logo：</td>
    <td align="left"><input type="text" name="logo" value="<?php echo $this->_var['shop']['logo']; ?>" style="width:200px;" /> <input type="button" name="button3" id="button3" value="上传图片" onclick="window.open('shopadmin.php?m=upload&formname=f1&editname=logo&f_type=1','文件上传','left=300px,height=400,width=500');" class="btn" /> </td>
  </tr>
  <tr>
    <td align="right">所在区域：</td>
    <td align="left">
    <span>
    <select name="provinceid" id="provinceid">
      <option value="0">一级区域</option>
      <?php $_from = $this->_var['provinces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'p');if (count($_from)):
    foreach ($_from AS $this->_var['p']):
?>
      <option value="<?php echo $this->_var['p']['provinceid']; ?>" <?php if ($this->_var['shop']['provinceid'] == $this->_var['p']['provinceid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['p']['province']; ?></option>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </select>
    </span>
    <span>
      <select name="cityid" id="cityid">
        <option value="0">二级区域</option>
        <?php $_from = $this->_var['citys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
        <option value="<?php echo $this->_var['c']['cityid']; ?>" <?php if ($this->_var['c']['cityid'] == $this->_var['shop']['cityid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['city']; ?></option>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select>
      </span>
      <span>
      <select name="townid" id="townid">
        <option value="0">三级区域</option>
        <?php $_from = $this->_var['towns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
        <option value="<?php echo $this->_var['t']['townid']; ?>" <?php if ($this->_var['t']['townid'] == $this->_var['shop']['townid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['t']['town']; ?></option>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select>
      </span></td>
    </tr>
 
  
  <tr>
    <td align="right">详细地址：</td>
    <td align="left"><input name="address" type="text" id="address" value="<?php echo $this->_var['shop']['address']; ?>" size="50" /></td>
    </tr>
  <tr>
    <td align="right">QQ：</td>
    <td align="left"><label for="qq"></label>
      <input name="qq" type="text" id="qq" value="<?php echo $this->_var['shop']['qq']; ?>" size="30" /></td>
  </tr>
  <tr>
    <td align="right">phone：</td>
    <td align="left"><label for="phone"></label>
      <input name="phone" type="text" id="phone" value="<?php echo $this->_var['shop']['phone']; ?>" size="40" /></td>
  </tr>
  <tr>
    <td align="right">经营许可证：</td>
    <td align="left"><label for="shopno"></label>
      <input name="shopno" type="text" id="shopno" value="<?php echo $this->_var['shop']['shopno']; ?>" size="40" /></td>
  </tr>
  <tr>
    <td align="right">配送区域：</td>
    <td align="left" style="line-height:30px;"><div id="sendareahtml">
    <?php $_from = $this->_var['shopareas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shoparea');if (count($_from)):
    foreach ($_from AS $this->_var['shoparea']):
?>
    <span><input type="hidden" name="sendarea[]" value="<?php echo $this->_var['shoparea']['provinceid']; ?>,<?php echo $this->_var['shoparea']['cityid']; ?>,<?php echo $this->_var['shoparea']['townid']; ?>" /><?php echo $this->_var['shoparea']['province']; ?>,<?php echo $this->_var['shoparea']['city']; ?>,<?php echo $this->_var['shoparea']['town']; ?> <a href="javascript:;" class="delsendarea">删除</a><br /></span>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div> <a href="javascript:;" id="sendarea_add">添加配送区域</a>
    
    <div id="sendarea_addbox" style="display:none;"><select id="sprovinceid"></select><select id="scityid"><option value="0">选择</option></select><select id="stownid"><option value="0">选择</option></select><a href="javascript:;" id="sendareaadd">添加</a></div>
    </td>
  </tr>
  <tr>
    <td align="right">简介：</td>
    <td align="left"><label for="info"></label>
      <textarea name="info" id="info" cols="45" rows="5" style="width:600px; height:50px;" ><?php echo $this->_var['shop']['info']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">详情：</td>
    <td align="left"><label for="content"></label>
      <textarea name="content" id="content"  style="width:90%; height:400px;"><?php echo $this->_var['shop']['content']; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left"><input type="submit" name="button" id="button" value="提交" class="btn" /></td>
    </tr>
</table>


</form>
</div>
<?php echo $this->fetch('lib/foot.lbi'); ?>