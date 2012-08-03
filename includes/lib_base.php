<?php

/*
���������ⲻ�漰���ݿ�

*/
/*�ԷǷ��������м��*/
if (!get_magic_quotes_gpc())
{
    if (!empty($_GET))
    {
        $_GET  = addslashes_deep($_GET);
    }
    if (!empty($_POST))
    {
        $_POST = addslashes_deep($_POST);
    }

    $_COOKIE   = addslashes_deep($_COOKIE);
    $_REQUEST  = addslashes_deep($_REQUEST);
}
/**
@�ַ�ת������
*/
function iconvstr($from,$to,$str)
{
	if(empty($str))
	{
		return false;
	}
	if(is_array($str))
	{
		foreach($str as $key=>$val)
		{
			$str[$key]=iconvstr($from,$to,$val);
		}
		
		
	}else
	{
		$str=iconv($from,$to,$str);
	}
	
	return $str;
}

function _implode($arr)
{
	if($arr)
	{
	return "'".implode("','",is_array($arr)?$arr:array($arr))."'";
	}else
	{
		return false;
	}
}

/*�򵥷�ҳ����*/
function unHtml($str)
{
	if(!empty($str))
	{
	$str=str_replace("&","&amp;",$str);
	$str=str_replace("<","&lt;",$str);
	$str=str_replace(">","&gt;",$str);
	$str=str_replace(chr(34),"&quot;",$str);
	$str=str_replace(chr(32),"&nbsp;",$str);
	$str=nl2br($str);
	return $str;
	}
}

function multipage($num, $perpage, $curpage, $mpurl,$page=10) {
	$shownum = $showkbd = FALSE;
	$multipage = '';
	$mpurl .= strpos($mpurl, '?') ? '&' : '?';
	$page=10;
	if(ISWAP)
	{
		if($num>=$perpage*($curpage+1))
		{
			return "<div class='pages'><a href='{$mpurl}page=".($curpage+1)."'><strong>����</strong></a></div>";
		}else
		{
			
			return false;
		}
	}
	$realpages = 1;
	if($num > $perpage) {
		$offset = 2;

		$realpages = @ceil($num / $perpage);
		$pages = $maxpages && $maxpages < $realpages ? $maxpages : $realpages;

		if($page > $pages) {
			$from = 1;
			$to = $pages;
		} else {
			$from = $curpage - $offset;
			$to = $from + $page - 1;
			if($from < 1) {
				$to = $curpage + 1 - $from;
				$from = 1;
				if($to - $from < $page) {
					$to = $page;
				}
			} elseif($to > $pages) {
				$from = $pages - $page + 1;
				$to = $pages;
			}
		}

		$multipage = ($curpage > 1 && !$simple ? '<a href="'.$mpurl.'page='.($curpage - 1).'" class="prev" > ��ҳ</a>' : '').
			($curpage - $offset > 1 && $pages > $page ? '<a href="'.$mpurl.'page=1" class="first" >1 ...</a>' : '');
		for($i = $from; $i <= $to; $i++) {
			$multipage .= $i == $curpage ? '<strong>'.$i.'</strong>' :
			'<a href="'.$mpurl.'page='.$i.'">'.$i.'</a>';
		}

		$multipage .= ($to < $pages ? '<a href="'.$mpurl.'page='.$pages.'" class="last" >... '.$realpages.'</a>' : '').
		($curpage < $pages && !$simple ? '<a href="'.$mpurl.'page='.($curpage + 1).'" class="next" >��һҳ</a>' : '');

		$multipage = $multipage ? '<div class="pages">'.($shownum && !$simple ? '<em>&nbsp;'.$num.'&nbsp;</em>' : '').$multipage.'</div>' : '';
	}
	$maxpage = $realpages;
	return $multipage;
}
	


/*
������ǰ׺ ����
*/
function table($tb)
{

	return TABLE_PRE.$tb;
}

//������
function errback($str,$url='')	
{
	global $smarty;
	
	$smarty->assign("message",$str);
	$smarty->assign("url",$url?$url:$_SERVER['HTTP_REFERER']);
	$smarty->display("msg.html");
	exit();
}
/*
��ַ��ת
*/
function gourl($url='')
{
	if(empty($url))
	{
		echo "<script>location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	}else
	{	
		echo "<script>location.href='".$url."';</script>";
	}
	exit();
}

	

//�Զ���΢��ʱ��
function umtime()
{
	$a=explode(" ",microtime());
	
	return $a[1].str_replace("0.","",$a[0]);
}

/**
 * ����Ƿ�Ϊһ���Ϸ���ʱ���ʽ
 *
 * @access  public
 * @param   string  $time
 * @return  void
 */
function is_time($time)
{
    $pattern = '/[\d]{4}-[\d]{1,2}-[\d]{1,2}\s[\d]{1,2}:[\d]{1,2}:[\d]{1,2}/';

    return preg_match($pattern, $time);
}

//��ȡ�ַ�������
function cutstr($string, $length, $dot = '') {
	if(strlen($string) <= $length) {
		return $string;
	}
	if(!defined(CHARSET))
	{
		define("CHARSET","gbk");
	}
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array('&', '"', '<', '>'), $string);

	$strcut = '';
	if(strtolower(CHARSET) == 'utf-8') {

		$n = $tn = $noc = 0;
		while($n < strlen($string)) {

			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}

			if($noc >= $length) {
				break;
			}

		}
		if($noc > $length) {
			$n -= $tn;
		}

		$strcut = substr($string, 0, $n);

	} else {
		for($i = 0; $i < $length; $i++) {
			isset($string[$i]) && $strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}

	$strcut = str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);

	return $strcut.$dot;
}

/*
*��ȡ�ַ�������
* @str �ַ���
* @len Ҫ��ȡ�ĳ���
* @start ��ʼ��ȡ����
* @return �ַ���
*/

function gbksubstr($str, $len, $start=0) {
    $tmpstr = "";
    $strlen = $start + $len;
    for($i = 0; $i < $strlen; $i++) {
        if(ord(substr($str, $i, 1)) > 0xa0) {
            $tmpstr .= substr($str, $i, 2);
            $i++;
        } else
            $tmpstr .= substr($str, $i, 1);
    }
    return $tmpstr;
}



/**
 * ����û�����ʵIP��ַ

 */
function realip()
{
  		$ip = $_SERVER['REMOTE_ADDR'];
		if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
			foreach ($matches[0] AS $xip) {
				if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
					$ip = $xip;
					break;
				}
			}
		}
		return $ip;
}



/**
 * �ʼ�����
 *
 * @param: $name[string]        ����������
 * @param: $email[string]       �������ʼ���ַ
 * @param: $subject[string]     �ʼ�����
 * @param: $content[string]     �ʼ�����
 * @param: $type[int]           0 ��ͨ�ʼ��� 1 HTML�ʼ�
 * @param: $notification[bool]  true Ҫ���ִ�� false ���û�ִ
 *
 * @return boolean
 */
 /*����

*/
function send_mail($smptArr, $smtpemailto, $mailsubject, $mailbody , $mailtype="html")
{
	require_once (ROOT_PATH."includes/cls_smtp.php");
	$smtpserver = $smptArr[0];//SMTP������
	$smtpserverport =$smptArr[1];//SMTP�������˿�
	$smtpusermail = $smptArr[2];//SMTP���������û�����
	$smtpuser = $smptArr[3];//SMTP���������û��ʺ�
	$smtppass = $smptArr[4];//SMTP���������û�����
	//��ʼ����
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);
	$smtp->log_file='log.txt';
	$smtp->debug = TRUE;//�Ƿ���ʾ���͵ĵ�����Ϣ
	return $smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);

}




/**
 * �ݹ鷽ʽ�ĶԱ����е������ַ�����ת��
 *
 * @access  public
 * @param   mix     $value
 *
 * @return  mix
 */
function addslashes_deep($value)
{
    if (empty($value))
    {
        return $value;
    }
    else
    {
        return is_array($value) ? array_map('addslashes_deep', $value) : addslashes(trim($value));
    }
}





/*�ж��Ƿ��л���*/
function is_sqlcache($file,$cachetime=3600)
{
	$file=ROOT_PATH."temp/sqlcache/{$file}";
	if(file_exists($file))
	{
		$mtime=filemtime($file);
		if($mtime+$cachetime>time())
		{
			return true;
		}else
		{
			return false;
		}
		
	}
}
/*��ȡ����*/
function getsqlcache($file,$cachetime=11000)
{
	$file=ROOT_PATH."temp/sqlcache/{$file}";
	if(file_exists($file) )
	{
		
		$c=file_get_contents($file);
		return unserialize($c);
		
		
	}
}
/*���û��� Ĭ�ϻ���ʱ��5����*/
function setsqlcache($file,$data)
{
	$file=ROOT_PATH."temp/sqlcache/{$file}";
	if(file_exists($file))
	{
		unlink($file);
	}
	
	$data=serialize($data);
	file_put_contents($file,$data);
}

/*ɾ��sql����*/
function delsqlcache($file)
{
	$file=ROOT_PATH."temp/sqlcache/{$file}";
	if(file_exists($file))
	{
		unlink($file);
	}
}

function gmtime()
{
    return (time() - date('Z'));
}

/**
@ɾ����ǰĿ¼���ļ�
*/
function deldir($dir)
{
	if(!is_dir($dir)) return false;
	$dh=opendir($dir);
	while(($file=readdir($dh))!==false)
	{
		if($file!="." && $file!="..")
		{
			if(is_dir($dir."/".$file))
			{
				deldir($dir."/".$file);	
			}else
			{
				unlink($dir."/".$file);
			}
		}
	}
	closedir($dh);
	rmdir($dir);
	
}
/**
@ɾ��Ŀ¼�µ������ļ� ������ǰĿ¼
*/
function delfile($dir)
{
	$hd=opendir($dir);
	while(($f=readdir($hd))!=false)
	{
		if($f!=".." and $f!=".")
		{
			if(is_file($dir.$f)){
				unlink($dir.$f);
			}else
			{
				delfile($dir.$f."/");
			}
		}
	}
}

//���ڼ�
function getweek()
{
	if(date("N"))
	{
		return date("N");
	}
	if(date("w")==0)
	{
		return 7;
	}else
	{
		return intval(date("w"));
	}
}

function jsonString($str)
{
	return preg_replace("/([\\\\\/'])/",'\\\$1',$str);
}


/*���㿪ҵʱ�亯��*/
function opentype($starthour,$startminute,$endhour,$endminute)
{
	$opentype='doing';
	$h=intval(date("H"));
	$m=intval(date("i"));
	if($starthour>$endhour)
	{
		if(($endhour<$h && $starthour>$h) or (($endhour==$h && $endminute<$m) && ($starthour==$h && $startminute>$m)))
		{
			if(($starthour-$h)>(($starthour-$endhour)/2))
			{
				$opentype='done';
			}else
			{
				
				$opentype='will';
			}
		}elseif($endhour)
		{
			$opentype='doing';
		}
		
	}else
	{
		if($h<$starthour or ($h==$starthour && $m<$startminute))
		{
			$opentype='will';//δ��ʱ
		}elseif($h>$endhour or($h==$endhour && $m>$endminute))
		{
			$opentype='done';//һ����
		}else
		{
			$opentype='doing';
		}
	}
	return $opentype;
}

?>