<?php
if (isset($url[3]) && !empty($url[3])) {
	$page = $func->clearStr($url[3]);
	$file = 'ctrl/cpanel/rating/'.$page.'.ctrl.php';
	if (file_exists($file)) {
		include $file;
	}else include 'ctrl/cpanel/rating/index.ctrl.php';
}else include 'ctrl/cpanel/rating/index.ctrl.php';
