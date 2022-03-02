<?php
// check_post
if (!isset($_POST['banner_link']) || empty($_POST['banner_link'])) die($func->status('err','Укажите ссылку на баннер'));
if (!isset($_POST['link']) || empty($_POST['link'])) die($func->status('err','Укажите ссылку на сайт'));
if (!isset($_POST['bonus']) || empty($_POST['bonus'])) die($func->status('err','Укажите сумму бонуса'));
if (!isset($_POST['period']) || empty($_POST['period'])) die($func->status('err','Укажите период'));
if (!isset($_POST['curr']) || empty($_POST['curr'])) die($func->status('err','Выберите валюту'));
if (!isset($_POST['min_pay']) || empty($_POST['min_pay'])) die($func->status('err','Укажите минимальную выплату'));
if (!isset($_POST['id']) || empty($_POST['id'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$banner_link = $func->clearStr($_POST['banner_link']);
$link = $func->clearStr($_POST['link']);
$bonus = $func->clearFloat($_POST['bonus']);
$curr = $func->clearStr($_POST['curr']);
$period = $func->clearStr($_POST['period']);
$min_pay = $func->clearFloat($_POST['min_pay']);
$id = $func->clearInt($_POST['id']);

// check_curr
$curr_arr = array('rub','usd','euro','btc');
if (!in_array($curr,$curr_arr)) die($func->status('err','Ошибка валюты, обвноите страницу'));

// check_database
$db->Query("SELECT * FROM PREFrating WHERE id = '{$id}'");
if ($db->NumRows() <= 0) die($func->status('err','Сайт не найден, обновите страницу'));

// check_rate
$rate_arr = array(
	'design'		=>'дизайн',
	'convenience'	=>'удобство',
	'speed'			=>'скорость работы',
	'profit'		=>'прибыльность',
	'ads'			=>'качество рекламы'
);
$rate_var = array();
foreach ($rate_arr as $rate_type => $ru_type) {
	if (!isset($_POST['rate_'.$rate_type]) || empty($_POST['rate_'.$rate_type])) die($func->status('err','Оцените '.$ru_type));
	if ($_POST['rate_'.$rate_type] < 0.01) die($func->status('err','Минимальная оценка ('.$ru_type.') 0.01'));
	if ($_POST['rate_'.$rate_type] > 1) die($func->status('err','Максимальная оценка ('.$ru_type.') 1.00'));
	$var_name = 'rate_'.$rate_type;
	$$var_name = sprintf('%.2f',$func->clearFloat($_POST['rate_'.$rate_type]));
	// rate_var
	$rate_var[$rate_type] = sprintf('%.2f',$func->clearFloat($_POST['rate_'.$rate_type]));
}
$rate_var = json_encode($rate_var);
$rating = sprintf('%.2f',$rate_speed+$rate_design+$rate_convenience+$rate_profit+$rate_ads);

$db->Query("UPDATE PREFrating
			SET
				banner_link = '{$banner_link}',
				link 		= '{$link}',
				period 		= '{$period}',
				bonus 		= '{$bonus}',
				min_pay 	= '{$min_pay}',
				rating 		= '{$rating}',
				curr 		= '{$curr}',
				rating_json = '{$rate_var}'
			WHERE id = '{$id}'");

// return
echo $func->status('success','Сохранено');
