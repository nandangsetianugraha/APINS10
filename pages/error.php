					<header class="page-header">
						<h2><?=ucwords($judul);?></h2>

						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="./">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>

								<li><span>Pages</span></li>

								<li><span><?=ucwords($judul);?></span></li>

							</ol>

							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<section class="body-error error-inside">
							<div class="center-error">

								<div class="row">
									<div class="col-lg-8">
										<div class="main-error mb-3">
											<h2 class="error-code text-dark text-center font-weight-semibold m-0">404 <i class="fas fa-file"></i></h2>
											<p class="error-explanation text-center">Maaf, halaman <?=ucwords($judul);?> tidak tersedia.</p>
										</div>
									</div>
									<div class="col-lg-4">
										<ul class="nav nav-list flex-column primary">
											<li class="nav-item">
												<a class="nav-link" href="./"><i class="fas fa-caret-right text-dark"></i> Beranda</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="./logout.php"><i class="fas fa-caret-right text-dark"></i> Keluar</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</section>
					<!-- end: page -->