<?php
// check_post
if (!isset($_POST['pay_type']) || empty($_POST['pay_type'])) die($func->status('err','Выберите активность выплат'));
if (!isset($_POST['min_pay']) || empty($_POST['min_pay'])) die($func->status('err','Укажите минимальную выплату'));
if (!isset($_POST['bonus_money']) || empty($_POST['bonus_money'])) die($func->status('err','Укажите сумму бонуса'));
if (!isset($_POST['recaptcha_sitekey']) || empty($_POST['recaptcha_sitekey'])) die($func->status('err','Укажите RECAPTCHA SITEKEY'));
if (!isset($_POST['recaptcha_secret']) || empty($_POST['recaptcha_secret'])) die($func->status('err','Укажите RECAPTCHA SECRET'));


// vars
$pay_type = $func->clearInt($_POST['pay_type']);
$min_pay = $func->clearFloat($_POST['min_pay']);
$bonus_money = $func->clearFloat($_POST['bonus_money']);
$recaptcha_sitekey = $func->clearStr($_POST['recaptcha_sitekey']);
$recaptcha_secret = $func->clearStr($_POST['recaptcha_secret']);

// process
$db->Query("UPDATE PREFconfigs
			SET pay_type = '{$pay_type}',
				min_pay = '{$min_pay}',
				bonus_money = '{$bonus_money}',
				recaptcha_sitekey = '{$recaptcha_sitekey}',
				recaptcha_secret = '{$recaptcha_secret}'
				WHERE id = '1'");

// return
echo $func->status('success','Сохранено');
