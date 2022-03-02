<?php
// recaptcha
$db->Query("SELECT recaptcha_secret FROM PREFconfigs WHERE id = '1'");
$recaptcha_secret = $db->FetchRow();
$recaptcha = $_POST['g-recaptcha-response'];
$secret = $recaptcha_secret;
$google_url = "https://www.google.com/recaptcha/api/siteverify";
$ip = $_SERVER['REMOTE_ADDR'];
$url = $google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);
curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
$curlData = curl_exec($curl);
curl_close($curl);
$res = $curlData;
$res = json_decode($res, true);
if (!$res['success']) die($func->status('err','Каптча заполнена неверное, попробуйте снова'));

// check_user
if (($user_data['last_bonus_time'] + 60) > time()) die($func->status('err','Вы недавно получали бонус, подождите 5 минут'));

// set_session
$_SESSION['bonus'] = $time;

// return
echo $func->status('success','Нажмите на любой подсвеченый баннер, для получения бонуса');
