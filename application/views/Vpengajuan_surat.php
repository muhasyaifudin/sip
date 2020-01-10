<!-- Page header -->
<div class="page-header pb-1 pt-1">
    <div class="page-header-content header-elements-md-inline pb-1 pt-1">
        <div class="page-title d-flex p-1">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Pengajuan Surat</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    
    </div>
</div>
<!-- /page header -->
<div class="content pt-0">
     <div class="card">
        <div class="card-header header-elements-inline pb-2 pt-2">
            <div>
                 <a href="<?php echo site_url('admin/pengajuan_surat/insert') ?>" class="btn btn-primary btn-sm" id="button_tambah">Tambah</a>
            </div>
            <div class="header-elements d-flex flex-row">
                <div class="list-icons">
                  
                </div>
            </div>
        </div>
             <table class="table table-striped border table-xs table-hover" id="table_pengajuan" style="min-width: 100%; white-space: nowrap;">
                <thead>
                    <tr>
                        <th width="5px">#</th>
                        <th>Tanggal</th>
                        <th>Nama Pengirim</th>
                        <th>Jenis Surat</th>
                        <th>Sub Jenis Surat</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th width="5px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>           
    </div>
</div>

<div class="modal fade" id="modal_pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><i class="icon-user mr-2"></i> &nbsp;Pengajuan Surat</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="" method="POST" accept-charset="utf-8" id="form_pengajuan">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />
                    <input type="hidden" placeholder="" name="id_tujuanpengajuan" />

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

<?php 
include 'Vpengajuan_surat_modal.php';

 ?>
<script type="text/javascript">

$(document).ready(function() {
	get_data();

	$('#button_tambah').click(function(event) {
		event.preventDefault();

		$('#form_pengajuan').attr('action', $(this).attr('href'));

		$('#modal_pengajuan').modal('show');
	});
});


function get_data () {
	var table_pengajuan = $('#table_pengajuan').DataTable({
		destroy: true,
    	processing: true,
    	ajax: {
    		type: "GET",
		    url: '<?php echo site_url('admin/pengajuan_surat/get_data') ?>',
		    data: {
		    }
		},
		columns: [
            { data: 'no', defaultContent: '', className: "text-center", },
            { data: 'tanggal' },
            { data: 'nama_pengirim' },
            { data: 'jenis' },
            { data: 'sub_jenis' },
            { data: 'keterangan' },
            { data: 'status_pengajuan' },
            { defaultContent: '' },
            ], 
        columnDefs: [
        	{
                targets: 3,
                className: "text-left",
                data: "jenis",
                render : function(data, type, full, meta) {
                    if (data == 'perpindahan_datang') {
                        return `Perpindahan Datang`
                    }
                    else if (data == 1) {
                    }
                }
            },
            {
                targets:4,
                className: "text-left",
                data: "sub_jenis",
                render : function(data, type, full, meta) {
                    if (data == 'perpindahan_datang') {
                        return `Perpindahan Datang`
                    }
                    else if (data == 1) {
                    }
                }
            },
            {
                targets: -2,
                className: "text-center",
                data: "status_pengajuan",
                render : function(data, type, full, meta) {
                    if (data == 0) {
                        return `<span class="badge badge-warning">Belum Diproses</span>`
                    }
                    else if (data == 1) {
                        return `<span class="badge badge-success">Diproses</span>`
                    }
                }
            },

		    {
		    	targets: -1,
		    	className: "text-center",
		    	data: "id",
		    	render : function(data, type, full, meta) {
                    return `
                    <a href="<?php echo site_url('admin/pengajuan_surat/update') ?>" class=" mr-1 pengajuan_proses"><i class="icon-enter"></i></a>
                    <a href="<?php echo site_url('admin/pengajuan_surat/delete') ?>/${data}" class="pengajuan_delete" style="color:red;"><i class="icon-bin"></i></a>
                    `
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

    table_pengajuan.on( 'order.dt search.dt', function () {
        table_pengajuan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1
        } )
    } ).draw()

	$('#table_pengajuan').on('click', '.pengajuan_proses', function(event) {
    	event.preventDefault();
    	
    	data = table_pengajuan.row($(this).parents('tr')).data();

        $.ajax({
            url: `<?php echo site_url('admin/pengajuan_surat/detail') ?>`,
            type: 'GET',
            dataType: 'json',
            data: data,
        })
        .done(function(res) {
            if (res) {
                
                $.each(res.data, function(index, val) {
                    $('#form_kedatangan').find('input[name="'+index+'"]').val(val).trigger('change')
                    $('#form_kedatangan').find('textarea[name="'+index+'"]').val(val).trigger('change')
                    $('#form_kedatangan').find('select[name="'+index+'"]').val(val).trigger('change')

                });

                $('#form_kedatangan').find('input[name="id_pengajuan"]').val(data.id)


                $('#modal_kedatangan').modal('show');
            }
        })

    	$.each(data, function(index, val) {
    		$('#form_pengajuan').find('input[name="'+index+'"]').val(val).trigger('change')
    		$('#form_pengajuan').find('textarea[name="'+index+'"]').val(val).trigger('change')
    		$('#form_pengajuan').find('select[name="'+index+'"]').val(val).trigger('change')


    	});

    	$('#form_pengajuan').attr('action', $(this).attr('href'));

		

    });

    
}
</script>