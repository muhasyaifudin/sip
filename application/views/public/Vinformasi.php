<!-- Content area -->
<div class="content">

	<!-- Post grid -->
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
	<!-- /post grid -->


	<!-- Pagination -->
	<div class="d-flex justify-content-center mt-3 mb-3">
		<ul class="pagination">
			<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a></li>
			<li class="page-item active"><a href="#" class="page-link">1</a></li>
			<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a></li>
		</ul>
	</div>
	<!-- /pagination -->

</div>
<!-- /content area -->