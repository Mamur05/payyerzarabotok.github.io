<?php
// check_post
if (!isset($_POST['add_rating_price']) || empty($_POST['add_rating_price'])) die($func->status('err','Укажите цену добавления'));
if (!isset($_POST['up_rating_price']) || empty($_POST['up_rating_price'])) die($func->status('err','Укажите цену подъема'));
if (!isset($_POST['add_button']) || empty($_POST['add_button'])) die($func->status('err','Выберите активность кнопки добавления'));


// vars
$add_rating_price = $func->clearFloat($_POST['add_rating_price']);
$up_rating_price = $func->clearFloat($_POST['up_rating_price']);
$add_button = $func->clearInt($_POST['add_button']);

// process
$db->Query("UPDATE PREFconfigs
			SET add_rating_price = '{$add_rating_price}',
				up_rating_price = '{$up_rating_price}',
				add_button = '{$add_button}'
				WHERE id = '1'");

// return
echo $func->status('success','Сохранено');
