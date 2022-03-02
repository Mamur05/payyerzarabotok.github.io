<?php
// check_post
if (!isset($_POST['login']) || empty($_POST['login'])) die($func->status('err','Укажите логин'));
if (!isset($_POST['password']) || empty($_POST['password'])) die($func->status('err','Укажите пароль'));

// vars
$login = $func->clearStr($_POST['login']);
$password = $func->clearStr($_POST['password']);

// get_admin_data
$db->Query("SELECT * FROM PREFadmin WHERE id = '1'");
$admin_data = $db->FetchArray();

// process
if ($login != $admin_data['login']) die($func->status('err','Логин или пароль введены неправильно'));
if ($password != $admin_data['password']) die($func->status('err','Логин или пароль введены неправильно'));

// update_admin
$db->Query("UPDATE PREFadmin SET last_ip = '{$ip}' WHERE id = '1'");

// set_session
$_SESSION['admin'] = true;

// return
echo $func->status('success','');
