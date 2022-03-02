<?php
$_OPT['title'] = 'Пополнения';
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
						<th>Дата пополнения</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (count($data['inserts']) > 0) {
						foreach ($data['inserts'] as $insert) {
							?>
							<tr>
								<td>
									<i class="fa fa-hashtag"></i>
									<?=$insert['id'];?>
								</td>
								<td>
									<a href="/cpanel/user/<?=$insert['user_id'];?>" class="chip teal-text">
										<i class="fa fa-credit-card"></i>
										<?=$insert['payeer_purse'];?>
									</a>
								</td>
								<td>
									<?=sprintf('%.2f',$insert['money']);?>
									<i class="fa fa-rub"></i>
								</td>
								<td>
									<i class="fa fa-clock-o"></i>
									<?=date('d.m.Y - H:i',$insert['date_add']);?>
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
