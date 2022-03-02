<?php
if (isset($url[2]) && !empty($url[2])) {
	$ref_key = $func->clearStr($url[2]);
	$db->Query("SELECT * FROM PREFaccounts WHERE ref_key = '{$ref_key}'");
	if ($db->NumRows() > 0) {
		$data = $db->FetchArray();
		$referer = $data['id'];
		$time_cookie = time() + (86400 * 15);
		setcookie('referer', $ref_key, $time_cookie, '/');
	}
}
header('location: /');
