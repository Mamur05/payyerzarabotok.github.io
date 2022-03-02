<?php
if (isset($url['3']) && !empty($url[4])) {
	$id = $func->clearInt($url[4]);
	$db->Query("SELECT * FROM PREFrating WHERE id = '{$id}'");
	if ($db->NumRows() > 0) {
		$data_rating = $db->FetchArray();
		$status = ($data_rating['paid'] == '2') ? '1' : '2';
		$db->Query("UPDATE PREFrating SET paid = '{$status}' WHERE id = '{$id}'");
		header('location:/cpanel/rating/');
	}else header('location:/cpanel/rating/');
}else header('location:/cpanel/rating/');
