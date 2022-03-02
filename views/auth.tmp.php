<?php
$_OPT['title'] = 'Авторизация';
?>
<br>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="white z-depth-1 bdrs-3">
				<div style="padding: 15px 30px;">
					<h4 class="center-align text-100 grey-text text-darken-2">Авторизация</h4>
					<div class="row">
						<div class="col s12 l6 offset-l3">
							<form>
								<div class="input-field">
									<input type="text" name="login" id="login">
									<label for="login">Логин</label>
								</div>
								<div class="input-field">
									<input type="password" name="password" id="login">
									<label for="login">Пароль</label>
								</div>
								<input type="hidden" name="api" value="admin_auth">
								<button class="btn green-btn col s12">Войти</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
