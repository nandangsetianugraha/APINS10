					<header class="page-header">
						<h2>Absensi</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Absensi</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
						<div class="col-lg-8">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
										<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
										<div class="input-group">
											<span class="input-group-text">
												<i class="fas fa-calendar-alt"></i>
											</span>
											<input type="text" id="tglabsen" class="form-control-sm" value="<?=date('Y-m-d');?>">
										</div>
									</div>
										<h2 class="card-title">Absensi</h2>
								</header>
								<div class="card-body">
									
									<table class="table table-bordered table-striped" id="kt_table_users">
										<thead>
											<tr>
												<th>Nama Siswa</th>
												<th>Absensi</th>
												<th></th>
											</tr>
										</thead>
										<tbody>				
										</tbody>
									</table>
								</div>
							</section>
						</div>
						<div class="col-lg-4">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<?php 
												$sql = "select * from rombel where tapel='$tapel' order by nama_rombel asc";
												$query = $connect->query($sql);
												?>
												<select id="kelas" name="kelas" class="form-select form-select-sm form-select-solid w-100px w-xxl-125px" data-control="select2" data-placeholder="Rombel" data-hide-search="true">
												<?php 
												if($level==11){ 
												?>
												<?php
												$sql3 = "select * from rombel where tapel='$tapel' order by nama_rombel asc";
												$query3 = $connect->query($sql3);
												while($nk=$query3->fetch_assoc()){
												?>
															
												<option value="<?=$nk['nama_rombel'];?>">Kelas <?=$nk['nama_rombel'];?></option>
												<?php 
												}
												?>
												<?php }else{ ?>
												<option value="<?=$kelas;?>" selected="selected">Kelas <?=$kelas;?></option>
												<?php } ?>
												</select>
									</div>
										<h2 class="card-title">Statistik</h2>
								</header>
								<div class="card-body">
									<section class="card card-featured-left card-featured-quaternary mb-4">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-secondary">
														<i class="fas fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Sakit</h4>
														<div class="info">
															<strong class="amount"><div id="sakit">0</div></strong>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
									<section class="card card-featured-left card-featured-quaternary mb-4">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-primary">
														<i class="fas fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Ijin</h4>
														<div class="info">
															<strong class="amount"><div id="ijin">0</div></strong>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
									<section class="card card-featured-left card-featured-quaternary mb-4">
										<div class="card-body">
											<div class="widget-summary">
												<div class="widget-summary-col widget-summary-col-icon">
													<div class="summary-icon bg-tertiary">
														<i class="fas fa-user"></i>
													</div>
												</div>
												<div class="widget-summary-col">
													<div class="summary">
														<h4 class="title">Alpha</h4>
														<div class="info">
															<strong class="amount"><div id="alfa">0</div></strong>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</section>
						</div>
					</div>
					