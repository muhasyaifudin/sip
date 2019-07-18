var ChangePassword = function () {
	var _componentChangePassword = function () {

		$(document).ready(function() {
			resetForm()
		})

		$.validate({
			modules: 'security'
		})

		$('#change_password_form').submit(function(event) {
			event.preventDefault();
			const l = Ladda.create(document.querySelector('#submit_button'))
			l.start()
			$.ajax({
				url: qualifyURL($(this).attr('action')),
				type: $(this).attr('method'),
				dataType: 'json',
				data: $(this).serialize(),
			})
			.done(function(res) {
				console.log(res)
				if (res.code == 200) {
					new PNotify({
		                title: 'Success',
		                text: 'Password Change',
		                addclass: 'bg-success border-success'
		            })
		            resetForm()
				}
			})
			.fail(function(err) {
				console.log(err)
				var errors = err.responseJSON.errors
				new PNotify({
	                title: 'Error',
	                text: errors,
	                addclass: 'bg-danger border-danger'
	            })
			})
			.always(function() {
				l.stop()
			})
			
		})

	}

	var showModal = function (selector) {
		$('#'+selector).modal('show')
	}
	var hideModal = function (selector) {
		$('#'+selector).modal('hide')
	}

	var resetForm = function () {
		$('form')[0].reset()
		$('form').find('.select').val('').trigger('change')
	}
	var qualifyURL = function(pathOrURL) {
	   	if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
	     	return $(document.body).data('base') + pathOrURL;
	   	}

	   return pathOrURL;
	};

	return {
		init: function () {
			_componentChangePassword()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	ChangePassword.init()
})


