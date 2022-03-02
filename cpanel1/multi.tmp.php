<?php
$_OPT['title'] = 'Мультиаккаунты';
?>
<div class="container">
	<div class="row">
		<div class="col s12 l12 m12">
			<table class="bordered centered highlight">
				<thead>
					<tr>
						<th>ID</th>
						<th>Кошелек</th>
						<th>Дата регистрации</th>
						<th>IP</th>
						<th>БАН</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (count($data['users']) > 0) {
						foreach ($data['users'] as $user) {
							?>
							<tr>
								<td>
									<i class="fa fa-hashtag"></i>
									<?=$user['id'];?>
								</td>
								<td>
									<a href="/cpanel/user/<?=$user['id'];?>" class="chip green-text">
										<i class="fa fa-credit-card"></i>
										<?=$user['payeer_purse'];?>
									</a>
								</td>
								<td>
									<i class="fa fa-clock-o"></i>
									<?=date('d.m.Y - H:i',$user['date_reg']);?>
								</td>
								<td>
									<span class="chip orange lighten-3 white-text">
										<?=$user['last_ip'];?>
									</span>
								</td>
								<td>
									<button data-ban="<?=$user['id'];?>"
											onclick="app.ban(<?=$user['id'];?>);"
											class="btn green lighten-1 waves-effect waves-light">
										<?=($user['ban'] == '1') ? 'Забанить' : 'Разбанить';?>
									</button>
								</td>
							</tr>
							<?php
						}
					}else echo '<tr><td colspan="5">Нет пользователей</td></tr>';
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
