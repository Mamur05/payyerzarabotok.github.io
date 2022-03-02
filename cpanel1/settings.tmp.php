<?php
$_OPT['title'] = 'Настройки';
?>
<div class="container">
	<div class="row">
		<div class="col s12 l6 m12">
			<h4 class="text-100">Настройки авторизации</h4>
			<form>
				<div class="input-field">
					<i class="fa fa-user prefix"></i>
					<input type="text" name="login" id="login" value="<?=$data['admin']['login'];?>">
					<label for="login">Логин</label>
				</div>
				<div class="input-field">
					<i class="fa fa-key prefix"></i>
					<input type="password" name="password" id="password">
					<label for="password">Пароль</label>
				</div>
				<div class="input-field">
					<i class="fa fa-key prefix"></i>
					<input type="password" name="confirm" id="confirm">
					<label for="confirm">Подтверждение пароля</label>
				</div>
				<input type="hidden" name="api" value="admin">
				<input type="hidden" name="admin" value="settings">
				<input type="hidden" name="settings" value="auth">
				<button class="btn green lighten-1 waves-effect waves-light">Сохранить</button>
			</form>
			<br>
			<h4 class="text-100">Настройки Payeer</h4>
			<form>
				<div class="input-field">
					<i class="material-icons prefix">account_circle</i>
					<input id="account_number" type="text" name="account_number" value="<?=$data['pconf']['account_number'];?>" class="validate">
					<label for="account_number">Номер кошелька (P1234567)</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">widgets</i>
					<input id="api_id" type="text" name="api_id" value="<?=$data['pconf']['api_id'];?>" class="validate">
					<label for="api_id">API ID</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">build</i>
					<input id="api_key" type="text" name="api_key" value="<?=$data['pconf']['api_key'];?>" class="validate">
					<label for="api_key">API Ключ</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">info</i>
					<input id="shop_id" type="text" name="shop_id" value="<?=$data['pconf']['shop_id'];?>" class="validate">
					<label for="shop_id">ID магазина</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">build</i>
					<input id="shop_key" type="text" name="shop_key" value="<?=$data['pconf']['shop_key'];?>" class="validate">
					<label for="shop_key">Секретны ключ магазина</label>
				</div>
				<input type="hidden" name="api" value="admin">
				<input type="hidden" name="admin" value="settings">
				<input type="hidden" name="settings" value="payeer">
				<button class="btn green lighten-1 waves-effect waves-light">Сохранить</button>
			</form>
			<br>
			<h4 class="text-100">Настройка продажи баннеров</h4>
			<form>
				<div class="input-field">
					<i class="fa fa-usd prefix"></i>
					<input type="text" name="buy_banner_price" id="buy_banner_price" value="<?=$data['conf']['buy_banner_price'];?>">
					<label for="buy_banner_price">Цена баннера</label>
				</div>
				<div class="input-field">
					<i class="fa fa-envelope-o prefix"></i>
					<textarea name="buy_banner_emails" class="materialize-textarea"><?=$data['conf']['buy_banner_emails'];?></textarea>
					<label for="buy_banner_emails">Почтовые адреса (по одному в строке)</label>
				</div>
				<input type="hidden" name="api" value="admin">
				<input type="hidden" name="admin" value="settings">
				<input type="hidden" name="settings" value="buy_banner">
				<button class="btn green lighten-1 waves-effect waves-light">Сохранить</button>
			</form>
		</div>
		<div class="col s12 l6 m12">
			<h4 class="text-100">Настройки сайта</h4>
			<form>
				<div class="input-field">
					<i class="fa fa-rub prefix"></i>
					<input id="min_pay" type="text" name="min_pay" value="<?=$data['conf']['min_pay'];?>" class="validate">
					<label for="min_pay">Минимальная выплата</label>
				</div>
				<div class="input-field">
					<i class="fa fa-rub prefix"></i>
					<input id="bonus_money" type="text" name="bonus_money" value="<?=$data['conf']['bonus_money'];?>" class="validate">
					<label for="bonus_money">Сумма бонуса</label>
				</div>
				<div class="input-field">
					<i class="fa fa-credit-card prefix"></i>
					<select name="pay_type" id="pay_type">
						<option value="0" disabled>Выберите активность выплат</option>
						<option value="1" <?=($data['conf']['pay_type'] == '1') ? 'selected' : '';?>>Включены</option>
						<option value="2" <?=($data['conf']['pay_type'] == '2') ? 'selected' : '';?>>Выключены</option>
					</select>
					<label for="pay_type">Активность выплат</label>
				</div>
				<div class="input-field">
					<i class="fa fa-google prefix"></i>
					<input id="recaptcha_sitekey" type="text" name="recaptcha_sitekey" value="<?=$data['conf']['recaptcha_sitekey'];?>" class="validate">
					<label for="recaptcha_sitekey">RECAPTCHA SITEKEY</label>
				</div>
				<div class="input-field">
					<i class="fa fa-google prefix"></i>
					<input id="recaptcha_secret" type="text" name="recaptcha_secret" value="<?=$data['conf']['recaptcha_secret'];?>" class="validate">
					<label for="recaptcha_secret">RECAPTCHA SECRET</label>
				</div>
				<input type="hidden" name="api" value="admin">
				<input type="hidden" name="admin" value="settings">
				<input type="hidden" name="settings" value="main">
				<button class="btn green lighten-1 waves-effect waves-light">Сохранить</button>
			</form>
			<br>
			<h4 class="text-100">Настройки рейтинга</h4>
			<form>
				<div class="input-field">
					<i class="fa fa-usd prefix"></i>
					<input type="text" name="add_rating_price" id="add_rating_price" value="<?=$data['conf']['add_rating_price'];?>">
					<label for="add_rating_price">Цена добавления</label>
				</div>
				<div class="input-field">
					<i class="fa fa-usd prefix"></i>
					<input type="text" name="up_rating_price" id="up_rating_price" value="<?=$data['conf']['up_rating_price'];?>">
					<label for="up_rating_price">Цена подъема</label>
				</div>
				<div class="input-field">
					<i class="fa fa-credit-card prefix"></i>
					<select name="add_button" id="add_button">
						<option value="0" disabled>Выберите активность добавления</option>
						<option value="1" <?=($data['conf']['add_button'] == '1') ? 'selected' : '';?>>Активна</option>
						<option value="2" <?=($data['conf']['add_button'] == '2') ? 'selected' : '';?>>Не Активна</option>
					</select>
					<label for="add_button">Активность добавления</label>
				</div>
				<input type="hidden" name="api" value="admin">
				<input type="hidden" name="admin" value="settings">
				<input type="hidden" name="settings" value="rating">
				<button class="btn green lighten-1 waves-effect waves-light">Сохранить</button>
			</form>
		</div>
	</div>
</div>
