<div class="modal fade" id="modal_kedatangan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-user mr-2"></i> &nbsp;Proses Pengajuan Surat Kedatangan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?php echo site_url('admin/pengajuan_surat/proses_kedatangan') ?>" method="POST" accept-charset="utf-8" id="form_kedatangan">
            	<div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />
                    <input type="hidden" placeholder="" name="id_asalkedatangan" />
                    <input type="hidden" placeholder="" name="id_tujuankedatangan" />
                    <input type="hidden" placeholder="" name="id_pengajuan" />
                    
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
                    <h4>Asal Kedatangan</h4>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="asal_alamat" required=""></textarea>
                    </div>
                    <div class="form-group">
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
                     <div class="form-group">
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
                     <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" placeholder="Alamat" name="tujuan_alamat" required=""></textarea>
                    </div>
                    <div class="form-group">
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
	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
	                <button type="submit" class="btn btn-primary">Simpan</button>
	            </div>
            	
            </form>
	            
        </div>
    </div>
</div>


<div class="modal fade" id="modal_perpindahan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"><i class="icon-user mr-2"></i> &nbsp;Proses Pengajuan Surat Perpindahan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?php echo site_url('admin/pengajuan_surat/proses_perpindahan') ?>" method="POST" accept-charset="utf-8" id="form_perpindahan">
                <div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />
                    <input type="hidden" placeholder="" name="id_tujuanperpindahan" />
                    <input type="hidden" placeholder="" name="id_pengajuan" />

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

<div class="modal fade" id="modal_kematian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Pengajuan Surat Kematian</h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="<?php echo site_url('admin/pengajuan_surat/proses_kematian') ?>" method="POST" accept-charset="utf-8" id="form_kematian">
                <div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />
                    <input type="hidden" placeholder="" name="id_pengajuan" />
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
                        <select class="form-control select" data-placeholder="Penduduk" name="id_penduduk" id="id_penduduk" required="" data-fouc>
                            <option></option>
                            <?php foreach ($penduduk as $value): ?>
                             <option value="<?= $value->id ?>"><?= $value->nik ?> - <?= $value->nama ?></option>
                                
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

<div class="modal fade" id="modal_kelahiran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Form Pengajuan Surat Kelahiran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="<?php echo site_url('admin/pengajuan_surat/proses_kelahiran') ?>" method="POST" accept-charset="utf-8" id="form_kelahiran">
                <div class="modal-body">
                    <input type="hidden" placeholder="" name="id" />
                    <input type="hidden" placeholder="" name="id_pengajuan" />
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
                        <select class="form-control select" data-placeholder="Penduduk" name="id_penduduk" required="" data-fouc>
                            <option></option>
                            <?php foreach ($penduduk as $value): ?>
                             <option value="<?= $value->id ?>"><?= $value->nik ?> - <?= $value->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="Tanggal Meninggal" name="tanggal_lahir" required="" />
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