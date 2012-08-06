<div id="ajaxshopinfo" style="width:440px; height:350px; font-size:12px;">

<div class="row-fluid">
<div class="span6" >

			<table cellspacing="0"  style="background:none; " >
            
            	<tr >
                
                <td  colspan="2" style="height:30px;"><span style=" padding-left:6px; cursor:pointer; font-weight:900; font-size:16px; "><a href="index.php?m=shop&shopid=<?php echo $this->_var['shop']['shopid']; ?>" target="_blank"><?php echo $this->_var['shop']['shopname']; ?></a></span> <?php if ($this->_var['ssuser']['userid']): ?> <?php if ($this->_var['shop']['isfav']): ?><a href="javascript:;" class='delshopfav' shopid="<?php echo $this->_var['shop']['shopid']; ?>" onclick="$.get('index.php?m=fav&a=shopdel&shopid=<?php echo $this->_var['shop']['shopid']; ?>');$(this).text('已移除')">移除首页</a><?php else: ?><a href="javascript:;" class='addshopfav' onclick="$.get('index.php?m=fav&a=shopadd&shopid=<?php echo $this->_var['shop']['shopid']; ?>');$(this).text('已收藏')" shopid="<?php echo $this->_var['shop']['shopid']; ?>">加入首页</a><?php endif; ?><?php endif; ?></td>
                </tr>
				<tr >
					<th style="width:60px;">外卖时间</th>
					<td><?php echo $this->_var['shopconfig']['starthour']; ?>:<?php echo $this->_var['shopconfig']['startminute']; ?>-<?php echo $this->_var['shopconfig']['endhour']; ?>:<?php echo $this->_var['shopconfig']['endminute']; ?></td>
				</tr>
				<tr class="restaurant_info_item unknown">
					<th>送餐费用</th>
					<td>-</td>
				</tr>
				<tr class="restaurant_info_item">
					<th>起送金额</th>
					<td><?php echo $this->_var['shopconfig']['minprice']; ?>元</td>
				</tr>
				<tr class="restaurant_info_item">
					<th>送餐范围</th>
					<td><?php echo $this->_var['shop']['sendarea']; ?></td>
				</tr>
								<tr class="restaurant_info_item">
					<th style="height:auto;">还有……</th>
					<td>
						<?php echo $this->_var['shop']['info']; ?>
					</td>
				</tr>
								
								
			</table>
</div>

<div class="span6" >
<ul class="unstyled" style="height:350px; overflow-y:scroll;">
<!--美食分类及列表开始-->
<?php $_from = $this->_var['shop']['caicat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
				<li style="display:block; background-color:#E6E6E6;">
					<?php echo $this->_var['cat']['cname']; ?>					
				</li>
<!--美食列表-->
<?php $_from = $this->_var['cat']['cailist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cai');if (count($_from)):
    foreach ($_from AS $this->_var['cai']):
?>
						<li><?php echo $this->_var['cai']['title']; ?> -<?php echo $this->_var['cai']['price']; ?>元/份 </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<!--美食列表结束-->
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

<!--店铺美食结束-->	
</ul>
</div>

</div>