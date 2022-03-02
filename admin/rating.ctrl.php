<?php
// check_post
if (!isset($_POST['rating']) || empty($_POST['rating'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$rating = $func->clearStr($_POST['rating']);
$file = 'ctrl/api/admin/rating/'.$rating.'.ctrl.php';

// check_file
if (!file_exists($file)) die($func->status('err','Ошибка контроллера, обновите страницу'));

// include
include $file;
