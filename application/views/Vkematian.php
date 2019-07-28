<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
             <h2>Data Kematian</h2>   
               
            </div>
        </div>
         <!-- /. ROW  -->
         <hr />
       
	    <div class="row">
	        <div class="col-md-12">
	            <!-- Advanced Tables -->
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                     <a href="<?php echo site_url('kematian/insert') ?>" class="btn btn-primary" id="button_tambah">Tambah</a>
	                </div>
	                <div class="panel-body">
                        <table class="table table-striped border table-bordered table-hover" id="table_kematian">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>No Akta</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahit</th>
                                    <th>Alamat</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th>Tanggal Meninggal</th>
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
<div class="modal fade" id="modal_kematian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Form Kematian</h4>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_kematian">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id_kematian" />

	                <div class="form-group">
                        <label>Tanggal Lapor</label>
                        <input type="date" class="form-control" placeholder="Tanggal Lapor" name="tanggal_lapor" />
                    </div>
                    <div class="form-group">
                        <label>No Akta</label>
                        <input class="form-control" placeholder="No Akta" name="no_akta" />
                    </div>
                    <div class="form-group">
                        <label>Penduduk</label>
                        <select class="form-control" placeholder="Penduduk" name="id_penduduk">
                            <option value="-1">--Pilih Penduduk--</option>
                            <?php foreach ($penduduk as $value): ?>
                             <option value="<?= $value->id_penduduk ?>"><?= $value->nik ?> - <?= $value->nama ?></option>
                                
                            <?php endforeach ?>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label>Tanggal Meninggal</label>
                        <input type="date" class="form-control" placeholder="Tanggal Meninggal" name="tanggal_meninggal" />
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

		$('#form_kematian').attr('action', $(this).attr('href'));

		$('#modal_kematian').modal('show');
	});
});


function get_data () {
	var table_kematian = $('#table_kematian').DataTable({
		destroy: true,
    	processing: true,
    	ajax: {
    		type: "GET",
		    url: '<?php echo site_url('kematian/get_data') ?>',
		    data: {
		    }
		},
		columns: [
            { data: 'id_kematian' },
            { data: 'tanggal_lapor' },
            { data: 'no_akta' },
            { data: 'nik' },
            { data: 'nama' },
            { data: 'jenis_kelamin' },
            { data: 'tempat_lahir' },
            { data: 'tanggal_lahir' },
            { data: 'alamat' },
            { data: 'rt' },
            { data: 'rw' },
            { data: 'tanggal_meninggal' },
            { defaultContent: '' },
            ], 
        columnDefs: [
        	
		    {
		    	targets: -1,
		    	className: "text-center",
		    	data: "id_kematian",
		    	render : function(data, type, full, meta) {
		    		return '<a href="<?php echo site_url('kematian/update') ?>" class="btn btn-sm btn-primary mr-1 kematian_edit">Edit</a><a href="<?php echo site_url('kematian/delete') ?>/'+data+'" class="btn btn-sm btn-danger"> Delete</a>'
		    	}
		    }
		],
		autoWidth: true,
		searching: true,
		pageLength: 20,
		scrollY: 400+'px',
		scrollX: true,
		scrollCollapse: false,
		scroller: true,
		dom: '<"datatable-header"><"datatable-scroll-wrap"tr><"datatable-footer"ip>',
		language: {
            search: '<span>Search:</span> _INPUT_',
            searchPlaceholder: 'Type to Search...',
            lengthMenu: '<span>Show:</span> _MENU_',
            processing: '<i class="icon-spinner2 spinner"></i>',
            paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
        },
	});

	$('#table_kematian').on('click', '.kematian_edit', function(event) {
    	event.preventDefault();
    	
    	data = table_kematian.row($(this).parents('tr')).data();

    	$.each(data, function(index, val) {
    		$('#form_kematian').find('input[name="'+index+'"]').val(val).trigger('change')
    		$('#form_kematian').find('textarea[name="'+index+'"]').val(val).trigger('change')
    		$('#form_kematian').find('select[name="'+index+'"]').val(val).trigger('change')


    	});

    	$('#form_kematian').attr('action', $(this).attr('href'));

		$('#modal_kematian').modal('show');

    });

    
}
</script>