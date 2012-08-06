<?php
$_GET['a']=$_GET['a']?htmlspecialchars(trim($_GET['a'])):'index';
switch($_GET['a'])
{
	case 'index':
			$smarty->display("member.html");
		break;
}

?>