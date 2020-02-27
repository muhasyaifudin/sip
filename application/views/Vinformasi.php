<!-- Page header -->
<div class="page-header pb-1 pt-1">
    <div class="page-header-content header-elements-md-inline pb-1 pt-1">
        <div class="page-title d-flex p-1">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Informasi & Pengumuman</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    
    </div>
</div>
<!-- /page header -->
                                    

<!-- Content area -->
<div class="content pt-0">
 
     <div class="card">
        <div class="card-header header-elements-inline pb-2 pt-2">
            <div>
                 <a href="<?php echo site_url('admin/informasi/insert') ?>" class="btn btn-primary btn-sm mr-2" style="margin-right: 10px;" id="button_tambah">Tambah</a>
            </div>
            <div class="header-elements d-flex flex-row">
                <div class="list-icons">
                    <form action="#" style="width: 200px;">
                        <select class="form-control select" data-fouc placeholder="Filter" name="filter" id="filter">
                            <option value="-1" >Semua</option>
                            <option value="1" selected="">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </form>
                    
                </div>
            </div>
        </div>
           <table class="datatable-basic table-xs table" style="min-width: 100%; white-space: normal;" id="table_informasi">
                <thead>
                    <tr>
                        <th class="text-center" width="1%">#</th>
                        <th width="5%">Tanggal</th>
                        <th width="15%">Judul</th>
                        <th>Isi</th>
                        <th width="5%">Pembuat</th>
                        <th width="5%">Status</th>
                        <th width="1%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
    </div>
</div>
<!-- /content area -->
<div class="modal fade" id="modal_informasi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-file-text mr-2"></i> &nbsp;Data Informasi</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_informasi">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />

	                <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" placeholder="Tanngal" name="tanggal" required="" />
                    </div>
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" placeholder="Judul" name="judul" required="" />
                    </div>

                    <div class="form-group">
                        <label>Isi</label>
                        <textarea name="isi" class="form-control" placeholder="Isi" rows="4"></textarea>
                    </div>

	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	                <button type="submit" class="btn btn-primary">Simpan</button>
	            </div>
            	
            </form>
	            
        </div>
    </div>
</div>
<script type="text/javascript">

$(document).ready(function() {
	get_data();

	$('#button_tambah').click(function(event) {
		event.preventDefault();

		$('#form_informasi').attr('action', $(this).attr('href'));

		$('#modal_informasi').modal('show');
	});

    $('#filter').change(function(event) {
        event.preventDefault();
        var filter = $(this).val();
        get_data(filter);
    });
});


function get_data (filter = 1) {
	var table_informasi = $('#table_informasi').DataTable({
		destroy: true,
    	processing: true,
    	ajax: {
    		type: "GET",
		    url: '<?php echo base_url(); ?>/admin/informasi/get_data?filter=' + filter,
		},
		columns: [
            { defaultContent: '' },
            { data: 'tanggal', defaultContent: '' },
            { data: 'judul', defaultContent: '' },
            { data: 'isi', defaultContent: '' },
            { data: 'user_name', defaultContent: '' },
            { data: 'aktif', defaultContent: '' },
            { defaultContent: '' },
            ], 
        columnDefs: [
        	{
                targets: -2,
                className: "text-center",
                data: "aktif",
                render : function(data, type, full, meta) {
                    if (data == 1) {
                        return 'Aktif';

                    }
                    else {
                        return 'Tidak aktif';
                    }
                }
            },
		    {
		    	targets: -1,
		    	className: "text-center",
		    	data: "id",
                width: "100px",
                orderable: false,
		    	render : function(data, type, full, meta) {

                    if (full.aktif == 1) {
                        return `<a href="<?php echo site_url('admin/informasi/update') ?>" class=" mr-1 informasi_edit"><i class="icon-pencil7"></i></a>
                            <a href="<?php echo site_url('admin/informasi/delete') ?>/${data}" class="informasi_delete" style="color:red;"><i class="icon-bin"></i></a>
                            <a href="<?php echo site_url('admin/informasi/nonaktifkan') ?>/${data}" class="informasi_nonaktifkan" style="color:red;"><i class="icon-blocked"></i></a>`
                    }
                    else {
                        return `<a href="<?php echo site_url('admin/informasi/update') ?>" class=" mr-1 informasi_edit"><i class="icon-pencil7"></i></a>
                    <a href="<?php echo site_url('admin/informasi/delete') ?>/${data}" class="informasi_delete" style="color:red;"><i class="icon-bin"></i></a>
                    <a href="<?php echo site_url('admin/informasi/aktifkan') ?>/${data}" class="informasi_aktifkan" style="color:green;"><i class="icon-eye"></i></a>`
                    }
                        
		    	}
		    }
		],
		autoWidth: false,
		searching: true,
		pageLength: 25,
		scrollX: true,
        fixedColumns: true,
        fixedColumns: {
            leftColumns: 0,
            rightColumns: 1,
        },
		scrollCollapse: false,
		scroller: true,
		dom: '<"datatable-header"fl><tr><"datatable-footer"ip>',
		language: {
            search: '<span>Cari:</span> _INPUT_',
            searchPlaceholder: 'Pencarian',
            lengthMenu: '<span>Lihat:</span> _MENU_',
            processing: '<i class="icon-spinner2 spinner"></i>',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' },
            info: "Menampilkan Halaman _PAGE_ Dari _PAGES_",
        },
        
	});

    table_informasi.on( 'order.dt search.dt', function () {
        table_informasi.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1
        } )
    } ).draw()

	$('#table_informasi').on('click', '.informasi_edit', function(event) {
    	event.preventDefault();
    	
    	data = table_informasi.row($(this).parents('tr')).data();

    	$.each(data, function(index, val) {
    		$('#form_informasi').find('input[name="'+index+'"]').val(val).trigger('change')
    		$('#form_informasi').find('textarea[name="'+index+'"]').val(val).trigger('change')
    		$('#form_informasi').find('select[name="'+index+'"]').val(val).trigger('change')


    	});

    	$('#form_informasi').attr('action', $(this).attr('href'));

		$('#modal_informasi').modal('show');

    });

    $('#table_informasi').on('click', '.informasi_delete', function(event) {
    	event.preventDefault();
    	url = $(this).attr('href');
		swal({
            title: "Hapus Data?",
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
					url: url,
					type: 'DELETE',
					dataType: 'json',
					data: { },
				})
				.done(function(res) {
					if (res.code == 200) {
						table_informasi.ajax.reload()
						new PNotify({
			                title: 'Success',
			                text: 'Data berhasil dihapus',
			                addclass: 'bg-success border-success'
			            })
					}
				})
				.fail(function(err) {
					new PNotify({
                        title: 'Error',
                        text: 'Data gagal dihapus',
                        addclass: 'bg-danger border-danger'
                    })
				})
				.always(function() {
					
				});
				
			}	
        }, function (dismiss) {

        });
    });

    $('#table_informasi').on('click', '.informasi_nonaktifkan', function(event) {
        event.preventDefault();
        url = $(this).attr('href');
        swal({
            title: "Nonaktifkan Informasi?",
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Nonaktifkan!',
            cancelButtonText: 'Batal!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function (data) {
            if (data.value) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: { },
                })
                .done(function(res) {
                    if (res.code == 200) {
                        table_informasi.ajax.reload()
                        new PNotify({
                            title: 'Success',
                            text: 'Data berhasil dinonaktifkan',
                            addclass: 'bg-success border-success'
                        })
                    }
                })
                .fail(function(err) {
                    new PNotify({
                        title: 'Error',
                        text: 'Data gagal dinonaktifkan',
                        addclass: 'bg-danger border-danger'
                    })
                })
                .always(function() {
                    
                });
                
            }   
        }, function (dismiss) {

        });
    });

    $('#table_informasi').on('click', '.informasi_aktifkan', function(event) {
        event.preventDefault();
        url = $(this).attr('href');
        swal({
            title: "Aktifkan Informasi?",
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Aktifkan!',
            cancelButtonText: 'Batal!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false
        }).then(function (data) {
            if (data.value) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    data: { },
                })
                .done(function(res) {
                    if (res.code == 200) {
                        table_informasi.ajax.reload()
                        new PNotify({
                            title: 'Success',
                            text: 'Data berhasil diaktifkan',
                            addclass: 'bg-success border-success'
                        })
                    }
                })
                .fail(function(err) {
                    new PNotify({
                        title: 'Error',
                        text: 'Data gagal diaktifkan',
                        addclass: 'bg-danger border-danger'
                    })
                })
                .always(function() {
                    
                });
                
            }   
        }, function (dismiss) {

        });
    });
}
</script>