<?php
$_OPT['title'] = 'Реальный заработок в интернете';
?>
<?php if ($data['add_button'] == '1'): ?>
	<!-- #addRatingModal -->
	<div id="addRatingModal" class="modal auth-modal">
		<div class="modal-content">
			<div id="startView">
				<h4 class="text-100">Добавление сайта в рейтинг</h4>
				<form>
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
						<label for="bonus">Сумма бонуса (Пример: 0.05)</label>
					</div>
					<div class="input-field input-large">
						<i class="fa fa-clock-o prefix"></i>
						<input type="text" id="period" name="period" class="validate">
						<label for="period">Период (Пример: 1 Мин.)</label>
					</div>
					<div class="input-field input-large">
						<i class="fa fa-money prefix"></i>
						<input type="text" id="min_pay" name="min_pay" class="validate">
						<label for="min_pay">Минимальная выплата (Пример: 1)</label>
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
					<div class="input-field input-large">
						<i class="fa fa-envelope-o prefix"></i>
						<input type="email" id="email_user" name="email_user" class="validate">
						<label for="email_user">Email (На него придет ссылка для управления сайтом)</label>
					</div>
					<input type="hidden" name="api" value="add_rating">
					<button class="btn green-btn waves-effect waves-light">Добавить</button>
				</form>
			</div>
			<div id="paidView">
				<h4 class="center-align text-100">Оплата добавления</h4>
				<h5 class="center-align text-100">
					Стоимость
				</h5>
				<h4 class="center-align green-text text-lighten-1">
					<b>
						<?=$data['add_price'];?>
						<i class="fa fa-usd"></i>
					</b>
				</h4>
				<div class="center-align">
					<a href="" id="paidLink" class="btn green-btn waves-effect">
						Перейти к оплате
						<i class="fa fa-chevron-right right"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<br>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="white z-depth-1 bdrs-3">
				<div style="padding: 15px 30px;">
					<h4 class="text-100 grey-text text-darken-2">Заработок в интернете без вложений</h4>
					<p class="text-100 grey-text text-darken-1" style="font-size:16px;" align="justify">
						Сегодня в сети интернет существует несметное количество способов заработка, 
						большинство из которых это просто обман. И все-таки реальные заработки в 
						интернете без вложений существуют! Некоторые из них требуют специальных 
						знаний и умений, которыми, возможно, Вы не обладаете, другие потребуют 
						вложения денег, которые всегда есть большой риск потерять. Мы же с Вами 
						рассмотрим только те проекты для заработка, которые не потребуют от Вас 
						профессиональных умений и денежных инвестиций. Все представленные на этом 
						сайте способы заработка в интернете легки в освоении и доступны каждому. 
					</p>
					<div class="row" style="margin-bottom: -20px;">
						<div class="col l1 s4" style="padding-top: 20px;">
							<?php if ($data['add_button'] == '1'): ?>
								<a href="#addRatingModal" class="col s12 btn green-btn lighten-1 waves-effect tooltipped"
										data-delay="10"
										data-tooltip="Добавить свой сайт">
									<i class="fa fa-plus"></i>
								</a>
								<?php else: ?>
									<button class="col s12 btn green-btn lighten-1 waves-effect tooltipped"
											disabled
											data-delay="10"
											data-tooltip="Добавить свой сайт">
										<i class="fa fa-plus"></i>
									</button>
							<?php endif; ?>
						</div>
						<div class="col l1 s4" style="padding-top: 20px;">
							<a href="/contacts" class="col s12 btn orange lighten-1 waves-effect tooltipped"
									data-delay="10"
									data-tooltip="Пожаловаться на сайт">
								<i class="fa fa-bug"></i>
							</a>
						</div>
						<div class="col l1 s4" style="padding-top: 20px;">
							<a href="/buy_banner" class="col s12 btn pink lighten-1 waves-effect tooltipped"
									data-delay="10"
									data-tooltip="Заказать изготовление GIF - Баннеров">
								<i class="fa fa-image"></i>
							</a>
						</div>
						<form act="1">
							<div class="col l1 s4" style="padding-top: 20px;">
								<button class="col s12 btn grey lighten-1 waves-effect waves-green tooltipped"
										data-delay="10"
										data-tooltip="Поиск">
									<i class="fa fa-search"></i>
								</button>
							</div>
							<div class="col l8 s8">
								<div class="input-field">
									<input type="text" name="search" id="search" value="<?=$data['search'];?>">
									<label for="search">Поиск (Пример: <?=$_SERVER['HTTP_HOST'];?>)</label>
								</div>
							</div>
						</form>
					</div>
					<div class="hide-on-med-and-up">
						<div style="margin-top: 10px;"></div>
					</div>
					<table class="centered highlight bordered responsive-table">
						<thead>
							<tr>
								<th class="text-100"><i class="fa fa-hashtag"></i></th>
								<th class="text-100">Сайт</th>
								<th class="text-100">Период</th>
								<th class="text-100">Бонус</th>
								<th class="text-100">Выплата</th>
								<th class="text-100">Оценка</th>
								<th class="text-100">Ссылка</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($data['banners']) > 0): ?>
								<?php $n=1; ?>
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
										<td class="rating-id">
											<i class="fa fa-hashtag"></i>
											<?=$n;?>
										</td>
										<td class="rating-img">
											<div class="banner">
												<img style="max-width:430px" src="<?=$banner['banner_link'];?>"/>
											</div>
										</td>
										<td class="rating-info">
											<i class="fa fa-clock-o"></i>
											<?=$banner['period'];?>
										</td>
										<td class="rating-money">
											<?=sprintf(($banner['curr']=='btc') ? '%.5f' : '%.2f',$banner['bonus']);?>
											<?=$curr_arr[$banner['curr']];?>
										</td>
										<td class="rating-money">
											от
											<?=sprintf(($banner['curr']=='btc') ? '%.5f' : '%.2f',$banner['min_pay']);?>
											<?=$curr_arr[$banner['curr']];?>
										</td>
										<td class="rating-rate">
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
											<?php if ($banner['paid'] == '2'): ?>
												<a href="/goto/<?=$banner['id'];?>" target="_blank" class="btn green-btn waves-effect waves-light">
													<i class="fa fa-chevron-right"></i>
												</a>
												<?php else: ?>
													<button class="btn red lighten-1 waves-effect waves-light tooltipped"
															data-delay="10"
															data-position="right"
															data-tooltip="Не платит">
														<i class="fa fa-close"></i>
													</button>
											<?php endif; ?>
										</td>
									</tr>
									<?php $n++; ?>
								<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="7">Нет проектов в рейтинге</td>
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
