<?php
$rewriterule=array(
	array("/<a href=[\"\']index\.php\?(\w+)=(\w+)&(\w+)=(\w+)&(\w+)=(\w+)&(\w+)=(\w+)[\"\']/iUs",'<a href="\\1-\\2-\\3-\\4-\\5-\\6-\\7-\\8.html"'),
	array("/<a href=[\"\']index\.php\?(\w+)=(\w+)&(\w+)=(\w+)&(\w+)=(\w+)[\"\']/iUs",'<a href="\\1-\\2-\\3-\\4-\\5-\\6.html"'),
	array("/<a href=[\"\']index\.php\?(\w+)=(\w+)&(\w+)=(\w+)[\"\']/iUs",'<a href="\\1-\\2-\\3-\\4.html"'),
	
	array("/<a href=[\"\']index\.php\?(\w+)=(\w+)[&]*[\"\']/iUs",'<a href="\\1-\\2.html"'),
	
	array("/<a href=[\"\']index.php[\"\']/iUs",'<a href="index.html"')
	
	
);
?>