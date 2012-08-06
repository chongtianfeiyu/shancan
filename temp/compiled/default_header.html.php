<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />


<title><?php if ($this->_var['title']): ?><?php echo $this->_var['title']; ?><?php else: ?><?php echo $this->_var['web']['webtitle']; ?><?php endif; ?></title>
<meta name="keywords" content="<?php if ($this->_var['keywords']): ?><?php echo $this->_var['keywords']; ?><?php else: ?><?php echo $this->_var['web']['webkey']; ?><?php endif; ?>" />
<meta name="description" content="<?php if ($this->_var['description']): ?><?php echo $this->_var['description']; ?><?php else: ?><?php echo $this->_var['web']['description']; ?><?php endif; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--[if IE 6]>
<script>alert('去死吧ie6');location.href='ie6die.html'</script>
<![endif]-->
<!--[if lt IE 9]>
    <script src="/js/forward/lib/html5.js"></script>
    <![endif]-->
<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/jquery.center.js"></script>
<script language="javascript" src="plugin/bootstrap/js/bootstrap-dropdown.js"></script>
 <script src="plugin/bootstrap/js/bootstrap-collapse.js"></script>
 <script src="plugin/bootstrap/js/bootstrap-carousel.js"></script>

<script language="javascript" src="js/common.js"></script>
<script language="javascript">
$(document).ready(function()
{
	$('.dropdown-toggle').dropdown();
	$('.carousel').carousel()
});
</script>
<link href="plugin/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">


<style type="text/css">
.pointer{cursor:pointer;}
.h30{height:30px;}
.f12{font-size:12px;}
.f14{font-size:14px;}
.f16{font-size:16px;font-weight: 800;}
table{font-size:12px;}
.caicatbtn .btn{margin-bottom:5px;}
.pages {
margin: 5px auto;
padding: 3px;
text-align: center;
}
.pages strong {
background: #4BC7E5;
color: white;
}
.pages em, .pages strong {
border-color: #DB60CC;
}
.pages * {
padding: 3px 6px;
color: #999;
}
</style>

</head>

<body>
<div class="container">

<div class="navbar navbar-fixed-top  ">
<div class="navbar-inner">
<div class="container">
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
</a>
<a class="brand"> 口福科技</a>
<div class="nav-collapse">
<ul class="nav">
<li <?php if ($_GET['m'] == 'index' || ! $_GET['m']): ?>class="active"<?php endif; ?>><a href="index.php">首页</a></li>
<li <?php if ($_GET['m'] == 'shoplist'): ?>class="active"<?php endif; ?>><a href="index.php?m=shoplist">餐厅</a></li>
<li <?php if ($_GET['m'] == 'maps'): ?>class="active"<?php endif; ?>><a href="index.php?m=maps">地图</a></li>
<li <?php if ($_GET['m'] == 'goods'): ?>class="active"<?php endif; ?>><a href="index.php?m=goods&a=cat">积分商城</a></li>
<li <?php if ($_GET['m'] == 'art_cat'): ?>class="active"<?php endif; ?>><a href="index.php?m=art_cat">资讯</a></li>

<?php if ($this->_var['ssuser']['userid']): ?>
<li><a href="index.php?m=message">消息<span id="getmsg" style="color:red"></span></a></li>
<li  class="dropdown">
<a href="javascript:;"   class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->_var['ssuser']['username']; ?><b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="index.php?m=user&a=logout">退出</a></li>
<li> <a href="index.php?m=user&a=chpwd">帐号密码</a> </li>
<li> <a href="index.php?m=user&a=edi">手机号码</a> </li>
<li> <a href="index.php?m=user&a=myaddress">常用地址</a> </li>
<li> <a href="index.php?m=guest&a=my">我的答疑</a> </li>
<li> <a href="index.php?m=shopcar&a=history">订单历史</a> </li>
<li><a href="index.php?m=recharge">在线充值</a></li>
<li><a href="index.php?m=grade_log">兑换记录</a></li>
<li><a href="index.php?m=user&a=spread">我要推广</a></li>
<li><a href="index.php?m=bonus">账户余额</a></li>


</ul>
</li>
<?php else: ?>
<li <?php if ($_GET['a'] == 'login'): ?>class="active"<?php endif; ?>><a href="index.php?m=user&a=login">登陆</a></li>
<li <?php if ($_GET['a'] == 'reg'): ?>class="active"<?php endif; ?>><a href="index.php?m=user&a=reg">注册</a></li>
<?php endif; ?>
<li <?php if ($_GET['m'] == 'search'): ?>class="active"<?php endif; ?>><a href="index.php?m=search">搜索</a></li>
<li id="getmsg"></li>
</ul>

<ul class="nav pull-right">
<li class="divider-vertical"></li>
<li class="dropdown">
<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->_var['site']['sitename']; ?><b class="caret"></b></a> 
<ul class="dropdown-menu">
<?php $_from = $this->_var['sitelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'p');if (count($_from)):
    foreach ($_from AS $this->_var['p']):
?>
<li ><a href="<?php if ($this->_var['p']['domain']): ?>http://<?php echo $this->_var['p']['domain']; ?><?php echo $_SERVER['REQUEST_URI']; ?><?php else: ?>index.php?m=index&setsite=yes&siteid=<?php echo $this->_var['p']['siteid']; ?><?php endif; ?>" title="<?php echo $this->_var['p']['sitename']; ?>"><?php echo $this->_var['p']['sitename']; ?></a> </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>          
</li>
</ul>
</div>

</div>
</div>
</div>
<div style="height:50px; width:100%;"></div>