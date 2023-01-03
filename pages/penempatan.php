					<header class="page-header">
						<h2>Penempatan</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Penempatan</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<?php if($smt==2){ ?>
								<div class="btn-group">
								<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-tapel="<?=$tapel;?>" data-smt="<?=$smt;?>" id="lanjutkan"><i class="fas fa-sync"></i> Lanjutan Semester</button>
								</div>
								<?php } ?>
								<?php if($level==11){ 
								if($smt==1){?>
								<div class="btn-group">
								<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-tapel="<?=$tapel;?>" data-smt="<?=$smt;?>" id="luluskan"><i class="fas fa-sync"></i> Luluskan</button>
								</div>
								<?php }} ?>
										
								<?php if($level==11){ ?>
								<input type="hidden" name="kelas" id="kelas" class="form-control" value="0">
								<?php }else{ ?>
								<input type="hidden" name="kelas" id="kelas" class="form-control" value="<?=$kelas;?>">
								<?php } ?>
							</div>
								<h2 class="card-title">Siswa yang belum dimapping</h2>
						</header>
						<div class="card-body">
							
							<table class="table table-bordered table-striped" id="kt_table_users">
								<thead>
									<tr>
										<th width="60%">Nama</th>
										<th width="20%">Kelas Sebelumnya</th>
										<th width="20%">Aksi</th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>
									
									<div class="modal fade" id="tempatkan" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Tempatkan di Kelas?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form id="penempatanForm" method="POST" action="modul/siswa/penempatan.php" class="form">
													<div class="tempatkan-data"></div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal" id="mutasikan" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Mutasikan Siswa?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form id="mutasiForm" method="POST" action="modul/siswa/mutasi.php" class="form">
													<div class="mutasikan-data"></div>
												</form>
											</div>
										</div>
									</div>