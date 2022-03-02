<?php
$_OPT['title'] = 'Рейтинг бонусов';
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
<!-- #deleteRatingModal -->
<div id="deleteRatingModal" class="modal auth-modal">
	<div class="modal-content">
		<h4 class="center=align text-100">Удаление сайта с рейтинга</h4>
		<h5 class="center-align text-100 red-text text-lighten-1">
			Вы уверены?
			<br>
			Сайт нельзя будет восстановить!
		</h5>
		<div class="center-align">
			<a href="" id="delteLink" class="btn red lighten-1 waves-effect">Удалить</a>
		</div>
	</div>
</div>
<!-- #addRatingModal -->
<div id="addRatingModal" class="modal auth-modal">
	<div class="modal-content">
		<h4 class="text-100">Добавление сайта в рейтинг</h4>
		<form>
			<h5 class="text-100">
				Основная информация
			</h5>
			<div class="input-field input-large">
				<i class="fa fa-image prefix"></i>
				<input type="text" id="banner_link" name="banner_link" class="validate">
				<label for="banner_link">Ссылка на баннер</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-link prefix"></i>
				<input type="text" id="link" name="link" class="validate">
				<label for="link">Ссылка на сайт</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-money prefix"></i>
				<input type="text" id="bonus" name="bonus" class="validate">
				<label for="bonus">Сумма бонуса</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-clock-o prefix"></i>
				<input type="text" id="period" name="period" class="validate">
				<label for="period">Период</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-money prefix"></i>
				<input type="text" id="min_pay" name="min_pay" class="validate">
				<label for="min_pay">Минимальная выплата</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-credit-card prefix"></i>
				<select name="curr" id="curr">
					<option value="0" disabled selected>Выберите валюту</option>
					<option value="rub">Рубли</option>
					<option value="usd">Доллары</option>
					<option value="euro">Евро</option>
					<option value="btc">Биткоины</option>
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
			<div style="margin: 0px -10px;">
				<div class="row">
					<div class="input-field input-large col s6">
						<i class="fa fa-desktop prefix"></i>
						<input type="text" id="rate_design" name="rate_design" class="validate" value="0.00">
						<label for="rate_design">Дизайн</label>
					</div>
					<div class="input-field input-large col s6">
						<input type="text" id="rate_convenience" name="rate_convenience" class="validate" value="0.00">
						<label for="rate_convenience">Удобство</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field input-large col s6">
						<i class="fa fa-rocket prefix"></i>
						<input type="text" id="rate_speed" name="rate_speed" class="validate" value="0.00">
						<label for="rate_speed">Скорость</label>
					</div>
					<div class="input-field input-large col s6">
						<input type="text" id="rate_profit" name="rate_profit" class="validate" value="0.00">
						<label for="rate_profit">Прибыльность</label>
					</div>
				</div>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-user-circle prefix"></i>
				<input type="text" id="rate_ads" name="rate_ads" class="validate" value="0.00">
				<label for="rate_ads">Качество рекламы</label>
			</div>
			<input type="hidden" name="api" value="admin">
			<input type="hidden" name="admin" value="rating">
			<input type="hidden" name="rating" value="add">
			<button class="btn green lighten-1 waves-effect waves-light">Добавить</button>
		</form>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="left">
				<a href="#addRatingModal" class="btn green lighten-1 waves-effect">Добавить сайт</a>
				<a href="/cpanel/rating/moderation" class="btn green lighten-1 waves-effect">
					Ожидают проверки:
					<?=$data['count_moderation'];?>
				</a>
			</div>
		</div>
		<div class="col s12">
			<br>
			<table class="centered highlight bordered responsive-table">
				<thead>
					<tr>
						<th><i class="fa fa-hashtag"></i></th>
						<th>Баннер</th>
						<th>Период</th>
						<th>Бонус</th>
						<th>Мин выплата</th>
						<th>Оценка</th>
						<th>Управление</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($data['banners']) > 0): ?>
						<?php foreach ($data['banners'] as $banner): ?>
							<?php
							$rate_arr = json_decode($banner['rating_json']);
							$rating_tooltip = "";
							$rating_tooltip .= "Дизайн: ".$rate_arr->design;
							$rating_tooltip .= "<br />Удобство: ".$rate_arr->convenience;
							$rating_tooltip .= "<br />Скорость: ".$rate_arr->speed;
							$rating_tooltip .= "<br />Прибыльность: ".$rate_arr->profit;
							$rating_tooltip .= "<br />Качество рекламы: ".$rate_arr->ads;
							$curr_arr = array(
								'rub'=>'<i class="fa fa-rub"></i>',
								'usd'=>'<i class="fa fa-usd"></i>',
								'euro'=>'<i class="fa fa-euro"></i>',
								'btc'=>'<i class="fa fa-btc"></i>');
							?>
							<tr>
								<td>
									<i class="fa fa-hashtag"></i>
									<?=$banner['id'];?>
								</td>
								<td>
									<div class="banner">
										<img style="max-width:350px;margin-top:7px;" src="<?=$banner['banner_link'];?>"/>
									</div>
								</td>
								<td>
									<i class="fa fa-clock-o"></i>
									<?=$banner['period'];?>
								</td>
								<td>
									<?=sprintf(($banner['curr']=='btc') ? '%.5f' : '%.2f',$banner['bonus']);?>
									<?=$curr_arr[$banner['curr']];?>
								</td>
								<td>
									<?=sprintf(($banner['curr']=='btc') ? '%.5f' : '%.2f',$banner['min_pay']);?>
									<?=$curr_arr[$banner['curr']];?>
								</td>
								<td>
									<div class="tooltipped"
										style="cursor: pointer;"
										data-delay="10"
										data-html="true"
										data-position="right"
										data-tooltip="<div class='left-align'><?=$rating_tooltip;?></div>">
										<i class="fa fa-star"></i>
										<?=sprintf('%.2f',$banner['rating']);?>
									</div>
								</td>
								<td>
									<a href="/cpanel/rating/edit/<?=$banner['id'];?>"
										class="btn green lighten-1 waves-effect tooltipped"
										data-tooltip="Редактирование">
										<i class="fa fa-pencil"></i>
									</a>
									<a href="/cpanel/rating/up/<?=$banner['id'];?>"
										class="btn blue lighten-1 waves-effect tooltipped"
										data-tooltip="Поднятие в списке">
										<i class="fa fa-arrow-up"></i>
									</a>
									<?php if ($banner['paid'] == '2'): ?>
										<a href="/cpanel/rating/no_paid/<?=$banner['id'];?>"
											class="btn orange lighten-1 waves-effect tooltipped"
											data-delay="10"
											data-tooltip="Не платит">
											<i class="fa fa-close"></i>
										</a>
										<?php else: ?>
											<a href="/cpanel/rating/no_paid/<?=$banner['id'];?>"
												class="btn pink lighten-1 waves-effect tooltipped"
												data-delay="10"
												data-tooltip="Начал платить">
												<i class="fa fa-refresh"></i>
											</a>
									<?php endif; ?>
									<a onclick="app.deleteRating(<?=$banner['id'];?>);"
										class="btn red lighten-1 waves-effect tooltipped"
										data-tooltip="Удаление">
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
						<?php else: ?>
							<tr>
								<td colspan="7">Нет проектов в рейтинге</td>
							</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
