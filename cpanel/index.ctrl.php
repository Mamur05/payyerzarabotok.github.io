<?php
$online_time = time() - 600;
$day_time = time() - 86400;
$db->Query("SELECT
	(SELECT COUNT(*) FROM PREFaccounts) users,
	(SELECT COUNT(*) FROM PREFaccounts WHERE date_last_action >= '{$online_time}') online_users,
	(SELECT SUM(money) FROM PREFpayments WHERE status = '2') payment_all,
	(SELECT SUM(money) FROM PREFpayments WHERE status = '2' AND date_add > '{$day_time}') payment_24
	");
$data = $db->FetchArray();
$gen->genAdmin('index',$data);
