<?php echo $this->fetch('lib/header.html'); ?>
<!--��ม����ʼ-->
<div style="position:fixed; left:10px; top:100px;">
<ul class="nav nav-tabs nav-stacked">
<li><a href="javascript:;"><i class="icon-home"></i>��ʳ����</a></li>
<?php $_from = $this->_var['shop']['caicat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
<li>	 
<a href="#section<?php echo $this->_var['c']['catid']; ?>" ><?php echo cutstr($this->_var['c']['cname'],16); ?></a> 
</li>    
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul> 
</div>
<!--��ม������-->
<div class="row">

<div class="span8">
<?php echo $this->fetch('shopnav.html'); ?>

<p><h2>
 <a href="index.php?m=shop&shopid=<?php echo $this->_var['shop']['shopid']; ?>" target="_blank"><?php echo $this->_var['shop']['shopname']; ?></a>
 <small><?php if ($this->_var['shop']['opentype'] == 'doing'): ?>Ӫҵ��<?php elseif ($this->_var['shop']['opentype'] == 'will'): ?>����Ӫҵ<?php else: ?>�Ѵ���<?php endif; ?> <?php if ($this->_var['shopconfig']['ordertype']): ?>����ֻ֧�ֵ绰����<?php endif; ?>  <?php echo $this->_var['shop']['phone']; ?>
 
 <?php if ($this->_var['shop']['isfav']): ?>
                        <a rel="nofollow" href="javascript:;" shopid="<?php echo $this->_var['shop']['shopid']; ?>"  class="btn btn-warning delshopfav">�Ƴ���ҳ</a>
                        <?php elseif ($this->_var['ssuser']['userid']): ?>
						<a rel="nofollow" href="javascript:;" shopid="<?php echo $this->_var['shop']['shopid']; ?>"  class="btn btn_success fav-add addshopfav">�ӵ���ҳ</a>
                        <?php else: ?>
                        <a rel="nofollow" href="index.php?m=user&a=login"  class="btn" >��¼�ղ�</a>
                        <?php endif; ?></small></h2>
 </p>
 <p>�ò������ͳɹ����ĸ�/�������
	<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['shop']['qq']; ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $this->_var['shop']['qq']; ?>:41 &r=0.0803054568823427" alt="�����ϵ��<?php echo $this->_var['shop']['qq']; ?>" title="�����ϵ��<?php echo $this->_var['shop']['qq']; ?>"></a></p>
  <p class="caicatbtn"><?php $_from = $this->_var['shop']['caicat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
	 <a href="#section<?php echo $this->_var['c']['catid']; ?>" class="btn"><?php echo $this->_var['c']['cname']; ?></a> 
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></p>                              
 <?php $_from = $this->_var['shop']['caicat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
 <a name="section<?php echo $this->_var['cat']['catid']; ?>" id="section<?php echo $this->_var['cat']['catid']; ?>"></a>
 <div style="height:40px; width:100%;"></div>
 <table class="table table-bordered  table-condensed">
 <thead><th  class="span11"  colspan="2"><h3  ><?php echo $this->_var['cat']['cname']; ?></h3> </th>
 <th class="span1" ><a class="btn pull-right" href="#top">TOP</a></th>
 </thead>
 <tbody>
 <?php $_from = $this->_var['cat']['cailist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cai');if (count($_from)):
    foreach ($_from AS $this->_var['cai']):
?>
 <tr id="dish<?php echo $this->_var['cai']['id']; ?>" class=" dish ">
 
 <td class="span1"><span class="cart_count"><?php if ($this->_var['shopconfig']['ordertype'] == 0): ?><a href="javascript:;" class="addCart btn " caiid="<?php echo $this->_var['cai']['id']; ?>"  shopid='<?php echo $this->_var['cai']['shopid']; ?>' name="<?php echo $this->_var['cai']['title']; ?>" price="<?php echo $this->_var['cai']['price']; ?>" cart_count='0' >��</a><?php else: ?><a href="javascript:;" title="�绰Ԥ��" class="btn btn-warning">+</a><?php endif; ?></span></td>
 <td class="span9"><span class="title"><?php echo $this->_var['cai']['title']; ?> </span></td>
 <td class="span2"><span class="price"><?php echo $this->_var['cai']['price']; ?></span></td>
 </tr>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
 </tbody>
 
 </table>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<!--��߽���-->
<div class="span4">
 <?php echo $this->fetch('lib/shopcar.html'); ?>
 <h3>����������Ϣ</h3>
 <table  class="table table-bordered table-striped table-condensed"  >
					<tr  >
					<td  width="100">����ʱ��</td>
					<td class="span8"><?php echo $this->_var['shopconfig']['starthour']; ?>:<?php if (! $this->_var['shopcaonfig']['startminute']): ?>00<?php else: ?><?php echo $this->_var['shopconfig']['startminute']; ?><?php endif; ?>-<?php echo $this->_var['shopconfig']['endhour']; ?>:<?php if (! $this->_var['shopconfig']['endminute']): ?>00<?php else: ?><?php echo $this->_var['shopconfig']['endminute']; ?><?php endif; ?></td>
				</tr>
				<tr  >
					<td>�Ͳͷ���</td>
					<td><?php echo $this->_var['shopconfig']['sendprice']; ?>Ԫ</td>
				</tr>
				<tr >
					<td>���ͽ��</td>
					<td><?php echo $this->_var['shopconfig']['minprice']; ?>Ԫ</td>
				</tr>
                
                <tr  >
					<td>������ַ</td>
					<td><?php echo $this->_var['shop']['address']; ?></td>
				</tr>
                
                <tr  >
					<td>�����绰</td>
					<td><?php echo $this->_var['shop']['phone']; ?></td>
				</tr>
                
				<tr class="restaurant_info_item">
					<td>�Ͳͷ�Χ</td>
					<td><?php echo $this->_var['shop']['sendarea']; ?></td>
				</tr>
					<tr  >
					<td>���С���</td>
					<td>
						<?php echo $this->_var['shop']['info']; ?>
					</td>
				</tr>
								
								
			</table>   
 <div>
 <h2>���ǲ�̫�����߶��ͣ�</h2>
 <p>���ģ���Ķ��������̵õ��������Ȼ���ʵʱ�������㡣�ܶ����Ѿ�������ˣ���Ҳ��һ�ΰɡ�</p>
 </div>
 <form   action="index.php?m=guest&a=add_db" method="post">
					<input type="hidden" name="shopid" value="<?php echo $this->_var['shop']['shopid']; ?>" />			 
					<textarea id="ask_answer_content"  class="input-xlarge"  style="height:100px;" name="content"></textarea>
				 
					<p><input   type="submit" value="���ˣ��ύ" class="btn btn-success"></p>
				 
			</form>

 
 <?php if ($this->_var['shop']['lat']): ?>
 
<h2>������ͼ</h2>
 <div id="map_canvas" ><iframe style="width:100%; border:0; height:320px;" src="index.php?m=map&shopid=<?php echo $this->_var['shop']['shopid']; ?>"></iframe></div>
 <?php endif; ?>
  <?php if ($this->_var['guestlist']): ?>
  <h2><?php echo $this->_var['shop']['shopname']; ?>����</h2>
 <?php $_from = $this->_var['guestlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'guest');if (count($_from)):
    foreach ($_from AS $this->_var['guest']):
?>
 <table class="table table-bordered  table-condensed   ">
 <tr>
        <td><strong><?php if ($this->_var['guest']['username']): ?><?php echo $this->_var['guest']['username']; ?><?php else: ?>�ο�<?php endif; ?>��</strong><?php echo $this->_var['guest']['content']; ?> </td>  </tr>
 <tr>
            
             
           <td><strong><?php echo $this->_var['shop']['shopname']; ?>��</strong><?php echo $this->_var['guest']['reply']; ?> </td>
</tr>
        
 </table>      	
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
          <?php endif; ?>
 </div>
 <!--�Ҳ����-->
</div>
<?php echo $this->fetch('lib/footer.html'); ?>