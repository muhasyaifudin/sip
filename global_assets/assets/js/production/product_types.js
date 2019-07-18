var kategoriRak = function () {
	var _componentkategoriRak = function () {
		var kategori_rak_table

		$(document).ready(function() {
			initKategoriRakTable()
		})

		$.validate({
			lang: 'en'
		})

		var initKategoriRakTable = function () {
			product_types = $('#product_types').DataTable({
				destroy: true,
				processing: true,
				ajax: {
					type: "GET",
					url: qualifyURL("api/production/product_types"),
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
						return '<td class="text-center"> <div class="list-icons"> <div class="dropdown"> <a href="#" class="list-icons-item" data-toggle="dropdown"> <i class="icon-menu9"></i> </a> <div class="dropdown-menu dropdown-menu-right"> <a href="api/production/product_types" full_data="'+full_data+'" class="dropdown-item product_edit"><i class="icon-pencil"></i> Edit</a> <a href="api/production/product_types/'+data+'" title="" class="dropdown-item product_dell" ><i class="icon-bin"></i> Hapus</a> </div> </div> </div> </td> </tr>'
					}
				}
				]
			})

			// Record Numbering
			product_types.on( 'order.dt search.dt', function () {
				product_types.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
					cell.innerHTML = i+1
				} )
			} ).draw()


			$('#product_types').on('click', '.product_edit', function(event) {
				event.preventDefault();
				rack = JSON.parse($(this).attr('full_data').replace(/'/g, '"'));

				$.each(rack, function(index, val) {
					$('#form_product_types').find('input[name="'+index+'"]').val(val)
					$('#form_product_types').find('textarea[name="'+index+'"]').val(val)
				});

				$('#form_product_types').attr({
					action: $(this).attr('href'),
					method: 'PUT'
				})

				showModal('modal_product_type')

			});

		}


		$('#product_types').on('click', '.product_dell', function(event) {
			event.preventDefault();
			url = $(this).attr('href');
			// console.log(qualifyURL(url));
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
						// console.log(res);
						if (res.code == 200) {
							product_types.ajax.reload()
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

		$('#add_kategori_type').click(function(event) {
			event.preventDefault()
			$('#form_product_types').attr({
				action: $(this).attr('href'),
				method: 'POST'
			})
			resetForm()
			showModal('modal_product_type')
		});

		$('#form_product_types').submit(function(event) {
			event.preventDefault();
			$('.loading-icon').attr('class', 'icon-spinner3 spinner ml-2 loading-icon')
			$.ajax({
				url: qualifyURL($(this).attr('action')),
				type: $(this).attr('method'),
				dataType: 'json',
				data: $(this).serialize(),
			})
			.done(function(res) {
				if (res.code == 200) {
					hideModal('modal_product_type')
					product_types.ajax.reload()
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
				$('.loading-icon').attr('class', 'icon-checkmark3 font-size-base mr-1 loading-icon')
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
			_componentkategoriRak()
		}
	}
}()

document.addEventListener('DOMContentLoaded', function () {
	kategoriRak.init()
})