<?php
$_OPT['title'] = 'Редактирование';
$rating = json_decode($data['rating_json']);
?>
<script>
	setTimeout(function () {
		setInterval(function () {
			var des = parseFloat($('input[name=rate_design]').val()),
				conv = parseFloat($('input[name=rate_convenience]').val()),
				speed = parseFloat($('input[name=rate_speed]').val()),
				profit = parseFloat($('input[name=rate_profit]').val()),
				ads = parseFloat($('input[name=rate_ads]').val()),
				allRate = (des+conv+speed+profit+ads).toFixed(2);
			$('#allRate').text(allRate);
		},500)
	},2000);
</script>
<div class="container">
	<div class="row">
		<div class="col s12 l8 offset-l2">
			<h4 class="text-100">Редактирование сайта в рейтинге</h4>
			<form>
				<h5 class="text-100">
					Основная информация
				</h5>
				<div class="input-field input-large">
					<i class="fa fa-image prefix"></i>
					<input type="text" id="banner_link" name="banner_link" class="validate" value="<?=$data['banner_link'];?>">
					<label for="banner_link">Ссылка на баннер</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-link prefix"></i>
					<input type="text" id="link" name="link" class="validate" value="<?=$data['link'];?>">
					<label for="link">Ссылка на сайт</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-money prefix"></i>
					<input type="text" id="bonus" name="bonus" class="validate" value="<?=$data['bonus'];?>">
					<label for="bonus">Сумма бонуса</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-clock-o prefix"></i>
					<input type="text" id="period" name="period" class="validate" value="<?=$data['period'];?>">
					<label for="period">Период</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-money prefix"></i>
					<input type="text" id="min_pay" name="min_pay" class="validate" value="<?=$data['min_pay'];?>">
					<label for="min_pay">Минимальная выплата</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-credit-card prefix"></i>
					<select name="curr" id="curr">
						<option value="0" disabled selected>Выберите валюту</option>
						<option <?=($data['curr'] == 'rub') ? 'selected' : '';?> value="rub">Рубли</option>
						<option <?=($data['curr'] == 'usd') ? 'selected' : '';?> value="usd">Доллары</option>
						<option <?=($data['curr'] == 'euro') ? 'selected' : '';?> value="euro">Евро</option>
						<option <?=($data['curr'] == 'btc') ? 'selected' : '';?> value="btc">Биткоины</option>
					</select>
					<label for="curr">Валюта</label>
				</div>
				<h5 class="text-100">
					Оценка (0.00 - 1.00)
					<b class="green-text text-lighten-1">
						<i class="fa fa-star"></i>
						<span id="allRate">0.00</span>
					</b>
				</h5>
				<div class="input-field input-large">
					<i class="fa fa-desktop prefix"></i>
					<input type="text" id="rate_design" name="rate_design" class="validate" value="<?=$rating->design;?>">
					<label for="rate_design">Дизайн</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-magic prefix"></i>
					<input type="text" id="rate_convenience" name="rate_convenience" class="validate" value="<?=$rating->convenience;?>">
					<label for="rate_convenience">Удобство</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-rocket prefix"></i>
					<input type="text" id="rate_speed" name="rate_speed" class="validate" value="<?=$rating->speed;?>">
					<label for="rate_speed">Скорость</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-money prefix"></i>
					<input type="text" id="rate_profit" name="rate_profit" class="validate" value="<?=$rating->profit;?>">
					<label for="rate_profit">Прибыльность</label>
				</div>
				<div class="input-field input-large">
					<i class="fa fa-user-circle prefix"></i>
					<input type="text" id="rate_ads" name="rate_ads" class="validate" value="<?=$rating->ads;?>">
					<label for="rate_ads">Качество рекламы</label>
				</div>
				<input type="hidden" name="api" value="admin">
				<input type="hidden" name="admin" value="rating">
				<input type="hidden" name="rating" value="edit">
				<input type="hidden" name="id" value="<?=$data['id'];?>">
				<button class="btn green lighten-1 waves-effect waves-light">Сохранить</button>
			</form>
		</div>
	</div>
</div>
