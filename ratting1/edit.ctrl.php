<?php
if (isset($url[4]) && !empty($url[4])) {
	$id = $func->clearInt($url[4]);
	$db->Query("SELECT * FROM PREFrating WHERE id = '{$id}'");
	if ($db->NumRows() > 0) {
		$data = $db->FetchArray();
		$gen->genAdmin('rating/edit',$data);
	}else header('location: /cpanel/rating');
}else header('location: /cpanel/rating');
