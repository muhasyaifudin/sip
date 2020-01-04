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

	<script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>global_assets/js/demo_pages/form_select2.js"></script>
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

<body class="">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark px-0">
		<div class="container">
			<div class="navbar-brand wmin-0 mr-5 pb-2 pt-1">
				<a href="<?php echo base_url(); ?>" class="d-inline-block">
					<span class="text-white h4">Desa Kaliangkrik</span>
				</a>
			</div>

			<div class="d-md-none">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
					<i class="icon-tree5"></i>
				</button>
			</div>

			<div class="collapse navbar-collapse" id="navbar-mobile">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="<?php echo site_url('/') ?>" class="navbar-nav-link">
							<i class="icon-home4 mr-2"></i>
							Home
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('/pengajuan_surat') ?>" class="navbar-nav-link">
							<i class="icon-file-text2 mr-2"></i>
							Pengajuan Surat
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('/informasi') ?>" class="navbar-nav-link">
							<i class="icon-newspaper mr-2"></i>
							Informasi
						</a>
					</li>
					<li class="nav-item dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
							<i class="icon-person mr-2"></i>
							Profil
						</a>

						<div class="dropdown-menu">
							<a href="<?php echo site_url('profil/visi_misi') ?>" class="dropdown-item">Visi & Misi</a>
							<a href="<?php echo site_url('profil/potensi') ?>" class="dropdown-item">Profil Potensi</a>
							<a href="<?php echo site_url('profil/struktur') ?>" class="dropdown-item">Struktur Organisasi</a>
							<a href="<?php echo site_url('profil/sejarah') ?>" class="dropdown-item">Sejarah</a>
						</div>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown dropdown-user">
						<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo base_url(); ?>/global_assets/images/image.png" class="rounded-circle mr-2" height="34" alt="">
							<span>Admin</span>
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="<?php echo site_url('login') ?>" class="dropdown-item"><i class="icon-switch2"></i> Login</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content container">

	
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
