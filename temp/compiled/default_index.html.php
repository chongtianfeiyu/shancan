<?php echo $this->fetch('lib/header.html'); ?>
<div class="well">
<p style="font-size:14px; font-weight:600;">常订餐？看看 <strong style="font-size:22px;"><?php echo $this->_var['shopnum']; ?></strong> 家餐厅的 <strong style="font-size:22px;"><?php echo $this->_var['cainum']; ?></strong> 道外卖美食。<a href="index.php?m=maps" class="btn  btn-success">现在就开始</a></p>
<div class="row-fluid">
<div class="span9"><img id="welcome_intro" src="images/welcome_intro.png" alt=""/></div>
<div class="span3"> <div class="span2"><a href="index.php?m=maps" class="btn  btn-warning">现在开始</a></div></div>

</div>
</div>

 <!--左侧浮动开始-->
<div style="position:fixed; left:10px; top:100px; z-index:1000; background-color:#FFFFFF;">
<ul class="nav nav-tabs nav-stacked">
<li><a href="javascript:;"><i class="icon-home"></i>店铺收藏</a></li>
  <?php $_from = $this->_var['shoplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shop');if (count($_from)):
    foreach ($_from AS $this->_var['shop']):
?> 
 <li class="dropdown">
 <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;"><?php echo cutstr($this->_var['shop']['shopname'],16); ?> <b class="caret"></b></a>
 <ul class="dropdown-menu">
 <?php $_from = $this->_var['shop']['caicat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
	<li> <a href="#section<?php echo $this->_var['c']['catid']; ?>" ><?php echo $this->_var['c']['cname']; ?></a> </li>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
    </ul>
</li> 
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul> 
</div>
<!--左侧浮动结束-->
 <div class="row">
 <div class="span8">
 
<div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
            <?php 
            global $cksiteid;
            mod_base("flashlist","SELECT * FROM ".table('flash')." WHERE siteid=".$cksiteid." ORDER BY fid DESC LIMIT 4" ); ?>
           <?php $_from = $this->_var['flashlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('k', 'f');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['f']):
?>
              <div class="item <?php if ($this->_var['k'] == 0): ?>active<?php endif; ?>">
                <img src="<?php echo $this->_var['f']['fimg']; ?>" alt="" style="width:100%; height:400px;">
                <div class="carousel-caption">
                  <h4><?php echo $this->_var['f']['ftitle']; ?></h4>
                 
                </div>
              </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </div>
            <a class="left carousel-control icon-chevron-left" href="#myCarousel" data-slide="prev">&#8249;</a>
            <a class="right carousel-control icon-chevron-right" href="#myCarousel" data-slide="next">&#8250;</a>
          </div>
 <table class="table table-bordered table-striped table-condensed">
 <thead><th   colspan="2" style="height:25px; line-height:25px;"> <?php if ($this->_var['favshops']): ?> 您定制的餐厅<?php else: ?>您还没有定制的餐厅<?php endif; ?> (<a href="index.php?m=maps">从地图页定制</a>)</th></thead>
 <tbody>
  <?php $_from = $this->_var['shoplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shop');if (count($_from)):
    foreach ($_from AS $this->_var['shop']):
?> 
 <tr>
 <td class="span3 f14"><strong><a href="index.php?m=shop&shopid=<?php echo $this->_var['shop']['shopid']; ?>" target="_blank"><?php echo $this->_var['shop']['shopname']; ?></a></strong><?php if ($this->_var['favshops']): ?> <a href="index.php?m=fav&a=shopdel&shopid=<?php echo $this->_var['shop']['shopid']; ?>"  class="icon-remove" title="从首页删除" rel="nofollow">&nbsp;</a><?php endif; ?></td>
 <td class="span9 caicatbtn"><?php $_from = $this->_var['shop']['caicat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
	 <a href="#section<?php echo $this->_var['c']['catid']; ?>" class="btn" ><?php echo $this->_var['c']['cname']; ?></a> 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
 </tr> <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </tbody>
 
 </table>
 
 <?php $_from = $this->_var['shoplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shop');if (count($_from)):
    foreach ($_from AS $this->_var['shop']):
?>
 <table class="table table-bordered">
 <tr><td>
 <h2>
 <a href="index.php?m=shop&shopid=<?php echo $this->_var['shop']['shopid']; ?>" class="value" target="_blank"><?php echo $this->_var['shop']['shopname']; ?></a>
 <small><?php if ($this->_var['shop']['opentype'] == 'doing'): ?>营业中<?php elseif ($this->_var['shop']['opentype'] == 'will'): ?>即将营业<?php else: ?>已打烊<?php endif; ?> <?php if ($this->_var['shop']['shopconfig']['ordertype']): ?>本店只支持电话订餐<?php endif; ?> <?php echo $this->_var['shop']['phone']; ?> 
 
 <?php if ($this->_var['shop']['isfav']): ?>
                        <a rel="nofollow" href="javascript:;" shopid="<?php echo $this->_var['shop']['shopid']; ?>"  class="btn btn-warning delshopfav">移出首页</a>
                        <?php else: ?>
						<a rel="nofollow" href="javascript:;" shopid="<?php echo $this->_var['shop']['shopid']; ?>"  class="btn btn_success fav-add addshopfav">加到首页</a>
                        <?php endif; ?></small></h2>
 </td>
 </tr>
 <tr><td>
  外卖时间：<?php echo $this->_var['shop']['shopconfig']['starthour']; ?>:<?php echo $this->_var['shop']['shopconfig']['startminute']; ?>-<?php echo $this->_var['shop']['shopconfig']['endhour']; ?>:<?php echo $this->_var['shop']['shopconfig']['endminute']; ?>
 	餐厅地址：<?php echo $this->_var['shop']['address']; ?> 送餐费用:<?php echo $this->_var['shop']['shopconfig']['sendprice']; ?>元 起送金额：<?php echo $this->_var['shop']['shopconfig']['minprice']; ?>元 <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['shop']['qq']; ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $this->_var['shop']['qq']; ?>:41 &r=0.0803054568823427" alt="点击联系我<?php echo $this->_var['shop']['qq']; ?>" title="点击联系我<?php echo $this->_var['shop']['qq']; ?>"></a>
 </td></tr>
 </table>
 <?php $_from = $this->_var['shop']['caicat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
 <a name="section<?php echo $this->_var['cat']['catid']; ?>" id="section<?php echo $this->_var['cat']['catid']; ?>"></a>
 <div style="height:40px; width:100%;"></div>
 <table class="table table-bordered  table-condensed">
 <thead><th  class="span11"  colspan="2"><h3  > <?php echo $this->_var['cat']['cname']; ?> </h3> </th>
 <th class="span1" ><a class="btn pull-right" href="#top">TOP</a></th>
 </thead>
 <tbody>
 <?php $_from = $this->_var['cat']['cailist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cai');if (count($_from)):
    foreach ($_from AS $this->_var['cai']):
?>
 <tr id="dish<?php echo $this->_var['cai']['id']; ?>" class=" dish ">
 
 <td class="span1"><span class="cart_count"><?php if ($this->_var['shop']['shopconfig']['ordertype'] == 0): ?><a href="javascript:;" class="addCart btn btn-success " caiid="<?php echo $this->_var['cai']['id']; ?>"  shopid='<?php echo $this->_var['cai']['shopid']; ?>' name="<?php echo $this->_var['cai']['title']; ?>" price="<?php echo $this->_var['cai']['price']; ?>" cart_count='0' >买</a><?php else: ?><a href="javascript:;" title="电话预定" class="btn btn-warning">电</a><?php endif; ?></span></td>
 <td class="span9"><span class="title"><?php echo $this->_var['cai']['title']; ?> </span> <?php if ($this->_var['cai']['promote']): ?><font style="color:red;">促销</font><?php endif; ?></td>
 <td class="span2"><span class="price"><?php if ($this->_var['cai']['promote']): ?><?php echo $this->_var['cai']['lowprice']; ?> <span style="text-decoration:line-through;"><?php echo $this->_var['cai']['price']; ?>元</span><?php else: ?><?php echo $this->_var['cai']['price']; ?><?php endif; ?></span></td>
 </tr>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </tbody>
 
 </table>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 <?php if ($this->_var['pagelist']): ?>
 <div class="breadcrumb"><?php echo $this->_var['pagelist']; ?></div>
 <?php endif; ?>
 </div>
 <!--左边结束-->
 
 <div class="span4">
 
 	<?php echo $this->fetch('lib/shopcar.html'); ?>
<table class="table table-bordered">
<tr><td class="f16">最新订餐动态</td></tr>
<?php mod_orderfeed('orderfeed');?>
<?php $_from = $this->_var['orderfeed']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'o');if (count($_from)):
    foreach ($_from AS $this->_var['o']):
?>
<tr><td>
<?php echo $this->_var['o']['orderuser']; ?> 在<a href="index.php?m=shop&shopid=<?php echo $this->_var['o']['shopid']; ?>" target="_blank"><?php echo $this->_var['o']['shopname']; ?></a> 点了一份餐 
</td></tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</table>
    
 <div>
 <h2>还是不太敢在线订餐？</h2>
 <p>别担心，你的订单会立刻得到处理，进度还会实时反馈给你。很多人已经用上瘾了，你也试一次吧。</p>
 </div>
 <form   action="index.php?m=guest&a=add_db" method="post">
								 
					<textarea id="ask_answer_content"  class="input-xlarge"  style="height:100px;" name="content"></textarea>
				 
					<p><input   type="submit" value="好了，提交" class="btn btn-success"></p>
				 
			</form>
 
 <?php if ($this->_var['guestlist']): ?>
 <h2>口福答疑</h2>
 <?php $_from = $this->_var['guestlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'guest');if (count($_from)):
    foreach ($_from AS $this->_var['guest']):
?>
 <table class="table table-bordered  table-condensed   ">
 <tr>
        <td><strong><?php echo $this->_var['guest']['username']; ?>：</strong><?php echo $this->_var['guest']['content']; ?> </td>  </tr>
 <tr>
            
             
           <td><strong>口福答疑：</strong><?php echo $this->_var['guest']['reply']; ?> </td>
</tr>
        
 </table>      	
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 <?php endif; ?>
 </div>
 <!--右侧结束-->
 </div>
 


<?php echo $this->fetch('lib/footer.html'); ?>