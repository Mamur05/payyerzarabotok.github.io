<?php
// check_post
if (!isset($_POST['payeer_purse']) || empty($_POST['payeer_purse'])) die($func->status('err','Укажите Payeer кошелек'));

// vars
$payeer_purse = strtoupper($func->clearStr($_POST['payeer_purse']));

// check_payeer
if (!$func->isPayeer($payeer_purse)) die($func->status('err','Формат Payeer кошелька неверен'));

// check_account
$db->Query("SELECT * FROM PREFaccounts WHERE payeer_purse = '{$payeer_purse}'");
if ($db->NumRows() > 0) {
	$user_data = $db->FetchArray();
	$_SESSION['user'] = $user_data['id'];
	// update_status
	$db->Query("UPDATE PREFaccounts SET date_last_action = '{$time}' WHERE id = '{$user_id}'");
	$db->Query("UPDATE PREFaccounts SET last_ip = '{$ip}' WHERE id = '{$user_data['id']}'");
	echo $func->status('success','Вы успешно авторизованы');
}else {
	// Реферальная система
	if (isset($_COOKIE['referer']) && !empty($_COOKIE['referer'])) {
		$referer_key = $func->clearStr($_COOKIE['referer']);
		$db->Query("SELECT * FROM PREFaccounts WHERE ref_key = '{$referer_key}'");
		if ($db->NumRows() > 0) {
			$referer_data = $db->FetchArray();
			$referer = $referer_data['id'];
			$db->Query("UPDATE PREFaccounts SET count_refs = count_refs + 1 WHERE id = '{$referer}'");
		}else $referer = 0;
	}else $referer = 0;
	// Регистрация
	$last_bonus_time = $time - 300;
	$ref_key = $func->genKey(10);
	$db->Query("INSERT INTO PREFaccounts (payeer_purse,date_reg,last_bonus_time,ref_id,ref_key,last_ip)
				VALUES ('{$payeer_purse}','{$time}','{$last_bonus_time}','{$referer}','{$ref_key}','{$ip}')");
	$user_id = $db->LastInsert();
	// update_status
	$db->Query("UPDATE PREFaccounts SET date_last_action = '{$time}' WHERE id = '{$user_id}'");
	$_SESSION['user'] = $user_id;
	echo $func->status('success','Аккаунт успешно создан');
}
