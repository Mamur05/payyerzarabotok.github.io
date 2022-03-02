<?php
// get_banners_data
$db->Query("SELECT * FROM PREFbanners ORDER BY id DESC");
$banners = $db->FetchAll();
foreach ($banners as $banner) {
	$data['banners'][$banner['id']] = $banner;
	$data['banners'][$banner['id']]['html'] = preg_replace('/[\r\n\t]/', '', $banner['html']);
}
$gen->genAdmin('banners',$data);
