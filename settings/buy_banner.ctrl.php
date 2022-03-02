<?php
// check_post
if (!isset($_POST['buy_banner_price']) || empty($_POST['buy_banner_price'])) die($func->status('err','Укажите цену баннера'));
if (!isset($_POST['buy_banner_emails']) || empty($_POST['buy_banner_emails'])) die($func->status('err','Укажите почтовые адреса'));


// vars
$buy_banner_price = $func->clearFloat($_POST['buy_banner_price']);
$buy_banner_emails = $func->clearStr($_POST['buy_banner_emails']);

// process
$db->Query("UPDATE PREFconfigs
			SET buy_banner_price = '{$buy_banner_price}',
				buy_banner_emails = '{$buy_banner_emails}'
			WHERE id = '1'");

// return
echo $func->status('success','Сохранено');
