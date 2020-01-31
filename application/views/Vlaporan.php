<!-- Page header -->
<div class="page-header pb-1 pt-1">
    <div class="page-header-content header-elements-md-inline pb-1 pt-1">
        <div class="page-title d-flex p-1">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Laporan</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>
</div>
<!-- /page header -->
<div class="content pt-0">
 
     <div class="card">
        <div class="card-header header-elements-inline pb-2 pt-2">
            <div>
            </div>
            <div class="header-elements d-flex flex-row">
                <div class="list-icons">
                  
                </div>
            </div>
        </div>
        <div class="card-body">
        	<form action="<?php echo site_url('admin/laporan/submit') ?>" method="POST" accept-charset="utf-8" target="_blank">
        		<div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-3">
	                        <label class=""> Dari Tanggal</label>
	                        <input type="date" placeholder="Dari Tanggal" name="tanggal_dari" class="form-control daterange-single" data-validation="required" value="" >
	                    </div>
	                </div>
	            </div>
	            <div class="form-group mb-2">
	                <div class="row">
	                    <div class="col-md-3">
	                        <label class=""> Sampai Tanggal</label>
	                        <input type="date" placeholder="Dari Tanggal" name="tanggal_sampai" class="form-control daterange-single" data-validation="required" value="" >
	                    </div>
	                </div>
	            </div>
        		 <div class="form-group ">
	                <div class="row">
	                    <div class="col-md-3">
	                       	<label>Status</label>
	                        <select class="form-control select" data-fouc data-placeholder="Status" name="status" required="">
	                        	<option></option>
	                            <option value="1">Sudah Diproses</option>
	                            <option value="0">Belum Diproses</option>
	                        </select>
	                    </div>
	                    
	                </div>
	            </div>
				<div class="form-group text-right">
					<div class="row">
	                    <div class="col-md-3">
	                    	<button type="button" class="btn btn-link">Batal</button>
				   	 		<button type="submit" class="btn btn-primary">Submit</button>
	                    </div>
	                </div>
				</div>
        	</form>
	        	
        </div>
	</div>
</div>