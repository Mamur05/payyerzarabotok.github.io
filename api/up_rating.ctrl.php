<?php
// check_post
if (!isset($_POST['key']) || empty($_POST['key'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$object_key = $func->clearStr($_POST['key']);

// check_rating
$db->Query("SELECT * FROM PREFrating WHERE object_key = '{$object_key}'");
if ($db->NumRows() <= 0) die($func->status('err','Ошибка, обновите страницу'));
$rating_data = $db->FetchArray();

// get_price
$db->Query("SELECT up_rating_price FROM PREFconfigs WHERE id = '1'");
$money = sprintf('%.2f',$db->FetchRow());

// get_pconf
$db->Query("SELECT * FROM PREFpconf WHERE id = '1'");
$pconf = $db->FetchArray();

// create_insert_row
$db->Query("INSERT INTO PREFinserts (date_add,money,status,object_key,transaction_type)
			VALUES ('{$time}','{$money}','1','{$object_key}','up_rating')");
$insert_id = $db->LastInsert();

// gen_url
$desc 			= base64_encode("Подъем сайта в списке рейтинга");
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
