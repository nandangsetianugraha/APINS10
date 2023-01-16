					<header class="page-header">
						<h2>Absensi Pegawai</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Absensi Pegawai</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<input type="hidden" name="urls" id="urls" class="form-control" value="<?=base_url();?>" placeholder="Username">
								<input type="text" id="tanggal" class="form-control-sm" value="<?=date('Y-m-d');?>">
							</div>
								<h2 class="card-title judul">Absensi Pegawai</h2>
								<p class="card-subtitle">
								
								</p>
						</header>
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-6">
									<form id="mutasiForm" method="POST" enctype="multipart/form-data" action="modul/kepegawaian/proses.php" class="form">
									<div class="input-group mb-3">
										<input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
										<button type="submit" class="btn btn-primary">Import</button>
									</div>
									</form>
								</div>
							</div>
							
							
							<table class="table table-bordered table-striped" id="temaTable">
								<thead>
									<tr>
										<th class="text-center">ID</th>
										<th class="text-center">Nama</th>
										<th class="text-center">Absen Masuk</th>
										<th class="text-center">Absen Keluar</th>
										<th class="text-center">Telat</th>
										<th class="text-center">Pulang Cepat</th>
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>
									
									<div class="modal fade" id="editTema" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<form id="updateTemaForm" method="POST" action="modul/kepegawaian/absenmanual.php" class="form">
													<div class="tema-data"></div>
												</form>
											</div>
										</div>
									</div>
									
									<div class="modal" id="tambahTema" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form id="createTemaForm" method="POST" action="modul/kepegawaian/simpanID.php" class="form">
													<div class="absen-data"></div>
												</form>
											</div>
										</div>
									</div>