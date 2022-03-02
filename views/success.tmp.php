<?php
$_OPT['title'] = 'Удачная оплата';
?>
<br>
<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="white z-depth-1 bdrs-3">
				<div style="padding: 15px 30px;">
					<h2 class="center-align text-100 grey-text text-darken-2">Проверка оплаты</h2>
					<script>
					setTimeout(function () {
						swal({
							type: "success",
							title: "Оплата подтверждена",
							text: "Ожидайте обработки администратором",
							confirmButtonColor: "#29c75f",
							confirmButtonText: "Продолжить",
						},function () {
							window.location.href = "/";
						});
					},1000);
					</script>
				</div>
			</div>
		</div>
	</div>
</div>
