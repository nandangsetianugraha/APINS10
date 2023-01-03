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
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<input type="hidden" id="tapel" value="<?=$tapel;?>">
								<input type="hidden" id="smt" value="<?=$smt;?>">
								
								<?php if($level==11){ ?>
								<select class="form-select-sm" id="kelas" name="kelas">
									<?php 
									$sql4 = "select * from rombel where tapel='$tapel' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
									$query4 = $connect->query($sql4);
									while($nk=$query4->fetch_assoc()){
										
									?>
									<option value="<?=$nk['nama_rombel'];?>">Kelas <?=$nk['nama_rombel'];?></option>
									<?php };?>
								</select>
								<?php }else{ ?>
								<select class="form-select-sm" id="kelas" name="kelas">
									<option value="<?=$kelas;?>">Kelas <?=$kelas;?></option>
								</select>
								<?php }; ?>
								<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addProyek">+ Proyek</button>
							</div>
							<h2 class="card-title"><?=ucwords($judul);?></h2>
							<p class="mb-3">Tahun Ajaran <?=$tapel;?> Semester <?=$smt;?></p>
						</header>
						<div class="card-body">
							<table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="manageProyek">
								<thead>
								  <tr>
									<th>No</th>
									<th>Tema</th>
									<th>Fase</th>
									<th>Nama Proyek</th>
									<th>Deskripsi Proyek</th>
									<th class="d-none d-sm-table-cell">Edit</th>
								  </tr>
								</thead>
								<tbody>
								  
								</tbody>
							</table>
						</div>
					</section>
					
					<div class="modal" id="addProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/proyek/tambahproyek.php" autocomplete="off" method="POST" id="buatproyek">
									<div class="fetched-data"></div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal" id="editProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/proyek/ubahproyek.php" autocomplete="off" method="POST" id="ubahproyek">
									<div class="fetched-data1"></div>
								</form>
							</div>
						</div>
					</div>
					
					<!--
									<div class="modal" id="modalBootstrap" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Are you sure?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<p>Are you sure that you want to delete this image?</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary">Confirm</button>
													<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									-->