<div class="content">
	<?php if ($this->input->get('jenis') && $this->input->get('jenis') == 'perpindahan_datang' ): ?>
		<!-- Basic card -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Perpindahan Datang</h5>
				<div class="header-elements">
					<div class="list-icons">
	            		<a class="list-icons-item" data-action="collapse"></a>
	            		<a class="list-icons-item" data-action="reload"></a>
	            		<a class="list-icons-item" data-action="remove"></a>
	            	</div>
	        	</div>
			</div>
			<form action="<?php echo site_url('pengajuan_surat/submit') ?>" method="POST" accept-charset="utf-8" autocomplete="off">
				<input type="hidden" name="jenis" value="perpindahan_datang">
				<div class="card-body">

					<?php if ($this->session->flashdata('message')): ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
							<span class="font-weight-semibold">Berhasil!</span> <?php echo $this->session->flashdata('message') ?>
					    </div>
					<?php endif ?>
					
					<div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-6">
		                        <label class="">Nama Pengaju:</label>
		                        <input type="text" placeholder="Nama Pengaju" id="" name="nama_pengirim" class="form-control" value="">
		                    </div>
		                     <div class="col-md-6">
		                        <label class="">Tanggal</label>
		                        <input type="date" placeholder="Tanggal" name="tanggal" class="form-control daterange-single" data-validation="required" value="" >
		                    </div>
		                </div>
		            </div>
		            <hr>
	            	<h5>Data Diri</h5>
	            	<div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-6">
		                       	<label>NIK</label>
	                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
		                    </div>
		                    <div class="col-md-6">
		                        <label>No KK</label>
	                        	<input type="number" class="form-control" placeholder="No KK" name="no_kk" required="" />
		                    </div>
		                </div>
		            </div>
		            <div class="form-group mb-2">
		                <div class="row">
		                	<div class="col-md-6">
		                        <label>Nama</label>
	                        	<input class="form-control" placeholder="Nama" name="nama" required="" />
		                    </div>
		                    <div class="col-md-6">
		                       	<label>SHDK</label>
		                        <select class="form-control select" data-fouc data-placeholder="SHDK" name="shdk" required="">
		                        	<option></option>
		                            <option value="kepala keluarga">Kepala Keluarga</option>
		                            <option value="istri">Ibu</option>
		                            <option value="anak">Anak</option>
		                        </select>
		                    </div>
		                    
		                </div>
		            </div>
		            <div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-3">
		                       	<label>Jenis Kelamin</label>
		                        <select class="form-control select" data-fouc data-placeholder="Jenis Kelamin" name="jenis_kelamin" required="">
		                        	<option></option>
		                            <option value="laki-laki">Laki-Laki</option>
		                            <option value="perempuan">Perempuan</option>
		                        </select>
		                    </div>
		                     <div class="col-md-6">
		                        <label>Tempat Lahir</label>
	                        	<input class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required="" />
		                    </div>
		                    <div class="col-md-3">
		                    	 <label>Tanggal Lahir</label>
	                        	<input type="date" class="form-control" placeholder="Tanggal" name="tanggal_lahir" required="" />
		                    </div>
		                </div>
		            </div>
		            <div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-6">
		                        <label>Status</label>
		                        <select class="form-control select" data-placeholder="Status" name="status" required="">
		                        	<option></option>
		                            <option value="kawin">Kawin</option>
		                            <option value="belum kawin">Belum Kawin</option>
		                        </select>
		                    </div>
		                     <div class="col-md-6">
		                        <div class="form-group mb-2">
			                        <label>Pekerjaan</label>
			                        <input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" required="" />
			                    </div>
		                    </div>
		                </div>
		            </div>
		            <div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-6">
		                        <label>Nama Ibu</label>
	                        	<input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu"  required="" />
		                    </div>
		                    <div class="col-md-6">
		                        <label>Nama Ayah</label>
	                        	<input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" />
		                    </div>
		                </div>
		            </div>
	              
	                <hr>
	                <h5>Asal Kedatangan</h5>
	                <div class="form-group mb-2">
	                    <label>Alamat</label>
	                    <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
	                </div>
	                <div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-2">
		                        <label>RT</label>
	                    		<input type="number" class="form-control" placeholder="rt" name="asal_rt" required="" />
		                    </div>
		                    <div class="col-md-2">
		                       	<label>RW</label>
	                    		<input type="number" class="form-control" placeholder="rw" name="asal_rw" required="" />
		                    </div>
		                    <div class="col-md-8">
			                    <label>Desa</label>
			                    <input type="text" class="form-control" placeholder="Desa" name="asal_desa" required="" />
			                </div>
		                </div>
		            </div>
	                <div class="form-group mb-2">
		                <div class="row">
		                	<div class="col-md-6">
			                    <label>Kecamatan</label>
			                    <input type="text" class="form-control" placeholder="Kecamatan" name="asal_kecamatan" required="" />
			                </div>
			                 <div class="col-md-6">
			                    <label>Kabupaten/Kota</label>
			                    <input type="text" class="form-control" placeholder="Kabupaten/Kota" name="asal_kabupaten_kota" required="" />
			                </div>
		                </div>
		            </div>
	                <hr>
	                <h4>Tujuan Kedatangan</h4>
	                 <div class="form-group mb-2">
	                    <label>Alamat</label>
	                    <textarea class="form-control" placeholder="Alamat" name="tujuan_alamat" required=""></textarea>
	                </div>
			        <div class="form-group mb-2">
			        	<div class="row">
			        		<div class="col-md-6">
			                    <label>RT</label>
			                    <input type="number" class="form-control" placeholder="rt" name="tujuan_rt" required="" />
			                </div>
			        		<div class="col-md-6">
			                    <label>RW</label>
			                    <input type="number" class="form-control" placeholder="rw" name="tujuan_rw" />
			                </div>
			        	</div>
			        </div>
			        <hr>
	                <h5>Keterangan Tambahan</h5>
	                <div class="form-group mb-2">
	                    <textarea class="form-control" placeholder="Keterangan Tambahan" name="keterangan" rows="3"></textarea>
	                </div>
			        <hr>
			        <div class="form-group text-center">
			        	<button type="button" class="btn btn-link">Batal</button>
		                <button type="submit" class="btn btn-primary">Submit</button>
			        </div>
		           
				</div>
			</form>
				
		</div>
		<!-- /basic card -->
	<?php endif ?>

	<?php if ($this->input->get('jenis') && $this->input->get('jenis') == 'perpindahan_pergi' ): ?>
		<!-- Basic card -->
		<form action="<?php echo site_url('pengajuan_surat/submit') ?>" method="POST" accept-charset="utf-8" autocomplete="off">
			<input type="hidden" name="jenis" value="perpindahan_pergi">
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Perpindahan Pergi</h5>
					<div class="header-elements">
						<div class="list-icons">
		            		<a class="list-icons-item" data-action="collapse"></a>
		            		<a class="list-icons-item" data-action="reload"></a>
		            		<a class="list-icons-item" data-action="remove"></a>
		            	</div>
		        	</div>
				</div>

				<div class="card-body">
					<?php if ($this->session->flashdata('message')): ?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
							<span class="font-weight-semibold">Berhasil!</span> <?php echo $this->session->flashdata('message') ?>
					    </div>
					<?php endif ?>
					<?php if ($this->session->flashdata('error_message')): ?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
							<span class="font-weight-semibold">Error!</span> <?php echo $this->session->flashdata('error_message') ?>
					    </div>
					<?php endif ?>
					<div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-6">
		                        <label class="">Nama Pengaju:</label>
		                        <input type="text" placeholder="Nama Pengaju" id="" name="nama_pengirim" class="form-control" value="">
		                    </div>
		                     <div class="col-md-6">
		                        <label class="">Tanggal</label>
		                        <input type="date" placeholder="Tanggal" name="date" class="form-control" data-validation="required" value="" >
		                    </div>
		                </div>
		            </div>
		            <hr>
		            <h5>Data Diri</h5>
	            	<div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-6">
		                       	<label>NIK</label>
	                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
		                    </div>
		                    <div class="col-md-6">
		                        <label>Nama</label>
	                        	<input type="text" class="form-control" placeholder="Nama" name="name" required="" />
		                    </div>
		                </div>
		            </div>
		            <div class="form-group mb-2">
	                    <label>Alamat</label>
	                    <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
	                </div>
	                <div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-2">
		                        <label>RT</label>
	                    		<input type="number" class="form-control" placeholder="RT" name="asal_rt" required="" />
		                    </div>
		                    <div class="col-md-2">
		                       	<label>RW</label>
	                    		<input type="number" class="form-control" placeholder="RW" name="asal_rw" required="" />
		                    </div>
		                    <div class="col-md-8">
			                    <label>Desa</label>
			                    <input type="text" class="form-control" placeholder="Desa" name="asal_desa" required="" />
			                </div>
		                </div>
		            </div>
		            <hr>
		           	<h5>Tujuan Perpindahan</h5>
	                <div class="form-group mb-2">
	                    <label>Alamat</label>
	                    <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
	                </div>
	                <div class="form-group mb-2">
		                <div class="row">
		                    <div class="col-md-2">
		                        <label>RT</label>
	                    		<input type="number" class="form-control" placeholder="RT" name="asal_rt" required="" />
		                    </div>
		                    <div class="col-md-2">
		                       	<label>RW</label>
	                    		<input type="number" class="form-control" placeholder="RW" name="asal_rw" required="" />
		                    </div>
		                    <div class="col-md-8">
			                    <label>Desa</label>
			                    <input type="text" class="form-control" placeholder="Desa" name="asal_desa" required="" />
			                </div>
		                </div>
		            </div>
	                <div class="form-group mb-2">
		                <div class="row">
		                	<div class="col-md-6">
			                    <label>Kecamatan</label>
			                    <input type="text" class="form-control" placeholder="Kecamatan" name="asal_kecamatan" required="" />
			                </div>
			                 <div class="col-md-6">
			                    <label>Kabupaten/Kota</label>
			                    <input type="text" class="form-control" placeholder="Kabupaten/Kota" name="asal_kabupaten_kota" required="" />
			                </div>
		                </div>
		            </div>
		            <hr>
		            <h5>Keterangan Tambahan</h5>
	                <div class="form-group mb-2">
	                    <textarea class="form-control" placeholder="Keterangan Tambahan" name="keterangan" rows="3"></textarea>
	                </div>
	                <hr>
	                <div class="form-group text-center">
			        	<button type="button" class="btn btn-link">Batal</button>
		                <button type="submit" class="btn btn-primary">Submit</button>
			        </div>
				</div>
			</div>
		</form>
		<!-- /basic card -->
	<?php endif ?>

	<?php if ($this->input->get('jenis') && $this->input->get('jenis') == 'kematian' ): ?>
		<!-- Basic card -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Kematian</h5>
				<div class="header-elements">
					<div class="list-icons">
	            		<a class="list-icons-item" data-action="collapse"></a>
	            		<a class="list-icons-item" data-action="reload"></a>
	            		<a class="list-icons-item" data-action="remove"></a>
	            	</div>
	        	</div>
			</div>

			<div class="card-body">
				<div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                        <label class="">Nama Pengaju:</label>
	                        <input type="text" placeholder="Nama Pengaju" id="" name="nama_pengaju" class="form-control" value="">
	                    </div>
	                     <div class="col-md-6">
	                        <label class="">Tanggal</label>
	                        <input type="text" placeholder="Tanggal" name="date" id="date" class="form-control daterange-single" data-validation="required" value="" >
	                    </div>
	                </div>
	            </div>
	           	<hr>
	            <h5>Data</h5>
            	<div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                       	<label>NIK</label>
                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
	                    </div>
	                    <div class="col-md-6">
	                        <label>Nama</label>
                        	<input type="text" class="form-control" placeholder="Nama" name="name" required="" />
	                    </div>
	                </div>
	            </div>
	            <div class="form-group mb-2">
                    <label>Alamat</label>
                    <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
                </div>
                <div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-2">
	                        <label>RT</label>
                    		<input type="number" class="form-control" placeholder="rt" name="asal_rt" required="" />
	                    </div>
	                    <div class="col-md-2">
	                       	<label>RW</label>
                    		<input type="number" class="form-control" placeholder="rw" name="asal_rw" required="" />
	                    </div>
	                    <div class="col-md-8">
		                    <label>Desa</label>
		                    <input type="text" class="form-control" placeholder="Desa" name="asal_desa" required="" />
		                </div>
	                </div>
	            </div>
	            <hr>
	            <h5>Data Kematian</h5>
	            <div class="form-group mb-2">
	                <div class="row">
	                	<div class="col-md-6">
	                        <label class="">Tanggal Kematian</label>
	                        <input type="text" placeholder="Tanggal" name="date" id="date" class="form-control daterange-single" data-validation="required" value="" >
	                    </div>
	                    <div class="col-md-6">
	                        <label class="">Lokasi:</label>
	                        <input type="text" placeholder="Lokasi" id="" name="" class="form-control" value="">
	                    </div>
	                   
	                </div>
	            </div>
	             <div class="form-group mb-2">
                    <label>Keterangan</label>
                    <textarea class="form-control" placeholder="Keterangan" name="asal_alamat" required=""></textarea>
                </div>
                <hr>
                <div class="form-group text-center">
		        	<button type="button" class="btn btn-link">Batal</button>
	                <button type="submit" class="btn btn-primary">Submit</button>
		        </div>
			</div>
		</div>
		<!-- /basic card -->
	<?php endif ?>

	<?php if ($this->input->get('jenis') && $this->input->get('jenis') == 'lahir_mati' ): ?>
		<!-- Basic card -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Lahir Mati</h5>
				<div class="header-elements">
					<div class="list-icons">
	            		<a class="list-icons-item" data-action="collapse"></a>
	            		<a class="list-icons-item" data-action="reload"></a>
	            		<a class="list-icons-item" data-action="remove"></a>
	            	</div>
	        	</div>
			</div>

			<div class="card-body">
				<div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                        <label class="">Nama Pengaju:</label>
	                        <input type="text" placeholder="Nama Pengaju" id="" name="nama_pengaju" class="form-control" value="">
	                    </div>
	                     <div class="col-md-6">
	                        <label class="">Tanggal</label>
	                        <input type="text" placeholder="Tanggal" name="date" id="date" class="form-control daterange-single" data-validation="required" value="" >
	                    </div>
	                </div>
	            </div>
	           	<hr>
	            <h5>Data</h5>
            	<div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                       	<label>NIK</label>
                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
	                    </div>
	                    <div class="col-md-6">
	                        <label>Nama</label>
                        	<input type="text" class="form-control" placeholder="Nama" name="name" required="" />
	                    </div>
	                </div>
	            </div>
	            <div class="form-group mb-2">
                    <label>Alamat</label>
                    <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
                </div>
                <div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-2">
	                        <label>RT</label>
                    		<input type="number" class="form-control" placeholder="rt" name="asal_rt" required="" />
	                    </div>
	                    <div class="col-md-2">
	                       	<label>RW</label>
                    		<input type="number" class="form-control" placeholder="rw" name="asal_rw" required="" />
	                    </div>
	                    <div class="col-md-8">
		                    <label>Desa</label>
		                    <input type="text" class="form-control" placeholder="Desa" name="asal_desa" required="" />
		                </div>
	                </div>
	            </div>
	            <hr>
	            <h5>Data Kematian</h5>
	            <div class="form-group mb-2">
	                <div class="row">
	                	<div class="col-md-6">
	                        <label class="">Tanggal Kelahiran</label>
	                        <input type="text" placeholder="Tanggal" name="date" id="date" class="form-control daterange-single" data-validation="required" value="" >
	                    </div>
	                	<div class="col-md-6">
	                        <label class="">Tanggal Kematian</label>
	                        <input type="text" placeholder="Tanggal" name="date" id="date" class="form-control daterange-single" data-validation="required" value="" >
	                    </div>
	                   
	                </div>
	            </div>
	            <div class="form-group mb-2">
	                <div class="row">
	            		<div class="col-md-6">
	                        <label class="">Lokasi:</label>
	                        <input type="text" placeholder="Lokasi" id="" name="" class="form-control" value="">
	                    </div>
	                </div>
	            </div>
	            <div class="form-group mb-2">
                    <label>Keterangan</label>
                    <textarea class="form-control" placeholder="Keterangan" name="asal_alamat" required=""></textarea>
                </div>
                <hr>
                <div class="form-group text-center">
		        	<button type="button" class="btn btn-link">Batal</button>
	                <button type="submit" class="btn btn-primary">Submit</button>
		        </div>
			</div>
		</div>
		<!-- /basic card -->
	<?php endif ?>
	
	<?php if ($this->input->get('jenis') && $this->input->get('jenis') == 'kelahiran' ): ?>
		<!-- Basic card -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Kelahiran</h5>
				<div class="header-elements">
					<div class="list-icons">
	            		<a class="list-icons-item" data-action="collapse"></a>
	            		<a class="list-icons-item" data-action="reload"></a>
	            		<a class="list-icons-item" data-action="remove"></a>
	            	</div>
	        	</div>
			</div>
			
			<div class="card-body">
				<div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                        <label class="">Nama Pengaju:</label>
	                        <input type="text" placeholder="Nama Pengaju" id="" name="nama_pengaju" class="form-control" value="">
	                    </div>
	                    <div class="col-md-6">
	                       	<label>NIK</label>
                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
	                    </div>
	                    
	                </div>
	            
	            </div>
	            <div class="form-group mb-2">
                    <label>Alamat</label>
                    <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
                </div>
	            <hr>
            	<h5>Data Kelahiran</h5>
	            <div class="form-group mb-2">
	                <div class="row">
	                	<div class="col-md-12">
	                        <label>Nama</label>
                        	<input class="form-control" placeholder="Nama" name="nama" required="" />
	                    </div>
	                    
	                </div>
	            </div>
	            <div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-3">
	                       	<label>Jenis Kelamin</label>
	                        <select class="form-control select" data-fouc data-placeholder="Jenis Kelamin" name="jenis_kelamin" required="">
	                        	<option></option>
	                            <option value="laki-laki">Laki-Laki</option>
	                            <option value="perempuan">Perempuan</option>
	                        </select>
	                    </div>
	                     <div class="col-md-6">
	                        <label>Lokasi Lahir</label>
                        	<input class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required="" />
	                    </div>
	                    <div class="col-md-3">
	                    	 <label>Tanggal Lahir</label>
                        	<input type="date" class="form-control" placeholder="Tanggal" name="tanggal_lahir" required="" />
	                    </div>
	                </div>
	            </div>
	          
	            <div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                        <label>Nama Ibu</label>
                        	<input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu"  required="" />
	                    </div>
	                    <div class="col-md-6">
	                       	<label>NIK</label>
                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
	                    </div>
	                </div>
	            </div>
	            <div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                        <label>Nama Ayah</label>
                        	<input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" />
	                    </div>
	                    <div class="col-md-6">
	                       	<label>NIK</label>
                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
	                    </div>
	                </div>
	            </div>
		        <hr>
                <h5>Keterangan Tambahan</h5>
                <div class="form-group mb-2">
                    <textarea class="form-control" placeholder="Keterangan Tambahan" name="keterangan" rows="3"></textarea>
                </div>
		        <hr>
		        <div class="form-group text-center">
		        	<button type="button" class="btn btn-link">Batal</button>
	                <button type="submit" class="btn btn-primary">Submit</button>
		        </div>
	           
			</div>
		</div>
		<!-- /basic card -->
	<?php endif ?>

	<?php if ($this->input->get('jenis') && $this->input->get('jenis') == 'permohonan' ): ?>
		<!-- Basic card -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Permohonan</h5>
				<div class="header-elements">
					<div class="list-icons">
	            		<a class="list-icons-item" data-action="collapse"></a>
	            		<a class="list-icons-item" data-action="reload"></a>
	            		<a class="list-icons-item" data-action="remove"></a>
	            	</div>
	        	</div>
			</div>
			
			<div class="card-body">
				<div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-6">
	                        <label class="">Nama Pengaju:</label>
	                        <input type="text" placeholder="Nama Pengaju" id="" name="nama_pengaju" class="form-control" value="">
	                    </div>
	                    <div class="col-md-6">
	                       	<label>NIK</label>
                        	<input type="number" class="form-control" placeholder="NIK" name="nik" required="" />
	                    </div>
	                </div>
	            
	            </div>
	            <div class="form-group mb-2">
                    <label>Alamat</label>
                    <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
                </div>
	            <hr>
            	<h5>Data Permohonan</h5>
	            <div class="form-group mb-2">
	                <div class="row">
	                	<div class="col-md-12">
	                        <label>Jenis Permohonan</label>
	                        <select class="form-control select" data-fouc data-placeholder="Jenis Permohonan" name="" required="">
	                            <option></option>
	                            <option value="laki-laki">Surat Keterangan Domisili</option>
	                            <option value="perempuan">Surat Pengantar Kepolisian</option>
	                            <option value="perempuan">Surat Keterangan Tidak Mampu</option>
	                        </select>
	                    </div>
	                    
	                </div>
	            </div>
	            <div class="form-group mb-2">
                    <label>Guna kepentingan</label>
                    <textarea class="form-control" placeholder="Guna kepentingan" name="asal_alamat" required=""></textarea>
                </div>
		        <hr>
                <h5>Keterangan Tambahan</h5>
                <div class="form-group mb-2">
                    <textarea class="form-control" placeholder="Keterangan Tambahan" name="keterangan" rows="3"></textarea>
                </div>
		        <hr>
		        <div class="form-group text-center">
		        	<button type="button" class="btn btn-link">Batal</button>
	                <button type="submit" class="btn btn-primary">Submit</button>
		        </div>
	           
			</div>
		</div>
		<!-- /basic card -->
	<?php endif ?>
	<?php if (!$this->input->get('jenis')): ?>
		<div class="card">
	        <div class="card-header header-elements-inline pb-2 pt-2">
	            <div>
	                 <a href="#" class="btn btn-primary btn-sm" id="button_tambah">Pengajuan Surat</a>
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
	                    </tr>
	                </thead>
	                <tbody>
	                    
	                </tbody>
	            </table>           
	    </div>
	<?php endif ?>


</div>

<div id="modal_pengajuan" class="modal fade" tabindex="-1" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Pengajuan Surat</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<form action="" method="GET">
				<div class="modal-body">
					<div class="form-group mb-2">
						<label>Jenis Pengajuan</label>
						<select data-placeholder="Jenis Pengajuan" name="jenis" class="form-control select" id="" data-fouc>
							<option></option>
							<option value="perpindahan_datang">Perpindahaan Datang</option>
							<option value="perpindahan_pergi">Perpindahaan Pergi</option>
							<option value="kematian">Kematian</option>
							<option value="lahir_mati">Lahir Mati</option>
							<option value="kelahiran">Kelahiran</option>
							<option value="permohonan">Permohonan</option>
						</select>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
					<button type="submit" class="btn bg-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>



<script type="text/javascript">
jQuery(document).ready(function($) {
	<?php if (!$this->input->get('jenis')): ?>
	setTimeout(function() {
		$('#modal_pengajuan').modal('show');
	}, 100);
	<?php endif ?>
	
	$('#button_tambah').click(function(event) {
		event.preventDefault();
		$('#modal_pengajuan').modal('show');
	});
	
});
</script>
<?php if (!$this->input->get('jenis')): ?>
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
		    url: '<?php echo site_url('pengajuan_surat/get_data') ?>',
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
                targets: -1,
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

		],
		autoWidth: true,
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

    table_pengajuan.on( 'order.dt search.dt', function () {
        table_pengajuan.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1
        } )
    } ).draw()

    
}
</script>
<?php endif ?>