<?php
// vars
$data = array();
// check_user
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	$user_id = $func->clearInt($_SESSION['user']);
	// update_status
	$time = time();
	$db->Query("UPDATE PREFaccounts SET date_last_action = '{$time}' WHERE id = '{$user_id}'");
	$db->Query("SELECT * FROM PREFaccounts WHERE id = '$user_id'");
	$user_data = $db->FetchArray();
	$data = $user_data;
	$db->Query("SELECT SUM(to_ref) FROM PREFaccounts WHERE ref_id = '{$user_id}'");
	$data['from_refs'] = $db->FetchRow();
	// links
	$protocol = 'http://';
	$site_link = $protocol.$_SERVER['HTTP_HOST'];
	$ref_link = $site_link.'/ref/'.$user_data['ref_key'];
	$banner_link = '<a href="'.$ref_link.'" target="_blank"><img src="'.$site_link.'/views/default/img/468.gif"/></a>';
	$data['ref_link'] = $ref_link;
	$data['banner_link'] = htmlspecialchars($banner_link);
	// get_banners
	$db->Query("SELECT * FROM PREFbanners ORDER BY id DESC");
	$banners = $db->FetchAll();
	foreach ($banners as $banner) {
		$data['banners'][$banner['id']] = $banner['html'];
	}
	$gen->genPage('referals',$data);
}else {
	header('location:/');
}
