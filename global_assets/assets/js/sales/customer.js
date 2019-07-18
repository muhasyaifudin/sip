var Customer = function  (argument) {

	var _componentCustomer = function () {
		var customers_table

		$(document).ready(function() {
			initCustomerTable()
		})

		$.validate({
			lang: 'en'
		})

		var initCustomerTable = function (data) {
			customers_table = $('#customers_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/sales/customer"),
				    data: {
				    }
				},
				columns: [
		            { defaultContent: "" },
		            { data: "code", defaultContent: "-" },
		            { data: "name", defaultContent: "-" },
		            { data: "nik", defaultContent: "-" },
		            { data: "address", defaultContent: "-" },
		            { data: "pic", defaultContent: "-" },
		            { data: "pic_phone", defaultContent: "-" },
		            { data: "customer_group_name", defaultContent: "-" },
		            { data: "business_unit_name", defaultContent: "-" },
		            { data: "credit_limit", defaultContent: "0" },
		            { defaultContent: "" } 
		            ], 
		        columnDefs: [
		        	{
		        		targets: 0,
				        searchable: false,
	            		orderable: false,
	            		className: "text-center"
				       
				    },
				    {
				    	targets: -1,
				    	className: "text-center",
				    	data: "id",
				    	render : function(data, type, full, meta) {
				    		var full_data =  JSON.stringify(full).replace(/"/g, "'")
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/sales/customer" data_customer="'+full_data+'" class="dropdown-item customer_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/sales/customer/'+data+'" class="dropdown-item customer_delete"><i class="icon-bin"></i> Delete</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})
			// Record Numbering
			customers_table.on( 'order.dt search.dt', function () {
		        customers_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()

		    $('#customers_table').on('click', '.customer_edit', function(event) {
		    	event.preventDefault();
				if (!hasPermission('users_update')) { return false }
		    	
		    	customer = JSON.parse($(this).attr('data_customer').replace(/'/g, '"'))

		    	$.each(customer, function(index, val) {
		    		$('#form_customer').find('input[name="'+index+'"]').val(val).trigger('change')
		    		$('#form_customer').find('textarea[name="'+index+'"]').val(val).trigger('change')
		    		$('#form_customer').find('select[name="'+index+'"]').val(val).trigger('change')

		    	});

		    	$('#form_customer').append('<input type="hidden" name="id" value="'+customer.id+'">')

		    	$('#form_customer').attr({
		    		method: 'PUT',
		    		action: $(this).attr('href')
		    	});

		    	showModal('modal_customer')
	
		    });

		    $('#customers_table').on('click', '.customer_delete', function(event) {
		    	event.preventDefault();
		    	url = $(this).attr('href');
				swal({
	                title: "Delete Data?",
				  	text: "Data yang anda hapus akan masuk ke sampah",
	                type: 'warning',
	                showCancelButton: true,
	                confirmButtonText: 'Ya, Hapus!',
	                cancelButtonText: 'cancel!',
	                confirmButtonClass: 'btn btn-success',
	                cancelButtonClass: 'btn btn-danger',
	                buttonsStyling: false
	            }).then(function (data) {
					if (data.value) {
						$.ajax({
							url: qualifyURL(url),
							type: 'DELETE',
							dataType: 'json',
							data: { },
						})
						.done(function(res) {
							console.log(res);
							if (res.code == 200) {
								customers_table.ajax.reload()
								new PNotify({
					                title: 'Success',
					                text: 'Data Deleted',
					                addclass: 'bg-success border-success'
					            })
							}
						})
						.fail(function(err) {
							console.log(err);
						})
						.always(function() {
							
						});
						
					}	
	            }, function (dismiss) {

	            });
		    });


		}

			

		$('#add_customer').click(function(event) {
			event.preventDefault()

			$('#form_customer').attr({
				method: 'POST',
				action: $(this).attr('href')
			})

			resetForm()
			showModal('modal_customer')
		})

		$('#form_customer').submit(function(event) {
			event.preventDefault()
			const l = Ladda.create(document.querySelector('#submit_button'))
			l.start()
			$.ajax({
				url: qualifyURL($(this).attr('action')),
				type: $(this).attr('method'),
				dataType: 'json',
				data: {
					customer: getFormData($(this).serializeArray())
				},
			})
			.done(function(res) {
				console.log(res)
				if (res.code == 200) {
					hideModal('modal_customer')
					customers_table.ajax.reload()
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
				// var errors = err.responseJSON.errors
				// new PNotify({
	   //              title: 'Error',
	   //              text: errors,
	   //              addclass: 'bg-danger border-danger'
	   //          })
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
	}

	var getFormData = function (formData) {
		var dataJson = {};
    	$.each(formData, function(index, val) {
    		dataJson[val.name] = val.value;
    	});

    	return dataJson;
	}

	var hasPermission = function (permission) {
		if (!localStorage.getItem(permission)) {
			new PNotify({
                title: 'Warning',
                text: 'You don\'t have permission',
                addclass: 'bg-warning border-warning'
            })
			return false
		}

		return true
	}

	return {
		init: function () {
			_componentCustomer()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	Customer.init()
})