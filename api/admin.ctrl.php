<?php
// check_post
if (!isset($_POST['admin']) || empty($_POST['admin'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$admin = $func->clearStr($_POST['admin']);
$file = 'ctrl/api/admin/'.$admin.'.ctrl.php';

// check_session
if (!isset($_SESSION['admin'])) die($func->status('err','Нет доступа, авторизуйтесь на сайте'));

// check_file
if (!file_exists($file)) die($func->status('err','Ошибка контроллера, обновите страницу'));

// include
include $file;
