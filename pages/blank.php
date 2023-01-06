					<header class="page-header">
						<h2><?=ucwords($judul);?></h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span><?=ucwords($judul);?></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
						<div class="row">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-box"></i>
												<h2 class="card-big-info-title">General Info</h2>
												<p class="card-big-info-desc">Add here the product description with all details and necessary information.</p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<div class="form-group row pb-4 align-items-center">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Product Name</label>
													<div class="col-lg-7 col-xl-6">
														<input type="text" class="form-control form-control-modern" name="productName" value="" required />
													</div>
												</div>
												<div class="form-group row pb-4">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">Product Description</label>
													<div class="col-lg-7 col-xl-6">
														<textarea class="form-control form-control-modern" name="productDescription" rows="6"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>