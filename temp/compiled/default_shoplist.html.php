<?php echo $this->fetch('lib/header.html'); ?>
<script language="javascript">
$(document).ready(function()
{
	$("#provinceid").live("change",function()
	{
		$.get("index.php?m=ajax&a=ajaxcitys&provinceid="+$(this).val(),function(data)
		{
			
			$("#cityid").empty().css("display"," ").append(data);
			$("#townid").empty().css("display","none");
			 
		})
	});
	
	$("#cityid").live("change",function()
	{
		$.get("index.php?m=ajax&a=ajaxtowns&cityid="+$(this).val(),function(data)
		{
			
			$("#townid").empty().append(data).show();
		
		});
	});
});
</script>

<div class="well">
<div style=" width:600px; margin:0 auto;">
                                
                            
                            <form class="form-inline" id="map_search" action="index.php" data-query="">
                            <input type="hidden" name="m" value="search" />
                                
                                   
                                    <label id="map_search_cai">��ʳ:</label>
                                    <input id="map_search_cai" class="text" type="text" name="cai" style="height:30px;" placeholder="��ʳ����" value="<?php echo $_GET['cai']; ?>">
                                    <label id="map_search_shop">����:</label>
                                    <input id="map_search_shop" class="text" type="text" name="shop"  style="height:30px;" placeholder="��������" value="<?php echo $_GET['shop']; ?>">
                                    <input id="map_search_restaurant" type="submit" value="����" class="btn">
                                    
                                 
                                
                            </form>
</div>
</div>
<div  class="row">
<div class="span9">
<div style=" text-align:center">
                        <form method="get" class="form-inline" action="index.php">
                        <input type="hidden" name="m" value="shoplist" />
                        <label for="catid">����:</label>
                        <select name="catid" id="catid" style="width:100px;">
                        <option value="0">ѡ�����</option>
                        <?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                        <option value="<?php echo $this->_var['c']['catid']; ?>"<?php if ($_GET['catid'] == $this->_var['c']['catid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['cname']; ?></option>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </select>
                        <label for="provinceid">����</label>
                        <select name="provinceid" id="provinceid"style="width:100px" >
                        <option value="0">��ѡ������</option>
                        <?php $_from = $this->_var['provinces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'p');if (count($_from)):
    foreach ($_from AS $this->_var['p']):
?>
                        <option value="<?php echo $this->_var['p']['provinceid']; ?>" <?php if ($this->_var['p']['provinceid'] == $_GET['provinceid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['p']['province']; ?></option>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </select>
                        <select name="cityid" id="cityid" style="width:120px">
                        <option value="0">��������</option>
                        <?php $_from = $this->_var['citys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
                        <option value="<?php echo $this->_var['c']['cityid']; ?>" <?php if ($this->_var['c']['cityid'] == $_GET['cityid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']['city']; ?></option>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </select>
                        <select name="townid" id="townid" style="width:120px">
                        <option value="0">��������</option>
                        <?php $_from = $this->_var['towns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
                        <option value="<?php echo $this->_var['t']['townid']; ?>" <?php if ($this->_var['t']['townid'] == $_GET['townid']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['t']['town']; ?></option>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </select>
                        
                        <input type="submit" name="button" id="button" class="btn" value="ɸѡ" />
                        </form>
                      </div>
      

    
    <ul class="thumbnails ">             
     <?php $_from = $this->_var['shoplist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shop');if (count($_from)):
    foreach ($_from AS $this->_var['shop']):
?>
     <li class="span3" style="height:340px;" >
     <div class="thumbnail" >
     <a href="index.php?m=shop&shopid=<?php echo $this->_var['shop']['shopid']; ?>" ><img src="<?php if ($this->_var['shop']['logo']): ?><?php echo $this->_var['shop']['logo']; ?><?php else: ?>images/nologo.gif<?php endif; ?>" style="width:100%;" /></a>
     <div class="caption">
     <p><a href="index.php?m=shop&shopid=<?php echo $this->_var['shop']['shopid']; ?>"><?php echo $this->_var['shop']['shopname']; ?></a> </p>
     <p>
     <?php if ($this->_var['ssuser']): ?><?php if ($this->_var['shop']['isfav']): ?> 
      <a href="javascript:;" class="delshopfav btn btn-warning" shopid="<?php echo $this->_var['shop']['shopid']; ?>"  >�Ƴ���ҳ</a>
      <?php else: ?><a href="javascript:;" class="addshopfav btn" shopid="<?php echo $this->_var['shop']['shopid']; ?>"  >������ҳ</a><?php endif; ?>
      <?php else: ?><a href="index.php?m=user&a=login" class="btn btn-small">��¼�ղ�</a><?php endif; ?></p>
     <p>�绰��<?php echo $this->_var['shop']['phone']; ?> </p>
     <p>���ͼۣ�<?php echo $this->_var['shop']['minprice']; ?> Ԫ</p>
  
     </div>
     </div>
     </li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
     </ul>  
<div><?php echo $this->_var['pagelist']; ?></div>
  
             
                     
                        

</div>
<!--������-->
<div  class="span3">
 
<?php echo $this->fetch('lib/shopcar.html'); ?>

<div class="cart_encourage">
		<h2>�Զ��������ʣ�</h2>
        <div class="breadcrumb">
		 ���ģ���Ķ��������̵õ��������Ȼ���ʵʱ�������㡣�ܶ����Ѿ�������ˣ���Ҳ��һ�ΰɡ�
        </div>
	</div>

<div id="askbox">
				<h2>�ڸ�����</h2>
				
                <!--���ɿ�ʼ-->
               
			<form class="support_form leihou-post-form" action="index.php?m=guest&a=add_db" method="post">
								<div class="leihou-post-content">
					<textarea id="ask_answer_content" style="height:100px;" name="content"></textarea>
				</div>
								<div class="leihou-post-controls">
					<input   type="submit" value="���ˣ��ύ" class="btn">
				</div>
			</form>
		
		</div>
		
        <?php $_from = $this->_var['guestlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'guest');if (count($_from)):
    foreach ($_from AS $this->_var['guest']):
?>
        <div class="sideguest">
        	<div  style="">
             <span class="nickname"><?php echo $this->_var['guest']['username']; ?></span>�� <?php echo $this->_var['guest']['content']; ?> 
            </div>
            
            <div class="r2">
            �ڸ����� <?php echo $this->_var['guest']['reply']; ?> 
            </div>
            						
		</div>		
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		 
					<div class="leihou-page-controls">
				
			</div>
			
                <!--���ɽ���-->		
			
             
 </div>   

</div>
<!--�ұ߽���-->


<?php echo $this->fetch('lib/footer.html'); ?>