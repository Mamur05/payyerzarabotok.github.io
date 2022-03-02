<?php
$_OPT['title'] = 'Пользователь: '.$data['user']['payeer_purse'];
?>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="right">
				<button class="btn green lighten-1 waves-effect waves-light"
						data-ban="<?=$data['user']['id'];?>"
						onclick="app.ban(<?=$data['user']['id'];?>);">
					<?=($data['user']['ban'] == '1') ? 'Забанить' : 'Разбанить';?>
				</button>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Payeer кошелек</b>
						</div>
						<h4 class="card-number center-align">
							<i class="fa fa-credit-card"></i>
							<?=$data['user']['payeer_purse'];?>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Баланс</b>
						</div>
						<h4 class="card-number center-align">
							<?=sprintf('%.2f',$data['user']['balance']);?>
							<i class="fa fa-rub"></i>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Реферер</b>
						</div>
						<h4 class="card-number center-align">
							<?php
								if ($data['referer'] != '0') {
									?>
									<a class="white-text" href="/cpanel/user/<?=$data['referer']['id'];?>">
										<i class="fa fa-credit-card"></i>
										<?=$data['referer']['payeer_purse'];?>
									</a>
									<?php
								}else echo 'Без реферера';
							?>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Рефералов</b>
						</div>
						<h4 class="card-number center-align">
							<?=$data['count_refs'];?>
							<i class="fa fa-users"></i>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Дата регистрации</b>
						</div>
						<h4 class="card-number center-align">
							<i class="fa fa-calendar"></i>
							<?=date('H:i:s - d.m.Y',$data['user']['date_reg']);?>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Получено бонусов</b>
						</div>
						<h4 class="card-number center-align">
							<?=$data['user']['count_bonuses'];?>
							<i class="fa fa-cubes"></i>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l12 s12 m12">
			<h4 class="text-100 grey-text text-darken-2">Выплаты пользователя</h4>
			<table class="centered bordered highlight">
				<thead>
					<tr>
						<th>ID</th>
						<th>Дата выплаты</th>
						<th>Сумма</th>
						<th>Статус</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($data['payments']) > 0): ?>
						<?php foreach ($data['payments'] as $payment): ?>
							<?php $status = array('1'=>'В Ожидании','2'=>'Выплачено','3'=>'Отказано') ?>
							<tr>
								<td>
									<i class="fa fa-hashtag"></i>
									<?=$payment['id'];?>
								</td>
								<td>
									<?=sprintf('%.2f',$payment['money']);?>
									<i class="fa fa-rub"></i>
								</td>
								<td>
									<i class="fa fa-clock-o"></i>
									<?=date('d.m.Y - H:i',$payment['date_add']);?>
								</td>
								<td>
									<?=$status[$payment['status']];?>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php else: echo '<tr><td colspan="4">Нет выплат</td></tr>';?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
