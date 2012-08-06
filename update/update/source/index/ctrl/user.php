<?php
if(!defined("CT"))
{
	die("IS WRONG");
}

$_GET['a']=htmlspecialchars($_GET['a']);
if(in_array($_GET['a'],array('edi','edi_db','chpwd','chpwd_db','home','spread','myaddress')))
{
	check_login();
}
/*判断是否绑定UC*/
if(BINDUC)
{
	include ROOT_PATH.'config/ucenter.config.php';
	include  ROOT_PATH.'uc_client/client.php';
}
switch($_GET['a'])
{
	case 'reg':

		if($_SESSION['ssuser']['userid'])
		{
			gourl("index.php");
		}
		$smarty->assign("fuserid",intval($_GET['fuserid']));
		$smarty->display("user_reg.html");	
	break;
	
	case 'regdb':
		if(isset($_POST['yzm']))
		{
			$yzm=strtoupper(trim($_POST['yzm']));
			if($yzm!=$_SESSION['code']) errback('验证码出错');
		}
		
		$username=strip_tags($_POST['username']);
		ckempty($username,"用户名不能为空");
		$pwd1=strip_tags($_POST['pwd1']);
		ckempty($pwd1,"密码不能为空");
		$pwd2=strip_tags($_POST['pwd2']);
		if($pwd1!=$pwd2) errback("两次密码输入不一致");
		$email=strip_tags($_POST['email']);
		if(!is_email($email)) errback("不是有效的邮箱");
		$address=strip_tags($_POST['address']);
		$phone=strip_tags($_POST['phone']);
		$qq=intval(strip_tags($_POST['qq']));
		$fuserid=intval($_POST['fuserid']);
		
		if(BINDUC)
		{
			
			/*UC注册*/
			//在UCenter注册用户信息
	
			if(uc_get_user($username) && !$db->getOne("SELECT userid FROM ".table('user')." WHERE username='$username' ")) {
				//判断需要注册的用户如果是需要激活的用户，则直接激活
				list($uid, $username, $password, $email) = uc_user_login($username, $password);
				//防止用户名重复
				$tempuser=$username;
				$i=0;
				while($db->getOne("SELECT uid FROM ".table('user')." WHERE username='$tempuser' " ))
				{
					$i++;
					$tempuser=$username.$i;
				}
				$db->query("INSERT INTO ".table('user')." SET username='$tempuser',nickname='$tempuser',password='".umd5($password)."',email='$email',userid='$uid'  ");
				//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
				setcookie('KOUFU_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
				//生成同步登录的代码
				$ucsynlogin = uc_user_synlogin($uid);
				$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid='$uid' " );
				errback('注册成功','index.php');
			}
	
			$uid = uc_user_register($username, $password, $email);
			if($uid <= 0) {
				if($uid == -1) {
					errback( '用户名不合法');
				} elseif($uid == -2) {
					errback( '包含要允许注册的词语');
				} elseif($uid == -3) {
					errback( '用户名已经存在');
				} elseif($uid == -4) {
					errback( 'Email 格式有误');
				} elseif($uid == -5) {
					errback( 'Email 不允许注册');
				} elseif($uid == -6) {
					errback( '该 Email 已经被注册' );
				} else {
					errback( '未定义' );
				}
			} 
		
		if($username) {
			//防止用户名重复
			  $tempuser=$username;
			  $i=0;
			  while($db->getOne("SELECT uid FROM ".table('user')." WHERE username='$tempuser' " ))
			  {
				  $i++;
				  $tempuser=$username.$i;
			  }
			$db->query("INSERT INTO ".table('user')." SET username='$tempuser',nickname='$tempuser',password='".umd5($password)."',email='$email',userid='$uid'  ");
			//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
			setcookie('KOUFU_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
			//生成同步登录的代码
			$ucsynlogin = uc_user_synlogin($uid);
			$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid='$uid' " );
			errback('注册成功','index.php');
		}
		
		/*UC注册*/
		}else
		{
			/*普通注册*/
			$ct=$db->getOne("select userid from ".table('user')." where username='$username' ");
			if($ct>0) errback("此用户已被注册！");
			$sql="insert into ".table('user')."(username,password,email,address,phone,qq,fuserid) values('$username','".umd5($pwd1)."','$email','$address','$phone','$qq','$fuserid') ";
			$db->query($sql);
			$_SESSION['ssuser']=$db->getRow("select userid,username,nickname from ".table('user')." where username='$username' ");
			errback("注册成功","index.php");
		}
	break;

	case 'login':
		$smarty->display("user_login.html");	
	break;

	case 'logindb':
		if(isset($_POST['yzm']))
		{
		$yzm=strtoupper(trim($_POST['yzm']));
		if($yzm!=$_SESSION['code']) errback('验证码出错！');
		}
		$username=trim($_POST['username']);
		ckempty($username,'用户名不能为空');
		$password=trim($_POST['password']);
		ckempty($password,'密码不能为空！');
		$referer=$_POST['referer'];
		if($referer)
		{
			$url=$referer;
		}else
		{
			$url='index.php';
		}
	
		if(BINDUC)
		{
			
			list($uid, $username, $password, $email) = uc_user_login($username, $password);
			
			setcookie('KOUFU_auth', '', -86400);
			
			if($uid > 0) {
				
				if(!$db->getOne("SELECT userid FROM ".table('user')." WHERE userid='$uid'")) {
					//判断用户是否存在于用户表，不存在则注册
					//防止用户名重复
					$tempuser=$username;
					$i=0;
					
					while($db->getOne("SELECT uid FROM ".table('user')." WHERE username='$tempuser' " ))
					{
						$i++;
						$tempuser=$username.$i;
					}
					$db->query("INSERT INTO ".table('user')." SET username='$tempuser',nickname='$tempuser',password='".umd5($password)."',email='$email',userid='$uid'  ");
				}
				//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
				setcookie('KOUFU_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
				//生成同步登录的代码
				
				$ucsynlogin = uc_user_synlogin($uid);
				$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid='$uid' " );
				errback("登陆成功",$url);
			} elseif($uid == -1) {
				
				errback('用户不存在,或者被删除');
			} elseif($uid == -2) {
				errback( '密码错');
			} else {
				errback( '未定义');
			}
		
		/*UC登陆*/
		}else
		{
			/*普通登陆*/
			
			$ct=$db->getOne("select userid from ".table('user')." where username='$username' and password='".umd5($password)."' and status>-1 ");
			if(!$ct)
			{
				errback('用户名或者密码出错');
			}else
			{
				$_SESSION['ssuser']=$db->getRow("select userid,username,nickname from ".table('user')." where username='$username' ");
			}
			errback("登陆成功",$url);
		}
	break;
	case 'edi':
		$userid=intval($_SESSION['ssuser']['userid']); 
		$rs=$db->getRow("select * from ".table('user')." where userid='$userid' ");
		$smarty->assign("user",$rs);
		$smarty->display("user_edi.html");
	break;
	case 'edi_db':
		$userid=intval($_SESSION['ssuser']['userid']);
		if($_POST['yzm'])
		{
		$yzm=trim($_POST['yzm']);
		if($yzm!=$_SESSION['code']) errback('验证码出错');
		}

		
		$address=strip_tags($_POST['address']);
		
		$qq=intval($_POST['qq']);
		
		
		$nickname=strip_tags($_POST['nickname']);
		$phone=strip_tags($_POST['phone']);
		$user=$db->getRow("SELECT phone,nickname FROM ".table('user')." WHERE userid='$userid' ");	
		if($user['nickname']!=$nickname)
		{
			if($db->getOne("SELECT userid FROM ".table('user')." WHERE nickname='$nickname' "))
			{
				errback("昵称已被使用");
			}
		}
		if($user['phone']!=$phone)
		{
			if($db->getOne("SELECT userid FROM ".table('user')." WHERE phone='$phone'"))
			{
				errback("手机已经有人使用");
			}
		}
		$db->query("update ".table('user')." set address='$address',phone='$phone',qq='$qq',nickname='$nickname' where userid='$userid' ");

		errback('信息编辑成功');
	break;
	case 'chpwd':
		$userid=intval($_SESSION['ssuser']['userid']); 
		$rs=$db->getRow("select * from ".table('user')." where userid='$userid' ");
		$smarty->assign("user",$rs);
		$smarty->display("user_chpwd.html");
	break;
	
	case 'chpwd_db':
		$userid=intval($_SESSION['ssuser']['userid']);
		$pwd1=trim($_POST['pwd1']);
		
		$pwd2=trim($_POST['pwd2']);
		if($pwd1!=$pwd2)
		{
			errback('两次密码输入不一致');
		}
		if($pwd1)
		{
			$db->query("update ".table('user')." set password='".umd5($pwd1)."' where userid='$userid' ");
		}
		$email=trim($_POST['email']);
		if(!$db->getOne("SELECT email FROM ".table('user')." WHERE userid='$userid' "))
		{
			$db->query("UPDATE ".table('user')." SET email='$email' WHERE userid='$userid' ");
		}
		errback("用户信息修改成功");
	break;
	
	case 'logout':
		$_SESSION['ssuser']=array();
		gourl('index.php');
	break;
	
	case 'findpwd':
		$smarty->display("user_findpwd.html");
	break;	
	case 'findpwd_db':
		$username=trim($_POST['username']);
		ckempty($username,'用户名不能为空！');
		$email=trim($_POST['email']);
		if(!is_email($_POST['email'])) errback('邮箱格式出错');
		$ct=$db->getOne("select userid from ".table('user')." where username='$username' and email='$email' LIMIT 1 ");
		if($ct==0) errback("你的注册邮箱不是你输入的");
		
		$title="{$username}找回密码！邮件";
		$pwd=rand(100000,999999);
		$db->query("update ".table('user')." set password='".umd5($pwd)."' where username='$username' ");
		$content="{$username}您好！<br>您的新密码为：{$pwd}，请尽快登陆修改！来自网站".$web['webname']."网址：".$web['weburl'];
		
		if(send_mail($smptArr,$email,$title,$content))
		{
			errback('新密码已经发送到您的邮箱，请尽快登陆修改！','index.php');
		}else
		{
			errback("邮箱服务器出错，请联系管理员");
		}
	break;
	case 'home':
		if(!$_SESSION['ssuser'])
		{
			gourl("index.php");
		}
		$userid=intval($_SESSION['ssuser']['userid']);
		$sql="select * from ".table('user')." where userid='$userid' ";
		$rs=$db->getRow($sql);//获取用户信息
		//获取折扣信息
		$discount=intval($db->getOne("select discount from ".table('user_rank')." where min_grade<'{$rs['grade']}' and max_grade>'{$rs['grade']}' "));
		$smarty->assign("discount",$discount);
		//获取可用金额
		$smarty->assign("bonus",$db->getOne("select bonus from ".table('user_bonus')." where userid='$userid' "));
		//获取推广用户数
		$smarty->assign("spread",$db->getOne("select count(*) from ".table('user')." where fuserid='$userid' "));
		//获得消费金额
		$smarty->assign("ordermoney",$db->getOne("select sum(money) from ".table('order')." where userid='$userid' "));
		//好友消费金额
		$smarty->assign("friendmoney",$friendmoney=$db->getOne("select sum(money) from ".table('order')." where sendtype=3 AND userid in(select userid from ".table('user')." where fuserid='$userid') "));
		//好友带来的奖励
		$smarty->assign("friendbonus",$friendmoney*SPREAD_DISCOUNT);
		$smarty->assign("user",$rs);
		$smarty->display("user_home.html");
	break;
	
	case 'spread':
		if(!$_SESSION['ssuser'])
		{
			gourl("index.php");
		}
		$userid=intval($_SESSION['ssuser']['userid']);
		//获取推广用户数
		$smarty->assign("spread",$db->getOne("select count(*) from ".table('user')." where fuserid='$userid' "));	
		$smarty->assign("friendmoney",$friendmoney=$db->getOne("select sum(money) from ".table('order')." where sendtype=3 AND userid in(select userid from ".table('user')." where fuserid='$userid') "));
		//好友带来的奖励
		$smarty->assign("friendbonus",$friendmoney*SPREAD_DISCOUNT);
		
		$smarty->display("user_spread.html");
	break;
	
	case 'myaddress':
		header("Content-type:text/html;charset=gb2312");
		$userid=intval($_SESSION['ssuser']['userid']); 
		switch($_GET['op'])
		{
			
			case 'post':
			
				$id=intval($_POST['id']);
				$address=htmlspecialchars(trim($_POST['address']));
				if($_GET['ajax'])
				{
					$address=iconv("utf-8","gbk",$address);
				}
				if($id)
				{
					$db->query("UPDATE ".table('user_address')." SET userid='$userid',address='$address' WHERE id='$id' ");
				}else
				{
					$db->query("INSERT INTO ".table('user_address')." SET userid='$userid',address='$address' ");
				}
				gourl();
				break;
			case 'del':
					$id=intval($_GET['id']);
					$db->query("DELETE FROM ".table('user_address')." WHERE id='$id' AND userid='$userid' ");
				gourl();
				break;
			default:
				$addresslist=$db->getAll("SELECT id,address FROM ".table('user_address')." WHERE userid='$userid' ORDER BY id DESC ");
				$smarty->assign("addresslist",$addresslist);
				$smarty->display("user_address.html");
			break;
		}
	break;
}
?>