<?php
$lat=floatval($_GET['lat']);
$lng=floatval($_GET['lng']);

if($lat && $lng)
{
	$_SESSION['ss_latlng']=$lat."-".$lng."-".time();
	$db->query("INSERT INTO ".table('user_gps')." SET lat='$lat',lng='$lng',userid=".intval($_SESSION['ssuser']['userid']).",dateline=".time()." ");
	echo "OK";	 
}
?>