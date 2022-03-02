<?php
// check_post
if (!isset($_POST['id']) || empty($_POST['id'])) die($func->status('err','Ошибка, обновите страницу'));

// vars
$id = $func->clearInt($_POST['id']);

// check_rating
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

// update_base
$db->Query("UPDATE PREFrating SET rating = '{$rating}', rating_json = '{$rate_var}',status = '2',date_last_up = '{$time}' WHERE id = '{$id}'");

// return
echo $func->status('success','Рейтинг обновлен, сайт добавлен');
