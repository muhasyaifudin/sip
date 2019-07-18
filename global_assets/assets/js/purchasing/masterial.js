var Material = function  (argument) {

	var _componentMaterial = function () {
		var materials_table

		$(document).ready(function() {
			initMaterialTable()
		})

		$.validate({
			lang: 'en'
		})

		var initMaterialTable = function (data) {
			materials_table = $('#materials_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/purchasing/material"),
				    data: {
				    }
				},
				columns: [
		            { defaultContent: "" },
		            { data: "name", defaultContent: "-" },
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
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/purchasing/material" data_material="'+full_data+'" class="dropdown-item material_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/purchasing/material/'+data+'" class="dropdown-item material_delete"><i class="icon-bin"></i> Delete</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})
			// Record Numbering
			materials_table.on( 'order.dt search.dt', function () {
		        materials_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()

		    $('#materials_table').on('click', '.material_edit', function(event) {
		    	event.preventDefault();
				if (!hasPermission('users_update')) { return false }
		    	
		    	material = JSON.parse($(this).attr('data_material').replace(/'/g, '"'))

		    	$.each(material, function(index, val) {
		    		$('#form_material').find('input[name="'+index+'"]').val(val).trigger('change')

		    	});

		    	$('#form_material').append('<input type="hidden" name="id" value="'+material.id+'">')

		    	$('#form_material').attr({
		    		method: 'PUT',
		    		action: $(this).attr('href')
		    	});

		    	showModal('modal_material')
	
		    });

		    $('#materials_table').on('click', '.material_delete', function(event) {
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
								materials_table.ajax.reload()
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

			

		$('#add_material').click(function(event) {
			event.preventDefault()

			$('#form_material').attr({
				method: 'POST',
				action: $(this).attr('href')
			})

			resetForm()
			showModal('modal_material')
		})

		$('#form_material').submit(function(event) {
			event.preventDefault()
			const l = Ladda.create(document.querySelector('#submit_button'))
			l.start()
			$.ajax({
				url: qualifyURL($(this).attr('action')),
				type: $(this).attr('method'),
				dataType: 'json',
				data: {
					material: getFormData($(this).serializeArray())
				},
			})
			.done(function(res) {
				console.log(res)
				if (res.code == 200) {
					hideModal('modal_material')
					materials_table.ajax.reload()
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
			_componentMaterial()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	Material.init()
})