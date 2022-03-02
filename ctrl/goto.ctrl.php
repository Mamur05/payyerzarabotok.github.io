<?php
if (isset($url[2]) && !empty($url[2])) {
	// vars
	$id = $func->clearInt($url[2]);
	// check_database
	$db->Query("SELECT * FROM PREFrating WHERE id = '{$id}'");
	if ($db->NumRows() > 0) {
		$site_data = $db->FetchArray();
		if ($site_data['status'] != '2') die(header('location: /'));
		$db->Query("UPDATE PREFrating SET count_clicks = count_clicks + 1 WHERE id = '{$id}'");
		header('location: '.$site_data['link']);
	}else header('location: /');
}else header('location: /');
