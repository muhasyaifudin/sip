<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sistem Informasi Penduduk - Desa Kaliangkrik</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<script src="<?php echo base_url(); ?>global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/slinky.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/styling/switch.min.js"></script>

	<!-- Core JS files -->

	<script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/tables/datatables/extensions/fixed_columns.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/demo_pages/datatables_extension_fixed_columns.js"></script>
	<!-- /core JS files -->

	<script src="<?php echo base_url(); ?>global_assets/js/demo_pages/datatables_basic.js"></script>

	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/core.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/effects.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/cookie.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/widgets.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/globalize/globalize.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/globalize/cultures/globalize.culture.de-DE.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/extensions/jquery_ui/globalize/cultures/globalize.culture.ja-JP.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<!-- Theme JS files -->
	<script src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark fixed-top">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
			<div class="navbar-brand navbar-brand-md">
				<a href="<?php echo base_url(); ?>" class="d-inline-block">
					DESA KALIANGKRIK
				</a>
			</div>
			
			<div class="navbar-brand navbar-brand-xs">
				<a href="<?php echo base_url(); ?>" class="d-inline-block">
					<img src="<?php echo base_url(); ?>global_assets/images/logo_icon_light.png" alt="">
				</a>
			</div>
		</div>
		<!-- /header with logos -->
	

		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="<?php echo base_url(); ?>" class="d-inline-block">
					<img src="<?php echo base_url(); ?>global_assets/images/logo_dark.png" alt="">
				</a>
			</div>	

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>

			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				
			</ul>

			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown dropdown-user">
					<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url(); ?>global_assets/images/image.png" class="rounded-circle mr-2" height="34" alt="">
						<span>Admin</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo base_url(); ?>ganti_password" class="dropdown-item"><i class="icon-key"></i> Ganti Password</a>
						<a href="<?php echo base_url(); ?>logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>

					</div>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->

	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item">
							<a href="<?php echo base_url(); ?>" class="nav-link <?php if($this->uri->segment(1) === '') echo 'active'; ?>">
								<i class="icon-home4"></i>
								<span>Beranda</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo site_url('penduduk'); ?>" class="nav-link <?php if($this->uri->segment(1) === 'penduduk') echo 'active'; ?>">
								<i class="icon-list-unordered"></i>
								<span>Data Penduduk</span>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo site_url('perpindahan'); ?>" class="nav-link">
								<i class="icon-list-unordered"></i>
								<span>Perpindahan</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('kedatangan'); ?>" class="nav-link">
								<i class="icon-list-unordered"></i>
								<span>Kedatangan</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="../full/changelog.html" class="nav-link">
								<i class="icon-list-unordered"></i>
								<span>Kelahiran</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="../full/changelog.html" class="nav-link">
								<i class="icon-list-unordered"></i>
								<span>Kematian</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="../full/changelog.html" class="nav-link">
								<i class="icon-list-unordered"></i>
								<span>Pengajuan Surat</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="../full/changelog.html" class="nav-link">
								<i class="icon-list-unordered"></i>
								<span>Laporan</span>
							</a>
						</li>
						<!-- /main -->

					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<?php 
	            $this->load->view($content, $data);
	         ?>
	        </div>
			


		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
