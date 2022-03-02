<?php
$_OPT['title'] = 'Контакты';
?>
<br>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="white z-depth-1 bdrs-3">
				<div style="padding: 15px 30px;">
					<h4 class="text-100 grey-text text-darken-2">Контакты</h4>
					<br>
					<h5 class="text-100 grey-text text-darken-1 center-align">
						Вы можете написать нам на почту:
						<a href="mailto: <?=$data['contact_email'];?>"><?=$data['contact_email'];?></a>
					</h5>
					<h5 class="text-100 grey-text text-darken-1 center-align">
						Или воспользуйтесь формой ниже.
					</h5>
					<br>
					<form>
						<div class="input-field">
							<i class="fa fa-envelope-o prefix"></i>
							<label for="email">Укажите почту</label>
							<input type="email" name="email">
						</div>
						<div class="input-field">
							<i class="fa fa-comment-o prefix"></i>
							<label for="message">Укажите ваше сообщение</label>
							<textarea name="message" class="materialize-textarea" data-length="250"></textarea>
						</div>
						<input type="hidden" name="api" value="contact_form">
						<button class="btn green-btn">Отправить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
