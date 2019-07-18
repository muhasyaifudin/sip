var Company = function () {
	var _componentCompany = function () {
		var companies_table, data_company

		$(document).ready(function() {
			initCompaniesTable()
		})

		$.validate({
			lang: 'en'
		})

		var initCompaniesTable = function () {
			companies_table = $('#companies_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/master_system/company"),
				    data: {
				    }
				},
				columns: [
		            { defaultContent: "" },
		            { data: "address" },
		            { data: "phone" } 
		            ], 
		        columnDefs: [
		        	{
		        		targets: 0,
				        searchable: false,
	            		orderable: false,
	            		className: "text-center",
	            		data: "name",
	            		render : function(data, type, full, meta) {
	            			data_company = full
	            			return data
				    	}
				       
				    }
				]
			})

			
		}

		$('#company_information').click(function(event) {
			event.preventDefault()
			$.each(data_company, function(index, val) {
	    		$('#form_company').find('input[name="'+index+'"]').val(val).trigger('change')
	    		$('#form_company').find('textarea[name="'+index+'"]').val(val).trigger('change')

	    	});

			$('#form_company').attr({
				action: $(this).attr('href'),
				method: 'POST'
			})

			showModal('modal_company')
		});

		$('#form_company').submit(function(event) {
			event.preventDefault();
			const l = Ladda.create(document.querySelector('#submit_button'))
			l.start()

			$.ajax({
				url: qualifyURL($(this).attr('action')),
				type: $(this).attr('method'),
				dataType: 'json',
				data: {
					company: getFormData($(this).serializeArray())
				},
			})
			.done(function(res) {
				console.log(res)
				if (res.code == 200) {
					hideModal('modal_company')
					companies_table.ajax.reload()
					new PNotify({
		                title: 'Success',
		                text: 'Data Saved',
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

	var getFormData = function (formData) {
		var dataJson = {};
    	$.each(formData, function(index, val) {
    		dataJson[val.name] = val.value;
    	});

    	return dataJson;
	}

	return {
		init: function () {
			_componentCompany()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	Company.init()
})