<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{!TITLE!}</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="/views/cpanel/css/materialize.css">
	<link rel="stylesheet" href="/views/cpanel/css/font-awesome.min.css">
	<link rel="stylesheet" href="/views/cpanel/css/style.css">
</head>
<body>
	<header>
		<ul id="nav-mobile" class="side-nav fixed collapsible collapsible-accordion admin-menu">
			<li class="bold">
				<a href="/cpanel" class="waves-effect dark">
					<i class="material-icons left">show_chart</i>
					Статистика
				</a>
			</li>
			<li class="bold">
				<a href="/cpanel/users" class="waves-effect dark">
					<i class="material-icons left">account_circle</i>
					Пользователи
				</a>
			</li>
			<li class="bold">
				<a href="/cpanel/multi" class="waves-effect dark">
					<i class="material-icons left">supervisor_account</i>
					Мультиаккаунты
				</a>
			</li>
			<li class="bold">
				<a href="/cpanel/payments" class="waves-effect dark">
					<i class="material-icons left">keyboard_arrow_right</i>
					Выплаты
				</a>
			</li>
			<li class="bold">
				<a href="/cpanel/banners" class="waves-effect dark">
					<i class="material-icons">image</i>
					Баннеры
				</a>
			</li>
			<li class="bold">
				<a href="/cpanel/rating" class="waves-effect dark">
					<i class="material-icons">star</i>
					Рейтинг бонусов
				</a>
			</li>
			<li><div class="divider"></div></li>
			<li class="bold">
				<a href="/cpanel/settings" class="waves-effect dark">
					<i class="material-icons">settings</i>
					Настройки
				</a>
			</li>
			<li class="bold">
				<a href="/logout" class="waves-effect dark">
					<i class="material-icons">exit_to_app</i>
					Выход
				</a>
			</li>
		</ul>
		<div class="navbar-fixed">
			<nav class="green lighten-1">
				<a class="brand-logo text-100">{!TITLE!}</a>
				<div class="nav-wrapper container admin">
					<a href="#" data-activates="nav-mobile" class="button-collapse">
						<i class="material-icons">menu</i>
					</a>
					<?php if ($data['search']): ?>
						<form act="1">
							<div class="input-field hide-on-med-and-down">
								<input id="search" type="search" value="<?=$_GET[$data['search']];?>" name="<?=$data['search'];?>">
								<label class="label-icon" for="search">
									<i class="material-icons">search</i>
								</label>
								<i class="material-icons">close</i>
							</div>
						</form>
					<?php endif; ?>
				</div>
			</nav>
		</div>
	</header>
	<main class="admin">
		<br>
		<br>
