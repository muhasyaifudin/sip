<!-- Page header -->
<div class="page-header pb-1 pt-1">
    <div class="page-header-content header-elements-md-inline pb-1 pt-1">
        <div class="page-title d-flex p-1">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Kematian</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    
    </div>
</div>
<!-- /page header -->
<!-- /page header -->
<div class="content pt-0">
 
     <div class="card">
        <div class="card-header header-elements-inline pb-2 pt-2">
            <div>
                 <a href="<?php echo site_url('kematian/insert') ?>" class="btn btn-primary btn-sm" id="button_tambah">Tambah</a>
            </div>
            <div class="header-elements d-flex flex-row">
                <div class="list-icons">
                  
                </div>
            </div>
        </div>
             <table class="table table-striped border table-xs table-hover" id="table_kematian" style="min-width: 100%;">
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
                        <input type="date" class="form-control" placeholder="Tanggal Lapor" name="tanggal_lapor" required="" />
                    </div>
                    <div class="form-group">
                        <label>No Akta</label>
                        <input class="form-control" placeholder="No Akta" name="no_akta" required="" />
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
                   
                    <div class="form-group">
                        <label>Tanggal Meninggal</label>
                        <input type="date" class="form-control" placeholder="Tanggal Meninggal" name="tanggal_meninggal" required="" />
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
		    		return `<a href="<?php echo site_url('kematian/update') ?>" class=" mr-1 kematian_edit"><i class="icon-pencil7"></i></a>
                    <a href="<?php echo site_url('kematian/delete') ?>/${data}" class="kematian_delete" style="color:red;"><i class="icon-bin"></i></a>`
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