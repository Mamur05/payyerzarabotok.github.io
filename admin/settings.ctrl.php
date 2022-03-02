<?php
// check_post
if (!isset($_POST['settings']) || empty($_POST['settings'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$settings = $func->clearStr($_POST['settings']);
$file = 'ctrl/api/admin/settings/'.$settings.'.ctrl.php';

// check_file
if (!file_exists($file)) die($func->status('err','Ошибка контроллера, обновите страницу'));

// include
include $file;
