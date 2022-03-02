<?php
// chekc_post
if (!isset($_POST['api']) || empty($_POST['api']) ) die($func->status('err','Ошибка, обновите страницу'));

// vars
$time = time();
$ip = $_SERVER['REMOTE_ADDR'];
$api = $func->clearStr($_POST['api']);

// include_controller
$file = 'ctrl/api/'.$api.'.ctrl.php';
if (!file_exists($file)) die($func->status('err','Ошибка, обновите страницу'));
include $file;
