<?php
// check_url
if (isset($_SESSION['admin']) && !empty($_SESSION['admin'])) {
	if (isset($url[2]) && !empty($url[2])) {
		$cpanel = $func->clearStr($url[2]);
		$file = 'ctrl/cpanel/'.$cpanel.'.ctrl.php';
		if (file_exists($file)) {
			include $file;
		}else include 'ctrl/404.ctrl.php';
	}else include 'ctrl/cpanel/index.ctrl.php';
}else include 'ctrl/cpanel/auth.ctrl.php';
