<?php
$_OPT['title'] = 'Партнерская программа';
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
					Приглашайте друзей и получай
					<br>
					<font class="yellow-text text-darken-4">
						<b>
							10%
						</b>
					</font>
					от их выплат
				</h5>
				<h5 class="grey-text text-darken-3 center-align text-400">
					Моментальная выплата на
					<a href="https://payeer.com/" target="_blank">
						<b>
							<font color="#1e363f">PAY</font><font color="#0099de">EER</font>
						</b>
					</a>
				</h5>
				<h5 class="center-align green-text text-darken-3 text-400">
					Заработано на рефералах:
					<?=number_format($data['from_refs'],2,'.',' ');?>
					<i class="fa fa-rub"></i>
				</h5>
				<h5 class="center-align green-text text-darken-3 text-400">
					Всего рефералов:
					<?=$data['count_refs'];?>
					<i class="fa fa-users"></i>
				</h5>
				<br>
				<div class="input-field" style="margin: 0px 30px;">
					<i class="fa fa-info prefix"></i>
					<input type="text" id="ref_link" value="<?=$data['ref_link'];?>" onclick="select();">
					<label for="ref_link">Реферальная ссылка</label>
				</div>
				<br>
				<div class="input-field" style="margin: 0px 30px;">
					<i class="fa fa-image prefix"></i>
					<input type="text" id="ref_link" value="<?=$data['banner_link'];?>" onclick="select();">
					<label for="ref_link">Ссылка на баннер</label>
				</div>
				<div class="banner b468">
					<img src="/views/default/img/468.gif">
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
