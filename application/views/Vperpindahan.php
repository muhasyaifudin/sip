<!-- Page header -->
<div class="page-header pb-1 pt-1">
    <div class="page-header-content header-elements-md-inline pb-1 pt-1">
        <div class="page-title d-flex p-1">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Perpindahan</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    
    </div>
</div>
<!-- /page header -->
<div class="content pt-0">
     <div class="card">
        <div class="card-header header-elements-inline pb-2 pt-2">
            <div>
                 <a href="<?php echo site_url('perpindahan/insert') ?>" class="btn btn-primary btn-sm" id="button_tambah">Tambah</a>
            </div>
            <div class="header-elements d-flex flex-row">
                <div class="list-icons">
                  
                </div>
            </div>
        </div>
             <table class="table table-striped border table-xs table-hover" id="table_perpindahan" style="min-width: 100%; white-space: nowrap;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Surat</th>
                        <th>Tanggal Surat</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat Tujuan</th>
                        <th>RT Tujuan</th>
                        <th>RW Tujuan</th>
                        <th>Desa Tujuan</th>
                        <th>Kecamatan Tujuan</th>
                        <th>Kabupaten/Kota Tujuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>           
    </div>
</div>

<div class="modal fade" id="modal_perpindahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><i class="icon-user mr-2"></i> &nbsp;Data Perpindahan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_perpindahan">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />
                    <input type="hidden" placeholder="" name="id_tujuanperpindahan" />

	                <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input type="date" class="form-control" placeholder="Tanggal Surat" name="tanggal_surat" required="" />
                    </div>
                    <div class="form-group">
                        <label>No Surat</label>
                        <input class="form-control" placeholder="No Surat" name="no_surat" required="" />
                    </div>
                    <div class="form-group">
                        <label>Penduduk</label>
                        <select class="form-control select" data-placeholder="Penduduk" name="id_penduduk" required="" data-fouc>
                            <option></option>
                            <?php foreach ($penduduk as $value): ?>
                             <option value="<?= $value->id ?>"><?= $value->nik ?> - <?= $value->nama ?></option>
                                
                            <?php endforeach ?>
                        </select>
                    </div>
                    <hr>
                    <h4>Tujuan Perpindahan</h4>
                     <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="tujuan_alamat" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>RT</label>
                        <input type="number" class="form-control" placeholder="rt" name="tujuan_rt" required="" />
                    </div>
                    <div class="form-group">
                        <label>RW</label>
                        <input type="number" class="form-control" placeholder="rw" name="tujuan_rw" required="" />
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        <input type="text" class="form-control" placeholder="Desa" name="tujuan_desa" required="" />
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" placeholder="Kecamatan" name="tujuan_kecamatan" required="" />
                    </div>
                    <div class="form-group">
                        <label>Kabupaten/Kota</label>
                        <input type="text" class="form-control" placeholder="Kabupaten/Kota" name="tujuan_kabupaten_kota" required="" />
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

		$('#form_perpindahan').attr('action', $(this).attr('href'));

		$('#modal_perpindahan').modal('show');
	});
});


function get_data () {
	var table_perpindahan = $('#table_perpindahan').DataTable({
		destroy: true,
    	processing: true,
    	ajax: {
    		type: "GET",
		    url: '<?php echo site_url('admin/perpindahan/get_data') ?>',
		    data: {
		    }
		},
		columns: [
            { defaultContent: '' },
            { data: 'no_surat' },
            { data: 'tanggal_surat' },
            { data: 'nik' },
            { data: 'nama' },
            { data: 'jenis_kelamin' },
            { data: 'tempat_lahir' },
            { data: 'tanggal_lahir' },
            { data: 'tujuan_alamat' },
            { data: 'tujuan_rt' },
            { data: 'tujuan_rw' },
            { data: 'tujuan_desa' },
            { data: 'tujuan_kecamatan' },
            { data: 'tujuan_kabupaten_kota' },
            { defaultContent: '' },
            ], 
        columnDefs: [
        	
		    {
		    	targets: -1,
		    	className: "text-center",
		    	data: "id",
		    	render : function(data, type, full, meta) {
                    return `<a href="<?php echo site_url('admin/perpindahan/update') ?>" class=" mr-1 perpindahan_edit"><i class="icon-pencil7"></i></a>
                    <a href="<?php echo site_url('admin/perpindahan/delete') ?>/${data}" class="perpindahan_delete" style="color:red;"><i class="icon-bin"></i></a>`
		    	}
		    }
		],
		autoWidth: true,
		searching: true,
		pageLength: 10,
		scrollX: true,
        fixedColumns: true,
        fixedColumns: {
            leftColumns: 1,
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

    table_perpindahan.on( 'order.dt search.dt', function () {
        table_perpindahan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1
        } )
    } ).draw();

	$('#table_perpindahan').on('click', '.perpindahan_edit', function(event) {
    	event.preventDefault();
    	
    	data = table_perpindahan.row($(this).parents('tr')).data();

    	$.each(data, function(index, val) {
    		$('#form_perpindahan').find('input[name="'+index+'"]').val(val).trigger('change')
    		$('#form_perpindahan').find('textarea[name="'+index+'"]').val(val).trigger('change')
    		$('#form_perpindahan').find('select[name="'+index+'"]').val(val).trigger('change')


    	});

        $('#form_perpindahan').find('select[name="id_penduduk"]').val(data.id_penduduk).trigger('change')

    	$('#form_perpindahan').attr('action', $(this).attr('href'));

		$('#modal_perpindahan').modal('show');

    });

    $('#table_perpindahan').on('click', '.perpindahan_delete', function(event) {
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
                    type: 'POST',
                    dataType: 'json',
                })
                .done(function(res) {
                    if (res.code == 200) {
                        table_perpindahan.ajax.reload()
                        new PNotify({
                            title: 'Success',
                            text: 'Data berhasil dihapus',
                            addclass: 'bg-success border-success'
                        })
                    }

                    else {
                         new PNotify({
                            title: 'Error',
                            text: 'Data gagal dihapus',
                            addclass: 'bg-danger border-danger'
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

    
}
</script>