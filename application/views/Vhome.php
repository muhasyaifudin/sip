<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dashboard</span></h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content pt-0">
     
    <div class="row">
					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-people icon-3x text-indigo-400"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="font-weight-semibold mb-0"><?php echo number_format($total_penduduk); ?></h3>
									<span class="text-uppercase font-size-sm text-muted">Total Data Penduduk</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-move-right icon-3x  text-blue-400"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="font-weight-semibold mb-0"><?php echo number_format($total_perpindahan); ?></h3>
									<span class="text-uppercase font-size-sm text-muted">Total Data Perpindahan</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-move-left icon-3x text-indigo-400"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="font-weight-semibold mb-0"><?php echo number_format($total_kedatangan); ?></h3>
									<span class="text-uppercase font-size-sm text-muted">Total Data Kedatangan</span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-xl-3">
						<div class="card card-body">
							<div class="media">
								<div class="mr-3 align-self-center">
									<i class="icon-user-cancel icon-3x text-danger-400"></i>
								</div>

								<div class="media-body text-right">
									<h3 class="font-weight-semibold mb-0"><?php echo number_format($total_kematian); ?></h3>
									<span class="text-uppercase font-size-sm text-muted">Total Data Kematian</span>
								</div>
							</div>
						</div>
					</div>

				</div>
</div>
<!-- /content area -->