<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Data Perpindahan</h2>   
               
            </div>
        </div>
         <!-- /. ROW  -->
         <hr />
       
	    <div class="row">
	        <div class="col-md-12">
	            <!-- Advanced Tables -->
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                     <a href="<?php echo site_url('perpindahan/insert') ?>" class="btn btn-primary" id="button_tambah">Tambah</a>
	                </div>
	                <div class="panel-body">
                        <table class="table table-striped border table-bordered table-hover" id="table_perpindahan" width="130%">
                            <thead>
                                <tr>
                                    <th>ID</th>
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
	            <!--End Advanced Tables -->
	        </div>
	    </div>
        <!-- /. ROW  -->
    
    </div>
        <!-- /. ROW  -->
</div>
<div class="modal fade" id="modal_perpindahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form Perpindahan</h4>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_perpindahan">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id_pindah" />
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
                        <select class="form-control" placeholder="Penduduk" name="id_penduduk" required="">
                            <option value="-1">--Pilih Penduduk--</option>
                            <?php foreach ($penduduk as $value): ?>
                             <option value="<?= $value->id_penduduk ?>"><?= $value->nik ?> - <?= $value->nama ?></option>
                                
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
		    url: '<?php echo site_url('perpindahan/get_data') ?>',
		    data: {
		    }
		},
		columns: [
            { data: 'id_pindah' },
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
		    	data: "id_pindah",
		    	render : function(data, type, full, meta) {
		    		return '<a href="<?php echo site_url('perpindahan/update') ?>" class="btn btn-sm btn-primary mr-1 perpindahan_edit">Edit</a><a href="<?php echo site_url('perpindahan/delete') ?>/'+data+'" class="btn btn-sm btn-danger"> Delete</a>'
		    	}
		    }
		],
		autoWidth: true,
		searching: true,
		pageLength: 10,
		scrollY: 400+'px',
		scrollX: true,
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

	$('#table_perpindahan').on('click', '.perpindahan_edit', function(event) {
    	event.preventDefault();
    	
    	data = table_perpindahan.row($(this).parents('tr')).data();

    	$.each(data, function(index, val) {
    		$('#form_perpindahan').find('input[name="'+index+'"]').val(val).trigger('change')
    		$('#form_perpindahan').find('textarea[name="'+index+'"]').val(val).trigger('change')
    		$('#form_perpindahan').find('select[name="'+index+'"]').val(val).trigger('change')


    	});

    	$('#form_perpindahan').attr('action', $(this).attr('href'));

		$('#modal_perpindahan').modal('show');

    });

    
}
</script>