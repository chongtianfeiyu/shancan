<table class="table table-bordered">
<tr><td style=" font-size:14px; font-weight:600px;">��������</td></tr>
<tr>
<td><?php $_from = $this->_var['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
<a href="<?php echo $this->_var['t']['linkurl']; ?>" target="_blank"><?php echo $this->_var['t']['title']; ?></a>  
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></td>
</tr>

</table>
<div id="footer"  style="text-align:center; height:100px; margin-top:30px;" >
	  <p>&copy;&nbsp;2011 �ڸ���</p>
		<div class="links">
			 <a href="index.php?m=html&">�û�����</a> 
			 <a href="index.php?m=html&">��ϵ�ڸ�</a> 
			 <a href="index.php?m=html&">��ҵ����</a>  
			 <a href="index.php?m=html&">��������</a> 
			 <a href="http://weibo.com/lrjxgl" target="_blank">����������΢��</a> 
		</div>
	</div>
    
    <div style="position:fixed;  right:10px;bottom:10px;"  ><a  href="javascript:;" class="btn" onclick="$(document).scrollTop(0)">Top</a></div>
</div>

<div id="showbox" style="width:400px; height:40px; display:none;">
<div class="breadcrumb">
��ַ��<input type="text" class="h30" id="addresscontent"> 
<input type="button" id="addresscontent_submit" class="btn btn-success" value="���" /> 
<input type="button" id="addresscontent_clear" class="btn btn-delete" value="ȡ��" />
</div>

</div>
</body>
</html>
