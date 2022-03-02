<?php
// check_post
if (!isset($_POST['account_number']) || empty($_POST['account_number'])) die($func->status('err','Укажите номер кошелька'));
if (!isset($_POST['api_id']) || empty($_POST['api_id'])) die($func->status('err','Укажите API ID'));
if (!isset($_POST['api_key']) || empty($_POST['api_key'])) die($func->status('err','Укажите API Ключ'));
if (!isset($_POST['shop_key']) || empty($_POST['shop_key'])) die($func->status('err','Укажите Скеретный ключ магазина'));
if (!isset($_POST['shop_id']) || empty($_POST['shop_id'])) die($func->status('err','Укажите ID Магазина'));

// vars
$account_number = $func->clearStr($_POST['account_number']);
$api_id = $func->clearStr($_POST['api_id']);
$api_key = $func->clearStr($_POST['api_key']);
$shop_key = $func->clearStr($_POST['shop_key']);
$shop_id = $func->clearStr($_POST['shop_id']);

// process
$db->Query("UPDATE PREFpconf
			SET
				account_number = '{$account_number}',
				api_id = '{$api_id}',
				api_key = '{$api_key}',
				shop_key = '{$shop_key}',
				shop_id = '{$shop_id}'
			WHERE id = '1'");

// return
echo $func->status('success','Сохранено');
