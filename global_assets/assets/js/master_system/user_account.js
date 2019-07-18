var UserAccount = function  (argument) {

	var _componentUserAccount = function () {
		var user_accounts_table

		$(document).ready(function() {
			initUserAccountTable()
		})

		$.validate({
			lang: 'en'
		})

		var initUserAccountTable = function (data) {
			user_accounts_table = $('#user_accounts_table').DataTable({
				destroy: true,
	        	processing: true,
	        	ajax: {
	        		type: "GET",
				    url: qualifyURL("api/master_system/user"),
				    data: {
				    }
				},
				columns: [
		            { defaultContent: "" },
		            { data: "name" },
		            { data: "email" },
		            { data: "group_name", defaultContent: "-" },
		            { defaultContent: '' },
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
				    	targets: -2,
				    	className: "text-center",
				    	data: "active",
				    	render: function (data, type, full, meta) {
				    		if (data == '1') {
				    			return '<span class="badge badge-success"> Aktif</span>'
				    		}
				    		else{
				    			return '<span class="badge badge-danger"> Tidak Aktif</span>'
				    		}
				    	}
				    },				    
				    {
				    	targets: -1,
				    	className: "text-center",
				    	data: "id",
				    	render : function(data, type, full, meta) {
				    		var full_data =  JSON.stringify(full).replace(/"/g, "'")
				    		return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/master_system/user_account" data_user="'+full_data+'" class="dropdown-item user_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/users/permissions/'+data+'" title="" class="dropdown-item user_permission" data_user="'+full_data+'"><i class="icon-user-lock"></i> Hak Akses</a> <a href="#" title="" class="dropdown-item"><i class="icon-user-block"></i> Banned</a> </div> </div> </div> </td> </tr>'
				    	}
				    }
				]
			})
			// Record Numbering
			user_accounts_table.on( 'order.dt search.dt', function () {
		        user_accounts_table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
		            cell.innerHTML = i+1
		        } )
		    } ).draw()

		    $('#user_accounts_table').on('click', '.user_edit', function(event) {
		    	event.preventDefault();
				if (!hasPermission('users_update')) { return false }
		    	
		    	user_account = JSON.parse($(this).attr('data_user').replace(/'/g, '"'))

		    	$.each(user_account, function(index, val) {
		    		$('#form_edit_user').find('input[name="'+index+'"]').val(val).trigger('change');
		    		$('#form_edit_user').find('#'+index).val(val).trigger('change');


		    	});

		    	showModal('modal_edit_user')

		    	$('input[name="change_password"]').click(function(event) {
		        	var checked = $('input[name="change_password"]:checked').length > 0;
		        	if (checked) {
		        		$('#edit_password').show();
		        	}
		        	else{
		        		$('#edit_password').hide();
		        	}
		        });

		    });

		    $('#user_accounts_table').on('click', '.user_permission', function(event) {
		    	event.preventDefault();
				if (!hasPermission('users_update')) { return false }
		    	
		    	user_account = JSON.parse($(this).attr('data_user').replace(/'/g, '"'))

		    	$('#form_user_permission').find('input[type="checkbox"]').prop('checked', false)

		    	$.each(user_account.permissions, function(index, permission) {
		    		$('#form_user_permission').find('input[value="'+permission.name+'"]').prop('checked', true);
		    	});
		    	$('#form_user_permission').find('input[name="user_id"]').val(user_account.id);
		    	showModal('modal_user_permission')
		    });


		}

			

		$('#add_user').click(function(event) {
			event.preventDefault()
			if (!hasPermission('users_create')) { return false }
			resetForm()
			showModal('modal_user')
		})

		$('#form_user').submit(function(event) {
			event.preventDefault()
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
					hideModal('modal_user')
					user_accounts_table.ajax.reload()
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

		$('#form_edit_user').submit(function(event) {
        	console.log('submit')
        	event.preventDefault();
        	const l = Ladda.create(document.querySelector('#edit_submit_button'))
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
						hideModal('modal_edit_user')
					user_accounts_table.ajax.reload()
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

        });

        $('#form_user_permission').submit(function(event) {
        	event.preventDefault();

        	const l = Ladda.create(document.querySelector('#permission_submit_button'))
        	l.start()
        	$.ajax({
        		url: $(this).attr('action'),
        		type: $(this).attr('method'),
        		dataType: 'json',
        		data: $(this).serialize(),
        	})
        	.done(function(res) {
        		console.log(res)
        		if (res.code == 200) {
					hideModal('modal_user_permission')
					user_accounts_table.ajax.reload()
					new PNotify({
		                title: 'Success',
		                text: 'Data Saved',
		                addclass: 'bg-success border-success'
		            })
		            resetForm()
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
	var _componentTree = function () {
		var toggler = document.getElementsByClassName("caret");
		var i;

		for (i = 0; i < toggler.length; i++) {
			toggler[i].addEventListener("click", function() {
				this.parentElement.querySelector(".nested").classList.toggle("active");
				this.classList.toggle("caret-down");
			});
		}
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
			_componentUserAccount()
			_componentTree()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	UserAccount.init()
})