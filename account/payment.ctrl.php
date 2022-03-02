<?php
// get_configs
$db->Query("SELECT * FROM PREFconfigs WHERE id = '1'");
$conf = $db->FetchArray();

// process
$lock_name = strtoupper($user_data['payeer_purse']);
$fp = fopen('locks/'.$lock_name.'.txt', 'w+');

global $func;

// unlock_file_functions
function retStatus($func,$fp,$status,$text){
	flock($fp, LOCK_UN);
	fclose($fp);
	echo $func->status($status,$text);
	exit();
}

// process
if (flock($fp, LOCK_EX)) {
	// get_user_data
	$db->Query("SELECT * FROM PREFaccounts WHERE id = '{$user_id}'");
	$user_data = $db->FetchArray();

	// check_balance
	if ($user_data['balance'] < floatval($conf['min_pay']))
		retStatus($func,$fp,'err','Минимальная сумма для выплаты '.$conf['min_pay'].' <i class="fa fa-rub"></i>');

	// vars
	$money = sprintf('%.2f',$user_data['balance']);
	$time = time();
	$payeer_purse = $user_data['payeer_purse'];
	switch ($conf['pay_type']) {
		case '1':
			// get_pconf
			$db->Query("SELECT * FROM PREFpconf WHERE id = '1'");
			$pconf = $db->FetchArray();
			$payeer = new payeer($pconf['account_number'], $pconf['api_id'], $pconf['api_key']);
			if($payeer->IsAuth()){
				$balances = $payeer->getBalance();
				if(floatval($balances['balance']['RUB']['DOSTUPNO']) > floatval($money)){
					$data = array(
						'curIn' => 'RUB',
						'sum' => sprintf('%.02f',floatval($money)),
						'curOut' => 'RUB',
						'to' => $payeer_purse,
						'comment' => 'Выплата с проекта slot.addserf.ru',
						'anonim' => 'Y'
						);
					$transfer = $payeer->transfer($data);
					if(empty($transfer['errors'])){
						// update_database
						$db->Query("INSERT INTO PREFpayments (user_id,date_add,money,status,payeer_purse)
									VALUES ('{$user_id}','{$time}','{$money}','2','{$payeer_purse}')");
						$db->Query("UPDATE PREFaccounts SET balance = '0' WHERE id = '{$user_id}'");
						// ref_system
						if ($user_data['ref_id'] != '0') {
							$ref_money = $money * 0.10;
							$ref_id = $user_data['ref_id'];
							$db->Query("UPDATE PREFaccounts SET to_ref = to_ref + $ref_money WHERE id = '{$user_id}'");
							$db->Query("UPDATE PREFaccounts SET balance = balance + $ref_money WHERE id = '{$ref_id}'");
						}
						// return
						retStatus($func,$fp,'success','Выплата прошла успешно');
					}else retStatus($func,$fp,'err','Ошибка P1, сообщите об этом поддержке');
				}else retStatus($func,$fp,'err','Ошибка M1, сообщите об этом поддержке');
			}else retStatus($func,$fp,'err','Ошибка C1, сообщите об этом поддержке');
			break;
		case '2':
			retStatus($func,$fp,'err','Выплаты выключены по техническим причинам, попробуйте позже');
			break;
		default:
			// return
			retStatus($func,$fp,'err','Ошибка, обновите странциу');
			break;
	}
}
