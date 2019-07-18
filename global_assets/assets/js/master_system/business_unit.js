var BusinessUnit = function () {
	var _componentBusinessUnit = function () {
		var business_unit_table

		$(document).ready(function() {
			initOutletsTable()
		})

		$.validate({
			lang: 'en'
		})

		var initOutletsTable = function () {
			business_unit_table = $('#business_unit_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/master_system/business_unit"),
				    data: {
				    }
				},
				columns: [
		            { defaultContent: "" },
		            { data: "code" },
		            { data: "name" },
		            { data: "address" },
		            { data: "province" },
		            { data: "phone" },
		            { data: "description" },
		            { defaultContent: '' } 
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
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/master_system/business_unit" full_data="'+full_data+'" class="dropdown-item business_unit_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/master_system/business_unit/'+data+'" title="" class="dropdown-item business_unit_delete" ><i class="icon-bin"></i> Hapus</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})

			// Record Numbering
			business_unit_table.on( 'order.dt search.dt', function () {
		        business_unit_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()
		}

		$('#add_business_unit').click(function(event) {
			event.preventDefault()

			$('#form_business_unit').attr({
				action: $(this).attr('href'),
				method: 'POST'
			})
			resetForm()
			showModal('modal_business_unit')
		});

		$('#form_business_unit').submit(function(event) {
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
					hideModal('modal_business_unit')
					business_unit_table.ajax.reload()
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

		$('#business_unit_table').on('click', '.business_unit_edit', function(event) {
			event.preventDefault();
			outlet = JSON.parse($(this).attr('full_data').replace(/'/g, '"'));

			$.each(outlet, function(index, val) {
				$('#form_business_unit').find('input[name="'+index+'"]').val(val)
				$('#form_business_unit').find('textarea[name="'+index+'"]').val(val)
				$('#form_business_unit').find('select[name="'+index+'"]').val(val).trigger('change')

			});

			$('#form_business_unit').attr({
				action: $(this).attr('href'),
				method: 'PUT'
			})

			showModal('modal_business_unit')

		});

		$('#business_unit_table').on('click', '.business_unit_delete', function(event) {
			event.preventDefault();
			
			url = $(this).attr('href');
			console.log(qualifyURL(url));
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
							business_unit_table.ajax.reload()
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
			_componentBusinessUnit()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	BusinessUnit.init()
})


