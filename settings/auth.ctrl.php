<?php
// check_post
if (!isset($_POST['login']) || empty($_POST['login'])) die($func->status('err','Укажите логин'));
if (!isset($_POST['password']) || empty($_POST['password'])) die($func->status('err','Укажите пароль'));
if (!isset($_POST['confirm']) || empty($_POST['confirm'])) die($func->status('err','Укажите повторение пароля'));

// vars
$login = $func->clearStr($_POST['login']);
$password = $func->clearStr($_POST['password']);
$confirm = $func->clearStr($_POST['confirm']);

// check_password
if ($password != $confirm) die($func->status('err','Пароли не совпадают'));

// process
$db->Query("UPDATE PREFadmin SET login = '{$login}',password = '{$password}' WHERE id = '1'");

// return
echo $func->status('success','Сохранено');
