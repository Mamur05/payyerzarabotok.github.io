<?php
// check_post
if (!isset($_POST['site_domen']) || empty($_POST['site_domen'])) die($func->status('err','Укажите домен сайта'));
if (!isset($_POST['banner_text']) || empty($_POST['banner_text'])) die($func->status('err','Укжите текст баннера'));
if (!isset($_POST['wishes']) || empty($_POST['wishes'])) die($func->status('err','Укажите пожелания'));
if (!isset($_POST['size']) || empty($_POST['size'])) die($func->status('err','Укажите размер баннера'));
if (!isset($_POST['email']) || empty($_POST['email'])) die($func->status('err','Укажите контактную почту'));

// vars
$site_domen = $func->clearStr($_POST['site_domen']);
$banner_text = $func->clearStr($_POST['banner_text']);
$wishes = $func->clearStr($_POST['wishes']);
$size = $func->clearStr($_POST['size']);
$email = $func->clearStr($_POST['email']);
$object_key = $func->genKey(25);

// select_money
$db->Query("SELECT buy_banner_price FROM PREFconfigs WHERE id = '1'");
$money = sprintf('%.2f',$db->FetchRow());

// create_json
$json_arr = array(
	'domain'=>$site_domen,
	'text'=>$banner_text,
	'wishes'=>$wishes,
	'size'=>$size
);
$json_message = json_encode($json_arr,JSON_UNESCAPED_UNICODE);

// update_database
$db->Query("INSERT INTO PREFbuy_banners (date_add,user_email,json_message,object_key,status)
			VALUES ('{$time}','{$email}','{$json_message}','{$object_key}','1')");

// create_insert_row
$db->Query("INSERT INTO PREFinserts (date_add,money,status,object_key,transaction_type)
			VALUES ('{$time}','{$money}','1','{$object_key}','buy_banner')");
$insert_id = $db->LastInsert();

// select_pconf
$db->Query("SELECT * FROM PREFpconf WHERE id = '1'");
$pconf = $db->FetchArray();

// gen_url
$desc 			= base64_encode("Покупка баннера");
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
