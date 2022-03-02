<?php
$_OPT['title'] = 'Статистика';
?>
<div class="container">
	<div class="row">
		<div class="col l6 s12">
			<div class="card">
				<div class="card green darken-1">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Пользователей</b>
						</div>
						<h4 class="card-number center-align">
							<?=$data['users']?>
							<i class="fa fa-user"></i>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green darken-1">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Онлайн</b>
						</div>
						<h4 class="card-number center-align">
							<?=$data['online_users'];?>
							<i class="fa fa-user-circle-o"></i>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green lighten-1">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Выплат на сумму</b>
						</div>
						<h4 class="card-number center-align">
							<?=sprintf('%.2f',$data['payment_all']);?>
							<i class="fa fa-rub"></i>
						</h4>
					</div>
				</div>
			</div>
		</div>
		<div class="col l6 s12">
			<div class="card">
				<div class="card green lighten-1">
					<div class="card-content white-text">
						<div class="card-title center-align">
							<b>Выплачено за 24 часа</b>
						</div>
						<h4 class="card-number center-align">
							<?=sprintf('%.2f',$data['payment_24']);?>
							<i class="fa fa-rub"></i>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
