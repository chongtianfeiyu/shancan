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
/*�ж��Ƿ��UC*/
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
			if($yzm!=$_SESSION['code']) errback('��֤�����');
		}
		
		$username=strip_tags($_POST['username']);
		ckempty($username,"�û�������Ϊ��");
		$pwd1=strip_tags($_POST['pwd1']);
		ckempty($pwd1,"���벻��Ϊ��");
		$pwd2=strip_tags($_POST['pwd2']);
		if($pwd1!=$pwd2) errback("�����������벻һ��");
		$email=strip_tags($_POST['email']);
		if(!is_email($email)) errback("������Ч������");
		$address=strip_tags($_POST['address']);
		$phone=strip_tags($_POST['phone']);
		$qq=intval(strip_tags($_POST['qq']));
		$fuserid=intval($_POST['fuserid']);
		
		if(BINDUC)
		{
			
			/*UCע��*/
			//��UCenterע���û���Ϣ
	
			if(uc_get_user($username) && !$db->getOne("SELECT userid FROM ".table('user')." WHERE username='$username' ")) {
				//�ж���Ҫע����û��������Ҫ������û�����ֱ�Ӽ���
				list($uid, $username, $password, $email) = uc_user_login($username, $password);
				//��ֹ�û����ظ�
				$tempuser=$username;
				$i=0;
				while($db->getOne("SELECT uid FROM ".table('user')." WHERE username='$tempuser' " ))
				{
					$i++;
					$tempuser=$username.$i;
				}
				$db->query("INSERT INTO ".table('user')." SET username='$tempuser',nickname='$tempuser',password='".umd5($password)."',email='$email',userid='$uid'  ");
				//�û���½�ɹ������� Cookie������ֱ���� uc_authcode �������û�ʹ���Լ��ĺ���
				setcookie('KOUFU_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
				//����ͬ����¼�Ĵ���
				$ucsynlogin = uc_user_synlogin($uid);
				$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid='$uid' " );
				errback('ע��ɹ�','index.php');
			}
	
			$uid = uc_user_register($username, $password, $email);
			if($uid <= 0) {
				if($uid == -1) {
					errback( '�û������Ϸ�');
				} elseif($uid == -2) {
					errback( '����Ҫ����ע��Ĵ���');
				} elseif($uid == -3) {
					errback( '�û����Ѿ�����');
				} elseif($uid == -4) {
					errback( 'Email ��ʽ����');
				} elseif($uid == -5) {
					errback( 'Email ������ע��');
				} elseif($uid == -6) {
					errback( '�� Email �Ѿ���ע��' );
				} else {
					errback( 'δ����' );
				}
			} 
		
		if($username) {
			//��ֹ�û����ظ�
			  $tempuser=$username;
			  $i=0;
			  while($db->getOne("SELECT uid FROM ".table('user')." WHERE username='$tempuser' " ))
			  {
				  $i++;
				  $tempuser=$username.$i;
			  }
			$db->query("INSERT INTO ".table('user')." SET username='$tempuser',nickname='$tempuser',password='".umd5($password)."',email='$email',userid='$uid'  ");
			//�û���½�ɹ������� Cookie������ֱ���� uc_authcode �������û�ʹ���Լ��ĺ���
			setcookie('KOUFU_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
			//����ͬ����¼�Ĵ���
			$ucsynlogin = uc_user_synlogin($uid);
			$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid='$uid' " );
			errback('ע��ɹ�','index.php');
		}
		
		/*UCע��*/
		}else
		{
			/*��ͨע��*/
			$ct=$db->getOne("select userid from ".table('user')." where username='$username' ");
			if($ct>0) errback("���û��ѱ�ע�ᣡ");
			$sql="insert into ".table('user')."(username,password,email,address,phone,qq,fuserid) values('$username','".umd5($pwd1)."','$email','$address','$phone','$qq','$fuserid') ";
			$db->query($sql);
			$_SESSION['ssuser']=$db->getRow("select userid,username,nickname from ".table('user')." where username='$username' ");
			errback("ע��ɹ�","index.php");
		}
	break;

	case 'login':
		$smarty->display("user_login.html");	
	break;

	case 'logindb':
		if(isset($_POST['yzm']))
		{
		$yzm=strtoupper(trim($_POST['yzm']));
		if($yzm!=$_SESSION['code']) errback('��֤�����');
		}
		$username=trim($_POST['username']);
		ckempty($username,'�û�������Ϊ��');
		$password=trim($_POST['password']);
		ckempty($password,'���벻��Ϊ�գ�');
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
					//�ж��û��Ƿ�������û�����������ע��
					//��ֹ�û����ظ�
					$tempuser=$username;
					$i=0;
					
					while($db->getOne("SELECT uid FROM ".table('user')." WHERE username='$tempuser' " ))
					{
						$i++;
						$tempuser=$username.$i;
					}
					$db->query("INSERT INTO ".table('user')." SET username='$tempuser',nickname='$tempuser',password='".umd5($password)."',email='$email',userid='$uid'  ");
				}
				//�û���½�ɹ������� Cookie������ֱ���� uc_authcode �������û�ʹ���Լ��ĺ���
				setcookie('KOUFU_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
				//����ͬ����¼�Ĵ���
				
				$ucsynlogin = uc_user_synlogin($uid);
				$_SESSION['ssuser']=$db->getRow("SELECT userid,username,nickname FROM ".table('user')." WHERE userid='$uid' " );
				errback("��½�ɹ�",$url);
			} elseif($uid == -1) {
				
				errback('�û�������,���߱�ɾ��');
			} elseif($uid == -2) {
				errback( '�����');
			} else {
				errback( 'δ����');
			}
		
		/*UC��½*/
		}else
		{
			/*��ͨ��½*/
			
			$ct=$db->getOne("select userid from ".table('user')." where username='$username' and password='".umd5($password)."' and status>-1 ");
			if(!$ct)
			{
				errback('�û��������������');
			}else
			{
				$_SESSION['ssuser']=$db->getRow("select userid,username,nickname from ".table('user')." where username='$username' ");
			}
			errback("��½�ɹ�",$url);
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
		if($yzm!=$_SESSION['code']) errback('��֤�����');
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
				errback("�ǳ��ѱ�ʹ��");
			}
		}
		if($user['phone']!=$phone)
		{
			if($db->getOne("SELECT userid FROM ".table('user')." WHERE phone='$phone'"))
			{
				errback("�ֻ��Ѿ�����ʹ��");
			}
		}
		$db->query("update ".table('user')." set address='$address',phone='$phone',qq='$qq',nickname='$nickname' where userid='$userid' ");

		errback('��Ϣ�༭�ɹ�');
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
			errback('�����������벻һ��');
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
		errback("�û���Ϣ�޸ĳɹ�");
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
		ckempty($username,'�û�������Ϊ�գ�');
		$email=trim($_POST['email']);
		if(!is_email($_POST['email'])) errback('�����ʽ����');
		$ct=$db->getOne("select userid from ".table('user')." where username='$username' and email='$email' LIMIT 1 ");
		if($ct==0) errback("���ע�����䲻���������");
		
		$title="{$username}�һ����룡�ʼ�";
		$pwd=rand(100000,999999);
		$db->query("update ".table('user')." set password='".umd5($pwd)."' where username='$username' ");
		$content="{$username}���ã�<br>����������Ϊ��{$pwd}���뾡���½�޸ģ�������վ".$web['webname']."��ַ��".$web['weburl'];
		
		if(send_mail($smptArr,$email,$title,$content))
		{
			errback('�������Ѿ����͵��������䣬�뾡���½�޸ģ�','index.php');
		}else
		{
			errback("�����������������ϵ����Ա");
		}
	break;
	case 'home':
		if(!$_SESSION['ssuser'])
		{
			gourl("index.php");
		}
		$userid=intval($_SESSION['ssuser']['userid']);
		$sql="select * from ".table('user')." where userid='$userid' ";
		$rs=$db->getRow($sql);//��ȡ�û���Ϣ
		//��ȡ�ۿ���Ϣ
		$discount=intval($db->getOne("select discount from ".table('user_rank')." where min_grade<'{$rs['grade']}' and max_grade>'{$rs['grade']}' "));
		$smarty->assign("discount",$discount);
		//��ȡ���ý��
		$smarty->assign("bonus",$db->getOne("select bonus from ".table('user_bonus')." where userid='$userid' "));
		//��ȡ�ƹ��û���
		$smarty->assign("spread",$db->getOne("select count(*) from ".table('user')." where fuserid='$userid' "));
		//������ѽ��
		$smarty->assign("ordermoney",$db->getOne("select sum(money) from ".table('order')." where userid='$userid' "));
		//�������ѽ��
		$smarty->assign("friendmoney",$friendmoney=$db->getOne("select sum(money) from ".table('order')." where sendtype=3 AND userid in(select userid from ".table('user')." where fuserid='$userid') "));
		//���Ѵ����Ľ���
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
		//��ȡ�ƹ��û���
		$smarty->assign("spread",$db->getOne("select count(*) from ".table('user')." where fuserid='$userid' "));	
		$smarty->assign("friendmoney",$friendmoney=$db->getOne("select sum(money) from ".table('order')." where sendtype=3 AND userid in(select userid from ".table('user')." where fuserid='$userid') "));
		//���Ѵ����Ľ���
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