var UserCategory = function () {
	var _componentUserCategory = function () {
		var user_categories_table

		$(document).ready(function() {
			initUserCategoriesTable()
		})

		$.validate({
			lang: 'en'
		})

		var initUserCategoriesTable = function () {
			user_categories_table = $('#user_categories_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/master_system/user_category"),
				    data: {
				    }
				},
				columns: [
		            { defaultContent: "" },
		            { data: "name" },
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
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/master_system/user_category" full_data="'+full_data+'" class="dropdown-item user_category_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/master_system/user_category/'+data+'" title="" class="dropdown-item user_category_delete" ><i class="icon-bin"></i> Hapus</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})

			// Record Numbering
			user_categories_table.on( 'order.dt search.dt', function () {
		        user_categories_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()
		    
			$('#user_categories_table').on('click', '.user_category_edit', function(event) {
				event.preventDefault();
				user_category = JSON.parse($(this).attr('full_data').replace(/'/g, '"'));

				$.each(user_category, function(index, val) {
					$('#form_user_category').find('input[name="'+index+'"]').val(val)
					$('#form_user_category').find('textarea[name="'+index+'"]').val(val)
				});

				$('#form_user_category').attr({
					action: $(this).attr('href'),
					method: 'PUT'
				})

				showModal('modal_user_category')

			});
	    
		}


		$('#user_categories_table').on('click', '.user_category_delete', function(event) {
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
							user_categories_table.ajax.reload()
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
		$('#add_user_category').click(function(event) {
			event.preventDefault()

			$('#form_user_category').attr({
				action: $(this).attr('href'),
				method: 'POST'
			})
			resetForm()
			showModal('modal_user_category')
		});

		$('#form_user_category').submit(function(event) {
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
					hideModal('modal_user_category')
					user_categories_table.ajax.reload()
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

	return {
		init: function () {
			_componentUserCategory()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	UserCategory.init()
})