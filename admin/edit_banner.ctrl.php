<?php
// check_post
if (!isset($_POST['html_code']) || empty($_POST['html_code'])) die($func->status('err','Укажите html код'));
if (!isset($_POST['id']) || empty($_POST['id'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$html_code = $func->clearHtml($_POST['html_code']);
$id = $func->clearInt($_POST['id']);

// set_database
$db->Query("UPDATE PREFbanners SET html = '{$html_code}',date_last_update = '{$time}' WHERE id = '{$id}'");

// return
echo $func->status('success','Баннер сохранен');
