<?php
$_OPT['title'] = 'Выплаты';
?>
<div class="container">
	<div class="row">
		<div class="col s12 l12 m12">
			<table class="bordered centered highlight">
				<thead>
					<tr>
						<th>ID</th>
						<th>Пользователь</th>
						<th>Сумма</th>
						<th>Дата выплаты</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (count($data['payments']) > 0) {
						foreach ($data['payments'] as $payment) {
							?>
							<tr>
								<td>
									<i class="fa fa-hashtag"></i>
									<?=$payment['id'];?>
								</td>
								<td>
									<a href="/cpanel/user/<?=$payment['user_id'];?>" class="chip green-text">
										<i class="fa fa-credit-card"></i>
										<?=$payment['payeer_purse'];?>
									</a>
								</td>
								<td>
									<?=sprintf('%.2f',$payment['money']);?>
									<i class="fa fa-rub"></i>
								</td>
								<td>
									<i class="fa fa-clock-o"></i>
									<?=date('d.m.Y - H:i',$payment['date_add']);?>
								</td>
							</tr>
							<?php
						}
					}else echo '<tr><td colspan="4">Нет пополнений</td></tr>';
					?>
				</tbody>
			</table>
		</div>
		<?php if ($data['pag'] != '0'): ?>
			<div class="col s12">
				<ul class="pagination center">
					<?=$data['pag'];?>
				</ul>
			</div>
		<?php endif; ?>
	</div>
</div>
