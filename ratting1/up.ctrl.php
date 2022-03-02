<?php
if (isset($url['3']) && !empty($url[4])) {
	$id = $func->clearInt($url[4]);
	$time = time();
	$db->Query("UPDATE PREFrating SET date_last_up = '{$time}' WHERE id = '{$id}'");
	header('location:/cpanel/rating/');
}else header('location:/cpanel/rating/');
