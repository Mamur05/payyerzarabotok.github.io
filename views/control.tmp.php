<?php
$_OPT['title'] = 'Управление сайтом';
?>
<!-- #upRatingModal -->
<div id="upRatingModal" class="modal auth-modal">
	<div class="modal-content">
		<div>
			<form>
				<h4 class="center-align text-100">Поднятие в списке</h4>
				<h5 class="center-align text-100 grey-text text-darken-2">Стоимость поднятия</h5>
				<h4 class="center-align green-text text-lighten-1">
					<b>
						<?=$data['up_price'];?>
						<i class="fa fa-usd"></i>
					</b>
				</h4>
				<div class="center-align">
					<input type="hidden" name="api" value="up_rating">
					<input type="hidden" name="key" value="<?=$data['object_key'];?>">
					<button class="btn green-btn waves-effect">
						Поднять в списке
						<i class="fa fa-chevron-right right"></i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
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
				<h5 class="center-align" style="padding-top: 15px;">
					Управление сайтом
				</h5>
				<p class="grey-text text-darken-1 center-align">
					Баннер:
				</p>
				<div class="banner b468" style="margin-top: -15px;">
					<img src="<?=$data['banner_link'];?>">
				</div>
				<p class="grey-text text-darken-1 center-align"  style="margin-top: 0px;">
					Ссылка на сайт:
				</p>
				<h5 class="center-align">
					<a href="<?=$data['link'];?>" target="_blank"><?=$data['link'];?></a>
				</h5>
				<h5 class="green-text text-lighten-1 center-align"  style="margin-top: 0px;">
					Переходов:
					<?=$data['count_clicks'];?>
					<i class="fa fa-eye"></i>
				</h5>
				<h5 class="green-text text-lighten-1 center-align"  style="margin-top: 0px;">
					Позиция в списке:
					<?=$data['position'];?>
					<i class="fa fa-line-chart"></i>
				</h5>
				<h5 class="green-text text-lighten-1 center-align"  style="margin-top: 0px;">
					Оценка:
					<?php if ($data['rating'] != '0'): ?>
						<?=$data['rating'];?>
						<i class="fa fa-star"></i>
						<?php else: ?>
						Не прошел проверку
					<?php endif; ?>
				</h5>
				<div class="center-align">
					<a href="#upRatingModal" class="btn green-btn tooltipped"
							data-tooltip="Поднимет ваш сайт на самый верх списка">
						<i class="fa fa-arrow-up left"></i>
						Поднять в списке
						<i class="fa fa-arrow-up right"></i>
					</a>
				</div>
				<br>
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
