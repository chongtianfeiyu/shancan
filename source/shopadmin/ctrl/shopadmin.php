<?php

if($_GET['shopid'] && $_SESSION['ssadmin'] )
{
	$_SESSION['adminshop']=$db->getRow("SELECT siteid,shopid,shopname FROM ".table('shop')." WHERE shopid=".intval($_GET['shopid'])." ");
	$_SESSION['ssadminshop']=$_SESSION['ssadmin'];
}else
{
	echo "<script>alert('���޴�Ȩ��');window.close()</script>";
}
header("Location:shopadmin.php?m=iframe&");
?>