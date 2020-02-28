<div class="content pt-0">
	<div class="card">
		<div class="card-body">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?php echo site_url('/') ?>assets/img/home.jpeg" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?php echo site_url('/') ?>assets/img/home.jpeg" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?php echo site_url('/') ?>assets/img/home.jpeg" alt="Third slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="<?php echo site_url('/') ?>assets/img/home.jpeg" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		
	</div>

	<div class="row">
		<div class="col-md-12">
			<?php foreach ($informasi as $item): ?>
				<div class="card">
					<div class="card-body">

						<h5 class="font-weight-semibold mb-1">
							<a href="#" class="text-default"><?= strtoupper($item->judul) ?></a>
						</h5>

						<ul class="list-inline list-inline-dotted text-muted mb-3">
							<li class="list-inline-item">Oleh <a href="#" class="text-muted"><?= ucfirst($item->user_name) ?></a></li>
							<li class="list-inline-item"><?= date('d M Y', strtotime($item->tanggal)) ?></li>
						</ul>

						<?= $item->isi ?>
					</div>

					<div class="card-footer d-flex">
						<!-- <a href="#" class="text-default"><i class="icon-heart6 text-pink mr-2"></i> 29</a> -->
						<a href="#" class="ml-auto">Read more <i class="icon-arrow-right14 ml-2"></i></a>
					</div>
				</div>
			<?php endforeach ?>

			
		</div>


		
	</div>
</div>