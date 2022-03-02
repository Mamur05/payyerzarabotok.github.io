var app;

app = {
	init: function () {
		$('.modal').modal();
		$(".button-collapse").sideNav();
		$('select').material_select();
		$('body').on('submit', 'form', app.submitForm);
	},
	errorsController: function (text) {
		Materialize.toast(text, 3000);
	},
	submitForm: function (e) {
		var form = $(this);
		if (form.attr('act') !== '1') {
			e.preventDefault();
			var submitBtn = form.find('button');
			var str = form.serialize(),
				type = form.find('input[name=admin]').val();
			submitBtn.attr('disabled','disable');
			$.ajax({
				url: "/api",
				type: "POST",
				data: str,
				success: function(data){
					var res = $.parseJSON(data);
					switch(type){
						case 'settings': app.settingsCtrl(res); break;
						case 'rating': app.ratingCtrl(res); break;
						case 'edit_banner': app.editCtrl(res); break;
						default: app.errorsController('Ошибка, обновите страницу'); break;
					}
					setTimeout(function() {
						submitBtn.removeAttr('disabled');
					},200);
				},
				error: function () {
					app.errorsController('Ошибка, обновите страницу');
				}
			});
		}
	},
	ban: function (id) {
		$.ajax({
			url: "/api",
			type: "POST",
			data: {
				api: 'admin',
				admin: 'ban',
				id: id
			},
			success: function(data){
				var res = $.parseJSON(data);
				if (res.status === 'success') {
					var banText = (res.text === '1') ? 'Забанить' : 'Разбанить';
					$('button[data-ban="'+id+'"]').text(banText);
				}else if (res.status === 'err') {
					app.errorsController(res.text);
				}
			},
			error: function () {
				app.errorsController('Ошибка, обновите страницу');
			}
		});
	},
	ratingCtrl: function (res) {
		app.errorsController(res.text);
		if (res.status === 'success') window.location.reload();
	},
	settingsCtrl: function (res) {
		app.errorsController(res.text);
	},
	editBanner: function (id,html) {
		var modal = $('#editBannerModal');
		modal.find('input[name=id]').val(id);
		modal.find('span#number').text(id);
		modal.find('textarea[name=html_code]')
			.val(html)
			.trigger('autoresize');
		modal.modal('open');
	},
	editCtrl: function (res) {
		app.errorsController(res.text);
		if (res.status === 'success') window.location.reload();
	},
	deleteRating: function (id) {
		$('#deleteRatingModal')
			.find('a#delteLink').attr('href','/cpanel/rating/delete/'+id)
			.modal('open');
	},
	setRating: function (id) {
		$('#setRatingModal')
			.find('input[name=id]').val(id)
			.modal('open');
	}
}

app.init();
