<script src="<?php echo base_url(); ?>assets/form_validator/jquery.form-validator.js"></script>

<div class="content pt-5">
    
    <div class="row">
        <div class="col-md-4 offset-4">
            <div class="card">
                <div class="card-header header-elements-inline pb-2 pt-2 align-content-center">
                    <h5>Ganti Password</h5>
                   
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url('ganti_password_submit') ?>" method="POST" accept-charset="utf-8" id="form_kematian">
                    
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-danger border-0 alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                            <span class="font-weight-semibold"></span><?php echo $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif ?>
                        
                  
                    <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" class="form-control" placeholder="Password Lama" name="old" data-validation="required" />
                    </div>

                    <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" class="form-control" placeholder="Password Baru" name="new" data-validation="required" />
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" placeholder="Konfirmasi Password" name="new_confirm" data-validation="required" />
                    </div>
                    <a href="<?php echo site_url('/'); ?>" title="" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                
                </form>
                </div>
            </div>
        </div>
    </div>
     
</div>


<script type="text/javascript">

$(document).ready(function() {
	
    $.validate({
        lang: 'en'
    })

	$('#button_tambah').click(function(event) {
		event.preventDefault();

		$('#form_kematian').attr('action', $(this).attr('href'));

		$('#modal_kematian').modal('show');
	});
});


</script>