<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Data Penduduk</h2>   
               
            </div>
        </div>
         <!-- /. ROW  -->
         <hr />
       
	    <div class="row">
	        <div class="col-md-12">
	            <!-- Advanced Tables -->
	            <div class="panel panel-default">
	                <div class="panel-heading">
                        <div class="">
                             <a href="<?php echo site_url('penduduk/insert') ?>" class="btn btn-primary mr-2" style="margin-right: 10px;" id="button_tambah">Tambah</a>

                             <select class="" placeholder="Filter" name="filter" id="filter">
                                <option value="1" selected="">Semua</option>
                                <option value="2">Penduduk Aktif</option>
                                <option value="3">Penduduk Meninggal</option>
                                <option value="4">Penduduk Pindah</option>

                            </select>
                        </div>
    	                    
	                </div>
	                <div class="panel-body">
                        <table class="table table-striped border table-bordered table-hover" width="130%" id="table_penduduk">
                            <thead>
                                <tr>
                                    <th>ID</th>
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
	            <!--End Advanced Tables -->
	        </div>
	    </div>
        <!-- /. ROW  -->
    
    </div>
        <!-- /. ROW  -->
</div>
<div class="modal fade" id="modal_penduduk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form Penduduk</h4>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_penduduk">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id_penduduk" />

	                <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" placeholder="NIK" name="nik" required="" />
                    </div>
                    <div class="form-group">
                        <label>No KK</label>
                        <input class="form-control" placeholder="No KK" name="no_kk" required="" />
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
		    url: '<?php echo base_url(); ?>/penduduk/get_data?filter=' + filter,
		},
		columns: [
            { data: 'id_penduduk' },
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
		    	data: "id_penduduk",
                width: "100px",
		    	render : function(data, type, full, meta) {
		    		return '<a href="<?php echo site_url('penduduk/update') ?>" class="btn btn-sm btn-primary mr-1 penduduk_edit">Edit</a><a href="<?php echo site_url('penduduk/delete') ?>/'+data+'" class="btn btn-sm btn-danger"> Delete</a>'
		    	}
		    }
		],
		autoWidth: true,
		searching: true,
		pageLength: 10,
		scrollY: 400+'px',
		scrollX: true,
        fixedColumns: {
            leftColumns: 1,
            rightColumns: 1
        },
		scrollCollapse: false,
		scroller: true,
		dom: '<"datatable-header"fl><"datatable-scroll-wrap"tr><"datatable-footer"ip>',
		language: {
            search: '<span>Search:</span> _INPUT_',
            searchPlaceholder: 'Type to Search...',
            lengthMenu: '<span>Show:</span> _MENU_',
            processing: '<i class="icon-spinner2 spinner"></i>',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        },
        
	});

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

    $('#departments_table').on('click', '.department_delete', function(event) {
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
						departments_table.ajax.reload()
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
</script>