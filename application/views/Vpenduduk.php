<!-- Page header -->
<div class="page-header pb-1 pt-1">
    <div class="page-header-content header-elements-md-inline pb-1 pt-1">
        <div class="page-title d-flex p-1">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Data Penduduk</span></h4>
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
                 <a href="<?php echo site_url('admin/penduduk/insert') ?>" class="btn btn-primary btn-sm mr-2" style="margin-right: 10px;" id="button_tambah">Tambah</a>
            </div>
            <div class="header-elements d-flex flex-row">
                <div class="list-icons">
                    <form action="#" style="width: 200px;">
                        <select class="form-control select" data-fouc placeholder="Filter" name="filter" id="filter">
                            <option value="1" selected="">Semua</option>
                            <option value="2">Penduduk Aktif</option>
                            <option value="3">Penduduk Meninggal</option>
                            <option value="4">Penduduk Pindah</option>
                        </select>
                    </form>
                    
                </div>
            </div>
        </div>
           <table class="datatable-basic table-xs table" style="min-width: 100%; white-space: normal;" id="table_penduduk">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>NIK</th>
                        <th>No KK</th>
                        <th>SHDK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th>Nama Ibu</th>
                        <th>Nama Ayah</th>
                        <th>Alamat</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
    </div>
</div>
<!-- /content area -->
<div class="modal fade" id="modal_penduduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-user mr-2"></i> &nbsp;Data Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_penduduk">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />

	                <div class="form-group">
                        <label>NIK</label>
                        <input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
                    </div>
                    <div class="form-group">
                        <label>No KK</label>
                        <input type="number" class="form-control" placeholder="No KK" name="no_kk" required="" />
                    </div>
                    <div class="form-group">
                        <label>SHDK</label>
                        <select class="form-control" placeholder="SHDK" name="shdk" required="">
                            <option value="kepala keluarga">Kepala Keluarga</option>
                            <option value="istri">Ibu</option>
                            <option value="anak">Anak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" placeholder="Nama" name="nama" required="" />
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" placeholder="Jenis Kelamin" name="jenis_kelamin" required="">
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required="" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="Tanggal" name="tanggal_lahir" required="" />
                    </div>
                     <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" placeholder="Status" name="status" required="">
                            <option value="kawin">Kawin</option>
                            <option value="belum kawin">Belum Kawin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" required="" />
                    </div>
                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu"  required="" />
                    </div>
                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" />
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" placeholder="ALamat" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>RT</label>
                        <input type="number" class="form-control" placeholder="rt" name="rt" required="" />
                    </div>
                    <div class="form-group">
                        <label>RW</label>
                        <input type="number" class="form-control" placeholder="rw" name="rw" required="" />
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

		$('#form_penduduk').attr('action', $(this).attr('href'));

		$('#modal_penduduk').modal('show');
	});

    $('#filter').change(function(event) {
        event.preventDefault();
        var filter = $(this).val();
        get_data(filter);
    });
});


function get_data (filter = 1) {
	var table_penduduk = $('#table_penduduk').DataTable({
		destroy: true,
    	processing: true,
    	ajax: {
    		type: "GET",
		    url: '<?php echo base_url(); ?>/admin/penduduk/get_data?filter=' + filter,
		},
		columns: [
            { defaultContent: '' },
            { data: 'nik' },
            { data: 'no_kk' },
            { data: 'shdk' },
            { data: 'nama' },
            { data: 'jenis_kelamin' },
            { data: 'tempat_lahir' },
            { data: 'tanggal_lahir' },
            { data: 'status' },
            { data: 'pekerjaan' },
            { data: 'nama_ibu' },
            { data: 'nama_ayah' },
            { data: 'alamat' },
            { data: 'rt' },
            { data: 'rw' },
            { defaultContent: '' },
            ], 
        columnDefs: [
        	
		    {
		    	targets: -1,
		    	className: "text-center",
		    	data: "id",
                width: "100px",
		    	render : function(data, type, full, meta) {

                    return `<a href="<?php echo site_url('admin/penduduk/update') ?>" class=" mr-1 penduduk_edit"><i class="icon-pencil7"></i></a>
                    <a href="<?php echo site_url('admin/penduduk/delete') ?>/${data}" class="penduduk_delete" style="color:red;"><i class="icon-bin"></i></a>`
		    	}
		    }
		],
		autoWidth: false,
		searching: true,
		pageLength: 25,
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

    table_penduduk.on( 'order.dt search.dt', function () {
        table_penduduk.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1
        } )
    } ).draw()

	$('#table_penduduk').on('click', '.penduduk_edit', function(event) {
    	event.preventDefault();
    	
    	data = table_penduduk.row($(this).parents('tr')).data();

    	$.each(data, function(index, val) {
    		$('#form_penduduk').find('input[name="'+index+'"]').val(val).trigger('change')
    		$('#form_penduduk').find('textarea[name="'+index+'"]').val(val).trigger('change')
    		$('#form_penduduk').find('select[name="'+index+'"]').val(val).trigger('change')


    	});

    	$('#form_penduduk').attr('action', $(this).attr('href'));

		$('#modal_penduduk').modal('show');

    });

    $('#table_penduduk').on('click', '.penduduk_delete', function(event) {
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
						table_penduduk.ajax.reload()
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
}
</script>