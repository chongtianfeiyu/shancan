
<div id="conbox">

<script language="javascript">
function movenew()
{
	document.location='<?php echo $this->_var['url']; ?>';
}
setTimeout(movenew,2000);

</script>
<div style="width:200px; background-color:#66CCFF;   height:200px; line-height:30px;  margin:0 auto; margin-top:100px; font-size:16px; padding:20px; text-align:center;">
<?php echo $this->_var['message']; ?>,如果浏览器没有自动跳转，请点击<a href="<?php echo $this->_var['url']; ?>">跳转</a>！

</div>
</div>

