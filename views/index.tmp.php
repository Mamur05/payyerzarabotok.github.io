<?php
$_OPT['title'] = 'Получай PAYEER бонус каждую минуту!';
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	$_OPT['scripts'] = '<script src="/views/default/js/acc.js"></script>';
}
?>
<br>
<div class="container">
	<div class="row">
		<div class="col s12 l12">
			<div class="white z-depth-1 bdrs-3">
				<div class="row">
					<div class="col s12 l6">
						<div class="banner b468" id="banner1">
							<?=$data['banners']['1'];?>
						</div>
						<div class="banner b468" id="banner2">
							<?=$data['banners']['2'];?>
						</div>
					</div>
					<div class="col s12 l6">
						<div class="banner b468" id="banner3">
							<?=$data['banners']['3'];?>
						</div>
						<div class="banner b468" id="banner4">
							<?=$data['banners']['4'];?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: -20px;">
		<div class="col s12 l3">
			<div class="white z-depth-1 bdrs-3">
				<div class="banner b240" id="banner11">
					<?=$data['banners']['11'];?>
				</div>
			</div>
		</div>
		<div class="col s12 l6">
			<div class="hide-on-large-only">
				<br>
			</div>
			<div class="white z-depth-1 bdrs-3">
				<br>
				<h5 class="grey-text text-darken-3 center-align text-400">
					Получай бонус
					<font class="yellow-text text-darken-4">
						<b>
							каждую минуту
						</b>
					</font>
				</h5>
				<h5 class="grey-text text-darken-3 center-align text-400">
					Моментальная выплата на
					<a href="https://payeer.com/" target="_blank">
						<b>
							<font color="#1e363f">PAY</font><font color="#0099de">EER</font>
						</b>
					</a>
				</h5>
				<?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])): ?>
					<p class="center-align grey-text text-darken-1">
						Если у вас нет аккаунта он создасться автоматически
					</p>
					<form>
						<div class="auth-input">
							<input type="text" name="payeer_purse" placeholder="введите payeer кошелек">
							<button class="btn green-btn waves-effect">Войти</button>
						</div>
						<input type="hidden" name="api" value="auth">
					</form>
					<p class="center-align grey-text darken-1" style="margin-top: -10px; margin-bottom: 0px;">
						Нет Payeer кошелька?
						<a href="https://payeer.com/02489299" target="_blank">Создать</a>
					</p>
				<?php endif; ?>
				<?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
					<span class="center-align">
						<h4 class="green-text text-accent-4 text-100">
							Баланс:
							<?=number_format($data['balance'],2,'.',' ');?>
							<i class="fa fa-rub"></i>
						</h4>
						<h5 class="grey-text text-darken-4 text-100">
							Ваш
							<font color="#1e363f">PAY</font><font color="#0099de">EER</font>
							кошелек:
							<font color="#0099de">P</font><?=str_replace('P','',$data['payeer_purse']);?>
						</h5>
					</span>
					<div class="center-align">
						<?php if ($data['last_bonus_time'] + 60 < time()): ?>
							<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"></script>
							<script>
								var recBtn;
								function recaptchaCall(token) {
									$('#bonusForm').trigger('submit');
								}
								var onloadCallback = function() {
									recBtn = grecaptcha.render('recBtn', {
										'sitekey' : '<?=$data['sitekey'];?>',
										'callback' : recaptchaCall
									});
								};
								var resetCaptcha = function () {
									grecaptcha.reset(recBtn);
								}
							</script>
							<form style="display: inline;" id="bonusForm">
								<button class="btn green-btn waves-effect" id="recBtn">
									<i class="fa fa-plus left"></i>
									Получить бонус
								</button>
								<input type="hidden" name="api" value="account">
								<input type="hidden" name="account" value="start_bonus">
							</form>
							<?php else: ?>
								<button class="btn green-btn" disabled>
									<i class="fa fa-refresh fa-spin left"></i>
									<span class="timer">
										<?php
										if (($data['last_bonus_time'] + 60) > time()) {
											echo date('i:s',mktime(0,0,($data['last_bonus_time'] + 60) - time()));
										}else echo '00:00';
										?>
									</span>
								</button>
						<?php endif; ?>
						<?php if ($data['balance'] >= $data['conf']['min_pay']): ?>
							<button class="btn blue darken-2 waves-effect" onclick="acc.payment();">
								<i class="fa fa-arrow-down left"></i>
								Вывести
							</button>
							<?php else: ?>
								<button class="btn grey lighten-1 tooltipped"
										style="cursor: default;"
										data-delay="10"
										data-position="top"
										data-html="true"
										data-tooltip="Вывод доступен только от <?=$data['conf']['min_pay'];?> <i class='fa fa-rub'></i>">
									<i class="fa fa-arrow-down left"></i>
									Вывести
								</button>
						<?php endif; ?>
						<div style="margin-top: 10px;">
							<a href="/referals" class="btn yellow darken-4 waves-effect">
								<i class="fa fa-users left"></i>
								Партнерская программа
							</a>
						</div>
					</div>
				<?php endif; ?>
				<div class="banner b468" id="banner5">
					<?=$data['banners']['5'];?>
				</div>
				<div class="banner b468" id="banner6">
					<?=$data['banners']['6'];?>
				</div>
			</div>
			<div class="hide-on-large-only">
				<br>
			</div>
		</div>
		<div class="col s12 l3">
			<div class="white z-depth-1 bdrs-3">
				<div class="banner b240" id="banner12">
					<?=$data['banners']['12'];?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="white z-depth-1 bdrs-3">
				<div class="row">
					<div class="col s12 l6">
						<div class="banner b468" id="banner7">
							<?=$data['banners']['7'];?>
						</div>
						<div class="banner b468" id="banner8">
							<?=$data['banners']['8'];?>
						</div>
					</div>
					<div class="col s12 l6">
						<div class="banner b468" id="banner9">
							<?=$data['banners']['9'];?>
						</div>
						<div class="banner b468" id="banner10">
							<?=$data['banners']['10'];?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br/>