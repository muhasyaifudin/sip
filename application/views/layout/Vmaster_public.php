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
						<a href="../full/index.html" class="navbar-nav-link">
							<i class="icon-home4 mr-2"></i>
							Home
						</a>
					</li>

					<li class="nav-item dropdown">
						<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">Menu</a>

						<div class="dropdown-menu">
							<a href="#" class="dropdown-item">Action</a>
							<a href="#" class="dropdown-item">Another action</a>
							<a href="#" class="dropdown-item">One more action</a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item">Separate action</a>
						</div>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a href="#" class="navbar-nav-link">
							<i class="icon-bell2"></i>
							<span class="d-md-none ml-2">Notifications</span>
							<span class="badge badge-mark border-white ml-auto ml-md-0"></span>
						</a>					
					</li>

					<li class="nav-item dropdown dropdown-user">
						<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
							<img src="../../../../global_assets/images/image.png" class="rounded-circle mr-2" height="34" alt="">
							<span>Victoria</span>
						</a>

						<div class="dropdown-menu dropdown-menu-right">
							<a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
							<a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
							<a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span class="badge badge-pill bg-blue ml-auto">58</span></a>
							<div class="dropdown-divider"></div>
							<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
							<a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

	
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
