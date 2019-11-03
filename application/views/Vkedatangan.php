<!-- Page header -->
<div class="page-header pb-1 pt-1">
    <div class="page-header-content header-elements-md-inline pb-1 pt-1">
        <div class="page-title d-flex p-1">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Kedatangan</span></h4>
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
                 <a href="<?php echo site_url('kedatangan/insert') ?>" class="btn btn-primary btn-sm" id="button_tambah">Tambah</a>
            </div>
            <div class="header-elements d-flex flex-row">
                <div class="list-icons">
                  
                </div>
            </div>
        </div>
             <table class="table table-striped border table-xs table-hover" id="table_kedatangan" style="min-width: 100%;">
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
                        <th>Alamat Asal</th>
                        <th>RT Asal</th>
                        <th>RW Asal</th>
                        <th>Desa Asal</th>
                        <th>Kecamatan Asal</th>
                        <th>Kabupaten/Kota Asal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>           
    </div>
</div>

<div class="modal fade" id="modal_kedatangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-user mr-2"></i> &nbsp;Data Kedatangan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_kedatangan">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id_datang" />
                    <input type="hidden" placeholder="" name="id_asalkedatangan" />
                    <input type="hidden" placeholder="" name="id_tujuankedatangan" />


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
                    <h4>Asal Kedatangan</h4>
                     <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>RT</label>
                        <input type="number" class="form-control" placeholder="rt" name="asal_rt" required="" />
                    </div>
                    <div class="form-group">
                        <label>RW</label>
                        <input type="number" class="form-control" placeholder="rw" name="asal_rw" required="" />
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        <input type="text" class="form-control" placeholder="Desa" name="asal_desa" required="" />
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" placeholder="Kecamatan" name="asal_kecamatan" required="" />
                    </div>
                    <div class="form-group">
                        <label>Kabupaten/Kota</label>
                        <input type="text" class="form-control" placeholder="Kabupaten/Kota" name="asal_kabupaten_kota" required="" />
                    </div>
                    <hr>
                    <h4>Tujuan Kedatangan</h4>
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
                        <input type="number" class="form-control" placeholder="rw" name="tujuan_rw" />
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

		$('#form_kedatangan').attr('action', $(this).attr('href'));

		$('#modal_kedatangan').modal('show');
	});
});


function get_data () {
	var table_kedatangan = $('#table_kedatangan').DataTable({
		destroy: true,
    	processing: true,
    	ajax: {
    		type: "GET",
		    url: '<?php echo site_url('kedatangan/get_data') ?>',
		    data: {
		    }
		},
		columns: [
            { data: 'id_datang' },
            { data: 'no_surat' },
            { data: 'tanggal_surat' },
            { data: 'nik' },
            { data: 'nama' },
            { data: 'jenis_kelamin' },
            { data: 'tempat_lahir' },
            { data: 'tanggal_lahir' },
            { data: 'asal_alamat' },
            { data: 'asal_rt' },
            { data: 'asal_rw' },
            { data: 'asal_desa' },
            { data: 'asal_kecamatan' },
            { data: 'asal_kabupaten_kota' },
            { defaultContent: '' },
            ], 
        columnDefs: [
        	
		    {
		    	targets: -1,
		    	className: "text-center",
		    	data: "id_pindah",
		    	render : function(data, type, full, meta) {

                    return `<a href="<?php echo site_url('kedatangan/update') ?>" class=" mr-1 kedatangan_edit"><i class="icon-pencil7"></i></a>
                    <a href="<?php echo site_url('kedatangan/delete') ?>/${data}" class="kedatangan_delete" style="color:red;"><i class="icon-bin"></i></a>`
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

	$('#table_kedatangan').on('click', '.kedatangan_edit', function(event) {
    	event.preventDefault();
    	
    	data = table_kedatangan.row($(this).parents('tr')).data();

    	$.each(data, function(index, val) {
    		$('#form_kedatangan').find('input[name="'+index+'"]').val(val).trigger('change')
    		$('#form_kedatangan').find('textarea[name="'+index+'"]').val(val).trigger('change')
    		$('#form_kedatangan').find('select[name="'+index+'"]').val(val).trigger('change')


    	});

    	$('#form_kedatangan').attr('action', $(this).attr('href'));

		$('#modal_kedatangan').modal('show');

    });

    
}
</script>