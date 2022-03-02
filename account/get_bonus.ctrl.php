<?php
// check_user
if (($user_data['last_bonus_time'] + 60) > time()) die($func->status('err','Вы недавно получали бонус, подождите 5 минут'));

// check_session
if (!isset($_SESSION['bonus']) || ($_SESSION['bonus'] + 30) < time()) die($func->status('err','Обновите страницу'));

// chek_ip
$checker_time = $time - 60;
$db->Query("SELECT * FROM PREFbonuses WHERE ip = '{$ip}' AND date_add > $checker_time");
if ($db->NumRows() > 0) die($func->status('err','На ваш IP адрес недавно был получен бонус'));


// get_bonus
$db->Query("INSERT INTO PREFbonuses (date_add,user_id,status,ip)
			VALUES ('{$time}','{$user_id}','2','{$ip}')");

// set_user
$db->Query("SELECT bonus_money FROM PREFconfigs WHERE id = '1'");
$bonus_money = floatval($db->FetchRow());
$db->Query("UPDATE PREFaccounts
			SET last_bonus_time = '{$time}', count_bonuses = count_bonuses + 1, balance = balance + $bonus_money
			WHERE id = '{$user_id}'");

// clear_session
$_SESSION['bonus'] = 0;

// return
die($func->status('success','Бонус получен'));
