<?php
if (isset($url['3']) && !empty($url[4])) {
	$id = $func->clearInt($url[4]);
	$db->Query("DELETE FROM PREFrating WHERE id = '{$id}'");
	header('location:/cpanel/rating/');
}else header('location:/cpanel/rating/');
