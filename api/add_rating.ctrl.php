<?php
// check_post
if (!isset($_POST['banner_link']) || empty($_POST['banner_link'])) die($func->status('err','Укажите ссылку на баннер'));
if (!isset($_POST['link']) || empty($_POST['link'])) die($func->status('err','Укажите ссылку на сайт'));
if (!isset($_POST['bonus']) || empty($_POST['bonus'])) die($func->status('err','Укажите сумму бонуса'));
if (!isset($_POST['period']) || empty($_POST['period'])) die($func->status('err','Укажите период'));
if (!isset($_POST['min_pay']) || empty($_POST['min_pay'])) die($func->status('err','Укажите минимальную выплату'));
if (!isset($_POST['curr']) || empty($_POST['curr'])) die($func->status('err','Выберите валюту'));
if (!isset($_POST['email_user']) || empty($_POST['email_user'])) die($func->status('err','Укажите почту'));

// vars
$banner_link = $func->clearStr($_POST['banner_link']);
$link = $func->clearStr($_POST['link']);
$bonus = $func->clearFloat($_POST['bonus']);
$period = $func->clearStr($_POST['period']);
$min_pay = $func->clearFloat($_POST['min_pay']);
$curr = $func->clearStr($_POST['curr']);
$email_user = $func->clearStr($_POST['email_user']);
$object_key = $func->genKey(25);

// check_curr
$curr_arr = array('rub','usd','euro','btc');
if (!in_array($curr,$curr_arr)) die($func->status('err','Ошибка валюты, обвноите страницу'));

// get_price
$db->Query("SELECT add_rating_price FROM PREFconfigs WHERE id = '1'");
$money = sprintf('%.2f',$db->FetchRow());

// get_pconf
$db->Query("SELECT * FROM PREFpconf WHERE id = '1'");
$pconf = $db->FetchArray();

// update_base
$db->Query("INSERT INTO PREFrating (banner_link,link,bonus,period,min_pay,object_key,date_add,status,paid_status,email_user,curr)
			VALUES ('{$banner_link}','{$link}','{$bonus}','{$period}','{$min_pay}','{$object_key}','{$time}','1','1','{$email_user}','{$curr}')");

// create_insert_row
$db->Query("INSERT INTO PREFinserts (date_add,money,status,object_key,transaction_type)
			VALUES ('{$time}','{$money}','1','{$object_key}','add_rating')");
$insert_id = $db->LastInsert();

// gen_url
$desc 			= base64_encode("Размещение сайта в рейтинге");
$m_shop 		= $pconf['shop_id'];
$m_orderid 		= $insert_id;
$m_amount 		= number_format($money, 2, ".", "");
$m_curr 		= "USD";
$m_desc 		= $desc;
$m_key 			= $pconf['shop_key'];
$arHash 		= array($m_shop,$m_orderid,$m_amount,$m_curr,$m_desc,$m_key);
$sign 			= strtoupper(hash('sha256', implode(":", $arHash)));
$url_send 		= "https://payeer.com/api/merchant/m.php/";
$data_send 		= "?m_shop=".$m_shop."&m_orderid=".$m_orderid."&m_amount=".$m_amount."&m_curr=".$m_curr."&m_desc=".$m_desc."&m_sign=".$sign."&m_process=1";
$link 			= $url_send.$data_send;


// return
echo $func->status('success',$link);
