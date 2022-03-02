<?php
// check_post
if (!isset($_POST['id']) || empty($_POST['id'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$id = $func->clearInt($_POST['id']);

// get_user_data
$db->Query("SELECT * FROM PREFaccounts WHERE id = '{$id}'");
$user_data = $db->FetchArray();

// status
$status = ($user_data['ban'] == '1') ? '2' : '1';

// update_user
$db->Query("UPDATE PREFaccounts SET ban = '{$status}' WHERE id = '{$id}'");

// return
echo $func->status('success',$status);
