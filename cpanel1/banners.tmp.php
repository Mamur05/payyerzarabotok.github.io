<?php
$_OPT['title'] = 'Баннеры';
?>
<script>
	setTimeout(function () {
		setInterval(function () {
			var InpVal = $('#html_code').val()
				newVal = InpVal.replace(/'/g,'"');
			$('#html_code').val(newVal);
		},2000);
	},2000);
</script>
<!-- #editBannerModal -->
<div id="editBannerModal" class="modal auth-modal">
	<div class="modal-content">
		<h4 class="text-100">Редактирование баннера #<span id="number"></span></h4>
		<br>
		<form>
			<div class="input-field input-large">
				<textarea type="text" id="html_code" name="html_code" class="materialize-textarea">0</textarea>
				<label for="pincode">HTML код</label>
			</div>
			<input type="hidden" name="api" value="admin">
			<input type="hidden" name="admin" value="edit_banner">
			<input type="hidden" name="id" value="0">
			<button class="btn green lighten-1 waves-effect waves-light">Сохранить</button>
		</form>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['1']['id'];?>,'<?=htmlspecialchars($data['banners']['1']['html']);?>');">
				468x60
			</div>
		</div>
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['2']['id'];?>,'<?=htmlspecialchars($data['banners']['2']['html']);?>');">
				468x60
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['3']['id'];?>,'<?=htmlspecialchars($data['banners']['3']['html']);?>');">
				468x60
			</div>
		</div>
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['4']['id'];?>,'<?=htmlspecialchars($data['banners']['4']['html']);?>');">
				468x60
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 l3">
			<div class="banner-edit b240 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['11']['id'];?>,'<?=htmlspecialchars($data['banners']['11']['html']);?>');">
				240x400
			</div>
		</div>
		<div class="col s12 l6">
			<div class="bdrs-10 grey">
				<br>
				<br>
				<h4 class="center-align text-100 grey-text text-darken-2">
					Пользовательский блок
				</h4>
				<br>
				<br>
				<div class="row">
					<div class="col s10 offset-s1">
						<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
							onclick="app.editBanner(<?=$data['banners']['5']['id'];?>,'<?=htmlspecialchars($data['banners']['5']['html']);?>');">
							468x60
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s10 offset-s1">
						<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
							onclick="app.editBanner(<?=$data['banners']['6']['id'];?>,'<?=htmlspecialchars($data['banners']['6']['html']);?>');">
							468x60
						</div>
					</div>
				</div>
				<br>
			</div>
		</div>
		<div class="col s12 l3">
			<div class="banner-edit b240 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['12']['id'];?>,'<?=htmlspecialchars($data['banners']['12']['html']);?>');">
				240x400
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['7']['id'];?>,'<?=htmlspecialchars($data['banners']['7']['html']);?>');">
				468x60
			</div>
		</div>
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['8']['id'];?>,'<?=htmlspecialchars($data['banners']['8']['html']);?>');">
				468x60
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['9']['id'];?>,'<?=htmlspecialchars($data['banners']['9']['html']);?>');">
				468x60
			</div>
		</div>
		<div class="col s12 l6">
			<div class="banner-edit b468 bdrs-10 grey lighten-1 grey-text text-lighten-3"
				onclick="app.editBanner(<?=$data['banners']['10']['id'];?>,'<?=htmlspecialchars($data['banners']['10']['html']);?>');">
				468x60
			</div>
		</div>
	</div>
</div>
