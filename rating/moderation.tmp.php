<?php
$_OPT['title'] = 'Модерация';
?>
<!-- #setRatingModal -->
<div id="setRatingModal" class="modal auth-modal">
	<div class="modal-content">
		<h4 class="text-100">Оценка сайта для рейтинга</h4>
		<form>
			<h5 class="text-100">
				Оценка (0.00 - 1.00)
				<b class="green-text text-lighten-1">
					<i class="fa fa-star"></i>
					<span id="allRate">0.00</span>
				</b>
			</h5>
			<div class="input-field input-large">
				<i class="fa fa-desktop prefix"></i>
				<input type="text" id="rate_design" name="rate_design" class="validate" value="0.00">
				<label for="rate_design">Дизайн</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-magic prefix"></i>
				<input type="text" id="rate_convenience" name="rate_convenience" class="validate" value="0.00">
				<label for="rate_convenience">Удобство</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-rocket prefix"></i>
				<input type="text" id="rate_speed" name="rate_speed" class="validate" value="0.00">
				<label for="rate_speed">Скорость</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-money prefix"></i>
				<input type="text" id="rate_profit" name="rate_profit" class="validate" value="0.00">
				<label for="rate_profit">Прибыльность</label>
			</div>
			<div class="input-field input-large">
				<i class="fa fa-user-circle prefix"></i>
				<input type="text" id="rate_ads" name="rate_ads" class="validate" value="0.00">
				<label for="rate_ads">Качество рекламы</label>
			</div>
			<input type="hidden" name="api" value="admin">
			<input type="hidden" name="admin" value="rating">
			<input type="hidden" name="rating" value="set">
			<input type="hidden" name="id" value="0">
			<button class="btn green lighten-1 waves-effect waves-light">Пропустить в рейтинг</button>
		</form>
	</div>
</div>
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
<div class="container">
	<div class="row">
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
						<th>Управление</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($data['banners']) > 0): ?>
						<?php foreach ($data['banners'] as $banner): ?>
							<?php
							$curr_arr = array(
								'rub'=>'<i class="fa fa-rub"></i>',
								'usd'=>'<i class="fa fa-usd"></i>',
								'euro'=>'<i class="fa fa-euro"></i>',
								'btc'=>'<i class="fa fa-btc"></i>');
							?>
							?>
							<tr>
								<td>
									<i class="fa fa-hashtag"></i>
									<?=$banner['id'];?>
								</td>
								<td>
									<div class="banner">
										<a href="<?=$banner['link'];?>" target="_blank">
											<img style="max-width:350px;margin-top:7px;" src="<?=$banner['banner_link'];?>"/>
										</a>
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
									<a onclick="app.setRating(<?=$banner['id'];?>);"
										class="btn green lighten-1 waves-effect tooltipped"
										data-delay="10"
										data-tooltip="Оценить и допустить в рейтинг">
										Оценить
									</a>
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
								<td colspan="6">Нет проектов для модерации</td>
							</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
