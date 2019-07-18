var Unit = function  (argument) {
	var _componentSpecificationUnit = function () {
		var specification_units_table

		$(document).ready(function() {
			initSpecificationUnitTable()
		})

		$.validate({
			lang: 'en'
		})

		var initSpecificationUnitTable = function (data) {
			specification_units_table = $('#specification_units_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/production/product/specification_unit"),
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
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/production/product/specification_unit" data_specification_unit="'+full_data+'" class="dropdown-item specification_unit_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/production/product/specification_unit/'+data+'" class="dropdown-item specification_unit_delete"><i class="icon-bin"></i> Delete</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})
			// Record Numbering
			specification_units_table.on( 'order.dt search.dt', function () {
		        specification_units_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()

		    $('#specification_units_table').on('click', '.specification_unit_edit', function(event) {
		    	event.preventDefault();
				if (!hasPermission('users_update')) { return false }
		    	
		    	specification_unit = JSON.parse($(this).attr('data_specification_unit').replace(/'/g, '"'))

		    	$.each(specification_unit, function(index, val) {
		    		$('#form_specification_unit').find('input[name="'+index+'"]').val(val).trigger('change')

		    	});

		    	$('#form_specification_unit').append('<input type="hidden" name="id" value="'+specification_unit.id+'">')

		    	$('#form_specification_unit').attr({
		    		method: 'PUT',
		    		action: $(this).attr('href')
		    	});

		    	showModal('modal_specification_unit')
	
		    });

		    $('#specification_units_table').on('click', '.specification_unit_delete', function(event) {
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
								specification_units_table.ajax.reload()
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

			

		$('#add_specification_unit').click(function(event) {
			event.preventDefault()

			$('#form_specification_unit').attr({
				method: 'POST',
				action: $(this).attr('href')
			})

			resetForm()
			showModal('modal_specification_unit')
		})

		$('#form_specification_unit').submit(function(event) {
			event.preventDefault()
			const l = Ladda.create(document.querySelector('#specification_unit_submit_button'))
			l.start()
			$.ajax({
				url: qualifyURL($(this).attr('action')),
				type: $(this).attr('method'),
				dataType: 'json',
				data: {
					specification_unit: getFormData($(this).serializeArray())
				},
			})
			.done(function(res) {
				console.log(res)
				if (res.code == 200) {
					hideModal('modal_specification_unit')
					specification_units_table.ajax.reload()
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
	var _componentQuantityUnit = function () {
		var quantity_units_table

		$(document).ready(function() {
			initQuantityUnitTable()
		})

		$.validate({
			lang: 'en'
		})

		var initQuantityUnitTable = function (data) {
			quantity_units_table = $('#quantity_units_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/production/product/quantity_unit"),
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
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/production/product/quantity_unit" data_quantity_unit="'+full_data+'" class="dropdown-item quantity_unit_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/production/product/quantity_unit/'+data+'" class="dropdown-item quantity_unit_delete"><i class="icon-bin"></i> Delete</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})
			// Record Numbering
			quantity_units_table.on( 'order.dt search.dt', function () {
		        quantity_units_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()

		    $('#quantity_units_table').on('click', '.quantity_unit_edit', function(event) {
		    	event.preventDefault();
				if (!hasPermission('users_update')) { return false }
		    	
		    	quantity_unit = JSON.parse($(this).attr('data_quantity_unit').replace(/'/g, '"'))

		    	$.each(quantity_unit, function(index, val) {
		    		$('#form_quantity_unit').find('input[name="'+index+'"]').val(val).trigger('change')

		    	});

		    	$('#form_quantity_unit').append('<input type="hidden" name="id" value="'+quantity_unit.id+'">')

		    	$('#form_quantity_unit').attr({
		    		method: 'PUT',
		    		action: $(this).attr('href')
		    	});

		    	showModal('modal_quantity_unit')
	
		    });

		    $('#quantity_units_table').on('click', '.quantity_unit_delete', function(event) {
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
								quantity_units_table.ajax.reload()
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

			

		$('#add_quantity_unit').click(function(event) {
			event.preventDefault()

			$('#form_quantity_unit').attr({
				method: 'POST',
				action: $(this).attr('href')
			})

			resetForm()
			showModal('modal_quantity_unit')
		})

		$('#form_quantity_unit').submit(function(event) {
			event.preventDefault()
			const l = Ladda.create(document.querySelector('#quantity_unit_submit_button'))
			l.start()
			$.ajax({
				url: qualifyURL($(this).attr('action')),
				type: $(this).attr('method'),
				dataType: 'json',
				data: {
					quantity_unit: getFormData($(this).serializeArray())
				},
			})
			.done(function(res) {
				console.log(res)
				if (res.code == 200) {
					hideModal('modal_quantity_unit')
					quantity_units_table.ajax.reload()
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
			_componentSpecificationUnit()
			_componentQuantityUnit()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	Unit.init()
})