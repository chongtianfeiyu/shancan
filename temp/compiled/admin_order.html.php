<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title>
<script language="javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="plugin/zebra/zebra_datepicker.css" type="text/css">
<script type="text/javascript" src="plugin/zebra/zebra_datepicker.js"></script>
<script language="javascript" src="<?php echo $this->_var['skins']; ?>js/common.js"></script>
<script language="javascript">
$(document).ready(function()
{
	$("#chkall").click(function()
	{
		$(".orderid").attr("checked","checked");
	});
	$("#chknone").click(function()
	{
		$(".orderid").attr("checked",false);
	});
	
	$('#starttime').Zebra_DatePicker();

	$('#endtime').Zebra_DatePicker();
});



</script>
<link href="<?php echo $this->_var['skins']; ?>css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="body">

<div class="right">
<div class="nav">
<a href="admin.php?m=order&">��������</a>
<a href="admin.php?m=order&t=1">����</a>
<a href="admin.php?m=order&t=2">����</a>
<a href="admin.php?m=order&t=3">7��</a>
<a href="admin.php?m=order&t=4">����</a>
<a href="admin.php?m=order&t=5">����</a>
</div>
<div class="nav_title">��������  </div>
<div class="rbox">
<table width="100%" border="0" align="center" cellspacing="1" class="tb1">
  <tr>
    <td width="93" align="right">����ͳ�ƣ�</td>
    <td width="640" height="50">��<font color="red"><?php echo $this->_var['rscount']; ?></font>�ʶ�����
    ������(<font color="red"><?php echo $this->_var['money']['summoney']; ?></font>)Ԫ��
    ƽ��ÿ��(<font color="red"><?php echo $this->_var['money']['avgmoney']; ?></font>)Ԫ�� </td>
  </tr>
  </table>


<form action="admin.php" method="get">
<input type="hidden" name="m" value="order" />
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td height="30" align="center">�ͻ���
      <input name="username" type="text" id="username" value="<?php echo $this->_var['username']; ?>" size="16" />
      ������
<input name="orderno" type="text" id="orderno" value="<?php echo $this->_var['orderno']; ?>" size="16" />
      ����״̬
      <label for="sendtype"></label>
      <select name="sendtype" id="sendtype">
      <option value="-1" <?php if ($this->_var['sendtype'] == - 1): ?> selected="selected"<?php endif; ?>>ȫ��</option>
      <option value="0" <?php if ($this->_var['sendtype'] == 0): ?> selected="selected"<?php endif; ?>>δȷ��</option>
      <option value="1" <?php if ($this->_var['sendtype'] == 1): ?> selected="selected"<?php endif; ?>>��ȷ��</option>
      <option value="2" <?php if ($this->_var['sendtype'] == 2): ?> selected="selected"<?php endif; ?>>��������</option>
      <option value="3" <?php if ($this->_var['sendtype'] == 3): ?> selected="selected"<?php endif; ?>>������</option>
      <option value="4" <?php if ($this->_var['sendtype'] == 4): ?> selected="selected"<?php endif; ?>>�����</option>
      </select>
      ��ʼʱ�� <span style="position:relative;"><input name="starttime" type="text" id="starttime" value="<?php echo $_GET['starttime']; ?>" size="12" /></span>
       ����ʱ�� <span style="position:relative;"><input name="endtime" type="text" id="endtime" value="<?php echo $_GET['endtime']; ?>" size="12" /></span>     
       <input type="submit" name="button" id="button" value="��ѯ" class="btn"/></td>
    </tr>
  </table>

</form>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tb1">
  <tr>
    <td width="32" height="30" align="center">ID</td>
    <td width="92" align="center">������</td>
    <td width="98" align="center">�ͻ�</td>
    <td width="81" align="center">�۸�</td>
    <td width="102" align="center">����״̬</td>
    <td width="43" align="center">����</td>
    <td width="87" align="center">�ջ�</td>
    <td width="196" align="center">��ϵ��ʽ</td>
    <td width="107" align="center">�̼�</td>
    <td width="104" align="center">ʱ��</td>
    <td width="128" align="center">����</td>
    </tr>
    <form action="admin.php?m=order&" method="post" id="aa">
    <?php $_from = $this->_var['orderlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
  <tr>
    <td height="25" align="center"><input name="id[]" type="checkbox" id="id[]" value="<?php echo $this->_var['t']['id']; ?>" class="orderid" />
      <label for="id[]"></label></td>
    <td align="center"><?php echo $this->_var['t']['orderno']; ?></td>
    <td align="center"><?php echo $this->_var['t']['orderuser']; ?></td>
    <td align="center"><?php echo $this->_var['t']['money']; ?></td>
    <td align="center"><?php echo $this->_var['t']['sendtype']; ?></td>
    <td align="center"><!--<?php if ($this->_var['t']['isbonus']): ?>-->�Ѹ�<!--<?php else: ?>-->����<!--<?php endif; ?>--></td>
    <td align="center"><!--<?php if ($this->_var['t']['received']): ?>-->���ջ�<!--<?php else: ?>-->δ�ջ�<!--<?php endif; ?>--></td>
    <td align="center"><?php echo $this->_var['t']['orderphone']; ?></td>
    <td align="center"><?php echo $this->_var['t']['shopname']; ?></td>
    <td align="center"><?php echo $this->_var['t']['dateline']; ?></td>
    <td align="center">  <a href="admin.php?m=order&a=view&amp;id=<?php echo $this->_var['t']['id']; ?>">�鿴</a> <a href="admin.php?m=order&a=del&amp;id=<?php echo $this->_var['t']['id']; ?>">ɾ��</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
    <tr>
      <td height="30" colspan="11" align="center">
      <a href="javascript::" id="chkall"  >ȫѡ</a>
      &nbsp;<a href="javascript::" id="chknone"  >ȫ��ѡ</a>
        <input type="submit" name="button2" id="button2" value="δȷ��" class="btn" onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=0'"  />
        <input type="submit" name="button3" id="button3" value="��ȷ��" class="btn"  onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=1'"  />
        <input type="submit" name="button4" id="button4" value="��������" class="btn"  onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=2'"  
         />
         
        <input type="submit" name="button6" id="button6" value="�����" class="btn"  onclick="this.form.action='admin.php?m=order&a=sendtype&sendtype=3';return confirm('������ɺ󽫲����ٸ��Ķ���״̬');"   /></td>
      </tr>
      </form>
    <?php if ($this->_var['pagelist']): ?>  <tr>
    <td height="30" colspan="11" align="center"><?php echo $this->_var['pagelist']; ?></td>
    </tr>
    <?php endif; ?>
</table>

</div> 

</div>


</div>
</body>
</html>