<?php
// check_post
if (!isset($_POST['account']) || empty($_POST['account'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$account = $func->clearStr($_POST['account']);
$file = 'ctrl/api/account/'.$account.'.ctrl.php';

// check_session
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) die($func->status('err','Нет доступа, авторизуйтесь на сайте'));
$user_id = $func->clearInt($_SESSION['user']);

// get_user_data
$db->Query("SELECT * FROM PREFaccounts WHERE id = '{$user_id}'");
$user_data = $db->FetchArray();

// check_ban
if ($user_data['ban'] != '1') die($func->status('err','Ваш аккаунт заблокирован, для выяснения причин напиши в поддержку'));


// update_status
$db->Query("UPDATE PREFaccounts SET date_last_action = '{$time}' WHERE id = '{$user_id}'");

// check_file
if (!file_exists($file)) die($func->status('err','Ошибка контроллера, обновите страницу'));

// include
include $file;
