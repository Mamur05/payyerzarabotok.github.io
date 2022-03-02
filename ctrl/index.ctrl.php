<?php
$data = array();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	$user_id = $func->clearInt($_SESSION['user']);
	$db->Query("SELECT * FROM PREFaccounts WHERE id = '{$user_id}'");
	$data = $db->FetchArray();
	$db->Query("SELECT min_pay FROM PREFconfigs WHERE id = '1'");
	$data['conf']['min_pay'] = $db->FetchRow();
	// update_status
	$time = time();
	$db->Query("UPDATE PREFaccounts SET date_last_action = '{$time}' WHERE id = '{$user_id}'");
	$db->Query("SELECT recaptcha_sitekey FROM PREFconfigs WHERE id = '1'");
	$data['sitekey'] = $db->FetchRow();
}
// get_banners
$db->Query("SELECT * FROM PREFbanners ORDER BY id DESC");
$banners = $db->FetchAll();
foreach ($banners as $banner) {
	$data['banners'][$banner['id']] = $banner['html'];
}
$gen->genPage('index',$data);
