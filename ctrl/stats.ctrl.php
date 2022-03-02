<?php
$day_time = time() - 86400;
$db->Query("SELECT
	(SELECT SUM(money) FROM PREFpayments WHERE status = '2') payment_all,
	(SELECT SUM(money) FROM PREFpayments WHERE date_add > $day_time AND status = '2') payment_day,
	(SELECT COUNT(*) FROM PREFaccounts) users");
$data = $db->FetchArray();
$db->Query("SELECT * FROM PREFpayments WHERE status = '2' ORDER BY id DESC LIMIT 50");
$data['payments'] = $db->FetchAll();
$gen->genPage('stats',$data);
