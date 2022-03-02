<?php
$_OPT['title'] = 'Статистика';
?>
<br>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="white z-depth-1 bdrs-3">
				<div style="padding: 15px 30px;">
					<h4 class="text-100 grey-text text-darken-2">Статистика</h4>
					<br>
					<div class="row">
						<div class="col s12 m12 l4">
							<div class="grey lighten-4 bdrs-4 z-depth-1">
								<br>
								<h5 class="center-align grey-text text-darken-2 text-100">Всего выплачено</h5>
								<h4 class="center-align grey-text text-darken-2 text-100">
									<?=number_format($data['payment_all'],2,'.',' ');?>
									<i class="fa fa-rub"></i>
								</h4>
								<br>
							</div>
							<div class="hide-on-large-only">
								<br>
							</div>
						</div>
						<div class="col s12 m12 l4">
							<div class="grey lighten-4 bdrs-4 z-depth-1">
								<br>
								<h5 class="center-align grey-text text-darken-2 text-100">Выплачено сегодня</h5>
								<h4 class="center-align grey-text text-darken-2 text-100">
									<?=number_format($data['payment_day'],2,'.',' ');?>
									<i class="fa fa-rub"></i>
								</h4>
								<br>
							</div>
							<div class="hide-on-large-only">
								<br>
							</div>
						</div>
						<div class="col s12 m12 l4">
							<div class="grey lighten-4 bdrs-4 z-depth-1">
								<br>
								<h5 class="center-align grey-text text-darken-2 text-100">Пользователей</h5>
								<h4 class="center-align grey-text text-darken-2 text-100">
									<?=$data['users'];?>
									<i class="fa fa-users"></i>
								</h4>
								<br>
							</div>
							<div class="hide-on-large-only">
								<br>
							</div>
						</div>
					</div>
					<h4 class="text-100 grey-text text-darken-2">Выплаты</h4>
					<br>
					<table class="bordered highlight stripped centered">
						<thead>
							<tr>
								<th class="text-100">ID</th>
								<th class="text-100">Пользователь</th>
								<th class="text-100">Сумма</th>
								<th class="text-100">Дата выплаты</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($data['payments']) > 0): ?>
								<?php foreach ($data['payments'] as $payment): ?>
									<tr>
										<td>
											<i class="fa fa-hashtag"></i>
											<?=$payment['id'];?>
										</td>
										<td>
											<i class="fa fa-credit-card"></i>
											<?=substr($payment['payeer_purse'],0,-3);?>
											<font class="red-text darken-1">
												&bull;
												&bull;
												&bull;
											</font>
										</td>
										<td>
											<?=$payment['money'];?>
											<i class="fa fa-rub"></i>
										</td>
										<td>
											<i class="fa fa-clock-o"></i>
											<?=date('H:i - d.m',$payment['date_add']);?>
										</td>
									</tr>
								<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="4">Нет выплат</td>
									</tr>
							<?php endif; ?>
						</tbody>
					</table>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
