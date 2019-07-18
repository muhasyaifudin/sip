var Login = function () {

	var _componentLogin = function () {
		$.validate({
			'lang': 'en'
		})

		
		$('#login_form').submit(function(event) {
			event.preventDefault();
			const l = Ladda.create(document.querySelector('#submit_button'))
			l.start()
			$.ajax({
				url: $(this).attr('action'),
				type: $(this).attr('method'),
				dataType: 'json',
				data: $(this).serialize(),
			})
			.done(function(res) {
				if (res.login == true) {
					
		            var permissions = res.permissions;

		            $.each(permissions, function(key, val) {
		            	// console.log(key.toString())
						localStorage.setItem(key.toString(), val.toString())

		            });
		            new PNotify({
		                title: 'Success',
		                text: res.message,
		                addclass: 'bg-success border-success'
		            });
				}
				else if (res.login == false) {
					console.log(res.message);
					new PNotify({
		                title: 'Error',
		                text: res.message,
		                addclass: 'bg-danger border-danger'
		            });
				}

				if (res.redirect == true) {
					window.location.href = qualifyURL('');
				}
			})
			.fail(function(err) {
				console.log(err);
			})
			.always(function() {
				l.stop()
			});

		});
	}
	var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.form-input-styled').uniform();
    };
    var qualifyURL = function(pathOrURL) {
	   	if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
	     	return $(document.body).data('base') + pathOrURL;
	   	}

	   return pathOrURL;
	};

	return {
		init: function () {
			_componentLogin();
			_componentUniform();
		}
	}
}();

document.addEventListener('DOMContentLoaded', function() {
    Login.init();
});