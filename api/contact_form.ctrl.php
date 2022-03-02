<?php
// check_post
if (!isset($_POST['email']) || empty($_POST['email'])) die($func->status('err','Укажите Email'));
if (!isset($_POST['message']) || empty($_POST['message'])) die($func->status('err','Укажите сообщение'));

// vars
$email = $func->clearStr($_POST['email']);
$message = $func->clearStr($_POST['message']);

// check_message
if (strlen($message) < 10) die($func->status('err','Минимальная длинна сообщения 10 символов'));
if (strlen($message) > 250) die($func->status('err','Максимальная длинна сообщения 250 символов'));

// check_session
if (isset($_SESSION['contact_form']) && ($_SESSION['contact_form'] + 300) > time()) die($func->status('err','Вы недавно писали в поддержку'));

// get_conf
$db->Query("SELECT * FROM PREFconfigs WHERE id = '1'");
$conf = $db->FetchArray();

// send_message
$mail = new mail();
$mail->BackContact($email,$message,$conf['contact_email']);

// set_session
$_SESSION['contact_form'] = time();

// return
echo $func->status('success','Сообщение отправлено');
