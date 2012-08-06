<div  style="width:300px; display:block;" >
	<div id="cart_min" class="noncollapsible empty denied noorder"  style="position:fixed;    right:0px; top:100px; border:1px #FFF solid;   z-index:10000; "><a href="javascript:;" class="btn btn-success" onclick="$('#cart_outer').css('display','block')"><<</a></div>
    
    
	<div id="cart_outer" class="noncollapsible empty denied noorder" style="position:fixed; width:320px; display:none; background-color:#9CF;  top:100px; right:0px; border:1px #FFF solid; padding:6px 6px 10px 6px; z-index:10000; ">
			<div style="width:100%; height:30px; line-height:30px; border-bottom:1px #FFF solid; ">			
				<span style="float:left; display:block;"><span class="btn btn-primary">在线订餐</span></span>
                <span style="float:right;  display:block;"><a href="javascript:;" class="btn btn-success btn-small"  onclick="$('#cart_outer').css('display','none')"> >> </a></span>
                </div>
			
		 <div id="shopcarinfo">
            <!--购物车列表-->
            
            <?php $_from = $this->_var['shopcart']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 's');if (count($_from)):
    foreach ($_from AS $this->_var['s']):
?>
            <p class="restaurant " id="cart_restaurant<?php echo $this->_var['s']['shopid']; ?>">
            <h3><a href="index.php?m=shop&shopid=<?php echo $this->_var['s']['shopid']; ?>" target="_blank"><?php echo $this->_var['s']['shopname']; ?></a> <small><?php if ($this->_var['s']['phone']): ?>(电话：<?php echo $this->_var['s']['phone']; ?> )<?php endif; ?></small></h3>
            
            <table>
            <?php $_from = $this->_var['s']['cailist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cai_0_09836200_1337777209');if (count($_from)):
    foreach ($_from AS $this->_var['cai_0_09836200_1337777209']):
?>   
            <tr>
            <td class="span4"><?php echo $this->_var['cai_0_09836200_1337777209']['title']; ?></td>
            <td class="span3"><?php echo $this->_var['cai_0_09836200_1337777209']['price']; ?></td>
            
            <td class="span3"><a href="javascript:;" class=" cart_l" caiid='<?php echo $this->_var['cai_0_09836200_1337777209']['caiid']; ?>'>-</a>
            <span class="cart_count" id="cart_count<?php echo $this->_var['cai_0_09836200_1337777209']['caiid']; ?>"><?php echo $this->_var['cai_0_09836200_1337777209']['cainum']; ?></span>
            <a href="javascript:;" class="  cart_r" caiid='<?php echo $this->_var['cai_0_09836200_1337777209']['caiid']; ?>'>+</a>
            </td>
            
            <td class="span2  cart_delete   "  caiid='<?php echo $this->_var['cai_0_09836200_1337777209']['caiid']; ?>'><span class="pointer icon-remove"> </span></td>
           </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
            </p>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <!--购物车结束-->
            
          <p>总价：<span id="totalmoney"><?php echo $this->_var['totalmoney']; ?></span>元</p>
          </div> 
			<p>
				(点击左侧的餐品，然后这里下单，再不用打电话啦)
			</p>
			<div id="order_controls">
				<a id="cart_clear"  class="btn  btn-danger " href="index.php?m=shopcar&a=clearCar" rel="nofollow"> 清空 </a>
				<a id="cart_submit" class="btn btn-primary" href="index.php?m=shopcar&a=buy" rel="nofollow"> 创建订单 </a>
                <?php if ($this->_var['ssuser']): ?>
				<a id="cart_view" class="btn btn-warning" href="index.php?m=order&a=history" rel="nofollow">查看订单</a>
                <?php endif; ?>
			</div>
		
			</div>
	
</div>