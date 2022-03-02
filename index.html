<?php
// Автоподгрузка классов
function __autoload($class)
{
	include 'class/'.$class.'.class.php';
}
// Старт сессии
session_start();

// Подключение
$db = new db();
$func = new functions($db);
$gen = new gen($db);

// Router__vars
$path = parse_url($_SERVER['REQUEST_URI']);
$url = explode('/', $path['path']);

// Router__include
if(isset($url[1]) && !empty($url[1])){
	if(!array_key_exists($url[1], array('404'=>true,'index'=>true))){
		$controller = $func->clearStr($url[1]);
		$ctrl = 'ctrl/'.$controller.'.ctrl.php';
		if(file_exists($ctrl)){
				include $ctrl;
		}else include 'ctrl/404.ctrl.php';
	}else include 'ctrl/404.ctrl.php';
}else include 'ctrl/index.ctrl.php';
