<?php
if (isset($url[2]) && !empty($url[2])) {
	$object_key = $func->clearStr($url[2]);
	$db->Query("SELECT * FROM PREFrating WHERE object_key = '{$object_key}'");
	if ($db->NumRows() > 0) {
		$rating_data = $db->FetchArray();
		$data = $rating_data;
		// check_top
		$db->Query("SELECT * FROM PREFrating WHERE status = '2' ORDER BY date_last_up DESC");
		$bns = $db->FetchAll();
		$n = 1;
		foreach ($bns as $key) {
			if ($key['object_key'] == $object_key) break;
			$n++;
		}
		$data['position'] = $n;
		// get_up_price
		$db->Query("SELECT up_rating_price FROM PREFconfigs WHERE id = '1'");
		$data['up_price'] = sprintf('%.2f',$db->FetchRow());
		// get_banners
		$db->Query("SELECT * FROM PREFbanners ORDER BY id DESC");
		$banners = $db->FetchAll();
		foreach ($banners as $banner) {
			$data['banners'][$banner['id']] = $banner['html'];
		}
		$gen->genPage('control',$data);
	}else header('location: /');
}else header('location: /');
